<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class allRquestPlatform extends Controller
{

    public function store(Request $request)
{
    if ($request->isMethod('post')) {

        // استخدام معرف المستفيد من الفورم أو المتغير العام داخل الكلاس
        $beneficiaryId = auth('beneficiary')->id(); // أو أي طريقة أخرى للحصول على معرف المستفيد

        if (!$beneficiaryId) {
            return response()->json([
                'success' => false,
                'message' => 'المستفيد غير محدد'
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }

        DB::beginTransaction();
        try {
            // توليد رقم طلب فريد
            $requestNumber = 'RQ' . time() . rand(100, 999);

            // إدخال البيانات في جدول requests
            $requestId = DB::table('requests')->insertGetId([
                'request_number' => $requestNumber,
                'beneficiary_id' => $beneficiaryId,
                'request_type_id' => $request->request_type_id,
                'license_type_id' => $request->license_type_id,
                'department_id' => $request->department_id ?? 1,
                'directorate_id' => $request->directorate_id,
                'status_id' => $request->status_id ?? 1,         // الحالة الافتراضية "جديد"
                'current_stage_id' => $request->current_stage_id ?? 1, // المرحلة الأولى
                'is_active' => 1,
                'assigned_to' => $request->assigned_to ?? 11,
                'expected_completion_date' => $request->expected_completion_date ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $requestId,
                'stage_id'     => $request->current_stage_id ?? 1,
                'status_id'    => $request->status_id ?? 1,
                'assigned_to'  => $request->assigned_to ?? 11,
                'comments'     => 'تم تقديم الطلب ',
                'duration_days'=> 2,
                'started_at'   => now(),
                'is_active'    => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            DB::commit();

            // إرجاع الاستجابة
            return response()->json([
                'success' => true,
                'request_id' => $requestId,
                'request_number' => $requestNumber
            ], 200, [], JSON_UNESCAPED_UNICODE);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'خطأ أثناء إنشاء الطلب: ' . $e->getMessage()
            ], 500, [], JSON_UNESCAPED_UNICODE);
        }
    }

    return response()->json([
        'success' => false,
        'message' => 'طريقة الطلب غير صحيحة'
    ], 405, [], JSON_UNESCAPED_UNICODE);
}

public function requests_submit($id)
{
    return response()->json(['data' => 1], 200, [], JSON_UNESCAPED_UNICODE);
}

}
