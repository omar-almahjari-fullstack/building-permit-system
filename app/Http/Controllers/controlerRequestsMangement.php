<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class controlerRequestsMangement extends Controller
{
      public function reloadRequests(Request $request)
    {
    try {
        $status = $request->status; // مثل "قيد المراجعة"

        $requests = DB::table('requests')
            ->join('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
            ->join('license_types', 'requests.license_type_id', '=', 'license_types.id')
            ->join('request_types', 'requests.request_type_id', '=', 'request_types.id') // الربط مع نوع الطلب
            ->join('request_statuses', 'requests.status_id', '=', 'request_statuses.id')
            ->select(
                'requests.id',
                'requests.request_number',
                'requests.created_at',
                'beneficiaries.name as beneficiary_name',
                'license_types.name as license_type_name',
                'request_types.name as request_type_name', // العمود الجديد
                'request_statuses.name as status_name'
            )
            ->when($status, function ($q, $status) {
                $q->where('request_statuses.name', $status);
            })
            ->orderBy('requests.created_at', 'desc')
            ->get();

        return view('modules.auth.requests.track.requests_mangement_table', ['datac' => $requests]);

    } catch (\Exception $e) {
        // إرجاع JSON عند حدوث خطأ
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ أثناء تحميل الطلبات',
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
    }

     public function searchRequests(Request $request)
    {
       try {

      $requestNumber = $request->request_number; // رقم الطلب من input البحث

      $requests = collect(); // افتراضي يرجع مجموعة فاضية

if (!empty($requestNumber)) {

       $requests = DB::table('requests')
        ->join('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
        ->join('license_types', 'requests.license_type_id', '=', 'license_types.id')
        ->join('request_types', 'requests.request_type_id', '=', 'request_types.id')
        ->join('request_statuses', 'requests.status_id', '=', 'request_statuses.id')
        ->select(
            'requests.id',
            'requests.request_number',
            'requests.created_at',
            'beneficiaries.name as beneficiary_name',
            'license_types.name as license_type_name',
            'request_types.name as request_type_name',
            'request_statuses.name as status_name'
        )
        ->when($requestNumber, function ($q, $requestNumber) {
            $q->where('requests.request_number', 'like', "{$requestNumber}%");
        })
        ->orderBy('requests.created_at', 'desc')
        ->get();

    }

        return view('modules.auth.requests.track.requests_mangement_table', ['datac' => $requests]);

       } catch (\Exception $e) {
        // إرجاع JSON عند حدوث خطأ
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ أثناء تحميل الطلبات',
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
      }
    }

     public function searchRequestsname(Request $request)
    {
       try {

      $requestNumber = $request->request_number; // رقم الطلب من input البحث

       $requests = collect(); // افتراضي يرجع مجموعة فاضية

if (!empty($requestNumber)) {

       $requests = DB::table('requests')
        ->join('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
        ->join('license_types', 'requests.license_type_id', '=', 'license_types.id')
        ->join('request_types', 'requests.request_type_id', '=', 'request_types.id')
        ->join('request_statuses', 'requests.status_id', '=', 'request_statuses.id')
        ->select(
            'requests.id',
            'requests.request_number',
            'requests.created_at',
            'beneficiaries.name as beneficiary_name',
            'license_types.name as license_type_name',
            'request_types.name as request_type_name',
            'request_statuses.name as status_name'
        )
        ->when($requestNumber, function ($q, $requestNumber) {
            $q->where('beneficiaries.name', 'like', "%{$requestNumber}%");
        })
        ->orderBy('requests.created_at', 'desc')
        ->get();

    }

        return view('modules.auth.requests.track.requests_mangement_table', ['datac' => $requests]);

       } catch (\Exception $e) {
        // إرجاع JSON عند حدوث خطأ
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ أثناء تحميل الطلبات',
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
      }
    }

public function getStageCounts(){

        $data = DB::table('requests')
    ->join('request_statuses', 'requests.status_id', '=', 'request_statuses.id')
    ->selectRaw("
        COALESCE(SUM(CASE WHEN request_statuses.name = 'طلبات جديدة'       THEN 1 ELSE 0 END),0) AS total_new,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'قيد المراجعة'      THEN 1 ELSE 0 END),0) AS total_under_review,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'المراجعة الفنية'    THEN 1 ELSE 0 END),0) AS total_tech_review,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'مسندة للمهندس'     THEN 1 ELSE 0 END),0) AS total_assigned_engineer,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'طلبات معادة'       THEN 1 ELSE 0 END),0) AS total_returned,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'جاهز للدفع'        THEN 1 ELSE 0 END),0) AS total_ready_to_pay,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'موافق عليه'        THEN 1 ELSE 0 END),0) AS total_approved,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'مكتمل'             THEN 1 ELSE 0 END),0) AS total_completed,
        COALESCE(SUM(CASE WHEN request_statuses.name = 'مرفوض'             THEN 1 ELSE 0 END),0) AS total_rejected,
        COUNT(*) AS total_all
    ")
    ->first();

    return response()->json($data);
}


}
