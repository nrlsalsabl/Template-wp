<?php
include "layouts/header.php";
// Menyertakan header.php
?>
<!-- Hero Section -->
<section>
    <div class="container mx-auto px-4 mt-10 sm:mt-14 md:mt-20">
        <!-- Teks Hero -->
        <div class="flex flex-col gap-y-4 lg:gap-y-8">
            <h1
                class="text-4xl font-bold text-secondary font-open-sans sm:text-5xl sm:leading-snug md:text-6xl lg:text-7xl xl:text-[104px]">
                Solusi
                Inovatif
                Untuk
                <span class="inline-block 
            bg-gradient-to-r from-[#BC49F9] to-[#06D8FB] 
            bg-clip-text text-transparent">
                    Pertumbuhan
                    Brand
                </span>
            </h1>
            <div class="space-y-4 lg:flex lg:flex-row-reverse lg:justify-between">
                <p class="text-secondary sm:text-lg lg:max-w-96">
                    Hubungkan bakatmu dengan dunia dan dapatkan berita terkini. Semua ada di FYP Media.
                </p>
                <div class="flex flex-col gap-4 lg:flex-row lg:self-center">
                    <a href="#"
                        class="px-5 py-3 bg-secondary font-semibold text-primary hover:text-secondary hover:bg-purple-500 group flex items-center justify-center gap-x-2 rounded-full transition-colors duration-300 border-2 border-transparent lg:shrink-0">Get
                        in Touch
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#0F1017" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="group-hover:stroke-secondary transition-colors duration-300" />
                        </svg>

                    </a>
                    <a href="#"
                        class="px-5 py-3 font-semibold text-secondary  group flex items-center justify-center gap-x-2 rounded-full transition-colors duration-300 border-2 border-secondary hover:text-secondary hover:bg-purple-500 hover:border-transparent lg:shrink-0">Read
                        News here
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#f1f3f4" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="group-hover:stroke-secondary transition-colors duration-300 lg:stroke-secondary" />
                        </svg>

                    </a>
                </div>
            </div>
        </div>
        <div class="mt-14 hidden lg:block">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.png" alt="Meeting image"
                class="w-full object-cover">
        </div>
    </div>
</section>

<!-- Swiper Autoplay (Brand) -->
<section class="relative mt-16 lg:mt-20">
    <div class="bg-secondary/10 py-5">
        <div class="container mx-auto px-4">
            <!-- Swiper -->
            <div class="swiper autoplay-swiper overflow-hidden w-full">
                <div class="swiper-wrapper ">
                    <?php for ($i = 1; $i <= 19; $i++):
                        $image_path =
                            get_template_directory_uri() .
                            "/assets/images/{$i}.png"; ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($image_path); ?>" alt="Image <?php echo $i; ?>"
                                class="h-10 sm:h-12 lg:h-16 object-contain" />
                        </div>
                        <?php
                    endfor; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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


    <div class="absolute w-96 h-96 rounded-full top-5 -left-56 opacity-30 blur-[150px] md:hidden"
        style="background: linear-gradient(45deg, #2CADFE, #F03A5D);">
    </div>
</section>


<section class="relative mt-16 lg:mt-20">
    <!-- garis -->
    <div class="flex items-center justify-center">
        <div class="w-full h-1 bg-tertiary rounded-sm"></div>
        <p
            class="mx-5 text-lg font-semibold text-secondary shrink-0 font-open-sans sm:text-xl sm:mx-10 md:text-2xl lg:text-3xl">
            Kenapa Memilih Kami?
        </p>
        <div class="w-full h-1 bg-tertiary rounded-sm"></div>
    </div>
    <!-- end -->

    <div class="container mx-auto mt-11 mb-16 px-4 flex flex-col lg:flex-row lg:justify-between lg:gap-10 lg:my-20">
        <!-- Bagian Teks -->
        <h2
            class="text-3xl font-open-sans sm:text-4xl lg:text-5xl font-semibold text-secondary leading-snug lg:max-w-[604px]">

            Dengan Pengalaman Lebih Dari <span
                class="text-transparent [background-image:linear-gradient(45deg,_#BC49F9,_#06D8FB)] bg-clip-text">5+
                Tahun </span>&
            Berpartner Lebih Dari <span
                class="text-transparent [background-image:linear-gradient(45deg,_#BC49F9,_#06D8FB)] bg-clip-text">500
                Talents</span>
        </h2>


        <!-- Bagian Paragraf dan Tombol -->
        <div class="mt-8 lg:mt-0 lg:max-w-96">
            <p class="text-secondary font-medium sm:text-lg lg:text-xl">Siap bantu bikin konten keren dan naikin pamor
                brand kamu di platform
                ini!</p>
            <a href="#"
                class="flex items-center justify-center mt-12 gap-1 bg-primary-bg text-white rounded-full font-semibold text-lg py-4 w-full hover:translate-x-5 ease-in-out duration-500 lg:mt-8 lg:w-max lg:px-8">Ayo
                Wujudkan Ide mu
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#f1f3f4" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="group-hover:stroke-white transition-colors duration-300" />
                </svg></a>

        </div>
    </div>
</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black mt-4 mx-auto"></div>

<section class="mt-5">
    <div class="container mx-auto">
        <!-- Header Section -->
        <div class="container flex justify-between items-center p-5">
            <h1 class="text-white text-3xl sm:text-4xl md:text-4xl lg:text-5xl font-semibold text-start lg:ml-14 py-5">
                <span class="inline-block w-1 h-6 lg:w-2 sm:h-8 md:h-9 lg:h-10 bg-red-500 rounded-full mr-2"></span>
                News
            </h1>
            <!-- Tombol More News untuk layar besar -->
            <a href="#"
                class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full mr-16 transition-transform transform hover:scale-105 text-center hidden md:inline-block">
                More news <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 max-w-6xl mx-auto px-4 sm:px-6 lg:8 mt-5">
            <?php
            $news_query = new WP_Query([
                "post_type" => "news",
                "posts_per_page" => 3,
            ]);
            if ($news_query->have_posts()):
                while ($news_query->have_posts()):

                    $news_query->the_post();
                    $post_author = get_the_author();
                    $post_date = get_the_date("j F Y");
                    ?>
                    <div
                        class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                        <!-- Gambar Post -->
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail("medium", [
                                    "class" =>
                                        "w-full h-48 object-cover rounded-lg",
                                ]); ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </a>
                        <div class="flex-grow p-2">
                            <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wide mb-1">FYP Media News</h3>
                            <h3 class="text-sm font-semibold mb-2 text-white"><?php the_category(
                                ", "
                            ); ?></h3>
                            <p class="text-white text-xl mb-4">
                                <a href="<?php the_permalink(); ?>"
                                    class="hover:text-red-500 transition-colors"><?php the_title(); ?></a>
                            </p>
                            <p class="text-red-500 text-xs">By <?php echo $post_author; ?> - <?php echo $post_date; ?></p>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="text-center text-gray-500">No news available.</p>';
            endif;
            ?>
        </div>

        <!-- Tombol More News untuk layar kecil -->
        <div class="flex justify-center mt-6 order-3 lg:hidden">
            <a href="#"
                class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full transition-transform transform hover:scale-105 text-center">
                More news <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>
    </div>

</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black mt-4 mx-auto"></div>

<!-- Service -->
<section class="mt-5">
    <div class="container mx-auto p-5">
        <h1 class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold text-start lg:ml-14">
            Our Service <i
                class="fi fi-rr-arrow-up-right text-white text-2xl sm:text-2xl md:text-3xl lg:text-3xl ml-3"></i>
        </h1>

    </div>
    <div class="py-4">
        <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-8">
            <!-- Swiper -->
            <div class="swiper-container swiper-cards relative overflow-hidden">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div
                        class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Agency</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue
                                potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full transition-transform duration-300 transform hover:scale-105 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Management</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue
                                potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full transition-transform duration-300 transform hover:scale-105 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Mandala</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue
                                potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full transition-transform duration-300 transform hover:scale-105 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Media</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue
                                potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full transition-transform transform hover:scale-105 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Navigasi -->
                <div class="swiper-button-next flex items-center justify-center">
                    <i
                        class="fi fi-rr-angle-small-right bg-white rounded-full text-black transition-transform duration-300 transform hover:scale-105 text-4xl w-8 h-8 flex items-center justify-center"></i>
                </div>
                <div class="swiper-button-prev flex items-center justify-center">
                    <i
                        class="fi fi-rr-angle-small-left bg-white rounded-full text-black transition-transform duration-300 transform hover:scale-105 text-4xl w-8 h-8 flex items-center justify-center"></i>
                </div>


                <style>
                    /* Mengatasi tampilan default Swiper */
                    .swiper-button-next::after,
                    .swiper-button-prev::after {
                        display: none;
                    }
                </style>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Swiper card
            const cardSwiper = new Swiper('.swiper-cards', {
                loop: true, // Mengaktifkan loop
                slidesPerView: 3, // Menampilkan 3 card sekaligus
                spaceBetween: 20, // Jarak antar card
                navigation: {
                    nextEl: '.swiper-button-next', // Tombol untuk navigasi ke slide berikutnya
                    prevEl: '.swiper-button-prev', // Tombol untuk navigasi ke slide sebelumnya
                },
                cssMode: true,

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
</section>

<!-- Garis pemisah yang lebih tipis dan tidak full -->
<div class="w-11/12 h-px bg-gray-500 mt-20 mx-auto"></div>


<!-- Berita FYP lawas -->
<section class="mt-5">
    <div class="container mx-auto">
        <!-- Header Section -->
        <div class="container flex justify-between items-center p-5">
            <h1 class="text-white text-3xl sm:text-4xl md:text-4xl lg:text-5xl font-semibold text-start lg:ml-14 py-5">
                <span class="inline-block w-1 h-6 lg:w-2 sm:h-8 md:h-9 lg:h-10 bg-red-500 rounded-full mr-2"></span>
                Latest Blog
            </h1>
            <!-- Tombol More News untuk layar besar -->
            <a href="#"
                class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full mr-16 transition-transform transform hover:scale-105 text-center hidden md:inline-block">
                More Blog<i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>

        <!-- Blog Cards Section -->
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 items-stretch max-w-6xl mx-auto px-4 py-5">
            <?php
            // Query for 'post' (default blog posts)
            $post_query = new WP_Query([
                "post_type" => "post",
                "posts_per_page" => 3,
            ]);
            if ($post_query->have_posts()):
                while ($post_query->have_posts()):
                    $post_query->the_post(); ?>
                    <div
                        class="flex flex-col bg-transparent rounded-lg shadow-xl overflow-hidden transition-transform transform hover:scale-105">
                        <a href="<?php the_permalink(); ?>" class="block">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail("medium", [
                                    "class" =>
                                        "w-full h-48 object-cover rounded-t-lg",
                                ]); ?>
                            <?php endif; ?>
                        </a>
                        <div class="flex-grow p-5 rounded-b-lg">
                            <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wide mb-1">FYP Media Blog</h3>

                            <h2 class="text-white text-lg font-bold hover:text-red-500 transition-colors mb-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <p class="text-white text-sm mb-3">
                                <?php echo wp_trim_words(
                                    get_the_excerpt(),
                                    20,
                                    "..."
                                ); ?>
                            </p>

                            <p class="text-red-500 text-xs">By <?php echo get_the_author(); ?> -
                                <?php echo get_the_date("j F Y"); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="text-white">No blog posts available.</p>';
            endif;
            ?>
        </div>

        <!-- Tombol More News untuk layar kecil -->
        <div class="flex justify-center mt-6 lg:hidden">
            <a href="#"
                class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full transition-transform transform hover:scale-105 text-center">
                More news <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>
    </div>
</section>


<!-- Divider -->
<div class="w-full h-px bg-gray-500 mt-4 mx-auto"></div>

<!-- Contact Section -->
<section>
    <div class="container mx-auto">
        <div
            class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-between text-left py-10 mt-2 px-6 lg:px-0 gap-4">
            <h1
                class="text-white font-semibold text-5xl md:text-4xl lg:text-5xl w-full lg:w-auto text-left lg:text-left ml-0 lg:ml-20 max-w-sm lg:max-w-xl">
                Mau Diskusi Project Baru?
            </h1>
            <a href="<?php echo get_site_url() . "/about-us"; ?>"
                class="bg-custom-purple mt-5 text-white text-sm md:text-base px-5 py-3 rounded-full transition-transform duration-300 transform hover:scale-105 lg:mr-16 w-full lg:w-auto text-center">
                Contact Us <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>
        </div>
    </div>

</section>


<?php include "layouts/footer.php"; // Menyertakan header.php
?>
te_url() . '/about-us'; ?>"
class="bg-custom-purple mt-5 text-white text-sm md:text-base px-5 py-3 rounded-full transition-transform duration-300
transform hover:scale-105 lg:mr-16 w-full lg:w-auto text-center">
Contact Us <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
</a>
</div>
</div>

</section>


<?php
include 'layouts/footer.php'; // Menyertakan header.php
?>