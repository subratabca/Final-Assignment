@extends('backend.layout.master-layout')
@section('title','Category Page')
@section('breadcum','Category List')

@section('content')
    @include('backend.components.category.index')
@endsection