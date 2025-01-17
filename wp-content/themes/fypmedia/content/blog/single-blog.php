<?php
get_template_part('layouts/header'); // Include header
?>

<div class="container mx-auto p-4">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
            <div class="mb-4"><?php the_post_thumbnail('large'); ?></div>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php
get_template_part('layouts/footer'); // Include footer
?>
