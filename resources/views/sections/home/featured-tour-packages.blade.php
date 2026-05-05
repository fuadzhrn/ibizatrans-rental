<section id="packages" class="section packages-section">
    <div class="container">
        <h2 class="section-title">Featured Tour Packages</h2>
        <div class="packages-grid">
            <article class="package-card">
                <div class="badge">Escapada Trip</div>
                <div class="pkg-image" @if(!empty($packageImages[0])) style="background-image: url('{{ asset($packageImages[0]) }}'); background-size: cover; background-position: center;" @endif></div>
                <h3>Kawah Ijen + Taman Nasional Baluran</h3>
                <p>Ijen trekking, savana Baluran, nature experience</p>
                <div class="pkg-meta">Mulai dari: <strong>315K/pax</strong> (5 orang)</div>
                <a class="btn btn-outline" href="/paket-tour">Detail Paket</a>
            </article>

            <article class="package-card">
                <div class="badge">Esencia Trip</div>
                <div class="pkg-image" @if(!empty($packageImages[1])) style="background-image: url('{{ asset($packageImages[1]) }}'); background-size: cover; background-position: center;" @endif></div>
                <h3>Menjangan Island + Tabuhan Island</h3>
                <p>Snorkeling, island hopping, underwater documentation</p>
                <div class="pkg-meta">Mulai dari: <strong>499K/pax</strong> (5 orang)</div>
                <a class="btn btn-outline" href="/paket-tour">Detail Paket</a>
            </article>

            <article class="package-card">
                <div class="badge">Aventura Trip</div>
                <div class="pkg-image" @if(!empty($packageImages[2])) style="background-image: url('{{ asset($packageImages[2]) }}'); background-size: cover; background-position: center;" @endif></div>
                <h3>Djawatan, Green Island & Beaches</h3>
                <p>Beach, forest, private boat, sunset</p>
                <div class="pkg-meta">Mulai dari: <strong>450K/pax</strong> (5 orang)</div>
                <a class="btn btn-outline" href="/paket-tour">Detail Paket</a>
            </article>

            <article class="package-card">
                <div class="badge">Travesia Trip</div>
                <div class="pkg-image" @if(!empty($packageImages[3])) style="background-image: url('{{ asset($packageImages[3]) }}'); background-size: cover; background-position: center;" @endif></div>
                <h3>Kawah Ijen Experience</h3>
                <p>Ijen sunrise/blue fire experience, trekking</p>
                <div class="pkg-meta">Mulai dari: <strong>215K/pax</strong> (5 orang)</div>
                <a class="btn btn-outline" href="/paket-tour">Detail Paket</a>
            </article>
        </div>
    </div>
</section>
