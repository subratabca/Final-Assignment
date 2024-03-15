<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Company List</h6>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Logo</th>
          <th class="wd-10p">Company Name</th>
          <th class="wd-10p">Job Category</th>
          <th class="wd-10p">Job Title</th>
          <th class="wd-10p">Deadline</th>
          <th class="wd-10p">Status</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $key => $row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> <img src="{{ !empty($row->company->logo) ? asset('upload/company/logo/small/'.$row->company->logo) : url('upload/no_image.jpg') }}"> </td>

          <td> {{ $row->company->name }} </td>
          <td> {{ $row->category->name }} </td>
          <td> {{ $row->title }} </td>
          <td> {{ $row->deadline }} </td>
          <td>{!! $row->status ? '<span class="badge badge-pill badge-success">Published</span>' : '<span class="badge badge-pill badge-danger">Pending</span>' !!}</td>
          <td>
            @can('jobs.create', Auth::user())
                @if($row->status == 1)
                  <a href="{{ route('inactive.job.list', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Inactive" ><i class="fa fa-thumbs-down"></i></a>
                @else
                  <a href="{{ route('active.job.list', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Active" ><i class="fa fa-thumbs-up"></i></a>
              @endif
            @endcan

            @can('jobs.update', Auth::user())
              <a href="{{ route('view.job.list', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="View Details"><i class="fa fa-eye"></i></a>
            @endcan

            @can('jobs.delete', Auth::user())
              <a href="{{ route('delete.job.list', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
