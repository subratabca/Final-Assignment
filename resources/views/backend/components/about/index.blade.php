<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">About Information</h6>
  @can('abouts.create', Auth::user())
  <div><a href="{{ route('create.about') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  @endcan
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Image</th>
          <th class="wd-10p">Banner</th>
          <th class="wd-10p">Title</th>
          <th class="wd-10p">history</th>
          <th class="wd-10p">vision</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>

          <td><img src="{{ !empty($row->image) ? asset('upload/about/image/medium/'.$row->image) : url('upload/no_image.jpg') }}" height="50px;" width="50px;"></td>

          <td><img src="{{ !empty($row->banner_image) ? asset('upload/about/banner/medium/'.$row->banner_image) : url('upload/no_image.jpg') }}" height="50px;" width="100px;"> </td>

          <td> {!! \Illuminate\Support\Str::limit(new \Illuminate\Support\HtmlString($row->title), 50, '...') !!} </td>

          <td>{!! \Illuminate\Support\Str::limit(new \Illuminate\Support\HtmlString($row->history), 30, '...') !!}</td>

          <td>{!! \Illuminate\Support\Str::limit(new \Illuminate\Support\HtmlString($row->vision), 30, '...') !!}</td>

          <td>
            @can('abouts.update', Auth::user())
            <a href="{{ route('edit.about', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            @endcan

            @can('abouts.delete', Auth::user())
            <a href="{{ route('delete.about', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
