@extends('backend.layout.master-layout')
@section('title','Admin || Job List')
@section('breadcum','Job List')
@section('content')
    @include('backend.components.job-list-by-company.index')
@endsection