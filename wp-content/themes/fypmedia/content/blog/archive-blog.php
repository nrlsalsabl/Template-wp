<?php
get_template_part('layouts/header'); // Include header
?>

<!-- Garis pemisah yang lebih tipis dan tidak full -->
<div class="hidden w-10/12 h-px bg-gray-500 mt-3 mx-auto md:block"></div>

<section>
    <div class="hidden md:flex flex-col md:flex-row items-center justify-between mt-3 mx-4 md:mx-28 space-y-4 md:space-y-0">
        <!-- Kategori Link -->
        <div class="flex flex-wrap justify-center md:justify-start space-x-4 md:space-x-6 text-white">
            <a href="<?php echo esc_url(home_url('/?category=tech')); ?>" class="hover:text-red-800">Semua</a>
            <a href="<?php echo esc_url(home_url('/?category=lifestyle')); ?>" class="hover:text-red-800">Financial</a>
            <a href="<?php echo esc_url(home_url('/?category=business')); ?>" class="hover:text-red-800">Hukum</a>
            <a href="<?php echo esc_url(home_url('/?category=health')); ?>" class="hover:text-red-800">Internasional</a>
            <a href="<?php echo esc_url(home_url('/?category=health')); ?>" class="hover:text-red-800">Entertaiment</a>
            <a href="<?php echo esc_url(home_url('/?category=health')); ?>" class="hover:text-red-800">Lifestyle</a>
            <a href="<?php echo esc_url(home_url('/?category=health')); ?>" class="hover:text-red-800">Sport</a>
            <a href="<?php echo esc_url(home_url('/?category=health')); ?>" class="hover:text-red-800">Culture</a>
        </div>

        <!-- Search Bar -->
        <div class="hidden md:relative w-full md:w-64 md:block">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">
                <input type="search" name="s" placeholder="Cari Blog" class="w-full px-4 py-2 rounded-full bg-gray-700 text-white focus:outline-none" value="<?php echo get_search_query(); ?>" />
                <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="11" cy="11" r="7" stroke-width="2" stroke="currentColor" fill="none" />
                        <line x1="16" y1="16" x2="21" y2="21" stroke-width="2" stroke="currentColor" stroke-linecap="round" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</section>



<!-- Garis pemisah -->
<div class="hidden w-full h-px bg-gray-500 mt-5 mx-auto md:block"></div>

<section class="mt-8">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="mb-6">
            <h1 class="text-white text-4xl font-semibold flex items-center">
                <span class="w-2 h-9 bg-red-500 rounded-full mr-3"></span> Blog Trend
            </h1>
        </div>

        <!-- Blog Grid Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php
            $post_query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 5,
            ]);

            if ($post_query->have_posts()) :
                $index = 0;
                while ($post_query->have_posts()) : $post_query->the_post();
                    $is_first_post = ($index === 0);
                    $grid_class = $is_first_post ? "md:col-span-1 row-span-2" : "";
                    $image_class = $is_first_post ? "w-full max-h-96 object-cover rounded-2xl mx-auto" : " w-full max-h-48 object-cover rounded-2xl";
                    $padding_class = $is_first_post ? "p-1" : "p-1";
            ?>
                    <div class="flex flex-col bg-black <?php echo $padding_class; ?> rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 <?php echo $grid_class; ?>">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', ['class' => $image_class]); ?>
                            <?php endif; ?>
                        </a>
                        <div class="flex flex-col justify-end mt-4">
                            <h2 class="text-white text-xl font-bold hover:text-red-500 transition-colors mb-2">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="text-sm text-transparent bg-gradient-to-r from-red-700 via-red-600 to-red-500 bg-clip-text">
                                By <?php echo get_the_author(); ?> - <?php echo get_the_date('j F Y'); ?>
                            </p>
                        </div>
                    </div>
            <?php
                    $index++;
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-gray-500">No blog posts available.</p>';
            endif;
            ?>
        </div>

    </div>
</section>

<section class="mt-5">
    <div class="container mx-auto">
        <!-- Header Section -->
        <div class="container flex justify-between items-center p-5">
            <h1 class="text-white text-4xl font-semibold flex items-center">
                <span class="w-2 h-9 bg-red-500 rounded-full mr-3"></span> Blog Terbaru
            </h1>
            <!-- Tombol More News untuk layar besar -->
            <a href="#" class="bg-transparent border border-white text-white text-sm px-5 py-3 rounded-full mr-16 hover:bg-pink-700 transition duration-200 text-center hidden md:inline-block">
                More Blog<i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
            </a>
        </div>

        <!-- Blog Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 items-center mx-auto px-6">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $post_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'paged'          => $paged
            ));

            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) : $post_query->the_post();
            ?>
                    <div class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-64 object-cover rounded-lg']); ?>
                            <?php endif; ?>
                        </a>
                        <div class="flex-grow p-2">
                            <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wide mb-1">FYP Media Blog</h3>
                            <h2 class="text-white text-lg font-bold hover:text-red-500 transition-colors mb-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
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

        <div class="hidden sm:hidden md:flex justify-center mt-7 space-x-2">
            <?php
            echo paginate_links(array(
                'base'      => str_replace(99999, '%#%', esc_url(get_pagenum_link(99999))),
                'format'    => '?paged=%#%',
                'current'   => max(1, get_query_var('paged', 1)),
                'total'     => $post_query->max_num_pages,
                'prev_text' => '<span class="px-3 py-2 border border-white text-white rounded-lg hover:bg-gray-800 transition">&laquo; Prev</span>',
                'next_text' => '<span class="px-3 py-2 border border-white text-white rounded-lg hover:bg-gray-800 transition">Next &raquo;</span>',
                'before_page_number' => '<span class="px-3 py-2 border border-white text-white rounded-lg hover:bg-gray-800 transition">',
                'after_page_number'  => '</span>'
            ));
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
<div class="w-full h-px bg-gray-500 mt-16 mx-auto"></div>

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