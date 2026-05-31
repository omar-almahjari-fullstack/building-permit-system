<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>التقرير الإحصائي</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --dark-navy: #0a2540;
            --navy-blue: #1a365d;
            --light-blue: #4a80f0;
            --accent-gold: #d4af37;
            --light-gray: #f8f9fa;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }

        .stat-card {
            border-radius: 10px;
            padding: 20px;
            color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
            border: none;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card i {
            position: absolute;
            font-size: 3rem;
            opacity: 0.2;
            right: 20px;
            top: 20px;
        }

        .stat-card h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .stat-card h2 {
            font-weight: 700;
            font-size: 2.2rem;
        }

        .bg-primary {
            background: linear-gradient(135deg, var(--light-blue), var(--navy-blue)) !important;
        }

        .bg-success {
            background: linear-gradient(135deg, #2ecc71, #27ae60) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, #f39c12, #e67e22) !important;
        }

        .bg-danger {
            background: linear-gradient(135deg, #e74c3c, #c0392b) !important;
        }

        .chart-card, .table-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .chart-header {
            margin-bottom: 20px;
        }

        .chart-header h5 {
            font-weight: 600;
            color: var(--dark-navy);
        }

        .chart-header h5 i {
            color: var(--light-blue);
            margin-left: 8px;
        }

        .performance-table th {
            background-color: var(--dark-navy);
            color: white;
            font-weight: 500;
        }

        .performance-table td {
            vertical-align: middle;
        }

        .rating {
            color: var(--accent-gold);
            letter-spacing: 2px;
        }

        .form-select, .form-control {
            border-radius: 6px !important;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: var(--navy-blue);
            border-color: var(--navy-blue);
        }

        .btn-primary:hover {
            background-color: var(--dark-navy);
            border-color: var(--dark-navy);
        }

        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
        }

        .page-title {
            color: var(--dark-navy);
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(10, 37, 64, 0.1);
        }

        .tab-content {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .filter-section {
            background: rgba(10, 37, 64, 0.03);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .filter-section label {
            font-weight: 500;
            color: var(--dark-navy);
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body, .tab-content {
                background: white !important;
                box-shadow: none !important;
                padding: 0 !important;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="page-title">
            <i class="bi bi-bar-chart-line"></i> التقرير الإحصائي
        </h1>

        <div class="tab-content">
            <!-- التقرير الإحصائي -->
            <div class="tab-pane fade show active" id="summaryReport">
                <div class="filter-section no-print">
                    <!-- فلترة متقدمة -->
                    <form id="advancedFilterForm" class="row g-3">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label class="form-label">موظف معين</label>
                                <select class="form-select" id="users"></select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">الفترة الزمنية</label>
                                <select class="form-select" id="timePeriod">
                                    <option value="month">هذا الشهر</option>
                                    <option value="quarter">هذا الربع</option>
                                    <option value="year">هذه السنة</option>
                                    <option value="custom">مخصص</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">نوع الترخيص</label>
                            <select class="form-select" id="license_type_id"></select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">المديريات</label>
                            <select class="form-select" id="directorateSelect"></select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">من تاريخ</label>
                            <input type="date" class="form-control" id="startDate">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">إلى تاريخ</label>
                            <input type="date" class="form-control" id="endDate">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">حالة الطلب</label>
                            <select class="form-select" id="status">
                                <option value="">الكل</option>
                                <option value="مكتمل">مكتمل</option>
                                <option value="قيد المراجعة">قيد المراجعة</option>
                                <option value="مرفوض">مرفوض</option>
                            </select>
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <button type="button" class="btn btn-primary me-2 btn-showChartsReport">
                                <i class="bi bi-funnel"></i> تطبيق الفلترة
                            </button>
                            <button type="button" class="btn btn-outline-secondary me-2" onclick="resetFilters()">
                                <i class="bi bi-arrow-counterclockwise"></i> إعادة تعيين
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bi bi-download"></i> تصدير
                                </button>
                                <ul class="dropdown-menu dropdown-menu-amr">
                                    <li><a class="dropdown-item" href="#" onclick="exportTo('pdf')">PDF</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="exportTo('excel')">Excel</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="exportTo('csv')">CSV</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="printReport()">طباعة</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- البطاقات الإحصائية -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="stat-card bg-primary">
                            <h5>إجمالي الطلبات</h5>
                            <h2 id="totalRequests">-</h2>
                            <i class="bi bi-files"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card bg-success">
                            <h5>مكتملة</h5>
                            <h2 id="completedRequests">-</h2>
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card bg-warning text-dark">
                            <h5>قيد المراجعة</h5>
                            <h2 id="pendingRequests">-</h2>
                            <i class="bi bi-hourglass"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card bg-danger">
                            <h5>مرفوضة</h5>
                            <h2 id="rejectedRequests">-</h2>
                            <i class="bi bi-x-circle"></i>
                        </div>
                    </div>
                </div>

                <!-- الرسوم البيانية -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="chart-card">
                            <div class="chart-header d-flex justify-content-between align-items-center">
                                <h5><i class="bi bi-pie-chart"></i> توزيع الطلبات</h5>
                                <select class="form-select form-select-sm" style="width: 150px;" onchange="updatePieChart()">
                                    <option value="type">حسب النوع</option>
                                    <option value="status">حسب الحالة</option>
                                    <option value="region">حسب المنطقة</option>
                                </select>
                            </div>
                            <canvas id="requestsPieChart" height="250"></canvas>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="chart-card">
                            <div class="chart-header d-flex justify-content-between align-items-center">
                                <h5><i class="bi bi-bar-chart"></i> الطلبات حسب الشهر</h5>
                                <select class="form-select form-select-sm" style="width: 150px;" onchange="updateBarChart()">
                                    <option value="count">عدد الطلبات</option>
                                    <option value="completion">نسبة الإنجاز</option>
                                    <option value="duration">متوسط المدة</option>
                                </select>
                            </div>
                            <canvas id="monthlyBarChart" height="250"></canvas>
                        </div>
                    </div>
                </div>

                <!-- جدول أداء الموظفين -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="table-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5><i class="bi bi-table"></i> أداء الموظفين</h5>
                                <button class="btn btn-sm btn-outline-primary" onclick="exportTableToExcel()">
                                    <i class="bi bi-download"></i> تصدير الجدول
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered performance-table table-hover">
                                    <thead>
                                        <tr>
                                            <th>الموظف</th>
                                            <th>عدد الطلبات</th>
                                            <th>مكتملة</th>
                                            <th>قيد التنفيذ</th>
                                            <th>متوسط وقت الإنجاز</th>
                                            <th>رضا العملاء</th>
                                            <th>الإنتاجية</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        /* ====== 1) متغير منع التكرار ====== */
        let summaryInitialized = false;

        /* ====== 2) دالة المراقبة ====== */
        function ensureSummaryInit() {
            const marker = document.getElementById('summaryReport');
            if (marker && !summaryInitialized) {
                summaryInitialized = true;
                $(document).trigger('summaryReportLoaded');
                return;                  // نوقف المراقبة حين نكون داخل الصفحة
            }
            if (!marker) summaryInitialized = false; // المستخدم غادر الصفحة
        }

        /* ====== 3) أول دخول للصفحة (F5) ====== */
        $(function () {
            setInterval(ensureSummaryInit, 1000);   // كل ثانية
        });

        /* ====== 4) الحدث الذي يعبئ كل شيء ====== */
        $(document).off('summaryReportLoaded').on('summaryReportLoaded', function () {
            console.log('✅ summaryReportLoaded triggered');
            loadEmployees();
            loadDirectorates();
            loadLicenseTypes();
            loadStatuses();
            loadInitialStats();
            loadInitialCharts();
            loadEmployeesPerformance();
        });
        $(function () {
            // 1) ملء القوائم المنسدلة
            loadEmployees();
            loadDirectorates();
            loadLicenseTypes();
            loadStatuses();

            // 2) الإحصائيات والرسوم الأولية
            loadInitialStats();
            loadInitialCharts();

            // 3) زر التصفية
            $('.btn-showChartsReport').on('click', function (e) {
                e.preventDefault();
                filterCharts();
                loadEmployeesPerformance();
            });
        });

        /* ---------- القوائم المنسدلة ---------- */
        function loadEmployees() {
            $.get('/api/employees', res => {
                let s = $('#users'); s.empty(); s.append('<option value="*">جميع الموظفين</option>');
                res.data.forEach(e => s.append(`<option value="${e.id}">${e.name}</option>`));
            });
        }
        function loadDirectorates() {
            $.get('/api/directorates', res => {
                let s = $('#directorateSelect'); s.empty(); s.append('<option value="*">الكل</option>');
                res.data.forEach(d => s.append(`<option value="${d.id}">${d.name}</option>`));
            });
        }
        function loadLicenseTypes() {
            $.get('/api/license-types', res => {
                let s = $('#license_type_id'); s.empty(); s.append('<option value="*">الكل</option>');
                res.data.forEach(t => s.append(`<option value="${t.id}">${t.name}</option>`));
            });
        }
        function loadStatuses() {
            $.get('/api/statuses', res => {
                let s = $('#status'); s.empty(); s.append('<option value="*">الكل</option>');
                res.data.forEach(st => s.append(`<option value="${st.id}">${st.name}</option>`));
            });
        }

        /* ---------- الإحصائيات الأولية ---------- */
        function loadInitialStats() {
            $.get('/api/stats/initial', res => {
                $('#totalRequests').text(res.stats.total);
                $('#completedRequests').text(res.stats.completed);
                $('#pendingRequests').text(res.stats.pending);
                $('#rejectedRequests').text(res.stats.rejected);
            });
        }

        /* ---------- الرسوم البيانية الأولية ---------- */
        function loadInitialCharts() {
            $.get('/api/charts/initial', res => {
                renderBarChart(res.barChart);
                renderPieChart(res.requestsByType);
            });
        }

        /* ---------- التصفية ---------- */
        function filterCharts() {
            let payload = {
                employeeFilter: $('#users').val(),
                region        : $('#directorateSelect').val(),
                reportType    : $('#license_type_id').val(),
                status        : $('#status').val(),
                startDate     : $('#startDate').val(),
                endDate       : $('#endDate').val(),
                _token        : '{{ csrf_token() }}'
            };

            $.ajax({
                url : '/api/charts/filter',
                method: 'POST',
                data: payload,
                success: res => {
                    $('#totalRequests').text(res.stats.total);
                    $('#completedRequests').text(res.stats.completed);
                    $('#pendingRequests').text(res.stats.pending);
                    $('#rejectedRequests').text(res.stats.rejected);
                    renderBarChart(res.barChart);
                    renderPieChart(res.requestsByType);
                },
                error: xhr => Swal.fire('خطأ', 'فشل في التصفية', 'error')
            });
        }

        /* ---------- رسم الـ Charts ---------- */
        let barChart, pieChart;
        function renderBarChart(data) {
            if (barChart) barChart.destroy();
            const ctx = document.getElementById('monthlyBarChart').getContext('2d');

            const labels   = Object.values(data.labels);
            const completed= labels.map(m => data.completed[m] || 0);
            const pending  = labels.map(m => data.pending[m]   || 0);
            const rejected = labels.map(m => data.rejected[m]  || 0);

            barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'مكتملة',
                            data: completed,
                            backgroundColor: 'rgba(40, 167, 69, 0.7)',
                            borderColor: 'rgba(40, 167, 69, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'قيد المراجعة',
                            data: pending,
                            backgroundColor: 'rgba(255, 193, 7, 0.7)',
                            borderColor: 'rgba(255, 193, 7, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'مرفوضة',
                            data: rejected,
                            backgroundColor: 'rgba(220, 53, 69, 0.7)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } },
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        }

        function renderPieChart(data) {
            if (pieChart) pieChart.destroy();
            const ctx = document.getElementById('requestsPieChart').getContext('2d');
            pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        data: Object.values(data),
                        backgroundColor: [
                            'rgba(78, 115, 223, 0.6)',
                            'rgba(28, 200, 138, 0.6)',
                            'rgba(54, 185, 204, 0.6)',
                            'rgba(246, 194, 62, 0.6)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        }

        /* ---------- جدول أداء الموظفين ---------- */
        $(function () {
            loadEmployeesPerformance();
        });

        function loadEmployeesPerformance() {
            const payload = {
                region   : $('#directorateSelect').val(),
                status   : $('#status').val(),
                startDate: $('#startDate').val(),
                endDate  : $('#endDate').val(),
                _token   : '{{ csrf_token() }}'
            };

            $.ajax({
                url : '/api/employees-performance',
                method: 'POST',
                data: payload,
                success: res => {
                    if (res.success) renderPerformanceTable(res.data);
                },
                error: xhr => {
                    console.error(xhr.responseJSON || xhr.responseText);
                    Swal.fire('خطأ', 'فشل تحميل جدول الأداء', 'error');
                }
            });
        }

        function renderPerformanceTable(data) {
            const tbody = $('.performance-table tbody');
            tbody.empty();
            data.forEach(emp => {
                tbody.append(`
                    <tr>
                        <td>${emp.name}</td>
                        <td>${emp.total}</td>
                        <td>${emp.completed} <span class="text-success">(${emp.percentage}%)</span></td>
                        <td>${emp.pending}</td>
                        <td>${emp.avg_days} أيام</td>
                        <td><div class="rating">${emp.stars}</div></td>
                        <td>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: ${emp.percentage}%"></div>
                            </div>
                        </td>
                    </tr>
                `);
            });
        }

        /* ---------- تصدير الجدول ---------- */
        function exportTableToExcel() {
            const table = document.querySelector(".performance-table");
            const html  = table.outerHTML;
            const blob  = new Blob(['\ufeff' + html], {type: 'application/vnd.ms-excel'});
            const url   = URL.createObjectURL(blob);
            const a     = document.createElement('a');
            a.href      = url;
            a.download  = 'أداء_الموظفين_' + new Date().toISOString().slice(0, 10) + '.xls';
            a.click();
            URL.revokeObjectURL(url);
        }

        /* ---------- دوال فارغة مؤقتاً ---------- */
        function resetFilters() {
            $('#advancedFilterForm')[0].reset();
            loadInitialStats();
            loadInitialCharts();
            loadEmployeesPerformance();
        }
        function exportTo(type)   { /* يمكنك تنفيذها لاحقاً */ }
        function printReport()    { window.print(); }
        function updatePieChart() { /* يمكنك تنفيذها لاحقاً */ }
        function updateBarChart() { /* يمكنك تنفيذها لاحقاً */ }
</script>
</body>
</html>
