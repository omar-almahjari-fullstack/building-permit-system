@if (@isset($data) and !@empty($data))
   @foreach ($data as $info)
   <tr>
      <td>{{ $info->id }}</td>
      <td>{{ $info->name }}</td>
      <td>{{ $info->governorate_id }}</td>
      <td>{{ $info->contact_email }}</td>
      <td>{{ $info->phone }}</td>
      <td>{{ $info->address }}</td>
      <td>
          @if($info->is_active == 1)
              <span class="badge bg-success">مفعل</span>
          @else
              <span class="badge bg-danger">غير مفعل</span>
          @endif
      </td>
      <td>{{ \Carbon\Carbon::parse($info->created_at)->format('Y-m-d H:i') }}</td>
      <td>{{ \Carbon\Carbon::parse($info->updated_at)->format('Y-m-d H:i') }}</td>

      <td>
          <button class="btn btn-sm btn-outline-primary action-btn edit-record-btn"
                  {{-- data-bs-toggle="modal"
                  data-bs-target="#editdirectorateModal" --}}
                  data-id="{{ $info->id }}"
                  data-route="Directorate_get"
                  data-form="#form_edit"
                  data-modal="#editdirectorateModal">
              <i class="bi bi-pencil"></i>
          </button>

          <button class="btn btn-sm btn-outline-danger action-btn btn-delete-entity"
                        data-id="{{ $info->id }}"
                        data-route="Directorate_Delete"
                        data-reload-container="#DirectorateTableBody"
                        data-reload-url="{{ route('reload-Directorate_table') }}">
                    <i class="bi bi-trash"></i>
          </button>
      </td>
   </tr>
   @endforeach
@endif
