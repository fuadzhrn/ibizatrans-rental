<section class="section tour-faq">
    <div class="container">
        <h2 class="section-title">FAQ Paket Tour</h2>
        <div class="faq-list">
            @forelse($tourFaqs as $faq)
            <article class="faq-item">
                <button class="faq-question" type="button"><span>{{ $faq->question }}</span><i class="ri-add-line"></i></button>
                <div class="faq-answer"><p>{!! nl2br(e($faq->answer)) !!}</p></div>
            </article>
            @empty
            <article class="faq-item">
                <button class="faq-question" type="button"><span>FAQ belum tersedia</span><i class="ri-add-line"></i></button>
                <div class="faq-answer"><p>FAQ akan tampil setelah seed atau penambahan melalui admin.</p></div>
            </article>
            @endforelse
        </div>
    </div>
</section>
