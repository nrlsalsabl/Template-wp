<?php
include 'layouts/header.php'; // Menyertakan header.php
?>

<div class="container mx-auto p-4">
    <section class="home-hero text-center py-10">
        <h1 class="text-4xl font-bold">Welcome to Our Website</h1>
        <p class="text-lg mt-4">Explore our latest news, blogs, and more!</p>
    </section>

    <section class="latest-news py-8">
        <h2 class="text-2xl font-bold mb-4">Latest News</h2>
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

    <section class="latest-blogs py-8">
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
</div>

<?php
include 'layouts/footer.php'; // Menyertakan footer.php
?>
