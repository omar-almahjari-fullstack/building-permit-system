{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحات التحكم - نظام المكتب الهندسي</title>

   <style>
        :root {
            --primary-dark: #0a2540;
            --primary: #1a365d;
            --primary-light: #4a80f0;
            --secondary: #6c757d;
            --success: #198754;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #0dcaf0;
            --light: #f8f9fa;
            --accent: #d4af37;
            --sidebar-width: 280px;
        }

        .nav-tabs .nav-link {
            border: none;
            color: var(--secondary);
            font-weight: 600;
            padding: 1rem 1.5rem;
            transition: all 0.3s;
            position: relative;
        }

        .nav-tabs .nav-link:hover {
            color: var(--primary);
        }

        .nav-tabs .nav-link.active {
            color: var(--primary);
            background-color: transparent;
        }

        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 3px 3px 0 0;
        }

        /* بطاقات الإحصائيات */
        .stat-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: all 0.3s;
            margin-bottom: 1.5rem;
            overflow: hidden;
            position: relative;
            color: white;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 4px;
            background: rgba(255,255,255,0.3);
        }

        .stat-card .card-body {
            position: relative;
            z-index: 2;
            padding: 1.5rem;
        }

        .stat-card i {
            position: absolute;
            font-size: 4rem;
            opacity: 0.2;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .stat-card h5 {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .stat-card h2 {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        .stat-card a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }

        .stat-card a i {
            position: relative;
            font-size: 1rem;
            opacity: 1;
            margin-right: 0.5rem;
        }

        /* ألوان البطاقات */
        .bg-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
        }

        .bg-success {
            background: linear-gradient(135deg, var(--success), #25a56a) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, var(--warning), #ffb007) !important;
        }

        .bg-danger {
            background: linear-gradient(135deg, var(--danger), #e02d3d) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, var(--info), #0ab8db) !important;
        }

        /* تصميم الجداول */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h5 {
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }

        .card-header h5 i {
            margin-left: 0.75rem;
            color: var(--primary);
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: var(--secondary);
            background-color: rgba(26, 54, 93, 0.03);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(26, 54, 93, 0.03);
        }

        /* تصميم الأزرار */
        .btn {
            font-weight: 500;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.875rem;
        }

        .btn i {
            margin-left: 0.5rem;
        }

        /* شريط التقدم */
        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: rgba(26, 54, 93, 0.1);
        }

        .progress-bar {
            background-color: var(--primary);
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* الخط الزمني */
        .timeline {
            position: relative;
            padding-right: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            right: 15px;
            height: 100%;
            width: 2px;
            background: rgba(0,0,0,0.1);
        }

        .timeline-item {
            position: relative;
            padding-right: 30px;
            margin-bottom: 1.5rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            right: 10px;
            top: 5px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        .timeline-item small {
            color: var(--secondary);
            display: block;
            margin-bottom: 0.5rem;
        }

        /* تصميم المحتوى */
        .content-section {
            padding: 1.5rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .section-header {
            border-bottom: 2px solid rgba(26, 54, 93, 0.1);
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        /* تصميم متجاوب */
        @media (max-width: 768px) {
            .nav-tabs .nav-link {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .stat-card i {
                font-size: 3rem;
            }

            .stat-card h2 {
                font-size: 1.8rem;
            }
        }

    </style>



</head>
<body>

    <!-- علامات التبويب -->
    <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="public-tab" data-bs-toggle="tab" data-bs-target="#public" type="button" role="tab">
                <i class="bi bi-speedometer2 me-2"></i> لوحة التحكم العامة
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="manager-tab" data-bs-toggle="tab" data-bs-target="#manager" type="button" role="tab">
                <i class="bi bi-person-gear me-2"></i> لوحة تحكم المدير
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="engineer-tab" data-bs-toggle="tab" data-bs-target="#engineer" type="button" role="tab">
                <i class="bi bi-person-badge me-2"></i> لوحة تحكم المهندس
            </button>
        </li>

    </ul>

    <!-- محتوى علامات التبويب -->
    <div class="container-fluid py-3">
        <div class="tab-content" id="dashboardTabsContent">
            <!-- لوحة تحكم المدير -->
            <div class="tab-pane fade" id="manager" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-speedometer2 me-2"></i> نظرة عامة
                        </h2>


                        <div class="dropdown">
                            <button class="dropdown-toggle btn btn-outline-secondary dropdown-toggle" type="button" id="timeFilter" data-bs-toggle="dropdown">
                                <span class="nav-label"> هذا الأسبوع</span>
                         <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>

                            </button>
                            <ul class="dropdown-menu dropdown-menu-amr">
                                <li><a class="dropdown-item" href="#">اليوم</a></li>
                                <li><a class="dropdown-item active" href="#">هذا الأسبوع</a></li>
                                <li><a class="dropdown-item" href="#">هذا الشهر</a></li>
                                <li><a class="dropdown-item" href="#">هذا الربع</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card stat-card bg-warning">
                                <div class="card-body">
                                    <h5>طلبات تحتاج مراجعة</h5>
                                    <h2>15</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-eye"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-danger">
                                <div class="card-body">
                                    <h5>طلبات تحتاج تعديلات</h5>
                                    <h2>7</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-info">
                                <div class="card-body">
                                    <h5>طلبات مسندة</h5>
                                    <h2>23</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-people"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>طلبات مكتملة</h5>
                                    <h2>42</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-exclamation-triangle-fill me-2"></i> طلبات عاجلة تحتاج إلى إجراء</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="120">رقم الطلب</th>
                                            <th>نوع الطلب</th>
                                            <th>العميل</th>
                                            <th width="120">تاريخ الإنشاء</th>
                                            <th width="120">الحالة</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="priority-high">
                                            <td>#2024-0185</td>
                                            <td>ترخيص بناء عاجل</td>
                                            <td>شركة النهضة</td>
                                            <td>2024-06-12</td>
                                            <td><span class="badge bg-warning">قيد المراجعة</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye me-1"></i> مراجعة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="priority-high">
                                            <td>#2024-0183</td>
                                            <td>ترخيص هدم عاجل</td>
                                            <td>بلدية صنعاء</td>
                                            <td>2024-06-11</td>
                                            <td><span class="badge bg-danger">طلب تعديلات</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil me-1"></i> تعديلات
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#2024-0180</td>
                                            <td>ترخيص تعديل</td>
                                            <td>شركة المستقبل</td>
                                            <td>2024-06-10</td>
                                            <td><span class="badge bg-info">بانتظار التعيين</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-info">
                                                    <i class="bi bi-person-plus me-1"></i> تعيين
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-bar-chart-line me-2"></i> أداء الموظفين</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="employeePerformanceChart" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-pie-chart me-2"></i> توزيع الطلبات حسب النوع</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="requestsTypeChart" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- لوحة تحكم المهندس -->
            <div class="tab-pane fade" id="engineer" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-person-badge me-2"></i> المهام المسندة
                        </h2>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="engineerFilter" data-bs-toggle="dropdown">
                                <i class="bi bi-funnel me-2"></i> تصفية
                            </button>
                            <ul class="dropdown-menu dropdown-menu-amr">
                                <li><a class="dropdown-item active" href="#">الكل</a></li>
                                <li><a class="dropdown-item" href="#">قيد التنفيذ</a></li>
                                <li><a class="dropdown-item" href="#">بانتظار المراجعة</a></li>
                                <li><a class="dropdown-item" href="#">مكتملة</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stat-card bg-info">
                                <div class="card-body">
                                    <h5>الطلبات المسندة</h5>
                                    <h2>8</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-list-task"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-warning">
                                <div class="card-body">
                                    <h5>زيارات ميدانية</h5>
                                    <h2>3</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-geo-alt"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>تقارير مكتملة</h5>
                                    <h2>5</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-list-check me-2"></i> الطلبات المسندة إليك</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="120">رقم الطلب</th>
                                            <th>نوع الطلب</th>
                                            <th>العميل</th>
                                            <th width="120">تاريخ التعيين</th>
                                            <th width="150">حالة التنفيذ</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#2024-0180</td>
                                            <td>ترخيص بناء</td>
                                            <td>شركة المستقبل</td>
                                            <td>2024-06-10</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 65%">65%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye me-1"></i> متابعة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#2024-0178</td>
                                            <td>ترخيص هدم</td>
                                            <td>شركة الأصالة</td>
                                            <td>2024-06-08</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 30%">30%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye me-1"></i> متابعة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#2024-0175</td>
                                            <td>ترخيص صيانة</td>
                                            <td>فندق الشرق</td>
                                            <td>2024-06-05</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width: 100%">100%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-send me-1"></i> إرسال
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-calendar-check me-2"></i> المراجعات الميدانية القادمة</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="120">رقم الطلب</th>
                                            <th>العميل</th>
                                            <th>الموقع</th>
                                            <th width="150">التاريخ والوقت</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#2024-0182</td>
                                            <td>شركة الأصالة</td>
                                            <td>حي التئمينات</td>
                                            <td>2024-06-15 10:00 ص</td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-geo-alt me-1"></i> بدء الزيارة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#2024-0179</td>
                                            <td>بلدية صنعاء</td>
                                            <td>حي الصافيه صنعاء</td>
                                            <td>2024-06-17 02:00 م</td>
                                            <td>
                                                <button class="btn btn-sm btn-secondary" disabled>
                                                    <i class="bi bi-clock me-1"></i> قيد الانتظار
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#2024-0176</td>
                                            <td>شركة المدينة</td>
                                            <td>حي النهضه صنعاء</td>
                                            <td>2024-06-20 11:00 ص</td>
                                            <td>
                                                <button class="btn btn-sm btn-secondary" disabled>
                                                    <i class="bi bi-clock me-1"></i> قيد الانتظار
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

            <!-- لوحة التحكم العامة -->
            <div class="tab-pane fade show active" id="public" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-speedometer2 me-2"></i> نظرة عامة
                        </h2>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary active">اليوم</button>
                            <button type="button" class="btn btn-outline-secondary">هذا الأسبوع</button>
                            <button type="button" class="btn btn-outline-secondary">هذا الشهر</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card stat-card bg-primary">
                                <div class="card-body">
                                    <h5>طلبات جديدة</h5>
                                    <h2>24</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-plus-circle"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-warning">
                                <div class="card-body">
                                    <h5>قيد المراجعة</h5>
                                    <h2>15</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-hourglass"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>مكتملة</h5>
                                    <h2>142</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card bg-danger">
                                <div class="card-body">
                                    <h5>ملغاة</h5>
                                    <h2>8</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-x-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-list-ul me-2"></i> آخر الطلبات</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">طلب #2024-0158 - ترخيص بناء</h6>
                                                <small class="text-muted">منذ 3 ساعات</small>
                                            </div>
                                            <p class="mb-1">شركة التقنية - صنعاء</p>
                                            <small class="text-muted">محمد أحمد</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">طلب #2024-0157 - ترخيص هدم</h6>
                                                <small class="text-muted">منذ 5 ساعات</small>
                                            </div>
                                            <p class="mb-1">شركة البناء الحديث - جدة</p>
                                            <small class="text-muted">علي محمد</small>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action border-0 py-3">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">طلب #2024-0156 - تعديل مخططات</h6>
                                                <small class="text-muted">منذ يوم</small>
                                            </div>
                                            <p class="mb-1">فيلا سكنية - الخبر</p>
                                            <small class="text-muted">سارة عبدالله</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-clock-history me-2"></i> النشاط الأخير</h5>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 10:30 ص</small>
                                            <p class="mb-0">تم تعديل حالة الطلب #2024-0158 إلى "قيد المراجعة"</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 09:45 ص</small>
                                            <p class="mb-0">تم تعيين الطلب #2024-0157 للمهندس أحمد سعيد</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">بالأمس، 03:20 م</small>
                                            <p class="mb-0">تم إكمال الطلب #2024-0152 بنجاح</p>
                                        </div>
                                        <div class="timeline-item">
                                            <small class="text-muted d-block mb-1">بالأمس، 11:15 ص</small>
                                            <p class="mb-0">تم رفض الطلب #2024-0149 بسبب نقص المستندات</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

<script>
    function initializeCharts() {

        if (document.getElementById("employeePerformanceChart")) {
            const ctxEmployee = document.getElementById("employeePerformanceChart").getContext("2d");
            new Chart(ctxEmployee, {
                type: "bar",
                data: {
                    labels: ["أحمد", "سارة", "خالد", "منى", "علي"],
                    datasets: [{
                        label: "عدد المعاملات المنجزة",
                        data: [42, 35, 50, 28, 31],
                        backgroundColor: "rgba(255, 159, 64, 0.6)",
                        borderColor: "rgba(255, 159, 64, 1)",
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: "y",
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        if (document.getElementById("requestsTypeChart")) {
            const ctxRequestsType = document.getElementById("requestsTypeChart").getContext("2d");
            new Chart(ctxRequestsType, {
                type: "pie",
                data: {
                    labels: ["رخص بناء", "رخص ترميم", "رخص إضافة", "رخص إزالة"],
                    datasets: [{
                        data: [120, 90, 45, 15],
                        backgroundColor: [
                            "rgba(54, 162, 235, 0.6)",
                            "rgba(255, 206, 86, 0.6)",
                            "rgba(75, 192, 192, 0.6)",
                            "rgba(255, 99, 132, 0.6)"
                        ],
                        borderColor: [
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(255, 99, 132, 1)"
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "bottom"
                        },
                        title: {
                            display: false
                        }
                    }
                }
            });
        }

    }
</script>

</body>
</html> --}}



<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تراخيص البناء اليمني الحكومي</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-dark: #0a2540;
            --primary: #1a365d;
            --primary-light: #4a80f0;
            --secondary: #6c757d;
            --success: #198754;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #0dcaf0;
            --light: #f8f9fa;
            --accent: #d4af37;
            --sidebar-width: 280px;
            --phase-1: #4e73df;
            --phase-2: #1cc88a;
            --phase-3: #36b9cc;
            --phase-4: #f6c23e;
            --phase-5: #e74a3b;
            --phase-6: #6f42c1;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f7fa;
        }

        /* تصميم علامات التبويب */
        .nav-tabs {
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
            padding: 0 1rem;
        }

        .nav-tabs .nav-link {
            border: none;
            color: var(--secondary);
            font-weight: 600;
            padding: 1rem 1.5rem;
            transition: all 0.3s;
            position: relative;
            border-radius: 0;
        }

        .nav-tabs .nav-link:hover {
            color: var(--primary);
            background-color: rgba(26, 54, 93, 0.05);
        }

        .nav-tabs .nav-link.active {
            color: var(--primary);
            background-color: transparent;
            font-weight: 700;
        }

        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 3px 3px 0 0;
        }

        /* بطاقات الإحصائيات */
        .stat-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            margin-bottom: 1.5rem;
            overflow: hidden;
            position: relative;
            color: white;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
        }

        .stat-card .card-body {
            position: relative;
            z-index: 2;
            padding: 1.5rem;
        }

        .stat-card i {
            position: absolute;
            font-size: 4rem;
            opacity: 0.2;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .stat-card h5 {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .stat-card h2 {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        .stat-card a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }

        .stat-card a i {
            position: relative;
            font-size: 1rem;
            opacity: 1;
            margin-right: 0.5rem;
        }

        /* ألوان البطاقات */
        .bg-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
        }

        .bg-success {
            background: linear-gradient(135deg, var(--success), #25a56a) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, var(--warning), #ffb007) !important;
        }

        .bg-danger {
            background: linear-gradient(135deg, var(--danger), #e02d3d) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, var(--info), #0ab8db) !important;
        }

        /* ألوان مراحل سير العمل */
        .bg-phase-1 {
            background: linear-gradient(135deg, var(--phase-1), #6c8ce4) !important;
        }

        .bg-phase-2 {
            background: linear-gradient(135deg, var(--phase-2), #3cd9a1) !important;
        }

        .bg-phase-3 {
            background: linear-gradient(135deg, var(--phase-3), #56d1e0) !important;
        }

        .bg-phase-4 {
            background: linear-gradient(135deg, var(--phase-4), #f9d371) !important;
        }

        .bg-phase-5 {
            background: linear-gradient(135deg, var(--phase-5), #eb6d5d) !important;
        }

        .bg-phase-6 {
            background: linear-gradient(135deg, var(--phase-6), #8d6bd9) !important;
        }

        /* تصميم الجداول */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px 10px 0 0 !important;
        }

        .card-header h5 {
            margin-bottom: 0;
            display: flex;
            align-items: center;
        }

        .card-header h5 i {
            margin-left: 0.75rem;
            color: var(--primary);
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: var(--secondary);
            background-color: rgba(26, 54, 93, 0.03);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(26, 54, 93, 0.03);
        }

        /* تصميم الأزرار */
        .btn {
            font-weight: 500;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.875rem;
        }

        .btn i {
            margin-left: 0.5rem;
        }

        /* شريط التقدم */
        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: rgba(26, 54, 93, 0.1);
        }

        .progress-bar {
            background-color: var(--primary);
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* الخط الزمني */
        .timeline {
            position: relative;
            padding-right: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            right: 15px;
            height: 100%;
            width: 2px;
            background: rgba(0, 0, 0, 0.1);
        }

        .timeline-item {
            position: relative;
            padding-right: 30px;
            margin-bottom: 1.5rem;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            right: 10px;
            top: 5px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--primary);
        }

        .timeline-item small {
            color: var(--secondary);
            display: block;
            margin-bottom: 0.5rem;
        }

        /* تصميم المحتوى */
        .content-section {
            padding: 1.5rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .section-header {
            border-bottom: 2px solid rgba(26, 54, 93, 0.1);
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        /* شريط مراحل سير العمل */
        .workflow-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }

        .workflow-steps::before {
            content: '';
            position: absolute;
            top: 15px;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--phase-1), var(--phase-6));
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-bottom: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .step-label {
            font-size: 0.85rem;
            font-weight: 500;
            text-align: center;
            color: var(--secondary);
        }

        .step.active .step-label {
            color: var(--primary);
            font-weight: 600;
        }

        /* تصميم متجاوب */
        @media (max-width: 768px) {
            .nav-tabs .nav-link {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .stat-card i {
                font-size: 3rem;
            }

            .stat-card h2 {
                font-size: 1.8rem;
            }

            .workflow-steps {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .step {
                flex: 0 0 calc(50% - 1rem);
            }
        }

        /* علامات الحالة */
        .badge {
            font-weight: 500;
            padding: 0.35rem 0.6rem;
            border-radius: 6px;
        }

        /* رسومات الدوائر */
        .circle-chart {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }

        .circle-chart svg {
            width: 100%;
            height: 100%;
        }

        .circle-chart .circle-bg {
            fill: none;
            stroke: #eee;
            stroke-width: 3;
        }

        .circle-chart .circle-fill {
            fill: none;
            stroke-width: 3;
            stroke-linecap: round;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            animation: circle-fill-animation 1.5s ease-in-out forwards;
        }

        @keyframes circle-fill-animation {
            0% {
                stroke-dasharray: 0, 100;
            }
        }

        .circle-chart .circle-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* تأثيرات للطلبات العاجلة */
        .priority-high {
            position: relative;
        }

        .priority-high::before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background-color: var(--danger);
            border-radius: 4px 0 0 4px;
        }

        /* تنبيهات */
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
    </style>
    <style>
        :root {
            --navy-dark: #0a1a2e;
            --navy-primary: #1a2e4a;
            --navy-light: #2a4266;
            --gold-primary: #d4af37;
            --gold-light: #e8c874;
            --gold-dark: #b8951e;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8fafc;
            color: #333;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-header {
            background-color: var(--navy-dark);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-bottom: 4px solid var(--gold-primary);
        }

        .dashboard-title {
            font-weight: 700;
            display: flex;
            align-items: center;
        }

        .dashboard-title i {
            margin-left: 10px;
            color: var(--gold-primary);
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 10px;
        }

        .summary-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            border-top: 4px solid var(--gold-primary);
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-title {
            font-weight: 600;
            color: var(--navy-dark);
            display: flex;
            align-items: center;
        }

        .card-title i {
            margin-left: 8px;
            color: var(--gold-primary);
        }

        .card-value {
            font-size: 28px;
            font-weight: 700;
            color: var(--navy-dark);
            margin-bottom: 10px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }

        .card-link {
            color: var(--navy-primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .card-link i {
            margin-right: 5px;
        }

        .card-link:hover {
            color: var(--gold-primary);
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .workflow-steps {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
            position: relative;
        }

        .workflow-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--navy-primary), var(--gold-primary));
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-bottom: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            border: 2px solid white;
        }

        .step-label {
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            color: var(--navy-light);
            max-width: 100px;
            line-height: 1.3;
        }

        .step.active .step-label {
            color: var(--navy-dark);
            font-weight: 700;
        }

        .recent-activity {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-top: 30px;
        }

        .activity-title {
            font-weight: 600;
            color: var(--navy-dark);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .activity-title i {
            margin-left: 10px;
            color: var(--gold-primary);
        }

        .activity-list {
            list-style: none;
            padding: 0;
        }

        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: flex-start;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(212, 175, 55, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
            color: var(--gold-primary);
            flex-shrink: 0;
        }

        .activity-content {
            flex-grow: 1;
        }

        .activity-message {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .activity-time {
            font-size: 12px;
            color: #777;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }

        .action-btn {
            background-color: white;
            border: none;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: var(--navy-dark);
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.12);
            color: var(--gold-primary);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(212, 175, 55, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            color: var(--gold-primary);
            font-size: 20px;
        }

        .action-label {
            font-weight: 600;
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .summary-cards {
                grid-template-columns: 1fr;
            }

            .workflow-steps {
                flex-wrap: wrap;
                gap: 15px;
            }

            .step {
                flex: 0 0 calc(50% - 15px);
                margin-bottom: 15px;
            }

            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

    <!-- علامات التبويب -->
    <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button"
                role="tab">
                <i class="bi bi-speedometer2 me-2"></i> لوحة الإدارة
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reception-tab" data-bs-toggle="tab" data-bs-target="#reception" type="button"
                role="tab">
                <i class="bi bi-person-lines-fill me-2"></i> موظف الاستقبال
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button"
                role="tab">
                <i class="bi bi-files me-2"></i> مراجع المستندات
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="inspection-tab" data-bs-toggle="tab" data-bs-target="#inspection"
                type="button" role="tab">
                <i class="bi bi-geo-alt me-2"></i> معاين المواقع
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="technical-tab" data-bs-toggle="tab" data-bs-target="#technical" type="button"
                role="tab">
                <i class="bi bi-clipboard2-check me-2"></i> المراجع الفني
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="approval-tab" data-bs-toggle="tab" data-bs-target="#approval" type="button"
                role="tab">
                <i class="bi bi-check-circle me-2"></i> الموافقة النهائية
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="issuance-tab" data-bs-toggle="tab" data-bs-target="#issuance" type="button"
                role="tab">
                <i class="bi bi-file-earmark-text me-2"></i> إصدار التراخيص
            </button>
        </li>
    </ul>

    <!-- محتوى علامات التبويب -->
    <div class="container-fluid py-3">
        <div class="tab-content" id="dashboardTabsContent">

            <!-- لوحة الإدارة -->
            <div class="tab-pane fade show active" id="admin" role="tabpanel">

                    <div class="dashboard-container">
                        <!-- Header -->
                        <div class="dashboard-header" style="display: flex; justify-content: space-between">
                           <div class="">
                             <h1 class="dashboard-title">
                                <i class="bi bi-speedometer2"></i> لوحة التحكم
                            </h1>
                            <span>نظرة عامة على نظام تراخيص البناء - آخر تحديث: اليوم 10:30 ص</span>
                           </div>
                            <div class="">
                                <div class="btn-group" style="direction: ltr">
                                <button type="button" class="btn btn-outline-secondary">هذا الربع</button>
                                <button type="button" class="btn btn-outline-secondary">هذا الشهر</button>
                                <button type="button" class="btn btn-outline-secondary active">هذا الأسبوع</button>
                                </div>
                            </div>
                        </div>
                           {{-- الاشعارات --}}
                         <div class="alert alert-warning">
                          <i class="bi bi-exclamation-triangle-fill me-2"></i> لديك 5 طلبات جديدة تحتاج إلى إدخال
                          بياناتها في النظام
                         </div>

                        <!-- Summary Cards -->
                        <div class="summary-cards">
                            <div class="summary-card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="bi bi-file-earmark-plus"></i> طلبات جديدة</h3>
                                    <span class="badge bg-success">+12%</span>
                                </div>
                                <div class="card-value">24</div>
                                <div class="card-footer">
                                    <span>هذا الأسبوع</span>
                                    <a href="#" class="card-link">
                                        <i class="bi bi-arrow-left"></i> عرض التفاصيل
                                    </a>
                                </div>
                            </div>

                            <div class="summary-card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="bi bi-file-earmark-check"></i> قيد المراجعة</h3>
                                    <span class="badge bg-warning">-5%</span>
                                </div>
                                <div class="card-value">18</div>
                                <div class="card-footer">
                                    <span>5 متأخرة</span>
                                    <a href="#" class="card-link">
                                        <i class="bi bi-arrow-left"></i> عرض التفاصيل
                                    </a>
                                </div>
                            </div>

                            <div class="summary-card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="bi bi-clipboard2-pulse"></i> مراجعة فنية</h3>
                                    <span class="badge bg-danger">متأخرة</span>
                                </div>
                                <div class="card-value">12</div>
                                <div class="card-footer">
                                    <span>3 تحتاج متابعة</span>
                                    <a href="#" class="card-link">
                                        <i class="bi bi-arrow-left"></i> عرض التفاصيل
                                    </a>
                                </div>
                            </div>

                            <div class="summary-card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="bi bi-check-circle"></i> مكتملة</h3>
                                    <span class="badge bg-success">+8%</span>
                                </div>
                                <div class="card-value">142</div>
                                <div class="card-footer">
                                    <span>هذا الشهر</span>
                                    <a href="#" class="card-link">
                                        <i class="bi bi-arrow-left"></i> عرض التفاصيل
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Workflow Steps -->
                        <div class="workflow-steps">
                            <div class="step active">
                                <div class="step-icon" style="background-color: var(--navy-primary);">1</div>
                                <span class="step-label">استقبال الطلب</span>
                            </div>
                            <div class="step">
                                <div class="step-icon" style="background-color: #1a4a3a;">2</div>
                                <span class="step-label">مراجعة المستندات</span>
                            </div>
                            <div class="step">
                                <div class="step-icon" style="background-color: #1a3a4a;">3</div>
                                <span class="step-label">معاينة الموقع</span>
                            </div>
                            <div class="step">
                                <div class="step-icon" style="background-color: #4a3a1a;">4</div>
                                <span class="step-label">المراجعة الفنية</span>
                            </div>
                            <div class="step">
                                <div class="step-icon" style="background-color: #4a1a2a;">5</div>
                                <span class="step-label">الموافقة النهائية</span>
                            </div>
                            <div class="step">
                                <div class="step-icon" style="background-color: #3a1a4a;">6</div>
                                <span class="step-label">إصدار الترخيص</span>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="quick-actions">
                            <a href="#" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-file-earmark-plus"></i>
                                </div>
                                <span class="action-label">إنشاء طلب جديد</span>
                            </a>
                            <a href="#" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-file-earmark-check"></i>
                                </div>
                                <span class="action-label">مراجعة المستندات</span>
                            </a>
                            <a href="#" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <span class="action-label">جدولة معاينات</span>
                            </a>
                            <a href="#" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-clipboard2-check"></i>
                                </div>
                                <span class="action-label">المراجعة الفنية</span>
                            </a>
                            <a href="#" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <span class="action-label">الموافقة النهائية</span>
                            </a>
                            <a href="#" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <span class="action-label">إصدار التراخيص</span>
                            </a>
                        </div>

                           {{-- الاجدول التراخيص المتعلقه --}}
                          <div class="row mt-4">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="bi bi-exclamation-triangle-fill me-2"></i> الطلبات العالقة</h5>
                                        <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th width="100">رقم الطلب</th>
                                                        <th>المرحلة</th>
                                                        <th>المستفيد</th>
                                                        <th>الموقع</th>
                                                        <th width="120">تاريخ الطلب</th>
                                                        <th width="120">الحالة</th>
                                                        <th width="150">الإجراء</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="">
                                                        <td>#TR-2024-185</td>
                                                        <td><span class="badge bg-phase-2">مراجعة مستندات</span></td>
                                                        <td>شركة النهضة</td>
                                                        <td>صنعاء - حي التحرير</td>
                                                        <td>2024-06-12</td>
                                                        <td><span class="badge bg-warning">متأخر 3 أيام</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary">
                                                                <i class="bi bi-eye me-1"></i> متابعة
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#TR-2024-183</td>
                                                        <td><span class="badge bg-phase-3">معاينة موقع</span></td>
                                                        <td>أحمد علي حسن</td>
                                                        <td>تعز - شارع الجمهورية</td>
                                                        <td>2024-06-11</td>
                                                        <td><span class="badge bg-info">بانتظار الجدولة</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info">
                                                                <i class="bi bi-calendar me-1"></i> جدولة
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#TR-2024-180</td>
                                                        <td><span class="badge bg-phase-4">مراجعة فنية</span></td>
                                                        <td>شركة المستقبل</td>
                                                        <td>عدن - خورمكسر</td>
                                                        <td>2024-06-10</td>
                                                        <td><span class="badge bg-secondary">قيد المعالجة</span></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-secondary">
                                                                <i class="bi bi-clock me-1"></i> متابعة
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5><i class="bi bi-activity me-2"></i> مؤشرات الأداء</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="col-6 mb-4">
                                                <div class="circle-chart">
                                                    <svg viewBox="0 0 36 36">
                                                        <path class="circle-bg"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                        <path class="circle-fill" stroke="#1cc88a"
                                                            stroke-dasharray="75, 100"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    </svg>
                                                    <div class="circle-text">75%</div>
                                                </div>
                                                <h6 class="mt-2">معدل الإنجاز</h6>
                                            </div>
                                            <div class="col-6 mb-4">
                                                <div class="circle-chart">
                                                    <svg viewBox="0 0 36 36">
                                                        <path class="circle-bg"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                        <path class="circle-fill" stroke="#f6c23e"
                                                            stroke-dasharray="42, 100"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    </svg>
                                                    <div class="circle-text">42%</div>
                                                </div>
                                                <h6 class="mt-2">الطلبات المتأخرة</h6>
                                            </div>
                                            <div class="col-6">
                                                <div class="circle-chart">
                                                    <svg viewBox="0 0 36 36">
                                                        <path class="circle-bg"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                        <path class="circle-fill" stroke="#4e73df"
                                                            stroke-dasharray="88, 100"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    </svg>
                                                    <div class="circle-text">88%</div>
                                                </div>
                                                <h6 class="mt-2">رضا العملاء</h6>
                                            </div>
                                            <div class="col-6">
                                                <div class="circle-chart">
                                                    <svg viewBox="0 0 36 36">
                                                        <path class="circle-bg"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                        <path class="circle-fill" stroke="#e74a3b"
                                                            stroke-dasharray="15, 100"
                                                            d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                    </svg>
                                                    <div class="circle-text">15%</div>
                                                </div>
                                                <h6 class="mt-2">الطلبات المرفوضة</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>

                        <!-- Recent Activity -->
                        <div class="recent-activity">
                            <h3 class="activity-title"><i class="bi bi-clock-history"></i> النشاط الأخير</h3>
                            <ul class="activity-list">
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="bi bi-file-earmark-plus"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="activity-message">تم تسجيل طلب جديد #TR-2024-189 بواسطة موظف
                                            الاستقبال</p>
                                        <span class="activity-time">اليوم 10:15 ص</span>
                                    </div>
                                </li>
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="bi bi-file-earmark-check"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="activity-message">تم إكمال مراجعة مستندات الطلب #TR-2024-188</p>
                                        <span class="activity-time">اليوم 09:30 ص</span>
                                    </div>
                                </li>
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="activity-message">تم جدولة معاينة موقع للطلب #TR-2024-187</p>
                                        <span class="activity-time">بالأمس 03:45 م</span>
                                    </div>
                                </li>
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="bi bi-clipboard2-check"></i>
                                    </div>
                                    <div class="activity-content">
                                        <p class="activity-message">تم اعتماد المراجعة الفنية للطلب #TR-2024-185</p>
                                        <span class="activity-time">بالأمس 11:20 ص</span>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    </div>


                    <div class="content-section">
                       
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5><i class="bi bi-bar-chart-line me-2"></i> توزيع الطلبات حسب المحافظة</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="requestsByGovernorateChart" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5><i class="bi bi-pie-chart me-2"></i> توزيع الطلبات حسب النوع</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="requestsTypeChart" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- لوحة موظف الاستقبال -->
            <div class="tab-pane fade" id="reception" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-person-lines-fill me-2"></i> لوحة موظف الاستقبال
                        </h2>
                        <button class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i> إنشاء طلب جديد
                        </button>
                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stat-card bg-phase-1">
                                <div class="card-body">
                                    <h5>طلبات جديدة</h5>
                                    <h2>12</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-file-earmark-plus"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-warning">
                                <div class="card-body">
                                    <h5>طلبات ناقصة</h5>
                                    <h2>3</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-file-excel"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>طلبات مكتملة</h5>
                                    <h2>24</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-list-ul me-2"></i> أحدث الطلبات</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="100">رقم الطلب</th>
                                            <th>نوع الطلب</th>
                                            <th>المستفيد</th>
                                            <th width="120">تاريخ الطلب</th>
                                            <th width="120">حالة المستندات</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#TR-2024-189</td>
                                            <td>ترخيص بناء جديد</td>
                                            <td>عبدالله محمد</td>
                                            <td>2024-06-15</td>
                                            <td><span class="badge bg-danger">ناقص</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil me-1"></i> تعديل
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-188</td>
                                            <td>ترخيص تجديد</td>
                                            <td>شركة الأصالة</td>
                                            <td>2024-06-15</td>
                                            <td><span class="badge bg-success">مكتمل</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-send me-1"></i> إرسال
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-187</td>
                                            <td>ترخيص تعديل</td>
                                            <td>أحمد علي حسن</td>
                                            <td>2024-06-14</td>
                                            <td><span class="badge bg-warning">قيد الإدخال</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-info">
                                                    <i class="bi bi-pencil me-1"></i> إكمال
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-clock-history me-2"></i> النشاط الأخير</h5>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 10:30 ص</small>
                                            <p class="mb-0">تم إنشاء طلب جديد #TR-2024-189</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 09:15 ص</small>
                                            <p class="mb-0">تم رفض طلب #TR-2024-186 بسبب نقص المستندات</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">بالأمس، 03:45 م</small>
                                            <p class="mb-0">تم إرسال طلب #TR-2024-188 لمرحلة المراجعة</p>
                                        </div>
                                        <div class="timeline-item">
                                            <small class="text-muted d-block mb-1">بالأمس، 11:20 ص</small>
                                            <p class="mb-0">تم استقبال 5 طلبات جديدة</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-file-earmark-text me-2"></i> المستندات المطلوبة</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-earmark-pdf text-danger me-3"
                                                    style="font-size: 1.5rem;"></i>
                                                <div>
                                                    <h6 class="mb-0">نموذج طلب الترخيص</h6>
                                                    <small class="text-muted">يجب تعبئته وتوقيعه من المستفيد</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-earmark-image text-primary me-3"
                                                    style="font-size: 1.5rem;"></i>
                                                <div>
                                                    <h6 class="mb-0">صورة من الهوية</h6>
                                                    <small class="text-muted">سارية المفعول</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-earmark-text text-success me-3"
                                                    style="font-size: 1.5rem;"></i>
                                                <div>
                                                    <h6 class="mb-0">سند الملكية</h6>
                                                    <small class="text-muted">مصدق من الجهات المختصة</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-earmark-zip text-warning me-3"
                                                    style="font-size: 1.5rem;"></i>
                                                <div>
                                                    <h6 class="mb-0">المخططات الهندسية</h6>
                                                    <small class="text-muted">PDF أو ملفات CAD</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- لوحة مراجع المستندات -->
            <div class="tab-pane fade" id="documents" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-files me-2"></i> لوحة مراجع المستندات
                        </h2>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                id="documentsFilter" data-bs-toggle="dropdown">
                                <i class="bi bi-funnel me-2"></i> تصفية حسب الحالة
                            </button>
                            <ul class="dropdown-menu dropdown-menu-amr">
                                <li><a class="dropdown-item active" href="#">الكل</a></li>
                                <li><a class="dropdown-item" href="#">بانتظار المراجعة</a></li>
                                <li><a class="dropdown-item" href="#">تحتاج مستندات إضافية</a></li>
                                <li><a class="dropdown-item" href="#">مكتملة</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stat-card bg-phase-2">
                                <div class="card-body">
                                    <h5>طلبات بانتظار المراجعة</h5>
                                    <h2>8</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-hourglass"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-warning">
                                <div class="card-body">
                                    <h5>طلبات ناقصة</h5>
                                    <h2>5</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>طلبات مكتملة</h5>
                                    <h2>12</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-list-check me-2"></i> الطلبات المسندة إليك</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="100">رقم الطلب</th>
                                            <th>المستفيد</th>
                                            <th width="120">تاريخ الإسناد</th>
                                            <th width="150">حالة المراجعة</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#TR-2024-188</td>
                                            <td>شركة الأصالة</td>
                                            <td>2024-06-15</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-phase-2" style="width: 30%">30%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye me-1"></i> مراجعة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-185</td>
                                            <td>شركة النهضة</td>
                                            <td>2024-06-12</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" style="width: 100%">ناقص</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-file-earmark-excel me-1"></i> طلب مستندات
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-182</td>
                                            <td>أحمد علي حسن</td>
                                            <td>2024-06-10</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width: 100%">مكتمل
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-send me-1"></i> إرسال للمعاينة
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-file-earmark-check me-2"></i> قائمة المراجعة</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check1"
                                                    checked>
                                                <label class="form-check-label" for="check1">
                                                    نموذج الطلب مكتمل وموقع
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check2">
                                                <label class="form-check-label" for="check2">
                                                    صورة الهوية سارية المفعول
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check3">
                                                <label class="form-check-label" for="check3">
                                                    سند الملكية مصدق
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check4">
                                                <label class="form-check-label" for="check4">
                                                    المخططات الهندسية كاملة
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check5">
                                                <label class="form-check-label" for="check5">
                                                    شهادة عدم ممانعة الجيران
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-clock-history me-2"></i> سجل المراجعات</h5>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 11:20 ص</small>
                                            <p class="mb-0">تم رفض طلب #TR-2024-185 بسبب نقص المخططات</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">بالأمس، 03:45 م</small>
                                            <p class="mb-0">تم إكمال مراجعة طلب #TR-2024-182</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">بالأمس، 10:15 ص</small>
                                            <p class="mb-0">تم طلب مستند إضافي لطلب #TR-2024-180</p>
                                        </div>
                                        <div class="timeline-item">
                                            <small class="text-muted d-block mb-1">12 يونيو، 09:30 ص</small>
                                            <p class="mb-0">تم استلام 3 طلبات جديدة للمراجعة</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- لوحة معاين المواقع -->
            <div class="tab-pane fade" id="inspection" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-geo-alt me-2"></i> لوحة معاين المواقع
                        </h2>
                        <button class="btn btn-primary">
                            <i class="bi bi-calendar-plus me-2"></i> جدولة معاينة
                        </button>
                    </div>

                    <div class="alert alert-info">
                        <i class="bi bi-info-circle-fill me-2"></i> لديك معاينتين ميدانيتين مجدولتين لهذا الأسبوع
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stat-card bg-phase-3">
                                <div class="card-body">
                                    <h5>طلبات بانتظار المعاينة</h5>
                                    <h2>5</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-hourglass"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-warning">
                                <div class="card-body">
                                    <h5>معاينات مجدولة</h5>
                                    <h2>3</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-calendar-check"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>تقارير مكتملة</h5>
                                    <h2>7</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-file-earmark-check"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-calendar-check me-2"></i> المعاينات المجدولة</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="100">رقم الطلب</th>
                                            <th>الموقع</th>
                                            <th width="150">التاريخ والوقت</th>
                                            <th width="120">الحالة</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#TR-2024-182</td>
                                            <td>صنعاء - حي التحرير</td>
                                            <td>2024-06-17 10:00 ص</td>
                                            <td><span class="badge bg-primary">قيد الانتظار</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-geo-alt me-1"></i> تفاصيل الموقع
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-179</td>
                                            <td>تعز - شارع الجمهورية</td>
                                            <td>2024-06-18 02:00 م</td>
                                            <td><span class="badge bg-primary">قيد الانتظار</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-geo-alt me-1"></i> تفاصيل الموقع
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-176</td>
                                            <td>عدن - خورمكسر</td>
                                            <td>2024-06-20 11:00 ص</td>
                                            <td><span class="badge bg-primary">قيد الانتظار</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-geo-alt me-1"></i> تفاصيل الموقع
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-file-earmark-text me-2"></i> نماذج المعاينة الميدانية</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="100">رقم الطلب</th>
                                            <th>تاريخ المعاينة</th>
                                            <th>حالة الموقع</th>
                                            <th width="120">الحالة</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#TR-2024-175</td>
                                            <td>2024-06-10</td>
                                            <td>مطابق للمواصفات</td>
                                            <td><span class="badge bg-success">مكتمل</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-eye me-1"></i> عرض التقرير
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-172</td>
                                            <td>2024-06-08</td>
                                            <td>يحتاج تعديلات</td>
                                            <td><span class="badge bg-success">مكتمل</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-eye me-1"></i> عرض التقرير
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-170</td>
                                            <td>2024-06-05</td>
                                            <td>غير مطابق</td>
                                            <td><span class="badge bg-success">مكتمل</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-eye me-1"></i> عرض التقرير
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

            <!-- لوحة المراجع الفني -->
            <div class="tab-pane fade" id="technical" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-clipboard2-check me-2"></i> لوحة المراجع الفني
                        </h2>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                id="technicalFilter" data-bs-toggle="dropdown">
                                <i class="bi bi-funnel me-2"></i> تصفية حسب النوع
                            </button>
                            <ul class="dropdown-menu dropdown-menu-amr">
                                <li><a class="dropdown-item active" href="#">الكل</a></li>
                                <li><a class="dropdown-item" href="#">رخص بناء</a></li>
                                <li><a class="dropdown-item" href="#">رخص هدم</a></li>
                                <li><a class="dropdown-item" href="#">رخص تعديل</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stat-card bg-phase-4">
                                <div class="card-body">
                                    <h5>طلبات بانتظار المراجعة</h5>
                                    <h2>6</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-hourglass"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-warning">
                                <div class="card-body">
                                    <h5>طلبات تحتاج تعديلات</h5>
                                    <h2>2</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>طلبات مكتملة</h5>
                                    <h2>15</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-list-check me-2"></i> الطلبات المسندة إليك</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="100">رقم الطلب</th>
                                            <th>نوع الطلب</th>
                                            <th>المستفيد</th>
                                            <th width="120">تاريخ الإسناد</th>
                                            <th width="150">حالة المراجعة</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#TR-2024-180</td>
                                            <td>ترخيص بناء</td>
                                            <td>شركة المستقبل</td>
                                            <td>2024-06-10</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-phase-4" style="width: 40%">40%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye me-1"></i> مراجعة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-178</td>
                                            <td>ترخيص هدم</td>
                                            <td>شركة الأصالة</td>
                                            <td>2024-06-08</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" style="width: 100%">تحتاج
                                                        تعديلات</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil me-1"></i> إبداء الملاحظات
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-175</td>
                                            <td>ترخيص تعديل</td>
                                            <td>فندق الشرق</td>
                                            <td>2024-06-05</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" style="width: 100%">مكتمل
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-send me-1"></i> إرسال للموافقة
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-clipboard2-pulse me-2"></i> قائمة المراجعة الفنية</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="techCheck1">
                                                <label class="form-check-label" for="techCheck1">
                                                    مطابقة المخططات للأنظمة البلدية
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="techCheck2">
                                                <label class="form-check-label" for="techCheck2">
                                                    التأكد من سلامة التصميم الإنشائي
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="techCheck3">
                                                <label class="form-check-label" for="techCheck3">
                                                    مراجعة مساحات الطرق والارتدادات
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="techCheck4">
                                                <label class="form-check-label" for="techCheck4">
                                                    التأكد من شروط السلامة والوقاية
                                                </label>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="techCheck5">
                                                <label class="form-check-label" for="techCheck5">
                                                    مراجعة شروط الخدمات العامة
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-clock-history me-2"></i> سجل المراجعات الفنية</h5>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 09:30 ص</small>
                                            <p class="mb-0">تم إبداء ملاحظات على طلب #TR-2024-178</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">بالأمس، 02:15 م</small>
                                            <p class="mb-0">تم إكمال المراجعة الفنية لطلب #TR-2024-175</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">12 يونيو، 11:45 ص</small>
                                            <p class="mb-0">تم استلام 4 طلبات جديدة للمراجعة الفنية</p>
                                        </div>
                                        <div class="timeline-item">
                                            <small class="text-muted d-block mb-1">10 يونيو، 03:20 م</small>
                                            <p class="mb-0">تم رفض طلب #TR-2024-170 لعدم المطابقة</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- لوحة الموافقة النهائية -->
            <div class="tab-pane fade" id="approval" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-check-circle me-2"></i> لوحة الموافقة النهائية
                        </h2>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary active">الكل</button>
                            <button type="button" class="btn btn-outline-secondary">تحتاج موافقة</button>
                            <button type="button" class="btn btn-outline-secondary">مرفوضة</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stat-card bg-phase-5">
                                <div class="card-body">
                                    <h5>طلبات تحتاج موافقة</h5>
                                    <h2>4</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-hourglass"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>طلبات معتمدة</h5>
                                    <h2>23</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-danger">
                                <div class="card-body">
                                    <h5>طلبات مرفوضة</h5>
                                    <h2>3</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-x-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-list-check me-2"></i> الطلبات الجاهزة للموافقة</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="100">رقم الطلب</th>
                                            <th>نوع الطلب</th>
                                            <th>المستفيد</th>
                                            <th width="120">تاريخ الطلب</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#TR-2024-175</td>
                                            <td>ترخيص بناء</td>
                                            <td>فندق الشرق</td>
                                            <td>2024-06-05</td>
                                            <td>
                                                <button class="btn btn-sm btn-success me-2">
                                                    <i class="bi bi-check me-1"></i> موافقة
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-x me-1"></i> رفض
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-172</td>
                                            <td>ترخيص هدم</td>
                                            <td>شركة المدينة</td>
                                            <td>2024-06-03</td>
                                            <td>
                                                <button class="btn btn-sm btn-success me-2">
                                                    <i class="bi bi-check me-1"></i> موافقة
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-x me-1"></i> رفض
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-170</td>
                                            <td>ترخيص تعديل</td>
                                            <td>أحمد علي حسن</td>
                                            <td>2024-06-01</td>
                                            <td>
                                                <button class="btn btn-sm btn-success me-2">
                                                    <i class="bi bi-check me-1"></i> موافقة
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-x me-1"></i> رفض
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-file-earmark-text me-2"></i> معايير الموافقة</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">اكتمال جميع المستندات المطلوبة</h6>
                                                    <small class="text-muted">مصدقة من الجهات المختصة</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">مطابقة المخططات للأنظمة</h6>
                                                    <small class="text-muted">البلدية والإنشائية</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">تقرير المعاينة الميدانية</h6>
                                                    <small class="text-muted">إيجابي ومطابق</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">خلو الطلب من الملاحظات الفنية</h6>
                                                    <small class="text-muted">أو معالجة الملاحظات</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-clock-history me-2"></i> سجل الموافقات</h5>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 10:15 ص</small>
                                            <p class="mb-0">تم رفض طلب #TR-2024-169 لعدم المطابقة</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">بالأمس، 03:30 م</small>
                                            <p class="mb-0">تم اعتماد طلب #TR-2024-167</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">12 يونيو، 11:20 ص</small>
                                            <p class="mb-0">تم اعتماد طلب #TR-2024-165 بشروط</p>
                                        </div>
                                        <div class="timeline-item">
                                            <small class="text-muted d-block mb-1">10 يونيو، 09:45 ص</small>
                                            <p class="mb-0">تم استلام 5 طلبات جديدة للموافقة</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- لوحة إصدار التراخيص -->
            <div class="tab-pane fade" id="issuance" role="tabpanel">
                <div class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="section-header mb-0">
                            <i class="bi bi-file-earmark-text me-2"></i> لوحة إصدار التراخيص
                        </h2>
                        <button class="btn btn-primary">
                            <i class="bi bi-printer me-2"></i> طباعة دفعة جديدة
                        </button>
                    </div>

                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill me-2"></i> لديك 3 تراخيص جاهزة للإصدار اليوم
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card stat-card bg-phase-6">
                                <div class="card-body">
                                    <h5>تراخيص جاهزة للإصدار</h5>
                                    <h2>3</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-success">
                                <div class="card-body">
                                    <h5>تراخيص صادرة</h5>
                                    <h2>24</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card stat-card bg-info">
                                <div class="card-body">
                                    <h5>تراخيص منتهية</h5>
                                    <h2>5</h2>
                                    <a href="#">
                                        عرض التفاصيل <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                                <i class="bi bi-clock-history"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h5><i class="bi bi-list-ul me-2"></i> التراخيص الجاهزة للإصدار</h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th width="100">رقم الطلب</th>
                                            <th>رقم الترخيص</th>
                                            <th>المستفيد</th>
                                            <th width="120">تاريخ الإصدار</th>
                                            <th width="120">مدة الترخيص</th>
                                            <th width="150">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#TR-2024-175</td>
                                            <td>TR-2024-00175</td>
                                            <td>فندق الشرق</td>
                                            <td>2024-06-18</td>
                                            <td>12 شهر</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-2">
                                                    <i class="bi bi-eye me-1"></i> معاينة
                                                </button>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-printer me-1"></i> طباعة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-172</td>
                                            <td>TR-2024-00172</td>
                                            <td>شركة المدينة</td>
                                            <td>2024-06-18</td>
                                            <td>6 أشهر</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-2">
                                                    <i class="bi bi-eye me-1"></i> معاينة
                                                </button>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-printer me-1"></i> طباعة
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#TR-2024-170</td>
                                            <td>TR-2024-00170</td>
                                            <td>أحمد علي حسن</td>
                                            <td>2024-06-18</td>
                                            <td>24 شهر</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary me-2">
                                                    <i class="bi bi-eye me-1"></i> معاينة
                                                </button>
                                                <button class="btn btn-sm btn-success">
                                                    <i class="bi bi-printer me-1"></i> طباعة
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-file-earmark-text me-2"></i> محتوى وثيقة الترخيص</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-1-circle-fill text-primary me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">معلومات أساسية</h6>
                                                    <small class="text-muted">رقم الترخيص، التاريخ، النوع،
                                                        المدة</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-2-circle-fill text-primary me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">معلومات المستفيد</h6>
                                                    <small class="text-muted">الاسم، الهوية، العنوان، الاتصال</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-3-circle-fill text-primary me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">معلومات الموقع</h6>
                                                    <small class="text-muted">المحافظة، المديرية، الحي، العنوان</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-4-circle-fill text-primary me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">تفاصيل الترخيص</h6>
                                                    <small class="text-muted">المساحة، عدد الطوابق، الاستخدام</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item border-0 py-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-5-circle-fill text-primary me-3"></i>
                                                <div>
                                                    <h6 class="mb-0">الشروط والالتزامات</h6>
                                                    <small class="text-muted">شروط الترخيص والالتزامات
                                                        القانونية</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-clock-history me-2"></i> سجل الإصدارات</h5>
                                </div>
                                <div class="card-body">
                                    <div class="timeline">
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">اليوم، 09:15 ص</small>
                                            <p class="mb-0">تم إصدار 3 تراخيص جديدة</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">بالأمس، 02:30 م</small>
                                            <p class="mb-0">تم إصدار ترخيص لشركة النهضة</p>
                                        </div>
                                        <div class="timeline-item mb-4">
                                            <small class="text-muted d-block mb-1">12 يونيو، 10:45 ص</small>
                                            <p class="mb-0">تم تجديد ترخيص لفندق الشرق</p>
                                        </div>
                                        <div class="timeline-item">
                                            <small class="text-muted d-block mb-1">10 يونيو، 11:20 ص</small>
                                            <p class="mb-0">تم إرسال إشعارات لـ 5 تراخيص منتهية</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeCharts();
        });

        function initializeCharts() {
            // توزيع الطلبات حسب المحافظة
            if (document.getElementById("requestsByGovernorateChart")) {
                const ctxGovernorate = document.getElementById("requestsByGovernorateChart").getContext("2d");
                new Chart(ctxGovernorate, {
                    type: "bar",
                    data: {
                        labels: ["صنعاء", "عدن", "تعز", "حضرموت", "إب", "الحديدة"],
                        datasets: [{
                            label: "عدد الطلبات",
                            data: [120, 85, 75, 50, 45, 40],
                            backgroundColor: [
                                "rgba(78, 115, 223, 0.6)",
                                "rgba(28, 200, 138, 0.6)",
                                "rgba(54, 185, 204, 0.6)",
                                "rgba(246, 194, 62, 0.6)",
                                "rgba(231, 74, 59, 0.6)",
                                "rgba(111, 66, 193, 0.6)"
                            ],
                            borderColor: [
                                "rgba(78, 115, 223, 1)",
                                "rgba(28, 200, 138, 1)",
                                "rgba(54, 185, 204, 1)",
                                "rgba(246, 194, 62, 1)",
                                "rgba(231, 74, 59, 1)",
                                "rgba(111, 66, 193, 1)"
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // توزيع الطلبات حسب النوع
            if (document.getElementById("requestsTypeChart")) {
                const ctxRequestsType = document.getElementById("requestsTypeChart").getContext("2d");
                new Chart(ctxRequestsType, {
                    type: "pie",
                    data: {
                        labels: ["رخص بناء", "رخص هدم", "رخص تعديل", "رخص ترميم", "رخص إضافة"],
                        datasets: [{
                            data: [120, 90, 45, 30, 15],
                            backgroundColor: [
                                "rgba(78, 115, 223, 0.6)",
                                "rgba(231, 74, 59, 0.6)",
                                "rgba(246, 194, 62, 0.6)",
                                "rgba(28, 200, 138, 0.6)",
                                "rgba(111, 66, 193, 0.6)"
                            ],
                            borderColor: [
                                "rgba(78, 115, 223, 1)",
                                "rgba(231, 74, 59, 1)",
                                "rgba(246, 194, 62, 1)",
                                "rgba(28, 200, 138, 1)",
                                "rgba(111, 66, 193, 1)"
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: "bottom"
                            },
                            title: {
                                display: false
                            }
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>
