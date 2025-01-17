<?php
get_template_part('layouts/header');
?>

<div class="container mx-auto p-4">
    <article>
        <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>
        <p class="text-gray-600 mb-4">Published on <?php echo get_the_date(); ?> by <?php the_author(); ?></p>

        <?php if (has_post_thumbnail()) : ?>
            <div class="mb-6">
                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
            </div>
        <?php endif; ?>

        <div class="content">
            <?php the_content(); ?>
        </div>
    </article>
</div>

<?php
get_template_part('layouts/footer');
?>
