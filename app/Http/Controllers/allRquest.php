<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class allRquest extends Controller
{
    private $beneficiary_id; // متغير عام داخل الكلاس

    // جلب بيانات المستفيد
    public function CitizenTableBody($id)
    {
        $data = DB::table('beneficiaries')
            ->select(
                'id',
                'identity_number',
                'name',
                'mobile',
                'email',
                'identity_type',
                'directorate_id',
                'address'
            )->where('id', $id)->first();

        if (!$data) {
            return response()->json(['message' => 'المستفيد غير موجود'], 404);
        }

        // حفظ معرف المستفيد في المتغير العام
        $this->beneficiary_id = $data->id;

        return response()->json($data);
    }

//     // إنشاء طلب جديد
//    public function store(Request $request)
//    {
//      if ($request->isMethod('post')) {

//         // استخدام معرف المستفيد من الفورم أو المتغير العام داخل الكلاس
//         $beneficiaryId = $request->id ?? $this->beneficiary_id;

//         if (!$beneficiaryId) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'المستفيد غير محدد'
//             ], 400, [], JSON_UNESCAPED_UNICODE);
//         }



//         // توليد رقم طلب فريد
//         $requestNumber = 'RQ' . time() . rand(100, 999);

//         // إدخال البيانات في جدول requests
//         $requestId = DB::table('requests')->insertGetId([
//             'request_number' => $requestNumber,
//             'beneficiary_id' => $beneficiaryId,
//             'request_type_id' => $request->request_type_id,
//             'license_type_id' => $request->license_type_id,
//             'department_id' => $request->department_id,
//             'directorate_id' => $request->directorate_id,
//             'status_id' => $request->status_id,
//             'current_stage_id' => $request->current_stage_id,
//             'is_active' => 1,
//             'assigned_to' => $request->assigned_to ?? null,
//             'expected_completion_date' => $request->expected_completion_date ?? null,
//             'created_at' => now()
//         ]);

//         // إرجاع الاستجابة مباشرة بعد إدخال الصف
//         return response()->json([
//             'success' => true,
//             'request_id' => $requestId,       // معرف الصف الجديد
//             'request_number' => $requestNumber // رقم الطلب الذي تم توليده
//         ], 200, [], JSON_UNESCAPED_UNICODE);
//       }

//        return response()->json([
//            'success' => false,
//            'message' => 'طريقة الطلب غير صحيحة'
//        ], 405, [], JSON_UNESCAPED_UNICODE);
//    }

// إنشاء طلب جديد
public function store(Request $request)
{
    if ($request->isMethod('post')) {

        // استخدام معرف المستفيد من الفورم أو المتغير العام داخل الكلاس
        $beneficiaryId = $request->id ;

        if (!$beneficiaryId) {
            return response()->json([
                'success' => false,
                'message' => 'المستفيد غير محدد'
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }

        DB::beginTransaction();
        try {
            // توليد رقم طلب فريد
            $requestNumber = 'RQ' . time() . rand(100, 999);

            // إدخال البيانات في جدول requests
            $requestId = DB::table('requests')->insertGetId([
                'request_number' => $requestNumber,
                'beneficiary_id' => $beneficiaryId,
                'request_type_id' => $request->request_type_id,
                'license_type_id' => $request->license_type_id,
                'department_id' => $request->department_id,
                'directorate_id' => $request->directorate_id,
                'status_id' => $request->status_id ?? 1,         // الحالة الافتراضية "جديد"
                'current_stage_id' => $request->current_stage_id ?? 1, // المرحلة الأولى
                'is_active' => 1,
                'assigned_to' => $request->assigned_to ?? auth()->id(),
                'expected_completion_date' => $request->expected_completion_date ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $requestId,
                'stage_id'     => $request->current_stage_id ?? 1,
                'status_id'    => $request->status_id ?? 1,
                'assigned_to'  => $request->assigned_to ?? auth()->id(),
                'comments'     => 'تم تقديم الطلب ',
                'duration_days'=> 2,
                'started_at'   => now(),
                'is_active'    => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            DB::commit();

            // إرجاع الاستجابة
            return response()->json([
                'success' => true,
                'request_id' => $requestId,
                'request_number' => $requestNumber
            ], 200, [], JSON_UNESCAPED_UNICODE);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'خطأ أثناء إنشاء الطلب: ' . $e->getMessage()
            ], 500, [], JSON_UNESCAPED_UNICODE);
        }
    }

    return response()->json([
        'success' => false,
        'message' => 'طريقة الطلب غير صحيحة'
    ], 405, [], JSON_UNESCAPED_UNICODE);
}

// ارسال الطلب  للمراجعةالاولية
public function requests_submit($id)
{

    $requestId = $id;

        DB::beginTransaction();

            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $requestId,
                'stage_id'     =>  2,
                'status_id'    => 2,
                'assigned_to'  => $request->assigned_to ?? auth()->id(),
                'comments'     => '   مراجعة الطلب مبدئيًا من قبل قسم الاستقبال ',
                'duration_days'=> 2,
                'started_at'   => now(),
                'is_active'    => 0,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

             DB::table('requests')->where('id', $requestId)->update([
            'status_id' => 2 ,// طلبات معادة
            'current_stage_id' => 2 ,//  المراجعه الاولية
             ]);

            DB::commit();

             return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);
}

// ارسال الطلب بعد التقرير للمراجعه الفنيه
public function requests_submit_Report($id)
{
    try {
        DB::beginTransaction();

        DB::table('request_workflows')
            ->where('request_id', $id)
            ->where('stage_id', 5)
            ->where('status_id', 6)
            ->update([
                'is_active' => 1
            ]);

        DB::table('request_workflows')->insert([
            'request_id'   => $id,
            'stage_id'     => 3,
            'status_id'    => 3,
            'assigned_to'  => auth()->id(),
            'comments'     => 'مراجعة الفنية لطلب من قبل قسم الفني',
            'duration_days'=> 2,
            'started_at'   => now(),
            'is_active'    => 0,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('requests')->where('id', $id)->update([
            'status_id' => 3,
            'current_stage_id' => 3,
        ]);

        DB::commit();

        return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'error' => $e->getMessage(),
        ], 500, [], JSON_UNESCAPED_UNICODE);
    }
}




   public function store_license(Request $request)
   {
     if ($request->isMethod('post')) {


        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }




        // توليد رقم رخصة فريد
           $licenseNumber = 'LC' . time() . rand(100, 999);

        // إدخال البيانات في جدول requests
       $licenseId = DB::table('licenses')->insertGetId([
            'request_id'        => $requestId, // اللي أخذته من insertGetId في requests
            'building_type_id'  => $request->building_type_id,
            'license_number'    => $licenseNumber, // لازم تولد رقم الترخيص زي request_number
            'facade_type'       => $request->facade_type, // خرسانة / طوبيه / زجاجية
            'main_usage'        => $request->main_usage,
            'sub_usage'         => $request->sub_usage ?? null,
            'issuing_authority' => $request->issuing_authority,
            'total_buildings'   => $request->total_buildings ?? 1,
            'description'       => $request->description ?? null,
            'issue_date'        => $request->issue_date ?? null,
            'expiry_date'       => $request->expiry_date ?? null,
            'is_active'         => 1,
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);



         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function store_locations(Request $request)
   {
     if ($request->isMethod('post')) {


        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


        // إدخال البيانات في جدول requests
      DB::table('locations')->insert([
           'request_id'        => $request->request_id,      // من الفورم أو من سياق الطلب
           'latitude'          => $request->latitude,        // id="latitude" name="latitude"
           'longitude'         => $request->longitude,       // id="longitude" name="longitude"
           'municipality'      => $request->municipality,    // id="municipality" name="municipality"
           'neighborhood_unit' => $request->neighborhood_unit, // id="neighborhoodUnit" name="neighborhood_unit"
           'district'          => $request->district,        // id="district" name="district"
           'street'            => $request->street, // id="issuingAuthority" name="street"
           'plan_number'       => $request->plan_number,     // id="planNumber" name="plan_number"
           'block_number'      => $request->block_number,    // id="blockNumber" name="block_number"
           'created_at'        => now(),
           'updated_at'        => now(),
       ]);




         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function store_land_plots(Request $request)
   {
     if ($request->isMethod('post')) {


        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


        // إدخال البيانات في جدول requests
     $requestId = DB::table('land_plots')->insertGetId([
                'request_id' => $request->request_id,
                'plot_number' => $request->plot_number,                   // رقم قطعة الأرض
                'area' => $request->area,                                 // مساحة الأرض
                'building_system' => $request->building_system,           // نظام البناء
                'building_percentage' => $request->building_percentage,   // نسبة البناء
                'max_height' => $request->max_height,                     // أقصى ارتفاع
                'street_type_id' => $request->street_type_id ?? 1,        // يمكن تعيين 0 مؤقتًا أو null
                'street_type' => 'زفلت',           // ترابي أو زفلت //////////////////////////////////////////////////////////مش لازم مش لازم
                'street_width' => $request->street_width ?? null,         // عرض الشارع
                'street_number' => $request->street_number ?? null,       // رقم الشارع
                'parking_type' => $request->parking_type ?? null,         // نوع الموقف
                'parking_area' => $request->parking_area ?? null,         // مساحة الموقف
                'excavation_depth' => $request->excavation_depth ?? null, // عمق الحفر
                'soil_density' => $request->soil_density ?? null,         // كثافة التربة
                'structure_type' => $request->structure_type ?? null,     // نوع الهيكل
                'created_at' => now(),
                'updated_at' => now(),
            ]);




        // إرجاع الاستجابة مباشرة بعد إدخال الصف
        return response()->json([
            'success' => true,
            'id' => $requestId      // معرف الصف الجديد
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function store_boundaries(Request $request)
   {
     if ($request->isMethod('post')) {


        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


       $directions = ['n' => 'شمال', 'e' => 'شرق', 's' => 'جنوب', 'w' => 'غرب'];

    foreach ($directions as $key => $label) {
        DB::table('boundaries')->insert([
            'plot_id' => $request->plot_id,
            'direction' => $label,
            'deed_description' => $request->{"deed_description_$key"},
            'nature_description' => $request->{"nature_description_$key"},
            'deed_length' => $request->{"deed_length_$key"},
            'nature_length' => $request->{"nature_length_$key"},
            'direction_type' => $request->{"direction_type_$key"},
            'angle' => $request->{"angle_$key"},
            'setback' => $request->{"setback_$key"},
            'protrusion' => $request->{"protrusion_$key"},
            'parking_boundaries' => $request->{"parking_boundaries_$key"},
            'parking_lengths' => $request->{"parking_lengths_$key"},
            'street_number' => $request->{"street_number_$key"},
            'street_width' => $request->{"street_width_$key"},
            'street_type_id' => $request->{"street_type_id_$key"},
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }




         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

public function store_attachments(Request $request)
{
    // التحقق من وجود رقم الطلب
    $requestId = $request->request_id;
    if (!$requestId) {
        return response()->json([
            'success' => false,
            'message' => 'رقم الطلب غير موجود'
        ], 400, [], JSON_UNESCAPED_UNICODE);
    }

    // التحقق من صحة الملفات
    $request->validate([
        'structural_plan_path'   => 'nullable|file|mimes:pdf',
        'architectural_plan_path'=> 'nullable|file|mimes:pdf',
        'id_card_image_path'     => 'nullable|file|mimes:pdf',
        'ownership_deed_path'    => 'nullable|file|mimes:pdf',
        'soil_report_path'       => 'nullable|file|mimes:pdf',
        'site_image_path'        => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,tif,tiff,pdf',
        'facade_image_path'      => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,tif,tiff,pdf',
        'other_attachments_path' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,tif,tiff,pdf',
    ]);

    // مجلد التخزين
    $storagePath = storage_path('app/public/attachments');
    if (!file_exists($storagePath)) {
        mkdir($storagePath, 0777, true);
    }

    // مصفوفة لتخزين البيانات المراد حفظها في قاعدة البيانات
    $data = [
        'request_id' => $requestId,
        'uploaded_by' => auth()->id() ?? 2,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    // التعامل مع كل ملف على حدة
    if ($request->hasFile('structural_plan_path')) {
        $file = $request->file('structural_plan_path');
        $filename = 'structural_plan_' . time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
        $file->move($storagePath, $filename);
        $data['structural_plan_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('architectural_plan_path')) {
        $file = $request->file('architectural_plan_path');
        $filename = 'architectural_plan_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['architectural_plan_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('id_card_image_path')) {
        $file = $request->file('id_card_image_path');
        $filename = 'id_card_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['id_card_image_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('ownership_deed_path')) {
        $file = $request->file('ownership_deed_path');
        $filename = 'ownership_deed_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['ownership_deed_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('soil_report_path')) {
        $file = $request->file('soil_report_path');
        $filename = 'soil_report_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['soil_report_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('site_image_path')) {
        $file = $request->file('site_image_path');
        $filename = 'site_image_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['site_image_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('facade_image_path')) {
        $file = $request->file('facade_image_path');
        $filename = 'facade_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['facade_image_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('other_attachments_path')) {
        $file = $request->file('other_attachments_path');
        $filename = 'other_attachment_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['other_attachments_path'] = 'attachments/' . $filename;
    }

    // إدراج البيانات في جدول attachments
    $attachmentId = DB::table('attachments')->insertGetId($data);

    return response()->json([
        'success' => true,
        'message' => 'تم رفع الملفات وتخزينها بنجاح',
        'id' => $attachmentId
    ], 200, [], JSON_UNESCAPED_UNICODE);
}

    public function store_engineer_site_reports(Request $request)
   {
     if ($request->isMethod('post')) {


        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


       // إدراج البيانات في الجدول
    DB::table('engineer_site_reports')->insert([
        'request_id' => $request->request_id,
        'engineer_id' => $request->engineer_id  ?? auth()->id(),
        'inspection_date' => $request->inspection_date ?? now(),
        'report_text' => $request->report_text,
        'condition' => $request->condition,
        'recommendation' => $request->recommendation,
        // 'created_at' => now(),
        // 'updated_at' => now(),
    ]);



         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function store_Building_Component(Request $request)
   {
      if ($request->isMethod('post')) {

                $request->validate([
            'building_percentage' => ['required', 'numeric']
        ], [
                    'building_percentage.required' => 'اكتب نسبة البناء بشكل عشري 0.2',
            'building_percentage.numeric'  => 'نسبة البناء يجب أن تكون رقم عشري'
        ]);



        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }

           if (!is_numeric($request->building_percentage) || $request->building_percentage <= 0 || $request->building_percentage > 1) {
               return response()->json([
                   'success' => false,
                   'message' => 'اكتب نسبة البناء بشكل عشري بين 0 و 1 (مثال: 0.2)'
               ], 400, [], JSON_UNESCAPED_UNICODE);
            }




           $id_license = DB::table('licenses')->select('id')->where('request_id',$requestId)->first();
            $licenseId = $id_license->id;   // نستخرج الرقم

        $id = DB::table('building_components')->insertGetId([
            'license_id'         => $licenseId,
            'floor_type_id'      => $request->floor_type_id,
            'area'               => $request->area,
            'floors_count'       => $request->floors_count,
            'units_count'        => $request->units_count,
            'usage_type'         => $request->usage_type,
            'building_percentage'=> $request->building_percentage,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);





         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function getBuildingComponent($request_id)
   {

     $id_license = DB::table('licenses')->select('id')->where('request_id',$request_id)->first();

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


    return view('modules.auth.requests.create.Build_components_table', compact('datac'));
   }


   public function show_BuildingComponent($id)
  {
    $show = DB::table('building_components')->where('id', $id)->first();
    if (!$show) {
        return response()->json(['error' => 'building_components not found'], 404);
    }


    return response()->json($show);
  }

   public function update_Building_Component(Request $request)
   {
      if ($request->isMethod('post')) {

                $request->validate([
            'building_percentage' => ['required', 'numeric']
        ], [
                    'building_percentage.required' => 'اكتب نسبة البناء بشكل عشري 0.2',
            'building_percentage.numeric'  => 'نسبة البناء يجب أن تكون رقم عشري'
        ]);



        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }

           if (!is_numeric($request->building_percentage) || $request->building_percentage <= 0 || $request->building_percentage > 1) {
               return response()->json([
                   'success' => false,
                   'message' => 'اكتب نسبة البناء بشكل عشري بين 0 و 1 (مثال: 0.2)'
               ], 400, [], JSON_UNESCAPED_UNICODE);
            }




           $id_license = DB::table('licenses')->select('id')->where('request_id',$requestId)->first();
            $licenseId = $id_license->id;   // نستخرج الرقم

        $id = DB::table('building_components')->where('id', $request->id)->update([
            'license_id'         => $licenseId,
            'floor_type_id'      => $request->floor_type_id,
            'area'               => $request->area,
            'floors_count'       => $request->floors_count,
            'units_count'        => $request->units_count,
            'usage_type'         => $request->usage_type,
            'building_percentage'=> $request->building_percentage,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);





         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }


   public function update_Building_Component_show($id,Request $request)
   {
      if ($request->isMethod('post')) {

                $request->validate([
            'building_percentage' => ['required', 'numeric']
        ], [
                    'building_percentage.required' => 'اكتب نسبة البناء بشكل عشري 0.2',
            'building_percentage.numeric'  => 'نسبة البناء يجب أن تكون رقم عشري'
        ]);




           if (!is_numeric($request->building_percentage) || $request->building_percentage <= 0 || $request->building_percentage > 1) {
               return response()->json([
                   'success' => false,
                   'message' => 'اكتب نسبة البناء بشكل عشري بين 0 و 1 (مثال: 0.2)'
               ], 400, [], JSON_UNESCAPED_UNICODE);
            }


        $id = DB::table('building_components')->where('id', $id)->update([
            'floor_type_id'      => $request->floor_type_id,
            'area'               => $request->area,
            'floors_count'       => $request->floors_count,
            'units_count'        => $request->units_count,
            'usage_type'         => $request->usage_type,
            'building_percentage'=> $request->building_percentage,
            'updated_at'         => now(),
        ]);





         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }


  public function delete_BuildingComponent($id)
{


         DB::table('building_components')->where('id', $id)->delete();


    return response()->json(['data' => 1, 'message' => 'تم الحذف بنجاح']);
}


/////////////////////تعديل/////////////////////////////
   public function update_requests(Request $request)
   {
     if ($request->isMethod('post')) {

        // استخدام معرف المستفيد من الفورم أو المتغير العام داخل الكلاس
        $beneficiaryId = $this->beneficiary_id;

        if (!$beneficiaryId) {
            return response()->json([
                'success' => false,
                'message' => 'المستفيد غير محدد'
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }



        // توليد رقم طلب فريد
        $requestNumber = 'RQ' . time() . rand(100, 999);

        // إدخال البيانات في جدول requests
        $requestId = DB::table('requests')->insertGetId([
            'request_number' => $requestNumber,
            'beneficiary_id' => $beneficiaryId,
            'request_type_id' => $request->request_type_id,
            'license_type_id' => $request->license_type_id,
            'department_id' => $request->department_id,
            'directorate_id' => $request->directorate_id,
            'status_id' => $request->status_id,
            'current_stage_id' => $request->current_stage_id,
            'is_active' => 1,
            'assigned_to' => $request->assigned_to ?? null,
            'expected_completion_date' => $request->expected_completion_date ?? null,
            'created_at' => now()
        ]);

        // إرجاع الاستجابة مباشرة بعد إدخال الصف
        return response()->json([
            'success' => true,
            'request_id' => $requestId,       // معرف الصف الجديد
            'request_number' => $requestNumber // رقم الطلب الذي تم توليده
        ], 200, [], JSON_UNESCAPED_UNICODE);
      }

       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }


   public function update_license($id ,Request $request)
   {
     if ($request->isMethod('post')) {



        if (!$request->request_id) {
            return response()->json([
                'success' => false,
                'message' => 'رقم الطلب غير محدد'
            ], 400, [], JSON_UNESCAPED_UNICODE);
        }



        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


        // إدخال البيانات في جدول requests
       $licenseId = DB::table('licenses')->where('id',$id)->update([
            'request_id'        => $requestId, // اللي أخذته من insertGetId في requests
            'building_type_id'  => $request->building_type_id,
            'facade_type'       => $request->facade_type, // خرسانة / طوبيه / زجاجية
            'main_usage'        => $request->main_usage,
            'sub_usage'         => $request->sub_usage ?? null,
            'issuing_authority' => $request->issuing_authority,
            'total_buildings'   => $request->total_buildings ?? 1,
            'description'       => $request->description ?? null,
            'issue_date'        => $request->issue_date ?? null,
            'expiry_date'       => $request->expiry_date ?? null,
            'is_active'         => 1,
            'updated_at'        => now(),
        ]);



         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function update_locations($id,Request $request)
   {
     if ($request->isMethod('post')) {


        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


      DB::table('locations')->where('id',$id)->update([
           'latitude'          => $request->latitude,        // id="latitude" name="latitude"
           'longitude'         => $request->longitude,       // id="longitude" name="longitude"
           'municipality'      => $request->municipality,    // id="municipality" name="municipality"
           'neighborhood_unit' => $request->neighborhood_unit, // id="neighborhoodUnit" name="neighborhood_unit"
           'district'          => $request->district,        // id="district" name="district"
           'street'            => $request->street, // id="issuingAuthority" name="street"
           'plan_number'       => $request->plan_number,     // id="planNumber" name="plan_number"
           'block_number'      => $request->block_number,    // id="blockNumber" name="block_number"
           'updated_at'        => now(),
       ]);




         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function update_land_plots($id,Request $request)
   {
     if ($request->isMethod('post')) {


        $requestId = $request->request_id;

         if (!$requestId) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم الطلب غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


        // إدخال البيانات في جدول requests
     $requestId = DB::table('land_plots')->where('id',$id)->update([
                'plot_number' => $request->plot_number,                   // رقم قطعة الأرض
                'area' => $request->area,                                 // مساحة الأرض
                'building_system' => $request->building_system,           // نظام البناء
                'building_percentage' => $request->building_percentage,   // نسبة البناء
                'max_height' => $request->max_height,                     // أقصى ارتفاع
                'parking_type' => $request->parking_type ?? null,         // نوع الموقف
                'parking_area' => $request->parking_area ?? null,         // مساحة الموقف
                'excavation_depth' => $request->excavation_depth ?? null, // عمق الحفر
                'soil_density' => $request->soil_density ?? null,         // كثافة التربة
                'structure_type' => $request->structure_type ?? null,     // نوع الهيكل
                'updated_at' => now(),
            ]);




        // إرجاع الاستجابة مباشرة بعد إدخال الصف
        return response()->json([
            'success' => true,
            'id' => $requestId      // معرف الصف الجديد
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

    public function update_boundaries($plot_id,Request $request)
   {
     if ($request->isMethod('post')) {


         if (!$plot_id) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم قطعة الارض غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


       $directions = ['n' => 'شمال', 'e' => 'شرق', 's' => 'جنوب', 'w' => 'غرب'];

      ////////////////////////////اذا الاتجه موجود عدل عليه اذا مش موجود اضافه//////////////////////
        foreach ($directions as $key => $label) {
        DB::table('boundaries')->updateOrInsert(
        [
            'plot_id'   => $plot_id,
            'direction' => $label,
        ],
        [
            'deed_description'   => $request->{"deed_description_$key"},
            'nature_description' => $request->{"nature_description_$key"},
            'deed_length'        => $request->{"deed_length_$key"},
            'nature_length'      => $request->{"nature_length_$key"},
            'direction_type'     => $request->{"direction_type_$key"},
            'angle'              => $request->{"angle_$key"},
            'setback'            => $request->{"setback_$key"},
            'protrusion'         => $request->{"protrusion_$key"},
            'parking_boundaries' => $request->{"parking_boundaries_$key"},
            'parking_lengths'    => $request->{"parking_lengths_$key"},
            'street_number'      => $request->{"street_number_$key"},
            'street_width'       => $request->{"street_width_$key"},
            'street_type_id'     => $request->{"street_type_id_$key"},
            'updated_at'         => now(),
        ]
           );
        }





         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

       }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }

   public function update_attachments(Request $request)
   {
    // التحقق من وجود رقم الطلب
    $requestId = $request->request_id;
    if (!$requestId) {
        return response()->json([
            'success' => false,
            'message' => 'رقم الطلب غير موجود'
        ], 400, [], JSON_UNESCAPED_UNICODE);
    }

    // التحقق من صحة الملفات
    $request->validate([
        'structural_plan_path'   => 'nullable|file|mimes:pdf',
        'architectural_plan_path'=> 'nullable|file|mimes:pdf',
        'id_card_image_path'     => 'nullable|file|mimes:pdf',
        'ownership_deed_path'    => 'nullable|file|mimes:pdf',
        'soil_report_path'       => 'nullable|file|mimes:pdf',
        'site_image_path'        => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,tif,tiff,pdf',
        'facade_image_path'      => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,tif,tiff,pdf',
        'other_attachments_path' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,tif,tiff,pdf',
    ]);

    // مجلد التخزين
    $storagePath = storage_path('app/public/attachments');
    if (!file_exists($storagePath)) {
        mkdir($storagePath, 0777, true);
    }

    // مصفوفة لتخزين البيانات المراد حفظها في قاعدة البيانات
    $data = [
        'request_id' => $requestId,
        'uploaded_by' => auth()->id() ?? 2,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    // التعامل مع كل ملف على حدة
    if ($request->hasFile('structural_plan_path')) {
        $file = $request->file('structural_plan_path');
        $filename = 'structural_plan_' . time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
        $file->move($storagePath, $filename);
        $data['structural_plan_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('architectural_plan_path')) {
        $file = $request->file('architectural_plan_path');
        $filename = 'architectural_plan_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['architectural_plan_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('id_card_image_path')) {
        $file = $request->file('id_card_image_path');
        $filename = 'id_card_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['id_card_image_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('ownership_deed_path')) {
        $file = $request->file('ownership_deed_path');
        $filename = 'ownership_deed_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['ownership_deed_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('soil_report_path')) {
        $file = $request->file('soil_report_path');
        $filename = 'soil_report_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['soil_report_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('site_image_path')) {
        $file = $request->file('site_image_path');
        $filename = 'site_image_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['site_image_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('facade_image_path')) {
        $file = $request->file('facade_image_path');
        $filename = 'facade_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['facade_image_path'] = 'attachments/' . $filename;
    }

    if ($request->hasFile('other_attachments_path')) {
        $file = $request->file('other_attachments_path');
        $filename = 'other_attachment_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($storagePath, $filename);
        $data['other_attachments_path'] = 'attachments/' . $filename;
    }

    // إدراج البيانات في جدول attachments
    $attachmentId = DB::table('attachments')->insertGetId($data);

    return response()->json([
        'success' => true,
        'message' => 'تم رفع الملفات وتخزينها بنجاح',
        'id' => $attachmentId
    ], 200, [], JSON_UNESCAPED_UNICODE);
   }

    public function update_engineer_site_reports($id,Request $request)
   {
     if ($request->isMethod('post')) {


         if (!$id) {
             return response()->json([
                 'success' => false,
                 'message' => 'رقم التقرير غير موجود'
             ], 400, [], JSON_UNESCAPED_UNICODE);
         }


       // إدراج البيانات في الجدول
    DB::table('engineer_site_reports')->where('id',$id)->update([
        'engineer_id' => $request->engineer_id,
        'inspection_date' => $request->inspection_date,
        'report_text' => $request->report_text,
        'condition' => $request->condition,
        'recommendation' => $request->recommendation,
    ]);




         return response()->json([
            'data' => 1,
        ], 200, [], JSON_UNESCAPED_UNICODE);

     }
       return response()->json([
           'success' => false,
           'message' => 'طريقة الطلب غير صحيحة'
       ], 405, [], JSON_UNESCAPED_UNICODE);
   }






        //  public function fee_structures_sum($id){




        //         // 1️⃣ الاستعلام الأساسي (معلومات الطلب والرخصة والأرض)
        //         $request = DB::table('requests')
        //             ->join('licenses', 'requests.id', '=', 'licenses.request_id')
        //             ->join('land_plots', 'requests.id', '=', 'land_plots.request_id')
        //             ->where('requests.id', 1) // رقم الطلب
        //             ->select(
        //                 'requests.id as request_id',
        //                 'requests.request_type_id',
        //                 'requests.license_type_id',
        //                 'licenses.id as license_id',
        //                 'licenses.building_type_id',
        //                 'land_plots.id as plot_id',
        //                 'land_plots.area',
        //                 'land_plots.structure_type',
        //                 'land_plots.building_percentage'
        //             )
        //             ->first();

        //         // 2️⃣ استعلام الحدود (boundaries) حسب رقم القطعة
        //         $boundaries = DB::table('boundaries')
        //             ->where('plot_id', $request->plot_id)
        //             ->select(
        //                 'direction_type',
        //                 'street_type_id',
        //                 'street_width',
        //                 'deed_length',
        //                 'nature_length'
        //             )
        //             ->get();

        //         // 3️⃣ استعلام مكونات البناء (building_components) حسب رقم الرخصة
        //         $components = DB::table('building_components')
        //             ->where('license_id', $request->license_id)
        //             ->select(
        //                 'floor_type_id',
        //                 'area as component_area',
        //                 'floors_count'
        //             )
        //             ->get();

        //         // 4️⃣ نجمع كل البيانات في مصفوفة واحدة (للإرجاع في API أو للعرض)
        //         $data = [
        //             'request'     => $request,
        //             'boundaries'  => $boundaries,
        //             'components'  => $components,
        //         ];





        //         $requestTypeId = 1;
        //         $buildingTypeId = 1;
        //         $floorTypeId = 2;
        //         $streetTypeId = 1;
        //         $licenseTypeId = 1;
        //         $structureType = 'حجر مسلح';



        //         $recordfee = DB::table('fee_structures as fs')
        //             ->leftJoin('building_types as bt', 'fs.building_type_id', '=', 'bt.id')
        //             ->leftJoin('floor_types as ft', 'fs.floor_type_id', '=', 'ft.id')
        //             ->leftJoin('street_types as st', 'fs.street_type_id', '=', 'st.id')
        //             ->leftJoin('license_types as lt', 'fs.license_type_id', '=', 'lt.id')
        //             ->leftJoin('request_types as rt', 'fs.request_type_id', '=', 'rt.id')
        //             ->select(
        //                 'fs.*',
        //                 'bt.name as building_type_name',
        //                 'ft.name as floor_type_name',
        //                 'st.name as street_type_name',
        //                 'lt.name as license_type_name',
        //                 'rt.name as request_type_name'
        //             )
        //             ->where('fs.request_type_id',  $requestTypeId)
        //             ->where('fs.building_type_id', $buildingTypeId)
        //             ->where('fs.floor_type_id',    $floorTypeId)
        //             ->where('fs.street_type_id',   $streetTypeId)
        //             ->where('fs.license_type_id',  $licenseTypeId)
        //             ->when(!empty($structureType), function ($q) use ($structureType) {
        //                 $q->where('fs.structure_type', $structureType);
        //             })
        //             ->where('fs.is_active', 1)
        //             ->first();



        //                 $building_type_name = $recordfee->building_type_name;
        //                 $floor_type_name = $recordfee->floor_type_name;
        //                 $street_type_name = $recordfee->street_type_name;
        //                 $license_type_name = $recordfee->license_type_name;
        //                 $request_type_name = $recordfee->request_type_name;
        //                 $structure_type = $recordfee->structure_type;


        //     //////////////////////////////////  رسوم اشغال الطرق /////////

        //         // مثال

        //         // واجهة المبنى (متر)
        //         $building_front = 12; // مثال: 12 متر

        //         // عرض الشارع (متر)
        //         $street_width = 8; // مثال: 8 متر

        //         // مساحة البصيرة (متر مربع)
        //         $basira_area = 200; // مثال: 200 متر مربع

        //         // مساحة البناء (متر مربع)
        //         $building_area = 180; // مثال: 180 متر مربع

        //         // المساحة الإجمالية (متر مربع) للفورم أو الحساب
        //         $area = 220; // مثال: 220 متر مربع

        //         // ارتفاع الهنجر (متر)
        //         $hanger_height = 6.6; // مثال: 6 متر


        //     //  $building_front = $request->building_front; // واجهة المبنى من الفورم
        //     //  $street_width   = $request->street_width;   // عرض الشارع من الفورم
        //     //  $basira_area = $request->basira_area;  // مساحة البصيرة  الهنجر
        //     //  $building_area = $request->building_area;  // مساحة البناء
        //     //  $area = $request->area;  // المساحة
        //     //  $hanger_height = $request->hanger_height;// ارتفاع الهنجر



        //             // جلب الرسوم من fee_structures
        //         $fee_road_occupation = $recordfee->road_occupation_fee; //  رسوم شغل الطريق
        //         $fee_license = $recordfee->license_fee;        // رسوم ترخيص البناء
        //         $fee_waste_removal = $recordfee->waste_removal_fee; // رسوم ازاله مخلفات البناء
        //         $fee_development_disaster = $recordfee->development_disaster_fee; // رسوم تنمية وكوارث




        //     if($building_type_name === 'هنجر'){
        //         $waste_removal_fee = $area * $hanger_height * 5 /100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }

        //     if($floor_type_name === 'بدروم'){
        //         $waste_removal_fee = $building_area * 3 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }

        //     if($floor_type_name === 'دور أول' && $structure_type === 'حجر مسلح' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3.5 * 15 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif($floor_type_name === 'دور أول' && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3.5 * 12 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif($floor_type_name === 'دور أول' && $structure_type === 'بلك مسلح' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3.5 * 10 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif($floor_type_name === 'دور أول' && $structure_type === 'بلك شعبي' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3.5 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }

        //     if($floor_type_name === 'دور متكرر' && $structure_type === 'حجر مسلح' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3 * 8 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3 * 6 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'بلك مسلح' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'بلك شعبي' && $request_type_name === 'جديد'){
        //         $waste_removal_fee = $building_area * 3 * 3 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }

        //     if(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'حجر مسلح' && $request_type_name === 'تجديد رخصة'){
        //         $waste_removal_fee = $building_area * 3 * 8 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'تجديد رخصة'){
        //         $waste_removal_fee = $building_area * 3 * 6 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'بلك مسلح' && $request_type_name === 'تجديد رخصة'){
        //         $waste_removal_fee = $building_area * 3 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'بلك شعبي' && $request_type_name === 'تجديد رخصة'){
        //         $waste_removal_fee = $building_area * 3 * 3 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //     }


        //     ///////////////////////////// رسوم الاشغال الطرق

        //         if (($floor_type_name === 'دور أول' || $floor_type_name === 'بدروم') && $request_type_name === 'جديد') {
        //             $road_occupation_fee = $building_front * $street_width * $fee_road_occupation; // رسوم شغل الطريق
        //         }

        //         if ($floor_type_name === 'دور متكرر' && $request_type_name === 'جديد') {
        //             $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2; // 20%
        //         }

        //         if (($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول' || $floor_type_name === 'بدروم') && $request_type_name === 'تجديد رخصة') {
        //             $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2; // 20%
        //         }

        //         /////////////////////////    رسوم ترخيص البناء
        //         if($request_type_name === 'جديد'){
        //             $license_fee = $basira_area * $fee_license; // رسوم ترخيص البناء
        //         }
        //         if($request_type_name === 'تجديد رخصة'){
        //             $license_fee = $basira_area * $fee_license * 0.2; // 20% // رسوم ترخيص البناء
        //         }


        //     /////// رسوم تنمية وكوارث
        //     $development_disaster_fee = $fee_development_disaster; // رسوم تنمية وكوارث


        //     $total = $waste_removal_fee+$road_occupation_fee+$license_fee+$development_disaster_fee;//// مجموع الرسوم


        //     $data = [
        //         'road_occupation_fee' => $road_occupation_fee,
        //         'license_fee' => $license_fee,
        //         'waste_removal_fee' => $waste_removal_fee,
        //         'development_disaster_fee' => $development_disaster_fee,
        //         'total' => $total
        //     ];



        //      return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
        // }


}
