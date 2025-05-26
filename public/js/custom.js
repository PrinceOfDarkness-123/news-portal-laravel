//carousal section
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

//AJAX to render news by category in don't miss section
document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.category-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
    
                const categoryId = this.dataset.categoryId;
    
                fetch(`/news-by-category/${categoryId}`, {
                    headers: {
                        'X-Is-Ajax': 'true'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;
                    const newContent = tempDiv.querySelector('#news-section');
                    document.getElementById('news-section').innerHTML = newContent.innerHTML;

                    // Add active style to selected category
                    document.querySelectorAll('.category-link').forEach(
                        el => {
                            el.classList.remove('fw-bold', 'border-bottom', 'border-primary');
                        }
                    );
                    this.classList.add('fw-bold', 'border-bottom', 'border-primary');

                    // Check for small news count
                    const smallNewsItems = document.querySelectorAll('.small-news-item');
                    const container = document.querySelector('.small-news-container');
                    if (smallNewsItems.length === 2) {
                        container.classList.add('no-gap');
                    } else {
                        container.classList.remove('no-gap');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
