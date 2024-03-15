<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Role</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.role',$role->id) }}">
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $role->name }}">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

      <div class="row">
        @foreach($permissionFors as $permissionFor)
        <div class="col-lg-3">
          <h6 class="card-body-title">Assign {{$permissionFor->for}} Access</h6>
          @foreach($permissions as $permission)
          @if($permission->for == $permissionFor->id)
          <label class="ckbox">
            <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
            @foreach ($role->permissions as $role_permit)
            @if ($role_permit->id == $permission->id)
            checked
            @endif
            @endforeach>
            <span>{{ $permission->name }}</span>
          </label>
          @endif
          @endforeach
        </div>
        @endforeach
      </div>
      <br>

      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
        <a href="{{ route('role') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>



