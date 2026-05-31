<style>
    :root {
        --primary-dark: #0a2540;   /* كحلي غامق */
        --primary: #1a365d;        /* كحلي */
        --primary-light: #2a5699;  /* كحلي فاتح */
        --accent: #d4af37;         /* ذهبي */
        --light: #ffffff;
        --bg-light: #f8f9fa;
    }
    /* البطاقات الإحصائية */
    .stat-card {
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        padding: 20px;
        text-align: center;
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        color: var(--accent); /* النص بالذهبي */
    }
    .stat-card h5 {
        font-size: 16px;
        margin-bottom: 10px;
        color: var(--accent);
    }
    .stat-card h2 {
        font-weight: bold;
        color: var(--accent);
    }

    /* كروت الجدول */
    .category-card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 20px;
        border: 1px solid var(--primary);
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .category-icon {
        font-size: 22px;
        margin-left: 8px;
        color: var(--accent);
    }

    /* رأس الكارت والجدول */
    .card-header {
        background-color: var(--primary);
        color: var(--accent);
        font-weight: bold;
    }
    table thead {
        background-color: var(--primary-dark);
        color: var(--accent);
    }

    /* المودال */
    .modal-header {
        background-color: var(--primary);
        color: var(--accent);
    }

    /* الأزرار */
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
        color: var(--light);
    }
    .btn-primary:hover {
        background-color: var(--primary-light);
        border-color: var(--primary-light);
    }

    /* زر الإضافة */
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
</style>





    <!-- --- البطاقات الإحصائية --- -->
<div class="container mb-4">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>المديريات النشطة</h5>
                <h2 id="activeDirectorates">0</h2>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>المديريات غير النشطة</h5>
                <h2 id="inactiveDirectorates">0</h2>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>المفعلة حديثًا</h5>
                <h2 id="recentDirectorates">0</h2>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <h5>إجمالي المديريات</h5>
                <h2 id="totalDirectorates">0</h2>
            </div>
        </div>
    </div>
</div>




<!-- --- البحث والفلاتر --- -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-2 align-items-center">
            <!-- مربع البحث + زر البحث أزرق على الشمال -->
            <div class="col-md-8">
                <div class="input-group">
                    <button class="btn btn-primary" type="button" id="btnSearch">
                        <i class="bi bi-search"></i> بحث
                    </button>
                    <input type="text" class="form-control" id="searchByName" placeholder="ابحث باسم المديرية أو المحافظة...">
                </div>
            </div>

            <!-- الفلاتر -->
            <div class="col-md-4">
                <select class="form-select" id="statusFilter">
                    <option value="">جميع الحالات</option>
                    <option value="1">نشط</option>
                    <option value="0">غير نشط</option>
                </select>
            </div>
        </div>
    </div>
</div>

                    <!-- عرض المديريات -->
            <div class="row">
                <div class="col-12">
                    <div class="card category-card">
                        <div class="card-header text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="bi bi-buildings category-icon"></i>
                                قائمة المديريات
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>اسم المديرية</th>
                                            <th>المحافظة</th>
                                            <th>البريد الإلكتروني</th>
                                            <th>رقم الهاتف</th>
                                            <th>العنوان</th>
                                            <th>الحالة</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>تاريخ التحديث</th>
                                            <th width="15%">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody id="DirectorateTableBody">
                                        @include('modules.auth.Departments.Directorate_table', ['data' => $data ?? []])
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <!-- زر الإضافة -->
        <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#directorateModal">
            <i class="bi bi-plus-lg"></i>
        </button>
    </div>

    <!-- Modal لإضافة/ مديرية -->
    <div class="modal fade" id="directorateModal" tabindex="-1" aria-labelledby="directorateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة مديرية جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">اسم المديرية</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="governorate_id" class="form-label">المحافظة</label>
                            <select class="form-select select2-multiple" id="governorate_id" name="governorate_id" required></select>
                        </div>


                         <!--<input type="number" class="form-control" id="governorate_id" name="governorate_id" required>-->

                        <div class="col-md-6 mb-3">
                            <label for="contact_email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required  maxlength="9" oninput="if(this.value.length > 9) this.value = this.value.slice(0,9);" >
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">العنوان</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="is_active" class="form-label">الحالة</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>
                    </div>
                </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary btn-save-entity"
                    data-action="save"
                    data-form="#form_add"
                    data-url="add-Directorate_Ajax"
                    data-reload-container="#DirectorateTableBody"
                    data-reload-url="{{ route('reload-Directorate_table') }}"
                    data-modal="#directorateModal"
                    data-method="POST"
                    >حفظ</button>
                </div>
            </div>
        </div>

        <!-- زر التعديل -->
        <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#directorateModalLabel2">
            <i class="bi bi-plus-lg"></i>
        </button>
    </div>

            <!-- Modal لتعديل المديرية -->
     <div class="modal fade" id="editdirectorateModal" tabindex="-1" aria-labelledby="directorateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل المديرية </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                         <input type="hidden" name="id" value=""> <!-- هذا مهم جداً -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">اسم المديرية</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="governorate_id" class="form-label">المحافظة</label>
                            <select class="form-select select2-multiple" id="governorate_id_edit" name="governorate_id" required></select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="contact_email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required  maxlength="9" oninput="if(this.value.length > 9) this.value = this.value.slice(0,9);">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="address" class="form-label">العنوان</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="is_active" class="form-label">الحالة</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                        </div>
                    </div>
                </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary btn-update-entity"
                    data-action="edit"
                    data-form="#form_edit"
                    data-route="Directorate_update"
                    data-reload-container="#DirectorateTableBody"
                    data-reload-url="{{ route('reload-Directorate_table') }}"
                    data-modal="#editdirectorateModal"
                    data-method="POST"
                    >تعديل</button>
                </div>
            </div>
        </div>
    </div>

   @vite(['resources/js/layouts/ajax-crud.js'])




   <script>

  $(document).ready(function() {
        $.ajax({
            url: "/get_governorate",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#governorate_id");
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

      /////////////////////////تعديل المديريات///////////////////////
     $(document).ready(function() {
        $.ajax({
            url: "/get_governorate",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#governorate_id_edit");
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



$(document).ready(function() {

    // تحديث الإحصائيات للمديريات
    function updateDirectorateStats() {
        $.ajax({
            url: "{{ route('directorates.stats') }}",
            type: "GET",
            success: function(data) {
                $('#activeDirectorates').text(data.activeDirectorates);
                $('#inactiveDirectorates').text(data.inactiveDirectorates);
                $('#recentDirectorates').text(data.recentDirectorates);
                $('#totalDirectorates').text(data.totalDirectorates);
            },
            error: function(err) {
                console.error('حدث خطأ أثناء تحديث إحصائيات المديريات:', err);
            }
        });
    }

    // تحديث عند تحميل الصفحة
    updateDirectorateStats();

    // تحديث تلقائي بعد أي عملية (إضافة، تعديل، حذف)
    $(document).on('ajaxComplete', function() {
        updateDirectorateStats();
    });

    /////////////////////////// فلتر البحث ///////////////////////////
    function searchDirectorates() {
        let search = $('#searchByName').val();
        let status = $('#statusFilter').val();

        $.ajax({
            url: "{{ route('search-Directorate') }}",
            type: "GET",
            data: {
                name: search,
                is_active: status
            },
            success: function(response) {
                // إعادة تحميل جدول المديريات بالنتائج
                $('#DirectorateTableBody').html(response);
            },
            error: function(xhr, status, error) {
                console.error('حدث خطأ أثناء البحث:', error);
            }
        });
    }

    // بحث عند الضغط على زر البحث
    $('#btnSearch').click(function() {
        searchDirectorates();
    });

    // بحث تلقائي أثناء الكتابة أو تغيير الفلتر
    $('#searchByName, #statusFilter').on('input change', function() {
        searchDirectorates();
    });

});
</script>








    {{-- <script>
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
                const reloadContainer = '#DirectorateTableBody';
                const reloadUrl = '/index-Directorate_table';

                        $.ajax({
                            url: '/index-Directorate_table',
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
     --}}





    <!-- Modal لتأكيد الحذف -->
    {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد الحذف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذه المديرية؟ لا يمكن التراجع عن هذه العملية.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-danger">حذف</button>
                </div>
            </div>
        </div>
    </div> --}}

