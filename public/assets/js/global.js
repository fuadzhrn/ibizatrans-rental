// Global JS: navbar scroll effect
document.addEventListener('DOMContentLoaded', function(){
    var nav = document.getElementById('ibiza-navbar');
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
});
