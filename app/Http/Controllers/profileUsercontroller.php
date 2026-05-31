<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Events\BeneficiaryAction;


class ProfileUserController extends Controller
{
    // جلب البيانات
    public function getUserData($id = null)
    {
        try {
            $bid = $id ?? auth('beneficiary')->id();
            if (!$bid) {
                return response()->json(['success' => false, 'message' => 'غير مسجل'], 401);
            }

            $user = DB::table('beneficiaries')
                ->select(
                    'beneficiaries.*',
                    'directorates.name as directorate_name',
                    'governorates.name as governorate_name'
                )
                ->leftJoin('directorates', 'directorates.id', '=', 'beneficiaries.directorate_id')
                ->leftJoin('governorates', 'governorates.id', '=', 'directorates.governorate_id')
                ->where('beneficiaries.id', $bid)
                ->first();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'لا توجد بيانات'], 404);
            }

            // تقسيم الاسم
            $parts = explode(' ', trim($user->name));
            $user->first_name        = $parts[0] ?? '';
            $user->father_name       = $parts[1] ?? '';
            $user->grandfather_name  = $parts[2] ?? '';
            $user->family_name       = $parts[3] ?? '';

            // إحصائيات
            $stats = [
                'active_requests' => DB::table('requests')->where('beneficiary_id', $bid)->where('status_id', 1)->count(),
                'valid_licenses'  => DB::table('licenses')
                                      ->join('requests', 'requests.id', '=', 'licenses.request_id')
                                      ->where('requests.beneficiary_id', $bid)
                                      ->where('licenses.expiry_date', '>', now())
                                      ->where('licenses.is_active', 1)
                                      ->count(),
                'violations'      => DB::table('requests')->where('beneficiary_id', $bid)->where('status_id', 4)->count(),
                'total_requests'  => DB::table('requests')->where('beneficiary_id', $bid)->count(),
            ];

            return response()->json([
                'success'   => true,
                'user_data' => $user,
                'stats'     => $stats
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطأ داخلي',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // تحديث البيانات
    public function update(Request $request)
    {
        $beneficiary = auth('beneficiary')->user();
        if (!$beneficiary) {
            return response()->json(['success' => false, 'message' => 'غير مسجل'], 401);
        }

        // التحقق من البيانات
        $data = $request->validate([
            'email'       => 'required|email|unique:beneficiaries,email,'.$beneficiary->id,
            'mobile'      => 'required|string|max:20|unique:beneficiaries,mobile,'.$beneficiary->id,
            'city'        => 'required|string|max:100',
            'district'    => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
        ]);

        // التحديث الفعلي في جدول beneficiaries
        $updated = DB::table('beneficiaries')
            ->where('id', $beneficiary->id)
            ->update([
                'email'      => $data['email'],
                'mobile'     => $data['mobile'],
                'address'    => $data['city'].' - '.$data['district'].' - '.$data['postal_code'],
                'updated_at' => now()
            ]);

        if ($updated) {

            $listener = new \App\Listeners\WriteActivityLog;
            $listener->handle(new \App\Events\BeneficiaryAction(
                auth('beneficiary')->id(),
                'update',
                'تحديث الملف الشخصي',
                request()->ip(),
                substr(request()->userAgent() ?? '', 0, 190)
            ));

            return response()->json([
                'success' => true,
                'message' => 'تم حفظ التغييرات بنجاح'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم تحديث أي بيانات'
            ], 422);
        }


    }




    // تبويبات الحسابات المتصلة
    /* داخل ProfileUserController */

public function getConnectedAccounts($id=null)
{
    $bid = $id ?? auth('beneficiary')->id();
    if(!$bid) return response()->json(['success'=>false,'message'=>'غير مسجل'],401);

    // الحسابات المربوطة فعلياً
    $linked = DB::table('beneficiary_connected_accounts')
                 ->where('beneficiary_id',$bid)
                 ->pluck('provider')->toArray();

    // نعيد الثلاث مزودين مع حالتهم
    $providers = [];
    foreach(['facebook','twitter','google'] as $p){
        $row = DB::table('beneficiary_connected_accounts')
                  ->where(['beneficiary_id'=>$bid,'provider'=>$p])
                  ->first();
        $providers[] = [
            'name'   => $p,
            'linked' => in_array($p,$linked),
            'avatar' => $row->avatar ?? null
        ];
    }
    return response()->json(['success'=>true,'accounts'=>$providers]);
}

public function unlinkAccount(\Illuminate\Http\Request $request)
{
    $request->validate(['provider'=>'required|in:facebook,twitter,google']);
    $bid = auth('beneficiary')->id();

    DB::table('beneficiary_connected_accounts')
       ->where(['beneficiary_id'=>$bid,'provider'=>$request->provider])
       ->delete();

    return response()->json(['success'=>true,'message'=>'تم فك الربط بنجاح']);
}




// خاص بتبويبة الاجداث
/* سجل النشاط */
public function getActivityLogs($id=null)
{
    $bid = $id ?? auth('beneficiary')->id();
    if(!$bid) return response()->json(['success'=>false,'message'=>'غير مسجل'],401);

    $logs = DB::table('activity_logs')
              ->where('beneficiary_id',$bid)
              ->orderBy('created_at','desc')
              ->limit(20)                          // أحدث 20
              ->get()
              ->map(function($row){
                  return [
                      'title' => $row->activity_type,
                       'date' => $row->created_at,
                       'desc' => $row->description,
                       'ip'   => $row->ip_address,
                       'loc'  => $row->location
                  ];
              });

    return response()->json(['success'=>true,'logs'=>$logs]);
}
}
