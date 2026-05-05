document.addEventListener('DOMContentLoaded', function(){
    var contactPage = document.querySelector('.contact-hero, .contact-map, .contact-partnership, .contact-final-cta');
    var navbar = document.getElementById('ibiza-navbar');

    var getOffset = function () {
        return navbar ? Math.max(navbar.offsetHeight + 14, 92) : 92;
    };

    // Smooth scroll for internal anchors
    document.querySelectorAll('a[href^="#"]').forEach(function(a){
        a.addEventListener('click', function(e){
            var href = a.getAttribute('href');
            if(href && href.startsWith('#')){
                var el = document.querySelector(href);
                if(el){
                    e.preventDefault();
                    if (contactPage) {
                        window.scrollTo({
                            top: el.getBoundingClientRect().top + window.scrollY - getOffset(),
                            behavior: 'smooth'
                        });
                    } else {
                        el.scrollIntoView({behavior:'smooth', block:'start'});
                    }
                }
            }
        });
    });

    // Concierge card click -> follow CTA if present
    document.querySelectorAll('.concierge-card').forEach(function(card){
        card.addEventListener('click', function(e){
            var link = card.querySelector('a');
            if(link){
                var href = link.getAttribute('href');
                if(href && href.indexOf('http') === 0){
                    window.open(href, '_blank', 'noopener');
                } else if(href && href.startsWith('#')){
                    var target = document.querySelector(href);
                    if(target){
                        if (contactPage) {
                            window.scrollTo({
                                top: target.getBoundingClientRect().top + window.scrollY - getOffset(),
                                behavior: 'smooth'
                            });
                        } else {
                            target.scrollIntoView({behavior:'smooth'});
                        }
                    }
                }
            }
        });
    });
});
