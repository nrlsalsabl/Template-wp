<footer class="text-fourth">
    <div class="container-primary">
        <div class="border-t border-secondary/40 pt-11 pb-14 grid gap-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fypmedia.png" alt="Logo"
                    class="h-6 sm:h-8">
                <p class="font-open-sans font-bold text-lg mt-6">FYP Media & Agency</p>
                <p class="font-open-sans italic mt-1 text-lg">"Leading the Way in Media and Branding Excellence.”</p>
                <div class="flex space-x-4 mt-6">
                    <a href="https://instagram.com" target="_blank" aria-label="Facebook"
                        class="text-white hover:text-blue-600 transition duration-200">
                        <i class="fa-brands text-xl fa-instagram"></i>
                    </a>
                    <a href="https://web.whatsapp.com/" target="_blank" aria-label="Twitter"
                        class="text-white hover:text-blue-400 transition duration-200">
                        <i class="fa-brands text-xl fa-whatsapp"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" aria-label="Instagram"
                        class="text-white hover:text-blue-600  transition duration-200">
                        <i class="fa-brands text-xl fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" aria-label="LinkedIn"
                        class="text-white hover:text-blue-700 transition duration-200">
                        <i class="fa-brands text-xl fa-twitter"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-xl mb-6 font-open-sans font-semibold">Location</h3>
                <p class="text-sm text-white">
                    <span class="font-semibold text-lg">Residence One BSD</span>,<br>
                    Jl. Raya Serpong Kilometer 7, Jelupang,
                    Kec. Serpong Utara, Kota Tangerang Selatan,
                    Banten 15310
                </p>
            </div>

            <div>
                <h3 class="text-xl mb-6 font-open-sans font-semibold">Contact Info</h3>
                <p class="text-sm text-white">
                    Partnership@fypmedia.id <br />
                    +62 851 7512 3014 (Jaya)
                </p>
            </div>

            <div>
                <h3 class="text-xl mb-6 font-open-sans font-semibold">Links</h3>
                <div class="flex gap-6">
                    <ul class="font-semibold space-y-2">
                        <li><a href="<?php echo home_url('/home'); ?>" class="hover:underline">Home</a></li>
                        <li><a href="<?php echo home_url('/services/fyp-media'); ?>" class="hover:underline">About</a>
                        </li>
                        <li><a href="<?php echo home_url('/services/fyp-agency'); ?>"
                                class="hover:underline">Service</a></li>
                        <li><a href="<?php echo home_url('/news'); ?>" class="hover:underline">News</a></li>

                    </ul>

                    <ul class="font-semibold space-y-2">
                        <li><a href="<?php echo home_url('/blog'); ?>" class="hover:underline">Blog</a></li>
                        <li><a href="<?php echo home_url('/careers'); ?>" class="hover:underline">Careers</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>" class="hover:underline">Contact</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-secondary/40 py-5">
        <div class="container-primary">
            <p class="font-open-sans text-fourth font-semibold text-center">FYP Media Agency &copy; 2023. All rights
                reserved. </p>
        </div>
    </div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>

<script>
    // Script untuk card career-page.php
    document.addEventListener('DOMContentLoaded', () => {
        // Swiper card
        const cardSwiper = new Swiper('.swiper-scrollbar', {
            loop: true, // Mengaktifkan loop
            slidesPerView: 3, // Menampilkan 3 card sekaligus
            spaceBetween: 20, // Jarak antar card
            navigation: {
                nextEl: '.swiper-button-next', // Tombol untuk navigasi ke slide berikutnya
                prevEl: '.swiper-button-prev', // Tombol untuk navigasi ke slide sebelumnya
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 2,
                },
                640: {
                    slidesPerView: 1,
                },
                390: {
                    slidesPerView: 1,
                },
                360: {
                    slidesPerView: 1,
                },
            },
        });
    });
</script>