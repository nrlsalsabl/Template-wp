<!--  
* kalau nambah tim, maka akan masuk ke halaman ini, tapi ketika di klik -
* akan tampil ke halaman detail team itu sendiri.
* begitu juga menambah karir maka akan tampil di halaman ini - 
* dan detail nya akan tampil ke halamannya sendiri 
* note : sama kaya home, ada pages team dan career masuk ke functions tapi url masing-masing -->


<?php
/*
Template Name: Career Page
*/
?>

<!-- Hero Section -->

<?php
include 'layouts/header.php'
?>

<section class="mb-20">
    <div class="container mx-auto px-6 mt-10 sm:mt-20 md:mt-24 lg:mt-30">
        <div class="text-left sm:text-left md:text-left lg:text-left">
            <h1 class="text-4xl sm:text-4xl lg:text-6xl font-semibold text-white">
                Jadilah Bagian Dari Tim Hebat
            </h1>
            <h1 class="text-4xl sm:text-4xl lg:text-6xl font-semibold text-white mt-px">
                Kami, Kerja Tapi Santai.
            </h1>
        </div>
        <div class="text-xl sm:text-xl lg:text-2xl font-normal text-white mt-7">
            <p>Ayo jadi bagian dari tim kami dengan lingkungan kerja yang family friendly</p>
        </div>
        <div class="mt-14 space-y-4 lg:space-x-4 lg:space-y-0 flex flex-col lg:flex-row justify-center lg:justify-start">
            <a href="#"
                class="px-6 sm:px-8 lg:px-10 py- text-sm sm:text-base lg:text-lg bg-white text-black font-semibold rounded-full hover:bg-pink-900 transition-colors duration-300 flex justify-center items-center">
                Gabung Dengan Tim Kami <i class="fi fi-rr-arrow-up-right text-black font-semibold text-sm ml-3"></i>
            </a>
        </div>
    </div>
</section>

<!-- Career Section -->
<section class="mt-20">
    <div class="container">
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-5xl font-semibold text-start ml-5 py-2">
            Our Team <i class="fi fi-rr-arrow-up-right text-white text-2xl sm:text-3xl md:text-3xl lg:text-3xl ml-3"></i>
        </h1>
        <p class="text-white font-semibold text-start ml-6">Member of our great team</p>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php
            // Query untuk 'team' post type
            $team_query = new WP_Query(array(
                'post_type' => 'team', // Ubah 'team' ke custom post type Anda
                'posts_per_page' => 6,  // Tentukan jumlah tim yang ingin ditampilkan
            ));
            if ($team_query->have_posts()) : ?>
                <!-- Swiper -->
                <div class="swiper-container swiper-scrollbar relative overflow-hidden">
                    <!-- Wrapper untuk slides -->
                    <div class="swiper-wrapper">
                        <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>
                            <!-- Card untuk setiap tim -->
                            <div class="swiper-slide bg-neutral-800 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out relative">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('large', ['class' => 'w-full h-96 object-cover']); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/50 to-transparent p-4">
                                    <h1 class="text-4xl sm:text-3xl font-bold text-white">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h1>
                                    <p class="text-sm text-white mt-2">
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <!-- Navigasi -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <!-- Scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            <?php else : ?>
                <p>No team members available.</p>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3, // Menampilkan 3 slide per view pada ukuran layar besar
            spaceBetween: 20, // Jarak antar slide
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3, // 3 slide pada desktop
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2, // 2 slide pada tablet
                    spaceBetween: 15,
                },
                480: {
                    slidesPerView: 1, // 1 slide pada mobile
                    spaceBetween: 10,
                },
                390: {
                    slidesPerView: 1, // 1 slide pada mobile
                    spaceBetween: 10,
                },
                360: {
                    slidesPerView: 1, // 1 slide pada mobile
                    spaceBetween: 10,
                },
            }
        });
    });
</script>

<!-- Divider -->
<section>
    <div class="flex items-center justify-center my-4">
        <div class="flex-grow border-t-2 border-gray-500"></div>
        <span class="mx-4 text-lg font-semibold text-white">
            Pilihan Posisi Yang Mungkin Cocok Untuk Kamu?
        </span>
        <div class="flex-grow border-t-2 border-gray-500"></div>
    </div>
</section>

<!-- Career Opportunities Section -->
<section>
    <div class="container mx-auto px-6 lg:px-10 py-10 flex flex-col lg:flex-row items-center justify-between">
        <div class="sm:text-left md:text-left lg:text-left w-3/5 lg:w-1/2 space-y-6 lg:ml-14">
            <h1 class="text-xl sm:text-3xl lg:text-4xl font-semibold text-white leading-tight">
                Punya beberapa skill keren yang ingin kamu kembangkan?
                Kami sangat ingin melihatnya, meskipun sekarang mungkin belum cocok.
            </h1>
        </div>

        <div class="bg-gray-600 text-white p-6 lg:p-10 rounded-lg shadow-lg mt-8 lg:mt-0 w-full lg:w-60">
            <h2 class="text-lg text-center font-semibold mb-4">We’re interested in:</h2>
            <ul class="space-y-2 text-sm text-center lg:text-left">
                <li>Social Media Specialist</li>
                <li>Creative Talents Manager</li>
                <li>Programmer</li>
                <li>UI/UX Designer</li>
                <li>Graphic Design</li>
                <li>Copywriting</li>
                <li>Project Management</li>
            </ul>
        </div>
    </div>
</section>

<!-- Divider -->
<div class="w-full h-px bg-gray-500 mt-4 mx-auto"></div>

<!-- Contact Section -->
<section>
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-between text-left lg:text-left py-10 mt-2 px-6 lg:px-0">
            <h1 class="text-white text-4xl sm:text-5xl lg:text-6xl font-light text-left lg:text-left ml-5">
                Mau Diskusi Project Baru?
            </h1>
            <a href="<?php echo get_site_url() . '/about-us'; ?>"
                class="mt-5 lg:mt-0 hover:bg-purple-500 bg-purple-700 text-white text-sm md:text-base px-5 py-2 rounded-full transition duration-200 lg:mr-16 mx-auto lg:mx-0">
                Get in touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>
        </div>
    </div>
</section>


<?php
include 'layouts/footer.php'
?>