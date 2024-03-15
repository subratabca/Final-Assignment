@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4><br><br>
                        <form method="post" action="{{ url('update/user/'.$user->id) }}" id="myForm" >
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="name" type="text" value="@if (old('name')){{ old('name') }}@else{{ $user->name }} @endif">
                                    </div>
                                    @error('name') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">User Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="username" type="text" value="@if (old('username')){{ old('username') }}@else{{ $user->username }} @endif">
                                    </div>
                                    @error('username') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Email: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="email" type="text" value="@if (old('email')){{ old('email') }}@else{{ $user->email }} @endif">
                                    </div>
                                    @error('email') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Phone: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="phone" type="text" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }} @endif">
                                    </div>
                                    @error('phone') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><br>         
                              <div class="row">
                                <div class="col-lg-3">
                                  <label class="ckbox">
                                    <input type="checkbox" name="status"
                                       @if (old('status') == 1 || $user->status == 1)
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
                                    <input type="checkbox" name="role[]" value="{{ $role->id }}"
                                        @foreach ($user->roles as $user_role)
                                          @if ($user_role->id == $role->id)
                                             checked
                                          @endif
                                        @endforeach>
                                    <span>{{ $role->name }}</span>
                                  </label>
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