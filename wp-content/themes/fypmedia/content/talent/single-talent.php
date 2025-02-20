<?php
get_template_part('layouts/header');
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div class="mx-auto p-6 sm:px-10 lg:px-10">
    <div class="text-white">
        <h1 class="text-4xl sm:text-5xl mt-3">Mengenal Lebih dekat dengan Talent</h1>
        <div class="flex items-center my-4 mt-10">
            <div class="flex-1 border-t border-gray-300"></div>
            <span class="mx-4 font-semibold">Informasi Talent</span>
            <div class="flex-1 border-t border-gray-300"></div>
        </div>
    </div>

    <div class="w-full flex flex-col md:flex-row mt-10">
        <div class="w-full md:w-1/2 h-full md:mb-0">
            <?php if (has_post_thumbnail()) : ?>
               <div class="mb-6">
    <?php the_post_thumbnail('large', array('class' => 'w-full h-56 sm:h-64 md:h-auto lg:max-h-8/12 object-cover rounded-lg')); ?>
</div>
            <?php endif; ?>
        </div>

        <div class="w-full md:w-1/2">
            <article class="pl-0 md:pl-10">
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-white "><?php the_title(); ?></h1>
                <p class="text-white mt-4 sm:mt-4 md:mt-6 "><?php the_field('deskripsi'); ?></p>

                <div class="mt-6">
                    <h2 class="text-2xl sm:text-3xl text-white">Biodata</h2>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between text-white mt-4">
                        <p>domisili :</p>
                        <p class="text-2xl font-semibold">
                            <?php
                            $domisili = get_field('domisili');
                            echo $domisili ? esc_html($domisili) : '.';
                            ?>
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between text-white mt-4">
                        <p>jenis konten :</p>
                        <p class="text-2xl font-semibold">
                            <?php
                            $jenis_konten = get_field('jeniskonten');
                            echo $jenis_konten ? esc_html($jenis_konten) : '.';
                            ?>
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between text-white mt-4">
                        <p>hobi :</p>
                        <p class="text-2xl font-semibold">
                            <?php
                            $hobi = get_field('hobi');
                            echo $hobi ? esc_html($hobi) : '.';
                            ?>
                        </p>
                    </div>

                    <div class="mt-8">
                        <h2 class="text-white text-3xl">Social Media</h2>
                        <div class="flex items-center gap-5 mt-4">
                            <?php
                            $social_links = [
                                'instagram' => get_field('instagram_link'),
                                'tiktok' => get_field('tiktok_link'),
                                'youtube' => get_field('youtube_link')
                            ];

                            $social_icons = [
                                'instagram' => 'fab fa-instagram',
                                'tiktok' => 'fab fa-tiktok',
                                'youtube' => 'fab fa-youtube'
                            ];
                            ?>

                            <div class="social-links flex items-center gap-5">
                                <?php
                                $has_social_links = false;

                                foreach ($social_links as $url) {
                                    if ($url) {
                                        $has_social_links = true;
                                        break;
                                    }
                                }
                                if ($has_social_links):
                                    foreach ($social_links as $platform => $url):
                                        if ($url): ?>
                                            <div class="rounded-full border border-white p-2 mt-3 flex items-center">
                                                <a href="<?php echo esc_url($url); ?>" target="_blank">
                                                    <i class="<?php echo $social_icons[$platform]; ?> text-white"></i>
                                                </a>
                                            </div>
                                <?php endif;
                                    endforeach;
                                else:
                                    echo '<p class="text-white">.</p>';
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <div class="flex flex-col md:flex-row items-start justify-between text-white border-t-2 border-white border-opacity-50 mt-10 py-10">
        <h3 class="text-3xl md:text-5xl font-semibold text-left md:text-left">
            Mau Diskusi Project Baru?
        </h3>
        <a href="#" class="px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 text-lg font-medium transition-transform transform hover:scale-105 mt-4">
            Contact Us
        </a>
    </div>
</div>

<?php
get_template_part('layouts/footer');
?>