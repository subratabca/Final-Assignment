@extends('backend.layout.master-layout')
@section('title','Blog Page')
@section('breadcum','Update Blog Info')

@section('content')
    @include('backend.components.blog.edit')
@endsection