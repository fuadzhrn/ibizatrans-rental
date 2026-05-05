@php
    $isHome = request()->routeIs('home');
    $isLayanan = request()->routeIs('layanan');
    $isPaketTour = request()->routeIs('paket-tour');
    $isContact = request()->routeIs('contact');
@endphp

<nav id="ibiza-navbar" class="ibiza-navbar">
    <div class="container nav-container">
        <div class="brand">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-gold">Ibiza</span> Trans
            </a>
        </div>

        <button
            type="button"
            class="nav-toggle"
            id="nav-toggle"
            aria-label="Open navigation menu"
            aria-expanded="false"
            aria-controls="mobile-nav-drawer"
        >
            <i class="ri-menu-line nav-toggle__icon nav-toggle__icon--open" aria-hidden="true"></i>
            <i class="ri-close-line nav-toggle__icon nav-toggle__icon--close" aria-hidden="true"></i>
        </button>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ $isHome ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('layanan') }}" class="{{ $isLayanan ? 'active' : '' }}">Layanan</a></li>
            <li><a href="{{ route('paket-tour') }}" class="{{ $isPaketTour ? 'active' : '' }}">Paket Tour</a></li>
            <li><a href="{{ route('contact') }}" class="{{ $isContact ? 'active' : '' }}">Contact</a></li>
            <li><a class="btn btn-book" href="https://wa.me/6285703399966?text=Halo%20Ibiza%20Trans%2C%20saya%20ingin%20booking%20sekarang." target="_blank" rel="noopener">Book Now</a></li>
        </ul>
    </div>

    <div class="nav-overlay" id="nav-overlay" aria-hidden="true"></div>

    <aside class="mobile-nav-drawer" id="mobile-nav-drawer" aria-hidden="true">
        <div class="mobile-nav-drawer__header">
            <div class="mobile-nav-drawer__brand">
                <span class="logo-gold">Ibiza</span> Trans
            </div>
            <button type="button" class="mobile-nav-close" id="mobile-nav-close" aria-label="Close navigation menu">
                <i class="ri-close-line" aria-hidden="true"></i>
            </button>
        </div>

        <ul class="mobile-nav-links">
            <li><a href="{{ route('home') }}" class="{{ $isHome ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('layanan') }}" class="{{ $isLayanan ? 'active' : '' }}">Layanan</a></li>
            <li><a href="{{ route('paket-tour') }}" class="{{ $isPaketTour ? 'active' : '' }}">Paket Tour</a></li>
            <li><a href="{{ route('contact') }}" class="{{ $isContact ? 'active' : '' }}">Contact</a></li>
            <li><a class="btn btn-book mobile-nav-links__cta" href="https://wa.me/6285703399966?text=Halo%20Ibiza%20Trans%2C%20saya%20ingin%20booking%20sekarang." target="_blank" rel="noopener">Book Now</a></li>
        </ul>
    </aside>
</nav>
