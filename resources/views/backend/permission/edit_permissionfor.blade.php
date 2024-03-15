@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Permission For</h4><br><br>
                        <form method="post" action="{{ url('update/permission-for/'.$permission->id) }}}" id="myForm" >
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Permission For</label>
                                        <input type="text" class="form-control example-date-input" name="for" value="{{ $permission->for }}">
                                    </div>
                                    @error('name') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
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