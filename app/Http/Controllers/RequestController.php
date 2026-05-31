<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Services\TwilioService;

class RequestController extends Controller
{
    // جلب سير العمل الخاص بالطلب
    public function getWorkflow($id)
    {
        $workflows = DB::table('request_workflows as rw')
            ->join('workflow_stages as ws', 'rw.stage_id', '=', 'ws.id')
            ->leftJoin('users as u', 'rw.assigned_to', '=', 'u.id')
            ->select('rw.*', 'ws.name as stage_name', 'u.name as assigned_user')
            ->where('rw.request_id', $id)
            ->orderBy('ws.stage_order')
            ->get();

        return response()->json($workflows);
    }

    // إضافة تعليق
    public function addComment(Request $request, $id)
    {
        $comment = $request->input('comment');
        $userId = auth()->id();

        DB::table('request_comments')->insert([
            'request_id' => $id,
            'user_id' => $userId,
            'comment' => $comment,
            'created_at' => now()
        ]);

        return response()->json(['success' => true]);
    }

        // قبول الطلب المراجعة الاولية
    public function resption($id)
    {

             DB::table('requests')->where('id', $id)->update([
            'status_id' => 2 ,
            'current_stage_id' => 1 ,
             ]);


            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $id,
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


        return response()->json(['success' => true]);
    }

    // قبول الطلب المراجعة الاولية
    public function approve_one($id)
    {
         DB::beginTransaction();


            DB::table('request_workflows')
                ->where('request_id', $id)
                ->where('stage_id', 2)
                ->where('status_id', 2)
                ->update([
                    'is_active' => 1
                ]);

            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $id,
                'stage_id'     =>  4,
                'status_id'    => 6,//مسندة للمهندس
                'assigned_to'  => $request->assigned_to ?? auth()->id(),
                'comments'     => '  تعيين مهندس مسؤول عن المشروع',
                'duration_days'=> 2,
                'started_at'   => now(),
                'is_active'    => 0,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

             DB::table('requests')->where('id', $id)->update([
            'status_id' => 6 ,// طلبات معادة
            'current_stage_id' => 4 ,//  المراجعه الاولية
             ]);

            DB::commit();


        return response()->json(['success' => true]);
    }

        // قبول الطلب المراجعة الفنية
    public function approve_tew($id)
    {
         DB::beginTransaction();


            DB::table('request_workflows')
                ->where('request_id', $id)
                ->where('stage_id', 3)
                ->where('status_id', 3)
                ->update([
                    'is_active' => 1
                ]);

            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $id,
                'stage_id'     =>  6,
                'status_id'    => 5,//الاعتماد النهائي
                'assigned_to'  => $request->assigned_to ?? auth()->id(),
                'comments'     => ' الاعتماد النهائي من المدير المسؤول',
                'duration_days'=> 2,
                'started_at'   => now(),
                'is_active'    => 0,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

             DB::table('requests')->where('id', $id)->update([
            'status_id' => 5 ,// طلبات الاعتماد النهائي
            'current_stage_id' => 6 ,//  الاعتماد النهائي
             ]);

            DB::commit();

        return response()->json(['success' => true]);
    }

        // قبول الطلب الاعتماد النهائي
    public function approve($id)
    {

         DB::beginTransaction();


            DB::table('request_workflows')
                ->where('request_id', $id)
                ->where('stage_id', 6)
                ->where('status_id', 5)
                ->update([
                    'is_active' => 1
                ]);

            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $id,
                'stage_id'     =>  9,
                'status_id'    => 7,//مسندة للمهندس
                'assigned_to'  => auth()->id(),
                'comments'     => '  استلام المبلغ المطلوب لإتمام الطلب',
                'duration_days'=> 2,
                'started_at'   => now(),
                'is_active'    => 0,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

             DB::table('requests')->where('id', $id)->update([
            'status_id' => 7 ,// طلبات معادة
            'current_stage_id' => 9 ,//  المراجعه الاولية
             ]);


                DB::commit();

                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



                // 1️⃣ الاستعلام الأساسي (معلومات الطلب والرخصة والأرض)
                $request = DB::table('requests')
                    ->join('licenses', 'requests.id', '=', 'licenses.request_id')
                    ->join('land_plots', 'requests.id', '=', 'land_plots.request_id')
                    ->where('requests.id', $id) // رقم الطلب
                    ->select(
                        'requests.id as request_id',
                        'requests.request_type_id',
                        'requests.license_type_id',
                        'licenses.id as license_id',
                        'licenses.building_type_id',
                        'land_plots.id as plot_id',
                        'land_plots.area',
                        'land_plots.structure_type',
                        'land_plots.building_percentage'
                    )
                    ->first();


                // 2️⃣ استعلام الحدود (boundaries) حسب رقم القطعة
                $frontBoundary = DB::table('boundaries')
                    ->where('plot_id', $request->plot_id)
                    ->select(
                        'direction_type',
                        'street_type_id',
                        'street_width',
                        'deed_length',
                        'nature_length'
                    )
                    ->get();

                    $boundaries = $frontBoundary->firstWhere('direction_type', 'امامي');
                      if (!$boundaries) {
                          return response()->json(['error' => 'لا يوجد شارع أمامي'], 400, [], JSON_UNESCAPED_UNICODE);
                      }

                // 3️⃣ استعلام مكونات البناء (building_components) حسب رقم الرخصة
                $components = DB::table('building_components')
                    ->where('license_id', $request->license_id)
                    ->select(
                        'floor_type_id',
                        'area as component_area',
                        'floors_count'
                    )
                    ->get();

                $data = [];

                foreach($components as $comp){

                        // جلب اسم الدور من جدول floor_types
                        $floorName = DB::table('floor_types')->where('id', $comp->floor_type_id)->value('name');

                        $requestTypeId = $request->request_type_id;
                        $buildingTypeId = $request->building_type_id;
                        $floorTypeId = $comp->floor_type_id;

                    if($boundaries->direction_type === 'امامي'){
                        $streetTypeId = $boundaries->street_type_id;   // نوع الشارع م
                    }


                        $licenseTypeId = $request->license_type_id;
                        $structureType = $request->structure_type;



                        $recordfee = DB::table('fee_structures as fs')
                            ->leftJoin('building_types as bt', 'fs.building_type_id', '=', 'bt.id')
                            ->leftJoin('floor_types as ft', 'fs.floor_type_id', '=', 'ft.id')
                            ->leftJoin('street_types as st', 'fs.street_type_id', '=', 'st.id')
                            ->leftJoin('license_types as lt', 'fs.license_type_id', '=', 'lt.id')
                            ->leftJoin('request_types as rt', 'fs.request_type_id', '=', 'rt.id')
                            ->select(
                                'fs.*',
                                'bt.name as building_type_name',
                                'ft.name as floor_type_name',
                                'st.name as street_type_name',
                                'lt.name as license_type_name',
                                'rt.name as request_type_name'
                            )
                            ->where('fs.request_type_id',  $requestTypeId)
                            ->where('fs.building_type_id', $buildingTypeId)
                            ->where('fs.floor_type_id',    $floorTypeId)
                            ->where('fs.street_type_id',   $streetTypeId)
                            ->where('fs.license_type_id',  $licenseTypeId)
                            ->when(!empty($structureType), function ($q) use ($structureType) {
                                $q->where('fs.structure_type', $structureType);
                            })
                            ->where('fs.is_active', 1)
                            ->first();


                            if (!$recordfee) {
                                    // تجاهل هذا الدور أو أعطه قيم صفرية
                                    $data[] = [
                                        'floor_type' => $floorName,
                                        'road_occupation_fee' => 0,
                                        'license_fee' => 0,
                                        'waste_removal_fee' => 0,
                                        'development_disaster_fee' => 0,
                                        'total' => 0,
                                        'note' => '⚠️ لا يوجد سجل في fee_structures لهذا الدور'
                                    ];
                                    continue; // يكمل على الدور اللي بعده
                                }



                                $building_type_name = $recordfee->building_type_name;
                                $floor_type_name = $recordfee->floor_type_name;
                                $street_type_name = $recordfee->street_type_name;
                                $license_type_name = $recordfee->license_type_name;
                                $request_type_name = $recordfee->request_type_name;
                                $structure_type = $recordfee->structure_type;


                    //////////////////////////////////  رسوم اشغال الطرق /////////

                        // مثال




                    $building_front = 12; // مثال: 12 متر
                    //  $building_front = $request->building_front; // واجهة المبنى من الفورم

                    if($boundaries->direction_type === 'امامي'){
                        $street_width   = $boundaries->street_width;   // عرض الشارع من الفورم
                    }

                    // $basira_area = 15;  // مساحة البصيرة  الهنجر

                    // if($floorName === 'دور متكرر'){
                    //     $building_area = $comp->floors_count * $comp->component_area;  // مساحة البناء  اذا كان متكرر المساحه في عدد الادوار
                    // }else{
                    //     $building_area = $comp->component_area; // مساحة البناء
                    // }

                    //         // ⚡ حساب المساحات والرسوم (زي ما عندك)
                        $building_area = ($floorName === 'دور متكرر')
                            ? $comp->floors_count * $comp->component_area
                            : $comp->component_area;

                    $area = $request->area;  // المساحة

                    // // ارتفاع الهنجر (متر)
                    $hanger_height = 6.6; // مثال: 6 متر
                    //  $hanger_height = $request->hanger_height;// ارتفاع الهنجر



                            // جلب الرسوم من fee_structures
                        $fee_road_occupation = $recordfee->road_occupation_fee; //  رسوم شغل الطريق
                        $fee_license = $recordfee->license_fee;        // رسوم ترخيص البناء
                        $fee_waste_removal = $recordfee->waste_removal_fee; // رسوم ازاله مخلفات البناء
                        $fee_development_disaster = $recordfee->development_disaster_fee; // رسوم تنمية وكوارث




                    if($building_type_name === 'هنجر'){
                        $waste_removal_fee = $area * $hanger_height * 5 /100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }

                    if($floor_type_name === 'بدروم'){
                        $waste_removal_fee = $building_area * 3 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }

                    if($floor_type_name === 'دور أول' && $structure_type === 'حجر مسلح' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3.5 * 15 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif($floor_type_name === 'دور أول' && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3.5 * 12 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif($floor_type_name === 'دور أول' && $structure_type === 'بلك مسلح' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3.5 * 10 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif($floor_type_name === 'دور أول' && $structure_type === 'بلك شعبي' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3.5 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }

                    if($floor_type_name === 'دور متكرر' && $structure_type === 'حجر مسلح' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3 * 8 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3 * 6 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'بلك مسلح' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'بلك شعبي' && $request_type_name === 'جديد'){
                        $waste_removal_fee = $building_area * 3 * 3 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }

                    if(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'حجر مسلح' && $request_type_name === 'تجديد رخصة'){
                        $waste_removal_fee = $building_area * 3 * 8 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'تجديد رخصة'){
                        $waste_removal_fee = $building_area * 3 * 6 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'بلك مسلح' && $request_type_name === 'تجديد رخصة'){
                        $waste_removal_fee = $building_area * 3 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'بلك شعبي' && $request_type_name === 'تجديد رخصة'){
                        $waste_removal_fee = $building_area * 3 * 3 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
                    }


                    ///////////////////////////// رسوم الاشغال الطرق

                        if (($floor_type_name === 'دور أول' || $floor_type_name === 'بدروم') && $request_type_name === 'جديد') {
                            $road_occupation_fee = $building_front * $street_width * $fee_road_occupation; // رسوم شغل الطريق
                        }

                        if ($floor_type_name === 'دور متكرر' && $request_type_name === 'جديد') {
                            $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2; // 20%
                        }

                        if (($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول' || $floor_type_name === 'بدروم') && $request_type_name === 'تجديد رخصة') {
                            $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2; // 20%
                        }

                        /////////////////////////    رسوم ترخيص البناء
                        if($request_type_name === 'جديد'){
                            $license_fee = $area * $fee_license; // رسوم ترخيص البناء
                        }
                        if($request_type_name === 'تجديد رخصة'){
                            $license_fee = $area * $fee_license * 0.2; // 20% // رسوم ترخيص البناء
                        }


                    /////// رسوم تنمية وكوارث
                    $development_disaster_fee = $fee_development_disaster; // رسوم تنمية وكوارث


                    $total = $waste_removal_fee+$road_occupation_fee+$license_fee+$development_disaster_fee;//// مجموع الرسوم




                    $data[] = [
                        'floor_type' => $floorName,
                        'road_occupation_fee' => $road_occupation_fee,
                        'license_fee' => $license_fee,
                        'waste_removal_fee' => $waste_removal_fee,
                        'development_disaster_fee' => $development_disaster_fee,
                        'total' => $total
                    ];

                }



  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





                  $this->create_invoice($id, $data); // الآن استدعاء صحيح



        return response()->json(['success' => true]);
    }


     private function create_invoice($id, $data)
    {

        DB::transaction(function() use ($id, $data) {
            $invoiceNumber = 'INV' . time() . rand(100, 999);
            $invoiceId = DB::table('invoices')->insertGetId([
              'request_id' => $id,
            'invoice_number' => $invoiceNumber,
            'total_amount' => 0,
            'status' => 'غير مدفوعة',
            'demolition_fees' => 0,
            'floor_fees' => 0,
            'license_fees' => 0,
            'issued_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            ]);

            foreach ($data as $item) {
                DB::table('invoice_details')->insert([
                    'invoice_id' => $invoiceId,
                    'floor_type' => $item['floor_type'] ?? 'غير محدد',
                    'road_occupation_fee' => $item['road_occupation_fee'] ?? 0,
                    'license_fee' => $item['license_fee'] ?? 0,
                    'waste_removal_fee' => $item['waste_removal_fee'] ?? 0,
                    'development_disaster_fee' => $item['development_disaster_fee'] ?? 0,
                    'total' => $item['total'] ?? 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $totalAmount = DB::table('invoice_details')
                ->where('invoice_id', $invoiceId)
                ->sum('total');

            DB::table('invoices')->where('id', $invoiceId)->update([
                'total_amount' => $totalAmount,
                'updated_at' => now(),
            ]);

            /////////////////////////////////////////////////////////////////////////////////////////////



                                    // جلب بيانات المستفيد مع البريد والواتساب
                    $requestData = DB::table('requests')
                        ->join('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
                        ->select(
                            'requests.id as request_id',
                            'requests.request_number as request_number',
                            'beneficiaries.email as email',
                            'beneficiaries.mobile as phone',
                            'beneficiaries.name as name'
                        )
                        ->where('requests.id', $id)
                        ->first();






                // // // إرسال بريد
                //     // Mail::raw(
                //     //     "تم تسجيل طلبك برقم: {$requestData->request_number}.
                //     //     تفاصيل الطلب عبر الرابط: " . url('/requests/' . $requestData->request_id),
                //     //     function ($message) use ($requestData) {
                //     //         $message->to($requestData->email)
                //     //                 ->subject('تفاصيل طلبك رقم ' . $requestData->request_number);
                //     //     }
                //     // );

                //     // // إرسال رسالة واتساب عبر Twilio مع إضافة 967
                    // app(\App\Services\TwilioService::class)->sendWhatsApp(
                    //     "967" . $requestData->phone, // رقم المستفيد مع بادئة الدولة
                    //     "تم تسجيل طلبك برقم: {$requestData->request_number}.
                    //     متابعة الطلب عبر الرابط: " . url('/requests/' . $requestData->request_id)
                    // );



                // // // إرسال بريد (اختياري)
                // // Mail::raw(
                // //     "تم إصدار فاتورتك رقم: {$invoiceData->invoice_number} بمبلغ: {$totalAmount} ريال.
                // //     يمكنك الاطلاع على تفاصيل الفاتورة عبر الرابط: " . url('/invoices/' . $invoiceData->invoice_id),
                // //     function ($message) use ($invoiceData) {
                // //         $message->to($invoiceData->email)
                // //                 ->subject('تفاصيل فاتورتك رقم ' . $invoiceData->invoice_number);
                // //     }
                // // );

                // // إرسال رسالة واتساب عبر Twilio مع إضافة 967
                // app(\App\Services\TwilioService::class)->sendWhatsApp(
                //     "967" . "779256969", // رقم المستفيد
                //     "تم إصدار فاتورتك رقم: {546} بمبلغ: {$totalAmount} ريال.
                //     لمتابعة تفاصيل الفاتورة: " . url('/invoices/' . $invoiceData->invoice_id)
                // );


                //  DB::commit();

            /////////////////////////////////////////////////////////////////////////////////////////////


            ///////////////////   رساله وتس اب باصدار الفاتورة  ////////////////

                    app(\App\Services\TwilioService::class)->sendWhatsApp(
                    "967".$requestData->phone, // رقم المستفيد
                    "تم إصدار فاتورتك رقم: {$invoiceNumber} بمبلغ: {$totalAmount} ريال.
                    لمتابعة تفاصيل الفاتورة: "
                );

                ///invoiceNumber

       });



        return true;
    }

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

     // إرسال رسالة حرة
    // public function sendMessagewats()
    // {
    //     // $to = "967779256969"; // بدون +
    //     // $message = "مرحبا! هذه رسالة تجريبية من Laravel عبر Twilio Sandbox 🚀";

    //     // $this->twilio->sendWhatsApp($to, $message);

    //       // إرسال رسالة واتساب عبر Twilio مع إضافة 967
    //             app(\App\Services\TwilioService::class)->sendWhatsApp(
    //                 "967774360827", // رقم المستفيد
    //                 "تم إصدار فاتورتك رقم: {In54654} بمبلغ: {215456122} ريال.
    //                 يرجاء سداد الفاتورة في اقرب وقت ممكن. تفاصيل الفاتورة:"
    //             );

    //     return response()->json([
    //         "status" => "تم إرسال الرسالة بنجاح!"
    //     ]);
    // }

//     private function create_invoice($id, $data)
// {
//         $invoiceNumber = 'INV' . time() . rand(100, 999);

//         $invoiceId = DB::table('invoices')->insertGetId([
//             'request_id'    => $id,   // ✅ تعديل هنا
//             'invoice_number'=> $invoiceNumber,
//             'total_amount'  => 0,
//             'status'        => 'غير مدفوعة',
//             'demolition_fees'=> 0,
//             'floor_fees'    => 0,
//             'license_fees'  => 0,
//             'created_at'    => now(),
//             'updated_at'    => now(),
//         ]);

//         foreach ($data as $item) {
//             DB::table('invoice_details')->insert([
//                 'invoice_id'              => $invoiceId,
//                 'floor_type'              => $item['floor_type'] ?? 'غير محدد',
//                 'road_occupation_fee'     => $item['road_occupation_fee'] ?? 0,
//                 'license_fee'             => $item['license_fee'] ?? 0,
//                 'waste_removal_fee'       => $item['waste_removal_fee'] ?? 0,
//                 'development_disaster_fee'=> $item['development_disaster_fee'] ?? 0,
//                 'total'                   => $item['total'] ?? 0,
//                 'created_at'              => now(),
//                 'updated_at'              => now(),
//             ]);
//         }

//         $totalAmount = DB::table('invoice_details')
//             ->where('invoice_id', $invoiceId)
//             ->sum('total');

//         DB::table('invoices')->where('id', $invoiceId)->update([
//             'total_amount' => $totalAmount,
//             'updated_at'   => now(),
//         ]);



//     return true;
// }


        // تعيين مهندس
    public function assignEngineer(Request $request, $id)
    {
        $engineerId = $request->input('engineer_id');


        DB::beginTransaction();


            DB::table('request_workflows')
                ->where('request_id', $id)
                ->where('stage_id', 4)
                ->where('status_id', 6)
                ->update([
                    'is_active' => 1
                ]);


             DB::table('requests')->where('id', $id)->update([
                    'assigned_to_m' => $engineerId,
                    'status_id' => 6,
                    'current_stage_id'=> 4
                ]);

            DB::commit();


        return response()->json(['success' => true]);
    }

     //   تقرير المهندس
    public function assignEngineer_Report( $id)
    {
        DB::beginTransaction();

            // إدخال المرحلة الأولى في جدول request_workflows
            DB::table('request_workflows')->insert([
                'request_id'   => $id,
                'stage_id'     =>  5,
                'status_id'    => 6,//مسندة للمهندس
                'assigned_to'  => $request->assigned_to ?? auth()->id(),
                'comments'     => ' زيارة ميدانية للموقع للتحقق من البيانات ',
                'duration_days'=> 2,
                'started_at'   => now(),
                'is_active'    => 0,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            DB::table('requests')->where('id', $id)->update([
                    'status_id' => 6,
                    'current_stage_id'=> 5
                ]);

            DB::commit();


        return response()->json(['success' => true]);
    }

    // رفض الطلب
    public function reject(Request $request, $id)
    {
        $details = $request->input('details');
        $Reason = $request->input('Reason');


        $hear = DB::table('requests')
            ->join('workflow_stages', 'requests.current_stage_id', '=', 'workflow_stages.id')
            ->where('requests.id', $id)
            ->select('requests.*', 'workflow_stages.name as workflow_stages_name')
            ->first();



        DB::table('requests')->where('id', $id)->update([
            'status_id' => 4, // مرفوض
            'updated_at' => now()
        ]);


            // 2. إضافة تعليق يوضح سبب الرفض
        DB::table('request_comments')->insert([
            'request_id'   => $id,
            'user_id'      => auth()->id(),
            'comment'      => "[ " . $hear->workflow_stages_name . " ] " . "سبب الرفض : " . $Reason . " / " . $details,
            'created_at'   => now()
        ]);


                           // جلب بيانات المستفيد مع البريد والواتساب
                    $requestData = DB::table('requests')
                        ->join('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
                        ->select(
                            'requests.id as request_id',
                            'requests.request_number as request_number',
                            'beneficiaries.email as email',
                            'beneficiaries.mobile as phone',
                            'beneficiaries.name as name'
                        )
                        ->where('requests.id', $id)
                        ->first();



          app(\App\Services\TwilioService::class)->sendWhatsApp(
                    "967".$requestData->phone, // رقم المستفيد
                    "تم رفض طلب رقم: {$requestData->request_number} باسم المستفيد: {$requestData->name}.
                       سبب الرفض : " . $Reason . " / " . $details
                );

                // "[ " . $hear->workflow_stages_name . " ] " . "سبب الرفض : " . $Reason . " / " . $details,

        return response()->json(['success' => true]);
    }

    // طلب تعديل
    public function requestChange(Request $request, $id)
    {
        $details = $request->input('details');


        $hear = DB::table('requests')
            ->join('workflow_stages', 'requests.current_stage_id', '=', 'workflow_stages.id')
            ->where('requests.id', $id)
            ->select('requests.*', 'workflow_stages.name as workflow_stages_name')
            ->first();


        DB::table('requests')->where('id', $id)->update([
            'status_id' => 10 // طلبات معادة
        ]);

        // يمكن حفظ التفاصيل في التعليقات
        DB::table('request_comments')->insert([
            'request_id' => $id,
            'user_id' => auth()->id(),
            'comment' => "[ " . $hear->workflow_stages_name . " ] " . "طلب تعديل: " . $details,
            'created_at' => now()
        ]);
        return response()->json(['success' => true]);
    }


    // موافقة التعديل تعديل
    public function approve_Change(Request $request, $id)
    {
        $details = $request->input('details');

            //     $hear = DB::table('requests')
            // ->join('workflow_stages', 'requests.current_stage_id', '=', 'workflow_stages.id')
            // ->join('request_workflows', 'request_workflows.status_id', '=', 'requests.id')
            // ->where('requests.id', $id)
            // ->select('requests.*',
            // 'workflow_stages.name as workflow_stages_name',
            // 'request_workflows.stage_id ',
            // '')
            // ->first();

        $hear = DB::table('requests')
            ->join('workflow_stages', 'requests.current_stage_id', '=', 'workflow_stages.id')
            ->where('requests.id', $id)
            ->select('requests.*', 'workflow_stages.name as workflow_stages_name')
            ->first();

            // جلب آخر صف كصفوف ضمن مجموعة
            $statusId = DB::table('request_workflows')
                ->where('request_id', $id)
                ->orderByDesc('id')
                ->value('status_id');



        DB::table('requests')->where('id', $id)->update([
            'status_id' => $statusId // ارجاع حالة الطلب الا الحاله الذي كان فيهاء
        ]);

        // يمكن حفظ التفاصيل في التعليقات
        DB::table('request_comments')->insert([
            'request_id' => $id,
            'user_id' => auth()->id(),
            'comment' => "[ " . $hear->workflow_stages_name . " ] " . "ارسال الطلب بعد تعديل: " . $details,
            'created_at' => now()
        ]);
        return response()->json(['success' => true]);
    }



    // إرسال رابط دفع
    public function sendPayment($id)
    {
        // هنا يمكن إضافة منطق إرسال الرابط عبر البريد أو SMS
        DB::table('requests')->where('id', $id)->update([
            'status_id' => 7
        ]);


            //         // جلب بيانات المستفيد مع البريد والواتساب
            // $requestData = DB::table('requests')
            //     ->join('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
            //     ->select('requests.id as request_id', 'requests.request_number',
            //             'beneficiaries.email', 'beneficiaries.phone')
            //     ->where('requests.id', $id)
            //     ->first();

            // // إرسال بريد
            // Mail::raw("تم تسجيل طلبك برقم: {$requestData->request_number}.
            // تفاصيل الطلب عبر الرابط: " . url('/requests/'.$requestData->request_id),
            // function ($message) use ($requestData) {
            //     $message->to($requestData->email)
            //             ->subject('تفاصيل طلبك رقم ' . $requestData->request_number);
            // });

            // // إنشاء رابط واتساب
            // $whatsAppLink = "https://wa.me/{$requestData->phone}?text=" . urlencode(
            //     "تم تسجيل طلبك برقم: {+967774360827}.
            //     متابعة الطلب عبر الرابط: " . url('/requests/'.$requestData->request_id)
            // );


        return response()->json(['success' => true]);
    }

    // إرسال إشعار
    public function notifyClient(Request $request, $id)
    {
        $message = $request->input('message');
        // يمكن حفظ الإشعار في جدول notifications


          $beneficiaries = DB::table('beneficiaries')
            ->join('requests', 'requests.beneficiary_id', '=', 'beneficiaries.id')
            ->select(
                'beneficiaries.id',
                'beneficiaries.identity_number',
                'beneficiaries.name',
                'beneficiaries.mobile',
                'beneficiaries.email',
                'beneficiaries.identity_type',
                'beneficiaries.directorate_id',
                'beneficiaries.address',
                'requests.request_number'
            )
            ->where('requests.id', $id) // 🔑 هنا الشرط على رقم الطلب
            ->first();


        //  app(\App\Services\TwilioService::class)->sendSMS(
        //         "+967" . $beneficiaries->mobile,
        //         "وزارة الأشغال ترحب بكم!\n"
        //         ." اخي المواطن: {$beneficiaries->name} \n"
        //         ." نوع الاشعار تحديد موعد: {$request->notificationType}\n"
        //         ."تاريخ الموعد: {$request->date_date}\n"
        //         ."الرساله: {$request->message}"
        //     );


      if($request->notificationType === 'موعد زيارة ميدانية'){
         app(\App\Services\TwilioService::class)->sendWhatsApp(
                "967" . $beneficiaries->mobile,
                "📢 *تنويه من وزارة النقل الأشغال العامة والطرق*\n\n"
                ."الأخ المواطن: *{$beneficiaries->name}*\n"
                ."نحيطكم علماً بأنه تم تحديد موعد نزول المهندس لمعاينة موقع الأرض الخاصة بطلب رخصة البناء.\n"
                ."🗓️ رقم الطلب: *{$beneficiaries->request_number}*\n\n"
                ."🗓️ تاريخ الموعد: *{$request->date_date}*\n"
                ."📌 نوع الإشعار: *{$request->notificationType}*\n\n"
                ."الرجاء التواجد في الموقع بالموعد المحدد لتسهيل إجراءات المعاينة.\n\n"
                ."شاكرين تعاونكم. 🙏"
            );


                                    // يمكن حفظ التفاصيل في التعليقات
                DB::table('request_comments')->insert([
                    'request_id' => $id,
                    'user_id' => auth()->id(),
                    'comment' => "[ " . $request->notificationType . " ] \n" . "تاريخ الموعد : " . $request->date_date . "\n الرسال:" . $request->message,
                    'created_at' => now()
                ]);

      }else{

        $data = date('Y-m-d');

        app(\App\Services\TwilioService::class)->sendWhatsApp(
            "+967" . $beneficiaries->mobile,
            "📢 *وزارة النقل و الأشغال العامة * ترحب بكم 🙏\n\n"
            ."👤 المواطن الكريم: *{$beneficiaries->name}*\n"
            ."🗓️ رقم الطلب: *{$beneficiaries->request_number}*\n\n"
            ."📌 نوع الإشعار: *{$request->notificationType}*\n"
            ."🗓️ التاريخ: *{$data}*\n\n"
            ."💬 الرسالة:\n{$request->message}\n\n"
            ."نشكر تفاعلكم وحرصكم على متابعة خدمات الوزارة. 🌟"
        );



      }




        //   app(\App\Services\TwilioService::class)->sendWhatsApp(
        //             "967".$requestData->phone, // رقم المستفيد
        //             "تم إصدار فاتورتك رقم: {$invoiceNumber} بمبلغ: {$totalAmount} ريال.
        //             لمتابعة تفاصيل الفاتورة: "
        //         );

        return response()->json(['success' => true]);
    }



    //   public function showReceipt($id)
    // {
    //     $receipt = DB::table('payment_receipts')
    //         ->where('request_id', $id)
    //         ->first();

    //     $request = DB::table('requests')
    //         ->leftJoin('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
    //         ->select('requests.*', 'beneficiaries.name as beneficiary_name', 'beneficiaries.mobile')
    //         ->where('requests.id', $id)
    //         ->first();

    //     $html = view('modules.auth.requests.create.partials.receipt', compact('receipt', 'request'))->render();

    //     return response()->json(['html' => $html]);
    // }


    public function showReceipt($id)
{
    // جلب بيانات السند
    $receipt = DB::table('payment_receipts')
        ->where('request_id', $id)
        ->first();

    // جلب بيانات الطلب واسم صاحب الطلب
    $request = DB::table('requests')
        ->leftJoin('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
        ->select('requests.*', 'beneficiaries.name as beneficiary_name', 'beneficiaries.mobile')
        ->where('requests.id', $id)
        ->first();

    // جلب اسم المستخدم الذي أصدر السند
    $issuedBy = null;
    if ($receipt && $receipt->issued_by) {
        $user = DB::table('users')->select('name')->where('id', $receipt->issued_by)->first();
        $issuedBy = $user ? $user->name : '-';
    }

    $html = view('modules.auth.requests.create.partials.receipt', compact('receipt', 'request', 'issuedBy'))->render();

    return response()->json(['html' => $html]);
}

// public function showBuildingPermit($request_id)
// {
//     $license = DB::table('licenses')->where('request_id', $request_id)->first();
//     $user = DB::table('users')->where('id', $license->issued_by)->first();
//     $location = DB::table('locations')->where('request_id', $request_id)->first();
//     $plots = DB::table('land_plots')->where('request_id', $request_id)->get();
//     $boundaries = DB::table('boundaries')->whereIn('plot_id', $plots->pluck('id'))->get();
//     $components = DB::table('building_components')->where('license_id', $license->id)->get();
//     $attachments = DB::table('attachments')->where('request_id', $request_id)->first();

//     $html = view('requests.create.partials.license_export', compact(
//         'license','user','location','plots','boundaries','components','attachments'
//     ))->render();

//     return response()->json(['html' => $html]);
// }

// public function showBuildingPermit($id)
// {
//     $license = DB::table('licenses')->where('id', $id)->first();
//     if (!$license) {
//         return response()->json(['error' => 'الرخصة غير موجودة'], 404);
//     }

//     // استخدام العمود الصحيح
//     $issued_by = "مدير النظام";
//     // DB::table('users')
//     //     ->where('id', $license->issued_by) // تأكد أن العمود موجود باسم issued_by
//     //     ->first()

//     $request = DB::table('requests')->where('id', $license->request_id)->first();
//     $location = DB::table('locations')->where('request_id', $license->request_id)->first();
//     $attachments = DB::table('attachments')->where('request_id', $license->request_id)->first();

//     if ($attachments) {
//         $attachments->structural_plan_url     = $attachments->structural_plan_path ? asset('storage/' . $attachments->structural_plan_path) : null;
//         $attachments->architectural_plan_url  = $attachments->architectural_plan_path ? asset('storage/' . $attachments->architectural_plan_path) : null;
//         $attachments->site_image_url          = $attachments->site_image_path ? asset('storage/' . $attachments->site_image_path) : null;
//     }

//     return view('modules.auth.requests.create.partials.license_export', [
//         'license' => $license,
//         'request' => $request,
//         'location' => $location,
//         'attachments' => $attachments,
//         'issued_by' => $issued_by
//     ]);
// }


/// عرض  الرخصة

public function showBuildingPermit($requestId)
{
    // جلب بيانات الطلب
    $request = DB::table('requests')->where('id', $requestId)->first();
    if (!$request) {
        return response()->json(['error' => 'الطلب غير موجود'], 404);
    }

    // جلب الرخصة المرتبطة بالطلب
    $license = DB::table('licenses')->where('request_id', $requestId)->first();

    // جلب بيانات الموقع
    $location = DB::table('locations')->where('request_id', $requestId)->first();

    // جلب المرفقات
    $attachments = DB::table('attachments')->where('request_id', $requestId)->first();

    if ($attachments) {
        $attachments->structural_plan_url     = $attachments->structural_plan_path ? asset('storage/' . $attachments->structural_plan_path) : null;
        $attachments->architectural_plan_url  = $attachments->architectural_plan_path ? asset('storage/' . $attachments->architectural_plan_path) : null;
        $attachments->site_image_url          = $attachments->site_image_path ? asset('storage/' . $attachments->site_image_path) : null;
    }

    // جلب الموظف الذي أصدر الرخصة
    $issued_by = null;
    if ($license && $request->assigned_to) {
        $issued_by = DB::table('users')->where('id', $request->assigned_to)->first();
    }

    // جلب الحدود
    $boundaries = DB::table('boundaries')
                    ->where('plot_id', $license ? $license->id : 0)
                    ->get();

    // جلب مكونات البناء
    $components = DB::table('building_components')
                    ->where('license_id', $license ? $license->id : 0)
                    ->get();

    $html = view('modules.auth.requests.create.partials.license_export', [
        'request'     => $request,
        'license'     => $license,
        'location'    => $location,
        'attachments' => $attachments,
        'issued_by'   => $issued_by,
        'boundaries'  => $boundaries,
        'components'  => $components
    ])->render();

    return response()->json(['html' => $html]);
}

// public function showBuildingPermit($requestId)
// {
//         // جلب بيانات الطلب
//         $request = DB::table('requests')->where('id', $requestId)->first();
//         if (!$request) {
//             return response()->json(['error' => 'الطلب غير موجود'], 404);
//         }

//         // جلب الرخصة المرتبطة بالطلب
//         $license = DB::table('licenses')->where('request_id', $requestId)->first();

//         // جلب بيانات الموقع
//         $location = DB::table('locations')->where('request_id', $requestId)->first();

//         // جلب المرفقات
//         $attachments = DB::table('attachments')->where('request_id', $requestId)->first();

//     // داخل showBuildingPermitByRequest

//     // تحديد ملف PDF الافتراضي (الخريطة)
//     $pdfUrl = null;
//     // داخل showBuildingPermitByRequest
//     if ($attachments) {
//         $attachments->structural_plan_url     = $attachments->structural_plan_path ? asset('storage/' . $attachments->structural_plan_path) : null;
//         $attachments->architectural_plan_url  = $attachments->architectural_plan_path ? asset('storage/' . $attachments->architectural_plan_path) : null;
//         $attachments->site_image_url          = $attachments->site_image_path ? asset('storage/' . $attachments->site_image_path) : null;
//     }



//         // جلب المستخدم الذي أصدر الرخصة (issued_by)
//         $issued_by = null;
//         if ($license && $request->assigned_to) {
//             $issued_by = DB::table('users')->where('id', $request->assigned_to)->first();
//         }

//         // جلب حدود الرخصة (boundaries)
//         $boundaries = DB::table('boundaries')
//                         ->where('plot_id', $license ? $license->id : 0)
//                         ->get();

//     $html = view('modules.auth.requests.create.partials.license_export', [
//         'request'    => $request,
//         'license'    => $license,
//         'location'   => $location,
//         'attachments'=> $attachments,
//         'issued_by'  => $issued_by,
//         'boundaries' => $boundaries,
//         'pdfUrl'     => $pdfUrl
//     ])->render();


//         return response()->json(['html' => $html]);

// }




}

