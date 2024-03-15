<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Blog List</h6>
  @can('blogs.create', Auth::user())
  <div><a href="{{ route('create.blog') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  @endcan
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Banner Image</th>
          <th class="wd-10p">Title</th>
          <th class="wd-10p">Category</th>
          <th class="wd-10p">Description</th>
          <th class="wd-10p">Status</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td><img src="{{ !empty($row->banner_image) ? asset('upload/blog/banner/small/'.$row->banner_image) : url('upload/no_image.jpg') }}"  width="120px" height="60px"></td>
          <td> {{ $row->title}} </td>
          <td> {{ $row->category->name}} </td>

          <td>{!! \Illuminate\Support\Str::limit((strip_tags($row->description)), 30, '...') !!}</td>

          <td>{!! $row->status ? '<span class="badge badge-pill badge-success">Published</span>' : '<span class="badge badge-pill badge-danger">Pending</span>' !!}</td>

          <td>
            @if (Auth::user()->can('blogs.create') || Auth::user()->can('blogs.update'))
              @if($row->status == 1)
                <a href="{{ route('inactive.blog', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Inactive" ><i class="fa fa-thumbs-down"></i></a>
              @else
                <a href="{{ route('active.blog', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Active" ><i class="fa fa-thumbs-up"></i></a>
              @endif
            @endif

            @can('blogs.update', Auth::user())
            <a href="{{ route('edit.blog', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            @endcan

            @can('blogs.delete', Auth::user())
            <a href="{{ route('delete.blog', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
