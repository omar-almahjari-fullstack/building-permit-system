@php
    // تجميع الصلاحيات حسب الدور - دعم Collection أو Array أو Null
    $rolesPermissions = collect($rolesPermissions ?? []);
    $groupedRoles = $rolesPermissions->groupBy('role_id');
@endphp

@if($groupedRoles->count() > 0)
    @foreach ($groupedRoles as $roleId => $permissions)
        @php
            $role = $permissions->first(); // بيانات الدور
            $permissionNames = $permissions->pluck('permission_name')->toArray();
        @endphp
        <tr>
            {{-- اسم الدور --}}
            <td>
                @php
                    $roleName = data_get($role, 'role_name', '');
                    $isSystemRole = (bool) data_get($role, 'is_system_role', false);
                @endphp
                @if($isSystemRole)
                    <i class="fas fa-crown me-2 text-warning"></i>
                @elseif(\Illuminate\Support\Str::contains($roleName, 'مدير'))
                    <i class="fas fa-user-shield me-2 text-primary"></i>
                @elseif(\Illuminate\Support\Str::contains($roleName, 'عقود'))
                    <i class="fas fa-file-contract me-2 text-success"></i>
                @elseif(\Illuminate\Support\Str::contains($roleName, 'فني'))
                    <i class="fas fa-users-cog me-2 text-info"></i>
                @else
                    <i class="fas fa-user me-2 text-secondary"></i>
                @endif
                <strong class="text-kuhli">{{ $roleName }}</strong>
            </td>

            {{-- أسماء الصلاحيات مفصولة --}}
            <td>
                @if(count($permissionNames) > 0)
                    {{ implode('، ', $permissionNames) }}
                @else
                    <span class="text-muted">لا توجد صلاحيات</span>
                @endif
            </td>

            {{-- عدد المستخدمين --}}
            <td>
                <span class="badge bg-info">0</span>
            </td>

            {{-- الإجراءات --}}
            <td>
                <button class="btn btn-sm btn-warning me-2 edit-record-btn"
                        data-id="{{ data_get($role, 'role_id') }}"
                        data-route="roles/get"
                        data-form="#form_role_edit"
                        data-modal="#roleEditModal">
                    <i class="fas fa-edit"></i>
                </button>

            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4" class="text-center text-muted">لا توجد أدوار مسجلة</td>
    </tr>
@endif
