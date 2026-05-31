<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

        // معلومات الدفع/الفاتورة لطلب محدد
    public function info($requestId)
    {
        $requestId = (int) $requestId;

        // تفاصيل الطلب والمستفيد
        $req = DB::table('requests')
            ->leftJoin('beneficiaries', 'requests.beneficiary_id', '=', 'beneficiaries.id')
            ->select('requests.request_number', 'beneficiaries.name as beneficiary_name', 'beneficiaries.mobile as beneficiary_mobile')
            ->where('requests.id', $requestId)
            ->first();

        // الفاتورة المرتبطة بالطلب
        $invoice = DB::table('invoices')->where('request_id', $requestId)->first();

        // تفاصيل الفاتورة (اختياري للعرض)
        $details = $invoice
            ? DB::table('invoice_details')->where('invoice_id', $invoice->id)->get()
            : collect();

        return response()->json([
            'request_id'        => $requestId,
            'request_number'    => $req->request_number ?? null,
            'beneficiary_name'  => $req->beneficiary_name ?? null,
            'beneficiary_mobile'=> $req->beneficiary_mobile ?? null,
            'invoice_number'    => $invoice->invoice_number ?? null,
            'invoice_status'    => $invoice->status ?? 'غير مدفوعة',
            'invoice_total'     => $invoice->total_amount ?? 0,   // 🔹 يعرض مباشرة العمود total_amount
            'unpaid_total'      => $invoice->total_amount ?? 0,   // 🔹 نفس القيمة لحقل pay_unpaid_total
            'invoice_details'   => $details,
            'has_invoice'       => $invoice ? true : false,
        ]);
    }
    // معالجة الدفع


    public function charge(Request $request)
    {
            $request->validate([
                'request_id'     => 'required|integer',
                'payment_method' => 'required|string',
            ]);

            $requestId     = (int) $request->input('request_id');
            $paymentMethod = $request->input('payment_method');
            $userId        = auth()->id() ?? 1;

            $txnId = null;
            if ($paymentMethod === 'تحويل بنكي') {
                $request->validate([
                    'bank_name'    => 'required|string|min:3',
                    'transfer_ref' => 'required|string|min:5',
                ]);
                $txnId = trim($request->transfer_ref);

                // منع تكرار الحوالة
                $exists = DB::table('payment_receipts')->where('transaction_id', $txnId)->exists();
                if ($exists) {
                    return response()->json(['success' => false, 'message' => 'رقم الحوالة مستخدم مسبقاً'], 409);
                }
            }

            // جلب الفاتورة
            $invoice = DB::table('invoices')->where('request_id', $requestId)->first();
            if (!$invoice) {
                return response()->json(['success' => false, 'message' => 'لا توجد فاتورة لهذا الطلب'], 422);
            }
            if ($invoice->status === 'مدفوعة') {
                return response()->json(['success' => false, 'message' => 'الفاتورة مدفوعة مسبقاً'], 409);
            }

            // هنا ناخذ المبلغ من جدول الفواتير مباشرة
            $amount = (float) $invoice->total_amount;
            if ($amount <= 0) {
                return response()->json(['success' => false, 'message' => 'قيمة الفاتورة غير صالحة'], 422);
            }

            // رقم الطلب للعرض
            $req = DB::table('requests')->where('id', $requestId)->first();
            $requestNumber = $req->request_number ?? ('REQ-' . $requestId);

            DB::beginTransaction();
            try {
                // تحديث حالة الفاتورة إلى مدفوعة
                DB::table('invoices')->where('id', $invoice->id)->update([
                    'status'     => 'مدفوعة',
                    'updated_at' => now(),
                ]);

                // إنشاء سند قبض
                $receiptNumber = 'RC' . time() . rand(100, 999);
                $receiptId = DB::table('payment_receipts')->insertGetId([
                    'request_id'     => $requestId,
                    'payment_amount' => $amount,
                    'payment_method' => $paymentMethod,
                    'transaction_id' => $txnId,
                    'receipt_number' => $receiptNumber,
                    'sent_status'    => 'sent',
                    'sent_via'       => 'platform',
                    'issued_by'      => $userId,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);

                // تفاصيل السند من invoice_details
                $details = DB::table('invoice_details')->where('invoice_id', $invoice->id)->get();
                foreach ($details as $det) {
                    DB::table('receipt_details')->insert([
                        'receipt_id' => $receiptId,
                        'fee_type'   => $det->floor_type, // نوع الدور
                        'amount'     => $det->total,      // نفس المبلغ المخزن بالتفاصيل
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                // تحديث حالة الطلب إلى مكتمل
                $completedStatusId = DB::table('request_statuses')->where('name', 'مكتمل')->value('id');
                if ($completedStatusId) {
                    DB::table('requests')->where('id', $requestId)->update([
                        'status_id'  => $completedStatusId,
                        'updated_at' => now(),
                    ]);
                }

                DB::commit();

                return response()->json([
                    'success'        => true,
                    'message'        => 'تم الدفع بنجاح',
                    'receipt_number' => $receiptNumber,
                    'paid_amount'    => $amount,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'خطأ أثناء عملية الدفع: ' . $e->getMessage(),
                ], 500);
            }
    }




    
}
