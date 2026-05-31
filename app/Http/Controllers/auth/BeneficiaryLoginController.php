<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BeneficiaryLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.beneficiary-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'identity_number' => 'required|string',
            'password' => 'required|string',
        ]);

        // البحث في جدول المستفيدين
        $beneficiary = DB::table('beneficiaries')
            ->where('identity_number', $credentials['identity_number'])
            ->first();

        if ($beneficiary && Hash::check($credentials['password'], $beneficiary->password)) {
            // تسجيل الدخول باستخدام Guard خاص بالمستفيدين
            Auth::guard('beneficiary')->loginUsingId($beneficiary->id, $request->has('remember'));

            // return redirect()->intended('/beneficiary/dashboard');
            return redirect('/');
        }

        return back()->withErrors([
            'identity_number' => 'بيانات الدخول غير صحيحة.',
        ])->onlyInput('identity_number');
    }

    public function logout(Request $request)
    {
        Auth::guard('beneficiary')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
