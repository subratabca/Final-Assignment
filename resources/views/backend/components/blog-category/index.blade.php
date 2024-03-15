<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Blog Category List</h6>
  <div><a href="{{ route('create.blog.category') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Category</th>
          <th class="wd-10p">Banner Image</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->name}} </td>
          <td><img src="{{ !empty($row->banner_image) ? asset('upload/blog-category/banner/small/'.$row->banner_image) : url('upload/no_image.jpg') }}"  width="120px" height="60px"></td>
          <td>
            <a href="{{ URL::to('edit/blog/category/'.$row->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="{{ URL::to('delete/blog/category/'.$row->id) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
