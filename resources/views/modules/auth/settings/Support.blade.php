<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدعم الفني - نظام المكتب الهندسي</title>

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #151A2D;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }

        body {
            background-color: #f8f9fa;
        }

        .support-card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 25px;
            border-left: 4px solid var(--secondary-color);
            transition: transform 0.3s;
        }

        .support-card:hover {
            transform: translateY(-5px);
        }

        .support-card .card-header {
            background-color: rgba(52, 152, 219, 0.1);
            border-bottom: none;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .support-card .card-header i {
            font-size: 1.2rem;
            margin-left: 10px;
            color: var(--secondary-color);
        }

        .support-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            font-size: 1.5rem;
            margin-left: 15px;
        }

        .urgent-support {
            border-left: 4px solid var(--danger-color);
        }

        .urgent-support .card-header {
            background-color: rgba(231, 76, 60, 0.1);
        }

        .urgent-support .card-header i {
            color: var(--danger-color);
        }

        .knowledge-base-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.2s;
        }

        .knowledge-base-item:hover {
            background-color: #f8f9fa;
        }

        .ticket-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-open {
            background-color: #ffeeba;
            color: #856404;
        }

        .status-pending {
            background-color: #bee5eb;
            color: #0c5460;
        }

        .status-resolved {
            background-color: #c3e6cb;
            color: #155724;
        }

        .status-closed {
            background-color: #f5c6cb;
            color: #721c24;
        }

        .chat-bubble {
            border-radius: 15px;
            padding: 10px 15px;
            margin-bottom: 10px;
            max-width: 80%;
        }

        .chat-bubble-user {
            background-color: #e3f2fd;
            margin-right: auto;
            margin-left: 20%;
        }

        .chat-bubble-support {
            background-color: #f1f1f1;
            margin-left: auto;
            margin-right: 20%;
        }

            .btn-primary ,.badge{
        background-color: #151A2D;
        border-color: #151A2D;
         }

    .btn-outline-danger,.btn-outline-primary {
        color: #151A2D;
        border-color: #151A2D;
    }

    </style>
</head>
<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">
                    <i class="bi bi-headset text-primary me-2"></i> مركز الدعم الفني
                </h2>
                <p class="text-muted mb-0">الدعم الشامل لحل مشكلات النظام والاستفسارات الفنية</p>
            </div>
            <span class="badge ">متاح 24/7</span>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <!-- بطاقة طلب دعم جديد -->
                <div class="card support-card mb-4">
                    <div class="card-header">
                        <i class="bi bi-plus-circle"></i>
                        <h5 class="mb-0">طلب دعم جديد</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">نوع الطلب</label>
                                <select class="form-select">
                                    <option selected>استفسار عام</option>
                                    <option>مشكلة فنية</option>
                                    <option>طلب ميزة جديدة</option>
                                    <option>بلاغ عن خطأ</option>
                                    <option>استفسار مالي</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">الأولوية</label>
                                <select class="form-select">
                                    <option>منخفضة</option>
                                    <option selected>متوسطة</option>
                                    <option>عالية</option>
                                    <option>حرجة</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">عنوان الطلب</label>
                                <input type="text" class="form-control" placeholder="وصف مختصر للمشكلة">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">وصف المشكلة</label>
                                <textarea class="form-control" rows="4" placeholder="صف مشكلتك بالتفصيل"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">إرفاق ملفات (اختياري)</label>
                                <input type="file" class="form-control">
                                <small class="text-muted">يمكنك رفع صور أو مستندات توضح المشكلة (الحد الأقصى 10MB)</small>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">إرسال طلب الدعم</button>
                        </form>
                    </div>
                </div>

                <!-- بطاقة الدعم الفوري -->
                <div class="card support-card urgent-support mb-4">
                    <div class="card-header">
                        <i class="bi bi-lightning-charge"></i>
                        <h5 class="mb-0">الدعم الفوري</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="support-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">الدعم الهاتفي</h6>
                                <p class="mb-0 text-muted">اتصل بنا الآن للحصول على دعم فوري</p>
                            </div>
                        </div>
                        <a href="tel:+966112345678" class="btn btn-outline-danger w-100 mb-3">
                            <i class="bi bi-telephone-outbound me-2"></i> 920000000
                        </a>

                        <div class="d-flex align-items-center mb-3">
                            <div class="support-icon">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">الدردشة المباشرة</h6>
                                <p class="mb-0 text-muted">محادثة مباشرة مع فريق الدعم</p>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#chatModal">
                            <i class="bi bi-chat-left-text me-2"></i> بدء محادثة
                        </button>
                    </div>
                </div>

                <!-- بطاقة الأسئلة الشائعة -->
                <div class="card support-card mb-4">
                    <div class="card-header">
                        <i class="bi bi-question-circle"></i>
                        <h5 class="mb-0">أسئلة شائعة</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                كيف أقوم بإضافة مستخدم جديد؟
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                كيف أستعيد كلمة المرور؟
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                كيف أنشئ مشروعاً جديداً؟
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                كيف أرفع الملفات والمستندات؟
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                كيف أطلع على التقارير؟
                            </a>
                        </div>
                        <a href="#" class="btn btn-outline-secondary w-100 mt-3">عرض جميع الأسئلة</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <!-- بطاقة تذاكر الدعم -->
                <div class="card support-card mb-4">
                    <div class="card-header">
                        <i class="bi bi-ticket-detailed"></i>
                        <h5 class="mb-0">تذاكر الدعم الخاصة بي</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="ticketsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="open-tab" data-bs-toggle="tab" data-bs-target="#open" type="button">مفتوحة (3)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button">قيد المعالجة (2)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="resolved-tab" data-bs-toggle="tab" data-bs-target="#resolved" type="button">تم الحل (5)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="closed-tab" data-bs-toggle="tab" data-bs-target="#closed" type="button">مغلقة (12)</button>
                            </li>
                        </ul>

                        <div class="tab-content p-3 border border-top-0 rounded-bottom">
                            <div class="tab-pane fade show active" id="open" role="tabpanel">
                                <div class="knowledge-base-item">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">مشكلة في تسجيل الدخول</h6>
                                        <span class="ticket-status status-open">مفتوحة</span>
                                    </div>
                                    <p class="mb-1 small text-muted">#TKT-2023-156 - تم الإنشاء: 15 يونيو 2023</p>
                                    <p class="mb-1">لا أستطيع تسجيل الدخول إلى النظام رغم صحة كلمة المرور</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary mt-2">عرض التفاصيل</a>
                                </div>

                                <div class="knowledge-base-item">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1">طلب إضافة ميزة جديدة</h6>
                                        <span class="ticket-status status-open">مفتوحة</span>
                                    </div>
                                    <p class="mb-1 small text-muted">#TKT-2023-142 - تم الإنشاء: 10 يونيو 2023</p>
                                    <p class="mb-1">نحتاج لإضافة تقارير مخصصة للمشاريع</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary mt-2">عرض التفاصيل</a>
                                </div>
                            </div>

                            <!-- تبويبات أخرى بنفس الهيكل -->
                        </div>

                        <div class="text-center mt-3">
                            <button class="btn btn-outline-primary">عرض جميع التذاكر</button>
                        </div>
                    </div>
                </div>

                <!-- بطاقة قاعدة المعرفة -->
                <div class="card support-card mb-4">
                    <div class="card-header">
                        <i class="bi bi-book"></i>
                        <h5 class="mb-0">قاعدة المعرفة</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded h-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-file-earmark-text fs-4 text-primary me-2"></i>
                                        <h6 class="mb-0">الدليل الشامل</h6>
                                    </div>
                                    <p class="small text-muted">دليل استخدام النظام خطوة بخطوة</p>
                                    <button class="btn btn-sm btn-outline-primary">عرض الدليل</button>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded h-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-film fs-4 text-primary me-2"></i>
                                        <h6 class="mb-0">فيديوهات تعليمية</h6>
                                    </div>
                                    <p class="small text-muted">شروحات مرئية لاستخدام النظام</p>
                                    <button class="btn btn-sm btn-outline-primary">عرض الفيديوهات</button>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded h-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-download fs-4 text-primary me-2"></i>
                                        <h6 class="mb-0">أدوات وملحقات</h6>
                                    </div>
                                    <p class="small text-muted">تحميل الأدوات المساعدة والنماذج</p>
                                    <button class="btn btn-sm btn-outline-primary">عرض الملفات</button>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 border rounded h-100">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-megaphone fs-4 text-primary me-2"></i>
                                        <h6 class="mb-0">التحديثات والإعلانات</h6>
                                    </div>
                                    <p class="small text-muted">آخر التحديثات والميزات الجديدة</p>
                                    <button class="btn btn-sm btn-outline-primary">عرض الإعلانات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- نافذة الدردشة المباشرة -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-chat-left-text me-2"></i> الدردشة المباشرة مع الدعم الفني
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="chat-container" style="height: 400px; overflow-y: auto; margin-bottom: 20px;">
                        <div class="chat-bubble chat-bubble-support">
                            <div class="d-flex justify-content-between">
                                <strong>الدعم الفني</strong>
                                <small class="text-muted">اليوم 10:00 ص</small>
                            </div>
                            <p class="mb-0">مرحباً بك في خدمة الدردشة المباشرة، كيف يمكنني مساعدتك اليوم؟</p>
                        </div>

                        <div class="chat-bubble chat-bubble-user">
                            <div class="d-flex justify-content-between">
                                <strong>أنت</strong>
                                <small class="text-muted">اليوم 10:02 ص</small>
                            </div>
                            <p class="mb-0">أعاني من مشكلة في تسجيل الدخول إلى النظام</p>
                        </div>

                        <div class="chat-bubble chat-bubble-support">
                            <div class="d-flex justify-content-between">
                                <strong>الدعم الفني</strong>
                                <small class="text-muted">اليوم 10:03 ص</small>
                            </div>
                            <p class="mb-0">هل يمكنك وصف المشكلة بشكل أكثر تفصيلاً؟</p>
                        </div>
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="اكتب رسالتك هنا...">
                        <button class="btn btn-primary">إرسال</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <small class="text-muted me-auto">فريق الدعم متاح 24/7 للمساعدة</small>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إنهاء المحادثة</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
</body>
</html>
