
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
      --primary-color: #00615e;
      --secondary-color: #4CAF50;
      --accent-color: #149ddd;
      --background-color: #f5f5f5;
      --card-color: #ffffff;
      --text-color: #333;
      --light-text: #777;
      --danger: #e74c3c;
      --warning: #f39c12;
      --success: #27ae60;
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
      background-color: var(--background-color);
      color: var(--text-color);
      direction: rtl;
      text-align: right;
      margin: 0;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    /* الحاوية الرئيسية للمحتوى */
    .main-container {
    margin: 30px 20px 20px;
    margin-right: 110px;
    transition: margin 0.3s;
    }

    .profile-header {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .profile-header h1 {
      color: var(--primary-color);
      font-size: 1.6rem;
    }

    /* بطاقات الملف الشخصي */
    .profile-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      padding: 25px;
      margin-bottom: 25px;
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .profile-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .profile-card::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 5px;
      height: 100%;
      background: var(--primary-color);
      border-radius: 0 12px 12px 0;
    }

    .profile-card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .profile-card-header h2 {
      color: var(--primary-color);
      font-size: 1.3rem;
      position: relative;
      padding-right: 10px;
    }

    .profile-card-header h2::before {
      content: '';
      position: absolute;
      right: 0;
      bottom: -5px;
      width: 100px;
      height: 3px;
      background: var(--primary-color);
      border-radius: 3px;
    }

    .profile-card-header .action-btn {
      background: rgba(0, 97, 94, 0.1);
      border: none;
      border-radius: 8px;
      padding: 8px 15px;
      color: var(--primary-color);
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .profile-card-header .action-btn:hover {
      background: var(--primary-color);
      color: white;
      box-shadow: 0 3px 8px rgba(0, 97, 94, 0.3);
    }

    /* بطاقات الفواتير والمدفوعات */
    .invoice-card {
      border: 1px solid #eee;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      transition: var(--transition);
    }

    .invoice-card:hover {
      border-color: var(--primary-color);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .invoice-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .invoice-id {
      font-weight: bold;
      color: var(--primary-color);
    }

    .invoice-date {
      color: var(--light-text);
      font-size: 0.9rem;
    }

    .invoice-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
      margin-bottom: 15px;
    }

    .invoice-amount {
      font-size: 1.2rem;
      font-weight: bold;
      color: var(--primary-color);
    }

    .invoice-status {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.85rem;
    }

    .status-paid {
      background: rgba(39, 174, 96, 0.1);
      color: #27ae60;
    }

    .status-pending {
      background: rgba(243, 156, 18, 0.1);
      color: #f39c12;
    }

    .status-overdue {
      background: rgba(231, 76, 60, 0.1);
      color: #e74c3c;
    }

    .invoice-actions {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }

    .invoice-btn {
      padding: 8px 15px;
      border-radius: 5px;
      font-size: 0.9rem;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .view-btn {
      background: rgba(0, 97, 94, 0.1);
      color: var(--primary-color);
      border: 1px solid rgba(0, 97, 94, 0.2);
    }

    .pay-btn {
      background: var(--primary-color);
      color: white;
      border: none;
    }

    .invoice-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* التكيف مع الشاشات الصغيرة */

        /* التكيف مع الشاشات الصغيرة */
    @media (max-width: 1200px) {
      .main-container {
        margin-right: 100px;
        margin-left: 10px;
      }
    }
    @media (max-width: 768px) {
      .invoice-details {
        grid-template-columns: 1fr;
      }
      
      .invoice-actions {
        flex-direction: column;
        gap: 8px;
      }
      
      .invoice-btn {
        width: 100%;
        justify-content: center;
      }
    }

    @media (max-width: 480px) {
      .invoice-header {
        flex-direction: column;
        gap: 10px;
      }
    }

    /* رسوم متحركة للبطاقات */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .profile-card {
      animation: fadeIn 0.5s ease forwards;
    }

    .profile-card:nth-child(1) {
      animation-delay: 0.1s;
    }

    .profile-card:nth-child(2) {
      animation-delay: 0.2s;
    }

    .profile-card:nth-child(3) {
      animation-delay: 0.3s;
    }

    .profile-card:nth-child(4) {
      animation-delay: 0.4s;
    }

    /* تلميحات الأدوات */
    [data-tooltip] {
      position: relative;
      cursor: pointer;
    }

    [data-tooltip]:hover::after {
      content: attr(data-tooltip);
      position: absolute;
      background: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 0.8rem;
      white-space: nowrap;
      bottom: 100%;
      right: 50%;
      transform: translateX(50%);
      z-index: 1000;
    }
  </style>
</head>

<body>
  <!-- الحاوية الرئيسية للمحتوى -->
  <div class="main-container">
    <div class="profile-header">
      <h1>الدفع والفواتير</h1>
    </div>

    <!-- محتوى الفواتير والمدفوعات -->
    <div id="payments" class="profile-content">
      <div class="profile-card">
        <div class="profile-card-header">
          <h2>الفواتير والمدفوعات</h2>
          <button class="action-btn">
            <i class="fas fa-history"></i> سجل المدفوعات
          </button>
        </div>

        <div class="invoice-card">
          <div class="invoice-header">
            <div class="invoice-id">#INV-2024-0721</div>
            <div class="invoice-date">15 أبريل 2024</div>
          </div>

          <div class="invoice-details">
            <div>
              <div class="info-label">الخدمة</div>
              <div>رخصة بناء جديد</div>
            </div>

            <div>
              <div class="info-label">المبلغ</div>
              <div class="invoice-amount">1,250 ر.س</div>
            </div>

            <div>
              <div class="info-label">الحالة</div>
              <div class="invoice-status status-paid">مدفوع</div>
            </div>
          </div>

          <div class="invoice-actions">
            <button class="invoice-btn view-btn">
              <i class="fas fa-eye"></i> عرض الفاتورة
            </button>
            <button class="invoice-btn">
              <i class="fas fa-download"></i> تحميل
            </button>
          </div>
        </div>

        <div class="invoice-card">
          <div class="invoice-header">
            <div class="invoice-id">#INV-2024-0685</div>
            <div class="invoice-date">5 أبريل 2024</div>
          </div>

          <div class="invoice-details">
            <div>
              <div class="info-label">الخدمة</div>
              <div>تعديل رخصة بناء</div>
            </div>

            <div>
              <div class="info-label">المبلغ</div>
              <div class="invoice-amount">750 ر.س</div>
            </div>

            <div>
              <div class="info-label">الحالة</div>
              <div class="invoice-status status-overdue">متأخر</div>
            </div>
          </div>

          <div class="invoice-actions">
            <button class="invoice-btn view-btn">
              <i class="fas fa-eye"></i> عرض الفاتورة
            </button>
            <button class="invoice-btn pay-btn">
              <i class="fas fa-credit-card"></i> دفع الآن
            </button>
          </div>
        </div>

        <div class="invoice-card">
          <div class="invoice-header">
            <div class="invoice-id">#INV-2024-0612</div>
            <div class="invoice-date">22 مارس 2024</div>
          </div>

          <div class="invoice-details">
            <div>
              <div class="info-label">الخدمة</div>
              <div>رسوم رخصة تجارية</div>
            </div>

            <div>
              <div class="info-label">المبلغ</div>
              <div class="invoice-amount">2,400 ر.س</div>
            </div>

            <div>
              <div class="info-label">الحالة</div>
              <div class="invoice-status status-pending">بانتظار الدفع</div>
            </div>
          </div>

          <div class="invoice-actions">
            <button class="invoice-btn view-btn">
              <i class="fas fa-eye"></i> عرض الفاتورة
            </button>
            <button class="invoice-btn pay-btn">
              <i class="fas fa-credit-card"></i> دفع الآن
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>