<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title mg-sm-b-30">Upload your CV</h6>
  <p class="mg-b-5 mg-sm-b-5">1. Personal Information.</p>
  <div><hr style="border: 1px solid black;"></div>

  <div class="form-layout">
    <form method="post" action="{{ route('store.resume') }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Full Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter name">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Fathers Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="fathers_name" value="{{ old('fathers_name') }}" placeholder="Enter father name">
            @error('fathers_name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Mothers Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="mothers_name" value="{{ old('mothers_name') }}" placeholder="Enter father name">
            @error('mothers_name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Present Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="present_address" value="{{ old('present_address') }}" placeholder="Enter present address">
            @error('present_address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Permanent Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="permanent_address" value="{{ old('permanent_address') }}" placeholder="Enter permanent address">
            @error('permanent_address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Date Of Birth: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="dob" value="{{ old('dob') }}" placeholder="Enter date of birth">
            @error('dob') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">NID No: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="nid" value="{{ old('nid') }}" placeholder="Enter nid number">
            @error('nid') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Blood Group: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="blood_group" value="{{ old('blood_group') }}" placeholder="Enter blood group">
            @error('blood_group') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Passport No: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="passport" value="{{ old('passport') }}" placeholder="Enter passport number">
            @error('passport') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number">
            @error('phone') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Emergency Contact No: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="emergency_contact_no" value="{{ old('emergency_contact_no') }}" placeholder="Enter emergency contact number">
            @error('emergency_contact_no') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Present Salary: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="present_salary" value="{{ old('present_salary') }}" placeholder="Enter precent salary">
            @error('present_salary') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Expected Salary: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="expected_salary" value="{{ old('expected_salary') }}" placeholder="Enter expected salary">
            @error('expected_salary') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Skills: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="skills" value="{{ old('skills') }}" placeholder="Enter skills number">
            @error('skills') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Hobbies/Interest: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="hobbies" value="{{ old('hobbies') }}" placeholder="Enter emergency contact number">
            @error('hobbies') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Whatsapp: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="Enter whatsapp number">
            @error('whatsapp') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Linkedin Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="linkedin" value="{{ old('linkedin') }}" placeholder="Enter linkedin link">
            @error('linkedin') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Facebook Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="facebook" value="{{ old('facebook') }}" placeholder="Enter facebook link">
            @error('facebook') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Github Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="github" value="{{ old('github') }}" placeholder="Enter github link">
            @error('github') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Behance Link: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="behance" value="{{ old('behance') }}" placeholder="Enter behance link">
            @error('behance') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Portfolio Website: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="portfolio_website" value="{{ old('portfolio_website') }}" placeholder="Enter portfolio website link">
            @error('portfolio_website') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-4">
          <label class="form-control-label">Upload Profile Picture: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file2" class="custom-file-input" name="profile_picture" onChange="mainProfilePicUrl(this)" >
            <span class="custom-file-control custom-file-control-primary"></span>
          </label>
          <div>
            @error('profile_picture') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <img src="" id="mainProfilePic" class="mt-1">
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Carrer Objective: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote"  name="carrer_objective">{{ old('carrer_objective') }}</textarea>
            @error('carrer_objective') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div><!-- End personal Info -->

      <p class="mg-b-5 mg-sm-b-5">2. Education Information.</p>
      <div><hr style="border: 1px solid black;"></div>

      <div class="row mg-b-25 education-fields"><!-- Start Education Info -->

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Degree Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="degree[]" placeholder="Enter degree name">
            @error('degree') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Institute Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="institute[]" placeholder="Enter institute name">
            @error('institute') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Department/Group: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="department[]" placeholder="Enter department name">
            @error('department') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Passing Year: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="passing_year[]" placeholder="Enter passing year">
            @error('passing_year') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Result/GPA: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="result[]" placeholder="Enter result">
            @error('result') 
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

      <p class="mg-b-5 mg-sm-b-5">3. Training Information.</p>
      <div><hr style="border: 1px solid black;"></div>
      <div class="row mg-b-25 training-fields"><!-- Start Education Info -->
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Organization Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="organization[]" placeholder="Enter organization name">
            @error('organization') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Subject Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="subject[]" placeholder="Enter subject name">
            @error('subject') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Course Duration: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="duration[]" placeholder="Enter duration">
            @error('duration') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Completion Year: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="completion_year[]" placeholder="Enter passing year">
            @error('completion_year') 
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

      <p class="mg-b-5 mg-sm-b-5">4. Job Experiences.</p>
      <div><hr style="border: 1px solid black;"></div>
      <div class="row mg-b-25 job-experience-fields"><!-- Start Education Info -->
        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="company_name[]" placeholder="Enter company name">
            @error('company_name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="designation[]" placeholder="Enter designation">
            @error('designation') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Joining Date: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="joining_date[]" placeholder="Enter joining date">
            @error('joining_date') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Departure Date: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="departure_date[]" placeholder="Enter departure date">
            @error('departure_date') 
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

      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
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


