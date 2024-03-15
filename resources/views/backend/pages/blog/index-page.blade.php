@extends('backend.layout.master-layout')
@section('title','Blog Page')
@section('breadcum','Blog List')

@section('content')
    @include('backend.components.blog.index')
@endsection