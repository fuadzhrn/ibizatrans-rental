@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark border-gold">
                <div class="inner">
                    <h4>Home Page</h4>
                    <p>Kelola konten halaman Home</p>
                </div>
                <div class="icon">
                    <i class="fas fa-house"></i>
                </div>
                <a href="{{ url('/dashboard/home') }}" class="small-box-footer btn-gold">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark border-gold">
                <div class="inner">
                    <h4>Layanan</h4>
                    <p>Kelola konten layanan transportasi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-car"></i>
                </div>
                <a href="{{ url('/dashboard/layanan') }}" class="small-box-footer btn-gold">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark border-gold">
                <div class="inner">
                    <h4>Paket Tour</h4>
                    <p>Kelola paket wisata Banyuwangi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-location-dot"></i>
                </div>
                <a href="{{ url('/dashboard/paket-tour') }}" class="small-box-footer btn-gold">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-dark border-gold">
                <div class="inner">
                    <h4>Contact</h4>
                    <p>Kelola informasi kontak & partnership</p>
                </div>
                <div class="icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <a href="{{ url('/dashboard/contact') }}" class="small-box-footer btn-gold">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Website Overview</h3>
                </div>
                <div class="card-body">
                    <p>Ibiza Trans adalah website rental mobil dan private tour Banyuwangi dengan layanan rental mobil, rental motor, driver, transfer, dan paket tour.</p>
                    <a href="/" class="btn btn-gold mt-3">View Public Website</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <a href="{{ route('admin.home.about.index') }}" class="btn btn-outline">Manage About</a>
                    <a href="{{ route('admin.home.gallery.index') }}" class="btn btn-outline">Manage Gallery</a>
                    <a href="{{ route('admin.home.highlight-services.index') }}" class="btn btn-outline">Manage Highlight Layanan</a>
                    <a href="{{ url('/dashboard/layanan') }}" class="btn btn-outline">Edit Layanan Content</a>
                </div>
            </div>
        </div>
    </div>
@endsection
