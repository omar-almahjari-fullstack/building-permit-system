<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    @include('layouts.partials.head')


    @vite(['resources/js/app.js', 'resources/css/app.css'])




    <title>Ajax + Laravel + Controller</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>

        body {

            height: 100vh;
            width: 100%;
        }

        .countent-sidebar {
            height: 90vh;
            width: 100%;
            position: relative;
            top: 43px;
            display: flex;
            justify-content: space-evenly;
        }

        .countent {
            height: 90vh;
            width: 100%;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            margin-top: 18px;
            margin-bottom: 20px;
            margin-left: 10px;
            margin-right: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow-y: auto;
            overflow-x: hidden;
            transition: all 0.3s ease;
            font-family: 'Cairo', Tahoma, sans-serif;
            color: #333;
            line-height: 1.7;
        }


        #loader {
            display: none;
            color: gray;
        }

        #Jax {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;

            height: 100%;
        }
    </style>

</head>

<body dir="rtl">

    @include('layouts.partials.navbar')

    <div class="countent-sidebar">


        @include('layouts.partials.sidebar')


        <div id="loader">🔄 جاري التحميل...</div>
        <div class="countent" id="Jax">

            📌 سيتم تحميل المحتوى هنا
        </div>
    </div>



    {{-- <nav>
        <a onclick="getInfo('/ajax-page/home', handleHtmlResponse)">الرئيسية</a>
        <a onclick="getInfo('/ajax-page/about', handleHtmlResponse)">عن الموقع</a>
        <a onclick="getInfo('/ajax-page/contact', handleHtmlResponse)">اتصل بنا</a>
    </nav> --}}






    @include('layouts.partials.scripts')


    @vite(['resources/js/layouts/Ajax.js'])

@vite(['resources/js/chart.js'])



{{-- /////////////////////////////////////////////////////////////////////////////// --}}
{{-- كود مسح localStorage مرة واحدة عند تسجيل الدخول --}}

@if(session('clear_local_storage'))
<script>
    // مسح localStorage مرة واحدة فقط عند تسجيل الدخول
    localStorage.clear();
</script>
<?php
// بعد مسح الـ localStorage، نوقف الفلاج لمنع التنفيذ مرة ثانية
session()->forget('clear_local_storage');
?>
@endif
{{-- /////////////////////////////////////////////////////////////////////////////// --}}


    <script>
        const menuButton = document.querySelector('.sidebar-menu-button');
        const sidebar = document.querySelector('.sidebar');

        let sidebarVisible = false;

        menuButton.addEventListener('click', () => {
            // نتحقق إذا كانت الشاشة بحجم الجوال
            if (window.innerWidth <= 768) {
                sidebarVisible = !sidebarVisible;
                sidebar.style.display = sidebarVisible ? 'block' : 'none';
            }
        });

    </script>

</body>

</html>
