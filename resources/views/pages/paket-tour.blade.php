@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/paket-tour.css') }}">
@endpush

@section('content')
    <div class="paket-tour-page">
        @include('sections.paket-tour.hero')
        @include('sections.paket-tour.tour-overview')
        @include('sections.paket-tour.featured-tour-cards')
        @include('sections.paket-tour.tour-details')
        @include('sections.paket-tour.custom-private-trip')
        @include('sections.paket-tour.trip-notes')
        @include('sections.paket-tour.faq')
        @include('sections.paket-tour.cta')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/paket-tour.js') }}"></script>
@endpush
