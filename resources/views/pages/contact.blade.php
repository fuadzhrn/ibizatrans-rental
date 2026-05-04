@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endpush

@section('content')
    @include('sections.contact.hero')
    @include('sections.contact.contact-concierge')
    @include('sections.contact.maps')
    @include('sections.contact.social-media')
    @include('sections.contact.final-cta')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/contact.js') }}"></script>
@endpush
