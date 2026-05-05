<section class="section about-section">
    <div class="container grid about-grid">
        <div class="about-text">
            <h2 class="section-title">Tentang Ibiza Trans</h2>
            <p>Ibiza Trans adalah penyedia layanan transportasi dan tour profesional berbasis di Banyuwangi. Ibiza Trans menghadirkan solusi perjalanan yang nyaman, aman, dan personal untuk wisatawan, tamu hotel, villa, serta partner hospitality.</p>

            <ul class="about-features">
                <li>Professional transportation and tour service provider</li>
                <li>Based in Banyuwangi — hospitality-oriented service</li>
                <li>Reliable, comfortable, personalized transportation</li>
            </ul>

            <div class="mini-stats">
                <div class="stat"><strong>Private Trip</strong><span>Flexible</span></div>
                <div class="stat"><strong>Professional Driver</strong><span>Trained & Friendly</span></div>
                <div class="stat"><strong>Clean Fleet</strong><span>Well Maintained</span></div>
                <div class="stat"><strong>Flexible Request</strong><span>Custom Itinerary</span></div>
            </div>
        </div>

        <div class="about-visual">
            <div class="card-visual">
                @if($featuredImage)
                    <div class="card-image" style="background-image: url('{{ asset($featuredImage) }}'); background-size: cover; background-position: center; height: 340px; border-radius: 12px; box-shadow: 0 10px 30px rgba(11,11,11,0.6);"></div>
                @else
                    <div class="card-image" style="background: linear-gradient(135deg, rgba(217,154,0,0.12), rgba(244,196,48,0.06)); height: 340px; border-radius: 12px; box-shadow: 0 10px 30px rgba(11,11,11,0.6);"></div>
                @endif
            </div>
        </div>
    </div>
</section>
