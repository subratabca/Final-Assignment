<div class="card pd-20 pd-sm-40 mg-t-50">
  <h6 class="card-body-title">Job Details Information</h6>
  <div><a href="{{ route('jobs') }}" class="btn btn-warning mg-b-10 float-right">Back to Job List</a></div>

  <div class="row mg-t-30">

    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-default bg-primary justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Job Details</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Title/Position:</th>
                  <td>{{ $job->title }}</td>
                </tr>
                <tr>
                  <th>Job Category:</th>
                  <td>{{ $job->category->name }}</td>
                </tr>
                <tr>
                  <th>Opening Date:</th>
                  <td>{{ date('d M Y', strtotime($job->created_at)) }}</td>
                </tr>
                <tr>
                  <th>Closing Date:</th>
                  <td>{{ date('d M Y', strtotime($job->deadline)) }}</td>
                </tr>
                <tr>
                  <th>Education:</th>
                  <td>{{ $job->education }}</td>
                </tr>
                <tr>
                  <th>Job Type:</th>
                  <td>{{ $job->job_type }}</td>
                </tr>
                <tr>
                  <th>Job Nature:</th>
                  <td>{{ $job->job_nature }}</td>
                </tr>
                <tr>
                  <th>Salary:</th>
                  <td>{{ $job->salary }} (Per Month)</td>
                </tr>
                <tr>
                  <th>Job Location:</th>
                  <td>{{ $job->address }}, {{ $job->city }}, {{ $job->country }}, {{ $job->zip_code }}</td>
                </tr>
                <tr>
                  <th>Skills:</th>
                  <td>{{ $job->skills }}</td>
                </tr>

                @if(!empty($job->description))
                <tr>
                  <th>Description:</th>
                  <td>{!! htmlspecialchars_decode($job->description) !!}</td>
                </tr>
                @endif

                @if(!empty($job->description))
                <tr>
                  <th>Requirements:</th>
                  <td>{!! htmlspecialchars_decode($job->requirements) !!}</td>
                </tr>
                @endif

                @if(!empty($job->description))
                <tr>
                  <th>Responsibility:</th>
                  <td>{!! htmlspecialchars_decode($job->responsibility) !!}</td>
                </tr>
                @endif

                @if(!empty($job->description))
                <tr>
                  <th>Benefits:</th>
                  <td>{!! htmlspecialchars_decode($job->benefits) !!}</td>
                </tr>
                @endif
                <tr>
                  <th>Job Status:</th>
                  <td>{!! $job->status ? '<span class="badge badge-pill badge-success">Published</span>' : '<span class="badge badge-pill badge-danger">Pending</span>' !!}</td>
                </tr>
              </tbody>
            </table>
          </p>
        </div>

        <div class="card-footer tx-center bg-gray-300">
          @if($job->status == 0)
          <a href="{{ route('active.job.list', ['id' => $job->id]) }}" class="btn btn-success">Publish Job</a>
          @endif
          <a href="{{ route('jobs')}}" class="btn btn-primary">Back To Job List</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mg-t-30 mg-md-t-0">
      <div class="card bd-0">
        <div class="card-header card-header-default bg-success justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Company Information</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Company Name:</th>
                  <td>{{ $job->company->name }}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{ $job->company->email }}</td>
                </tr>
                <tr>
                  <th>Phone:</th>
                  <td>{{ $job->company->phone }}</td>
                </tr>
                <tr>
                  <th>Company Address:</th>
                  <td>{{ $job->company->address }}</td>
                </tr>
                <tr>
                  <th>Company Logo:</th>
                  <td><img class="img-fluid" src="{{ !empty($job->company->logo) ? asset('upload/company/logo/small/'.$job->company->logo) : url('upload/no_image.jpg') }}" alt="Image"></td>
                </tr>
                  @if(!empty($job->company_description))
                  <tr>
                    <th>About Company:</th>
                    <td>{!! htmlspecialchars_decode($job->company_description) !!}</td>
                  </tr>
                  @endif
                <tr>
                  <th>Company Status:</th>
                  <td>{!! $job->company->status ? '<span class="badge badge-pill badge-success">Published</span>' : '<span class="badge badge-pill badge-danger">Pending</span>' !!}</td>
                </tr>
              </tbody>
            </table>
          </p>
        </div>
      </div>
    </div>

  </div>

</div>