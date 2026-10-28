/**
 * Builds a Bootstrap 5 carousel from the review cards.
 * 3 reviews per slide on desktop, 2 on tablet, 1 on mobile.
 */
(function () {
    var carousel = document.getElementById('reviewsCarousel');
    var source = document.getElementById('reviewsSource');

    if (!carousel || !source || typeof bootstrap === 'undefined') {
        return;
    }

    var inner = carousel.querySelector('.carousel-inner');
    var dots = carousel.querySelector('.carousel-indicators');
    var reviews = Array.prototype.slice.call(source.querySelectorAll('.review'));
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var instance = null;
    var currentPerPage = 0;

    function perPage() {
        if (window.matchMedia('(min-width: 992px)').matches) { return 3; }
        if (window.matchMedia('(min-width: 768px)').matches) { return 2; }
        return 1;
    }

    function build() {
        var n = perPage();
        if (n === currentPerPage) { return; }
        currentPerPage = n;

        if (instance) { instance.dispose(); }
        inner.innerHTML = '';
        dots.innerHTML = '';

        var pages = Math.ceil(reviews.length / n);

        for (var p = 0; p < pages; p++) {
            var slide = document.createElement('div');
            slide.className = 'carousel-item' + (p === 0 ? ' active' : '');

            var row = document.createElement('div');
            row.className = 'row g-4 justify-content-center';

            reviews.slice(p * n, p * n + n).forEach(function (review) {
                var col = document.createElement('div');
                col.className = 'col-' + (12 / n);
                col.appendChild(review.cloneNode(true));
                row.appendChild(col);
            });

            slide.appendChild(row);
            inner.appendChild(slide);

            var dot = document.createElement('button');
            dot.type = 'button';
            dot.setAttribute('data-bs-target', '#reviewsCarousel');
            dot.setAttribute('data-bs-slide-to', p);
            dot.setAttribute('aria-label', 'Go to slide ' + (p + 1));
            if (p === 0) {
                dot.className = 'active';
                dot.setAttribute('aria-current', 'true');
            }
            dots.appendChild(dot);
        }

        instance = new bootstrap.Carousel(carousel, {
            interval: 6000,
            ride: reduceMotion ? false : 'carousel',
            touch: true
        });

        carousel.classList.remove('d-none');
        source.classList.add('d-none');
    }

    build();

    var resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(build, 150);
    });
})();
