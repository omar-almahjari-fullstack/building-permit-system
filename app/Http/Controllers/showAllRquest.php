<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class showAllRquest extends Controller
{
       public function CitizenTableBody($id)
    {



        if (!$id) {
            return response()->json(['message' => 'رقم الطلب غير موجود'], 404);
        }

        $data = DB::table('beneficiaries')
            ->join('requests', 'requests.beneficiary_id', '=', 'beneficiaries.id')
            ->select(
                'beneficiaries.id',
                'beneficiaries.identity_number',
                'beneficiaries.name',
                'beneficiaries.mobile',
                'beneficiaries.email',
                'beneficiaries.identity_type',
                'beneficiaries.directorate_id',
                'beneficiaries.address'
            )
            ->where('requests.id', $id) // 🔑 هنا الشرط على رقم الطلب
            ->first();


        if (!$data) {
            return response()->json(['message' => 'المستفيد غير موجود'], 404);
        }



        return response()->json($data);
    }

       public function requests_Show($id)
    {
        if (!$id) {
            return response()->json(['message' => 'رقم الطلب غير موجود'], 404);
        }

        $data = DB::table('requests')->where('id', $id)
            ->first();


        if (!$data) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }



        return response()->json($data);
    }

       public function licenses_Show($id)
    {
        if (!$id) {
            return response()->json(['message' => 'رقم الطلب غير موجود'], 404);
        }

        $data = DB::table('licenses')->where('request_id', $id)
            ->first();


        if (!$data) {
            return response()->json(['message' => 'المستفيد غير موجود'], 404);
        }



        return response()->json($data);
    }

        public function show_BuildingComponent($id)
   {

     $id_license = DB::table('licenses')->select('id')->where('request_id',$id)->first();

      if (!$id_license) {
        return response()->json([
            'success' => false,
            'message' => 'لم يتم العثور على رخصة مرتبطة بهذا الطلب'
        ], 404, [], JSON_UNESCAPED_UNICODE);
      }
            $licenseId = $id_license->id;   // نستخرج الرقم

     // نجلب المكوّنات مع اسم الدور من جدول floor_types
      $datac = DB::table('building_components as bc')
        ->leftJoin('floor_types as ft', 'ft.id', '=', 'bc.floor_type_id')
        ->where('bc.license_id', $licenseId)
        ->select('bc.*', 'ft.name as floor_type_name') // غيّر اسم العمود إذا مختلف
        ->get();

         if (!$datac) {
            return response()->json(['message' => 'هاذا الطلب لايحتوي على مكونات البناء'], 404);
        }


    return view('modules.auth.requests.create.Build_components_table', compact('datac'));
   }

          public function show_locations($id)
    {
        if (!$id) {
            return response()->json(['message' => 'رقم الطلب غير موجود'], 404);
        }

        $data = DB::table('locations')->where('request_id', $id)
            ->first();


        if (!$data) {
            return response()->json(['message' => 'هاذا الطلب لايحتوي على location'], 404);
        }



        return response()->json($data);
    }

              public function show_land_plots($id)
    {
        if (!$id) {
            return response()->json(['message' => 'رقم الطلب غير موجود'], 404);
        }

        $data = DB::table('land_plots')->where('request_id', $id)
            ->first();


        if (!$data) {
            return response()->json(['message' => 'هاذا الطلب لايحتوي على بيانات قطعة الارض'], 404);
        }



        return response()->json($data);
    }

    public function showAttachments($request_id)
 {
    // نجلب أول سجل مرفقات خاص بالطلب
    $attachments = DB::table('attachments')->where('request_id', $request_id)->first();

    if (!$attachments) {
        return response()->json(['error' => 'لم يتم العثور على مرفقات لهذا الطلب'], 404, [], JSON_UNESCAPED_UNICODE);
    }

    // نحول المسارات إلى روابط URL حقيقية
    $attachments->structural_plan_url     = $attachments->structural_plan_path ? asset('storage/' . $attachments->structural_plan_path) : null;
    $attachments->architectural_plan_url  = $attachments->architectural_plan_path ? asset('storage/' . $attachments->architectural_plan_path) : null;
    $attachments->id_card_image_url       = $attachments->id_card_image_path ? asset('storage/' . $attachments->id_card_image_path) : null;
    $attachments->ownership_deed_url      = $attachments->ownership_deed_path ? asset('storage/' . $attachments->ownership_deed_path) : null;
    $attachments->soil_report_url         = $attachments->soil_report_path ? asset('storage/' . $attachments->soil_report_path) : null;
    $attachments->site_image_url          = $attachments->site_image_path ? asset('storage/' . $attachments->site_image_path) : null;
    $attachments->facade_image_url        = $attachments->facade_image_path ? asset('storage/' . $attachments->facade_image_path) : null;
    $attachments->other_attachments_url   = $attachments->other_attachments_path ? asset('storage/' . $attachments->other_attachments_path) : null;

    // نتأكد من UTF-8 للنصوص
    foreach ($attachments as $key => $value) {
        if (is_string($value)) {
            $attachments->$key = mb_convert_encoding($value, 'UTF-8', 'UTF-8');
        }
    }

    return response()->json($attachments, 200, [], JSON_UNESCAPED_UNICODE);
    }


      public function show_engineer_site_reports($id)
    {
        if (!$id) {
            return response()->json(['message' => 'رقم الطلب غير موجود'], 404);
        }

        $data = DB::table('engineer_site_reports')->where('request_id', $id)
            ->first();


        if (!$data) {
            return response()->json(['message' => 'هاذا الطلب لايحتوي على بيانات تقرير المهندس'], 404);
        }



        return response()->json($data);
    }


   public function show_chartsReport(Request $request)
  {
    // 📊 1. عدد الطلبات لكل شهر (آخر 6 شهور)
    $monthlyRequests = DB::table('requests')
        ->select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('total', 'month');

    // 📊 2. توزيع الطلبات حسب نوع الطلب
    $requestsByType = DB::table('requests')
        ->join('request_types', 'requests.request_type_id', '=', 'request_types.id')
        ->select('request_types.name as type', DB::raw('COUNT(requests.id) as total'))
        ->groupBy('request_types.name')
        ->pluck('total', 'type');

    // 📊 3. توزيع الطلبات حسب الحالة
    $requestsByStatus = DB::table('requests')
        ->join('request_statuses', 'requests.status_id', '=', 'request_statuses.id')
        ->select('request_statuses.name as status', DB::raw('COUNT(requests.id) as total'))
        ->groupBy('request_statuses.name')
        ->pluck('total', 'status');

    // 📊 4. توزيع الرخص حسب نوع الرخصة
    $licensesByType = DB::table('licenses')
        ->join('license_types', 'licenses.building_type_id', '=', 'license_types.id')
        ->select('license_types.name as license_type', DB::raw('COUNT(licenses.id) as total'))
        ->groupBy('license_types.name')
        ->pluck('total', 'license_type');

    // ✅ نرجع JSON جاهز للـ Charts
    return response()->json([
        'monthlyRequests' => $monthlyRequests,
        'requestsByType' => $requestsByType,
        'requestsByStatus' => $requestsByStatus,
        'licensesByType' => $licensesByType,
    ]);
}






//     public function show_boundaries($id)
//    {

//      $id_land_plots = DB::table('land_plots')->select('id')->where('request_id',$id)->first();

//       if (!$id_land_plots) {
//         return response()->json([
//             'success' => false,
//             'message' => 'لم يتم العثور على رخصة مرتبطة بهذا الطلب'
//         ], 404, [], JSON_UNESCAPED_UNICODE);
//       }
//             $landplotsId = $id_land_plots->id;   // نستخرج الرقم

//      // نجلب المكوّنات مع اسم الدور من جدول floor_types
//       $data_n = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'شمال')->first();

//       $data_e = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'شرق')->first();

//       $data_s = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'جنوب')->first();

//       $data_w = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'غرب')->first();

//       $data = [
//         'id'=>$data_n->id,
//         'plot_id'=> $landplotsId,
//         'deed_description_n'=> $data_n->deed_description,
//         'nature_description_n'=> $data_n->nature_description,
//         'deed_length_n'=> $data_n->deed_length,
//         'nature_length_n'=> $data_n->nature_length,
//         'direction_type_n'=> $data_n->direction_type,
//         'angle_n'=> $data_n->angle,
//         'setback_n'=> $data_n->setback,
//         'protrusion_n'=> $data_n->protrusion,
//         'parking_boundaries_n'=> $data_n->parking_boundaries,
//         'parking_lengths_n'=> $data_n->parking_lengths,
//         'street_number_n'=> $data_n->street_number,
//         'street_width_n'=> $data_n->street_width,
//         'street_type_id_n'=> $data_n->street_type_id,


//         'deed_description_e'=> $data_e->deed_description,
//         'nature_description_e'=> $data_e->nature_description,
//         'deed_length_e'=> $data_e->deed_length,
//         'nature_length_e'=> $data_e->nature_length,
//         'direction_type_e'=> $data_e->direction_type,
//         'angle_e'=> $data_e->angle,
//         'setback_e'=> $data_e->setback,
//         'protrusion_e'=> $data_e->protrusion,
//         'parking_boundaries_e'=> $data_e->parking_boundaries,
//         'parking_lengths_e'=> $data_e->parking_lengths,
//         'street_number_e'=> $data_e->street_number,
//         'street_width_e'=> $data_e->street_width,
//         'street_type_id_e'=> $data_e->street_type_id,


//         'deed_description_s'=> $data_s->deed_description,
//         'nature_description_s'=> $data_s->nature_description,
//         'deed_length_s'=> $data_s->deed_length,
//         'nature_length_s'=> $data_s->nature_length,
//         'direction_type_s'=> $data_s->direction_type,
//         'angle_s'=> $data_s->angle,
//         'setback_s'=> $data_s->setback,
//         'protrusion_s'=> $data_s->protrusion,
//         'parking_boundaries_s'=> $data_s->parking_boundaries,
//         'parking_lengths_s'=> $data_s->parking_lengths,
//         'street_number_s'=> $data_s->street_number,
//         'street_width_s'=> $data_s->street_width,
//         'street_type_id_s'=> $data_s->street_type_id,


//         'deed_description_w'=> $data_w->deed_description,
//         'nature_description_w'=> $data_w->nature_description,
//         'deed_length_w'=> $data_w->deed_length,
//         'nature_length_w'=> $data_w->nature_length,
//         'direction_type_w'=> $data_w->direction_type,
//         'angle_w'=> $data_w->angle,
//         'setback_w'=> $data_w->setback,
//         'protrusion_w'=> $data_w->protrusion,
//         'parking_boundaries_w'=> $data_w->parking_boundaries,
//         'parking_lengths_w'=> $data_w->parking_lengths,
//         'street_number_w'=> $data_w->street_number,
//         'street_width_w'=> $data_w->street_width,
//         'street_type_id_w'=> $data_w->street_type_id,

//       ];


//     return response()->json($data);
//    }


public function show_boundaries($id)
{
    $id_land_plots = DB::table('land_plots')->select('id')->where('request_id', $id)->first();

    if (!$id_land_plots) {
        return response()->json([
            'success' => false,
            'message' => 'لم يتم العثور على قطعة أرض مرتبطة بهذا الطلب'
        ], 404, [], JSON_UNESCAPED_UNICODE);
    }

    $landplotsId = $id_land_plots->id;

    // نجلب كل اتجاه مرة وحدة
    $data_n = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'شمال')->first();
    $data_e = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'شرق')->first();
    $data_s = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'جنوب')->first();
    $data_w = DB::table('boundaries')->where('plot_id', $landplotsId)->where('direction', 'غرب')->first();

    $data = [
        'plot_id'=> $landplotsId,

        // شمال
        'deed_description_n'=> $data_n->deed_description ?? null,
        'nature_description_n'=> $data_n->nature_description ?? null,
        'deed_length_n'=> $data_n->deed_length ?? null,
        'nature_length_n'=> $data_n->nature_length ?? null,
        'direction_type_n'=> $data_n->direction_type ?? null,
        'angle_n'=> $data_n->angle ?? null,
        'setback_n'=> $data_n->setback ?? null,
        'protrusion_n'=> $data_n->protrusion ?? null,
        'parking_boundaries_n'=> $data_n->parking_boundaries ?? null,
        'parking_lengths_n'=> $data_n->parking_lengths ?? null,
        'street_number_n'=> $data_n->street_number ?? null,
        'street_width_n'=> $data_n->street_width ?? null,
        'street_type_id_n'=> $data_n->street_type_id ?? null,

        // شرق
        'deed_description_e'=> $data_e->deed_description ?? null,
        'nature_description_e'=> $data_e->nature_description ?? null,
        'deed_length_e'=> $data_e->deed_length ?? null,
        'nature_length_e'=> $data_e->nature_length ?? null,
        'direction_type_e'=> $data_e->direction_type ?? null,
        'angle_e'=> $data_e->angle ?? null,
        'setback_e'=> $data_e->setback ?? null,
        'protrusion_e'=> $data_e->protrusion ?? null,
        'parking_boundaries_e'=> $data_e->parking_boundaries ?? null,
        'parking_lengths_e'=> $data_e->parking_lengths ?? null,
        'street_number_e'=> $data_e->street_number ?? null,
        'street_width_e'=> $data_e->street_width ?? null,
        'street_type_id_e'=> $data_e->street_type_id ?? null,

        // جنوب
        'deed_description_s'=> $data_s->deed_description ?? null,
        'nature_description_s'=> $data_s->nature_description ?? null,
        'deed_length_s'=> $data_s->deed_length ?? null,
        'nature_length_s'=> $data_s->nature_length ?? null,
        'direction_type_s'=> $data_s->direction_type ?? null,
        'angle_s'=> $data_s->angle ?? null,
        'setback_s'=> $data_s->setback ?? null,
        'protrusion_s'=> $data_s->protrusion ?? null,
        'parking_boundaries_s'=> $data_s->parking_boundaries ?? null,
        'parking_lengths_s'=> $data_s->parking_lengths ?? null,
        'street_number_s'=> $data_s->street_number ?? null,
        'street_width_s'=> $data_s->street_width ?? null,
        'street_type_id_s'=> $data_s->street_type_id ?? null,

        // غرب
        'deed_description_w'=> $data_w->deed_description ?? null,
        'nature_description_w'=> $data_w->nature_description ?? null,
        'deed_length_w'=> $data_w->deed_length ?? null,
        'nature_length_w'=> $data_w->nature_length ?? null,
        'direction_type_w'=> $data_w->direction_type ?? null,
        'angle_w'=> $data_w->angle ?? null,
        'setback_w'=> $data_w->setback ?? null,
        'protrusion_w'=> $data_w->protrusion ?? null,
        'parking_boundaries_w'=> $data_w->parking_boundaries ?? null,
        'parking_lengths_w'=> $data_w->parking_lengths ?? null,
        'street_number_w'=> $data_w->street_number ?? null,
        'street_width_w'=> $data_w->street_width ?? null,
        'street_type_id_w'=> $data_w->street_type_id ?? null,
    ];

    if (!$data) {
            return response()->json(['message' => 'هاذا الطلب لايحتوي على بيانات حدود قطعة الارض'], 404);
        }

    return response()->json($data);
}

}
