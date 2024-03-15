@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New User</h4><br><br>
                        <form method="post" action="{{ route('store.user') }}" id="myForm" >
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="name" type="text">
                                    </div>
                                    @error('name') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">User Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="username" type="text">
                                    </div>
                                    @error('username') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Email: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="email" type="text">
                                    </div>
                                    @error('email') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Phone: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="phone" type="text">
                                    </div>
                                    @error('phone') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Password: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="password" type="text">
                                    </div>
                                    @error('password') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Confirm Password: <span class="tx-danger">*</span></label>
                                        <input class="form-control example-date-input" name="password_confirmation" type="text">
                                    </div>
                                    @error('password_confirmation') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><br>          
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-info" id="storeButton">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection 