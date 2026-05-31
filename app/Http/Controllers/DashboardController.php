<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function getOrdersStats()   // default beneficiary
    {
        $beneficiaryId = auth('beneficiary')->id();


        // 1) الطلبات المعلقة (status_id = 2 = "قيد المراجعة")
        $pending = DB::table('requests')
                     ->where('beneficiary_id', $beneficiaryId)
                     ->where('status_id', 2)
                     ->count();

        // 2) الطلبات المكتملة (status_id = 8 = "مكتمل")
        $completed = DB::table('requests')
                       ->where('beneficiary_id', $beneficiaryId)
                       ->where('status_id', 8)
                       ->count();

        // 3) طلبات تحتاج تصحيح (status_id = 9 = "تحت التعديل")
        $correction = DB::table('requests')
                        ->where('beneficiary_id', $beneficiaryId)
                        ->where('status_id', 9)
                        ->count();

        // 4) متوسط عدد الأيام من الإنشاء إلى الانتهاء
        $avgDays = DB::table('requests')
                     ->select(DB::raw('AVG(DATEDIFF(IFNULL(updated_at, NOW()), created_at)) as avg'))
                     ->where('beneficiary_id', $beneficiaryId)
                     ->whereNotNull('updated_at')
                     ->value('avg') ?? 0;

        return response()->json([
            'success'        => true,
            'pending'        => $pending,
            'completed'      => $completed,
            'correction'     => $correction,
            'avg_days'       => round($avgDays, 0),
        ]);
    }



    // جدول الطلبات الحديثة (الطلبات التي تم إضافتها في اليوم الحالي أو الأسابيع الأخيرة)

    public function getRecentOrders( $limit = 5)
    {
        $beneficiaryId = auth('beneficiary')->id();


        $orders = DB::table('requests')
            ->select(
                'requests.id',
                'requests.request_number',
                'request_types.name as type_name',
                'requests.created_at',
                'request_statuses.name as status_name',
                'request_statuses.id as status_id'
            )
            ->join('request_types', 'requests.request_type_id', '=', 'request_types.id')
            ->join('request_statuses', 'requests.status_id', '=', 'request_statuses.id')
            ->where('requests.beneficiary_id', $beneficiaryId)
            ->orderBy('requests.created_at', 'desc')
            ->limit($limit)
            ->get();

        // ترجمة الأرقام إلى CSS classes
        foreach ($orders as $o) {
            switch ($o->status_id) {
                case 1:  $o->css = 'pending';   break; // مسجل
                case 2:  $o->css = 'pending';   break; // قيد المراجعة
                case 8:  $o->css = 'approved';  break; // مكتمل
                case 4:  $o->css = 'rejected';  break; // مرفوض
                case 9:  $o->css = 'warning';   break; // تحت التعديل
                default: $o->css = 'pending';
            }
        }

        return response()->json([
            'success' => true,
            'orders'  => $orders
        ]);
    }

    // DashboardController.php
    public function getChartData()
    {

        $beneficiaryId = auth('beneficiary')->id();


        $labels = [];
        $submitted = [];
        $completed = [];

        // آخر 10 أشهر
        for ($i = 9; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $month = $date->format('Y-m');

            // الطلبات المقدمة في هذا الشهر
            $submittedCount = DB::table('requests')
                ->where('beneficiary_id', $beneficiaryId)
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            // الطلبات المكتملة في هذا الشهر
            $completedCount = DB::table('requests')
                ->where('beneficiary_id', $beneficiaryId)
                ->where('status_id', 8) // مكتمل
                ->whereYear('updated_at', $date->year)
                ->whereMonth('updated_at', $date->month)
                ->count();

            $labels[] = $date->format('M Y'); // مثل: "Oct 2023"
            $submitted[] = $submittedCount;
            $completed[] = $completedCount;
        }

        return response()->json([
            'success'   => true,
            'labels'    => $labels,
            'submitted' => $submitted,
            'completed' => $completed,
        ]);
    }


    // لوحة التحكم
}
