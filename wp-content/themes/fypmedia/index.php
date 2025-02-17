<?php
include 'layouts/header.php'; // Menyertakan header.php
?>
<div class="container mx-auto p-4">
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold text-center mb-8 text-white">Our Team</h1>

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
                <article class="rounded-lg shadow-md">
                    <!-- Thumbnail -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', ['class' => 'rounded-lg w-full h-auto']); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <!-- Judul dan Isi Singkat -->
                    <h2 class="text-xl font-bold mb-2">
                        <a href="<?php the_permalink(); ?>" class="text-white hover:text-red-700"><?php the_title(); ?></a>
                    </h2>
                    <div class="text-gray-600"><?php the_excerpt(); ?></div>
                </article>
        <?php
            endwhile;
        else :
            echo '<p class="col-span-full text-center">No content available.</p>';
        endif;
        ?>
    </div>
</div>
<?php
include 'layouts/footer.php'; // Menyertakan footer.php
?>