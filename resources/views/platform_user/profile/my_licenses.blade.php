<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام إدارة الرخص - منصة بلدي الإلكترونية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* الأساسيات - مع الحفاظ على الأبعاد الأصلية */
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
            --sidebar-width: 250px;
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

        /* تحسينات قسم الفلتر للجوال */

        /* .filter-container {
            background: var(--card-color);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            border: 1px solid var(--border-color);
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            min-width: 220px;
            flex: 1;
        }

        .filter-label {
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--light-text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-select {
            padding: 14px 18px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            background: white;
            color: var(--text-color);
            transition: var(--transition);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.03);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(20, 157, 221, 0.15);
        } */

        .filter-container {
            background: var(--card-color);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
            border: 1px solid var(--border-color);
            position: relative;
        }

        .filter-toggle-btn {
            display: none;
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary-color);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            min-width: 220px;
            flex: 1;
            transition: all 0.3s ease;
        }

        .filter-label {
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--light-text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-select {
            padding: 14px 18px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 1rem;
            background: white;
            color: var(--text-color);
            transition: var(--transition);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.03);
        }

        .search-container {
            flex: 2;
            min-width: 100%;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(20, 157, 221, 0.15);
        }

        /* تصميم الجدول */
        .licenses-table-container {
            background: var(--card-color);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            overflow-x: auto;
        }

        .licenses-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 1000px;
        }

        .licenses-table th {
            background: linear-gradient(to bottom, #f1f5f9, #e9ecef);
            padding: 18px 25px;
            text-align: right;
            font-weight: 700;
            color: var(--primary-dark);
            border-bottom: 2px solid var(--primary-color);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .licenses-table td {
            padding: 18px 25px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            transition: var(--transition);
        }

        .licenses-table tr:last-child td {
            border-bottom: none;
        }

        .licenses-table tr {
            transition: var(--transition);
        }

        .licenses-table tr:hover {
            background-color: var(--primary-light);
            transform: translateX(-5px);
        }

        .licenses-table tr:hover td {
            color: var(--primary-dark);
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-width: 120px;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .status-active {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid rgba(39, 174, 96, 0.2);
        }

        .status-expired {
            background: var(--warning-light);
            color: var(--warning);
            border: 1px solid rgba(243, 156, 18, 0.2);
        }

        .status-pending {
            background: var(--accent-light);
            color: var(--accent-color);
            border: 1px solid rgba(52, 152, 219, 0.2);
        }

        .action-btn-details {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .action-btn-details:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 97, 94, 0.3);
        }

        .action-btn-details i {
            font-size: 1.1rem;
        }

        /* نافذة التفاصيل المنبثقة - التصميم المحسن */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.4s ease;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: white;
            width: 90%;
            max-width: 1000px;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 15px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            position: relative;
            transform: translateY(30px) scale(0.95);
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid var(--gold);
            overflow: hidden;
        }

        .modal.active .modal-content {
            transform: translateY(0) scale(1);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            border-bottom: 3px solid var(--gold);
        }

        .modal-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='0.1' d='M0,224L48,218.7C96,213,192,203,288,197.3C384,192,480,192,576,202.7C672,213,768,235,864,229.3C960,224,1056,192,1152,165.3C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            opacity: 0.15;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
            z-index: 1;
        }

        .modal-title i {
            background: rgba(255, 255, 255, 0.15);
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .close-modal {
            background: transparent;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            transition: transform 0.4s;
            position: relative;
            z-index: 1;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .close-modal:hover {
            transform: rotate(90deg);
            background: rgba(255, 255, 255, 0.15);
        }

        .modal-body {
            padding: 35px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            background: #fafcff;
        }

        .license-section {
            margin-bottom: 30px;
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--border-color);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .license-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            border-color: var(--accent-color);
        }

        .license-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
            transition: width 0.3s ease;
        }

        .license-section:hover::before {
            width: 8px;
        }

        .section-title {
            font-size: 1.4rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-light);
            color: var(--primary-color);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .license-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .info-item-detail {
            margin-bottom: 20px;
            position: relative;
            padding-right: 15px;
        }

        .info-item-detail::before {
            content: '';
            position: absolute;
            top: 12px;
            right: 0;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent-color);
        }

        .info-label-detail {
            font-weight: 700;
            color: var(--light-text);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }

        .info-value-detail {
            font-size: 1.15rem;
            color: var(--text-color);
            padding: 8px 0;
            border-bottom: 1px dashed var(--border-color);
            font-weight: 600;
        }

        .info-value-detail.status {
            border-bottom: none;
            padding: 5px 0;
        }

        .documents-list {
            list-style: none;
            padding: 0;
        }

        .document-item {
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
            background: white;
        }

        .document-item:hover {
            transform: translateX(5px);
            border-color: var(--accent-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .document-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .document-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .pdf-icon {
            background: #fde8e8;
            color: #e74c3c;
        }

        .doc-icon {
            background: #e8f4fc;
            color: #3498db;
        }

        .img-icon {
            background: #eef9f0;
            color: #27ae60;
        }

        .document-details {
            display: flex;
            flex-direction: column;
        }

        .document-name {
            font-weight: 600;
            color: var(--text-color);
        }

        .document-size {
            font-size: 0.85rem;
            color: var(--light-text);
        }

        .document-actions {
            display: flex;
            gap: 12px;
        }

        .document-action-btn {
            background: #f8f9fa;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.1rem;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        }

        .document-action-btn.view {
            color: var(--accent-color);
        }

        .document-action-btn.download {
            color: var(--success);
        }

        .document-action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .document-action-btn.view:hover {
            background: var(--accent-color);
            color: white;
        }

        .document-action-btn.download:hover {
            background: var(--success);
            color: white;
        }

        .progress-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 12px;
            padding: 25px;
            margin-top: 20px;
        }

        .progress-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .progress-label {
            font-weight: 600;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .progress-value {
            font-weight: 700;
            color: var(--text-color);
            font-size: 1.1rem;
        }

        .progress-bar-bg {
            width: 100%;
            height: 12px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            height: 100%;
            border-radius: 10px;
            transition: width 1s ease-in-out;
        }

        .modal-footer {
            padding: 25px;
            display: flex;
            justify-content: flex-start;
            gap: 20px;
            border-top: 1px solid var(--border-color);
            background: #f8fafc;
            flex-wrap: wrap;
        }

        .action-btn-modal {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 30px;
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .action-btn-modal.download {
            background: linear-gradient(135deg, var(--success), #219653);
            color: white;
        }

        .action-btn-modal.print {
            background: linear-gradient(135deg, var(--accent-color), #0d8ac5);
            color: white;
        }

        .action-btn-modal.renew {
            background: linear-gradient(135deg, var(--warning), #e67e22);
            color: white;
        }

        .action-btn-modal.close {
            background: white;
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        .action-btn-modal:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .license-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 20px;
            border-radius: 0 25px 25px 0;
            font-weight: 700;
            font-size: 0.9rem;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .badge-active {
            background: linear-gradient(135deg, var(--success), #219653);
        }

        .badge-expired {
            background: linear-gradient(135deg, var(--warning), #e67e22);
        }

        .badge-pending {
            background: linear-gradient(135deg, var(--accent-color), #0d8ac5);
        }

        /* خاص بالرسم البياني  */

        .chart-container {
            background: var(--card-color);
            border-radius: 15px;
            padding: 10px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .chart-title {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .chart-title i {
            color: var(--accent-color);
            background: rgba(20, 157, 221, 0.1);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 1000px) {
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

        @media (max-width: 992px) {
            .filter-container {
                padding: 15px;
                gap: 15px;
            }

            .filter-group {
                min-width: 180px;
            }
        }

        @media (max-width: 768px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }

            .filter-container {
                flex-direction: column;
                padding: 60px 15px 15px;
            }

            .filter-toggle-btn {
                display: flex;
            }

            .filter-group {
                min-width: 100%;
                display: none;
            }

            .filter-group.search-container {
                display: flex;
                min-width: 100%;
            }

            .filter-container.expanded .filter-group {
                display: flex;
            }


        }

        @media (max-width: 768px) {
            .modal-body {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            .modal-footer {
                flex-direction: column;
                gap: 12px;
            }

            .action-btn-modal {
                width: 100%;
                justify-content: center;
            }

            .licenses-table th,
            .licenses-table td {
                padding: 12px 15px;
            }
        }

        /* التعديلات الهامة للمخططات */
        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            position: relative;
            min-height: 250px;
            /* ارتفاع ثابت للمخططات */
            max-height: 700px;
            overflow: hidden;
        }

        /* تأكد من أن الرسوم البيانية تشغل المساحة المخصصة */
        .chart-card canvas {
             width: 90%;
            height: 90%;
        }
    </style>
</head>

<body>
   
    <!-- محتوى قسم الرخص -->
    <div class="main-container">
        <div class="welcome-section">
            <h1 class="welcome-title">إدارة الرخص</h1>
            <p class="welcome-subtitle">هنا يمكنك إدارة جميع رخصك، متابعة حالة الرخص، وتجديدها عند الحاجة. توفر المنصة
                واجهة سهلة الاستخدام لجميع عمليات إدارة الرخص الخاصة بك.</p>
        </div>

        <div class="licenses-header">
            <div class="licenses-title">
                <i class="fas fa-id-card"></i>
                <h2>رخصي</h2>
            </div>

            <div class="licenses-actions">
                <button class="action-btn-main">
                    <i class="fas fa-plus"></i>
                    طلب رخصة جديدة
                </button>
                <button class="action-btn-main">
                    <i class="fas fa-sync-alt"></i>
                    تجديد رخصة
                </button>
                <button class="action-btn-main">
                    <i class="fas fa-history"></i>
                    سجل الرخص
                </button>
            </div>
        </div>

        <div class="filter-container" id="filterContainer">
            <button class="filter-toggle-btn" id="filterToggle">
                <i class="fas fa-filter"></i>
            </button>

            <div class="filter-group search-container">
                <label class="filter-label"><i class="fas fa-search"></i> بحث</label>
                <input type="text" class="filter-select" placeholder="ابحث برقم الرخصة أو الاسم">
            </div>

            <div class="filter-group">
                <label class="filter-label"><i class="fas fa-tag"></i> نوع الرخصة</label>
                <select class="filter-select">
                    <option>جميع الأنواع</option>
                    <option>ترخيص بناء</option>
                    <option>ترخيص تجاري</option>
                    <option>ترخيص سكني</option>
                    <option>ترخيص ترميم</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label"><i class="fas fa-info-circle"></i> حالة الرخصة</label>
                <select class="filter-select">
                    <option>جميع الحالات</option>
                    <option>نشطة</option>
                    <option>منتهية</option>
                    <option>قيد المراجعة</option>
                    <option>مرفوضة</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label"><i class="fas fa-sort"></i> ترتيب حسب</label>
                <select class="filter-select">
                    <option>الأحدث</option>
                    <option>الأقدم</option>
                    <option>تاريخ الانتهاء (الأقرب)</option>
                    <option>تاريخ الانتهاء (الأبعد)</option>
                </select>
            </div>
        </div>

        <div class="licenses-table-container">
            <table class="licenses-table">
                <thead>
                    <tr>
                        <th>رقم الرخصة</th>
                        <th>نوع الرخصة</th>
                        <th>تاريخ الإصدار</th>
                        <th>تاريخ الانتهاء</th>
                        <th>الحالة</th>
                        <th>المكان</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#BL-2023-00542</td>
                        <td>ترخيص بناء سكني</td>
                        <td>15/03/2023</td>
                        <td>14/03/2025</td>
                        <td><span class="status-badge status-active"><i class="fas fa-check-circle"></i> نشطة</span>
                        </td>
                        <td>الرياض - حي النخيل</td>
                        <td>
                            <button class="action-btn-details" onclick="showLicenseDetails(1)">
                                <i class="fas fa-info-circle"></i> التفاصيل
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#BL-2022-00321</td>
                        <td>ترخيص محل تجاري</td>
                        <td>10/06/2022</td>
                        <td>09/06/2023</td>
                        <td><span class="status-badge status-expired"><i class="fas fa-exclamation-triangle"></i>
                                منتهية</span></td>
                        <td>الرياض - حي العليا</td>
                        <td>
                            <button class="action-btn-details" onclick="showLicenseDetails(2)">
                                <i class="fas fa-info-circle"></i> التفاصيل
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#BL-2023-00789</td>
                        <td>ترخيص ترميم مبنى</td>
                        <td>05/11/2023</td>
                        <td>05/05/2024</td>
                        <td><span class="status-badge status-pending"><i class="fas fa-clock"></i> قيد المراجعة</span>
                        </td>
                        <td>الرياض - حي الورود</td>
                        <td>
                            <button class="action-btn-details" onclick="showLicenseDetails(3)">
                                <i class="fas fa-info-circle"></i> التفاصيل
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#BL-2023-00987</td>
                        <td>ترخيص صناعي</td>
                        <td>20/02/2023</td>
                        <td>19/02/2026</td>
                        <td><span class="status-badge status-active"><i class="fas fa-check-circle"></i> نشطة</span>
                        </td>
                        <td>الرياض - المنطقة الصناعية</td>
                        <td>
                            <button class="action-btn-details" onclick="showLicenseDetails(4)">
                                <i class="fas fa-info-circle"></i> التفاصيل
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#BL-2023-01123</td>
                        <td>ترخيص استثماري</td>
                        <td>12/08/2023</td>
                        <td>11/08/2028</td>
                        <td><span class="status-badge status-active"><i class="fas fa-check-circle"></i> نشطة</span>
                        </td>
                        <td>جدة - حي الصفا</td>
                        <td>
                            <button class="action-btn-details" onclick="showLicenseDetails(5)">
                                <i class="fas fa-info-circle"></i> التفاصيل
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- نافذة التفاصيل المنبثقة -->
        <div class="modal" id="licenseModal">
            <div class="modal-content">
                <div class="license-badge badge-active">
                    <i class="fas fa-certificate"></i> رخصة نشطة
                </div>
                <div class="modal-header">
                    <h3 class="modal-title">
                        <i class="fas fa-file-contract"></i>
                        تفاصيل الرخصة <span id="licenseNumber">#BL-2023-00542</span>
                    </h3>
                    <button class="close-modal" onclick="closeModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="license-section">
                        <h4 class="section-title"><i class="fas fa-info-circle"></i> المعلومات الأساسية</h4>
                        <div class="license-info-grid">
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-hashtag"></i> رقم الرخصة</div>
                                <div class="info-value-detail">#BL-2023-00542</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-tag"></i> نوع الرخصة</div>
                                <div class="info-value-detail">ترخيص بناء سكني</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-calendar-alt"></i> تاريخ الإصدار</div>
                                <div class="info-value-detail">15/03/2023</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-calendar-times"></i> تاريخ الانتهاء
                                </div>
                                <div class="info-value-detail">14/03/2025</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-map-marker-alt"></i> المكان</div>
                                <div class="info-value-detail">الرياض - حي النخيل</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-clock"></i> الحالة</div>
                                <div class="info-value-detail status"><span
                                        class="status-badge status-active">نشطة</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="license-section">
                        <h4 class="section-title"><i class="fas fa-home"></i> تفاصيل المشروع</h4>
                        <div class="license-info-grid">
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-ruler-combined"></i> المساحة</div>
                                <div class="info-value-detail">450 م²</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-layer-group"></i> عدد الطوابق</div>
                                <div class="info-value-detail">3 طوابق</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-building"></i> نوع البناء</div>
                                <div class="info-value-detail">سكني عائلي</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-id-badge"></i> رقم القطعة</div>
                                <div class="info-value-detail">4235</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-user"></i> المهندس المشرف</div>
                                <div class="info-value-detail">م. عبدالله السديري</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-file-alt"></i> رقم التصريح</div>
                                <div class="info-value-detail">TP-2023-9876</div>
                            </div>
                        </div>

                        <div class="progress-section">
                            <div class="progress-container">
                                <div class="progress-header">
                                    <div class="progress-label"><i class="fas fa-tachometer-alt"></i> تقدم الرخصة</div>
                                    <div class="progress-value">65% مكتمل</div>
                                </div>
                                <div class="progress-bar-bg">
                                    <div class="progress-bar"
                                        style="width: 65%; background: linear-gradient(135deg, var(--success), #219653);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="license-section">
                        <h4 class="section-title"><i class="fas fa-file-pdf"></i> المستندات المرفقة</h4>
                        <ul class="documents-list">
                            <li class="document-item">
                                <div class="document-info">
                                    <div class="document-icon pdf-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="document-details">
                                        <div class="document-name">المخططات المعمارية النهائية.pdf</div>
                                        <div class="document-size">2.4 MB</div>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <button class="document-action-btn view">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="document-action-btn download">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </li>
                            <li class="document-item">
                                <div class="document-info">
                                    <div class="document-icon doc-icon">
                                        <i class="fas fa-file-contract"></i>
                                    </div>
                                    <div class="document-details">
                                        <div class="document-name">عقد المقاول.pdf</div>
                                        <div class="document-size">1.8 MB</div>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <button class="document-action-btn view">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="document-action-btn download">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </li>
                            <li class="document-item">
                                <div class="document-info">
                                    <div class="document-icon img-icon">
                                        <i class="fas fa-file-image"></i>
                                    </div>
                                    <div class="document-details">
                                        <div class="document-name">صورة الرخصة الرسمية.png</div>
                                        <div class="document-size">3.1 MB</div>
                                    </div>
                                </div>
                                <div class="document-actions">
                                    <button class="document-action-btn view">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="document-action-btn download">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="license-section">
                        <h4 class="section-title"><i class="fas fa-history"></i> تاريخ التحديثات</h4>
                        <div class="license-info-grid">
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-calendar-check"></i> تاريخ الطلب</div>
                                <div class="info-value-detail">10/02/2023</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-user-check"></i> تاريخ الموافقة</div>
                                <div class="info-value-detail">14/03/2023</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-sync-alt"></i> آخر تجديد</div>
                                <div class="info-value-detail">--</div>
                            </div>
                            <div class="info-item-detail">
                                <div class="info-label-detail"><i class="fas fa-edit"></i> آخر تعديل</div>
                                <div class="info-value-detail">05/09/2023</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="action-btn-modal download">
                        <i class="fas fa-download"></i> تحميل الرخصة
                    </button>
                    <button class="action-btn-modal print">
                        <i class="fas fa-print"></i> طباعة الرخصة
                    </button>
                    <button class="action-btn-modal renew">
                        <i class="fas fa-redo"></i> تجديد الرخصة
                    </button>
                    <button class="action-btn-modal close" onclick="closeModal()">
                        <i class="fas fa-times"></i> إغلاق
                    </button>
                </div>
            </div>
        </div>
        <div class="chart-container">
            <div class="chart-title">
                <i class="fas fa-chart-pie"></i>
                <h2>إحصائيات الرخص</h2>
            </div>

            <div class="charts-grid">
                <div class="chart-card">
                    <canvas id="licenseTypesChart"></canvas>
                </div>

                <div class="chart-card">
                    <canvas id="licenseStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>

        // إدارة النوافذ المنبثقة
        const modal = document.getElementById('licenseModal');

        function showLicenseDetails(licenseId) {
            // في تطبيق حقيقي، ستأتي هذه البيانات من قاعدة البيانات
            const licenseData = getLicenseData(licenseId);

            // تعبئة البيانات في النافذة المنبثقة
            document.getElementById('licenseNumber').textContent = licenseData.licenseNumber;

            // إزالة جميع شارات الحالة
            document.querySelectorAll('.license-badge').forEach(badge => badge.remove());

            // إنشاء شارة الحالة الجديدة
            const badge = document.createElement('div');
            badge.className = `license-badge badge-${licenseData.statusClass.replace('status-', '')}`;
            badge.innerHTML = `<i class="fas fa-certificate"></i> رخصة ${licenseData.status}`;

            // إضافة الشارة إلى النافذة المنبثقة
            modal.querySelector('.modal-content').prepend(badge);

            // إظهار النافذة المنبثقة
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // منع التمرير خلف النافذة

            // بدء مؤشر التقدم
            animateProgressBar(licenseData.progress);
        }

        function animateProgressBar(progress) {
            const progressBar = document.querySelector('.progress-bar');
            progressBar.style.width = '0%';

            setTimeout(() => {
                progressBar.style.width = progress + '%';
                document.querySelector('.progress-value').textContent = progress + '% مكتمل';
            }, 300);
        }

        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto'; // إعادة تمكين التمرير
        }

        // بيانات عينة للرخص (في تطبيق حقيقي سيكون من قاعدة البيانات)
        function getLicenseData(id) {
            const licenses = {
                1: {
                    licenseNumber: '#BL-2023-00542',
                    licenseType: 'ترخيص بناء سكني',
                    issueDate: '15/03/2023',
                    expiryDate: '14/03/2025',
                    location: 'الرياض - حي النخيل',
                    status: 'نشطة',
                    statusClass: 'status-active',
                    progress: 65
                },
                2: {
                    licenseNumber: '#BL-2022-00321',
                    licenseType: 'ترخيص محل تجاري',
                    issueDate: '10/06/2022',
                    expiryDate: '09/06/2023',
                    location: 'الرياض - حي العليا',
                    status: 'منتهية',
                    statusClass: 'status-expired',
                    progress: 100
                },
                3: {
                    licenseNumber: '#BL-2023-00789',
                    licenseType: 'ترخيص ترميم مبنى',
                    issueDate: '05/11/2023',
                    expiryDate: '05/05/2024',
                    location: 'الرياض - حي الورود',
                    status: 'قيد المراجعة',
                    statusClass: 'status-pending',
                    progress: 30
                },
                4: {
                    licenseNumber: '#BL-2023-00987',
                    licenseType: 'ترخيص صناعي',
                    issueDate: '20/02/2023',
                    expiryDate: '19/02/2026',
                    location: 'الرياض - المنطقة الصناعية',
                    status: 'نشطة',
                    statusClass: 'status-active',
                    progress: 45
                },
                5: {
                    licenseNumber: '#BL-2023-01123',
                    licenseType: 'ترخيص استثماري',
                    issueDate: '12/08/2023',
                    expiryDate: '11/08/2028',
                    location: 'جدة - حي الصفا',
                    status: 'نشطة',
                    statusClass: 'status-active',
                    progress: 20
                }
            };

            return licenses[id] || licenses[1];
        }

        // إغلاق النافذة المنبثقة عند النقر خارجها
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        // إغلاق النافذة المنبثقة بمفتاح ESC
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });

        // تفعيل تأثيرات التمرير
        document.querySelectorAll('.licenses-table tr').forEach(row => {
            row.addEventListener('mouseenter', function () {
                this.style.transform = 'translateX(-5px)';
            });

            row.addEventListener('mouseleave', function () {
                this.style.transform = 'translateX(0)';
            });
        });

        // إدارة قسم الفلتر للجوال
        const filterContainer = document.getElementById('filterContainer');
        const filterToggle = document.getElementById('filterToggle');

        filterToggle.addEventListener('click', function () {
            filterContainer.classList.toggle('expanded');
            this.innerHTML = filterContainer.classList.contains('expanded') ?
                '<i class="fas fa-times"></i>' : '<i class="fas fa-filter"></i>';
        });

        // إغلاق النافذة المنبثقة عند النقر خارجها
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        // إغلاق النافذة المنبثقة بمفتاح ESC
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });

        // إغلاق الفلتر عند النقر خارج المنطقة في الجوال
        document.addEventListener('click', function (event) {
            if (!filterContainer.contains(event.target) && !filterToggle.contains(event.target) &&
                window.innerWidth <= 768 && filterContainer.classList.contains('expanded')) {
                filterContainer.classList.remove('expanded');
                filterToggle.innerHTML = '<i class="fas fa-filter"></i>';
            }
        });
                // إدارة الشريط الجانبي
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.querySelector('.mobile-toggle i');
            
            sidebar.classList.toggle('show');
            
            if (sidebar.classList.contains('show')) {
                toggleButton.classList.remove('fa-bars');
                toggleButton.classList.add('fa-times');
            } else {
                toggleButton.classList.remove('fa-times');
                toggleButton.classList.add('fa-bars');
            }
        }

        // الرسوم البيانية
        let licenseTypesChart, licenseStatusChart;
        
        function initCharts() {
            // رسم بياني لأنواع الرخص
            const typeCtx = document.getElementById('licenseTypesChart').getContext('2d');
            licenseTypesChart = new Chart(typeCtx, {
                type: 'doughnut',
                data: {
                    labels: ['تراخيص بناء', 'تراخيص تجارية', 'تراخيص سكنية', 'تراخيص ترميم'],
                    datasets: [{
                        data: [35, 25, 20, 20],
                        backgroundColor: [
                            '#00615e',
                            '#4CAF50',
                            '#149ddd',
                            '#f39c12'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // حل المشكلة الرئيسي
                    plugins: {
                        legend: {
                            position: 'bottom',
                            rtl: true,
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                font: {
                                    size: 13
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'توزيع الرخص حسب النوع',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            padding: 15
                        }
                    }
                }
            });

            // رسم بياني لحالات الرخص
            const statusCtx = document.getElementById('licenseStatusChart').getContext('2d');
            licenseStatusChart = new Chart(statusCtx, {
                type: 'bar',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'رخص جديدة',
                        data: [12, 19, 8, 15, 14, 10],
                        backgroundColor: '#149ddd',
                        borderWidth: 0
                    }, {
                        label: 'رخص منتهية',
                        data: [5, 7, 4, 8, 6, 9],
                        backgroundColor: '#f39c12',
                        borderWidth: 0
                    }, {
                        label: 'رخص مجددة',
                        data: [3, 6, 2, 5, 4, 7],
                        backgroundColor: '#27ae60',
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // حل المشكلة الرئيسي
                    plugins: {
                        legend: {
                            position: 'top',
                            rtl: true,
                            labels: {
                                usePointStyle: true,
                                padding: 15
                            }
                        },
                        title: {
                            display: true,
                            text: 'حركة الرخص خلال الأشهر الستة الماضية',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            padding: 15
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            });
        }
        
        // إعادة رسم المخططات عند تغيير حجم النافذة
        function resizeCharts() {
            if (licenseTypesChart) licenseTypesChart.resize();
            if (licenseStatusChart) licenseStatusChart.resize();
        }

        // تهيئة الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            initCharts();
            
            // إعادة رسم المخططات عند تغيير حجم النافذة
            window.addEventListener('resize', resizeCharts);
            
            // إعادة تهيئة المخططات بعد تأخير بسيط لضمان تجاوز مشكلة التحميل
            setTimeout(resizeCharts, 100);
        });

        // تفعيل رسوم متحركة للبطاقات
        document.querySelectorAll('.license-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 12px 25px rgba(0, 0, 0, 0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 5px 20px rgba(0, 0, 0, 0.08)';
            });
        });
    </script>
</body>

</html>