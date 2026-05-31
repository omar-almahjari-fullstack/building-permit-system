<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
public function showChartsReport(Request $request)
{
    $query = DB::table('requests')
        ->join('users', 'users.id', '=', 'requests.assigned_to')
        ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
        ->join('request_statuses', 'request_statuses.id', '=', 'requests.status_id')
        ->join('license_types', 'license_types.id', '=', 'requests.license_type_id');

    // 🟢 تطبيق الفلاتر حسب الفورم
    if ($request->employeeFilter) {
        $query->where('users.id', $request->employeeFilter);
    }

    if ($request->reportType) {
        $query->where('license_types.id', $request->reportType); // ⚠️ الأفضل ID بدل name
    }

    if ($request->status) {
        $query->where('request_statuses.id', $request->status);
    }

    if ($request->timePeriod == 'month') {
        $query->whereMonth('requests.created_at', now()->month);
    } elseif ($request->timePeriod == 'quarter') {
        $query->whereRaw('QUARTER(requests.created_at) = QUARTER(CURDATE())');
    } elseif ($request->timePeriod == 'year') {
        $query->whereYear('requests.created_at', now()->year);
    } elseif ($request->timePeriod == 'custom' && $request->startDate && $request->endDate) {
        $query->whereBetween('requests.created_at', [$request->startDate, $request->endDate]);
    }

    if ($request->region) {
        $query->where('requests.directorate_id', $request->region);
    }

    // 🟢 Monthly Requests (مع نفس الفلاتر)
    $monthlyRequests = (clone $query)
        ->selectRaw('MONTH(requests.created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->pluck('total', 'month');

    // 🟢 Requests By Type (مع نفس الفلاتر)
    $requestsByType = (clone $query)
        ->join('request_types as rt', 'rt.id', '=', 'requests.request_type_id')
        ->select('rt.name', DB::raw('COUNT(*) as total'))
        ->groupBy('rt.name')
        ->pluck('total', 'rt.name');

    return response()->json([
        'monthlyRequests' => $monthlyRequests,
        'requestsByType' => $requestsByType,
    ]);
}

}
