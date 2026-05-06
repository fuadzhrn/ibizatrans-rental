<section id="rental-mobil" class="rental-mobil section">
    <div class="container rental-mobil__wrap">
        <div class="rental-mobil__copy">
            <h2 class="section-title">Rental Mobil Banyuwangi</h2>
            <p class="section-sub">Nikmati pilihan armada bersih dan terawat untuk kebutuhan perjalanan harian, bisnis, keluarga, hingga wisata di Banyuwangi.</p>

            <div class="rental-mobil__type">
                <h3><i class="ri-key-2-line"></i> Lepas Kunci</h3>
                <p>Tersedia pilihan durasi per day dan 24 jam. Cocok untuk customer yang ingin fleksibel mengatur perjalanan sendiri.</p>
            </div>

            <div class="rental-mobil__type">
                <h3><i class="ri-user-star-line"></i> Include Driver</h3>
                <p>Cocok untuk city tour, tamu hotel/villa, keluarga, dan perjalanan yang ingin lebih praktis bersama driver profesional.</p>
            </div>

            <ul class="rental-mobil__benefits">
                <li><i class="ri-check-line"></i> Armada bersih dan terawat</li>
                <li><i class="ri-check-line"></i> Proses booking mudah via WhatsApp</li>
                <li><i class="ri-check-line"></i> Fleksibel untuk perjalanan bisnis dan wisata</li>
            </ul>

            <p class="rental-mobil__note">Pilihan unit dapat menyesuaikan ketersediaan. Hubungi admin untuk cek jadwal dan unit terbaru.</p>
        </div>

        @php
            $fallbackFleetUnits = [
                ['name' => 'Ayla', 'category' => 'City Car', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Brio', 'category' => 'City Car', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Agya', 'category' => 'City Car', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Innova Reborn', 'category' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Innova Zenix', 'category' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'All New Avanza', 'category' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'All New Xenia', 'category' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Terios', 'category' => 'SUV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Hiace Commuter', 'category' => 'Hiace', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Hiace Premio', 'category' => 'Hiace', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
            ];

            $fleetItems = (isset($rentalCars) && $rentalCars && $rentalCars->count() > 0) ? $rentalCars : collect($fallbackFleetUnits);
            $isFleetPaginator = isset($rentalCars) && $rentalCars instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator;
        @endphp

        <div class="rental-mobil__units">
            <div class="rental-mobil__grid">
                @forelse($fleetItems as $unit)
                    @php
                        $unitName = is_array($unit) ? ($unit['name'] ?? '-') : $unit->name;
                        $unitBadge = is_array($unit) ? ($unit['category'] ?? 'Rental Car') : ($unit->category ?? 'Rental Car');
                        $unitImage = is_array($unit)
                            ? asset($unit['image'] ?? 'assets/images/layanan/layanan-hero.jpg')
                            : ($unit->image ? asset('storage/' . $unit->image) : asset('assets/images/layanan/layanan-hero.jpg'));
                    @endphp
                    <article class="rental-fleet-card">
                        <div class="rental-fleet-card__image-wrap">
                            <img src="{{ $unitImage }}" alt="{{ $unitName }}" class="rental-fleet-card__image">
                            <span class="rental-fleet-card__badge">{{ $unitBadge }}</span>
                        </div>
                        <div class="rental-fleet-card__body">
                            <h4 class="rental-fleet-card__name">{{ $unitName }}</h4>
                        </div>
                    </article>
                @empty
                    <article class="rental-fleet-card">
                        <div class="rental-fleet-card__image-wrap">
                            <img src="{{ asset('assets/images/layanan/layanan-hero.jpg') }}" alt="Rental Car" class="rental-fleet-card__image">
                            <span class="rental-fleet-card__badge">Rental Car</span>
                        </div>
                        <div class="rental-fleet-card__body">
                            <h4 class="rental-fleet-card__name">Unit segera tersedia</h4>
                        </div>
                    </article>
                @endforelse
            </div>

            @if($isFleetPaginator && $rentalCars->lastPage() > 1)
                <div class="rental-fleet-pagination">
                    @if(!$rentalCars->onFirstPage())
                        <a href="{{ $rentalCars->previousPageUrl() }}#rental-mobil" class="rental-fleet-pagination__btn rental-fleet-pagination__btn--prev">Previous</a>
                    @endif

                    <span class="rental-fleet-pagination__meta">{{ $rentalCars->currentPage() }} / {{ $rentalCars->lastPage() }}</span>

                    @if($rentalCars->hasMorePages())
                        <a href="{{ $rentalCars->nextPageUrl() }}#rental-mobil" class="rental-fleet-pagination__btn rental-fleet-pagination__btn--next">Next</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
