<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Job Category List</h6>
  @can('categories.create', Auth::user())
  <div><a href="{{ route('create.category') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  @endcan
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Category</th>
          <th class="wd-10p">Icon</th>
          <th class="wd-10p">Banner Image</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->name}} </td>
          <td><img src="{{ !empty($row->icon) ? asset('upload/category/icon/medium/'.$row->icon) : url('upload/no_image.jpg') }}" ></td>
          <td><img src="{{ !empty($row->banner_image) ? asset('upload/category/banner/small/'.$row->banner_image) : url('upload/no_image.jpg') }}" height="80px" width="150px"></td>
          <td>
            @can('categories.update', Auth::user())
            <a href="{{ route('edit.category', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            @endcan


            @can('categories.delete', Auth::user())
            <a href="{{ route('delete.category', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
