@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if(!empty(Auth::user()->resume))
<div class="row row-sm mg-t-20">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-transparent pd-20 bd-b bd-gray-200">
        <h6 class="card-title tx-uppercase tx-12 mg-b-0">Resume Information</h6>
      </div><!-- card-header -->
      <table class="table table-white table-responsive mg-b-0 tx-12">
        <thead>
          <tr class="tx-10">
            <th class="pd-y-5">Applicant Image</th>
            <th class="pd-y-5">Name</th>
            <th class="pd-y-5">Email</th>
            <th class="pd-y-5">Phone</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <img src="{{ !empty($user->profile_image) ? asset('upload/user-profile/small/'.$user->profile_image) : url('upload/no_image.jpg') }}" class="wd-60 rounded-circle">
            </td>
            <td>
              <a href="" class="tx-inverse tx-14 tx-medium d-block">{{ $user->name }}</a>
            </td>
            <td>
              <a href="" class="tx-inverse tx-14 tx-medium d-block">{{ $user->email }}</a>
            </td>
            <td>
              <a href="" class="tx-inverse tx-14 tx-medium d-block">{{ $user->phone }}</a>
            </td>
          </tr>

        </tbody>
      </table>

      <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">
        <a href="{{ route('edit.resume.by.apply.job', ['job_id' => $job->id]) }}" class="btn btn-success">Edit CV</a>
      </div>

    </div>
  </div>

</div>
@endif

<div class="row row-sm mg-t-20">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-transparent pd-20 bd-b bd-gray-200">
        <h6 class="card-title tx-uppercase tx-12 mg-b-0">Job Details</h6>
      </div><!-- card-header -->
      <table class="table table-white table-responsive mg-b-0 tx-12">
        <thead>
          <tr class="tx-10">
            <th class="pd-y-5">Company Logo</th>
            <th class="pd-y-10">Company Name</th>
            <th class="pd-y-5">Job Title</th>
            <th class="pd-y-5">Application Deadline</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>
              <img src="{{ !empty($job->company->logo) ? asset('upload/company/logo/small/'.$job->company->logo) : url('upload/no_image.jpg') }}" class="wd-60 rounded-circle">
            </td>
            <td>
              <a href="" class="tx-inverse tx-14 tx-medium d-block">{{ $job->company->name }}</a>
            </td>
            <td>
              <a href="" class="tx-inverse tx-14 tx-medium d-block">{{ $job->title }}</a>
            </td>
            <td>
              <a href="" class="tx-inverse tx-14 tx-medium d-block">{{ date('d M Y', strtotime($job->deadline)) }}</a>
            </td>
          </tr>

        </tbody>
      </table>

      <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">
        @if(!empty(Auth::user()->resume))
        <form method="post" action="{{ route('store.job.application') }}">
          @csrf
           <input type="hidden" name="job_id" value="{{ $job->id }}">
           <button class="btn btn-info mg-r-5">Apply Now</button>
        </form>
        @else
        <a href="{{ route('create.resume.by.apply.job', ['job_id' => $job->id]) }}" class="btn btn-success">Upload CV</a>
        @endif
      </div>

    </div>
  </div>

</div>