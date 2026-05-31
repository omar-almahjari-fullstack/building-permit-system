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

        .container-box {
            background-color: var(--light);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(10, 37, 64, 0.1);
            padding: 30px;
            margin-top: 20px;
            border: 1px solid var(--border);
        }

        .header-section {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            padding: 5px 10px;
           
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        h1, h2, h3 {
            font-weight: 700;
        }

        h1 {
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin: 0;
            font-size: 1.8rem;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
            padding: 15px 0;
            margin: 30px 0 20px;
            border-bottom: 2px solid var(--primary-light);
            position: relative;
        }

        .section-title:after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 2px;
            background: var(--accent);
        }

        .alert {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(10, 37, 64, 0.05);
        }

        .alert-info {
            background-color: #e6f7ff;
            border-color: #91d5ff;
            color: #0050b3;
        }

        .table-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(10, 37, 64, 0.05);
            border: 1px solid var(--border);
            margin-bottom: 30px;
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
            text-align: center;
        }

        .table td {
            padding: 14px 16px;
            vertical-align: middle;
            border-color: var(--border);
            text-align: center;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid var(--border);
        }

        .table-striped>tbody>tr:nth-child(odd)>td {
            background-color: #f8fafc;
        }

        .table-striped>tbody>tr:nth-child(even)>td {
            background-color: #ffffff;
        }

        .btn {
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            padding: 10px 20px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border: none;
            color: #fff;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 54, 93, 0.2);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            border: none;
        }

        .btn-info {
            background: linear-gradient(135deg, #17a2b8, #117a8b);
            border: none;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #495057);
            border: none;
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
            border: none;
            color: #212529;
        }

        .form-control, .form-select {
            background-color: #ffffff;
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 8px;
            padding: 10px 15px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(26, 54, 93, 0.15);
            color: var(--text);
        }

        textarea.form-control {
            min-height: 120px;
        }

        .form-check-input {
            width: 22px;
            height: 22px;
            border: 2px solid var(--primary);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .badge {
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .badge.bg-info {
            background: linear-gradient(135deg, #17a2b8, #117a8b) !important;
        }

        .badge.bg-secondary {
            background: linear-gradient(135deg, #6c757d, #495057) !important;
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

        @media (max-width: 768px) {
            .header-section {
                padding: 20px;
            }

            .btn {
                margin-bottom: 10px;
                width: 100%;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>



    <div class="container">
        <!-- الشريط العلوي -->
        <div class="header-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-shield-alt me-3"></i>إدارة الصلاحيات حسب الأقسام</h1>
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

        <div class="container-box">
            <!-- ✅ صلاحيات حسب الأقسام -->

            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>حدد العمليات المسموح بها حسب القسم:
            </div>

            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 150px;">العملية</th>
                            <th>قسم البناء</th>
                            <th>قسم الهدم</th>
                            <th>قسم المساحة</th>
                            <th>قسم الرخص التجارية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>عرض الطلبات</td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                        </tr>
                        <tr>
                            <td>تعديل الطلبات</td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                        </tr>
                        <tr>
                            <td>حذف الطلبات</td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                        </tr>
                        <tr>
                            <td>اعتماد الرخص</td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                        </tr>
                        <tr>
                            <td>طباعة الرخص</td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                        </tr>
                        <tr>
                            <td>تغيير حالة الطلب</td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td><input type="checkbox" class="form-check-input" checked></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mb-5">
                <button class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>حفظ التعديلات
                </button>
            </div>

            <!-- ✅ مجموعات صلاحيات قابلة للنسخ -->
            <div class="section-title">إدارة قوالب الصلاحيات</div>

            <div class="row g-3 align-items-end mb-4">
                <div class="col-md-4">
                    <label class="form-label fw-bold">اختر الدور:</label>
                    <select class="form-select">
                        <option>مشرف عام</option>
                        <option>مهندس معماري</option>
                        <option>مسؤول ملفات</option>
                        <option>زائر عرض فقط</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success">
                            <i class="fas fa-copy me-2"></i>نسخ صلاحيات هذا الدور
                        </button>
                        <button class="btn btn-info">
                            <i class="fas fa-paste me-2"></i>لصق على مستخدم آخر
                        </button>
                        <button class="btn btn-secondary">
                            <i class="fas fa-download me-2"></i>تصدير كـ JSON
                        </button>
                        <button class="btn btn-warning">
                            <i class="fas fa-upload me-2"></i>استيراد JSON
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <label class="form-label fw-bold">JSON الحالي:</label>
                <textarea class="form-control" rows="4" readonly>{
  "role": "مشرف عام",
  "permissions": ["view_orders", "edit_orders", "approve_license", "print_license", "change_status"]
}</textarea>
            </div>

            <!-- ✅ سجل التعديلات لكل دور -->
            <div class="section-title mt-5">سجل التعديلات على الصلاحيات</div>

            <div class="table-container">
                <table class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 150px;">اسم المستخدم</th>
                            <th>الدور</th>
                            <th>العملية</th>
                            <th>تفاصيل</th>
                            <th>التاريخ والوقت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>م. خالد العلي</td>
                            <td><span class="badge bg-info">مهندس</span></td>
                            <td>تعديل صلاحية</td>
                            <td>تم إلغاء حذف الطلبات من قسم البناء</td>
                            <td>2025-06-17 12:30</td>
                        </tr>
                        <tr>
                            <td>أ. ناصر الفهد</td>
                            <td><span class="badge bg-secondary">مشرف</span></td>
                            <td>إضافة دور جديد</td>
                            <td>تم إنشاء دور "مدير الملفات"</td>
                            <td>2025-06-17 09:15</td>
                        </tr>
                        <tr>
                            <td>أ. سارة محمد</td>
                            <td><span class="badge bg-info">مهندس</span></td>
                            <td>تعديل صلاحية</td>
                            <td>تم تفعيل اعتماد الرخص في قسم الرخص التجارية</td>
                            <td>2025-06-16 14:20</td>
                        </tr>
                        <tr>
                            <td>م. عبدالله السعد</td>
                            <td><span class="badge bg-info">مهندس</span></td>
                            <td>حذف صلاحية</td>
                            <td>تم إزالة صلاحية تعديل الطلبات من قسم الهدم</td>
                            <td>2025-06-15 16:45</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <nav>
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">السابق</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">التالي</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 mb-3 text-muted">
        <p>نظام إدارة الصلاحيات المتقدمة &copy; 2025 - جميع الحقوق محفوظة</p>
    </footer>

</body>
</html>
