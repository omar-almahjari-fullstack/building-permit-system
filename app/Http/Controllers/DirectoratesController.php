<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectoratesController extends Controller
{
    // عرض جدول المديريات
    public function getUsers()
    {
        $data = DB::table('directorates')->get();
        return view('modules.auth.Departments.Directorate_table', compact('data'));
    }

    // إضافة مديرية جديدة
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $check = DB::table('directorates')->where('name', $request->name)->first();

            if ($check) {
                return response()->json(['data' => 0]); // الاسم موجود
            } else {
                DB::table('directorates')->insert([
                    'name'           => $request->name,
                    'governorate_id' => $request->governorate_id,
                    'contact_email'  => $request->contact_email,
                    'phone'          => $request->phone,
                    'address'        => $request->address,
                    'is_active'      => $request->is_active,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);

                return response()->json(['data' => 1], 200, [], JSON_UNESCAPED_UNICODE);
            }
        }
    }

    // عرض بيانات مديرية واحدة
    public function show($id)
    {
        $show = DB::table('directorates')->where('id', $id)->first();

        if (!$show) return response()->json(['error' => 'Directorate not found'], 404);

        return response()->json($show);
    }

    // تحديث بيانات مديرية
    public function update($id, Request $request)
    {
        DB::table('directorates')->where('id', $id)->update([
            'name'           => $request->name,
            'governorate_id' => $request->governorate_id,
            'contact_email'  => $request->contact_email,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'is_active'      => $request->is_active,
            'updated_at'     => now(),
        ]);

        return response()->json(['data' => $request->all()]); // تم الحفظ
    }

    // حذف مديرية
    public function delete($id)
    {
        DB::table('directorates')->where('id', $id)->delete();
        return response()->json(['success' => true, 'message' => 'تم حذف المديريه']);
    }

    // البحث مع الفلاتر
    public function search(Request $request)
    {
        $query = DB::table('directorates');

        if ($request->has('name') && $request->name !== null) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('governorate_id') && $request->governorate_id !== null) {
            $query->where('governorate_id', $request->governorate_id);
        }

        if ($request->has('is_active') && $request->is_active !== null) {
            $query->where('is_active', $request->is_active);
        }

        $data = $query->get();

        return view('modules.auth.Departments.Directorate_table', compact('data'))->render();
    }

    // إحصائيات المديريات (جميع الحالات)
    public function stats()
{
    $totalDirectorates = DB::table('directorates')->count();
    $activeDirectorates = DB::table('directorates')->where('is_active', 1)->count();
    $inactiveDirectorates = DB::table('directorates')->where('is_active', 0)->count();
    $recentDirectorates = DB::table('directorates')->where('is_active', 1)
                               ->orderBy('created_at', 'desc')
                               ->limit(5) // أو أي عدد تريده كمفعلة حديثًا
                               ->count();

    return response()->json([
        'totalDirectorates' => $totalDirectorates,
        'activeDirectorates' => $activeDirectorates,
        'inactiveDirectorates' => $inactiveDirectorates,
        'recentDirectorates' => $recentDirectorates
    ]);
}

}
