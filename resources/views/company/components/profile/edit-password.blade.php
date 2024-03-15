<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Password</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.admin.password') }}">
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>
            <input type="password" class="form-control" name="oldpassword" value="{{ old('oldpassword') }}" placeholder="Enter Old Password">
            @error('oldpassword') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
            <input type="password" class="form-control"  name="password" value="{{ old('password') }}" placeholder="Enter New Password">
            @error('password') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
            <input type="password" class="form-control"  name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Enter Confirm Password">
            @error('password_confirmation') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
      </div>
    </form>
  </div>
</div>