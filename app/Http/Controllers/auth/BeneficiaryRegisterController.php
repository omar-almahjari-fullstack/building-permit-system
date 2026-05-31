<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeneficiaryRegisterController extends Controller
{
    public function showRegisterForm()
    {
        // جلب المديريات النشطة لعرضها في القائمة
        $directorates = DB::table('directorates')
            ->where('is_active', 1)
            ->orderBy('name')
            ->get(['id','name']);

        return view('auth.beneficiary-register', compact('directorates'));
    }

    public function register(Request $request)
    {
        // التحقق من البيانات
        $validator = Validator::make($request->all(), [
            'identity_number' => ['required','string','max:20','unique:beneficiaries,identity_number'],
            'identity_type'   => ['required', Rule::in(['بطاقة شخصية','جواز'])],
            'name'            => ['required','string','max:100'],
            'mobile'          => ['required','string','max:15'],
            'email'           => ['nullable','email','max:100','unique:beneficiaries,email'],
            'directorate_id'  => ['required','integer','exists:directorates,id'],
            'address'         => ['nullable','string','max:500'],
            'password'        => ['required','confirmed','min:8'], // password + password_confirmation
            'agreement'       => ['accepted'],
        ],[
            'identity_number.required' => 'رقم الهوية مطلوب',
            'identity_number.unique'   => 'رقم الهوية مسجل مسبقاً',
            'identity_type.required'   => 'نوع الهوية مطلوب',
            'name.required'            => 'الاسم مطلوب',
            'mobile.required'          => 'رقم الجوال مطلوب',
            'email.email'              => 'بريد إلكتروني غير صالح',
            'email.unique'             => 'البريد الإلكتروني مستخدم مسبقاً',
            'directorate_id.required'  => 'المديرية مطلوبة',
            'directorate_id.exists'    => 'مديرية غير صحيحة',
            'password.required'        => 'كلمة المرور مطلوبة',
            'password.confirmed'       => 'تأكيد كلمة المرور غير متطابق',
            'password.min'             => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'agreement.accepted'       => 'يجب الموافقة على الشروط والأحكام',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // تجهيز البيانات للإدخال
        $now = Carbon::now();
        $rememberToken = Str::random(40);

        DB::beginTransaction();
        try {
            // إدخال المستفيد
            $beneficiaryId = DB::table('beneficiaries')->insertGetId([
                'identity_number'   => $request->identity_number,
                'name'              => $request->name,
                'mobile'            => $request->mobile,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'identity_type'     => $request->identity_type,
                'directorate_id'    => $request->directorate_id,
                'address'           => $request->address,
                'is_active'         => 1,
                'created_at'        => $now,
                'updated_at'        => $now,
                'password_changed_at' => $now,
                'remember_token'    => $rememberToken,
            ]);

            // إعداد افتراضي: إعدادات الخصوصية
            DB::table('beneficiary_privacy_settings')->insert([
                'beneficiary_id' => $beneficiaryId,
                'share_profile'  => 1,
                'share_contact'  => 0,
                'show_requests'  => 1,
                'share_location' => 0,
                'allow_2fa'      => 0,
                'email_general'  => 1,
                'email_requests' => 1,
                'email_support'  => 0,
                'sms_general'    => 1,
                'sms_urgent'     => 1,
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);

            // إعدادات واجهة
            DB::table('beneficiary_settings')->insert([
                'beneficiary_id' => $beneficiaryId,
                'language'       => 'العربية',
                'timezone'       => 'Asia/Riyadh',
                'date_format'    => 'DD/MM/YYYY',
                'time_format'    => '24 ساعة',
                'theme'          => 'فاتحة',
                'font_size'      => 'medium',
                'dark_mode'      => 0,
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);

            DB::commit();

            return redirect()
                ->route('beneficiary.login')
                ->with('status', 'تم إنشاء الحساب بنجاح، يمكنك الآن تسجيل الدخول.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()
                ->withErrors(['general' => 'حدث خطأ غير متوقع: ' . $e->getMessage()])
                ->withInput();
        }
    }
}