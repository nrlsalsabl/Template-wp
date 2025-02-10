<!-- Hero Section -->
<section class="py-16">
    <div class="container mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2">
        <!-- Bagian Teks -->
        <div class="lg:ml-5">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-semibold text-white text-left" style="line-height: 1.25;">
                Kami Bantu Mewujudkan
            </h2>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-semibold text-transparent bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text mb-6 text-left" style="line-height: 1.25;">Ide Kreatif Kamu</h2>
            <p class="text-white text-md lg:text-lg mb-6">
                Kami telah mengembangkan strategi pemasaran media sosial yang efektif untuk memenuhi kebutuhan Anda.
            </p>
            <a href="#"
                class="px-4 py-3 bg-custom-purple text-white font-semibold rounded-full transition-transform duration-300 transform hover:scale-105 flex justify-center w-full sm:w-3/5 md:w-2/5">
                Ayo Gabung Sekarang <i class="fi fi-rr-arrow-up-right text-white font-semibold text-sm ml-3"></i>
            </a>
        </div>

        <!-- Bagian Gambar -->
        <div class="hidden lg:flex justify-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/agency.png" alt="Agency Image" class="w-full max-w-md">
        </div>
    </div>

</section>

<!-- Swiper Autoplay (Brand) -->
<section class="mt-20">
    <div class="bg-gray-600 py-5">
        <div class="max-w-6xl mx-auto px-6 md:px-6 lg:px-8">
            <!-- Swiper -->
            <div class="swiper-container autoplay-swiper overflow-hidden w-full">
                <div class="swiper-wrapper justify-left">
                    <?php
                    for ($i = 1; $i <= 19; $i++) :
                        $image_path = get_template_directory_uri() . "/assets/images/{$i}.png";
                    ?>
                        <div class="swiper-slide flex">
                            <img src="<?php echo esc_url($image_path); ?>"
                                alt="Image <?php echo $i; ?>"
                                class="h-10 sm:h-12 lg:h-16 object-contain hover:scale-110 transition-transform duration-300" />
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Swiper setelah DOM selesai dimuat
            const autoplayswiper = new Swiper('.autoplay-swiper', {
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                slidesPerView: 2,
                spaceBetween: 2,
                centeredSlides: false,
                breakpoints: {
                    1024: {
                        slidesPerView: 7,
                        spaceBetween: 2
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 4
                    },
                    360: {
                        slidesPerView: 4,
                        spaceBetween: 4
                    },
                },
            });
        });
    </script>
</section>

<!-- Judul Service Kreatif -->
<section>
    <div class="container max-w-3xl mx-auto px-5 lg:px-5 mt-10 sm:mt-20 md:mt-24 lg:mt-30">
        <!-- Teks Hero -->
        <div class="text-left lg:text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-5xl font-semibold text-white mb-6" style="line-height: 1.25;">
                Kami Menawarkan Beberapa Service Kreatif Untuk Anda
            </h1>
            <p class="text-gray-500 text-lg">
                Tingkatkan personal branding pribadi maupun brand Anda dengan strategi media sosial yang efektif.
                Dengan tim yang profesional di bidang digital, kami mengoptimalkan kualitas konten agar mempercepat
                pertumbuhan bisnis Anda.
            </p>
        </div>
    </div>
</section>

<!-- Garis Pemisah -->
<section class="mt-6">
    <div class="relative flex items-center w-11/12 mx-auto">
        <div class="flex-grow h-1 rounded-full bg-gray-500"></div>
        <span class="px-4 text-white text-xl font-medium">Pelayanan Jasa Kami</span>
        <div class="flex-grow h-1 rounded-full bg-gray-500"></div>
    </div>
</section>

<!-- Service Kreatif -->
<section class="py-10">
    <div class="flex flex-col items-center px-8">
        <!-- Baris pertama dengan 3 card yang di tengah -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-6xl">
            <div class="bg-gray-800 p-6 rounded-2xl shadow-md text-white text-left">
                <svg width="77" height="77" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="44" cy="44" r="44" fill="#3C3D43" />
                    <rect x="17" y="17" width="54" height="54" fill="url(#pattern0_3722_1745)" />
                    <defs>
                        <pattern id="pattern0_3722_1745" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_3722_1745" transform="scale(0.0078125)" />
                        </pattern>
                        <image id="image0_3722_1745" width="128" height="128" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <h3 class="text-xl font-semibold mt-5">Enable Seller</h3>
                <p class="mt-3">Kami telah bermitra dengan lebih dari 100+ bisnis untuk membantu mereka tampil profesional di marketplace,
                    mulai dari desain katalog menarik hingga live streaming yang efektif meningkatkan penjualan.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-2xl shadow-md text-white text-left">
                <svg width="77" height="77" viewBox="0 0 89 88" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="44.667" cy="44" r="44" fill="#3C3D43" />
                    <rect x="18.001" y="17" width="54" height="54" fill="url(#pattern0_3722_1752)" />
                    <defs>
                        <pattern id="pattern0_3722_1752" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_3722_1752" transform="scale(0.0078125)" />
                        </pattern>
                        <image id="image0_3722_1752" width="128" height="128" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <h3 class="text-xl font-semibold mt-5">KOL & Endorsement</h3>
                <p class="mt-3">Kami telah bekerja sama dengan 3000+ Creator, 1000+ Brand brand melalui KOL dan endorsement untuk
                    memperluas jangkauan dan meningkatkan visibilitas produk di pasar yang lebih luas.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-2xl shadow-md text-white text-left">
                <svg width="77" height="77" viewBox="0 0 89 88" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="44.333" cy="44" r="44" fill="#3C3D43" />
                    <rect x="16.999" y="17" width="54" height="54" fill="url(#pattern0_3722_1759)" />
                    <defs>
                        <pattern id="pattern0_3722_1759" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_3722_1759" transform="scale(0.0078125)" />
                        </pattern>
                        <image id="image0_3722_1759" width="128" height="128" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <h3 class="text-xl font-semibold mt-5">Website Builder & Copywriting</h3>
                <p class="mt-3">Website profesional adalah kunci sukses bisnis digital. Kami telah membantu 100+ bisnis membangun website yang kuat dengan
                    copywriting SEO-friendly agar mudah ditemukan di mesin pencari.</p>
            </div>
        </div>

        <!-- Baris kedua dengan 2 card besar -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-6xl mt-8 w-full">
            <div class="bg-gray-800 p-6 rounded-2xl shadow-md text-white text-left">
                <svg width="77" height="77" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="44" cy="44" r="44" fill="#3C3D43" />
                    <rect x="17" y="17" width="54" height="54" fill="url(#pattern0_3722_1767)" />
                    <defs>
                        <pattern id="pattern0_3722_1767" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_3722_1767" transform="scale(0.0078125)" />
                        </pattern>
                        <image id="image0_3722_1767" width="128" height="128" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <h3 class="text-xl font-semibold mt-5">Content Production & Social Media</h3>
                <p class="mt-3">Butuh konten Instagram dan TikTok yang engaging? Tim kreatif kami telah membantu 100+ mitra mengoptimalkan konten dan
                    mengelola media sosial agar Anda bisa fokus pada bisnis utama.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-2xl shadow-md text-white text-left">
                <svg width="77" height="77" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="44" cy="44" r="44" fill="#3C3D43" />
                    <rect x="17" y="17" width="54" height="54" fill="url(#pattern0_3722_1774)" />
                    <defs>
                        <pattern id="pattern0_3722_1774" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_3722_1774" transform="scale(0.0078125)" />
                        </pattern>
                        <image id="image0_3722_1774" width="128" height="128" xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
                <h3 class="text-xl font-semibold mt-5">Iklan (Google Ads & TikTok Ads)</h3>
                <p class="mt-3">Kami mengelola iklan di berbagai platform untuk lebih dari 100+ mitra, memastikan produk Anda menjangkau
                    audiens yang tepat dan meningkatkan profitabilitas bisnis.</p>
            </div>
        </div>
    </div>
</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black mt-4 mx-auto"></div>

<section class="py-10">
    <div class="container max-w-4xl mx-auto px-5 lg:px-5">
        <!-- Teks Hero -->
        <div class="text-left lg:text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-5xl font-semibold text-white mb-6" style="line-height: 1.25;">
                Apa Yang <span class="text-transparent bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text">Kamu Dapat Jika Bekerja Sama</span> Dengan Kami?
            </h1>
        </div>
    </div>

    <div class="relative max-w-screen-lg mx-auto mt-10 px-8 lg:px-20 py-10 flex flex-col lg:flex-row items-center lg:items-start rounded-xl">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-purple-700 to-purple-900 rounded-xl p-px">
            <div class="w-full h-full bg-black rounded-xl"></div>
        </div>

        <!-- Konten Gambar -->
        <div class="relative lg:w-2/3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/agency2.png" class="w-full h-auto rounded-lg mx-auto">
        </div>

        <!-- Konten Teks dengan Daftar Bernomor -->
        <div class="relative lg:w-2/3 flex flex-col lg:ml-10 mt-8 lg:mt-0">
            <div class="mt-5 space-y-6">
                <!-- Elemen Nomor 1 -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="24" r="22.8816" stroke="#E7E7E9" stroke-width="1.23684" />
                            <path d="M25.4258 33H23.5273V20.8594C23.5273 20.3984 23.5273 20.0039 23.5273 19.6758C23.5352 19.3398 23.543 19.0352 23.5508 18.7617C23.5664 18.4805 23.5859 18.1953 23.6094 17.9062C23.3672 18.1562 23.1406 18.3711 22.9297 18.5508C22.7188 18.7227 22.457 18.9375 22.1445 19.1953L20.1875 20.7656L19.168 19.4414L23.8086 15.8672H25.4258V33Z" fill="#E7E7E9" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white text-xl font-semibold">Profesional dan Berpengalaman:</h4>
                        <p class="text-white mt-1">Selama lebih dari 5 tahun. Tim kami telah bermitra dari lebih 100+ di bidang digital marketing dan siap memberikan solusi terbaik untuk kebutuhan Anda.</p>
                    </div>
                </div>

                <!-- Elemen Nomor 2 -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="24" r="22.8816" stroke="#E7E7E9" stroke-width="1.23684" />
                            <path d="M29.4102 33H18.1836V31.3711L22.7656 26.7188C23.6172 25.8594 24.332 25.0938 24.9102 24.4219C25.4961 23.75 25.9414 23.0898 26.2461 22.4414C26.5508 21.7852 26.7031 21.0664 26.7031 20.2852C26.7031 19.3164 26.4141 18.5781 25.8359 18.0703C25.2656 17.5547 24.5117 17.2969 23.5742 17.2969C22.7539 17.2969 22.0273 17.4375 21.3945 17.7188C20.7617 18 20.1133 18.3984 19.4492 18.9141L18.4062 17.6016C18.8594 17.2188 19.3516 16.8789 19.8828 16.582C20.4219 16.2852 20.9961 16.0508 21.6055 15.8789C22.2227 15.707 22.8789 15.6211 23.5742 15.6211C24.6289 15.6211 25.5391 15.8047 26.3047 16.1719C27.0703 16.5391 27.6602 17.0625 28.0742 17.7422C28.4961 18.4219 28.707 19.2305 28.707 20.168C28.707 21.0742 28.5273 21.918 28.168 22.6992C27.8086 23.4727 27.3047 24.2422 26.6562 25.0078C26.0078 25.7656 25.25 26.5703 24.3828 27.4219L20.6562 31.1367V31.2188H29.4102V33Z" fill="#E7E7E9" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white text-xl font-semibold">Pendekatan Personal:</h4>
                        <p class="text-white mt-1">Setiap bisnis itu unik. Kami menawarkan strategi yang disesuaikan dengan kebutuhan spesifik Anda.</p>
                    </div>
                </div>

                <!-- Elemen Nomor 3 -->
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0">
                        <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="24" r="22.8816" stroke="#E7E7E9" stroke-width="1.23684" />
                            <path d="M28.7773 19.8633C28.7773 20.6289 28.6289 21.293 28.332 21.8555C28.0352 22.418 27.6211 22.8789 27.0898 23.2383C26.5586 23.5898 25.9336 23.8359 25.2148 23.9766V24.0703C26.5742 24.2422 27.5938 24.6797 28.2734 25.3828C28.9609 26.0859 29.3047 27.0078 29.3047 28.1484C29.3047 29.1406 29.0703 30.0195 28.6016 30.7852C28.1406 31.5508 27.4297 32.1523 26.4688 32.5898C25.5156 33.0195 24.293 33.2344 22.8008 33.2344C21.8945 33.2344 21.0547 33.1602 20.2812 33.0117C19.5156 32.8711 18.7812 32.6328 18.0781 32.2969V30.4688C18.7891 30.8203 19.5625 31.0977 20.3984 31.3008C21.2344 31.4961 22.043 31.5938 22.8242 31.5938C24.3867 31.5938 25.5156 31.2852 26.2109 30.668C26.9062 30.043 27.2539 29.1914 27.2539 28.1133C27.2539 27.3711 27.0586 26.7734 26.668 26.3203C26.2852 25.8594 25.7305 25.5234 25.0039 25.3125C24.2852 25.0938 23.418 24.9844 22.4023 24.9844H20.6914V23.3203H22.4141C23.3438 23.3203 24.1328 23.1836 24.7812 22.9102C25.4297 22.6367 25.9219 22.2539 26.2578 21.7617C26.6016 21.2617 26.7734 20.6719 26.7734 19.9922C26.7734 19.125 26.4844 18.457 25.9062 17.9883C25.3281 17.5117 24.543 17.2734 23.5508 17.2734C22.9414 17.2734 22.3867 17.3359 21.8867 17.4609C21.3867 17.5859 20.918 17.7578 20.4805 17.9766C20.043 18.1953 19.6055 18.4492 19.168 18.7383L18.1836 17.4023C18.8086 16.918 19.5703 16.5 20.4688 16.1484C21.3672 15.7969 22.3867 15.6211 23.5273 15.6211C25.2773 15.6211 26.5898 16.0195 27.4648 16.8164C28.3398 17.6133 28.7773 18.6289 28.7773 19.8633Z" fill="#E7E7E9" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-white text-xl font-semibold">Inovasi & Teknologi:</h4>
                        <p class="text-white mt-1">Kami terus mengikuti perkembangan digital terbaru untuk membantu bisnis Anda tetap kompetitif.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black mt-4 mx-auto"></div>

<section>
    <div class="container mx-auto p-6">
        <!-- Header Section -->
        <div class="container flex justify-between items-center py-5">
            <h1 class="text-white text-3xl sm:text-4xl md:text-4xl lg:text-5xl font-semibold text-start lg:ml-8 py-5">
                <span
                    class="inline-block w-2 h-6 sm:h-8 md:h-9 lg:h-10 bg-red-500 rounded-full mr-2">
                </span>
                Featured Project
            </h1>
        </div>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 items-center max-w-6xl mx-auto px-4 py-7">
            <!-- Card 1 -->
            <div class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/building.png"
                    alt="people"
                    class="w-full h-32 sm:h-36 lg:h-52 rounded-lg object-cover">
                <div class="flex-grow p-2 bg-transparent flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold mb-2 text-white">Popyrus Digital</h1>
                        <p class="text-gray-400 text-sm mb-4">Digital Ads Management</p>
                    </div>
                    <a href="#" class="transition-transform duration-300 transform hover:scale-105">
                        <svg width="54" height="55" viewBox="0 0 54 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.0967" cy="27.2686" r="26.878" fill="#F1F3F4" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3823 14.8041C28.5923 14.5944 28.8769 14.4766 29.1737 14.4766C29.4705 14.4766 29.7551 14.5944 29.9651 14.8041L41.1643 26.0032C41.374 26.2132 41.4918 26.4979 41.4918 26.7946C41.4918 27.0914 41.374 27.3761 41.1643 27.586L29.9651 38.7852C29.8626 38.8952 29.739 38.9835 29.6016 39.0447C29.4642 39.1059 29.3159 39.1388 29.1655 39.1415C29.0152 39.1441 28.8658 39.1165 28.7264 39.0601C28.5869 39.0038 28.4602 38.92 28.3539 38.8136C28.2475 38.7073 28.1637 38.5806 28.1074 38.4412C28.0511 38.3017 28.0234 38.1523 28.026 38.002C28.0287 37.8516 28.0616 37.7033 28.1228 37.5659C28.184 37.4285 28.2723 37.3049 28.3823 37.2024L37.6701 27.9146H13.4949C13.1979 27.9146 12.913 27.7966 12.703 27.5865C12.493 27.3765 12.375 27.0917 12.375 26.7946C12.375 26.4976 12.493 26.2128 12.703 26.0027C12.913 25.7927 13.1979 25.6747 13.4949 25.6747H37.6701L28.3823 16.3869C28.1726 16.1769 28.0548 15.8923 28.0548 15.5955C28.0548 15.2987 28.1726 15.0141 28.3823 14.8041Z" fill="#0F1017" />
                        </svg>
                    </a>
                </div>

            </div>
            <!-- Card 2 -->
            <div class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/man.png"
                    alt="people"
                    class="w-full h-32 sm:h-36 lg:h-52 object-cover rounded-lg">
                <div class="flex-grow p-2 bg-transparent flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold mb-2 text-white">Dhimas Kuy</h1>
                        <p class="text-gray-400 text-sm mb-4">Web Development & Copywriting</p>
                    </div>
                    <a href="#" class="transition-transform duration-300 transform hover:scale-105">
                        <svg width="54" height="55" viewBox="0 0 54 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.0967" cy="27.2686" r="26.878" fill="#F1F3F4" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3823 14.8041C28.5923 14.5944 28.8769 14.4766 29.1737 14.4766C29.4705 14.4766 29.7551 14.5944 29.9651 14.8041L41.1643 26.0032C41.374 26.2132 41.4918 26.4979 41.4918 26.7946C41.4918 27.0914 41.374 27.3761 41.1643 27.586L29.9651 38.7852C29.8626 38.8952 29.739 38.9835 29.6016 39.0447C29.4642 39.1059 29.3159 39.1388 29.1655 39.1415C29.0152 39.1441 28.8658 39.1165 28.7264 39.0601C28.5869 39.0038 28.4602 38.92 28.3539 38.8136C28.2475 38.7073 28.1637 38.5806 28.1074 38.4412C28.0511 38.3017 28.0234 38.1523 28.026 38.002C28.0287 37.8516 28.0616 37.7033 28.1228 37.5659C28.184 37.4285 28.2723 37.3049 28.3823 37.2024L37.6701 27.9146H13.4949C13.1979 27.9146 12.913 27.7966 12.703 27.5865C12.493 27.3765 12.375 27.0917 12.375 26.7946C12.375 26.4976 12.493 26.2128 12.703 26.0027C12.913 25.7927 13.1979 25.6747 13.4949 25.6747H37.6701L28.3823 16.3869C28.1726 16.1769 28.0548 15.8923 28.0548 15.5955C28.0548 15.2987 28.1726 15.0141 28.3823 14.8041Z" fill="#0F1017" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/woman.png"
                    alt="people"
                    class="w-full h-32 sm:h-36 lg:h-52 object-cover rounded-lg">
                <div class="flex-grow p-2 bg-transparent flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold mb-2 text-white">Awikwok Content</h1>
                        <p class="text-gray-400 text-sm mb-4">Content Production & Social Media Management</p>
                    </div>
                    <a href="#" class="transition-transform duration-300 transform hover:scale-105">
                        <svg width="54" height="55" viewBox="0 0 54 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.0967" cy="27.2686" r="26.878" fill="#F1F3F4" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3823 14.8041C28.5923 14.5944 28.8769 14.4766 29.1737 14.4766C29.4705 14.4766 29.7551 14.5944 29.9651 14.8041L41.1643 26.0032C41.374 26.2132 41.4918 26.4979 41.4918 26.7946C41.4918 27.0914 41.374 27.3761 41.1643 27.586L29.9651 38.7852C29.8626 38.8952 29.739 38.9835 29.6016 39.0447C29.4642 39.1059 29.3159 39.1388 29.1655 39.1415C29.0152 39.1441 28.8658 39.1165 28.7264 39.0601C28.5869 39.0038 28.4602 38.92 28.3539 38.8136C28.2475 38.7073 28.1637 38.5806 28.1074 38.4412C28.0511 38.3017 28.0234 38.1523 28.026 38.002C28.0287 37.8516 28.0616 37.7033 28.1228 37.5659C28.184 37.4285 28.2723 37.3049 28.3823 37.2024L37.6701 27.9146H13.4949C13.1979 27.9146 12.913 27.7966 12.703 27.5865C12.493 27.3765 12.375 27.0917 12.375 26.7946C12.375 26.4976 12.493 26.2128 12.703 26.0027C12.913 25.7927 13.1979 25.6747 13.4949 25.6747H37.6701L28.3823 16.3869C28.1726 16.1769 28.0548 15.8923 28.0548 15.5955C28.0548 15.2987 28.1726 15.0141 28.3823 14.8041Z" fill="#0F1017" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Divider -->
<div class="w-full h-px bg-gray-500 mt-4 mx-auto"></div>

<!-- Contact Section -->
<section>
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-between text-left py-10 mt-2 px-6 lg:px-0 gap-4">
            <h1 class="text-white font-semibold text-5xl md:text-4xl lg:text-5xl w-full lg:w-auto text-left lg:text-left ml-0 lg:ml-20 max-w-sm lg:max-w-xl">
                Mau Diskusi Project Baru?
            </h1>
            <a href="<?php echo get_site_url() . '/about-us'; ?>"
                class="bg-custom-purple text-white text-sm md:text-base px-5 py-3 rounded-full transition-transform duration-300 transform hover:scale-105 lg:mr-16 w-full lg:w-auto text-center">
                Contact Us <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>
        </div>
    </div>
</section>