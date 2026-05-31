<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * عرض نموذج تسجيل الدخول
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * معالجة محاولة تسجيل الدخول
     */
    public function login(Request $request)
    {
        // التحقق من صحة البيانات
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // البحث عن المستخدم باستخدام Query Builder
        $user = DB::table('users')
            ->where('username', $credentials['username'])
            ->first();

        // التحقق من وجود المستخدم وكلمة المرور
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // تسجيل دخول المستخدم يدوياً
            Auth::loginUsingId($user->id, $request->has('remember'));

                // نحط فلاج في جلسة السيرفر
             session(['clear_local_storage' => true]);

            // إعادة التوجيه إلى الصفحة الرئيسية
            return redirect()->intended('/dashboard');
        }

        // إذا فشل تسجيل الدخول
        return back()->withErrors([
            'username' => 'بيانات الاعتماد هذه لا تتطابق مع سجلاتنا.',
        ])->onlyInput('username');
    }


    /**
     * تسجيل الخروج
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
