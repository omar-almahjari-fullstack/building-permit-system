
    @vite(['resources/css/requests.css'])
    <style>
        .modal-backdrop {
            z-index: 1040 !important;
            /* القيمة الافتراضية عادةً */
        }

        .modal {
            z-index: 1050 !important;
            /* يجب أن تكون أعلى من الـ backdrop */
        }
    </style>


    <div class="content_Citizen" dir="ltr">
        <div class="contener_Citizen">

            <div class="person">
                <h5>بيانات مقدم الطلب </h5>
                <i class="fa-solid fa-address-card"></i>
            </div>

            <div class="search">
                <div class="search_1">
                    <label for="option1">بحث برقم الهوية</label>
                    <input type="radio" name="radio" id="option1">
                    <label for="option2">بحث ب الاسم</label>
                    <input type="radio" name="radio" id="option2">
                </div>


                <div class="search_1 row">

                    <div class="input-group col-xl-4 mb-2">
                        <input type="text" class="form-control" placeholder="بحث بالاسم" name="name"
                            id="searchByName" />
                    </div>

                    <div class="input-group col-xl-4 mb-2">
                        <input type="text" class="form-control" placeholder="بحث برقم الهوية" name="identity_number"
                            id="searchByIdentity" />
                    </div>

                    <div class="input-group col-xl-4 mb-2">
                        <button type="button" class="btn btn-outline-primary w-100" id="searchBtn"
                            data-reload-container="#usersTableBody" data-reload-url="{{ route('search-users') }}">
                            بحث <i class="fas fa-search ms-2"></i>
                        </button>
                    </div>

                </div>


                <button type="button" class="btn " data-toggle="modal" data-target="#AddModal"
                    data-whatever="@getbootstrap">اضافة مستفيد جديد <i class="fas fa-user-plus"></i></button>
            </div>

            <!-- جدول البيانات -->

            <table class="table table-hover table-striped text-right">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">#</th>
                        <th>صوره المستفيد</th>
                        <th>الاسم</th>
                        <th>المديرية</th>
                        <th>نوع الهوية</th>
                        <th>رقم الهوية</th>
                        <th>تاريخ الانشاء</th>
                        <th width="15%">الإجراءات</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">

                    {{-- @if ($data)
                        @include('modules.auth.requests.create.Citizen_table', ['data' => $data])
                    @else --}}

                    @include('modules.auth.requests.create.Citizen_table', ['data' => $data ?? []])



                    {{-- ,['data'=> $data] --}}
                </tbody>
            </table>


            {{-- -addModel--- --}}

            <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <div class="">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة مستفيد</h5>
                            </div>
                        </div>

                        <div class="modal-body">

                            {{-- form - --}}

                            <form class="" id="form_add" enctype="multipart/form-data" method="POST">
                                <div class="form-row ">
                                    <div class="col-md-11" style="margin: 0 15px 11px 0">
                                        <div class="bac mar_wid">
                                            <div class="im">
                                                <div class="">
                                                    <label class="im_la">الصورة الشخصية 4*6</label>
                                                </div>
                                            </div>
                                            <div class="body_img">
                                                <div class="container mt-1 text-center">
                                                    <label class="image-upload">
                                                        <input type="file" id="imageInput" name="personal_photo"
                                                            accept="image/*">
                                                        <i class="fas fa-camera"></i>
                                                        <img id="previewImage" alt="صورة المعاينة">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom01">اسم المستفيد</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                name="name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom02">مديرية سكن المستفيد</label>
                                            <select class="custom-select" name="directorate" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                <option value="1">السبعين</option>
                                                <option value="2">الثوره</option>
                                                <option value="3">بني الحارث</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom01">نوع الهوية</label>
                                            <select class="custom-select" name="identity_type"
                                                id="inputGroupSelect01" required>
                                                <option selected disabled value="">اختر نوع الهوية...</option>
                                                <option value="بطاقة شخصية">بطاقة شخصية</option>
                                                <option value="جواز">جواز</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom02">رقم الهوية</label>
                                            <input type="tel" class="form-control" name="identity_number"
                                                id="validationCustom02" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom02"> صورة بطاقة المستفيد الشخصية (pdf)</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="id_card_pdf"
                                                    id="inputGroupFile02" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom04">الموبايل</label>
                                            <input type="tel" class="form-control" name="mobile"
                                                id="validationCustom03" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom03">البريد الالكتروني</label>
                                            <input type="email" class="form-control" name="email"
                                                id="validationCustom03" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="message-text" class="col-form-label">العنوان</label>
                                            <textarea class="form-control" name="address" id="message-text"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="button" class="btn btn-primary btn-save-entity" data-action="save"
                                    data-form="#form_add" data-url="add-user_Ajax"
                                    data-reload-container="#usersTableBody"
                                    data-reload-url="{{ route('reload-users-table') }}" data-modal="#AddModal"
                                    data-method="POST">
                                    حفظ
                                </button>

                            </form>

                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                            form.addEventListener('submit', function(event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>

                            {{-- end form - --}}
                        </div>

                    </div>
                </div>
            </div>
            {{-- -end_Model--- --}}


            {{-- -edit-Model--- --}}

            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="editModalLabel">تعديل مستفيد</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form class="" id="form_edit" enctype="multipart/form-data" method="POST">

                                <input type="hidden" id="id" name="id">

                                <div class="form-row ">
                                    <div class="col-md-11" style="margin: 0 15px 11px 0">
                                        <div class="bac mar_wid">
                                            <div class="im">
                                                <div class="">
                                                    <label class="im_la">الصورة الشخصية 4*6</label>
                                                </div>
                                            </div>
                                            <div class="body_img">
                                                <div class="container mt-1 text-center">
                                                    <label class="image-upload">
                                                        <input type="file" id="imageInput" name="personal_photo"
                                                            accept="image/*">
                                                        <i class="fas fa-camera"></i>
                                                        <img id="previewImageEdit" name="personal_photo" src=""
                                                            class="img-thumbnail mb-3 rounded"style="max-width: 100px;">
                                                        {{-- <img id="previewImageEdit" name="personal_photo"
                                                            src="" alt="صورة المعاينة"> --}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom01">اسم المستفيد</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                name="name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom02">مديرية سكن المستفيد</label>
                                            <select class="custom-select" name="directorate" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                <option value="1">السبعين</option>
                                                <option value="2">الثوره</option>
                                                <option value="3">بني الحارث</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom01">نوع الهوية</label>
                                            <select class="custom-select" name="identity_type"
                                                id="inputGroupSelect01" required>
                                                <option selected disabled value="">اختر نوع الهوية...</option>
                                                <option value="بطاقة شخصية">بطاقة شخصية</option>
                                                <option value="جواز">جواز</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom02">رقم الهوية</label>
                                            <input type="tel" class="form-control" name="identity_number"
                                                id="validationCustom02" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom02"> صورة بطاقة المستفيد الشخصية (pdf)</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="id_card_pdf"
                                                    id="inputGroupFile02" accept="application/pdf">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom04">الموبايل</label>
                                            <input type="tel" class="form-control" name="mobile"
                                                id="validationCustom03" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="validationCustom03">البريد الالكتروني</label>
                                            <input type="email" class="form-control" name="email"
                                                id="validationCustom03" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="bac">
                                            <label for="message-text" class="col-form-label">العنوان</label>
                                            <textarea class="form-control" name="address" id="message-text"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">الغاء</button>
                                <button type="button" class="btn btn-primary btn-update-entity" data-action="edit"
                                    data-form="#form_edit" data-url="users_update"
                                    data-reload-container="#usersTableBody"
                                    data-reload-url="{{ route('reload-users-table') }}" data-modal="#editModal"
                                    data-method="POST">
                                    تعديل
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            {{-- -end_Model--- --}}







        </div>
    </div>

      @vite(['resources/js/layouts/ajax-crud.js'])


            {{-- -الصوره-حقل --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
            <script>
                document.getElementById("imageInput").addEventListener("change", function(event) {
                    let file = event.target.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            let img = document.getElementById("previewImage");
                            img.src = e.target.result;
                            img.style.display = "block";
                            document.querySelector(".image-upload i").style.display = "none";
                        }
                        reader.readAsDataURL(file);
                    }
                });
            </script>

