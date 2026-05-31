<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{
    public function getProfile($userId = 1)   // افتراضي: أول موظف
    {
        $user = DB::table('users')
                  ->join('departments', 'users.department_id', '=', 'departments.id')
                  ->select('users.*', 'departments.name as department_name')
                  ->where('users.id', $userId)
                  ->first();

        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20'
        ]);

        $id = $request->user_id ?? 1;

        DB::table('users')
          ->where('id', $id)
          ->update([
              'name'  => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'updated_at' => now()
          ]);

        return response()->json(['success' => true, 'message' => 'تم التحديث بنجاح']);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password'     => 'required|string|min:8|confirmed'
        ]);

        $id = $request->user_id ?? 1;
        $user = DB::table('users')->where('id', $id)->first();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'كلمة المرور الحالية غير صحيحة']);
        }

        DB::table('users')
          ->where('id', $id)
          ->update([
              'password' => Hash::make($request->new_password),
              'last_password_change' => now()
          ]);

        return response()->json(['success' => true, 'message' => 'تم تغيير كلمة المرور']);
    }

    // تبويبة الامان
    public function getSecurity($userId = 1)
{
    $user = DB::table('users')
              ->select('id', 'name', 'two_factor_enabled_at')
              ->where('id', $userId)
              ->first();

    $sessions = DB::table('user_sessions')
                  ->where('user_id', $userId)
                  ->where('is_active', 1)
                  ->orderBy('last_activity', 'desc')
                  ->get();

    return response()->json([
        'success' => true,
        'user' => $user,
        'sessions' => $sessions
    ]);
}

public function enable2FA(Request $request)
{
    $userId = $request->user_id ?? 1;
    $secret = \Illuminate\Support\Str::random(32);

    DB::table('users')
      ->where('id', $userId)
      ->update([
          'two_factor_secret' => $secret,
          'two_factor_enabled_at' => now()
      ]);

    return response()->json(['success' => true, 'message' => 'تم تفعيل المصادقة الثنائية']);
}

public function disable2FA(Request $request)
{
    $userId = $request->user_id ?? 1;

    DB::table('users')
      ->where('id', $userId)
      ->update([
          'two_factor_secret' => null,
          'two_factor_enabled_at' => null
      ]);

    return response()->json(['success' => true, 'message' => 'تم تعطيل المصادقة الثنائية']);
}

public function logoutOtherDevices(Request $request)
{
    $userId = $request->user_id ?? 1;
    $currentSessionId = session()->getId(); // Laravel session ID

    DB::table('user_sessions')
      ->where('user_id', $userId)
      ->where('id', '!=', $currentSessionId)
      ->update(['is_active' => 0]);

    return response()->json(['success' => true, 'message' => 'تم تسجيل الخروج من الأجهزة الأخرى']);
}
}