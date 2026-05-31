<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPlatformprofile extends Controller
{
      public function loadPage($page)
    {

        // الصفحة الافتراضية عند فتح الموقع
        if (empty($page) || $page === '.') {
            $page = 'profile.Control_Panel'; // أو أي اسم عرض تريده كصفحة رئيسية
        }


        $page = str_replace(['/', '\\'], '.', $page);
        $viewName = 'platform_user.' . $page;
        return view($viewName);
        // return view('modules.auth.requests.create.Build_components');
        // if (View::exists($viewName)) {
        //     return view($viewName);
        // }

        return response("<p style='color:red;'>❌ الصفحة غير موجودة</p>", 404);
    }
}
