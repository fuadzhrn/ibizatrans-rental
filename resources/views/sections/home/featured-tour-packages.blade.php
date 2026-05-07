<section id="packages" class="section packages-section">
    <div class="container">
        <h2 class="section-title">Featured Tour Packages</h2>
        <div class="packages-grid">
            @forelse(($homeTourPackages ?? collect()) as $tour)
            <article class="package-card">
                <div class="badge">{{ $tour->badge ?? $tour->name }}</div>
                <div class="pkg-image" @if($tour->image) style="background-image: url('{{ asset('storage/'.$tour->image) }}'); background-size: cover; background-position: center;" @else style="background: linear-gradient(135deg, rgba(217,154,0,0.12), rgba(244,196,48,0.06));" @endif></div>
                <h3>{{ $tour->destination_summary ?? $tour->name }}</h3>
                <p>{{ $tour->highlight ?? $tour->short_description ?? '-' }}</p>
                <div class="pkg-meta">Mulai dari: <strong>{{ $tour->starting_price ? number_format($tour->starting_price/1000, 0, ',', '.') . 'K' : '-' }}/pax</strong></div>
                <a class="btn btn-outline" href="/paket-tour">Detail Paket</a>
            </article>
            @empty
            <article class="package-card">
                <div class="badge">Belum Ada Paket</div>
                <div class="pkg-image" style="background: linear-gradient(135deg, rgba(217,154,0,0.12), rgba(244,196,48,0.06));"></div>
                <h3>Paket tour belum tersedia</h3>
                <p>Silakan tambahkan paket tour aktif dari dashboard admin.</p>
                <div class="pkg-meta">Mulai dari: <strong>-</strong></div>
                <a class="btn btn-outline" href="/paket-tour">Detail Paket</a>
            </article>
            @endforelse
        </div>
    </div>
</section>
