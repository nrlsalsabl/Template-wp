<?php
include 'layouts/header.php'; // Menyertakan header.php
?>
<!-- Hero Section -->
<section>
    <div class="container mx-auto px-6 lg:px-20 mt-10 sm:mt-20 md:mt-24 lg:mt-30">
        <!-- Teks Hero -->
        <div class="text-left sm:text-left md:text-left lg:text-left">
            <h1 class="text-3xl sm:text-5xl lg:text-8xl font-semibold text-white">
                Solusi Inovatif Untuk <span class="text-3xl sm:text-5xl lg:text-8xl font-semibold text-transparent text-white bg-clip-text">Pertumbuhan Brand</span>
            </h1>
            <div class="relative lg:absolute lg:right-0 lg:w-80 order-1 lg:order-3 mt-10">
                <p class="text-white text-left">
                    Hubungkan bakatmu dengan dunia dan dapatkan berita terkini. Semua ada di FYP Media.
                </p>
            </div>
            <div class="mt-14 space-y-4 lg:space-x-4 lg:space-y-0 flex flex-col lg:flex-row justify-center lg:justify-start">
                <a href="#"
                    class="px-10 py-2 bg-white text-black hover:bg-gray-500 rounded-full transition-colors duration-300 flex justify-center items-center">
                    Get in Touch <i class="fi fi-rr-arrow-up-right text-black text-sm ml-3"></i>
                </a>
                <a href="#"
                    class="px-10 py-2 bg-transparent border text-white hover:bg-gray-500 rounded-full transition-colors duration-300 flex justify-center items-center">
                    Read News here <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="mt-20">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/meeting.jpg" alt="Meeting image" class="w-5/6 h-96 hidden sm:block contrast-50 brightness-90 object-cover rounded-xl mx-auto">
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
                                class="h-10 sm:h-12 lg:h-16 object-contain hover:scale-110 transition-transform duration-300"  />
                        </div>
                    <?php endfor; ?>
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
</section>


<section class="mt-20">
    <!-- garis -->
    <div class="flex items-center justify-center my-4">
        <div class="flex-grow border-t-2 border-gray-500"></div>
        <span class="mx-4 text-lg font-semibold text-white">
            Kenapa Memilih Kami?
        </span>
        <div class="flex-grow border-t-2 border-gray-500"></div>
    </div>
    <!-- end -->

    <div class="container mx-auto px-6 lg:px-12 py-10 flex flex-col lg:flex-row items-left justify-between">
        <!-- Bagian Teks -->
        <div class="sm:text-left md:text-left lg:text-left lg:w-2/5 lg:ml-12">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-white leading-tight">
                Dengan Pengalaman Lebih Dari <span class="text-transparent bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text leading-tight">5+ Tahun </span>&
                Berpartner > <span class="text-transparent bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text leading-tight">5000 Talents</span>
            </h2>
        </div>


        <!-- Bagian Paragraf dan Tombol -->
        <div class="lg:w-1/3 flex flex-col items-center lg:items-start space-y-5 mt-6 lg:mt-0">
            <p class="text-white sm:text-md md:text-md lg:text-lg text-left">
                Siap bantu bikin konten keren dan naikin pamor brand kamu di platform ini!
            </p>
            <a href="#"
                class="hover:bg-purple-500 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mt-5 text-white text-sm md:text-base px-8 lg:px-8 py-3 rounded-full transition duration-200 w-full lg:w-auto text-center">
                Contact Us Now <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>

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
            <a href="#" class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full mr-16 hover:bg-pink-700 transition duration-200 text-center hidden md:inline-block">
                More news <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 max-w-6xl mx-auto px-4 sm:px-6 lg:8 mt-5">
            <?php
            $news_query = new WP_Query(array(
                'post_type' => 'news',
                'posts_per_page' => 3,
            ));
            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
                    $post_author = get_the_author();
                    $post_date = get_the_date('j F Y');
            ?>
                    <div class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Gambar Post -->
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded-lg']); ?>
                            <?php else : ?>
                            <?php endif; ?>
                        </a>
                        <div class="flex-grow p-2">
                            <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wide mb-1">FYP Media News</h3>
                            <h3 class="text-sm font-semibold mb-2 text-white"><?php the_category(', '); ?></h3>
                            <p class="text-white text-xl mb-4">
                                <a href="<?php the_permalink(); ?>" class="hover:text-red-500 transition-colors"><?php the_title(); ?></a>
                            </p>
                            <p class="text-red-500 text-xs">By <?php echo $post_author; ?> - <?php echo $post_date; ?></p>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center text-gray-500">No news available.</p>';
            endif;
            ?>
        </div>

        <!-- Tombol More News untuk layar kecil -->
        <div class="flex justify-center mt-6 order-3 lg:hidden">
            <a href="#"
                class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full hover:bg-red-500 transition duration-200 text-center">
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
            Our Service <i class="fi fi-rr-arrow-up-right text-white text-2xl sm:text-2xl md:text-3xl lg:text-3xl ml-3"></i>
        </h1>

    </div>
    <div class="py-4">
        <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-8">
            <!-- Swiper -->
            <div class="swiper-container swiper-cards relative overflow-hidden">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Agency</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full hover:bg-purple-600 shadow-lg transition-colors duration-300 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Management</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full hover:bg-purple-600 shadow-lg transition-colors duration-300 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Mandala</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full hover:bg-purple-600 shadow-lg transition-colors duration-300 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-gray-900 shadow-lg border rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="Card 1" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white">FYP Media</h3>
                            <p class="text-sm text-white mt-2">
                                Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue potential with every click.
                            </p>
                            <div class="flex justify-center mt-4">
                                <a href="#"
                                    class="inline-block text-center px-3 py-2 sm:px-10 sm:py-2 lg:px-10 lg:py-3 sm:text-sm lg:text-md bg-custom-purple text-white font-medium rounded-full hover:bg-purple-600 shadow-lg transition-colors duration-300 whitespace-nowrap">
                                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Navigasi -->
                <div class="swiper-button-next flex items-center justify-center">
                    <i class="fi fi-rr-angle-small-right bg-white rounded-full text-black hover:bg-gray-500 text-4xl transition duration-300 w-8 h-8 flex items-center justify-center"></i>
                </div>
                <div class="swiper-button-prev flex items-center justify-center">
                    <i class="fi fi-rr-angle-small-left bg-white rounded-full text-black hover:bg-gray-500 text-4xl transition duration-300 w-8 h-8 flex items-center justify-center"></i>
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
            <a href="#" class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full mr-16 hover:bg-pink-700 transition duration-200 text-center hidden md:inline-block">
                More news <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>

        <!-- Blog Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 items-center max-w-6xl mx-auto px-4 py-5">
            <?php
            // Query for 'post' (default blog posts)
            $blog_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            ));
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
            ?>
                    <div class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded-lg']); ?>
                            <?php endif; ?>
                        </a>
                        <div class="flex-grow p-2">
                            <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wide mb-1">FYP Media Blog</h3>

                            <h2 class="text-white text-lg font-bold hover:text-red-500 transition-colors mb-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <p class="text-white text-sm mb-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>

                            <p class="text-red-500 text-xs">By <?php echo get_the_author(); ?> - <?php echo get_the_date('j F Y'); ?></p>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No blog posts available.</p>';
            endif;
            ?>
        </div>

        <!-- Tombol More News untuk layar kecil -->
        <div class="flex justify-center mt-6 lg:hidden">
            <a href="#" class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full hover:bg-pink-700 transition duration-200 text-center">
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
        <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-between text-left py-10 mt-2 px-6 lg:px-0 gap-4">
            <h1 class="text-white font-semibold text-5xl md:text-4xl lg:text-5xl w-full lg:w-auto text-left lg:text-left ml-0 lg:ml-20 max-w-sm lg:max-w-xl">
                Mau Diskusi Project Baru?
            </h1>
            <a href="<?php echo get_site_url() . '/about-us'; ?>"
                class="hover:bg-purple-500 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mt-5 text-white text-sm md:text-base px-5 py-3 rounded-full transition duration-200 lg:mr-16 w-full lg:w-auto text-center">
                Get in touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>
        </div>
    </div>

</section>


<?php
include 'layouts/footer.php'; // Menyertakan header.php
?>