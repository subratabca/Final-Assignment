<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Job List</h6>
  <div><a href="{{ route('create.job') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
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
          <th class="wd-20p">Job title</th>
          <th class="wd-10p">Published Date</th>
          <th class="wd-10p">Deadline</th>
          <th class="wd-10p">Applied</th>
          <th class="wd-10p">Status</th>
          <th class="wd-30p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->title }} </td>
          <td> {{ date('d M Y', strtotime($row->created_at)) }} </td>
          <td> {{ date('d M Y', strtotime($row->deadline)) }} </td>
          <td> {{ $row->job_applications->count() }} </td>

          <td>{!! $row->status ? '<span class="badge badge-pill badge-success">Published</span>' : '<span class="badge badge-pill badge-danger">Pending</span>' !!}</td>
          <td>
            <a href="{{ route('view.job', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="View Details"><i class="fa fa-eye"></i></a>

            <a href="{{ route('edit.job', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="{{ route('delete.job', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
