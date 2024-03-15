@extends('backend.layout.master-layout')
@section('title','Blog Category Page')
@section('breadcum','Blog Category List')

@section('content')
    @include('backend.components.blog-category.index')
@endsection