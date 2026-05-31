<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageAjaxController;
use App\Http\Controllers\PageControllerPlatform;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\ControllerPlatformprofile;
use App\Http\Controllers\allRquest;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\controlerRequestsMangement;
use App\Http\Controllers\showAllRquest;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\fee_structuresController;
use App\Http\Controllers\Calculaterfee;
use App\Http\Controllers\RequestCommentController;
use App\Http\Controllers\RequestController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\compoboxController;
// النسخة
use App\Http\Controllers\DatabaseController;


////////////////////////////////-اشرف-///////////////////////////////////////
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DirectoratesController;
use App\Http\Controllers\Users1Controller;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
///////////////////////////////////////////////////////////////////////

////////////////////////////////-سامي-///////////////////////////////////////
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\SummaryReportController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\CustomReportController;
////////////////////////////-سامي-///////////////////////////////////////////

use App\Http\Controllers\profileUsercontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ControlPanelStatsController;
use App\Http\Controllers\SettingsController;

////////////////////////////////////////////////////
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\WhatsAppController;


Route::get('/send-whatsapp', [WhatsAppController::class, 'sendMessage']);
Route::get('/send-whatsapp_RequestController', [RequestController::class, 'sendMessagewats']);
Route::get('/send-template', [WhatsAppController::class, 'sendTemplate']);




///////////    لوق ان النظام

use App\Http\Controllers\Auth\BeneficiaryLoginController;

// ------------------------------------------------------



// الصفحة الرئيسية → تعرض المنصة
Route::get('/', function () {
    return view('platform_user.app');
})->name('platform.home');


// AJAX لتحميل الصفحات داخل المنصة
Route::get('/ajax-page-platform/{page}', [PageControllerPlatform::class, 'loadPage'])
    ->where('page', '.*')
    ->name('ajax.page.platform');


// ====================== تسجيل دخول المسؤول ======================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.master');
    })->name('dashboard');

    Route::get('/dashboard/data', [DashboardController::class, 'getData'])->name('dashboard.data');
    Route::get('/dashboard/filters', [DashboardController::class, 'filters'])->name('dashboard.filters');
    Route::get('/dashboard/summary', [DashboardController::class, 'summary'])->name('dashboard.summary');

    // الدفع
    Route::get('/payments/info/{requestId}', [PaymentController::class, 'info'])->name('payments.info');
    Route::post('/payments/charge', [PaymentController::class, 'charge'])->name('payments.charge');

    // النسخ الاحتياطية
    Route::post('/database/backup', [DatabaseController::class, 'backup'])->name('database.backup');
    Route::post('/database/recover', [DatabaseController::class, 'recover'])->name('database.recover');
});


// ====================== تسجيل دخول المستفيد ======================
Route::get('/beneficiary/login', [BeneficiaryLoginController::class, 'showLoginForm'])->name('beneficiary.login');
Route::post('/beneficiary/login', [BeneficiaryLoginController::class, 'login']);
Route::post('/beneficiary/logout', [BeneficiaryLoginController::class, 'logout'])->name('beneficiary.logout');

// الملف الشخصي للمستفيد (محمي بالميدل وير)
Route::middleware(['auth:beneficiary'])->group(function () {
    Route::get('/beneficiary/amr', function () {
        return view('platform_user.navbar_profile');
    })->name('beneficiary.amr');

    Route::get('/beneficiary/dashboard', function () {
        return view('platform_user.app');
    })->name('beneficiary.dashboard');
});



        Route::get('/beneficiary/logout', function () {
            return view('platform_user.app');
        })->name('beneficiary.logout');


    //     Route::get('/beneficiary/amr', function () {
    //     return view('platform_user.navbar_profile');
    // })->name('beneficiary.amr');


// ====================== صفحات أخرى عبر AJAX ======================
Route::get('/ajax-page/{page}', [PageAjaxController::class, 'loadPage']);
Route::get('/ajax-page-platformprofile/{page}', [ControllerPlatformprofile::class, 'loadPage'])
    ->where('page', '.*')
    ->name('ajax.page.profile');


///////////////////////////////////////////////////////انتهاء الوق ان







// use Illuminate\Support\Facades\DB;



// Route::get('/test-users', function () {
//     $users = DB::table('login')
//         ->where('user_name', 'like', 'a%') // شرط: أسماء المستخدمين التي تبدأ بـ 'a'
//         ->get();

//     foreach ($users as $user) {
//         echo $user->user_name . "<br>";
//         echo $user->p . "<br><br>";
//     }
// });

// Route::get('/ss', function () {
//     return view('layouts.master'); // تحميل القالب الرئيسي فقط
// });












    //////////////////////////////////  تعبئه بيانات الكم بوكس///////////////////////////////////////

    // routes/web.php
// Route::get('/get-directorates', [DirectorateController::class, 'getAll']);


Route::get('/api_directorates', [DirectorateController::class, 'getAll']);
Route::get('/engineerSelect', [DirectorateController::class, 'get_engineerSelect']);// عرض المهندسين لنزول
Route::get('/request_type', [DirectorateController::class, 'getRequestType']);
//////////// يعرض جديد او تجديل
Route::get('/request_type_new', [DirectorateController::class, 'getRequestType_new']);
Route::get('/license_type', [DirectorateController::class, 'getlicenseType']);
Route::get('/department', [DirectorateController::class, 'getDepartment']);
Route::get('/status', [DirectorateController::class, 'getStatus']);
Route::get('/users', [DirectorateController::class, 'getusers']);
Route::get('/current_stage', [DirectorateController::class, 'getCurrentStage']);
Route::get('/building_type', [DirectorateController::class, 'getBuildingType']);
Route::get('/floor_type', [DirectorateController::class, 'getfloor_type']);
Route::get('/street_type', [DirectorateController::class, 'get_street_type']);
Route::get('/status_Request_e/{id}', [DirectorateController::class, 'get_status_Request']);





  //////////////////////////////////  تعبئه بيانات الكم بوكس///////////////////////////////////////

    // routes/web.php
// Route::get('/get-directorates', [DirectorateController::class, 'getAll']);


Route::get('/api_directorates_platform', [compoboxController::class, 'getAll']);
Route::get('/engineerSelect_platform', [compoboxController::class, 'get_engineerSelect']);// عرض المهندسين لنزول
Route::get('/request_type_platform', [compoboxController::class, 'getRequestType']);
//////////// يعرض جديد او تجديل
Route::get('/request_type_new_platform', [compoboxController::class, 'getRequestType_new']);
Route::get('/license_type_platform', [compoboxController::class, 'getlicenseType']);
Route::get('/department_platform', [compoboxController::class, 'getDepartment']);
Route::get('/status_platform', [compoboxController::class, 'getStatus']);
Route::get('/users_platform', [compoboxController::class, 'getusers']);
Route::get('/current_stage_platform', [compoboxController::class, 'getCurrentStage']);
Route::get('/building_type_platform', [compoboxController::class, 'getBuildingType']);
Route::get('/floor_type_platform', [compoboxController::class, 'getfloor_type']);
Route::get('/street_type_platform', [compoboxController::class, 'get_street_type']);
Route::get('/status_Request_e_platform/{id}', [compoboxController::class, 'get_status_Request']);


// Route::get('/platform_user_request', function () {
//     return view('platform_user.main.Breadcrumb_Receptionist'); // تحميل القالب الرئيسي فقط
// });

    //////////////////////////////////بيانات الرخصه كامل///////////////////////////////////////

    ////////***************///////.beneficiaries.//////***************////////////// */
Route::get('/get-beneficiaries', [CitizenController::class, 'getUsers'])->name('users.get');
/////////////////////////////////
Route::get('/reload-beneficiaries-table',[CitizenController::class, 'getUsers'])->name('reload-beneficiaries-table');
Route::get('/reload-beneficiaries-getfirst',[CitizenController::class, 'getfirst'])->name('reload-beneficiaries-getfirst');
// Route::get('/',[CitizenController::class, 'index'])->name('user_Ajax');
Route::post('/add-beneficiaries_Ajax', [CitizenController::class, 'store'])->name('add-beneficiaries_Ajax');
Route::get('/beneficiaries_get/{id}', [CitizenController::class, 'show']);
Route::post('/beneficiaries_update/{id}', [CitizenController::class, 'update']);
Route::delete('/beneficiaries_Delete/{id}',[CitizenController::class , 'delete']);

Route::get('/beneficiaries-users', [CitizenController::class, 'search'])->name('search-beneficiaries');




////////////////////////////////-اشرف-////////////////////////////////

   ////////***************///////.Departments.//////***************////////////// */
Route::get('/get-Department', [DepartmentsController::class, 'getUsers'])->name('Department.get');
/////////////////////////////////
Route::get('/reload-Department_table',[DepartmentsController::class, 'getUsers'])->name('reload-Department_table');
// Route::get('/',[CitizenController::class, 'index'])->name('user_Ajax');
Route::post('/add-Department_Ajax', [DepartmentsController::class, 'store'])->name('add-Department_Ajax');
Route::get('/Department_get/{id}', [DepartmentsController::class, 'show']);
Route::post('/Department_update/{id}', [DepartmentsController::class, 'update']);
Route::delete('/Department_Delete/{id}',[DepartmentsController::class , 'delete']);
Route::get('/departments/stats', [DepartmentsController::class, 'stats'])->name('departments.stats');
Route::get('/search-department', [DepartmentsController::class, 'search'])->name('search-department');

/////////////////////////////////////////////////////////////////////////////


    ////////***************///////.Directorates.//////***************////////////// */
Route::get('/get-users', [DirectoratesController::class, 'getUsers'])->name('users.get');
/////////////////////////////////
Route::get('/reload-Directorate_table',[NotificationController::class, 'getUsers'])->name('reload-Directorate_table');
Route::get('/index-Directorate_table',[NotificationController::class, 'index'])->name('index-Directorate_table');

// Route::get('/',[CitizenController::class, 'index'])->name('user_Ajax');
Route::post('/add-Directorate_Ajax', [DirectoratesController::class, 'store'])->name('add-Directorate_Ajax');
Route::get('/Directorate_get/{id}', [DirectoratesController::class, 'show']);
Route::post('/Directorate_update/{id}', [DirectoratesController::class, 'update']);
Route::delete('/Directorate_Delete/{id}',[DirectoratesController::class , 'delete']);
Route::get('/directorates.stats', [DirectoratesController::class, 'stats'])->name('directorates.stats');
Route::get('/search-Directorate', [DirectoratesController::class, 'search'])->name('search-Directorate');

//////////////////////////////////////////////////////////////////////////////


////////***************///////.Users1.//////***************////////////// */
Route::get('/get-users', [Users1Controller::class, 'getUsers'])->name('users.get');
/////////////////////////////////
Route::get('/reload-users_table',[Users1Controller::class, 'getUsers'])->name('reload-users_table');
// Route::get('/',[CitizenController::class, 'index'])->name('user_Ajax');
Route::post('/add-users_Ajax', [Users1Controller::class, 'store'])->name('add-users_Ajax');
Route::get('/users_get/{id}', [Users1Controller::class, 'show']);
Route::post('/users_update/{id}', [Users1Controller::class, 'update']);
Route::delete('/users_Delete/{id}',[Users1Controller::class , 'delete']);

Route::get('/search-users', [Users1Controller::class, 'search'])->name('search-users');
///////////////////////////////////////////////////////////////////////////////////////
Route::post('/user_toggleStatus/{id}', [Users1Controller::class, 'toggleStatus']);
//////////////////////////////////عدد المستخدمين النشطين///////////////////////////////////////
Route::get('/users-stats', [Users1Controller::class, 'stats'])->name('users.stats');

////////////////////////////////////////////////////////////////////////////


////////***************///////.الاشعاراااات.//////***************////////////// */
Route::get('/get-users', [NotificationController::class, 'getUsers'])->name('users.get');
/////////////////////////////////
Route::get('/reload-notifications_table',[NotificationController::class, 'getnotifications'])->name('reload-notifications_table');
Route::get('/index-notifications_table',[NotificationController::class, 'index'])->name('index-notifications_table');
// Route::get('/',[CitizenController::class, 'index'])->name('user_Ajax');
Route::post('/add-notifications_Ajax', [NotificationController::class, 'store'])->name('add-notifications_Ajax');
Route::get('/notifications_show/{id}', [NotificationController::class, 'show']);
Route::post('/notifications_update/{id}', [NotificationController::class, 'update']);
Route::delete('/notifications_Delete/{id}',[NotificationController::class , 'delete']);
Route::get('/notifications/filter', [NotificationController::class, 'filter'])->name('notifications.filter');
Route::get('/search-notifications', [NotificationController::class, 'search'])->name('search-notifications');
Route::get('/reload-notifications-table', [NotificationController::class, 'reloadNotifications'])->name('reload-notifications_table');
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.mark_all_read');

/////////////////////////////////////////////////////////////////////////////////



Route::prefix('roles')->group(function () {
    Route::post('/store', [RoleController::class, 'store'])->name('roles_store');       // إضافة/تعديل دور
    Route::get('/get/{id}', [RoleController::class, 'get'])->name('roles_get');         // جلب بيانات دور للتعديل
    Route::delete('/delete/{id}', [RoleController::class, 'delete'])->name('roles_delete'); // حذف دور
    Route::get('/reload-table', [RoleController::class, 'reloadTable'])->name('reload-roles_table'); // إعادة تحميل الجدول
    Route::get('/index-roles_table',[RoleController::class, 'index'])->name('index-roles_table');
});

//////////////////////////////////////////////////////////////////









 ////////***************///////.بيانات الطلب كامل.//////***************////////////// */
 ////////***************///////.requests.//////*******اضافة********////////////// */
Route::get('/reload-beneficiaries-CitizenTableBody/{id}',[allRquest::class, 'CitizenTableBody'])->name('reload-beneficiaries-CitizenTableBody');
Route::post('/add-requests_Ajax', [allRquest::class, 'store'])->name('add-requests_Ajax');
Route::post('/add-license_Ajax', [allRquest::class, 'store_license'])->name('add-license_Ajax');
Route::post('/add-locations_Ajax', [allRquest::class, 'store_locations'])->name('add-locations_Ajax');
Route::post('/add-land_plots_Ajax', [allRquest::class, 'store_land_plots'])->name('add-land_plots_Ajax');
Route::post('/add-boundaries_Ajax', [allRquest::class, 'store_boundaries'])->name('add-boundaries_Ajax');
Route::post('/add-attachments_Ajax', [allRquest::class, 'store_attachments'])->name('add-attachments_Ajax');
Route::post('/add-engineer_site_reports_Ajax', [allRquest::class, 'store_engineer_site_reports'])->name('add-engineer_site_reports_Ajax');

//////مكونات البناء
Route::post('/add-Building-Component_Ajax', [allRquest::class, 'store_Building_Component'])->name('add-Building-Component_Ajax');
Route::get('/reload-BuildingComponent-get/{request_id}',[allRquest::class, 'getBuildingComponent'])->name('reload-BuildingComponent-get');
Route::get('/BuildingComponent_get/{id}', [allRquest::class, 'show_BuildingComponent']);
Route::delete('/BuildingComponent_Delete/{id}',[allRquest::class , 'delete_BuildingComponent']);
Route::post('/update-Building-Component_Ajax', [allRquest::class, 'update_Building_Component'])->name('update-Building-Component_Ajax');
Route::post('/update_Building_Component_show/{id}', [allRquest::class, 'update_Building_Component_show'])->name('update-Building-Component_Ajax');


/////////////////////////////////////////////////////////عرض جميع بيانات الطلب الا صفحه تفاصيل الطلب ////////////////////////////////////////////////////////

Route::get('/reload-beneficiaries-CitizenShow/{id}',[showAllRquest::class, 'CitizenTableBody'])->name('reload-beneficiaries-CitizenShow');
Route::get('/reload-requests-Show/{id}',[showAllRquest::class, 'requests_Show'])->name('reload-requests-Show');
Route::get('/reload-licenses-Show/{id}',[showAllRquest::class, 'licenses_Show'])->name('reload-licenses-Show');
Route::get('/reload-BuildingComponent-show/{id}',[showAllRquest::class, 'show_BuildingComponent'])->name('reload-BuildingComponent-show');
Route::get('/reload-locations-Show/{id}',[showAllRquest::class, 'show_locations'])->name('reload-locations-Show');
Route::get('/reload-land_plots-Show/{id}',[showAllRquest::class, 'show_land_plots'])->name('reload-land_plots-Show');
Route::get('/reload-engineer_site_reports-Show/{id}',[showAllRquest::class, 'show_engineer_site_reports'])->name('reload-engineer_site_reports-Show');
Route::get('/reload-boundaries-Show/{id}',[showAllRquest::class, 'show_boundaries'])->name('reload-boundaries-Show');
Route::get('/reload-attachments-Show/{request_id}',[showAllRquest::class, 'showAttachments'])->name('reload-attachments-Show');


/////////////////////////////////////////////////////////تعديل جميع بيانات الطلب الا صفحه تفاصيل الطلب ////////////////////////////////////////////////////////

Route::post('/requests_update/{id}', [allRquest::class, 'update_requests'])->name('requests_update');
Route::post('/update_license/{id}', [allRquest::class, 'update_license'])->name('update_license');
Route::post('/update_locations/{id}', [allRquest::class, 'update_locations'])->name('update_locations');
Route::post('/update_land_plots/{id}', [allRquest::class, 'update_land_plots'])->name('update_land_plots');
Route::post('/update_engineer_site_reports/{id}', [allRquest::class, 'update_engineer_site_reports'])->name('update_engineer_site_reports');
Route::post('/update_boundaries/{plot_id}', [allRquest::class, 'update_boundaries'])->name('update_boundaries');


////////////////////////////    التعليقات الخاصه بل الطلب //////
Route::post('/requests/{request}/comments', [RequestCommentController::class, 'store'])->name('comments.store');
Route::get('/requests/{request}/comments', [RequestCommentController::class, 'index'])->name('comments.index');


/////////ارسال الطلب للمراجعه
Route::get('/requests/submit/{id}',[allRquest::class, 'requests_submit'])->name('requests.submit');
Route::get('/requests/submit_Report/{id}',[allRquest::class, 'requests_submit_Report'])->name('requests.submit_Report');



/////////ارسال الطلب للمراجعه من لمنصه
Route::get('/requests_platform/submit/{id}',[allRquest::class, 'requests_submit'])->name('requests.submit');


///      ازرار الاجرائات
Route::prefix('requests')->group(function () {
    Route::get('/{id}/workflow', [RequestController::class, 'getWorkflow'])->name('requests.workflow');// جلب سير العمل
    Route::post('/{id}/resption', [RequestController::class, 'resption'])->name('requests.resption');// جلب سير العمل
    Route::post('/{id}/approve_one', [RequestController::class, 'approve_one'])->name('requests.approve_one'); // قبول الطلب المراجعة الاولية
    Route::post('/{id}/approve_tew', [RequestController::class, 'approve_tew'])->name('requests.approve_tew'); // قبول الطلب المراجعة الفنية
    Route::post('/{id}/approve', [RequestController::class, 'approve'])->name('requests.approve'); // قبول الطلب الاعتماد النهائي
    Route::post('/{id}/assignEngineer_Report', [RequestController::class, 'assignEngineer_Report'])->name('requests.assignEngineer_Report'); //   رفع تقرير المهندس
    Route::post('/{id}/reject', [RequestController::class, 'reject'])->name('requests.reject');   // رفض الطلب
    Route::post('/{id}/request-change', [RequestController::class, 'requestChange'])->name('requests.change'); // طلب تعديل
    Route::post('/{id}/assign-engineer', [RequestController::class, 'assignEngineer'])->name('requests.assign');// تعيين مهندس
    Route::post('/{id}/send-payment', [RequestController::class, 'sendPayment'])->name('requests.payment'); // إرسال رابط الدفع
    Route::post('/{id}/notify', [RequestController::class, 'notifyClient'])->name('requests.notify'); // إرسال إشعار للعميل
    Route::post('/{id}/add-comment', [RequestController::class, 'addComment'])->name('requests.comment'); // إضافة تعليق
});



////////////////////////////////////////////////////////////////////////////////طباعه السند والفاتورة/////////////////////



Route::get('/requests/{id}/receipt', [RequestController::class, 'showReceipt']);


Route::get('/building-permit/{request_id}', [RequestController::class, 'showBuildingPermit'])->name('building_permit.show');



///////////////////////////////////////عرض الطلبات بحسب الحاله/////////////////////////////////////////////
Route::get('/reload.requests',[controlerRequestsMangement::class, 'reloadRequests'])->name('reload.requests');

///////////////////////////////////////عرض الطلبات بحسب رقم الطلب/////////////////////////////////////////////
Route::get('/requests/search', [controlerRequestsMangement::class, 'searchRequests'])->name('requests.search');
Route::get('/requests/search/name', [controlerRequestsMangement::class, 'searchRequestsname'])->name('requests.search.name');

Route::get('/stage_counts', [controlerRequestsMangement::class, 'getStageCounts']);



    ////////***************///////.fee_structures.//////***************////////////// */
Route::get('/get-fee_structures', [fee_structuresController::class, 'getFeeStructures'])->name('users.get');
/////////////////////////////////
Route::get('/reload-fee_structures-table',[fee_structuresController::class, 'getFeeStructures'])->name('reload-fee_structures-table');
// Route::get('/',[CitizenController::class, 'index'])->name('user_Ajax');
Route::post('/add-fee_structures', [fee_structuresController::class, 'store'])->name('add-fee_structures_Ajax');
Route::get('/fee_structures_get/{id}', [fee_structuresController::class, 'show']);
Route::post('/fee_structures_update/{id}', [fee_structuresController::class, 'update']);
Route::delete('/fee_structures_Delete/{id}',[fee_structuresController::class , 'delete']);

// Route::get('/fee_structures-users', [fee_structuresController::class, 'search'])->name('search-fee_structures');




/////////حساب الرسوم
Route::get('/fee_structures_sum/{id}', [Calculaterfee::class, 'fee_structures_sum'])->name('fee_structures_sum');











////////////////////////////////////////////-تقارير اعدادات  لوحه تحكم-///////////////////////////////////////////////////////

Route::get('/show_chartsReport', [showAllRquest::class, 'show_chartsReport'])->name('show_chartsReport');

Route::post('/show_chartsReport', [ReportController::class, 'showChartsReport']);



// صفحة الاعدادات في النظام
Route::prefix('employee-settings')->group(function () {
    Route::get('/profile/{id?}', [UserSettingsController::class, 'getProfile']);
    Route::post('/profile/update', [UserSettingsController::class, 'updateProfile']);
    Route::post('/password/change', [UserSettingsController::class, 'changePassword']);
});
// صفحة الاعدادات (تبويبة الامان )
Route::prefix('employee-settings')->group(function () {
    Route::get('/security/{id?}', [UserSettingsController::class, 'getSecurity']);
    Route::post('/security/2fa/enable', [UserSettingsController::class, 'enable2FA']);
    Route::post('/security/2fa/disable', [UserSettingsController::class, 'disable2FA']);
    Route::post('/security/logout-other-devices', [UserSettingsController::class, 'logoutOtherDevices']);
});


// التقارير الاحصائية
// قوائم منسدلة
// Route::prefix('api')->group(function () {
//     Route::get('/employees',     [SummaryReportController::class, 'getEmployees']);
//     Route::get('/directorates',  [SummaryReportController::class, 'getDirectorates']);
//     Route::get('/license-types', [SummaryReportController::class, 'getLicenseTypes']);
//     Route::get('/statuses',      [SummaryReportController::class, 'getStatuses']);
//     // إحصائيات أولية
//     Route::get('/stats/initial',      [SummaryReportController::class, 'getInitialStats']);
//     Route::get('/charts/initial',     [SummaryReportController::class, 'getInitialCharts']);
//     // تصفية
//     Route::post('/charts/filter',     [SummaryReportController::class, 'filterCharts']);
//     // Route::post('/api/employees-performance', [SummaryReportController::class, 'getEmployeesPerformance']);
// });
// Route::post('/api/employees-performance', [SummaryReportController::class, 'getEmployeesPerformance']);


/* التقارير الإحصائية – القوائم المنسدلة والإحصائيات والتصفية */
Route::prefix('api')->group(function () {
    Route::get('/employees',     [SummaryReportController::class, 'getEmployees']);
    Route::get('/directorates',  [SummaryReportController::class, 'getDirectorates']);
    Route::get('/license-types', [SummaryReportController::class, 'getLicenseTypes']);
    Route::get('/statuses',      [SummaryReportController::class, 'getStatuses']);
    Route::get('/stats/initial', [SummaryReportController::class, 'getInitialStats']);
    Route::get('/charts/initial',[SummaryReportController::class, 'getInitialCharts']);
    Route::post('/charts/filter',[SummaryReportController::class, 'filterCharts']);
    Route::post('/employees-performance', [SummaryReportController::class, 'getEmployeesPerformance']);
});

// ---------------- Dashboard Admin APIs ----------------

// Route::prefix('dashboard-admin')->group(function () {
//     Route::get('/summary', [DashboardAdminController::class,'getSummary']);
//     Route::get('/recent-activity', [DashboardAdminController::class,'getRecentActivity']);
//     Route::get('/requests/by-governorate', [DashboardAdminController::class,'requestsByGovernorate']);
//     Route::get('/requests/by-license-type', [DashboardAdminController::class,'requestsByLicenseType']);
//     Route::get('/requests/modal', [DashboardAdminController::class,'listRequestsModal']);
// });


Route::prefix('dashboard-admin')->group(function () {
    Route::get('/summary', [DashboardAdminController::class,'getSummary']);
    Route::get('/recent-activity', [DashboardAdminController::class,'getRecentActivity']);
    Route::get('/requests/by-governorate', [DashboardAdminController::class,'requestsByGovernorate']);
    Route::get('/requests/by-license-type', [DashboardAdminController::class,'requestsByLicenseType']);
    Route::get('/requests/modal', [DashboardAdminController::class,'listRequestsModal']);

    // جديد: بيانات الفلاتر
    Route::get('/filters/basic', [DashboardAdminController::class,'getBasicFilters']);
    Route::get('/filters/directorates', [DashboardAdminController::class,'getDirectoratesByGovernorate']);

    // جديد: التصدير
    Route::get('/export/requests', [DashboardAdminController::class,'exportRequests']); // عام/مودال
});


// التقارير
Route::prefix('reports/custom')->group(function () {
    // الفلاتر + القوالب
    Route::get('/filters', [CustomReportController::class, 'filters']);
    Route::get('/templates', [CustomReportController::class, 'listTemplates']);
    Route::post('/templates', [CustomReportController::class, 'storeTemplate']);
    Route::delete('/templates/{id}', [CustomReportController::class, 'deleteTemplate']);

    // توليد التقرير (JSON)
    Route::post('/generate', [CustomReportController::class, 'generate']);

    // تحليل متقدم
    Route::post('/analysis', [CustomReportController::class, 'advancedAnalysis']);

    // التصدير (CSV / XLSX / PDF) : params=base64(json)
    Route::get('/export', [CustomReportController::class, 'export']);
});



/////////////////////////////////////////////-سامي-//////////////////////////////////////////////////////


// صفحة الملف الشخصي
Route::get('/user-data/{id?}', [profileUsercontroller::class, 'getUserData']);

// صفحة طلباتي )(الاحصائيات)
Route::get('/orders-stats/{id?}', [DashboardController::class, 'getOrdersStats']);
// صفحة الطلبات (الجدول 5 اخر الطلبات )
Route::get('/recent-orders/{id?}', [DashboardController::class, 'getRecentOrders']);
// صفحة الطلبات (الرسوم البيانية )
Route::get('/chart-data/{id?}', [DashboardController::class, 'getChartData']);


// لوجة التحكم
// Route::get('/panel-stats/{id?}', [DashboardController::class, 'getPanelStats']);
Route::get('/control-panel-stats/{id?}', [ControlPanelStatsController::class, 'getStats']);
//  الرسم البياني في لوحة التحكم
Route::get('/control-panel-chart/{id?}', [ControlPanelStatsController::class, 'getChartData']);
// الجدول لوحة التحكم
Route::get('/latest-updates', [ControlPanelStatsController::class, 'getLatestUpdates']);

// فلترة تبويبات جدول لوحة التحكم
Route::get('/licenses',   [ControlPanelStatsController::class,'getLicenses']);
Route::get('/invoices',   [ControlPanelStatsController::class,'getInvoices']);
Route::get('/comments',   [ControlPanelStatsController::class,'getComments']);


// الاعدادات (الخصوصية )
Route::get('/settings/privacy/{id?}', [SettingsController::class, 'getPrivacySettings']);
Route::post('/settings/privacy/toggle', [SettingsController::class, 'togglePrivacy']);
// تبويبة الاشعارات في الاعدادات
Route::get('/settings/notifications/{id?}', [SettingsController::class,'getNotificationSettings']);
Route::post('/settings/notifications/toggle', [SettingsController::class,'toggleNotification']);
// تبويبة اعدادات الحساب
Route::post('/settings/account/change-password', [SettingsController::class,'changePassword']);
Route::post('/settings/account/update-profile',   [SettingsController::class,'updateProfile']);
Route::get('/settings/account/{id?}', [SettingsController::class,'getAccountInfo']);
// تفضيلات المستفيد
Route::get('/settings/preferences/{id?}', [SettingsController::class,'getPreferences']);
Route::post('/settings/preferences/toggle', [SettingsController::class,'togglePreference']);



// صفحة الامان والخصوصية



///////////////////////////////////////////////////////////////////////////////////////////////////
