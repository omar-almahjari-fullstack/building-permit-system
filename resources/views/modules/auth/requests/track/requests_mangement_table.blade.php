@if (isset($datac) && $datac->count() > 0)
    @foreach ($datac as $index => $info)
        <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ $info->request_number ?? '---' }}</td> {{-- رقم الطلب --}}
            <td>{{ $info->beneficiary_name ?? '---' }}</td> {{-- اسم مقدم الطلب --}}
            <td>{{ $info->license_type_name ?? '---' }}</td> {{-- نوع الرخصة --}}
            <td>{{ $info->request_type_name ?? '---' }}</td> {{-- نوع الطلب --}}
            <td>{{ \Carbon\Carbon::parse($info->created_at)->format('Y-m-d') }}</td> {{-- تاريخ الطلب --}}
            <td>
                <span
                    class="badge
        @if ($info->status_name === 'المراجعة الفنية') bg-warning
        @elseif($info->status_name === 'قيد المراجعة') bg-warning
        @elseif($info->status_name === 'مسندة للمهندس') bg-info
        @elseif($info->status_name === 'مكتمل') bg-success
        @elseif($info->status_name === 'جاهز للدفع') bg-primary
        @elseif($info->status_name === 'موافَق عليه') bg-success
        @elseif($info->status_name === 'مرفوض') bg-danger
        @elseif($info->status_name === 'طلبات معادة') bg-secondary
        @elseif($info->status_name === 'طلبات جديدة') bg-info
        @else bg-light @endif">
                    {{ $info->status_name }}
                </span>
            </td>
            <td>
                @if ($info->status_name === 'قيد المراجعة')
                    <button type="button" class="ajax-link btn btn-sm btn-outline-primary"
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-eye"></i> عرض
                    </button>

                @elseif($info->status_name === 'المراجعة الفنية')
                    <a href="#" class="ajax-link btn btn-sm btn-outline-info"
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-gear"></i> مراجعة فنية
                    </a>

                @elseif($info->status_name === 'مسندة للمهندس')
                    <button type="button" class="ajax-link btn btn-sm" 
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-eye"></i> عرض
                    </button>

                @elseif($info->status_name === 'مكتمل')
                    <a href="#" style="display: none;" 
                       class="ajax-link btn btn-sm btn-outline-success amr_Eng print_license" 
                       data-id="{{ $info->id }}">
                        <i class="bi bi-file-earmark-arrow-down"></i> تصدير الرخصة
                    </a>

                    <button type="button" style="display: none;" 
                        class="btn btn-sm btn-outline-info btn-view-receipt print_receipt" 
                        data-id="{{ $info->id }}">
                        <i class="bi bi-eye"></i> سند عرض
                    </button>

                    <button type="button" class="ajax-link btn btn-sm"
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-eye"></i> عرض
                    </button>

                @elseif($info->status_name === 'جاهز للدفع')
                    <a href="#" style="display: none;" 
                       class="ajax-link payment btn btn-sm btn-outline-warning Payment_request"
                       data-id="{{ $info->id }}">
                        <i class="bi bi-cash"></i> دفع
                    </a>

                @elseif($info->status_name === 'موافَق عليه')
                    <a href="#" class="ajax-link btn btn-sm btn-outline-success"
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-check-circle"></i> موافق عليه
                    </a>
                    <button type="button" class="ajax-link btn btn-sm"
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-eye"></i> عرض
                    </button>

                @elseif($info->status_name === 'مرفوض')
                    <span class="text-danger">
                        <i class="bi bi-x-circle"></i> مرفوض
                    </span>

                @elseif($info->status_name === 'طلبات معادة')
                    <a href="#" class="ajax-link btn btn-sm btn-outline-secondary"
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-arrow-repeat"></i> طلب معاد
                    </a>

                @elseif($info->status_name === 'طلبات جديدة')
                    <a href="#" class="ajax-link btn btn-sm btn-outline-info" 
                       data-page="requests.track.request-details" 
                       data-id="{{ $info->id }}">
                        <i class="bi bi-plus-circle"></i> طلب جديد
                    </a>

                @else
                    <a href="#" class="ajax-link btn btn-sm btn-outline-secondary"
                         data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-pencil"></i> عرض
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8" class="text-center">لا توجد طلبات</td>
    </tr>
@endif

{{-- سكربت الصلاحيات --}}
<script>
$(document).ready(function() {
    $.ajax({
        url: "{{ route('user.permissions') }}",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if(response.permissions && response.permissions.length > 0){
                response.permissions.forEach(function(permission){

                    if(permission.permission_key === "Payment_request"){
                        $(".Payment_request").show();
                    }
                    if(permission.permission_key === "print_license"){
                        $(".print_license").show();
                    }
                    if(permission.permission_key === "print_receipt"){
                        $(".print_receipt").show();
                    }

                });
            }
        },
        error: function(xhr){
            console.error("خطأ في جلب الصلاحيات:", xhr);
        }
    });
});
</script>



{{-- @elseif($info->status_name === 'مكتمل')
                    <a href="#" id="print_license" style="display: none;" class="ajax-link btn btn-sm btn-outline-success amr_Eng"
                    data-id="{{ $info->id }}">
                    <i class="bi bi-file-earmark-arrow-down"></i> تصدير الرخصة
                    </a>


                   <button type="button" id="print_receipt" style="display: none;" class="btn btn-sm btn-outline-info btn-view-receipt"
                        data-id="{{ $info->id }}">
                        <i class="bi bi-eye"></i> سند عرض
                    </button>

                     <button type="button" class="ajax-link btn btn-sm "
                        data-id="{{ $info->id }}"
                        data-page="requests.track.request-details">
                        <i class="bi bi-eye"></i> عرض
                    </button> --}}

                



                    {{--

@if (isset($data) && $data->count() > 0)
    @foreach ($datac as $index => $info)
        <tr class="priority-high">
            <th scope="row">{{ $index + 1 }}</th>
            <td>ترخيص هدم</td>
            <td>شركة البناء الحديث</td>
            <td>2024-06-09</td>
            <td><span class="badge bg-info">مسندة للمهندس</span></td>
            <td>
                <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                    data-page="requests.track.request-details" class="nav-link">
                    <i class="bi bi-eye"></i> عرض
                </a>

                <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                    data-page="requests.create.partials.Breadcrumb_Eng" class="nav-link">
                    <i class="bi bi-eye"></i> رفع تقرير المهندس
                </a>

                <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                    data-page="requests.create.partials.Breadcrumb_Eng" class="nav-link">
                    <i class="bi bi-eye"></i> تصدير الرخصه
                </a>

                <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                    data-page="requests.create.partials.Breadcrumb_Eng" class="nav-link">
                    <i class="bi bi-eye"></i> دفع
                </a>

                <a href="#" class="ajax-link btn-outline-primary btn-sm dark btn"
                    data-page="requests.create.partials.Breadcrumb_Eng" class="nav-link">
                    <i class="bi bi-eye"></i> تعديل
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8" class="text-center">لا توجد طلبات</td>
    </tr>
@endif --}}



