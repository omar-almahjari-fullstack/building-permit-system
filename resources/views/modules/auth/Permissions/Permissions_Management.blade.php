<style>
        :root {
            --primary-dark: #0a2540;
            --primary: #1a365d;
            --primary-light: #2a5699;
            --accent: #d4af37;
            --light: #ffffff;
            --text: #2c3e50;
            --border: #e0e6ed;
            --card-bg: #ffffff;
        }


        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(10, 37, 64, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(10, 37, 64, 0.15);
            border-color: rgba(26, 54, 93, 0.2);
        }

        .header-section {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            padding: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        h1, h2, h3 {
            font-weight: 700;
        }

        h1 {
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            font-size: 1.8rem;
        }

        .table-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(10, 37, 64, 0.05);
            border: 1px solid var(--border);
        }

        .table {
            background-color: var(--light);
            color: var(--text);
            margin-bottom: 0;
        }

        .table th {
            background-color: #f0f5ff;
            color: var(--primary);
            font-weight: 700;
            padding: 16px;
            border-bottom: 2px solid var(--primary-light);
        }

        .table td {
            padding: 14px 16px;
            vertical-align: middle;
            border-color: var(--border);
        }

        .table-striped>tbody>tr:nth-child(odd)>td {
            background-color: #f8fafc;
        }

        .table-striped>tbody>tr:nth-child(even)>td {
            background-color: #ffffff;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border: none;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 54, 93, 0.2);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffb007, #ff9800);
            border: none;
            color: #fff;
        }

        .btn-danger {
            background: linear-gradient(135deg, #e53935, #c62828);
            border: none;
        }

        .modal-content {
            background: var(--light);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid var(--border);
            background-color: #f8fafc;
        }

        .modal-title {
            color: var(--primary);
        }

        .form-control {
            background-color: #ffffff;
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 8px;
            padding: 10px 15px;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(26, 54, 93, 0.15);
            color: var(--text);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .permission-card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.2s ease;
            border-left: 3px solid var(--primary);
            box-shadow: 0 2px 8px rgba(10, 37, 64, 0.05);
            border: 1px solid var(--border);
        }

        .permission-card:hover {
            background-color: #f8fafc;
            transform: translateX(3px);
            border-left: 3px solid var(--accent);
        }

        .permission-card h5 {
            color: var(--primary);
        }

        .permission-card .form-check-label {
            font-weight: 500;
        }

        .permission-group {
            margin-bottom: 25px;
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(10, 37, 64, 0.05);
            border: 1px solid var(--border);
        }

        .permission-group h5 {
            color: var(--primary);
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .stats-card {
            text-align: center;
            padding: 25px 15px;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(10, 37, 64, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--border);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(10, 37, 64, 0.1);
            border-color: var(--primary-light);
        }

        .stats-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--primary);
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stats-card .number {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--primary);
        }

        .stats-card .label {
            font-size: 1rem;
            color: #64748b;
        }

        .diagram {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 4px 15px rgba(10, 37, 64, 0.05);
            border: 1px solid var(--border);
        }

        .card-header {
            background-color: #f8fafc;
            border-bottom: 1px solid var(--border);
            color: var(--primary);
            font-weight: 700;
            padding: 16px 20px;
        }

        .text-kuhli {
            color: var(--primary);
        }

        .border-kuhli {
            border-color: var(--primary-light);
        }

        .bg-kuhli-light {
            background-color: #f0f5ff;
        }

        @media (max-width: 768px) {
            .header-section {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
</style>



    <div class="container">
        <!-- الشريط العلوي -->
        <div class="header-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-shield-alt me-3"></i>نظام إدارة الصلاحيات المتقدمة</h1>

                </div>

                  <button type="button" class="btn btn-outline-light btn-icon" title="بحث" id="searchBtn"
                            data-reload-container="#rolesTableBody" data-reload-url="{{ route('roles.permissions.management') }}">
                             <i class="fas fa-sync-alt"></i>
                        </button>
                {{-- <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button  class="btn btn-light me-2">
                        <i class="fas fa-sync-alt me-2"></i>تحديث
                    </button>
                    <button class="btn btn-outline-light">
                        <i class="fas fa-cog me-2"></i>الإعدادات
                    </button>
                </div> --}}
            </div>
        </div>

        <!-- إحصائيات سريعة -->
        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-users"></i>
                    <div class="number" id="users-count">جاري التحميل...</div>
                    <div class="label">عدد المستخدمين</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-user-tag"></i>
                    <div class="number" id="roles-count">جاري التحميل...</div>
                    <div class="label">عدد الأدوار</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-key"></i>
                    <div class="number" id="permissions-count">جاري التحميل...</div>
                    <div class="label">عدد الصلاحيات</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-chart-line"></i>
                    <div class="number" id="security-score">جاري التحميل...</div>
                    <div class="label">مستوى الأمان</div>
                </div>
            </div>
        </div>

        <!-- محتوى رئيسي -->
        <div class="row">
            <!-- جدول الأدوار -->
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 text-kuhli"><i class="fas fa-user-tag me-2"></i>الأدوار والصلاحيات</h3>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roleModal">
                            <i class="fas fa-plus-circle me-2"></i>إضافة دور جديد
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>الدور</th>
                                        <th>الصلاحيات</th>
                                        <th>عدد المستخدمين</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody id="rolesTableBody">
                                    @include('modules.auth.Permissions.roles_table',['rolesPermissions' => $rolesPermissions ?? []])
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- قاعدة البيانات -->
        <div class="row">
            <div class="col-12">
                <!-- مخطط الصلاحيات -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 text-kuhli"><i class="fas fa-chart-pie me-2"></i>توزيع الصلاحيات</h3>
                    </div>
                    <div class="card-body">
                        <div class="diagram text-center">
                            <canvas id="permissionsChart" height="250"></canvas>
                            <p class="mt-3 text-kuhli">نسبة استخدام الصلاحيات في النظام</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- مودال إضافة دور -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_role" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-kuhli">
                        <i class="fas fa-user-tag me-2"></i>إضافة دور جديد
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label text-kuhli">اسم الدور</label>
                        <input type="text" name="name" class="form-control" placeholder="مثال: مدير المشاريع" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-kuhli">الوصف</label>
                        <textarea name="description" class="form-control" placeholder="وصف مختصر للدور"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-kuhli">الصلاحيات</label>

                        <!-- إدارة الطلبات -->
                        <div class="permission-group">
                            <h5><i class="fas fa-file-contract me-2"></i>إدارة الطلبات</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="1" id="perm1">
                                        <label class="form-check-label" for="perm1">انشاء طلب ترخيص</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="2" id="perm2">
                                        <label class="form-check-label" for="perm2">تعديل الطلبات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="3" id="perm3">
                                        <label class="form-check-label" for="perm3">حذف الطلبات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="4" id="perm4">
                                        <label class="form-check-label" for="perm4">موافقه الطلب من المنصة</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- إدارة المهام -->
                        <div class="permission-group">
                            <h5><i class="fas fa-tasks me-2"></i>الموافقة</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="5" id="perm5">
                                        <label class="form-check-label" for="perm5">الاعتماد النهائي</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="6" id="perm6">
                                        <label class="form-check-label" for="perm6">رفض طلب ترخيص</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="7" id="perm7">
                                        <label class="form-check-label" for="perm7">ادارة المستخدمين</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="8" id="perm8">
                                        <label class="form-check-label" for="perm8">ادارة الصلاحيات</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- إدارة المستخدمين -->
                        <div class="permission-group">
                            <h5><i class="fas fa-users me-2"></i>إدارة المستخدمين</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="9" id="perm9">
                                        <label class="form-check-label" for="perm9">ادارة الاعدادات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="10" id="perm10">
                                        <label class="form-check-label" for="perm10">انشاء تقارير</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="11" id="perm11">
                                        <label class="form-check-label" for="perm11">نسخه احتياطية</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="12" id="perm12">
                                        <label class="form-check-label" for="perm12">اضافة تقرير المهندس</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- صلاحيات جديدة -->
                        <div class="permission-group">
                            <h5><i class="fas fa-cogs me-2"></i>صلاحيات إضافية</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="13" id="perm13">
                                        <label class="form-check-label" for="perm13">ارسال اشعار</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="14" id="perm14">
                                        <label class="form-check-label" for="perm14">تحديد تعيين المهندس</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="15" id="perm15">
                                        <label class="form-check-label" for="perm15">زر طل تعديل</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="16" id="perm16">
                                        <label class="form-check-label" for="perm16">موافقة الطلب قيد المراجعة</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="17" id="perm17">
                                        <label class="form-check-label" for="perm17">طباعة رخصة</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="18" id="perm18">
                                        <label class="form-check-label" for="perm18">طباعة سند</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="19" id="perm19">
                                        <label class="form-check-label" for="perm19">تهيئة النظام</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="20" id="perm20">
                                        <label class="form-check-label" for="perm20">ادارة الطلب</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="23" id="perm21">
                                        <label class="form-check-label" for="perm21">موافقة الطلب  الفني</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="24" id="perm22">
                                        <label class="form-check-label" for="perm22">الدفع</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button"
                            class="btn btn-primary btn-save-entity"
                            data-form="#form_role"
                            data-modal="#roleModal"
                            data-reload-container="#rolesTableBody"
                            data-reload-url="{{ route('reload-roles_table') }}"
                            data-url="{{ route('roles_store') }}"
                            data-method="POST">
                        حفظ الدور
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- مودال تعديل الدور -->
<div class="modal fade" id="roleEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form_role_edit" method="POST">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="modal-header">
                    <h5 class="modal-title text-kuhli">
                        <i class="fas fa-user-tag me-2"></i>تعديل الدور
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label text-kuhli">اسم الدور</label>
                        <input type="text" name="name" class="form-control" placeholder="مثال: مدير المشاريع" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-kuhli">الوصف</label>
                        <textarea name="description" class="form-control" placeholder="وصف مختصر للدور"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-kuhli">الصلاحيات</label>

                        <!-- إدارة الطلبات -->
                        <div class="permission-group">
                            <h5><i class="fas fa-file-contract me-2"></i>إدارة الطلبات</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="1" id="edit_perm1">
                                        <label class="form-check-label" for="perm1">انشاء طلب</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="2" id="edit_perm2">
                                        <label class="form-check-label" for="edit_perm2">تعديل الطلبات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="3" id="edit_perm3">
                                        <label class="form-check-label" for="edit_perm3">حذف الطلبات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="4" id="edit_perm4">
                                        <label class="form-check-label" for="perm4">موافقه الطلب من المنصة</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- إدارة المهام -->
                        <div class="permission-group">
                            <h5><i class="fas fa-tasks me-2"></i>الموافقة</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="5" id="edit_perm5">
                                        <label class="form-check-label" for="edit_perm5">الاعتماد النهائي</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="6" id="edit_perm6">
                                        <label class="form-check-label" for="edit_perm6">رفض طلب ترخيص</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="7" id="edit_perm7">
                                        <label class="form-check-label" for="edit_perm7">ادارة المستخدمين</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="8" id="edit_perm8">
                                        <label class="form-check-label" for="edit_perm8">ادارة الصلاحيات</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- إدارة المستخدمين -->
                        <div class="permission-group">
                            <h5><i class="fas fa-users me-2"></i>إدارة المستخدمين</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="9" id="edit_perm9">
                                        <label class="form-check-label" for="edit_perm9">ادارة الاعدادات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="10" id="edit_perm10">
                                        <label class="form-check-label" for="edit_perm10">انشاء تقارير</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="11" id="edit_perm11">
                                        <label class="form-check-label" for="edit_perm11">نسخه احتياطية</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="12" id="edit_perm12">
                                        <label class="form-check-label" for="edit_perm12">اضافة تقرير المهندس</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- صلاحيات جديدة -->
                        <div class="permission-group">
                            <h5><i class="fas fa-cogs me-2"></i>صلاحيات إضافية</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="13" id="edit_perm13">
                                        <label class="form-check-label" for="edit_perm13">ارسال اشعار</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="14" id="edit_perm14">
                                        <label class="form-check-label" for="edit_perm14">تحديد تعيين المهندس</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="15" id="edit_perm15">
                                        <label class="form-check-label" for="edit_perm15">زر طل تعديل</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="16" id="edit_perm16">
                                        <label class="form-check-label" for="edit_perm16">موافقة الطلب قيد المراجعة</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="17" id="edit_perm17">
                                        <label class="form-check-label" for="edit_perm17">طباعة رخصة</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="18" id="edit_perm18">
                                        <label class="form-check-label" for="edit_perm18">طباعة سند</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="19" id="edit_perm19">
                                        <label class="form-check-label" for="edit_perm19">تهيئة النظام</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="20" id="edit_perm20">
                                        <label class="form-check-label" for="edit_perm20">ادارة الطلب</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="23" id="edit_perm21">
                                        <label class="form-check-label" for="edit_perm21">موافقة الطلب  الفني</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="24" id="edit_perm22">
                                        <label class="form-check-label" for="edit_perm22">الدفع</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button"
                            class="btn btn-primary btn-update-entity"
                            data-form="#form_role_edit"
                            data-modal="#roleEditModal"
                            data-reload-container="#rolesTableBody"
                            data-reload-url="{{ route('reload-roles_table') }}"
                            data-route="roles/update"
                            data-method="POST">
                        تعديل الدور
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    @vite(['resources/js/layouts/ajax-crud.js'])

    <script>
        // تحميل الإحصائيات الحقيقية
        function loadRealStats() {
            $.ajax({
                url: '/roles/stats',
                method: 'GET',
                success: function(response) {
                    $('#users-count').text(response.users);
                    $('#roles-count').text(response.roles);
                    $('#permissions-count').text(response.permissions);
                    $('#security-score').text(response.security + '%');
                },
                error: function() {
                    $('#users-count').text('خطأ');
                    $('#roles-count').text('خطأ');
                    $('#permissions-count').text('خطأ');
                    $('#security-score').text('خطأ');
                }
            });
        }

        // تحميل بيانات مخطط الصلاحيات الحقيقية
        function loadPermissionUsageChart() {
            $.ajax({
                url: '/roles/permission-usage',
                method: 'GET',
                success: function(response) {
                    if (document.getElementById("permissionsChart")) {
                        const ctx = document.getElementById("permissionsChart").getContext("2d");

                        // إذا كان هناك مخطط سابق يتم تدميره لتفادي التكرار
                        if (window.permissionsChartInstance) {
                            window.permissionsChartInstance.destroy();
                        }

                        window.permissionsChartInstance = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: response.labels,
                                datasets: [{
                                    data: response.data,
                                    backgroundColor: response.colors,
                                    borderWidth: 0
                                }]
                            },
                            options: {
                                responsive: true,
                                cutout: '70%',
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        rtl: true,
                                        labels: {
                                            color: '#2c3e50',
                                            font: {
                                                family: 'Tajawal',
                                                size: 12
                                            }
                                        }
                                    },
                                    tooltip: {
                                        rtl: true,
                                        bodyFont: {
                                            family: 'Tajawal'
                                        },
                                        titleFont: {
                                            family: 'Tajawal'
                                        }
                                    }
                                }
                            }
                        });
                    }
                },
                error: function() {
                    // في حالة الخطأ، عرض مخطط افتراضي
                    if (document.getElementById("permissionsChart")) {
                        const ctx = document.getElementById("permissionsChart").getContext("2d");

                        if (window.permissionsChartInstance) {
                            window.permissionsChartInstance.destroy();
                        }

                        window.permissionsChartInstance = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['لا توجد بيانات'],
                                datasets: [{
                                    data: [1],
                                    backgroundColor: ['#cccccc'],
                                    borderWidth: 0
                                }]
                            },
                            options: {
                                responsive: true,
                                cutout: '70%',
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        rtl: true,
                                        labels: {
                                            color: '#2c3e50',
                                            font: {
                                                family: 'Tajawal',
                                                size: 12
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
            });
        }

        // تحميل البيانات عند تحميل الصفحة
        $(document).ready(function() {
            loadRealStats();
            loadPermissionUsageChart();
        });

        // إعادة تحميل البيانات عند النقر على زر التحديث
        $('.btn-light').click(function() {
            loadRealStats();
            loadPermissionUsageChart();
        });

        // Custom JavaScript for handling role edit form population
        $(document).on('click', '.edit-record-btn', function(e) {
            e.preventDefault();

            const recordId = $(this).data('id');
            const route = $(this).data('route');
            const formId = $(this).data('form') || '#form_role_edit';
            const modalId = $(this).data('modal') || '#roleEditModal';

            const url = `/${route}/${recordId}`;

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    console.log('Response:', response);

                    // Fill basic role information
                    if (response.role) {
                        $(formId).find('[name="id"]').val(response.role.id);
                        $(formId).find('[name="name"]').val(response.role.name);
                        $(formId).find('[name="description"]').val(response.role.description);
                    }

                    // Clear all checkboxes first
                    $(formId).find('input[type="checkbox"]').prop('checked', false);

                    // Check the permissions that this role has
                    if (response.permissions && Array.isArray(response.permissions)) {
                        response.permissions.forEach(function(permissionId) {
                            $(formId).find(`input[value="${permissionId}"]`).prop('checked', true);
                        });
                    }

                    // Show the modal
                    $(modalId).modal('show');
                },
                error: function(xhr, status, error) {
                    console.error("خطأ في Ajax:", status, error);
                    console.error("تفاصيل الاستجابة:", xhr.responseText);

                    let message = 'فشل في تحميل البيانات';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        message = xhr.responseText;
                    }

                    Swal.fire('خطأ', message, 'error');
                }
            });
        });
    </script>
