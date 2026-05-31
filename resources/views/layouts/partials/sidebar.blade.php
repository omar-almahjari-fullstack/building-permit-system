
<!-- Mobile Sidebar Menu Button -->
<button class="sidebar-menu-button">
    <span class="material-symbols-rounded">menu</span>
</button>

<aside class="sidebar" dir="rtl">
    <nav class="sidebar-nav" >
        <!-- القائمة الرئيسية -->
        <!-- تم تغيير جميع الأيقونات إلى أيقونات Remix Icon -->
        <div class="nav-container">

            <ul class="nav-list primary-nav">

                <!-- لوحة التحكم -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="dashboard">
                        <i class="fa fa-tachometer-alt" style="font-size:1.2rem;"></i>
                        <span class="nav-label">لوحة التحكم</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">لوحة التحكم</a></li>
                    </ul>
                </li>


                <!-- خدمات -->
                <li class="nav-item dropdown dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                                            <i class="fa fa-tasks" style="font-size:1.2rem;"></i>
                                            <span class="nav-label">ادارة الطلبات</span>
                                            <span class="dropdown-icon fa fa-angle-down" style="font-size:1rem;"></span>
                                        </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">الخدمات</a></li>
                        <li id="manage_request" style="display: none;" class="nav-item" ><a href="#" class="ajax-link"
                                data-page="requests.track.requests-mangement" class="nav-link dropdown-link"> ادارة
                                الطلبات</a></li>

                        <li class="nav-item" id="btn-create-license" style="display:none;"><a href="#" class="ajax-link"
                                data-page="requests.create.partials.Breadcrumb_Receptionist" class="nav-link dropdown-link"> تقديم
                                طلب جديد </a></li>

                        {{-- <li class="nav-item"><a href="#" class="ajax-link" data-page="tasks"
                                class="nav-link dropdown-link">ادارة المهام ومتابعة المشاريع </a>
                        </li> --}}

                    </ul>
                </li>

                  {{-- <!-- تهيئة النظام -->
                <li class="nav-item dropdown dropdown-container">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="fa fa-cogs fa-2x fw-bold" style="vertical-align: middle;"></i>
                        <span class="nav-label">تهيئة النظام </span>
                        <span class="dropdown-icon fa fa-angle-down fa-lg fw-bold" style="vertical-align: middle;"></span>
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
                <li class="nav-item dropdown dropdown-container" id="configure_system" style="display:none;">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="fa fa-tools" style="font-size:1.2rem;font-weight:bold;vertical-align:middle;"></i>
                        <span class="nav-label">تهيئة النظام </span>
                        <span class="dropdown-icon fa fa-angle-down" style="font-size:1rem;font-weight:bold;vertical-align:middle;"></span>
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
                                <a href="#" class="ajax-link" data-page="Departments.Department" class="nav-link dropdown-link">
                                    إضافة الأقسام
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.Directorates" class="nav-link dropdown-link">
                                    إضافة المديريات
                                </a>
                            </li>

                           {{-- <li class="nav-item">
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
                            </li> --}}

                    </ul>
                </li>

                <!-- الإشعارات -->
                <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="notifications.notifications">
                        <i class="fa fa-bell" style="font-size:1.2rem;"></i>
                        <span class="nav-label">الإشعارات</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الإشعارات</a></li>
                    </ul>
                </li>

                <!-- التقارير -->
                <li class="nav-item dropdown-container" id="menu-reports" style="display:none;">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="fa fa-chart-bar" style="font-size:1.2rem;"></i>
                        <span class="nav-label">التقارير</span>
                        <span class="dropdown-icon fa fa-angle-down" style="font-size:1.2rem;"></span>
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
                        {{-- <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="reports.detailedReport">
                                التقرير التفصيلي
                            </a>
                        </li> --}}
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
                        {{-- <li class="nav-item">
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
                        </li> --}}
                    </ul>
                </li>

                <!-- الصلاحيات والمستخدمين-->
                <li class="nav-item dropdown-container" id="menu-manage-users" style="display:none;">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="fa fa-user-shield" style="font-size:1.2rem;"></i>
                        <span class="nav-label">ادارة المستخدمين</span>
                        <span class="dropdown-icon fa fa-angle-down" style="font-size:1.2rem;"></span>
                    </a>
                    <ul class="dropdown-menu" style="color: aliceblue;">
                        <li class="nav-item" style="border-bottom: 1px solid rgba(240, 248, 255, 0.288);"><a
                                class="nav-link dropdown-title">الصلاحيات</a></li>
                            <li class="nav-item">
                                <a href="#" class="ajax-link" data-page="Departments.users1" class="nav-link dropdown-link">
                                    إضافة المستخدمين
                            </a>
                            </li>
                        <li class="nav-item" id="manage_permissions" style="display:none;">

                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="Permissions.Permissions_Management">
                                ادارة الصلاحيات والادوار
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="ajax-link nav-link dropdown-link"
                                data-page="Permissions.Permissions-system-enhanced">
                                ادارة الصلاحيات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-link">تطبيقات الجوال</a>
                        </li> --}}
                    </ul>
                </li>

                <!-- الرسائل -->
                {{-- <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="auth.massage">
                        <i class="fa fa-envelope" style="font-size:1.2rem;"></i>
                        <span class="nav-label">الرسائل</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الرسائل</a></li>
                    </ul>
                </li> --}}

                <!-- الموارد -->
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-archive" style="font-size:1.2rem;"></i>
                        <span class="nav-label">الموارد</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الموارد</a></li>
                    </ul>
                </li> --}}

                <!-- التقويم والمواعيد -->
                {{-- <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="calendar">
                        <i class="fa fa-calendar-alt" style="font-size:1.2rem;"></i>
                        <span class="nav-label">التقويم والمواعيد</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">التقويم والمواعيد</a></li>
                    </ul>
                </li> --}}

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
                        <i class="fa fa-cogs" style="font-size:1.2rem;"></i>
                        <span class="nav-label">الإعدادات</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">الإعدادات</a></li>
                    </ul>
                </li>

                <!-- لوحة إدارة الأمان والمراقبة -->
                {{-- <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="settings.management_security">
                        <i class="fa fa-shield-alt" style="font-size:1.2rem;"></i>
                        <span class="nav-label">إدارة الأمان</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">لوحة إدارة الأمان والمراقبة</a></li>
                    </ul>
                </li> --}}

                <!-- رفع محتوى مخصص -->
                {{-- <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="settings.document-upload">
                        <i class="fa fa-upload" style="font-size:1.2rem;"></i>
                        <span class="nav-label">رفع محتوى </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">رفع محتوى مخصص</a></li>
                    </ul>
                </li> --}}

                <!-- مراقبه الانشطه-->
                {{-- <li class="nav-item">
                    <a href="#" class="ajax-link nav-link" data-page="settings.Activity-Tracker">
                        <i class="fa fa-chart-line" style="font-size:1.2rem;"></i>
                        <span class="nav-label">مراقبه الانشطة</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link dropdown-title">مراقبه الانشطه</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>

        <!-- القائمة السفلية -->
        <ul class="nav-list secondary-nav" style="border-top: 1px solid rgba(240, 248, 255, 0.288);">
            <li class="nav-item divider">
                <a href="#" class="ajax-link nav-link" data-page="settings.Support">
                    <i class="fa fa-headset" style="font-size:1.2rem;"></i>
                    <span class="nav-label">الدعم</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link dropdown-title">الدعم</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link dropdown-item d-flex align-items-center logout-btn">
                    <i class="fa fa-sign-out-alt" style="font-size:1.2rem;"></i>
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



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        url: "{{ route('user.permissions') }}",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if(response.permissions && response.permissions.length > 0){
                response.permissions.forEach(function(permission){
                    if(permission.permission_key === "create_license_request"){
                        $("#btn-create-license").show();
                    }
                    if(permission.permission_key === "edit_license_request"){
                        $("#btn-edit-license").show();
                    }
                    if(permission.permission_key === "delete_license_request"){
                        $("#btn-delete-license").show();
                    }
                    if(permission.permission_key === "manage_users"){
                        $("#menu-manage-users").show();
                    }
                    if(permission.permission_key === "manage_permissions"){
                        $("#manage_permissions").show();
                    }
                    if(permission.permission_key === "generate_reports"){
                        $("#menu-reports").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "configure_system"){
                        $("#configure_system").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "manage_request"){
                        $("#manage_request").show();
                    }





                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "add_engineer_report"){
                        $("#add_engineer_report").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "send_notification"){
                        $("#send_notification").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "assign_engineer"){
                        $("#assign_engineer").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "request_modification"){
                        $("#request_modification").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "approve_request"){
                        $("#approve_request").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "print_license"){
                        $("#print_license").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "print_receipt"){
                        $("#print_receipt").show();
                    }

                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "Technical_Request_Approval"){
                        $("#Technical_Request_Approval").show();
                    }
                    /////////////////////////////////////////////////////////////////
                    if(permission.permission_key === "Payment_request"){
                        $("#Payment_request").show();
                    }
                });
            }
        },
        error: function(xhr){
            console.error("خطأ في جلب الصلاحيات:", xhr);
        }
    });
});
</script>



