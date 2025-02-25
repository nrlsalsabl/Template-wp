<?php
get_template_part('layouts/header');
?>

<div class="container mx-auto p-4">

    <!-- DATA MASIH HARDCODE -->
    <!-- NEWS SECTION PERTAMA -->

    <section>
        <div class="hidden md:flex flex-col md:flex-row items-center justify-between mt-3 mx-4 md:mx-28 space-y-4 md:space-y-0">
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

    <div class="hidden w-full h-px bg-gray-500 mt-5 mx-auto md:block"></div>

    <h1 class="text-5xl font-semibold mb-6 text-white px-4 mt-10 border-y-2 border-l-4 border-red-600">Fresh News</h1>


    <?php
    $args = array(
        'post_type'      => 'news',
        'posts_per_page' => 4,
        'orderby'        => 'rand',
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $posts = $query->posts;
        $featured = array_shift($posts);
        $featured_category = get_the_category($featured->ID);
        $featured_cat_name = ! empty($featured_category) ? $featured_category[0]->name : '';
        $featured_date = get_the_date('d/m/Y, H:i T', $featured->ID);
    ?>

        <div class="flex flex-col lg:flex-row justify-center px-4 gap-8">
            <div class="w-full lg:w-4/5">
                <div class="relative w-full">
                    <a href="<?php echo esc_url(get_permalink($featured->ID)); ?>">
                        <?php if (has_post_thumbnail($featured->ID)) : ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url($featured->ID, 'full')); ?>"
                                alt="<?php echo esc_attr(get_the_title($featured->ID)); ?>"
                                class="w-full max-h-96 object-cover rounded-lg" />
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/keluarga.png"
                                alt="gambar_dummy"
                                class="w-full max-h-96 object-cover rounded-lg" />
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                            <h2 class="text-lg sm:text-lg md:text-3xl font-semibold leading-tight">
                                <?php echo esc_html(get_the_title($featured->ID)); ?>
                            </h2>
                            <p class="text-sm mt-2">
                                <?php echo esc_html($featured_cat_name); ?> - <?php echo esc_html($featured_date); ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <?php if (! empty($posts)) : ?>
                <div class="w-full lg:w-1/2">
                    <div class="flex flex-col gap-6">
                        <?php
                        foreach ($posts as $post) :
                            setup_postdata($post);
                        ?>
                            <div class="flex items-center gap-4">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <?php if (has_post_thumbnail($post->ID)) : ?>
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'medium')); ?>"
                                            alt="<?php echo esc_attr(get_the_title($post->ID)); ?>"
                                            class="w-40 h-28 object-cover rounded-md" />
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/pitching.png"
                                            alt="gambar_dummy"
                                            class="w-40 h-28 object-cover rounded-md" />
                                    <?php endif; ?>
                                </a>
                                <div class="flex flex-col flex-1">
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                        <h2 class="text-white text-sm sm:text-sm md:text-lg font-semibold leading-snug">
                                            <?php echo esc_html(get_the_title($post->ID)); ?>
                                        </h2>
                                    </a>
                                    <div class="flex items-center text-red-500 mt-1 text-sm">
                                        <span><?php echo esc_html(get_the_author()); ?></span>
                                        <span class="mx-1">&bull;</span>
                                        <span><?php echo esc_html(get_the_date('d/m/Y', $post->ID)); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php
    }
    wp_reset_postdata();
    ?>


    <div class="text-white text-4xl sm:text-4xl md:text-5xl mt-20 border-y-2 border-l-4 border-red-600 border-opacity-20 px-4 pl-3">
        Berita Trending
    </div>


    <div class="w-full h-auto mx-auto px-4 flex flex-col lg:flex-row items-start gap-4 mt-10">
        <div class="w-full lg:w-2/3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/keluarga.png"
                alt="gambar_dummy"
                class="w-full h-auto object-cover rounded-lg" />

            <div class="text-white mt-4">
                <h2 class="text-2xl font-semibold">
                    Desak Kusuma Dewi: Perjalanan Menjadi Content Creator dan Reviewer
                </h2>
                <div class="flex items-center text-red-500 mt-2 text-sm">
                    <span>By Dhimas</span>
                    <span class="mx-1">•</span>
                    <span>17 Desember 2002</span>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2">
            <div class="grid grid-cols-2 gap-3">
                <?php
                $articles = [
                    [
                        "img" => "keluarga.png",
                        "title" => "Wildlife Worldwide Contaminated by Flame Retardants: New Map",
                        "author" => "By Dhimas",
                        "date" => "17 Desember 2002"
                    ],
                    [
                        "img" => "keluarga.png",
                        "title" => "Wildlife Worldwide Contaminated by Flame Retardants: New Map",
                        "author" => "By Dhimas",
                        "date" => "17 Desember 2002"
                    ],
                    [
                        "img" => "keluarga.png",
                        "title" => "Wildlife Worldwide Contaminated by Flame Retardants: New Map",
                        "author" => "By Dhimas",
                        "date" => "17 Desember 2002"
                    ],
                    [
                        "img" => "keluarga.png",
                        "title" => "Wildlife Worldwide Contaminated by Flame Retardants: New Map",
                        "author" => "By Dhimas",
                        "date" => "17 Desember 2002"
                    ]
                ];

                foreach ($articles as $article) :
                ?>
                    <div class="flex flex-col">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/<?php echo $article['img']; ?>"
                            alt="gambar_dummy"
                            class="w-full h-auto rounded-md" />

                        <div class="mt-3 text-left">
                            <h2 class="text-white text-lg font-semibold">
                                <?php echo $article['title']; ?>
                            </h2>
                            <div class="flex items-center text-red-500 mt-2 text-sm">
                                <span><?php echo $article['author']; ?></span>
                                <span class="mx-1">•</span>
                                <span><?php echo $article['date']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'news',
        'posts_per_page' => 6,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $post_query = new WP_Query($args);
    ?>

    <div class="px-4 mt-20">
        <div class="flex flex-col md:flex-row items-center justify-between mb-4">
            <h2 class="text-5xl font-semibold mb-6 text-white px-4 mt-10 border-y-2 border-l-4 border-red-600">Berita Terbaru</h2>
            <a href="#" class="px-4 py-2 border border-white/60 text-white rounded-full hidden md:block hover:bg-gray-800 transition">
                More News
            </a>
        </div>

        <?php if ($post_query->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php while ($post_query->have_posts()) : $post_query->the_post(); ?>
                    <div class="flex flex-col bg-transparent rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                the_post_thumbnail('medium', [
                                    'class' => 'w-full h-48 object-cover sm:h-48 md:h-60'
                                ]);
                                ?>
                            </a>
                        <?php endif; ?>
                        <div class="p-0 sm:p-0 md:p-4 mt-4 md:mt-0">
                            <h3 class="text-xs font-semibold text-blue-300 uppercase tracking-wide mb-1">FYP Media News</h3>
                            <h2 class="text-xl text-white font-bold">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <p class="text-red-400 mt-2">
                                By <span class="text-red-400"><?php the_field('author'); ?></span> - <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="mt-7 flex flex-wrap justify-center gap-2">
                <?php
                echo paginate_links([
                    'base'      => str_replace(99999, '%#%', esc_url(get_pagenum_link(99999))),
                    'format'    => '?paged=%#%',
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $post_query->max_num_pages,
                    'prev_text' => '<span class="px-3 py-2 border border-white text-white rounded-lg hover:bg-gray-800 transition">&laquo; Prev</span>',
                    'next_text' => '<span class="px-3 py-2 border border-white text-white rounded-lg hover:bg-gray-800 transition">Next &raquo;</span>',
                    'before_page_number' => '<span class="px-3 py-2 border border-white text-white rounded-lg hover:bg-gray-800 transition">',
                    'after_page_number'  => '</span>'
                ]);
                ?>
            </div>

        <?php else : ?>
            <p class="text-gray-400">No news found.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>


</div>

<?php
get_template_part('layouts/footer');
?>