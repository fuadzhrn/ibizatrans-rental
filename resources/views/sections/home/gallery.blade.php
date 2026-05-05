<section class="section gallery-section">
    <div class="container">
        <h2 class="section-title">Gallery</h2>
        <div class="gallery-grid" id="gallery-grid">
            @forelse($galleryImages as $index => $image)
                <div class="gallery-item" data-index="{{ $index }}" @if($index >= 9) style="display:none;" @endif>
                    <img src="{{ asset($image) }}" alt="Gallery {{ $index + 1 }}" class="gallery-img" data-full="{{ asset($image) }}">
                </div>
            @empty
                <p class="no-images">No gallery images found</p>
            @endforelse
        </div>

        <div id="load-more-container" class="load-more-container" @if(count($galleryImages) <= 9) style="display:none;" @endif>
            <button class="btn btn-outline btn-load-more" id="load-more-btn">Load More</button>
            <p class="gallery-count"><span id="current-count">9</span> / {{ count($galleryImages) }} images</p>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox-modal" class="lightbox-modal">
        <span class="lightbox-close" id="lightbox-close">&times;</span>
        <img id="lightbox-img" class="lightbox-img" src="" alt="">
        <div class="lightbox-nav">
            <button id="lightbox-prev" class="lightbox-btn lightbox-prev"><i class="ri-arrow-left-line"></i></button>
            <button id="lightbox-next" class="lightbox-btn lightbox-next"><i class="ri-arrow-right-line"></i></button>
        </div>
    </div>
</section>
