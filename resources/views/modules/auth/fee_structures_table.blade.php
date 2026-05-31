@if(isset($data) && count($data) > 0)
    @foreach($data as $index => $info)
        <tr class="text-center">
            <th scope="row">{{ $index + 1 }}</th>
            <td data-label="نوع البناء">{{ $info->building_type_name }}</td>
            <td data-label="نوع الطابق">{{ $info->floor_type_name }}</td>
            <td data-label="نوع الهيكل">{{ $info->structure_type }}</td>
            <td data-label="نوع الشارع">{{ $info->street_type_name }}</td>
            <td data-label="نوع الترخيص">{{ $info->license_type_name }}</td>
            <td data-label="نوع الطلب">{{ $info->request_types_name }}</td>
            <td data-label="رسوم شغل الطريق">{{ number_format($info->road_occupation_fee, 2) }} ر.ي</td>
            <td data-label="رسوم الترخيص">{{ number_format($info->license_fee, 2) }} ر.ي</td>
            <td data-label="رسوم إزالة النفايات">{{ number_format($info->waste_removal_fee, 2) }} ر.ي</td>
            <td data-label="رسوم تنمية وكوارث">{{ number_format($info->development_disaster_fee, 2) }} ر.ي</td>
            <td data-label="الحالة">
                <span class="badge badge-status {{ $info->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $info->is_active ? 'نشط' : 'غير نشط' }}
                </span>
            </td>
            <td data-label="تاريخ الإنشاء">{{ $info->created_at }}</td>
            <td data-label="إجراءات">
                            <div class="btn-group-vertical btn-group-sm" role="group">

                                <button class="btn btn-outline-success edit-record-btn"
                                    data-id="{{ $info->id }}"
                                    data-route="fee_structures_get"
                                    data-form="#editformFeeStructure"
                                    data-target="#editFeeStructureModal"
                                    data-modal="#editFeeStructureModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-delete-entity"
                                    data-action="delete-item"
                                    data-id="{{ $info->id }}"
                                    data-route="fee_structures_Delete"
                                    data-method="DELETE"
                                    data-reload-container="#TableFeeStructure"
                                    data-reload-url="{{ route('reload-fee_structures-table') }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </div>
                        </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="11" class="text-center">لا توجد هياكل الرسوم</td>
    </tr>
@endif
