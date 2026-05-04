@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/layanan.css') }}">
@endpush

@section('content')
    <div class="layanan-page">
        @include('sections.layanan.hero')
        @include('sections.layanan.services-overview')
        @include('sections.layanan.rental-mobil')
        @include('sections.layanan.rental-mobil-pricelist')
        @include('sections.layanan.rental-motor')
        @include('sections.layanan.driver-service')
        @include('sections.layanan.airport-transfer')
        @include('sections.layanan.cta')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/layanan.js') }}"></script>
@endpush
