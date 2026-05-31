<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartsReportController extends Controller
{
    public function index()
    {
        return view('chartsReport');
    }

    public function meta()
    {
        $employees = DB::table('users')
            ->select('id','name')
            ->whereExists(function($q){
                $q->select(DB::raw(1))
                  ->from('requests')
                  ->whereColumn('requests.assigned_to','users.id');
            })
            ->orderBy('name')->get();

        $licenseTypes = DB::table('license_types')
            ->select('id','name')
            ->where('is_active',1)->orderBy('name')->get();

        $governorates = DB::table('governorates')
            ->select('id','name')
            ->where('is_active',1)->orderBy('name')->get();

        return response()->json([
            'success'=>true,
            'data'=>compact('employees','licenseTypes','governorates')
        ]);
    }

    private function parseFilters(Request $request)
    {
        $days = (int)$request->get('time_range',30);
        if(!in_array($days,[7,30,90,365])) $days=30;
        $end = Carbon::now();
        $start = (clone $end)->subDays($days-1)->startOfDay();

        return (object)[
            'employee_id' => $request->get('employee_id'),
            'license_type_id' => $request->get('license_type_id'),
            'start' => $start,
            'end'   => $end,
            'time_range_days'=>$days,
            'metric'=>$request->get('metric')
        ];
    }

    private function baseQuery($filters)
    {
        $q = DB::table('requests')
            ->join('license_types','requests.license_type_id','=','license_types.id')
            ->join('directorates','requests.directorate_id','=','directorates.id')
            ->join('governorates','directorates.governorate_id','=','governorates.id')
            ->join('request_statuses','requests.status_id','=','request_statuses.id')
            ->leftJoin('users','requests.assigned_to','=','users.id')
            ->whereBetween('requests.created_at', [$filters->start, $filters->end]);

        if ($filters->employee_id && $filters->employee_id !== 'all') {
            $q->where('requests.assigned_to',$filters->employee_id);
        }
        if ($filters->license_type_id && $filters->license_type_id !== 'all') {
            $q->where('requests.license_type_id',$filters->license_type_id);
        }
        return $q;
    }

    public function summary(Request $request)
    {
        $f = $this->parseFilters($request);
        $q = $this->baseQuery($f);

        $agg = $q->selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN requests.status_id=8 THEN 1 ELSE 0 END) as completed,
            SUM(CASE WHEN requests.status_id NOT IN (4,8,9) THEN 1 ELSE 0 END) as in_progress,
            SUM(CASE WHEN requests.status_id=4 THEN 1 ELSE 0 END) as rejected,
            SUM(CASE WHEN requests.status_id=9 THEN 1 ELSE 0 END) as cancelled
        ")->first();

        if(!$agg){
            $summary = [
                'total'=>0,'completed'=>0,'in_progress'=>0,'rejected'=>0,'cancelled'=>0,'completion_rate'=>0
            ];
        } else {
            $total = (int)$agg->total;
            $summary = [
                'total'=>$total,
                'completed'=>(int)$agg->completed,
                'in_progress'=>(int)$agg->in_progress,
                'rejected'=>(int)$agg->rejected,
                'cancelled'=>(int)$agg->cancelled,
                'completion_rate'=>$total? round($agg->completed/$total*100,2):0
            ];
        }
        return response()->json(['success'=>true,'data'=>$summary]);
    }

    public function employeePerformance(Request $request)
    {
        $f = $this->parseFilters($request);
        $q = $this->baseQuery($f);
        $rows = $q->selectRaw("
                COALESCE(users.name,'غير معيّن') as employee,
                SUM(CASE WHEN requests.status_id=8 THEN 1 ELSE 0 END) as completed,
                SUM(CASE WHEN requests.status_id=4 THEN 1 ELSE 0 END) as rejected
            ")
            ->groupBy('users.name')
            ->orderBy('completed','desc')
            ->limit(12)
            ->get();

        $labels=[]; $completed=[]; $target=[]; $comparison=[];
        foreach($rows as $r){
            $labels[] = $r->employee;
            $completed[] = (int)$r->completed;
            $target[] = (int)$r->completed + 5;      // هدف وهمي
            $comparison[] = max(0,(int)$r->completed - 3); // مقارنة وهمية
        }

        return response()->json([
            'success'=>true,
            'data'=>compact('labels','completed','target','comparison')
        ]);
    }

    public function regionDistribution(Request $request)
    {
        $f = $this->parseFilters($request);
        $metric = $request->get('metric','requests');

        $base = $this->baseQuery($f);
        $rows = $base->selectRaw("
                governorates.name as governorate,
                COUNT(requests.id) as total,
                SUM(CASE WHEN requests.status_id=8 THEN 1 ELSE 0 END) as completed
            ")
            ->groupBy('governorates.name')
            ->orderBy('total','desc')
            ->get();

        $labels=[]; $values=[];
        foreach($rows as $r){
            $labels[]=$r->governorate;
            if($metric==='requests'){
                $values[]=(int)$r->total;
            } elseif($metric==='duration'){
                // متوسط أيام بسيط
                $avg = DB::table('requests')
                    ->whereBetween('created_at',[$f->start,$f->end])
                    ->whereExists(function($q) use($r){
                        $q->select(DB::raw(1))
                          ->from('directorates')
                          ->whereColumn('requests.directorate_id','directorates.id')
                          ->join('governorates','directorates.governorate_id','=','governorates.id')
                          ->where('governorates.name',$r->governorate);
                    })
                    ->selectRaw("AVG(DATEDIFF(CASE WHEN status_id=8 THEN updated_at ELSE NOW() END, created_at)) as avg_days")
                    ->value('avg_days');
                $values[]= round($avg ?? 0,2);
            } else {
                $values[] = $r->total? round($r->completed / $r->total *100,2):0;
            }
        }

        return response()->json([
            'success'=>true,
            'data'=>[
                'metric'=>$metric,
                'labels'=>$labels,
                'values'=>$values
            ]
        ]);
    }

    public function licenseTypes(Request $request)
    {
        $f = $this->parseFilters($request);
        $q = $this->baseQuery($f);
        $rows = $q->selectRaw("
                license_types.name as license_type,
                COUNT(requests.id) as total,
                SUM(CASE WHEN requests.status_id=8 THEN 1 ELSE 0 END) as completed
            ")
            ->groupBy('license_types.name')
            ->orderBy('total','desc')
            ->get();

        $labels=[]; $totals=[]; $completed=[];
        foreach($rows as $r){
            $labels[]=$r->license_type;
            $totals[]=(int)$r->total;
            $completed[]=(int)$r->completed;
        }
        return response()->json(['success'=>true,'data'=>compact('labels','totals','completed')]);
    }

    public function performanceTrend(Request $request)
    {
        $f = $this->parseFilters($request);
        $daily = $f->time_range_days <= 30;
        $format = $daily ? '%Y-%m-%d' : '%Y-%m';

        $base = $this->baseQuery($f);
        $rows = $base->selectRaw("
                DATE_FORMAT(requests.created_at,'$format') as grp,
                COUNT(*) as total,
                SUM(CASE WHEN requests.status_id=8 THEN 1 ELSE 0 END) as completed
            ")
            ->groupBy('grp')
            ->orderBy('grp')
            ->get();

        $labels=[]; $requests=[]; $completion=[]; $efficiency=[]; $revenue=[];
        foreach($rows as $r){
            $labels[]=$r->grp;
            $requests[]=(int)$r->total;
            $comp=(int)$r->completed;
            $rate = $r->total? round($comp / $r->total *100,2):0;
            $completion[]=$rate;
            $efficiency[]=$rate; // نفس القيمة هنا (يمكن تخصيصها لاحقاً)
            // الإيرادات: جمع الرسوم المدفوعة لنفس الفترة
            $periodStart = $daily? Carbon::parse($r->grp)->startOfDay()
                                 : Carbon::parse($r->grp.'-01')->startOfMonth();
            $periodEnd   = $daily? (clone $periodStart)->endOfDay()
                                 : (clone $periodStart)->endOfMonth()->endOfDay();

            $rev = DB::table('fees')
                ->join('requests','fees.request_id','=','requests.id')
                ->whereBetween('requests.created_at',[$periodStart,$periodEnd])
                ->where('fees.is_paid',1)
                ->sum('fees.amount');
            $revenue[]=(float)$rev;
        }

        return response()->json([
            'success'=>true,
            'data'=>compact('labels','requests','completion','efficiency','revenue')
        ]);
    }

    public function recentRequests(Request $request)
    {
        $f = $this->parseFilters($request);
        $q = $this->baseQuery($f);
        $rows = $q->join('beneficiaries','requests.beneficiary_id','=','beneficiaries.id')
            ->select(
                'requests.request_number',
                'license_types.name as license_type',
                'beneficiaries.name as beneficiary',
                'governorates.name as governorate',
                'request_statuses.name as status_name',
                'requests.created_at'
            )
            ->orderBy('requests.created_at','desc')
            ->limit(15)
            ->get();

        return response()->json(['success'=>true,'data'=>$rows]);
    }
}