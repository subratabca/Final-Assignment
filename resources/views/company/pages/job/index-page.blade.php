@extends('company.layout.master-layout')
@section('title','Job Page')
@section('breadcum','Job List')

@section('content')
    @include('company.components.job.index')
@endsection