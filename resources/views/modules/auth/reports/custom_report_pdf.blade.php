<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>تقرير مخصص</title>
<style>

h1 { font-size:18px; margin:0 0 10px; }
table { width:100%; border-collapse:collapse; margin-top:12px; }
th,td { border:1px solid #999; padding:5px 6px; font-size:11px; }
th { background:#eee; }
.summary { margin-top:10px; background:#f5f5f5; padding:8px 10px; border:1px solid #ccc; }
ul { margin:6px 0; padding-right:18px; }
li { margin-bottom:4px; }
.footer { margin-top:15px; font-size:10px; text-align:center; color:#666; }
.badge { display:inline-block; padding:2px 6px; border-radius:4px; font-size:10px; }
.status-8 { background:#1cc88a; color:#fff; }
.status-4 { background:#e74a3b; color:#fff; }
.status-9 { background:#6c757d; color:#fff; }
.status-other { background:#f6c23e; color:#222; }
</style>
</head>
<body>
<h1>التقرير المخصص</h1>
<div class="summary">
    <strong>ملخص:</strong>
    <ul style="list-style:none; padding:0; margin:6px 0;">
        <li>الإجمالي: {{ $summary['total'] }}</li>
        <li>مكتملة: {{ $summary['completed'] }}</li>
        <li>قيد التنفيذ: {{ $summary['in_progress'] }}</li>
        <li>مرفوضة: {{ $summary['rejected'] }}</li>
        <li>ملغاة: {{ $summary['cancelled'] }}</li>
        <li>نسبة الإنجاز: {{ $summary['completion_rate'] }}%</li>
        <li>متوسط مدة الإنجاز (أيام): {{ $summary['avg_duration_days'] }}</li>
    </ul>
</div>

<table>
    <thead>
        <tr>
            @foreach($headings as $h)
                <th>{{ $h }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $row)
            <tr>
                @foreach($columns as $col)
                    @php $val = $row->$col ?? ''; @endphp
                    @if($col === 'status_name' && property_exists($row,'status_id'))
                        @php
                            $cls = 'status-other';
                            if ($row->status_id == 8) $cls='status-8';
                            elseif ($row->status_id == 4) $cls='status-4';
                            elseif ($row->status_id == 9) $cls='status-9';
                        @endphp
                        <td><span class="badge {{ $cls }}">{{ $val }}</span></td>
                    @else
                        <td>{{ (is_string($val) && preg_match('/^\d{4}-\d{2}-\d{2}T/', $val)) ? \Carbon\Carbon::parse($val)->format('Y-m-d H:i') : $val }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        @if(!count($rows))
            <tr><td colspan="{{ count($headings) }}">لا توجد بيانات</td></tr>
        @endif
    </tbody>
</table>

<div class="footer">
    تاريخ التوليد: {{ now()->format('Y-m-d H:i') }} | نظام تراخيص البناء
</div>
</body>
</html>
