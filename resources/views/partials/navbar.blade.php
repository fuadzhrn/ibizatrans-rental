@php
    $isHome = request()->routeIs('home');
    $isLayanan = request()->routeIs('layanan');
@endphp

<nav id="ibiza-navbar" class="ibiza-navbar">
    <div class="container nav-container">
        <div class="brand">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-gold">Ibiza</span> Trans
            </a>
        </div>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ $isHome ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('layanan') }}" class="{{ $isLayanan ? 'active' : '' }}">Layanan</a></li>
            <li><a href="/paket-tour">Paket Tour</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a class="btn btn-book" href="/book-now">Book Now</a></li>
        </ul>
    </div>
</nav>
