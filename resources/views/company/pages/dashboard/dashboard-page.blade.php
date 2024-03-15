@extends('company.layout.master-layout')
@section('title','Company Dashboard')
@section('breadcum','Dashboard')

@section('content')
    @include('company.components.dashboard.summary')
@endsection