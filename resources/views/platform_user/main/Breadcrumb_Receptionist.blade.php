<style>
    :root {
        --primary-blue: #1d2d44;
        --secondary-blue: #2c5282;
        --gold-accent: #d69e2e;
        --success-green: #2f855a;
        --light-gray: #f7fafc;
        --medium-gray: #e2e8f0;
    }


    .content_requests{
  width: 100%;
  height: 100%;
  display: grid;
  place-items: center;
  padding-top: 0px;
    }


    .process-container {
        background-color: rgba(255, 255, 255, 0.726);
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.021);
        padding: 2rem;

        border: 1px solid var(--medium-gray);
    }

    .process-stepper {

        top: 20;
        display: flex;
        justify-content: space-between;

        margin-bottom: 2px;
        min-width: 400px;
        width: 100%;

        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--medium-gray);
        height: 85px;
        z-index: 1000;

    }

    .process-line {
        position: absolute;
        top: 130px;
        right: 22px;
        left: 0;
        height: 3px;
        background-color: var(--medium-gray);
        z-index: 1;
        border-radius: 3px;
    }

    .process-fill {
        position: absolute;
        top: 130px;
        right: 22px;
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

            .submit-section {
            text-align: center;
            padding: 25px;
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            border-radius: 10px;
            margin-top: 118px;
            border: 1px solid #dee2e6;
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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تراخيص البناء الألكتروني</title>



    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/layouts/admin/master.css', 'resources/css/layouts/admin/bootstrap.min.css', 'resources/css/layouts/admin/bootstrap-icons.css'])
    @else
        <style>
        </style>
    @endif



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">






    <style>
        .dropdown_Amr {
            width: auto;
            background-color: #fff;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* رأس القائمة */
        .dropdown_Amr .dropdown-header {
            background-color: #f5f5f5;
            color: #333;
            padding: 12px 15px;
            font-size: 15px;
            font-weight: 600;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* زر عرض الكل */
        .dropdown_Amr .dropdown-header a span {
            background-color: #e0e0e0;
            color: #000;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .dropdown_Amr .dropdown-header a span:hover {
            background-color: #cfcfcf;
        }

        /* فاصل */
        .dropdown_Amr hr.dropdown-divider {
            margin: 0;
            border-top: 1px solid #eee;
        }

        /* عنصر الرسالة */
        .dropdown_Amr .message-item {
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        .dropdown_Amr .message-item:hover {
            background-color: #f8f8f8;
        }

        /* تنسيق الرابط */
        .dropdown_Amr .message-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #222;
        }

        /* صورة المستخدم */
        .dropdown_Amr .message-item img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid #ccc;
            object-fit: cover;
        }

        /* اسم المستخدم */
        .dropdown_Amr .message-item h4 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            color: #222;
        }

        /* وقت الرسالة */
        .dropdown_Amr .message-item p {
            margin: 4px 0 0;
            font-size: 12px;
            color: #888;
        }

        /* التذييل */
        .dropdown_Amr .dropdown-footer {
            padding: 10px;
            text-align: center;
            background-color: #f5f5f5;
            border-top: 1px solid #e0e0e0;
        }

        .dropdown_Amr .dropdown-footer a {
            color: #333;
            font-weight: 500;
            text-decoration: none;
        }

        .dropdown_Amr .dropdown-footer a:hover {
            text-decoration: underline;
        }
    </style>


<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    {{-- <!-- أضف هذا داخل <head> إن لم يكن موجود -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script> --}}


     <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery من شبكة Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





<style>
    .process-controls {
        display: flex;
        align-items: center;
        gap: 20px;
        width: 600px;
    }

    .request-info {
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



        <div class="process-step" data-step="1">
            <div class="step-bubble">
                <i class="bi bi-send-check step-icon"></i>
            </div>
            <span class="step-title">الطلب</span>
        </div>

        <div class="process-step" data-step="2">
            <div class="step-bubble">
                <i class="bi bi-file-earmark-text step-icon"></i>
            </div>
            <span class="step-title">بيانات الرخصة</span>
        </div>

        <div class="process-step completed" data-step="3">
            <div class="step-bubble">
                <i class="bi bi-paperclip step-icon"></i>
                <span class="completion-badge"><i class="bi bi-check"></i></span>
            </div>
            <span class="step-title">المرفقات</span>
        </div>

        <div class="process-step completed active" data-step="4">
                    <div class="step-bubble">
                <i class="fas fa-paper-plane me-2"></i>
                <span class="completion-badge"><i class="bi bi-check"></i></span>
            </div>
            <span class="step-title">ارسال الطلب</span>
        </div>



    <div class="process-controls">
        <div class="request-info" style=" position: fixed; top: 72px; left: 15px; display: flex;">
            <i class="bi bi-file-earmark-text"></i>
            <div style=" display: flex;">
                <span class="request-label">رقم الطلب:</span>
                <span class="request-number" id="request-number" data-id="">RQ</span>

            </div>
        </div>

        {{-- <button class="btn btn-outline-blue " style="display: flex ;margin: 30px 0 0 2px;padding: 2px;" id="prevBtn">
            <i class="bi bi-arrow-right"></i> السابق
        </button>
        <button class="btn btn-gold" id="nextBtn" style="display: flex ;margin: 30px 0 0 2px;padding: 3px 7px;">
            حفظ الطلب <i class="bi bi-arrow-left"></i>
        </button> --}}
    </div>

</div>



<main class="">
    <div class="process-container ">

    <div id="Breadcrumb_Receptionist">

        <!-- محتوى المرحلة الحالية -->


        <div class="step-content active" id="step1">

            @vite(['resources/css/requests.css'])
            <div class="content_requests">
                <div class="contener_requests">

                    {{-- بيانات الطلب --}}
                    <div class="modal-body">
                        <h5 class="h5_lab">بيانات الطلب</h5>
                        {{-- form - --}}
                        <form class="form_request" id="form_request" enctype="multipart/form-data">
                            @csrf

                            <!-- معرف المستفيد -->
                            <input type="hidden" name="id" value="1">

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
                                {{-- <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="department_id">القسم</label>
                                        <select class="custom-select" name="department_id" id="department_id"
                                            required>
                                            <option value="">اختر القسم...</option>
                                        </select>
                                    </div>
                                </div> --}}

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
                                {{-- <div class="col-md-6 mb-3">
                                    <div class="bac">
                                        <label for="expected_completion_date">تاريخ الإنجاز المتوقع</label>
                                        <input type="date" class="form-control" name="expected_completion_date"
                                            id="expected_completion_date">
                                    </div>
                                </div> --}}
                            </div>

                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <br>
                                    <button type="button" class="btn-gold btn-save-request next-step-btn-request next-step-btn"
                                     data-step-target="2" {{-- خاصه بل انتقال الا الخطوه الثانيه --}}
                                      style="display: flex ;margin: 30px 0 0 2px;padding: 3px 7px;"  data-action="save" data-form="#form_request" data-url="add-requestsPlatform_Ajax"
                                        data-method="POST">
                                         التالي
                                    </button>
                                </div>
                            </div>
                        </form>


                        {{-- end form - --}}
                    </div>

                </div>
            </div>



        </div>

        <div class="step-content active" id="step2">
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
                            <button type="button" class="btn-gold btn-save-request-number next-step-btn-request next-step-btn"
                                 style="display: flex ;margin: 30px 0 0 2px;padding: 3px 7px;"    data-step-target="3"  data-action="save"
                                data-form="#form_license" data-url="add-license_Ajax" data-method="POST">
                                التالي
                            </button>
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
                        <h5 class="h5_lab">المرفقات</h5>
                        {{-- form - --}}

                        <form class="form_attachments" id="form_attachments" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>المخطط الإنشائي (pdf)</label>
                                    <input type="file" class="form-control" name="structural_plan_path" accept="application/pdf">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>المخطط المعماري (pdf)</label>
                                    <input type="file" class="form-control" name="architectural_plan_path" accept="application/pdf">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>صورة بطاقة المستفيد الشخصية (pdf)</label>
                                    <input type="file" class="form-control" name="id_card_image_path" accept="application/pdf">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>صك الملكية .طبق الاصل(pdf)</label>
                                    <input type="file" class="form-control" name="ownership_deed_path" accept="application/pdf">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>تقرير التربة (pdf)</label>
                                    <input type="file" class="form-control" name="soil_report_path" accept="application/pdf">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>صورة الموقع العام (ipg,png,jpeg,tif,tiff,bmp,gif,pdf)</label>
                                    <input type="file" class="form-control" name="site_image_path" accept="application/pdf">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>صورة الواجهة</label>
                                    <input type="file" class="form-control" name="facade_image_path" accept="application/pdf">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>مرفقات اخرى</label>
                                    <input type="file" class="form-control" name="other_attachments_path" accept="application/pdf">
                                </div>
                            </div>

                            <br>
                    <button type="submit" class="btn-gold btn-save-request-number next-step-btn" data-step-target="4" data-action="save"
                                style="display: flex ;margin: 30px 0 0 2px;padding: 3px 7px;"        data-form="#form_attachments" data-url="add-attachments_Ajax" data-method="POST">
                                        <i class="fas fa-save me-2"></i> التالي
                                    </button>

                        </form>
                    </div>







            {{-- end form - --}}
        </div>


        </div>
    </div>
        </div>

      <div class="step-content active" id="step4">
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


                  <div class="submit-section">
                        <h4 class="mb-4"><i class="fas fa-paper-plane me-2"></i>جاهز لإرسال الطلب؟</h4>
                        <p class="text-muted mb-4">بعد التأكد من صحة البيانات، يمكنك إرسال الطلب إلى إدارة المراجعة</p>

                        <button type="button" class="btn btn-submit" id="submitRequestBt" data-bs-toggle="modal" data-bs-target="#successModal">
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
                <button type="button" class="btn btn-primary ajax-link" data-page="main.Regulations.index" data-bs-dismiss="modal">موافق</button>
            </div>
        </div>
    </div>
</div>




<!-- نضيف هذا الجزء بدلاً من script -->
<div id="step-scripts"></div>

     @vite(['resources/js/platform_user/Ajax.js'])
  @vite(['resources/js/layouts/ajax-crud.js'])




     {{-- -الصوره-حقل
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



 --}}


  @vite(['resources/js/layouts/jquery-3.6.0.min.js'])

<script>


        $(document).ready(function() {

        // عند النقر على زر الإرسال يكمل الطلب
       $('#submitRequestBtn').on('click', function() {
                    $('#successModal').modal('show');

                    // تعطيل الزر بعد الإرسال
                    $('#submitRequestBtn').html('<i class="fas fa-check me-2"></i>تم إرسال الطلب');
                    $('#submitRequestBtn').prop('disabled', true);
                    $('#submitRequestBtn').css('background', 'linear-gradient(to right, #2ecc71, #27ae60)');

        });

    });
</script>

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
           // إذا كان في البداية نخليها 12%
    if (currentStep === 1) {
        progressPercent = 12;
    } else {
        // حساب النسبة حسب الخطوة
        progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
    }
        if (progressFill) progressFill.style.width = `${progressPercent}%`;

        steps.forEach((step, index) => {
            step.classList.remove('completed', 'active');
            if (index < currentStep - 1) step.classList.add('completed');
            else if (index === currentStep - 1) step.classList.add('active');
        });

        if (prevBtn) prevBtn.disabled = currentStep === 1;
        if (nextBtn) {
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
            url: "/api_directorates_platform",
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
            url: "/api_directorates_platform",
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
            url: "/api_directorates_platform",
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
            url: "/api_directorates_platform",
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
            url: "/request_type_platform",
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
            url: "/license_type_platform",
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
            url: "/department_platform",
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
            url: "/status_platform",
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
            url: "/current_stage_platform",
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
            url: "/building_type_platform",
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


</script>






