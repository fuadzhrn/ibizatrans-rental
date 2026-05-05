<section id="featured-tour-cards" class="section featured-tour">
    <div class="container">
        <h2 class="section-title">Pilihan Paket Tour Banyuwangi</h2>
        <p class="section-sub">Pilih paket wisata sesuai destinasi, durasi, dan gaya perjalanan Anda.</p>

        <div class="featured-tour__grid">
            <article class="tour-card">
                <div class="tour-card__image" data-image="escapada" @if(!empty($tourImages[0])) style="background-image: url('{{ asset($tourImages[0]) }}'); background-size: cover; background-position: center;" @endif><span>Escapada</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">Escapada Trip</div>
                    <h3>Kawah Ijen + Taman Nasional Baluran</h3>
                    <p>Ijen trekking, savana Baluran, nature experience</p>
                    <div class="tour-price">Mulai dari <strong>315K/pax</strong></div>
                    <a class="btn btn-outline" href="#escapada-trip">Lihat Detail</a>
                </div>
            </article>

            <article class="tour-card">
                <div class="tour-card__image" data-image="esencia" @if(!empty($tourImages[1])) style="background-image: url('{{ asset($tourImages[1]) }}'); background-size: cover; background-position: center;" @endif><span>Esencia</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">Esencia Trip</div>
                    <h3>Menjangan Island + Tabuhan Island</h3>
                    <p>Snorkeling, island hopping, underwater documentation</p>
                    <div class="tour-price">Mulai dari <strong>499K/pax</strong></div>
                    <a class="btn btn-outline" href="#esencia-trip">Lihat Detail</a>
                </div>
            </article>

            <article class="tour-card">
                <div class="tour-card__image" data-image="aventura" @if(!empty($tourImages[2])) style="background-image: url('{{ asset($tourImages[2]) }}'); background-size: cover; background-position: center;" @endif><span>Aventura</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">Aventura Trip</div>
                    <h3>Djawatan, Green Island, Goa Bedil, Wedi Ireng, Red Island</h3>
                    <p>Beach, forest, private boat, sunset</p>
                    <div class="tour-price">Mulai dari <strong>450K/pax</strong></div>
                    <a class="btn btn-outline" href="#aventura-trip">Lihat Detail</a>
                </div>
            </article>

            <article class="tour-card">
                <div class="tour-card__image" data-image="travesia" @if(!empty($tourImages[3])) style="background-image: url('{{ asset($tourImages[3]) }}'); background-size: cover; background-position: center;" @endif><span>Travesia</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">Travesia Trip</div>
                    <h3>Kawah Ijen</h3>
                    <p>Ijen sunrise / blue fire experience, trekking</p>
                    <div class="tour-price">Mulai dari <strong>215K/pax</strong></div>
                    <a class="btn btn-outline" href="#travesia-trip">Lihat Detail</a>
                </div>
            </article>

            <article class="tour-card">
                <div class="tour-card__image" data-image="baluran" @if(!empty($tourImages[4])) style="background-image: url('{{ asset($tourImages[4]) }}'); background-size: cover; background-position: center;" @endif><span>Baluran</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">Explore Baluran</div>
                    <h3>Taman Nasional Baluran + Ratu Osing</h3>
                    <p>Savanna landscape, Africa van Java, photography trip</p>
                    <div class="tour-price">Mulai dari <strong>175K/pax</strong></div>
                    <a class="btn btn-outline" href="#explore-baluran">Lihat Detail</a>
                </div>
            </article>

            <article class="tour-card">
                <div class="tour-card__image" data-image="banyuwangi-selatan" @if(!empty($tourImages[5])) style="background-image: url('{{ asset($tourImages[5]) }}'); background-size: cover; background-position: center;" @endif><span>South Trip</span></div>
                <div class="tour-card__body">
                    <div class="tour-badge">Explore Banyuwangi Selatan</div>
                    <h3>Djawatan, Green Island, Goa Bedil, Wedi Ireng, Pulau Merah</h3>
                    <p>Beach & nature trip, private boat, Red Island sunset</p>
                    <div class="tour-price">Mulai dari <strong>450K/pax</strong></div>
                    <a class="btn btn-outline" href="#explore-banyuwangi-selatan">Lihat Detail</a>
                </div>
            </article>
        </div>
    </div>
</section>
