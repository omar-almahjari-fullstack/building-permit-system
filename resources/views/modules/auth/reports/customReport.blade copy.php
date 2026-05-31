<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>التقارير المخصصة</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    {{-- <!-- مكتبات التصدير -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> --}}

{{-- <!-- مكتبات jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
<!-- مكتبات jsPDF -->

<!-- مكتبات XLSX -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> --}}

    <style>
        :root {
            --cr-main-blue: #0a1f3a;
            --cr-secondary-blue: #1a365d;
            --cr-accent-gold: #d4af37;
            --cr-light-bg: #f5f7f9;
            --cr-card-bg: #ffffff;
            --cr-text-dark: #333;
            --cr-text-light: #666;
            --cr-border-radius: 12px;
            --cr-border-soft:#e3e6ea;
        }

        body.cr-body {
            background:#f5f7f9;
            font-family:'Tajawal',sans-serif;
            margin:0;
            padding:20px;
            color:var(--cr-text-dark);
        }
        .cr-dashboard-container { max-width:1400px; margin:0 auto; }

        /* رأس الصفحة */
        .cr-header {
            background:linear-gradient(135deg,var(--cr-main-blue),var(--cr-secondary-blue));
            color:#fff;
            padding:22px 26px;
            border-radius:var(--cr-border-radius);
            margin-bottom:26px;
            box-shadow:0 8px 28px -8px rgba(0,0,0,.35);
            position:relative;
            overflow:hidden;
        }
        .cr-header:before, .cr-header:after {
            content:"";
            position:absolute;
            border-radius:50%;
            background:radial-gradient(circle at 30% 30%,rgba(255,255,255,.15),transparent 70%);
            opacity:.35;
            filter:blur(2px);
        }
        .cr-header:before { width:180px; height:180px; top:-40px; right:-30px; }
        .cr-header:after { width:140px; height:140px; bottom:-30px; left:-20px; }
        .cr-header h1 { margin:0 0 8px; font-size:1.65rem; font-weight:800; letter-spacing:.5px; display:flex; gap:10px; align-items:center; }
        .cr-header p { margin:0; font-size:.9rem; opacity:.9; }

        /* بطاقات الإحصائيات */
        .cr-stat-card {
            background:#fff;
            border-radius:16px;
            padding:16px 14px 14px;
            text-align:center;
            position:relative;
            box-shadow:0 4px 14px rgba(0,0,0,.09);
            overflow:hidden;
            transition:.35s;
            border:1px solid #f0f2f4;
        }
        .cr-stat-card:before {
            content:"";
            position:absolute;
            inset:0;
            background:radial-gradient(circle at 80% 15%,rgba(212,175,55,.12),transparent 70%);
            opacity:0;
            transition:.5s;
        }
        .cr-stat-card:hover:before { opacity:1; }
        .cr-stat-card:hover { transform:translateY(-6px); box-shadow:0 14px 28px -8px rgba(0,0,0,.18); }
        .cr-stat-card i { font-size:1.7rem; margin-bottom:4px; color:var(--cr-accent-gold); }
        .cr-stat-card h3 { margin:4px 0 2px; font-size:1.4rem; font-weight:800; letter-spacing:.5px; color:var(--cr-main-blue); }
        .cr-stat-card p { margin:0; font-size:.62rem; font-weight:700; letter-spacing:.7px; color:#7a8794; text-transform:uppercase; }

        /* حاوية الفلاتر */
        .cr-dropdown-container {
            background:linear-gradient(135deg,var(--cr-main-blue) 0%,var(--cr-secondary-blue) 100%);
            padding:18px 20px 22px;
            border-radius:20px;
            margin-bottom:28px;
            position:relative;
            box-shadow:0 10px 28px -10px rgba(0,0,0,.45),0 4px 14px rgba(0,0,0,.18);
            overflow:visible;
            border:1px solid rgba(255,255,255,.08);
        }
        .cr-dropdown-container:before {
            content:"";
            position:absolute;
            width:240px; height:240px;
            top:-70px; left:-60px;
            background:radial-gradient(circle at 60% 40%,rgba(255,255,255,.1),transparent 70%);
            opacity:.25;
        }

        .cr-dropdown-btn {
            background:linear-gradient(135deg,var(--cr-accent-gold),#e8c874);
            color:var(--cr-main-blue);
            font-weight:800;
            letter-spacing:.6px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:14px 18px;
            border:none;
            width:100%;
            border-radius:14px;
            cursor:pointer;
            position:relative;
            overflow:hidden;
            box-shadow:0 4px 14px -4px rgba(212,175,55,.55);
            font-size:.85rem;
        }
        .cr-dropdown-btn:hover { filter:brightness(1.05); }
        .cr-dropdown-btn i { font-size:1rem; }

        .cr-dropdown-content {
            margin-top:16px;
            background:#fff;
            border-radius:18px;
            padding:22px 22px 26px;
            display:none;
            animation:fadeSlide .55s cubic-bezier(.19,1,.22,1);
            box-shadow:0 14px 36px -12px rgba(0,0,0,.35),0 4px 14px rgba(0,0,0,.12);
            border:1px solid #eef1f4;
            position:relative;
            overflow:hidden;
        }
        .cr-dropdown-content:before {
            content:"";
            position:absolute;
            top:0; right:0;
            width:140px;height:140px;
            background:radial-gradient(circle at 70% 30%,rgba(212,175,55,.15),transparent 70%);
            opacity:.35;
        }

        .cr-adv-grid {
            display:grid;
            gap:26px 30px;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            margin-bottom:8px;
        }

        .cr-filter-group {
            background:#f9fbfd;
            border:1px solid #edf1f5;
            border-radius:14px;
            padding:14px 14px 16px;
            position:relative;
            box-shadow:0 2px 6px rgba(0,0,0,.05);
            transition:.35s;
        }
        .cr-filter-group:hover {
            box-shadow:0 6px 14px -4px rgba(0,0,0,.12);
        }
        .cr-filter-group-title {
            margin:0 0 10px;
            font-size:.7rem;
            font-weight:800;
            letter-spacing:.7px;
            color:var(--cr-secondary-blue);
            text-transform:uppercase;
            display:flex;
            align-items:center;
            gap:6px;
        }
        .cr-filter-group-title i { color:var(--cr-accent-gold); }

        .cr-form-label {
            font-size:.63rem;
            font-weight:700;
            letter-spacing:.6px;
            margin-bottom:6px;
            display:block;
            color:#455463;
            text-transform:uppercase;
        }
        .cr-form-control,
        .cr-form-select,
        .select2-container--default .select2-selection--multiple {
            border:1px solid #d6dde3 !important;
            border-radius:10px !important;
            background:#fff;
            min-height:44px;
            font-size:.8rem;
            font-weight:500;
            color:#2f3d48;
            box-shadow:0 1px 2px rgba(0,0,0,.04);
            transition:.3s;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background:var(--cr-secondary-blue)!important;
            border:none!important;
            border-radius:6px!important;
            font-size:.65rem;
            font-weight:600;
            padding:4px 8px!important;
            margin-top:6px!important;
        }
        .select2-container--default .select2-results__option--highlighted {
            background:var(--cr-secondary-blue)!important;
        }
        .cr-form-control:focus,
        .cr-form-select:focus,
        .select2-container--focus .select2-selection--multiple {
            border-color:var(--cr-accent-gold)!important;
            box-shadow:0 0 0 2px rgba(212,175,55,.25);
        }

        .cr-action-bar {
            display:flex;
            flex-wrap:wrap;
            gap:12px;
            justify-content:flex-start;
            margin-top:20px;
            padding-top:18px;
            border-top:1px dashed #d8dde1;
        }
        .cr-btn-primary {
            background:linear-gradient(135deg,var(--cr-accent-gold),#e9c96a);
            border:none;
            color:#1a2540;
            font-weight:800;
            font-size:.7rem;
            letter-spacing:.6px;
            padding:11px 20px;
            border-radius:12px;
            display:inline-flex;
            align-items:center;
            gap:6px;
            cursor:pointer;
            box-shadow:0 4px 14px -4px rgba(212,175,55,.55);
            transition:.35s;
            text-transform:uppercase;
        }
        .cr-btn-primary:hover { filter:brightness(1.08); transform:translateY(-3px); }
        .cr-btn-alt {
            background:#eef2f6;
            border:1px solid #d5dbe0;
            color:#2f3d48;
            font-weight:700;
            font-size:.66rem;
            letter-spacing:.5px;
            padding:11px 20px;
            border-radius:12px;
            cursor:pointer;
            transition:.3s;
            text-transform:uppercase;
        }
        .cr-btn-alt:hover { background:#e4e9ed; }

        .cr-card {
            background:#fff;
            border-radius:20px;
            padding:22px 24px;
            position:relative;
            box-shadow:0 10px 30px -12px rgba(0,0,0,.2),0 4px 12px rgba(0,0,0,.08);
            border:1px solid #eff2f5;
            overflow:hidden;
            transition:.4s cubic-bezier(.19,1,.22,1);
        }
        .cr-card:before {
            content:"";
            position:absolute;
            inset:0;
            background:radial-gradient(circle at 78% 18%,rgba(212,175,55,.11),transparent 70%);
            opacity:0;
            transition:.6s;
        }
        .cr-card:hover:before { opacity:1; }
        .cr-card:hover { transform:translateY(-8px); box-shadow:0 18px 46px -14px rgba(0,0,0,.32); }
        .cr-card-header {
            padding:0 0 14px;
            margin:0 0 14px;
            border:none;
            display:flex;
            align-items:center;
            justify-content:space-between;
            background:transparent;
            position:relative;
        }
        .cr-card-header h5 {
            margin:0;
            font-size:.95rem;
            font-weight:800;
            letter-spacing:.5px;
            display:flex;
            align-items:center;
            gap:8px;
            color:var(--cr-main-blue);
        }
        .cr-card-header h5 i { color:var(--cr-secondary-blue); font-size:1.15rem; }
        .cr-card-body { padding:0; }

        .table-responsive { max-height:520px; overflow:auto; }
        table { width:100%; border-collapse:separate; border-spacing:0 6px; }
        thead th {
            background:#f1f4f7;
            font-size:.6rem;
            font-weight:800;
            letter-spacing:.7px;
            color:#4d5a66;
            padding:10px 12px;
            text-transform:uppercase;
            border:none;
            border-top:2px solid var(--cr-accent-gold);
            position:sticky;
            top:0;
            z-index:2;
        }
        tbody tr {
            background:#fff;
            box-shadow:0 1px 4px rgba(0,0,0,.08);
            transition:.3s;
        }
        tbody tr:hover { transform:translateY(-3px); box-shadow:0 8px 18px -4px rgba(0,0,0,.25); }
        tbody td {
            padding:10px 12px;
            font-size:.72rem;
            font-weight:600;
            letter-spacing:.3px;
            color:#2e3942;
            border:none;
        }
        .badge { font-size:.55rem; font-weight:800; padding:6px 10px 5px; letter-spacing:.5px; border-radius:40px; }

        .cr-summary-chart-card { display:flex; flex-direction:column; gap:18px; }
        .cr-summary-wrapper {
            background:#f8fafc;
            padding:18px 18px 12px;
            border-radius:18px;
            border-left:5px solid var(--cr-accent-gold);
            box-shadow:0 2px 8px rgba(0,0,0,.05);
        }
        .cr-summary-wrapper h6 {
            margin:0 0 10px;
            font-size:.7rem;
            font-weight:800;
            letter-spacing:.6px;
            color:var(--cr-main-blue);
            text-transform:uppercase;
            border-bottom:1px solid #e5e9ed;
            padding-bottom:6px;
        }
        .cr-summary-wrapper ul { list-style:none; margin:0; padding:0; }
        .cr-summary-wrapper li { display:flex; justify-content:space-between; font-size:.68rem; font-weight:600; margin-bottom:5px; }

        .cr-chart-wrapper {
            background:#f7f9fb;
            padding:20px 18px;
            border-radius:18px;
            border-left:5px solid var(--cr-accent-gold);
            flex:1;
            min-height:300px;
            position:relative;
        }
        .cr-chart-wrapper canvas { width:100%!important; height:100%!important; }

        .cr-export-buttons {
            display:flex;
            gap:8px;
            flex-wrap:wrap;
        }
        .cr-export-buttons .btn {
            border:none;
            padding:8px 14px;
            border-radius:10px;
            font-size:.62rem;
            font-weight:800;
            letter-spacing:.5px;
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            gap:4px;
            box-shadow:0 3px 10px -2px rgba(0,0,0,.25);
            transition:.3s;
        }
        .cr-export-buttons .btn-success { background:linear-gradient(135deg,#28a745,#2fbb52); color:#fff; }
        .cr-export-buttons .btn-primary { background:linear-gradient(135deg,#1172d3,#3091f0); color:#fff; }
        .cr-export-buttons .btn-secondary { background:linear-gradient(135deg,#6c757d,#858e94); color:#fff; }
        .cr-export-buttons .btn:hover { filter:brightness(1.1); transform:translateY(-3px); }

        .pagination { display:flex; gap:8px; flex-wrap:wrap; margin-top:18px; }
        .pagination button {
            background:#eef2f6;
            border:1px solid #d5dbe0;
            border-radius:10px;
            padding:6px 12px;
            cursor:pointer;
            font-size:.6rem;
            font-weight:700;
            letter-spacing:.5px;
            transition:.25s;
        }
        .pagination button:hover { background:#e1e7ec; }
        .pagination button.active { background:var(--cr-secondary-blue); color:#fff; border-color:var(--cr-secondary-blue); }

        @media (max-width:900px){
            .cr-adv-grid { grid-template-columns:repeat(auto-fit,minmax(210px,1fr)); }
        }
        @media (max-width:600px){
            .cr-header { padding:18px 18px; }
            .cr-header h1 { font-size:1.35rem; }
        }
        @keyframes fadeSlide {
            from { opacity:0; transform:translateY(22px); }
            to { opacity:1; transform:translateY(0); }
        }
    </style>
</head>
<body class="cr-body">
<div class="cr-dashboard-container">

    <!-- الهيدر والإحصائيات -->
    <div class="cr-header">
        <div class="row" style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:20px;">
            <div style="flex:1; min-width:320px;">
                <h1><i class="fas fa-chart-pie"></i> التقارير المخصصة</h1>
                <p>توليد – تحليل – تصدير بيانات الطلبات بدقة ومرونة</p>
            </div>
            <div style="flex:2; display:grid; grid-template-columns:repeat(auto-fit,minmax(130px,1fr)); gap:14px;">
                <div class="cr-stat-card">
                    <i class="fas fa-layer-group"></i>
                    <h3 id="st-total">—</h3>
                    <p>إجمالي</p>
                </div>
                <div class="cr-stat-card">
                    <i class="fas fa-check-circle"></i>
                    <h3 id="st-completion-rate">—%</h3>
                    <p>الإنجاز</p>
                </div>
                <div class="cr-stat-card">
                    <i class="fas fa-clock"></i>
                    <h3 id="st-avg-duration">—</h3>
                    <p>متوسط الأيام</p>
                </div>
                <div class="cr-stat-card">
                    <i class="fas fa-spinner"></i>
                    <h3 id="st-in-progress">—</h3>
                    <p>قيد التنفيذ</p>
                </div>
                <div class="cr-stat-card">
                    <i class="fas fa-ban"></i>
                    <h3 id="st-rejected">—</h3>
                    <p>مرفوض</p>
                </div>
                <div class="cr-stat-card">
                    <i class="fas fa-times-circle"></i>
                    <h3 id="st-cancelled">—</h3>
                    <p>ملغى</p>
                </div>
            </div>
        </div>
    </div>

    <!-- إعدادات التقرير المتقدم -->
    <div class="cr-dropdown-container">
        <button class="cr-dropdown-btn" id="dropdownBtn">
            <span style="display:flex; gap:8px; align-items:center;"><i class="fas fa-sliders-h"></i> إعدادات التقرير المتقدم</span>
            <i class="fas fa-chevron-down" id="dropdownIcon"></i>
        </button>
        <div class="cr-dropdown-content" id="dropdownContent">

            <div class="cr-adv-grid">

                <div class="cr-filter-group">
                    <h6 class="cr-filter-group-title"><i class="fas fa-flag"></i> الحالات</h6>
                    <label class="cr-form-label">اختر حالة أو أكثر</label>
                    <select class="form-select select2-multiple" id="reportStatusFilter" multiple></select>
                </div>

                <div class="cr-filter-group">
                    <h6 class="cr-filter-group-title"><i class="fas fa-calendar"></i> الفترة الزمنية</h6>
                    <label class="cr-form-label">نطاق التاريخ</label>
                    <div style="display:flex; gap:8px;">
                        <input type="date" class="cr-form-control" id="startDate" style="flex:1;">
                        <input type="date" class="cr-form-control" id="endDate" style="flex:1;">
                    </div>
                    <div style="margin-top:8px; font-size:.6rem; color:#6a7580; font-weight:600;">اترك فارغاً لعرض جميع الفترات</div>
                </div>

                <div class="cr-filter-group">
                    <h6 class="cr-filter-group-title"><i class="fas fa-map-marker-alt"></i> المناطق</h6>
                    <label class="cr-form-label">المحافظات</label>
                    <select class="form-select select2-multiple" id="reportRegionFilter" multiple></select>
                </div>

                <div class="cr-filter-group">
                    <h6 class="cr-filter-group-title"><i class="fas fa-user-tie"></i> الموظفون</h6>
                    <label class="cr-form-label">المعين لهم</label>
                    <select class="form-select select2-multiple" id="customEmployees" multiple></select>
                </div>

                <div class="cr-filter-group">
                    <h6 class="cr-filter-group-title"><i class="fas fa-certificate"></i> أنواع الترخيص</h6>
                    <label class="cr-form-label">متعدد</label>
                    <select class="form-select select2-multiple" id="licenseTypesFilter" multiple></select>
                </div>

                <div class="cr-filter-group">
                    <h6 class="cr-filter-group-title"><i class="fas fa-signal"></i> الأولوية</h6>
                    <label class="cr-form-label">تصنيف داخلي</label>
                    <select class="cr-form-select" id="reportPriorityFilter">
                        <option value="all">الكل</option>
                        <option value="high">عالي</option>
                        <option value="medium">متوسط</option>
                        <option value="low">منخفض</option>
                    </select>
                </div>

                <div class="cr-filter-group" style="grid-column:span 2; min-width:300px;">
                    <h6 class="cr-filter-group-title"><i class="fas fa-table"></i> أعمدة التقرير</h6>
                    <label class="cr-form-label">اختيار / إلغاء</label>
                    <select class="form-select select2-multiple" id="reportColumns" multiple></select>
                    <div style="margin-top:6px; font-size:.58rem; color:#7b8892; font-weight:600;">الافتراضي: رقم الطلب، نوع الترخيص، الموظف، تاريخ الإنشاء، الحالة</div>
                </div>

                <div class="cr-filter-group">
                    <h6 class="cr-filter-group-title"><i class="fas fa-sort"></i> ترتيب النتائج</h6>
                    <label class="cr-form-label">حقل الترتيب</label>
                    <select class="cr-form-select" id="reportSorting">
                        <option value="-created_at">الأحدث أولاً</option>
                        <option value="created_at">الأقدم أولاً</option>
                        <option value="request_number">حسب رقم الطلب</option>
                        <option value="license_type">حسب نوع الطلب</option>
                        <option value="employee">حسب الموظف</option>
                        <option value="region">حسب المنطقة</option>
                        <option value="status">حسب الحالة</option>
                    </select>
                </div>

            </div>

            <div class="cr-action-bar">
                <button class="cr-btn-primary" id="applyFiltersBtn"><i class="fas fa-filter"></i> تطبيق</button>
                <button class="cr-btn-primary" id="generateReportBtn" style="background:linear-gradient(135deg,#1a365d,#2d4f83); color:#fff; box-shadow:0 4px 14px -4px rgba(0,0,0,.5);"><i class="fas fa-play"></i> توليد التقرير</button>
                <button class="cr-btn-alt" id="resetFiltersBtn"><i class="fas fa-undo"></i> إعادة</button>
                <button class="cr-btn-alt" id="saveTemplateBtn"><i class="fas fa-save"></i> حفظ قالب</button>
            </div>
        </div>
    </div>

    <!-- محتوى الصفحة -->
    <div class="row" style="display:flex; flex-wrap:wrap; gap:28px;">
        <!-- يسار: ملخص + مخطط + دليل -->
        <div style="flex:1; min-width:340px; display:flex; flex-direction:column; gap:26px;">

            <div class="cr-card">
                <div class="cr-card-header"><h5><i class="fas fa-chart-line"></i> الملخص والمخطط</h5></div>
                <div class="cr-card-body" style="padding:0;">
                    <div class="cr-summary-chart-card">
                        <div class="cr-summary-wrapper">
                            <h6>الملخص</h6>
                            <ul id="summaryList">
                                <li style="justify-content:center;">جاري التحميل...</li>
                            </ul>
                        </div>
                        <div class="cr-chart-wrapper">
                            <canvas id="customReportChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cr-card">
                <div class="cr-card-header"><h5><i class="fas fa-info-circle"></i> دليل سريع</h5></div>
                <div class="cr-card-body" style="font-size:.68rem; line-height:1.7; color:#4b5965; font-weight:600; padding:0;">
                    <div style="padding:2px 2px 12px;">
                        <ul style="margin:0; padding-right:18px; line-height:1.9;">
                            <li>استخدم عدداً أقل من الأعمدة لتحسين السرعة.</li>
                            <li>حدد التاريخ فقط عند الحاجة.</li>
                            <li>يمكنك الآن التصدير إلى CSV وExcel وPDF.</li>
                        </ul>
                        <div style="margin-top:12px; padding:0 14px;">
                            <button class="cr-btn-primary" id="quickGenerateBtn" style="width:100%;"><i class="fas fa-bolt"></i> توليد سريع</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- يمين: الجدول -->
        <div style="flex:2; min-width:580px;">
            <div class="cr-card">
                <div class="cr-card-header">
                    <h5><i class="fas fa-file-alt"></i> معاينة التقرير</h5>
                    <div class="cr-export-buttons">
                        <button class="btn btn-success" id="exportPdfBtn"><i class="fas fa-file-pdf"></i> PDF</button>
                        <button class="btn btn-primary" id="exportExcelBtn"><i class="fas fa-file-excel"></i> Excel</button>
                        <button class="btn btn-secondary" id="exportCsvBtn"><i class="fas fa-file-csv"></i> CSV</button>
                        <button class="btn btn-secondary" id="printReportBtn"><i class="fas fa-print"></i> طباعة</button>
                    </div>
                </div>
                <div class="cr-card-body" style="padding:0;">
                    <div class="table-responsive">
                        <table class="table" id="customReportTable">
                            <thead><tr id="reportHead"><th>—</th></tr></thead>
                            <tbody id="reportBody">
                                <tr><td>لم يتم توليد التقرير بعد...</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination" id="pagination"></div>
                </div>
            </div>
        </div>

    </div>
</div>


<style>
    body {
      font-family: "Cairo", sans-serif;
      direction: rtl;
      text-align: right;
      margin: 20px;
    }
    #invoice {
      width: 100%;
      max-width: 800px;
      margin: auto;
      padding: 20px;
      border: 2px solid #000;
      border-radius: 10px;
      background: #fff;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }
    th {
      background: #f2f2f2;
    }
    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 14px;
    }
    .export-btn {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      font-size: 16px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .export-btn:hover {
      background: #0056b3;
    }
</style>
{{--
<div id="invoice">
    <h1>فاتورة رقم الطلب #12345</h1>
    <p><strong>اسم العميل:</strong> أحمد محمد</p>
    <p><strong>التاريخ:</strong> 2025-09-21</p>

    <table>
      <thead>
        <tr>
          <th>المنتج</th>
          <th>الكمية</th>
          <th>السعر</th>
          <th>الإجمالي</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>إسمنت</td>
          <td>10</td>
          <td>2000</td>
          <td>20000</td>
        </tr>
        <tr>
          <td>حديد</td>
          <td>5</td>
          <td>5000</td>
          <td>25000</td>
        </tr>
        <tr>
          <td colspan="3"><strong>الإجمالي الكلي</strong></td>
          <td><strong>45000</strong></td>
        </tr>
      </tbody>
    </table>

    <div class="footer">
      <p>وزارة الأشغال - قسم التراخيص</p>
    </div>
  </div>

//   <button class="export-btn" onclick="exportPDF()">تصدير PDF</button> --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<!-- تحميل مكتبة pdfmake -->
<!-- ضيفهم في <head> أو قبل الكود -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


<!-- مكتبات -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* =================== متغيرات عامة =================== */
let metaData=null;
let currentRequestPayload=null;
let currentColumns=[];
let currentPage=1;
let statusChart=null;
const csrfToken=document.querySelector('meta[name="csrf-token"]').getAttribute('content');

/* =================== Select2 =================== */
function initSelect2(){
    $('.select2-multiple').select2({
        placeholder:"اختر",
        allowClear:true,
        width:'100%',
        dir:'rtl'
    });
}

/* =================== فتح/إغلاق =================== */
function toggleDropdown(){
    const box=document.getElementById('dropdownContent');
    const icon=document.getElementById('dropdownIcon');
    const open=box.style.display==='block';
    box.style.display=open?'none':'block';
    icon.className=open?'fas fa-chevron-down':'fas fa-chevron-up';
}

/* =================== تحميل الميتاداتا =================== */
async function loadMeta(){
    const res=await fetch('/custom-reports/meta');
    const json=await res.json();
    if(!json.success) throw new Error('فشل تحميل الميتاداتا');
    metaData=json.data;

    // حالات واجهة
    const statusSel=$('#reportStatusFilter');
    [
        {v:'completed', t:'مكتمل', sel:true},
        {v:'pending', t:'قيد التنفيذ', sel:true},
        {v:'rejected', t:'مرفوض'},
        {v:'cancelled', t:'ملغى'}
    ].forEach(s=>{
        statusSel.append(new Option(s.t,s.v,s.sel,s.sel));
    });

    const empSel=$('#customEmployees');
    metaData.employees.forEach(e=>empSel.append(new Option(e.name,e.id,false,false)));

    const govSel=$('#reportRegionFilter');
    metaData.governorates.forEach(g=>govSel.append(new Option(g.name,g.id,false,false)));

    const licSel=$('#licenseTypesFilter');
    metaData.license_types.forEach(l=>licSel.append(new Option(l.name,l.id,false,false)));

    const colSel=$('#reportColumns');
    const defaults=['request_number','license_type','assigned_employee','created_at','status_name'];
    Object.entries(metaData.available_columns).forEach(([k,v])=>{
        colSel.append(new Option(v,k,defaults.includes(k),defaults.includes(k)));
    });

    initSelect2();
    currentColumns=$('#reportColumns').val();
}

/* =================== بناء الحمولة =================== */
function buildPayload(pageOverride=null){
    return {
        statuses: $('#reportStatusFilter').val()||[],
        employees: $('#customEmployees').val()||[],
        governorates: $('#reportRegionFilter').val()||[],
        license_types: $('#licenseTypesFilter').val()||[],
        date_from: $('#startDate').val()||null,
        date_to: $('#endDate').val()||null,
        columns: $('#reportColumns').val()||[],
        sorting: $('#reportSorting').val(),
        page: pageOverride||currentPage,
        limit:500
    };
}

/* =================== عرض تحميل الجدول =================== */
function showLoading(){
    document.getElementById('reportBody').innerHTML=`<tr><td colspan="${currentColumns.length||1}">جاري التحميل...</td></tr>`;
}

/* =================== توليد التقرير =================== */
async function generateReport(notify=true, pageOverride=null){
    currentColumns=$('#reportColumns').val();
    currentRequestPayload=buildPayload(pageOverride);
    showLoading();
    const res=await fetch('/custom-reports/generate',{
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRF-TOKEN':csrfToken},
        body:JSON.stringify(currentRequestPayload)
    });
    const json=await res.json().catch(()=>({success:false}));
    if(!json.success){
        document.getElementById('reportBody').innerHTML='<tr><td>خطأ أثناء جلب البيانات</td></tr>';
        return;
    }
    renderTable(json.data.rows);
    renderSummary(json.data.summary);
    updateTopStats(json.data.summary);
    renderChart(json.data.chart);
    renderPagination(json.data.pagination);
    if(notify) console.log('✅ تم توليد التقرير');
}

/* =================== تنسيقات مساعدة =================== */
function fmt(val){
    if(val===null||val===undefined||val==='') return '—';
    if(typeof val==='string' && /^\d{4}-\d{2}-\d{2}T/.test(val)){
        const d=new Date(val);
        if(!isNaN(d.getTime())) return d.toLocaleString('ar-EG');
    }
    return val;
}

/* =================== جدول =================== */
function renderTable(rows){
    const head=document.getElementById('reportHead');
    const body=document.getElementById('reportBody');
    const cols=currentColumns.length?currentColumns:['request_number'];
    head.innerHTML='';
    cols.forEach(c=>{
        const th=document.createElement('th');
        th.textContent=metaData.available_columns[c]||c;
        head.appendChild(th);
    });
    body.innerHTML='';
    if(!rows.length){
        body.innerHTML=`<tr><td colspan="${cols.length}">لا توجد نتائج</td></tr>`;
        return;
    }
    rows.forEach(r=>{
        const tr=document.createElement('tr');
        cols.forEach(c=>{
            const td=document.createElement('td');
            if(c==='status_name' && r.status_id){
                let badge='bg-warning text-dark';
                if(r.status_id==8) badge='bg-success';
                else if(r.status_id==4) badge='bg-danger';
                else if(r.status_id==9) badge='bg-secondary';
                td.innerHTML=`<span class="badge ${badge}">${fmt(r[c])}</span>`;
            } else {
                td.textContent=fmt(r[c]);
            }
            tr.appendChild(td);
        });
        body.appendChild(tr);
    });
}

/* =================== ملخص وإحصائيات =================== */
function renderSummary(s){
    const ul=document.getElementById('summaryList');
    ul.innerHTML=`
        <li><span>الإجمالي</span><span>${s.total}</span></li>
        <li><span>مكتملة</span><span>${s.completed}</span></li>
        <li><span>قيد التنفيذ</span><span>${s.in_progress}</span></li>
        <li><span>مرفوضة</span><span>${s.rejected}</span></li>
        <li><span>ملغاة</span><span>${s.cancelled}</span></li>
        <li><span>نسبة الإنجاز</span><span>${s.completion_rate}%</span></li>
        <li><span>متوسط المدة (أيام)</span><span>${s.avg_duration_days}</span></li>
    `;
}
function updateTopStats(s){
    document.getElementById('st-total').textContent=s.total??'0';
    document.getElementById('st-completion-rate').textContent=(s.completion_rate??0)+'%';
    document.getElementById('st-avg-duration').textContent=s.avg_duration_days??'0';
    document.getElementById('st-in-progress').textContent=s.in_progress??'0';
    document.getElementById('st-rejected').textContent=s.rejected??'0';
    document.getElementById('st-cancelled').textContent=s.cancelled??'0';
}

/* =================== مخطط =================== */
function renderChart(chart){
    const ctx=document.getElementById('customReportChart').getContext('2d');
    if(statusChart) statusChart.destroy();
    if(!chart.labels.length){
        statusChart=new Chart(ctx,{type:'doughnut',data:{labels:['لا بيانات'],datasets:[{data:[1],backgroundColor:['#ccc']}]}});
        return;
    }
    const palette=['#28a745','#ffc107','#dc3545','#6c757d','#1172d3','#6610f2','#20c997','#fd7e14'];
    statusChart=new Chart(ctx,{
        type:'doughnut',
        data:{
            labels:chart.labels,
            datasets:[{
                data:chart.values,
                backgroundColor:chart.labels.map((_,i)=>palette[i%palette.length]),
                borderWidth:1
            }]
        },
        options:{
            plugins:{
                legend:{position:'bottom',labels:{font:{family:'Tajawal'}}},
                tooltip:{rtl:true,bodyAlign:'right'}
            }
        }
    });
}

/* =================== ترقيم الصفحات =================== */
function renderPagination(p){
    const wrap=document.getElementById('pagination');
    wrap.innerHTML='';
    if(p.total_pages<=1) return;
    for(let i=1;i<=p.total_pages;i++){
        const btn=document.createElement('button');
        btn.textContent=i;
        if(i===p.page) btn.classList.add('active');
        btn.addEventListener('click',()=>{
            currentPage=i;
            generateReport(false,i);
        });
        wrap.appendChild(btn);
    }
}

/* =================== تصدير =================== */
function exportCsv(){
    if(!currentRequestPayload) currentRequestPayload=buildPayload();
    const q=new URLSearchParams();
    Object.entries(currentRequestPayload).forEach(([k,v])=>{
        if(Array.isArray(v)) v.forEach(val=>q.append(k+'[]',val));
        else if(v!==null && v!=='') q.append(k,v);
    });
    window.open('/custom-reports/export/csv?'+q.toString(),'_blank');
}
function exportExcel(){
    if(!currentRequestPayload) currentRequestPayload=buildPayload();
    const q=new URLSearchParams();
    Object.entries(currentRequestPayload).forEach(([k,v])=>{
        if(Array.isArray(v)) v.forEach(val=>q.append(k+'[]',val));
        else if(v!==null && v!=='') q.append(k,v);
    });
    window.open('/custom-reports/export/excel?'+q.toString(),'_blank');
}
function exportPdf(){
    if(!currentRequestPayload) currentRequestPayload=buildPayload();
    const q=new URLSearchParams();
    Object.entries(currentRequestPayload).forEach(([k,v])=>{
        if(Array.isArray(v)) v.forEach(val=>q.append(k+'[]',val));
        else if(v!==null && v!=='') q.append(k,v);
    });
    window.open('/custom-reports/export/pdf?'+q.toString(),'_blank');
}

/* =================== حفظ قالب (استعراضي) =================== */
async function saveTemplate(){
    const name=prompt('اسم القالب:','قالب تقرير');
    if(!name) return;
    const res=await fetch('/custom-reports/templates/save',{
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRF-TOKEN':csrfToken},
        body:JSON.stringify({name,config:buildPayload()})
    });
    const json=await res.json();
    alert(json.message||'تم الحفظ');
}

/* =================== إعادة ضبط =================== */
function resetFilters(){
    $('#reportStatusFilter').val(['completed','pending']).trigger('change');
    $('#customEmployees').val(null).trigger('change');
    $('#reportRegionFilter').val(null).trigger('change');
    $('#licenseTypesFilter').val(null).trigger('change');
    $('#reportColumns').val(['request_number','license_type','assigned_employee','created_at','status_name']).trigger('change');
    $('#reportSorting').val('-created_at');
    $('#startDate').val('');
    $('#endDate').val('');
    currentPage=1;
    generateReport(false);
}

/* =================== طباعة =================== */
function printReport(){ window.print(); }

/*/////////////////////////////////////////////////////////////////////////////////////////////////////*/
/* =================== تصدير Excel =================== */
function exportExcel(){
    if(!currentRequestPayload) currentRequestPayload = buildPayload();

    // الحصول على البيانات من الجدول
    const table = document.getElementById('customReportTable');
    const headers = [];
    const data = [];

    // جمع العناوين
    const headerRow = table.querySelectorAll('thead th');
    headerRow.forEach(th => {
        headers.push(th.textContent.trim());
    });

    // جمع البيانات
    const rows = table.querySelectorAll('tbody tr');
    rows.forEach(row => {
        const rowData = [];
        const cells = row.querySelectorAll('td');
        cells.forEach(cell => {
            // إزالة أي تنسيقات HTML (مثل الـ badges)
            rowData.push(cell.textContent.trim());
        });
        data.push(rowData);
    });

    // إنشاء مصنف Excel
    const worksheet = XLSX.utils.aoa_to_sheet([headers, ...data]);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "التقرير");

    // تنزيل الملف
    const fileName = `تقرير_${new Date().toLocaleDateString('ar-EG')}.xlsx`;
    XLSX.writeFile(workbook, fileName);
}

// /* =================== تصدير PDF =================== */
// function exportPdf(){
//     if(!currentRequestPayload) currentRequestPayload = buildPayload();

//     const { jsPDF } = window.jspdf;
//     const doc = new jsPDF();

//     // إضافة عنوان
//     doc.setFontSize(18);
//     doc.text('التقرير المخصص', 105, 15, { align: 'center' });
//     doc.setFontSize(12);
//     doc.text(`تاريخ التصدير: ${new Date().toLocaleDateString('ar-EG')}`, 105, 22, { align: 'center' });

//     // الحصول على بيانات الجدول
//     const table = document.getElementById('customReportTable');
//     const headers = [];
//     const rows = [];

//     // جمع العناوين
//     const headerCells = table.querySelectorAll('thead th');
//     headerCells.forEach(cell => {
//         headers.push(cell.textContent.trim());
//     });

//     // جمع البيانات
//     const dataRows = table.querySelectorAll('tbody tr');
//     dataRows.forEach(row => {
//         const rowData = [];
//         const cells = row.querySelectorAll('td');
//         cells.forEach(cell => {
//             rowData.push(cell.textContent.trim());
//         });
//         rows.push(rowData);
//     });

//     // إنشاء الجدول في PDF
//     doc.autoTable({
//         head: [headers],
//         body: rows,
//         startY: 30,
//         theme: 'grid',
//         styles: { font: 'tajawal', fontSize: 8 },
//         headStyles: { fillColor: [10, 31, 58] },
//         margin: { right: 10, left: 10 }
//     });

//     // حفظ الملف
//     const fileName = `تقرير_${new Date().toLocaleDateString('ar-EG')}.pdf`;
//     doc.save(fileName);
// }


    // async function exportPdf(){
    //     if(!currentRequestPayload) currentRequestPayload = buildPayload();

    //     const { jsPDF } = window.jspdf;
    //     const doc = new jsPDF({orientation: 'portrait', unit: 'pt', format: 'a4'});

    //     // تحميل وإضافة خط عربي
    //     try {
    //         const fontUrl = 'https://cdn.jsdelivr.net/gh/googlefonts/noto-fonts@main/hinted/ttf/NotoSansArabic/NotoSansArabic-Regular.ttf';
    //         const fontResponse = await fetch(fontUrl);
    //         const fontData = await fontResponse.arrayBuffer();
    //         doc.addFileToVFS("NotoSansArabic-Regular.ttf", arrayBufferToBase64(fontData));
    //         doc.addFont("NotoSansArabic-Regular.ttf", "NotoSansArabic", "normal");
    //         doc.setFont("NotoSansArabic");
    //     } catch (e) {
    //         console.error("خطأ تحميل الخط:", e);
    //         doc.setFont("helvetica");
    //     }

    //     // عنوان
    //     doc.setFontSize(18);
    //     doc.text("التقرير المخصص", doc.internal.pageSize.getWidth()/2, 40, {align: "center"});
    //     doc.setFontSize(12);
    //     doc.text(`تاريخ التصدير: ${new Date().toLocaleDateString("ar-EG")}`, doc.internal.pageSize.getWidth()/2, 60, {align: "center"});

    //     // جلب الجدول
    //     const table = document.getElementById("customReportTable");
    //     let headers = [];
    //     let rows = [];

    //     // عناوين الأعمدة
    //     table.querySelectorAll("thead th").forEach(cell => headers.push(cell.textContent.trim()));
    //     // بيانات الأعمدة
    //     table.querySelectorAll("tbody tr").forEach(row => {
    //         let rowData = [];
    //         row.querySelectorAll("td").forEach(cell => {
    //             rowData.push(cell.textContent.trim());
    //         });
    //         rows.push(rowData);
    //     });

    //     // عكس الاتجاه RTL (الأعمدة من اليمين لليسار)
    //     headers = headers.reverse();
    //     rows = rows.map(r => r.reverse());

    //     // إنشاء الجدول في PDF
    //     doc.autoTable({
    //         head: [headers],
    //         body: rows,
    //         startY: 80,
    //         theme: "grid",
    //         styles: {
    //             font: "NotoSansArabic",
    //             fontSize: 10,
    //             halign: "right",  // محاذاة لليمين
    //         },
    //         headStyles: {
    //             fillColor: [10, 31, 58],
    //             textColor: 255,
    //             halign: "center",
    //             font: "NotoSansArabic"
    //         },
    //         columnStyles: {
    //             0: {halign: "right"} // العمود الأول
    //         },
    //         margin: {left: 20, right: 20}
    //     });

    //     // حفظ
    //     const fileName = `تقرير_${new Date().toLocaleDateString("ar-EG")}.pdf`;
    //     doc.save(fileName);
    // }

    // // تحويل arrayBuffer → Base64
    // function arrayBufferToBase64(buffer) {
    //     let binary = '';
    //     let bytes = new Uint8Array(buffer);
    //     let chunk = 0x8000;
    //     for (let i = 0; i < bytes.length; i += chunk) {
    //         let sub = bytes.subarray(i, i + chunk);
    //         binary += String.fromCharCode.apply(null, sub);
    //     }
    //     return btoa(binary);
    // }


// async function exportPdf() {
//     if (!currentRequestPayload) currentRequestPayload = buildPayload();

//     const { jsPDF } = window.jspdf;
//     const doc = new jsPDF({ orientation: 'portrait', unit: 'pt', format: 'a4' });

//     // ================== تحميل الخط العربي ==================
//     try {
//         const fontUrl = 'https://cdn.jsdelivr.net/gh/googlefonts/noto-fonts@main/hinted/ttf/NotoSansArabic/NotoSansArabic-Regular.ttf';
//         const fontResponse = await fetch(fontUrl);
//         const fontData = await fontResponse.arrayBuffer();
//         doc.addFileToVFS("NotoSansArabic-Regular.ttf", arrayBufferToBase64(fontData));
//         doc.addFont("NotoSansArabic-Regular.ttf", "NotoSansArabic", "normal");
//         doc.setFont("NotoSansArabic");
//     } catch (e) {
//         console.error("خطأ تحميل الخط:", e);
//         doc.setFont("helvetica");
//     }

//     // ================== العنوان ==================
//     doc.setFontSize(18);
//     doc.text("التقرير المخصص", doc.internal.pageSize.getWidth() / 2, 40, { align: "center" });
//     doc.setFontSize(12);
//     doc.text(`تاريخ التصدير: ${new Date().toLocaleDateString("ar-EG")}`, doc.internal.pageSize.getWidth() / 2, 60, { align: "center" });

//     // ================== جلب الجدول ==================
//     const table = document.getElementById("customReportTable");
//     let headers = [];
//     let rows = [];

//     // عناوين الأعمدة
//     table.querySelectorAll("thead th").forEach(cell => headers.push(cell.textContent.trim()));

//     // بيانات الصفوف
//     table.querySelectorAll("tbody tr").forEach(row => {
//         let rowData = [];
//         row.querySelectorAll("td").forEach(cell => {
//             let txt = cell.textContent.trim();
//             rowData.push(fixTextDirection(txt)); // ✅ معالجة النص
//         });
//         rows.push(rowData);
//     });

//     // قلب الأعمدة RTL
//     headers = headers.reverse();
//     rows = rows.map(r => r.reverse());

//     // ================== إنشاء الجدول ==================
//     doc.autoTable({
//         head: [headers],
//         body: rows,
//         startY: 80,
//         theme: "grid",
//         styles: {
//             font: "NotoSansArabic",
//             fontSize: 10,
//             halign: "right", // محاذاة لليمين
//         },
//         headStyles: {
//             fillColor: [10, 31, 58],
//             textColor: 255,
//             halign: "center",
//             font: "NotoSansArabic"
//         },
//         margin: { left: 20, right: 20 }
//     });

//     // ================== حفظ الملف ==================
//     const fileName = `تقرير_${new Date().toLocaleDateString("ar-EG")}.pdf`;
//     doc.save(fileName);
// }

// // ================== دوال مساعدة ==================

// // تحويل arrayBuffer → Base64
// function arrayBufferToBase64(buffer) {
//     let binary = '';
//     let bytes = new Uint8Array(buffer);
//     let chunk = 0x8000;
//     for (let i = 0; i < bytes.length; i += chunk) {
//         let sub = bytes.subarray(i, i + chunk);
//         binary += String.fromCharCode.apply(null, sub);
//     }
//     return btoa(binary);
// }

// // ✅ معالجة النصوص (عربي / إنجليزي)
// function fixTextDirection(text) {
//     if (!text) return "";

//     const hasArabic = /[\u0600-\u06FF]/.test(text);

//     if (hasArabic) {
//         return text; // عربي: خليه كما هو
//     } else {
//         return text.toString(); // إنجليزي أو رقم: لا تعكسه
//     }
// }

//////////////////////////////////////////////////////////////////////////////////////////////
async function exportPdf() {
    if (!currentRequestPayload) currentRequestPayload = buildPayload();

    // إضافة خط عربي Web Font إلى الصفحة مؤقتاً
    const link = document.createElement("link");
    link.href = "https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic&display=swap";
    link.rel = "stylesheet";
    document.head.appendChild(link);

    // إنشاء محتوى التقرير
    const container = document.createElement("div");
    container.id = "pdfContent";
    container.style.direction = "rtl";
    container.style.fontFamily = "'Noto Sans Arabic', Arial, sans-serif"; // خط عربي متصل
    container.style.padding = "20px";
    container.style.width = "100%";
    container.style.maxWidth = "800px";
    container.style.margin = "auto";
    container.style.background = "#fff";
    container.style.border = "2px solid #000";
    container.style.borderRadius = "10px";

    // العنوان والتاريخ
    const title = document.createElement("h1");
    title.textContent = "التقرير المخصص";
    title.style.textAlign = "center";
    container.appendChild(title);

    const date = document.createElement("p");
    date.innerHTML = `<strong>تاريخ التصدير:</strong> ${new Date().toLocaleDateString('ar-EG')}`;
    date.style.textAlign = "center";
    container.appendChild(date);

    // الجدول
    const table = document.createElement("table");
    table.style.width = "100%";
    table.style.borderCollapse = "collapse";

    // الرأس
    const thead = document.createElement("thead");
    const headerRow = document.createElement("tr");
    const tableHeaders = Array.from(document.querySelectorAll("#customReportTable thead th")).map(th => th.textContent.trim());
    tableHeaders.forEach(text => {
        const th = document.createElement("th");
        th.textContent = text;
        th.style.border = "1px solid #000";
        th.style.padding = "8px";
        th.style.textAlign = "center";
        th.style.backgroundColor = "#0a1f3a";
        th.style.color = "#fff";
        headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);
    table.appendChild(thead);

    // الجسم
    const tbody = document.createElement("tbody");
    document.querySelectorAll("#customReportTable tbody tr").forEach(row => {
        const tr = document.createElement("tr");
        row.querySelectorAll("td").forEach(cell => {
            const td = document.createElement("td");
            td.textContent = cell.textContent.trim(); // العربي سيظهر متصل
            td.style.border = "1px solid #000";
            td.style.padding = "8px";
            td.style.textAlign = "right"; // RTL
            tr.appendChild(td);
        });
        tbody.appendChild(tr);
    });
    table.appendChild(tbody);
    container.appendChild(table);

    // الفوتر
    const footer = document.createElement("div");
    footer.textContent = "وزارة الأشغال - قسم التراخيص";
    footer.style.marginTop = "20px";
    footer.style.textAlign = "center";
    footer.style.fontSize = "14px";
    container.appendChild(footer);

    document.body.appendChild(container); // مؤقتًا لإصدار PDF

    // إعداد html2pdf
    const opt = {
        margin: 0.5,
        filename: `تقرير_${new Date().toLocaleDateString('ar-EG')}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, letterRendering: true, useCORS: true },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    };

    await html2pdf().set(opt).from(container).save();
    container.remove(); // إزالة العنصر بعد التصدير
}

// async function exportPdf() {
//     if (!currentRequestPayload) currentRequestPayload = buildPayload();

//     // استخدام خط "Cairo" المدمج
//     pdfMake.fonts = {
//         Cairo: {
//             normal: 'Cairo-Regular.ttf',
//             bold: 'Cairo-Bold.ttf',
//             italics: 'Cairo-Italic.ttf',
//             bolditalics: 'Cairo-BoldItalic.ttf'
//         }
//     };

//     // ====== جمع بيانات الجدول من الصفحة ======
//     const headers = Array.from(document.querySelectorAll("#customReportTable thead th"))
//         .map(th => th.textContent.trim())
//         .reverse(); // RTL

//     const rows = Array.from(document.querySelectorAll("#customReportTable tbody tr"))
//         .map(tr => Array.from(tr.querySelectorAll("td"))
//             .map(td => td.textContent.trim())
//             .reverse()
//         );

//     // ====== تعريف محتوى PDF ======
//     const docDefinition = {
//         content: [
//             { text: 'التقرير المخصص', fontSize: 18, alignment: 'center', margin: [0, 0, 0, 10] },
//             { text: `تاريخ التصدير: ${new Date().toLocaleDateString('ar-EG')}`, alignment: 'center', margin: [0, 0, 0, 20] },
//             {
//                 table: {
//                     headerRows: 1,
//                     widths: Array(headers.length).fill('*'),
//                     body: [headers, ...rows]
//                 },
//                 layout: {
//                     fillColor: function (rowIndex) {
//                         return rowIndex === 0 ? '#0a1f3a' : null;
//                     }
//                 }
//             },
//             { text: 'وزارة الأشغال - قسم التراخيص', alignment: 'center', margin: [0, 30, 0, 0], fontSize: 12 }
//         ],
//         defaultStyle: {
//             font: 'Cairo',
//             alignment: 'right',
//             fontSize: 12
//         },
//         styles: {
//             tableHeader: {
//                 color: 'white',
//                 bold: true,
//                 alignment: 'center'
//             }
//         }
//     };

//     // ====== إنشاء وتحميل الملف ======
//     pdfMake.createPdf(docDefinition).download(`تقرير_${new Date().toLocaleDateString('ar-EG')}.pdf`);
// }





// async function exportPdf() {
//     if (!currentRequestPayload) currentRequestPayload = buildPayload();

//     // ================== إنشاء محتوى التقرير ديناميكي ==================
//     const container = document.createElement("div");
//     container.id = "pdfContent";
//     container.style.direction = "rtl";
//     container.style.fontFamily = "Arial, sans-serif";
//     container.style.padding = "20px";
//     container.style.width = "100%";
//     container.style.maxWidth = "800px";
//     container.style.margin = "auto";
//     container.style.background = "#fff";
//     container.style.border = "2px solid #000";
//     container.style.borderRadius = "10px";

//     // العنوان والتاريخ
//     const title = document.createElement("h1");
//     title.textContent = "التقرير المخصص";
//     title.style.textAlign = "center";
//     container.appendChild(title);

//     const date = document.createElement("p");
//     date.innerHTML = `<strong>تاريخ التصدير:</strong> ${new Date().toLocaleDateString('ar-EG')}`;
//     container.appendChild(date);

//     // الجدول
//     const table = document.createElement("table");
//     table.style.width = "100%";
//     table.style.borderCollapse = "collapse";

//     // الرأس
//     const thead = document.createElement("thead");
//     const headerRow = document.createElement("tr");

//     const tableHeaders = Array.from(document.querySelectorAll("#customReportTable thead th")).map(th => th.textContent.trim());
//     tableHeaders.forEach(text => {
//         const th = document.createElement("th");
//         th.textContent = text;
//         th.style.border = "1px solid #000";
//         th.style.padding = "8px";
//         th.style.textAlign = "center";
//         th.style.backgroundColor = "#0a1f3a";
//         th.style.color = "#fff";
//         headerRow.appendChild(th);
//     });
//     thead.appendChild(headerRow);
//     table.appendChild(thead);

//     // الجسم
//     const tbody = document.createElement("tbody");
//     document.querySelectorAll("#customReportTable tbody tr").forEach(row => {
//         const tr = document.createElement("tr");
//         row.querySelectorAll("td").forEach(cell => {
//             const td = document.createElement("td");
//             td.textContent = fixTextDirection(cell.textContent.trim());
//             td.style.border = "1px solid #000";
//             td.style.padding = "8px";
//             td.style.textAlign = "center";
//             tr.appendChild(td);
//         });
//         tbody.appendChild(tr);
//     });
//     table.appendChild(tbody);
//     container.appendChild(table);

//     // الفوتر
//     const footer = document.createElement("div");
//     footer.textContent = "وزارة الأشغال - قسم التراخيص";
//     footer.style.marginTop = "20px";
//     footer.style.textAlign = "center";
//     footer.style.fontSize = "14px";
//     container.appendChild(footer);

//     // ================== إعداد html2pdf ==================
//     const opt = {
//         margin: 0.5,
//         filename: `تقرير_${new Date().toLocaleDateString('ar-EG')}.pdf`,
//         image: { type: 'jpeg', quality: 0.98 },
//         html2canvas: { scale: 2, letterRendering: true },
//         jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
//     };

//     // إنشاء PDF
//     html2pdf().from(container).set(opt).save();
// }

// // ================== دوال مساعدة ==================
// // function fixTextDirection(text) {
// //     if (!text) return "";
// //     const hasArabic = /[\u0600-\u06FF]/.test(text);
// //     if (hasArabic) {
// //         return text; // عربي
// //     } else {
// //         return text.toString(); // إنجليزي أو رقم
// //     }
// // }

// // ================== دوال مساعدة ==================
// function fixTextDirection(text) {
//     if (!text) return "";

//     // إذا النص يحتوي على أي حرف عربي، ضع النص كاملاً كما هو (لأنه RTL)
//     const hasArabic = /[\u0600-\u06FF]/.test(text);
//     if (hasArabic) {
//         return text; // إبقاء النص العربي متصل
//     } else {
//         return text.toString(); // إبقاء الأرقام والإنجليزية كما هي
//     }
// }

/////////////////////////////////////////////////////////////////////////////////


// async function exportPdf() {
//     if (!currentRequestPayload) currentRequestPayload = buildPayload();

//     const { jsPDF } = window.jspdf;
//     const doc = new jsPDF({ orientation: 'portrait', unit: 'pt', format: 'a4' });

//     // ================== تحميل الخط العربي NotoSansArabic ==================
//     try {
//         const fontUrl = 'https://github.com/googlefonts/noto-fonts/raw/main/hinted/ttf/NotoSansArabic/NotoSansArabic-Regular.ttf';
//         const fontResponse = await fetch(fontUrl);
//         const fontData = await fontResponse.arrayBuffer();
//         doc.addFileToVFS("NotoSansArabic-Regular.ttf", arrayBufferToBase64(fontData));
//         doc.addFont("NotoSansArabic-Regular.ttf", "NotoArabic", "normal");
//         doc.setFont("NotoArabic"); // الاسم المستخدم لاحقاً
//     } catch (e) {
//         console.error("خطأ تحميل الخط:", e);
//         doc.setFont("helvetica");
//     }

//     // ================== العنوان ==================
//     doc.setFontSize(18);
//     doc.text("التقرير المخصص", doc.internal.pageSize.getWidth() / 2, 40, { align: "center" });
//     doc.setFontSize(12);
//     doc.text(`تاريخ التصدير: ${new Date().toLocaleDateString('ar-EG')}`, doc.internal.pageSize.getWidth() / 2, 60, { align: "center" });

//     // ================== جمع بيانات الجدول ==================
//     const table = document.getElementById("customReportTable");
//     let headers = [];
//     let rows = [];

//     table.querySelectorAll("thead th").forEach(th => headers.push(th.textContent.trim()));
//     table.querySelectorAll("tbody tr").forEach(row => {
//         let rowData = [];
//         row.querySelectorAll("td").forEach(cell => {
//             rowData.push(fixTextDirection(cell.textContent.trim()));
//         });
//         rows.push(rowData);
//     });

//     // قلب الأعمدة RTL
//     headers = headers.reverse();
//     rows = rows.map(r => r.reverse());

//     // ================== إنشاء الجدول ==================
//     doc.autoTable({
//         head: [headers],
//         body: rows,
//         startY: 80,
//         theme: "grid",
//         styles: {
//             font: "NotoArabic", // ✅ استخدام نفس الاسم
//             fontSize: 10,
//             halign: "right"
//         },
//         headStyles: {
//             fillColor: [10, 31, 58],
//             textColor: 255,
//             halign: "center",
//             font: "NotoArabic" // ✅ نفس الاسم
//         },
//         margin: { left: 20, right: 20 }
//     });

//     // ================== حفظ الملف ==================
//     const fileName = `تقرير_${new Date().toLocaleDateString('ar-EG')}.pdf`;
//     doc.save(fileName);
// }

// // ================== دوال مساعدة ==================
// function arrayBufferToBase64(buffer) {
//     let binary = '';
//     let bytes = new Uint8Array(buffer);
//     let chunk = 0x8000;
//     for (let i = 0; i < bytes.length; i += chunk) {
//         let sub = bytes.subarray(i, i + chunk);
//         binary += String.fromCharCode.apply(null, sub);
//     }
//     return btoa(binary);
// }

// // إبقاء النص العربي متصل، والأرقام والإنجليزية كما هي
// function fixTextDirection(text) {
//     if (!text) return "";
//     const hasArabic = /[\u0600-\u06FF]/.test(text);
//     if (hasArabic) {
//         return text; // عربي: يبقى متصل
//     } else {
//         return text.toString(); // إنجليزي أو رقم: يبقى كما هو
//     }
// }


    // function exportPDF() {
    //   const element = document.getElementById("invoice");
    //   const opt = {
    //     margin: 0.5,
    //     filename: 'invoice.pdf',
    //     image: { type: 'jpeg', quality: 0.98 },
    //     html2canvas: { scale: 2 },
    //     jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    //   };
    //   html2pdf().from(element).set(opt).save();
    // }


////////////////////////////////////////////////////////

// async function exportPdf() {
//     if (!currentRequestPayload) currentRequestPayload = buildPayload();

//     const { jsPDF } = window.jspdf;
//     const doc = new jsPDF({ orientation: 'portrait', unit: 'pt', format: 'a4' });

//     // ================== تحميل خط عربي + إنجليزي (Cairo) ==================
//     try {
//         const fontUrl = 'https://cdn.jsdelivr.net/gh/google/fonts/ofl/cairo/Cairo-Regular.ttf';
//         const fontResponse = await fetch(fontUrl);
//         const fontData = await fontResponse.arrayBuffer();
//         doc.addFileToVFS("Cairo-Regular.ttf", arrayBufferToBase64(fontData));
//         doc.addFont("Cairo-Regular.ttf", "Cairo", "normal");
//         doc.setFont("Cairo");
//     } catch (e) {
//         console.error("خطأ تحميل الخط:", e);
//         doc.setFont("helvetica");
//     }

//     // ================== العنوان ==================
//     doc.setFontSize(18);
//     doc.text("التقرير المخصص", doc.internal.pageSize.getWidth() / 2, 40, { align: "center" });
//     doc.setFontSize(12);
//     doc.text(`تاريخ التصدير: ${new Date().toLocaleDateString("ar-EG")}`, doc.internal.pageSize.getWidth() / 2, 60, { align: "center" });

//     // ================== جلب الجدول ==================
//     const table = document.getElementById("customReportTable");
//     let headers = [];
//     let rows = [];

//     // عناوين الأعمدة
//     table.querySelectorAll("thead th").forEach(cell => headers.push(cell.textContent.trim()));

//     // بيانات الصفوف
//     table.querySelectorAll("tbody tr").forEach(row => {
//         let rowData = [];
//         row.querySelectorAll("td").forEach(cell => {
//             let txt = cell.textContent.trim();
//             rowData.push(fixTextDirection(txt)); // ✅ معالجة النص
//         });
//         rows.push(rowData);
//     });

//     // قلب الأعمدة RTL
//     headers = headers.reverse();
//     rows = rows.map(r => r.reverse());

//     // ================== إنشاء الجدول ==================
//     doc.autoTable({
//         head: [headers],
//         body: rows,
//         startY: 80,
//         theme: "grid",
//         styles: {
//             font: "Cairo", // ✅ الخط الجديد
//             fontSize: 10,
//             halign: "right", // محاذاة لليمين
//         },
//         headStyles: {
//             fillColor: [10, 31, 58],
//             textColor: 255,
//             halign: "center",
//             font: "Cairo"
//         },
//         margin: { left: 20, right: 20 }
//     });

//     // ================== حفظ الملف ==================
//     const fileName = `تقرير_${new Date().toLocaleDateString("ar-EG")}.pdf`;
//     doc.save(fileName);
// }

// // ================== دوال مساعدة ==================
// function arrayBufferToBase64(buffer) {
//     let binary = '';
//     let bytes = new Uint8Array(buffer);
//     let chunk = 0x8000;
//     for (let i = 0; i < bytes.length; i += chunk) {
//         let sub = bytes.subarray(i, i + chunk);
//         binary += String.fromCharCode.apply(null, sub);
//     }
//     return btoa(binary);
// }

// // ✅ معالجة النصوص (عربي / إنجليزي)
// function fixTextDirection(text) {
//     if (!text) return "";

//     const hasArabic = /[\u0600-\u06FF]/.test(text);

//     if (hasArabic) {
//         return text; // عربي: خليه كما هو
//     } else {
//         return text.toString(); // إنجليزي أو رقم: لا تعكسه
//     }
// }


/////////////////////////////////////////////////////////



// /* =================== تصدير PDF مع دعم العربية =================== */
// async function exportPdf(){
//     if(!currentRequestPayload) currentRequestPayload = buildPayload();

//     const { jsPDF } = window.jspdf;
//     const doc = new jsPDF();

//     // إضافة خط عربي (نستخدم Noto Sans Arabic كمثال)
//     try {
//         // تحميل الخط العربي (يمكنك استبدال الرابط بخط آخر)
//         const fontUrl = 'https://cdn.jsdelivr.net/gh/googlefonts/noto-fonts@main/hinted/ttf/NotoSansArabic/NotoSansArabic-Regular.ttf';
//         const fontResponse = await fetch(fontUrl);
//         const fontData = await fontResponse.arrayBuffer();

//         // إضافة الخط إلى jsPDF
//         doc.addFileToVFS('NotoSansArabic-Regular.ttf', arrayBufferToBase64(fontData));
//         doc.addFont('NotoSansArabic-Regular.ttf', 'NotoSansArabic', 'normal');
//         doc.setFont('NotoSansArabic');
//     } catch (error) {
//         console.error('خطأ في تحميل الخط العربي:', error);
//         // استخدام خط افتراضي إذا فشل تحميل الخط المخصص
//         doc.setFont('helvetica');
//     }

//     // إضافة عنوان
//     doc.setFontSize(18);
//     doc.text('التقرير المخصص', 105, 15, { align: 'center' });
//     doc.setFontSize(12);
//     doc.text(`تاريخ التصدير: ${new Date().toLocaleDateString('ar-EG')}`, 105, 22, { align: 'center' });

//     // الحصول على بيانات الجدول
//     const table = document.getElementById('customReportTable');
//     const headers = [];
//     const rows = [];

//     // جمع العناوين
//     const headerCells = table.querySelectorAll('thead th');
//     headerCells.forEach(cell => {
//         headers.push(cell.textContent.trim());
//     });

//     // جمع البيانات
//     const dataRows = table.querySelectorAll('tbody tr');
//     dataRows.forEach(row => {
//         const rowData = [];
//         const cells = row.querySelectorAll('td');
//         cells.forEach(cell => {
//             // استخراج النص فقط (بدون أي تنسيقات HTML)
//             const textContent = cell.textContent.trim();
//             rowData.push(textContent);
//         });
//         rows.push(rowData);
//     });

//     // إنشاء الجدول في PDF
//     doc.autoTable({
//         head: [headers],
//         body: rows,
//         startY: 30,
//         theme: 'grid',
//         styles: {
//             font: 'NotoSansArabic',
//             fontSize: 8,
//             halign: 'right'
//         },
//         headStyles: {
//             fillColor: [10, 31, 58],
//             font: 'NotoSansArabic',
//             halign: 'right'
//         },
//         margin: { right: 10, left: 10 }
//     });

//     // حفظ الملف
//     const fileName = `تقرير_${new Date().toLocaleDateString('ar-EG')}.pdf`;
//     doc.save(fileName);
// }

// // دالة مساعدة لتحويل ArrayBuffer إلى Base64
// function arrayBufferToBase64(buffer) {
//     let binary = '';
//     const bytes = new Uint8Array(buffer);
//     const len = bytes.byteLength;
//     for (let i = 0; i < len; i++) {
//         binary += String.fromCharCode(bytes[i]);
//     }
//     return window.btoa(binary);
// }

/* =================== طباعة التقرير =================== */
function printReport() {
    const printContent = document.getElementById('customReportTable').outerHTML;
    const originalContents = document.body.innerHTML;

    document.body.innerHTML = `
        <!DOCTYPE html>
        <html dir="rtl" lang="ar">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>طباعة التقرير</title>
            <style>
                body {
                    font-family: 'Tajawal', 'Arial', sans-serif;
                    direction: rtl;
                    padding: 20px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 20px 0;
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: right;
                }
                th {
                    background-color: #0a1f3a;
                    color: white;
                    font-weight: bold;
                }
                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }
                h1 {
                    text-align: center;
                    color: #0a1f3a;
                }
                .print-footer {
                    text-align: center;
                    margin-top: 30px;
                    font-size: 12px;
                    color: #666;
                }
                @media print {
                    body {
                        padding: 0;
                        margin: 0;
                    }
                    table {
                        font-size: 10px;
                    }
                }
            </style>
        </head>
        <body>
            <h1>التقرير المخصص</h1>
            ${printContent}
            <div class="print-footer">
                تم الطباعة في: ${new Date().toLocaleDateString('ar-EG')} - ${new Date().toLocaleTimeString('ar-EG')}
            </div>
        </body>
        </html>
    `;

    window.print();
    document.body.innerHTML = originalContents;
}

// /* =================== طباعة التقرير =================== */
// function printReport(){
//     const printContent = document.getElementById('customReportTable').outerHTML;
//     const originalContents = document.body.innerHTML;

//     document.body.innerHTML = `
//         <div dir="rtl">
//             <h1 style="text-align: center; margin-bottom: 20px;">التقرير المخصص</h1>
//             ${printContent}
//             <p style="text-align: center; margin-top: 20px;">
//                 تم الطباعة في: ${new Date().toLocaleDateString('ar-EG')}
//             </p>
//         </div>
//     `;

//     window.print();
//     document.body.innerHTML = originalContents;
//     location.reload();
// }

/* =================== أحداث =================== */
function initEvents(){
    document.getElementById('dropdownBtn').addEventListener('click', toggleDropdown);
    document.getElementById('applyFiltersBtn').addEventListener('click', () => generateReport(false));
    document.getElementById('generateReportBtn').addEventListener('click', () => { currentPage = 1; generateReport(); });
    document.getElementById('quickGenerateBtn').addEventListener('click', () => { currentPage = 1; generateReport(); });
    document.getElementById('resetFiltersBtn').addEventListener('click', resetFilters);
    document.getElementById('saveTemplateBtn').addEventListener('click', saveTemplate);
    document.getElementById('exportCsvBtn').addEventListener('click', exportCsv);
    document.getElementById('exportExcelBtn').addEventListener('click', exportExcel);
    document.getElementById('exportPdfBtn').addEventListener('click', exportPdf);
    document.getElementById('printReportBtn').addEventListener('click', printReport);
}
/*/////////////////////////////////////////////////////////////////////////////////////////////////////*/

// /* =================== أحداث =================== */
// function initEvents(){
//     document.getElementById('dropdownBtn').addEventListener('click',toggleDropdown);
//     document.getElementById('applyFiltersBtn').addEventListener('click',()=>generateReport(false));
//     document.getElementById('generateReportBtn').addEventListener('click',()=>{currentPage=1; generateReport();});
//     document.getElementById('quickGenerateBtn').addEventListener('click',()=>{currentPage=1; generateReport();});
//     document.getElementById('resetFiltersBtn').addEventListener('click',resetFilters);
//     document.getElementById('saveTemplateBtn').addEventListener('click',saveTemplate);
//     document.getElementById('exportCsvBtn').addEventListener('click',exportCsv);
//     document.getElementById('exportExcelBtn').addEventListener('click',exportExcel);
//     document.getElementById('exportPdfBtn').addEventListener('click',exportPdf);
//     document.getElementById('printReportBtn').addEventListener('click',printReport);
// }

/* =================== تهيئة =================== */
async function initPage(){
    await loadMeta();
    initEvents();
    generateReport(false);
}
if(document.readyState==='loading'){
    document.addEventListener('DOMContentLoaded', initPage);
}else{
    initPage();
}
</script>
</body>
</html>
