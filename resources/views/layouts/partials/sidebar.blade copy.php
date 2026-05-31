
<!-- Mobile Sidebar Menu Button -->
<button class="sidebar-menu-button">
    <span class="material-symbols-rounded">menu</span>
</button>

<aside class="sidebar" dir="rtl">
    <nav class="sidebar-nav" >
        <!-- القائمة الرئيسية -->
        <div class="nav-container">
            <ul class="nav-list primary-nav">

                <!-- لوحة التحكم -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="dashboard">
                        <i class="material-symbols-rounded">dashboard</i>
                        <span class="nav-label">لوحة التحكم</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">لوحة التحكم</a></li>
                    </ul>
                </li>


                <!-- خدمات -->
                <li class="nav-item dropdown dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="material-symbols-rounded">home_repair_service</i>
                        <span class="nav-label">الخدمات</span>
                        <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                    </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">الخدمات</a></li>
                        <li class="nav-item"><a href="#" class="ajax-link"
                                data-page="requests.track.requests-mangement" class="nav-link dropdown-link"> ادارة
                                الطلبات</a></li>

                        <li class="nav-item"><a href="#" class="ajax-link"
                                data-page="requests.create.partials.Breadcrumb_Receptionist" class="nav-link dropdown-link"> تقديم
                                طلب جديد </a></li>

                        <li class="nav-item"><a href="#" class="ajax-link" data-page="tasks"
                                class="nav-link dropdown-link">ادارة المهام ومتابعة المشاريع </a>
                        </li>

                    </ul>
                </li>

                  {{-- <!-- تهيئة النظام -->
                <li class="nav-item dropdown dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="material-symbols-rounded">home_repair_service</i>
                        <span class="nav-label">تهيئة النظام </span>
                        <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                    </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">تهيئة النظام </a></li>

                        <li class="nav-item"><a href="#" class="ajax-link"
                                data-page="fee_structures" class="nav-link dropdown-link">
                                تهيئة الرسوم </a></li>

                    </ul>
                </li> --}}


                 <!-- تهيئة النظام -->
                <li class="nav-item dropdown dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="material-symbols-rounded">home_repair_service</i>
                        <span class="nav-label">تهيئة النظام </span>
                        <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                    </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">تهيئة النظام </a></li>

                        <li class="nav-item"><a href="#" class="ajax-link"
                                data-page="fee_structures" class="nav-link dropdown-link">
                                إضافة الرسوم
                            </a>
                        </li>

                           <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.users1" class="nav-link dropdown-link">
                                    إضافة المستخدمين
                                </a>
                            </li>

                           <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.Department" class="nav-link dropdown-link">
                                    إضافة الأقسام
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.Directorates" class="nav-link dropdown-link">
                                    إضافة المديريات
                                </a>
                            </li>

                           <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.Licenses" class="nav-link dropdown-link">
                                     إضافة التراخيص
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.News" class="nav-link dropdown-link">
                                    إضافة الأخبار
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.FAQ" class="nav-link dropdown-link">
                                    إضافة الأسئلة الشائعة
                                </a>
                            </li>

                    </ul>
                </li>

                <!-- الإشعارات -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="notifications.notifications">
                        <i class="material-symbols-rounded">notifications</i>
                        <span class="nav-label">الإشعارات</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الإشعارات</a></li>
                    </ul>
                </li>

                <!-- التقارير -->
                <li class="nav-item dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="material-symbols-rounded">analytics</i>
                        <span class="nav-label">التقارير</span>
                        <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                    </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">التقارير</a></li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="reports.summaryReport">
                                التقرير الإحصائي
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="reports.detailedReport">
                                التقرير التفصيلي
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="reports.chartsReport">
                                الرسوم البيانية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="reports.customReport">
                                تقرير مخصص
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="reports.exportModal">
                                تصدير التقارير
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="reports.chartsReport">
                                طباعة
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- الصلاحيات -->
                <li class="nav-item dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="material-symbols-rounded">admin_panel_settings</i>
                        <span class="nav-label">الصلاحيات</span>
                        <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                    </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">الصلاحيات</a></li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="Permissions.Permissions_Management">
                                ادوار الصلاحيات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="Permissions.Permissions-system-enhanced">
                                ادارة الصلاحيات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-link">تطبيقات الجوال</a>
                        </li>
                    </ul>
                </li>

                <!-- الرسائل -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="auth.massage">
                        <i class="material-symbols-rounded">mail</i>
                        <span class="nav-label">الرسائل</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الرسائل</a></li>
                    </ul>
                </li>

                <!-- الموارد -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="material-symbols-rounded">inventory_2</i>
                        <span class="nav-label">الموارد</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الموارد</a></li>
                    </ul>
                </li>

                <!-- التقويم والمواعيد -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="calendar">
                        <i class="material-symbols-rounded">calendar_month</i>
                        <span class="nav-label">التقويم والمواعيد</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">التقويم والمواعيد</a></li>
                    </ul>
                </li>

                {{-- <!-- المفضلة -->
                <li class="nav-item dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="material-symbols-rounded">star</i>
                        <span class="nav-label">المفضلة</span>
                        <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                    </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">المفضلة</a></li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-link">الدروس المحفوظة</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-link">المدونات المفضلة</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-link">أدلة الموارد</a>
                        </li>
                    </ul>
                </li> --}}


                <!-- الإعدادات -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="settings.settings">
                        <i class="material-symbols-rounded">settings</i>
                        <span class="nav-label">الإعدادات</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الإعدادات</a></li>
                    </ul>
                </li>

                <!-- لوحة إدارة الأمان والمراقبة -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="settings.management_security">
                        <i class="material-symbols-rounded">shield_lock</i>
                        <span class="nav-label">إدارة الأمان</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">لوحة إدارة الأمان والمراقبة</a></li>
                    </ul>
                </li>

                <!-- رفع محتوى مخصص -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="settings.document-upload">
                        <i class="material-symbols-rounded">upload_file</i>
                        <span class="nav-label">رفع محتوى </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">رفع محتوى مخصص</a></li>
                    </ul>
                </li>

                <!-- مراقبه الانشطه-->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="settings.Activity-Tracker">
                        <i class="material-symbols-rounded">track_changes</i>
                        <span class="nav-label">مراقبه الانشطة</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">مراقبه الانشطه</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- القائمة السفلية -->
        <ul class="nav-list secondary-nav" style="border-top: 1px solid rgba(240, 248, 255, 0.288);">
            <li class="nav-item divider">
                <a href="#" class="ajax-link nav-link" data-page="settings.Support">
                    <i class="material-symbols-rounded">support_agent</i>
                    <span class="nav-label">الدعم</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link dropdown-title">الدعم</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link dropdown-item d-flex align-items-center logout-btn">
                    <i class="material-symbols-rounded">logout</i>
                    <span class="nav-label">تسجيل الخروج</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link dropdown-title logout-btn">تسجيل الخروج</a></li>
                </ul>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
            </li>
        </ul>
    </nav>

</aside>


    <!-- ملفات JavaScript -->
    {{-- <script src="{{ asset('js/Ajax.js') }}"></script> --}}
    @vite(['resources/js/layouts/Ajax.js'])


