<?php
get_template_part('layouts/header');
?>

<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-white">News Archive</h1>
    <div class="flex justify-center">
        <div class="w-1/2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/keluarga.png"
                alt="gambar_dummy"
                class="w-12/12 h-auto object-cover" />
        </div>
        <div class=" w-1/2">
            <div class="flex flex-col items-center justify-center gap-5">
                <?php if(have_posts()): ?>

                <?php else : ?>
                    <p>No News cant Found</p>
                <?php endif; ?>
                
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/pitching.png"
                    alt="gambar_dummy"
                    class="w-48 h-auto object-cover" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/pitching.png"
                    alt="gambar_dummy"
                    class="w-48 h-auto object-cover" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/pitching.png"
                    alt="gambar_dummy"
                    class="w-48 h-auto object-cover" /> -->
            </div>
        </div>
    </div>
    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-20">
            <?php while (have_posts()) : the_post(); ?>
                <div class="bg-white p-4 shadow-lg rounded">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto mb-4']); ?>
                        </a>
                    <?php endif; ?>
                    <h2 class="text-xl font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>No news found.</p>
    <?php endif; ?>
</div>

<?php
get_template_part('layouts/footer');
?>