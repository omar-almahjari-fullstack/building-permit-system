<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم التقويم - نظام التراخيص</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* الحاوية الرئيسية للمحتوى */
    .main-container {
    margin: 30px 0px 20px;
    margin-right: 100px;
    transition: margin 0.3s;
    }

    /* أنماط التقويم */
    .calendar-page {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .calendar-title {
        color: #00615e;
        font-size: 1.8rem;
        font-weight: 700;
    }

    .calendar-actions {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .calendar-btn {
        background: white;
        border: 1px solid #ddd;
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .calendar-btn:hover {
        background: #f8f8f8;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .calendar-btn.primary {
        background: #00615e;
        color: white;
        border-color: #00615e;
    }

    .calendar-btn.primary:hover {
        background: #004d4b;
    }

    .calendar-view {
        display: flex;
        gap: 25px;
        flex-wrap: wrap;
    }

    .calendar-main {
        flex: 3;
        min-width: 300px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .calendar-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: #f9f9f9;
        border-bottom: 1px solid #eee;
    }

    .month-nav {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .nav-btn {
        background: none;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 18px;
        color: #555;
    }

    .nav-btn:hover {
        background: #f0f0f0;
        color: #00615e;
    }

    .current-month {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        min-width: 150px;
        text-align: center;
    }

    .view-toggle {
        display: flex;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }

    .view-option {
        padding: 8px 15px;
        background: white;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .view-option:hover {
        background: #f5f5f5;
    }

    .view-option.active {
        background: #00615e;
        color: white;
    }

    .calendar-grid {
        padding: 15px;
    }

    .weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
        font-weight: 600;
        color: #555;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .days-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        margin-top: 10px;
    }

    .day {
        aspect-ratio: 1/1;
        border-radius: 10px;
        padding: 10px;
        background: white;
        position: relative;
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
        cursor: pointer;
    }

    .day:hover {
        background: #f9f9f9;
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
    }

    .day-number {
        position: absolute;
        top: 8px;
        left: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        color: #777;
    }

    .day.today .day-number {
        background: #149ddd;
        color: white;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 5px;
        left: 5px;
    }

    .day.other-month {
        background: #fafafa;
        color: #ccc;
    }

    .day.other-month .day-number {
        color: #ccc;
    }

    .day-events {
        margin-top: 25px;
        display: flex;
        flex-direction: column;
        gap: 5px;
        max-height: calc(100% - 35px);
        overflow-y: auto;
        padding-right: 2px;
    }

    .event-badge {
        font-size: 0.75rem;
        padding: 3px 8px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .event-badge.visit {
        background: rgba(20, 157, 221, 0.15);
        color: #149ddd;
    }

    .event-badge.deadline {
        background: rgba(231, 76, 60, 0.15);
        color: #e74c3c;
    }

    .event-badge.review {
        background: rgba(52, 152, 219, 0.15);
        color: #3498db;
    }

    .event-badge.license {
        background: rgba(39, 174, 96, 0.15);
        color: #27ae60;
    }

    .event-badge.violation {
        background: rgba(243, 156, 18, 0.15);
        color: #f39c12;
    }

    .event-item {
        font-size: 0.8rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 2px 5px;
        border-radius: 4px;
        background: rgba(0, 97, 94, 0.05);
    }

    /* لوحة الأحداث الجانبية */
    .events-sidebar {
        flex: 1;
        min-width: 300px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .events-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .events-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #333;
    }

    .filter-toggle {
        background: #f5f5f5;
        border: none;
        border-radius: 8px;
        padding: 8px 15px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .filter-toggle:hover {
        background: #eee;
    }

    .events-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
        flex: 1;
    }

    .event-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        padding: 15px;
        border-left: 4px solid #149ddd;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .event-card:hover {
        transform: translateX(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .event-card.visit {
        border-color: #149ddd;
    }

    .event-card.deadline {
        border-color: #e74c3c;
    }

    .event-card.review {
        border-color: #3498db;
    }

    .event-card.license {
        border-color: #27ae60;
    }

    .event-card.violation {
        border-color: #f39c12;
    }

    .event-date {
        font-size: 0.9rem;
        color: #777;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .event-date i {
        color: #149ddd;
    }

    .event-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .event-details {
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .event-meta {
        display: flex;
        justify-content: space-between;
        font-size: 0.85rem;
        color: #777;
    }

    .event-status {
        padding: 3px 10px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.8rem;
    }

    .status-pending {
        background: rgba(243, 156, 18, 0.15);
        color: #f39c12;
    }

    .status-confirmed {
        background: rgba(39, 174, 96, 0.15);
        color: #27ae60;
    }

    .status-urgent {
        background: rgba(231, 76, 60, 0.15);
        color: #e74c3c;
    }

    /* تصنيفات الأحداث */
    .event-categories {
        margin-top: 25px;
        background: #f9f9f9;
        border-radius: 12px;
        padding: 20px;
    }

    .categories-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .category-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .category-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.95rem;
        padding: 8px 12px;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .category-item:hover {
        background: #f0f0f0;
    }

    .category-item.active {
        background: rgba(0, 97, 94, 0.1);
        font-weight: 500;
    }

    .category-color {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .color-visit {
        background: #149ddd;
    }

    .color-deadline {
        background: #e74c3c;
    }

    .color-review {
        background: #3498db;
    }

    .color-license {
        background: #27ae60;
    }

    .color-violation {
        background: #f39c12;
    }

    /* نافذة إضافة حدث */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 2000;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        width: 90%;
        max-width: 600px;
        border-radius: 15px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .modal-header {
        padding: 20px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        font-size: 1.5rem;
        color: #00615e;
    }

    .close-modal {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #777;
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
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    /* التكيف مع الشاشات الصغيرة */

    @media (max-width: 1200px) {
        .main-container {
          margin-right: 0px;
          margin-left: 0px;
        }
    }
    
    @media (max-width: 1000px) {
        .calendar-view {
            flex-direction: column;
        }
        
        .calendar-main,
        .events-sidebar {
            min-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .calendar-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .calendar-actions {
            width: 100%;
            justify-content: space-between;
        }

        .days-grid {
            gap: 2px;
        }

        .day {
            padding: 5px;
        }

        .day-number {
            font-size: 0.8rem;
        }

        .event-badge {
            font-size: 0.65rem;
        }

        .event-categories .category-list {
            flex-direction: row;
            flex-wrap: wrap;
        }

        .event-categories .category-item {
            flex: 1;
            min-width: 140px;
        }

        .calendar-nav {
            flex-direction: column;
            gap: 15px;
        }

        .view-toggle {
            width: 100%;
        }

        .event-categories .category-list {
            flex-direction: row;
            overflow-x: auto;
            padding-bottom: 10px;
            gap: 8px;
            flex-wrap: nowrap;
            white-space: nowrap;
        }

        .event-categories .category-item {
            min-width: 120px;
            flex: none;
            white-space: nowrap;
        }

        .days-grid {
            grid-template-columns: repeat(7, minmax(0, 1fr));
            gap: 1px;
        }

        .day {
            min-height: 50px;
            padding: 2px;
        }

        .day-number {
            top: 3px;
            left: 3px;
            font-size: 0.7rem;
        }

        .day.today .day-number {
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
        }

        .event-badge {
            padding: 2px 4px;
            font-size: 0.5rem;
        }

        .event-categories {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            z-index: 100;
            padding: 10px;
            border-top: 1px solid #eee;
            border-radius: 0;
            margin-top: 0;
        }

        .event-categories .categories-title {
            display: none;
        }

        .events-list {
            margin-bottom: 70px;
        }
    }

    @media (max-width: 480px) {
        .main-container {
            margin: 15px 10px 10px;
            margin-right: 10px;
        }

        .calendar-page {
            padding: 10px;
        }

        .calendar-title {
            font-size: 1.4rem;
        }

        .calendar-actions {
            flex-direction: column;
            width: 100%;
        }

        .calendar-btn {
            justify-content: center;
        }

        .modal-content {
            width: 95%;
            margin: 10px;
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions .calendar-btn {
            width: 100%;
            margin-bottom: 10px;
        }
    }

    /* تحسينات إمكانية الوصول */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }

    button:focus,
    a:focus {
        outline: 2px solid #149ddd;
        outline-offset: 2px;
    }
</style>
</head>
<body>
    {{-- <div class="ajax-message" id="ajax-message">
        <i class="fas fa-check-circle"></i> تم تحميل التقويم بنجاح عبر AJAX
    </div> --}}
    
    <div class="main-container">
        <div class="calendar-page">
            <div class="calendar-header">
                <h1 class="calendar-title">
                    <i class="fas fa-calendar-alt"></i> تقويم التراخيص والمتابعة
                </h1>
                <div class="calendar-actions">
                    <button class="calendar-btn primary" id="add-event-btn">
                        <i class="fas fa-plus"></i> إضافة حدث
                    </button>
                    <button class="calendar-btn" id="refresh-btn">
                        <i class="fas fa-sync-alt"></i> تحديث
                    </button>
                    <button class="calendar-btn" id="print-btn">
                        <i class="fas fa-print"></i> طباعة
                    </button>
                </div>
            </div>

            <div class="calendar-view">
                <div class="calendar-main">
                    <div class="calendar-nav">
                        <div class="month-nav">
                            <button class="nav-btn" id="prev-month" aria-label="الشهر السابق">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            <div class="current-month" id="current-month">أكتوبر 2023</div>
                            <button class="nav-btn" id="next-month" aria-label="الشهر التالي">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        </div>

                        <div class="view-toggle" role="group" aria-label="طريقة العرض">
                            <button class="view-option" data-view="day">يومي</button>
                            <button class="view-option" data-view="week">أسبوعي</button>
                            <button class="view-option active" data-view="month">شهري</button>
                        </div>
                    </div>

                    <div class="calendar-grid">
                        <div class="weekdays">
                            <div>الأحد</div>
                            <div>الإثنين</div>
                            <div>الثلاثاء</div>
                            <div>الأربعاء</div>
                            <div>الخميس</div>
                            <div>الجمعة</div>
                            <div>السبت</div>
                        </div>

                        <div class="days-grid" id="calendar-days" role="grid">
                            <!-- سيتم ملئ الأيام بالجافاسكريبت -->
                        </div>
                    </div>
                </div>

                <div class="events-sidebar">
                    <div class="events-header">
                        <h2 class="events-title">الأحداث القادمة</h2>
                        <button class="filter-toggle" id="filter-toggle">
                            <i class="fas fa-filter"></i> التصنيفات
                        </button>
                    </div>
                    
                    <div class="event-categories">
                        <h3 class="categories-title">تصنيفات الأحداث</h3>
                        <div class="category-list" id="category-list">
                            <div class="category-item active" data-category="all">
                                <div class="category-color color-visit"></div>
                                جميع الأحداث
                            </div>
                            <div class="category-item" data-category="visit">
                                <div class="category-color color-visit"></div>
                                الزيارات الميدانية
                            </div>
                            <div class="category-item" data-category="deadline">
                                <div class="category-color color-deadline"></div>
                                المواعيد النهائية
                            </div>
                            <div class="category-item" data-category="review">
                                <div class="category-color color-review"></div>
                                جلسات المراجعة
                            </div>
                            <div class="category-item" data-category="license">
                                <div class="category-color color-license"></div>
                                تواريخ الرخصة
                            </div>
                            <div class="category-item" data-category="violation">
                                <div class="category-color color-violation"></div>
                                المخالفات والجلسات
                            </div>
                        </div>
                    </div>
                    
                    <div class="events-list" id="events-list">
                        <!-- سيتم ملئ الأحداث بالجافاسكريبت -->
                    </div>
                </div>
            </div>
        </div>

        <!-- نافذة إضافة حدث جديدة -->
        <div class="modal" id="event-modal" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="modal-title">إضافة حدث جديد</h2>
                    <button class="close-modal" aria-label="إغلاق">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="event-form">
                        <div class="form-group">
                            <label for="event-title">عنوان الحدث</label>
                            <input type="text" id="event-title" class="form-control" placeholder="أدخل عنوان الحدث" required>
                        </div>

                        <div class="form-group">
                            <label for="event-type">نوع الحدث</label>
                            <select id="event-type" class="form-control" required>
                                <option value="visit">زيارة ميدانية</option>
                                <option value="deadline">موعد نهائي</option>
                                <option value="review">جلسة مراجعة</option>
                                <option value="license">تواريخ الرخصة</option>
                                <option value="violation">المخالفات والجلسات</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="event-date">التاريخ والوقت</label>
                            <input type="datetime-local" id="event-date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="event-description">تفاصيل الحدث</label>
                            <textarea id="event-description" class="form-control" rows="4" placeholder="أدخل تفاصيل الحدث" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="event-reminder">التذكير قبل</label>
                            <select id="event-reminder" class="form-control">
                                <option value="none">بدون تذكير</option>
                                <option value="1h">ساعة واحدة</option>
                                <option value="1d">يوم واحد</option>
                                <option value="2d">يومين</option>
                                <option value="1w">أسبوع واحد</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="calendar-btn close-modal">إلغاء</button>
                            <button type="submit" class="calendar-btn primary">حفظ الحدث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ✅ دالة رئيسية لتهيئة صفحة التقويم (تعمل مع AJAX والتحميل المباشر)
        function initCalendarPage() {
            // إظهار رسالة AJAX
            // const ajaxMessage = document.getElementById('ajax-message');
            // ajaxMessage.style.display = 'block';
            // setTimeout(() => {
            //     ajaxMessage.style.display = 'none';
            // }, 3000);
            
            // بيانات الأحداث المخزنة محلياً
            let events = JSON.parse(localStorage.getItem('calendarEvents')) || [
                {
                    id: 'event-1',
                    title: 'زيارة ميدانية لمعاينة الموقع',
                    type: 'visit',
                    date: '2023-10-15T10:00:00',
                    description: 'زيارة من قبل المهندس علي عبد الله لمعاينة موقع بناء في شارع الزبيري - صنعاء',
                    requestId: 'TR-2023-0456',
                    status: 'pending',
                    reminder: '1d'
                },
                {
                    id: 'event-2',
                    title: 'موعد نهائي لتقديم المستندات',
                    type: 'deadline',
                    date: '2023-10-20T16:00:00',
                    description: 'تقديم تصاريح السلامة من الدفاع المدني لطلب الترخيص TR-2023-0456',
                    requestId: 'TR-2023-0456',
                    status: 'urgent',
                    reminder: '2d'
                },
                {
                    id: 'event-3',
                    title: 'جلسة مراجعة المخططات',
                    type: 'review',
                    date: '2023-10-25T11:00:00',
                    description: 'مراجعة المخططات المعمارية والإنشائية في لجنة التراخيص - مبنى الوزارة الطابق 3',
                    requestId: 'TR-2023-0456',
                    status: 'confirmed',
                    reminder: '1d'
                },
                {
                    id: 'event-4',
                    title: 'انتهاء صلاحية رخصة البناء',
                    type: 'license',
                    date: '2023-12-31T00:00:00',
                    description: 'رخصة بناء رقم LB-2022-7890 - مشروع في حي التحرير',
                    licenseId: 'LB-2022-7890',
                    status: 'pending',
                    reminder: '1w'
                },
                {
                    id: 'event-5',
                    title: 'جلسة نظر في مخالفة بناء',
                    type: 'violation',
                    date: '2023-11-05T09:00:00',
                    description: 'جلسة نظر في مخالفة البناء رقم VI-2023-1122 - منطقة الروضة',
                    violationId: 'VI-2023-1122',
                    status: 'confirmed',
                    reminder: '1d'
                }
            ];

            // تعريف المتغيرات
            const calendarDays = document.getElementById('calendar-days');
            const currentMonthElement = document.getElementById('current-month');
            const eventsList = document.getElementById('events-list');
            const categoryList = document.getElementById('category-list');

            const months = [
                'يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
            ];

            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();
            let selectedCategory = 'all';
            let selectedView = 'month';

            // وظائف مساعدة
            const formatEventDate = (date) => {
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                };
                return date.toLocaleDateString('ar-YE', options);
            };

            const getEventTypeName = (type) => {
                const types = {
                    'visit': 'زيارة ميدانية',
                    'deadline': 'موعد نهائي',
                    'review': 'جلسة مراجعة',
                    'license': 'تواريخ الرخصة',
                    'violation': 'المخالفات والجلسات'
                };
                return types[type] || type;
            };

            const getStatusText = (status) => {
                const statuses = {
                    'pending': 'قيد الانتظار',
                    'confirmed': 'تم التأكيد',
                    'urgent': 'عاجل'
                };
                return statuses[status] || status;
            };

            const formatDateTimeLocal = (date) => {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                return `${year}-${month}-${day}T${hours}:${minutes}`;
            };

            // عرض التقويم
            function renderCalendar() {
                if (!calendarDays || !currentMonthElement) return;
                
                currentMonthElement.textContent = `${months[currentMonth]} ${currentYear}`;
                calendarDays.innerHTML = '';

                // اليوم الأول من الشهر
                const firstDay = new Date(currentYear, currentMonth, 1);
                // اليوم الأخير من الشهر
                const lastDay = new Date(currentYear, currentMonth + 1, 0);
                // اليوم الأول من الأسبوع
                const firstDayIndex = firstDay.getDay();
                // اليوم الأخير من الأسبوع
                const lastDayIndex = lastDay.getDay();
                // عدد أيام الشهر الماضي
                const prevLastDay = new Date(currentYear, currentMonth, 0).getDate();

                // أيام الشهر الماضي
                for (let i = firstDayIndex; i > 0; i--) {
                    const day = document.createElement('div');
                    day.classList.add('day', 'other-month');
                    day.innerHTML = `<div class="day-number">${prevLastDay - i + 1}</div>`;
                    calendarDays.appendChild(day);
                }

                // أيام الشهر الحالي
                for (let i = 1; i <= lastDay.getDate(); i++) {
                    const day = document.createElement('div');
                    day.classList.add('day');
                    day.setAttribute('data-date', `${currentYear}-${currentMonth + 1}-${i}`);
                    const today = new Date();

                    // تحديد اليوم الحالي
                    if (i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
                        day.classList.add('today');
                    }

                    // إضافة الأحداث لهذا اليوم
                    const dayEvents = events.filter(event => {
                        const eventDate = new Date(event.date);
                        return eventDate.getDate() === i &&
                            eventDate.getMonth() === currentMonth &&
                            eventDate.getFullYear() === currentYear;
                    });

                    let eventsHTML = '';
                    dayEvents.forEach(event => {
                        const eventType = event.type;
                        eventsHTML += `<div class="event-badge ${eventType}">${getEventTypeName(eventType)}</div>`;
                    });

                    day.innerHTML = `
                        <div class="day-number">${i}</div>
                        <div class="day-events">${eventsHTML}</div>
                    `;

                    // إضافة حدث النقر لفتح نافذة إضافة حدث
                    day.addEventListener('click', function () {
                        const dateString = this.getAttribute('data-date');
                        openEventModal(new Date(dateString));
                    });

                    calendarDays.appendChild(day);
                }

                // أيام الشهر القادم
                for (let i = lastDayIndex; i < 6; i++) {
                    const day = document.createElement('div');
                    day.classList.add('day', 'other-month');
                    day.innerHTML = `<div class="day-number">${i - lastDayIndex + 1}</div>`;
                    calendarDays.appendChild(day);
                }
            }

            // عرض الأحداث في اللوحة الجانبية
            function renderEvents() {
                if (!eventsList) return;
                
                eventsList.innerHTML = '';

                // تصفية الأحداث حسب التصنيف
                const filteredEvents = selectedCategory === 'all'
                    ? events
                    : events.filter(event => event.type === selectedCategory);

                // ترتيب الأحداث حسب التاريخ
                filteredEvents.sort((a, b) => new Date(a.date) - new Date(b.date));

                // عرض الأحداث
                filteredEvents.forEach(event => {
                    const eventDate = new Date(event.date);
                    const formattedDate = formatEventDate(eventDate);
                    const eventCard = document.createElement('div');
                    eventCard.classList.add('event-card', event.type);
                    eventCard.innerHTML = `
                        <div class="event-date">
                            <i class="fas fa-calendar-day"></i> 
                            ${formattedDate}
                        </div>
                        <h3 class="event-title">${event.title}</h3>
                        <div class="event-details">${event.description}</div>
                        <div class="event-meta">
                            <div>${event.requestId ? 'رقم الطلب: ' + event.requestId : ''}
                                ${event.licenseId ? 'رقم الرخصة: ' + event.licenseId : ''}
                                ${event.violationId ? 'رقم المخالفة: ' + event.violationId : ''}</div>
                            <div class="event-status status-${event.status}">${getStatusText(event.status)}</div>
                        </div>
                    `;

                    // إضافة حدث النقر لتعديل الحدث
                    eventCard.addEventListener('click', function () {
                        openEventModal(new Date(event.date), event);
                    });

                    eventsList.appendChild(eventCard);
                });
            }

            // فتح نافذة إضافة/تعديل حدث
            function openEventModal(date, event = null) {
                const eventModal = document.getElementById('event-modal');
                const modalTitle = document.getElementById('modal-title');
                const eventTitle = document.getElementById('event-title');
                const eventType = document.getElementById('event-type');
                const eventDate = document.getElementById('event-date');
                const eventDescription = document.getElementById('event-description');
                const eventReminder = document.getElementById('event-reminder');
                const eventForm = document.getElementById('event-form');

                // تهيئة النموذج
                if (event) {
                    modalTitle.textContent = 'تعديل الحدث';
                    eventTitle.value = event.title;
                    eventType.value = event.type;
                    eventDate.value = formatDateTimeLocal(new Date(event.date));
                    eventDescription.value = event.description;
                    eventReminder.value = event.reminder || 'none';
                } else {
                    modalTitle.textContent = 'إضافة حدث جديد';
                    eventTitle.value = '';
                    eventType.value = 'visit';
                    eventDate.value = formatDateTimeLocal(date);
                    eventDescription.value = '';
                    eventReminder.value = 'none';
                }

                // تخزين معرف الحدث للاستخدام لاحقاً
                eventForm.dataset.eventId = event ? event.id : '';

                // عرض النافذة
                eventModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }

            // إغلاق النافذة المنبثقة
            function closeEventModal() {
                const eventModal = document.getElementById('event-modal');
                eventModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            // حفظ الحدث
            function saveEvent(eventData) {
                if (eventData.id) {
                    // تحديث الحدث الموجود
                    const index = events.findIndex(e => e.id === eventData.id);
                    if (index !== -1) {
                        events[index] = eventData;
                    }
                } else {
                    // إضافة حدث جديد
                    eventData.id = 'event-' + Date.now();
                    events.push(eventData);
                }

                // حفظ في التخزين المحلي
                localStorage.setItem('calendarEvents', JSON.stringify(events));

                // إعادة عرض التقويم والأحداث
                renderCalendar();
                renderEvents();
            }

            // تهيئة الأحداث
            function setupEventListeners() {
                const prevMonthBtn = document.getElementById('prev-month');
                const nextMonthBtn = document.getElementById('next-month');
                const addEventBtn = document.getElementById('add-event-btn');
                const refreshBtn = document.getElementById('refresh-btn');
                const printBtn = document.getElementById('print-btn');
                const filterToggle = document.getElementById('filter-toggle');
                const eventForm = document.getElementById('event-form');
                const closeModalBtns = document.querySelectorAll('.close-modal');
                const viewOptions = document.querySelectorAll('.view-option');
                const categoryItems = document.querySelectorAll('#category-list .category-item');

                // تغيير الشهر
                if (prevMonthBtn) {
                    prevMonthBtn.addEventListener('click', function () {
                        currentMonth--;
                        if (currentMonth < 0) {
                            currentMonth = 11;
                            currentYear--;
                        }
                        renderCalendar();
                    });
                }

                if (nextMonthBtn) {
                    nextMonthBtn.addEventListener('click', function () {
                        currentMonth++;
                        if (currentMonth > 11) {
                            currentMonth = 0;
                            currentYear++;
                        }
                        renderCalendar();
                    });
                }

                // تغيير طريقة العرض
                if (viewOptions) {
                    viewOptions.forEach(option => {
                        option.addEventListener('click', function () {
                            viewOptions.forEach(opt => {
                                opt.classList.remove('active');
                            });
                            this.classList.add('active');
                            selectedView = this.dataset.view;
                            currentMonthElement.textContent = `${months[currentMonth]} ${currentYear} (${this.textContent})`;
                        });
                    });
                }

                // تصنيفات الأحداث
                if (categoryItems) {
                    categoryItems.forEach(item => {
                        item.addEventListener('click', function () {
                            document.querySelectorAll('.category-item').forEach(i => {
                                i.classList.remove('active');
                            });
                            this.classList.add('active');
                            selectedCategory = this.dataset.category;
                            renderEvents();
                        });
                    });
                }

                // فتح نافذة إضافة حدث
                if (addEventBtn) {
                    addEventBtn.addEventListener('click', function () {
                        openEventModal(new Date());
                    });
                }

                // تحديث الصفحة
                if (refreshBtn) {
                    refreshBtn.addEventListener('click', function () {
                        renderCalendar();
                        renderEvents();
                    });
                }

                // طباعة التقويم
                if (printBtn) {
                    printBtn.addEventListener('click', function () {
                        window.print();
                    });
                }

                // تبديل عرض التصنيفات
                if (filterToggle) {
                    filterToggle.addEventListener('click', function () {
                        const categories = document.querySelector('.event-categories');
                        if (categories) {
                            categories.style.display = categories.style.display === 'none' ? 'block' : 'none';
                        }
                    });
                }

                // إغلاق النافذة المنبثقة
                if (closeModalBtns) {
                    closeModalBtns.forEach(btn => {
                        btn.addEventListener('click', closeEventModal);
                    });
                }

                // إغلاق النافذة عند النقر خارجها
                window.addEventListener('click', function (event) {
                    const modal = document.getElementById('event-modal');
                    if (event.target === modal) {
                        closeEventModal();
                    }
                });

                // معالجة تقديم النموذج
                if (eventForm) {
                    eventForm.addEventListener('submit', function (e) {
                        e.preventDefault();

                        const eventId = this.dataset.eventId;
                        const eventData = {
                            id: eventId || null,
                            title: document.getElementById('event-title').value,
                            type: document.getElementById('event-type').value,
                            date: document.getElementById('event-date').value,
                            description: document.getElementById('event-description').value,
                            reminder: document.getElementById('event-reminder').value,
                            status: 'pending'
                        };

                        saveEvent(eventData);
                        closeEventModal();
                    });
                }
            }

            // بدء التقويم
            renderCalendar();
            renderEvents();
            setupEventListeners();

            console.log('تم تهيئة صفحة التقويم بنجاح');
        }

        // ✅ تهيئة الصفحة عند التحميل المباشر
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            initCalendarPage();
        } else {
            document.addEventListener('DOMContentLoaded', initCalendarPage);
        }

        // ✅ تهيئة الصفحة عند التحميل عبر AJAX
        // سيتم استدعاء هذه الدالة عند تحميل الصفحة عبر AJAX
        initCalendarPage();
    </script>
</body>
</html>