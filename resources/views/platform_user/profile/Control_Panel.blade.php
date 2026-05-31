<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - طلباتي</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* الأساسيات - تم تحديثها لتتناسب مع index.html */
        :root {
          --primary: #1a3a6c;
          --primary-dark: #0d2340;
          --primary-light: #2a5298;
          --secondary: #f8f9fa;
          --accent: #d4af37;
          --accent-dark: #b9972c;
          --accent-light: #e8c96c;
          --success: #28a745;
          --warning: #ffc107;
          --danger: #dc3545;
          --dark: #212529;
          --light: #f8f9fa;
          --text-size: 0.9rem;
          --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);

          /* ألوان إضافية للتوافق */
          --primary-color: #1a3a6c;
          --secondary-color: #4CAF50;
          --accent-color: #149ddd;
          --background-color: #f5f5f5;
          --card-color: #ffffff;
          --text-color: #333;
          --light-text: #777;
        }

        body {
          font-family: 'Tajawal', sans-serif;
          background-color: var(--secondary);
          color: #333;
          overflow-x: hidden;
          font-size: var(--text-size);
          line-height: 1.7;
          padding-top: 0px;
          transition: var(--transition);
        }

        /* الحاوية الرئيسية */
        .main-container {
          margin: 34px 20px 20px;
          margin-right: 133px;
          transition: margin 0.3s;
        }

        /* رسالة الترحيب */
        .welcome-message {
          background: linear-gradient(to right, var(--primary), var(--primary-dark));
          color: white;
          padding: 15px;
          border-radius: 10px;
          margin-bottom: 20px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
          position: relative;
          overflow: hidden;
        }

        .welcome-message h1 {
          font-size: 1.4rem;
          margin-bottom: 8px;
        }

        .welcome-message p {
          font-size: 0.95rem;
          opacity: 0.9;
        }

        /* بطاقات لوحة المعلومات */
        .dashboard-cards {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
          gap: 20px;
          margin-bottom: 10px;
        }

        .card {
          background-color: var(--card-color);
          border-radius: 12px;
          padding: 20px;
          box-shadow: 5px 4px 12px rgba(0, 0, 0, 0.08);
          position: relative;
          transition: var(--transition);
          overflow: hidden;
          border: 1px solid rgba(26, 58, 108, 0.05);
        }

        .card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card-header-label {
          position: absolute;
          top: 20px;
          left: 20px;
          font-size: 12px;
          color: var(--light-text);
          background: rgba(26, 58, 108, 0.1);
          padding: 3px 8px;
          border-radius: 20px;
        }

        .card-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 10px;
          color: var(--primary);
          font-weight: bold;
          font-size: 1.1rem;
          padding-bottom: 8px;
          border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card-icon {
          width: 44px;
          height: 44px;
          border-radius: 10px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 20px;
          background: rgba(26, 58, 108, 0.1);
          color: var(--primary);
          transition: transform 0.3s;
        }

        .card:hover .card-icon {
          transform: rotate(10deg);
        }

        .card-stats {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 8px;
          margin-bottom: -5px;
        }

        .stat-group {
          background: rgba(0, 0, 0, 0.02);
          padding: 8px;
          border-radius: 8px;
          text-align: center;
          transition: var(--transition);
        }

        .stat-group:hover {
          background: rgba(26, 58, 108, 0.05);
          transform: scale(1.02);
        }

        .stat-number {
          font-size: 1.5rem;
          font-weight: bold;
          color: var(--text-color);
          margin-bottom: 0px;
        }

        .stat-label {
          font-size: 0.85rem;
          color: var(--light-text);
        }

        .total-number {
          font-size: 2rem;
          font-weight: bold;
          color: var(--primary);
          text-align: center;
          margin: 15px 0;
          padding: 8px;
          border-top: 1px dashed rgba(0, 0, 0, 0.1);
          border-bottom: 1px dashed rgba(0, 0, 0, 0.1);
        }

        /* بطاقة التقويم */
        .calendar-card {
          display: flex;
          flex-direction: column;
          height: 100%;
        }

        .calendar-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 15px;
        }

        .month-display {
          background: linear-gradient(to right, var(--primary), var(--primary-dark));
          color: white;
          padding: 7px;
          text-align: center;
          border-radius: 10px;
          margin-bottom: 10px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          position: relative;
          overflow: hidden;
        }

        .month {
          font-size: 1.2rem;
          font-weight: bold;
          margin-bottom: 5px;
        }

        .year {
          font-size: 0.9rem;
          opacity: 0.9;
          margin-bottom: 10px;
        }

        .day {
          font-size: 2.2rem;
          font-weight: bold;
          line-height: 1;
        }

        .bulletin {
          background: rgba(26, 58, 108, 0.05);
          padding: 5px;
          border-radius: 8px;
          margin-bottom: 5px;
          transition: var(--transition);
        }

        .bulletin:hover {
          background: rgba(26, 58, 108, 0.1);
          transform: translateX(-3px);
        }

        .bulletin-header {
          display: flex;
          align-items: center;
          gap: 6px;
          color: var(--accent);
          margin-bottom: 8px;
          font-weight: bold;
          font-size: 0.9rem;
        }

        .bulletin-header i {
          font-size: 8px;
          animation: blink 2s infinite;
        }

        @keyframes blink {
          0%, 100% { opacity: 1; }
          50% { opacity: 0.5; }
        }

        .bulletin-content {
          font-size: 0.9rem;
          color: var(--text-color);
          line-height: 1.5;
        }

        .calendar-nav {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-top: auto;
          padding-top: 15px;
          border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .calendar-nav button {
          background: rgba(26, 58, 108, 0.1);
          border: none;
          color: var(--primary);
          width: 36px;
          height: 36px;
          border-radius: 50%;
          cursor: pointer;
          font-size: 1rem;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: var(--transition);
        }

        .calendar-nav button:hover {
          background: var(--primary);
          color: white;
          transform: rotate(10deg);
        }

        .calendar-nav span {
          font-weight: bold;
          color: var(--primary);
          cursor: pointer;
          transition: var(--transition);
          font-size: 0.9rem;
        }

        .calendar-nav span:hover {
          color: var(--primary-dark);
          text-decoration: underline;
        }

        /* قسم آخر التحديثات */
        .updates-card {
          background-color: var(--card-color);
          border-radius: 12px;
          padding: 20px;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
          margin-top: 15px;
          position: relative;
          overflow: hidden;
        }

        .updates-card::before {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height: 5px;
          background: linear-gradient(to right, var(--accent-color), var(--primary));
        }

        .updates-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 15px;
          padding-bottom: 12px;
          border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .updates-header span {
          font-size: 1.1rem;
          color: var(--primary);
          font-weight: bold;
        }

        .refresh-btn {
          background: rgba(26, 58, 108, 0.1);
          border: none;
          width: 36px;
          height: 36px;
          border-radius: 50%;
          color: var(--primary);
          cursor: pointer;
          font-size: 1rem;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: var(--transition);
        }

        .refresh-btn:hover {
          background: var(--primary);
          color: white;
          transform: rotate(360deg);
        }

        .tabs {
          display: flex;
          border-bottom: 1px solid #ddd;
          margin-bottom: 15px;
          flex-wrap: wrap;
          border-radius: 12px;
          background: rgba(26, 58, 108, 0.03);
          padding: 5px;
        }

        .tab {
          padding: 10px 18px;
          cursor: pointer;
          color: var(--light-text);
          display: flex;
          align-items: center;
          gap: 8px;
          font-size: 0.9rem;
          position: relative;
          transition: var(--transition);
          border-radius: 10px;
          flex: 1;
          justify-content: center;
        }

        .tab:hover {
          color: var(--primary);
          background: rgba(26, 58, 108, 0.05);
        }

        .tab.active {
          color: white;
          font-weight: 600;
          background: var(--primary);
          box-shadow: 0 4px 10px rgba(26, 58, 108, 0.3);
        }

        .table-container {
          width: 100%;
          overflow-x: auto;
          border-radius: 8px;
          box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }

        th {
          background-color: rgba(26, 58, 108, 0.05);
          padding: 12px 10px;
          text-align: right;
          color: var(--primary);
          font-weight: 600;
          font-size: 0.9rem;
        }

        td {
          padding: 12px 10px;
          border-bottom: 1px solid rgba(0, 0, 0, 0.05);
          font-size: 0.9rem;
          transition: var(--transition);
        }

        tr {
          transition: var(--transition);
        }

        tr:hover {
          background-color: rgba(26, 58, 108, 0.03);
        }

        tr:hover td {
          transform: translateX(-3px);
        }

        .status-badge {
          padding: 5px 10px;
          border-radius: 20px;
          font-size: 0.8rem;
          font-weight: 500;
          display: inline-block;
          transition: var(--transition);
        }

        .status-cancelled {
          background-color: rgba(220, 53, 69, 0.1);
          color: #dc3545;
        }

        .status-pending {
          background-color: rgba(255, 193, 7, 0.1);
          color: #ffc107;
        }

        .status-approved {
          background-color: rgba(40, 167, 69, 0.1);
          color: #28a745;
        }

        tr:hover .status-badge {
          transform: scale(1.05);
        }

        .action-button {
          background: rgba(26, 58, 108, 0.1);
          border: none;
          width: 32px;
          height: 32px;
          border-radius: 50%;
          color: var(--primary);
          cursor: pointer;
          font-size: 1.1rem;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: var(--transition);
        }

        .action-button:hover {
          background: var(--primary);
          color: white;
          transform: rotate(90deg);
        }

        /* فلترة الطلبات */
        .filter-section {
          display: flex;
          gap: 10px;
          margin-bottom: 15px;
          flex-wrap: wrap;
        }

        .filter-btn {
          background: rgba(26, 58, 108, 0.08);
          border: 1px solid rgba(26, 58, 108, 0.1);
          padding: 8px 15px;
          border-radius: 30px;
          font-size: 0.85rem;
          cursor: pointer;
          transition: var(--transition);
          display: flex;
          align-items: center;
          gap: 5px;
        }

        .filter-btn:hover, .filter-btn.active {
          background: var(--primary);
          color: white;
          border-color: var(--primary);
        }

        /* مؤشر تقدم الطلب */
        .progress-container {
          margin-top: 10px;
          background: rgba(0, 0, 0, 0.05);
          border-radius: 10px;
          padding: 5px;
        }

        .progress-bar {
          height: 8px;
          background: var(--primary);
          border-radius: 5px;
          position: relative;
          transition: width 1s ease;
        }

        .progress-steps {
          display: flex;
          justify-content: space-between;
          margin-top: 5px;
          font-size: 0.75rem;
          color: var(--light-text);
        }

        .progress-step {
          position: relative;
          text-align: center;
          flex: 1;
        }

        .progress-step.active {
          color: var(--primary);
          font-weight: bold;
        }

        /* صفحة الشروط */
        .terms-card {
          background-color: var(--card-color);
          border-radius: 12px;
          padding: 25px;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
          margin-top: 20px;
          position: relative;
          overflow: hidden;
          max-height: 400px;
          overflow-y: auto;
        }

        .terms-card h3 {
          color: var(--primary);
          margin-bottom: 15px;
          border-bottom: 1px solid rgba(0, 0, 0, 0.1);
          padding-bottom: 10px;
        }

        .terms-section {
          margin-bottom: 20px;
        }

        .terms-section h4 {
          color: var(--primary);
          margin-bottom: 10px;
        }

        .terms-section ul {
          padding-right: 20px;
        }

        .terms-section li {
          margin-bottom: 8px;
          line-height: 1.6;
        }

        /* شريط البحث */
        .search-bar {
          display: flex;
          gap: 10px;
          margin-bottom: 15px;
        }

        .search-bar input {
          flex: 1;
          padding: 10px 15px;
          border: 1px solid rgba(0, 0, 0, 0.1);
          border-radius: 30px;
          font-size: 0.9rem;
          transition: var(--transition);
        }

        .search-bar input:focus {
          border-color: var(--primary);
          outline: none;
          box-shadow: 0 0 0 3px rgba(26, 58, 108, 0.1);
        }

        /* الرسوم البيانية */
        .chart-container {
          height: 150px;
          margin-top: 15px;
          position: relative;
        }

        .chart-bar {
          position: absolute;
          bottom: 0;
          width: 30px;
          background: var(--primary);
          border-radius: 5px 5px 0 0;
          transition: height 1s ease;
        }

        .chart-label {
          position: absolute;
          bottom: -25px;
          text-align: center;
          width: 30px;
          font-size: 0.75rem;
        }

        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 1200px) {
          .main-container {
            margin-right: 0px;
            margin-left: 0px;
          }
        }

        @media (max-width: 992px) {
          .dashboard-cards {
            grid-template-columns: 1fr 1fr;
          }

          .welcome-message h1 {
            font-size: 1.2rem;
          }
        }

        @media (max-width: 768px) {
          .dashboard-cards {
            grid-template-columns: 1fr;
          }

          .tabs {
            flex-wrap: wrap;
          }

          .tab {
            padding: 8px 12px;
            font-size: 0.85rem;
          }
        }
    </style>
</head>
<body>
  <div class="main-container">
<!-- أعلى الصفحة -->
    <div class="welcome-message">
      <div class="welcome-section">
        <h1 class="welcome-title">مرحباً، <span id="panel-user-name">ضيف</span></h1>
        <p class="welcome-subtitle">معلومات لوحة التحكم الخاصة بك</p>
      </div>
    </div>
    <div class="dashboard-cards">
      <!-- بطاقة الرخص -->
      <div class="card">
        <div class="card-header-label">بالأرقام</div>
        <div class="card-header">
          <span>ملخص الرخص</span>
          <div class="card-icon"><i class="fas fa-id-card"></i></div>
        </div>
        <div class="card-stats">
          <div class="stat-group"><div id="lic-expired" class="stat-number">0</div><div class="stat-label">مكتمل</div></div>
          <div class="stat-group"><div id="lic-valid" class="stat-number">0</div><div class="stat-label">سارية</div></div>
        </div>
        <div id="lic-total" class="total-number">0</div>
        <div class="card-stats">
          <div class="stat-group"><div id="lic-soon" class="stat-number">0</div><div class="stat-label">تنتهي قريباً</div></div>
          <div class="stat-group"><div id="lic-stopped" class="stat-number">0</div><div class="stat-label">موقوفة</div></div>
        </div>
        <!-- داخل بطاقة الرخص -->
        <div class="chart-container" id="license-chart">
          <canvas id="licenseChart"></canvas>
        </div>
      </div>

      <!-- بطاقة الطلبات -->
      <div class="card">
        <div class="card-header-label">بالأرقام</div>
        <div class="card-header">
          <span>ملخص الطلبات</span>
          <div class="card-icon"><i class="far fa-folder"></i></div>
        </div>
        <div class="card-stats">
          <div class="stat-group"><div id="req-paid" class="stat-number">0</div><div class="stat-label">مسدودة</div></div>
          <div class="stat-group"><div id="req-process" class="stat-number">0</div><div class="stat-label">تحت الإجراء</div></div>
        </div>
        <div id="req-total" class="total-number">0</div>
        <div class="card-stats">
          <div class="stat-group"><div id="req-waiting" class="stat-number">0</div><div class="stat-label">بانتظار الدفع</div></div>
          <div class="stat-group"><div id="req-notes" class="stat-number">0</div><div class="stat-label">عليها ملاحظات</div></div>
        </div>
        <!-- داخل بطاقة الطلبات -->
        <div class="chart-container" id="request-chart">
          <canvas id="requestChart"></canvas>
        </div>
      </div>

      <!-- بطاقة تقويم بلدي -->
      <div class="card calendar-card">
        <div class="card-header-label">الأحداث</div>
        <div class="card-header">
          <span>تقويم بلدي</span>
          <div class="card-icon">
            <i class="far fa-calendar-alt"></i>
          </div>
        </div>
        <div class="month-display">
          <div class="month">أبريل</div>
          <div class="year">2024</div>
          <div class="day">3</div>
        </div>
        <div class="bulletin">
          <div class="bulletin-header">
            <i class="fas fa-circle"></i>
            <span>الطلبات</span>
          </div>
          <div class="bulletin-content">
            خدمات القرارات المساحية آخر موعد<br>
            12:00:00 من يوم طلب إصدار قرار<br>
            مساحي رقم 451739824
          </div>
        </div>
        <div class="bulletin">
          <div class="bulletin-header">
            <i class="fas fa-circle"></i>
            <span>الاجتماعات</span>
          </div>
          <div class="bulletin-content">
            اجتماع لجنة التخطيط العمراني<br>
            الساعة 10:00 صباحاً في قاعة الاجتماعات الرئيسية
          </div>
        </div>
        <div class="calendar-nav">
          <button id="prev-cal-btn"><i class="fas fa-chevron-right"></i></button>
          <span>عرض تقويم بلدي</span>
          <button id="next-cal-btn"><i class="fas fa-chevron-left"></i></button>
        </div>
      </div>
    </div>
    <div class="search-bar">
      <input type="text" id="search-input" placeholder="ابحث في الطلبات...">
      <button id="search-btn" class="filter-btn" style="padding: 8px 15px;"><i class="fas fa-search"></i> بحث</button>
    </div>

    <div class="filter-section">
      <button class="filter-btn active" data-filter="all">الكل</button>
      <button class="filter-btn" data-filter="pending">تحت المراجعة</button>
      <button class="filter-btn" data-filter="approved">مقبولة</button>
      <button class="filter-btn" data-filter="cancelled">ملغاة</button>
      <button class="filter-btn" data-filter="waiting">بانتظار الدفع</button>
      <button class="filter-btn" data-filter="notes">عليها ملاحظات</button>
    </div>

    <!-- قسم آخر التحديثات -->
    <div class="updates-card">
      <div class="updates-header">
        <span>آخر التحديثات</span>
        <button class="refresh-btn">
          <i class="fas fa-sync-alt"></i>
        </button>
      </div>
{{--
      <div class="tabs" id="data-tabs">
        <button class="tab active" data-tab="requests"><i class="far fa-clipboard"></i> الطلبات</button>
        <button class="tab" data-tab="licenses"><i class="far fa-id-card"></i> الرخص</button>
        <button class="tab" data-tab="invoices"><i class="fas fa-file-invoice"></i> الفواتير</button>
        <button class="tab" data-tab="comments"><i class="fas fa-comments"></i> الملاحظات</button>
      </div> --}}

      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>بيانات الطلب</th>
              <th>بيانات الرخصة</th>
              <th>تاريخ الطلب</th>
              <th>الموقع</th>
              <th>آخر تحديث</th>
              <th>حالة الطلب</th>
              <th>الإجراء</th>
            </tr>
          </thead>
          <tbody id="latest-updates-body">
            <!-- يُملأ عبر Ajax -->
          </tbody>
        </table>
      </div>
    </div>

    <!-- صفحة الشروط والأحكام -->
    <div class="terms-card" id="terms-section" style="display: none;">
      <h3>الشروط والأحكام لنظام تراخيص البناء</h3>

      <div class="terms-section">
        <h4>المادة 1: التعريفات</h4>
        <ul>
          <li>الجهة المانحة: وزارة الإسكان والتخطيط العمراني</li>
          <li>المستفيد: صاحب العلاقة أو من ينوب عنه قانوناً</li>
          <li>الرخصة: وثيقة رسمية تسمح بإجراء أعمال البناء وفق الشروط المحددة</li>
        </ul>
      </div>

      <div class="terms-section">
        <h4>المادة 2: شروط التقديم</h4>
        <ul>
          <li>يجب أن يكون طلب الرخصة مكتملاً وفق النماذج المعتمدة</li>
          <li>تقديم جميع المستندات المطلوبة بصيغتها الرقمية</li>
          <li>دفع الرسوم المقررة قبل معالجة الطلب</li>
          <li>تطابق مخططات البناء مع اللوائح والأنظمة المعمول بها</li>
        </ul>
      </div>

      <div class="terms-section">
        <h4>المادة 3: مدة المعالجة</h4>
        <ul>
          <li>مدة معالجة الطلبات العادية: 10 أيام عمل</li>
          <li>مدة معالجة الطلبات المستعجلة: 5 أيام عمل (بزيادة 30% على الرسوم)</li>
          <li>تتوقف مدة المعالجة على اكتمال المستندات وصحتها</li>
        </ul>
      </div>

      <div class="terms-section">
        <h4>المادة 4: التزامات المستفيد</h4>
        <ul>
          <li>الالتزام بمواصفات البناء المعتمدة في الرخصة</li>
          <li>إخطار الجهة المانحة بأي تعديلات على المخططات</li>
          <li>السماح للمفتشين بالدخول للموقع للتأكد من الالتزام</li>
          <li>الحفاظ على البيئة المحيطة وعدم التسبب في أضرار للجوار</li>
        </ul>
      </div>

      <div class="terms-section">
        <h4>المادة 5: العقوبات</h4>
        <ul>
          <li>في حال مخالفة شروط الرخصة: غرامة مالية تصل إلى 50,000 ريال</li>
          <li>في حال البناء بدون رخصة: غرامة تصل إلى 100,000 ريال وهدم المبنى</li>
          <li>في حال التعديل دون موافقة: غرامة تصل إلى 30,000 ريال</li>
        </ul>
      </div>
    </div>
  </div>

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

        $.getJSON("{{ route('paymentsPlatform.info', ['requestId' => 'REQ_ID']) }}".replace('REQ_ID', requestId), function(res){
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
    url: "{{ route('paymentsPlatform.charge') }}",
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
$(document).ready(function () {
    // 1) جلب الإحصائيات + اسم المستفيد
    $.ajax({
        url: '/control-panel-stats',
        type: 'GET',
        dataType: 'json',
        success: function (res) {
            if (res.success) {
                $('#panel-user-name').text(res.name);

                // رخص
                $('#lic-expired').text(res.licenses.expired);
                $('#lic-valid').text(res.licenses.valid);
                $('#lic-soon').text(res.licenses.soon);
                $('#lic-stopped').text(res.licenses.stopped);
                $('#lic-total').text(
                    res.licenses.expired +
                    res.licenses.valid +
                    res.licenses.soon +
                    res.licenses.stopped
                );

                // طلبات
                $('#req-paid').text(res.requests.paid);
                $('#req-process').text(res.requests.inProcess);
                $('#req-waiting').text(res.requests.waitingPay);
                $('#req-notes').text(res.requests.notes);
                $('#req-total').text(
                    res.requests.paid +
                    res.requests.inProcess +
                    res.requests.waitingPay +
                    res.requests.notes
                );
            }
        }
    });

    // 2) جلب الرسوم البيانية
    $.ajax({
        url: '/control-panel-chart',
        type: 'GET',
        dataType: 'json',
        success: function (res) {
            if (res.success) {
                // رسم الرخص
                new Chart(document.getElementById('licenseChart'), {
                    type: 'line',
                    data: {
                        labels: res.labels,
                        datasets: [{
                            label: 'الطلبات المقدمة',
                            data: res.submitted,
                            borderColor: '#149ddd',
                            backgroundColor: 'rgba(20, 157, 221, 0.2)',
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: { responsive: true, plugins: { legend: { display: false } } }
                });

                // رسم الطلبات
                new Chart(document.getElementById('requestChart'), {
                    type: 'bar',
                    data: {
                        labels: res.labels,
                        datasets: [{
                            label: 'الطلبات المكتملة',
                            data: res.completed,
                            backgroundColor: 'rgba(39, 174, 96, 0.5)',
                            borderColor: '#27ae60',
                            borderWidth: 1
                        }]
                    },
                    options: { responsive: true, plugins: { legend: { display: false } } }
                });
            }
        },
        error: function (xhr) {
            console.error('خطأ جلب الرسم:', xhr.status, xhr.responseText);
        }
    });
});
</script>

<script>
function loadUpdates(filter = 'all', search = '') {
    $.ajax({
        url: '/latest-updates',
        type: 'GET',
        data: { filter: filter, search: search, beneficiary_id: 2 },
        dataType: 'json',
        success: function (res) {
            if (res.success) {
                let rows = '';
                res.updates.forEach(item => {
                    const location = `${item.governorate_name} – ${item.directorate_name}`;
                    rows += `
                        <tr>
                            <td>
                                <div style="font-weight:bold;">${item.type_name}</div>
                                <i class="fas fa-file-alt" style="color:#00615e;"></i> ${item.request_number}
                            </td>
                            <td>${item.type_name}</td>
                            <td>${item.created_at}</td>
                            <td>${location}</td>
                            <td>${item.updated_at}</td>
                            <td><span class="status-badge status-${item.css}">${item.status_name}</span></td>

                            <td>
                                 ${item.status_name == 'قيد المراجعة'
                                        ? `<button type="button" class="ajax-link btn btn-sm btn-outline-primary"
                                            data-id="${item.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : item.status_name == 'المراجعة الفنية'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-info"
                                            data-id="${item.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-gear"></i> مراجعة فنية
                                        </a>`
                                    : item.status_name == 'مسندة للمهندس'
                                        ? `<button type="button" class="ajax-link btn btn-sm "
                                            data-id="${item.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : item.status_name == 'مكتمل'
                                        ? `
                                        <button type="button" class="btn btn-sm btn-outline-info btn-view-receipt"
                                            data-id="${item.id}">
                                            <i class="bi bi-eye"></i> سند عرض
                                        </button>
                                        <button type="button" class="ajax-link btn btn-sm "
                                            data-id="${item.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : item.status_name == 'جاهز للدفع'
                                        ? `<a href="#" class="ajax-link payment btn btn-sm btn-outline-warning"
                                            data-id="${item.id}">
                                            <i class="bi bi-cash"></i> دفع
                                        </a>`
                                    : item.status_name == 'موافَق عليه'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-success"
                                            data-id="${item.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-check-circle"></i> موافق عليه
                                        </a>
                                        <button type="button" class="ajax-link btn btn-sm "
                                            data-id="${item.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : item.status_name == 'مرفوض'
                                        ? `<span class="text-danger">
                                            <i class="bi bi-x-circle"></i> مرفوض
                                        </span>`
                                    : item.status_name == 'طلبات معادة'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-secondary"
                                            data-id="${item.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-arrow-repeat"></i> طلب معاد
                                        </a>`
                                    : item.status_name == 'طلبات جديدة'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-info" data-page="requests.track.request-details" data-id="${order.id}">
                                            <i class="bi bi-plus-circle"></i> طلب جديد
                                        </a>`
                                    : ''
                                    }


                            </td>
                        </tr>
                    `;
                });
                $('#latest-updates-body').html(rows);
            }
        },
        error: function (xhr) {
            console.error('خطأ جلب التحديثات:', xhr.status, xhr.responseText);
        }
    });
}

$(document).ready(function () {
    // تحميل أولي
    loadUpdates();

    // فلترة عند النقر على أزرار التصفية
    $(document).on('click', '.filter-btn', function () {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        loadUpdates($(this).data('filter'));
    });

    // بحث عند الكتابة (اختياري)
    $('#search-input').on('keyup', function () {
        loadUpdates($('.filter-btn.active').data('filter'), $(this).val());
    });
});
</script>
</body>
</html>
