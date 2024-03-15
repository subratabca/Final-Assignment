<div class="card pd-20 pd-sm-40 mg-t-50">
  <h6 class="card-body-title">Profile Details Information</h6>

  <div class="row mg-t-30">

    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-header-default bg-primary justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Personal Information</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Profile Picture:</th>
                  <td><img src="{{ !empty($profile->profile_picture) ? asset('upload/resume/'.$profile->profile_picture) : asset('upload/no_image.jpg') }}" class="wd-60 rounded-circle"></td>
                </tr>
                <tr>
                <tr>
                  <th>Name:</th>
                  <td>{{ $profile->name }}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{ $profile->email }}</td>
                </tr>
                <tr>
                  <th>Fathers Name:</th>
                  <td>{{ $profile->fathers_name }}</td>
                </tr>
                <tr>
                  <th>Mothers Name:</th>
                  <td>{{ $profile->mothers_name }}</td>
                </tr>
                <tr>
                  <th>Present Address:</th>
                  <td>{{ $profile->present_address }}</td>
                </tr>
                <tr>
                  <th>Permanent Address:</th>
                  <td>{{ $profile->permanent_address }}</td>
                </tr>
                <tr>
                  <th>Date Of Birth:</th>
                  <td>{{ $profile->dob }}</td>
                </tr>
                <tr>
                  <th>NID No:</th>
                  <td>{{ $profile->nid }}</td>
                </tr>
                <tr>
                <tr>
                  <th>Blood Group:</th>
                  <td>{{ $profile->blood_group }}</td>
                </tr>
                <tr>
                  <th>Passport No:</th>
                  <td>{{ $profile->passport }}</td>
                </tr>
                <tr>
                  <th>Contact No:</th>
                  <td>{{ $profile->phone }}</td>
                </tr>
              </tbody>
            </table>
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-6 mg-t-30 mg-md-t-0">
      <div class="card bd-0">
        <div class="card-header card-header-default bg-success justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Other Information</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Carrer Objective:</th>
                  <td>{!! htmlspecialchars_decode($profile->carrer_objective) !!}</td>
                </tr>
                <tr>                 
                  <th>Emergency Contact No:</th>
                  <td>{{ $profile->emergency_contact_no }}</td>
                </tr>
                <tr>
                <tr>
                  <th>Present Salary:</th>
                  <td>{{ $profile->present_salary }}</td>
                </tr>
                <tr>
                  <th>Expected Salary:</th>
                  <td>{{ $profile->expected_salary }}</td>
                </tr>
                <tr>
                  <th>Skills:</th>
                  <td>{{ $profile->skills }}</td>
                </tr>
                <tr>
                  <th>Hobbies/Interest:</th>
                  <td>{{ $profile->hobbies }}</td>
                </tr>
                <tr>
                  <th>Whatsapp:</th>
                  <td>{{ $profile->whatsapp }}</td>
                </tr>
                <tr>
                  <th>Linkedin Link:</th>
                  <td>{{ $profile->linkedin }}</td>
                </tr>

                <tr>
                  <th>Facebook Link:</th>
                  <td>{{ $profile->facebook }}</td>
                </tr>
                <tr>
                  <th>Github Link:</th>
                  <td>{{ $profile->github }}</td>
                </tr>
                <tr>
                  <th>Behance Link:</th>
                  <td>{{ $profile->behance }}</td>
                </tr>
                <tr>
                  <th>Portfolio Website:</th>
                  <td>{{ $profile->portfolio_website }}</td>
                </tr>
              </tbody>
            </table>
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-12 mg-t-30">
      <div class="card">
        <div class="card-header card-header-default bg-danger justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Education Information</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="wd-5p">Sl</th>
                  <th class="wd-15p">Degree Name</th>
                  <th class="wd-20p">Institute Name</th>
                  <th class="wd-20p">Department/Group</th>
                  <th class="wd-10p">Passing Year</th>
                  <th class="wd-10p">Result/GPA</th>
                </tr>
              </thead>
              <tbody>
                @foreach($profile->educations as $key => $row)
                  <tr>
                    <td> {{ $key+1}} </td>
                    <td> {{ $row->degree }} </td>
                    <td> {{ $row->institute }} </td>
                    <td> {{ $row->department }} </td>
                    <td> {{ $row->passing_year }} </td>
                    <td> {{ $row->result }} </td>
                  </tr>
                @endforeach
              <tbody>
            </table>
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-12 mg-t-30">
      <div class="card">
        <div class="card-header card-header-default bg-primary justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Training Information</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="wd-5p">Sl</th>
                  <th class="wd-15p">Organization Name</th>
                  <th class="wd-20p">Subject Name</th>
                  <th class="wd-20p">Course Duration</th>
                  <th class="wd-10p">Completion Year</th>
                </tr>
              </thead>
              <tbody>
                @foreach($profile->trainings as $key => $row)
                  <tr>
                    <td> {{ $key+1}} </td>
                    <td> {{ $row->organization }} </td>
                    <td> {{ $row->subject }} </td>
                    <td> {{ $row->duration }} </td>
                    <td> {{ $row->completion_year }} </td>
                  </tr>
                @endforeach
              <tbody>
            </table>
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-12 mg-t-30">
      <div class="card">
        <div class="card-header card-header-default bg-danger justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Working Experience</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="wd-5p">Sl</th>
                  <th class="wd-15p">Company Name</th>
                  <th class="wd-20p">Designation</th>
                  <th class="wd-20p">Joining Date</th>
                  <th class="wd-10p">Departure Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($profile->job_experiences as $key => $row)
                  <tr>
                    <td> {{ $key+1}} </td>
                    <td> {{ $row->company_name }} </td>
                    <td> {{ $row->designation }} </td>
                    <td> {{ $row->joining_date }} </td>
                    <td> {{ $row->departure_date }} </td>
                  </tr>
                @endforeach
              <tbody>
            </table>
          </p>
        </div>
      </div>
    </div>

  </div>

</div>