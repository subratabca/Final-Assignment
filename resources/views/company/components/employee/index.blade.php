<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Employee List</h6>
  <div><a href="{{ route('create.company.employee') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
    @if(session()->has('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-20p">Employee Name</th>
          <th class="wd-20p">Email</th>
          <th class="wd-20p">Phone</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employees as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->name }} </td>
          <td> {{ $row->email}} </td>
          <td> {{ $row->email}} </td>
          <td>
            <a href="{{ route('edit.company.employee', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="{{ route('delete.company.employee', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a> 
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
