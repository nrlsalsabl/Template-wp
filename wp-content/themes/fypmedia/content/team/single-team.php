<?php
include 'layouts/header.php'; // Menyertakan header.php
?>
<div class="container mx-auto p-4">
    <!-- Judul Halaman -->
    <h1 class="text-3xl font-bold text-center mb-8 text-white">Detail Team</h1>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <article class="rounded-lg shadow-md p-4 bg-gray-800 text-white">
                <!-- Judul Postingan -->
                <h2 class="text-2xl font-bold mb-4"><?php the_title(); ?></h2>

                <!-- Thumbnail -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-4">
                        <?php the_post_thumbnail('large', ['class' => 'rounded-lg w-full h-auto']); ?>
                    </div>
                <?php endif; ?>

                <!-- Konten Lengkap -->
                <div class="content text-gray-300">
                    <?php the_content(); ?>
                </div>

                <!-- Informasi Tambahan -->
                <div class="mt-4 text-sm text-gray-500">
                    <p>Published on: <?php echo get_the_date(); ?></p>
                    <p>Author: <?php the_author(); ?></p>
                </div>
            </article>
    <?php
        endwhile;
    else :
        echo '<p class="text-center">No content available.</p>';
    endif;
    ?>
</div>
<?php
include 'layouts/footer.php'; // Menyertakan footer.php
?>