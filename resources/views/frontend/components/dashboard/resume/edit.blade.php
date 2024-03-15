<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title mg-sm-b-30">Update Resume Information</h6>
  <p class="mg-b-5 mg-sm-b-5">1. Personal Information.</p>
  <div><hr style="border: 1px solid black;"></div>

  <div class="form-layout">
    <form method="post" action="{{ url('update/resume/'.$editData->id) }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Full Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ $editData->name }}" >
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input class="form-control" type="email" name="email" value="{{ $editData->email }}">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Fathers Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="fathers_name" value="{{ $editData->fathers_name }}">
            @error('fathers_name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Mothers Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="mothers_name" value="{{ $editData->mothers_name }}">
            @error('mothers_name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Present Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="present_address" value="{{ $editData->present_address }}">
            @error('present_address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Permanent Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="permanent_address" value="{{ $editData->permanent_address }}">
            @error('permanent_address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Date Of Birth: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="dob" value="{{ $editData->dob }}">
            @error('dob') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">NID No: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="nid" value="{{ $editData->nid }}">
            @error('nid') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Blood Group: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="blood_group" value="{{ $editData->blood_group }}">
            @error('blood_group') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Passport No: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="passport" value="{{ $editData->passport }}">
            @error('passport') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="phone" value="{{ $editData->phone }}">
            @error('phone') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Emergency Contact No: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="emergency_contact_no" value="{{ $editData->emergency_contact_no }}">
            @error('emergency_contact_no') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Present Salary: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="present_salary" value="{{ $editData->present_salary }}">
            @error('present_salary') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Expected Salary: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="expected_salary" value="{{ $editData->expected_salary }}">
            @error('expected_salary') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Skills: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="skills" value="{{ $editData->skills }}">
            @error('skills') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Hobbies/Interest: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="hobbies" value="{{ $editData->hobbies }}">
            @error('hobbies') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Whatsapp: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="whatsapp" value="{{ $editData->whatsapp }}">
            @error('whatsapp') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Linkedin Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="linkedin" value="{{ $editData->linkedin }}">
            @error('linkedin') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Facebook Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="facebook" value="{{ $editData->facebook }}">
            @error('facebook') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Github Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="github" value="{{ $editData->github }}">
            @error('github') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Behance Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="behance" value="{{ $editData->behance }}">
            @error('behance') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Portfolio Website: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="portfolio_website" value="{{ $editData->portfolio_website }}">
            @error('portfolio_website') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Old Profile Picture:</label>
                <img src="{{ !empty($editData->profile_picture) ? asset('upload/resume/'.$editData->profile_picture) : asset('upload/no_image.jpg') }}" style="width: 150px; height: 80px;">
              </div>
            </div>

            <div class="col-lg-8">
              <label class="form-control-label">Upload New Profile Picture: <span class="tx-danger">*</span></label><br>
              <label class="custom-file">
                <input type="file" id="file2" class="custom-file-input" name="profile_picture" onChange="mainProfilePicUrl(this)" >
                <span class="custom-file-control custom-file-control-primary"></span>
                <input type="hidden" name="old_profile_picture" value="{{ $editData->profile_picture }}">
              </label>
              <img src="" id="mainProfilePic" class="mt-1">
            </div>

          </div> 
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Carrer Objective: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote"  name="carrer_objective">{{ old('carrer_objective', $editData->carrer_objective) }}</textarea>
            @error('carrer_objective') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div><!-- End personal Info -->

      <p class="mg-b-5 mg-sm-b-5">2. Education Information.</p>
      <div><hr style="border: 1px solid black;"></div>

      @foreach($editData->educations as $key => $education)
      <div class="row mg-b-25 education-fields"><!-- Start Education Info -->
        <input type="hidden" name="education_id[]" value="{{ $education->id }}">

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Degree Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="degree[]" value="{{ $education->degree }}" placeholder="Enter degree name">
            @error('degree.*') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Institute Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="institute[]" value="{{ $education->institute }}">
           @error('institute.*') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Department/Group: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="department[]" value="{{ $education->department }}">
            @error('department.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Passing Year: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="passing_year[]" value="{{ $education->passing_year }}">
            @error('passing_year.*') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Result/GPA: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="result[]" value="{{ $education->result }}">
            @error('result.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-1">
          <button type="button" class="btn btn-success add-education">Add</button>
        </div>

        <div class="col-lg-1">
          <button type="button" class="btn btn-danger remove-education">Remove</button>
        </div>
      </div>
      @endforeach



      <p class="mg-b-5 mg-sm-b-5">3. Training Information.</p>
      <div><hr style="border: 1px solid black;"></div>
@foreach($editData->trainings as $index => $training)
    <div class="row mg-b-25 training-fields"><!-- Start Training Info -->
        <input type="hidden" name="training_id[]" value="{{ $training->id }}">

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label">Organization Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="organization[]" value="{{ $training->organization }}" >
                @error('organization.' . $index)
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label">Subject Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="subject[]" value="{{ $training->subject }}">
                @error('subject.' . $index)
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-group">
                <label class="form-control-label">Course Duration: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="duration[]" value="{{ $training->duration }}">
                @error('duration.' . $index) 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-group">
                <label class="form-control-label">Completion Year: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="completion_year[]" value="{{ $training->completion_year }}" placeholder="Enter completion year">
                @error('completion_year.' . $index) 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-lg-1">
            <button type="button" class="btn btn-success add-training">Add</button>
        </div>

        <div class="col-lg-1">
            <button type="button" class="btn btn-danger remove-training">Remove</button>
        </div>
    </div>
@endforeach


      <p class="mg-b-5 mg-sm-b-5">4. Job Experiences.</p>
      <div><hr style="border: 1px solid black;"></div>
      @foreach($editData->job_experiences as $jobExperience)
      <div class="row mg-b-25 job-experience-fields"><!-- Start Job Experience Info -->
        <input type="hidden" name="job_experience_id[]" value="{{ $jobExperience->id }}">
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="company_name[]" value="{{ $jobExperience->company_name }}" placeholder="Enter company name">
            @error('company_name.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="designation[]" value="{{ $jobExperience->designation }}" placeholder="Enter designation">
            @error('designation.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Joining Date: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="joining_date[]" value="{{ $jobExperience->joining_date }}" placeholder="Enter joining date">
            @error('joining_date.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Departure Date: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="departure_date[]" value="{{ $jobExperience->departure_date }}" placeholder="Enter departure date">
            @error('departure_date.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-1">
          <button type="button" class="btn btn-success add-job-experience">Add</button>
        </div>

        <div class="col-lg-1">
          <button type="button" class="btn btn-danger remove-job-experience">Remove</button>
        </div>
      </div>
      @endforeach


      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('resume') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
  function mainProfilePicUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainProfilePic').attr('src',e.target.result).width(150).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.add-education', function() {
      var educationFieldsContainer = $('.education-fields');
      var newEducationField = educationFieldsContainer.first().clone();
      newEducationField.find('input').val('');
      educationFieldsContainer.last().after(newEducationField);
    });

    $(document).on('click', '.remove-education', function() {
      var educationFieldsContainer = $(this).closest('.education-fields');
      if (educationFieldsContainer.siblings('.education-fields').length > 0) {
        educationFieldsContainer.remove();
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.add-training', function() {
      var trainingFieldsContainer = $('.training-fields');
      var newTrainingField = trainingFieldsContainer.first().clone();
      newTrainingField.find('input').val('');
      trainingFieldsContainer.last().after(newTrainingField);
    });

    $(document).on('click', '.remove-training', function() {
      var trainingFieldsContainer = $(this).closest('.training-fields');
      if (trainingFieldsContainer.siblings('.training-fields').length > 0) {
        trainingFieldsContainer.remove();
      }
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '.add-job-experience', function() {
      var jobExperienceFieldsContainer = $('.job-experience-fields');
      var newJobExperienceField = jobExperienceFieldsContainer.first().clone();
      newJobExperienceField.find('input').val('');
      jobExperienceFieldsContainer.last().after(newJobExperienceField);
    });

    $(document).on('click', '.remove-job-experience', function() {
      var jobExperienceFieldsContainer = $(this).closest('.job-experience-fields');
      if (jobExperienceFieldsContainer.siblings('.job-experience-fields').length > 0) {
        jobExperienceFieldsContainer.remove();
      }
    });
  });
</script>


