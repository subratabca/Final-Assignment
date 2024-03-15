@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Permission List</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('permission.create') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Permission </i></a> <br>  <br>               
                        <h4 class="card-title">Permission All Data </h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Permission Name</th>
                                    <th>Permission For</th>   
                                    <th width="20%">Action</th>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $key => $permission)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $permission->name }} </td>
                                        <td>
                                            @foreach($permissionFors as $permissionFor)
                                            @if($permissionFor->id == $permission->for)
                                            {{ $permissionFor->for }}
                                            @endif
                                            @endforeach 
                                      </td>  
                                        <td>
                                            <a href="{{ URL::to('edit/permission/'.$permission->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            <a href="{{ URL::to('delete/permission/'.$permission->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                        </td>   
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    @endsection