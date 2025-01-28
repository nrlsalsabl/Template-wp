<?php
include 'layouts/header.php'; // Menyertakan header.php
?>


    <!-- Hero Section -->
<section>
    <div class="container mx-auto px-6 lg:px-20 mt-10 sm:mt-20 md:mt-24 lg:mt-30">
        <!-- Teks Hero -->
        <div class="text-left sm:text-left md:text-left lg:text-left">
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-semibold text-white">
                Solusi Inovatif Untuk <span class="text-3xl sm:text-5xl lg:text-6xl font-semibold text-white text-transparent bg-gradient-to-r from-[#6A00F4] to-[#D700FF] bg-clip-text">Pertumbuhan Brand</span>
            </h1>
            <div class="relative lg:absolute lg:right-0 lg:w-80 order-1 lg:order-3 mt-10">
                <p class="text-white text-left">
                    Hubungkan bakatmu dengan dunia dan dapatkan berita terkini. Semua ada di FYP Media.
                </p>
            </div>
            <div class="mt-14 space-y-4 lg:space-x-4 lg:space-y-0 flex flex-col lg:flex-row justify-center lg:justify-start">
                <a href="#"
                    class="px-10 py-3 bg-[#D700FF] text-white rounded-full transition-colors duration-300 flex justify-center items-center">
                    Get in Touch <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                </a>
                <a href="#"
                    class="px-10 py-3 bg-transparent border text-slate-50 hover:text-white rounded-full hover:bg-pink-900 transition-colors duration-300 flex justify-center items-center">
                    Read News here <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="mt-20">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/meeting.jpeg" alt="Meeting image" class="w-5/6 h-96 hidden sm:block contrast-50 brightness-90 object-cover rounded-[20px] mx-auto">
    </div>
</section>

    <section class="latest-news py-8 text-white">
        <h2 class="text-2xl font-bold mb-4 text-white">Latest News</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Query for 'News' custom post type
            $news_query = new WP_Query(array(
                'post_type' => 'news',
                'posts_per_page' => 3,
            ));
            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>
                <article>
                <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto mb-4']); ?>
                        </a>
                    <?php endif; ?>
                    <h3 class="text-xl font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div><?php the_excerpt(); ?></div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No news available.</p>';
            endif;
            ?>
        </div>
    </section>

    <section class="latest-blogs py-8 text-white">
        <h2 class="text-2xl font-bold mb-4">Latest Blogs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Query for 'post' (default blog posts)
            $blog_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            ));
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
            ?>
                <article>
                    <h3 class="text-xl font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div><?php the_excerpt(); ?></div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No blog posts available.</p>';
            endif;
            ?>
        </div>
    </section>


    <section class="latest-blogs py-8 text-white">
        <h2 class="text-2xl font-bold mb-4">Our Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // Query for 'post' (default blog posts)
            $team_query = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => 3,
            ));
            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
            ?>
                <article>
                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto mb-4']); ?>
                                    </a>
                                <?php endif; ?>
                    <h3 class="text-xl font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div><?php the_excerpt(); ?></div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No Team posts available.</p>';
            endif;
            ?>
        </div>
    </section>
</div>

<?php
include 'layouts/footer.php'; // Menyertakan footer.php
?>
