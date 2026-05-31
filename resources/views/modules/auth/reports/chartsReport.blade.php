{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>لوحة تحليل تراخيص البناء</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    :root {
        --main-blue: #0a1f3a;
        --secondary-blue: #1a365d;
        --accent-gold: #d4af37;
        --light-bg: #f8f9fa;
        --dark-bg: #0a1a2f;
        --card-bg: #eef1f5;
    }
    body { margin:0; font-family:'Tajawal',sans-serif; background:#0d1c32; color:#e0e0e0; }
    .container-fluid { padding:20px 26px; }
    .stat-card {
        background:#12243e; border-radius:12px; padding:18px 16px; margin-bottom:20px;
        box-shadow:0 4px 18px rgba(0,0,0,.35); border-left:4px solid var(--accent-gold); position:relative;
    }
    .stat-card h6 { color:var(--accent-gold); font-weight:600; margin:0 0 8px; font-size:.8rem; letter-spacing:.5px; }
    .stat-card .value { font-size:1.8rem; font-weight:800; color:#fff; letter-spacing:1px; }
    .change { font-size:.65rem; margin-top:4px; font-weight:600; color:var(--card-bg);  }
    .filter-section {
        background-color: var(--card-bg); padding:18px 20px; border-radius:12px;
        box-shadow:0 4px 15px rgba(0,0,0,0.2); margin-bottom:25px; border-left:4px solid var(--accent-gold); color:#1b2c47;
    }
    label.form-label { font-weight:600; color:var(--main-blue); font-size:.8rem; letter-spacing:.5px; }
    select.form-select {
        background:#192f52; border:1px solid #27456d; color:#fff; padding:8px 12px; border-radius:8px; width:100%;
    }
    select.form-select:focus { outline:none; border-color:var(--accent-gold); box-shadow:0 0 0 2px rgba(212,175,55,.3); }
    #btn-apply {
        width:100%; background:var(--accent-gold); border:0; color:#12243e; font-weight:700; padding:10px 14px;
        border-radius:8px; cursor:pointer; margin-top:2px;
    }
    #btn-apply:hover { filter:brightness(1.08); }
    .chart-container {
        background-color: var(--card-bg); border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.25);
        padding:20px 22px; margin-bottom:25px; height:100%; border-left:4px solid var(--accent-gold);
        color:#12243e; position:relative; overflow:hidden;
    }
    .chart-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; padding-bottom:10px; border-bottom:1px solid #cfd7df; }
    .chart-header h5 { color:var(--main-blue); font-weight:800; margin:0; font-size:1rem; display:flex; gap:8px; align-items:center; }
    .chart-actions .btn, .btn-group .btn {
        padding:6px 12px; font-size:.7rem; border-radius:6px; border:1px solid var(--accent-gold);
        background:transparent; color:var(--main-blue); font-weight:600; cursor:pointer; transition:.25s;
    }
    .chart-actions .btn:hover, .btn-group .btn:hover { background:var(--accent-gold); color:var(--main-blue); }
    .btn-group { display:flex; gap:6px; flex-wrap:wrap; }
    .btn-group .btn.active { background:var(--accent-gold); color:var(--main-blue); font-weight:700; }
    table { width:100%; border-collapse:collapse; }
    thead th {
        background:var(--main-blue); color:var(--accent-gold); font-weight:700;
        padding:12px 14px; font-size:.75rem; border-bottom:2px solid var(--accent-gold); letter-spacing:.5px;
    }
    tbody td { padding:11px 14px; border-top:1px solid #2a3d5f; font-size:.72rem; font-weight:600; }
    tbody tr:hover { background:rgba(212,175,55,0.08); }
    .badge {
        display:inline-block; padding:4px 8px; font-size:.6rem; border-radius:18px;
        font-weight:700; letter-spacing:.5px;
    }
    .badge-completed { background:rgba(40,167,69,.15); color:#28a745; }
    .badge-pending { background:rgba(255,193,7,.15); color:#ffc107; }
    .badge-rejected { background:rgba(220,53,69,.15); color:#dc3545; }
    .badge-cancelled { background:rgba(108,117,125,.25); color:#6c757d; }
    .spinner { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-size:.75rem; color:#555; display:none; }
    .small-note { font-size:.55rem; color:#666; margin-top:8px; font-style:italic; }
    .export-btn {
        background:#192f52; border:1px solid #2f4a70; padding:5px 10px; font-size:.6rem;
        border-radius:6px; color:#fff; font-weight:600; cursor:pointer;
    }
    .export-btn:hover { background:var(--accent-gold); color:#12243e; }
    @media (max-width:992px){ .chart-header h5 { font-size:.9rem; } }
</style>
</head>
<body>
<div class="container-fluid">

    <!-- الإحصائيات العلوية -->
    <div class="row" id="top-stats">
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-file-alt"></i> إجمالي التراخيص</h6>
                <div class="value" id="stat-total">—</div>
                <div class="change" id="stat-total-change"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-check-circle"></i> مكتملة</h6>
                <div class="value" id="stat-completed">—</div>
                <div class="change" id="stat-completed-rate"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-spinner"></i> قيد التنفيذ</h6>
                <div class="value" id="stat-in-progress">—</div>
                <div class="change" id="stat-progress-note"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-times-circle"></i> مرفوض / ملغى</h6>
                <div class="value" id="stat-rejected-cancelled">—</div>
                <div class="change" id="stat-rejected-note"></div>
            </div>
        </div>
    </div>

    <!-- الفلاتر -->
    <div class="filter-section">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">الموظف</label>
                <select id="filter-employee" class="form-select">
                    <option value="all">جميع الموظفين</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">الفترة</label>
                <select id="filter-time-range" class="form-select">
                    <option value="7">أسبوع</option>
                    <option value="30" selected>شهر</option>
                    <option value="90">ربع سنة</option>
                    <option value="365">سنة</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">نوع الترخيص</label>
                <select id="filter-license-type" class="form-select">
                    <option value="all">الكل</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <button id="btn-apply">تطبيق الفلاتر</button>
            </div>
        </div>
        <div class="small-note">يتم تطبيق هذه الفلاتر على جميع الرسوم أدناه.</div>
    </div>

    <div class="row">
        <!-- أداء الموظفين -->
        <div class="col-lg-6">
            <div class="chart-container" id="employee-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-users"></i> أداء الموظفين</h5>
                    <div style="display:flex; gap:8px; flex-wrap:wrap;">
                        <button class="export-btn" id="btn-employee-toggle">تبديل النوع</button>
                        <button class="export-btn" id="btn-employee-export-img">صورة</button>
                    </div>
                </div>
                <canvas id="employeePerformanceChart" height="300"></canvas>
                <div style="display:flex; gap:14px; flex-wrap:wrap; margin-top:10px;">
                    <label style="display:flex; align-items:center; gap:6px; font-size:.65rem;">
                        <input type="checkbox" id="chk-show-target" checked> الأهداف
                    </label>
                    <label style="display:flex; align-items:center; gap:6px; font-size:.65rem;">
                        <input type="checkbox" id="chk-show-comparison" checked> مقارنة
                    </label>
                </div>
                <div class="spinner" id="spinner-employee">جاري التحميل...</div>
            </div>
        </div>

        <!-- التوزيع الجغرافي -->
        <div class="col-lg-6">
            <div class="chart-container" id="region-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-map-marked-alt"></i> التوزيع الجغرافي</h5>
                    <div class="btn-group" id="btn-region-metrics">
                        <button class="btn active" data-metric="requests">الطلبات</button>
                        <button class="btn" data-metric="duration">المدة</button>
                        <button class="btn" data-metric="efficiency">الكفاءة</button>
                    </div>
                </div>
                <canvas id="regionDistributionChart" height="300"></canvas>
                <div class="spinner" id="spinner-region">جاري التحميل...</div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <!-- التوجهات الزمنية -->
        <div class="col-lg-8">
            <div class="chart-container" id="trend-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-chart-line"></i> التوجهات الزمنية</h5>
                    <div class="btn-group" id="btn-trend-metrics">
                        <button class="btn active" data-metric="requests">الطلبات</button>
                        <button class="btn" data-metric="completion">الإنجاز</button>
                        <button class="btn" data-metric="efficiency">الكفاءة</button>
                        <button class="btn" data-metric="revenue">الإيرادات</button>
                    </div>
                </div>
                <canvas id="performanceTrendChart" height="220"></canvas>
                <div class="spinner" id="spinner-trend">جاري التحميل...</div>
            </div>
        </div>

        <!-- توزيع أنواع التراخيص -->
        <div class="col-lg-4">
            <div class="chart-container" id="license-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-pie-chart"></i> توزيع أنواع التراخيص</h5>
                    <button class="export-btn" id="btn-license-export-img">صورة</button>
                </div>
                <canvas id="licenseTypeChart" height="220"></canvas>
                <div class="spinner" id="spinner-license">جاري التحميل...</div>
            </div>
        </div>
    </div>

    <!-- أحدث الطلبات -->
    <div class="row mt-2">
        <div class="col-12">
            <div class="chart-container" id="recent-box">
                <div class="chart-header">
                    <h5><i class="fas fa-table"></i> أحدث طلبات التراخيص</h5>
                </div>
                <div class="table-responsive" style="max-height:380px; overflow:auto;">
                    <table class="table table-hover align-middle" id="recentTable">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>نوع الترخيص</th>
                                <th>المستفيد</th>
                                <th>المحافظة</th>
                                <th>تاريخ الطلب</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody id="recentTBody">
                            <tr><td colspan="6">جاري التحميل...</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="spinner" id="spinner-recent">جاري التحميل...</div>
            </div>
        </div>
    </div>
</div>

<!-- مكتبات -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        /* ======== متغيرات عامة ======== */
        let charts = { employee:null, region:null, trend:null, license:null };
        let regionMetric='requests';
        let trendMetric='requests';
        let employeeChartType='bar';

        function getFilters(){
            return {
                employee_id: document.getElementById('filter-employee').value,
                license_type_id: document.getElementById('filter-license-type').value,
                time_range: document.getElementById('filter-time-range').value
            };
        }
        function buildQuery(extra={}){
            const f=getFilters();
            const params=new URLSearchParams();
            Object.entries(f).forEach(([k,v])=>params.append(k,v));
            Object.entries(extra).forEach(([k,v])=>params.append(k,v));
            return '?'+params.toString();
        }
        function showSpinner(id,show=true){
            const el=document.getElementById('spinner-'+id);
            if(el) el.style.display=show?'block':'none';
        }

        /* ======== META ======== */
        async function loadMeta(){
            const res=await fetch('/charts-reports/meta');
            const json=await res.json();
            if(!json.success) return;
            const empSel=document.getElementById('filter-employee');
            json.data.employees.forEach(e=>{
                const opt=document.createElement('option');
                opt.value=e.id; opt.textContent=e.name;
                empSel.appendChild(opt);
            });
            const licSel=document.getElementById('filter-license-type');
            json.data.licenseTypes.forEach(t=>{
                const opt=document.createElement('option');
                opt.value=t.id; opt.textContent=t.name;
                licSel.appendChild(opt);
            });
        }

        /* ======== SUMMARY ======== */
        async function loadSummary(){
            const res=await fetch('/charts-reports/summary'+buildQuery());
            const json=await res.json();
            if(!json.success) return;
            const s=json.data;
            document.getElementById('stat-total').textContent=s.total;
            document.getElementById('stat-completed').textContent=s.completed;
            document.getElementById('stat-in-progress').textContent=s.in_progress;
            document.getElementById('stat-rejected-cancelled').textContent=s.rejected + s.cancelled;
            document.getElementById('stat-completed-rate').textContent='إنجاز: '+s.completion_rate+'%';
        }

        /* ======== EMPLOYEE CHART ======== */
        async function loadEmployeeChart(){
            showSpinner('employee',true);
            const url='/charts-reports/charts/employee-performance'+buildQuery();
            const res=await fetch(url);
            const json=await res.json();
            showSpinner('employee',false);
            if(!json.success) return;

            const d=json.data;
            const ctx=document.getElementById('employeePerformanceChart').getContext('2d');
            if(charts.employee) charts.employee.destroy();

            const datasets=[{
                label:'منجز',
                data:d.completed,
                backgroundColor:'rgba(255,159,64,0.6)',
                borderColor:'rgba(255,159,64,1)',
                borderWidth:1,
                type:employeeChartType
            }];

            if(document.getElementById('chk-show-target').checked){
                datasets.push({
                    label:'الهدف',
                    data:d.target,
                    borderColor:'#0d6efd',
                    backgroundColor:'rgba(13,110,253,0.15)',
                    borderWidth:2,
                    type:'line',
                    tension:.3,
                    fill:true
                });
            }
            if(document.getElementById('chk-show-comparison').checked){
                datasets.push({
                    label:'مقارنة',
                    data:d.comparison,
                    borderColor:'#6f42c1',
                    backgroundColor:'rgba(111,66,193,0.15)',
                    borderWidth:2,
                    type:'line',
                    tension:.3,
                    fill:true
                });
            }

            charts.employee=new Chart(ctx,{
                data:{ labels:d.labels, datasets },
                options:{
                    responsive:true,
                    indexAxis: employeeChartType==='bar'?'y':'x',
                    scales:{ x:{ beginAtZero:true } }
                }
            });
        }

        /* ======== REGION CHART ======== */
        async function loadRegionChart(){
            showSpinner('region',true);
            const url='/charts-reports/charts/region-distribution'+buildQuery({metric:regionMetric});
            const res=await fetch(url);
            const json=await res.json();
            showSpinner('region',false);
            if(!json.success) return;
            const d=json.data;
            const ctx=document.getElementById('regionDistributionChart').getContext('2d');
            if(charts.region) charts.region.destroy();
            const color = regionMetric==='requests'
                ? 'rgba(54,162,235,0.6)'
                : regionMetric==='duration'
                    ? 'rgba(255,193,7,0.6)'
                    : 'rgba(40,167,69,0.6)';
            charts.region=new Chart(ctx,{
                type:'bar',
                data:{
                    labels:d.labels,
                    datasets:[{
                        label: regionMetric==='requests'?'عدد الطلبات':(regionMetric==='duration'?'متوسط الأيام':'الكفاءة %'),
                        data:d.values,
                        backgroundColor:color,
                        borderColor:color.replace('0.6','1'),
                        borderWidth:1
                    }]
                },
                options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
            });
        }

        /* ======== TREND CHART ======== */
        async function loadTrendChart(){
            showSpinner('trend',true);
            const url='/charts-reports/charts/performance-trend'+buildQuery();
            const res=await fetch(url);
            const json=await res.json();
            showSpinner('trend',false);
            if(!json.success) return;
            const d=json.data;

            let datasetValues=[]; let label='الطلبات';
            if(trendMetric==='requests'){ datasetValues=d.requests; label='الطلبات'; }
            else if(trendMetric==='completion'){ datasetValues=d.completion; label='الإنجاز %'; }
            else if(trendMetric==='efficiency'){ datasetValues=d.efficiency; label='الكفاءة %'; }
            else if(trendMetric==='revenue'){ datasetValues=d.revenue; label='الإيرادات'; }

            const ctx=document.getElementById('performanceTrendChart').getContext('2d');
            if(charts.trend) charts.trend.destroy();
            charts.trend=new Chart(ctx,{
                type:'line',
                data:{
                    labels:d.labels,
                    datasets:[{
                        label:label,
                        data:datasetValues,
                        borderColor:'#36b9cc',
                        backgroundColor:'rgba(54,185,204,.2)',
                        borderWidth:2,
                        tension:.3,
                        fill:true
                    }]
                },
                options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
            });
        }

        /* ======== LICENSE TYPES CHART ======== */
        async function loadLicenseChart(){
            showSpinner('license',true);
            const url='/charts-reports/charts/license-types'+buildQuery();
            const res=await fetch(url);
            const json=await res.json();
            showSpinner('license',false);
            if(!json.success) return;
            const d=json.data;
            const ctx=document.getElementById('licenseTypeChart').getContext('2d');
            if(charts.license) charts.license.destroy();
            charts.license=new Chart(ctx,{
                type:'pie',
                data:{
                    labels:d.labels,
                    datasets:[{
                        label:'إجمالي الطلبات',
                        data:d.totals,
                        backgroundColor:[
                            '#4e73df','#1cc88a','#36b9cc','#f6c23e','#e74a3b','#6610f2','#858796','#20c997'
                        ],
                        borderWidth:1
                    }]
                },
                options:{ responsive:true, plugins:{ legend:{ position:'bottom' } } }
            });
        }

        /* ======== RECENT REQUESTS ======== */
        function statusBadge(name){
            if(name==='مكتمل') return 'badge-completed';
            if(name==='مرفوض') return 'badge-rejected';
            if(name==='ملغى') return 'badge-cancelled';
            return 'badge-pending';
        }
        async function loadRecent(){
            showSpinner('recent',true);
            const url='/charts-reports/recent-requests'+buildQuery();
            const res=await fetch(url);
            const json=await res.json();
            showSpinner('recent',false);
            const body=document.getElementById('recentTBody');
            if(!json.success){
                body.innerHTML='<tr><td colspan="6">خطأ في جلب البيانات</td></tr>';
                return;
            }
            if(!json.data.length){
                body.innerHTML='<tr><td colspan="6">لا توجد بيانات</td></tr>';
                return;
            }
            body.innerHTML='';
            json.data.forEach(r=>{
                const tr=document.createElement('tr');
                tr.innerHTML=`
                    <td>${r.request_number}</td>
                    <td>${r.license_type}</td>
                    <td>${r.beneficiary}</td>
                    <td>${r.governorate}</td>
                    <td>${new Date(r.created_at).toLocaleDateString('ar-EG')}</td>
                    <td><span class="badge ${statusBadge(r.status_name)}">${r.status_name}</span></td>
                `;
                body.appendChild(tr);
            });
        }

        /* ======== تصدير صورة فقط ======== */
        function exportChartImage(canvasId, filename){
            const canvas=document.getElementById(canvasId);
            if(!canvas) return;
            const link=document.createElement('a');
            link.download=filename+'.png';
            link.href=canvas.toDataURL('image/png');
            link.click();
        }

        /* ======== EVENTS ======== */
        function attachEvents(){
            document.getElementById('btn-apply').addEventListener('click', reloadAll);
            document.getElementById('chk-show-target').addEventListener('change', loadEmployeeChart);
            document.getElementById('chk-show-comparison').addEventListener('change', loadEmployeeChart);
            document.getElementById('btn-employee-toggle').addEventListener('click',()=>{
                employeeChartType = employeeChartType==='bar' ? 'line' : 'bar';
                loadEmployeeChart();
            });
            document.getElementById('btn-license-export-img').addEventListener('click',()=>exportChartImage('licenseTypeChart','license_types_chart'));
            document.getElementById('btn-employee-export-img').addEventListener('click',()=>exportChartImage('employeePerformanceChart','employee_performance'));

            document.querySelectorAll('#btn-region-metrics .btn').forEach(btn=>{
                btn.addEventListener('click',()=>{
                    document.querySelectorAll('#btn-region-metrics .btn').forEach(b=>b.classList.remove('active'));
                    btn.classList.add('active');
                    regionMetric=btn.getAttribute('data-metric');
                    loadRegionChart();
                });
            });

            document.querySelectorAll('#btn-trend-metrics .btn').forEach(btn=>{
                btn.addEventListener('click',()=>{
                    document.querySelectorAll('#btn-trend-metrics .btn').forEach(b=>b.classList.remove('active'));
                    btn.classList.add('active');
                    trendMetric=btn.getAttribute('data-metric');
                    loadTrendChart();
                });
            });
        }

        /* ======== إعادة تحميل شامل ======== */
        function reloadAll(){
            loadSummary();
            loadEmployeeChart();
            loadRegionChart();
            loadTrendChart();
            loadLicenseChart();
            loadRecent();
        }

        /* ======== INIT ======== */
        async function init(){
            await loadMeta();
            attachEvents();
            reloadAll();
        }

        if(document.readyState==='loading'){ document.addEventListener('DOMContentLoaded',init); }
        else { init(); }
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>لوحة تحليل تراخيص البناء</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    :root {
        --main-blue: #0a1f3a;
        --secondary-blue: #1a365d;
        --accent-gold: #d4af37;
        --light-bg: #f8f9fa;
        --dark-bg: #0a1a2f;
        --card-bg: #eef1f5;
    }
  
    .container-fluid { padding:20px 26px; }
    .stat-card {
        background:#12243e; border-radius:12px; padding:18px 16px; margin-bottom:20px;
        box-shadow:0 4px 18px rgba(0,0,0,.35); border-left:4px solid var(--accent-gold); position:relative;
    }
    .stat-card h6 { color:var(--accent-gold); font-weight:600; margin:0 0 8px; font-size:.8rem; letter-spacing:.5px; }
    .stat-card .value { font-size:1.8rem; font-weight:800; color:#fff; letter-spacing:1px; }
    .change { font-size:.65rem; margin-top:4px; font-weight:600; color:var(--card-bg);  }
    .filter-section {
        background-color: var(--card-bg); padding:18px 20px; border-radius:12px;
        box-shadow:0 4px 15px rgba(0,0,0,0.2); margin-bottom:25px; border-left:4px solid var(--accent-gold); color:#1b2c47;
    }
    label.form-label { font-weight:600; color:var(--main-blue); font-size:.8rem; letter-spacing:.5px; }
    select.form-select {
        background:#192f52; border:1px solid #27456d; color:#fff; padding:8px 12px; border-radius:8px; width:100%;
    }
    select.form-select:focus { outline:none; border-color:var(--accent-gold); box-shadow:0 0 0 2px rgba(212,175,55,.3); }
    #btn-apply {
        width:100%; background:var(--accent-gold); border:0; color:#12243e; font-weight:700; padding:10px 14px;
        border-radius:8px; cursor:pointer; margin-top:2px;
    }
    #btn-apply:hover { filter:brightness(1.08); }
    .chart-container {
        background-color: var(--card-bg); border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.25);
        padding:20px 22px; margin-bottom:25px; height:100%; border-left:4px solid var(--accent-gold);
        color:#12243e; position:relative; overflow:hidden;
    }
    .chart-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; padding-bottom:10px; border-bottom:1px solid #cfd7df; }
    .chart-header h5 { color:var(--main-blue); font-weight:800; margin:0; font-size:1rem; display:flex; gap:8px; align-items:center; }
    .chart-actions .btn, .btn-group .btn {
        padding:6px 12px; font-size:.7rem; border-radius:6px; border:1px solid var(--accent-gold);
        background:transparent; color:var(--main-blue); font-weight:600; cursor:pointer; transition:.25s;
    }
    .chart-actions .btn:hover, .btn-group .btn:hover { background:var(--accent-gold); color:var(--main-blue); }
    .btn-group { display:flex; gap:6px; flex-wrap:wrap; }
    .btn-group .btn.active { background:var(--accent-gold); color:var(--main-blue); font-weight:700; }
    table { width:100%; border-collapse:collapse; }
    thead th {
        background:var(--main-blue); color:var(--accent-gold); font-weight:700;
        padding:12px 14px; font-size:.75rem; border-bottom:2px solid var(--accent-gold); letter-spacing:.5px;
    }
    tbody td { padding:11px 14px; border-top:1px solid #2a3d5f; font-size:.72rem; font-weight:600; }
    tbody tr:hover { background:rgba(212,175,55,0.08); }
    .badge {
        display:inline-block; padding:4px 8px; font-size:.6rem; border-radius:18px;
        font-weight:700; letter-spacing:.5px;
    }
    .badge-completed { background:rgba(40,167,69,.15); color:#28a745; }
    .badge-pending { background:rgba(255,193,7,.15); color:#ffc107; }
    .badge-rejected { background:rgba(220,53,69,.15); color:#dc3545; }
    .badge-cancelled { background:rgba(108,117,125,.25); color:#6c757d; }
    .spinner { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-size:.75rem; color:#555; display:none; }
    .small-note { font-size:.55rem; color:#666; margin-top:8px; font-style:italic; }
    .export-btn {
        background:#192f52; border:1px solid #2f4a70; padding:5px 10px; font-size:.6rem;
        border-radius:6px; color:#fff; font-weight:600; cursor:pointer;
    }
    .export-btn:hover { background:var(--accent-gold); color:#12243e; }
    @media (max-width:992px){ .chart-header h5 { font-size:.9rem; } }
</style>
</head>
<body>
<div class="container-fluid">

    <!-- الإحصائيات العلوية -->
    <div class="row" id="top-stats">
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-file-alt"></i> إجمالي التراخيص</h6>
                <div class="value" id="stat-total">—</div>
                <div class="change" id="stat-total-change"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-check-circle"></i> مكتملة</h6>
                <div class="value" id="stat-completed">—</div>
                <div class="change" id="stat-completed-rate"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-spinner"></i> قيد التنفيذ</h6>
                <div class="value" id="stat-in-progress">—</div>
                <div class="change" id="stat-progress-note"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <h6><i class="fas fa-times-circle"></i> مرفوض / ملغى</h6>
                <div class="value" id="stat-rejected-cancelled">—</div>
                <div class="change" id="stat-rejected-note"></div>
            </div>
        </div>
    </div>

    <!-- الفلاتر -->
    <div class="filter-section">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">الموظف</label>
                <select id="filter-employee" class="form-select">
                    <option value="all">جميع الموظفين</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">الفترة</label>
                <select id="filter-time-range" class="form-select">
                    <option value="7">أسبوع</option>
                    <option value="30" selected>شهر</option>
                    <option value="90">ربع سنة</option>
                    <option value="365">سنة</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">نوع الترخيص</label>
                <select id="filter-license-type" class="form-select">
                    <option value="all">الكل</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <button id="btn-apply">تطبيق الفلاتر</button>
            </div>
        </div>
        <div class="small-note">يتم تطبيق هذه الفلاتر على جميع الرسوم أدناه.</div>
    </div>

    <div class="row">
        <!-- أداء الموظفين -->
        <div class="col-lg-6">
            <div class="chart-container" id="employee-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-users"></i> أداء الموظفين</h5>
                    <div style="display:flex; gap:8px; flex-wrap:wrap;">
                        <button class="export-btn" id="btn-employee-toggle">تبديل النوع</button>
                        <button class="export-btn" id="btn-employee-export-img">صورة</button>
                    </div>
                </div>
                <canvas id="employeePerformanceChart" height="300"></canvas>
                <div style="display:flex; gap:14px; flex-wrap:wrap; margin-top:10px;">
                    <label style="display:flex; align-items:center; gap:6px; font-size:.65rem;">
                        <input type="checkbox" id="chk-show-target" checked> الأهداف
                    </label>
                    <label style="display:flex; align-items:center; gap:6px; font-size:.65rem;">
                        <input type="checkbox" id="chk-show-comparison" checked> مقارنة
                    </label>
                </div>
                <div class="spinner" id="spinner-employee">جاري التحميل...</div>
            </div>
        </div>

        <!-- التوزيع الجغرافي -->
        <div class="col-lg-6">
            <div class="chart-container" id="region-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-map-marked-alt"></i> التوزيع الجغرافي</h5>
                    <div class="btn-group" id="btn-region-metrics">
                        <button class="btn active" data-metric="requests">الطلبات</button>
                        <button class="btn" data-metric="duration">المدة</button>
                        <button class="btn" data-metric="efficiency">الكفاءة</button>
                    </div>
                </div>
                <canvas id="regionDistributionChart" height="300"></canvas>
                <div class="spinner" id="spinner-region">جاري التحميل...</div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <!-- التوجهات الزمنية -->
        <div class="col-lg-8">
            <div class="chart-container" id="trend-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-chart-line"></i> التوجهات الزمنية</h5>
                    <div class="btn-group" id="btn-trend-metrics">
                        <button class="btn active" data-metric="requests">الطلبات</button>
                        <button class="btn" data-metric="completion">الإنجاز</button>
                        <button class="btn" data-metric="efficiency">الكفاءة</button>
                        <button class="btn" data-metric="revenue">الإيرادات</button>
                    </div>
                </div>
                <canvas id="performanceTrendChart" height="220"></canvas>
                <div class="spinner" id="spinner-trend">جاري التحميل...</div>
            </div>
        </div>

        <!-- توزيع أنواع التراخيص -->
        <div class="col-lg-4">
            <div class="chart-container" id="license-chart-box">
                <div class="chart-header">
                    <h5><i class="fas fa-pie-chart"></i> توزيع أنواع التراخيص</h5>
                    <button class="export-btn" id="btn-license-export-img">صورة</button>
                </div>
                <canvas id="licenseTypeChart" height="220"></canvas>
                <div class="spinner" id="spinner-license">جاري التحميل...</div>
            </div>
        </div>
    </div>

    <!-- أحدث الطلبات -->
    <div class="row mt-2">
        <div class="col-12">
            <div class="chart-container" id="recent-box">
                <div class="chart-header">
                    <h5><i class="fas fa-table"></i> أحدث طلبات التراخيص</h5>
                </div>
                <div class="table-responsive" style="max-height:380px; overflow:auto;">
                    <table class="table table-hover align-middle" id="recentTable">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>نوع الترخيص</th>
                                <th>المستفيد</th>
                                <th>المحافظة</th>
                                <th>تاريخ الطلب</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody id="recentTBody">
                            <tr><td colspan="6">جاري التحميل...</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="spinner" id="spinner-recent">جاري التحميل...</div>
            </div>
        </div>
    </div>
</div>

<!-- مكتبات -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
/* ======== متغيرات عامة ======== */
let charts = { employee:null, region:null, trend:null, license:null };
let regionMetric='requests';
let trendMetric='requests';
let employeeChartType='bar';

/* إرجاع كائن الفلاتر بنفس أسلوب Control_Panel */
function getFilters(){
    return {
        employee_id: $('#filter-employee').val(),
        license_type_id: $('#filter-license-type').val(),
        time_range: $('#filter-time-range').val()
    };
}
/* دمج الفلاتر مع بارامترات إضافية */
function params(extra={}){
    return Object.assign({}, getFilters(), extra);
}
function showSpinner(id,show=true){
    const el=document.getElementById('spinner-'+id);
    if(el) el.style.display=show?'block':'none';
}

/* ======== META ======== */
function loadMeta(){
    return $.ajax({
        url: '/charts-reports/meta',
        type: 'GET',
        dataType: 'json',
        success: function(json){
            if(!json.success) return;
            const empSel = $('#filter-employee');
            json.data.employees.forEach(e=>{
                empSel.append(new Option(e.name, e.id));
            });
            const licSel = $('#filter-license-type');
            json.data.licenseTypes.forEach(t=>{
                licSel.append(new Option(t.name, t.id));
            });
        },
        error: function(xhr){ console.error('خطأ meta:', xhr.status, xhr.responseText); }
    });
}

/* ======== SUMMARY ======== */
function loadSummary(){
    return $.ajax({
        url: '/charts-reports/summary',
        type: 'GET',
        dataType: 'json',
        data: params(),
        success: function(json){
            if(!json.success) return;
            const s=json.data;
            $('#stat-total').text(s.total);
            $('#stat-completed').text(s.completed);
            $('#stat-in-progress').text(s.in_progress);
            $('#stat-rejected-cancelled').text(s.rejected + s.cancelled);
            $('#stat-completed-rate').text('إنجاز: '+s.completion_rate+'%');
        },
        error: function(xhr){ console.error('خطأ summary:', xhr.status, xhr.responseText); }
    });
}

/* ======== EMPLOYEE CHART ======== */
function loadEmployeeChart(){
    showSpinner('employee',true);
    return $.ajax({
        url: '/charts-reports/charts/employee-performance',
        type: 'GET',
        dataType: 'json',
        data: params(),
        success: function(json){
            showSpinner('employee',false);
            if(!json.success) return;
            const d=json.data;
            const ctx=document.getElementById('employeePerformanceChart').getContext('2d');
            if(charts.employee) charts.employee.destroy();

            const datasets=[{
                label:'منجز',
                data:d.completed,
                backgroundColor:'rgba(255,159,64,0.6)',
                borderColor:'rgba(255,159,64,1)',
                borderWidth:1,
                type:employeeChartType
            }];

            if($('#chk-show-target').is(':checked')){
                datasets.push({
                    label:'الهدف',
                    data:d.target,
                    borderColor:'#0d6efd',
                    backgroundColor:'rgba(13,110,253,0.15)',
                    borderWidth:2,
                    type:'line',
                    tension:.3,
                    fill:true
                });
            }
            if($('#chk-show-comparison').is(':checked')){
                datasets.push({
                    label:'مقارنة',
                    data:d.comparison,
                    borderColor:'#6f42c1',
                    backgroundColor:'rgba(111,66,193,0.15)',
                    borderWidth:2,
                    type:'line',
                    tension:.3,
                    fill:true
                });
            }

            charts.employee=new Chart(ctx,{
                data:{ labels:d.labels, datasets },
                options:{
                    responsive:true,
                    indexAxis: employeeChartType==='bar'?'y':'x',
                    scales:{ x:{ beginAtZero:true } }
                }
            });
        },
        error: function(xhr){ showSpinner('employee',false); console.error('خطأ employee:', xhr.status, xhr.responseText); }
    });
}

/* ======== REGION CHART ======== */
function loadRegionChart(){
    showSpinner('region',true);
    return $.ajax({
        url: '/charts-reports/charts/region-distribution',
        type: 'GET',
        dataType: 'json',
        data: params({metric:regionMetric}),
        success: function(json){
            showSpinner('region',false);
            if(!json.success) return;
            const d=json.data;
            const ctx=document.getElementById('regionDistributionChart').getContext('2d');
            if(charts.region) charts.region.destroy();
            const color = regionMetric==='requests'
                ? 'rgba(54,162,235,0.6)'
                : regionMetric==='duration'
                    ? 'rgba(255,193,7,0.6)'
                    : 'rgba(40,167,69,0.6)';
            charts.region=new Chart(ctx,{
                type:'bar',
                data:{
                    labels:d.labels,
                    datasets:[{
                        label: regionMetric==='requests'?'عدد الطلبات':(regionMetric==='duration'?'متوسط الأيام':'الكفاءة %'),
                        data:d.values,
                        backgroundColor:color,
                        borderColor:color.replace('0.6','1'),
                        borderWidth:1
                    }]
                },
                options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
            });
        },
        error: function(xhr){ showSpinner('region',false); console.error('خطأ region:', xhr.status, xhr.responseText); }
    });
}

/* ======== TREND CHART ======== */
function loadTrendChart(){
    showSpinner('trend',true);
    return $.ajax({
        url: '/charts-reports/charts/performance-trend',
        type: 'GET',
        dataType: 'json',
        data: params(),
        success: function(json){
            showSpinner('trend',false);
            if(!json.success) return;
            const d=json.data;

            let datasetValues=[]; let label='الطلبات';
            if(trendMetric==='requests'){ datasetValues=d.requests; label='الطلبات'; }
            else if(trendMetric==='completion'){ datasetValues=d.completion; label='الإنجاز %'; }
            else if(trendMetric==='efficiency'){ datasetValues=d.efficiency; label='الكفاءة %'; }
            else if(trendMetric==='revenue'){ datasetValues=d.revenue; label='الإيرادات'; }

            const ctx=document.getElementById('performanceTrendChart').getContext('2d');
            if(charts.trend) charts.trend.destroy();
            charts.trend=new Chart(ctx,{
                type:'line',
                data:{
                    labels:d.labels,
                    datasets:[{
                        label:label,
                        data:datasetValues,
                        borderColor:'#36b9cc',
                        backgroundColor:'rgba(54,185,204,.2)',
                        borderWidth:2,
                        tension:.3,
                        fill:true
                    }]
                },
                options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
            });
        },
        error: function(xhr){ showSpinner('trend',false); console.error('خطأ trend:', xhr.status, xhr.responseText); }
    });
}

/* ======== LICENSE TYPES CHART ======== */
function loadLicenseChart(){
    showSpinner('license',true);
    return $.ajax({
        url: '/charts-reports/charts/license-types',
        type: 'GET',
        dataType: 'json',
        data: params(),
        success: function(json){
            showSpinner('license',false);
            if(!json.success) return;
            const d=json.data;
            const ctx=document.getElementById('licenseTypeChart').getContext('2d');
            if(charts.license) charts.license.destroy();
            charts.license=new Chart(ctx,{
                type:'pie',
                data:{
                    labels:d.labels,
                    datasets:[{
                        label:'إجمالي الطلبات',
                        data:d.totals,
                        backgroundColor:[
                            '#4e73df','#1cc88a','#36b9cc','#f6c23e','#e74a3b','#6610f2','#858796','#20c997'
                        ],
                        borderWidth:1
                    }]
                },
                options:{ responsive:true, plugins:{ legend:{ position:'bottom' } } }
            });
        },
        error: function(xhr){ showSpinner('license',false); console.error('خطأ license:', xhr.status, xhr.responseText); }
    });
}

/* ======== RECENT REQUESTS ======== */
function statusBadge(name){
    if(name==='مكتمل') return 'badge-completed';
    if(name==='مرفوض') return 'badge-rejected';
    if(name==='ملغى') return 'badge-cancelled';
    return 'badge-pending';
}
function loadRecent(){
    showSpinner('recent',true);
    return $.ajax({
        url: '/charts-reports/recent-requests',
        type: 'GET',
        dataType: 'json',
        data: params(),
        success: function(json){
            showSpinner('recent',false);
            const body=$('#recentTBody');
            if(!json.success){
                body.html('<tr><td colspan="6">خطأ في جلب البيانات</td></tr>');
                return;
            }
            if(!json.data.length){
                body.html('<tr><td colspan="6">لا توجد بيانات</td></tr>');
                return;
            }
            body.empty();
            json.data.forEach(r=>{
                body.append(`
                    <tr>
                        <td>${r.request_number}</td>
                        <td>${r.license_type}</td>
                        <td>${r.beneficiary}</td>
                        <td>${r.governorate}</td>
                        <td>${new Date(r.created_at).toLocaleDateString('ar-EG')}</td>
                        <td><span class="badge ${statusBadge(r.status_name)}">${r.status_name}</span></td>
                    </tr>
                `);
            });
        },
        error: function(xhr){ showSpinner('recent',false); console.error('خطأ recent:', xhr.status, xhr.responseText); }
    });
}

/* ======== تصدير صورة فقط ======== */
function exportChartImage(canvasId, filename){
    const canvas=document.getElementById(canvasId);
    if(!canvas) return;
    const link=document.createElement('a');
    link.download=filename+'.png';
    link.href=canvas.toDataURL('image/png');
    link.click();
}

/* ======== EVENTS ======== */
function attachEvents(){
    $('#btn-apply').on('click', reloadAll);
    $('#chk-show-target').on('change', loadEmployeeChart);
    $('#chk-show-comparison').on('change', loadEmployeeChart);
    $('#btn-employee-toggle').on('click', function(){
        employeeChartType = employeeChartType==='bar' ? 'line' : 'bar';
        loadEmployeeChart();
    });
    $('#btn-license-export-img').on('click', ()=>exportChartImage('licenseTypeChart','license_types_chart'));
    $('#btn-employee-export-img').on('click', ()=>exportChartImage('employeePerformanceChart','employee_performance'));

    $('#btn-region-metrics .btn').each(function(){
        $(this).on('click', ()=>{
            $('#btn-region-metrics .btn').removeClass('active');
            $(this).addClass('active');
            regionMetric=$(this).data('metric');
            loadRegionChart();
        });
    });

    $('#btn-trend-metrics .btn').each(function(){
        $(this).on('click', ()=>{
            $('#btn-trend-metrics .btn').removeClass('active');
            $(this).addClass('active');
            trendMetric=$(this).data('metric');
            loadTrendChart();
        });
    });
}

/* ======== إعادة تحميل شامل ======== */
function reloadAll(){
    loadSummary();
    loadEmployeeChart();
    loadRegionChart();
    loadTrendChart();
    loadLicenseChart();
    loadRecent();
}

/* ======== INIT ======== */
function init(){
    $.when(loadMeta()).done(function(){
        attachEvents();
        reloadAll();
    });
}

$(document).ready(init);
</script>
</body>
</html>{{-- <!DOCTYPE html>
