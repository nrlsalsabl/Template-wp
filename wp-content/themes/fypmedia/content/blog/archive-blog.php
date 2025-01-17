<?php
get_template_part('layouts/header'); // Include header
?>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Blog</h1>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="mb-6">
                <h2 class="text-2xl font-bold">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>
        <div class="pagination">
            <?php echo paginate_links(); ?>
        </div>
    <?php else : ?>
        <p>No blog posts found.</p>
    <?php endif; ?>
</div>

<?php
get_template_part('layouts/footer'); // Include footer
?>
