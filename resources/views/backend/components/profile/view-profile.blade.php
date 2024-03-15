<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">View Profile</h6>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-20p">Profile Image</th>
          <th class="wd-15p">Name</th>
          <th class="wd-20p">Email</th>
          <th class="wd-20p">Phone</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
           <td> <img src="{{ !empty($adminData->profile_image) ? asset('upload/admin-profile/listing/'.$adminData->profile_image) : url('upload/no_image.jpg') }}" height="80px;" width="100px;"> </td>
          <td> {{ $adminData->name }} </td>
          <td> {{ $adminData->email }} </td>
          <td> {{ $adminData->phone }} </td>
          <td>
            <a href="{{ route('edit.admin.profile') }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
          </td>   
        </tr>
      </tbody>
    </table>
  </div>
</div>