<style>
    :root {
        --primary-dark: #0a2540;   /* كحلي غامق */
        --primary: #1a365d;        /* كحلي */
        --primary-light: #2a5699;  /* كحلي فاتح */
        --accent: #d4af37;         /* ذهبي */
        --light: #ffffff;
        --bg-light: #f8f9fa;
    }

    body {
        font-family: 'Tajawal', sans-serif;
        background-color: var(--bg-light);
        color: var(--primary-dark);
        padding-bottom: 50px;
    }

    /* ====== الهيدر ====== */
    .header_1 {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        color: var(--accent);
        padding: 2rem 0;
        margin-bottom: 2rem;
        border-radius: 0 0 10px 10px;
        text-align: center;
    }

    /* ====== الكروت ====== */
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        margin-bottom: 20px;
        border: 1px solid var(--primary);
    }

    .card-header {
        background-color: var(--primary);
        color: var(--accent);
        font-weight: bold;
        border-radius: 10px 10px 0 0 !important;
    }

    /* ====== الجدول ====== */
    .table th {
        background-color: var(--primary-dark);
        color: var(--accent);
        font-weight: 700;
        border-top: none;
    }

    /* ====== البطاقات الإحصائية ====== */
    .card.bg-primary,
    .card.bg-success,
    .card.bg-warning,
    .card.bg-info {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary)) !important;
        color: var(--accent) !important;
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    .card .card-title,
    .card h2 {
        color: var(--accent) !important;
    }
    .card i {
        color: var(--accent) !important;
    }

    /* ====== الأزرار ====== */
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        color: var(--light);
    }
    .btn-primary:hover {
        background-color: var(--primary-light);
        border-color: var(--primary-light);
    }

    .btn-light {
        background-color: var(--light);
        border: 1px solid var(--primary);
        color: var(--primary-dark);
    }

    /* ====== زر الإضافة ====== */
    .add-btn {
        position: fixed;
        bottom: 30px;
        left: 30px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 24px;
        z-index: 1000;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        background: linear-gradient(135deg, var(--accent), #f1c40f);
        color: var(--primary-dark);
        border: none;
    }

    /* ====== المودال ====== */
    .modal-header {
        background-color: var(--primary);
        color: var(--accent);
    }
</style>


<!-- الهيدر -->
<div class="header_1">
    <div class="container">
        <h1><i class="bi bi-people-fill"></i>  إدارة المستخدمين</h1>
        <p class="lead">إدارة بيانات المستخدمين والصلاحيات في النظام</p>
    </div>
</div>

<div class="container">
    <!-- إحصائيات سريعة -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">المستخدمون المفعلون</h5>
                            <h2 class="mb-0" id="activeUsers">0</h2>
                        </div>
                        <i class="bi bi-person-check-fill" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">الحسابات المؤكدة</h5>
                            <h2 class="mb-0" id="verifiedUsers">0</h2>
                        </div>
                        <i class="bi bi-envelope-check-fill" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content بين align-items-center">
                        <div>
                            <h5 class="card-title">حسابات مقفلة</h5>
                            <h2 class="mb-0" id="lockedUsers">0</h2>
                        </div>
                        <i class="bi bi-lock-fill" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">إجمالي المستخدمين</h5>
                            <h2 class="mb-0" id="totalUsers">0</h2>
                        </div>
                        <i class="bi bi-people-fill" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- أدوات البحث والتصفية -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <!-- مربع البحث + زر البحث -->
            <div class="col-md-8">
                <div class="d-flex">
                    <button class="btn btn-primary me-2" id="searchBtn">
                        <i class="bi bi-search"></i> بحث
                    </button>
                    <input type="text" class="form-control" id="searchInput"
                           placeholder="ابحث بالاسم، اسم المستخدم أو البريد الإلكتروني...">
                </div>
            </div>

            <!-- الفلاتر -->
            <div class="col-md-4">
                <div class="d-flex">
                    <select class="form-select me-2" id="departmentFilter">
                        <option value="">جميع الأقسام</option>
                        <option value="1">قسم التراخيص</option>
                        <option value="2">قسم الرقابة</option>
                        <option value="3">قسم الشؤون الفنية </option>
                    </select>
                    <select class="form-select" id="statusFilter">
                        <option value="">جميع الحالات</option>
                        <option value="1">مفعل</option>
                        <option value="0">غير مفعل</option>
                        <option value="locked">مقفل</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- جدول المستخدمين -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-table"></i> قائمة المستخدمين</h5>
        <div>
            <button class="btn btn-sm btn-light" id="exportBtn"><i class="bi bi-download"></i> تصدير</button>
            <button class="btn btn-sm btn-light ms-2" id="printBtn"><i class="bi bi-printer"></i> طباعة</button>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>المستخدم</th>
                    <th>اسم المستخدم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الهاتف</th>
                    <th>القسم</th>
                    <th>الحالة</th>
                    <th>تاريخ الإنشاء</th>
                    <th>تاريخ التحديث</th>
                    <th width="120px">الإجراءات</th>
                </tr>
                </thead>
                <tbody id="usersTableBody">
                    @include('modules.auth.Departments.users1_table', ['data' => $data ?? []])
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- زر الإضافة -->
<button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#userModal">
    <i class="bi bi-plus-lg"></i>
</button>

<!-- Modal لإضافة مستخدم -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة مستخدم جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="add_error_messages"></div>
                <form id="form_add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- الاسم الكامل -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">الإسم الكامل</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <!-- اسم المستخدم -->
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">أسم المستخدم</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <!-- رقم الهاتف (أرقام فقط) -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required
                                   inputmode="numeric" required  maxlength="9" oninput="if(this.value.length > 9) this.value = this.value.slice(0,9);">
                        </div>

                                              <!-- القسم -->
                        <div class="col-md-6 mb-3">
                            <label for="role_id" class="form-label">الادوار</label>
                            <select class="form-select" id="user_add" name="role_id" required>
                            </select>
                        </div>

                        <!-- القسم -->
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">القسم</label>
                            <select class="form-select" id="department" name="department_id" required>
                            </select>
                        </div>


                        <!-- الحالة -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">الحالة</label>
                            <select class="form-select" id="status" name="is_active" required>
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>

                        {{-- <!-- كلمة المرور -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span class="input-group-text password-toggle" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <!-- تأكيد كلمة المرور -->
                        <div class="col-md-6 mb-3">
                            <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required>
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary btn-save-entity"
                        data-action="save"
                        data-form="#form_add"
                        data-url="add-users_Ajax"
                        data-reload-container="#usersTableBody"
                        data-reload-url="{{ route('reload-users_table') }}"
                        data-modal="#userModal"
                        data-method="POST"
                >حفظ المستخدم</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal لتعديل مستخدم -->
<div class="modal fade" id="edituserModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل بيانات المستخدم</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="edit_error_messages" style="display: none;"></div>
                <form id="form_edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit_id" name="id">
                    <div class="row">
                        <!-- الاسم الكامل -->
                        <div class="col-md-6 mb-3">
                            <label for="name_edit" class="form-label">الاسم الكامل</label>
                            <input type="text" class="form-control" id="name_edit" name="name" required>
                        </div>

                        <!-- اسم المستخدم -->
                        <div class="col-md-6 mb-3">
                            <label for="username_edit" class="form-label">اسم المستخدم</label>
                            <input type="text" class="form-control" id="username_edit" name="username" required>
                        </div>

                        <!-- البريد الإلكتروني -->
                        <div class="col-md-6 mb-3">
                            <label for="email_edit" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email_edit" name="email" required>
                        </div>

                        <!-- رقم الهاتف (أرقام فقط) -->
                        <div class="col-md-6 mb-3">
                            <label for="phone_edit" class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-control" id="phone_edit" name="phone" required
                                   inputmode="numeric" pattern="\d*" maxlength="20"
                                   oninput="this.value=this.value.replace(/\\D/g,'')">
                        </div>

                                              <!-- القسم -->
                        <div class="col-md-6 mb-3">
                            <label for="role_id" class="form-label">الادوار</label>
                            <select class="form-select" id="user_edit" name="role_id" required>
                            </select>
                        </div>

                        <!-- القسم (يُحمّل من الجدول) -->
                        <div class="col-md-6 mb-3">
                            <label for="department_edit" class="form-label">القسم</label>
                            <select class="form-select" id="department_edit" name="department_id" required>
                            </select>
                        </div>

                        <!-- الحالة -->
                        <div class="col-md-6 mb-3">
                            <label for="status_edit" class="form-label">الحالة</label>
                            <select class="form-select" id="status_edit" name="is_active" required>
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" id="btn_update_user">تعديل المستخدم</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal لتأكيد الحذف -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تأكيد الحذف</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد أنك تريد حذف هذا المستخدم؟ لا يمكن التراجع عن هذه العملية.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger">حذف المستخدم</button>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/layouts/ajax-crud.js'])

<script>
    // حفظ الإدارات مؤقتًا لإعادة الاستخدام
    let departmentsCache = [];

    // تحميل الإدارات لنموذجي الإضافة والتعديل
    function loadDepartmentsInto(selectId, selectedValue = null) {
        const $select = $(selectId);
        $select.empty();
        $select.append('<option value="">اختر القسم...</option>');
        departmentsCache.forEach(function (item) {
            const selected = (String(item.id) === String(selectedValue)) ? 'selected' : '';
            $select.append('<option value="' + item.id + '" ' + selected + '>' + item.name + '</option>');
        });
    }

    $(document).ready(function() {
        $.ajax({
            url: "/department",
            type: "GET",
            dataType: "json",
            success: function(data) {
                departmentsCache = data || [];
                // املأ قوائم الإضافة والتعديل
                loadDepartmentsInto("#department");
                loadDepartmentsInto("#department_edit");
            },
            error: function() {
                // في حالة الخطأ، اترك القوائم فارغة مع خيار افتراضي
                $("#department, #department_edit").html('<option value="">تعذر تحميل الأقسام</option>');
            }
        });
    });

    // // إظهار/إخفاء كلمة المرور
    // document.addEventListener('DOMContentLoaded', function() {
    //     const toggle = document.getElementById('togglePassword');
    //     if (toggle) {
    //         toggle.addEventListener('click', function() {
    //             const passwordInput = document.getElementById('password');
    //             const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    //             passwordInput.setAttribute('type', type);
    //             const eyeIcon = this.querySelector('i');
    //             eyeIcon.classList.toggle('bi-eye');
    //             eyeIcon.classList.toggle('bi-eye-slash');
    //         });
    //     }
    // });
</script>

<script>
    // إحصائيات المستخدمين
    $(document).ready(function() {
        function updateStats() {
            $.ajax({
                url: "{{ route('users.stats') }}",
                type: "GET",
                success: function(data) {
                    $('#activeUsers').text(data.activeUsers);
                    $('#verifiedUsers').text(data.verifiedUsers);
                    $('#lockedUsers').text(data.lockedUsers);
                    $('#totalUsers').text(data.totalUsers);
                }
            });
        }
        updateStats();
        $(document).on('ajaxComplete', function() { updateStats(); });
    });
</script>

<script>
    // البحث والتصفية
    $(document).ready(function() {
        function searchUsers() {
            let search = $('#searchInput').val();
            let department = $('#departmentFilter').val();
            let status = $('#statusFilter').val();

            // مرر فقط 0/1 للحالة، وتجاهل "locked"
            if (status !== '' && status !== '0' && status !== '1') {
                status = '';
            }

            $.ajax({
                url: "{{ route('search-users') }}",
                type: "GET",
                data: {
                    name: search,
                    department_id: department,
                    is_active: status
                },
                success: function(response) {
                    $('#usersTableBody').html(response);
                }
            });
        }

        $('#searchBtn').click(function() { searchUsers(); });
        $('#searchInput, #departmentFilter, #statusFilter').on('input change', function() {
            searchUsers();
        });
    });






    $(document).ready(function() {
        $.ajax({
            url: "/get_role",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#user_edit");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        $.ajax({
            url: "/get_role",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#user_add");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });
    });
</script>




<script>
    // تنظيف المودال/backdrop لتجنب بقاء الشاشة مظلمة
    function cleanModalArtifacts() {
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open').css({ overflow: '', paddingRight: '' });
    }
    $(document).on('hidden.bs.modal', '.modal', function () {
        cleanModalArtifacts();
    });

    // تفعيل زر التعديل: جلب البيانات وفتح المودال
    $(document).on('click', '.edit-record-btn', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const url = `/users_get/${id}`;

        $.get(url)
            .done(function (user) {
                // املأ قائمة الأقسام (إن تأخّر تحميل الكاش)
                if (!departmentsCache || departmentsCache.length === 0) {
                    $.getJSON('/department', function(data) {
                        departmentsCache = data || [];
                        loadDepartmentsInto('#department_edit', user.department_id);
                    });
                } else {
                    loadDepartmentsInto('#department_edit', user.department_id);
                }

                $('#edit_id').val(user.id);
                $('#name_edit').val(user.name);
                $('#username_edit').val(user.username);
                $('#email_edit').val(user.email);
                $('#phone_edit').val(user.phone);
                $('#status_edit').val(String(user.is_active));

                // اخفِ رسائل الأخطاء السابقة
                $('#edit_error_messages').hide().empty();
                $('#form_edit .is-invalid').removeClass('is-invalid');
                $('#form_edit .invalid-feedback').remove();

                cleanModalArtifacts();
                const el = document.getElementById('edituserModal');
                const modal = bootstrap.Modal.getOrCreateInstance(el);
                modal.show();
            })
            .fail(function (xhr) {
                console.error('فشل جلب بيانات المستخدم', xhr);
                alert('فشل في جلب بيانات المستخدم');
            });
    });

    function showEditErrors(errors) {
        // تنظيف سابق
        const $form = $('#form_edit');
        $form.find('.is-invalid').removeClass('is-invalid');
        $form.find('.invalid-feedback').remove();

        let msgs = [];
        Object.keys(errors || {}).forEach(function (field) {
            const fieldErrors = errors[field];
            if (Array.isArray(fieldErrors) && fieldErrors.length) {
                msgs = msgs.concat(fieldErrors);
                // وسم الحقل بخطأ
                const $input = $form.find('[name="'+field+'"]');
                if ($input.length) {
                    $input.addClass('is-invalid');
                    const feedback = $('<div class="invalid-feedback"></div>').text(fieldErrors[0]);
                    // إن كان Select داخل div، ضع الرسالة بعده مباشرة
                    if ($input.closest('.mb-3').length) {
                        $input.after(feedback);
                    } else {
                        $input.parent().append(feedback);
                    }
                }
            }
        });

        if (msgs.length) {
            $('#edit_error_messages')
                .html('<ul class="mb-0"><li>' + msgs.join('</li><li>') + '</li></ul>')
                .show();
        } else {
            $('#edit_error_messages').hide().empty();
        }
    }

    // حفظ التعديل
    $(document).on('click', '#btn_update_user', function (e) {
        e.preventDefault();

        const $form = $('#form_edit');
        const id = $('#edit_id').val();
        const url = `/users_update/${id}`;
        const fd = new FormData($form[0]);

        $.ajax({
            url: url,
            method: 'POST', // Route::match(['put','post'], ...) إن رغبت
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .done(function (resp) {
             Swal.fire({
                title: 'تم التعديل',
                text: 'تم تعديل البيانات بنجاح',
                icon: 'success',
                timer: 1200,
                showConfirmButton: false,
                timerProgressBar: true,
                width: '300px'
            });
            // عرض رسالة الخادم الأصلية (نجاح/فشل)
            const message = resp && resp.message ? resp.message : 'تم تعديل المستخدم بنجاح';
            // إعادة تحميل الجدول ثم إغلاق المودال
            $('#usersTableBody').load("{{ route('reload-users_table') }}", function () {
                const el = document.getElementById('edituserModal');
                const modal = bootstrap.Modal.getInstance(el);
                if (modal) modal.hide();
                cleanModalArtifacts();

            });

        })
        .fail(function (xhr) {
            if (xhr.status === 422) {
                const json = xhr.responseJSON || {};
                const errs = json.errors || {};
                showEditErrors(errs);
            } else {
                alert('فشل تحديث المستخدم');
            }
            // لا نترك الشاشة مظلمة
            const el = document.getElementById('edituserModal');
            const modal = bootstrap.Modal.getInstance(el);
            if (modal) modal.show(); // أبقه مفتوحاً لعرض الأخطاء
        });
    });
</script>
