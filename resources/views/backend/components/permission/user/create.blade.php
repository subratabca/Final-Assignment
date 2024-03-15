<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Create New Employee</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('store.user') }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" placeholder="Enter name">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone" placeholder="Enter phone">
            @error('phone') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
            <input type="password" class="form-control" name="password" placeholder="Enter password">
            @error('password') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password">
            @error('password_confirmation') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3">
          <label class="ckbox">
            <input type="checkbox" name="status" @if(old('status') == 1)
            checked
            @endif value="1">
            <span>Status</span>
          </label>
        </div>
      </div><br>

      <h6 class="card-body-title">Assign Role</h6>
      <div class="row">
        @foreach ($roles as $role)
        <div class="col-lg-3">
          <label class="ckbox">
            <input type="checkbox" name="role[]" value="{{ $role->id }}">
            <span>{{ $role->name }}</span>
          </label>
        </div>
        @endforeach
      </div>
      <br>

      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
        <a href="{{ route('user') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
  function adminProfileUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#newProfile').attr('src',e.target.result).width(80).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>

