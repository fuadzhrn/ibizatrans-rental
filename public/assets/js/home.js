// Home page JS: smooth scroll for anchor links
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor){
        anchor.addEventListener('click', function(e){
            var href = this.getAttribute('href');
            if(href.length > 1){
                e.preventDefault();
                var el = document.querySelector(href);
                if(el){
                    window.scrollTo({top: el.getBoundingClientRect().top + window.scrollY - 90, behavior:'smooth'});
                }
            }
        });
    });

    // Gallery Load More functionality
    var galleryGrid = document.getElementById('gallery-grid');
    var loadMoreBtn = document.getElementById('load-more-btn');
    var currentCountSpan = document.getElementById('current-count');
    var itemsPerLoad = 6;
    var currentDisplayed = 9;

    if(galleryGrid && loadMoreBtn){
        var allItems = Array.from(galleryGrid.querySelectorAll('[data-index]'));
        var totalItems = allItems.length;

        loadMoreBtn.addEventListener('click', function(e){
            e.preventDefault();
            var itemsToShow = allItems.slice(currentDisplayed, currentDisplayed + itemsPerLoad);
            itemsToShow.forEach(function(item){
                item.style.display = 'block';
            });
            currentDisplayed += itemsPerLoad;
            currentCountSpan.textContent = Math.min(currentDisplayed, totalItems);

            // Hide button if all items shown
            if(currentDisplayed >= totalItems){
                document.getElementById('load-more-container').style.display = 'none';
            }
        });

        // Gallery Lightbox
        var lightboxModal = document.getElementById('lightbox-modal');
        var lightboxImg = document.getElementById('lightbox-img');
        var lightboxClose = document.getElementById('lightbox-close');
        var lightboxPrev = document.getElementById('lightbox-prev');
        var lightboxNext = document.getElementById('lightbox-next');
        var currentImageIndex = 0;
        var allImages = allItems.map(function(item){
            return item.querySelector('img');
        }).filter(function(img){ return img !== null; });

        function openLightbox(index){
            currentImageIndex = index;
            var img = allImages[index];
            if(img){
                lightboxImg.src = img.getAttribute('data-full');
                lightboxModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeLightbox(){
            lightboxModal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Click on gallery item to open lightbox
        allItems.forEach(function(item, index){
            var img = item.querySelector('img');
            if(img){
                item.addEventListener('click', function(){
                    openLightbox(index);
                });
            }
        });

        // Close lightbox
        lightboxClose.addEventListener('click', closeLightbox);
        lightboxModal.addEventListener('click', function(e){
            if(e.target === lightboxModal) closeLightbox();
        });

        // Navigation arrows
        lightboxPrev.addEventListener('click', function(){
            currentImageIndex = (currentImageIndex - 1 + allImages.length) % allImages.length;
            var img = allImages[currentImageIndex];
            if(img) lightboxImg.src = img.getAttribute('data-full');
        });

        lightboxNext.addEventListener('click', function(){
            currentImageIndex = (currentImageIndex + 1) % allImages.length;
            var img = allImages[currentImageIndex];
            if(img) lightboxImg.src = img.getAttribute('data-full');
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e){
            if(!lightboxModal.classList.contains('active')) return;
            if(e.key === 'ArrowLeft') lightboxPrev.click();
            if(e.key === 'ArrowRight') lightboxNext.click();
            if(e.key === 'Escape') closeLightbox();
        });
    }
});
