<?php
get_template_part('layouts/header'); // Include header
?>

<section>
    <div class="container mx-auto p-4">
        <!-- Judul di Luar Grid -->
        <div class="mb-6 text-left px-5">
            <h3 class="text-red-600 text-md font-semibold">FYP Blog</h3>
            <h1 class="text-4xl font-bold text-red-400"><?php single_post_title(); ?></h1>

        </div>

        <!-- Grid untuk Konten dan Sidebar -->
        <div class="flex flex-col lg:flex-row">
            <!-- Bagian Kiri (Artikel Utama) -->
            <main class="lg:w-3/5 p-3 rounded-lg text-white">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article>
                            <p class="text-sm text-gray-400 mb-2">
                                Writer: <span class="text-red-300 font-semibold"><?php the_author(); ?></span> -
                                <?php the_date(); ?>
                            </p>
                            <div class="mb-4">
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto rounded-lg']); ?>
                            </div>
                            <div class="text-gray-300 break-words">
                                <?php echo wp_trim_words(get_the_content(), 100, '...'); ?>
                            </div>
                        </article>
                <?php endwhile;
                endif; ?>
            </main>



            <!-- Sidebar (Artikel Terbaru) -->
            <aside class="hidden md:block lg:w-1/2 p-3">
                <h2 class="text-xl font-bold text-white mb-4">Artikel Terbaru</h2>
                <?php
                $recent_posts = wp_get_recent_posts(['numberposts' => 4]);
                foreach ($recent_posts as $post) : ?>
                    <div class="flex items-center gap-4 mb-4">
                        <img src="<?php echo get_the_post_thumbnail_url($post['ID'], 'thumbnail'); ?>"
                            class="w-1/2 h-32 rounded-xl object-cover flex-none">
                        <div class="flex-1">
                            <a href="<?php echo get_permalink($post['ID']); ?>"
                                class="text-white font-semibold block line-clamp-2">
                                <?php echo $post['post_title']; ?>
                            </a>
                            <p class="text-xs text-red-600">
                                By <?php echo get_the_author_meta('display_name', $post['post_author']); ?> - <?php echo get_the_date('', $post['ID']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </aside>
        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container mx-auto p-3">
        <!-- Header Section -->
        <div class="container flex justify-between items-center lg:p-5">
            <h1 class="text-white text-3xl sm:text-4xl md:text-4xl lg:text-5xl font-semibold text-start">
                <span class="inline-block w-1 h-6 lg:w-2 sm:h-8 md:h-9 lg:h-10 bg-red-500 rounded-full mr-2"></span>
                Artikel Terkait
            </h1>
            <!-- Tombol More News untuk layar besar -->
            <a href="#" class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full mr-16 transition-transform duration-300 transform hover:scale-105 text-center hidden md:inline-block">
                More Article<i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>

        <!-- Blog Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 items-center max-w-6xl mx-auto py-5">
            <?php
            // Query for 'post' (default blog posts)
            $post_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            ));
            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) : $post_query->the_post();
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
            <a href="#" class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full transition-transform duration-300 transform hover:scale-105 text-center">
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
                class="bg-custom-purple mt-5 text-white text-sm md:text-base px-5 py-3 rounded-full transition-transform duration-300 transform hover:scale-105 lg:mr-16 w-full lg:w-auto text-center">
                Contact Us <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>
        </div>
    </div>
</section>



<?php
get_template_part('layouts/footer'); // Include footer
?>