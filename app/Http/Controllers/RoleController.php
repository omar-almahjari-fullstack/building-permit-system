<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /*-------------------------------------------
    | عرض صفحة إدارة الأدوار والصلاحيات
    |-------------------------------------------*/
    public function index()
    {
        try {
            // التحقق من وجود الجداول وإنشاء بيانات تجريبية إذا لزم الأمر
            $this->ensureTablesExist();

            // جلب الأدوار والصلاحيات لعرضها في الصفحة
            $rolesPermissions = DB::table('role_permissions as rp')
                ->join('roles as r', 'rp.role_id', '=', 'r.id')
                ->join('permissions as p', 'rp.permission_id', '=', 'p.id')
                ->select(
                    'rp.id as rp_id',
                    'r.id as role_id',
                    'r.name as role_name',
                    'r.is_system_role',
                    'r.is_active',
                    'p.id as permission_id',
                    'p.name as permission_name',
                    'rp.is_allowed',
                    'rp.granted_by',
                    'rp.created_at',
                    'rp.updated_at'
                )
                ->get();

            return view('modules.auth.Permissions.roles_table', compact('rolesPermissions'));
        } catch (\Exception $e) {
            // في حالة عدم وجود الجداول، عرض الصفحة مع مصفوفة فارغة
            $rolesPermissions = collect();
            return view('modules.auth.Permissions.roles_table', compact('rolesPermissions'));
        }
    }

    /*-------------------------------------------
    | التحقق من وجود الجداول وإنشاء بيانات تجريبية
    |-------------------------------------------*/
    private function ensureTablesExist()
    {
        // التحقق من وجود جدول الأدوار
        if (!DB::getSchemaBuilder()->hasTable('roles')) {
            // إنشاء جدول الأدوار
            DB::statement("
                CREATE TABLE IF NOT EXISTS roles (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL UNIQUE,
                    description TEXT,
                    is_system_role TINYINT(1) DEFAULT 0,
                    is_active TINYINT(1) DEFAULT 1,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )
            ");
        }

        // التحقق من وجود جدول الصلاحيات
        if (!DB::getSchemaBuilder()->hasTable('permissions')) {
            // إنشاء جدول الصلاحيات
            DB::statement("
                CREATE TABLE IF NOT EXISTS permissions (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL UNIQUE,
                    description TEXT,
                    is_active TINYINT(1) DEFAULT 1,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )
            ");
        }

        // التحقق من وجود جدول ربط الأدوار والصلاحيات
        if (!DB::getSchemaBuilder()->hasTable('role_permissions')) {
            // إنشاء جدول ربط الأدوار والصلاحيات
            DB::statement("
                CREATE TABLE IF NOT EXISTS role_permissions (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    role_id INT NOT NULL,
                    permission_id INT NOT NULL,
                    is_allowed TINYINT(1) DEFAULT 1,
                    granted_by INT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
                    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
                    UNIQUE KEY unique_role_permission (role_id, permission_id)
                )
            ");
        }

        // إضافة بيانات تجريبية إذا كانت الجداول فارغة
        $this->seedInitialData();
    }

    /*-------------------------------------------
    | إضافة بيانات تجريبية
    |-------------------------------------------*/
    private function seedInitialData()
    {
        // إضافة صلاحيات أساسية إذا لم تكن موجودة
        $permissions = [
            ['id' => 1, 'name' => 'عرض الطلبات', 'description' => 'عرض جميع الطلبات'],
            ['id' => 2, 'name' => 'تعديل الطلبات', 'description' => 'تعديل بيانات الطلبات'],
            ['id' => 3, 'name' => 'حذف الطلبات', 'description' => 'حذف الطلبات'],
            ['id' => 4, 'name' => 'إنشاء طلبات جديدة', 'description' => 'إضافة طلبات جديدة'],
            ['id' => 5, 'name' => 'الاعتماد النهائي', 'description' => 'الموافقة النهائية على الطلبات'],
            ['id' => 6, 'name' => 'رفض طلب ترخيص', 'description' => 'رفض الطلبات'],
            ['id' => 7, 'name' => 'ادارة المستخدمين', 'description' => 'إدارة حسابات المستخدمين'],
            ['id' => 8, 'name' => 'ادارة الصلاحيات', 'description' => 'إدارة الأدوار والصلاحيات'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insertOrIgnore($permission);
        }

        // إضافة أدوار أساسية إذا لم تكن موجودة
        $roles = [
            ['id' => 1, 'name' => 'مدير النظام', 'description' => 'صلاحيات كاملة للنظام', 'is_system_role' => 1],
            ['id' => 2, 'name' => 'مدير المشاريع', 'description' => 'إدارة المشاريع والطلبات', 'is_system_role' => 0],
            ['id' => 3, 'name' => 'موظف استقبال', 'description' => 'استقبال ومعالجة الطلبات', 'is_system_role' => 0],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insertOrIgnore($role);
        }

        // ربط الأدوار بالصلاحيات
        $rolePermissions = [
            // مدير النظام - جميع الصلاحيات
            ['role_id' => 1, 'permission_id' => 1, 'granted_by' => 1],
            ['role_id' => 1, 'permission_id' => 2, 'granted_by' => 1],
            ['role_id' => 1, 'permission_id' => 3, 'granted_by' => 1],
            ['role_id' => 1, 'permission_id' => 4, 'granted_by' => 1],
            ['role_id' => 1, 'permission_id' => 5, 'granted_by' => 1],
            ['role_id' => 1, 'permission_id' => 6, 'granted_by' => 1],
            ['role_id' => 1, 'permission_id' => 7, 'granted_by' => 1],
            ['role_id' => 1, 'permission_id' => 8, 'granted_by' => 1],

            // مدير المشاريع - صلاحيات محدودة
            ['role_id' => 2, 'permission_id' => 1, 'granted_by' => 1],
            ['role_id' => 2, 'permission_id' => 2, 'granted_by' => 1],
            ['role_id' => 2, 'permission_id' => 4, 'granted_by' => 1],
            ['role_id' => 2, 'permission_id' => 5, 'granted_by' => 1],

            // موظف استقبال - صلاحيات أساسية
            ['role_id' => 3, 'permission_id' => 1, 'granted_by' => 1],
            ['role_id' => 3, 'permission_id' => 4, 'granted_by' => 1],
        ];

        foreach ($rolePermissions as $rolePermission) {
            DB::table('role_permissions')->insertOrIgnore($rolePermission);
        }
    }

    /*-------------------------------------------
    | Store a newly created role in storage
    |-------------------------------------------*/
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:50|unique:roles,name',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'integer|exists:permissions,id',

        ]);

        try {
            DB::beginTransaction();

            // 1) Insert the role
            $roleId = DB::table('roles')->insertGetId([
                'name'           => $request->name,
                'description'    => $request->description,
                'is_system_role' => 0,
                'is_active'      => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);

            // 2) Attach permissions
            if ($request->has('permissions')) {
                $rows = [];
                foreach ($request->permissions as $permissionId) {
                    $rows[] = [
                        'role_id'       => $roleId,
                        'permission_id' => $permissionId,
                        'is_allowed'    => 1,
                        'granted_by'    => Auth::id() ?? 1,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ];
                }
                DB::table('role_permissions')->insert($rows);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'تمت إضافة الدور بنجاح']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /*-------------------------------------------
    | Reload roles table (AJAX)
    |-------------------------------------------*/
    public function reloadTable()
    {
     $rolesPermissions = DB::table('role_permissions as rp')
    ->join('roles as r', 'rp.role_id', '=', 'r.id')
    ->join('permissions as p', 'rp.permission_id', '=', 'p.id')
    ->select(
        'rp.id as rp_id',
        'r.id as role_id',
        'r.name as role_name',
        'r.is_system_role',  // ← أضف هذا
        'r.is_active',       // ← إذا تريد
        'p.id as permission_id',
        'p.name as permission_name',
        'rp.is_allowed',
        'rp.granted_by',
        'rp.created_at',
        'rp.updated_at'


    )
    ->get();


return view('modules.auth.Permissions.roles_table', compact('rolesPermissions'));
    }

    /*-------------------------------------------
    | جلب بيانات دور محدد (للتعديل)
    |-------------------------------------------*/
    public function get($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();
        $permissions = DB::table('role_permissions')
                         ->where('role_id', $id)
                         ->pluck('permission_id')
                         ->toArray();

        return response()->json([
            'role'        => $role,
            'permissions' => $permissions,
        ]);
    }

    /*-------------------------------------------
    | تحديث دور موجود
    |-------------------------------------------*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:50|unique:roles,name,' . $id,
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        try {
            DB::beginTransaction();

            // 1) تحديث الدور
            DB::table('roles')->where('id', $id)->update([
                'name'        => $request->name,
                'description' => $request->description,
                'updated_at'  => now(),
            ]);

            // 2) حذف الصلاحيات القديمة
            DB::table('role_permissions')->where('role_id', $id)->delete();

            // 3) إضافة الصلاحيات الجديدة
            if ($request->has('permissions')) {
                $rows = [];
                foreach ($request->permissions as $permissionId) {
                    $rows[] = [
                        'role_id'       => $id,
                        'permission_id' => $permissionId,
                        'is_allowed'    => 1,
                        'granted_by'    => Auth::id() ?? 1,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ];
                }
                DB::table('role_permissions')->insert($rows);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'تم تحديث الدور بنجاح']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /*-------------------------------------------
    | حذف دور
    |-------------------------------------------*/
    // public function delete($id)
    // {
    //     try {
    //         DB::beginTransaction();
    //         DB::table('role_permissions')->where('role_id', $id)->delete();
    //         DB::table('roles')->where('id', $id)->delete();
    //         DB::commit();

    //         return response()->json(['success' => true, 'message' => 'تم حذف الدور بنجاح']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    //     }
    // }

    /*====================================================================
    =            Statistics (real numbers from DB)                      =
    ====================================================================*/
    public function statsCards()
    {
        // عدد المستخدمين النشطين من جدول users الحقيقي
        $activeUsers = DB::table('users')->where('is_active', 1)->count();

        // عدد الأدوار - إذا كان الجدول موجود
        $rolesCount = 0;
        try {
            if (DB::getSchemaBuilder()->hasTable('roles')) {
                $rolesCount = DB::table('roles')->where('is_active', 1)->count();
            }
        } catch (\Exception $e) {
            $rolesCount = 0;
        }

        // عدد الصلاحيات - إذا كان الجدول موجود
        $permissionsCount = 0;
        try {
            if (DB::getSchemaBuilder()->hasTable('permissions')) {
                $permissionsCount = DB::table('permissions')->where('is_active', 1)->count();
            }
        } catch (\Exception $e) {
            $permissionsCount = 0;
        }

        // حساب مستوى الأمان بناءً على البيانات الحقيقية
        $securityScore = $this->calculateRealSecurityScore($activeUsers);

        return response()->json([
            'users'       => $activeUsers,
            'roles'       => $rolesCount,
            'permissions' => $permissionsCount,
            'security'    => $securityScore,
        ]);
    }

    public function permissionUsage()
    {
        $raw = DB::table('role_permissions')
                 ->select('permission_id', DB::raw('count(*) as c'))
                 ->where('is_allowed', 1)
                 ->groupBy('permission_id')
                 ->pluck('c', 'permission_id');

        $labels = DB::table('permissions')
                    ->whereIn('id', $raw->keys())
                    ->pluck('name', 'id');

        $data  = [];
        $names = [];
        foreach ($raw as $pid => $count) {
            $data[]  = $count;
            $names[] = $labels[$pid] ?? 'غير محدد';
        }

        return response()->json([
            'labels' => $names,
            'data'   => $data,
            'colors' => ['#1a365d', '#2a5699', '#4a80f0', '#6c9cff', '#a4c2ff'],
        ]);
    }

    /*-------------------------------------------
    | حساب مستوى الأمان بناءً على البيانات الحقيقية
    |-------------------------------------------*/
    private function calculateRealSecurityScore($activeUsers): int
    {
        $score = 100;

        // تقليل النقاط بناءً على عدد المستخدمين غير النشطين
        $totalUsers = DB::table('users')->count();
        $inactiveUsers = $totalUsers - $activeUsers;

        if ($totalUsers > 0) {
            $inactivePercentage = ($inactiveUsers / $totalUsers) * 100;
            $score -= ($inactivePercentage * 0.3); // تقليل 0.3 نقطة لكل 1% من المستخدمين غير النشطين
        }

        // تحقق من وجود مستخدمين بدون كلمات مرور قوية (طول أقل من 60 حرف مشفر)
        $weakPasswords = DB::table('users')
            ->where('password', 'like', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi')
            ->count();

        if ($weakPasswords > 0) {
            $score -= ($weakPasswords * 5); // تقليل 5 نقاط لكل مستخدم بكلمة مرور ضعيفة
        }

        // تحقق من المستخدمين الذين لم يغيروا كلمات المرور مؤخراً
        $oldPasswords = DB::table('users')
            ->where('last_password_change', '<', now()->subDays(90))
            ->orWhereNull('last_password_change')
            ->count();

        if ($oldPasswords > 0) {
            $score -= ($oldPasswords * 2); // تقليل 2 نقطة لكل مستخدم لم يغير كلمة المرور
        }

        // تحقق من المستخدمين بدون تفعيل المصادقة الثنائية
        $noTwoFactor = DB::table('users')
            ->whereNull('two_factor_enabled_at')
            ->count();

        if ($noTwoFactor > 0) {
            $score -= ($noTwoFactor * 3); // تقليل 3 نقاط لكل مستخدم بدون مصادقة ثنائية
        }

        return max(0, min(100, (int)$score));
    }

    /*-------------------------------------------
    | Compute security-health percentage (الدالة القديمة للتوافق)
    |-------------------------------------------*/
    private function securityHealthScore(): int
    {
        // محاولة استخدام جدول security_policies إذا كان موجوداً
        try {
            if (DB::getSchemaBuilder()->hasTable('security_policies')) {
                $pol = DB::table('security_policies')->first();
                if ($pol) {
                    $score = 100;
                    if ($pol->min_password_length < 12)      $score -= 15;
                    if ($pol->password_expiry_days > 90)     $score -= 15;
                    if (!$pol->two_factor_enabled)           $score -= 25;
                    if ($pol->max_login_attempts > 5)        $score -= 15;
                    return max(0, $score);
                }
            }
        } catch (\Exception $e) {
            // في حالة عدم وجود الجدول، ا��تخدم الحساب البديل
        }

        // إذا لم يكن جدول security_policies موجوداً، استخدم الحساب البديل
        $activeUsers = DB::table('users')->where('is_active', 1)->count();
        return $this->calculateRealSecurityScore($activeUsers);
    }
}
