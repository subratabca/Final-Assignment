@extends('backend.layout.master-layout')
@section('title','Blog Page')
@section('breadcum','Create New Blog')

@section('content')
    @include('backend.components.blog.create')
@endsection