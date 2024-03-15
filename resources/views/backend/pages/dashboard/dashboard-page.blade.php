@extends('backend.layout.master-layout')
@section('title','Admin Dashboard')
@section('breadcum','Dashboard')

@section('content')
    @include('backend.components.dashboard.summary')
@endsection