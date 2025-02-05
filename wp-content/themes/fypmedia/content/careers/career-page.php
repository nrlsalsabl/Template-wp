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
<section class="mb-20">
    <div class="container lg:p-10 mx-auto mt-5 md:mt-10 lg:mt-10">
        <div class="text-left sm:text-left md:text-left lg:text-left">
            <h1 class="text-3xl md:text-4xl lg:text-6xl font-semibold text-white">
                Jadilah Bagian Dari Tim Hebat Kami, Kerja Tapi Santai.
            </h1>
        </div>
        <div class="text-xl sm:text-xl lg:text-2xl font-normal text-white mt-7">
            <p>Ayo jadi bagian dari tim kami dengan lingkungan kerja yang family friendly</p>
        </div>
        <div class="mt-14 space-y-4 lg:space-x-4 lg:space-y-0 flex flex-col lg:flex-row justify-center lg:justify-start">
            <a href="#"
                class="px-6 sm:px-8 lg:px-10 py-2 sm:py-2.5 lg:py-3 text-sm sm:text-base lg:text-lg bg-white text-black font-semibold rounded-full hover:bg-gray-500 transition-colors duration-300 flex justify-center items-center w-full sm:w-auto">
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
        <p class="text-gray-400 font-semibold text-start ml-6">Member of our great team</p>
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
                                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/50 to-transparent text-white p-4">
                                    <h1 class="text-4xl sm:text-3xl font-bold">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h1>
                                    <p class="text-sm mt-2">
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <!-- Navigasi -->
                    <!-- Tombol Navigasi -->
                    <div class="swiper-button-next flex items-center justify-center">
                        <i class="fi fi-rr-angle-small-right bg-white rounded-full text-black hover:bg-gray-300 text-4xl transition duration-300 w-8 h-8 flex items-center justify-center"></i>
                    </div>
                    <div class="swiper-button-prev flex items-center justify-center">
                        <i class="fi fi-rr-angle-small-left bg-white rounded-full text-black hover:bg-gray-300 text-4xl transition duration-300 w-8 h-8 flex items-center justify-center"></i>
                    </div>

                    <style>
                        /* Mengatasi tampilan default Swiper */
                        .swiper-button-next::after,
                        .swiper-button-prev::after {
                            display: none;
                        }
                    </style>

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
        <div class="sm:text-left md:text-left lg:text-left w-full lg:w-3/5 space-y-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-white leading-tight">
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
        <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-between text-left py-10 mt-2 px-6 lg:px-0 gap-4">
            <h1 class="text-white font-semibold text-5xl md:text-4xl lg:text-5xl w-full lg:w-auto text-left lg:text-left ml-0 lg:ml-20 max-w-sm lg:max-w-xl">
                Mau Diskusi Project Baru?
            </h1>
            <a href="<?php echo get_site_url() . '/about-us'; ?>"
                class="hover:bg-purple-500 bg-custom-purple text-white text-sm md:text-base px-5 py-2 rounded-full transition duration-200 lg:mr-16 w-full lg:w-auto text-center">
                Get in touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>
        </div>
    </div>
</section>