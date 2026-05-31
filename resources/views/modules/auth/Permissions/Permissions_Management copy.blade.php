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
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button class="btn btn-light me-2">
                        <i class="fas fa-sync-alt me-2"></i>تحديث
                    </button>
                    <button class="btn btn-outline-light">
                        <i class="fas fa-cog me-2"></i>الإعدادات
                    </button>
                </div>
            </div>
        </div>

        <!-- إحصائيات سريعة -->
        <div class="row mb-4">
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-users"></i>
                    <div class="number">42</div>
                    <div class="label">عدد المستخدمين</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-user-tag"></i>
                    <div class="number">6</div>
                    <div class="label">عدد الأدوار</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-key"></i>
                    <div class="number">24</div>
                    <div class="label">عدد الصلاحيات</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stats-card">
                    <i class="fas fa-chart-line"></i>
                    <div class="number">98%</div>
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
                                <tbody>
                                    <tr>
                                        <td>
                                            <i class="fas fa-crown me-2 text-warning"></i>
                                            <strong class="text-kuhli">مدير النظام</strong>
                                        </td>
                                        <td>جميع الصلاحيات (24 صلاحية)</td>
                                        <td>2</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" disabled>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-user-shield me-2 text-primary"></i>
                                            <strong class="text-kuhli">مدير المشاريع</strong>
                                        </td>
                                        <td>إدارة المشاريع، إدارة المهام، مراجعة التقارير</td>
                                        <td>3</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-file-contract me-2 text-success"></i>
                                            <strong class="text-kuhli">مدير العقود</strong>
                                        </td>
                                        <td>إنشاء العقود، تعديل العقود، مراجعة العقود</td>
                                        <td>2</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-users-cog me-2 text-info"></i>
                                            <strong class="text-kuhli">فني متخصص</strong>
                                        </td>
                                        <td>إنشاء التقارير، رفع الملفات، إدارة المهام الفنية</td>
                                        <td>5</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fas fa-user me-2 text-secondary"></i>
                                            <strong class="text-kuhli">موظف إداري</strong>
                                        </td>
                                        <td>عرض التقارير، إدارة المستخدمين الأساسية</td>
                                        <td>8</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning me-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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

    <!-- مودال إضافة/تعديل دور -->
    <div class="modal fade" id="roleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-kuhli"><i class="fas fa-user-tag me-2"></i>إضافة دور جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label text-kuhli">اسم الدور</label>
                        <input type="text" class="form-control" placeholder="مثال: مدير المشاريع">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-kuhli">الصلاحيات</label>
                        <div class="permission-group">
                            <h5><i class="fas fa-file-contract me-2"></i>إدارة الطلبات</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm1">
                                        <label class="form-check-label" for="perm1">عرض الطلبات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm2">
                                        <label class="form-check-label" for="perm2">تعديل الطلبات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm3">
                                        <label class="form-check-label" for="perm3">حذف الطلبات</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm4">
                                        <label class="form-check-label" for="perm4">إنشاء طلبات جديدة</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="permission-group">
                            <h5><i class="fas fa-tasks me-2"></i>إدارة المهام</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm5">
                                        <label class="form-check-label" for="perm5">إنشاء المهام</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm6">
                                        <label class="form-check-label" for="perm6">تعديل المهام</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm7">
                                        <label class="form-check-label" for="perm7">حذف المهام</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm8">
                                        <label class="form-check-label" for="perm8">تغيير حالة المهام</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="permission-group">
                            <h5><i class="fas fa-users me-2"></i>إدارة المستخدمين</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm9">
                                        <label class="form-check-label" for="perm9">عرض المستخدمين</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm10">
                                        <label class="form-check-label" for="perm10">إضافة مستخدمين</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm11">
                                        <label class="form-check-label" for="perm11">تعديل المستخدمين</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm12">
                                        <label class="form-check-label" for="perm12">حذف المستخدمين</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary">حفظ الدور</button>
                </div>
            </div>
        </div>
    </div>

     <script>
        // رسم مخطط توزيع الصلاحيات
      // ========== توزيع الصلاحيات ==========
        if (document.getElementById("permissionsChart")) {
            const ctx = document.getElementById("permissionsChart").getContext("2d");

            // إذا كان هناك مخطط سابق يتم تدميره لتفادي التكرار
            if (window.permissionsChartInstance) {
                window.permissionsChartInstance.destroy();
            }

            window.permissionsChartInstance = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['إدارة الطلبات', 'إدارة المهام', 'إدارة المستخدمين', 'التقارير', 'الإعدادات'],
                    datasets: [{
                        data: [25, 20, 15, 25, 15],
                        backgroundColor: [
                            '#1a365d',
                            '#2a5699',
                            '#4a80f0',
                            '#6c9cff',
                            '#a4c2ff'
                        ],
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

    </script>
