<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Calculaterfee extends Controller
{

            // public function fee_structures_sum($id){


                //         // 1️⃣ الاستعلام الأساسي (معلومات الطلب والرخصة والأرض)
                //         $request = DB::table('requests')
                //             ->join('licenses', 'requests.id', '=', 'licenses.request_id')
                //             ->join('land_plots', 'requests.id', '=', 'land_plots.request_id')
                //             ->where('requests.id', $id) // رقم الطلب
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

                //       foreach($components as ){



                //         $requestTypeId = $request->request_type_id;
                //         $buildingTypeId = $request->building_type_id;
                //         $floorTypeId = $components->floor_type_id;

                //      if($boundaries->direction_type === 'امامي'){
                //         $streetTypeId = $boundaries->street_type_id;   // نوع الشارع م
                //       }


                //         $licenseTypeId = $request->license_type_id;
                //         $structureType = $request->structure_type;



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




                //      $building_front = 12; // مثال: 12 متر
                //     //  $building_front = $request->building_front; // واجهة المبنى من الفورم

                //      if($boundaries->direction_type === 'امامي'){
                //         $street_width   = $boundaries->street_width;   // عرض الشارع من الفورم
                //       }

                //      $basira_area = $request->basira_area;  // مساحة البصيرة  الهنجر

                //      if($components->floors_count === 'دور متكرر'){
                //         $building_area = $components->floors_count * $components->component_area;  // مساحة البناء  اذا كان متكرر المساحه في عدد الادوار
                //      }else{
                //         $building_area = $components->component_area; // مساحة البناء
                //      }

                //      $area = $request->area;  // المساحة

                //       // // ارتفاع الهنجر (متر)
                //       $hanger_height = 6.6; // مثال: 6 متر
                //      //  $hanger_height = $request->hanger_height;// ارتفاع الهنجر



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
                //  }

                //     $data = [
                //         'road_occupation_fee' => $road_occupation_fee,
                //         'license_fee' => $license_fee,
                //         'waste_removal_fee' => $waste_removal_fee,
                //         'development_disaster_fee' => $development_disaster_fee,
                //         'total' => $total
                //     ];



            //      return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
            // }
        public function fee_structures_sum($id){


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

                    return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
        }



            //public function fee_structures_sum($id)
        // {
        //     // 1️⃣ الاستعلام الأساسي
        //     $request = DB::table('requests')
        //         ->join('licenses', 'requests.id', '=', 'licenses.request_id')
        //         ->join('land_plots', 'requests.id', '=', 'land_plots.request_id')
        //         ->where('requests.id', $id)
        //         ->select(
        //             'requests.id as request_id',
        //             'requests.request_type_id',
        //             'requests.license_type_id',
        //             'licenses.id as license_id',
        //             'licenses.building_type_id',
        //             'land_plots.id as plot_id',
        //             'land_plots.area',
        //             'land_plots.structure_type',
        //             'land_plots.building_percentage'
        //         )
        //         ->first();

        //     if (!$request) {
        //         return response()->json(['error' => 'الطلب غير موجود'], 404, [], JSON_UNESCAPED_UNICODE);
        //     }

        //     // 2️⃣ استعلام الحدود
        //     $boundaries = DB::table('boundaries')
        //         ->where('plot_id', $request->plot_id)
        //         ->where('direction_type', 'امامي')
        //         ->select('direction_type', 'street_type_id', 'street_width')
        //         ->first();

        //     if (!$boundaries) {
        //         return response()->json(['error' => 'لا يوجد شارع أمامي'], 400, [], JSON_UNESCAPED_UNICODE);
        //     }

        //     // 3️⃣ استعلام مكونات البناء
        //     $components = DB::table('building_components')
        //         ->where('license_id', $request->license_id)
        //         ->select('floor_type_id', 'area as component_area', 'floors_count')
        //         ->get();

        //     if ($components->isEmpty()) {
        //         return response()->json(['error' => 'لا يوجد مكونات بناء'], 400, [], JSON_UNESCAPED_UNICODE);
        //     }

        //     $data = [];

        //     foreach ($components as $comp) {
        //         $floorName = DB::table('floor_types')->where('id', $comp->floor_type_id)->value('name');

        //         // جلب الرسوم من fee_structures
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
        //             ->where('fs.request_type_id',  $request->request_type_id)
        //             ->where('fs.building_type_id', $request->building_type_id)
        //             ->where('fs.floor_type_id',    $comp->floor_type_id)
        //             ->where('fs.street_type_id',   $boundaries->street_type_id)
        //             ->where('fs.license_type_id',  $request->license_type_id)
        //             ->when(!empty($request->structure_type), function ($q) use ($request) {
        //                 $q->where('fs.structure_type', $request->structure_type);
        //             })
        //             ->where('fs.is_active', 1)
        //             ->first();

        //         // ✅ لو ما لقى سجل في fee_structures → يكمل برسوم صفرية
        //         $fee_road_occupation     = $recordfee->road_occupation_fee     ?? 0;
        //         $fee_license             = $recordfee->license_fee             ?? 0;
        //         $fee_waste_removal       = $recordfee->waste_removal_fee       ?? 0;
        //         $fee_development_disaster= $recordfee->development_disaster_fee?? 0;

        //         // حساب المساحة
        //         if ($floorName === 'دور متكرر') {
        //             $building_area = $comp->floors_count * $comp->component_area;
        //         } else {
        //             $building_area = $comp->component_area;
        //         }

        //         $waste_removal_fee = 0;
        //         $road_occupation_fee = 0;
        //         $license_fee = 0;

        //                             $building_front = 12; // مثال: 12 متر
        //                     //  $building_front = $request->building_front; // واجهة المبنى من الفورم

        //                     if($boundaries->direction_type === 'امامي'){
        //                         $street_width   = $boundaries->street_width;   // عرض الشارع من الفورم
        //                     }

        //                     $basira_area = 15;  // مساحة البصيرة  الهنجر

        //                     if($floorName === 'دور متكرر'){
        //                         $building_area = $comp->floors_count * $comp->component_area;  // مساحة البناء  اذا كان متكرر المساحه في عدد الادوار
        //                     }else{
        //                         $building_area = $comp->component_area; // مساحة البناء
        //                     }

        //                     $area = $request->area;  // المساحة

        //                     // // ارتفاع الهنجر (متر)
        //                     $hanger_height = 6.6; // مثال: 6 متر
        //                     //  $hanger_height = $request->hanger_height;// ارتفاع الهنجر



        //                             // جلب الرسوم من fee_structures
        //                         $fee_road_occupation = $recordfee->road_occupation_fee; //  رسوم شغل الطريق
        //                         $fee_license = $recordfee->license_fee;        // رسوم ترخيص البناء
        //                         $fee_waste_removal = $recordfee->waste_removal_fee; // رسوم ازاله مخلفات البناء
        //                         $fee_development_disaster = $recordfee->development_disaster_fee; // رسوم تنمية وكوارث




        //                     if($building_type_name === 'هنجر'){
        //                         $waste_removal_fee = $area * $hanger_height * 5 /100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }

        //                     if($floor_type_name === 'بدروم'){
        //                         $waste_removal_fee = $building_area * 3 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }

        //                     if($floor_type_name === 'دور أول' && $structure_type === 'حجر مسلح' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3.5 * 15 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif($floor_type_name === 'دور أول' && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3.5 * 12 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif($floor_type_name === 'دور أول' && $structure_type === 'بلك مسلح' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3.5 * 10 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif($floor_type_name === 'دور أول' && $structure_type === 'بلك شعبي' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3.5 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }

        //                     if($floor_type_name === 'دور متكرر' && $structure_type === 'حجر مسلح' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3 * 8 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3 * 6 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'بلك مسلح' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif($floor_type_name === 'دور متكرر' && $structure_type === 'بلك شعبي' && $request_type_name === 'جديد'){
        //                         $waste_removal_fee = $building_area * 3 * 3 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }

        //                     if(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'حجر مسلح' && $request_type_name === 'تجديد رخصة'){
        //                         $waste_removal_fee = $building_area * 3 * 8 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'حجر منشار مسلح' && $request_type_name === 'تجديد رخصة'){
        //                         $waste_removal_fee = $building_area * 3 * 6 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'بلك مسلح' && $request_type_name === 'تجديد رخصة'){
        //                         $waste_removal_fee = $building_area * 3 * 5 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }elseif(($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول') && $structure_type === 'بلك شعبي' && $request_type_name === 'تجديد رخصة'){
        //                         $waste_removal_fee = $building_area * 3 * 3 / 100 * $fee_waste_removal; // رسوم ازاله مخلفات البناء
        //                     }


        //                     ///////////////////////////// رسوم الاشغال الطرق

        //                         if (($floor_type_name === 'دور أول' || $floor_type_name === 'بدروم') && $request_type_name === 'جديد') {
        //                             $road_occupation_fee = $building_front * $street_width * $fee_road_occupation; // رسوم شغل الطريق
        //                         }

        //                         if ($floor_type_name === 'دور متكرر' && $request_type_name === 'جديد') {
        //                             $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2; // 20%
        //                         }

        //                         if (($floor_type_name === 'دور متكرر' || $floor_type_name === 'دور أول' || $floor_type_name === 'بدروم') && $request_type_name === 'تجديد رخصة') {
        //                             $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2; // 20%
        //                         }

        //                         /////////////////////////    رسوم ترخيص البناء
        //                         if($request_type_name === 'جديد'){
        //                             $license_fee = $basira_area * $fee_license; // رسوم ترخيص البناء
        //                         }
        //                         if($request_type_name === 'تجديد رخصة'){
        //                             $license_fee = $basira_area * $fee_license * 0.2; // 20% // رسوم ترخيص البناء
        //                         }


        //                     /////// رسوم تنمية وكوارث
        //                     $development_disaster_fee = $fee_development_disaster; // رسوم تنمية وكوارث



        //         // مجموع الرسوم
        //         $total = $waste_removal_fee + $road_occupation_fee + $license_fee + $fee_development_disaster;

        //         $data[] = [
        //             'floor_type' => $floorName,
        //             'road_occupation_fee' => $road_occupation_fee,
        //             'license_fee' => $license_fee,
        //             'waste_removal_fee' => $waste_removal_fee,
        //             'development_disaster_fee' => $fee_development_disaster,
        //             'total' => $total
        //         ];
        //     }

        //     return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
        // }


        //             public function fee_structures_sum($id)
        // {
        //     // 1️⃣ الاستعلام الأساسي
        //     $request = DB::table('requests')
        //         ->join('licenses', 'requests.id', '=', 'licenses.request_id')
        //         ->join('land_plots', 'requests.id', '=', 'land_plots.request_id')
        //         ->where('requests.id', $id)
        //         ->select(
        //             'requests.id as request_id',
        //             'requests.request_type_id',
        //             'requests.license_type_id',
        //             'licenses.id as license_id',
        //             'licenses.building_type_id',
        //             'land_plots.id as plot_id',
        //             'land_plots.area',
        //             'land_plots.structure_type',
        //             'land_plots.building_percentage'
        //         )
        //         ->first();

        //     // 2️⃣ الحدود
        //     $frontBoundary = DB::table('boundaries')
        //         ->where('plot_id', $request->plot_id)
        //         ->select('direction_type', 'street_type_id', 'street_width', 'deed_length', 'nature_length')
        //         ->get();

        //     $boundaries = $frontBoundary->firstWhere('direction_type', 'امامي');
        //     if (!$boundaries) {
        //         return response()->json(['error' => 'لا يوجد شارع أمامي'], 400, [], JSON_UNESCAPED_UNICODE);
        //     }

        //     // 3️⃣ الأدوار
        //     $components = DB::table('building_components')
        //         ->where('license_id', $request->license_id)
        //         ->select('floor_type_id', 'area as component_area', 'floors_count')
        //         ->get();

        //     $data = [];

        //     foreach ($components as $comp) {
        //         $floorName = DB::table('floor_types')->where('id', $comp->floor_type_id)->value('name');

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
        //             ->where('fs.request_type_id', $request->request_type_id)
        //             ->where('fs.building_type_id', $request->building_type_id)
        //             ->where('fs.floor_type_id', $comp->floor_type_id)
        //             ->where('fs.street_type_id', $boundaries->street_type_id)
        //             ->where('fs.license_type_id', $request->license_type_id)
        //             ->when(!empty($request->structure_type), fn($q) => $q->where('fs.structure_type', $request->structure_type))
        //             ->where('fs.is_active', 1)
        //             ->first();

        //         if (!$recordfee) {
        //             continue;
        //         }

        //         // ⚡ حساب المساحات والرسوم (زي ما عندك)
        //         $building_area = ($floorName === 'دور متكرر')
        //             ? $comp->floors_count * $comp->component_area
        //             : $comp->component_area;

        //         $fee_license = $recordfee->license_fee;
        //         $fee_road_occupation = $recordfee->road_occupation_fee;
        //         $fee_waste_removal = $recordfee->waste_removal_fee;
        //         $fee_development_disaster = $recordfee->development_disaster_fee;

        //         // 🟢 مثال مبسط (انت تكمل باقي معادلاتك)
        //         $license_fee = $building_area * $fee_license;
        //         $road_occupation_fee = $building_area * $fee_road_occupation;
        //         $waste_removal_fee = $building_area * $fee_waste_removal;
        //         $development_disaster_fee = $fee_development_disaster;

        //         $total = $license_fee + $road_occupation_fee + $waste_removal_fee + $development_disaster_fee;

        //         // ✅ ضيف الدور إلى المصفوفة
        //         $data[] = [
        //             'floor_type' => $floorName,
        //             'road_occupation_fee' => $road_occupation_fee,
        //             'license_fee' => $license_fee,
        //             'waste_removal_fee' => $waste_removal_fee,
        //             'development_disaster_fee' => $development_disaster_fee,
        //             'total' => $total
        //         ];
        //     }

        //     return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
        // }



        //         public function fee_structures_sum($id)
        // {
        //     // 1️⃣ الاستعلام الأساسي (معلومات الطلب والرخصة والأرض)
        //     $request = DB::table('requests')
        //         ->join('licenses', 'requests.id', '=', 'licenses.request_id')
        //         ->join('land_plots', 'requests.id', '=', 'land_plots.request_id')
        //         ->where('requests.id', $id)
        //         ->select(
        //             'requests.id as request_id',
        //             'requests.request_type_id',
        //             'requests.license_type_id',
        //             'licenses.id as license_id',
        //             'licenses.building_type_id',
        //             'land_plots.id as plot_id',
        //             'land_plots.area',
        //             'land_plots.structure_type',
        //             'land_plots.building_percentage'
        //         )
        //         ->first();

        //     if (!$request) {
        //         return response()->json(['error' => 'الطلب غير موجود'], 404, [], JSON_UNESCAPED_UNICODE);
        //     }

        //     // 2️⃣ استعلام الحدود (boundaries) حسب رقم القطعة
        //     $boundaries = DB::table('boundaries')
        //         ->where('plot_id', $request->plot_id)
        //         ->get();

        //     $frontBoundary = $boundaries->firstWhere('direction_type', 'امامي');
        //     if (!$frontBoundary) {
        //         return response()->json(['error' => 'لا يوجد شارع أمامي'], 400, [], JSON_UNESCAPED_UNICODE);
        //     }

        //     // 3️⃣ استعلام مكونات البناء (building_components) لكل الدور
        //    // 3️⃣ استعلام مكونات البناء (building_components) لكل الدور
        //                 $components = DB::table('building_components')
        //                     ->where('license_id', $request->license_id)
        //                     ->select('floor_type_id', 'area as component_area', 'floors_count')
        //                     ->orderBy('floor_type_id') // ترتيب حسب نوع الدور (يمكن تغييره حسب جدول floor_types)
        //                     ->get();

        //                 $results = [];
        //                 $totalAllFloors = 0; // مجموع كل الأدوار

        //             foreach ($components as $comp) {

        //                 // جلب اسم الدور من جدول floor_types
        //                 $floorName = DB::table('floor_types')->where('id', $comp->floor_type_id)->value('name');

        //                 $requestTypeId   = $request->request_type_id;
        //                 $buildingTypeId  = $request->building_type_id;
        //                 $floorTypeId     = $comp->floor_type_id;
        //                 $streetTypeId    = $frontBoundary->street_type_id;
        //                 $licenseTypeId   = $request->license_type_id;
        //                 $structureType   = $request->structure_type;

        //                 // 🔹 جلب الرسوم من fee_structures
        //                 $recordfee = DB::table('fee_structures as fs')
        //                     ->leftJoin('building_types as bt', 'fs.building_type_id', '=', 'bt.id')
        //                     ->leftJoin('floor_types as ft', 'fs.floor_type_id', '=', 'ft.id')
        //                     ->leftJoin('street_types as st', 'fs.street_type_id', '=', 'st.id')
        //                     ->leftJoin('license_types as lt', 'fs.license_type_id', '=', 'lt.id')
        //                     ->leftJoin('request_types as rt', 'fs.request_type_id', '=', 'rt.id')
        //                     ->select(
        //                         'fs.*',
        //                         'bt.name as building_type_name',
        //                         'ft.name as floor_type_name',
        //                         'st.name as street_type_name',
        //                         'lt.name as license_type_name',
        //                         'rt.name as request_type_name'
        //                     )
        //                     ->where('fs.request_type_id', $requestTypeId)
        //                     ->where('fs.building_type_id', $buildingTypeId)
        //                     ->where('fs.floor_type_id', $floorTypeId)
        //                     ->where('fs.street_type_id', $streetTypeId)
        //                     ->where('fs.license_type_id', $licenseTypeId)
        //                     ->when(!empty($structureType), fn($q) => $q->where('fs.structure_type', $structureType))
        //                     ->where('fs.is_active', 1)
        //                     ->first();

        //                 if (!$recordfee) continue;

        //                 // 🔹 متغيرات مساعدة
        //                 $building_front = 12; // مثال
        //                 $street_width   = $frontBoundary->street_width;
        //                 $basira_area    = 15;

        //                 $building_area = ($floorName === 'دور متكرر')
        //                     ? $comp->floors_count * $comp->component_area
        //                     : $comp->component_area;

        //                 $hanger_height = 6.6; // مثال

        //                 // الرسوم الأساسية
        //                 $fee_road_occupation      = $recordfee->road_occupation_fee;
        //                 $fee_license              = $recordfee->license_fee;
        //                 $fee_waste_removal        = $recordfee->waste_removal_fee;
        //                 $fee_development_disaster = $recordfee->development_disaster_fee;

        //                 // -------------------- الشروط حسب نوع الدور والبناء --------------------
        //                 $waste_removal_fee = 0;
        //                 $road_occupation_fee = 0;
        //                 $license_fee = 0;

        //                 // 🏗 هنجر
        //                 if ($recordfee->building_type_name === 'هنجر') {
        //                     $waste_removal_fee = $request->area * $hanger_height * 5 / 100 * $fee_waste_removal;
        //                 }

        //                 // 🏢 بدروم
        //                 if ($floorName === 'بدروم') {
        //                     $waste_removal_fee = $building_area * 3 * $fee_waste_removal;
        //                 }

        //                 // 🏢 دور أول / دور متكرر
        //                 if ($floorName === 'دور أول') {
        //                     if ($structureType === 'حجر مسلح' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3.5 * 15 / 100 * $fee_waste_removal;
        //                     if ($structureType === 'حجر منشار مسلح' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3.5 * 12 / 100 * $fee_waste_removal;
        //                     if ($structureType === 'بلك مسلح' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3.5 * 10 / 100 * $fee_waste_removal;
        //                     if ($structureType === 'بلك شعبي' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3.5 * 5 / 100 * $fee_waste_removal;
        //                 }

        //                 if ($floorName === 'دور متكرر') {
        //                     if ($structureType === 'حجر مسلح' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3 * 8 / 100 * $fee_waste_removal;
        //                     if ($structureType === 'حجر منشار مسلح' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3 * 6 / 100 * $fee_waste_removal;
        //                     if ($structureType === 'بلك مسلح' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3 * 5 / 100 * $fee_waste_removal;
        //                     if ($structureType === 'بلك شعبي' && $recordfee->request_type_name === 'جديد') $waste_removal_fee = $building_area * 3 * 3 / 100 * $fee_waste_removal;
        //                 }

        //                 // رسوم إشغال الطرق
        //                 if (($floorName === 'دور أول' || $floorName === 'بدروم') && $recordfee->request_type_name === 'جديد') {
        //                     $road_occupation_fee = $building_front * $street_width * $fee_road_occupation;
        //                 }
        //                 if ($floorName === 'دور متكرر' && $recordfee->request_type_name === 'جديد') {
        //                     $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2;
        //                 }
        //                 if (($floorName === 'دور متكرر' || $floorName === 'دور أول' || $floorName === 'بدروم') && $recordfee->request_type_name === 'تجديد رخصة') {
        //                     $road_occupation_fee = $building_front * $street_width * $fee_road_occupation * 0.2;
        //                 }

        //                 // رسوم الترخيص
        //                 if ($recordfee->request_type_name === 'جديد') {
        //                     $license_fee = $basira_area * $fee_license;
        //                 } elseif ($recordfee->request_type_name === 'تجديد رخصة') {
        //                     $license_fee = $basira_area * $fee_license * 0.2;
        //                 }

        //                 // رسوم التنمية والكوارث
        //                 $development_disaster_fee = $fee_development_disaster;

        //                 // 💰 المجموع لكل دور
        //                 $total = $waste_removal_fee + $road_occupation_fee + $license_fee + $development_disaster_fee;
        //                 $totalAllFloors += $total;

        //                 // ⬅️ إضافة النتيجة
        //                 $results[] = [
        //                     'floor_type'               => $floorName,
        //                     'road_occupation_fee'      => $road_occupation_fee,
        //                     'license_fee'              => $license_fee,
        //                     'waste_removal_fee'        => $waste_removal_fee,
        //                     'development_disaster_fee' => $development_disaster_fee,
        //                     'total'                    => $total
        //                 ];
        //             }

        //             $results[] = [
        //                 'floor_type'               => 'مجموع الأدوار',
        //                 'road_occupation_fee'      => 0,
        //                 'license_fee'              => 0,
        //                 'waste_removal_fee'        => 0,
        //                 'development_disaster_fee' => 0,
        //                 'total'                    => $totalAllFloors
        //             ];


        //             return response()->json($results, 200, [], JSON_UNESCAPED_UNICODE);

        //             }


}
