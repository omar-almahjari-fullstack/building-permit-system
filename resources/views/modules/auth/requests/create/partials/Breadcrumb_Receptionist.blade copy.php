<style>
    :root {
        --primary-blue: #1d2d44;
        --secondary-blue: #2c5282;
        --gold-accent: #d69e2e;
        --success-green: #2f855a;
        --light-gray: #f7fafc;
        --medium-gray: #e2e8f0;
    }


    .process-container {
        background-color: rgba(255, 255, 255, 0.726);
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.021);
        padding: 2rem;

        border: 1px solid var(--medium-gray);
    }

    .process-stepper {
        position: fixed;
        top: 20;
        display: flex;
        justify-content: space-between;

        margin-bottom: 2px;
        min-width: 400px;
        width: 82%;

        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--medium-gray);
        height: 85px;
        z-index: 1000;

    }

    .process-line {
        position: absolute;
        top: 25px;
        right: 0;
        left: 0;
        height: 3px;
        background-color: var(--medium-gray);
        z-index: 1;
        border-radius: 3px;
    }

    .process-fill {
        position: absolute;
        top: 25px;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--success-green), var(--gold-accent));
        z-index: 2;
        transition: width 0.6s cubic-bezier(0.65, 0, 0.35, 1);
        border-radius: 3px;
        box-shadow: 0 2px 8px rgba(47, 133, 90, 0.3);
    }

    .process-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 3;
        width: calc(100% / 2);
        margin-top: 4px;
    }

    .step-bubble {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: white;
        border: 3px solid var(--medium-gray);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 5px;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .step-bubble::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .process-step.completed .step-bubble {
        background-color: var(--success-green);
        border-color: rgba(47, 133, 90, 0.2);
        color: white;
        transform: scale(1.1);
    }

    .process-step.active .step-bubble {
        border-color: var(--gold-accent);
        background-color: white;
        color: var(--primary-blue);
        transform: scale(1.1);
        animation: pulse 2s infinite;
    }

    .process-step.active .step-bubble::before {
        opacity: 1;
    }

    .step-icon {
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .process-step.completed .step-icon {
        transform: scale(1.2);
    }

    .step-title {
        font-size: 0.65rem;
        font-weight: 600;
        color: #718096;
        text-align: center;
        transition: all 0.4s ease;
        position: relative;
    }

    .process-step.completed .step-title,
    .process-step.active .step-title {
        color: var(--primary-blue);
        transform: translateY(5px);
    }

    .process-step.active .step-title {
        font-weight: 700;
    }

    .step-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background-color: var(--gold-accent);
        transition: width 0.3s ease;
    }

    .process-step.active .step-title::after {
        width: 20px;
    }

    .step-content {
        display: none;
        animation: fadeInUp 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .step-content.active {
        display: block;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(214, 158, 46, 0.4);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(214, 158, 46, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(214, 158, 46, 0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn-gold {
        background: linear-gradient(135deg, var(--gold-accent), #b7791f);
        color: white;
        border: none;
        padding: 0.6rem 1.8rem;
        font-weight: 600;
        border-radius: 6px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(214, 158, 46, 0.3);
    }

    .btn-gold:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(214, 158, 46, 0.4);
        color: white;
    }

    .btn-outline-blue {
        background-color: white;
        color: var(--primary-blue);
        border: 2px solid var(--primary-blue);
        padding: 0.6rem 1.8rem;
        font-weight: 600;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-outline-blue:hover {
        background-color: var(--light-gray);
        color: var(--primary-blue);
    }

    .nav-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--medium-gray);
    }

    .completion-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: var(--success-green);
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        border: 2px solid white;
        opacity: 0;
        transform: scale(0);
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 4;
    }

    .process-step.completed .completion-badge {
        opacity: 1;
        transform: scale(1);
        animation: bounceIn 0.6s ease-out;
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        60% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(1);
        }
    }

    .official-icon {
        font-size: 1.8rem;
        color: var(--primary-blue);
        margin-bottom: 1rem;
    }

    .form-section {
        background-color: var(--light-gray);
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid var(--medium-gray);
    }

    .section-title {
        color: var(--primary-blue);
        border-bottom: 1px solid var(--medium-gray);
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
</style>

<style>
    .process-controls {
        display: flex;
        align-items: center;
        gap: 20px;
        width: 600px;
    }

    .request-info {
        display: flex;
        align-items: center;
        background-color: var(--light-gray);
        padding: 8px 15px;
        border-radius: 20px;
        gap: 10px;
        margin-top: 20px;
    }

    .request-info i {
        color: var(--accent-color);
        font-size: 1.2rem;
    }

    .request-label {
        font-size: 0.85rem;
        color: var(--dark-gray);
    }

    .request-number {
        font-weight: 700;
        color: var(--primary-color);
        margin-right: 5px;
    }

</style>

{{-- <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>
 --}}



<div class="process-stepper">
    <div class="process-line"></div>
    <div class="process-fill" style="width: 14.28%;"></div>

    <!-- المراحل السبع -->



    <div class="process-step active" data-step="1">
        <div class="step-bubble">
            <i class="bi bi-person-vcard step-icon"></i>
        </div>
        <span class="step-title">المواطن</span>
    </div>

    <div class="process-step" data-step="2">
        <div class="step-bubble">
            <i class="bi bi-send-check step-icon"></i>
        </div>
        <span class="step-title">الطلب</span>
    </div>

    <div class="process-step" data-step="3">
        <div class="step-bubble">
            <i class="bi bi-file-earmark-text step-icon"></i>
        </div>
        <span class="step-title">بيانات الرخصة</span>
    </div>

    <div class="process-step completed" data-step="4">
        <div class="step-bubble">
            <i class="bi bi-paperclip step-icon"></i>
            <span class="completion-badge"><i class="bi bi-check"></i></span>
        </div>
        <span class="step-title">المرفقات</span>
    </div>

    <div class="process-step completed active" data-step="5">
                <div class="step-bubble">
            <i class="fas fa-paper-plane me-2"></i>
            <span class="completion-badge"><i class="bi bi-check"></i></span>
        </div>
        <span class="step-title">ارسال الطلب</span>
    </div>

    <div class="process-step completed active" data-step="6">
        <div class="step-bubble">
            <i class="bi bi-house-gear step-icon"></i>
            <span class="completion-badge"><i class="bi bi-check"></i></span>
        </div>
        <span class="step-title">مكونات البناء</span>
    </div>

    <div class="process-step" data-step="7">
        <div class="step-bubble">
            <i class="bi bi-rulers step-icon"></i>
        </div>
        <span class="step-title">الأبعاد</span>
    </div>
{{--

    <div class="process-step" data-step="7">
        <div class="step-bubble">
            <i class="bi bi-calculator step-icon"></i>
        </div>
        <span class="step-title">احتساب الرسوم</span>
    </div> --}}

        <div class="process-step completed active" data-step="8">
                <div class="step-bubble">
            <i class="fas fa-paper-plane me-2"></i>
            <span class="completion-badge"><i class="bi bi-check"></i></span>
        </div>
        <span class="step-title">ارسال الطلب</span>
    </div>

    <div class="process-controls">
        <div class="request-info" style=" position: fixed; top: 45px; left: 15px; display: flex;">
            <i class="bi bi-file-earmark-text"></i>
            <div style=" display: flex;">
                <span class="request-label">رقم الطلب:</span>
                <span class="request-number" id="request-number" data-id="{{ $id }}">RQ165</span>

            </div>
        </div>

        <button class="btn btn-outline-blue " style="display: flex ;margin: 30px 0 0 2px;padding: 2px;" id="prevBtn">
            <i class="bi bi-arrow-right"></i> السابق
        </button>
        <button class="btn btn-gold" id="nextBtn" style="display: flex ;margin: 30px 0 0 2px;padding: 3px 7px;">
            حفظ الطلب <i class="bi bi-arrow-left"></i>
        </button>
    </div>

</div>



<main class="">
    <div class="process-container ">

    <div id="Breadcrumb_Receptionist">

        <!-- محتوى المرحلة الحالية -->
        <div class="step-content active" id="step1">
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
                            {{-- <label for="option1">بحث برقم الهوية</label>
                            <input type="radio" name="radio" id="option1">
                            <label for="option2">بحث ب الاسم</label>
                            <input type="radio" name="radio" id="option2"> --}}
                        </div>


                        <div class="search_1 row">

                            <div class="input-group col-xl-4 mb-2">
                                <input type="text" class="form-control" placeholder="بحث بالاسم" name="name"
                                    id="searchByName" />
                            </div>

                            <div class="input-group col-xl-4 mb-2">
                                <input type="text" class="form-control" placeholder="بحث برقم الهوية"
                                    name="identity_number" id="searchByIdentity" />
                            </div>

                            <div class="input-group col-xl-4 mb-2">
                                <button type="button" class="btn btn-outline-primary w-100" id="searchBtn"
                                    data-reload-container="#usersTableBody"
                                    data-reload-url="{{ route('search-beneficiaries') }}">
                                    بحث <i class="fas fa-search ms-2"></i>
                                </button>
                            </div>

                        </div>


                        <button type="button" class="btn " data-toggle="modal" data-target="#AddModal"
                             >اضافة مستفيد جديد <i class="fas fa-user-plus"></i></button>
                    </div>

                    <!-- جدول البيانات -->

                    <table class="table table-hover table-striped text-right" style="margin-top: 40px;">
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


                            @include('modules.auth.requests.create.Citizen_table', ['data' => $data ?? []])


                        </tbody>
                    </table>


                    {{-- -addModel--- --}}

                    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <div class="">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="">
                                        <h5 class="modal-title" id="exampleModalLabel">اضافة مستفيد</h5>
                                    </div>
                                </div>

                                <div class="modal-body">

                                    {{-- form - --}}

                                    <form class="" id="form_add" enctype="multipart/form-data"
                                        method="POST">
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
                                                                <input type="file" id="imageInput"
                                                                    name="personal_photo" accept="image/*">
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
                                                    <input type="text" class="form-control"
                                                        id="validationCustom01" name="name" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="bac">
                                                    <label for="validationCustom02">مديرية سكن المستفيد</label>
                                                    {{-- <select class="custom-select" name="directorate_id"
                                                        id="inputGroupSelect01">
                                                        <option selected>Choose...</option>
                                                        <option value="1">السبعين</option>
                                                        <option value="2">الثوره</option>
                                                        <option value="3">بني الحارث</option>
                                                    </select> --}}



                                                    <select class="custom-select" name="directorate_id"
                                                        id="directorateSelect">
                                                        <option value="">اختر المديرية...</option>
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
                                                        <option selected disabled value="">اختر نوع الهوية...
                                                        </option>
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
                                                    <label for="validationCustom02"> صورة بطاقة المستفيد الشخصية
                                                        (pdf)</label>
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
                                            data-dismiss="modal">الغاء</button>

                                        <button type="button" class="btn btn-primary btn-save-entity"
                                            data-action="save" data-form="#form_add"
                                            data-url="add-beneficiaries_Ajax" data-reload-container="#usersTableBody"
                                            data-reload-url="{{ route('reload-beneficiaries-getfirst') }}"
                                            data-modal="#AddModal" data-method="POST">
                                            حفظ
                                        </button>

                                    </form>

                                    {{-- <script>
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
                                    </script> --}}

                                    {{-- end form - --}}
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- -end_Model--- --}}


                    {{-- -edit-Model--- --}}

                    <div class="modal fade" id="editModal" style="direction: rtl;" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title" id="editModalLabel">تعديل مستفيد</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <form class="" id="form_edit" enctype="multipart/form-data"
                                        method="POST">

                                        <input type="hidden" name="id" id="id">
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
                                                                <input type="file" id="imageInputEdit"
                                                                    name="personal_photo" accept="image/*">

                                                                <img id="previewImageEdit" src=""
                                                                    style="max-width: 100px; ">

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
                                                    <input type="text" class="form-control"
                                                        id="validationCustom01" name="name" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="bac">
                                                    <label for="validationCustom02">مديرية سكن المستفيد</label>
                                                    {{-- <select class="custom-select" name="directorate_id"
                                                        id="inputGroupSelect01">
                                                        <option selected>Choose...</option>
                                                        <option value="1">السبعين</option>
                                                        <option value="2">الثوره</option>
                                                        <option value="3">بني الحارث</option>
                                                    </select> --}}


                                                    <select class="custom-select" name="directorate_id"
                                                        id="directorateSelect_c">
                                                        <option value="">اختر المديرية...</option>
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
                                                        <option selected disabled value="">اختر نوع الهوية...
                                                        </option>
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
                                                    <label for="validationCustom02"> صورة بطاقة المستفيد الشخصية
                                                        (pdf)</label>
                                                    <div class="input-group mb-3" style="direction: rtl">
                                                        <input type="file" class="form-control" name="id_card_pdf"
                                                            id="id_card_pdf" accept="application/pdf">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            id="btnViewPdf" style="display:none;">عرض PDF</button>
                                                    </div>



                                                    {{-- <input type="file" class="form-control" name="id_card_pdf"
                                                            id="inputGroupFile02" accept="application/pdf"
                                                            aria-label="Example text with button addon"
                                                            aria-describedby="button-addon1"> --}}
                                                    {{-- <button id="btnViewPdf" class="btn btn-primary" >عرض PDF</button> --}}
                                                    {{-- <button class="btn btn-outline-secondary" type="button"
                                                            id="button-addon1">عرض PDF</button> --}}

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


                                        <button type="button" class="btn btn-primary btn-update-entity"
                                            data-action="edit" data-form="#form_edit"
                                            data-route="beneficiaries_update" data-reload-container="#usersTableBody"
                                            data-reload-url="{{ route('reload-beneficiaries-table') }}"
                                            data-modal="#editModal" data-method="POST">
                                            تعديل
                                        </button>

                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">الغاء</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- -end_Model--- --}}











                </div>
            </div>

        </div>

        <div class="step-content active" id="step2">

            @vite(['resources/css/requests.css'])
            <div class="content_requests">
                <div class="contener_requests">
                    {{-- بيانات مقدم الطلب --}}
                    <div class="modal-body">
                        <h5 class="h5_lab">بيانات مقدم الطلب</h5>
                        {{-- form - --}}

                        <form class="form_add" id="form_Req">


                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="validationCustom01">اسم المستفيد</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            name="name" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="validationCustom02">مديرية سكن المستفيد</label>
                                        {{-- <select class="custom-select" name="directorate_id" readonly
                                            id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option value="1">السبعين</option>
                                            <option value="2">الثوره</option>
                                            <option value="3">بني الحارث</option>
                                        </select> --}}

                                        <select class="custom-select" name="directorate_id" id="directorateSelect_A">
                                            <option value="">اختر المديرية...</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="validationCustom01">نوع الهوية</label>
                                        <select class="custom-select" name="identity_type" id="inputGroupSelect01"
                                            required>
                                            <option selected disabled value="" readonly>اختر نوع الهوية...
                                            </option>
                                            <option value="بطاقة شخصية">بطاقة شخصية</option>
                                            <option value="جواز">جواز</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="validationCustom02">رقم الهوية</label>
                                        <input type="tel" class="form-control" name="identity_number"
                                            id="validationCustom02" required readonly>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="validationCustom03">البريد الالكتروني</label>
                                        <input type="email" class="form-control" name="email"
                                            id="validationCustom03" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="message-text" class="col-form-label">العنوان</label>
                                        <textarea class="form-control" name="address" id="message-text" readonly></textarea>
                                    </div>
                                </div>

                            </div>

                        </form>

                        {{-- end form - --}}
                    </div>

                    {{-- بيانات الطلب --}}
                    <div class="modal-body">
                        <h5 class="h5_lab">بيانات الطلب</h5>
                        {{-- form - --}}
                        <form class="form_request" id="form_request" enctype="multipart/form-data">
                            @csrf

                            <!-- معرف المستفيد -->
                            <input type="hidden" name="id" value="">

                            <div class="form-row">
                                <!-- نوع الرخصة -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="license_type_id">نوع الرخصة</label>
                                        <select class="custom-select" name="license_type_id" id="license_type_id"
                                            required>
                                            <option value="">اختر الرخصة...</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- نوع الطلب -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="request_type_id">نوع الطلب</label>
                                        <select class="custom-select" name="request_type_id" id="request_type_id"
                                            required>
                                            <option value="">اختر الطلب...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- القسم -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="department_id">القسم</label>
                                        <select class="custom-select" name="department_id" id="department_id"
                                            required>
                                            <option value="">اختر القسم...</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- المديرية -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="directorate_id">المديرية</label>
                                        <select class="custom-select" name="directorate_id" id="directorate_id"
                                            required>
                                            <option value="">اختر المديرية...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-row">
                                <!-- حالة الطلب -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="status_id">حالة الطلب</label>
                                        <select class="custom-select" name="status_id" id="status_id" required>
                                            <option value="">اختر الحالة...</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- مرحلة العمل الحالية -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="current_stage_id">مرحلة العمل الحالية</label>
                                        <select class="custom-select" name="current_stage_id" id="current_stage_id"
                                            required>
                                            <option value="">اختر المرحلة...</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-row">
                                {{-- <!-- الموظف المعين -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="assigned_to">الموظف المعين</label>
                                        <select class="custom-select" name="assigned_to" id="assigned_to">
                                            <option value="">اختر موظف...</option>
                                        </select>
                                    </div>
                                </div> --}}

                                <!-- تاريخ الإنجاز المتوقع -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="expected_completion_date">تاريخ الإنجاز المتوقع</label>
                                        <input type="date" class="form-control" name="expected_completion_date"
                                            id="expected_completion_date">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <br>
                                    <button type="button" class="btn btn-primary btn-save-request next-step-btn-request"
                                     data-step-target="3" {{-- خاصه بل انتقال الا الخطوه الثانيه --}}

                                        data-action="save" data-form="#form_request" data-url="add-requests_Ajax"
                                        data-method="POST">
                                        حفظ الطلب
                                    </button>
                                </div>
                            </div>
                        </form>


                        {{-- end form - --}}
                    </div>

                </div>
            </div>



        </div>

        <div class="step-content active" id="step3">

            @vite(['resources/css/requests.css'])
            <div class="content_requests">
                <div class="contener_requests">

                    <div class="modal-body">
                        <h5 class="h5_lab">بيانات الرخصة</h5>
                        {{-- form - --}}

                        <form class="form_add" id="form_license" enctype="multipart/form-data">
                            @csrf

                            <!-- معرف الطلب المرتبط -->
                            <input type="hidden" name="request_id" id="request_id" value="">

                            <div class="form-row">
                                <!-- نوع البناء -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="building_type_id">نوع البناء</label>
                                        <select class="custom-select" name="building_type_id" id="building_type_id"
                                            required>
                                            <option value="">اختر نوع البناء...</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- نوع الواجهة -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="facade_type">نوع الواجهة</label>
                                        <select class="custom-select" name="facade_type" id="facade_type" required>
                                            <option value="">اختر نوع الواجهة...</option>
                                            <option value="خرسانة">خرسانة</option>
                                            <option value="طوبيه">طوبيه</option>
                                            <option value="زجاجية">زجاجية</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- الاستخدام الرئيسي -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="main_usage">الاستخدام الرئيسي</label>
                                        <input type="text" class="form-control" name="main_usage" id="main_usage"
                                            required>
                                    </div>
                                </div>

                                <!-- الاستخدام الفرعي -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="sub_usage">الاستخدام الفرعي</label>
                                        <input type="text" class="form-control" name="sub_usage" id="sub_usage">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- الجهة المصدرة -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="issuing_authority">الجهة المصدرة</label>
                                        <input type="text" class="form-control" name="issuing_authority"
                                            id="issuing_authority" required>
                                    </div>
                                </div>

                                <!-- اجمالي عدد المباني -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="total_buildings">اجمالي عدد المباني</label>
                                        <input type="number" class="form-control" name="total_buildings"
                                            id="total_buildings" min="1" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- رقم الرخصة -->
                                {{-- <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="license_number">رقم الرخصة</label>
                                        <input type="text" class="form-control" name="license_number"
                                            id="license_number" required>
                                    </div>
                                </div> --}}

                                <!-- وصف المبنى -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="description">وصف المبنى</label>
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-row">
                                <!-- تاريخ الإصدار -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="issue_date">تاريخ الإصدار</label>
                                        <input type="date" class="form-control" name="issue_date"
                                            id="issue_date">
                                    </div>
                                </div>

                                <!-- تاريخ الانتهاء -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="expiry_date">تاريخ الانتهاء</label>
                                        <input type="date" class="form-control" name="expiry_date"
                                            id="expiry_date">
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="form-row">
                                <!-- حالة الرخصة (مفعلة/غير مفعلة) -->
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="is_active">حالة الرخصة</label>
                                        <select class="custom-select" name="is_active" id="is_active">
                                            <option value="1" selected>مفعلة</option>
                                            <option value="0">غير مفعلة</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

                            <br>
                            {{-- <button class="btn btn-primary" type="submit">إضافة</button> --}}
                            <button type="button" class="btn btn-primary btn-save-request-number" data-action="save"
                                data-form="#form_license" data-url="add-license_Ajax" data-method="POST">
                                حفظ
                            </button>
                        </form>

                        {{-- end form - --}}
                    </div>


                </div>
            </div>

        </div>

        <div class="step-content active" id="step4">
            @include('modules.auth.requests.create.Attachments')
        </div>

      <div class="step-content active" id="step5">


                <style>
                    :root {
                        --primary-color: #3498db;
                        --secondary-color: #2c3e50;
                        --accent-color: #e74c3c;
                        --light-color: #ecf0f1;
                        --success-color: #2ecc71;
                    }

                    /*
                        .container-custom {
                            max-width: 900px;
                            margin: 30px auto;
                            background: white;
                            border-radius: 15px;
                            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
                            overflow: hidden;
                        }

                        .header {
                            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
                            color: white;
                            padding: 25px;
                            text-align: center;
                        }

                        .content {
                            padding: 30px;
                        }

                        .request-info {
                            background-color: #f8f9fa;
                            border-radius: 10px;
                            padding: 20px;
                            margin-bottom: 25px;
                            border: 1px dashed #ced4da;
                        }

                        .info-item {
                            display: flex;
                            margin-bottom: 10px;
                            padding: 8px 0;
                            border-bottom: 1px solid #eee;
                        }

                        .info-label {
                            font-weight: bold;
                            min-width: 140px;
                            color: #555;
                        }

                        .info-value {
                            flex: 1;
                            color: #333;
                        } */

                            .btn-submit {
                                background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
                                color: white;
                                border: none;
                                padding: 12px 40px;
                                font-size: 18px;
                                border-radius: 50px;
                                transition: all 0.3s;
                                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                            }

                            .btn-submit:hover {
                                transform: translateY(-3px);
                                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
                            }

                            .modal-success {
                                color: var(--success-color);
                                font-size: 60px;
                                margin-bottom: 20px;
                            }
                            /*
                        .request-number {
                            background: var(--light-color);
                            padding: 15px;
                            border-radius: 8px;
                            font-size: 22px;
                            font-weight: bold;
                            color: var(--primary-color);
                            margin: 20px 0;
                            direction: ltr;
                        } */

                        /* .steps-indicator {
                            display: flex;
                            justify-content: space-between;
                            margin-top: 30px;
                            padding-top: 20px;
                            border-top: 1px solid #dee2e6;
                        }

                        .step {
                            text-align: center;
                            flex: 1;
                            padding: 10px;
                        }

                        .step-icon {
                            width: 50px;
                            height: 50px;
                            background: var(--light-color);
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin: 0 auto 10px;
                            font-size: 20px;
                            color: var(--primary-color);
                        }

                        .step.active .step-icon {
                            background-color: var(--primary-color);
                            color: white;
                        } */

                        @media (max-width: 768px) {
                            .info-item {
                                flex-direction: column;
                            }

                            .info-label {
                                min-width: unset;
                                margin-bottom: 5px;
                            }

                            .btn-submit {
                                padding: 10px 30px;
                                font-size: 16px;
                            }

                            .steps-indicator {
                                flex-direction: column;
                                gap: 20px;
                            }
                        }
                    </style>

            <div class="content">


                <div class="text-center mt-5">
                    <button type="button" class="btn btn-submit" id="submitRequestBtn">
                        <i class="fas fa-paper-plane me-2"></i>إرسال الطلب للمراجعة
                    </button>
                </div>


            </div>
      </div>


    </div>



    <div id="Breadcrumb_Eng">


        <div class="step-content active" id="step6">
            <div class="content_requests">
                <div class="contener_requests">

                    <div class="modal-body">
                        <h5 class="h5_lab">بيانات مكونات البناء</h5>

                        <form class="form_add" id="buildingComponent">

                            <input type="hidden" id="id" name="id">

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="component_type">مكون البناء</label>
                                        <select class="custom-select" name="floor_type_id" id="floor_type_id"
                                            required>
                                            <option value="">اختر...</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="area">المساحة / الطول</label>
                                        <input type="number" step="0.01" class="form-control" name="area"
                                            id="area" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="floors_count">عدد الادوار</label>
                                        <input type="number" class="form-control" name="floors_count"
                                            id="floors_count" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="units_count">عدد الوحدات</label>
                                        <input type="number" class="form-control" name="units_count"
                                            id="units_count" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="usage_type">الاستخدام</label>
                                        <select class="custom-select" name="usage_type" id="usage_type" required>
                                            <option value="">اختر...</option>
                                            <option value="سكني">سكني</option>
                                            <option value="تجاري">تجاري</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="bac">
                                        <label for="building_percentage">نسبة البناء</label>
                                        <input type="number" step="0.01" class="form-control"
                                            name="building_percentage" id="building_percentage" required>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">

                                    <br>
                                    <button type="button" id="btn-save"
                                        class="btn btn-primary btn-save-request-number-loc" data-action="save"
                                        data-form="#buildingComponent" data-url="add-Building-Component_Ajax"
                                        data-reload-container="#BuildingComponentTable"
                                        data-reload-url="reload-BuildingComponent-get" data-method="POST">
                                        حفظ
                                    </button>

                                    <button type="button" id="btn-edite"
                                        class="btn btn-sm btn-outline-primary btn-save-request-number"
                                        data-action="save" data-form="#buildingComponent"
                                        data-url="update-Building-Component_Ajax"
                                        data-reload-container="#BuildingComponentTable"
                                        data-reload-url="reload-BuildingComponent-get" data-method="POST">
                                        تعديل
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>

                    <div class="">
                        <div dir="rtl">
                            <table class="table table-hover text-right">
                                <thead class="">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>مكون البناء</th>
                                        <th>المساحة/ طول</th>
                                        <th>عدد الادوار</th>
                                        <th>عدد الوحدات</th>
                                        <th>الاستخدام</th>
                                        <th>نسبة البناء</th>
                                        <th width="10%">إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody id="BuildingComponentTable">

                                    @include('modules.auth.requests.create.Build_components_table', [
                                        'datac' => $datac ?? collect([]),
                                    ])
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="step-content active" id="step7">

            <div class="content_requests">
                <div class="contener_requests">
                    <div class="modal-body">
                        <!-- المعلومات الجغرافية -->

                        @include('modules.auth.requests.create.partials.location')

                        <!-- بيانات الاراضي -->
                        <form id="landDataForm" class="form_add" style="border: snow solid 1px; margin-bottom: 30px">
                            <h5 class="h5_lab">بيانات الاراضي</h5>
                            <table class="table table-hover text-right">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">رقم قطعة الارض</th>
                                        <th scope="col">مساحة الارض</th>
                                        <th scope="col">نظام البناء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><input type="text" class="form-control" name="plot_number"
                                                value="411" required></td>
                                        <td><input type="text" class="form-control" name="area" value="601.76"
                                                required></td>
                                        <td><input type="text" class="form-control" name="building_system"
                                                value="س1-أ" required></td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5 class="h5_lab">اشتراطات البناء لقطعة الارض</h5>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label>نسبة البناء</label>
                                        <input type="text" class="form-control" name="building_percentage"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label>اقصى ارتفاع للمبنى</label>
                                        <input type="text" class="form-control" name="max_height" required>
                                    </div>
                                </div>
                            </div>

                            <h5 class="h5_lab">تفاصيل النفايات</h5>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label>عمق الحفر</label>
                                        <input type="text" class="form-control" name="excavation_depth">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label>كثافة التربة</label>
                                        <input type="text" class="form-control" name="soil_density">
                                    </div>
                                </div>
                            </div>

                            <h5 class="h5_lab">تفاصيل الهيكل</h5>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label>نوع الهيكل</label>
                                        <select class="form-control" name="structure_type">
                                            <option value="">اختر نوع الهيكل</option>
                                            <option value="حجر مسلح">حجر مسلح</option>
                                            <option value="حجر منشار مسلح">حجر منشار مسلح</option>
                                            <option value="بلك مسلح">بلك مسلح</option>
                                            <option value="بلك شعبي">بلك شعبي</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h5 class="h5_lab">تفاصيل الشارع</h5>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="bac">
                                        <label>نوع الشارع</label>
                                        <select class="form-control" id="street_type_id" name="street_type_id">
                                            <option value="">اختر نوع الشارع</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="bac">
                                        <label>عرض الشارع (متر)</label>
                                        <input type="text" class="form-control" name="street_width">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="bac">
                                        <label>رقم الشارع</label>
                                        <input type="text" class="form-control" name="street_number">
                                    </div>
                                </div>
                            </div>

                            <h5 class="h5_lab">مواقف السيارات</h5>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label>نوع الموقف</label>
                                        <input type="text" class="form-control" name="parking_type">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label>مساحة الموقف</label>
                                        <input type="text" class="form-control" name="parking_area">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-save-land_plots-number" data-action="save"
                                data-form="#landDataForm" data-url="add-land_plots_Ajax" data-method="POST">
                                <i class="fas fa-save me-2"></i> حفظ بيانات الارض
                            </button>
                        </form>


                        <!-- بيانات الحدود والابعاد -->
                        <form id="boundariesForm" class="form_add">

                            <input type="hidden" name="plot_id" id="id">

                            <h5 class="h5_lab">بيانات الحدود والابعاد</h5>
                            <table class="table table-hover text-right">
                                <thead class="table-info">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">الشمال</th>
                                        <th scope="col">الشرق</th>
                                        <th scope="col">الجنوب</th>
                                        <th scope="col">الغرب</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">الحد حسب الصك</th>
                                        <td>
                                            <input type="text" class="form-control" name="deed_description_n">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="deed_description_e">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="deed_description_s">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="deed_description_w">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">الحد حسب الطبيعة</th>
                                        <td><input type="text" class="form-control" name="nature_description_n">
                                        </td>
                                        <td><input type="text" class="form-control" name="nature_description_e"
                                                >
                                        </td>
                                        <td><input type="text" class="form-control" name="nature_description_s"
                                                >
                                        </td>
                                        <td><input type="text" class="form-control" name="nature_description_w"
                                                >
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">الطول حسب الصك</th>
                                        <td><input type="text" class="form-control" name="deed_length_n"
                                                value="24">
                                        </td>
                                        <td><input type="text" class="form-control" name="deed_length_e"
                                                value="25.3">
                                        </td>
                                        <td><input type="text" class="form-control" name="deed_length_s"
                                                value="24">
                                        </td>
                                        <td><input type="text" class="form-control" name="deed_length_w"
                                                value="24.85">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">الطول حسب الطبيعة</th>
                                        <td><input type="text" class="form-control" name="nature_length_n"
                                                ></td>
                                        <td><input type="text" class="form-control" name="nature_length_e"
                                                >
                                        </td>
                                        <td><input type="text" class="form-control" name="nature_length_s"
                                                ></td>
                                        <td><input type="text" class="form-control" name="nature_length_w"
                                                >
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">الشطفة</th>
                                        <td><input type="text" class="form-control" name="angle_n"
                                               ></td>
                                        <td><input type="text" class="form-control" name="angle_e"
                                               ></td>
                                        <td><input type="text" class="form-control" name="angle_s"
                                                ></td>
                                        <td><input type="text" class="form-control" name="angle_w"
                                                ></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">الاتجاه</th>
                                        <td>
                                            <select class="form-control" name="direction_type_n">
                                                <option value="امامي">امامي</option>
                                                <option value="جانبي y">جانبي y</option>
                                                <option value="خلفي">خلفي</option>
                                                <option value="جانبي x">جانبي x</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="direction_type_e">
                                                <option value="امامي">امامي</option>
                                                <option value="جانبي y">جانبي y</option>
                                                <option value="خلفي">خلفي</option>
                                                <option value="جانبي x">جانبي x</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="direction_type_s">
                                                <option value="امامي">امامي</option>
                                                <option value="جانبي y">جانبي y</option>
                                                <option value="خلفي">خلفي</option>
                                                <option value="جانبي x">جانبي x</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="direction_type_w">
                                                <option value="امامي">امامي</option>
                                                <option value="جانبي y">جانبي y</option>
                                                <option value="خلفي">خلفي</option>
                                                <option value="جانبي x">جانبي x</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">الارتداد</th>
                                        <td><input type="text" class="form-control" name="setback_n" required>
                                        </td>
                                        <td><input type="text" class="form-control" name="setback_e" required>
                                        </td>
                                        <td><input type="text" class="form-control" name="setback_s" required>
                                        </td>
                                        <td><input type="text" class="form-control" name="setback_w" required>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">البروز</th>
                                        <td><input type="text" class="form-control" name="protrusion_n"
                                                required></td>
                                        <td><input type="text" class="form-control" name="protrusion_e"
                                                required></td>
                                        <td><input type="text" class="form-control" name="protrusion_s"
                                                required></td>
                                        <td><input type="text" class="form-control" name="protrusion_w"
                                                required></td>
                                    </tr>


                                    <tr>
                                        <th scope="row">نوع الشارع</th>
                                        <td>
                                            <select class="form-control" id="street_type_id_n" name="street_type_id_n">
                                                <option value="">اختر نوع الشارع</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" id="street_type_id_e" name="street_type_id_e">
                                                <option value="">اختر نوع الشارع</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" id="street_type_id_s" name="street_type_id_s">
                                                <option value="">اختر نوع الشارع</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" id="street_type_id_w" name="street_type_id_w">
                                                <option value="">اختر نوع الشارع</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">عرض الشارع (متر)</th>
                                        <td><input type="text" class="form-control" name="street_width_n"
                                                required></td>
                                        <td><input type="text" class="form-control" name="street_width_e"
                                                required></td>
                                        <td><input type="text" class="form-control" name="street_width_s"
                                                required></td>
                                        <td><input type="text" class="form-control" name="street_width_w"
                                                required></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">رقم الشارع</th>
                                        <td><input type="number" class="form-control" name="street_number_n"
                                                required></td>
                                        <td><input type="number" class="form-control" name="street_number_e"
                                                required></td>
                                        <td><input type="number" class="form-control" name="street_number_s"
                                                required></td>
                                        <td><input type="number" class="form-control" name="street_number_w"
                                                required></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">حدود الموقف</th>
                                        <td><input type="text" class="form-control" name="parking_boundaries_n"
                                                required></td>
                                        <td><input type="text" class="form-control" name="parking_boundaries_e"
                                                required></td>
                                        <td><input type="text" class="form-control" name="parking_boundaries_s"
                                                required></td>
                                        <td><input type="text" class="form-control" name="parking_boundaries_w"
                                                required></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">أطوال الموقف</th>
                                        <td><input type="text" class="form-control" name="parking_lengths_n"
                                                required></td>
                                        <td><input type="text" class="form-control" name="parking_lengths_e"
                                                required></td>
                                        <td><input type="text" class="form-control" name="parking_lengths_s"
                                                required></td>
                                        <td><input type="text" class="form-control" name="parking_lengths_w"
                                                required></td>
                                    </tr>
                                </tbody>
                            </table>

                            <br>
                            <button type="submit" class="btn btn-primary btn-save-request-number" data-action="save"
                                data-form="#boundariesForm" data-url="add-boundaries_Ajax" data-method="POST">
                                <i class="fas fa-save me-2"></i> حفظ الحدود والأبعاد
                            </button>

                        </form>

                        <!-- بيانات تقرير المهندس -->
                        <form class="form_add" id="engineer_site_reports">
                            <!-- الحقول المخفية -->
                            <input type="hidden" name="request_id">
                            <input type="hidden" name="engineer_id">

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="engineer_id_select">المهندس</label>
                                        <select class="custom-select" id="engineer_id_select" name="engineer_id"
                                            required>
                                            <option value="">اختر المهندس</option>
                                            <option value="1">عمر المحجري</option>
                                            <!-- خيارات المهندسين ستضاف ديناميكياً -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="inspection_date">تاريخ النزول</label>
                                        <input type="date" class="form-control" id="inspection_date"
                                            name="inspection_date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="bac">
                                        <label for="report_text">تفاصيل المعاينة</label>
                                        <textarea class="form-control" id="report_text" name="report_text" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="condition">حالة الموقع</label>
                                        <select class="custom-select" id="condition" name="condition">
                                            <option value="">اختر الحالة</option>
                                            <option value="سليم">سليم</option>
                                            <option value="مخالف">مخالف</option>
                                            <option value="بحاجة لإصلاح">بحاجة لإصلاح</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="recommendation">توصية المهندس</label>
                                        <input type="text" class="form-control" id="recommendation"
                                            name="recommendation">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="request_type">نوع الطلب</label>
                                        <select class="custom-select" id="request_type" name="request_type">
                                            <option value="">اختر النوع</option>
                                            <option value="1">ترخيص بناء</option>
                                            <option value="3">ترخيص تسوير</option>
                                            <option value="2">ترخيص هدم</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary btn-save-request-number"
                                data-action="save" data-form="#engineer_site_reports"
                                data-url="add-engineer_site_reports_Ajax" data-method="POST">
                                <i class="fas fa-save me-2"></i>حفظ التقرير
                            </button>
                        </form>



                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="step-content active" id="step7">
            @include('modules.auth.requests.create.Fee_calculation')
        </div> --}}


        <div class="step-content active" id="step8">


                <style>
                    :root {
                        --primary-color: #3498db;
                        --secondary-color: #2c3e50;
                        --accent-color: #e74c3c;
                        --light-color: #ecf0f1;
                        --success-color: #2ecc71;
                    }


                            .btn-submit {
                                background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
                                color: white;
                                border: none;
                                padding: 12px 40px;
                                font-size: 18px;
                                border-radius: 50px;
                                transition: all 0.3s;
                                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                            }

                            .btn-submit:hover {
                                transform: translateY(-3px);
                                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
                            }

                            .modal-success {
                                color: var(--success-color);
                                font-size: 60px;
                                margin-bottom: 20px;
                            }


                        @media (max-width: 768px) {
                            .info-item {
                                flex-direction: column;
                            }

                            .info-label {
                                min-width: unset;
                                margin-bottom: 5px;
                            }

                            .btn-submit {
                                padding: 10px 30px;
                                font-size: 16px;
                            }

                            .steps-indicator {
                                flex-direction: column;
                                gap: 20px;
                            }
                        }
                    </style>

            <div class="content">


                <div class="text-center mt-5">
                    <button type="button" class="btn btn-submit" id="submitRequestBtn_Report">
                        <i class="fas fa-paper-plane me-2"></i>إرسال الطلب للمراجعة
                    </button>
                </div>


            </div>
      </div>


    </div>

        <!-- أزرار التنقل (الآن خارج step-content) -->
        <div class="nav-buttons m-2">


        </div>
    </div>
</main>


<!-- Modal المراجعة الاولية-->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">تمت العملية بنجاح</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h4>تم إرسال الطلب بنجاح!</h4>
                <p>تم إرسال الطلب إلى إدارة المراجعة بنجاح وسيتم مراجعته في أقرب وقت ممكن.</p>

                <div class="request-number">
                    رقم الطلب: <span class="request-number" data-id="17">RQ165</span>
                </div>

                <p>سيتم إشعار مقدم الطلب برقم الطلب وحالته عبر البريد الإلكتروني والرسائل النصية.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">موافق</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal المراجعة الفنيه بعد اضافه التقرير-->
<div class="modal fade" id="successModal_Report" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">تمت العملية بنجاح</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h4>تم إرسال الطلب بنجاح!</h4>
                <p>تم إرسال تقريرالمهندس إلى إدارة المراجعة الفنية بنجاح وسيتم مراجعته في أقرب وقت ممكن.</p>

                <div class="request-number">
                    رقم الطلب: <span class="request-number" data-id="17">RQ165</span>
                </div>

                <p>سيتم إشعار مقدم الطلب برقم الطلب وحالته عبر البريد الإلكتروني والرسائل النصية.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">موافق</button>
            </div>
        </div>
    </div>
</div>



<!-- نضيف هذا الجزء بدلاً من script -->
<div id="step-scripts"></div>
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

                        let img = document.getElementById("previewImageEdit");
                        img.style.display = "block";
                        document.getElementById("imageInputEdit").addEventListener("change", function(event) {
                            let file = event.target.files[0];
                            if (file) {
                                let reader = new FileReader();
                                reader.onload = function(e) {
                                    let img = document.getElementById("previewImageEdit");
                                    img.src = e.target.result;
                                    img.style.display = "block";
                                    document.querySelector(".image-upload i").style.display = "none";
                                }
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>

{{-- <script>
document.addEventListener("DOMContentLoaded", function() {
    // تحقق إذا كانت الصفحة قد تم تحديثها من قبل
    if (!sessionStorage.getItem("pageReloaded")) {
        sessionStorage.setItem("pageReloaded", "true");
        location.reload(); // يعمل ريفريش مرة واحدة فقط
    }
});
</script> --}}

{{-- 
<script>
    $(document).ready(function() {

        // $('#request-number').data('id')
            const requestId = 23; // هذا هو id الصحيح
            // محاكاة لإرسال الطلب إلى الخادم
            console.log("جاري إرسال الطلب للمراجعة...");

            // محاكاة لطلب AJAX
            $.ajax({
                url: `/status_Request_e/${requestId}`,
                method: 'GET',
                success: function($data) {

                    // if (6 === 6) {
                    //     $('[data-step="1"]').remove();
                    //     $('[data-step="2"]').remove();
                    //     $('[data-step="3"]').remove();
                    //     $('[data-step="4"]').remove();
                    //     $('[data-step="5"]').remove();

                    //     $('#Breadcrumb_Receptionist').hide();

                    // } else {
                    //     $('#Breadcrumb_Eng').hide();
                    //     $('[data-step="6"]').remove();
                    //     $('[data-step="7"]').remove();
                    //     $('[data-step="8"]').remove();

                    // }
                },
                error: function(err) {
                    console.error(err);
                    // // alert('حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.');
                    //  $('#Breadcrumb_Eng').hide();
                    //      $('[data-step="6"]').remove();
                    //     $('[data-step="7"]').remove();
                    //     $('[data-step="8"]').remove();

                                            $('[data-step="1"]').remove();
                        $('[data-step="2"]').remove();
                        $('[data-step="3"]').remove();
                        $('[data-step="4"]').remove();
                        $('[data-step="5"]').remove();

                        $('#Breadcrumb_Receptionist').hide();

                }
            });
        });





     $(document).ready(function() {

        // عند النقر على زر الإرسال يكمل الطلب
        $('#submitRequestBtn').on('click', function() {

            const requestId = $('#request-number').data('id'); // هذا هو id الصحيح
            // محاكاة لإرسال الطلب إلى الخادم
            console.log("جاري إرسال الطلب للمراجعة...");

            // محاكاة لطلب AJAX
            $.ajax({
                url: `/requests/submit/${requestId}`,
                method: 'GET',
                success: function() {
                    // عند النجاح، عرض المودال
                    $('#successModal').modal('show');

                    // تعطيل الزر بعد الإرسال
                    $('#submitRequestBtn').html('<i class="fas fa-check me-2"></i>تم إرسال الطلب');
                    $('#submitRequestBtn').prop('disabled', true);
                    $('#submitRequestBtn').css('background', 'linear-gradient(to right, #2ecc71, #27ae60)');
                },
                error: function(err) {
                    console.error(err);
                    alert('حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.');
                }
            });
        });


         // عند النقر على زر الإرسال يكمل التقرير
        $('#submitRequestBtn_Report').on('click', function() {

            const requestId = $('#request-number').data('id'); // هذا هو id الصحيح
            // محاكاة لإرسال الطلب إلى الخادم
            console.log("جاري إرسال الطلب للمراجعة...");

            // محاكاة لطلب AJAX
            $.ajax({
                url: `/requests/submit_Report/${requestId}`,
                method: 'GET',
                success: function() {
                    // عند النجاح، عرض المودال
                    $('#successModal_Report').modal('show');

                    // تعطيل الزر بعد الإرسال
                    $('#submitRequestBtn_Report').html('<i class="fas fa-check me-2"></i>تم إرسال الطلب');
                    $('#submitRequestBtn_Report').prop('disabled', true);
                    $('#submitRequestBtn_Report').css('background', 'linear-gradient(to right, #2ecc71, #27ae60)');
                },
                error: function(err) {
                    console.error(err);
                    alert('حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.');
                }
            });
        });
    });
</script> --}}

      {{-- اكواد تنقل المراحل --}}
<script>
  function initBreadcrumb() {
    const steps = document.querySelectorAll('.process-step');
    const stepContents = document.querySelectorAll('.step-content');
    const progressFill = document.querySelector('.process-fill');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');


    let currentStep = 1;
    const totalSteps = steps.length;

    function updateProgress() {
        const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
        if (progressFill) progressFill.style.width = `${progressPercent}%`;

        steps.forEach((step, index) => {
            step.classList.remove('completed', 'active');
            if (index < currentStep - 1) step.classList.add('completed');
            else if (index === currentStep - 1) step.classList.add('active');
        });

        if (prevBtn) prevBtn.disabled = currentStep === 1;
        if (nextBtn) {
            nextBtn.style.display = currentStep === 1 ? 'none' : 'block';
            nextBtn.textContent = currentStep === totalSteps ? 'إرسال الطلب' : 'التالي';
        }

        stepContents.forEach(content => {
            content.classList.remove('active');
            if (parseInt(content.id.replace('step', '')) === currentStep) {
                content.classList.add('active');
            }
        });

                const jax = document.getElementById("Jax");
            if (jax) {
                // تمرير عمودي بمقدار 300px
                jax.scrollTop = 0;
            }
    }

    // النقر على أزرار الانتقال المخصصة داخل الجدول
    document.addEventListener('click', function(e) {
        const nextBtnCustom = e.target.closest('.next-step-btn');


        if (!nextBtnCustom) return;

        e.preventDefault();
        const targetStep = parseInt(nextBtnCustom.getAttribute('data-step-target'));
        const beneficiaryId = nextBtnCustom.getAttribute('data-beneficiary-id');

        console.log('تم اختيار المستفيد:', beneficiaryId);
        console.log('الانتقال إلى الخطوة:', targetStep);

        if (targetStep && targetStep > currentStep) {
            currentStep = targetStep;
            updateProgress();
            // loadBeneficiaryData(beneficiaryId); // يمكن تفعيل التحميل إذا لزم
        }
    });

    // أزرار التنقل
    if (prevBtn) prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            currentStep--;
            updateProgress();
        }
    });

    if (nextBtn) nextBtn.addEventListener('click', () => {



        if (currentStep < totalSteps) {
            currentStep++;
            updateProgress();
        } else {
            alert('تم إرسال الطلب بنجاح');
        }
    });

    updateProgress();
  }

  // تنفيذ الدالة عند تحميل الصفحة
  if (document.readyState !== 'loading') {
    initBreadcrumb();
  } else {
    document.addEventListener('DOMContentLoaded', initBreadcrumb);
  }

</script>

<script>

      $(document).ready(function() {
            /////////////اخفاء زر تعديل الموقع
            $('#edit').hide();
      });


    // ////////////////////////////عرض المديريات
    $(document).ready(function() {
        $.ajax({
            url: "/api/directorates",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#directorateSelect");
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
            url: "/api/directorates",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#directorateSelect_A");
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
            url: "/api/directorates",
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
            url: "/api/directorates",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#directorateSelect_c");
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

    // ////////////////////////////عرض نوع الطلب
    $(document).ready(function() {
        $.ajax({
            url: "/request_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#request_type_id");
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

    // ////////////////////////////عرض نوع الرخصة
    $(document).ready(function() {
        $.ajax({
            url: "/license_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#license_type_id");
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

    // ////////////////////////////عرض الاقسام
    $(document).ready(function() {
        $.ajax({
            url: "/department",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#department_id");
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

    // ////////////////////////////عرض نوع الحالة
    $(document).ready(function() {
        $.ajax({
            url: "/status",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#status_id");
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

    // ////////////////////////////عرض  مرحله العمل الحاليه
    $(document).ready(function() {
        $.ajax({
            url: "/current_stage",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#current_stage_id");
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

    // ///////////////////////////عرض نوع المباني
    $(document).ready(function() {
        $.ajax({
            url: "/building_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#building_type_id");
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

    // ///////////////////////////عرض نوع الادوار
    $(document).ready(function() {
        $.ajax({
            url: "/floor_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#floor_type_id");
                select.empty();
                select.append('<option value="">< ... اختار الادوار ...></option>');

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

    // ///////////////////////////عرض نوع الشارع
    $(document).ready(function() {
        $.ajax({
            url: "/street_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#street_type_id");
                select.empty();
                select.append('<option value="">< ... اختار نوع الشارع ...></option>');

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

     // ///////////////////////////عرض نوع الشارع _n
    $(document).ready(function() {
        $.ajax({
            url: "/street_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#street_type_id_n");
                select.empty();
                select.append('<option value="">< ... اختار نوع الشارع ...></option>');

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

     // ///////////////////////////عرض نوع الشارع _e
    $(document).ready(function() {
        $.ajax({
            url: "/street_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#street_type_id_e");
                select.empty();
                select.append('<option value="">< ... اختار نوع الشارع ...></option>');

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

     // ///////////////////////////عرض نوع الشارع _s
    $(document).ready(function() {
        $.ajax({
            url: "/street_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#street_type_id_s");
                select.empty();
                select.append('<option value="">< ... اختار نوع الشارع ...></option>');

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

     // ///////////////////////////عرض نوع الشارع _w
    $(document).ready(function() {
        $.ajax({
            url: "/street_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#street_type_id_w");
                select.empty();
                select.append('<option value="">< ... اختار نوع الشارع ...></option>');

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



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $.ajax({
        url: "/get-directorates",
        type: "GET",
        success: function (data) {
            var select = $("#innputGroupSelect01");
            select.empty(); // يفرغ القائمة أولاً
            select.append('<option value="">اختر المديرية...</option>');
            $.each(data, function (index, item) {
                select.append('<option value="' + item.id + '">' + item.name + '</option>');
            });
        }
    });
});


$('#editModal').on('shown.bs.modal', function () {
    $.ajax({
        url: '/get-directorates', // هذا اللينك يرجع بيانات المديريات من قاعدة البيانات
        type: 'GET',
        success: function(response) {
            console.log("✅ البيانات المسترجعة:", data);

            let select = $('#inputGroupSelect01');
            select.empty(); // يفرغ القائمة القديمة
            select.append('<option selected disabled>اختر المديرية...</option>');

            $.each(response, function(key, value) {
                select.append('<option value="'+ value.id +'">'+ value.name +'</option>');
            });
        },
         error: function (xhr, status, error) {
        console.error("❌ حدث خطأ في Ajax:");
        console.error("الحالة:", status);
        console.error("الخطأ:", error);
        console.error("النص:", xhr.responseText);
        }
    });
});

</script> --}}
