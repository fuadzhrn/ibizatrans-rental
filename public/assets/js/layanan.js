document.addEventListener('DOMContentLoaded', function () {
    var layananRoot = document.querySelector('.layanan-page');
    if (!layananRoot) {
        return;
    }

    // Smooth scroll for internal anchors on layanan page.
    document.querySelectorAll('.layanan-page a[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            var targetId = this.getAttribute('href');
            if (!targetId || targetId.length < 2) {
                return;
            }

            var target = document.querySelector(targetId);
            if (!target) {
                return;
            }

            event.preventDefault();
            window.scrollTo({
                top: target.getBoundingClientRect().top + window.scrollY - 98,
                behavior: 'smooth'
            });
        });
    });

    // Subtle reveal animation for service cards.
    var revealItems = document.querySelectorAll('.layanan-card, .unit-card, .motor-card, .transfer-card, .pricing-card');
    if (!('IntersectionObserver' in window) || !revealItems.length) {
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    revealItems.forEach(function (item) {
        item.classList.add('is-prep');
        observer.observe(item);
    });
});
