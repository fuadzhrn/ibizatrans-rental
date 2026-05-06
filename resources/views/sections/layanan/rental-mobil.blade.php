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
            $fleetUnits = [
                ['name' => 'Ayla', 'type' => 'City Car', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Brio', 'type' => 'City Car', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Agya', 'type' => 'City Car', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Innova Reborn', 'type' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Innova Zenix', 'type' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'All New Avanza', 'type' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'All New Xenia', 'type' => 'MPV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Terios', 'type' => 'SUV', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Hiace Commuter', 'type' => 'Hiace', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
                ['name' => 'Hiace Premio', 'type' => 'Hiace', 'image' => 'assets/images/layanan/layanan-hero.jpg'],
            ];

            $fleetPerPage = 9;
            $fleetPage = max(1, (int) request('fleet_page', 1));
            $fleetTotal = count($fleetUnits);
            $fleetTotalPages = max(1, (int) ceil($fleetTotal / $fleetPerPage));
            $fleetPage = min($fleetPage, $fleetTotalPages);
            $fleetOffset = ($fleetPage - 1) * $fleetPerPage;
            $visibleFleetUnits = array_slice($fleetUnits, $fleetOffset, $fleetPerPage);
        @endphp

        <div class="rental-mobil__units">
            <div class="rental-mobil__grid">
                @foreach($visibleFleetUnits as $unit)
                    <article class="rental-fleet-card">
                        <div class="rental-fleet-card__image-wrap">
                            <img src="{{ asset($unit['image']) }}" alt="{{ $unit['name'] }}" class="rental-fleet-card__image">
                            <span class="rental-fleet-card__badge">{{ $unit['type'] }}</span>
                        </div>
                        <div class="rental-fleet-card__body">
                            <h4 class="rental-fleet-card__name">{{ $unit['name'] }}</h4>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($fleetTotalPages > 1)
                <div class="rental-fleet-pagination">
                    @if($fleetPage > 1)
                        <a href="{{ request()->fullUrlWithQuery(['fleet_page' => $fleetPage - 1]) }}#rental-mobil" class="rental-fleet-pagination__btn rental-fleet-pagination__btn--prev">Previous</a>
                    @endif

                    <span class="rental-fleet-pagination__meta">{{ $fleetPage }} / {{ $fleetTotalPages }}</span>

                    @if($fleetPage < $fleetTotalPages)
                        <a href="{{ request()->fullUrlWithQuery(['fleet_page' => $fleetPage + 1]) }}#rental-mobil" class="rental-fleet-pagination__btn rental-fleet-pagination__btn--next">Next</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
