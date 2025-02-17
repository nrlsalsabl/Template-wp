<?php
get_template_part('layouts/header'); // Menyertakan header.php
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


<section>
    <div class="mx-auto p-4 px-4 lg:px-14">
        <div class="text-white">
            <!-- Judul Halaman -->
            <div class="mx-auto text-white lg:pr-40">
                <h1 class="text-4xl lg:text-5xl mt-10 text-left" style="line-height: 1.25;">Mengenal Lebih Dekat Dengan Anggota Tim FYP</h1>
            </div>
            <div class="flex items-center my-4 lg:mt-16">
                <div class="flex-1 border-t-2 rounded-full border-gray-400"></div>
                <span class="mx-4 text-lg lg:text-xl font-semibold">Informasi Tim FYP</span>
                <div class="flex-1 border-t-2 rounded-full border-gray-400"></div>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="w-full flex flex-col md:flex-row mt-10">
            <!-- Kolom Gambar -->
            <div class="w-full md:w-1/2 h-full mb-6 md:mb-0">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-6">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-lg']); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Kolom Informasi -->
            <div class="w-full md:w-1/2">
                <article class="pl-0 md:pl-10">
                    <!-- Judul Postingan -->
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-white"><?php the_title(); ?></h1>

                    <!-- Deskripsi Talent -->
                    <p class="text-white mb-6" style="word-wrap: break-word;">
                        <?php
                        $deskripsi = get_field('deskripsi');
                        echo $deskripsi ? esc_html($deskripsi) : 'Deskripsi belum tersedia.';
                        ?>
                    </p>

                    <!-- Biodata Talent -->
                    <div class="mt-6">
                        <h2 class="text-2xl md:text-3xl text-white">Biodata</h2>
                        <div class="flex flex-col md:flex-row justify-between text-white mt-4">
                            <p>Domisili :</p>
                            <p class="text-2xl font-semibold">
                                <?php
                                $domisili = get_field('domisili');
                                echo $domisili ? esc_html($domisili) : '.';
                                ?>
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row justify-between text-white mt-4">
                            <p>Jenis Konten :</p>
                            <p class="text-2xl font-semibold">
                                <?php
                                $jenis_konten = get_field('jeniskonten');
                                echo $jenis_konten ? esc_html($jenis_konten) : '.';
                                ?>
                            </p>
                        </div>
                        <div class="flex flex-col md:flex-row justify-between text-white mt-4">
                            <p>Hobi :</p>
                            <p class="text-2xl font-semibold">
                                <?php
                                $hobi = get_field('hobi');
                                echo $hobi ? esc_html($hobi) : '.';
                                ?>
                            </p>
                        </div>
                    </div>

                    <!-- Media Sosial Talent -->
                    <div class="mt-8">
                        <h2 class="text-white text-2xl md:text-3xl">Social Media</h2>
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
                                            <div class="w-10 h-10 hover:bg-gray-600 rounded-full border border-white p-2 mt-3 flex items-center justify-center">
                                                <a href="<?php echo esc_url($url); ?>" target="_blank">
                                                    <i class="<?php echo $social_icons[$platform]; ?> text-white text-2xl"></i>
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
                </article>
            </div>
        </div>
</section>

<!-- Contact Section -->
<section>
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-between text-left py-10 mt-2 px-6 lg:px-0 gap-4">
            <h1 class="text-white font-semibold text-5xl md:text-4xl lg:text-5xl w-full lg:w-auto text-left lg:text-left ml-0 lg:ml-20 max-w-sm lg:max-w-xl">
                Mau Diskusi Project Baru?
            </h1>
            <a href="<?php echo get_site_url() . '/about-us'; ?>"
                class="bg-custom-purple mt-5 text-white text-sm md:text-base px-5 py-3 rounded-full transition-transform duration-300 transform hover:scale-105 lg:mr-16 w-full lg:w-auto text-center">
                Contact Us <i class="fi fi-rr-arrow-up-right text-white text-sm ml-2"></i>
            </a>
        </div>
    </div>
</section>

<?php
get_template_part('layouts/footer'); // Menyertakan footer.php
?>