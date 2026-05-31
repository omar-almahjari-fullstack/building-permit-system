 <style>
        :root {
            --main-blue: #0a1f3a;
            --secondary-blue: #1a365d;
            --accent-gold: #d4af37;
            --light-bg: #f8f9fa;
        }

        .filter-section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: var(--main-blue);
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 8px 15px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--main-blue);
            box-shadow: 0 0 0 0.25rem rgba(10, 31, 58, 0.15);
        }

        .table-responsive {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: var(--main-blue);
            color: white;
            font-weight: 600;
            border-bottom: 3px solid var(--accent-gold);
        }

        .table td {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(10, 31, 58, 0.05);
        }

        .form-select-sm {
            padding: 4px 8px;
            font-size: 0.875rem;
        }

        .btn-outline-primary {
            color: var(--main-blue);
            border-color: var(--main-blue);
        }

        .btn-outline-primary:hover {
            background-color: var(--main-blue);
            color: white;
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--main-blue);
            border-color: var(--main-blue);
        }

        .pagination .page-link {
            color: var(--main-blue);
        }

        .showing-entries {
            color: #666;
            font-size: 0.9rem;
            padding-top: 8px;
        }

        .status-select option[value="مكتمل"] {
            color: #28a745;
        }

        .status-select option[value="قيد التنفيذ"] {
            color: #ffc107;
        }

        .status-select option[value="ملغى"] {
            color: #dc3545;
        }
    </style>
</head>
<body>

    <!-- التقرير التفصيلي -->
    <div class="container-fluid">
        <div class="filter-section">
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">الموظف المسؤول</label>
                    <select class="form-select" id="detailEmployeeFilter">
                        <option value="">الكل</option>
                        <option value="1">محمد أحمد</option>
                        <option value="2">سارة علي</option>
                        <option value="3">أحمد سعيد</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">حالة الطلب</label>
                    <select class="form-select" id="detailStatusFilter">
                        <option value="">الكل</option>
                        <option value="completed">مكتمل</option>
                        <option value="pending">قيد التنفيذ</option>
                        <option value="rejected">مرفوض</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">ترتيب حسب</label>
                    <select class="form-select" id="detailSort">
                        <option value="newest">الأحدث أولاً</option>
                        <option value="oldest">الأقدم أولاً</option>
                        <option value="priority">الأولوية</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">عرض</label>
                    <select class="form-select" id="detailView">
                        <option value="10">10 عناصر</option>
                        <option value="25" selected>25 عنصر</option>
                        <option value="50">50 عنصر</option>
                        <option value="100">100 عنصر</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="detailedRequestsTable">
                <thead>
                    <tr>
                        <th>رقم الطلب <i class="bi bi-filter"></i></th>
                        <th>نوع الطلب <i class="bi bi-filter"></i></th>
                        <th>العميل <i class="bi bi-filter"></i></th>
                        <th>الموظف المسؤول</th>
                        <th>تاريخ الإنشاء</th>
                        <th>تاريخ الإنجاز</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#2024-0158</td>
                        <td>ترخيص بناء</td>
                        <td>شركة التقنية</td>
                        <td>
                            <select class="form-select form-select-sm assign-employee">
                                <option selected>محمد أحمد</option>
                                <option>سارة علي</option>
                                <option>أحمد سعيد</option>
                            </select>
                        </td>
                        <td>2024-06-10</td>
                        <td>2024-06-15</td>
                        <td>
                            <select class="form-select form-select-sm status-select">
                                <option selected>مكتمل</option>
                                <option>قيد التنفيذ</option>
                                <option>ملغى</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" title="عرض التفاصيل">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="حذف">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#2024-0157</td>
                        <td>ترخيص هدم</td>
                        <td>شركة العمران</td>
                        <td>
                            <select class="form-select form-select-sm assign-employee">
                                <option>محمد أحمد</option>
                                <option selected>سارة علي</option>
                                <option>أحمد سعيد</option>
                            </select>
                        </td>
                        <td>2024-06-09</td>
                        <td>2024-06-14</td>
                        <td>
                            <select class="form-select form-select-sm status-select">
                                <option>مكتمل</option>
                                <option selected>قيد التنفيذ</option>
                                <option>ملغى</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" title="عرض التفاصيل">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="حذف">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#2024-0156</td>
                        <td>ترخيص تعديل</td>
                        <td>شركة المستقبل</td>
                        <td>
                            <select class="form-select form-select-sm assign-employee">
                                <option>محمد أحمد</option>
                                <option>سارة علي</option>
                                <option selected>أحمد سعيد</option>
                            </select>
                        </td>
                        <td>2024-06-08</td>
                        <td>2024-06-12</td>
                        <td>
                            <select class="form-select form-select-sm status-select">
                                <option selected>مكتمل</option>
                                <option>قيد التنفيذ</option>
                                <option>ملغى</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" title="عرض التفاصيل">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="حذف">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="showing-entries">
                    عرض <span id="startEntry">1</span> إلى <span id="endEntry">3</span> من <span id="totalEntries">24</span> مدخل
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end">
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
        </div>
    </div>

    <script>
        // يمكنك إضافة أي دوال JavaScript مخصصة هنا
        document.addEventListener('DOMContentLoaded', function() {
            // تهيئة أي عناصر تحتاج إلى JavaScript
        });
    </script>

