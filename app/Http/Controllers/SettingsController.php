<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function getPrivacySettings()
    {
        $beneficiaryId = auth('beneficiary')->id();

        $settings = DB::table('beneficiary_privacy_settings')
                      ->where('beneficiary_id', $beneficiaryId)
                      ->first();

        return response()->json([
            'success' => true,
            'settings' => $settings ?? [
                'share_profile'  => 1,
                'share_contact'  => 0,
                'show_requests'  => 1,
                'share_location' => 0,
                'allow_2fa'      => 0,
            ]
        ]);
    }

    public function togglePrivacy(Request $request)
    {
        $key   = $request->key;
        $value = $request->value ? 1 : 0;
        $beneficiaryId = auth('beneficiary')->id();

        DB::table('beneficiary_privacy_settings')
          ->updateOrInsert(
              ['beneficiary_id' => $beneficiaryId],
              [$key => $value]
          );

        return response()->json(['success' => true]);
    }


    // تبويبة الاشعارات في الاعدادات
    public function getNotificationSettings()
    {
        $beneficiaryId = auth('beneficiary')->id();

        $settings = DB::table('beneficiary_privacy_settings')
                      ->where('beneficiary_id', $beneficiaryId)
                      ->first([
                          'email_general','email_requests','email_support',
                          'sms_general','sms_urgent'
                      ]);

        return response()->json([
            'success'  => true,
            'settings' => $settings ?? [
                'email_general'  => 1,
                'email_requests' => 1,
                'email_support'  => 0,
                'sms_general'    => 1,
                'sms_urgent'     => 1
            ]
        ]);
    }

    public function toggleNotification(Request $request)
    {
        $key   = $request->key;
        $value = $request->value ? 1 : 0;
        $beneficiaryId = auth('beneficiary')->id();

        DB::table('beneficiary_privacy_settings')
          ->updateOrInsert(
              ['beneficiary_id' => $beneficiaryId],
              [$key => $value]
          );

        return response()->json(['success' => true]);
    }


    // تبويبة اعدادات الحساب في الاعدادات
    // public function changePassword(Request $request)
    // {
    //     $request->validate([
    //         'current_password' => 'required|string',
    //         'new_password'     => 'required|string|min:8|confirmed',
    //     ]);

    //     $beneficiaryId = $request->beneficiary_id ?? 2;
    //     $current       = $request->current_password;
    //     $new           = $request->new_password;

    //     // التحقق من كلمة المرور الحالية (نستخدم Hash لاحقاً)
    //     $row = DB::table('beneficiaries')->where('id', $beneficiaryId)->first();
    //     if (!$row || $row->password !== md5($current)) {   // يُستبدل بـ Hash::check لاحقاً
    //         return response()->json(['success' => false, 'message' => 'كلمة المرور الحالية غير صحيحة']);
    //     }

    //     DB::table('beneficiaries')
    //       ->where('id', $beneficiaryId)
    //       ->update([
    //           'password'           => md5($new), // يُستبدل بـ Hash::make لاحقاً
    //           'password_changed_at'=> now()
    //       ]);

    //     return response()->json(['success' => true, 'message' => 'تم تغيير كلمة المرور بنجاح']);
    // }

    // public function updateProfile(Request $request)
    // {
    //     $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'email'     => 'required|email|max:255',
    //         'phone'     => 'required|string|max:20',
    //     ]);

    //     $beneficiaryId = $request->beneficiary_id ?? 2;

    //     DB::table('beneficiaries')
    //       ->where('id', $beneficiaryId)
    //       ->update([
    //           'name'  => $request->full_name,
    //           'email' => $request->email,
    //           'mobile'=> $request->phone,
    //           'updated_at' => now()
    //       ]);

    //     return response()->json(['success' => true, 'message' => 'تم تحديث المعلومات بنجاح']);
    // }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password'     => 'required|string|min:8|confirmed',
        ]);

        $beneficiaryId = auth('beneficiary')->id();
        $current       = $request->current_password;
        $new           = bcrypt($request->new_password);

        $row = DB::table('beneficiaries')->where('id', $beneficiaryId)->first();
        if (!$row || !password_verify($current, $row->password)) {
            return response()->json(['success' => false, 'message' => 'كلمة المرور الحالية غير صحيحة']);
        }

        DB::table('beneficiaries')
          ->where('id', $beneficiaryId)
          ->update(['password' => $new, 'password_changed_at' => now()]);

        return response()->json(['success' => true, 'message' => 'تم تغيير كلمة المرور بنجاح']);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|string|max:20',
        ]);

        $beneficiaryId = auth('beneficiary')->id();

        DB::table('beneficiaries')
          ->where('id', $beneficiaryId)
          ->update([
              'name'  => $request->full_name,
              'email' => $request->email,
              'mobile'=> $request->phone,
              'updated_at' => now()
          ]);

        return response()->json(['success' => true, 'message' => 'تم تحديث المعلومات بنجاح']);
    }

    public function getAccountInfo()
    {
        $beneficiaryId = auth('beneficiary')->id();

        $info = DB::table('beneficiaries')
                  ->where('id', $beneficiaryId)
                  ->select('name', 'email', 'mobile')
                  ->first();
        return response()->json(['success' => true, 'data' => $info]);
    }

    // تبويبة التفضيلات
    public function getPreferences()
    {
        $beneficiaryId = auth('beneficiary')->id();

        $prefs = DB::table('beneficiary_settings')
                   ->where('beneficiary_id', $beneficiaryId)
                   ->first();

        return response()->json([
            'success' => true,
            'preferences' => $prefs ?? [
                'language'    => 'العربية',
                'timezone'    => 'Asia/Riyadh',
                'date_format' => 'DD/MM/YYYY',
                'time_format' => '24 ساعة',
                'theme'       => 'فاتحة',
                'font_size'   => 'medium',
                'dark_mode'   => 0
            ]
        ]);
    }

    public function togglePreference(Request $request)
    {
        $key   = $request->key;
        $value = $request->value;
        $beneficiaryId = auth('beneficiary')->id();

        // نصوص الـ select
        if (is_string($value) && !is_numeric($value)) {
            DB::table('beneficiary_settings')
              ->updateOrInsert(
                  ['beneficiary_id' => $beneficiaryId],
                  [$key => $value]
              );
        } else {
            // أرقام أو boolean
            DB::table('beneficiary_settings')
              ->updateOrInsert(
                  ['beneficiary_id' => $beneficiaryId],
                  [$key => (int)$value]
              );
        }

        return response()->json(['success' => true]);


    }

}
