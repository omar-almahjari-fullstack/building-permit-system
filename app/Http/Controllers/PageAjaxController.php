<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageAjaxController extends Controller
{

//  public function loadPage($page)
//     {

//         // الصفحة الافتراضية عند فتح الموقع
//          if(empty($page) || $page === '.') {
//              $page = 'dashboard'; // أو أي اسم عرض تريده كصفحة رئيسية
//          }


//         $page = str_replace(['/', '\\'], '.', $page);
//         $viewName = 'modules.auth.' . $page;
//           return view($viewName);
//               // return view('modules.auth.requests.create.Build_components');
//               // if (View::exists($viewName)) {
//               //     return view($viewName);
//               // }

//         return response("<p style='color:red;'>❌ الصفحة غير موجودة</p>", 404);
//     }




    public function loadPage($page, Request $request)
    {
    // الصفحة الافتراضية عند فتح الموقع
    if (empty($page) || $page === '.') {
        $page = 'dashboard'; // أو أي اسم عرض تريده كصفحة رئيسية
    }

    $page = str_replace(['/', '\\'], '.', $page);
    $viewName = 'modules.auth.' . $page;

    $id = $request->query('id'); // استلام id من الـ Query String

    if (view()->exists($viewName)) {
        return view($viewName, compact('id')); // نمرر الـ id للعرض
    }

    return response("<p style='color:red;'>❌ الصفحة غير موجودة</p>", 404);
    }

}
