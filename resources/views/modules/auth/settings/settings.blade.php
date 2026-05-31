<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>النظام الحكومي - مركز الإعدادات</title>
    <style>
        :root {
            --primary-color: #0d3b66;
            --primary-dark: #08284d;
            --primary-light: #1d4e89;
            --secondary-color: #3a6ea5;
            --accent-color: #5c9ead;
            --gold-color: #d4af37;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --success-color: #2e8540;
            --warning-color: #f59e0b;
            --danger-color: #dc2626;
            --border-radius: 12px;
            --border-radius-lg: 16px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --box-shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

  

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100" opacity="0.03"><rect fill="%230d3b66" width="100" height="100"/><path d="M0 0L100 100" stroke="%2308284d" stroke-width="1"/><path d="M100 0L0 100" stroke="%2308284d" stroke-width="1"/></svg>');
            pointer-events: none;
            z-index: -1;
        }

        @keyframes rotateBackground {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .logo-icon {
            font-size: 2.5rem;
            color: var(--gold-color);
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }

        /* تبويبات مخصصة */
        .settings-tabs-container {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
            border-radius: var(--border-radius-lg);
            padding: 0.5rem;
            margin: 0 0 2rem 0;
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
        }

        .settings-tabs-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold-color), var(--accent-color), var(--gold-color));
            background-size: 200% 100%;
            animation: shimmer 3s infinite linear;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        .settings-tabs {
            border: none;
            background: transparent;
        }

        .settings-tabs .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            margin: 0 0.25rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: transparent;
            border: none;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }

        .settings-tabs .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .settings-tabs .nav-link:hover::before {
            left: 100%;
        }

        .settings-tabs .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .settings-tabs .nav-link.active {
            color: var(--primary-dark);
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            font-weight: 600;
        }

        .settings-tabs .nav-link.active i {
            color: var(--primary-color);
        }

        /* محتوى التبويبات */
        .tab-content {
            background: var(--card-bg);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--box-shadow);
            padding: 2.5rem;
            min-height: 600px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .tab-content::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-light) 0%, transparent 70%);
            opacity: 0.03;
            border-radius: 0 0 0 100px;
        }

        .tab-pane {
            display: none;
            animation: fadeInUp 0.5s ease-out;
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

        .tab-pane.active {
            display: block;
        }

        .tab-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
            position: relative;
        }

        .tab-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--gold-color));
            border-radius: 2px;
        }

        .tab-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 4px 12px rgba(13, 59, 102, 0.3);
        }

        .tab-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin: 0;
        }

        .tab-subtitle {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-top: 0.5rem;
        }

        /* تحسينات النماذج */
        .form-section {
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            position: relative;
            overflow: hidden;
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary-color), var(--accent-color));
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: var(--primary-color);
            font-size: 1.1em;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label i {
            color: var(--primary-color);
            font-size: 0.9em;
        }

        .form-control,
        .form-select {
            border-radius: var(--border-radius);
            padding: 0.875rem 1.25rem;
            border: 2px solid #e2e8f0;
            transition: var(--transition);
            font-size: 1rem;
            background: #ffffff;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(13, 59, 102, 0.15);
            transform: translateY(-2px);
        }

        .input-group-text {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
            font-weight: 500;
        }

        /* أزرار محسنة */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            border-radius: var(--border-radius);
            padding: 0.875rem 2rem;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(13, 59, 102, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(13, 59, 102, 0.4);
        }

        .btn-outline-danger {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: var(--border-radius);
            padding: 0.875rem 2rem;
            font-weight: 600;
            transition: var(--transition);
            background: transparent;
        }

        .btn-outline-danger:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(13, 59, 102, 0.3);
        }

        /* كروت محسنة */
        .info-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            height: 100%;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--box-shadow-hover);
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .info-card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }

        .info-card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin: 0;
        }

        /* تأثيرات خاصة */
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .glow-effect {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            to {
                box-shadow: 0 0 30px rgba(59, 130, 246, 0.5);
            }
        }

        /* تذييل الصفحة */
        .government-footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            color: white;
            padding: 2.5rem 0;
            margin-top: 4rem;
            position: relative;
            overflow: hidden;
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .footer-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.03;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100"><rect fill="%23ffffff" width="100" height="100"/><path d="M0 0L100 100" stroke="%23ffffff" stroke-width="2"/><path d="M100 0L0 100" stroke="%23ffffff" stroke-width="2"/></svg>');
        }

        /* responsive design */
        @media (max-width: 768px) {

            .settings-tabs .nav-link {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }

            .tab-content {
                padding: 1.5rem;
            }

            .tab-title {
                font-size: 1.5rem;
            }

            .form-section {
                padding: 1.5rem;
            }
        }

        /* تأثيرات تحميل
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        } */

        /* .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            border-top: 4px solid var(--gold-color);
            animation: spin 1s linear infinite;
        } */

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* تأثيرات النص */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* تحسينات إضافية */
        .password-strength .progress {
            height: 8px;
            border-radius: 4px;
            background: #e2e8f0;
        }

        .password-strength .progress-bar {
            transition: width 0.5s ease;
        }

        .session-item {
            border: 1px solid #e2e8f0;
            border-radius: var(--border-radius);
            padding: 1.25rem;
            margin-bottom: 1rem;
            background: #f8fafc;
            transition: var(--transition);
        }

        .session-item:hover {
            background: #f1f5f9;
            transform: translateX(5px);
        }

        .badge {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(13, 59, 102, 0.2);
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e2e8f0, transparent);
            margin: 2rem 0;
        }

        .profile-image-container {
            position: relative;
            display: inline-block;
        }

        .profile-image-container img {
            transition: var(--transition);
        }

        .profile-image-container:hover img {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* خاص بكلمة المرور  */
        .password-strength .progress {
            transition: width 0.3s ease;
        }

        .password-strength small {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <!-- تأثير التحميل
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loader"></div>
    </div> -->

    <!-- الإعدادات -->
    <section id="settings" class="content-section py-4">
        <div class="container">
            <!-- عناوين التبويبات  الإعدادات -->
            <div class="settings-tabs-container">
                <ul class="nav nav-tabs settings-tabs" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="user-tab" data-bs-toggle="tab"
                            data-bs-target="#user-settings" type="button" role="tab" aria-controls="user-settings"
                            aria-selected="true">
                            <i class="fas fa-user-cog"></i> الملف الشخصي
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab"
                            data-bs-target="#security-settings" type="button" role="tab"
                            aria-controls="security-settings" aria-selected="false">
                            <i class="fas fa-shield-alt"></i> الأمان
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notifications-tab" data-bs-toggle="tab"
                            data-bs-target="#notification-settings" type="button" role="tab"
                            aria-controls="notification-settings" aria-selected="false">
                            <i class="fas fa-bell"></i> الإشعارات
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="system-tab" data-bs-toggle="tab" data-bs-target="#system-settings"
                            type="button" role="tab" aria-controls="system-settings" aria-selected="false">
                            <i class="fas fa-cog"></i> النظام
                        </button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="advanced-tab" data-bs-toggle="tab" data-bs-target="#advanced-settings" type="button" role="tab" aria-controls="advanced-settings" aria-selected="false">
                                <i class="fas fa-sliders-h"></i> متقدمة
                            </button>
                        </li> --}}
                    <li class="nav-item" role="presentation" id="Backup_Database_btn" style="display:none;">
                        <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-settings"
                            type="button" role="tab" aria-controls="admin-settings" aria-selected="false">
                            <i class="fas fa-user-shield"></i> ادارة قاعدة البيانات
                        </button>
                    </li>
                </ul>
            </div>

            <!-- محتوى التبويبات -->
            <div class="tab-content" id="settingsTabContent">
                <!-- تبويب إعدادات المستخدم -->
                <div class="tab-pane fade show active" id="user-settings" role="tabpanel" aria-labelledby="user-tab">
                    <div class="tab-header">
                        <div class="tab-icon">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div>
                            <h2 class="tab-title">إعدادات الملف الشخصي</h2>
                            <p class="tab-subtitle">إدارة معلومات حسابك وتفضيلاتك الشخصية</p>
                        </div>
                    </div>

                    {{-- <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-id-card"></i>
                                المعلومات الشخصية
                            </h3>
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="profile-image-container mb-4">
                                        <img src="https://via.placeholder.com/150" class="img-thumbnail rounded-circle glow-effect" width="140" id="profileImage" style="border: 3px solid var(--primary-color);">
                                        <div class="mt-3">
                                            <input type="file" class="form-control" accept="image/*" id="profileImageUpload">
                                            <div class="form-text">الحد الأقصى 2MB - JPG, PNG, GIF</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-signature"></i>
                                                الاسم الكامل
                                            </label>
                                            <label class="form-label">
                                                <i class="fas fa-signature"></i>
                                                الاسم الكامل
                                            </label>
                                            <input type="text" class="form-control" id="fullName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-at"></i>
                                                اسم المستخدم
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text">@</span>
                                                <input type="text" class="form-control" value="mohamed" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-envelope"></i>
                                                البريد الإلكتروني
                                            </label>
                                            <input type="email" class="form-control" value="mohamed@example.com" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-phone"></i>
                                                رقم الهاتف
                                            </label>
                                            <input type="tel" class="form-control" value="+966501234567">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-id-card"></i>
                            المعلومات الشخصية
                        </h3>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="profile-image-container mb-4">
                                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='150' height='150'%3E%3Crect width='150' height='150' fill='%23ddd'/%3E%3Ctext x='50%25' y='50%25' text-anchor='middle' dy='.3em' fill='%23999' font-size='40'%3E👤%3C/text%3E%3C/svg%3E"
                                        ...>
                                    <div class="mt-3">
                                        <input type="file" class="form-control" accept="image/*"
                                            id="profileImageUpload">
                                        <div class="form-text">الحد الأقصى 2MB - JPG, PNG, GIF</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    {{-- يتغير عند استخدام الجلسة  --}}
                                    <input type="hidden" id="userId" value="1">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-signature"></i>
                                            الاسم الكامل
                                        </label>
                                        <input type="text" class="form-control" id="fullName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-at"></i>
                                            اسم المستخدم
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" id="username" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-envelope"></i>
                                            البريد الإلكتروني
                                        </label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">
                                            <i class="fas fa-phone"></i>
                                            رقم الهاتف
                                        </label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-key"></i>
                                إدارة كلمة المرور
                            </h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">كلمة المرور الحالية</label>
                                    <input type="password" class="form-control" placeholder="أدخل كلمة المرور الحالية">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control" placeholder="أدخل كلمة المرور الجديدة">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control" placeholder="أعد إدخال كلمة المرور">
                                </div>
                                <div class="col-md-6">
                                    <div class="password-strength mt-4">
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%;"></div>
                                        </div>
                                        <small class="text-muted">قوة كلمة المرور: ضعيفة</small>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    <!-- تغيير كلمة المرور -->
                    <div class="form-section mt-5">
                        <h3 class="section-title">
                            <i class="fas fa-key"></i>
                            تغيير كلمة المرور
                        </h3>

                        <form id="passwordForm">
                            @csrf
                            <input type="hidden" id="userId" value="1">

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label"><i class="fas fa-lock"></i> كلمة المرور الحالية</label>
                                    <input type="password" class="form-control" id="currentPassword"
                                        placeholder="أدخل كلمة المرور الحالية" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label"><i class="fas fa-shield-alt"></i> كلمة المرور
                                        الجديدة</label>
                                    <input type="password" class="form-control" id="newPassword"
                                        placeholder="أدخل كلمة المرور الجديدة" required>
                                    <div class="password-strength mt-2">
                                        <div class="progress" style="height: 6px;">
                                            <div id="passwordMeter" class="progress-bar bg-danger"
                                                style="width: 0%;"></div>
                                        </div>
                                        <small id="passwordLabel" class="text-muted">قوة كلمة المرور: غير محدد</small>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label"><i class="fas fa-check-double"></i> تأكيد كلمة
                                        المرور</label>
                                    <input type="password" class="form-control" id="confirmPassword"
                                        placeholder="أعد إدخال كلمة المرور الجديدة" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary px-4">
                                    <i class="fas fa-save"></i> تغيير كلمة المرور
                                </button>
                                <span id="passwordMsg" class="ms-2"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="button" id="saveProfileBtn" class="btn btn-primary px-5">
                            <i class="fas fa-save"></i> حفظ التغييرات
                        </button>
                        <span id="profileMsg" class="ms-2"></span>
                        <button type="button" class="btn btn-outline-danger" id="deleteAccountBtn">
                            <i class="fas fa-trash-alt me-2"></i>
                            حذف الحساب
                        </button>
                    </div>
                </div>

                <!-- تبويب إعدادات الأمان -->
                {{-- <div class="tab-pane fade" id="security-settings" role="tabpanel" aria-labelledby="security-tab">
                        <div class="tab-header">
                            <div class="tab-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h2 class="tab-title">إعدادات الأمان والخصوصية</h2>
                                <p class="tab-subtitle">إدارة أمان حسابك وإعدادات الخصوصية</p>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-lock"></i>
                                المصادقة الثنائية
                            </h3>
                            <div class="info-card">
                                <div class="info-card-header">
                                    <div class="info-card-icon">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <h4 class="info-card-title">المصادقة الثنائية (2FA)</h4>
                                </div>
                                <p>تفعيل المصادقة الثنائية يضيف طبقة إضافية من الحماية لحسابك</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="badge bg-success">مفعلة</span>
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-cog me-1"></i>
                                        إدارة الإعدادات
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-desktop"></i>
                                الجلسات النشطة
                            </h3>
                            <div class="session-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Chrome - Windows</strong>
                                        <p class="mb-1 text-muted">جدة، السعودية - 192.168.1.1</p>
                                        <small class="text-success">نشط الآن</small>
                                    </div>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-sign-out-alt me-1"></i>
                                        تسجيل الخروج
                                    </button>
                                </div>
                            </div>
                            <div class="session-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Safari - iPhone</strong>
                                        <p class="mb-1 text-muted">الرياض، السعودية - 192.168.1.2</p>
                                        <small class="text-muted">آخر نشاط: منذ يومين</small>
                                    </div>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-sign-out-alt me-1"></i>
                                        تسجيل الخروج
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-user-secret"></i>
                                إعدادات الخصوصية
                            </h3>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="activityLogging" checked>
                                <label class="form-check-label" for="activityLogging">تسجيل نشاط الحساب</label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="showPersonalInfo">
                                <label class="form-check-label" for="showPersonalInfo">إظهار المعلومات الشخصية في الملف العام</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="dataCollection" checked>
                                <label class="form-check-label" for="dataCollection">السماح بجمع البيانات لأغراض تحسين الخدمة</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            حفظ إعدادات الأمان
                        </button>
                    </div> --}}

                <!-- تبويب إعدادات الأمان -->
                <div class="tab-pane fade" id="security-settings" role="tabpanel" aria-labelledby="security-tab">
                    <div class="tab-header">
                        <div class="tab-icon"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <h2 class="tab-title">إعدادات الأمان والخصوصية</h2>
                            <p class="tab-subtitle">إدارة أمان حسابك وإعدادات الخصوصية</p>
                        </div>
                    </div>

                    <!-- ============= 2FA ============= -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-lock"></i> المصادقة الثنائية</h3>
                        <div class="info-card">
                            <div class="info-card-header">
                                <div class="info-card-icon"><i class="fas fa-mobile-alt"></i></div>
                                <h4 class="info-card-title">المصادقة الثنائية (2FA)</h4>
                            </div>
                            <p>تفعيل المصادقة الثنائية يضيف طبقة إضافية من الحماية لحسابك</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span id="2faStatus" class="badge bg-secondary">غير مفعّلة</span>
                                <button type="button" id="toggle2FA" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-cog me-1"></i> تفعيل
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ============= الجلسات النشطة ============= -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-desktop"></i> الجلسات النشطة</h3>
                        <div id="sessionsList">
                            <!-- يُملأ بالـ Ajax -->
                            <div class="text-center"><i class="fas fa-spinner fa-spin"></i> جارٍ التحميل...</div>
                        </div>
                    </div>

                    <!-- ============= خصوصية الحساب ============= -->
                    <div class="form-section">
                        <h3 class="section-title"><i class="fas fa-user-secret"></i> إعدادات الخصوصية</h3>
                        <div class="privacy-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>تسجيل نشاط الحساب</strong>
                                    <p class="mb-0 text-muted">سجل كل العمليات التي تتم على حسابك</p>
                                </div>
                                <label class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="activityLogging" checked>
                                </label>
                            </div>
                        </div>
                        <div class="privacy-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>إظهار المعلومات الشخصية في الملف العام</strong>
                                    <p class="mb-0 text-muted">السماح للآخرين برؤية اسمك وصورتك</p>
                                </div>
                                <label class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="showPersonalInfo">
                                </label>
                            </div>
                        </div>
                        <div class="privacy-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>السماح بجمع البيانات لأغراض تحسين الخدمة</strong>
                                    <p class="mb-0 text-muted">نستخدم هذه البيانات لتحسين تجربتك فقط</p>
                                </div>
                                <label class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="dataCollection" checked>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- ============= زر الحفظ ============= -->
                    <div class="text-center mt-4">
                        <button type="button" id="saveSecurityBtn" class="btn btn-primary px-5">
                            <i class="fas fa-save me-2"></i> حفظ إعدادات الأمان
                        </button>
                        <span id="securityMsg" class="ms-2"></span>
                    </div>
                </div>

                <!-- تبويب إعدادات الإشعارات -->
                <div class="tab-pane fade" id="notification-settings" role="tabpanel"
                    aria-labelledby="notifications-tab">
                    <div class="tab-header">
                        <div class="tab-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div>
                            <h2 class="tab-title">إعدادات الإشعارات</h2>
                            <p class="tab-subtitle">إدارة تفضيلات الإشعارات والتنبيهات</p>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-broadcast-tower"></i>
                            قنوات الإشعارات
                        </h3>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                            <label class="form-check-label" for="emailNotifications">البريد الإلكتروني</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="smsNotifications">
                            <label class="form-check-label" for="smsNotifications">رسائل SMS</label>
                            <small class="text-muted d-block">قد يتم تطبيق رسوم إضافية من مزود الخدمة</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                            <label class="form-check-label" for="pushNotifications">إشعارات التطبيق</label>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-envelope-open"></i>
                            أنواع الإشعارات
                        </h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="newRequestNotification"
                                        checked>
                                    <label class="form-check-label" for="newRequestNotification">طلبات جديدة</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="assignedRequestNotification"
                                        checked>
                                    <label class="form-check-label" for="assignedRequestNotification">طلبات
                                        مسندة</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="statusChangeNotification"
                                        checked>
                                    <label class="form-check-label" for="statusChangeNotification">تغيير حالة
                                        الطلب</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="commentNotification" checked>
                                    <label class="form-check-label" for="commentNotification">تعليقات جديدة</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="deadlineNotification"
                                        checked>
                                    <label class="form-check-label" for="deadlineNotification">اقتراب موعد
                                        التسليم</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="systemUpdatesNotification"
                                        checked>
                                    <label class="form-check-label" for="systemUpdatesNotification">تحديثات
                                        النظام</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-clock"></i>
                            توقيت الإشعارات
                        </h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">وقت البدء</label>
                                <input type="time" class="form-control" value="08:00">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">وقت الانتهاء</label>
                                <input type="time" class="form-control" value="20:00">
                            </div>
                        </div>
                        <small class="text-muted">لن تتلقى إشعارات خارج هذه الأوقات إلا في الحالات العاجلة</small>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        حفظ إعدادات الإشعارات
                    </button>
                </div>

                <!-- تبويب إعدادات النظام -->
                <div class="tab-pane fade" id="system-settings" role="tabpanel" aria-labelledby="system-tab">
                    <div class="tab-header">
                        <div class="tab-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div>
                            <h2 class="tab-title">إعدادات النظام</h2>
                            <p class="tab-subtitle">تخصيص تجربة استخدام النظام</p>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-palette"></i>
                            المظهر والواجهة
                        </h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">المظهر</label>
                                <select class="form-select">
                                    <option selected>فاتح</option>
                                    <option>غامق</option>
                                    <option>تلقائي (حسب النظام)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">لون السمة</label>
                                <select class="form-select">
                                    <option selected>أزرق حكومي</option>
                                    <option>أخضر</option>
                                    <option>بنفسجي</option>
                                    <option>برتقالي</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-language"></i>
                            اللغة والمنطقة
                        </h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">اللغة</label>
                                <select class="form-select">
                                    <option selected>العربية</option>
                                    <option>الإنجليزية</option>
                                    <option>الفرنسية</option>
                                    <option>الألمانية</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">المنطقة الزمنية</label>
                                <select class="form-select">
                                    <option selected>الرياض (UTC+3)</option>
                                    <option>مكة المكرمة (UTC+3)</option>
                                    <option>دبي (UTC+4)</option>
                                    <option>القاهرة (UTC+2)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-calendar-alt"></i>
                            تنسيق التاريخ والوقت
                        </h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">تنسيق التاريخ</label>
                                <select class="form-select">
                                    <option selected>DD/MM/YYYY</option>
                                    <option>MM/DD/YYYY</option>
                                    <option>YYYY-MM-DD</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">تنسيق الوقت</label>
                                <select class="form-select">
                                    <option selected>24 ساعة</option>
                                    <option>12 ساعة</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        حفظ إعدادات النظام
                    </button>
                </div>

                {{-- <!-- تبويب الإعدادات المتقدمة -->
                    <div class="tab-pane fade" id="advanced-settings" role="tabpanel" aria-labelledby="advanced-tab">
                        <div class="tab-header">
                            <div class="tab-icon">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            <div>
                                <h2 class="tab-title">الإعدادات المتقدمة</h2>
                                <p class="tab-subtitle">خيارات متقدمة لمستخدمي النظام المحترفين</p>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-tachometer-alt"></i>
                                أداء النظام
                            </h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">حدود عرض البيانات</label>
                                    <select class="form-select">
                                        <option selected>25 عنصر في الصفحة</option>
                                        <option>50 عنصر في الصفحة</option>
                                        <option>100 عنصر في الصفحة</option>
                                        <option>جميع العناصر</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">سياسة التخزين المؤقت</label>
                                    <select class="form-select">
                                        <option selected>تلقائي (موصى به)</option>
                                        <option>أقل تخزين مؤقت</option>
                                        <option>أقصى تخزين مؤقت</option>
                                        <option>لا تخزين مؤقت</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-database"></i>
                                إدارة البيانات
                            </h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">جودة الوسائط</label>
                                    <select class="form-select">
                                        <option selected>تلقائي (حسب الاتصال)</option>
                                        <option>عالية (موصى به للاتصال السريع)</option>
                                        <option>متوسطة</option>
                                        <option>منخفضة (للاتصال البطيء)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">مدة حفظ البيانات</label>
                                    <select class="form-select">
                                        <option selected>30 يوم</option>
                                        <option>90 يوم</option>
                                        <option>180 يوم</option>
                                        <option>365 يوم</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-code"></i>
                                وضع المطور
                            </h3>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="developerMode">
                                <label class="form-check-label" for="developerMode">تفعيل وضع المطور</label>
                            </div>
                            <div id="developerOptions" style="display: none;">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="enableDebugging">
                                    <label class="form-check-label" for="enableDebugging">تمكين تصحيح الأخطاء</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="showLogs">
                                    <label class="form-check-label" for="showLogs">إظهار سجلات النظام</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="disableCache">
                                    <label class="form-check-label" for="disableCache">تعطيل التخزين المؤقت</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                حفظ الإعدادات
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="resetSettingsBtn">
                                <i class="fas fa-undo me-2"></i>
                                إعادة التعيين
                            </button>
                        </div>
                    </div> --}}

                <div id="Backup_Database" style="display:none;">


                    <!-- تبويب إعدادات المشرف -->
                    <div class="tab-pane fade" id="admin-settings" role="tabpanel" aria-labelledby="admin-tab">
                        <div class="tab-header">
                            <div class="tab-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div>
                                <h2 class="tab-title">إعدادات المشرف</h2>
                                <p class="tab-subtitle">إعدادات متقدمة لمديري النظام</p>
                            </div>
                        </div>

                        <div class="">
                            <div class="container">
                                <h2 class="mb-4">إدارة قاعدة البيانات</h2>

                                <div id="db-alert"></div>

                                <div class="card p-4 mb-3 shadow-sm">
                                    <h4 class="mb-3">إنشاء نسخة احتياطية</h4>
                                    <button id="backupBtn" class="btn btn-primary">
                                        <i class="bi bi-download"></i> عمل Backup
                                    </button>
                                </div>

                                <div class="card p-4 shadow-sm">
                                    <h4 class="mb-3">استعادة نسخة احتياطية</h4>
                                    <form id="restoreForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="backup_file" class="form-control mb-2" required>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-upload"></i> استعادة Backup
                                        </button>
                                    </form>
                                </div>
                            </div>

                            {{-- تبع النسخ الاحتياطية --}}
                            <script>
                                $(document).ready(function() {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    // Backup
                                    $('#backupBtn').click(function() {
                                        $.ajax({
                                            url: "{{ route('database.backup') }}",
                                            method: "POST",
                                            xhrFields: {
                                                responseType: 'blob'
                                            },
                                            data: {
                                                _token: "{{ csrf_token() }}"
                                            },
                                            success: function(data, status, xhr) {
                                                // استخراج اسم الملف من header
                                                let filename = "backup.sql";
                                                const disposition = xhr.getResponseHeader('Content-Disposition');
                                                if (disposition && disposition.indexOf('filename=') !== -1) {
                                                    filename = disposition.split('filename=')[1].replace(/"/g, '');
                                                }

                                                // إنشاء رابط مؤقت لتحميل الملف
                                                const url = window.URL.createObjectURL(data);
                                                const a = document.createElement('a');
                                                a.href = url;
                                                a.download = filename;
                                                document.body.appendChild(a);
                                                a.click();
                                                a.remove();
                                                window.URL.revokeObjectURL(url);

                                                $('#db-alert').html(
                                                    `<div class="alert alert-success">✅ تم إنشاء النسخة وتحميلها على جهازك</div>`
                                                    );
                                            },
                                            error: function() {
                                                $('#db-alert').html(
                                                    `<div class="alert alert-danger">❌ خطأ أثناء النسخ الاحتياطي</div>`
                                                    );
                                            }
                                        });
                                    });

                                    // Restore
                                    $('#restoreForm').submit(function(e) {
                                        e.preventDefault();
                                        let formData = new FormData(this);

                                        // تحقق من أن الملف محدد قبل الإرسال
                                        const fileInput = $('input[name="backup_file"]')[0];
                                        if (!fileInput.files.length) {
                                            $('#db-alert').html(
                                                `<div class="alert alert-warning">⚠️ الرجاء اختيار ملف النسخة الاحتياطية</div>`);
                                            return;
                                        }

                                        $.ajax({
                                            url: "{{ route('database.recover') }}",
                                            method: "POST",
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            dataType: 'json', // مهم لتفسير الاستجابة كـ JSON
                                            success: function(res) {
                                                if (res.status === 'success') {
                                                    $('#db-alert').html(
                                                        `<div class="alert alert-success">♻️ ${res.message}</div>`);
                                                } else {
                                                    $('#db-alert').html(
                                                        `<div class="alert alert-danger">❌ ${res.message}</div>`);
                                                    console.log('Response error:', res);
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                let msg = '❌ خطأ أثناء الاستعادة';

                                                // حاول قراءة رسالة الخطأ من السيرفر
                                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                                    msg += ': ' + xhr.responseJSON.message;
                                                } else if (xhr.responseText) {
                                                    msg += ': ' + xhr.responseText;
                                                }

                                                $('#db-alert').html(`<div class="alert alert-danger">${msg}</div>`);
                                                console.error('AJAX error:', status, error, xhr);
                                            }
                                        });
                                    });

                                });
                            </script>



                        </div>
                        {{--
                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-users"></i>
                                إدارة المستخدمين
                            </h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">الحد الأقصى للمستخدمين</label>
                                    <input type="number" class="form-control" value="500" min="1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">حجم التخزين</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" value="100" min="1">
                                        <span class="input-group-text">GB</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-database"></i>
                                النسخ الاحتياطي
                            </h3>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">تكرار النسخ الاحتياطي</label>
                                    <select class="form-select">
                                        <option selected>يومي</option>
                                        <option>أسبوعي</option>
                                        <option>شهري</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">الاحتفاظ بالنسخ</label>
                                    <select class="form-select">
                                        <option selected>7 أيام</option>
                                        <option>14 يوم</option>
                                        <option>30 يوم</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">
                                <i class="fas fa-tools"></i>
                                وضع الصيانة
                            </h3>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="maintenanceMode">
                                <label class="form-check-label" for="maintenanceMode">تفعيل وضع الصيانة</label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">رسالة الصيانة</label>
                                <textarea class="form-control" rows="3">نظامنا قيد الصيانة حالياً. نعتذر للإزعاج وسنعود قريباً.</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">وقت الصيانة</label>
                                <input type="datetime-local" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-save me-2"></i>
                            حفظ إعدادات المشرف
                        </button> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- نموذج تأكيد حذف الحساب -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">تأكيد حذف الحساب</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <p class="text-center">هل أنت متأكد من رغبتك في حذف حسابك بشكل دائم؟ هذه العملية لا يمكن التراجع
                        عنها.</p>
                    <p class="text-center text-muted">سيتم حذف جميع بياناتك الشخصية والمحتوى المرتبط بحسابك.</p>
                    <div class="mb-3">
                        <label class="form-label">أدخل كلمة المرور للتأكيد:</label>
                        <input type="password" class="form-control" placeholder="أدخل كلمة المرور الحالية">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-danger">حذف الحساب بشكل دائم</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('user.permissions.backup') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.permissions && response.permissions.length > 0) {
                        response.permissions.forEach(function(permission) {
                            // if(permission.permission_key === "create_license_request"){
                            //     $("#btn-create-license").show();
                            // }
                            // if(permission.permission_key === "edit_license_request"){
                            //     $("#btn-edit-license").show();
                            // }
                            // if(permission.permission_key === "delete_license_request"){
                            //     $("#btn-delete-license").show();
                            // }
                            // if(permission.permission_key === "manage_users"){
                            //     $("#menu-manage-users").show();
                            // }
                            // if(permission.permission_key === "generate_reports"){
                            //     $("#menu-reports").show();
                            // }

                            if (permission.permission_key === "Backup_Database") {
                                $("#Backup_Database").show();
                                $("#Backup_Database_btn").show();
                            }
                        });
                    }
                },
                error: function(xhr) {
                    console.error("خطأ في جلب الصلاحيات:", xhr);
                }
            });
        });
    </script>
    {{-- //////////////////////////////////////////////////////////////// --}}
    <script>
        $(function() {
            loadProfile(); // استدعاء البيانات عند التحميل

            // حفظ التعديلات
            $('#saveProfileBtn').on('click', function() {
                const btn = $(this);
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> جارٍ الحفظ...');

                $.ajax({
                    url: '/employee-settings/profile/update',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: $('#userId').val(),
                        name: $('#fullName').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val()
                    },
                    success: res => {
                        $('#profileMsg').html(
                            '<span class="text-success"><i class="fas fa-check-circle"></i> ' +
                            res.message + '</span>');
                        loadProfile(); // إعادة تحميل البيانات
                    },
                    error: xhr => {
                        const msg = xhr.responseJSON?.message || 'حدث خطأ غير متوقع';
                        $('#profileMsg').html(
                            '<span class="text-danger"><i class="fas fa-exclamation-circle"></i> ' +
                            msg + '</span>');
                    },
                    complete: () => btn.prop('disabled', false).html(
                        '<i class="fas fa-save"></i> حفظ التغييرات')
                });
            });

            // استدعاء البيانات
            // function loadProfile() {
            //     $.get('/employee-settings/profile/' + $('#userId').val(), res => {
            //         if (res.success) {
            //             const u = res.user;
            //             $('#fullName').val(u.name);
            //             $('#username').val(u.username);
            //             $('#email').val(u.email);
            //             $('#phone').val(u.phone);
            //         }
            //     });
            // }
            function loadProfile() {
                const id = $('#userId').val();
                console.log('Fetching profile for user:', id);

                $.get('/employee-settings/profile/' + id, res => {
                    console.log('Response:', res);

                    if (res.success && res.user) {
                        const u = res.user;
                        $('#fullName').val(u.name);
                        $('#username').val(u.username);
                        $('#email').val(u.email);
                        $('#phone').val(u.phone);
                    } else {
                        alert(res.message || 'المستخدم غير موجود');
                    }
                }).fail(xhr => {
                    console.error('Ajax fail:', xhr.responseText);
                });
            }
        });
    </script>
    <script>
        /* === تغيير كلمة المرور === */
        $('#passwordForm').on('submit', function(e) {
            e.preventDefault();
            const btn = $(this).find('button[type="submit"]');
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> جارٍ التغيير...');

            $.ajax({
                url: '/employee-settings/password/change',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: $('#userId').val(),
                    current_password: $('#currentPassword').val(),
                    new_password: $('#newPassword').val(),
                    new_password_confirmation: $('#confirmPassword').val()
                },
                success: res => {
                    $('#passwordMsg').html(
                        '<span class="text-success"><i class="fas fa-check-circle"></i> ' + res
                        .message + '</span>');
                    $('#passwordForm')[0].reset(); // مسح الحقول
                    resetMeter(); // إعادة شريط القوة
                },
                error: xhr => {
                    const msg = xhr.responseJSON?.message || 'حدث خطأ غير متوقع';
                    $('#passwordMsg').html(
                        '<span class="text-danger"><i class="fas fa-exclamation-circle"></i> ' +
                        msg + '</span>');
                },
                complete: () => btn.prop('disabled', false).html(
                    '<i class="fas fa-save"></i> تغيير كلمة المرور')
            });
        });

        /* === حساب قوة كلمة المرور === */
        $('#newPassword').on('input', function() {
            const pwd = $(this).val();
            let strength = 0;

            if (pwd.length >= 8) strength += 25;
            if (/[a-z]/.test(pwd) && /[A-Z]/.test(pwd)) strength += 25;
            if (/\d/.test(pwd)) strength += 15;
            if (/[^A-Za-z0-9]/.test(pwd)) strength += 10;

            const meter = $('#passwordMeter');
            const label = $('#passwordLabel');
            meter.removeClass('bg-danger bg-warning bg-info bg-success');

            if (strength < 50) {
                meter.addClass('bg-danger').css('width', strength + '%');
                label.text('قوة كلمة المرور: ضعيفة');
            } else if (strength < 75) {
                meter.addClass('bg-warning').css('width', strength + '%');
                label.text('قوة كلمة المرور: متوسطة');
            } else if (strength < 100) {
                meter.addClass('bg-info').css('width', strength + '%');
                label.text('قوة كلمة المرور: جيدة');
            } else {
                meter.addClass('bg-success').css('width', '100%');
                label.text('قوة كلمة المرور: قوية');
            }
        });

        function resetMeter() {
            $('#passwordMeter').removeClass('bg-danger bg-warning bg-info bg-success').css('width', '0%');
            $('#passwordLabel').text('قوة كلمة المرور: غير محدد');
        }


        /* ========== الأمان والخصوصية ========== */
        $(function() {
            loadSecurity(); // تحميل البيانات عند فتح التبويب
        });

        function loadSecurity() {
            $.get('/employee-settings/security/' + $('#userId').val(), res => {
                if (res.success) {
                    // 2FA
                    const isEnabled = res.user.two_factor_enabled_at !== null;
                    $('#2faStatus').text(isEnabled ? 'مفعّلة' : 'غير مفعّلة')
                        .toggleClass('bg-success bg-secondary', isEnabled);
                    $('#toggle2FA').text(isEnabled ? 'تعطيل' : 'تفعيل')
                        .toggleClass('btn-outline-danger btn-outline-primary', isEnabled);

                    // الجلسات
                    let html = '';
                    res.sessions.forEach(s => html += sessionRow(s));
                    $('#sessionsList').html(html || '<div class="alert alert-info">لا توجد جلسات نشطة</div>');

                    // خصوصية (مؤقتًا ثابتة حتى نقوم بربطها لاحقًا)
                    $('#activityLogging').prop('checked', true);
                    $('#showPersonalInfo').prop('checked', false);
                    $('#dataCollection').prop('checked', true);
                }
            });
        }

        function sessionRow(s) {
            return `
                    <div class="session-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>${s.device_info || 'جهاز غير معروف'}</strong>
                                <p class="mb-1 text-muted">${s.ip_address} - آخر نشاط: ${new Date(s.last_activity).toLocaleString('ar-SA')}</p>
                                <small class="${s.is_current ? 'text-success' : 'text-muted'}">${s.is_current ? 'الجهاز الحالي' : 'نشط منذ قليل'}</small>
                            </div>
                            ${!s.is_current ? `<button class="btn btn-outline-danger btn-sm logout-session" data-session="${s.id}"><i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج</button>` : ''}
                        </div>
                    </div>
                `;
        }

        /* ===== تفعيل/تعطيل 2FA ===== */
        $('#toggle2FA').click(function() {
            const btn = $(this);
            const enable = btn.text() === 'تفعيل';
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');

            $.ajax({
                url: enable ? '/employee-settings/2fa/enable' : '/employee-settings/2fa/disable',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: $('#userId').val()
                },
                success: res => {
                    alert(res.message);
                    loadSecurity(); // تحديث الحالة
                },
                error: xhr => alert(xhr.responseJSON?.message || 'حدث خطأ'),
                complete: () => btn.prop('disabled', false)
            });
        });

        /* ===== تسجيل الخروج من جهاز معين ===== */
        $(document).on('click', '.logout-session', function() {
            const sessionId = $(this).data('session');
            if (!confirm('تسجيل الخروج من هذا الجهاز؟')) return;

            $.ajax({
                url: '/employee-settings/logout-device',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    session_id: sessionId
                },
                success: res => {
                    alert(res.message);
                    loadSecurity(); // إعادة تحميل القائمة
                },
                error: xhr => alert(xhr.responseJSON?.message || 'حدث خطأ')
            });
        });

        /* ===== حفظ إعدادات الخصوصية (مؤقتًا ثابتة حتى نقوم بربطها لاحقًا) ===== */
        $('#saveSecurityBtn').click(function() {
            const btn = $(this);
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> جارٍ الحفظ...');

            // يمكنك لاحقًا إرسال القيم إلى Backend
            setTimeout(() => {
                $('#securityMsg').html(
                    '<span class="text-success"><i class="fas fa-check-circle"></i> تم الحفظ بنجاح</span>'
                    );
                btn.prop('disabled', false).html('<i class="fas fa-save me-2"></i> حفظ إعدادات الأمان');
            }, 600);
        });
    </script>



    {{-- //////////////////////////////////////////////////////////////// --}}





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // إخفاء شاشة التحميل
            setTimeout(() => {
                document.getElementById('loadingOverlay').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loadingOverlay').style.display = 'none';
                }, 500);
            }, 1500);

            // تبديل خيارات المطور
            const developerMode = document.getElementById('developerMode');
            if (developerMode) {
                developerMode.addEventListener('change', function() {
                    document.getElementById('developerOptions').style.display = this.checked ? 'block' :
                        'none';
                });
            }

            // فتح نموذج حذف الحساب
            const deleteAccountBtn = document.getElementById('deleteAccountBtn');
            if (deleteAccountBtn) {
                deleteAccountBtn.addEventListener('click', function() {
                    var modal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
                    modal.show();
                });
            }

            // معاينة صورة الملف الشخصي
            const profileImageUpload = document.getElementById('profileImageUpload');
            if (profileImageUpload) {
                profileImageUpload.addEventListener('change', function(e) {
                    if (e.target.files && e.target.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.getElementById('profileImage');
                            img.setAttribute('src', e.target.result);
                            img.classList.add('glow-effect');
                            setTimeout(() => {
                                img.classList.remove('glow-effect');
                            }, 2000);
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            }

            // تأثيرات عند التمرير
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // مراقبة العناصر لإضافة تأثيرات الظهور
            document.querySelectorAll('.form-section').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(section);
            });

            // تأثيرات التبويبات
            const tabButtons = document.querySelectorAll('.nav-link');
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    tabButtons.forEach(btn => btn.classList.remove('glow-effect'));
                    this.classList.add('glow-effect');
                    setTimeout(() => {
                        this.classList.remove('glow-effect');
                    }, 2000);
                });
            });

            // إعادة تعيين الإعدادات
            const resetSettingsBtn = document.getElementById('resetSettingsBtn');
            if (resetSettingsBtn) {
                resetSettingsBtn.addEventListener('click', function() {
                    if (confirm(
                        'هل أنت متأكد من رغبتك في إعادة تعيين جميع الإعدادات إلى القيم الافتراضية؟')) {
                        // كود إعادة التعيين هنا
                        alert('تم إعادة تعيين الإعدادات بنجاح');
                    }
                });
            }
        });
    </script>
</body>

</html>
