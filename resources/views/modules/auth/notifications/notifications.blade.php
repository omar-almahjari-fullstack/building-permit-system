<meta name="csrf-token" content="{{ csrf_token() }}">


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
    <div class="container-fluid">
        <div class="row mb-3 align-items-center">
            <div class="col-md-6">
                <h3><i class="bi bi-megaphone" style="color: var(--accent);"></i> الإشعارات</h3>
                {{-- <a href="{{ route('notifications.create') }}" 
                   class="ajax-link btn-outline-primary btn-sm dark btn">
                    <i class="bi bi-plus-circle"></i> إنشاء إشعار جديد
                </a> --}}

                <!-- زر الإضافة -->
        <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#notificationModal">
            <i class="bi bi-plus-lg"></i>
        </button>


          <div class="col-md-6 text-start">
            <button class="btn btn-outline-primary btn-sm" id="btn-refresh">
                <i class="bi bi-arrow-clockwise"></i> تحديث
            </button>
            <button class="btn btn-outline-secondary btn-sm" id="btn-mark-all-read">
                <i class="bi bi-check-all"></i> تمييز الكل كمقروء
            </button>
        </div>

        </div>

        {{-- الفلاتر --}}
        <div class="row g-2 mb-4">
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="🔍 ابحث برقم أو محتوى">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option>كل الأنواع</option>
                    <option value="technical">تنبيه تقني</option>
                    <option value="modification">طلب تعديل</option>
                    <option value="rejected">إشعار رفض</option>
                    <option value="message">رسالة</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option>كل الحالات</option>
                    <option value="unread">غير مقروء</option>
                    <option value="read">تمت قراءته</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control">
            </div>
        </div>

        <table>
            <thead>
                
            </thead>
            <tbody id="notificationsTableBody">
                 @include('modules.auth.notifications.notifications_table', ['notifications' => $notifications ?? []])

            </tbody>
        </table>


        <!-- Modal الاشعارات -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة قسم جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    <div class="modal-body">
      <form id="form_add">
        @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="title">عنوان الإشعار:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="مثال: تعديل مطلوب في المخطط" required>
        </div>
        <div class="col-md-6">
            <label for="type">نوع الإشعار:</label>
            <select class="form-select" id="type" name="type" required>
                <option value="">اختر نوعاً</option>
                <option value="تنبيه تقني">تنبيه تقني</option>
                <option value="طلب تعديل">طلب تعديل</option>
                <option value="رفض">رفض</option>
                <option value="تنبيه موعد">تنبيه موعد</option>
                <option value="رسالة داخلية">رسالة داخلية</option>
                <option value="تنبيه مهم">تنبيه مهم</option>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <label for="description">الوصف التفصيلي:</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="أدخل تفاصيل الإشعار هنا..." required></textarea>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label for="related_to">ربط الإشعار بـ:</label>
            <select class="form-select" id="related_to" name="related_to">
                <option value="لا شيء">لا شيء</option>
                <option value="طلب">طلب</option>
                <option value="رخصة">رخصة</option>
                <option value="ملف">ملف</option>
                <option value="مشروع">مشروع</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="reference_id">رقم المرجع:</label>
            <input type="text" class="form-control" id="reference_id" name="reference_id" placeholder="مثال: 10234">
        </div>
        <div class="col-md-4">
            <label for="priority">الأولوية:</label>
            <select class="form-select" id="priority" name="priority">
                <option value="عادي">عادي</option>
                <option value="متوسط">متوسط</option>
                <option value="مرتفع">مرتفع</option>
                <option value="حرج">حرج</option>
            </select>
        </div>
    </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="scheduled_at">جدولة الإشعار:</label>
                <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="is_important" name="is_important" value="1">
                    <label class="form-check-label" for="is_important">تمييز الإشعار كمهم</label>
                </div>
                <div class="col-md-6">
                    <label for="expires_at">انتهاء الإشعار:</label>
                    <input type="datetime-local" class="form-control" id="expires_at" name="expires_at">
                </div>

            </div>
        </div>
    </form>
    
      </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary btn-save-entity"
                    data-action="save"
                    data-form="#form_add"
                    data-url="add-notifications_Ajax"
                    data-reload-container="#notificationsTableBody"
                    data-reload-url="{{ route('reload-notifications_table') }}"
                    data-modal="#notificationModal"
                    data-method="POST"
                    >حفظ</button>

                    {{-- <button type="button" class="btn btn-primary btn-save-entity"
                    data-action="save"
                    data-form="#form_add"
                    data-url="add-Department_Ajax"
                    data-reload-container="#departmentsTableBody"
                    data-reload-url="{{ route('reload-Department-table') }}"
                    data-modal="#departmentModal"
                    data-method="POST"
                    >حفظ</button> --}}
                </div>
            </div>
        </div>
    </div>

    </div>
</div>



<script>
          $(document).ready(function() {


            function reloadTable(containerSelector, reloadUrl) {
                $.ajax({
                    url: reloadUrl,
                    type: 'GET',
                    success: function (response) {
                        $(containerSelector).html(response);
                    },
                    error: function () {
                        alert('فشل في تحديث الجدول.');
                    }
                });
            }


                const method = 'GET';
                const reloadContainer = '#notificationsTableBody';
                const reloadUrl = '/index-notifications_table';

                        $.ajax({
                            url: '/index-notifications_table',
                            method: method,
                            success: function (response) {
                                // تحديث الجدول إذا وُجد
                                if (reloadContainer && reloadUrl) {
                                    $.get(reloadUrl, function (data) {
                                        $(reloadContainer).html(data);
                                    });
                                }
                            },
                            error: function (xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'خطأ!',
                                    text: xhr.responseJSON?.message || 'حدث خطأ أثناء العرض.'
                                });
                            }
                        });
               
                });
        
</script>


<script>
    $(document).ready(function() {

    // تحديث الجدول
    $('#btn-refresh').click(function() {
        $.ajax({
            url: '{{ route("reload-notifications_table") }}',
            type: 'GET',
            success: function(response) {
                $('#notificationsTableBody').html(response);
            },
            error: function() {
                Swal.fire('خطأ', 'فشل في تحديث الجدول.', 'error');
            }
        });
    });

    // تمييز الكل كمقروء
    $('#btn-mark-all-read').click(function() {
        $.ajax({
            url: '{{ route("notifications.mark_all_read") }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire('تم', response.message, 'success');
                // تحديث الجدول بعد التعديل
                $('#btn-refresh').click();
            },
            error: function() {
                Swal.fire('خطأ', 'فشل في تمييز الإشعارات.', 'error');
            }
        });
    });

});
</script>



@vite(['resources/js/layouts/ajax-crud.js'])


