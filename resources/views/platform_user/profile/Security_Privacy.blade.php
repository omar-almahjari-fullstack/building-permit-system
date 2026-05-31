<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الأمان والخصوصية - بوابة بلدي</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
          padding: 20px;
          transition: var(--transition);
        }

        /* الحاوية الرئيسية للمحتوى */
        .main-container {
          margin: 34px 20px 20px;
          margin-right: 133px;
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
          color: var(--primary);
          font-size: 1.6rem;
          font-weight: 700;
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
          transition: var(--transition);
          border: 1px solid rgba(26, 58, 108, 0.03);
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
          background: var(--accent);
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
          color: var(--primary);
          font-size: 1.3rem;
          position: relative;
          padding-right: 10px;
          font-weight: 700;
        }

        .profile-card-header h2::before {
          content: '';
          position: absolute;
          right: 0;
          bottom: -5px;
          width: 100px;
          height: 3px;
          background: var(--accent);
          border-radius: 3px;
        }

        .profile-card-header .action-btn {
          background: rgba(212, 175, 55, 0.1);
          border: none;
          border-radius: 8px;
          padding: 8px 15px;
          color: var(--accent);
          cursor: pointer;
          transition: var(--transition);
          display: flex;
          align-items: center;
          gap: 5px;
          font-weight: 500;
        }

        .profile-card-header .action-btn:hover {
          background: var(--accent);
          color: white;
          box-shadow: 0 3px 8px rgba(212, 175, 55, 0.3);
        }

        /* عناصر الأمان */
        .security-item {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 15px;
          border-radius: 8px;
          margin-bottom: 15px;
          background: rgba(0, 0, 0, 0.02);
          border: 1px solid rgba(0, 0, 0, 0.03);
          transition: var(--transition);
        }

        .security-item:hover {
          background: rgba(26, 58, 108, 0.03);
          border-color: rgba(26, 58, 108, 0.1);
        }

        .security-info {
          display: flex;
          align-items: center;
          gap: 15px;
        }

        .security-icon {
          width: 50px;
          height: 50px;
          border-radius: 50%;
          background: rgba(212, 175, 55, 0.1);
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 20px;
          color: var(--accent);
        }

        .security-details h3 {
          margin-bottom: 5px;
          color: var(--text-color);
          font-weight: 600;
        }

        .security-details p {
          color: var(--light-text);
          font-size: 0.9rem;
        }

        .security-status {
          padding: 5px 15px;
          border-radius: 20px;
          font-size: 0.9rem;
          font-weight: 500;
        }

        .status-active {
          background: rgba(40, 167, 69, 0.1);
          color: #28a745;
        }

        .status-inactive {
          background: rgba(255, 193, 7, 0.1);
          color: #ffc107;
        }

        .action-btn {
          padding: 8px 15px;
          border-radius: 5px;
          font-size: 0.9rem;
          cursor: pointer;
          transition: var(--transition);
          display: flex;
          align-items: center;
          gap: 5px;
          background: rgba(212, 175, 55, 0.1);
          color: var(--accent);
          border: none;
          font-weight: 500;
        }

        .action-btn:hover {
          background: var(--accent);
          color: white;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logout-all-btn {
          background: rgba(220, 53, 69, 0.1);
          color: #dc3545;
          margin-top: 15px;
          width: 100%;
          justify-content: center;
        }

        .logout-all-btn:hover {
          background: #dc3545;
          color: white;
        }

        /* التبديل */
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          right: 0;
          left: 0;
          bottom: 0;
          background-color: #ccc;
          transition: .4s;
          border-radius: 34px;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          transition: .4s;
          border-radius: 50%;
        }

        input:checked + .slider {
          background-color: var(--accent);
        }

        input:checked + .slider:before {
          transform: translateX(26px);
        }

        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 1200px) {
          .main-container {
            margin-right: 0px;
            margin-left: 0px;
          }
        }

        @media (max-width: 768px) {
          .security-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
          }

          .security-status {
            align-self: flex-end;
          }
        }

        /* تحسينات إضافية */
        .edit-input {
          width: 100%;
          padding: 10px 15px;
          border: 1px solid #ddd;
          border-radius: 8px;
          font-size: 1rem;
          transition: var(--transition);
        }

        .edit-input:focus {
          border-color: var(--accent);
          outline: none;
          box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
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

        /* نمط الأجهزة الموثوقة */
        .device-list {
          margin-top: 15px;
          border-top: 1px solid #eee;
          padding-top: 15px;
          display: none;
        }

        .device-list.show {
          display: block;
          animation: fadeIn 0.4s ease;
        }

        .device-item {
          display: flex;
          align-items: center;
          padding: 10px;
          border-bottom: 1px solid #f5f5f5;
          gap: 15px;
        }

        .device-icon {
          font-size: 24px;
          color: var(--primary);
        }

        .device-info h4 {
          margin-bottom: 5px;
          color: var(--primary);
        }

        .device-info p {
          color: var(--light-text);
          font-size: 0.85rem;
        }

        /* تعديلات الصفحة */
        .page-header {
          text-align: center;
          margin: 20px 0 30px;
        }

        .page-header h1 {
          color: var(--primary);
          font-size: 1.8rem;
          margin-bottom: 10px;
          font-weight: 700;
        }

        .page-header p {
          color: var(--light-text);
          max-width: 600px;
          margin: 0 auto;
          font-size: 1.1rem;
        }

        /* جلسات الدخول النشطة */
        .session-item {
          display: flex;
          align-items: center;
          padding: 15px;
          border-bottom: 1px solid rgba(0, 0, 0, 0.05);
          gap: 15px;
        }

        .session-item:last-child {
          border-bottom: none;
        }

        .session-icon {
          width: 40px;
          height: 40px;
          border-radius: 50%;
          background: rgba(26, 58, 108, 0.1);
          display: flex;
          align-items: center;
          justify-content: center;
          color: var(--primary);
          font-size: 18px;
        }

        .session-info h4 {
          margin-bottom: 5px;
          color: var(--primary);
        }

        .session-info p {
          color: var(--light-text);
          font-size: 0.85rem;
        }

        .session-time {
          color: var(--light-text);
          font-size: 0.8rem;
          margin-top: 5px;
        }
    </style>
</head>

<body>
<!-- الحاوية الرئيسية -->
<div class="main-container">
    <div class="page-header">
        <h1>الأمان والخصوصية</h1>
        <p>إدارة إعدادات الأمان والخصوصية لحسابك في بوابة بلدي الإلكترونية</p>
    </div>

    <!-- محتوى الأمان والخصوصية -->
    <div id="security" class="profile-content">

        <!-- إعدادات الأمان -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h2>إعدادات الأمان</h2>
            </div>

            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon"><i class="fas fa-lock"></i></div>
                    <div class="security-details">
                        <h3>المصادقة الثنائية</h3>
                        <p>طبقة أمان إضافية لحسابك</p>
                    </div>
                </div>
                <label class="switch">
                    <input type="checkbox" class="security-switch" data-field="two_factor" id="twoFactorToggle">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon"><i class="fas fa-shield-alt"></i></div>
                    <div class="security-details">
                        <h3>تحقق تسجيل الدخول</h3>
                        <p>تأكيد الهوية عند الدخول من أجهزة جديدة</p>
                    </div>
                </div>
                <label class="switch">
                    <input type="checkbox" class="security-switch" data-field="login_verify" id="loginVerifyToggle">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon"><i class="fas fa-mobile-alt"></i></div>
                    <div class="security-details">
                        <h3>أجهزة موثوقة</h3>
                        <p>الأجهزة التي تم تسجيل الدخول منها</p>
                    </div>
                </div>
                <button class="action-btn" id="showDevicesBtn">
                    <i class="fas fa-list"></i> عرض الأجهزة
                </button>
            </div>

            <!-- قائمة الأجهزة (مخفية أولاً) -->
            <div class="device-list" id="deviceList"></div>
        </div>

        <!-- جلسات الدخول النشطة -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h2>جلسات الدخول النشطة</h2>
            </div>
            <div id="activeSessions"></div>
            <button class="action-btn logout-all-btn">
                <i class="fas fa-sign-out-alt"></i> تسجيل الخروج من جميع الأجهزة
            </button>
        </div>

        <!-- إعدادات الخصوصية -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h2>إعدادات الخصوصية</h2>
            </div>

            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon"><i class="fas fa-eye"></i></div>
                    <div class="security-details">
                        <h3>إظهار معلومات الحساب</h3>
                        <p>السماح للآخرين برؤية معلوماتك الشخصية</p>
                    </div>
                </div>
                <label class="switch">
                    <input type="checkbox" class="security-switch" data-field="profile_visible" id="profileVisibility">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon"><i class="fas fa-bell"></i></div>
                    <div class="security-details">
                        <h3>الإشعارات البريدية</h3>
                        <p>تلقي الإشعارات عبر البريد الإلكتروني</p>
                    </div>
                </div>
                <label class="switch">
                    <input type="checkbox" class="security-switch" data-field="email_notify" id="emailNotifications">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="security-item">
                <div class="security-info">
                    <div class="security-icon"><i class="fas fa-shield-virus"></i></div>
                    <div class="security-details">
                        <h3>الفحص الأمني الدوري</h3>
                        <p>فحص الحساب أسبوعياً بحثاً عن أنشطة مشبوهة</p>
                    </div>
                </div>
                <label class="switch">
                    <input type="checkbox" class="security-switch" data-field="security_scan" id="securityScan">
                    <span class="slider"></span>
                </label>
            </div>
        </div>

    </div><!-- /#security -->
</div><!-- /.main-container -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
/* ========== الأمان والخصوصية ========== */
function loadSecurityPage(){
    $.get('/security/data', res=>{
        if(!res.success) return;

        // 1- ملء الإعدادات
        const s = res.settings;
        $('#twoFactorToggle').prop('checked', Boolean(s.two_factor));
        $('#loginVerifyToggle').prop('checked', Boolean(s.login_verify));
        $('#profileVisibility').prop('checked', Boolean(s.profile_visible));
        $('#emailNotifications').prop('checked', Boolean(s.email_notify));
        $('#securityScan').prop('checked', Boolean(s.security_scan));

        // 2- ملء الأجهزة
        let html='';
        res.devices.forEach(d=>{
            html+=`
                <div class="device-item">
                    <div class="device-icon"><i class="fas fa-desktop"></i></div>
                    <div class="device-info">
                        <h4>${d.device}</h4>
                        <p>${d.ip} - ${new Date(d.time).toLocaleString('ar-EG')}</p>
                    </div>
                    <button class="action-btn logout-device-btn" data-session="${d.session_id}">
                        <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                    </button>
                </div>`;
        });
        $('#deviceList').html(html);

        // 3- ملء الجلسات النشطة
        let sessionsHtml = '';
        res.sessions.forEach(session => {
            sessionsHtml += `
                <div class="session-item">
                    <div class="session-icon">
                        <i class="fas ${session.device_type === 'mobile' ? 'fa-mobile-alt' : 'fa-desktop'}"></i>
                    </div>
                    <div class="session-info">
                        <h4>${session.browser} على ${session.device}</h4>
                        <p>${session.location}</p>
                        <div class="session-time">آخر نشاط: ${new Date(session.last_activity).toLocaleString('ar-EG')}</div>
                    </div>
                    ${session.is_current ?
                        '<span class="security-status status-active">الحالية</span>' :
                        `<button class="action-btn logout-device-btn" data-session="${session.id}">
                            <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                         </button>`
                    }
                </div>`;
        });
        $('#activeSessions').html(sessionsHtml);
    });
}

/* تبديل أي switch (مع الحفظ الفوري) */
$(document).on('change','.security-switch',function(){
    const field = $(this).data('field');
    const val   = $(this).is(':checked') ? 1 : 0;

    $.ajax({
        url: '/security/toggle',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            field: field,
            value: val
        },
        success: res => {
            if(res.success) {
                console.log('✅ تم حفظ الإعدادات');
            } else {
                alert(res.message);
                $(this).prop('checked', !val); // استعادة الحالة
            }
        },
        error: xhr => {
            alert('فشل حفظ الإعدادات');
            $(this).prop('checked', !val);
            console.error(xhr.responseJSON);
        }
    });
});

/* تسجيل خروج من جهاز واحد */
$(document).on('click','.logout-device-btn',function(){
    if(!confirm('هل تريد تسجيل الخروج من هذا الجهاز؟')) return;
    const id = $(this).data('session');

    $.post('/security/logout-device', {
        _token: '{{ csrf_token() }}',
        session_id: id
    }, res => {
        if(res.success) {
            loadSecurityPage(); // إعادة تحميل القائمة
            alert('تم تسجيل الخروج بنجاح');
        } else {
            alert('فشل تسجيل الخروج');
        }
    });
});

/* تسجيل خروج من جميع الأجهزة */
$(document).on('click','.logout-all-btn',function(){
    if(!confirm('هل تريد تسجيل الخروج من جميع الأجهزة؟')) return;

    $.post('/security/logout-all', {
        _token: '{{ csrf_token() }}'
    }, res => {
        if(res.success) {
            loadSecurityPage();
            alert('تم تسجيل الخروج من جميع الأجهزة بنجاح');
        } else {
            alert('فشل تسجيل الخروج');
        }
    });
});

/* عرض/إخفاء قائمة الأجهزة */
$(document).on('click','#showDevicesBtn',function(){
    const list = $('#deviceList');
    list.toggleClass('show');
    $(this).html(list.hasClass('show')
        ? '<i class="fas fa-times"></i> إخفاء الأجهزة'
        : '<i class="fas fa-list"></i> عرض الأجهزة');
});

/* تهيئة الصفحة عند التحميل */
$(document).ready(function() {
    loadSecurityPage();
});
</script>
</body>
</html>
