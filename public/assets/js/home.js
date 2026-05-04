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
});
