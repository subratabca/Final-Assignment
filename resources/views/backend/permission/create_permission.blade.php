@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Permission  </h4><br><br>
                        <form method="post" action="{{ route('store.permission') }}" id="myForm" >
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Permission Name</label>
                                        <input class="form-control example-date-input" name="name" type="text">
                                    </div>
                                    @error('name') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Permission For </label>
                                        <select name="for" id="subcat_id" class="form-select" aria-label="Default select example">
                                            <option selected="" disabled>Select PermissionFor</option>
                                             @foreach($permissionFors as $row)
                                            <option value="{{ $row->id }}">{{ $row->for }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('for') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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