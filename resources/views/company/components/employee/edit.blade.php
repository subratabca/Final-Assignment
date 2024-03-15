<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Employee Information</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.company.employee', ['id' => $company->id]) }}" >
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $company->name}}">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input type="email" class="form-control" name="email" value="{{ $company->email}}">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone" value="{{ $company->phone}}">
            @error('phone') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <br>

      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('company.employee') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>



