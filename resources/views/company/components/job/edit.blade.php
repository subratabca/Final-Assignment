<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Job Info</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.job', ['id' => $editData->id]) }}">
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Job Title: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="title" value="{{ $editData->title }}">
            @error('title') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
            <select class="form-control select2" name="category_id">
              <option value="" selected="" disabled="" >Choose one</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $category->id == $editData->category_id ? 'selected' : '' }} >
              {{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Deadline: <span class="tx-danger">*</span></label>
            <input type="date" class="form-control" name="deadline" value="{{ $editData->deadline }}">
            @error('deadline') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Job Vacancy: <span class="tx-danger">*</span></label>
            <input type="number" class="form-control" name="vacancy" value="{{ $editData->vacancy }}">
            @error('vacancy') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Minimum Education: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="education" value="{{ $editData->education }}">
            @error('education') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Job Nature: <span class="tx-danger">*</span></label>
            <select class="form-control select2" name="job_nature">
              <option value="" selected="" disabled="" >Choose one</option>
              <option value="Remote" {{ $editData->job_nature == 'Remote' ? 'selected' : '' }}>Remote</option>
              <option value="On Site" {{ $editData->job_nature == 'On Site' ? 'selected' : '' }}>On Site</option>
            </select>
            @error('job_nature')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Job Type: <span class="tx-danger">*</span></label>
            <select class="form-control select2" name="job_type">
              <option value="" selected="" disabled="" >Choose one</option>
              <option value="Full Time" {{ $editData->job_type == 'Full Time' ? 'selected' : '' }}>Full Time</option>
              <option value="Part Time" {{ $editData->job_type == 'Part Time' ? 'selected' : '' }}>Part Time</option>
            </select>
            @error('job_type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Salary(20000 - 25000): <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="salary"  value="{{ $editData->salary }}">
            @error('salary') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Skills: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" data-role="tagsinput" name="skills"  value="{{ $editData->skills }}">
            @error('skills') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="address" value="{{ $editData->address }}">
            @error('address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">City: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="city" value="{{ $editData->city }}">
            @error('city') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="country" value="{{ $editData->country }}">
            @error('country') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Zip Code: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="zip_code" value="{{ $editData->zip_code }}">
            @error('zip_code') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>


        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Description:</label>
            <textarea class="form-control" id="summernote"  name="description">{{ old('description', $editData->description) }}</textarea>
            @error('description') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Requirements: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote1"  name="requirements">{{ old('requirements', $editData->requirements) }}</textarea>
            @error('requirements') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Responsibility: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote2"  name="responsibility">{{ old('responsibility', $editData->responsibility) }}</textarea>
            @error('responsibility') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Benefits: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote3"  name="benefits">{{ old('benefits', $editData->benefits) }}</textarea>
            @error('benefits') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Company Short Description (200 words): <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote4"  name="company_description">{{ old('company_description', $editData->company_description) }}</textarea>
            @error('company_description') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('jobs') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>




