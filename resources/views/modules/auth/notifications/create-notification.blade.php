{{-- 
<style>
    :root {
        --primary-dark: #0a1a2e;
        --primary: #142a4e;
        --primary-light: #1e3a6e;
        --accent: #d4af37;
        --accent-light: #e8c874;
        --light: #ffffff;
        --light-gray: #f8f9fa;
        --text: #2c3e50;
        --border: #dee2e6;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
        --transition: all 0.3s ease;
    }

    .card-custom {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        border: none;
    }

    .form-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 30px;
        color: var(--primary);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-title i {
        color: var(--accent);
    }

    label {
        margin-top: 15px;
        font-weight: 600;
        color: var(--primary);
    }

    .btn-success {
        background: linear-gradient(to right, var(--primary), var(--primary-dark));
        border: none;
        font-size: 18px;
        padding: 12px;
        border-radius: 12px;
        transition: var(--transition);
    }

    .btn-success:hover {
        background: linear-gradient(to right, var(--primary-dark), var(--primary));
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid var(--border);
        transition: var(--transition);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(20, 42, 78, 0.25);
    }

    @media (max-width: 768px) {
        .card-custom {
            padding: 25px;
        }

        .form-title {
            font-size: 24px;
        }
    }
</style>

<div class="container">
    <div class="card-custom">
        <div class="form-title">
            <i class="bi bi-megaphone"></i> إنشاء إشعار جديد
        </div>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <label for="title">عنوان الإشعار:</label>
                    <input type="text" class="form-control" id="title" placeholder="مثال: تعديل مطلوب في المخطط" required>
                </div>
                <div class="col-md-6">
                    <label for="type">نوع الإشعار:</label>
                    <select class="form-select" id="type" required>
                        <option value="">اختر نوعاً</option>
                        <option>تنبيه</option>
                        <option>تحذير</option>
                        <option>معلومة</option>
                        <option>تذكير</option>
                        <option>رسالةداخلية</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label for="description">الوصف التفصيلي:</label>
                    <textarea class="form-control" id="description" rows="4" placeholder="أدخل تفاصيل الإشعار هنا..." required></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="related_to">ربط الإشعار بـ:</label>
                    <select class="form-select" id="related_to">
                        <option>ال شيء</option>
                        <option>طلب</option>
                        <option>رخصة</option>
                        <option>ملف</option>
                        <option>مشروع</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="reference_id">رقم المرجع:</label>
                    <input type="text" class="form-control" id="reference_id" placeholder="مثال: 10234">
                </div>
                <div class="col-md-4">
                    <label for="priority">الأولوية:</label>
                    <select class="form-select" id="priority">
                        <option>عادي</option>
                        <option>متوسط</option>
                        <option>مرتفع</option>
                        <option>حرج</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="scheduled_at">جدولة الإشعار:</label>
                    <input type="datetime-local" class="form-control" id="scheduled_at">
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="is_important">
                        <label class="form-check-label" for="is_important">تمييز الإشعار كمهم</label>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-send-check"></i> حفظ الإشعار
                </button>
            </div>
        </form>
    </div>
</div>

 --}}








{{-- <style>
        :root {
            --primary-dark: #0a1a2e;
            --primary: #142a4e;
            --primary-light: #1e3a6e;
            --accent: #d4af37;
            --accent-light: #e8c874;
            --light: #ffffff;
            --light-gray: #f8f9fa;
            --text: #2c3e50;
            --border: #dee2e6;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        .card-custom {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow-md);
            border: none;
        }

        .form-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-title i {
            color: var(--accent);
        }

        label {
            margin-top: 15px;
            font-weight: 600;
            color: var(--primary);
        }

        .btn-success {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            border: none;
            font-size: 18px;
            padding: 12px;
            border-radius: 12px;
            transition: var(--transition);
        }

        .btn-success:hover {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .form-check-label {
            font-weight: 500;
        }

        .form-control, .form-select {
            border-radius: 8px;
          
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(20, 42, 78, 0.25);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        @media (max-width: 768px) {
            .card-custom {
                padding: 25px;
            }

            .form-title {
                font-size: 24px;
            }
        }
    </style>


    <div class="container">
        <div class="card-custom">
            <div class="form-title">
                <i class="bi bi-megaphone"></i> إنشاء إشعار جديد
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <label for="title">عنوان الإشعار:</label>
                        <input type="text" class="form-control" id="title" placeholder="مثال: تعديل مطلوب في المخطط" required>
                    </div>
                    <div class="col-md-6">
                        <label for="type">نوع الإشعار:</label>
                        <select class="form-select" id="type" required>
                            <option value="">اختر نوعاً</option>
                            <option>تنبيه تقني</option>
                            <option>طلب تعديل</option>
                            <option>رفض</option>
                            <option>تنبيه موعد</option>
                            <option>رسالة داخلية</option>
                            <option>تنبيه مهم</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <label for="description">الوصف التفصيلي:</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="أدخل تفاصيل الإشعار هنا..."
                            required></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="target">الجهة المستهدفة:</label>
                        <select class="form-select" id="target" required>
                            <option value="">اختر</option>
                            <option>كل الموظفين</option>
                            <option>موظفي قسم معين</option>
                            <option>عميل محدد</option>
                            <option>مدراء فقط</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="department">القسم (إن وُجد):</label>
                        <select class="form-select" id="department">
                            <option>قسم الرخص</option>
                            <option>قسم الهدم</option>
                            <option>المراجعات</option>
                            <option>الدعم الفني</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="relatedTo">ربط الإشعار بـ:</label>
                        <select class="form-select" id="relatedTo">
                            <option value="">غير مرتبط</option>
                            <option>طلب</option>
                            <option>رخصة</option>
                            <option>ملف</option>
                            <option>مشروع</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="referenceId">رقم المرجع:</label>
                        <input type="text" class="form-control" id="referenceId" placeholder="مثال: 10234">
                    </div>
                    <div class="col-md-4">
                        <label for="priority">الأولوية:</label>
                        <select class="form-select" id="priority">
                            <option>عادي</option>
                            <option>متوسط</option>
                            <option>مرتفع</option>
                            <option>حرج</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="sendNow">وقت الظهور:</label>
                        <select class="form-select" id="sendNow">
                            <option>فوراً</option>
                            <option>في وقت لاحق</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="scheduleDate">جدولة الإشعار:</label>
                        <input type="datetime-local" class="form-control" id="scheduleDate">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label>من يستطيع رؤية الإشعار؟</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="visible_admin" checked>
                            <label class="form-check-label" for="visible_admin">المدراء</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="visible_engineers" checked>
                            <label class="form-check-label" for="visible_engineers">المهندسين</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="visible_clients">
                            <label class="form-check-label" for="visible_clients">العملاء</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>خيارات إضافية:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="mark_important">
                            <label class="form-check-label" for="mark_important">تمييز الإشعار كمهم</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="send_email">
                            <label class="form-check-label" for="send_email">إرسال نسخة بالبريد</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-send-check"></i> إرسال الإشعار الآن
                    </button>
                </div>
            </form>
        </div>
    </div> --}}
