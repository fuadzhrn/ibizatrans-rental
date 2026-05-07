<section class="section tour-details">
    <div class="container tour-details__stack">
        @forelse($tourPackages as $tour)
        <article id="{{ $tour->slug }}" class="tour-detail-card @if($loop->iteration % 2 == 0) tour-detail-card--alt @endif">
            <div class="tour-detail-card__copy">
                <div class="tour-detail-label">{{ $tour->name }}</div>
                <h2>{{ $tour->destination_summary }}</h2>
                <p>{!! nl2br(e($tour->description ?? '')) !!}</p>
                <div class="tour-detail-meta">
                    <div><span>Harga</span>
                        @if($tour->prices->count())
                            @foreach($tour->prices as $p)
                                <strong>{{ $p->pax_label }} {{ number_format($p->price/1000,0,',','.') }}K/pax</strong>
                            @endforeach
                        @else
                            <strong>-</strong>
                        @endif
                    </div>
                </div>

                <div class="tour-detail-blocks">
                    <div>
                        <h4>Fasilitas</h4>
                        @if($tour->facilities->count())
                        <ul>
                            @foreach($tour->facilities as $f)
                                <li><i class="ri-check-line"></i> {{ $f->name }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p>Fasilitas dapat dikonfirmasi melalui admin.</p>
                        @endif
                    </div>
                    <div>
                        <h4>Itinerary Ringkas</h4>
                        @if($tour->itineraries->count())
                        <ol class="tour-timeline">
                            @foreach($tour->itineraries as $it)
                                <li><span>{{ $it->time_label }}</span><p>{{ $it->activity }}</p></li>
                            @endforeach
                        </ol>
                        @else
                        <p>Itinerary dapat menyesuaikan request dan kondisi perjalanan.</p>
                        @endif
                    </div>
                </div>

                @php
                    $message = $tour->whatsapp_text ?: "Halo Ibiza Trans, saya ingin booking {$tour->name}.";
                @endphp
                <a class="btn btn-primary" href="https://wa.me/6289515324763?text={{ urlencode($message) }}" target="_blank">Booking {{ $tour->name }}</a>
            </div>
            <div class="tour-detail-card__aside"><div class="tour-detail-art" @if($tour->image) style="background-image: url('{{ asset('storage/'.$tour->image) }}'); background-size: cover; background-position: center;" @endif></div></div>
        </article>
        @empty
        <article class="tour-detail-card">
            <div class="tour-detail-card__copy">
                <div class="tour-detail-label">Belum Ada Paket</div>
                <h2>Data paket tour belum tersedia</h2>
                <p>Silakan jalankan seeder atau tambahkan paket di admin.</p>
            </div>
        </article>
        @endforelse
    </div>
</section>
