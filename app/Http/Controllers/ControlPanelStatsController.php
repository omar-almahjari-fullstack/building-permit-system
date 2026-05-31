<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ControlPanelStatsController extends Controller
{
    public function getStats()
    {
    //    if (auth()->check()) {
    //         $beneficiaryId = auth()->id();
    //     } else {
    //         // تعامل مع الحالة إذا لم يكن هناك مستخدم مسجّل
    //     }


        $beneficiaryId = auth('beneficiary')->id();


        $name = DB::table('beneficiaries')
                  ->where('id', $beneficiaryId)
                  ->value('name') ?? 'ضيف';

        // رخص
        $expired     = DB::table('licenses')
                         ->join('requests', 'licenses.request_id', '=', 'requests.id')
                         ->where('requests.beneficiary_id', $beneficiaryId)
                         ->whereDate('licenses.expiry_date', '<', now())
                         ->count();

        $valid       = DB::table('licenses')
                         ->join('requests', 'licenses.request_id', '=', 'requests.id')
                         ->where('requests.beneficiary_id', $beneficiaryId)
                         ->whereDate('licenses.expiry_date', '>', now())
                         ->where('licenses.is_active', 1)
                         ->count();

        $soon        = DB::table('licenses')
                         ->join('requests', 'licenses.request_id', '=', 'requests.id')
                         ->where('requests.beneficiary_id', $beneficiaryId)
                         ->whereBetween('licenses.expiry_date', [now(), now()->addDays(30)])
                         ->count();

        $stopped     = DB::table('licenses')
                         ->join('requests', 'licenses.request_id', '=', 'requests.id')
                         ->where('requests.beneficiary_id', $beneficiaryId)
                         ->where('licenses.is_active', 0)
                         ->count();

        // طلبات
        $paid        = DB::table('requests')
                         ->where('beneficiary_id', $beneficiaryId)
                         ->where('status_id', 8) // مكتمل
                         ->count();

        $inProcess   = DB::table('requests')
                         ->where('beneficiary_id', $beneficiaryId)
                         ->whereIn('status_id', [2, 3]) // تحت الإجراء
                         ->count();

        $waitingPay  = DB::table('requests')
                         ->where('beneficiary_id', $beneficiaryId)
                         ->where('status_id', 7) // جاهز للدفع
                         ->count();

        $notes       = DB::table('requests')
                         ->where('beneficiary_id', $beneficiaryId)
                         ->where('status_id', 9) // عليها ملاحظات
                         ->count();

        // تقويم أحداث اليوم
        $today = now()->format('Y-m-d');
        $events = [
            'requests' => DB::table('requests')
                            ->where('beneficiary_id', $beneficiaryId)
                            ->whereDate('created_at', $today)
                            ->pluck('request_number')
                            ->toArray(),
            'meetings' => [], // يمكنك ربطها بجدول events إن وجد
        ];

        return response()->json([
            'success'    => true,
            'name'       => $name,
            'licenses'   => [
                'expired' => $expired,
                'valid'   => $valid,
                'soon'    => $soon,
                'stopped' => $stopped,
            ],
            'requests'   => [
                'paid'       => $paid,
                'inProcess'  => $inProcess,
                'waitingPay' => $waitingPay,
                'notes'      => $notes,
            ],
            'events'     => $events,
        ]);
    }

    public function getChartData()
{

            $beneficiaryId = auth('beneficiary')->id();

    // آخر 6 أشهر
    $months = [];
    $submitted = [];
    $completed = [];

    for ($i = 5; $i >= 0; $i--) {
        $date = now()->subMonths($i);
        $month = $date->format('M Y'); // عربي أو إنجليزي حسب اللغة

        $submitted[] = DB::table('requests')
                          ->where('beneficiary_id', $beneficiaryId)
                          ->whereYear('created_at', $date->year)
                          ->whereMonth('created_at', $date->month)
                          ->count();

        // $completed[] = DB::table('requests')
        //                  ->where('beneficiary_id', $beneficiaryId)
        //                  ->where('status_id', 8) // مكتمل
        //                  ->whereYear('updated_at', $date->year)
        //                  ->whereMonth('updated_at', $date->month)
        //                  ->count();
        $completed[] = DB::table('requests')
                 ->where('beneficiary_id', $beneficiaryId)
                 ->where('status_id', 8)
                 ->whereYear('created_at', $date->year)
                 ->whereMonth('created_at', $date->month)
                 ->count();

        $months[] = $month;
    }

    return response()->json([
        'success'   => true,
        'labels'    => $months,
        'submitted' => $submitted,
        'completed' => $completed,
    ]);
}

// جدول اخر التحديثات
// ControlPanelStatsController.php
public function getLatestUpdates(Request $request)
{
    $beneficiaryId = auth('beneficiary')->id();

    $filter = $request->filter ?? 'all'; // all | pending | approved | cancelled | waiting | notes

    $query = DB::table('requests')
        ->select(
            'requests.id',
            'requests.request_number',
            'requests.created_at',
            'requests.updated_at',
            'request_types.name as type_name',
            'request_statuses.name as status_name',
            'request_statuses.id as status_id',
            'governorates.name as governorate_name',
            'directorates.name as directorate_name'
        )
        ->join('request_types',    'requests.request_type_id', '=', 'request_types.id')
        ->join('request_statuses', 'requests.status_id',       '=', 'request_statuses.id')
        ->join('directorates',     'requests.directorate_id',  '=', 'directorates.id')
        ->join('governorates',     'directorates.governorate_id', '=', 'governorates.id')
        ->where('requests.beneficiary_id', $beneficiaryId);

    switch ($filter) {
        case 'pending':   $query->whereIn('requests.status_id', [2,3]);     break;
        case 'approved':  $query->where('requests.status_id', 8);          break;
        case 'cancelled': $query->where('requests.status_id', 4);          break;
        case 'waiting':   $query->where('requests.status_id', 7);          break;
        case 'notes':     $query->where('requests.status_id', 9);          break;
        default:          // all
    }

    $updates = $query->orderBy('requests.updated_at', 'desc')
                     ->limit(20)
                     ->get();

    // ترجمة الحالة إلى CSS class
    foreach ($updates as $row) {
        switch ($row->status_id) {
            case 2:  $row->css = 'pending';   break;
            case 3:  $row->css = 'pending';   break;
            case 8:  $row->css = 'approved';  break;
            case 4:  $row->css = 'cancelled'; break;
            case 7:  $row->css = 'waiting';   break;
            case 9:  $row->css = 'notes';     break;
            default: $row->css = 'pending';
        }
    }

    return response()->json([
        'success' => true,
        'updates' => $updates
    ]);
}


// الرخص
public function getLicenses(Request $r)
{
            $beneficiaryId = auth('beneficiary')->id();


    try {
        $data = DB::table('licenses')
            ->join('requests', 'licenses.request_id', '=', 'requests.id')
            ->where('requests.beneficiary_id', $beneficiaryId)
            ->select('licenses.id', 'licenses.license_number', 'licenses.issue_date', 'licenses.expiry_date', 'licenses.is_active')
            ->orderBy('licenses.issue_date', 'desc')
            ->limit(20)
            ->get();

        return response()->json(['success' => true, 'items' => $data]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

// الطلبات (نفس الدالة السابقة)
// public function getLatestUpdates(Request $r) { /* موجودة أعلاه */ }

// الفواتير
public function getInvoices(Request $r) {
    $beneficiaryId = auth('beneficiary')->id();
    return DB::table('invoices')
        ->join('requests', 'invoices.request_id', '=', 'requests.id')
        ->where('requests.beneficiary_id', $beneficiaryId)
        ->select('invoices.id','invoices.invoice_number','invoices.total_amount','invoices.status','invoices.issued_at')
        ->orderBy('invoices.issued_at','desc')
        ->get();
}

// الملاحظات
public function getComments(Request $r) {

    $beneficiaryId = auth('beneficiary')->id();

    return DB::table('support_tickets')
        ->where('user_id', $beneficiaryId)
        ->select('id','title','ticket_type','priority','status','created_at')
        ->orderBy('created_at','desc')
        ->get();
}

}
