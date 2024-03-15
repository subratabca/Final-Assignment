<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Employee List</h6>
  @can('users.create', Auth::user())
  <div><a href="{{ route('create.user') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  @endcan
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Employee Name</th>
          <th class="wd-20p">Assigned Roles</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key => $row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->name }} </td>
          <td>
            @if(!empty($row->roles))
            @foreach ($row->roles as $role)
            <span class="badge badge-pill badge-success"> {{ $role->name }}@if (!$loop->last),@endif</span>
            @endforeach
            @else
            <span class="badge badge-pill badge-danger">'No role assign'</span>
            @endif
          </td>

          <td>
            @can('users.update', Auth::user())
            <a href="{{ route('edit.user', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            @endcan
            @can('users.delete', Auth::user())
            <a href="{{ route('delete.user', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
