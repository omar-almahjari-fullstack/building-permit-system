
    <style>
        :root {
            --primary-color: #1a237e;
            --primary-light: #35418b;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --success-color: #27ae60;
            --text-dark: #2c3e50;
            --text-medium: #555;
            --text-light: #7f8c8d;
            --border-color: #e0e0e0;
            --bg-light: #f8f9fa;
            --white: #fff;
        }

        .category-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            font-size: 24px;
            margin-left: 10px;
            color: var(--primary-color);
        }

        .action-btn {
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-left: 5px;
        }

        .add-btn {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 24px;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
        }

        .search-container {
            direction: ltr;
        }
    </style>

    <div class="container">
        <h1 class="text-center my-4">
            <i class="bi bi-diagram-3"></i> نظام إدارة الأقسام
        </h1>

           <!-- --- البطاقات الإحصائية --- -->

        <div class="container mb-4">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>الاقسام النشطة</h5>
                            <h2 id="activedepartments">0</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5>الاقسام غير النشطة</h5>
                            <h2 id="inactivedepartments">0</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5>المفعلة حديثًا</h5>
                            <h2 id="recentdepartments">0</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5>إجمالي الاقسام</h5>
                            <h2 id="totaldepartments">0</h2>
                        </div>
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

        <!-- عرض الأقسام -->
        <div class="row">
            <div class="col-12">
                <div class="card category-card">
                    <div class="card-header text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-diagram-3 category-icon"></i>
                            قائمة الأقسام
                        </h5>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>اسم القسم</th>
                                        <th>الوصف</th>
                                        <th>القطاع التابع له</th>
                                        <th>الحالة</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th width="15%">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody id="departmentsTableBody">
                                    <!-- بيانات ثابتة بدون JavaScript -->
                                     @include('modules.auth.Departments.Department_table', ['data' => $data ?? []])


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- زر الإضافة -->
        <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#departmentModal">
            <i class="bi bi-plus-lg"></i>
        </button>
    </div>

    <!-- Modal لإضافة/تعديل قسم -->
    <div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="departmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة قسم جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <form id="form_add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">اسم القسم</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">القطاع التابع له (المديرية)</label>
                            <select class="form-select select2-multiple" id="directorate_id" name="directorate_id" required></select>
                            {{-- <input type="number" class="form-control" id="directorate_id" name="directorate_id"> --}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">نشط</label>
                    </div>
                </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary btn-save-entity"
                    data-action="save"
                    data-form="#form_add"
                    data-url="add-Department_Ajax"
                    data-reload-container="#departmentsTableBody"
                    data-reload-url="{{ route('reload-Department_table') }}"
                    data-modal="#departmentModal"
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


      <!-- Modal لتعديل قسم -->
    <div class="modal fade" id="editdepartmentModal" tabindex="-1" aria-labelledby="departmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل قسم </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form id="form_edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">اسم القسم</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="directorate_id_edit">القطاع التابع له (المديرية)</label>
                            <select class="form-select select2-multiple" id="directorate_id_edit" name="directorate_id" required></select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الوصف</label>
                        <textarea class="form-control" id="edit_description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="edit_is_active" name="is_active" value="1">
                        <label class="form-check-label" for="edit_is_active">نشط</label>
                    </div>
                </form>

                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary btn-update-entity"
                    data-action="edit"
                    data-form="#form_edit"
                    data-route="Department_update"
                    data-reload-container="#departmentsTableBody"
                    data-reload-url="{{ route('reload-Department_table') }}"
                    data-modal="#editdepartmentModal"
                    data-method="POST"  <!-- POST بدل PUT -->
                >تعديل</button>
            </div>
            </div>
        </div>
    </div>

   @vite(['resources/js/layouts/ajax-crud.js'])



    <script>
        $(document).ready(function() {
        $.ajax({
            url: "/get_directorates",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#directorate_id");
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
        $.ajax({
            url: "/get_directorates",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#directorate_id_edit");
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
        // ========================== تحديث إحصائيات الاقسام ==========================
// $(document).ready(function() {
//     function updateDirectorateStats() {
//         $.ajax({
//             url: "{{ route('departments.stats') }}", // روت الكنترولر للإحصائيات
//             type: "GET",
//             dataType: "json",
//             success: function(data) {
//                 $('#activedepartments').text(data.activedepartments);
//                 $('#inactivedepartments').text(data.inactivedepartments);
//                 $('#recentdepartments').text(data.recentdepartments);
//                 $('#totaldepartments').text(data.totaldepartments);
//             },
//             error: function(xhr, status, error) {
//                 console.error('❌ حدث خطأ أثناء تحديث إحصائيات الاقسام:', error);
//             }
//         });
//     }

//     // تحديث عند تحميل الصفحة
//     updateDirectorateStats();

//     // تحديث تلقائي بعد أي عملية إضافة، تعديل، حذف
//     $(document).on('ajaxComplete', function() {
//         updateDirectorateStats();
//     });


//     // ========================== فلتر البحث ==========================
//     function searchdepartments() {
//         let search = $('#searchByName').val().trim();   // نص البحث
//         let status = $('#statusFilter').val();          // حالة الفلتر

//         $.ajax({
//             url: "{{ route('search-department') }}",  // روت البحث في الكنترولر
//             type: "GET",
//             data: {
//                 name: search,
//                 is_active: status
//             },
//             success: function(response) {
//                 // إعادة تحميل جدول المديريات بالنتائج
//                 $('#departmentsTableBody').html(response);
//             },
//             error: function(xhr, status, error) {
//                 console.error('❌ حدث خطأ أثناء البحث:', error);
//             }
//         });
//     }

//     // البحث عند الضغط على زر البحث
//     $('#btnSearch').on('click', function() {
//         searchdepartments();
//     });

//     // البحث تلقائي أثناء الكتابة أو تغيير الفلتر
//     $('#searchByName, #statusFilter').on('input change', function() {
//         searchdepartments();
//     });

// });

    </script>
