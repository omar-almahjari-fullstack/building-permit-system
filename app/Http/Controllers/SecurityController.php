<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\BeneficiaryAction;

class SecurityController extends Controller
{
    /* جلب البيانات + الأجهزة */
    public function index()
    {
        $bid = auth('beneficiary')->id();
        if (!$bid) return response()->json(['success' => false, 'message' => 'غير مسجل'], 401);

        // إنشاء السجل إن لم يوجد
        $settings = DB::table('beneficiary_security_settings')->where('beneficiary_id', $bid)->first();
        if (!$settings) {
            DB::table('beneficiary_security_settings')->insert([
                'beneficiary_id' => $bid,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
            $settings = DB::table('beneficiary_security_settings')->where('beneficiary_id', $bid)->first();
        }

        // أحدث 5 أجهزة (نحسبها من الجلسات)
        $devices = DB::table('beneficiary_sessions')
                     ->where('beneficiary_id', $bid)
                     ->where('is_active', 1)
                     ->orderBy('last_activity', 'desc')
                     ->limit(5)
                     ->get()
                     ->map(fn($d) => [
                         'session_id' => $d->id,
                         'device'     => $d->device_info,
                         'ip'         => $d->ip_address,
                         'time'       => $d->last_activity,
                     ]);

        return response()->json([
            'success'  => true,
            'settings' => $settings,
            'devices'  => $devices,
        ]);
    }

    /* تبديل أي إعداد (switch) */
    public function toggleSetting(Request $request)
    {
        $request->validate([
            'field' => 'required|in:two_factor,login_verify,profile_visible,email_notify,security_scan',
            'value' => 'required|boolean', // 0 أو 1
        ]);

        $bid = auth('beneficiary')->id();
        if (!$bid) return response()->json(['success' => false, 'message' => 'غير مسجل'], 401);

        // التحديث
        DB::table('beneficiary_security_settings')
          ->where('beneficiary_id', $bid)
          ->update([$request->field => $request->value, 'updated_at' => now()]);

        // تسجيل نشاط (مثلما فعلنا في سجل النشاط)
        $listener = new \App\Listeners\WriteActivityLog;
        $listener->handle(new \App\Events\BeneficiaryAction(
            $bid,
            'security',
            'تغيير إعداد الأمان: ' . $request->field . ' = ' . $request->value,
            request()->ip(),
            substr(request()->userAgent() ?? '', 0, 190)
        ));

        return response()->json(['success' => true, 'message' => 'تم الحفظ']);
    }

    /* تسجيل خروج من جهاز معين */
    public function logoutDevice(Request $request)
    {
        $request->validate(['session_id' => 'required|integer']);
        $bid = auth('beneficiary')->id();

        DB::table('beneficiary_sessions')
          ->where('beneficiary_id', $bid)
          ->where('id', $request->session_id)
          ->update(['is_active' => 0]);

        // نشاط
        $listener = new \App\Listeners\WriteActivityLog;
        $listener->handle(new \App\Events\BeneficiaryAction(
            $bid,
            'logout',
            'تسجيل خروج من جهاز',
            request()->ip(),
            substr(request()->userAgent() ?? '', 0, 190)
        ));

        return response()->json(['success' => true, 'message' => 'تم تسجيل الخروج']);
    }

    /* تسجيل خروج من جميع الأجهزة */
    public function logoutAllDevices()
    {
        $bid = auth('beneficiary')->id();

        // نعطل كل الجلسات ما عدا الحالية (اختياري)
        DB::table('beneficiary_sessions')
          ->where('beneficiary_id', $bid)
          ->update(['is_active' => 0]);

        // نشاط
        $listener = new \App\Listeners\WriteActivityLog;
        $listener->handle(new \App\Events\BeneficiaryAction(
            $bid,
            'logout',
            'تسجيل خروج من جميع الأجهزة',
            request()->ip(),
            substr(request()->userAgent() ?? '', 0, 190)
        ));

        return response()->json(['success' => true, 'message' => 'تم تسجيل الخروج من جميع الأجهزة']);
    }
}
