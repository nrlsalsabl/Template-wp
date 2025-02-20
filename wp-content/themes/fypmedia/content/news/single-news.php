<?php get_template_part('layouts/header'); ?>

<div class="container mx-auto p-4 px-7">
    <div class="w-full h-auto">
        <article class="w-full h-auto">
            <p class="text-red-500 text-2xl">FYP Blog</p>
            <h1 class="text-4xl font-bold mb-4 text-white w-10/12"><?php the_title(); ?></h1>

            <div class="w-full h-auto flex flex-col lg:grid lg:grid-cols-3 lg:gap-8">
                <div class="lg:col-span-2">
                    <div class="w-full h-auto">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
                            <p class="text-white text-sm md:text-base">
                                Writer: <span class="text-red-400"><?php the_field('author'); ?></span> - <?php echo get_the_date(); ?>
                            </p>
                            <div class="flex space-x-4 mt-3 md:mt-0">
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

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="mb-8">
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-lg object-cover']); ?>
                            </div>
                        <?php endif; ?>

                        <div class="content text-white leading-8">
                            <?php the_content(); ?>
                            <div class="mt-6">
                                <h4 class="font-semibold text-lg">FYP Media -</h4>
                                <p class="mt-3"><?php the_field('deskripsi_berita'); ?></p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="text-white">Tags: FYP Media -
                                <?php
                                $tag_field = get_field_object('tags');
                                if ($tag_field && $tag_field['value']) {
                                    $tag_value = $tag_field['value'];
                                    $tag_label = $tag_field['choices'][$tag_value];
                                    echo ' <a href="' . esc_url(home_url('/?s=' . urlencode($tag_value))) . '" class="text-red-400 hover:text-white transition duration-200">' . esc_html($tag_label) . '</a>';
                                } else {
                                    echo ' Tidak ada tag';
                                }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="w-full h-auto">
                    <h2 class="text-white text-2xl mb-4">Berita Terbaru</h2>

                    <?php
                    $args = array(
                        'post_type'      => 'news',
                        'posts_per_page' => 4,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) : ?>
                        <div class="flex flex-col space-y-4">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="flex gap-4 p-1 rounded-xl shadow-lg">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="w-1/3">
                                            <?php
                                            the_post_thumbnail('medium', [
                                                'class' => 'w-full max-h-24 object-cover rounded-xl'
                                            ]);
                                            ?>
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
                        <p class="text-gray-400">Berita Tidak Ditemukan</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

            </div>
        </article>
    </div>

    <div class="hidden w-full h-px bg-gray-500 mt-5 mx-auto md:block"></div>
    <div class="">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-6xl font-semibold text-white mt-5">Berita Terkait</h2>
            <button class="border border-white/60 px-4 py-2 text-white rounded-full transition hover:bg-white hover:text-black">
                More News
            </button>
        </div>

        <?php
        $current_tag_field = get_field_object('tags');
        if ($current_tag_field && $current_tag_field['value']) {
            $current_tag = $current_tag_field['value'];
            $args_related = array(
                'post_type'      => 'news',
                'posts_per_page' => 3, 
                'post__not_in'   => array(get_the_ID()),
                'meta_query'     => array(
                    array(
                        'key'     => 'tags',
                        'value'   => $current_tag,
                        'compare' => '='
                    )
                )
            );

            $related_query = new WP_Query($args_related);
            if ($related_query->have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <div class=" p-4 rounded-lg shadow-lg">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="block mb-3">
                                    <?php the_post_thumbnail('medium', ['class' => 'w-full object-cover max-h-60 rounded-lg']); ?>
                                </a>
                            <?php endif; ?>
                            <div class="flex items-center space-x-2">
                                <h3 class="text-blue-400">FYP Media</h3>
                                <h3 class="text-blue-400">
                                    <?php
                                    $tag_field = get_field_object('tags');
                                    if ($tag_field && $tag_field['value']) {
                                        echo esc_html($tag_field['choices'][$tag_field['value']]);
                                    } else {
                                        echo 'No Tag';
                                    }
                                    ?>
                                </h3>
                            </div>
                            <h3 class="text-lg font-semibold pt-3">
                                <a href="<?php the_permalink(); ?>" class="text-white hover:text-red-400 transition">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="text-gray-400 text-sm mt-2"><?php echo get_the_date(); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p class="text-gray-400 mt-8">Tidak ada artikel terkait.</p>
        <?php endif;
            wp_reset_postdata();
        } else {
            echo '<p class="text-gray-400 mt-8">Tidak ada artikel terkait.</p>';
        }
        ?>
    </div>
</div>

<?php get_template_part('layouts/footer'); ?>