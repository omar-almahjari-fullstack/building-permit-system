<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function showChartsReport(Request $request)
    {
        $q = DB::table('requests')
             ->join('users', 'users.id', '=', 'requests.assigned_to')
             ->join('license_types', 'license_types.id', '=', 'requests.license_type_id')
             ->join('request_statuses', 'request_statuses.id', '=', 'requests.status_id')
             ->join('directorates', 'directorates.id', '=', 'requests.directorate_id');

        if ($request->employeeFilter && $request->employeeFilter != '*') {
            $q->where('requests.assigned_to', $request->employeeFilter);
        }
        if ($request->reportType && $request->reportType != '*') {
            $q->where('requests.license_type_id', $request->reportType);
        }
        if ($request->region && $request->region != '*') {
            $q->where('requests.directorate_id', $request->region);
        }
        if ($request->status && $request->status != '*') {
            $q->where('requests.status_id', $request->status);
        }
        if ($request->timePeriod) {
            switch ($request->timePeriod) {
                case 'month':  $q->whereMonth('requests.created_at', now()->month); break;
                case 'quarter':$q->whereRaw('QUARTER(requests.created_at) = QUARTER(CURDATE())'); break;
                case 'year':   $q->whereYear('requests.created_at', now()->year); break;
                case 'custom':
                    if ($request->startDate && $request->endDate) {
                        $q->whereBetween('requests.created_at', [$request->startDate, $request->endDate]);
                    }
                    break;
            }
        }

        // الأرقام الإجمالية
        $totalRequests     = $q->count();
        $completedRequests = (clone $q)->where('requests.status_id', 8)->count();
        $pendingRequests   = (clone $q)->where('requests.status_id', 2)->count();
        $rejectedRequests  = (clone $q)->where('requests.status_id', 4)->count();

        // الطلبات الشهرية
        $monthlyRequests = (clone $q)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month');

        // الطلبات حسب نوع الترخيص
        $requestsByType = (clone $q)
            ->select('license_types.name', DB::raw('COUNT(*) as total'))
            ->groupBy('license_types.name')
            ->pluck('total', 'license_types.name');

        // أداء الموظفين
        $employeePerformance = (clone $q)
            ->select(
                'users.name as employee',
                DB::raw('COUNT(*) as total_requests'),
                DB::raw('SUM(CASE WHEN requests.status_id = 8 THEN 1 ELSE 0 END) as completed'),
                DB::raw('SUM(CASE WHEN requests.status_id = 2 THEN 1 ELSE 0 END) as pending'),
                DB::raw('ROUND(AVG(DATEDIFF(requests.updated_at, requests.created_at)), 1) as avg_days')
            )
            ->groupBy('users.id', 'users.name')
            ->get();

        return response()->json([
            'totalRequests'     => $totalRequests,
            'completedRequests' => $completedRequests,
            'pendingRequests'   => $pendingRequests,
            'rejectedRequests'  => $rejectedRequests,
            'monthlyRequests'   => $monthlyRequests,
            'requestsByType'    => $requestsByType,
            'employeePerformance'=> $employeePerformance
        ]);
    }
}