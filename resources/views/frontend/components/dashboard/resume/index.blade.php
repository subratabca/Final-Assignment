<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Company List</h6>
  <div><a href="{{ route('create.resume') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Profile Image</th>
          <th class="wd-10p">Name</th>
          <th class="wd-10p">Email</th>
          <th class="wd-20p">Carrer Objective</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td><img src="{{ !empty($row->profile_picture) ? asset('upload/resume/'.$row->profile_picture) : url('upload/no_image.jpg') }}" height="80px;" width="100px;"> </td>
          <td> {{ $row->name }} </td>
          <td> {{ $row->email }} </td>
          <td>{!! \Illuminate\Support\Str::limit(new \Illuminate\Support\HtmlString($row->carrer_objective), 30, '...') !!}</td>
          <td>
            <a href="{{ URL::to('edit/resume/'.$row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="{{ URL::to('delete/resume/'.$row->id) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
