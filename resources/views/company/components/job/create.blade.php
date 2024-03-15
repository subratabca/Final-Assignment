<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Create New Job</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('store.job') }}">
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Job Title: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
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
              <option value="{{ $category->id }}">{{ $category->name }}</option>
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
            <input type="date" class="form-control" name="deadline" value="{{ old('deadline') }}" placeholder="Application Deadline">
            @error('deadline') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Job Vacancy: <span class="tx-danger">*</span></label>
            <input type="number" class="form-control" name="vacancy" value="{{ old('vacancy') }}" placeholder="Enter vacancy">
            @error('vacancy') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Minimum Education: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="education" value="{{ old('education') }}" placeholder="Enter education">
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
              <option value="Remote" {{ old('location') == 'free' ? 'selected' : '' }}>Remote</option>
              <option value="On Site" {{ old('location') == 'paid' ? 'selected' : '' }}>On Site</option>
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
              <option value="Full Time" {{ old('job_type') == 'free' ? 'selected' : '' }}>Full Time</option>
              <option value="Part Time" {{ old('job_type') == 'paid' ? 'selected' : '' }}>Part Time</option>
            </select>
            @error('job_type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Salary(20000 - 25000): <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="salary" value="{{ old('salary') }}" placeholder="Enter your salary">
            @error('salary') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Skills: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" data-role="tagsinput" name="skills" value="{{ old('skills') }}" placeholder="Enter your skills">
            @error('skills') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter address">
            @error('address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">City: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Enter city">
            @error('city') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="country" value="{{ old('country') }}" placeholder="Enter country">
            @error('country') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Zip Code: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}" placeholder="Enter zip code">
            @error('zip_code') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>


        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Description:</label>
            <textarea class="form-control" id="summernote"  name="description">{{ old('description') }}</textarea>
            @error('description') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Requirements: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote1"  name="requirements">{{ old('requirements') }}</textarea>
            @error('requirements') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Responsibility: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote2"  name="responsibility">{{ old('responsibility') }} </textarea>
            @error('responsibility') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Benefits: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote3"  name="benefits">{{ old('benefits') }}</textarea>
            @error('benefits') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Company Short Description (200 words): <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote4"  name="company_description">{{ old('company_description') }}</textarea>
            @error('company_description') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
        <a href="{{ route('jobs') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>

