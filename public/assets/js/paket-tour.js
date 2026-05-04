document.addEventListener('DOMContentLoaded', function () {
    var page = document.querySelector('.paket-tour-page');
    if (!page) {
        return;
    }

    document.querySelectorAll('.paket-tour-page a[href^="#"]').forEach(function (link) {
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

    var faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(function (item) {
        var button = item.querySelector('.faq-question');
        var icon = item.querySelector('.faq-question i');

        if (!button || !icon) {
            return;
        }

        button.addEventListener('click', function () {
            var isOpen = item.classList.toggle('is-open');
            icon.className = isOpen ? 'ri-subtract-line' : 'ri-add-line';
        });
    });
});
