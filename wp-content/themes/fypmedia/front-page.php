<?php
// Menyertakan header.php
include "layouts/header.php";

$services = [
    'FYP Agency',
    'FYP Management',
    'FYP Mandala',
    'FYP Media'
];
?>
<!-- Hero Section -->
<section>
    <div class="container-primary mt-10 sm:mt-14 md:mt-20">
        <!-- Teks Hero -->
        <div class="flex flex-col gap-y-4 lg:gap-y-8">
            <h1
                class="text-4xl font-bold text-secondary font-open-sans sm:text-5xl sm:leading-snug md:text-6xl lg:text-7xl xl:text-[110px]">
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
                        class="px-5 py-3 bg-secondary font-semibold text-primary hover:text-secondary hover:bg-primary-purple group flex items-center justify-center gap-x-2 rounded-full transition-colors duration-300 border-2 border-transparent lg:shrink-0">Get
                        in Touch
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#0F1017" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="group-hover:stroke-secondary transition-colors duration-300" />
                        </svg>

                    </a>
                    <a href="#"
                        class="px-5 py-3 font-semibold text-secondary  group flex items-center justify-center gap-x-2 rounded-full transition-colors duration-300 border-2 border-secondary hover:text-secondary hover:bg-primary-purple hover:border-transparent lg:shrink-0">Read
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

    <div class="container-primary mt-11 flex flex-col lg:flex-row lg:justify-between lg:gap-10 lg:mt-20">
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
                class="flex items-center justify-center mt-12 gap-1 rounded-full font-semibold text-lg py-4 w-full btn-primary-purle lg:mt-8 lg:w-max lg:px-8">Ayo
                Wujudkan Ide mu
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#f1f3f4" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="group-hover:stroke-white transition-colors duration-300" />
                </svg></a>

        </div>
    </div>
</section>

<!-- Garis pemisah -->
<div
    class="w-full h-1 bg-gradient-to-r from-primary-purple/0 from-5% via-primary-purple via-50 to-primary-purple/0 to-95 rounded-sm mx-auto mt-14 lg:mt-20">
</div>

<!-- Our Services + News + Latest Blog -->
<section>
    <div class="flex flex-col lg:flex-col-reverse">
        <!-- Our Services -->
        <div class="container-primary margin-primary">
            <div class="lg:flex lg:items-center lg:justify-between lg:gap-10 lg:relative">
                <h2 class="text-secondary font-open-sans font-bold text-3xl flex items-center gap-2 lg:text-5xl">
                    Our Services <svg width="36" height="36" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="lg:w-12 lg:h-12">
                        <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#f1f3f4" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </h2>

                <!-- Tombol Navigasi -->
                <div class="hidden lg:flex lg:gap-5">
                    <div
                        class="swiper-button-prev flex items-center justify-center !static !w-14 !h-14 rounded-full border border-secondary hover:opacity-70 duration-200 ease-in-out">
                        <i
                            class="fi fi-rr-angle-small-left text-secondary text-4xl w-10 h-10 flex items-center justify-center"></i>
                    </div>

                    <div
                        class="swiper-button-next flex items-center justify-center !static !w-14 !h-14 rounded-full border border-secondary hover:opacity-70 duration-200 ease-in-out">
                        <i
                            class="fi fi-rr-angle-small-right text-secondary text-4xl w-10 h-10 flex items-center justify-center"></i>
                    </div>
                </div>
            </div>

            <div class="swiper-cards relative overflow-hidden mt-6 lg:mt-10">
                <div class="swiper-wrapper">
                    <?php foreach ($services as $title): ?>
                        <div class="swiper-slide bg-card-services border-2 rounded-3xl border-secondary/40 overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out
                   flex flex-col"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image.png" alt="
                                <?php echo esc_attr($title); ?>" class="w-full h-48 object-cover">

                            <div class="px-4 py-7 flex flex-col grow">
                                <h3 class="text-2xl font-semibold font-open-sans text-secondary"><?php echo $title; ?>
                                </h3>

                                <p class="font-medium text-secondary mt-5 line-clamp-3 grow">
                                    Crafting digital experience where beauty meets ROI, turning heads and unlocking revenue
                                    potential with every click.
                                </p>

                                <a href="#"
                                    class="px-5 py-3 mt-7 font-semibold  flex items-center justify-center gap-x-2 rounded-full btn-primary-purle  border-2 border-transparent lg:shrink-0">
                                    Get in Touch
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#f1f3f4 " stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <style>
                    .swiper-button-next::after,
                    .swiper-button-prev::after {
                        display: none;
                    }
                </style>
            </div>
        </div>

        <!-- Garis pemisah -->
        <div
            class="w-full h-1 bg-gradient-to-r from-primary-purple/0 from-5% via-primary-purple via-50 to-primary-purple/0 to-95 rounded-sm mx-auto mt-14 lg:mt-20">
        </div>

        <!-- News -->
        <div class="container-primary margin-primary">
            <!-- Header Section -->
            <div class="container flex justify-between items-center">
                <h2
                    class="text-secondary font-open-sans font-bold text-3xl flex items-center gap-2 relative pl-5 before:block before:bg-primary-red before:w-2 before:h-full before:rounded-lg before:absolute before:left-0 lg:text-5xl">
                    News
                </h2>
                <!-- Tombol More News untuk layar besar -->
                <div class="hidden lg:flex lg:justify-center">
                    <a href="#"
                        class="border-2 border-secondary text-secondary text-xl font-semibold w-max flex items-center justify-center gap-x-2 px-8 py-4 rounded-full text-center transition-colors duration-300 hover:text-secondary hover:bg-primary-purple hover:border-transparent">
                        More news <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#f1f3f4" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="group-hover:stroke-secondary transition-colors duration-300 lg:stroke-secondary" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid gap-y-12 mt-10 sm:grid-cols-2 sm:gap-11 lg:grid-cols-3 ">
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
                        <article class="overflow-hidden transition-transform transform hover:scale-105">
                            <!-- Gambar Post -->
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail("medium", [
                                        "class" =>
                                            "w-full aspect-video object-cover rounded-lg",
                                    ]); ?>
                                <?php else: ?>
                                <?php endif; ?>
                            </a>
                            <div class="pt-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-open-sans text-sm text-primary-blue">FYP Media</span>
                                    <span class="font-open-sans text-sm text-primary-blue">News</span>
                                </div>
                                <!-- <h4 class="font-open-sans text-xl font-semibold my-3 text-secondary"><?php the_category(
                                    ", "
                                ); ?></h4> -->
                                <a href="<?php the_permalink(); ?>"
                                    class="font-open-sans text-xl font-semibold my-3 block text-secondary hover:text-primary-red transition-colors"><?php the_title(); ?></a>
                                <p class="text-primary-red text-xs">By <?php echo $post_author; ?> - <?php echo $post_date; ?>
                                </p>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p class="text-center text-gray-500">No news available.</p>';
                endif;
                ?>
            </div>

            <!-- Tombol More News untuk layar kecil -->
            <div class="flex justify-center mt-11 lg:hidden">
                <a href="#"
                    class="border-2 border-secondary text-secondary text-xl font-semibold w-max flex items-center justify-center gap-x-2 px-8 py-4 rounded-full text-center transition-colors duration-300 hover:text-secondary hover:bg-primary-purple hover:border-transparent">
                    More news <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#f1f3f4" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="group-hover:stroke-secondary transition-colors duration-300 lg:stroke-secondary" />
                    </svg>
                </a>
            </div>
        </div>
    </div>



    <!-- Latest Blog -->
    <div class="">

    </div>

</section>





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

<script>
    document.addEventListener('DOMContentLoaded', function () {
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

        // swiper-cards untuk bagian Our Services
        new Swiper('.swiper-cards', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            spaceBetween: 24,
            centeredSlides: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                    autoplay: {
                        enabled: false,
                    },
                },
            },
        });
    });
</script>