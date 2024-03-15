<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Setting Information</h6>
  @can('settings.create', Auth::user())
  <div><a href="{{ route('create.setting') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  @endcan
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Logo</th>
          <th class="wd-10p">Banner</th>
          <th class="wd-10p">Company Name</th>
          <th class="wd-10p">Email</th>
          <th class="wd-10p">Phone One</th>
          <th class="wd-10p">Phone Two</th>
          <th class="wd-20p">Description</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>

          <td> <img src="{{ !empty($row->logo) ? asset('upload/common-setting/logo/small/'.$row->logo) : url('upload/no_image.jpg') }}" style="width: 100px; height: 50px;"> </td>

          <td> <img src="{{ !empty($row->cover_photo) ? asset('upload/common-setting/cover_photo/small/'.$row->cover_photo) : url('upload/no_image.jpg') }}" style="width: 100px; height: 50px;"> </td>

          <td> {{ $row->name }} </td>
          <td> {{ $row->email }} </td>
          <td> {{ $row->phone1 }} </td>
          <td> {{ $row->phone2 }} </td>

          <td>{!! \Illuminate\Support\Str::limit(new \Illuminate\Support\HtmlString($row->description), 30, '...') !!}</td>

          <td>
            @can('settings.update', Auth::user())
            <a href="{{ route('edit.setting', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            @endcan
            @can('settings.delete', Auth::user())
            <a href="{{ route('delete.setting', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
