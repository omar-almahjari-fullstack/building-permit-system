<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SummaryReportController extends Controller
{
    /* ---------- القوائم المنسدلة ---------- */
    public function getEmployees()
    {
        $data = DB::table('users')->where('is_active', 1)
                  ->select('id', 'name')->orderBy('name')->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function getDirectorates()
    {
        $data = DB::table('directorates')->where('is_active', 1)
                  ->select('id', 'name')->orderBy('name')->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function getLicenseTypes()
    {
        $data = DB::table('license_types')->where('is_active', 1)
                  ->select('id', 'name')->orderBy('name')->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function getStatuses()
    {
        $data = DB::table('request_statuses')->where('is_active', 1)
                  ->select('id', 'name')->orderBy('name')->get();
        return response()->json(['success' => true, 'data' => $data]);
    }

    /* ---------- إحصائيات أولية ---------- */
    public function getInitialStats()
    {
        $total     = DB::table('requests')->count();
        $completed = DB::table('requests')->where('status_id', 8)->count();
        $pending   = DB::table('requests')->where('status_id', 2)->count();
        $rejected  = DB::table('requests')->where('status_id', 4)->count();

        return response()->json([
            'success' => true,
            'stats'   => compact('total', 'completed', 'pending', 'rejected')
        ]);
        
    }

/* الرسم البياني الأولي – شهرياً حسب الحالة */
public function getInitialCharts()
{
    $months = DB::table('requests')
                ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month")
                ->groupBy('month')->orderBy('month')
                ->pluck('month');

    $completed = DB::table('requests')
                   ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month, COUNT(*) as count")
                   ->where('status_id', 8)
                   ->groupBy('month')->orderBy('month')
                   ->pluck('count', 'month');

    $pending = DB::table('requests')
                 ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month, COUNT(*) as count")
                 ->where('status_id', 2)
                 ->groupBy('month')->orderBy('month')
                 ->pluck('count', 'month');

    $rejected = DB::table('requests')
                  ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month, COUNT(*) as count")
                  ->where('status_id', 4)
                  ->groupBy('month')->orderBy('month')
                  ->pluck('count', 'month');

    return response()->json([
        'success' => true,
        'barChart' => [
            'labels' => $months,
            'completed' => $completed,
            'pending'   => $pending,
            'rejected'  => $rejected
        ],
        'requestsByType' => $this->requestsByType() // نحتفظ بالدائري
    ]);
}

/* نفس الفكرة داخل التصفية */
public function filterCharts(Request $r)
{
    $q = DB::table('requests');

    if ($r->employeeFilter && $r->employeeFilter !== '*') {
        $q->where('assigned_to', $r->employeeFilter);
    }
    if ($r->region && $r->region !== '*') {
        $q->where('directorate_id', $r->region);
    }
    if ($r->reportType && $r->reportType !== '*') {
        $q->where('license_type_id', $r->reportType);
    }
    if ($r->status && $r->status !== '*') {
        $q->where('status_id', $r->status);
    }
    if ($r->startDate) {
        $q->whereDate('created_at', '>=', $r->startDate);
    }
    if ($r->endDate) {
        $q->whereDate('created_at', '<=', $r->endDate);
    }

    /* الإحصائيات العامة */
    $total     = $q->count();
    $completed = (clone $q)->where('status_id', 8)->count();
    $pending   = (clone $q)->where('status_id', 2)->count();
    $rejected  = (clone $q)->where('status_id', 4)->count();

    /* البيانات الشهرية لكل حالة */
    $months = (clone $q)
              ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month")
              ->groupBy('month')->orderBy('month')
              ->pluck('month');

    $completedMonthly = (clone $q)
        ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month, COUNT(*) as count")
        ->where('status_id', 8)
        ->groupBy('month')->orderBy('month')
        ->pluck('count', 'month');

    $pendingMonthly = (clone $q)
        ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month, COUNT(*) as count")
        ->where('status_id', 2)
        ->groupBy('month')->orderBy('month')
        ->pluck('count', 'month');

    $rejectedMonthly = (clone $q)
        ->selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month, COUNT(*) as count")
        ->where('status_id', 4)
        ->groupBy('month')->orderBy('month')
        ->pluck('count', 'month');

    /* الدائري (نحافظ عليه كما هو) */
    $byType = (clone $q)
              ->join('request_types', 'requests.request_type_id', '=', 'request_types.id')
              ->selectRaw('request_types.name as type, COUNT(*) as count')
              ->groupBy('request_types.name')
              ->pluck('count', 'type');

    return response()->json([
        'success' => true,
        'stats'   => compact('total', 'completed', 'pending', 'rejected'),
        'barChart'=> [
            'labels'    => $months,
            'completed' => $completedMonthly,
            'pending'   => $pendingMonthly,
            'rejected'  => $rejectedMonthly
        ],
        'requestsByType' => $byType
    ]);
}

/* استخراج الدائري (للإعادة) */
private function requestsByType()
{
    return DB::table('requests')
             ->join('request_types', 'requests.request_type_id', '=', 'request_types.id')
             ->selectRaw('request_types.name as type, COUNT(*) as count')
             ->groupBy('request_types.name')
             ->pluck('count', 'type');
}

    /* ---------- جدول أداء الموظفين ---------- */
    public function getEmployeesPerformance(Request $r)
    {
        /* استعلام فرعي يحسب الإحصائيات لكل موظف */
        $stats = DB::table('requests')
                   ->selectRaw('assigned_to,
                                COUNT(*) AS total,
                                SUM(CASE WHEN status_id = 8 THEN 1 ELSE 0 END) AS completed,
                                SUM(CASE WHEN status_id = 2 THEN 1 ELSE 0 END) AS pending,
                                ROUND(AVG(DATEDIFF(updated_at, created_at)), 1) AS avg_days')
                   ->whereNotNull('assigned_to')
                   ->groupBy('assigned_to');

        /* نطبق الفلاتر نفسها على الاستعلام الفرعي */
        if ($r->region && $r->region !== '*') {
            $stats->where('directorate_id', $r->region);
        }
        if ($r->status && $r->status !== '*') {
            $stats->where('status_id', $r->status);
        }
        if ($r->startDate) {
            $stats->whereDate('created_at', '>=', $r->startDate);
        }
        if ($r->endDate) {
            $stats->whereDate('created_at', '<=', $r->endDate);
        }

        /* ربط الإحصائيات بجدول المستخدمين */
        $data = DB::table('users')
                  ->joinSub($stats, 's', 'users.id', '=', 's.assigned_to')
                  ->select('users.name',
                           's.total',
                           's.completed',
                           's.pending',
                           's.avg_days',
                           DB::raw('ROUND(s.completed / s.total * 100, 0) AS percentage'))
                  ->get()
                  ->map(function ($item) {
                      $full  = floor($item->percentage / 20);
                      $empty = 5 - $full;
                      $item->stars = str_repeat('★', $full) . str_repeat('☆', $empty);
                      return $item;
                  });

        return response()->json(['success' => true, 'data' => $data]);
    }
}