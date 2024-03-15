<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Applied Job List</h6>
  <div><a href="{{ route('create.resume') }}" class="btn btn-warning mg-b-10 float-right"><i class="fa fa-plus"></i> Add New</a></div>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-15p">Applicant Name</th>
          <th class="wd-20p">Company Name</th>
          <th class="wd-20p">Job Title/Position</th>
          <th class="wd-10p">Apply Date</th>
          <th class="wd-10p">Application Deadline</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobs as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->user->name }} </td>
          <td> {{ $row->job->company->name }} </td>
          <td> {{ $row->job->title }} </td>
          <td> {{ date('d M Y', strtotime($row->created_at)) }} </td>
          <td> {{ date('d M Y', strtotime($row->deadline)) }} </td>
          <td>
            <a href="{{ route('view.applied.job.details', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Details"><i class="fa fa-eye"></i></a>
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
