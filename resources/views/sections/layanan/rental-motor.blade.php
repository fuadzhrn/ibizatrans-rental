<section id="rental-motor" class="rental-motor section">
    <div class="container">
        <h2 class="section-title">Rental Motor Banyuwangi</h2>
        <p class="section-sub">Pilihan motor praktis untuk eksplorasi Banyuwangi dengan lebih fleksibel, hemat, dan nyaman.</p>

        @php
            $fallbackMotorUnits = [
                ['name' => 'PCX', 'category' => 'Premium', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'NMAX', 'category' => 'Premium', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Stylo', 'category' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Vario', 'category' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Scoopy', 'category' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Beat', 'category' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Lexi', 'category' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Fazzio', 'category' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Aerox', 'category' => 'Sporty', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Genio', 'category' => 'Matic', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
            ];

            $motorItems = (isset($rentalMotors) && $rentalMotors && $rentalMotors->count() > 0) ? $rentalMotors : collect($fallbackMotorUnits);
            $isMotorPaginator = isset($rentalMotors) && $rentalMotors instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator;
        @endphp

        <div class="rental-motor__grid">
            @forelse($motorItems as $unit)
                @php
                    $unitName = is_array($unit) ? ($unit['name'] ?? '-') : $unit->name;
                    $unitBadge = is_array($unit) ? ($unit['category'] ?? 'Rental Motor') : ($unit->category ?? 'Rental Motor');
                    $unitImage = is_array($unit)
                        ? asset($unit['image'] ?? 'assets/images/layanan/layanan-hero.jpg')
                        : ($unit->image ? asset('storage/' . $unit->image) : asset('assets/images/layanan/layanan-hero.jpg'));
                @endphp
                <article class="motor-fleet-card">
                    <div class="motor-fleet-card__image-wrap">
                        <img src="{{ $unitImage }}" alt="{{ $unitName }}" class="motor-fleet-card__image">
                        <span class="motor-fleet-card__badge">{{ $unitBadge }}</span>
                    </div>
                    <div class="motor-fleet-card__body">
                        <h4 class="motor-fleet-card__name">{{ $unitName }}</h4>
                    </div>
                </article>
            @empty
                <article class="motor-fleet-card">
                    <div class="motor-fleet-card__image-wrap">
                        <img src="{{ asset('assets/images/layanan/layanan-hero.jpg') }}" alt="Rental Motor" class="motor-fleet-card__image">
                        <span class="motor-fleet-card__badge">Rental Motor</span>
                    </div>
                    <div class="motor-fleet-card__body">
                        <h4 class="motor-fleet-card__name">Unit segera tersedia</h4>
                    </div>
                </article>
            @endforelse
        </div>

        @if($isMotorPaginator && $rentalMotors->lastPage() > 1)
            <div class="rental-motor-pagination">
                @if(!$rentalMotors->onFirstPage())
                    <a href="{{ $rentalMotors->previousPageUrl() }}#rental-motor" class="rental-motor-pagination__btn">Previous</a>
                @endif

                <span class="rental-motor-pagination__meta">{{ $rentalMotors->currentPage() }} / {{ $rentalMotors->lastPage() }}</span>

                @if($rentalMotors->hasMorePages())
                    <a href="{{ $rentalMotors->nextPageUrl() }}#rental-motor" class="rental-motor-pagination__btn">Next</a>
                @endif
            </div>
        @endif

        <div class="rental-motor__action">
            <a class="btn btn-primary" href="https://wa.me/6285703399966?text=Halo%20Ibiza%20Trans%2C%20saya%20ingin%20bertanya%20tentang%20rental%20motor." target="_blank">Cek Harga & Ketersediaan</a>
        </div>
    </div>
</section>
