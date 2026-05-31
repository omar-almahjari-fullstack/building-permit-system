
    <style>
        :root {
            --primary-dark: #0a1a2e;
            --primary: #142a4e;
            --primary-light: #1e3a6e;
            --accent: #d4af37;
            --accent-light: #e8c874;
            --light: #ffffff;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --text: #2c3e50;
            --border: #dee2e6;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.16);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: var(--light-gray);
            color: var(--text);
            line-height: 1.6;
        }

        .app-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Section */
        .app-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .app-header::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 100%;
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.1), transparent);
        }

        .app-title {
            font-weight: 700;
            font-size: 1.8rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .app-title i {
            color: var(--accent);
            font-size: 1.5rem;
        }

        .app-subtitle {
            opacity: 0.9;
            margin-bottom: 0;
            font-size: 1rem;
        }

        /* Main Content */
        .content-card {
            background-color: var(--light);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .content-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--accent);
            display: inline-block;
            position: relative;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 60px;
            height: 2px;
            background-color: var(--accent-light);
        }

        /* Filters Section */
        .filters-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .filter-label {
            font-weight: 600;
            color: var(--primary);
            white-space: nowrap;
        }

        /* Table Styles */
        .table-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            margin-bottom: 2rem;
        }

        .table {
            margin-bottom: 0;
            --bs-table-bg: transparent;
            --bs-table-striped-bg: var(--light-gray);
            --bs-table-hover-bg: rgba(20, 42, 78, 0.05);
        }

        .table thead th {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            padding: 1rem;
            text-align: center;
            vertical-align: middle;
            border-bottom-width: 2px;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: var(--border);
        }

        /* Task Progress */
        .task-progress {
            width: 100px;
            margin: 0 auto;
        }

        .progress {
            height: 20px;
            border-radius: 10px;
            background-color: var(--medium-gray);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: width 0.6s ease;
        }

        /* Comments Box */
        .comment-box {
            max-height: 120px;
            overflow-y: auto;
            padding: 0.75rem;
            background-color: var(--light-gray);
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.85rem;
            line-height: 1.5;
        }

        /* Badges */
        .badge {
            font-weight: 600;
            padding: 0.5rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-status {
            min-width: 90px;
            display: inline-block;
            text-align: center;
        }

        /* Buttons */
        .btn {
            font-weight: 600;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
            box-shadow: 0 2px 6px rgba(20, 42, 78, 0.2);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(20, 42, 78, 0.3);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #1e7e34);
            border: none;
            color: white;
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            background-color: transparent;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-outline-success {
            color: var(--success);
            border-color: var(--success);
        }

        .btn-outline-success:hover {
            background-color: var(--success);
            color: white;
        }

        .btn-outline-danger {
            color: var(--danger);
            border-color: var(--danger);
        }

        .btn-outline-danger:hover {
            background-color: var(--danger);
            color: white;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 1rem 1.5rem;
            background-color: var(--light-gray);
        }

        /* Form Elements */
        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(20, 42, 78, 0.15);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .filters-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                width: 100%;
            }

            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }

        @media (max-width: 768px) {
            .app-header {
                padding: 1.25rem;
            }

            .content-card {
                padding: 1.5rem;
            }

            .table thead {
                display: none;
            }

            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 1.5rem;
                border: 1px solid var(--border);
                border-radius: 8px;
                overflow: hidden;
            }

            .table td {
                text-align: right;
                padding: 0.75rem;
                position: relative;
                border-bottom: 1px solid var(--border);
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 1rem;
                top: 0.75rem;
                font-weight: 600;
                color: var(--primary);
                text-transform: uppercase;
                font-size: 0.8rem;
            }

            .table td:last-child {
                border-bottom: none;
            }

            .btn-group-vertical {
                width: 100%;
            }
        }
    </style>


    <div class="app-container">
        <!-- Header Section -->
        <header class="app-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="app-title">
                        <i class="fas fa-tasks"></i>
                        نظام إدارة المهام والمشاريع
                    </h1>
                    <p class="app-subtitle">متابعة وتنظيم المهام الهندسية والإدارية باحترافية</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="d-flex justify-content-md-end gap-2">
                        <button class="btn btn-outline-light btn-icon">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <button class="btn btn-outline-light btn-icon">
                            <i class="fas fa-cog"></i>
                        </button>
                        <button class="btn btn-light" style="color: var(--primary);">
                            <i class="fas fa-bell me-1"></i>
                            <span class="d-none d-md-inline">الإشعارات</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="content-card">
            <h2 class="section-title">
                <i class="fas fa-clipboard-list" style="color: var(--accent);"></i>
                مهام ومتابعة المشاريع
            </h2>

            <!-- Filters Section -->
            <div class="filters-container">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                    <i class="fas fa-plus-circle me-1"></i>
                    إضافة مهمة جديدة
                </button>

                <div class="d-flex flex-wrap gap-3">
                    <div class="filter-group">
                        <label class="filter-label">فلترة حسب الحالة:</label>
                        <select class="form-select" id="filterStatus" style="min-width: 150px;">
                            <option value="">الكل</option>
                            <option value="قيد التنفيذ">قيد التنفيذ</option>
                            <option value="مؤجلة">مؤجلة</option>
                            <option value="مكتملة">مكتملة</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">فلترة حسب الموظف:</label>
                        <select class="form-select" id="filterEmployee" style="min-width: 150px;">
                            <option value="">الكل</option>
                            <option>م. علي</option>
                            <option>م. أحمد</option>
                            <option>موظف إداري</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tasks Table -->
            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>اسم المهمة</th>
                            <th>نوع المهمة</th>
                            <th>مرتبطة بـ</th>
                            <th>الموظف المكلف</th>
                            <th>حالة المهمة</th>
                            <th>التواريخ</th>
                            <th>التقدم</th>
                            <th>تعليقات</th>
                            <th>أولوية</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="اسم المهمة">مراجعة مخطط البناء</td>
                            <td data-label="نوع المهمة">فحص هندسي</td>
                            <td data-label="مرتبطة بـ">طلب #1023</td>
                            <td data-label="الموظف المكلف">م. علي</td>
                            <td data-label="حالة المهمة">
                                <span class="badge badge-status bg-warning text-dark">قيد التنفيذ</span>
                            </td>
                            <td data-label="التواريخ">
                                <div class="d-flex flex-column">
                                    <small class="text-muted">البداية: 2025-06-10</small>
                                    <small class="text-muted">الانتهاء: 2025-06-15</small>
                                </div>
                            </td>
                            <td data-label="التقدم">
                                <div class="task-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 70%;"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="تعليقات">
                                <div class="comment-box">تم استلام جميع الأوراق من العميل، جاري المراجعة الفنية للمخططات.</div>
                            </td>
                            <td data-label="أولوية">
                                <span class="badge bg-danger">عالية</span>
                            </td>
                            <td data-label="إجراءات">
                                <div class="btn-group-vertical btn-group-sm" role="group">
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="اسم المهمة">إعداد تقرير الهدم</td>
                            <td data-label="نوع المهمة">تقرير فني</td>
                            <td data-label="مرتبطة بـ">مشروع #208</td>
                            <td data-label="الموظف المكلف">م. أحمد</td>
                            <td data-label="حالة المهمة">
                                <span class="badge badge-status bg-secondary">مؤجلة</span>
                            </td>
                            <td data-label="التواريخ">
                                <div class="d-flex flex-column">
                                    <small class="text-muted">البداية: 2025-06-01</small>
                                    <small class="text-muted">الانتهاء: 2025-06-30</small>
                                </div>
                            </td>
                            <td data-label="التقدم">
                                <div class="task-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="تعليقات">
                                <div class="comment-box">تم التأجيل بناءً على طلب العميل بسبب نقص بعض البيانات الفنية المطلوبة.</div>
                            </td>
                            <td data-label="أولوية">
                                <span class="badge bg-warning text-dark">متوسطة</span>
                            </td>
                            <td data-label="إجراءات">
                                <div class="btn-group-vertical btn-group-sm" role="group">
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-eye"></i>

                                    </button>
                                    <button class="btn btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="اسم المهمة">تسليم المشروع النهائي</td>
                            <td data-label="نوع المهمة">متابعة تنفيذ</td>
                            <td data-label="مرتبطة بـ">مشروع #156</td>
                            <td data-label="الموظف المكلف">م. علي</td>
                            <td data-label="حالة المهمة">
                                <span class="badge badge-status bg-success">مكتملة</span>
                            </td>
                            <td data-label="التواريخ">
                                <div class="d-flex flex-column">
                                    <small class="text-muted">البداية: 2025-05-15</small>
                                    <small class="text-muted">الانتهاء: 2025-06-10</small>
                                </div>
                            </td>
                            <td data-label="التقدم">
                                <div class="task-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="تعليقات">
                                <div class="comment-box">تم تسليم المشروع للعميل وتمت الموافقة عليه بدون أي ملاحظات.</div>
                            </td>
                            <td data-label="أولوية">
                                <span class="badge bg-danger">عالية</span>
                            </td>
                            <td data-label="إجراءات">
                                <div class="btn-group-vertical btn-group-sm" role="group">
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-eye"></i>

                                    </button>
                                    <button class="btn btn-outline-success">
                                        <i class="fas fa-edit"></i>

                                    </button>
                                    <button class="btn btn-outline-danger">
                                        <i class="fas fa-trash"></i>

                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">السابق</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">التالي</a>
                    </li>
                </ul>
            </nav>
        </main>

        <!-- Add Task Modal -->
        <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form class="modal-content needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTaskLabel">
                            <i class="fas fa-plus-circle" style="color: var(--accent);"></i>
                            إضافة مهمة جديدة
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="taskName" class="form-label">اسم المهمة</label>
                                <input type="text" class="form-control" id="taskName" required placeholder="أدخل اسم المهمة">
                                <div class="invalid-feedback">يرجى إدخال اسم المهمة</div>
                            </div>
                            <div class="col-md-6">
                                <label for="taskType" class="form-label">نوع المهمة</label>
                                <select id="taskType" class="form-select" required>
                                    <option value="" selected disabled>اختر نوع المهمة...</option>
                                    <option>فحص هندسي</option>
                                    <option>تقرير فني</option>
                                    <option>مراجعة ملفات</option>
                                    <option>متابعة تنفيذ</option>
                                    <option>اجتماع تنسيقي</option>
                                </select>
                                <div class="invalid-feedback">يرجى اختيار نوع المهمة</div>
                            </div>
                            <div class="col-md-6">
                                <label for="relatedTo" class="form-label">مرتبطة بـ (طلب أو مشروع)</label>
                                <input type="text" id="relatedTo" class="form-control" placeholder="أدخل رقم الطلب أو المشروع">
                            </div>
                            <div class="col-md-6">
                                <label for="assignedTo" class="form-label">الموظف المكلف</label>
                                <select id="assignedTo" class="form-select" required>
                                    <option value="" selected disabled>اختر الموظف المكلف...</option>
                                    <option>م. علي</option>
                                    <option>م. أحمد</option>
                                    <option>م. محمد</option>
                                    <option>موظف إداري</option>
                                    <option>فني متخصص</option>
                                </select>
                                <div class="invalid-feedback">يرجى اختيار الموظف المكلف</div>
                            </div>
                            <div class="col-md-6">
                                <label for="startDate" class="form-label">تاريخ البداية</label>
                                <input type="date" id="startDate" class="form-control" required>
                                <div class="invalid-feedback">يرجى تحديد تاريخ البداية</div>
                            </div>
                            <div class="col-md-6">
                                <label for="endDate" class="form-label">تاريخ الانتهاء المتوقع</label>
                                <input type="date" id="endDate" class="form-control" required>
                                <div class="invalid-feedback">يرجى تحديد تاريخ الانتهاء المتوقع</div>
                            </div>
                            <div class="col-md-6">
                                <label for="priority" class="form-label">الأولوية</label>
                                <select id="priority" class="form-select" required>
                                    <option value="" selected disabled>اختر مستوى الأولوية...</option>
                                    <option>عالية</option>
                                    <option>متوسطة</option>
                                    <option>منخفضة</option>
                                </select>
                                <div class="invalid-feedback">يرجى تحديد أولوية المهمة</div>
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">الحالة الحالية</label>
                                <select id="status" class="form-select" required>
                                    <option value="" selected disabled>اختر الحالة الحالية...</option>
                                    <option>قيد التنفيذ</option>
                                    <option>مؤجلة</option>
                                    <option>مكتملة</option>
                                    <option>ملغاة</option>
                                </select>
                                <div class="invalid-feedback">يرجى تحديد حالة المهمة</div>
                            </div>
                            <div class="col-12">
                                <label for="comments" class="form-label">تعليقات إضافية</label>
                                <textarea id="comments" class="form-control" rows="3" placeholder="أدخل أي تفاصيل إضافية عن المهمة..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            حفظ المهمة
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Form Validation
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        // Filter Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('filterStatus')
            const employeeFilter = document.getElementById('filterEmployee')
            const tableRows = document.querySelectorAll('tbody tr')

            function applyFilters() {
                const statusValue = statusFilter.value
                const employeeValue = employeeFilter.value

                tableRows.forEach(row => {
                    const statusCell = row.querySelector('td:nth-child(5)')
                    const employeeCell = row.querySelector('td:nth-child(4)')

                    const statusMatch = statusValue === '' || statusCell.textContent.includes(statusValue)
                    const employeeMatch = employeeValue === '' || employeeCell.textContent.includes(employeeValue)

                    if (statusMatch && employeeMatch) {
                        row.style.display = ''
                    } else {
                        row.style.display = 'none'
                    }
                })
            }

            statusFilter.addEventListener('change', applyFilters)
            employeeFilter.addEventListener('change', applyFilters)
        })
    </script>
