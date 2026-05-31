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
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Tajawal', sans-serif;
        }

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
          background-color: var(--secondary);
          color: var(--text-color);
          direction: rtl;
          text-align: right;
          margin: 0;
          font-size: var(--text-size);
          line-height: 1.7;
          overflow-x: hidden;
          padding: 20px;
          transition: var(--transition);
        }

        /* الحاوية الرئيسية للمحتوى */
        .main-container {
          margin: 30px 20px 20px;
          margin-right: 110px;
          transition: margin 0.3s;
        }

        /* رسالة الترحيب */
        .welcome-section {
          background: linear-gradient(to right, var(--primary), var(--primary-dark));
          color: white;
          padding: 25px 30px;
          border-radius: 15px;
          margin-bottom: 25px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
          position: relative;
          overflow: hidden;
          animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
          from {
            opacity: 0;
            transform: translateY(20px);
          }
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }

        .welcome-title {
          font-size: 1.8rem;
          margin-bottom: 10px;
          font-weight: 700;
          position: relative;
          display: inline-block;
        }

        .welcome-title::after {
          content: '';
          position: absolute;
          bottom: -5px;
          right: 0;
          width: 60px;
          height: 3px;
          background: var(--accent);
          border-radius: 3px;
        }

        .welcome-subtitle {
          opacity: 0.9;
          margin-bottom: 15px;
          max-width: 600px;
        }

        .date-info {
          display: flex;
          align-items: center;
          gap: 10px;
          background: rgba(255, 255, 255, 0.15);
          padding: 8px 15px;
          border-radius: 50px;
          width: fit-content;
          font-size: 0.9rem;
          backdrop-filter: blur(5px);
        }

        .stats-grid {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
          gap: 20px;
          margin-bottom: 30px;
        }

        .stat-card {
          background: var(--card-color);
          border-radius: 15px;
          padding: 20px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
          display: flex;
          flex-direction: column;
          transition: var(--transition);
          position: relative;
          overflow: hidden;
          animation: fadeInUp 0.8s ease;
          animation-delay: 0.2s;
          animation-fill-mode: both;
          border: 1px solid rgba(26, 58, 108, 0.05);
        }

        .stat-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card::before {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          width: 5px;
          height: 100%;
          background: var(--accent);
          border-radius: 0 15px 15px 0;
        }

        .stat-icon {
          width: 60px;
          height: 60px;
          border-radius: 50%;
          background: rgba(212, 175, 55, 0.1);
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom: 15px;
          transition: var(--transition);
        }

        .stat-card:hover .stat-icon {
          transform: scale(1.1);
          background: rgba(212, 175, 55, 0.2);
        }

        .stat-icon i {
          font-size: 24px;
          color: var(--accent);
        }

        .stat-value {
          font-size: 2.2rem;
          font-weight: 700;
          color: var(--primary);
          margin-bottom: 5px;
        }

        .stat-label {
          color: var(--light-text);
          margin-bottom: 15px;
        }

        .stat-link {
          color: var(--accent);
          text-decoration: none;
          font-weight: 500;
          display: flex;
          align-items: center;
          gap: 5px;
          margin-top: auto;
          position: relative;
          width: fit-content;
        }

        .stat-link::after {
          content: '';
          position: absolute;
          bottom: -2px;
          right: 0;
          width: 0;
          height: 2px;
          background: var(--accent);
          transition: var(--transition);
        }

        .stat-link:hover::after {
          width: 100%;
        }

        .recent-orders {
          background: var(--card-color);
          border-radius: 15px;
          padding: 25px;
          margin-bottom: 30px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
          animation: fadeInUp 0.8s ease;
          animation-delay: 0.3s;
          animation-fill-mode: both;
          border: 1px solid rgba(26, 58, 108, 0.05);
        }

        .section-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 20px;
          padding-bottom: 15px;
          border-bottom: 1px solid #eee;
        }

        .section-header h2 {
          display: flex;
          align-items: center;
          gap: 10px;
          font-size: 1.4rem;
          color: var(--primary);
          font-weight: 700;
        }

        .section-header h2 i {
          color: var(--accent);
        }

        .view-all {
          color: var(--accent);
          text-decoration: none;
          font-weight: 500;
          display: flex;
          align-items: center;
          gap: 5px;
          position: relative;
        }

        .view-all::after {
          content: '';
          position: absolute;
          bottom: -2px;
          right: 0;
          width: 0;
          height: 2px;
          background: var(--accent);
          transition: var(--transition);
        }

        .view-all:hover::after {
          width: 100%;
        }

        .orders-table {
          overflow-x: auto;
        }

        .orders-table table {
          width: 100%;
          border-collapse: collapse;
        }

        .orders-table th, .orders-table td {
          padding: 15px;
          text-align: right;
          border-bottom: 1px solid #eee;
        }

        .orders-table th {
          color: var(--light-text);
          font-weight: 600;
          background: rgba(26, 58, 108, 0.05);
        }

        .orders-table tbody tr {
          transition: var(--transition);
        }

        .orders-table tbody tr:hover {
          background: rgba(26, 58, 108, 0.03);
          transform: translateX(-5px);
        }

        .status {
          padding: 5px 12px;
          border-radius: 20px;
          font-size: 0.85rem;
          font-weight: 500;
          display: inline-block;
        }

        .status.approved {
          background: rgba(40, 167, 69, 0.15);
          color: #28a745;
        }

        .status.pending {
          background: rgba(255, 193, 7, 0.15);
          color: #ffc107;
        }

        .status.warning {
          background: rgba(220, 53, 69, 0.15);
          color: #dc3545;
        }

        .status.rejected {
          background: rgba(220, 53, 69, 0.15);
          color: #dc3545;
        }

        .action-btn {
          width: 35px;
          height: 35px;
          border-radius: 50%;
          border: none;
          background: rgba(212, 175, 55, 0.1);
          color: var(--accent);
          cursor: pointer;
          margin-left: 5px;
          transition: var(--transition);
          display: inline-flex;
          align-items: center;
          justify-content: center;
        }

        .action-btn:hover {
          background: var(--accent);
          color: white;
          transform: scale(1.1);
        }

        .dashboard-bottom {
          display: grid;
          grid-template-columns: 1fr 1fr;
          gap: 25px;
        }

        @media (max-width: 992px) {
          .dashboard-bottom {
            grid-template-columns: 1fr;
          }
        }

        .calendar-section, .activity-section {
          background: var(--card-color);
          border-radius: 15px;
          padding: 25px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
          animation: fadeInUp 0.8s ease;
          animation-delay: 0.4s;
          animation-fill-mode: both;
          border: 1px solid rgba(26, 58, 108, 0.05);
        }

        .calendar {
          background: white;
          border-radius: 10px;
          overflow: hidden;
          box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .calendar-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 15px 20px;
          background: rgba(26, 58, 108, 0.05);
          border-bottom: 1px solid #eee;
        }

        .calendar-header h3 {
          font-weight: 600;
          color: var(--primary);
          margin: 0;
        }

        .nav-btn {
          background: none;
          border: none;
          width: 35px;
          height: 35px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          transition: var(--transition);
          color: var(--accent);
        }

        .nav-btn:hover {
          background: rgba(212, 175, 55, 0.1);
          transform: scale(1.1);
        }

        .calendar-grid {
          display: grid;
          grid-template-columns: repeat(7, 1fr);
          gap: 5px;
          padding: 15px;
        }

        .day-name, .day {
          display: flex;
          align-items: center;
          justify-content: center;
          height: 40px;
          border-radius: 8px;
          transition: var(--transition);
        }

        .day-name {
          font-weight: 600;
          color: var(--primary);
          font-size: 0.9rem;
        }

        .day {
          cursor: pointer;
          position: relative;
        }

        .day:hover {
          background: rgba(212, 175, 55, 0.1);
        }

        .day.event {
          font-weight: 600;
          color: var(--accent);
        }

        .day.event::after {
          content: '';
          position: absolute;
          bottom: 5px;
          width: 5px;
          height: 5px;
          border-radius: 50%;
          background: var(--accent);
        }

        .day.active {
          background: var(--accent);
          color: white;
          box-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
        }

        .day.active::after {
          background: white;
        }

        .day.empty {
          background: transparent;
        }

        .activities-list {
          display: flex;
          flex-direction: column;
          gap: 15px;
        }

        .activity-item {
          display: flex;
          gap: 15px;
          padding: 15px;
          border-radius: 10px;
          transition: var(--transition);
          position: relative;
          overflow: hidden;
        }

        .activity-item::before {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          width: 3px;
          height: 100%;
          background: var(--accent);
          transform: scaleY(0);
          transform-origin: bottom;
          transition: transform 0.3s ease;
        }

        .activity-item:hover::before {
          transform: scaleY(1);
        }

        .activity-item:hover {
          background: rgba(26, 58, 108, 0.03);
          transform: translateX(-5px);
        }

        .activity-icon {
          width: 45px;
          height: 45px;
          border-radius: 50%;
          background: rgba(212, 175, 55, 0.1);
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
          transition: var(--transition);
        }

        .activity-item:hover .activity-icon {
          background: var(--accent);
        }

        .activity-item:hover .activity-icon i {
          color: white;
        }

        .activity-icon i {
          color: var(--accent);
          font-size: 18px;
          transition: var(--transition);
        }

        .activity-content p {
          margin-bottom: 5px;
          font-weight: 500;
        }

        .activity-content strong {
          color: var(--primary);
        }

        .activity-time {
          font-size: 0.85rem;
          color: var(--light-text);
        }

        /* رسوم بيانية */
        .chart-container {
          background: white;
          border-radius: 15px;
          padding: 20px;
          margin-bottom: 30px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
          animation: fadeInUp 0.8s ease;
          animation-delay: 0.5s;
          animation-fill-mode: both;
          border: 1px solid rgba(26, 58, 108, 0.05);
        }

        .chart-title {
          font-size: 1.3rem;
          color: var(--primary);
          margin-bottom: 20px;
          font-weight: 600;
          display: flex;
          align-items: center;
          gap: 10px;
        }

        .chart-title i {
          color: var(--accent);
        }

        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 768px) {
          .welcome-title {
            font-size: 1.5rem;
          }

          .orders-table th, .orders-table td {
            padding: 10px;
            font-size: 0.9rem;
          }
        }

        @media (max-width: 480px) {
          .stats-grid {
            grid-template-columns: 1fr;
          }

          .section-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
          }

          .view-all {
            align-self: flex-end;
          }
        }

        /* شريط البحث */
        .search-container {
          background: white;
          border-radius: 15px;
          padding: 20px;
          margin-bottom: 30px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
          display: flex;
          flex-wrap: wrap;
          gap: 15px;
          align-items: center;
          border: 1px solid rgba(26, 58, 108, 0.05);
        }

        .search-title {
          font-size: 1.3rem;
          color: var(--primary);
          font-weight: 600;
          display: flex;
          align-items: center;
          gap: 10px;
        }

        .search-title i {
          color: var(--accent);
        }

        .search-group {
          display: flex;
          flex: 1;
          min-width: 300px;
          position: relative;
        }

        .search-input {
          flex: 1;
          padding: 12px 20px 12px 45px;
          border: 1px solid #ddd;
          border-radius: 50px;
          font-size: 1rem;
          transition: var(--transition);
        }

        .search-input:focus {
          outline: none;
          border-color: var(--accent);
          box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .search-icon {
          position: absolute;
          left: 15px;
          top: 50%;
          transform: translateY(-50%);
          color: var(--accent);
        }

        .filter-btn {
          background: rgba(212, 175, 55, 0.1);
          color: var(--accent);
          border: none;
          padding: 12px 20px;
          border-radius: 50px;
          cursor: pointer;
          display: flex;
          align-items: center;
          gap: 8px;
          transition: var(--transition);
        }

        .filter-btn:hover {
          background: var(--accent);
          color: white;
        }

        /* التقويم العملي */
        .calendar-controls {
          display: flex;
          justify-content: center;
          gap: 10px;
          margin-bottom: 15px;
        }

        .calendar-controls select {
          padding: 8px 15px;
          border: 1px solid #ddd;
          border-radius: 8px;
          background: white;
          color: var(--text-color);
          font-size: 1rem;
        }

        .calendar-controls select:focus {
          outline: none;
          border-color: var(--accent);
        }

        .current-date {
          background: rgba(212, 175, 55, 0.2) !important;
          font-weight: bold;
        }

        /* زر البحث */
        .search-btn {
          background: linear-gradient(to right, var(--accent), var(--accent-dark));
          color: white;
          border: none;
          padding: 12px 25px;
          border-radius: 50px;
          cursor: pointer;
          font-weight: bold;
          display: flex;
          align-items: center;
          gap: 8px;
          transition: var(--transition);
          box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        .search-btn:hover {
          transform: translateY(-3px);
          box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
  <!-- الحاوية الرئيسية للمحتوى -->
  <div class="main-container">


    <!-- شريط البحث -->
    <div class="search-container">
      <h2 class="search-title"><i class="fas fa-search"></i> بحث الطلبات</h2>
      <div class="search-group">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" placeholder="ابحث عن الطلبات برقم الطلب أو النوع">
      </div>
      <button class="filter-btn">
        <i class="fas fa-filter"></i>
        فلترة النتائج
      </button>
      <button class="search-btn">
        <i class="fas fa-search"></i>
        بحث
      </button>
    </div>

    <!-- بطاقات الإحصائيات -->
    <div class="stats-grid">
      <!-- ✅ الطلبات المعلقة -->
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
        <div class="stat-content">
          <h3 id="stat-pending" class="stat-value">0</h3>
          <p class="stat-label">الطلبات المعلقة</p>
        </div>
      </div>

      <!-- ✅ الطلبات المكتملة -->
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
        <div class="stat-content">
          <h3 id="stat-completed" class="stat-value">0</h3>
          <p class="stat-label">الطلبات المكتملة</p>
        </div>
      </div>

      <!-- ✅ تحتاج تصحيح -->
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <div class="stat-content">
          <h3 id="stat-correction" class="stat-value">0</h3>
          <p class="stat-label">طلبات تحتاج تصحيح</p>
        </div>
      </div>

      <!-- ✅ متوسط وقت الإنجاز -->
      <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-clock"></i></div>
        <div class="stat-content">
          <h3 id="stat-avg-days" class="stat-value">0 يوم</h3>
          <p class="stat-label">متوسط وقت الإنجاز</p>
        </div>
      </div>
    </div>

    <!-- الطلبات الحديثة -->
    <div class="recent-orders">
      <div class="section-header">
        <h2><i class="fas fa-history"></i> الطلبات الحديثة</h2>
        <a href="#" class="view-all">عرض الكل <i class="fas fa-arrow-left"></i></a>
      </div>

      <div class="orders-table">
        <table>
          <thead>
            <tr>
              <th>رقم الطلب</th>
              <th>نوع الطلب</th>
              <th>التاريخ</th>
              <th>الحالة</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
          <tbody id="recent-orders-body">
            <!-- سيتم ملؤه عبر Ajax -->
          </tbody>
        </table>
      </div>
    </div>

    <!-- الرسم البياني -->
    <div class="chart-container">
      <h2 class="chart-title"><i class="fas fa-chart-line"></i> إحصائيات الطلبات الشهرية</h2>
      <canvas id="requestsChart"></canvas>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    // جلب الإحصائيات (كما سبق)
    $.ajax({
        url: "/orders-stats",
        type: "GET",
        dataType: "json",
        success: function (res) {
            if (res.success) {
                $('#stat-pending').text(res.pending);
                $('#stat-completed').text(res.completed);
                $('#stat-correction').text(res.correction);
                $('#stat-avg-days').text(res.avg_days + ' يوم');
            }
        }
    });

    // جلب الطلبات الحديثة
    $.ajax({
        url: "/recent-orders",
        type: "GET",
        dataType: "json",
        success: function (res) {
            if (res.success) {
                let rows = '';
                res.orders.forEach(order => {
                    rows += `
                        <tr>
                            <td>${order.request_number}</td>
                            <td>${order.type_name}</td>
                            <td>${order.created_at}</td>
                            <td><span class="status ${order.css}">${order.status_name}</span></td>
                            <td>
                             ${order.status_name == 'قيد المراجعة'
                                        ? `<button type="button" class="ajax-link btn btn-sm btn-outline-primary"
                                            data-id="${order.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : order.status_name == 'المراجعة الفنية'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-info"
                                            data-id="${order.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-gear"></i> مراجعة فنية
                                        </a>`
                                    : order.status_name == 'مسندة للمهندس'
                                        ? `<button type="button" class="ajax-link btn btn-sm "
                                            data-id="${order.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : order.status_name == 'مكتمل'
                                        ? `
                                        <button type="button" class="btn btn-sm btn-outline-info btn-view-receipt"
                                            data-id="${order.id}">
                                            <i class="bi bi-eye"></i> سند عرض
                                        </button>
                                        <button type="button" class="ajax-link btn btn-sm "
                                            data-id="${order.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : order.status_name == 'جاهز للدفع'
                                        ? `<a href="#" class="ajax-link payment btn btn-sm btn-outline-warning"
                                            data-id="${order.id}">
                                            <i class="bi bi-cash"></i> دفع
                                        </a>`
                                    : order.status_name == 'موافَق عليه'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-success"
                                            data-id="${order.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-check-circle"></i> موافق عليه
                                        </a>
                                        <button type="button" class="ajax-link btn btn-sm "
                                            data-id="${order.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-eye"></i> عرض
                                        </button>`
                                    : order.status_name == 'مرفوض'
                                        ? `<span class="text-danger">
                                            <i class="bi bi-x-circle"></i> مرفوض
                                        </span>`
                                    : order.status_name == 'طلبات معادة'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-secondary"
                                            data-id="${order.id}"
                                            data-page="requests.track.request-details">
                                            <i class="bi bi-arrow-repeat"></i> طلب معاد
                                        </a>`
                                    : order.status_name == 'طلبات جديدة'
                                        ? `<a href="#" class="ajax-link btn btn-sm btn-outline-info" data-page="requests.track.request-details" data-id="${order.id}">
                                            <i class="bi bi-plus-circle"></i> طلب جديد
                                        </a>`
                                    : ''
                                    }

                            </td>
                        </tr>
                    `;
                });
                $('#recent-orders-body').html(rows);
            }
        },
        error: function (xhr) {
            console.error('خطأ جلب الطلبات:', xhr.responseText);
        }
    });
});
</script>

<script>
    function initializeCharts() {
      const ctx = document.getElementById('requestsChart');
      if (!ctx) return;

      // تدمير الرسم السابق إن وجد
      if (window.myChart) {
          window.myChart.destroy();
      }

      // جلب البيانات من السيرفر
      $.ajax({
          url: '/chart-data',
          type: 'GET',
          dataType: 'json',
          success: function (res) {
              if (res.success) {
                  window.myChart = new Chart(ctx.getContext('2d'), {
                      type: 'bar',
                      data: {
                          labels: res.labels, // التواريخ العربية
                          datasets: [
                              {
                                  label: 'الطلبات المقدمة',
                                  data: res.submitted,
                                  backgroundColor: 'rgba(212, 175, 55, 0.5)',
                                  borderColor: '#d4af37',
                                  borderWidth: 1,
                              },
                              {
                                  label: 'الطلبات المكتملة',
                                  data: res.completed,
                                  backgroundColor: 'rgba(40, 167, 69, 0.5)',
                                  borderColor: '#28a745',
                                  borderWidth: 1,
                              },
                          ],
                      },
                      options: {
                          responsive: true,
                          plugins: {
                              legend: {
                                  position: 'top',
                                  rtl: true,
                                  labels: {
                                      usePointStyle: true,
                                      padding: 20,
                                  },
                              },
                          },
                          scales: {
                              y: { beginAtZero: true },
                              x: {},
                          },
                      },
                  });
              }
          },
          error: function (xhr) {
              console.error('خطأ جلب بيانات الرسم:', xhr.status, xhr.responseText);
          },
      });
    }

    // ✅ دالة لتحديث التاريخ
    function updateCurrentDate() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const dateElement = document.getElementById('current-date');
        if (dateElement) {
            dateElement.textContent = now.toLocaleDateString('ar-EG', options);
        }
    }

    // ✅ دالة للتأثيرات عند التحويم
    function setupHoverEffects() {
        const elements = document.querySelectorAll('.stat-card, .recent-orders, .calendar-section, .activity-section, .chart-container');

        // إزالة أي أحداث سابقة لمنع التكرار
        elements.forEach(card => {
            card.removeEventListener('mouseenter', handleMouseEnter);
            card.removeEventListener('mouseleave', handleMouseLeave);
        });

        // إضافة الأحداث الجديدة
        elements.forEach(card => {
            card.addEventListener('mouseenter', handleMouseEnter);
            card.addEventListener('mouseleave', handleMouseLeave);
        });
    }

    function handleMouseEnter() {
        this.style.transform = 'translateY(-5px)';
        this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
    }

    function handleMouseLeave() {
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.05)';
    }

    // ✅ دالة لتهيئة التقويم
    function initCalendarFunctions() {
        const monthNames = [
            "يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو",
            "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
        ];

        const dayNames = ["أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت"];

        let currentDate = new Date();
        let currentMonth = currentDate.getMonth();
        let currentYear = currentDate.getFullYear();

        // تهيئة التقويم
        function initCalendar() {
            const monthSelector = document.getElementById('month-selector');
            const yearSelector = document.getElementById('year-selector');

            if (monthSelector && yearSelector) {
                monthSelector.value = currentMonth;
                yearSelector.value = currentYear;
                updateCalendar();
            }
        }

        // تحديث التقويم
        function updateCalendar() {
            const calendarGrid = document.getElementById('calendar-grid');
            const monthYearTitle = document.getElementById('current-month-year');

            if (!calendarGrid || !monthYearTitle) return;

            // تحديث عنوان الشهر والسنة
            monthYearTitle.textContent = `${monthNames[currentMonth]} ${currentYear}`;

            // مسح التقويم الحالي
            calendarGrid.innerHTML = '';

            // إضافة أسماء الأيام
            dayNames.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.className = 'day-name';
                dayElement.textContent = day;
                calendarGrid.appendChild(dayElement);
            });

            // الحصول على أول يوم في الشهر
            const firstDay = new Date(currentYear, currentMonth, 1).getDay();

            // الحصول على عدد الأيام في الشهر
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            // إضافة أيام فارغة في بداية الشهر
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'day empty';
                calendarGrid.appendChild(emptyDay);
            }

            // إضافة أيام الشهر
            const today = new Date();
            for (let i = 1; i <= daysInMonth; i++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'day';

                // تحديد إذا كان اليوم هو التاريخ الحالي
                if (i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
                    dayElement.classList.add('current-date');
                }

                // تحديد إذا كان اليوم به حدث (لأغراض العرض فقط)
                if (i % 7 === 0 || i % 13 === 0) {
                    dayElement.classList.add('event');
                }

                dayElement.textContent = i;

                // إضافة حدث للنقر
                dayElement.addEventListener('click', function() {
                    document.querySelectorAll('.day').forEach(d => d.classList.remove('active'));
                    this.classList.add('active');
                    alert(`تم اختيار تاريخ: ${i} ${monthNames[currentMonth]} ${currentYear}`);
                });

                calendarGrid.appendChild(dayElement);
            }
        }

        // إزالة الأحداث القديمة أولاً
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');
        const monthSelector = document.getElementById('month-selector');
        const yearSelector = document.getElementById('year-selector');

        if (prevMonthBtn) {
            // استبدال العنصر بنسخة منه لإزالة الأحداث القديمة
            const newPrevBtn = prevMonthBtn.cloneNode(true);
            prevMonthBtn.parentNode.replaceChild(newPrevBtn, prevMonthBtn);

            // إضافة حدث جديد
            newPrevBtn.addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                updateCalendar();
                if (monthSelector) monthSelector.value = currentMonth;
                if (yearSelector) yearSelector.value = currentYear;
            });
        }

        if (nextMonthBtn) {
            // استبدال العنصر بنسخة منه لإزالة الأحداث القديمة
            const newNextBtn = nextMonthBtn.cloneNode(true);
            nextMonthBtn.parentNode.replaceChild(newNextBtn, nextMonthBtn);

            // إضافة حدث جديد
            newNextBtn.addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                updateCalendar();
                if (monthSelector) monthSelector.value = currentMonth;
                if (yearSelector) yearSelector.value = currentYear;
            });
        }

        if (monthSelector) {
            // استبدال العنصر بنسخة منه لإزالة الأحداث القديمة
            const newMonthSelector = monthSelector.cloneNode(true);
            monthSelector.parentNode.replaceChild(newMonthSelector, monthSelector);

            // إضافة حدث جديد
            newMonthSelector.addEventListener('change', function() {
                currentMonth = parseInt(this.value);
                updateCalendar();
            });
        }

        if (yearSelector) {
            // استبدال العنصر بنسخة منه لإزالة الأحداث القديمة
            const newYearSelector = yearSelector.cloneNode(true);
            yearSelector.parentNode.replaceChild(newYearSelector, yearSelector);

            // إضافة حدث جديد
            newYearSelector.addEventListener('change', function() {
                currentYear = parseInt(this.value);
                updateCalendar();
            });
        }

        // تهيئة التقويم
        initCalendar();
    }

    // ✅ دالة رئيسية لتهيئة الصفحة
    function initPage() {
        initializeCharts();
        updateCurrentDate();
        setupHoverEffects();
        initCalendarFunctions();
    }

    // ✅ تهيئة الصفحة عند التحميل المباشر
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        // تم تحميل الصفحة بالفعل
        setTimeout(initPage, 0);
    } else {
        document.addEventListener('DOMContentLoaded', initPage);
    }

    // ✅ تهيئة الصفحة عند التحميل عبر AJAX
    // سيتم تنفيذ هذا الكود فور تحميل المحتوى
    initPage();
</script>

<script>
$(document).ready(function () {
    // استدعاء الإحصائيات
    $.ajax({
        url: "/orders-stats",
        type: "GET",
        dataType: "json",
        success: function (res) {
            if (res.success) {
                $('#stat-pending').text(res.pending);
                $('#stat-completed').text(res.completed);
                $('#stat-correction').text(res.correction);
                $('#stat-avg-days').text(res.avg_days + ' يوم');
            }
        }
    });

    // استدعاء الطلبات الحديثة
    $.ajax({
    url: "/recent-orders",
    type: "GET",
    dataType: "json",
    success: function (res) {
        console.log('✅ استجابة /recent-orders:', res);
        if (res.success && res.orders.length) {
            let rows = '';
            res.orders.forEach(order => {
                rows += `
                    <tr>
                        <td>${order.request_number}</td>
                        <td>${order.type_name}</td>
                        <td>${order.created_at}</td>
                        <td><span class="status ${order.css}">${order.status_name}</span></td>
                        <td>
                            <button class="action-btn"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
                `;
            });
            $('#recent-orders-body').html(rows);
        } else {
            $('#recent-orders-body').html('<tr><td colspan="5" style="text-align:center">لا توجد طلبات.</td></tr>');
        }
    },
    error: function (xhr) {
        console.error('❌ خطأ /recent-orders:', xhr.status, xhr.responseText);
    }
});
});
</script>
</body>
</html>
