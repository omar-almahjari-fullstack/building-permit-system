    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #6c757d;
            --success: #198754;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #0dcaf0;
            --dark: #21252963;
            --light: #f8f9fa;
        }

        .workflow-step {
            position: relative;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary);
        }

        .workflow-step.completed {
            border-left-color: var(--success);
            background-color: rgba(25, 135, 84, 0.05);
        }

        .workflow-step.current {
            border-left-color: var(--primary);
            background-color: rgba(13, 110, 253, 0.05);
        }

        .workflow-step.pending {
            border-left-color: var(--warning);
            background-color: rgba(255, 193, 7, 0.05);
        }

        .workflow-step.rejected {
            border-left-color: var(--danger);
            background-color: rgba(220, 53, 69, 0.05);
        }

        .timeline {
            position: relative;
            padding-right: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            right: 15px;
            height: 100%;
            width: 2px;
            background: var(--secondary);
        }

        .file-preview {
            border: 1px dashed #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment-box {
            border-left: 3px solid var(--info);
            background-color: rgba(13, 202, 240, 0.05);
        }

        .priority-high {
            border-left: 4px solid var(--danger);
        }

        .priority-medium {
            border-left: 4px solid var(--warning);
        }

        .priority-low {
            border-left: 4px solid var(--success);
        }

        .stat-card {
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .correction-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff8e1;
            border-left: 4px solid #ffc107;
        }

        .btn-back {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .card-header .nav-tabs .nav-link {
            color: #495057;
            font-weight: 500;
        }

        .card-header .nav-tabs .nav-link.active {
            color: #0d6efd;
            font-weight: 600;
        }

        .role-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 0.7rem;
        }
    </style>

    <style>
        /* ------------------- Global Styles ------------------- */
        * {
            margin: 0;
            padding: 0;
        }

        /* ------------------- Common Layout Styles ------------------- */
        .content_requests,
        .content_Citizen,
        .contener_user {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            padding-top: 40px;
        }

        /* ------------------- Container Styles ------------------- */
        .contener_requests {
            width: 90%;
            height: fit-content;
            background-color: white;
            padding: 3%;
            border-radius: 5px;


            /* box-shadow: 0px 0px 7px 7px rgb(248, 248, 248); */
        }

        .contener_Citizen {
            width: 90%;
            height: 90%;
            background-color: rgb(248, 245, 245);
            border-radius: 10px;
            box-shadow: 1px 1px 5px 1px rgb(164, 163, 163);
            display: grid;
            place-items: center;
            padding: 0 5px 40px 5px;
        }

        .content_user {
            width: 90%;
            height: 90%;
            height: fit-content;
            background-color: rgb(247, 245, 245);
            border: 2px rgb(202, 202, 202) solid;
            border-radius: 10px;
            padding: 30px;
        }

        /* ------------------- Form Elements ------------------- */
        .form-row {
            direction: rtl;
        }

        .bac {
            background-color: rgb(241, 240, 240);
            border-radius: 5px;
        }

        .col-md-6 label {
            float: right;
            margin-right: 10px;
        }

        /* ------------------- Table Styles ------------------- */
        .table {
            direction: rtl;
            border: 1px rgb(225, 223, 223) solid;
        }

        .table thead {
            background: #151A2D !important;
            color: white;
        }

        /* Special table style for Dimensions section */
        .dimensions-table thead {
            background: rgb(237, 237, 237) !important;
            color: rgb(0, 0, 0);
            text-align: center;
        }

        .dimensions-table tbody th {
            background: rgb(237, 237, 237) !important;
        }

        .dimensions-table tbody td {
            text-align: center;
        }

        /* ------------------- Heading Styles ------------------- */
        .h5_lab {
            direction: rtl;
            border-bottom: 2px darkcyan solid;
            font-weight: 400;
            padding-bottom: 3px;
            margin-bottom: 20px;
        }

        /* ------------------- Button Styles ------------------- */
        .btn-primary,
        .bg-primary,
        .input-group-append .input-group-text {
            background: #151A2D !important;
            color: white;
        }

        /* ------------------- Citizen Section Styles ------------------- */
        .person {
            width: 100%;
            height: 40px;
            border-bottom: 2px rgb(238, 238, 238) solid;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 15px;
        }

        .person i {
            font-size: 27px;
        }

        .person h5 {
            margin-right: 10px;
            font-weight: bold;
        }

        .search {
            width: 60%;
            height: auto;
            min-height: 29vh;
            margin: 25px;
            background-color: rgb(239, 235, 235);
            border-radius: 15px;
            align-content: end;
            border: 2px rgb(214, 212, 212) solid;
        }

        .search .btn {
            width: 100%;
            border-radius: 0 0 15px 15px;
            background-color: rgb(210, 209, 209);
            border: none;
            color: rgb(6, 34, 136);
            text-align: end;
        }

        .search .btn:hover {
            background-color: rgb(190, 189, 189);
        }

        .search_1 {
            display: flex;
            width: 100%;
            margin-left: 4px;
            justify-content: flex-end;
            padding: 0 20px 20px 20px;
            flex-wrap: wrap;
        }

        .search_1 label {
            padding: 0 10px 0 15px;
            min-width: 110px;
        }

        .search_1 .input-group {
            min-width: 110px;
        }

        /* ------------------- Image Upload Styles ------------------- */
        .body_img {
            width: 100%;
            height: 100%;
            background-color: white;

        }

        .mar {
            margin-bottom: 20px;
            border: 1px rgb(225, 223, 223) solid;
            border-radius: 5px;
            width: 99%;

        }

        .mar_wid {
            width: 100%;
            overflow: hidden;
        }

        .im {
            width: 100%;
            display: flex;
            justify-content: end;
        }

        .image-upload {
            position: relative;
            width: 100px;
            height: 100px;
            border: 2px solid #151A2D;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            overflow: hidden;
        }

        .image-upload img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            display: none;
        }

        .image-upload i {
            font-size: 35px;
            color: #007bff;
        }

        .image-upload input {
            display: none;
        }

        /* ------------------- Fee Calculation Styles ------------------- */
        .fee {
            width: 60%;
            display: flex;
            justify-content: space-between;
            padding: 18px 0 0 0;
            border-bottom: 1px rgb(225, 223, 223) solid;
        }

        .fee h6 {
            font-size: 18px;
        }

        .fee h4 {
            font-size: 22px;
            font-weight: bold;
        }

        .alert {
            display: flex;
            justify-content: space-around;
            width: auto;
            height: auto;
        }

        .fee h4 span {
            font-size: 12px;
            color: rgb(26, 25, 25);
            background-color: rgb(234, 233, 233);
            border-radius: 7px;
            padding: 0 5px 0 5px;
        }

        .input-group-append .input-group-text {
            border-radius: 15px;
        }

        /* ------------------- User Section Styles ------------------- */
        .btn_data {
            width: 20%;
        }

        .btn_data button {
            border-radius: 10px;
            padding: 0 3px 0 3px;
        }

        .in_data {
            width: 75%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .in_data input {
            min-width: 150px;
            width: 35%;
            border-radius: 5px 0 0 5px;
            margin-left: 2px;
        }

        .input-group-append {
            border-radius: 0 5px 5px 0;
        }

        .in_data input,
        .input-group-append {
            border: 1px rgb(181, 180, 179) solid;
            margin-bottom: 1px;
        }

        .body_content {
            width: 100%;
            height: 100%;
            flex-wrap: wrap;
            display: flex;
            justify-content: space-between
        }

        .box {
            width: 250px;
            min-width: 250px;
            height: 90px;
            background-color: rgb(255, 255, 255);
            border: 1px rgb(181, 180, 179) solid;
            display: flex;
            place-items: center;
            justify-content: space-between;
            border-radius: 10px;
            margin: 5px 0 0 0;
        }

        .ico {
            width: 20%;
        }

        .ico,
        .num {
            padding: 0 20px 0 15px;
        }

        .ico i {
            font-size: 50px;
            color: black;
        }

        .num {
            width: 60%;
        }

        .num h6 {
            font-size: 20px;
            font-weight: bold;
        }

        .num h6,
        .num p {
            text-align: right;
        }

        /* ------------------- Modal Header ------------------- */
        .modal-header {
            display: flex;
            justify-content: space-between;
        }

        /* ------------------- Image Logo ------------------- */
        .rounded {
            width: 2cm;
            height: 2cm;
            object-fit: cover;
        }
    </style>



    {{-- تنسيق رسايل التعليقات  --}}
    <style>
        /* صندوق التعليق */
        .comment-box {
            display: flex;
            align-items: flex-start;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            width: 100%;
            height: auto;

        }

        /* الأفاتار (الدائرة) */
        .comment-box .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #007bff;
            /* لون أزرق */
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 12px;
            /* مسافة بين الدائرة والتعليق */
            flex-shrink: 0;
        }

        /* محتوى التعليق */
        .comment-box .comment-content {
            flex: 1;
        }

        /* السطر العلوي (الاسم + التاريخ) */
        .comment-box .comment-content .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .comment-box .comment-content strong {
            font-size: 15px;
            color: #333;
        }

        .comment-box .comment-content small {
            font-size: 13px;
            color: #888;
        }

        /* النص */
        .comment-box .comment-content p {
            margin: 0;
            font-size: 14px;
            line-height: 1.5;
            color: #444;
        }
    </style>

    <div class="container-fluid py-3">
        <!-- رأس الصفحة -->
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><i class="bi bi-file-earmark-text"></i> تفاصيل الطلب
                <span id="requestNumber" data-id="{{ $id }}">#{{ $id }}</span>
            </h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="requests.html" class="btn btn-back btn-sm">
                    <i class="bi bi-arrow-right"></i> رجوع
                </a>
            </div>
        </div>

        <div class="row">
            <!-- القسم الرئيسي -->
            <div class="col-md-8">
                <!-- بطاقة تفاصيل الطلب -->
                <div class="card mb-4">
                    <div class="card-header position-relative">
                        <span class="badge bg-info role-badge">جميع الصلاحيات</span>
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#requestInfo"
                                    role="tab">معلومات الطلب</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#requestTimeline" role="tab">سير
                                    العمل</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#requestDocuments"
                                    role="tab">المستندات</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#siteVisits" role="tab">الزيارات
                                    الميدانية</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#requestCorrections"
                                    role="tab">التعديلات المطلوبة</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#feeCalculation" role="tab">حساب
                                    الرسوم</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- تبويب معلومات الطلب -->
                            <div class="tab-pane fade show active" id="requestInfo" role="tabpanel">


                                <div class="step-content active" id="step2">

                                    <div class="content_requests">
                                        <div class="contener_requests">
                                            {{-- بيانات مقدم الطلب --}}
                                            <div class="modal-body">
                                                <h5 class="h5_lab">بيانات مقدم الطلب</h5>
                                                {{-- form - --}}
                                                <form class="form_add" id="form_Req">

                                                    <input type="hidden" name="id" id="id">

                                                    <div class="form-row">

                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="validationCustom01">اسم المستفيد</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom01" name="name" required
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="validationCustom02">مديرية سكن
                                                                    المستفيد</label>

                                                                <select class="custom-select" name="directorate_id"
                                                                    id="directorateSelect_A">
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
                                                                    <option selected disabled value="" readonly>
                                                                        اختر نوع الهوية...
                                                                    </option>
                                                                    <option value="بطاقة شخصية">بطاقة شخصية</option>
                                                                    <option value="جواز">جواز</option>
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="validationCustom02">رقم الهوية</label>
                                                                <input type="tel" class="form-control"
                                                                    name="identity_number" id="validationCustom02"
                                                                    required readonly>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="validationCustom03">البريد
                                                                    الالكتروني</label>
                                                                <input type="email" class="form-control"
                                                                    name="email" id="validationCustom03" required
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="message-text"
                                                                    class="col-form-label">العنوان</label>
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
                                                <form class="form_request" id="form_request"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <!-- معرف المستفيد -->
                                                    <input type="hidden" name="beneficiary_id" id="beneficiary_id">
                                                    <input type="hidden" name="id" id="id">

                                                    <div class="form-row">
                                                        <!-- نوع الرخصة -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="license_type_id">نوع الرخصة</label>
                                                                <select class="custom-select" name="license_type_id"
                                                                    id="license_type_id" required>
                                                                    <option value="">اختر الرخصة...</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- نوع الطلب -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="request_type_id">نوع الطلب</label>
                                                                <select class="custom-select" name="request_type_id"
                                                                    id="request_type_id" required>
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
                                                                <select class="custom-select" name="department_id"
                                                                    id="department_id" required>
                                                                    <option value="">اختر القسم...</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- المديرية -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="directorate_id">المديرية</label>
                                                                <select class="custom-select" name="directorate_id"
                                                                    id="directorate_id" required>
                                                                    <option value="">اختر المديرية...</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <!-- حالة الطلب -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="status_id">حالة الطلب</label>
                                                                <select class="custom-select" name="status_id"
                                                                    id="status_id" required>
                                                                    <option value="">اختر الحالة...</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- مرحلة العمل الحالية -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="current_stage_id">مرحلة العمل
                                                                    الحالية</label>
                                                                <select class="custom-select" name="current_stage_id"
                                                                    id="current_stage_id" required>
                                                                    <option value="">اختر المرحلة...</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <!-- الموظف المعين -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="assigned_to">الموظف المعين</label>
                                                                <select class="custom-select" name="assigned_to"
                                                                    id="assigned_to">
                                                                    <option value="">اختر موظف...</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- تاريخ الإنجاز المتوقع -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="expected_completion_date">تاريخ الإنجاز
                                                                    المتوقع</label>
                                                                <input type="date" class="form-control"
                                                                    name="expected_completion_date"
                                                                    id="expected_completion_date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-2 mb-3">
                                                            <br>
                                                            <button type="button"
                                                                class="btn btn-primary btn-save-request"
                                                                data-action="save" data-form="#form_request"
                                                                data-url="add-requests_Ajax" data-method="POST">
                                                                حفظ
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
                                    <div class="content_requests">
                                        <div class="contener_requests">

                                            <div class="modal-body">
                                                <h5 class="h5_lab">بيانات الرخصة</h5>
                                                {{-- form - --}}

                                                <form class="form_add" id="form_license"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <!-- معرف الطلب المرتبط -->
                                                    <input type="hidden" name="request_id" id="request_id"
                                                        value="">
                                                    <input type="hidden" name="id" id="id"
                                                        value="">

                                                    <div class="form-row">
                                                        <!-- نوع البناء -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="building_type_id">نوع البناء</label>
                                                                <select class="custom-select" name="building_type_id"
                                                                    id="building_type_id" required>
                                                                    <option value="">اختر نوع البناء...</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- نوع الواجهة -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="facade_type">نوع الواجهة</label>
                                                                <select class="custom-select" name="facade_type"
                                                                    id="facade_type" required>
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
                                                                <input type="text" class="form-control"
                                                                    name="main_usage" id="main_usage" required>
                                                            </div>
                                                        </div>

                                                        <!-- الاستخدام الفرعي -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="sub_usage">الاستخدام الفرعي</label>
                                                                <input type="text" class="form-control"
                                                                    name="sub_usage" id="sub_usage">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <!-- الجهة المصدرة -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="issuing_authority">الجهة المصدرة</label>
                                                                <input type="text" class="form-control"
                                                                    name="issuing_authority" id="issuing_authority"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <!-- اجمالي عدد المباني -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="total_buildings">اجمالي عدد المباني</label>
                                                                <input type="number" class="form-control"
                                                                    name="total_buildings" id="total_buildings"
                                                                    min="1" value="1">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">

                                                        <!-- وصف المبنى -->
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="description">وصف المبنى</label>
                                                                <textarea class="form-control" name="description" id="description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <button type="button" class="btn btn-primary btn-update-request"
                                                        data-action="save" data-form="#form_license"
                                                        data-url="update_license" data-method="POST">
                                                        تعديل
                                                    </button>
                                                </form>

                                                {{-- end form - --}}
                                            </div>


                                        </div>
                                    </div>

                                </div>

                                <div class="step-content active" id="step4">
                                    <div class="content_requests">
                                        <div class="contener_requests">

                                            <div class="modal-body">
                                                <h5 class="h5_lab">بيانات مكونات البناء</h5>
                                                {{-- form - --}}

                                                <form class="form_add" id="buildingComponent">

                                                    <!-- معرف الطلب المرتبط -->
                                                    <input type="hidden" name="license_id" id="license_id"
                                                        value="">
                                                    <input type="hidden" id="id" name="id">

                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="component_type">مكون البناء</label>
                                                                <select class="custom-select" name="floor_type_id"
                                                                    id="floor_type_id" required>
                                                                    <option value="">اختر...</option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="area">المساحة / الطول</label>
                                                                <input type="number" step="0.01"
                                                                    class="form-control" name="area"
                                                                    id="area" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="floors_count">عدد الادوار</label>
                                                                <input type="number" class="form-control"
                                                                    name="floors_count" id="floors_count" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="units_count">عدد الوحدات</label>
                                                                <input type="number" class="form-control"
                                                                    name="units_count" id="units_count" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="usage_type">الاستخدام</label>
                                                                <select class="custom-select" name="usage_type"
                                                                    id="usage_type" required>
                                                                    <option value="">اختر...</option>
                                                                    <option value="سكني">سكني</option>
                                                                    <option value="تجاري">تجاري</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <div class="bac">
                                                                <label for="building_percentage">نسبة البناء</label>
                                                                <input type="number" step="0.01"
                                                                    class="form-control" name="building_percentage"
                                                                    id="building_percentage" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mb-3">

                                                            <br>
                                                            {{-- <button type="button" id="btn-save"
                                                                class="btn btn-primary btn-save-request-number-loc"
                                                                data-action="save" data-form="#buildingComponent"
                                                                data-url="add-Building-Component_Ajax"
                                                                data-reload-container="#BuildingComponentTable"
                                                                data-reload-url="reload-BuildingComponent-get"
                                                                data-method="POST">
                                                                حفظ
                                                            </button> --}}

                                                            <button type="button" id="btn-edite"
                                                                class="btn btn-sm btn-outline-primary btn-update-request"
                                                                data-action="save" data-form="#buildingComponent"
                                                                data-url="update_Building_Component_show"
                                                                data-reload-container="#BuildingComponentTable"
                                                                data-reload-url="reload-BuildingComponent-get"
                                                                data-method="POST">
                                                                تعديل
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>


                                                {{-- end form - --}}
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

                                                            @include(
                                                                'modules.auth.requests.create.Build_components_table',
                                                                [
                                                                    'datac' => $datac ?? collect([]),
                                                                ]
                                                            )
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="step-content active" id="step5">

                                    <div class="content_requests">
                                        <div class="contener_requests">
                                            <div class="modal-body">
                                                <!-- المعلومات الجغرافية -->

                                                @include('modules.auth.requests.create.partials.location')

                                                {{-- <!-- الصف الثاني: حقول الإدخال -->
                                                <div class="row mb-4">
                                                    <div class="col-12">
                                                        <div class="form-section">
                                                            <form id="locationForm">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label class="form-label fw-bold">الجهة
                                                                                المصدرة</label>
                                                                            <input type="text" class="form-control"
                                                                                id="issuingAuthority" name="street"
                                                                                required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label
                                                                                class="form-label fw-bold">الامانة</label>
                                                                            <select class="form-select"
                                                                                id="municipality" name="municipality"
                                                                                required>
                                                                                <option value="">اختر الامانة
                                                                                </option>
                                                                                <option value="أمانة العاصمة">أمانة
                                                                                    العاصمة</option>
                                                                                <option value="أمانة صنعاء القديمة">
                                                                                    أمانة صنعاء القديمة</option>
                                                                                <option value="أمانة سنحان">أمانة سنحان
                                                                                </option>
                                                                                <option value="أمانة بني الحارث">أمانة
                                                                                    بني الحارث</option>
                                                                                <option value="أمانة همدان">أمانة همدان
                                                                                </option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label fw-bold">وحدة
                                                                                الجوار</label>
                                                                            <input type="text" class="form-control"
                                                                                id="neighborhoodUnit"
                                                                                name="neighborhood_unit" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label
                                                                                class="form-label fw-bold">الحي</label>
                                                                            <input type="text" class="form-control"
                                                                                id="district" name="district"
                                                                                required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label fw-bold">رقم
                                                                                المخطط</label>
                                                                            <input type="text" class="form-control"
                                                                                id="planNumber" name="plan_number"
                                                                                required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label class="form-label fw-bold">رقم
                                                                                البلوك</label>
                                                                            <input type="text" class="form-control"
                                                                                id="blockNumber" name="block_number"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="p-3 mb-3"
                                                                            style="background-color: #f8f9fa; border-radius: 8px; border-left: 4px solid var(--gold-primary);">
                                                                            <h6 class="fw-bold">
                                                                                <i
                                                                                    class="fas fa-map-pin gold-icon"></i>
                                                                                الإحداثيات الجغرافية
                                                                            </h6>
                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-2">
                                                                                    <label class="form-label">خط العرض
                                                                                        (X)</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="latitude" name="latitude"
                                                                                        readonly required>
                                                                                </div>
                                                                                <div class="col-md-6 mb-2">
                                                                                    <label class="form-label">خط الطول
                                                                                        (Y)</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="longitude"
                                                                                        name="longitude" readonly
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="d-grid gap-2 mt-3">
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-save-request-number"
                                                                                data-action="save"
                                                                                data-form="#locationForm"
                                                                                data-url="add-locations_Ajax"
                                                                                data-method="POST">
                                                                                <i class="fas fa-save me-2"></i> حفظ
                                                                                الموقع
                                                                            </button>

                                                                            <button type="button" id="resetBtn"
                                                                                class="btn btn-outline-secondary">
                                                                                <i class="fas fa-undo me-2"></i> إعادة
                                                                                تعيين
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <!-- بيانات الاراضي -->
                                                <form id="landDataForm" class="form_add"
                                                    style="border: snow solid 1px; margin-bottom: 30px">

                                                    <input type="hidden" name="request_id" id="request_id">
                                                    <input type="hidden" name="id" id="id">

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
                                                                <td><input type="text" class="form-control"
                                                                        name="plot_number" required>
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="area" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="building_system" required></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <h5 class="h5_lab">اشتراطات البناء لقطعة الارض</h5>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label>نسبة البناء</label>
                                                                <input type="text" class="form-control"
                                                                    name="building_percentage" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label>اقصى ارتفاع للمبنى</label>
                                                                <input type="text" class="form-control"
                                                                    name="max_height" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="h5_lab">تفاصيل النفايات</h5>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label>عمق الحفر</label>
                                                                <input type="text" class="form-control"
                                                                    name="excavation_depth">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label>كثافة التربة</label>
                                                                <input type="text" class="form-control"
                                                                    name="soil_density">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="h5_lab">تفاصيل الهيكل</h5>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label>نوع الهيكل</label>
                                                                <select class="form-control" id="structure_type"
                                                                    name="structure_type">
                                                                    <option value="">اختر نوع الهيكل</option>
                                                                    <option value="حجر مسلح">حجر مسلح</option>
                                                                    <option value="حجر منشار مسلح">حجر منشار مسلح
                                                                    </option>
                                                                    <option value="بلك مسلح">بلك مسلح</option>
                                                                    <option value="بلك شعبي">بلك شعبي</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <h5 class="h5_lab">تفاصيل الشارع</h5>
                                                    <div class="form-row">
                                                        <div class="col-md-4 mb-3">
                                                            <div class="bac">
                                                                <label>نوع الشارع</label>
                                                                <select class="form-control" id="street_type_id"
                                                                    name="street_type_id">
                                                                    <option value="">اختر نوع الشارع</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="bac">
                                                                <label>عرض الشارع (متر)</label>
                                                                <input type="text" class="form-control"
                                                                    name="street_width">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                            <div class="bac">
                                                                <label>رقم الشارع</label>
                                                                <input type="text" class="form-control"
                                                                    name="street_number">
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    <h5 class="h5_lab">مواقف السيارات</h5>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label>نوع الموقف</label>
                                                                <input type="text" class="form-control"
                                                                    name="parking_type">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label>مساحة الموقف</label>
                                                                <input type="text" class="form-control"
                                                                    name="parking_area">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary btn-update-request"
                                                        data-action="save" data-form="#landDataForm"
                                                        data-url="update_land_plots" data-method="POST">
                                                        <i class="fas fa-save me-2"></i> تعديل بيانات الارض
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
                                                                    <input type="text" class="form-control"
                                                                        name="deed_description_n">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="deed_description_e">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="deed_description_s">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        name="deed_description_w">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">الحد حسب الطبيعة</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_description_n">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_description_e">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_description_s">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_description_w">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">الطول حسب الصك</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="deed_length_n">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="deed_length_e">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="deed_length_s">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="deed_length_w">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">الطول حسب الطبيعة</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_length_n"></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_length_e">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_length_s"></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="nature_length_w">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">الشطفة</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="angle_n"></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="angle_e"></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="angle_s"></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="angle_w"></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">الاتجاه</th>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="direction_type_n">
                                                                        <option value="امامي">امامي</option>
                                                                        <option value="جانبي y">جانبي y</option>
                                                                        <option value="خلفي">خلفي</option>
                                                                        <option value="جانبي x">جانبي x</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="direction_type_e">
                                                                        <option value="امامي">امامي</option>
                                                                        <option value="جانبي y">جانبي y</option>
                                                                        <option value="خلفي">خلفي</option>
                                                                        <option value="جانبي x">جانبي x</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="direction_type_s">
                                                                        <option value="امامي">امامي</option>
                                                                        <option value="جانبي y">جانبي y</option>
                                                                        <option value="خلفي">خلفي</option>
                                                                        <option value="جانبي x">جانبي x</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"
                                                                        name="direction_type_w">
                                                                        <option value="امامي">امامي</option>
                                                                        <option value="جانبي y">جانبي y</option>
                                                                        <option value="خلفي">خلفي</option>
                                                                        <option value="جانبي x">جانبي x</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">الارتداد</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="setback_n" required>
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="setback_e" required>
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="setback_s" required>
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        name="setback_w" required>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">البروز</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="protrusion_n" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="protrusion_e" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="protrusion_s" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="protrusion_w" required></td>
                                                            </tr>


                                                            <tr>
                                                                <th scope="row">نوع الشارع</th>
                                                                <td>
                                                                    <select class="form-control" id="street_type_id_n"
                                                                        name="street_type_id_n">
                                                                        <option value="">اختر نوع الشارع</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="street_type_id_e"
                                                                        name="street_type_id_e">
                                                                        <option value="">اختر نوع الشارع</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="street_type_id_s"
                                                                        name="street_type_id_s">
                                                                        <option value="">اختر نوع الشارع</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" id="street_type_id_w"
                                                                        name="street_type_id_w">
                                                                        <option value="">اختر نوع الشارع</option>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">عرض الشارع (متر)</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="street_width_n" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="street_width_e" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="street_width_s" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="street_width_w" required></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">رقم الشارع</th>
                                                                <td><input type="number" class="form-control"
                                                                        name="street_number_n" required></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="street_number_e" required></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="street_number_s" required></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="street_number_w" required></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">حدود الموقف</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_boundaries_n" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_boundaries_e" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_boundaries_s" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_boundaries_w" required></td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row">أطوال الموقف</th>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_lengths_n" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_lengths_e" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_lengths_s" required></td>
                                                                <td><input type="text" class="form-control"
                                                                        name="parking_lengths_w" required></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <br>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-update-boundaries"
                                                        data-action="save" data-form="#boundariesForm"
                                                        data-url="update_boundaries" data-method="POST">
                                                        <i class="fas fa-save me-2"></i> تعديل الحدود والأبعاد
                                                    </button>
                                                </form>

                                                <br><br>
                                                <!-- بيانات تقرير المهندس -->
                                                <form class="form_add" id="engineer_site_reports">
                                                    <!-- الحقول المخفية -->

                                                    <input type="hidden" name="id" id="id">
                                                    <input type="hidden" name="request_id">
                                                    <input type="hidden" name="engineer_id">

                                                    <h5 class="h5_lab">بيانات تقرير المهندس</h5>

                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="engineer_id_select">المهندس</label>
                                                                <select class="custom-select" id="engineer_id_select"
                                                                    name="engineer_id" required>
                                                                    <option value="">اختر المهندس</option>
                                                                    <option value="1">عمر المحجري</option>
                                                                    <!-- خيارات المهندسين ستضاف ديناميكياً -->
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="inspection_date">تاريخ النزول</label>
                                                                <input type="date" class="form-control"
                                                                    id="inspection_date" name="inspection_date"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="condition">حالة الموقع</label>
                                                                <select class="custom-select" id="condition"
                                                                    name="condition">
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
                                                                <input type="text" class="form-control"
                                                                    id="recommendation" name="recommendation">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-3">
                                                            <div class="bac">
                                                                <label for="request_type">نوع الطلب</label>
                                                                <select class="custom-select" id="request_type"
                                                                    name="request_type">
                                                                    <option value="">اختر النوع</option>
                                                                    <option value="1">ترخيص بناء</option>
                                                                    <option value="3">ترخيص تسوير</option>
                                                                    <option value="2">ترخيص هدم</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-10 mb-3">
                                                            <div class="bac">
                                                                <label for="report_text">تفاصيل المعاينة</label>
                                                                <textarea class="form-control" id="report_text" name="report_text" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="submit" class="btn btn-primary btn-update-request"
                                                        data-action="save" data-form="#engineer_site_reports"
                                                        data-url="update_engineer_site_reports" data-method="POST">
                                                        <i class="fas fa-save me-2"></i>تعديل التقرير
                                                    </button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- تبويب سير العمل -->
                            <div class="tab-pane fade" id="requestTimeline" role="tabpanel">
                                <div class="workflow-step completed">
                                    <div class="d-flex justify-content-between">
                                        <h5>تقديم الطلب</h5>
                                        <small class="text-muted">2024-06-10 09:30</small>
                                    </div>
                                    <p>تم تقديم الطلب بواسطة محمد أحمد</p>
                                </div>
                                <div class="workflow-step completed">
                                    <div class="d-flex justify-content-between">
                                        <h5>المراجعة الأولية</h5>
                                        <small class="text-muted">2024-06-10 10:15</small>
                                    </div>
                                    <p>تمت مراجعة الطلب من قبل قسم الاستقبال</p>
                                </div>
                                <div class="workflow-step current">
                                    <div class="d-flex justify-content-between">
                                        <h5>المراجعة الفنية</h5>
                                        <small class="text-muted">2024-06-11 08:45</small>
                                    </div>
                                    <p>الطلب قيد المراجعة من قبل الفريق الفني</p>
                                </div>
                                <div class="workflow-step pending">
                                    <div class="d-flex justify-content-between">
                                        <h5>التعيين للمهندس</h5>
                                        <small class="text-muted">قيد الانتظار</small>
                                    </div>
                                    <p>سيتم تعيين مهندس للمشروع بعد الانتهاء من المراجعة</p>
                                </div>
                                <div class="workflow-step pending">
                                    <div class="d-flex justify-content-between">
                                        <h5>المراجعة الميدانية</h5>
                                        <small class="text-muted">قيد الانتظار</small>
                                    </div>
                                    <p>سيتم تحديد موعد للزيارة الميدانية</p>
                                </div>
                                <div class="workflow-step pending">
                                    <div class="d-flex justify-content-between">
                                        <h5>الإنجاز النهائي</h5>
                                        <small class="text-muted">قيد الانتظار</small>
                                    </div>
                                    <p>سيتم إصدار الرخصة بعد استكمال جميع المتطلبات</p>
                                </div>
                            </div>

                            <!-- تبويب المستندات -->
                            <div class="tab-pane fade" id="requestDocuments" role="tabpanel">
                                <form class="form_attachments" id="showAttachments">
                                    {{-- <div class="file-preview">
                                    <div class="d-flex justify-content-between">
                                        <h6>المخططات الهندسية.pdf</h6>
                                        <div>
                                            <button type="button" class="btn btn-sm  btn-pdf btn-outline-primary" data-bs-toggle="modal" data-bs-target="#pdfModal" data-pdf-source="https://arxiv.org/pdf/2203.00001">
                                                    <i class="bi bi-eye"></i>عرض
                                                </button>
                                            <button class="btn btn-sm btn-outline-secondary">تحميل</button>
                                        </div>
                                    </div>
                                    <small class="text-muted">تم الرفع في 2024-06-10 09:35</small>
                                  </div>
                                  <div class="file-preview">
                                    <div class="d-flex justify-content-between">
                                        <h6>صك الملكية.pdf</h6>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-pdf btn-outline-primary" data-bs-toggle="modal" data-bs-target="#pdfModal" data-pdf-source="https://arxiv.org/pdf/2203.00001">
                                                    <i class="bi bi-eye"></i>عرض
                                                </button>
                                            <button class="btn btn-sm btn-outline-secondary">تحميل</button>
                                        </div>
                                    </div>
                                    <small class="text-muted">تم الرفع في 2024-06-10 09:36</small>
                                  </div>
                                  <div class="file-preview">
                                    <div class="d-flex justify-content-between">
                                        <h6>تقرير التربة.pdf</h6>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-pdf btn-outline-primary" data-bs-toggle="modal" data-bs-target="#pdfModal" data-pdf-source="https://arxiv.org/pdf/2203.00001">
                                                    <i class="bi bi-eye"></i>عرض
                                                </button>
                                            <button class="btn btn-sm btn-outline-secondary">تحميل</button>
                                        </div>
                                    </div>
                                    <small class="text-muted">تم الرفع في 2024-06-10 09:38</small>
                                  </div> --}}
                                </form>
                            </div>

                            <!-- تبويب الزيارات الميدانية -->
                            <div class="tab-pane fade" id="siteVisits" role="tabpanel">
                                <div class="alert alert-info">
                                    لا توجد زيارات ميدانية مسجلة بعد
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#scheduleVisitModal">جدولة زيارة جديدة</button>
                            </div>

                            <!-- تبويب التعديلات المطلوبة -->
                            <div class="tab-pane fade" id="requestCorrections" role="tabpanel">
                                <div class="alert alert-warning">
                                    <h5>التعديلات المطلوبة:</h5>
                                    <ul>
                                        <li>تعديل المخططات الهندسية لتتوافق مع الأنظمة البلدية</li>
                                        <li>إضافة مخططات الكهرباء والصرف الصحي</li>
                                        <li>تعديل مساحات مواقف السيارات لتتوافق مع المتطلبات</li>
                                    </ul>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#resubmitModal">إعادة تقديم الطلب بعد التعديل</button>
                            </div>

                            <!-- تبويب حساب الرسوم -->
                            <div class="tab-pane fade" id="feeCalculation" role="tabpanel">
                                <table class="table" id="TableFeeStructure">
                                    <tbody id="tbodyFeeStructure">
                                        {{-- <tr>
                                                <th>رسوم الرخصة</th>
                                                <td>5,000 ر.ي</td>
                                            </tr>
                                            <tr>
                                                <th>رسوم المراجعة</th>
                                                <td>1,200 ر.ي</td>
                                            </tr>
                                            <tr>
                                                <th>الضرائب</th>
                                                <td>500 ر.ي</td>
                                            </tr>
                                            <tr style="background-color: rgba(0, 255, 34, 0.253);">
                                                <th>الإجمالي</th>
                                                <td><strong>6,700 ر.ي</strong></td>
                                            </tr> --}}
                                    </tbody>
                                </table>
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#invoiceModal">إصدار الفاتورة</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- القسم الجانبي -->
            <div class="col-md-4">
                <!-- إجراءات الطلب -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>الإجراءات</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-success mb-2" data-bs-toggle="modal"
                                data-bs-target="#approveModal">قبول الطلب</button>
                            <button class="btn btn-danger mb-2" data-bs-toggle="modal"
                                data-bs-target="#rejectModal">رفض الطلب</button>
                            <button class="btn btn-warning mb-2" data-bs-toggle="modal"
                                data-bs-target="#changesModal">طلب تعديل</button>
                            <button class="btn btn-info mb-2" data-bs-toggle="modal"
                                data-bs-target="#assignModal">تعيين لمهندس</button>
                            <button class="btn btn-secondary mb-2" data-bs-toggle="modal"
                                data-bs-target="#paymentModal">إرسال رابط الدفع</button>
                            <button class="btn btn-outline-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#notifyModal">إرسال إشعار للعميل</button>
                            <button class="btn btn-outline-secondary mb-2" data-bs-toggle="modal"
                                data-bs-target="#reportModal">إنشاء تقرير</button>
                        </div>
                    </div>
                </div>

                <!-- التعليقات والملاحظات -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>التعليقات والملاحظات</h5>
                    </div>
                    <div class="card-body">
                        <div id="commentsContainer"></div>

                        <form id="commentForm" class="mt-4">
                            <div class="mb-3">
                                <label for="newComment" class="form-label">إضافة تعليق</label>
                                <textarea class="form-control" id="newComment" rows="3" placeholder="أدخل تعليقك هنا..."></textarea>
                            </div>
                            <button type="button" id="clickComments" class="btn btn-primary">إرسال</button>
                        </form>
                    </div>
                </div>
                {{-- <!-- معلومات المتابعة -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>معلومات المتابعة</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6>الموظف المسؤول:</h6>
                            <select class="form-select" id="assignedUser">
                                <option selected>محمد أحمد</option>
                                <option>سارة علي</option>
                                <option>أحمد سعيد</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <h6>أولوية الطلب:</h6>
                            <select class="form-select" id="requestPriority">
                                <option>منخفضة</option>
                                <option selected>متوسطة</option>
                                <option>عاجلة</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <h6>تاريخ الانتهاء المتوقع:</h6>
                            <input type="date" class="form-control" value="2024-07-10">
                        </div>
                        <div class="mb-3">
                            <h6>نسبة الإنجاز:</h6>
                            <div class="progress">
                                <div class="progress-bar" style="width: 30%">30%</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6>تاريخ الإنشاء:</h6>
                            <p>10/06/2024</p>
                        </div>
                        <div class="mb-3">
                            <h6>آخر تحديث:</h6>
                            <p>12/06/2024 14:30</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Modal: قبول الطلب -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد قبول الطلب</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد من قبول هذا الطلب؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">تأكيد القبول</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: رفض الطلب -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">سبب الرفض</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="rejectReason" class="form-label">السبب</label>
                            <select class="form-select" id="rejectReason">
                                <option value="missing_docs">مستندات ناقصة</option>
                                <option value="invalid_info">معلومات غير صحيحة</option>
                                <option value="violation">مخالفة للأنظمة</option>
                                <option value="other">أخرى</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rejectDetails" class="form-label">التفاصيل</label>
                            <textarea class="form-control" id="rejectDetails" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">تأكيد الرفض</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: طلب تعديل -->
    <div class="modal fade" id="changesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">طلب تعديلات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="changesDetails" class="form-label">التعديلات المطلوبة</label>
                            <textarea class="form-control" id="changesDetails" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">إرسال طلب التعديل</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: تعيين مهندس -->
    <div class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعيين مهندس للمشروع</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="engineerSelect" class="form-label">اختر المهندس</label>
                            <select class="form-select" id="engineerSelect">
                                <option value="1">أحمد سعيد</option>
                                <option value="2">سارة محمد</option>
                                <option value="3">خالد عبدالله</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">تعيين</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: إرسال رابط الدفع -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إرسال رابط الدفع</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>سيتم إرسال رابط الدفع للعميل عبر البريد الإلكتروني والرسائل النصية.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">إرسال</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: إشعار العميل -->
    <div class="modal fade" id="notifyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إرسال إشعار للعميل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="notificationType" class="form-label">نوع الإشعار</label>
                            <select class="form-select" id="notificationType">
                                <option value="update">تحديث حالة الطلب</option>
                                <option value="documents">طلب مستندات إضافية</option>
                                <option value="visit">موعد زيارة ميدانية</option>
                                <option value="payment">طلب الدفع</option>
                                <option value="other">أخرى</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="notificationMessage" class="form-label">الرسالة</label>
                            <textarea class="form-control" id="notificationMessage" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">إرسال</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: إنشاء تقرير -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إنشاء تقرير</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="reportType" class="form-label">نوع التقرير</label>
                            <select class="form-select" id="reportType">
                                <option value="status">تقرير حالة الطلب</option>
                                <option value="financial">تقرير مالي</option>
                                <option value="technical">تقرير فني</option>
                                <option value="timeline">تقرير سير العمل</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="reportFormat" class="form-label">صيغة التقرير</label>
                            <select class="form-select" id="reportFormat">
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                                <option value="word">Word</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">إنشاء التقرير</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: إعادة تقديم الطلب -->
    <div class="modal fade" id="resubmitModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إعادة تقديم الطلب</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد من إعادة تقديم الطلب بعد التعديلات؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">تأكيد</button>
                </div>
            </div>
        </div>
    </div>


    {{-- ///////////////////////////////////////////////////////////// --}}

    
    <!-- Modal: إصدار الفاتورة -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إصدار الفاتورة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>سيتم إصدار فاتورة بقيمة 6,700 ريال سعودي للطلب الحالي.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">إصدار الفاتورة</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: جدولة زيارة -->
    <div class="modal fade" id="scheduleVisitModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">جدولة زيارة ميدانية</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="visitDate" class="form-label">تاريخ الزيارة</label>
                            <input type="date" class="form-control" id="visitDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="visitTime" class="form-label">وقت الزيارة</label>
                            <input type="time" class="form-control" id="visitTime" required>
                        </div>
                        <div class="mb-3">
                            <label for="visitEngineer" class="form-label">المهندس المسؤول</label>
                            <select class="form-select" id="visitEngineer" required>
                                <option value="1">أحمد سعيد</option>
                                <option value="2">سارة محمد</option>
                                <option value="3">خالد عبدالله</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="visitNotes" class="form-label">ملاحظات</label>
                            <textarea class="form-control" id="visitNotes" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">حفظ الموعد</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-pdf {
            background: linear-gradient(135deg, #6c5ce7, #0984e3);
            color: white;
            border: none;
            transition: all 0.3s;
            box-shadow: 0 10px 25px rgba(108, 92, 231, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-pdf:hover {
            background: linear-gradient(135deg, #0984e3, #6c5ce7);
            box-shadow: 0 15px 35px rgba(108, 92, 231, 0.4);
            transform: translateY(-3px);
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, #0984e3, #6c5ce7);
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            padding: 5px 10px;
        }

        .modal-title {
            font-weight: 700;
            font-size: 1.4rem;
        }

        .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }

        .btn-close:hover {
            opacity: 1;
        }

        h4 {
            /* color: #2d3436;
            margin-bottom: 20px;
            padding-bottom: 10px; */
            border-bottom: 2px solid #0984e3;
        }

        .h5 {
            color: #ffffff;
        }

        .title {
            color: #2d3436;
            /* margin-bottom: 30px; */
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .pdf-container {
                height: 60vh;
                padding: 10px;
            }

            .pdf-content {}

            .btn-pdf {

                font-size: 1.1rem;
            }
        }
    </style>

    <!-- مودال عرض PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h5">المستند التقني</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>


    {{-- <script>
    $(document).ready(function() {
        var requestId = {{ $request->id }};

        // دالة تحميل التعليقات
        function loadComments() {
            $.ajax({
                url: '/requests/' + requestId + '/comments',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var container = $('#commentsContainer');
                    container.empty();

                    $.each(data, function(index, comment) {
                        var div = $('<div class="comment-box p-3 mb-3"></div>');
                        div.html(`
                            <div class="d-flex justify-content-between mb-2">
                                <strong>${comment.user_name}</strong>
                                <small class="text-muted">${new Date(comment.created_at).toLocaleString('ar-EG')}</small>
                            </div>
                            <p>${comment.comment}</p>
                        `);
                        container.append(div);
                    });
                },
                error: function(err) {
                    console.error(err);
                }
            });
        }

        // تحميل التعليقات عند فتح الصفحة
        loadComments();

        // إضافة تعليق جديد
        $('#commentForm').submit(function(e) {
            e.preventDefault();
            var comment = $('#newComment').val().trim();
            if (!comment) {
                alert('يرجى إدخال تعليق.');
                return;
            }

            $.ajax({
                url: '/requests/' + requestId + '/comments',
                type: 'POST',
                dataType: 'json',
                data: {
                    comment: comment,
                    _token: $('input[name="_token"]').val()
                },
                success: function(data) {
                    $('#newComment').val(''); // مسح الحقل بعد الإرسال
                    loadComments(); // إعادة تحميل التعليقات بعد الإضافة
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });
    });
</script> --}}



{{-- التعليقات --}}
    <script>
        // const requestId = {{ $id }};

        // تحميل التعليقات
        function loadComments() {

            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح


            $.getJSON(`/requests/${requestId}/comments`, function(data) {
                const container = $('#commentsContainer');
                container.empty();

                $.each(data, function(i, comment) {
                    // أول حرف من اسم المستخدم
                    const firstChar = comment.user_name.charAt(0).toUpperCase();

                    container.append(`
                <div class="comment-box d-flex p-3 mb-3 border rounded align-items-start">
                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center " style="width:40px; height:40px; font-weight:bold;">
                        ${firstChar}
                    </div>
                    <div class="comment-content">
                        <div class="d-flex justify-content-between mb-2">
                            <strong>${comment.user_name}</strong>
                            <small class="text-muted">${new Date(comment.created_at).toLocaleString('ar-EG')}</small>
                        </div>
                        <p class="mb-0">${comment.comment}</p>
                    </div>
                </div>
            `);
                });
            });
        }

        $(document).ready(function() {

            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            loadComments();

            $('#commentForm').on('click', '#clickComments', function(e) {
                e.preventDefault();
                const comment = $('#newComment').val().trim();
                if (!comment) return alert('يرجى إدخال تعليق');

                $.ajax({
                    url: `/requests/${requestId}/comments`,
                    method: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        comment: comment
                    },
                    success: function(data) {
                        $('#newComment').val('');
                        loadComments();
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            });
        });
    </script>


    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}




    {{-- عرض للكومبو بكس --}}
    <script>
        // ////////////////////////////عرض المديريات
        $(document).ready(function() {

            /////////////اخفاء زر حفظ الموقع
            $('#save').hide();


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


            // ////////////////////////////عرض نوع الطلب
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


        // ////////////////////////////عرض المستندات
        $(document).ready(function() {
            let reloadUrl = 'reload-attachments-Show';
            const formSelector = '#showAttachments';

            // 👇 نجلب رقم الطلب من span
            const requestId = $('#requestNumber').data('id');
            if (requestId) {
                reloadUrl += '/' + requestId;
            }

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    renderAttachments(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات', 'error');
                    // إخفاء الفورم إذا ما في بيانات
                    $(formSelector).hide();
                }
            });

            // 👇 دالة عرض المرفقات
            function renderAttachments(data, formSelector) {
                const form = $(formSelector);
                form.empty(); // تنظيف المحتوى قبل العرض الجديد

                // المرفقات المحتملة
                const attachmentsMap = {
                    structural_plan_path: "المخططات الإنشائية",
                    architectural_plan_path: "المخططات المعمارية",
                    id_card_image_path: "صورة الهوية",
                    ownership_deed_path: "صك الملكية",
                    soil_report_path: "تقرير التربة",
                    site_image_path: "صورة الموقع",
                    facade_image_path: "صورة الواجهة",
                    other_attachments_path: "مرفقات أخرى"
                };

                Object.entries(attachmentsMap).forEach(([key, label]) => {
                    if (data[key]) {
                        const fileUrl = data[key].startsWith("http") ? data[key] : `/storage/${data[key]}`;
                        const fileName = label + ".pdf";

                        const fileHtml = `
                <div class="file-preview mb-3">
                    <div class="d-flex justify-content-between">
                        <h6>${fileName}</h6>
                        <div>
                            <button type="button"
                                    class="btn btn-sm btn-pdf btn-outline-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#pdfModal"
                                    data-pdf-source="${fileUrl}"
                                    data-pdf-title="${fileName}">
                                <i class="bi bi-eye"></i> عرض
                            </button>
                            <a href="${fileUrl}" download class="btn btn-sm btn-outline-secondary">
                                تحميل
                            </a>
                        </div>
                    </div>
                    <small class="text-muted">تم الرفع في ${data.updated_at || ''}</small>
                </div>`;
                        form.append(fileHtml);
                    }
                });
            }

            // 👇 عند الضغط على زر العرض نغير الـ iframe داخل المودال
            $(document).on("click", ".btn-pdf", function() {
                const pdfUrl = $(this).data("pdf-source");
                const pdfTitle = $(this).data("pdf-title");

                // نضيف iframe داخل المودال
                $("#pdfModal .modal-body").html(`
            <iframe src="${pdfUrl}" width="100%" height="600px" style="border:none;"></iframe>
        `);

                // نحدث عنوان المودال
                $("#pdfModal .modal-title").text(pdfTitle);
            });
        });



        // ////////////////////////////عرض الرسوم
        $(document).ready(function() {
            let reloadUrl = 'fee_structures_sum';
            const table = '#tbodyFeeStructure';

            // 👇 نجلب رقم الطلب من span
            const requestId = $('#requestNumber').data('id');
            if (requestId) {
                reloadUrl += '/' + requestId;
            }

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    renderAttachments(response, table);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات', 'error');
                }
            });

            // 👇 دالة عرض الرسوم
            function renderAttachments(data, table) {
                const tableEl = $(table);
                tableEl.empty();

                let fileHtml = '';
                let grandTotal = 0;

                // 🔹 نلف على كل دور مرجع من السيرفر
                data.forEach(floor => {
                    grandTotal += floor.total;

                    fileHtml += `
                        <tr class="table-info">
                            <th>الدور</th>
                            <td><strong>${floor.floor_type}</strong></td>
                        </tr>
                        <tr>
                            <th>رسوم الترخيص</th>
                            <td>${floor.license_fee.toLocaleString()} ر.ي</td>
                        </tr>
                        <tr>
                            <th>رسوم اشغال الطريق</th>
                            <td>${floor.road_occupation_fee.toLocaleString()} ر.ي</td>
                        </tr>
                        <tr>
                            <th>رسوم إزالة النفايات</th>
                            <td>${floor.waste_removal_fee.toLocaleString()} ر.ي</td>
                        </tr>
                        <tr>
                            <th>رسوم تنمية وكوارث</th>
                            <td>${floor.development_disaster_fee.toLocaleString()} ر.ي</td>
                        </tr>
                        <tr>
                            <th>الإجمالي</th>
                            <td><strong>${floor.total.toLocaleString()} ر.ي</strong></td>
                        </tr>
                    `;
                });

                // 🔹 صف أخضر للإجمالي الكلي
                fileHtml += `
                    <tr class="table-success">
                        <th>الإجمالي الكلي</th>
                        <td>${grandTotal.toLocaleString()} ر.ي</td>
                    </tr>
                `;

                tableEl.append(fileHtml);
            }




        });
    </script>


    {{-- function renderAttachments(data, table) {
        const tableEl = $(table);
        tableEl.empty();

        const fileHtml = `
            <tr>
                <th>رسوم الترخيص</th>
                <td>${data.license_fee.toLocaleString()} ر.ي</td>
            </tr>
            <tr>
                <th>رسوم اشغال الطريق</th>
                <td>${data.road_occupation_fee.toLocaleString()} ر.ي</td>
            </tr>
            <tr>
                <th>رسوم إزالة النفايات</th>
                <td>${data.waste_removal_fee.toLocaleString()} ر.ي</td>
            </tr>
            <tr>
                <th>رسوم تنمية وكوارث</th>
                <td>${data.development_disaster_fee.toLocaleString()} ر.ي</td>
            </tr>
            <tr>
                <th>الإجمالي</th>
                <td><strong>${data.total.toLocaleString()} ر.ي</strong></td>
            </tr>
        `;
        tableEl.append(fileHtml);
    } --}}



    <script>
        $(document).ready(function() {


            let reloadUrl = 'reload-beneficiaries-CitizenShow';
            const formSelector = '#form_Req';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    fillEditFormRaa(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');
                }
            });




            function fillEditFormRaa(responseData, formSelector) {
                const form = $(formSelector);


                let formB = $('#form_request');
                formB.find('[name="id"]').val(responseData.id);

                Object.entries(responseData).forEach(([key, value]) => {
                    const input = form.find(`[name="${key}"]`);

                    if (input.length) {
                        const tagName = input.prop("tagName").toLowerCase();
                        const type = input.attr("type");

                        if (tagName === "input" || tagName === "textarea") {
                            if (type === "checkbox") {
                                input.prop("checked", !!value);
                            } else {
                                input.val(value ?? '');
                            }
                        } else if (tagName === "select") {
                            input.val(value ?? '').trigger("change");
                        }
                    }
                });
            }

        });

        $(document).ready(function() {


            let reloadUrl = 'reload-requests-Show';
            const formSelector = '#form_request';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    fillEditFormRaa(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');
                }
            });

            function fillEditFormRaa(responseData, formSelector) {
                const form = $(formSelector);


                let formB = $('#form_request');
                formB.find('[name="id"]').val(responseData.id);

                Object.entries(responseData).forEach(([key, value]) => {
                    const input = form.find(`[name="${key}"]`);

                    if (input.length) {
                        const tagName = input.prop("tagName").toLowerCase();
                        const type = input.attr("type");

                        if (tagName === "input" || tagName === "textarea") {
                            if (type === "checkbox") {
                                input.prop("checked", !!value);
                            } else {
                                input.val(value ?? '');
                            }
                        } else if (tagName === "select") {
                            input.val(value ?? '').trigger("change");
                        }
                    }
                });
            }
        });

        $(document).ready(function() {


            let reloadUrl = 'reload-licenses-Show';
            const formSelector = '#form_license';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    fillEditFormRaa(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');

                    // 🔥 إخفاء الفورم عند عدم وجود بيانات
                    $(formSelector).hide();
                }
            });

            function fillEditFormRaa(responseData, formSelector) {
                const form = $(formSelector);


                let formB = $('#form_request');
                formB.find('[name="id"]').val(responseData.id);

                Object.entries(responseData).forEach(([key, value]) => {
                    const input = form.find(`[name="${key}"]`);

                    if (input.length) {
                        const tagName = input.prop("tagName").toLowerCase();
                        const type = input.attr("type");

                        if (tagName === "input" || tagName === "textarea") {
                            if (type === "checkbox") {
                                input.prop("checked", !!value);
                            } else {
                                input.val(value ?? '');
                            }
                        } else if (tagName === "select") {
                            input.val(value ?? '').trigger("change");
                        }
                    }
                });
            }
        });

        $(document).ready(function() {


            let reloadUrl = 'reload-BuildingComponent-show';
            const formSelector = '#buildingComponent';
            const reloadContainer = '#BuildingComponentTable';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    if (reloadUrl && reloadContainer) reloadTable(reloadContainer, reloadUrl);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');
                }
            });

            function reloadTable(containerSelector, reloadUrl) {
                $.ajax({
                    url: reloadUrl,
                    type: 'GET',
                    success: function(response) {
                        $(containerSelector).html(response);
                    },
                    error: function() {
                        alert('فشل في تحديث الجدول.');
                    }
                });
            }

        });

        $(document).ready(function() {


            let reloadUrl = 'reload-locations-Show';
            const formSelector = '#locationForm';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    fillEditFormRaa(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');

                    // 🔥 إخفاء الفورم عند عدم وجود بيانات
                    $(formSelector).hide();
                }
            });

            function fillEditFormRaa(responseData, formSelector) {
                const form = $(formSelector);


                let formB = $('#form_request');
                formB.find('[name="id"]').val(responseData.id);

                Object.entries(responseData).forEach(([key, value]) => {
                    const input = form.find(`[name="${key}"]`);

                    if (input.length) {
                        const tagName = input.prop("tagName").toLowerCase();
                        const type = input.attr("type");

                        if (tagName === "input" || tagName === "textarea") {
                            if (type === "checkbox") {
                                input.prop("checked", !!value);
                            } else {
                                input.val(value ?? '');
                            }
                        } else if (tagName === "select") {
                            input.val(value ?? '').trigger("change");
                        }
                    }
                });
            }
        });

        $(document).ready(function() {


            let reloadUrl = 'reload-land_plots-Show';
            const formSelector = '#landDataForm';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    fillEditFormRaa(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');

                    // 🔥 إخفاء الفورم عند عدم وجود بيانات
                    $(formSelector).hide();
                }
            });

            function fillEditFormRaa(responseData, formSelector) {
                const form = $(formSelector);


                let formB = $('#form_request');
                formB.find('[name="id"]').val(responseData.id);

                Object.entries(responseData).forEach(([key, value]) => {
                    const input = form.find(`[name="${key}"]`);

                    if (input.length) {
                        const tagName = input.prop("tagName").toLowerCase();
                        const type = input.attr("type");

                        if (tagName === "input" || tagName === "textarea") {
                            if (type === "checkbox") {
                                input.prop("checked", !!value);
                            } else {
                                input.val(value ?? '');
                            }
                        } else if (tagName === "select") {
                            input.val(value ?? '').trigger("change");
                        }
                    }
                });
            }
        });

        $(document).ready(function() {


            let reloadUrl = 'reload-boundaries-Show';
            const formSelector = '#boundariesForm';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    fillEditFormRaa(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');

                    // 🔥 إخفاء الفورم عند عدم وجود بيانات
                    $(formSelector).hide();
                }
            });

            function fillEditFormRaa(responseData, formSelector) {
                const form = $(formSelector);


                let formB = $('#form_request');
                formB.find('[name="id"]').val(responseData.id);

                Object.entries(responseData).forEach(([key, value]) => {
                    const input = form.find(`[name="${key}"]`);

                    if (input.length) {
                        const tagName = input.prop("tagName").toLowerCase();
                        const type = input.attr("type");

                        if (tagName === "input" || tagName === "textarea") {
                            if (type === "checkbox") {
                                input.prop("checked", !!value);
                            } else {
                                input.val(value ?? '');
                            }
                        } else if (tagName === "select") {
                            input.val(value ?? '').trigger("change");
                        }
                    }
                });
            }
        });

        $(document).ready(function() {


            let reloadUrl = 'reload-engineer_site_reports-Show';
            const formSelector = '#engineer_site_reports';

            // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
            const requestId = $('#requestNumber').data('id'); // هذا هو id الصحيح
            if (requestId) {
                reloadUrl += '/' + requestId; // نضيف request_id كجزء من المسار
            }

            // '#form_Req'

            $.ajax({
                url: reloadUrl,
                method: 'GET',
                success: function(response) {
                    console.log("✅ البيانات المستلمة:", response);
                    fillEditFormRaa(response, formSelector);
                },
                error: function(xhr, status, error) {
                    console.error("❌ خطأ:", status, error, xhr.responseText);
                    Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات',
                        'error');

                    // 🔥 إخفاء الفورم عند عدم وجود بيانات
                    $(formSelector).hide();
                }
            });

            function fillEditFormRaa(responseData, formSelector) {
                const form = $(formSelector);


                let formB = $('#form_request');
                formB.find('[name="id"]').val(responseData.id);

                Object.entries(responseData).forEach(([key, value]) => {
                    const input = form.find(`[name="${key}"]`);

                    if (input.length) {
                        const tagName = input.prop("tagName").toLowerCase();
                        const type = input.attr("type");

                        if (tagName === "input" || tagName === "textarea") {
                            if (type === "checkbox") {
                                input.prop("checked", !!value);
                            } else {
                                input.val(value ?? '');
                            }
                        } else if (tagName === "select") {
                            input.val(value ?? '').trigger("change");
                        }
                    }
                });
            }
        });
    </script>
