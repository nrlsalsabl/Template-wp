<?php get_template_part('layouts/header'); ?>

<div class="container mx-auto p-4 px-7 flex justify-center">
    <div class="w-full h-auto">
        <article class="w-full h-auto">
            <p class="text-red-500 text-2xl">FYP Blog</p>
            <h1 class="text-4xl font-bold mb-4 text-white w-10/12"><?php the_title(); ?></h1>

            <div class="w-full h-auto flex justify-center items-start">
                <div class="w-9/12 h-auto">
                    <!-- Info Penulis -->
                    <div class="flex items-center justify-between mb-6">
                        <p class="text-white">
                            Writer: <span class="text-red-400"><?php the_field('author'); ?></span> -
                            <?php echo get_the_date(); ?>
                        </p>
                        <div class="flex space-x-4">
                            <a href="https://instagram.com" target="_blank" class="text-white hover:text-blue-600 transition duration-200">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="https://web.whatsapp.com/" target="_blank" class="text-white hover:text-green-400 transition duration-200">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="https://linkedin.com" target="_blank" class="text-white hover:text-pink-500 transition duration-200">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <a href="https://twitter.com" target="_blank" class="text-white hover:text-blue-700 transition duration-200">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Gambar Thumbnail -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-8">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-lg object-cover']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Konten Artikel -->
                    <div class="content text-white leading-8">
                        <?php the_content(); ?>
                        <div class="mt-6">
                            <h4 class="font-semibold text-lg">FYP Media -</h4>
                            <p class="mt-3"><?php the_field('deskripsi_berita'); ?></p>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="mt-6">
                        <h4 class="text-white">
                            Tags: FYP Media -
                            <?php
                            echo esc_html(get_field('tags')) . " ";
                            echo esc_html(get_field('financial'));
                            ?>
                        </h4>
                    </div>
                </div>


                <!-- Sidebar Berita Terbaru -->
                <div class="w-3/12 h-auto ml-6">
                    <h2 class="text-white text-2xl mb-4">Berita Terbaru</h2>

                    <?php
                    $args = array(
                        'post_type'      => 'news', // Ganti dengan 'news' sesuai dengan custom post type Anda
                        'posts_per_page' => 4,      // Batasi hanya 4 post
                        'orderby'        => 'date', // Urutkan berdasarkan tanggal
                        'order'          => 'DESC', // Urutkan secara menurun (terbaru pertama)
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) : ?>
                        <div class="flex flex-col space-y-4">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="flex gap-4 bg-gray-900 p-4 rounded-xl shadow-lg">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="w-1/3">
                                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto rounded-xl object-cover']); ?>
                                        </a>
                                    <?php endif; ?>

                                    <div class="flex flex-col w-2/3 text-white">
                                        <h3 class="text-sm font-semibold mb-2">
                                            <a href="<?php the_permalink(); ?>" class="hover:text-red-400 transition duration-200">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>

                                        <div class="flex items-center text-sm text-gray-400 mt-1">
                                            <p class="mr-2 truncate max-w-xs"><?php the_field('author'); ?></p>
                                            <span class="mx-2">|</span>
                                            <p class="text-sm text-gray-300 overflow-hidden text-ellipsis whitespace-nowrap max-w-xs">
                                                <?php echo get_the_date(); ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p class="text-gray-400">No news found.</p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>



            </div>
        </article>
    </div>
</div>

<?php get_template_part('layouts/footer'); ?>