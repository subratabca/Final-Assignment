@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ url('update/role/'.$role->id) }}" id="myForm" >
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Role Name</label>
                                        <input class="form-control example-date-input" name="name" type="text" value="{{ $role->name }}">
                                    </div>
                                    @error('name') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><br><br>
                              <div class="row">
                                @foreach($permissionFors as $permissionFor)
                                <div class="col-lg-3">
                                 <h6 class="card-body-title">{{$permissionFor->for}} Permissions</h6>
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" id="storeButton">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection 