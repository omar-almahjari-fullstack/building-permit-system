<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DashboardAdminController extends Controller
{
    private function buildFilters(Request $request)
    {
        $period   = $request->get('period');
        $dateFrom = $request->get('date_from');
        $dateTo   = $request->get('date_to');

        if ($period && $period !== 'none' && !$dateFrom && !$dateTo) {
            switch ($period) {
                case 'week':
                    $dateFrom = Carbon::now()->subDays(7)->startOfDay();
                    $dateTo   = Carbon::now()->endOfDay();
                    break;
                case 'month':
                    $dateFrom = Carbon::now()->subDays(30)->startOfDay();
                    $dateTo   = Carbon::now()->endOfDay();
                    break;
                case 'quarter':
                    $dateFrom = Carbon::now()->subDays(90)->startOfDay();
                    $dateTo   = Carbon::now()->endOfDay();
                    break;
            }
        } elseif ($dateFrom) {
            $dateFrom = Carbon::parse($dateFrom)->startOfDay();
            $dateTo   = $dateTo ? Carbon::parse($dateTo)->endOfDay() : Carbon::now()->endOfDay();
        }

        return (object)[
            'license_type_id' => $request->get('license_type_id'),
            'status_id'       => $request->get('status_id'),
            'governorate_id'  => $request->get('governorate_id'),
            'directorate_id'  => $request->get('directorate_id'),
            'date_from'       => $dateFrom,
            'date_to'         => $dateTo,
            'category'        => $request->get('category'),
        ];
    }

    private function applyFilters($query, $filters)
    {
        if ($filters->license_type_id) {
            $query->where('requests.license_type_id', $filters->license_type_id);
        }
        if ($filters->status_id) {
            $query->where('requests.status_id', $filters->status_id);
        }
        if ($filters->governorate_id) {
            $query->where('directorates.governorate_id', $filters->governorate_id);
        }
        if ($filters->directorate_id) {
            $query->where('requests.directorate_id', $filters->directorate_id);
        }
        if ($filters->date_from && $filters->date_to) {
            $query->whereBetween('requests.created_at', [$filters->date_from, $filters->date_to]);
        }
        return $query;
    }

    public function getSummary(Request $request)
    {
        $filters = $this->buildFilters($request);
        $base = DB::table('requests')
            ->join('directorates', 'requests.directorate_id', '=', 'directorates.id');

        $this->applyFilters($base, $filters);

        $newCount       = (clone $base)->where('requests.status_id', 1)->count();
        $reviewCount    = (clone $base)->where('requests.status_id', 2)->count();
        $technicalCount = (clone $base)
            ->where('requests.current_stage_id', 2)
            ->whereIn('requests.status_id', [2,3])
            ->count();
        $completedCount = (clone $base)->where('requests.status_id', 8)->count();

        return response()->json([
            'success' => true,
            'data' => [
                'new_requests'     => ['count'=>$newCount, 'change'=>12],
                'under_review'     => ['count'=>$reviewCount, 'change'=>-5],
                'technical_review' => ['count'=>$technicalCount, 'change'=>-3],
                'completed'        => ['count'=>$completedCount, 'change'=>8],
            ]
        ]);
    }

    public function getRecentActivity(Request $request)
    {
        $filters = $this->buildFilters($request);

        $query = DB::table('request_workflows')
            ->join('requests', 'request_workflows.request_id', '=', 'requests.id')
            ->join('request_statuses', 'request_workflows.status_id', '=', 'request_statuses.id')
            ->select(
                'requests.request_number',
                'request_statuses.name as status_name',
                'request_workflows.comments',
                'request_workflows.started_at as occurred_at'
            )
            ->orderByDesc('request_workflows.started_at')
            ->limit(10);

        $this->applyFilters($query, $filters);

        $records = $query->get()->map(function($r){
            return [
                'title'          => "تحديث حالة: {$r->status_name}",
                'description'    => $r->comments ?: '—',
                'request_number' => $r->request_number,
                'time'           => $r->occurred_at
            ];
        });

        return response()->json(['success'=>true,'data'=>$records]);
    }

    public function requestsByGovernorate(Request $request)
    {
        $filters = $this->buildFilters($request);
        $query = DB::table('requests')
            ->join('directorates','requests.directorate_id','=','directorates.id')
            ->join('governorates','directorates.governorate_id','=','governorates.id')
            ->select('governorates.name as governorate', DB::raw('COUNT(requests.id) as total'))
            ->groupBy('governorates.id','governorates.name')
            ->orderBy('total','desc');
        $this->applyFilters($query,$filters);
        $rows = $query->get();

        return response()->json([
            'success'=>true,
            'data'=>[
                'labels'=>$rows->pluck('governorate'),
                'values'=>$rows->pluck('total'),
            ]
        ]);
    }

    public function requestsByLicenseType(Request $request)
    {
        $filters = $this->buildFilters($request);
        $query = DB::table('requests')
            ->join('license_types','requests.license_type_id','=','license_types.id')
            ->join('directorates','requests.directorate_id','=','directorates.id')
            ->select('license_types.name as type_name', DB::raw('COUNT(requests.id) as total'))
            ->groupBy('license_types.id','license_types.name');
        $this->applyFilters($query,$filters);
        $rows = $query->get();

        return response()->json([
            'success'=>true,
            'data'=>[
                'labels'=>$rows->pluck('type_name'),
                'values'=>$rows->pluck('total'),
            ]
        ]);
    }

    public function listRequestsModal(Request $request)
    {
        $filters  = $this->buildFilters($request);
        $category = $filters->category;

        $query = DB::table('requests')
            ->join('license_types','requests.license_type_id','=','license_types.id')
            ->join('directorates','requests.directorate_id','=','directorates.id')
            ->join('request_statuses','requests.status_id','=','request_statuses.id')
            ->join('governorates','directorates.governorate_id','=','governorates.id')
            ->select(
                'requests.request_number',
                'license_types.name as license_type',
                'directorates.name as directorate_name',
                'governorates.name as governorate_name',
                'request_statuses.name as status_name',
                'requests.created_at',
                'requests.updated_at',
                'requests.current_stage_id'
            )
            ->orderByDesc('requests.created_at')
            ->limit(500); // حد أقصى

        switch ($category) {
            case 'new':
                $query->where('requests.status_id',1);
                break;
            case 'review':
                $query->where('requests.status_id',2);
                break;
            case 'technical':
                $query->where('requests.current_stage_id',2)
                      ->whereIn('requests.status_id',[2,3]);
                break;
            case 'completed':
                $query->where('requests.status_id',8);
                break;
        }

        $this->applyFilters($query,$filters);

        $data = $query->get()->map(function($r){
            return [
                'request_number'=>$r->request_number,
                'license_type'=>$r->license_type,
                'governorate'=>$r->governorate_name,
                'directorate'=>$r->directorate_name,
                'status'=>$r->status_name,
                'created_at'=>$r->created_at,
                'last_update'=>$r->updated_at
            ];
        });

        return response()->json([
            'success'=>true,
            'category'=>$category,
            'data'=>$data
        ]);
    }

    /* =================== جديد: بيانات الفلاتر الأساسية =================== */
    public function getBasicFilters()
    {
        $licenseTypes = DB::table('license_types')
            ->select('id','name')
            ->where('is_active',1)
            ->orderBy('id')
            ->get();

        $statuses = DB::table('request_statuses')
            ->select('id','name')
            ->where('is_active',1)
            ->orderBy('id')
            ->get();

        $governorates = DB::table('governorates')
            ->select('id','name')
            ->where('is_active',1)
            ->orderBy('name')
            ->get();

        return response()->json([
            'success'=>true,
            'data'=>[
                'license_types'=>$licenseTypes,
                'statuses'=>$statuses,
                'governorates'=>$governorates
            ]
        ]);
    }

    /* =================== جديد: المديريات حسب المحافظة =================== */
    public function getDirectoratesByGovernorate(Request $request)
    {
        $govId = $request->get('governorate_id');
        if (!$govId) {
            return response()->json([
                'success'=>true,
                'data'=>[]
            ]);
        }

        $directorates = DB::table('directorates')
            ->select('id','name')
            ->where('governorate_id',$govId)
            ->where('is_active',1)
            ->orderBy('name')
            ->get();

        return response()->json([
            'success'=>true,
            'data'=>$directorates
        ]);
    }

    /* =================== جديد: التصدير CSV =================== */
    public function exportRequests(Request $request)
    {
        $filters  = $this->buildFilters($request);
        $category = $filters->category;

        $query = DB::table('requests')
            ->join('license_types','requests.license_type_id','=','license_types.id')
            ->join('directorates','requests.directorate_id','=','directorates.id')
            ->join('governorates','directorates.governorate_id','=','governorates.id')
            ->join('request_statuses','requests.status_id','=','request_statuses.id')
            ->select(
                'requests.request_number',
                'license_types.name as license_type',
                'governorates.name as governorate_name',
                'directorates.name as directorate_name',
                'request_statuses.name as status_name',
                'requests.created_at',
                'requests.updated_at'
            );

        // نفس منطق التصنيف
        switch ($category) {
            case 'new':
                $query->where('requests.status_id',1);
                break;
            case 'review':
                $query->where('requests.status_id',2);
                break;
            case 'technical':
                $query->where('requests.current_stage_id',2)
                      ->whereIn('requests.status_id',[2,3]);
                break;
            case 'completed':
                $query->where('requests.status_id',8);
                break;
        }

        $this->applyFilters($query,$filters);

        $filename = 'requests_export_'.Carbon::now()->format('Ymd_His').'.csv';

        $response = new StreamedResponse(function() use ($query) {
            // BOM UTF-8
            echo "\xEF\xBB\xBF";
            $handle = fopen('php://output','w');
            // رأس الأعمدة
            fputcsv($handle, [
                'رقم الطلب',
                'نوع الترخيص',
                'المحافظة',
                'المديرية',
                'الحالة',
                'تاريخ الإنشاء',
                'آخر تحديث'
            ]);

            $query->orderByDesc('requests.created_at')->chunk(500, function($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [
                        $r->request_number,
                        $r->license_type,
                        $r->governorate_name,
                        $r->directorate_name,
                        $r->status_name,
                        $r->created_at,
                        $r->updated_at
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type','text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition','attachment; filename="'.$filename.'"');

        return $response;
    }
}