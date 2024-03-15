@extends('backend.layout.master-layout')
@section('title','Permission List')
@section('breadcum','Permission List')

@section('content')
    @include('backend.components.permission.permission.index')
@endsection