<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\TwilioService;
use Illuminate\Support\Facades\Auth;


class Users1Controller extends Controller
{
    // Users1Controller.php
    public function getUsers()
    {
        $data = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.name as department_name')
            ->orderBy('users.id', 'asc') // ترتيب تصاعدي حسب ID
            ->get();

        return view('modules.auth.Departments.users1_table', compact('data'));
    }

    public function store(Request $request)
    {
        // ✅ تحقق من المدخلات
        $validator = Validator::make($request->all(), [
            'username'      => 'required|string|unique:users,username',
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|unique:users,email',
            // أرقام فقط وبحد أقصى 20 خانة
            'phone'         => 'nullable|regex:/^\d+$/|max:9',
            'department_id' => 'required|integer|exists:departments,id',
            'is_active'     => 'required|in:0,1',
        ], [
            'username.required'      => 'الرجاء إدخال اسم المستخدم.',
            'username.unique'        => 'اسم المستخدم هذا مستخدم من قبل.',
            'name.required'          => 'الرجاء إدخال الاسم الكامل.',
            'name.max'               => 'الاسم طويل جدًا، يرجى إدخال 100 حرف أو أقل.',
            'email.email'            => 'الرجاء إدخال بريد إلكتروني صالح.',
            'email.unique'           => 'البريد الإلكتروني مستخدم من قبل.',
            'phone.regex'            => 'رقم الهاتف يجب أن يحتوي على أرقام فقط.',
            'phone.max'              => 'رقم الهاتف يجب ألا يزيد عن 20 خانة.',
            'department_id.required' => 'الرجاء اختيار القسم.',
            'department_id.exists'   => 'القسم المختار غير موجود.',
            'is_active.required'     => 'الرجاء اختيار الحالة.',
            'is_active.in'           => 'قيمة الحالة غير صحيحة.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $password = 'password123'; // كلمة المرور الافتراضية

        // ✅ إضافة المستخدم
        DB::table('users')->insert([
            'username'      => $request->username,
            'password'      => Hash::make($password),
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
            'is_active'     => (int) $request->input('is_active', 1),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

                //  app(\App\Services\TwilioService::class)->sendWhatsApp(
                //     "967".$request->phone, // رقم المستفيد
                //     " ترحب بكم وزاره الاشغال العام \n.
                //     تم اظافة موظف  باسم: {$request->name}\n.
                //      username: {$request->username}.
                //      password الافتراضية: " . $password
                // );

             app(\App\Services\TwilioService::class)->sendWhatsApp(
                "967".$request->phone, // رقم المستفيد
                "📢 *وزارة الأشغال العامة* ترحب بكم 🙏\n\n".
                "✅ تم إضافة موظف جديد بنجاح.\n\n".
                "👤 الاسم: {$request->name}\n".
                "🔑 اسم المستخدم: {$request->username}\n".
                "🛡️ كلمة المرور الافتراضية: {$password}\n\n".
                "يرجى تسجيل الدخول وتغيير كلمة المرور للحفاظ على أمان حسابك. 🚀"
            );

            // app(\App\Services\TwilioService::class)->sendSMS(
            //     "+967" . $request->phone,
            //     "وزارة الأشغال ترحب بكم!\n"
            //     ."موظف جديد: {$request->name}\n"
            //     ."User: {$request->username}\n"
            //     ."Pass: {$password}"
            // );


        //             app(\App\Services\TwilioService::class)->sendSMS(
        //     "+967".$request->phone, // رقم المستفيد مع بادئة +967
        //     "📢 *وزارة الأشغال العامة* ترحب بكم 🙏\n".
        //     "✅ تم إضافة موظف جديد بنجاح.\n".
        //     "👤 الاسم: {$request->name}\n".
        //     "🔑 اسم المستخدم: {$request->username}\n".
        //     "🛡️ كلمة المرور الافتراضية: {$password}\n".
        //     "يرجى تسجيل الدخول وتغيير كلمة المرور للحفاظ على أمان حسابك. 🚀"
        // );


        return response()->json(['success' => true, 'message' => 'تم إضافة المستخدم بنجاح']);
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'المستخدم غير موجود'], 404);
        }

        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'          => 'required|string|unique:users,username,' . $id,
            'name'              => 'required|string|max:100',
            'email'             => 'required|email|unique:users,email,' . $id,
            // أرقام فقط وبحد أقصى 20 خانة
            'phone'             => 'nullable|regex:/^\d+$/|max:20',
            'department_id'     => 'required|integer|exists:departments,id',
            'is_active'         => 'required|in:0,1',
        ], [
            'username.required'      => 'اسم المستخدم مطلوب.',
            'username.unique'        => 'اسم المستخدم هذا مستخدم من قبل.',
            'name.required'          => 'الاسم الكامل مطلوب.',
            'email.required'         => 'البريد الإلكتروني مطلوب.',
            'email.email'            => 'صيغة البريد الإلكتروني غير صالحة.',
            'email.unique'           => 'البريد الإلكتروني مستخدم من قبل.',
            'phone.regex'            => 'رقم الهاتف يجب أن يحتوي على أرقام فقط.',
            'phone.max'              => 'رقم الهاتف يجب ألا يزيد عن 20 خانة.',
            'department_id.required' => 'القسم مطلوب.',
            'department_id.exists'   => 'القسم المختار غير موجود.',
            'is_active.required'     => 'الرجاء اختيار الحالة.',
            'is_active.in'           => 'قيمة الحالة غير صحيحة.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors()->toArray()
            ], 422);
        }

        $updateData = [
            'username'      => $request->username,
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
            'is_active'     => (int) $request->input('is_active', 1),
            'updated_at'    => now(),
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $updated = DB::table('users')->where('id', $id)->update($updateData);

        // إرجاع رسالة التعديل الأصلية
        if ($updated) {
            return response()->json(['success' => true, 'message' => 'تم تعديل المستخدم بنجاح']);
        }

        return response()->json(['success' => false, 'message' => 'لم يتم تعديل أي بيانات']);
    }

    public function delete($id)
    {
        $deleted = DB::table('users')->where('id', $id)->delete();

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'تم حذف المستخدم']);
        }

        return response()->json(['success' => false, 'message' => 'المستخدم غير موجود']);
    }

    // عدد المستخدمين النشطين
    public function stats()
    {
        $totalUsers = DB::table('users')->count();
        $activeUsers = DB::table('users')->where('is_active', 1)->count();
        $lockedUsers = DB::table('users')->where('is_active', 0)->count();
        $verifiedUsers = DB::table('users')->whereNotNull('email_verified_at')->count();

        return response()->json([
            'totalUsers'   => $totalUsers,
            'activeUsers'  => $activeUsers,
            'lockedUsers'  => $lockedUsers,
            'verifiedUsers'=> $verifiedUsers
        ]);
    }

    // البحث والتصفية
    public function search(Request $request)
    {
        $query = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('users.*', 'departments.name as department_name');

        if ($request->has('name') && $request->name != '') {
            $query->where('users.name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('username') && $request->username != '') {
            $query->where('users.username', 'like', '%' . $request->username . '%');
        }

        if ($request->has('email') && $request->email != '') {
            $query->where('users.email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('department_id') && $request->department_id != '') {
            $query->where('users.department_id', $request->department_id);
        }

        if ($request->has('is_active') && $request->is_active != '' && in_array($request->is_active, ['0','1'])) {
            $query->where('users.is_active', $request->is_active);
        }

        $data = $query->orderBy('users.id', 'asc')->get();

        return view('modules.auth.Departments.users1_table', compact('data'));
    }

    public function toggleStatus($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if ($user) {
            $newStatus = $user->is_active ? 0 : 1;

            DB::table('users')
                ->where('id', $id)
                ->update(['is_active' => $newStatus, 'updated_at' => now()]);

            return response()->json(['success' => true, 'new_status' => $newStatus]);
        }

        return response()->json(['success' => false, 'message' => 'المستخدم غير موجود']);
    }

    /////  عرض الصلاحيات
    // public function permissions()
    // {
    //     $user = Auth::user();

    //     if (!$user || !$user->role_id) {
    //         return response()->json(['permissions' => []]);
    //     }

    //     $permissions = DB::table('permissions')
    //         ->join('role_permissions', 'role_permissions.permission_id', '=', 'permissions.id')
    //         ->where('role_permissions.role_id', $user->role_id)
    //         ->where('role_permissions.is_allowed', 1)
    //         ->select('permissions.id', 'permissions.name', 'permissions.permission_key')
    //         ->get();

    //     return response()->json([
    //         'permissions' => $permissions
    //     ]);
    // }

    public function getUserPermissions()
{
    $user = Auth::user();

    if (!$user) {
        return response()->json(['permissions' => []]);
    }

    $permissions = DB::table('permissions')
        ->join('role_permissions', 'permissions.id', '=', 'role_permissions.permission_id')
        ->join('roles', 'roles.id', '=', 'role_permissions.role_id')
        ->join('users', 'users.role_id', '=', 'roles.id')
        ->where('users.id', $user->id) // 🔑 جلب الصلاحيات للمستخدم الحالي
        ->where('role_permissions.is_allowed', 1)
        ->where('permissions.is_active', 1)
        ->select(
            'permissions.id',
            'permissions.name',
            'permissions.permission_key',
            'permissions.description',
            'permissions.module'
        )
        ->distinct()
        ->get();

    return response()->json(['permissions' => $permissions]);
}
}
