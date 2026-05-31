{{-- <div class="p-4 border rounded bg-white" style="direction: rtl; text-align: right; font-family: 'Times New Roman', serif;">
    <h4 class="text-center mb-3">سند قبض</h4>
    <hr>
    <p><strong>رقم السند:</strong> {{ $receipt->receipt_number ?? '-' }}</p>
    <p><strong>رقم الطلب:</strong> {{ $request->request_number ?? '-' }}</p>
    <p><strong>التاريخ:</strong> {{ \Carbon\Carbon::parse($receipt->created_at)->format('d-m-Y H:i') }}</p>
    <hr>
    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border:1px solid #000; padding:6px;">طريقة الدفع</th>
                <th style="border:1px solid #000; padding:6px;">رقم المعاملة</th>
                <th style="border:1px solid #000; padding:6px;">المبلغ المدفوع</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border:1px solid #000; padding:6px;">{{ $receipt->payment_method ?? '-' }}</td>
                <td style="border:1px solid #000; padding:6px;">{{ $receipt->transaction_number ?? '-' }}</td>
                <td style="border:1px solid #000; padding:6px;">{{ number_format($receipt->payment_amount, 2) }} ر.ي</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <p><strong>أُصدر بواسطة:</strong> {{ $receipt->issued_by ?? '-' }}</p>
    <p>تم استلام المبلغ أعلاه مقابل رسوم طلب الترخيص. شكراً لاستخدامك نظام تراخيص البناء.</p>
</div> --}}


<div class="p-4 border rounded shadow-sm bg-white" style="direction: rtl; text-align: right; font-family: 'Times New Roman', serif; max-width:600px; margin:auto; background: #f9f9f9;">
    <div style="text-align:center; background:#171c31; color:white; padding:10px 0; border-radius:6px 6px 0 0;">
        <h3 style="margin:0;">سند قبض</h3>
    </div>


            <!-- العلامة المائية -->
    <img src="{{ asset('logo-watermark.png') }}" alt="علامة مائية"
         style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);
                width:714px; opacity:0.05; z-index:0; pointer-events:none;">


    <div style="padding:15px;">
        <p><strong>رقم السند:</strong> {{ $receipt->receipt_number ?? '-' }}</p>
        <p><strong>رقم الطلب:</strong> {{ $request->request_number ?? '-' }}</p>
        <p><strong>اسم صاحب الطلب:</strong> {{ $request->beneficiary_name ?? '-' }}</p>
        <p><strong>التاريخ:</strong> {{ \Carbon\Carbon::parse($receipt->created_at)->format('d-m-Y H:i') }}</p>
        <hr>
        <table style="width:100%; border-collapse: collapse; margin-bottom:15px;">
            <thead style="background:#e9ecef;">
                <tr>
                    <th style="border:1px solid #000; padding:8px;">طريقة الدفع</th>
                    <th style="border:1px solid #000; padding:8px;">رقم المعاملة</th>
                    <th style="border:1px solid #000; padding:8px;">المبلغ المدفوع</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border:1px solid #000; padding:8px;">{{ $receipt->payment_method ?? '-' }}</td>
                    <td style="border:1px solid #000; padding:8px;">{{ $receipt->transaction_number ?? '-' }}</td>
                    <td style="border:1px solid #000; padding:8px;">{{ number_format($receipt->payment_amount, 2) }} ر.ي</td>
                </tr>
            </tbody>
        </table>
        <<p><strong>أُصدر بواسطة:</strong> {{ $issuedBy ?? '-' }}</p>
        <p style="margin-top:15px;">تم استلام المبلغ أعلاه مقابل رسوم طلب الترخيص. شكراً لاستخدامك نظام تراخيص البناء.</p>
    </div>
</div>
