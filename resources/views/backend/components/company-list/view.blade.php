<div class="card pd-20 pd-sm-40 mg-t-50">
  <h6 class="card-body-title">Company Details Information</h6>

  <div class="row mg-t-30">

    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-default bg-primary justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Company Information</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Company Name:</th>
                  <td>{{ $editData->name }}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{ $editData->email }}</td>
                </tr>
                <tr>
                  <th>Phone:</th>
                  <td>{{ $editData->phone }}</td>
                </tr>
                <tr>
                  <th>Company Address:</th>
                  <td>{{ $editData->address }}</td>
                </tr>
                <tr>
                  <th>Company Status:</th>
                  <td>{!! $editData->status ? '<span class="badge badge-pill badge-success">Published</span>' : '<span class="badge badge-pill badge-danger">Pending</span>' !!}</td>
                </tr>
              </tbody>
            </table>
          </p>
        </div>

        <div class="card-footer tx-center bg-gray-300">
          <a href="{{ route('company.list')}}" class="btn btn-primary">Back To Company List</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 mg-t-30 mg-md-t-0">
      <div class="card bd-0">
        <div class="card-header card-header-default bg-success justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Company Logo</h6>
        </div>

        <div class="card-body bg-gray-700">
          <p class="mg-b-0">
            <img class="img-fluid" src="{{ !empty($editData->logo) ? asset('upload/company/logo/small/'.$editData->logo) : url('upload/no_image.jpg') }}" alt="Image">
          </p>
        </div>

        <div class="card-footer bg-gray-300 d-flex justify-content-between">
          <a href="{{ route('company.list')}}" class="btn btn-primary">Back To Company List</a>
        </div>
      </div>
    </div>

  </div>

</div>