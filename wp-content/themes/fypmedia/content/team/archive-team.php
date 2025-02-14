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
                        <i class="fi fi-rr-angle-small-right bg-white rounded-full text-black text-4xl transition-transform duration-300 transform hover:scale-105 w-8 h-8 flex items-center justify-center"></i>
                    </div>
                    <div class="swiper-button-prev flex items-center justify-center">
                        <i class="fi fi-rr-angle-small-left bg-white rounded-full text-black text-4xl transition-transform duration-300 transform hover:scale-105 w-8 h-8 flex items-center justify-center"></i>
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
