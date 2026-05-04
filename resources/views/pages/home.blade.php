@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@section('content')
    @include('sections.home.hero')
    @include('sections.home.about')
    @include('sections.home.services-highlight')
    @include('sections.home.why-choose-us')
    @include('sections.home.featured-tour-packages')
    @include('sections.home.testimonial')
    @include('sections.home.gallery')
    @include('sections.home.cta-booking')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/home.js') }}"></script>
@endpush
