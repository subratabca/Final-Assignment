@extends('backend.layout.master-layout')
@section('title','Role List')
@section('breadcum','Role List')

@section('content')
    @include('backend.components.permission.role.index')
@endsection