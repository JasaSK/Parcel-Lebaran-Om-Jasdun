<!-- Plugin JS: AOS Animation + Swiper Slider -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Plugin 1: AOS Animation
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80
        });

        // Plugin 2: Swiper.js untuk slider testimoni
        new Swiper('.testimonial-swiper', {
            loop: true,
            grabCursor: true,
            spaceBetween: 24,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    }); -
    7.9166857, 112.6342483
    // Plugin 3: Leaflet Maps
    const omjasdunLat = -7.9166857;
    const omjasdunLng = 112.6342483;

    const map = L.map('omjasdun-map').setView([omjasdunLat, omjasdunLng], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    L.marker([omjasdunLat, omjasdunLng])
        .addTo(map)
        .bindPopup('<b>OM JASDUN</b><br>Parcel Lebaran Premium')
        .openPopup();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

        if (!mobileMenuBtn || !mobileMenu || !mobileMenuOverlay) return;

        function openMenu() {
            mobileMenu.classList.remove('hidden');
            mobileMenuOverlay.classList.remove('hidden');
        }

        function closeMenu() {
            mobileMenu.classList.add('hidden');
            mobileMenuOverlay.classList.add('hidden');
        }

        mobileMenuBtn.addEventListener('click', function() {
            if (mobileMenu.classList.contains('hidden')) {
                openMenu();
            } else {
                closeMenu();
            }
        });

        mobileMenuOverlay.addEventListener('click', closeMenu);

        mobileMenu.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });
    });
</script>