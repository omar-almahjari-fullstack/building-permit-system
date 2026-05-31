<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class fee_structuresController extends Controller
{
    public function getFeeStructures()
{
   $data = DB::table('fee_structures')
    ->join('building_types', 'fee_structures.building_type_id', '=', 'building_types.id')
    ->join('floor_types', 'fee_structures.floor_type_id', '=', 'floor_types.id')
    ->join('street_types', 'fee_structures.street_type_id', '=', 'street_types.id')
    ->join('license_types', 'fee_structures.license_type_id', '=', 'license_types.id')
    ->join('request_types', 'fee_structures.request_type_id', '=', 'request_types.id')
    ->select(
        'fee_structures.*',
        'building_types.name as building_type_name',
        'floor_types.name as floor_type_name',
        'street_types.name as street_type_name',
        'license_types.name as license_type_name',
        'request_types.name as request_types_name'
    )
    ->get();

// تمرير البيانات للـ view
return view('modules.auth.fee_structures_table', compact('data'));

}


public function store(Request $request)
{
    if ($request->isMethod('post')) {

        // ✅ تحقق من الإدخالات المكررة (UNIQUE)
        $check = DB::table('fee_structures')
            ->where('building_type_id', $request->building_type_id)
            ->where('floor_type_id', $request->floor_type_id)
            ->where('street_type_id', $request->street_type_id)
            ->where('license_type_id', $request->license_type_id)
            ->where('structure_type', $request->structure_type)
            ->where('request_type_id', $request->request_type_id)
            ->first();

        if ($check) {
            return response()->json([
            'success' => false,
            'message' => 'هذا التركيب موجود مسبقًا في جدول الرسوم'], 422, [], JSON_UNESCAPED_UNICODE);
        }

        // ✅ إدخال البيانات
        $data = DB::table('fee_structures')->insert([
            'building_type_id'   => $request->building_type_id,
            'floor_type_id'      => $request->floor_type_id,
            'structure_type'      => $request->structure_type,
            'street_type_id'     => $request->street_type_id,
            'license_type_id'    => $request->license_type_id,
            'request_type_id'    => $request->request_type_id,
            'road_occupation_fee'=> $request->road_occupation_fee ?? 0,
            'license_fee'        => $request->license_fee ?? 0,
            'waste_removal_fee'  => $request->waste_removal_fee ?? 0,
            'development_disaster_fee'  => $request->development_disaster_fee ?? 0,
            'is_active'          => $request->is_active ?? 1,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        if(!$data){
             return response()->json([
           'success' => false,
           'message' => 'لم تتم عمليه الادخال'
       ], 405, [], JSON_UNESCAPED_UNICODE);
        }



        return response()->json(['data' => 1], 200, [], JSON_UNESCAPED_UNICODE);
    }

     return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
}




public function show($id)
{
    $show = DB::table('fee_structures')->where('id', $id)->first();
    if (!$show) {
        return response()->json(['error' => 'الرسوم غير موجودة'], 404);
    }

    return response()->json($show);
}

public function update($id, Request $request)
{
    // تحقق إذا كان هناك صف آخر بنفس التركيبة
    $exists = DB::table('fee_structures')
        ->where('building_type_id', $request->building_type_id)
        ->where('floor_type_id', $request->floor_type_id)
        ->where('structure_type', $request->structure_type)
        ->where('street_type_id', $request->street_type_id)
        ->where('license_type_id', $request->license_type_id)
        ->where('request_type_id', $request->request_type_id)
        ->where('id', '!=', $id) // تجاهل الصف الحالي عند التحديث
        ->exists();

    if ($exists) {
        return response()->json([
            'status' => 'error',
            'message' => 'هذا التركيب موجود مسبقًا في جدول الرسوم'
        ], 409); // 409 Conflict
    }

    // البيانات للتحديث
    $data = [
        'building_type_id'          => $request->building_type_id,
        'floor_type_id'             => $request->floor_type_id,
        'structure_type'            => $request->structure_type,
        'street_type_id'            => $request->street_type_id,
        'license_type_id'           => $request->license_type_id,
        'request_type_id'           => $request->request_type_id,
        'road_occupation_fee'       => $request->road_occupation_fee ?? 0,
        'license_fee'               => $request->license_fee ?? 0,
        'waste_removal_fee'         => $request->waste_removal_fee ?? 0,
        'development_disaster_fee'  => $request->development_disaster_fee ?? 0,
        'is_active'                 => $request->is_active ?? 1,
        'updated_at'                => now()
    ];

    DB::table('fee_structures')->where('id', $id)->update($data);

    return response()->json([
        'status' => 'success',
        'message' => 'تم التحديث بنجاح'
    ], 200);
}




public function delete($id)
{
    $fee = DB::table('fee_structures')->where('id', $id)->first();

    if ($fee) {
        DB::table('fee_structures')->where('id', $id)->delete();
        return response()->json(['data' => 1, 'message' => 'تم الحذف بنجاح'], 200, [], JSON_UNESCAPED_UNICODE);
    }

    return response()->json(['error' => 'السجل غير موجود'], 404, [], JSON_UNESCAPED_UNICODE);
}





}
