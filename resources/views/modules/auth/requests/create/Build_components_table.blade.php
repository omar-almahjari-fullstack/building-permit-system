@if (isset($datac) && $datac->count() > 0)
    @foreach ($datac as $index => $info)
        <tr class="text-center">
            <th scope="row">{{ $index + 1 }}</th>

            {{-- مكوّن البناء: اسم الدور من floor_types أو الـ ID في حال عدم وجود الاسم --}}
            <td>
                {{ $info->floor_type_name ?? ('#' . $info->floor_type_id) }}
            </td>

            {{-- المساحة --}}
            <td>{{ $info->area }} م²</td>

            {{-- عدد الأدوار --}}
            <td>{{ $info->floors_count }}</td>

            {{-- عدد الوحدات --}}
            <td>{{ $info->units_count }}</td>

            {{-- الاستخدام --}}
            <td>{{ $info->usage_type }}</td>

            {{-- نسبة البناء --}}
            <td>{{ $info->building_percentage }}%</td>

            <td>
                <button id="show-edit" class="btn btn-sm btn-outline-primary edit-record-btn-ont-model"
                        title="تعديل" data-id="{{ $info->id }}"
                        data-route="BuildingComponent_get"
                        data-form="#buildingComponent">
                    <i class="fas fa-edit"></i>
                </button>

                <button class="btn btn-sm btn-outline-danger btn-delete-component"
                        title="حذف" data-id="{{ $info->id }}"
                        data-action="delete-item"
                        data-route="BuildingComponent_Delete"
                        data-method="DELETE"
                        data-reload-container="#BuildingComponentTable"
                        data-reload-url="reload-BuildingComponent-get">
                    <i class="fas fa-trash"></i>
                </button>

            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8" class="text-center">لا توجد مكونات بناء</td>
    </tr>
@endif
