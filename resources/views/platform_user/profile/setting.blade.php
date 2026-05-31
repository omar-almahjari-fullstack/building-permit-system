<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعدادات الحساب - نظام التراخيص</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --background-color: #f5f9ff;
            --card-color: #ffffff;
            --text-color: #333;
            --light-text: #777;
            --danger: #e74c3c;
            --warning: #f39c12;
            --success: #27ae60;
            --sidebar-width: 250px;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            direction: rtl;
            text-align: right;
            margin: 0;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* الحاوية الرئيسية للمحتوى */
        .main-container {
            margin: 30px 20px 20px;
            margin-right: 120px;
            transition: margin 0.3s;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .profile-header h1 {
            color: var(--primary-color);
            font-size: 1.6rem;
        }

        .settings-tabs {
            display: flex;
            background: rgba(0, 97, 94, 0.05);
            border-radius: 10px;
            padding: 5px;
            margin-bottom: 25px;
            overflow-x: auto;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .settings-tab {
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 8px;
            transition: var(--transition);
            text-align: center;
            min-width: 120px;
            font-weight: 500;
            position: relative;
            text-decoration: none;
            color: var(--text-color);
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .settings-tab::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 3px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .settings-tab.active {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            color: var(--primary-color);
            font-weight: bold;
        }

        .settings-tab.active::before {
            width: 100%;
        }

        .settings-tab:hover:not(.active) {
            background: rgba(0, 97, 94, 0.1);
        }

        .settings-tab i {
            font-size: 1.1rem;
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

        /* صفحة الإعدادات */
        .settings-section {
            margin-bottom: 30px;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 20px;
            background: #fff;
        }

        .settings-section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .settings-section-title i {
            font-size: 1.2rem;
        }

        .privacy-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .privacy-item:last-child {
            border-bottom: none;
        }

        .privacy-label {
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .privacy-label i {
            color: var(--light-text);
            font-size: 1.1rem;
        }

        .privacy-desc {
            color: var(--light-text);
            font-size: 0.9rem;
            margin-top: 5px;
            padding-right: 25px;
        }

        /* تحسينات التبديل */
        .toggle-container {
            display: flex;
            align-items: center;
        }

        .toggle-label {
            margin-left: 10px;
            color: var(--light-text);
            font-size: 0.9rem;
        }

        /* التبديل الحديث */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 26px;
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
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: var(--primary-color);
        }

        input:checked+.slider:before {
            transform: translateX(24px);
        }

        /* نماذج الإدخال */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
        }

        .password-strength {
            margin-top: 5px;
            height: 5px;
            background: #eee;
            border-radius: 3px;
            overflow: hidden;
            position: relative;
        }

        .password-strength-meter {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 0;
            transition: width 0.3s ease;
        }

        .strength-weak {
            background: var(--danger);
            width: 25%;
        }

        .strength-medium {
            background: var(--warning);
            width: 50%;
        }

        .strength-good {
            background: var(--success);
            width: 75%;
        }

        .strength-strong {
            background: var(--success);
            width: 100%;
        }

        .password-strength-label {
            font-size: 0.8rem;
            margin-top: 5px;
            text-align: left;
        }

        /* الأجهزة الموثوقة */
        .trusted-devices {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .device-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f5f5f5;
            gap: 15px;
        }

        .device-icon {
            width: 40px;
            height: 40px;
            background: rgba(0, 97, 94, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--primary-color);
        }

        .device-info {
            flex: 1;
        }

        .device-info h4 {
            margin-bottom: 5px;
        }

        .device-info p {
            color: var(--light-text);
            font-size: 0.85rem;
        }

        .device-actions button {
            background: none;
            border: none;
            color: var(--light-text);
            cursor: pointer;
            transition: var(--transition);
            padding: 5px;
        }

        .device-actions button:hover {
            color: var(--danger);
        }

        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 1200px) {
            .sidebar {
                right: -280px;
            }

            .sidebar.show {
                right: 0;
            }

            .main-container {
                margin-right: 20px;
                margin-left: 20px;
            }

            .mobile-toggle {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .settings-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 10px;
            }

            .settings-tab {
                min-width: auto;
                padding: 10px 15px;
                font-size: 0.85rem;
            }

            .privacy-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .privacy-item .toggle-container {
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
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
        }

        /* رسوم متحركة للبطاقات */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-card {
            animation: fadeIn 0.5s ease forwards;
        }

        .settings-tab {
            animation: fadeIn 0.4s ease forwards;
        }

        .settings-tab:nth-child(1) {
            animation-delay: 0.1s;
        }

        .settings-tab:nth-child(2) {
            animation-delay: 0.2s;
        }

        .settings-tab:nth-child(3) {
            animation-delay: 0.3s;
        }

        .settings-tab:nth-child(4) {
            animation-delay: 0.4s;
        }

        .settings-tab:nth-child(5) {
            animation-delay: 0.5s;
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

        .settings-tab-content {
            display: none;
        }

        .settings-tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        /* Dark Mode */
        body.dark-mode {
            background-color: #121212 !important;
            color: #e0e0e0 !important;
        }
        body.dark-mode .profile-card {
            background-color: #1e1e1e !important;
            color: #e0e0e0 !important;
            border-color: #333;
        }

        /* حجم الخط */
        body.font-small  { font-size: 0.85rem !important; }
        body.font-medium { font-size: 1rem   !important; }
        body.font-large  { font-size: 1.15rem !important; }


        /* رسالة AJAX */
        /* .ajax-message {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: var(--primary-color);
            color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 3000;
            display: none;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        } */
    </style>
</head>

<body>
    <div class="main-container">
        <div class="profile-header">
            <h1>الإعدادات</h1>
        </div>

        <div class="settings-tabs">
            <div class="settings-tab active" data-tab="privacy">
                <i class="fas fa-lock"></i> الخصوصية
            </div>
            <div class="settings-tab" data-tab="notifications">
                <i class="fas fa-bell"></i> الإشعارات
            </div>
            <div class="settings-tab" data-tab="account">
                <i class="fas fa-user-cog"></i> الحساب
            </div>
            <div class="settings-tab" data-tab="preferences">
                <i class="fas fa-sliders-h"></i> التفضيلات
            </div>
        </div>

        <!-- قسم الخصوصية -->
        <div id="privacy-tab" class="settings-tab-content active">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>إعدادات الخصوصية</h2>
                </div>

                <div class="settings-section">
                    <div class="settings-section-title">
                        <i class="fas fa-user-friends"></i> مشاركة المعلومات
                    </div>

                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label">
                                <i class="fas fa-user-circle"></i> مشاركة الملف الشخصي
                            </div>
                            <div class="privacy-desc">السماح للآخرين بمشاهدة ملفك الشخصي</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="share-profile" data-key="share_profile">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="share-profile-label">جارٍ الحفظ...</span>
                        </div>
                    </div>

                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label">
                                <i class="fas fa-phone"></i> مشاركة معلومات الاتصال
                            </div>
                            <div class="privacy-desc">السماح للآخرين برؤية معلومات الاتصال الخاصة بك</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="share-contact" data-key="share_contact">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="share-contact-label">جارٍ الحفظ...</span>
                        </div>
                    </div>

                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label">
                                <i class="fas fa-tasks"></i> عرض حالة الطلبات
                            </div>
                            <div class="privacy-desc">السماح للآخرين بمشاهدة حالة طلباتك</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="show-requests" data-key="show_requests">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="show-requests-label">جارٍ الحفظ...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم الإشعارات -->
        <div id="notifications-tab" class="settings-tab-content">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>إعدادات الإشعارات</h2>
                </div>
            
                <!-- بريد إلكتروني -->
                <div class="settings-section">
                    <div class="settings-section-title">
                        <i class="fas fa-envelope"></i> الإشعارات عبر البريد الإلكتروني
                    </div>
                
                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label"><i class="fas fa-bell"></i> الإشعارات العامة</div>
                            <div class="privacy-desc">تلقي الإشعارات العامة عبر البريد الإلكتروني</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="email-general" data-key="email_general">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="email-general-label">جارٍ الحفظ...</span>
                        </div>
                    </div>
                
                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label"><i class="fas fa-file-alt"></i> تحديثات الطلبات</div>
                            <div class="privacy-desc">تلقي تحديثات حالة الطلبات عبر البريد الإلكتروني</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="email-requests" data-key="email_requests">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="email-requests-label">جارٍ الحفظ...</span>
                        </div>
                    </div>
                
                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label"><i class="fas fa-comments"></i> رسائل الدعم</div>
                            <div class="privacy-desc">تلقي إشعارات حول تذاكر الدعم الفني</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="email-support" data-key="email_support">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="email-support-label">جارٍ الحفظ...</span>
                        </div>
                    </div>
                </div>
            
                <!-- SMS -->
                <div class="settings-section">
                    <div class="settings-section-title">
                        <i class="fas fa-mobile-alt"></i> إشعارات الجوال
                    </div>
                
                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label"><i class="fas fa-bell"></i> الإشعارات العامة</div>
                            <div class="privacy-desc">تلقي الإشعارات على جهازك الجوال</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="sms-general" data-key="sms_general">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="sms-general-label">جارٍ الحفظ...</span>
                        </div>
                    </div>
                
                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label"><i class="fas fa-exclamation-circle"></i> تنبيهات مهمة</div>
                            <div class="privacy-desc">تلقي تنبيهات حول الأمور المهمة والطارئة</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="sms-urgent" data-key="sms_urgent">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="sms-urgent-label">جارٍ الحفظ...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم الحساب -->
        <div id="account-tab" class="settings-tab-content">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>إعدادات الحساب</h2>
                </div>
            
                <!-- تغيير كلمة المرور -->
                <div class="settings-section">
                    <div class="settings-section-title">
                        <i class="fas fa-key"></i> تغيير كلمة المرور
                    </div>
                
                    <div class="form-group">
                        <label>كلمة المرور الحالية</label>
                        <input type="password" id="current-password" placeholder="أدخل كلمة المرور الحالية">
                    </div>
                
                    <div class="form-group">
                        <label>كلمة المرور الجديدة</label>
                        <input type="password" id="new-password" placeholder="أدخل كلمة المرور الجديدة">
                        <div class="password-strength">
                            <div class="password-strength-meter" id="password-meter"></div>
                        </div>
                        <div class="password-strength-label" id="password-strength-label">قوة كلمة المرور: ضعيفة</div>
                    </div>
                
                    <div class="form-group">
                        <label>تأكيد كلمة المرور الجديدة</label>
                        <input type="password" id="confirm-password" placeholder="أعد إدخال كلمة المرور الجديدة">
                    </div>
                
                    <button class="action-btn" id="change-password-btn">
                        <i class="fas fa-save"></i> تغيير كلمة المرور
                    </button>
                </div>
            
                <!-- تحديث المعلومات الشخصية -->
                <div class="settings-section">
                    <div class="settings-section-title">
                        <i class="fas fa-user-edit"></i> تحديث المعلومات الشخصية
                    </div>
                
                    <div class="form-group">
                        <label>الاسم الكامل</label>
                        <input type="text" id="full-name" placeholder="أدخل الاسم الكامل">
                    </div>
                
                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email" id="email" placeholder="أدخل البريد الإلكتروني">
                    </div>
                
                    <div class="form-group">
                        <label>رقم الهاتف</label>
                        <input type="tel" id="phone" placeholder="أدخل رقم الهاتف">
                    </div>
                
                    <button class="action-btn" id="save-profile-btn">
                        <i class="fas fa-save"></i> حفظ التغييرات
                    </button>
                </div>
            </div>
        </div>

        <!-- قسم التفضيلات -->
        <div id="preferences-tab" class="settings-tab-content">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>التفضيلات</h2>
                </div>
            
                <!-- اللغة والمنطقة -->
                <div class="settings-section">
                    <div class="settings-section-title">
                        <i class="fas fa-globe"></i> اللغة والمنطقة
                    </div>
                
                    <div class="form-group">
                        <label>لغة الواجهة</label>
                        <select id="language-select" data-key="language">
                            <option value="العربية">العربية</option>
                            <option value="English">English</option>
                            <option value="Français">Français</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label>المنطقة الزمنية</label>
                        <select id="timezone-select" data-key="timezone">
                            <option value="Asia/Aden">(GMT+3) عدن – اليمن</option>
                            <option value="Asia/Sanaa">(GMT+3) صنعاء – اليمن</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label>تنسيق التاريخ</label>
                        <select id="date-format-select" data-key="date_format">
                            <option value="DD/MM/YYYY">يوم/شهر/سنة</option>
                            <option value="YYYY/MM/DD">سنة/شهر/يوم</option>
                            <option value="MM/DD/YYYY">شهر/يوم/سنة</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label>تنسيق الوقت</label>
                        <select id="time-format-select" data-key="time_format">
                            <option value="24 ساعة">24 ساعة</option>
                            <option value="12 ساعة">12 ساعة</option>
                        </select>
                    </div>
                </div>
            
                <!-- المظهر -->
                <div class="settings-section">
                    <div class="settings-section-title">
                        <i class="fas fa-palette"></i> المظهر
                    </div>
                
                    <div class="privacy-item">
                        <div>
                            <div class="privacy-label"><i class="fas fa-moon"></i> الوضع الليلي</div>
                            <div class="privacy-desc">تمكين الوضع المظلم لتجربة استخدام أفضل في الإضاءة المنخفضة</div>
                        </div>
                        <div class="toggle-container">
                            <label class="switch">
                                <input type="checkbox" id="dark-mode-toggle" data-key="dark_mode">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-label" id="dark-mode-status">معطل</span>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label>حجم الخط</label>
                        <select id="font-size-select" data-key="font_size">
                            <option value="small">صغير</option>
                            <option value="medium">متوسط</option>
                            <option value="large">كبير</option>
                        </select>
                    </div>
                </div>
            
                <button class="action-btn" id="save-preferences-btn">
                    <i class="fas fa-save"></i> حفظ التفضيلات
                </button>
            </div>
        </div>

    </div>

    <!-- ✅ كود JavaScript الوحيد والنهائي -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        /* ========== 1) متغير عام لمعرف المستفيد ========== */
        const BENEFICIARY_ID = 2;   // يمكن جعله ديناميكياً لاحقاً

        /* ========== 2) جلب الإعدادات من السيرفر ========== */
        function loadPrivacySettings() {
            $.get(`/settings/privacy/${BENEFICIARY_ID}`, res => {
                if (!res.success) return;

                const s = res.settings;
                $('#share-profile').prop('checked', !!s.share_profile);
                $('#share-contact').prop('checked', !!s.share_contact);
                $('#show-requests').prop('checked', !!s.show_requests);

                // تحديث النصوص
                $('.toggle-label').each(function () {
                    const isOn = $(this).prev().find('input').is(':checked');
                    $(this).text(isOn ? 'مفعل' : 'معطل');
                });
            });
        }

        /* ========== ) حفظ التغيير فوراً ========== */
        $('#privacy-tab').on('change', 'input[type="checkbox"]', function () {
            const $switch = $(this);
            const key     = $switch.data('key');
            const value   = $switch.is(':checked') ? 1 : 0;
            const $label  = $switch.parent().siblings('.toggle-label');

            $label.text('جارٍ الحفظ...');

            $.ajax({
                url: '/settings/privacy/toggle',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    key: key,
                    value: value,
                    beneficiary_id: BENEFICIARY_ID
                },
                success: () => $label.text(value ? 'مفعل' : 'معطل'),
                error: () => {
                    $label.text('خطأ');
                    // إعادة الوضع القديم فى حال فشل الطلب
                    $switch.prop('checked', !value);
                    $label.text(!value ? 'مفعل' : 'معطل');
                }
            });
        });

        /* ========== 4) تهيئة الصفحة ========== */
        $(function () {
            loadPrivacySettings();   // مرة واحدة فقط عند التحميل

            // تبديل التبويبات (بسيط)
            $('.settings-tab').on('click', function () {
                $('.settings-tab').removeClass('active');
                $('.settings-tab-content').removeClass('active');
                $(this).addClass('active');
                $('#' + $(this).data('tab') + '-tab').addClass('active');
            });
        });



        // خاص بالاشعارات 
        /* === إعدادات الإشعارات === */
        function loadNotificationSettings() {
            $.get(`/settings/notifications/${BENEFICIARY_ID}`, res => {
                if (!res.success) return;
                const s = res.settings;
                $('#email-general').prop('checked', !!s.email_general);
                $('#email-requests').prop('checked', !!s.email_requests);
                $('#email-support').prop('checked', !!s.email_support);
                $('#sms-general').prop('checked', !!s.sms_general);
                $('#sms-urgent').prop('checked', !!s.sms_urgent);
            
                $('#notifications-tab .toggle-label').each(function () {
                    const isOn = $(this).prev().find('input').is(':checked');
                    $(this).text(isOn ? 'مفعل' : 'معطل');
                });
            });
        }

        $('#notifications-tab').on('change', 'input[type="checkbox"]', function () {
            const $switch = $(this);
            const key     = $switch.data('key');
            const value   = $switch.is(':checked') ? 1 : 0;
            const $label  = $switch.parent().siblings('.toggle-label');
        
            $label.text('جارٍ الحفظ...');
        
            $.ajax({
                url: '/settings/notifications/toggle',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    key: key,
                    value: value,
                    beneficiary_id: BENEFICIARY_ID
                },
                success: () => $label.text(value ? 'مفعل' : 'معطل'),
                error: () => {
                    $label.text('خطأ');
                    $switch.prop('checked', !value);
                    $label.text(!value ? 'مفعل' : 'معطل');
                }
            });
        });

        // استدعاء عند فتح التبويب
        $(function () {
            loadNotificationSettings();
        });


        // خاص بالحساب 
        /* === إعدادات الحساب (كلمة المرور + معلومات شخصية) === */
        /* === إعدادات الحساب === */
        function loadAccountInfo() {
            $.get(`/settings/account/${BENEFICIARY_ID}`, res => {
                if (res.success) {
                    $('#full-name').val(res.data.name  || '');
                    $('#email').val(res.data.email     || '');
                    $('#phone').val(res.data.mobile    || '');
                }
            });
        }

        /* قوة كلمة المرور */
        $('#new-password').on('input', function () {
            const pwd = $(this).val();
            let strength = 0;
            if (pwd.length >= 8) strength += 25;
            if (/[a-z]/.test(pwd) && /[A-Z]/.test(pwd)) strength += 25;
            if (/\d/.test(pwd)) strength += 15;
            if (/[^A-Za-z0-9]/.test(pwd)) strength += 10;
        
            const meter = $('#password-meter');
            const label = $('#password-strength-label');
            meter.removeClass('strength-weak strength-medium strength-good strength-strong');
        
            if (strength < 50) {
                meter.addClass('strength-weak');
                label.text('قوة كلمة المرور: ضعيفة');
            } else if (strength < 75) {
                meter.addClass('strength-medium');
                label.text('قوة كلمة المرور: متوسطة');
            } else if (strength < 100) {
                meter.addClass('strength-good');
                label.text('قوة كلمة المرور: جيدة');
            } else {
                meter.addClass('strength-strong');
                label.text('قوة كلمة المرور: قوية');
            }
            meter.css('width', strength + '%');
        });

        /* تغيير كلمة المرور */
        // $('#change-password-btn').click(function () {
        //     const btn = $(this);
        //     btn.html('<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...');
        
        //     $.ajax({
        //         url: '/settings/account/change-password',
        //         type: 'POST',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             beneficiary_id: BENEFICIARY_ID,
        //             current_password: $('#current-password').val(),
        //             new_password: $('#new-password').val(),
        //             new_password_confirmation: $('#confirm-password').val()
        //         },
        //         success: res => {
        //             alert(res.message);
        //             $('#current-password, #new-password, #confirm-password').val('');
        //             $('#password-meter').css('width', 0);
        //             $('#password-strength-label').text('');
        //         },
        //         error: xhr => {
        //             alert(xhr.responseJSON?.message || 'حدث خطأ أثناء الحفظ');
        //         },
        //         complete: () => btn.html('<i class="fas fa-save"></i> تغيير كلمة المرور')
        //     });
        // });

        $('#change-password-btn').click(function () {
            const btn = $(this);
            btn.html('<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...');
        
            $.ajax({
                url: '/settings/account/change-password',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    beneficiary_id: BENEFICIARY_ID,
                    current_password: $('#current-password').val(),
                    new_password: $('#new-password').val(),
                    new_password_confirmation: $('#confirm-password').val()
                },
                success: res => {
                    if(res.success) {
                        alert(res.message);
                        $('#current-password, #new-password, #confirm-password').val('');
                        $('#password-meter').css('width', 0);
                        $('#password-strength-label').text('');
                    } else {
                        alert(res.message + '\n\nتفاصيل الخطأ: ' + JSON.stringify(res.debug));
                    }
                },
                error: xhr => {
                    alert(xhr.responseJSON?.message || 'حدث خطأ أثناء الحفظ');
                },
                complete: () => btn.html('<i class="fas fa-save"></i> تغيير كلمة المرور')
            });
        });
        /* تحديث المعلومات الشخصية */
        $('#save-profile-btn').click(function () {
            const btn = $(this);
            btn.html('<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...');
        
            $.ajax({
                url: '/settings/account/update-profile',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    beneficiary_id: BENEFICIARY_ID,
                    full_name: $('#full-name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val()
                },
                success: res => {
                    alert(res.message);
                },
                error: xhr => {
                    alert(xhr.responseJSON?.message || 'حدث خطأ أثناء الحفظ');
                },
                complete: () => btn.html('<i class="fas fa-save"></i> حفظ التغييرات')
            });
        });
        /* استدعاء البيانات عند فتح التبويب */
        $(function () {
            loadAccountInfo();
        });


        /* === إعدادات التفضيلات === */
        function loadPreferences() {
            $.get(`/settings/preferences/${BENEFICIARY_ID}`, res => {
                if (!res.success) return;

                const p = res.preferences;
                $('#language-select').val(p.language);
                $('#timezone-select').val(p.timezone);
                $('#date-format-select').val(p.date_format);
                $('#time-format-select').val(p.time_format);
                $('#font-size-select').val(p.font_size);
                $('#dark-mode-toggle').prop('checked', !!p.dark_mode);

                $('#dark-mode-status').text(!!p.dark_mode ? 'مفعل' : 'معطل');

                // تطبيق المظهر والخط فورًا
                applyTheme();
                applyFontSize();
            });
        }

        /* === تطبيق المظهر فورياً === */
        function applyTheme() {
            const isDark = $('#dark-mode-toggle').is(':checked');
            if (isDark) {
                $('body').addClass('dark-mode');
                $('.profile-card').addClass('dark-card');
            } else {
                $('body').removeClass('dark-mode dark-card');
            }
        }

        /* === تطبيق حجم الخط فورياً === */
        function applyFontSize() {
            const size = $('#font-size-select').val();
            $('body').removeClass('font-small font-medium font-large');
            $('body').addClass('font-' + size);
        }

        /* === رسالة Toast مؤقتة === */
        function showToast(msg) {
            const toast = $(`
                <div style="position:fixed;bottom:20px;right:20px;background:#27ae60;color:#fff;padding:12px 18px;border-radius:6px;z-index:3000;box-shadow:0 3px 8px rgba(0,0,0,.3);font-size:14px">
                    <i class="fas fa-check-circle"></i> ${msg}
                </div>
            `);
            $('body').append(toast);
            toast.fadeIn(300).delay(2000).fadeOut(500, () => toast.remove());
        }

        /* === حفظ تلقائي مع Toast === */
        $('#preferences-tab').on('change', 'select, input[type="checkbox"]', function () {
            const $el   = $(this);
            const key   = $el.data('key');
            const value = $el.is('select') ? $el.val() : ($el.is(':checked') ? 1 : 0);

            $.ajax({
                url: '/settings/preferences/toggle',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    key: key,
                    value: value,
                    beneficiary_id: BENEFICIARY_ID
                },
                success: () => {
                    showToast('✅ تم حفظ التفضيلات بنجاح');
                    if (key === 'dark_mode') applyTheme();
                    if (key === 'font_size') applyFontSize();
                },
                error: () => showToast('❌ فشل الحفظ')
            });
        });

        /* === تفعيل كل شيء عند التحميل === */
        $(function () {
            loadPreferences(); // جلب البيانات + تطبيق المظهر/الخط
        });

    </script>
</body>
</html>