   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo.png') }}">
    <title>نظام تراخيص البناء الألكتروني</title>



    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/layouts/admin/master.css', 'resources/css/layouts/admin/bootstrap.min.css', 'resources/css/layouts/admin/bootstrap-icons.css'])
    @else
        <style>
        </style>
    @endif



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Linking Google Fonts for Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-yRHIrhNm+..." crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>






      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


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

<!-- NProgress -->
<link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>



    {{-- <!-- أضف هذا داخل <head> إن لم يكن موجود -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script> --}}


     <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery من شبكة Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- أضف هذه في قسم <head> -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.14.305/pdf.min.js"></script>

