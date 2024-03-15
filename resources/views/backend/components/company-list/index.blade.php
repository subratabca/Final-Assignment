<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Company List</h6>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Logo</th>
          <th class="wd-10p">Company Name</th>
          <th class="wd-10p">Email</th>
          <th class="wd-10p">Phone</th>
          <th class="wd-10p">Status</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key => $row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> <img src="{{ !empty($row->logo) ? asset('upload/company/logo/small/'.$row->logo) : url('upload/no_image.jpg') }}" width="85" height="85"> </td>

          <td> {{ $row->name }} </td>
          <td> {{ $row->email }} </td>
          <td> {{ $row->phone }} </td>
          <td>{!! $row->status ? '<span class="badge badge-pill badge-success">Published</span>' : '<span class="badge badge-pill badge-danger">Pending</span>' !!}</td>
          <td>
            @can('companies.create', Auth::user())
              @if($row->status == 1)
              <a href="{{ route('inactive.company.list', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Inactive" ><i class="fa fa-thumbs-down"></i></a>
              @else
              <a href="{{ route('active.company.list', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Active" ><i class="fa fa-thumbs-up"></i></a>
              @endif
            @endcan

            @can('companies.update', Auth::user())
              <a href="{{ route('view.company.list', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="View Details"><i class="fa fa-eye"></i></a>
            @endcan

            @can('companies.delete', Auth::user())
              <a href="{{ route('delete.company.list', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
