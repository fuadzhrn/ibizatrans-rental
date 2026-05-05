<section class="section about-section">
    <div class="container grid about-grid">
        <div class="about-text">
            <h2 class="section-title">{{ $aboutSection->title ?? 'Tentang Ibiza Trans' }}</h2>
            
            @if($aboutSection && $aboutSection->getParagraphs())
                @foreach($aboutSection->getParagraphs() as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            @else
                <p>Ibiza Trans adalah penyedia layanan transportasi dan tour profesional berbasis di Banyuwangi. Ibiza Trans menghadirkan solusi perjalanan yang nyaman, aman, dan personal untuk wisatawan, tamu hotel, villa, serta partner hospitality.</p>
            @endif

            <ul class="about-features">
                <li>Professional transportation and tour service provider</li>
                <li>Based in Banyuwangi — hospitality-oriented service</li>
                <li>Reliable, comfortable, personalized transportation</li>
            </ul>

            <div class="mini-stats">
                @if($aboutSection && $aboutSection->getStats())
                    @foreach($aboutSection->getStats() as $stat)
                        <div class="stat">
                            <strong>{{ $stat['label'] ?? 'N/A' }}</strong>
                            <span>{{ $stat['description'] ?? '' }}</span>
                        </div>
                    @endforeach
                @else
                    <div class="stat"><strong>Private Trip</strong><span>Flexible</span></div>
                    <div class="stat"><strong>Professional Driver</strong><span>Trained & Friendly</span></div>
                    <div class="stat"><strong>Clean Fleet</strong><span>Well Maintained</span></div>
                    <div class="stat"><strong>Flexible Request</strong><span>Custom Itinerary</span></div>
                @endif
            </div>
        </div>

        <div class="about-visual">
            <div class="card-visual">
                @if($aboutFeaturedImage)
                    <div class="card-image" style="background-image: url('{{ asset($aboutFeaturedImage) }}'); background-size: cover; background-position: center; height: 340px; border-radius: 12px; box-shadow: 0 10px 30px rgba(11,11,11,0.6);"></div>
                @else
                    <div class="card-image" style="background: linear-gradient(135deg, rgba(217,154,0,0.12), rgba(244,196,48,0.06)); height: 340px; border-radius: 12px; box-shadow: 0 10px 30px rgba(11,11,11,0.6);"></div>
                @endif
            </div>
        </div>
    </div>
</section>
