<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo.png') }}">

    <title>بوابة بلدي | الأمان والخصوصية</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <!-- إضافة مكتبة SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
           <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery من شبكة Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
      @include('layouts.partials.head')
<style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
      --primary-color: #00615e;
      --secondary-color: #4CAF50;
      --accent-color: #149ddd;
      --background-color: #f5f5f5;
      --card-color: #ffffff;
      --text-color: #333;
      --light-text: #777;
      --danger: #e74c3c;
      --warning: #f39c12;
      --success: #27ae60;
      --sidebar-width: 250px;
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
      background-color: var(--background-color);
      color: var(--text-color);
      direction: rtl;
      text-align: right;
      margin: 0;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    /* الشريط العلوي */
    .top-bar {
      background: linear-gradient(to right, var(--primary-color), #004d4b);
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      height: 70px;
    }

    .top-bar .profile-section {
      display: flex;
      align-items: center;
      gap: 15px;
      position: relative;
    }

    .top-bar .profile-section i {
      font-size: 22px;
      cursor: pointer;
      transition: var(--transition);
    }

    .top-bar .profile-section i:hover {
      transform: scale(1.1);
    }

    .top-bar .notification {
      background-color: var(--danger);
      color: white;
      border-radius: 50%;
      width: 22px;
      height: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      position: absolute;
      top: -8px;
      right: -8px;
      font-weight: bold;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.1);
      }

      100% {
        transform: scale(1);
      }
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-text {
      font-weight: bold;
      font-size: 1.1rem;
      letter-spacing: 0.5px;
    }

    /* الشريط الجانبي */
    .sidebar {
      background: linear-gradient(to bottom, #040b14, #0c1d2e);
      position: fixed;
      top: 70px;
      right: 0;
      bottom: 0;
      width: var(--sidebar-width);
      transition: var(--transition);
      z-index: 999;
      overflow-y: auto;
      box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
    }

    .profile-img {
      text-align: center;
      padding: 15px 0 10px;
      position: relative;
    }

    .profile-img::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(20, 157, 221, 0.5), transparent);
    }

    .profile-img img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 5px solid rgba(255, 255, 255, 0.1);
      object-fit: cover;
      box-shadow: 0 0 20px rgba(20, 157, 221, 0.3);
      transition: var(--transition);
    }

    .profile-img img:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(20, 157, 221, 0.5);
    }

    .sitename {
      text-align: center;
      color: white;
      font-size: 1.2rem;
      margin: 0px 0 15px;
    }

    .social-links {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      font-size: 16px;
      text-decoration: none;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    .social-links a:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(20, 157, 221, 0.4);
    }

    .social-links a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--accent-color);
      transform: scale(0);
      border-radius: 50%;
      transition: transform 0.3s ease;
      z-index: 0;
    }

    .social-links a:hover::before {
      transform: scale(1);
    }

    .social-links a i {
      position: relative;
      z-index: 1;
    }

    .navmenu {
      padding: 0 15px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .navmenu ul {
      list-style: none;
      padding: 0;
      flex: 1;
    }

    .navmenu li {
      margin-bottom: 4px;
      position: relative;
    }

    .navmenu li::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 4px;
      height: 100%;
      background: var(--accent-color);
      border-radius: 4px 0 0 4px;
      transform: scaleY(0);
      transform-origin: bottom;
      transition: transform 0.3s ease;
    }

    .navmenu li:hover::before {
      transform: scaleY(1);
      transform-origin: top;
    }

    .navmenu a {
      display: flex;
      align-items: center;
      color: rgba(255, 255, 255, 0.7);
      padding: 12px 15px;
      border-radius: 10px;
      transition: var(--transition);
      text-decoration: none;
      font-size: 0.95rem;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .navmenu a::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, rgba(20, 157, 221, 0.2), transparent);
      transform: translateX(-100%);
      transition: transform 0.4s ease;
      z-index: -1;
    }

    .navmenu a:hover::before,
    .navmenu a.active::before {
      transform: translateX(0);
    }

    .navmenu a:hover,
    .navmenu a.active {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      transform: translateX(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .navmenu i {
      margin-left: 10px;
      font-size: 18px;
      width: 22px;
      text-align: center;
      color: var(--accent-color);
    }

    .mobile-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 22px;
      cursor: pointer;
      padding: 5px 10px;
      border-radius: 8px;
      transition: var(--transition);
      background: rgba(255, 255, 255, 0.1);
    }

    .mobile-toggle:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: rotate(90deg);
    }

    /* الحاوية الرئيسية للمحتوى */
    .main-container {
      /* margin: 80px 20px 20px;
      margin-right: 260px;
      transition: margin 0.3s; */
    }

    .profile-header {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .profile-header h1 {
      color: var(--primary-color);
      font-size: 1.6rem;
    }

    /* تبويبات الملف الشخصي */
    /* .profile-tabs {
      display: flex;
      background: rgba(0, 97, 94, 0.05);
      border-radius: 10px;
      padding: 5px;
      margin-bottom: 25px;
      overflow-x: auto;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }

    .profile-tab {
      padding: 12px 20px;
      cursor: pointer;
      border-radius: 8px;
      transition: var(--transition);
      text-align: center;
      min-width: 120px;
      font-weight: 500;
      position: relative;
      text-decoration: none;
      color: var(--text-color);
    }

    .profile-tab::before {
      content: '';
      position: absolute;
      bottom: 0;
      right: 0;
      width: 0;
      height: 3px;
      background: var(--primary-color);
      transition: width 0.3s ease;
    }

    .profile-tab.active {
      background: white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      color: var(--primary-color);
      font-weight: bold;
    }

    .profile-tab.active::before {
      width: 100%;
    }

    تلوين خلفية التبويبات الرئيسية
    .profile-tab:hover:not(.active) {
      background: rgba(0, 97, 94, 0.1);
    } */

    /* التبديل */
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: var(--primary-color);
    }

    input:checked + .slider:before {
      transform: translateX(26px);
    }

    /* التكيف مع الشاشات الصغيرة */
    @media (max-width: 1200px) {
      .sidebar {
        right: -280px;
      }

      .sidebar.show {
        right: 0;
      }

      .main-container {
        margin-right: 20px;
        margin-left: 20px;
      }

      .mobile-toggle {
        display: block;
      }
    }

    @media (max-width: 768px) {
      .profile-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 10px;
      }

      .profile-tab {
        min-width: auto;
        padding: 10px 15px;
        font-size: 0.85rem;
      }

      .security-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }

      .security-status {
        align-self: flex-end;
      }
    }

    /* تحسينات إضافية */
    .edit-input {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: var(--transition);
    }

    .edit-input:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
    }

    /* القائمة المنسدلة */
    .dropdown-menu {
      display: none;
      position: relative;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      margin-top: 5px;
      padding: 5px 0;
      width: 100%;
      z-index: 100;
    }

    .dropdown-menu.show {
      display: block;
      animation: fadeIn 0.3s ease;
    }

    .dropdown-menu a {
      padding: 10px 15px;
      display: flex;
      align-items: center;
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s;
    }

    .dropdown-menu a:hover {
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }

    .dropdown-menu i {
      margin-left: 10px;
      font-size: 16px;
      width: 22px;
      text-align: center;
    }

    /* تلميحات الأدوات */
    [data-tooltip] {
      position: relative;
      cursor: pointer;
    }

    [data-tooltip]:hover::after {
      content: attr(data-tooltip);
      position: absolute;
      background: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 0.8rem;
      white-space: nowrap;
      bottom: 100%;
      right: 50%;
      transform: translateX(50%);
      z-index: 1000;
    }

    /* نمط الأجهزة الموثوقة */
    .device-list {
      margin-top: 15px;
      border-top: 1px solid #eee;
      padding-top: 15px;
      display: none;
    }

    .device-list.show {
      display: block;
      animation: fadeIn 0.4s ease;
    }

    .device-item {
      display: flex;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid #f5f5f5;
      gap: 15px;
    }

    .device-icon {
      font-size: 24px;
      color: var(--primary-color);
    }

    .device-info h4 {
      margin-bottom: 5px;
    }

    .device-info p {
      color: var(--light-text);
      font-size: 0.85rem;
    }
  </style>

      <style>
          .countent-sidebar {
            height: 90vh;
            width: 100%;
            position: relative;
            display: flex;
            justify-content: space-evenly;
        }

        .countent {
            height: 100%;
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

<body>

  <!-- الشريط العلوي -->
  <div class="top-bar">
    <button class="mobile-toggle" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>

    <div class="logo-container">
      <div class="logo-text">بوابة بلدي الإلكترونية</div>
      <img
        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiByPSI0MCIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNNzAgMzBDNjUgNDAgNTUgNDUgNTAgNjBDNDUgNDUgMzUgNDAgMzAgMzBDMjAgNDUgMzAgNzAgNTAgODBDNzAgNzAgODAgNDUgNzAgMzBaIiBmaWxsPSIjMDA2MDY0Ii8+PC9zdmc+"
        alt="Balady Logo" style="width:45px; height:45px;">
    </div>

    <div class="profile-section">
      <i class="fas fa-user" data-tooltip="الملف الشخصي"></i>
      <div class="notification-container">
        <i class="fas fa-bell" data-tooltip="الإشعارات"></i>
        <div class="notification">3</div>
      </div>
    </div>
  </div>

    <!-- الشريط الجانبي -->
      <div class="sidebar" id="sidebar">
        <div class="profile-img">
          <img src="https://ui-avatars.com/api/?name=محمد+أحمد&background=00615e&color=fff&size=120" alt="صورة المستخدم">
        </div>

        <h1 class="sitename">محمد أحمد</h1>
        <div class="social-links">
          {{-- <li><a href="#" class="ajax-link" data-page="main.fee_inquiries">استعلام عن رسوم <i class="fas fa-money-bill-wave"></i></a></li> --}}
          <a href="#" data-tooltip="تويتر"><i class="fab fa-twitter"></i></a>
          <a href="#" data-tooltip="فيسبوك"><i class="fab fa-facebook"></i></a>
          <a href="#" data-tooltip="إنستغرام"><i class="fab fa-instagram"></i></a>
          <a href="#" data-tooltip="لينكد إن"><i class="fab fa-linkedin"></i></a>
        </div>
        <nav class="navmenu">
          <ul>
            <li><a href="{{ route('platform.home') }}" ><i class="fas fa-home"></i>الرئيسية</a></li>
            <li><a href="#" class="ajax-link-profile" data-page="profile.Control_Panel"><i class="fas fa-home"></i> لوحة التحكم</a></li>
            <li><a href="#" class="ajax-link-profile" data-page="profile.Profile_user"><i class="fas fa-user"></i> الملف الشخصي</a></li>
            <li><a href="#" class="ajax-link-profile" data-page="profile.My_Orders"><i class="fas fa-file-alt"></i> الطلبات</a></li>
            <li><a href="#" class="ajax-link-profile" data-page="main.Breadcrumb_Receptionist">تقديم طلب جديد <i
                                class="fas fa-arrow-left ms-2"></i></a></li>
            {{-- <li><a href="#" class="ajax-link-profile" data-page="profile.my_licenses"><i class="fas fa-id-card"></i> الرخص</a></li>
            <li><a href="#" class="ajax-link-profile" data-page="profile.Calendar"><i class="fas fa-calendar"></i> التقويم</a></li> --}}
            <li><a href="#" class="ajax-link-profile" data-page="profile.Security_Privacy"><i class="fas fa-chart-bar"></i>الأمان الخصوصية</a></li>
            {{-- <li><a href="#" class="ajax-link-profile" data-page="profile.Support_Help"><i class="fas fa-cog"></i> الدعم والمساعدة</a></li> --}}
            <li><a href="#" class="ajax-link-profile" data-page="profile.setting"><i class="fas fa-cog"></i> الإعدادات</a></li>
            <li id="more-menu">
              {{-- <a href="#" onclick="toggleMoreMenu(event)">
                <i class="fas fa-ellipsis-h"></i> المزيد
              </a>
              <div class="dropdown-menu" id="more-dropdown">
                <a href="#" class="ajax-link-profile" data-page="profile.Violations_Fines"><i class="fas fa-exclamation-triangle"></i> المخالفات والغرامات</a>
                <a href="#" class="ajax-link-profile" data-page="profile.Payment_Billing"><i class="fas fa-many"></i>الدفع والفواتير</a>
                <a href="#" class="ajax-link-profile" data-page="profile.subscriptions"><i class="fas fa-credit-card"></i>الاشتراكات</a>
                <a href="#" class="ajax-link-profile" data-page=""><i class="fas fa-file-contract"></i> وثائقي</a>
              </div> --}}
              <li><a class="logout-btn-beneficiary"  href="#"><i class="fas fa-sign-out-alt"></i> تسجيل
                الخروج</a>
            <form id="logout-form-beneficiary" action="{{ route('beneficiary.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
            </li>
          </ul>
        </nav>
      </div>

  <!-- الحاوية الرئيسية للمحتوى -->
  <div class="main-container">
    {{-- <div class="countent-sidebar"> --}}
        <div id="loader">🔄 جاري التحميل...</div>
        <div class="countent" id="Jaxprofile">

            📌 سيتم تحميل المحتوى هنا






        </div>
    {{-- </div> --}}
  </div>
    @include('layouts.partials.scripts')

    @vite(['resources/js/platform_user/js/Ajax.js'])

@vite(['resources/js/layouts/jquery-3.6.0.min.js'])

{{-- رساله تسجيل الخروج --}}
              <script>
                 document.addEventListener('DOMContentLoaded', function() {
                     const logoutButtons = document.querySelectorAll('.logout-btn-beneficiary');

                     logoutButtons.forEach(button => {
                         button.addEventListener('click', function(e) {
                             e.preventDefault();

                             Swal.fire({
                                 title: 'تأكيد تسجيل الخروج',
                                 text: 'هل أنت متأكد من أنك تريد تسجيل الخروج؟',
                                 icon: 'question',
                                 showCancelButton: true,
                                 confirmButtonColor: '#d33',
                                 cancelButtonColor: '#3085d6',
                                 confirmButtonText: 'نعم، سجل الخروج',
                                 cancelButtonText: 'إلغاء',
                                 reverseButtons: true,
                                 width: '400px'
                             }).then((result) => {
                                 if (result.isConfirmed) {
                                     Swal.fire({
                                         title: 'تم بنجاح',
                                         text: 'تم تسجيل الخروج بنجاح',
                                         icon: 'success',
                                         timer: 700,
                                         showConfirmButton: false,
                                         timerProgressBar: true,
                                         width: '300px'
                                     }).then(() => {
                                         document.getElementById('logout-form-beneficiary').submit();
                                     });
                                 }
                             });
                         });
                     });
                 });
             </script>


  <script>
    // إدارة القائمة الجانبية على الأجهزة الصغيرة
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const toggleButton = document.querySelector('.mobile-toggle i');

      sidebar.classList.toggle('show');
      document.body.classList.toggle('sidebar-open');

      // تغيير الأيقونة بين القائمة والإغلاق
      if (sidebar.classList.contains('show')) {
        toggleButton.classList.remove('fa-bars');
        toggleButton.classList.add('fa-times');
      } else {
        toggleButton.classList.remove('fa-times');
        toggleButton.classList.add('fa-bars');
      }
    }

    // إدارة القائمة المنسدلة "المزيد"
    function toggleMoreMenu(e) {
      e.preventDefault();
      e.stopPropagation();
      const dropdown = document.getElementById('more-dropdown');
      dropdown.classList.toggle('show');
    }

    // إغلاق القوائم المنسدلة عند النقر خارجها
    document.addEventListener('click', function(event) {
      const dropdown = document.getElementById('more-dropdown');
      const moreMenu = document.getElementById('more-menu');

      // إغلاق القائمة المنسدلة إذا تم النقر خارجها
      if (!moreMenu.contains(event.target)) {
        dropdown.classList.remove('show');
      }

      // إغلاق الشريط الجانبي عند النقر خارجها في الوضع المحمول
      if (window.innerWidth < 1200) {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.querySelector('.mobile-toggle');

        if (sidebar.classList.contains('show') && !sidebar.contains(event.target) &&
            !toggleButton.contains(event.target)) {
          toggleSidebar();
        }
      }
    });

    // إغلاق القائمة المنسدلة عند النقر على عنصر داخلها
    document.querySelectorAll('.dropdown-menu a').forEach(item => {
      item.addEventListener('click', () => {
        document.getElementById('more-dropdown').classList.remove('show');
      });
    });

    // إظهار/إخفاء قائمة الأجهزة
    document.getElementById('showDevicesBtn').addEventListener('click', function() {
      const deviceList = document.getElementById('deviceList');
      deviceList.classList.toggle('show');

      // تغيير نص الزر
      if (deviceList.classList.contains('show')) {
        this.innerHTML = '<i class="fas fa-times"></i> إخفاء الأجهزة';
      } else {
        this.innerHTML = '<i class="fas fa-list"></i> عرض الأجهزة';
      }
    });

    // التحكم في تبديل المصادقة الثنائية
    const twoFactorToggle = document.getElementById('twoFactorToggle');
    twoFactorToggle.addEventListener('change', function() {
      if (this.checked) {
        showTwoFactorSetup();
      } else {
        disableTwoFactor();
      }
    });

    // دالة تفعيل المصادقة الثنائية
    function showTwoFactorSetup() {
      alert('لقد تم تفعيل المصادقة الثنائية! ستحتاج إلى إعداد تطبيق المصادقة في الخطوة التالية.');
      // في التطبيق الحقيقي، سيتم توجيه المستخدم لإعداد المصادقة الثنائية
    }

    // دالة تعطيل المصادقة الثنائية
    function disableTwoFactor() {
      const confirmed = confirm('هل أنت متأكد من رغبتك في تعطيل المصادقة الثنائية؟ هذا قد يقلل من أمان حسابك.');
      if (!confirmed) {
        twoFactorToggle.checked = true;
      }
    }

    // تسجيل الخروج من جميع الأجهزة
    document.querySelector('.logout-all-btn').addEventListener('click', function() {
      const confirmed = confirm('هل أنت متأكد من رغبتك في تسجيل الخروج من جميع الأجهزة؟ سيتم تسجيل خروجك من جميع الجلسات النشطة.');
      if (confirmed) {
        alert('تم تسجيل الخروج من جميع الأجهزة بنجاح!');
      }
    });

    // تسجيل الخروج من جهاز معين
    document.querySelectorAll('.action-btn[style*="e74c3c"]').forEach(btn => {
      btn.addEventListener('click', function() {
        const deviceName = this.closest('.security-item').querySelector('h3').textContent;
        const confirmed = confirm(`هل أنت متأكد من رغبتك في تسجيل الخروج من الجهاز: ${deviceName}؟`);
        if (confirmed) {
          alert(`تم تسجيل الخروج من ${deviceName} بنجاح!`);
          this.closest('.security-item').remove();
        }
      });
    });
  </script>
</body>
</html>
































































  {{-- <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    :root {
      --primary-color: #00615e;
      --secondary-color: #4CAF50;
      --accent-color: #149ddd;
      --background-color: #f5f5f5;
      --card-color: #ffffff;
      --text-color: #333;
      --light-text: #777;
      --danger: #e74c3c;
      --warning: #f39c12;
      --success: #27ae60;
      --sidebar-width: 250px;
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
      background-color: var(--background-color);
      color: var(--text-color);
      direction: rtl;
      text-align: right;
      margin: 0;
      font-size: 0.95rem;
      line-height: 1.5;
    }

    /* الشريط العلوي */
    .top-bar {
      background: linear-gradient(to right, var(--primary-color), #004d4b);
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      height: 70px;
    }

    .top-bar .profile-section {
      display: flex;
      align-items: center;
      gap: 15px;
      position: relative;
    }

    .top-bar .profile-section i {
      font-size: 22px;
      cursor: pointer;
      transition: var(--transition);
    }

    .top-bar .profile-section i:hover {
      transform: scale(1.1);
    }

    .top-bar .notification {
      background-color: var(--danger);
      color: white;
      border-radius: 50%;
      width: 22px;
      height: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      position: absolute;
      top: -8px;
      right: -8px;
      font-weight: bold;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.1);
      }

      100% {
        transform: scale(1);
      }
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-text {
      font-weight: bold;
      font-size: 1.1rem;
      letter-spacing: 0.5px;
    }

    /* الشريط الجانبي */
    .sidebar {
      background: linear-gradient(to bottom, #040b14, #0c1d2e);
      position: fixed;
      top: 70px;
      right: 0;
      bottom: 0;
      width: var(--sidebar-width);
      transition: var(--transition);
      z-index: 999;
      overflow-y: auto;
      box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
    }

    .profile-img {
      text-align: center;
      padding: 15px 0 10px;
      position: relative;
    }

    .profile-img::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(20, 157, 221, 0.5), transparent);
    }

    .profile-img img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 5px solid rgba(255, 255, 255, 0.1);
      object-fit: cover;
      box-shadow: 0 0 20px rgba(20, 157, 221, 0.3);
      transition: var(--transition);
    }

    .profile-img img:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(20, 157, 221, 0.5);
    }

    .sitename {
      text-align: center;
      color: white;
      font-size: 1.2rem;
      margin: 0px 0 15px;
    }

    .social-links {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      font-size: 16px;
      text-decoration: none;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    .social-links a:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(20, 157, 221, 0.4);
    }

    .social-links a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--accent-color);
      transform: scale(0);
      border-radius: 50%;
      transition: transform 0.3s ease;
      z-index: 0;
    }

    .social-links a:hover::before {
      transform: scale(1);
    }

    .social-links a i {
      position: relative;
      z-index: 1;
    }

    .navmenu {
      padding: 0 15px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .navmenu ul {
      list-style: none;
      padding: 0;
      flex: 1;
    }

    .navmenu li {
      margin-bottom: 4px;
      position: relative;
    }

    .navmenu li::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 4px;
      height: 100%;
      background: var(--accent-color);
      border-radius: 4px 0 0 4px;
      transform: scaleY(0);
      transform-origin: bottom;
      transition: transform 0.3s ease;
    }

    .navmenu li:hover::before {
      transform: scaleY(1);
      transform-origin: top;
    }

    .navmenu a {
      display: flex;
      align-items: center;
      color: rgba(255, 255, 255, 0.7);
      padding: 12px 15px;
      border-radius: 10px;
      transition: var(--transition);
      text-decoration: none;
      font-size: 0.95rem;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .navmenu a::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, rgba(20, 157, 221, 0.2), transparent);
      transform: translateX(-100%);
      transition: transform 0.4s ease;
      z-index: -1;
    }

    .navmenu a:hover::before,
    .navmenu a.active::before {
      transform: translateX(0);
    }

    .navmenu a:hover,
    .navmenu a.active {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      transform: translateX(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .navmenu i {
      margin-left: 10px;
      font-size: 18px;
      width: 22px;
      text-align: center;
      color: var(--accent-color);
    }

    .mobile-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 22px;
      cursor: pointer;
      padding: 5px 10px;
      border-radius: 8px;
      transition: var(--transition);
      background: rgba(255, 255, 255, 0.1);
    }

    .mobile-toggle:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: rotate(90deg);
    }

    /* الحاوية الرئيسية للمحتوى */
    .main-container {
      margin: 80px 20px 20px;
      margin-right: 260px;
      transition: margin 0.3s;
    }

    .profile-header {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .profile-header h1 {
      color: var(--primary-color);
      font-size: 1.6rem;
    }

    /* التبديل */
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: fixed;
      cursor: pointer;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked + .slider {
      background-color: var(--primary-color);
    }

    input:checked + .slider:before {
      transform: translateX(26px);
    }

    /* التكيف مع الشاشات الصغيرة */
    @media (max-width: 1200px) {
      .sidebar {
        right: -280px;
      }

      .sidebar.show {
        right: 0;
      }

      .main-container {
        margin-right: 20px;
        margin-left: 20px;
      }

      .mobile-toggle {
        display: block;
      }
    }

    @media (max-width: 768px) {
      .profile-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 10px;
      }

      .profile-tab {
        min-width: auto;
        padding: 10px 15px;
        font-size: 0.85rem;
      }

      .security-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }

      .security-status {
        align-self: flex-end;
      }
    }

    /* تحسينات إضافية */
    .edit-input {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: var(--transition);
    }

    .edit-input:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
    }

    /* القائمة المنسدلة */
    .dropdown-menu {
      display: none;
      position: relative;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      margin-top: 5px;
      padding: 5px 0;
      width: 100%;
      z-index: 1000; /* التأكد من ظهورها فوق المحتوى */
      max-height: 300px; /* تحديد ارتفاع أقصى */
      overflow-y: auto; /* إضافة تمرير عند الحاجة */
    }

    .dropdown-menu.show {
      display: block;
      animation: fadeIn 0.3s ease;
    }

    .dropdown-menu a {
      padding: 10px 15px;
      display: flex;
      align-items: center;
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s;
    }

    .dropdown-menu a:hover {
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }

    .dropdown-menu i {
      margin-left: 10px;
      font-size: 16px;
      width: 22px;
      text-align: center;
    }

    /* تلميحات الأدوات */
    [data-tooltip] {
      position: relative;
      cursor: pointer;
    }

    [data-tooltip]:hover::after {
      content: attr(data-tooltip);
      position: absolute;
      background: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 5px 10px;
      border-radius: 4px;
      font-size: 0.8rem;
      white-space: nowrap;
      bottom: 100%;
      right: 50%;
      transform: translateX(50%);
      z-index: 1000;
    }

    /* نمط الأجهزة الموثوقة */
    .device-list {
      margin-top: 15px;
      border-top: 1px solid #eee;
      padding-top: 15px;
      display: none;
    }

    .device-list.show {
      display: block;
      animation: fadeIn 0.4s ease;
    }

    .device-item {
      display: flex;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid #f5f5f5;
      gap: 15px;
    }

    .device-icon {
      font-size: 24px;
      color: var(--primary-color);
    }

    .device-info h4 {
      margin-bottom: 5px;
    }

    .device-info p {
      color: var(--light-text);
      font-size: 0.85rem;
    }
        /* تنسيق أفضل للقائمة "المزيد" */
    #more-menu {
      position: relative;
    }
  </style>
  <style>

    .countent-sidebar {
      height: 108%;
      width: 100%;
      position: relative;
      display: flex;
      top: 59px;
      justify-content: space-evenly;
      height: calc(100vh - 70px); /* إصلاح مشكلة الارتفاع */
      top: 70px; /* يتوافق مع ارتفاع الشريط العلوي */
      margin: 80px 20px 20px;
      margin-right: 260px;
      transition: margin 0.3s;
    }
    .countent {
        height: 100%; /* إصلاح مشكلة الارتفاع */
        max-height: 100%; /* إصلاح مشكلة الارتفاع */
        margin-top: 0; /* إزالة الهامش السالب */

        width: 100%;
        background-color: #ffffff;
        border-radius: 12px;
        padding: 0px;
        margin-top: 0;
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
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1.5rem;
        z-index: 1000;
    }
    #Jaxprofile {
      margin-top: 0; /* إزالة الهامش السالب */
      border: 1px solid #ccc;
      padding: 0px;
      height: 100%;

    }
        /* التكيف مع الشاشات الصغيرة */
    @media (max-width: 1200px) {
      .countent-sidebar {
        margin-right: 20px;
        margin-left: 20px;
      }
    }
  </style>
</head> --}}

