<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة الطلبات الحكومية</title>
<!-- تضمين مكتبة jsPDF و jsPDF-AutoTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
        }

        :root {
            --primary: #4e73df;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --info: #36b9cc;
            --secondary: #858796;
            --success: #1cc88a;
            --purple: #6f42c1;
            --dark: #5a5c69;
        }

        .border-left-primary {
            border-left-color: var(--primary) !important;
        }

        .border-left-warning {
            border-left-color: var(--warning) !important;
        }

        .border-left-danger {
            border-left-color: var(--danger) !important;
        }

        .border-left-info {
            border-left-color: var(--info) !important;
        }

        .border-left-secondary {
            border-left-color: var(--secondary) !important;
        }

        .border-left-success {
            border-left-color: var(--success) !important;
        }

        .border-left-purple {
            border-left-color: var(--purple) !important;
        }

        .border-left-dark {
            border-left-color: var(--dark) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .text-warning {
            color: var(--warning) !important;
        }

        .text-danger {
            color: var(--danger) !important;
        }

        .text-info {
            color: var(--info) !important;
        }

        .text-secondary {
            color: var(--secondary) !important;
        }

        .text-success {
            color: var(--success) !important;
        }

        .text-purple {
            color: var(--purple) !important;
        }

        .text-dark {
            color: var(--dark) !important;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f7fa;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: none;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 500;
            padding: 10px 20px;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom: 3px solid var(--primary-color);
            background-color: transparent;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: #f8f9fa;
            color: var(--primary-color);
            font-weight: 600;
            border-top: none;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .priority-high {
            border-left: 4px solid var(--danger-color);
        }

        .priority-medium {
            border-left: 4px solid var(--warning-color);
        }

        .priority-low {
            border-left: 4px solid var(--info-color);
        }

        .badge {
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 13px;
        }

        .search-box {
            position: relative;
            max-width: 300px;
        }

        .search-box input {
            padding-right: 40px;
            border-radius: 20px;
        }

        .search-box i {
            position: absolute;
            right: 15px;
            top: 10px;
            color: #6c757d;
        }

        .stats-card {
            border-left: 4px solid;
            transition: all 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .stats-card .count {
            font-size: 24px;
            font-weight: 700;
        }

        .stats-card .label {
            font-size: 14px;
            color: #6c757d;
        }

        /*************************************/
        .card-bo {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }


        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
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
            padding: 20px 10px 10px 10px;
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


        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgba(212, 175, 55, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: var(--gold-primary);
            font-size: 24px;
        }

        .action-label {
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
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



</style>

</head>

<body>
    <!-- إدارة الطلبات -->
    <section id="requests" class="content-section p-4">
    <header class="app-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="app-title">
                    <i class="fas fa-money-bill-wave"></i>
                     إدارة الطلبات
                </h1>
                <p class="app-subtitle"> إدارة ومراجعة الطلبات (سير العمل)</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <div class="d-flex justify-content-md-end gap-2">
                    {{-- <button class="btn btn-outline-light btn-icon">
                        <i class="fas fa-sync-alt"></i>
                    </button> --}}
                    <button type="button" class="btn btn-outline-light btn-icon" title="بحث" id="searchBtn">
                             <i class="fas fa-sync-alt"></i>
                        </button>
                    {{-- <button class="btn btn-outline-light btn-icon">
                        <i class="fas fa-cog"></i>
                    </button>
                    <button class="btn btn-light" style="color: var(--primary);">
                        <i class="fas fa-bell me-1"></i>
                        <span class="d-none d-md-inline">الإشعارات</span>
                    </button> --}}
                </div>
            </div>
        </div>
    </header>
        {{-- الاشعار   --}}
        {{-- <div class="alert alert-info">
            <i class="bi bi-info-circle-fill me-2"></i> لديك معاينتين ميدانيتين مجدولتين لهذا الأسبوع
        </div> --}}

        <!-- Quick Actions -->
        <div class="quick-actions">


            <!-- طلبات جديدة -->
            <div class="card stats-card border-left-primary">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="طلبات جديدة">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-file-earmark-plus"></i>
                        </div>
                        <div id="total_new" class="count text-primary">0</div>
                    </div>
                    <span class="action-label">طلبات جديدة</span>
                </a>
            </div>



            <!-- قيد المراجعة -->
            <div class="card stats-card border-left-warning">

                <a class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="قيد المراجعة">

                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <div id="total_under_review" class="count text-warning">0</div>
                    </div>
                    <span class="action-label">قيد المراجعة</span>
                </a>
            </div>

            <!-- طلبات معادة -->
            <div class="card stats-card border-left-danger">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="طلبات معادة">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </div>
                        <div id="total_returned" class="count text-danger">0</div>
                    </div>
                    <span class="action-label">طلبات معادة</span>
                </a>
            </div>

            <!-- معاينة الموقع -->
            <div class="card stats-card border-left-info">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="مسندة للمهندس">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div id="total_assigned_engineer" class="count text-info">0</div>
                    </div>
                    <span class="action-label">معاينة الموقع</span>
                </a>
            </div>

            <!-- المراجعة الفنية -->
            <div class="card stats-card border-left-secondary">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="المراجعة الفنية">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-clipboard2-check"></i>
                        </div>
                        <div id="total_tech_review" class="count text-secondary">0</div>
                    </div>
                    <span class="action-label">المراجعة الفنية</span>
                </a>
            </div>

            <!-- الموافقة النهائية -->
            <div class="card stats-card border-left-success">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="موافق عليه">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div id="total_approved" class="count text-success">0</div>
                    </div>
                    <span class="action-label">الموافقة النهائية</span>
                </a>
            </div>

            <!-- طلبات بانتظار الدفع -->
            <div class="card stats-card border-left-purple">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="جاهز للدفع">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div id="total_ready_to_pay" class="count text-purple">0</div>
                    </div>
                    <span class="action-label">طلبات بانتظار الدفع</span>
                </a>
            </div>

            <!-- إصدار التراخيص -->
            <div class="card stats-card border-left-dark">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="مكتمل">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div id="total_completed" class="count text-dark">0</div>
                    </div>
                    <span class="action-label">إصدار التراخيص</span>
                </a>
            </div>

            <!-- طلبات مرفوضة -->
            <div class="card stats-card border-left-danger">
                <a href="#" class="action-btn" id="searchBtnRequests"
                    data-reload-url="{{ route('reload.requests') }}" data-reload-container="#RequestsTableBody"
                    data-status="مرفوض">
                    <div class="card-bo">
                        <div class="action-icon">
                            <i class="bi bi-x-circle"></i>
                        </div>
                        <div id="total_rejected" class="count text-danger">0</div>
                    </div>
                    <span class="action-label">طلبات مرفوضة</span>
                </a>
            </div>

        </div>

        {{-- <!-- Header with Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stats-card border-left-primary">
                    <div class="card-body">
                        <div class="count text-primary">1,248</div>
                        <div class="label">إجمالي الطلبات</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card border-left-warning">
                    <div class="card-body">
                        <div class="count text-warning">58</div>
                        <div class="label">قيد المراجعة</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card border-left-info">
                    <div class="card-body">
                        <div class="count text-info">32</div>
                        <div class="label">مسندة للموظفين</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card border-left-success">
                    <div class="card-body">
                        <div class="count text-success">1,158</div>
                        <div class="label">طلبات مكتملة</div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Main Card -->
        <div class="card">
            <!-- Card Header with Tabs -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><i class="bi bi-list-check me-2"></i>إدارة الطلبات الحكومية</h5>

                    <div class="d-flex align-items-center">
                        <div class="search-box me-3">
                            <input type="text" class="form-control form-control-sm"
                                data-reload-url="{{ route('requests.search') }}" placeholder="بحث برقم الطلب.....">
                            <i class="bi bi-search"></i>
                        </div>

                        <div class="search-box me-3" style="margin-right: 30px; margin-left: 100px">
                            <input type="text" class="form-control form-control-sm"
                                data-reload-url="{{ route('requests.search.name') }}"
                                placeholder="بحث اسم مقدم الطلب.....">
                            <i class="bi bi-search"></i>
                        </div>

                        {{-- <div class="btn-group me-2">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-filter me-1"></i>تصفية
                            </button>
                            <ul class="dropdown-menu dropdown-menu-amr dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">هذا الأسبوع</a></li>
                                <li><a class="dropdown-item" href="#">هذا الشهر</a></li>
                                <li><a class="dropdown-item" href="#">الربع الأول</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">عرض الكل</a></li>
                            </ul>
                        </div> --}}

                        {{-- <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-printer me-1"></i>طباعة
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-file-earmark-excel me-1"></i>تصدير
                            </button>
                        </div> --}}

                        <a href="#" class="ajax-link btn btn-sm btn-primary" data-page="requests.create.partials.Breadcrumb_Receptionist">
                            <i class="bi bi-plus-lg me-1"></i>طلب جديد
                        </a>
                    </div>
                </div>

                {{-- <ul class="nav nav-tabs card-header-tabs mt-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#allRequests">
                            <i class="bi bi-list-ul me-1"></i>الكل
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#pendingRequests">
                            <i class="bi bi-hourglass-split me-1"></i>قيد المراجعة
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#assignedRequests">
                            <i class="bi bi-person-check me-1"></i>مسندة
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#completedRequests">
                            <i class="bi bi-check-circle me-1"></i>مكتملة
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#rejectedRequests">
                            <i class="bi bi-x-circle me-1"></i>ملغاة
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#editRequests">
                            <i class="bi bi-pencil-square me-1"></i>طلبات تعديل
                        </a>
                    </li>
                </ul> --}}
            </div>

            <!-- Card Body with Tab Content -->
            <div class="card-body">
                <div class="tab-content">

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="allRequests">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="row">#</th>
                                            <th>رقم الطلب</th>
                                            <th>اسم مقدم الطلب</th>
                                            <th>نوع الرخصة</th>
                                            <th>نوع الطلب</th>
                                            <th>تاريخ الطلب</th>
                                            <th>الحالة</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody id="RequestsTableBody">

                                        @include('modules.auth.requests.track.requests_mangement_table', [
                                            'data' => $data ?? collect([]),
                                        ])

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <!-- تبويبات أخرى -->
                        <div class="tab-pane fade" id="pendingRequests">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>العميل</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="priority-high">
                                        <td>#2024-0158</td>
                                        <td>ترخيص بناء</td>
                                        <td>شركة التقنية</td>
                                        <td>2024-06-10</td>
                                        <td>
                                            <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                                                data-page="requests.track.request-details" class="nav-link">
                                                <i class="bi bi-eye"></i> عرض
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="assignedRequests">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>العميل</th>
                                        <th>المهندس المسؤول</th>
                                        <th>تاريخ التعيين</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#2024-0157</td>
                                        <td>ترخيص هدم</td>
                                        <td>شركة البناء الحديث</td>
                                        <td>أحمد سعيد</td>
                                        <td>2024-06-09</td>
                                        <td>
                                            <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                                                data-page="requests.track.request-details" class="nav-link">
                                                <i class="bi bi-eye"></i> عرض
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="completedRequests">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>العميل</th>
                                        <th>تاريخ الإنجاز</th>
                                        <th>المهندس المسؤول</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#2024-0156</td>
                                        <td>ترخيص تعديل</td>
                                        <td>فيلا سكنية</td>
                                        <td>2024-06-08</td>
                                        <td>سارة علي</td>
                                        <td>
                                            <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                                                data-page="requests.track.request-details" class="nav-link">
                                                <i class="bi bi-eye"></i> عرض
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="rejectedRequests">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>العميل</th>
                                        <th>تاريخ الرفض</th>
                                        <th>سبب الرفض</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="priority-low">
                                        <td>#2024-0154</td>
                                        <td>استشارة هندسية</td>
                                        <td>أحمد محمد</td>
                                        <td>2024-06-05</td>
                                        <td>نقص في المستندات</td>
                                        <td>
                                            <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                                                data-page="requests.track.request-details" class="nav-link">
                                                <i class="bi bi-eye"></i> عرض
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                    </div>

                    {{-- <!-- All Requests Tab -->
                    <div class="tab-pane fade show active" id="allRequests">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th width="120">رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>الجهة/العميل</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th>حالة الطلب</th>
                                        <th>الأولوية</th>
                                        <th width="150">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="priority-high">
                                        <td>#GOV-2024-0158</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-building me-2 text-primary"></i>
                                                ترخيص بناء
                                            </div>
                                        </td>
                                        <td>شركة التقنية المحدودة</td>
                                        <td>10/06/2024</td>
                                        <td><span class="badge bg-warning">قيد المراجعة</span></td>
                                        <td><span class="badge bg-danger">عاجل</span></td>
                                        <td>
                                            <button class="action-btn btn-outline-primary" title="عرض">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="action-btn btn-outline-secondary" title="تعديل">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="action-btn btn-outline-danger" title="حذف">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#GOV-2024-0157</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-hammer me-2 text-info"></i>
                                                ترخيص هدم
                                            </div>
                                        </td>
                                        <td>شركة البناء الحديث</td>
                                        <td>09/06/2024</td>
                                        <td><span class="badge bg-info">مسندة للمهندس</span></td>
                                        <td><span class="badge bg-warning">متوسطة</span></td>
                                        <td>
                                            <button class="action-btn btn-outline-primary" title="عرض">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="action-btn btn-outline-secondary" title="تعديل">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#GOV-2024-0156</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-house-add me-2 text-success"></i>
                                                ترخيص تعديل
                                            </div>
                                        </td>
                                        <td>فيلا سكنية - منطقة الشرق</td>
                                        <td>08/06/2024</td>
                                        <td><span class="badge bg-success">مكتملة</span></td>
                                        <td><span class="badge bg-secondary">عادية</span></td>
                                        <td>
                                            <button class="action-btn btn-outline-primary" title="عرض">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="action-btn btn-outline-success" title="طباعة">
                                                <i class="bi bi-printer"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="priority-medium">
                                        <td>#GOV-2024-0155</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-palette me-2 text-purple"></i>
                                                تصميم هندسي
                                            </div>
                                        </td>
                                        <td>شركة النخيل العقارية</td>
                                        <td>07/06/2024</td>
                                        <td><span class="badge bg-secondary">طلب تعديلات</span></td>
                                        <td><span class="badge bg-warning">متوسطة</span></td>
                                        <td>
                                            <button class="action-btn btn-outline-primary" title="عرض">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="action-btn btn-outline-secondary" title="تعديل">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="priority-low">
                                        <td>#GOV-2024-0154</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-chat-square-text me-2 text-info"></i>
                                                استشارة هندسية
                                            </div>
                                        </td>
                                        <td>أحمد محمد السعيد</td>
                                        <td>05/06/2024</td>
                                        <td><span class="badge bg-danger">ملغاة</span></td>
                                        <td><span class="badge bg-info">منخفضة</span></td>
                                        <td>
                                            <button class="action-btn btn-outline-primary" title="عرض">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="action-btn btn-outline-dark" title="أرشفة">
                                                <i class="bi bi-archive"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">السابق</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">التالي</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Pending Requests Tab -->
                    <div class="tab-pane fade" id="pendingRequests">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>يوجد 58 طلب قيد المراجعة في النظام
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>الجهة/العميل</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="priority-high">
                                        <td>#GOV-2024-0158</td>
                                        <td>ترخيص بناء</td>
                                        <td>شركة التقنية المحدودة</td>
                                        <td>10/06/2024</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-eye"></i> عرض
                                            </button>
                                            <button class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-check"></i> اعتماد
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Assigned Requests Tab -->
                    <div class="tab-pane fade" id="assignedRequests">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>الجهة/العميل</th>
                                        <th>المسؤول</th>
                                        <th>تاريخ التعيين</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#GOV-2024-0157</td>
                                        <td>ترخيص هدم</td>
                                        <td>شركة البناء الحديث</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/30" class="rounded-circle me-2" width="30" height="30">
                                                م. أحمد سعيد
                                            </div>
                                        </td>
                                        <td>09/06/2024</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-eye"></i> عرض
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-arrow-left-right"></i> إعادة توجيه
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Completed Requests Tab -->
                    <div class="tab-pane fade" id="completedRequests">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>الجهة/العميل</th>
                                        <th>تاريخ الإنجاز</th>
                                        <th>المسؤول</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#GOV-2024-0156</td>
                                        <td>ترخيص تعديل</td>
                                        <td>فيلا سكنية - منطقة الشرق</td>
                                        <td>08/06/2024</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/30" class="rounded-circle me-2" width="30" height="30">
                                                م. سارة علي
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-eye"></i> عرض
                                            </button>
                                            <button class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-printer"></i> طباعة
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Rejected Requests Tab -->
                    <div class="tab-pane fade" id="rejectedRequests">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>الجهة/العميل</th>
                                        <th>تاريخ الرفض</th>
                                        <th>سبب الرفض</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="priority-low">
                                        <td>#GOV-2024-0154</td>
                                        <td>استشارة هندسية</td>
                                        <td>أحمد محمد السعيد</td>
                                        <td>05/06/2024</td>
                                        <td>نقص في المستندات المطلوبة</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-eye"></i> عرض
                                            </button>
                                            <button class="btn btn-sm btn-outline-dark">
                                                <i class="bi bi-archive"></i> أرشفة
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Edit Requests Tab -->
                    <div class="tab-pane fade" id="editRequests">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>الجهة/العميل</th>
                                        <th>تاريخ الطلب</th>
                                        <th>ملاحظات التعديل</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="priority-medium">
                                        <td>#GOV-2024-0155</td>
                                        <td>تصميم هندسي</td>
                                        <td>شركة النخيل العقارية</td>
                                        <td>07/06/2024</td>
                                        <td>يجب تعديل المساحات حسب اللائحة الجديدة</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-eye"></i> عرض
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-pencil"></i> تعديل
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
  @vite(['resources/js/layouts/ajax-crud.js'])
@vite(['resources/js/layouts/Ajax.js'])
     <script>

        ///////////////////////////يعرض مجموع طلبات كل حاله
        $(document).ready(function() {
            $.ajax({
                url: "/stage_counts",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log("✅ البيانات المسترجعة:", data);

                    // تحديث كل ديف برقم الحالة المناسب
                    $("#total_new").text(data.total_new);
                    $("#total_under_review").text(data.total_under_review);
                    $("#total_returned").text(data.total_returned);
                    $("#total_assigned_engineer").text(data.total_assigned_engineer);
                    $("#total_tech_review").text(data.total_tech_review);
                    $("#total_approved").text(data.total_approved);
                    $("#total_ready_to_pay").text(data.total_ready_to_pay);
                    $("#total_completed").text(data.total_completed);
                    $("#total_rejected").text(data.total_rejected);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                }
            });
        });
    </script>



<!-- Payment Modal (global) -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-cash-coin ms-2"></i> سداد الرسوم</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="f_paymentModal">
            <div class="modal-body">
        <div class="mb-2">
            <label class="form-label">رقم الطلب</label>
            <input type="text" id="pay_request_id" class="form-control" readonly>
        </div>
        <div class="mb-2">
            <label class="form-label">إجمالي مستحق (غير مدفوع)</label>
            <input type="text" id="pay_unpaid_total" class="form-control" readonly>
        </div>
        <div class="mb-2">
            <label class="form-label">طريقة الدفع</label>
            <select id="pay_method" class="form-select">
                <option value="">اختر طريقة الدفع</option>
                <option value="بطاقة ائتمان">بطاقة ائتمان</option>
                <option value="تحويل بنكي">تحويل بنكي</option>
                <option value="نقدي">نقدي</option>
                <option value="محفظة إلكترونية">محفظة إلكترونية</option>
            </select>
        </div>

        <!-- حقول إضافية حسب طريقة الدفع -->
        <div id="extra_fields"></div>

        <div class="alert alert-info small" id="pay_info_box" style="display:none;"></div>
        <div class="alert alert-danger small" id="pay_error_box" style="display:none;"></div>
       </div>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button type="button" class="btn btn-primary" id="btnDoPay">
            <i class="bi bi-credit-card"></i> دفع الآن
        </button>
      </div>
    </div>
  </div>
</div>



<!-- Modal سند عرض -->

<!-- مودل عرض السند -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="receiptModalLabel"><i class="bi bi-receipt"></i> سند عرض</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="receiptContent">
        <div class="text-center text-muted">
          <i class="bi bi-hourglass-split"></i> جاري تحميل السند...
        </div>
      </div>
      <div class="modal-footer">
        <button id="printReceipt" class="btn btn-outline-primary"><i class="bi bi-printer"></i> طباعة</button>
        <button id="downloadReceipt" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i> حفظ PDF</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>


<!-- مودل عرض الرخصة -->
<div class="modal fade" id="licenseModal" tabindex="-1" aria-labelledby="licenseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="licenseModalLabel"><i class="bi bi-file-earmark-text"></i> رخصة البناء</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="licenseContent">
        <div class="text-center text-muted">
          <i class="bi bi-hourglass-split"></i> جاري تحميل الرخصة...
        </div>
      </div>
      <div class="modal-footer">
        <button id="printLicense" class="btn btn-outline-primary"><i class="bi bi-printer"></i> طباعة</button>
        <button id="downloadLicense" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i> حفظ PDF</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>



<script>
$(document).on("click", ".btn-view-receipt", function () {
    let requestId = $(this).data("id");

    $("#receiptModal").modal("show");
    $("#receiptContent").html('<div class="text-center text-muted"><i class="bi bi-hourglass-split"></i> جاري تحميل السند...</div>');

    // جلب بيانات السند عبر Ajax
    $.get("/requests/" + requestId + "/receipt", function (data) {
        $("#receiptContent").html(data.html);
    });
});

// طباعة السند
$(document).on("click", "#printReceipt", function () {
    let printContents = document.getElementById("receiptContent").innerHTML;
    let newWindow = window.open("", "", "width=900,height=650");
    newWindow.document.write("<html><head><title>طباعة السند</title></head><body>" + printContents + "</body></html>");
    newWindow.document.close();
    newWindow.print();
});

// تحميل PDF باستخدام jsPDF
$(document).on("click", "#downloadReceipt", function () {
    var receipt = document.getElementById("receiptContent");

    html2canvas(receipt, {scale: 2}).then(canvas => {
        const imgData = canvas.toDataURL("image/png");
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({
            orientation: 'p',
            unit: 'mm',
            format: 'a4'
        });

        // أبعاد الصورة بالنسبة للـ PDF
        var imgProps = pdf.getImageProperties(imgData);
        var pdfWidth = pdf.internal.pageSize.getWidth();
        var pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save("receipt.pdf");
    });
});

</script>


{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> --}}

<script>
$(document).on('click', '.amr_Eng', function(e) {
    e.preventDefault();

    var requestId = $(this).data('id');
    var page = $(this).data('page');

    $('#licenseModal').modal('show');
    $('#licenseContent').html('<div class="text-center text-muted"><i class="bi bi-hourglass-split"></i> جاري تحميل الرخصة...</div>');

    $.get('/building-permit/' + requestId, function(data) {
        $('#licenseContent').html(data.html);
    });
});

// طباعة الرخصة
$(document).on("click", "#printLicense", function () {
    let printContents = document.getElementById("licenseContent").innerHTML;
    let newWindow = window.open("", "", "width=1000,height=800");
    newWindow.document.write("<html><head><title>رخصة البناء</title></head><body>" + printContents + "</body></html>");
    newWindow.document.close();
    newWindow.print();
});

// تحميل PDF
$(document).on("click", "#downloadLicense", function () {
    const { jsPDF } = window.jspdf;

    // إنشاء PDF أفقي (غيّر orientation إلى 'p' لو تريده عمودي)
    var pdf = new jsPDF({ orientation: 'l', unit: 'mm', format: 'a4' });

    // التقاط محتوى المودل وتحويله لصورة
    html2canvas(document.querySelector("#licenseContent"), { scale: 2 }).then(canvas => {
        var imgData = canvas.toDataURL("image/png");

        // أبعاد الصورة بالنسبة للـ PDF
        var imgProps = pdf.getImageProperties(imgData);
        var pdfWidth = pdf.internal.pageSize.getWidth();
        var pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save("building_permit.pdf");
    });
});

</script>

<script>
    (function(){
    if (window.__PAYMENT_BIND) return;
    window.__PAYMENT_BIND = true;

    let modalEl = document.getElementById('paymentModal');
    let bsModal;

    function ensureModal(){
        if (!window.bootstrap) return;
        bsModal = bsModal || new bootstrap.Modal(modalEl);
    }

    // عرض الحقول الإضافية حسب طريقة الدفع
    $(document).on("change", "#pay_method", function(){
        const method = $(this).val();
        let html = "";
        if (method === "بطاقة ائتمان") {
        html = `
            <div class="mb-2"><label>اسم حامل البطاقة</label>
            <input type="text" id="card_holder" class="form-control"></div>
            <div class="mb-2"><label>رقم البطاقة</label>
            <input type="text" id="card_number" class="form-control"></div>
            <div class="row">
            <div class="col"><label>شهر الانتهاء</label>
                <input type="number" id="expiry_month" class="form-control"></div>
            <div class="col"><label>سنة الانتهاء</label>
                <input type="number" id="expiry_year" class="form-control"></div>
            </div>
            <div class="mb-2"><label>CVV</label>
            <input type="number" id="cvv" class="form-control"></div>
        `;
        } else if (method === "تحويل بنكي") {
        html = `
            <div class="mb-2"><label>اسم البنك</label>
            <input type="text" id="bank_name" class="form-control"></div>
            <div class="mb-2"><label>رقم الحوالة</label>
            <input type="text" id="transfer_ref" class="form-control"></div>
        `;
        } else if (method === "محفظة إلكترونية") {
        html = `
            <div class="mb-2"><label>مزود الخدمة</label>
            <input type="text" id="wallet_provider" class="form-control"></div>
            <div class="mb-2"><label>رقم المعاملة</label>
            <input type="text" id="wallet_txn_id" class="form-control"></div>
        `;
        }
        $("#extra_fields").html(html);
    });

    // فتح المودال
    $(document).on('click', ".payment", function(e){
        e.preventDefault();
        const requestId = $(this).data('id');
        $('#pay_request_id').val(requestId);
        $('#pay_unpaid_total').val('...');

        ensureModal();
        if (bsModal) bsModal.show();

        $.getJSON("{{ route('payments.info', ['requestId' => 'REQ_ID']) }}".replace('REQ_ID', requestId), function(res){
            $('#pay_unpaid_total').val(res.unpaid_total);
            if (res.invoice_number) {
                $('#pay_info_box').text('رقم الفاتورة: ' + res.invoice_number + ' | الحالة: ' + res.invoice_status + ' | الإجمالي: ' + res.invoice_total).show();
            }
        }).fail(function(){
            $('#pay_error_box').text('تعذر جلب معلومات الدفع').show();
        });
    });

    // تنفيذ الدفع
    $(document).on('click', '#btnDoPay', function(){
        const requestId = $('#pay_request_id').val();
        const method = $('#pay_method').val();

        $('#pay_error_box').hide();
        let data = {
        _token: '{{ csrf_token() }}',
        request_id: requestId,
        payment_method: method
        };

        if (!method) {
        $('#pay_error_box').text('اختر طريقة الدفع').show();
        return;
        }

        // إضافة الحقول حسب نوع الدفع
        if (method === "بطاقة ائتمان") {
        data.card_holder = $("#card_holder").val();
        data.card_number = $("#card_number").val();
        data.expiry_month = $("#expiry_month").val();
        data.expiry_year = $("#expiry_year").val();
        data.cvv = $("#cvv").val();
        } else if (method === "تحويل بنكي") {
        data.bank_name = $("#bank_name").val();
        data.transfer_ref = $("#transfer_ref").val();
        } else if (method === "محفظة إلكترونية") {
        data.wallet_provider = $("#wallet_provider").val();
        data.wallet_txn_id = $("#wallet_txn_id").val();
        }

    $.ajax({
    url: "{{ route('payments.charge') }}",
    method: 'POST',
    contentType: 'application/json',
    data: JSON.stringify(data),
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
        success: function(res){
            if (res.success) {
            $('#pay_info_box').removeClass('alert-info').addClass('alert-success')
                .text('تم الدفع بنجاح. سند رقم: ' + res.receipt_number + '، المبلغ: ' + res.paid_amount).show();

                $('#f_paymentModal').reset();
            if (window.reloadRequestsList) {
                window.reloadRequestsList();
            }
            } else {
            $('#pay_error_box').text(res.message || 'تعذر إتمام العملية').show();
            }
        },
        error: function(xhr){
            let msg = 'تعذر إتمام العملية';
            if (xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
            $('#pay_error_box').text(msg).show();
        }
        });
    });
    })();
</script>


</body>

</html>
