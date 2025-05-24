<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.querySelector('#newsCarousel');
        const indicators = document.querySelectorAll('.indicator-dot');

        carousel.addEventListener('slide.bs.carousel', function (e) {
            indicators.forEach(dot => dot.classList.remove('active'));
            if (indicators[e.to]) {
                indicators[e.to].classList.add('active');
            }
        });
    });
</script>