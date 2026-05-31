{{-- @if ($pdfUrl)
    <div class="document-container" style="width:100%; height:100vh; padding:0; margin:0;">
        <iframe src="{{ $pdfUrl }}" width="100%" height="100%" style="border:none;"></iframe>
    </div>
@endif


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>رخصة بناء - وزارة الأشغال العامة</title>
    <style>
        /* نفس ستايل الصفحة التي أرسلتها */
        :root {
            --navy-blue: #001a33;
            --gold: #d4af37;
            --light-gold: #f5e6c8;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            padding: 10px;
            color: #333;
            line-height: 1.4;
            font-size: 13px;
            min-width: 900px;
            position: relative;
            direction: rtl;
        }

        .document-container {
            width: 880px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            border: 1px solid #e0e0e0;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--gold);
            padding-bottom: 8px;
            margin-bottom: 15px;
            width: 840px;
        }

        .header img {
            height: 50px;
            width: auto;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            color: var(--navy-blue);
            margin: 0 10px;
            width: 100%;
        }

        .section-title {
            background: var(--navy-blue);
            color: white;
            padding: 5px 10px;
            margin: 15px 0 8px;
            font-size: 14px;
            font-weight: 500;
            border-right: 3px solid var(--gold);
            width: 840px;
        }

        .info-box {
            border: 1px solid #e0e0e0;
            padding: 10px;
            margin-bottom: 12px;
            ;
            border-top: 2px solid var(--navy-blue);
            width: 410px;
        }

        .doc-preview {
            height: 140px;
            width: 270px;
            ;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            position: relative;
            font-size: 12px;
        }

        .doc-preview::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 26, 51, 0.02) 0%, rgba(212, 175, 55, 0.02) 100%);
        }

        table {
            width: 270px;
            margin: 8px 0;
            border-collapse: collapse;
            font-size: 12px;
        }

        table th {
            background: var(--navy-blue);
            color: white;
            padding: 6px;
            font-weight: 500;
        }

        table td {
            padding: 6px;
            border: 1px solid #e0e0e0;
        }

        .gold-text {
            color: var(--gold);
            font-weight: 500;
        }

        .row {
            display: flex;
            flex-wrap: nowrap;
            width: 840px;
        }

        .col-md-6 {
            width: 420px;
        }
    </style>
</head>

<body>
    <div class="document-container">
        <div class="header">
            <img src="/images/logo-left.png" alt="شعار الوزارة">
            <div class="title">رخصة بناء <span class="gold-text">| وزارة الأشغال العامة</span></div>
            <img src="/images/logo-right.png" alt="شعار البلدية">
        </div>

        <!-- العلامة المائية -->
        <img src="{{ asset('logo-watermark.png') }}" alt="علامة مائية"
            style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);
                width:814px; opacity:0.05; z-index:0; pointer-events:none;">

        <div class="row">
            <div class="col-md-6 info-box">
                <p><strong>نوع الطلب:</strong> إصدار رخصة بناء</p>
                <p><strong>الأمانة:</strong> {{ $location->municipality ?? '-' }}</p>
                <p><strong>البلدية:</strong> {{ $location->district ?? '-' }}</p>
            </div>
            <div class="col-md-6 info-box">
                <p><strong>رقم الرخصة:</strong> <span class="gold-text">{{ $license->license_number ?? '-' }}</span></p>
                <p><strong>حالة الرخصة:</strong> <span
                        style="color:{{ $license->is_active ? '#28a745' : '#dc3545' }}">{{ $license->is_active ? 'سارية' : 'منتهية' }}</span>
                </p>
                <p><strong>تاريخ الإصدار:</strong> {{ $license->issue_date }}</p>
                <p><strong>تاريخ الانتهاء:</strong> {{ $license->expiry_date }}</p>
            </div>
        </div>

        <div class="section-title">معلومات أساسية</div>
        <div class="row info-box">
            <div class="col-md-6">
                <p><strong>صاحب الرخصة:</strong> {{ $request->beneficiary_name ?? '-' }}</p>
                <p><strong>نوع الملكية:</strong> {{ $license->facade_type ?? '-' }}</p>
                <p><strong>الحي:</strong> {{ $location->neighborhood_unit ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>نوع البناء:</strong> {{ $license->building_type_id ?? '-' }}</p>
                <p><strong>الاستخدام:</strong> {{ $license->main_usage ?? '-' }}</p>
                <p><strong>المهندس:</strong> م. عبدالله يحيى</p>
            </div>
        </div>

        <div class="section-title">الوثائق والمخططات</div>
        <div class="row">
            <div class="col-md-4">
                <div class="doc-title">الواجهة المعمارية</div>
                @if ($attachments && $attachments->architectural_plan_url)
                    <img src="{{ $attachments->architectural_plan_url }}" alt="مخطط معماري"
                        style="width:100%; max-height:90vh; object-fit:contain; border:1px solid #ccc;">
                @endif

            </div>

            <div class="col-md-4">
                <div class="doc-title">الموقع العام</div>
                <div class="doc-preview">
                    @if ($attachments && $attachments->site_image_url)
                        <a href="{{ $attachments->site_image_url }}" target="_blank">معاينة الوثيقة</a>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="doc-title">خريطة الموقع</div>
                <div class="doc-preview">
                    @if ($attachments && $attachments->structural_plan_url)
                        <a href="{{ $attachments->structural_plan_url }}" target="_blank">معاينة الوثيقة</a>
                    @endif
                </div>
            </div>
        </div>

        <p><strong>المهندس أو الموظف المصدِر:</strong> {{ $issued_by->name ?? '-' }}</p>

    </div>
</body>

</html> --}}



<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>رخصة بناء - وزارة الأشغال العامة</title>
</head>
<body style="direction: rtl; font-family:'Tajawal',sans-serif; background:#f9f9f9; padding:10px; color:#333; line-height:1.4; font-size:13px; min-width:900px; position:relative;">

<div style="width:880px; margin:0 auto; background:rgba(255,255,255,0.9); box-shadow:0 0 10px rgba(0,0,0,0.05); padding:20px; border:1px solid #e0e0e0; position:relative;">

    <!-- الهيدر -->
    <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:2px solid #d4af37; padding-bottom:8px; margin-bottom:15px; width:840px;">
        <img src="/images/logo-left.png" alt="شعار الوزارة" style="height:50px; width:auto;">
        <div style="text-align:center; font-size:18px; font-weight:700; color:#001a33; margin:0 10px; width:100%;">
            رخصة بناء <span style="color:#d4af37; font-weight:500;">| وزارة الأشغال العامة</span>
        </div>
        <img src="/images/logo-right.png" alt="شعار البلدية" style="height:50px; width:auto;">
    </div>

    <!-- العلامة المائية -->
        <img src="{{ asset('logo-watermark.png') }}" alt="علامة مائية"
            style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);
                width:814px; opacity:0.05; z-index:0; pointer-events:none;">

    <!-- بيانات الطلب -->
    <div style="display:flex; flex-wrap:nowrap; width:840px;">
        <div style="border:1px solid #e0e0e0; padding:10px; margin-bottom:12px; background:white; border-top:2px solid #001a33; width:410px;">
            <p><strong>نوع الطلب:</strong> إصدار رخصة بناء</p>
            <p><strong>الأمانة:</strong> {{ $location->municipality ?? '-' }}</p>
            <p><strong>البلدية:</strong> {{ $location->district ?? '-' }}</p>
        </div>
        <div style="border:1px solid #e0e0e0; padding:10px; margin-bottom:12px; background:white; border-top:2px solid #001a33; width:410px;">
            <p><strong>رقم الرخصة:</strong> <span style="color:#d4af37; font-weight:500;">{{ $license->license_number ?? '-' }}</span></p>
            <p><strong>حالة الرخصة:</strong> <span style="color:{{ $license->is_active ? '#28a745':'#dc3545' }}">{{ $license->is_active ? 'سارية':'منتهية' }}</span></p>
            <p><strong>تاريخ الإصدار:</strong> {{ $license->issue_date }}</p>
            <p><strong>تاريخ الانتهاء:</strong> {{ $license->expiry_date }}</p>
        </div>
    </div>

    <!-- معلومات أساسية -->
    <div style="background:#001a33; color:white; padding:5px 10px; margin:15px 0 8px; font-size:14px; font-weight:500; border-right:3px solid #d4af37; width:840px;">
        معلومات أساسية
    </div>
    <div style="display:flex; flex-wrap:nowrap; width:840px; border:1px solid #e0e0e0; padding:10px; margin-bottom:12px; background:white; border-top:2px solid #001a33;">
        <div style="width:420px;">
            <p><strong>صاحب الرخصة:</strong> {{ $request->beneficiary_name ?? '-' }}</p>
            <p><strong>نوع الملكية:</strong> {{ $license->facade_type ?? '-' }}</p>
            <p><strong>الحي:</strong> {{ $location->neighborhood_unit ?? '-' }}</p>
        </div>
        <div style="width:420px;">
            <p><strong>نوع البناء:</strong> {{ $license->building_type_id ?? '-' }}</p>
            <p><strong>الاستخدام:</strong> {{ $license->main_usage ?? '-' }}</p>
            <p><strong>المهندس:</strong> م. عبدالله يحيى</p>
        </div>
    </div>
<!-- الوثائق والمخططات -->
<div style="background:#001a33; color:white; padding:5px 10px; margin:15px 0 8px; font-size:14px; font-weight:500; border-right:3px solid #d4af37; width:840px;">
    الوثائق والمخططات
</div>

<div style="display:flex; flex-wrap:nowrap; width:840px; gap:10px;">
    <!-- الواجهة المعمارية -->
    <div style="width:270px;">
        <div style="font-size:13px; font-weight:600; margin-bottom:6px;">الواجهة المعمارية</div>
        <div style="height:180px; width:100%; border:1px solid #ddd; display:flex; align-items:center; justify-content:center; background:#f8f9fa;">
            @if($attachments && $attachments->architectural_plan_url)
                <a href="{{ $attachments->architectural_plan_url }}" target="_blank">
                    <img src="{{ $attachments->architectural_plan_url }}" alt="الواجهة" style="max-width:100%; max-height:180px; object-fit:contain;">
                </a>
            @else
                <span style="color:#666; font-size:12px;">لا يوجد ملف</span>
            @endif
        </div>
    </div>

    <!-- الموقع العام -->
    <div style="width:270px;">
        <div style="font-size:13px; font-weight:600; margin-bottom:6px;">الموقع العام</div>
        <div style="height:180px; width:100%; border:1px solid #ddd; display:flex; align-items:center; justify-content:center; background:#f8f9fa;">
            @if($attachments && $attachments->site_image_url)
                <a href="{{ $attachments->site_image_url }}" target="_blank">
                    <img src="{{ $attachments->site_image_url }}" alt="الموقع العام" style="max-width:100%; max-height:180px; object-fit:contain;">
                </a>
            @else
                <span style="color:#666; font-size:12px;">لا يوجد ملف</span>
            @endif
        </div>
    </div>

    <!-- خريطة الموقع -->
    <div style="width:270px;">
        <div style="font-size:13px; font-weight:600; margin-bottom:6px;">خريطة الموقع</div>
        <div style="height:180px; width:100%; border:1px solid #ddd; display:flex; align-items:center; justify-content:center; background:#f8f9fa;">
            @if($attachments && $attachments->structural_plan_url)
                <a href="{{ $attachments->structural_plan_url }}" target="_blank">
                    <img src="{{ $attachments->structural_plan_url }}" alt="خريطة الموقع" style="max-width:100%; max-height:180px; object-fit:contain;">
                </a>
            @else
                <span style="color:#666; font-size:12px;">لا يوجد ملف</span>
            @endif
        </div>
    </div>
</div>


    <div class="license-details" style="display:flex; justify-content: space-between;">

        <div class="">
                    <!-- الحدود والأبعاد -->
            <div style="background:#001a33; color:white; padding:5px 10px; margin:15px 0 8px; font-size:14px; font-weight:500; border-right:3px solid #d4af37; width:100%;">
                الحدود والأبعاد والارتدادات
            </div>

            <table style="width:100%; border-collapse:collapse; margin-bottom:15px; font-size:12px;">
                <thead>
                    <tr style="background:#f1f1f1; text-align:center;">
                        <th style="border:1px solid #ccc; padding:6px;">الجهة</th>
                        <th style="border:1px solid #ccc; padding:6px;">الطول (م)</th>
                        <th style="border:1px solid #ccc; padding:6px;">الارتداد (م)</th>
                        <th style="border:1px solid #ccc; padding:6px;">البروز</th>
                        <th style="border:1px solid #ccc; padding:6px;">حدودها</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boundaries as $b)
                        <tr>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $b->direction }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $b->deed_length }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $b->setback }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $b->protrusion }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $b->deed_description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>


        <div class="">
                    <!-- مكونات البناء -->
            <div style="background:#001a33; color:white; padding:5px 10px; margin:15px 0 8px; font-size:14px; font-weight:500; border-right:3px solid #d4af37; width:100%;">
                عرض مكونات البناء
            </div>

            <table style="width:100%; border-collapse:collapse; margin-bottom:15px; font-size:12px;">
                <thead>
                    <tr style="background:#f1f1f1; text-align:center;">
                        <th style="border:1px solid #ccc; padding:6px;">اسم المكون</th>
                        <th style="border:1px solid #ccc; padding:6px;">عدد الأدوار</th>
                        <th style="border:1px solid #ccc; padding:6px;">عدد الوحدات</th>
                        <th style="border:1px solid #ccc; padding:6px;">الاستخدام</th>
                        <th style="border:1px solid #ccc; padding:6px;">المساحة (م²)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($components as $c)
                        <tr>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $c->floor_type_id }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $c->floors_count }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $c->units_count }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $c->usage_type }}</td>
                            <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $c->area }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



    </div>

    <!-- اسم الموظف -->
    <p style="margin-top:15px;"><strong>المهندس أو الموظف المصدِر:</strong> {{ $issued_by->name ?? '-' }}</p>

</div>


<script>
 $(document).ready(function() {
    @if($attachments && $attachments->architectural_plan_url)
        const pdfUrl = "{{ $attachments->architectural_plan_url }}";
        const canvas = document.getElementById("pdfCanvas");
        const context = canvas.getContext("2d");

        // PDF.js worker
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.14.305/pdf.worker.min.js';

        // تحميل الملف
        pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
            pdf.getPage(1).then(page => {
                const viewport = page.getViewport({ scale: 2 }); // التحكم بالحجم
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });
        });
    @endif
});
</script>


</body>
</html>



