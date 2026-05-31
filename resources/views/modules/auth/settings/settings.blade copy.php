<style>
    .btn-primary ,.badge{
        background-color: #151A2D;
        border-color: #151A2D;
    }

    .btn-outline-danger {
        color: #151A2D;
        border-color: #151A2D;
    }
</style>
<!-- الإعدادات -->
<section id="settings" class="content-section">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="bi bi-gear"></i> إعدادات النظام</h1>
        
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" id="exportSettings">
                    <i class="bi bi-download"></i> تصدير الإعدادات
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="importSettings">
                    <i class="bi bi-upload"></i> استيراد الإعدادات
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- العمود الأول -->
        <div class="col-md-6">
            <!-- إعدادات المستخدم -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-person-gear"></i> إعدادات المستخدم</h5>
                    <span class="badge" >الشخصية</span>
                </div>
                <div class="card-body">
                    <form id="userSettingsForm">
                        <div class="mb-3">
                            <label class="form-label">صورة الملف الشخصي</label>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img src="https://via.placeholder.com/150" class="img-thumbnail rounded-circle"
                                        width="80" id="profileImage">
                                </div>
                                <div class="flex-grow-1">
                                    <input type="file" class="form-control" accept="image/*" id="profileImageUpload">
                                    <div class="form-text">الحجم الأقصى 2MB. الصيغ المسموحة: JPG, PNG, GIF</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الاسم الكامل</label>
                            <input type="text" class="form-control" value="محمد أحمد" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">اسم المستخدم</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" value="mohamed" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" value="mohamed@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-control" value="+966501234567">
                        </div>
                        <hr>
                        <h6 class="mb-3">تغيير كلمة المرور</h6>
                        <div class="mb-3">
                            <label class="form-label">كلمة المرور الحالية</label>
                            <input type="password" class="form-control" placeholder="أدخل كلمة المرور الحالية">
                            <div class="form-text"><a href="#" class="text-decoration-none">نسيت كلمة المرور؟</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">كلمة المرور الجديدة</label>
                            <input type="password" class="form-control" placeholder="أدخل كلمة المرور الجديدة">
                            <div class="password-strength mt-2">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%;"></div>
                                </div>
                                <small class="text-muted">قوة كلمة المرور: ضعيفة</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">تأكيد كلمة المرور الجديدة</label>
                            <input type="password" class="form-control" placeholder="أعد إدخال كلمة المرور الجديدة">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary" >حفظ
                                التغييرات</button>
                            <button type="button" class="btn btn-outline-danger"
                                 id="deleteAccountBtn">حذف الحساب</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- إعدادات الأمان -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="bi bi-shield-lock"></i> الأمان والخصوصية</h5>
                </div>
                <div class="card-body">
                    <form id="securitySettingsForm">
                        <div class="mb-3">
                            <label class="form-label">المصادقة الثنائية (2FA)</label>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-1">حالة المصادقة الثنائية: <span
                                            class="badge bg-success">مفعلة</span></p>
                                    <small class="text-muted">لزيادة أمان حسابك، نوصي بتفعيل المصادقة الثنائية</small>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary">إدارة 2FA</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">جلسات الدخول النشطة</label>
                            <div class="list-group">
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>Chrome - Windows</strong><br>
                                            <small>Jeddah, Saudi Arabia - 192.168.1.1</small><br>
                                            <small class="text-muted">آخر نشاط: منذ 5 دقائق</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-danger">تسجيل الخروج</button>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>Safari - iPhone</strong><br>
                                            <small>Riyadh, Saudi Arabia - 192.168.1.2</small><br>
                                            <small class="text-muted">آخر نشاط: منذ يومين</small>
                                        </div>
                                        <button class="btn btn-sm btn-outline-danger">تسجيل الخروج</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="activityLogging" checked>
                            <label class="form-check-label" for="activityLogging">تسجيل نشاط الحساب</label>
                        </div>
                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="showPersonalInfo">
                            <label class="form-check-label" for="showPersonalInfo">إظهار المعلومات الشخصية في الملف
                                العام</label>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- العمود الثاني -->
        <div class="col-md-6">
            <!-- إعدادات الإشعارات -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="bi bi-bell"></i> إعدادات الإشعارات</h5>
                </div>
                <div class="card-body">
                    <form id="notificationSettingsForm">
                        <div class="mb-3">
                            <label class="form-label">طريقة استقبال الإشعارات</label>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">البريد الإلكتروني</label>
                            </div>
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="smsNotifications">
                                <label class="form-check-label" for="smsNotifications">رسائل SMS</label>
                                <small class="text-muted d-block">قد يتم تطبيق رسوم إضافية من مزود الخدمة</small>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                <label class="form-check-label" for="pushNotifications">إشعارات التطبيق</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">أنواع الإشعارات</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="newRequestNotification" checked>
                                <label class="form-check-label" for="newRequestNotification">طلبات جديدة</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="assignedRequestNotification"
                                    checked>
                                <label class="form-check-label" for="assignedRequestNotification">طلبات مسندة</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="statusChangeNotification"
                                    checked>
                                <label class="form-check-label" for="statusChangeNotification">تغيير حالة
                                    الطلب</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="commentNotification" checked>
                                <label class="form-check-label" for="commentNotification">تعليقات جديدة</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="deadlineNotification" checked>
                                <label class="form-check-label" for="deadlineNotification">اقتراب موعد التسليم</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="systemUpdatesNotification"
                                    checked>
                                <label class="form-check-label" for="systemUpdatesNotification">تحديثات النظام</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="promotionalNotification">
                                <label class="form-check-label" for="promotionalNotification">عروض ترويجية</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">وقت الإشعارات</label>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label">من</label>
                                    <input type="time" class="form-control" value="08:00">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">إلى</label>
                                    <input type="time" class="form-control" value="20:00">
                                </div>
                            </div>
                            <small class="text-muted">لن تتلقى إشعارات خارج هذه الأوقات إلا إذا كانت عاجلة</small>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                    </form>
                </div>
            </div>

            <!-- إعدادات النظام -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="bi bi-pc-display"></i> إعدادات النظام</h5>
                </div>
                <div class="card-body">
                    <form id="systemSettingsForm">
                        <div class="mb-3">
                            <label class="form-label">الواجهة</label>
                            <select class="form-select">
                                <option selected>فاتحة</option>
                                <option>غامقة</option>
                                <option>تلقائي (حسب النظام)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">اللغة</label>
                            <select class="form-select">
                                <option selected>العربية</option>
                                <option>الإنجليزية</option>
                                <option>الفرنسية</option>
                                <option>الألمانية</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">المنطقة الزمنية</label>
                            <select class="form-select">
                                <option selected>الرياض (UTC+3)</option>
                                <option>مكة المكرمة (UTC+3)</option>
                                <option>دبي (UTC+4)</option>
                                <option>القاهرة (UTC+2)</option>
                                <option>لندن (UTC+1)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">تنسيق التاريخ والوقت</label>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <select class="form-select">
                                        <option selected>DD/MM/YYYY</option>
                                        <option>MM/DD/YYYY</option>
                                        <option>YYYY-MM-DD</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select">
                                        <option selected>24 ساعة</option>
                                        <option>12 ساعة</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="autoSave" checked>
                            <label class="form-check-label" for="autoSave">الحفظ التلقائي للمسودات</label>
                        </div>
                        <div class="mb-3 form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="animationsEnabled" checked>
                            <label class="form-check-label" for="animationsEnabled">الحركات والانتقالات</label>
                        </div>
                        <div class="mb-3 form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="highContrastMode">
                            <label class="form-check-label" for="highContrastMode">وضع التباين العالي</label>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                    </form>
                </div>
            </div>

            <!-- إعدادات متقدمة -->
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-sliders"></i> إعدادات متقدمة</h5>
                </div>
                <div class="card-body">
                    <form id="advancedSettingsForm">
                        <div class="mb-3">
                            <label class="form-label">حدود عرض البيانات</label>
                            <select class="form-select">
                                <option selected>25 عنصر في الصفحة</option>
                                <option>50 عنصر في الصفحة</option>
                                <option>100 عنصر في الصفحة</option>
                                <option>جميع العناصر</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">سياسة التخزين المؤقت</label>
                            <select class="form-select">
                                <option selected>تلقائي (موصى به)</option>
                                <option>أقل تخزين مؤقت</option>
                                <option>أقصى تخزين مؤقت</option>
                                <option>لا تخزين مؤقت</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">جودة الوسائط</label>
                            <select class="form-select">
                                <option selected>تلقائي (حسب الاتصال)</option>
                                <option>عالية (موصى به للاتصال السريع)</option>
                                <option>متوسطة</option>
                                <option>منخفضة (للاتصال البطيء)</option>
                            </select>
                        </div>
                        <div class="mb-3 form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="developerMode">
                            <label class="form-check-label" for="developerMode">وضع المطور</label>
                        </div>
                        <div class="mb-3" id="developerOptions" style="display: none;">
                            <label class="form-label">خيارات المطور</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="enableDebugging">
                                <label class="form-check-label" for="enableDebugging">تمكين تصحيح الأخطاء</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="showLogs">
                                <label class="form-check-label" for="showLogs">إظهار سجلات النظام</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="disableCache">
                                <label class="form-check-label" for="disableCache">تعطيل التخزين المؤقت</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                        <button type="button" class="btn btn-outline-secondary ms-2" id="resetSettingsBtn">إعادة
                            تعيين الإعدادات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- قسم إضافي للصلاحيات (للمشرفين فقط) -->
    <div class="row mt-4" id="adminSettingsSection">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-admin text-white">
                    <h5><i class="bi bi-shield-lock"></i> إعدادات المشرف</h5>
                </div>
                <div class="card-body">
                    <form id="adminSettingsForm">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">حدود النظام</label>
                                    <div class="mb-3">
                                        <label class="form-label">عدد المستخدمين</label>
                                        <input type="number" class="form-control" value="500" min="1">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">حجم التخزين</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="100"
                                                min="1">
                                            <span class="input-group-text">GB</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">سياسة النسخ الاحتياطي</label>
                                    <div class="mb-3">
                                        <label class="form-label">تكرار النسخ الاحتياطي</label>
                                        <select class="form-select">
                                            <option selected>يومي</option>
                                            <option>أسبوعي</option>
                                            <option>شهري</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">الاحتفاظ بالنسخ</label>
                                        <select class="form-select">
                                            <option selected>7 أيام</option>
                                            <option>14 يوم</option>
                                            <option>30 يوم</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">إعدادات الصيانة</label>
                                    <div class="mb-3 form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="maintenanceMode">
                                        <label class="form-check-label" for="maintenanceMode">وضع الصيانة</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">رسالة الصيانة</label>
                                        <textarea class="form-control" rows="2">نظامنا قيد الصيانة حالياً. نعتذر للإزعاج وسنعود قريباً.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger">حفظ إعدادات المشرف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- نموذج تأكيد حذف الحساب -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">تأكيد حذف الحساب</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من رغبتك في حذف حسابك بشكل دائم؟ هذه العملية لا يمكن التراجع عنها.</p>
                <p>سيتم حذف جميع بياناتك الشخصية والمحتوى المرتبط بحسابك.</p>
                <div class="mb-3">
                    <label class="form-label">أدخل كلمة المرور للتأكيد:</label>
                    <input type="password" class="form-control" placeholder="أدخل كلمة المرور الحالية">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger">حذف الحساب بشكل دائم</button>
            </div>
        </div>
    </div>
</div>

<script>
    // كود JavaScript لإدارة تفاعلات الإعدادات
    document.addEventListener('DOMContentLoaded', function() {
        // تبديل خيارات المطور
        document.getElementById('developerMode').addEventListener('change', function() {
            document.getElementById('developerOptions').style.display = this.checked ? 'block' : 'none';
        });

        // فتح نموذج حذف الحساب
        document.getElementById('deleteAccountBtn').addEventListener('click', function() {
            var modal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
            modal.show();
        });

        // يمكن إضافة المزيد من التفاعلات هنا
    });
</script>
