<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectorateController extends Controller
{
    public function getAll()
    {
        try {
            $data = DB::table('directorates')->select('id', 'name')->get();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getRequestType()
   {
       try {
             $data = DB::table('request_types')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }

     public function getlicenseType()
     {
       try {
             $data = DB::table('license_types')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
     }

    public function getDepartment()
    {
         try {
                 $data = DB::table('departments')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
         }
    }

 public function getStatus()
   {
       try {
             $data = DB::table('request_statuses')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }

    public function getusers()
   {
       try {
             $data = DB::table('users')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }

 public function getCurrentStage()
   {
       try {
             $data = DB::table('workflow_stages')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }


 public function getBuildingType()
   {
       try {
             $data = DB::table('building_types')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }

  public function getfloor_type()
   {
       try {
             $data = DB::table('floor_types')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }







   /////////حقل اضافة مديريات

   public function get_street_type()
   {
       try {
             $data = DB::table('street_types')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }

     public function get_governorate()
   {
       try {
             $data = DB::table('governorates')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }


   
   /////////حقل اضافة اقسام

   public function directorates_street_type()
   {
       try {
             $data = DB::table('street_types')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }

     public function get_directorates()
   {
       try {
             $data = DB::table('directorates')->select('id', 'name')->get();
             return response()->json($data);
       } catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
       }
   }



}
