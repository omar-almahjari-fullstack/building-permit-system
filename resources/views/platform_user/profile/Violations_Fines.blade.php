<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المخالفات والغرامات | بوابة بلدي</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            padding: 15px;
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
            color: var(--primary-color);
            font-size: 1.6rem;
        }

        /* تبويبات الملف الشخصي */
        .profile-tabs {
            display: flex;
            background: rgba(0, 97, 94, 0.05);
            border-radius: 10px;
            padding: 5px;
            margin-bottom: 25px;
            overflow-x: auto;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .profile-tab {
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
        }

        .profile-tab::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 3px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .profile-tab.active {
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            color: var(--primary-color);
            font-weight: bold;
        }

        .profile-tab.active::before {
            width: 100%;
        }

        /* تلوين خلفية التبويبات الرئيسية */
        .profile-tab:hover:not(.active) {
            background: rgba(0, 97, 94, 0.1);
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

        /* صفحة المخالفات والغرامات */
        .violation-card {
            border-left: 4px solid #e74c3c;
            border-radius: 0 8px 8px 0;
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .violation-card:hover {
            transform: translateX(-5px);
        }

        .violation-card.paid {
            border-left-color: #27ae60;
        }

        .violation-card.appealed {
            border-left-color: #3498db;
        }

        .violation-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .violation-title {
            font-weight: bold;
            color: var(--text-color);
        }

        .violation-amount {
            font-weight: bold;
            color: #e74c3c;
        }

        .violation-card.paid .violation-amount {
            color: #27ae60;
        }

        .violation-card.appealed .violation-amount {
            color: #3498db;
        }

        .violation-details {
            color: var(--light-text);
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .violation-details p {
            margin-bottom: 5px;
        }

        .violation-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
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
            border: none;
        }

        .pay-btn {
            background: rgba(0, 97, 94, 0.1);
            color: var(--primary-color);
        }

        .pay-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .appeal-btn {
            background: rgba(243, 156, 18, 0.1);
            color: #f39c12;
        }

        .appeal-btn:hover {
            background: #f39c12;
            color: white;
        }

        .view-btn {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .view-btn:hover {
            background: #3498db;
            color: white;
        }
        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 1200px) {
          .main-container {
            margin-right: 0px;
            margin-left: 0px;
          }
        }
        @media (max-width: 768px) {
            .profile-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 10px;
            }

            .profile-tab {
                min-width: auto;
                padding: 10px 15px;
                font-size: 0.85rem;
            }

            .violation-header {
                flex-direction: column;
                gap: 10px;
            }

            .violation-actions {
                flex-wrap: wrap;
                justify-content: center;
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
        
        .no-violations {
            text-align: center;
            padding: 40px 20px;
            color: var(--light-text);
        }
        
        .no-violations i {
            font-size: 48px;
            margin-bottom: 20px;
            color: #3498db;
        }
        
        .stats-card {
            display: flex;
            justify-content: space-around;
            text-align: center;
            padding: 20px;
            margin-bottom: 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .stat-item {
            padding: 10px;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .stat-label {
            color: var(--light-text);
        }
        
        /* Modal styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-content {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateY(50px);
            transition: transform 0.4s ease;
        }
        
        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }
        
        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-header h2 {
            color: var(--primary-color);
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #777;
            transition: color 0.3s;
        }
        
        .modal-close:hover {
            color: var(--danger);
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload-label {
            display: block;
            padding: 12px 15px;
            background: rgba(0, 97, 94, 0.05);
            border: 1px dashed #ddd;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload-label:hover {
            background: rgba(0, 97, 94, 0.1);
        }
        
        .file-upload-label i {
            margin-left: 8px;
            color: var(--primary-color);
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .modal-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            text-align: left;
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
        }
        
        .btn-primary {
            background: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background: #004d4b;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 97, 94, 0.3);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid #ddd;
            color: var(--text-color);
        }
        
        .btn-outline:hover {
            background: #f5f5f5;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .appeal-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
        }
        
        .status-pending {
            background: rgba(243, 156, 18, 0.1);
            color: #f39c12;
        }
        
        .status-approved {
            background: rgba(39, 174, 96, 0.1);
            color: #27ae60;
        }
        
        .status-rejected {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }


        /* تحسينات إضافية */
        .violation-card .status-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-top: 5px;
        }
        
        .status-unpaid {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }
        
        .status-appealed {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }
        
        .status-paid {
            background: rgba(39, 174, 96, 0.1);
            color: #27ae60;
        }
        
        .status-pending {
            background: rgba(243, 156, 18, 0.1);
            color: #f39c12;
        }
        
        .violation-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 10px;
        }
        
        .detail-item {
            margin-bottom: 8px;
        }
        
        .detail-label {
            font-weight: 500;
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .detail-value {
            font-weight: 500;
        }
        
        .violation-card .actions-flex {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .action-btn-sm {
            padding: 6px 12px;
            font-size: 0.85rem;
        }
        
        .modal-footer {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <!-- الحاوية الرئيسية للمحتوى -->
    <div class="main-container">
        <div class="profile-header">
            <h1>المخالفات والغرامات</h1>
        </div>

        <!-- تبويبات المخالفات -->
        <div class="profile-tabs">
            <a href="#" class="profile-tab  active" data-tab="overview">نظرة عامة</a>
            <a href="#" class="profile-tab" data-tab="active">المخالفات النشطة</a>
            <a href="#" class="profile-tab" data-tab="paid">المخالفات المسددة</a>
            <a href="#" class="profile-tab" data-tab="appeals">الاعتراضات</a>
        </div>
        
        <!-- إحصائيات المخالفات -->
        <div class="stats-card">
            <div class="stat-item">
                <div class="stat-value">3</div>
                <div class="stat-label">مخالفات نشطة</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">5,000 ر.ي</div>
                <div class="stat-label">مجموع الغرامات</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">2</div>
                <div class="stat-label">اعتراضات قيد المراجعة</div>
            </div>
        </div>

        <!-- محتوى التبويبات -->
        <div id="overview" class="tab-content active">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>نظرة عامة على المخالفات</h2>
                </div>
                
                <div class="violation-card">
                    <div class="violation-header">
                        <div class="violation-title">مخالفة بناء بدون ترخيص</div>
                        <div class="violation-amount">5,000 ر.ي</div>
                    </div>

                    <div class="violation-details">
                        <div class="violation-details-grid">
                            <div class="detail-item">
                                <div class="detail-label">رقم المخالفة</div>
                                <div class="detail-value">VB-2024-00578</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ المخالفة</div>
                                <div class="detail-value">12/03/2024</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">الموقع</div>
                                <div class="detail-value">حي التحرير، صنعاء</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">الحالة</div>
                                <div class="status-badge status-unpaid">غير مسددة</div>
                            </div>
                        </div>
                    </div>

                    <div class="violation-actions">
                        <div class="actions-flex">
                            <button class="action-btn pay-btn action-btn-sm">
                                <i class="fas fa-credit-card"></i> دفع المخالفة
                            </button>
                            <button class="action-btn appeal-btn action-btn-sm" onclick="openAppealModal()">
                                <i class="fas fa-gavel"></i> تقديم اعتراض
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="violation-card appealed">
                    <div class="violation-header">
                        <div class="violation-title">مخالفة تعديل بدون تصريح</div>
                        <div class="violation-amount">3,500 ر.ي</div>
                    </div>

                    <div class="violation-details">
                        <div class="violation-details-grid">
                            <div class="detail-item">
                                <div class="detail-label">رقم المخالفة</div>
                                <div class="detail-value">VM-2024-00231</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ المخالفة</div>
                                <div class="detail-value">28/02/2024</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">الموقع</div>
                                <div class="detail-value"> حي السبعين، صنعاء</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">حالة الاعتراض</div>
                                <div class="status-badge status-pending">تحت المراجعة</div>
                            </div>
                        </div>
                    </div>

                    <div class="violation-actions">
                        <div class="actions-flex">
                            <button class="action-btn view-btn action-btn-sm">
                                <i class="fas fa-eye"></i> تفاصيل الاعتراض
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="active" class="tab-content">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>المخالفات النشطة</h2>
                    <button class="action-btn" onclick="openAppealModal()">
                        <i class="fas fa-file-alt"></i> تقديم اعتراض
                    </button>
                </div>
                
                <div class="violation-card">
                    <div class="violation-header">
                        <div class="violation-title">مخالفة بناء بدون ترخيص</div>
                        <div class="violation-amount">5,000 ر.ي</div>
                    </div>

                    <div class="violation-details">
                        <div class="violation-details-grid">
                            <div class="detail-item">
                                <div class="detail-label">رقم المخالفة</div>
                                <div class="detail-value">VB-2024-00578</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ المخالفة</div>
                                <div class="detail-value">12/03/2024</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">الموقع</div>
                                <div class="detail-value">حي التحرير، صنعاء</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ الاستحقاق</div>
                                <div class="detail-value">12/05/2024</div>
                            </div>
                        </div>
                    </div>

                    <div class="violation-actions">
                        <div class="actions-flex">
                            <button class="action-btn pay-btn action-btn-sm">
                                <i class="fas fa-credit-card"></i> دفع المخالفة
                            </button>
                            <button class="action-btn appeal-btn action-btn-sm" onclick="openAppealModal()">
                                <i class="fas fa-gavel"></i> تقديم اعتراض
                            </button>
                            <button class="action-btn action-btn-sm">
                                <i class="fas fa-download"></i> تحميل المستندات
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="paid" class="tab-content">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>المخالفات المسددة</h2>
                </div>
                
                <div class="violation-card paid">
                    <div class="violation-header">
                        <div class="violation-title">مخالفة عدم تجديد رخصة</div>
                        <div class="violation-amount">2,000 ر.ي</div>
                    </div>

                    <div class="violation-details">
                        <div class="violation-details-grid">
                            <div class="detail-item">
                                <div class="detail-label">رقم المخالفة</div>
                                <div class="detail-value">VL-2024-00145</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ المخالفة</div>
                                <div class="detail-value">15/01/2024</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">الموقع</div>
                                <div class="detail-value">حي الصافية، الحديدة</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ الدفع</div>
                                <div class="detail-value">05/03/2024</div>
                            </div>
                        </div>
                    </div>

                    <div class="violation-actions">
                        <div class="actions-flex">
                            <button class="action-btn view-btn action-btn-sm">
                                <i class="fas fa-eye"></i> عرض الإيصال
                            </button>
                            <button class="action-btn action-btn-sm">
                                <i class="fas fa-download"></i> تحميل
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="no-violations">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <h3>لا توجد مخالفات مسددة أخرى</h3>
                    <p>جميع المخالفات المسددة تظهر هنا</p>
                </div>
            </div>
        </div>
        
        <div id="appeals" class="tab-content">
            <div class="profile-card">
                <div class="profile-card-header">
                    <h2>الاعتراضات المقدمة</h2>
                    <button class="action-btn" onclick="openAppealModal()">
                        <i class="fas fa-plus"></i> تقديم اعتراض جديد
                    </button>
                </div>
                
                <div class="violation-card appealed">
                    <div class="violation-header">
                        <div class="violation-title">مخالفة تعديل بدون تصريح</div>
                        <div class="violation-amount">3,500 ر.ي</div>
                    </div>

                    <div class="violation-details">
                        <div class="violation-details-grid">
                            <div class="detail-item">
                                <div class="detail-label">رقم المخالفة</div>
                                <div class="detail-value">VM-2024-00231</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ المخالفة</div>
                                <div class="detail-value">28/02/2024</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">تاريخ الاعتراض</div>
                                <div class="detail-value">05/03/2024</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">حالة الاعتراض</div>
                                <div class="status-badge status-pending">تحت المراجعة</div>
                            </div>
                        </div>
                    </div>

                    <div class="violation-actions">
                        <div class="actions-flex">
                            <button class="action-btn view-btn action-btn-sm">
                                <i class="fas fa-eye"></i> تفاصيل الاعتراض
                            </button>
                            <button class="action-btn action-btn-sm">
                                <i class="fas fa-download"></i> تحميل المستندات
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal for Appeal Submission -->
    <div class="modal-overlay" id="appealModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>تقديم اعتراض على مخالفة</h2>
                <button class="modal-close" onclick="closeAppealModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="form-group">
                    <label for="violationSelect">اختر المخالفة</label>
                    <select class="form-control" id="violationSelect">
                        <option value="">-- اختر المخالفة --</option>
                        <option value="VB-2024-00578">VB-2024-00578 - مخالفة بناء بدون ترخيص</option>
                        <option value="VS-2024-00321">VS-2024-00321 - مخالفة عدم الالتزام بالارتدادات</option>
                        <option value="VE-2024-00456">VE-2024-00456 - مخالفة تمديد غير قانوني</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="appealReason">سبب الاعتراض</label>
                    <textarea class="form-control" id="appealReason" placeholder="يرجى توضيح سبب الاعتراض بالتفصيل..."></textarea>
                </div>
                
                <div class="form-group">
                    <label>المستندات الداعمة</label>
                    <div class="file-upload">
                        <label class="file-upload-label" for="supportDocuments">
                            <i class="fas fa-cloud-upload-alt"></i> اسحب الملفات هنا أو انقر للرفع
                        </label>
                        <input type="file" id="supportDocuments" multiple>
                    </div>
                    <small style="display: block; margin-top: 8px; color: var(--light-text);">يمكنك رفع مستندات داعمة (PDF, JPG, PNG) بحد أقصى 5 ملفات</small>
                </div>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="closeAppealModal()">
                    <i class="fas fa-times"></i> إلغاء
                </button>
                <button class="btn btn-primary" onclick="submitAppeal()">
                    <i class="fas fa-paper-plane"></i> تقديم الاعتراض
                </button>
            </div>
        </div>
    </div>

    <script>
        // نظام التبويبات
        document.querySelectorAll('.profile-tab').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                
                document.querySelectorAll('.profile-tab').forEach(t => {
                    t.classList.remove('active');
                });
                
                this.classList.add('active');
                
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // فتح نافذة تقديم الاعتراض
        function openAppealModal() {
            document.getElementById('appealModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        // إغلاق نافذة تقديم الاعتراض
        function closeAppealModal() {
            document.getElementById('appealModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        // تقديم الاعتراض
        function submitAppeal() {
            const violationSelect = document.getElementById('violationSelect');
            const appealReason = document.getElementById('appealReason');
            
            if (!violationSelect.value) {
                alert('يرجى اختيار المخالفة');
                return;
            }
            
            if (!appealReason.value.trim()) {
                alert('يرجى كتابة سبب الاعتراض');
                return;
            }
            
            alert('تم تقديم الاعتراض بنجاح! سيتم مراجعته من قبل الفريق المختص.');
            closeAppealModal();
            
            violationSelect.value = '';
            appealReason.value = '';
            document.getElementById('supportDocuments').value = '';
        }
        
        // إغلاق النافذة المنبثقة عند النقر خارج المحتوى
        document.getElementById('appealModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAppealModal();
            }
        });
    </script>
</body>

</html>