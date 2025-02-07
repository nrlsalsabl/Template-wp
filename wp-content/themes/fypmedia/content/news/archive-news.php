<?php
get_template_part('layouts/header');
?>

<div class="container mx-auto p-4">

    <!-- DATA MASIH HARDCODE -->
    <!-- NEWS SECTION PERTAMA -->
    <h1 class="text-5xl font-semibold mb-6 text-white px-9 mt-10">Fresh News</h1>
    <div class="flex justify-center px-9">
        <div class="w-11/12">
            <div class="relative w-full">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/keluarga.png"
                    alt="gambar_dummy"
                    class="w-full h-auto object-cover" />

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black opacity-40"></div>

                <!-- Text Container -->
                <div class="absolute inset-0 flex flex-col justify-end p-6 text-white">
                    <h2 class="text-3xl font-semibold">
                        Titik Balik G-20 Diplomasi Indonesia di Panggung Dunia
                    </h2>
                    <p class="text-sm mt-2">Hukum & Politik - 04/06/2024, 07:00 WIB</p>
                </div>
            </div>
        </div>

        <div class="w-1/2 pl-5">
            <div class="flex flex-col gap-5">
                <!-- Reusable Card Component -->
                <?php
                $articles = [
                    [
                        "img" => "pitching.png",
                        "title" => "Desak Kusuma Dewi: Perjalanan Menjadi Content Creator dan Reviewer",
                        "author" => "By Dhimas",
                        "date" => "17 Desember 2002"
                    ],
                    [
                        "img" => "pitching.png",
                        "title" => "Desak Kusuma Dewi: Perjalanan Menjadi Content Creator dan Reviewer",
                        "author" => "By Dhimas",
                        "date" => "17 Desember 2002"
                    ],
                    [
                        "img" => "pitching.png",
                        "title" => "Desak Kusuma Dewi: Perjalanan Menjadi Content Creator dan Reviewer",
                        "author" => "By Dhimas",
                        "date" => "17 Desember 2002"
                    ]
                ];

                foreach ($articles as $article) :
                ?>
                    <div class="flex items-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/<?php echo $article['img']; ?>"
                            alt="gambar_dummy"
                            class="w-52 h-auto object-cover" />

                        <div class="flex flex-col justify-center w-5/12 pl-2">
                            <h2 class="text-white text-lg font-semibold"><?php echo $article['title']; ?></h2>
                            <div class="flex items-center text-red-500 mt-2 text-sm">
                                <span><?php echo $article['author']; ?></span>
                                <span class="mx-1">•</span>
                                <span><?php echo $article['date']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="text-white text-5xl border-y-2 border-red-100 border-opacity-20 px-9 mt-10">Berita Trending</div>
    <div class="w-full h-auto mx-auto px-11">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/management/benefit/keluarga.png"
            alt="gambar_dummy"
            class="w-52 h-auto object-cover" />
        <div class="text-white text-left">
            <h2 class="text-2xl">Desak Kusuma Dewi: Perjalanan Menjadi Content Creator dan Reviewer</h2>
            <div class="flex items-center text-red-500 mt-2 text-sm">
                <span><?php echo $article['author']; ?></span>
                <span class="mx-1">•</span>
                <span><?php echo $article['date']; ?></span>
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