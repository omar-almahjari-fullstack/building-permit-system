@if(isset($data) && count($data) > 0)
    @foreach ($data as $info)
        <tr data-beneficiary-id="{{ $info->id }}">
            <td>{{ $info->id }}</td>
            <td>
                @if ($info->personal_photo)
                    <img src="data:image/jpeg;base64,{{ base64_encode($info->personal_photo) }}" class="avatar-img" style="width: 50px; height: 50px; border-radius: 50%;" alt="صورة المستخدم">
                @else
                    <img src="https://via.placeholder.com/50" class="avatar-img" alt="صورة افتراضية">
                @endif
            </td>
            <td>{{ $info->name }}</td>
            <td>{{ $info->directorate_id }}</td>
            <td>{{ $info->identity_type }}</td>
            <td>{{ $info->identity_number }}</td>
            <td>{{ $info->created_at }}</td>
            <td class="action-buttons">
                <a href="#" class="btn btn-sm btn-info next-step-btn"
                 data-beneficiary-id="{{ $info->id }}"  data-step-target="2" {{-- خاصه بل انتقال الا الخطوه الثانيه --}}
                   data-id="{{ $info->id }}"
                   data-form="#form_Req"
                   data-reload-url="{{ route('reload-beneficiaries-CitizenTableBody', ['id' => $info->id]) }}"
                   {{-- data-modal="#EditModal" --}}
                   title="تقديم طلب">
                   <i class="bi bi-send"></i>
                </a>

                <a href="#" class="btn btn-sm btn-warning edit-record-btn"
                   data-id="{{ $info->id }}"
                   data-route="beneficiaries_get"
                   data-form="#form_edit"
                   data-target="#editModal"
                   data-modal="#editModal">
                   <i class="fas fa-edit"></i>
                </a>

                <a href="#" class="btn btn-sm btn-danger btn-delete-entity"
                   data-action="delete-item"
                   data-id="{{ $info->id }}"
                   data-route="beneficiaries_Delete"
                   data-method="DELETE"
                   data-reload-container="#usersTableBody"
                   data-reload-url="{{ route('reload-beneficiaries-table') }}">
                   <i class="fas fa-trash"></i>
                </a>

                {{-- <button class="btn btn-sm btn-gold next-step-btn"
                        data-beneficiary-id="{{ $info->beneficiary_id }}"
                        data-step-target="2">
                    حفظ الطلب <i class="bi bi-arrow-left"></i>
                </button> --}}
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8" class="text-center">لا توجد بيانات</td>
    </tr>
@endif
