document.addEventListener('DOMContentLoaded', function () {
    var page = document.querySelector('.paket-tour-page');
    if (!page) {
        return;
    }

    var navbar = document.getElementById('ibiza-navbar');
    var getOffset = function () {
        return navbar ? Math.max(navbar.offsetHeight + 14, 92) : 92;
    };

    var scrollToTarget = function (target) {
        if (!target) {
            return;
        }

        window.scrollTo({
            top: target.getBoundingClientRect().top + window.scrollY - getOffset(),
            behavior: 'smooth'
        });
    };

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
            scrollToTarget(target);
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
            var willOpen = !item.classList.contains('is-open');

            faqItems.forEach(function (otherItem) {
                var otherButton = otherItem.querySelector('.faq-question');
                var otherIcon = otherItem.querySelector('.faq-question i');

                if (!otherButton || !otherIcon) {
                    return;
                }

                otherItem.classList.remove('is-open');
                otherIcon.className = 'ri-add-line';
            });

            if (willOpen) {
                item.classList.add('is-open');
                icon.className = 'ri-subtract-line';
            }
        });
    });
});
