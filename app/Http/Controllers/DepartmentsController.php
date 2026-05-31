<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function getUsers()
    {
        $data = DB::table('departments')
            ->join('directorates', 'directorates.id', '=', 'departments.directorate_id')
            ->select('departments.*', 'directorates.name as directorate_name')
            ->get();

        return view('modules.auth.Departments.Department_table', compact('data'));
    }

    public function store(Request $request)
    {
        $check = DB::table('departments')->where('name', $request->name)->first();

        if ($check) {
            return response()->json(['data' => 0]); // الاسم موجود
        }

        $data = DB::table('departments')->insert([
            'name'           => $request->name,
            'description'    => $request->description,
            'directorate_id' => $request->directorate_id,
            'is_active'      => $request->has('is_active') ? 1 : 0,
            'created_at'     => now(),
        ]);

        return response()->json(['data' => $data ? 1 : 0]);
    }

    public function show($id)
    {
        $show = DB::table('departments')->where('id', $id)->first();
        if (!$show) return response()->json(['error' => 'Department not found'], 404);

        return response()->json($show);
    }

    
public function update($id, Request $request)
{
    DB::table('departments')->where('id', $id)->update([
        'name'           => $request->name,
        'description'    => $request->description,
        'directorate_id' => $request->directorate_id,
        'is_active'      => $request->has('is_active') ? 1 : 0,
        'updated_at'     => now(),
    ]);

    return response()->json(['success' => true]);
}

    public function delete($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return response()->json(['success' => true]);
    }

    // البحث مع الفلاتر
    public function search(Request $request)
    {
        $query = DB::table('departments')
            ->join('directorates', 'directorates.id', '=', 'departments.directorate_id')
            ->select('departments.*', 'directorates.name as directorate_name');

        if ($request->has('name') && $request->name !== null) {
            $query->where('departments.name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('directorate_id') && $request->directorate_id !== null) {
            $query->where('departments.directorate_id', $request->directorate_id);
        }

        if ($request->has('is_active') && $request->is_active !== null) {
            $query->where('departments.is_active', $request->is_active);
        }

        $data = $query->get();

        return view('modules.auth.Departments.Department_table', compact('data'))->render();
    }

    public function stats()
    {
        $totaldepartments = DB::table('departments')->count();
        $activedepartments = DB::table('departments')->where('is_active', 1)->count();
        $inactivedepartments = DB::table('departments')->where('is_active', 0)->count();

        // عدد الاقسام المفعلة حديثًا (آخر 5 مضافين نشطين)
        $recentdepartments = DB::table('departments')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->count();

        return response()->json([
            'totaldepartments'   => $totaldepartments,
            'activedepartments'  => $activedepartments,
            'inactivedepartments'=> $inactivedepartments,
            'recentdepartments'  => $recentdepartments
        ]);
    }
}