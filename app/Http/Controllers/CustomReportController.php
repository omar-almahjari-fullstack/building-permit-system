<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CustomReportController extends Controller
{
    /* ==================== عرض الصفحة ==================== */
    public function index()
    {
        return view('customReport');
    }

    /* ==================== ميتاداتا الفلاتر ==================== */
    public function getMeta()
    {
        // الموظفون (المعين لهم طلبات فقط لتقليل الحجم)
        $employees = DB::table('users')
            ->select('id','name')
            ->whereExists(function($q){
                $q->select(DB::raw(1))
                  ->from('requests')
                  ->whereColumn('requests.assigned_to','users.id');
            })
            ->orderBy('name')
            ->get();

        // الحالات (المفعلة)
        $statuses = DB::table('request_statuses')
            ->select('id','name')
            ->where('is_active',1)
            ->orderBy('id')
            ->get();

        // المحافظات
        $governorates = DB::table('governorates')
            ->select('id','name')
            ->where('is_active',1)
            ->orderBy('name')
            ->get();

        // أنواع التراخيص
        $licenseTypes = DB::table('license_types')
            ->select('id','name')
            ->where('is_active',1)
            ->orderBy('name')
            ->get();

        // الأعمدة المتاحة (مفتاح => تسمية)
        $availableColumns = [
            'request_number'      => 'رقم الطلب',
            'license_type'        => 'نوع الترخيص',
            'request_type'        => 'نوع الطلب',
            'beneficiary_name'    => 'اسم المستفيد',
            'assigned_employee'   => 'الموظف المسؤول',
            'status_name'         => 'الحالة',
            'governorate'         => 'المحافظة',
            'directorate'         => 'المديرية',
            'created_at'          => 'تاريخ الإنشاء',
            'completion_date'     => 'تاريخ الإنجاز',
            'duration_days'       => 'المدة (أيام)',
            'expected_completion' => 'الموعد المتوقع',
        ];

        return response()->json([
            'success'=>true,
            'data'=>[
                'employees'=>$employees,
                'statuses'=>$statuses,
                'governorates'=>$governorates,
                'license_types'=>$licenseTypes,
                'available_columns'=>$availableColumns
            ]
        ]);
    }

    /* ==================== بناء الفلاتر ==================== */
    private function parseFilters(Request $request)
    {
        // حالات واجهة المستخدم (mapped) -> IDs
        $uiStatusMap = [
            'completed' => [8],
            'rejected'  => [4],
            'cancelled' => [9],
            'pending'   => [1,2,3,5,6,7,10], // "تحت التنفيذ" (غير نهائي)
        ];

        $rawStatuses = $request->input('statuses', []); // من الواجهة (سلاجات)
        $statusIds = [];
        foreach ($rawStatuses as $code) {
            if (isset($uiStatusMap[$code])) {
                $statusIds = array_merge($statusIds, $uiStatusMap[$code]);
            } elseif (is_numeric($code)) {
                $statusIds[] = (int)$code;
            }
        }
        $statusIds = array_values(array_unique($statusIds));

        $startDate = $request->input('date_from');
        $endDate   = $request->input('date_to');

        $dateFrom = $startDate ? Carbon::parse($startDate)->startOfDay() : null;
        $dateTo   = $endDate   ? Carbon::parse($endDate)->endOfDay()   : null;

        return (object)[
            'statuses'        => $statusIds,
            'employees'       => $request->input('employees', []),
            'governorates'    => $request->input('governorates', []),
            'license_types'   => $request->input('license_types', []),
            'columns'         => $request->input('columns', []),
            'sorting'         => $request->input('sorting', '-created_at'),
            'date_from'       => $dateFrom,
            'date_to'         => $dateTo,
            'limit'           => (int)($request->input('limit', 500)),
            'page'            => max(1,(int)$request->input('page',1)),
        ];
    }

    private function baseQuery()
    {
        return DB::table('requests')
            ->join('license_types','requests.license_type_id','=','license_types.id')
            ->join('request_types','requests.request_type_id','=','request_types.id')
            ->join('beneficiaries','requests.beneficiary_id','=','beneficiaries.id')
            ->join('directorates','requests.directorate_id','=','directorates.id')
            ->join('governorates','directorates.governorate_id','=','governorates.id')
            ->join('request_statuses','requests.status_id','=','request_statuses.id')
            ->leftJoin('users','requests.assigned_to','=','users.id');
    }

    private function applyReportFilters($query, $filters)
    {
        if (!empty($filters->statuses)) {
            $query->whereIn('requests.status_id', $filters->statuses);
        }
        if (!empty($filters->employees)) {
            $query->whereIn('requests.assigned_to', $filters->employees);
        }
        if (!empty($filters->governorates)) {
            $query->whereIn('governorates.id', $filters->governorates);
        }
        if (!empty($filters->license_types)) {
            $query->whereIn('requests.license_type_id', $filters->license_types);
        }
        if ($filters->date_from && $filters->date_to) {
            $query->whereBetween('requests.created_at', [$filters->date_from, $filters->date_to]);
        }
        return $query;
    }

    private function sortingMap($key)
    {
        // السماح ببعض الحقول فقط
        $map = [
            'created_at'    => 'requests.created_at',
            'request_number'=> 'requests.request_number',
            'license_type'  => 'license_types.name',
            'employee'      => 'users.name',
            'region'        => 'governorates.name',
            'status'        => 'request_statuses.name',
        ];
        return $map[$key] ?? 'requests.created_at';
    }

    /* ==================== توليد التقرير ==================== */
    public function generate(Request $request)
    {
        $filters = $this->parseFilters($request);

        // الأعمدة المطلوبة
        $allSelectable = [
            'request_number'      => 'requests.request_number',
            'license_type'        => 'license_types.name as license_type',
            'request_type'        => 'request_types.name as request_type',
            'beneficiary_name'    => 'beneficiaries.name as beneficiary_name',
            'assigned_employee'   => 'users.name as assigned_employee',
            'status_name'         => 'request_statuses.name as status_name',
            'governorate'         => 'governorates.name as governorate',
            'directorate'         => 'directorates.name as directorate',
            'created_at'          => 'requests.created_at',
            'completion_date'     => DB::raw("CASE WHEN requests.status_id=8 THEN requests.updated_at ELSE NULL END as completion_date"),
            'duration_days'       => DB::raw("CASE WHEN requests.status_id=8 THEN DATEDIFF(requests.updated_at, requests.created_at) ELSE DATEDIFF(NOW(), requests.created_at) END as duration_days"),
            'expected_completion' => 'requests.expected_completion_date as expected_completion',
        ];

        $requestedCols = $filters->columns ?: ['request_number','license_type','assigned_employee','created_at','status_name'];
        $selectParts = [];
        foreach ($requestedCols as $col) {
            if (isset($allSelectable[$col])) {
                $selectParts[] = $allSelectable[$col];
            }
        }
        // ضمان وجود select على الأقل
        if (empty($selectParts)) {
            $selectParts[] = 'requests.request_number';
        }

        // للاستعمال الداخلي في الملخص نحتاج بعض الحقول الأساسية دائماً
        $internalSelect = array_merge($selectParts, [
            'requests.status_id',
            DB::raw("CASE WHEN requests.status_id=8 THEN requests.updated_at ELSE NULL END as _cdate_internal"),
            DB::raw("DATEDIFF(CASE WHEN requests.status_id=8 THEN requests.updated_at ELSE NOW() END, requests.created_at) as _duration_internal")
        ]);

        $query = $this->baseQuery()->select($internalSelect);
        $this->applyReportFilters($query,$filters);

        // ترتيب
        $sortKey = $filters->sorting;
        $direction = 'DESC';
        if (str_starts_with($sortKey,'-')) {
            $sortKey = substr($sortKey,1);
        } else {
            $direction = 'ASC';
        }
        $orderColumn = $this->sortingMap($sortKey);
        $query->orderBy($orderColumn,$direction);

        // صفحة وحد أقصى
        $limit = min(2000, max(10,$filters->limit));
        $offset = ($filters->page - 1) * $limit;

        // استنساخ لحساب العدد قبل limit
        $countQuery = clone $query;
        $totalRows = DB::table(DB::raw("({$countQuery->toSql()}) as t"))
            ->mergeBindings($countQuery)
            ->count();

        $rows = $query->offset($offset)->limit($limit)->get();

        // ملخص
        $statusGroups = [
            'completed' => 8,
            'rejected'  => 4,
            'cancelled' => 9,
        ];
        $summaryCounts = [
            'completed' => 0,
            'rejected'  => 0,
            'cancelled' => 0,
            'total'     => $totalRows,
        ];
        $durationsCompleted = [];

        foreach ($rows as $r) {
            if ($r->status_id == 8) {
                $summaryCounts['completed']++;
                if (property_exists($r,'_duration_internal')) {
                    $durationsCompleted[] = (int)$r->_duration_internal;
                }
            } elseif ($r->status_id == 4) {
                $summaryCounts['rejected']++;
            } elseif ($r->status_id == 9) {
                $summaryCounts['cancelled']++;
            }
        }
        $summaryCounts['in_progress'] = $summaryCounts['total'] - ($summaryCounts['completed'] + $summaryCounts['rejected'] + $summaryCounts['cancelled']);
        $summaryCounts['completion_rate'] = $summaryCounts['total'] ? round($summaryCounts['completed'] / $summaryCounts['total'] * 100,2) : 0;
        $summaryCounts['avg_duration_days'] = count($durationsCompleted) ? round(array_sum($durationsCompleted)/count($durationsCompleted),2) : 0;

        // مخطط (توزيع حسب الحالة)
        $chartData = DB::table('requests')
            ->join('request_statuses','requests.status_id','=','request_statuses.id')
            ->join('directorates','requests.directorate_id','=','directorates.id')
            ->join('governorates','directorates.governorate_id','=','governorates.id')
            ->when(!empty($filters->statuses), fn($q)=>$q->whereIn('requests.status_id',$filters->statuses))
            ->when(!empty($filters->employees), fn($q)=>$q->whereIn('requests.assigned_to',$filters->employees))
            ->when(!empty($filters->governorates), fn($q)=>$q->whereIn('governorates.id',$filters->governorates))
            ->when(!empty($filters->license_types), fn($q)=>$q->whereIn('requests.license_type_id',$filters->license_types))
            ->when($filters->date_from && $filters->date_to, fn($q)=>$q->whereBetween('requests.created_at',[$filters->date_from,$filters->date_to]))
            ->select('request_statuses.name as status_name', DB::raw('COUNT(requests.id) as total'))
            ->groupBy('request_statuses.id','request_statuses.name')
            ->orderBy('total','desc')
            ->get();

        $chart = [
            'labels' => $chartData->pluck('status_name'),
            'values' => $chartData->pluck('total'),
        ];

        // تنظيف الحقول الداخلية
        $cleanRows = $rows->map(function($r){
            unset($r->_cdate_internal, $r->_duration_internal);
            return $r;
        });

        return response()->json([
            'success'=>true,
            'data'=>[
                'rows'=>$cleanRows,
                'summary'=>$summaryCounts,
                'chart'=>$chart,
                'selected_columns'=>$requestedCols,
                'pagination'=>[
                    'page'=>$filters->page,
                    'limit'=>$limit,
                    'total_rows'=>$totalRows,
                    'total_pages'=>ceil($totalRows / $limit)
                ]
            ]
        ]);
    }

    /* ==================== التصدير CSV ==================== */
    public function exportCsv(Request $request)
    {
        $filters = $this->parseFilters($request);

        $cols = $filters->columns ?: ['request_number','license_type','assigned_employee','created_at','status_name'];
        $map = [
            'request_number'      => 'requests.request_number',
            'license_type'        => 'license_types.name as license_type',
            'request_type'        => 'request_types.name as request_type',
            'beneficiary_name'    => 'beneficiaries.name as beneficiary_name',
            'assigned_employee'   => 'users.name as assigned_employee',
            'status_name'         => 'request_statuses.name as status_name',
            'governorate'         => 'governorates.name as governorate',
            'directorate'         => 'directorates.name as directorate',
            'created_at'          => 'requests.created_at',
            'completion_date'     => DB::raw("CASE WHEN requests.status_id=8 THEN requests.updated_at ELSE NULL END as completion_date"),
            'duration_days'       => DB::raw("CASE WHEN requests.status_id=8 THEN DATEDIFF(requests.updated_at, requests.created_at) ELSE DATEDIFF(NOW(), requests.created_at) END as duration_days"),
            'expected_completion' => 'requests.expected_completion_date as expected_completion',
        ];
        $selectParts=[];
        $headers=[];
        foreach ($cols as $c) {
            if (isset($map[$c])) {
                $selectParts[] = $map[$c];
                // تسمية عربية
                $headers[] = match($c){
                    'request_number' => 'رقم الطلب',
                    'license_type' => 'نوع الترخيص',
                    'request_type' => 'نوع الطلب',
                    'beneficiary_name'=>'المستفيد',
                    'assigned_employee'=>'الموظف',
                    'status_name'=>'الحالة',
                    'governorate'=>'المحافظة',
                    'directorate'=>'المديرية',
                    'created_at'=>'تاريخ الإنشاء',
                    'completion_date'=>'تاريخ الإنجاز',
                    'duration_days'=>'المدة (أيام)',
                    'expected_completion'=>'الموعد المتوقع',
                    default => $c
                };
            }
        }
        if (empty($selectParts)) {
            $selectParts[]='requests.request_number';
            $headers[]='رقم الطلب';
        }

        $query = $this->baseQuery()->select($selectParts);
        $this->applyReportFilters($query,$filters);
        $sortKey=$filters->sorting;
        $direction='DESC';
        if (str_starts_with($sortKey,'-')) {
            $sortKey = substr($sortKey,1);
        } else {
            $direction='ASC';
        }
        $query->orderBy($this->sortingMap($sortKey), $direction);

        $filename='custom_report_'.Carbon::now()->format('Ymd_His').'.csv';
        $response = new StreamedResponse(function() use ($query,$headers,$cols) {
            echo "\xEF\xBB\xBF";
            $handle=fopen('php://output','w');
            fputcsv($handle,$headers);

            $query->chunk(1000,function($rows) use ($handle,$cols){
                foreach ($rows as $row) {
                    $line=[];
                    foreach ($cols as $c){
                        $val = $row->{$c} ?? '';
                        $line[] = $val;
                    }
                    fputcsv($handle,$line);
                }
            });
            fclose($handle);
        });
        $response->headers->set('Content-Type','text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition','attachment; filename="'.$filename.'"');
        return $response;
    }

    /* ==================== التصدير Excel/PDF (Placeholders) ==================== */
    public function exportExcel(Request $request)
    {
        return response()->json([
            'success'=>false,
            'message'=>'لم يتم تفعيل التصدير Excel بعد (يمكن استخدام Laravel-Excel لاحقاً).'
        ],501);
    }

    public function exportPdf(Request $request)
    {
        return response()->json([
            'success'=>false,
            'message'=>'لم يتم تفعيل التصدير PDF بعد (يمكن استخدام barryvdh/laravel-dompdf لاحقاً).'
        ],501);
    }

    /* ==================== حفظ القوالب (اختياري) ==================== */
    public function saveTemplate(Request $request)
    {
        // مستقبلاً: حفظ في جدول report_templates (تنشئه Migration)
        return response()->json(['success'=>true,'message'=>'(Placeholder) تم الحفظ شكلياً.']);
    }

    public function listTemplates()
    {
        return response()->json(['success'=>true,'data'=>[]]);
    }
}