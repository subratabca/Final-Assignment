@extends('company.layout.master-layout')
@section('title','Employee List')
@section('breadcum','Employee List')

@section('content')
    @include('company.components.employee.index')
@endsection