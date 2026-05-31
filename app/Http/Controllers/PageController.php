<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function loadPage($pageName)
{
    try {
        $viewPath = "modules.{$pageName}"; // مسار مباشر بدون subfolder

        if (!view()->exists($viewPath)) {
            \Log::error("View not found: {$viewPath}");
            return response()->json(['error' => 'الصفحة غير موجودة'], 404);
        }

        $user = auth()->user();
        $userRole = $user ? $user->role : 'guest';

        // جلب البيانات حسب الصفحة
        $data = [
            'user' => $user,
            'role' => $userRole,
            'page' => $pageName
        ];

        return response()->json([
            'html' => view($viewPath, $data)->render(),
            'title' => trans("titles.{$pageName}") // استخدام ترجمة للعناوين
        ]);

    } catch (\Exception $e) {
        \Log::error("Page load error: ".$e->getMessage());
        return response()->json(['error' => 'حدث خطأ في الخادم'], 500);
    }
}
}
