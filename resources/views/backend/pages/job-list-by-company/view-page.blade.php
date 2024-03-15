@extends('backend.layout.master-layout')
@section('title','Admin || Job Details')
@section('breadcum','Job Details Info')
@section('content')
    @include('backend.components.job-list-by-company.view')
@endsection