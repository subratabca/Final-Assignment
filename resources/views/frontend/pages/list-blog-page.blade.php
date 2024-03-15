@extends('frontend.layout.master-layout')
@section('title', 'Blog List')
@section('content')
    @include('frontend.components.pages.blog-list')
    @include('frontend.components.home.testimonial')
@endsection