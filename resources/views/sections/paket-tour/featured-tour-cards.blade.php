<section id="featured-tour-cards" class="section featured-tour">
    <div class="container">
        <h2 class="section-title">Pilihan Paket Tour Banyuwangi</h2>
        <p class="section-sub">Pilih paket wisata sesuai destinasi, durasi, dan gaya perjalanan Anda.</p>

        <div class="featured-tour__grid">
            @forelse($tourPackages as $tour)
            <article class="tour-card">
                <div class="tour-card__image" data-image="{{ $tour->slug }}" @if($tour->image) style="background-image: url('{{ asset('storage/'.$tour->image) }}'); background-size: cover; background-position: center;" @endif><span>{{ $tour->name }}</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">{{ $tour->badge ?? $tour->name }}</div>
                    <h3>{{ $tour->destination_summary }}</h3>
                    <p>{{ $tour->highlight }}</p>
                    <div class="tour-price">Mulai dari <strong>{{ $tour->starting_price ? number_format($tour->starting_price/1000,0,',','.') . 'K' : '-' }}/pax</strong></div>
                    <a class="btn btn-outline" href="#{{ $tour->slug }}">Lihat Detail</a>
                </div>
            </article>
            @empty
            <!-- fallback: keep static placeholders if no data -->
            <article class="tour-card">
                <div class="tour-card__image" data-image="placeholder" style="background-image: url('{{ asset('assets/images/placeholder.png') }}'); background-size: cover; background-position: center;"><span>Placeholder</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">Sample Trip</div>
                    <h3>Destinasi belum tersedia</h3>
                    <p>Package data akan tampil setelah seed.</p>
                    <div class="tour-price">Mulai dari <strong>-</strong></div>
                    <a class="btn btn-outline" href="#">Lihat Detail</a>
                </div>
            </article>
            @endforelse
        </div>
    </div>
</section>
