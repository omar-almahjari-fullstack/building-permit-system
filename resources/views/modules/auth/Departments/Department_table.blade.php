@if (isset($data) && !empty($data))
    @foreach ($data as $info)
        <tr>
            <td>{{ $info->id }}</td>
            <td>{{ $info->name }}</td>
            <td>{{ $info->description }}</td>
            <td>{{ $info->directorate_name ?? '—' }}</td>
            <td>
                @if ($info->is_active)
                    <span class="badge bg-success">مفعل</span>
                @else
                    <span class="badge bg-danger">غير مفعل</span>
                @endif
            </td>
            <td>{{ $info->created_at }}</td>
            <td>
                <button class="btn btn-sm btn-outline-primary action-btn edit-record-btn"
                        {{-- data-bs-toggle="modal"  --}}
                        {{-- data-bs-target="#editdepartmentModal" --}}
                        data-id="{{ $info->id }}"
                        data-route="Department_get"
                        data-form="#form_edit"
                        data-modal="#editdepartmentModal">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger action-btn btn-delete-entity"
                        data-id="{{ $info->id }}"
                        data-route="Department_Delete"
                        data-reload-container="#departmentsTableBody"
                        data-reload-url="{{ route('reload-Department_table') }}">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@endif