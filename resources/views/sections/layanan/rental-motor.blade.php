<section id="rental-motor" class="rental-motor section">
    <div class="container">
        <h2 class="section-title">Rental Motor Banyuwangi</h2>
        <p class="section-sub">Pilihan motor praktis untuk eksplorasi Banyuwangi dengan lebih fleksibel, hemat, dan nyaman.</p>

        @php
            $motorUnits = [
                ['name' => 'PCX', 'type' => 'Premium', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'NMAX', 'type' => 'Premium', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Stylo', 'type' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Vario', 'type' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Scoopy', 'type' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Beat', 'type' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Lexi', 'type' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Fazzio', 'type' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Aerox', 'type' => 'Sporty', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Genio', 'type' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
            ];

            $motorPerPage = 8;
            $motorPage = max(1, (int) request('motor_page', 1));
            $motorTotal = count($motorUnits);
            $motorTotalPages = max(1, (int) ceil($motorTotal / $motorPerPage));
            $motorPage = min($motorPage, $motorTotalPages);
            $motorOffset = ($motorPage - 1) * $motorPerPage;
            $visibleMotorUnits = array_slice($motorUnits, $motorOffset, $motorPerPage);
        @endphp

        <div class="rental-motor__grid">
            @foreach($visibleMotorUnits as $unit)
                <article class="motor-fleet-card">
                    <div class="motor-fleet-card__image-wrap">
                        <img src="{{ asset($unit['image']) }}" alt="{{ $unit['name'] }}" class="motor-fleet-card__image">
                        <span class="motor-fleet-card__badge">{{ $unit['type'] }}</span>
                    </div>
                    <div class="motor-fleet-card__body">
                        <h4 class="motor-fleet-card__name">{{ $unit['name'] }}</h4>
                    </div>
                </article>
            @endforeach
        </div>

        @if($motorTotalPages > 1)
            <div class="rental-motor-pagination">
                @if($motorPage > 1)
                    <a href="{{ request()->fullUrlWithQuery(['motor_page' => $motorPage - 1]) }}#rental-motor" class="rental-motor-pagination__btn">Previous</a>
                @endif

                <span class="rental-motor-pagination__meta">{{ $motorPage }} / {{ $motorTotalPages }}</span>

                @if($motorPage < $motorTotalPages)
                    <a href="{{ request()->fullUrlWithQuery(['motor_page' => $motorPage + 1]) }}#rental-motor" class="rental-motor-pagination__btn">Next</a>
                @endif
            </div>
        @endif

        <div class="rental-motor__action">
            <a class="btn btn-primary" href="https://wa.me/6285703399966?text=Halo%20Ibiza%20Trans%2C%20saya%20ingin%20bertanya%20tentang%20rental%20motor." target="_blank">Cek Harga & Ketersediaan</a>
        </div>
    </div>
</section>
