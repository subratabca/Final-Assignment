<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Permission For List</h6>
  @can('permissionFors.create', Auth::user())
  <div><a href="{{ route('create.permissionfor') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  @endcan
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Name</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($permissions as $key => $row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->for }} </td>
          <td>

            @can('permissionFors.update', Auth::user())
            <a href="{{ route('edit.permissionfor', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            @endcan

            @can('permissionFors.delete', Auth::user())
            <a href="{{ route('delete.permissionfor', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan

          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
