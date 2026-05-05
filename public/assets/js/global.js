// Global JS: navbar scroll effect + mobile drawer
document.addEventListener('DOMContentLoaded', function(){
    var nav = document.getElementById('ibiza-navbar');
    var toggleButton = document.getElementById('nav-toggle');
    var drawer = document.getElementById('mobile-nav-drawer');
    var overlay = document.getElementById('nav-overlay');
    var closeButton = document.getElementById('mobile-nav-close');
    var drawerLinks = drawer ? drawer.querySelectorAll('a') : [];

    if(nav){
        window.addEventListener('scroll', function(){
            if(window.scrollY > 50){
                nav.classList.add('scrolled');
                nav.style.background = 'linear-gradient(180deg, rgba(11,11,11,0.85), rgba(11,11,11,0.85))';
                nav.style.boxShadow = '0 6px 24px rgba(0,0,0,0.45)';
            } else {
                nav.classList.remove('scrolled');
                nav.style.background = 'rgba(11,11,11,0.22)';
                nav.style.boxShadow = 'none';
            }
        });
    }

    if(!toggleButton || !drawer || !overlay || !closeButton){
        return;
    }

    function setDrawerState(isOpen){
        toggleButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        drawer.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
        drawer.classList.toggle('is-open', isOpen);
        overlay.classList.toggle('is-open', isOpen);
        document.body.classList.toggle('nav-open', isOpen);
    }

    function closeDrawer(){
        setDrawerState(false);
    }

    toggleButton.addEventListener('click', function(){
        var isOpen = toggleButton.getAttribute('aria-expanded') === 'true';
        setDrawerState(!isOpen);
    });

    closeButton.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);

    drawerLinks.forEach(function(link){
        link.addEventListener('click', function(){
            closeDrawer();
        });
    });

    document.addEventListener('keydown', function(event){
        if(event.key === 'Escape' && drawer.classList.contains('is-open')){
            closeDrawer();
        }
    });
});
