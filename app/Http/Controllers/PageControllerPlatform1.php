<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllerPlatform extends Controller
{
    public function loadPage($page)
    {

        // الصفحة الافتراضية عند فتح الموقع
       //  if(empty($page) || $page === '.') {
      //     $page = 'dashboard'; // أو أي اسم عرض تريده كصفحة رئيسية
     //  }


        $page = str_replace(['/', '\\'], '.', $page);
        $viewName = 'platform_user.' . $page;
        return view($viewName);
      

        return response("<p style='color:red;'>❌ الصفحة غير موجودة</p>", 404);
    }
}



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class PageControllerPlatform extends Controller
// {
//     public function loadPage($page)
//     {
//         // تنظيف اسم الصفحة من الرموز غير المسموحة
//         $cleanPage = preg_replace('/[^a-zA-Z0-9_]/', '', $page);
        
//         // الصفحات المسموحة (قائمة بيضاء)
//         $allowedPages = [
//             'Safety_Requirements',
//             'People_with_Special_Needs',
//             'Environmental_Requirements',
//             'Sustainable_Construction',
//             'Plumbing_Installations',
//             'Electrical_Installations',
//             'Building_Executive_Regulations',
//             'Economic_Regulations',
//             'Commercial_Buildings',
//             'Residential_Buildings',
//             'Industrial_Facilities'
//         ];
        
//         // التحقق من وجود الصفحة في القائمة البيضاء
//         if (!in_array($cleanPage, $allowedPages)) {
//             if (request()->ajax()) {
//                 return response("<p style='color:red;'>❌ الصفحة غير مسموح بها</p>", 403);
//             }
//             abort(404, 'الصفحة غير موجودة');
//         }
        
//         $viewName = 'platform_user.main.Regulations.' . $cleanPage;
        
//         // التحقق من وجود ملف العرض
//         if (!view()->exists($viewName)) {
//             if (request()->ajax()) {
//                 return response("<p style='color:red;'>❌ ملف الصفحة غير موجود</p>", 404);
//             }
//             abort(404, 'الصفحة غير موجودة');
//         }
        
//         // تحديد نوع الاستجابة (عادي أو AJAX)
//         if (request()->ajax()) {
//             return view($viewName)->render();
//         }
        
//         return view($viewName);
//     }
// }