<style>

        /* شريط البحث */
        .search-container {
          background: white;
          border-radius: 15px;
          padding: 20px;
          margin-bottom: 30px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
          display: flex;
          flex-wrap: wrap;
          gap: 15px;
          align-items: center;
          border: 1px solid rgba(26, 58, 108, 0.05);
        }

        .search-title {
          font-size: 1.3rem;
          color: var(--primary);
          font-weight: 600;
          display: flex;
          align-items: center;
          gap: 10px;
        }

        .search-title i {
          color: var(--accent);
        }

        .search-group {
          display: flex;
          width: 400px;
          position: relative;
          margin-right: 35px;
          height: 40px;
        }

        .search-input {
          flex: 1;
          padding: 12px 20px 12px 45px;
          border: 1px solid #ddd;
          border-radius: 50px;
          font-size: 1rem;
          transition: var(--transition);
           width: 100px;


                     outline: none;
          border-color: var(--accent);
          box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .search-input:focus {
          outline: none;
          border-color: var(--accent);
          box-shadow: 0 0 0 3px rgba(11, 4, 49, 0.2);
        }

        .search-icon {
          position: absolute;
          left: 15px;
          top: 50%;
          transform: translateY(-50%);
          color: var(--accent);
        }

        .filter-btn {
          background: rgba(212, 175, 55, 0.1);
          color: var(--accent);
          border: none;
          padding: 12px 20px;
          border-radius: 50px;
          cursor: pointer;
          display: flex;
          align-items: center;
          gap: 8px;
          transition: var(--transition);
        }

        .filter-btn:hover {
          background: var(--accent);
          color: white;
        }
</style>

<!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center" dir="rtl">

     <div class="d-flex align-items-center justify-content-between">
         <a href="{{ Vite::asset('resources/assets/images/logo.png') }}" class="logo d-flex align-items-center">
             <img src="{{ Vite::asset('resources/assets/images/logo.png') }}" alt="الشعار">
             <span class="d-none d-lg-block"><img src="{{ Vite::asset('resources/assets/images/nameLogo.png') }}" alt="الشعار"></span>
         </a>

         <button class="sidebar-toggler ">
             <i class="bi bi-list toggle-sidebar-btn"></i>
         </button>

         <!-- Mobile Sidebar Menu Button -->
         <button class="sidebar-menu-button">
             <span class="material-symbols-rounded">menu</span>
         </button>


     </div><!-- نهاية الشعار -->
{{--
     <!-- شريط البحث -->
     <div class="search-bar">
         <form class="search-form d-flex align-items-center" method="POST" action="#">
             <input type="text" name="query" placeholder="ابحث هنا..." title="أدخل كلمة البحث">
             <button type="submit" title="بحث"><i class="bi bi-search"></i></button>
         </form>
     </div><!-- نهاية شريط البحث --> --}}

         <!-- شريط البحث -->

               <div class="search-group col-lg-6 col-md-8 d-none d-lg-flex">
        <i class="fas fa-search search-icon"></i>
        <input type="text" class="search-input" placeholder="ابحث عن الطلبات برقم الطلب أو النوع">
      </div>


     <!-- عناصر التنقل -->
     <nav class="header-nav me-auto">
         <ul class="d-flex align-items-center">

             <!-- أيقونة البحث للأجهزة الصغيرة -->
             <li class="nav-item d-block d-lg-none">
                 <a class="nav-link nav-icon search-bar-toggle" href="#">
                     <i class="bi bi-search"></i>
                 </a>
             </li>

             <!-- التنبيهات -->
             <li class="nav-item dropdown">
                 <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                     <i class="bi bi-bell"></i>
                     <span class="badge bg-primary badge-number">4</span>
                 </a>

                 <ul
                     class="dropdown-menu dropdown-menu-amr dropdown_Amr dropdown-menu-start dropdown-menu-arrow notifications">
                     <li class="dropdown-header">
                         لديك 4 إشعارات جديدة
                         <a href="#"><span class="badge rounded-pill bg-primary p-2 me-2">عرض الكل</span></a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="notification-item">
                         <i class="bi bi-exclamation-circle text-warning"></i>
                         <div>
                             <h4>إشعار هام</h4>
                             <p>تفاصيل الإشعار الأول...</p>
                             <p>منذ 30 دقيقة</p>
                         </div>
                     </li>

                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="notification-item">
                         <i class="bi bi-x-circle text-danger"></i>
                         <div>
                             <h4>حدث خطأ</h4>
                             <p>تفاصيل الإشعار الثاني...</p>
                             <p>منذ ساعة</p>
                         </div>
                     </li>

                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="notification-item">
                         <i class="bi bi-check-circle text-success"></i>
                         <div>
                             <h4>تم بنجاح</h4>
                             <p>تفاصيل الإشعار الثالث...</p>
                             <p>منذ ساعتين</p>
                         </div>
                     </li>

                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="notification-item">
                         <i class="bi bi-info-circle text-primary"></i>
                         <div>
                             <h4>معلومة جديدة</h4>
                             <p>تفاصيل الإشعار الرابع...</p>
                             <p>منذ 4 ساعات</p>
                         </div>
                     </li>

                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li class="dropdown-footer">
                         <a href="#">عرض كل الإشعارات</a>
                     </li>
                 </ul>
             </li><!-- نهاية التنبيهات -->

             <!-- الرسائل -->
             <li class="nav-item dropdown ">
                 <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                     <i class="bi bi-chat-left-text"></i>
                     <span class="badge bg-success badge-number">3</span>
                 </a>

                 <ul
                     class="dropdown-menu dropdown-menu-amr dropdown_Amr dropdown-menu-start dropdown-menu-arrow messages">
                     <li class="dropdown-header">
                         لديك 3 رسائل جديدة
                         <a href="#"><span class="badge rounded-pill bg-primary p-2 me-2">عرض الكل</span></a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="message-item">
                         <a href="#" class="a">
                             <img src="{{ Vite::asset('resources/assets/images/amr.jpg') }}" alt=""
                                 class="rounded-circle">
                             <div>
                                 <h4>عمر هادسون</h4>
                                 <p>منذ 4 ساعات</p>
                             </div>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="message-item">
                         <a href="#" class="a">
                             <img src="{{ Vite::asset('resources/assets/images/amr.jpg') }}" alt=""
                                 class="rounded-circle">
                             <div>
                                 <h4>آنا نيلسون</h4>

                                 <p>منذ 6 ساعات</p>
                             </div>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="message-item">
                         <a href="#" class="a">
                             <img src="{{ Vite::asset('resources/assets/images/amr.jpg') }}" alt=""
                                 class="rounded-circle">
                             <div>
                                 <h4>ديفيد مولدون</h4>

                                 <p>منذ 8 ساعات</p>
                             </div>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li class="dropdown-footer">
                         <a href="#" class="a">عرض جميع الرسائل</a>
                     </li>
                 </ul>
             </li><!-- نهاية الرسائل -->




             <!-- الحساب الشخصي -->
             <li class="nav-item dropdown ps-3 ">
                 <a class="nav-link nav-profile d-flex align-items-center ps-0" href="#"
                     data-bs-toggle="dropdown">
                        <!-- صورة المستخدم أو الحرف الأول من الاسم -->
                         <div class="rounded-circle" style="background-color: #151A2D; color: white; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; text-transform: uppercase; overflow: hidden;">
                              <span id="avatarInitial" data-name="{{ e(optional(Auth::user())->name ?? '') }}"></span>

                            <script>
                            document.addEventListener('DOMContentLoaded', function(){
                            const el = document.getElementById('avatarInitial');
                            const name = (el.dataset.name || '').trim();
                            // Array.from يتعامل مع الأحرف متعددة البايت (emoji و حروف خاصة)
                            const initial = Array.from(name)[0] ? Array.from(name)[0].toUpperCase() : '';
                            el.textContent = initial;
                            });
                            </script>

                         </div>
                     <span class="d-none d-md-block dropdown-toggle pe-2"> {{ Auth::user()->name ?? 'زائر' }} ُ</span>
                     <span class="dropdown-icon fa fa-angle-down" style="font-size:1rem;"></span>
                 </a>

                 <ul
                     class="dropdown-menu dropdown-menu-amr dropdown_Amr dropdown-menu-start dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         <h6> {{ Auth::user()->name ?? 'زائر' }}</h6>
                         <span>مصمم مواقع</span>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                             <i class="bi bi-person"></i>
                             <span>ملفي الشخصي </span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                             <i class="bi bi-gear"></i>
                             <span>إعدادات الحساب</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                             <i class="bi bi-question-circle"></i>
                             <span>المساعدة</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center logout-btn" href="#">
                             <i class="bi bi-box-arrow-right me-2"></i>
                             <span>تسجيل الخروج</span>
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </li>
                 </ul>
             </li><!-- نهاية الحساب الشخصي -->

         </ul>
     </nav><!-- نهاية التنقل -->
 </header><!-- نهاية الهيدر -->






{{-- رساله تسجيل الخروج --}}
              <script>
                 document.addEventListener('DOMContentLoaded', function() {
                     const logoutButtons = document.querySelectorAll('.logout-btn');

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
                                         document.getElementById('logout-form').submit();
                                     });
                                 }
                             });
                         });
                     });
                 });
             </script>
