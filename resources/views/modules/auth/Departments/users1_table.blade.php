@if (@isset($data) and !@empty($data))
   @foreach ($data as $info)
   <tr>
      <td>{{ $info->id }}</td>
      <td>
          <div class="d-flex align-items-center">
              <div class="user-avatar me-2">{{ substr($info->name, 0, 1) }}</div>
              <div>{{ $info->name }}</div>
          </div>
      </td>
      <td>{{ $info->username }}</td>
      <td>{{ $info->email }}</td>
      <td>{{ $info->phone }}</td>
      <td>{{ $info->department_name ?? 'غير محدد' }}</td>
      <td>
          @if($info->is_active == 1)
              <span class="badge bg-success">نشط</span>
          @else
              <span class="badge bg-danger">غير نشط</span>
          @endif
      </td>
      <td>{{ \Carbon\Carbon::parse($info->created_at)->format('Y-m-d H:i') }}</td>
      <td>{{ \Carbon\Carbon::parse($info->updated_at)->format('Y-m-d H:i') }}</td>

      <td>

        {{-- زر التعديل --}}
<button class="btn btn-sm btn-outline-primary action-btn edit-record-btn"
        {{-- data-bs-toggle="modal"
        data-bs-target="#edituserModal" --}}
        data-id="{{ $info->id }}"
        data-route="users_get"
        data-form="#form_edit"
        data-modal="#edituserModal">
    <i class="bi bi-pencil"></i>
</button>

{{-- زر الحذف --}}
<button class="btn btn-sm btn-outline-danger action-btn btn-delete-entity"
        data-id="{{ $info->id }}"
        data-route="users_Delete"
        data-reload-container="#usersTableBody"
        data-reload-url="{{ route('reload-users_table') }}">
    <i class="bi bi-trash"></i>
</button>



          {{-- <button class="btn btn-sm btn-outline-primary action-btn edit-record-btn"
                  data-bs-toggle="modal"
                  data-bs-target="#edituserModal"
                  data-id="{{ $info->id }}"
                  data-route="users_get"
                  data-form="#form_add"
                  data-modal="#edituserModal">
              <i class="bi bi-pencil"></i>
          </button>

          <button class="btn btn-sm btn-outline-danger action-btn btn-delete-entity"
                  data-id="{{ $info->id }}"
                  data-route="users_update"
                  data-reload-container="#UserTableBody"
                  data-reload-url="{{ route('reload-User_table') }}">
              <i class="bi bi-trash"></i>
          </button> --}}

          {{-- <button class="btn btn-sm btn-outline-secondary action-btn toggle-status-btn"
                  data-id="{{ $info->id }}"
                  data-route="User_toggleStatus"
                  data-reload-container="#UserTableBody"
                  data-reload-url="{{ route('reload-User_table') }}"
                  title="{{ $info->is_active == 1 ? 'تعطيل' : 'تفعيل' }}">
              @if($info->is_active == 1)
                  <i class="bi bi-person-x"></i>
              @else
                  <i class="bi bi-person-check"></i>
              @endif
          </button> --}}
      </td>
   </tr>
   @endforeach
@endif


{{-- @if(isset($data) && count($data) > 0)
    @foreach($data as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->department_id }}</td>
            <td>
                @if($user->is_active)
                    <span class="badge bg-success">مفعل</span>
                @else
                    <span class="badge bg-danger">غير مفعل</span>
                @endif
            </td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
                <button class="btn btn-sm btn-outline-primary edit-record-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#editUserModal"
                    data-id="{{ $user->id }}"
                    data-route="{{ route('users_get', $user->id) }}"
                    data-form="#form_edit"
                    data-modal="#editUserModal">
                    <i class="bi bi-pencil"></i>
                </button>

                <button class="btn btn-sm btn-outline-danger btn-delete-entity"
                    data-id="{{ $user->id }}"
                    data-route="{{ route('users_Delete', $user->id) }}"
                    data-reload-container="#usersTableBody"
                    data-reload-url="{{ route('reload-users_table') }}">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="10" class="text-center text-muted">لا يوجد بيانات</td>
    </tr>
@endif --}}
