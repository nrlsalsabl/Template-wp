<?php
include 'layouts/header.php'; // Menyertakan header.php
?>

<div class="container mx-auto p-4">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <article class="mb-6">
                <h2 class="text-2xl font-bold mb-2">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div><?php the_excerpt(); ?></div>
            </article>
            <?php
        endwhile;
    else :
        echo '<p>No content available.</p>';
    endif;
    ?>
</div>

<?php
include 'layouts/footer.php'; // Menyertakan footer.php
?>
