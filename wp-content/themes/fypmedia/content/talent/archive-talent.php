<?php
get_template_part('layouts/header');
?>

<div class="mx-auto p-6 px-20">
    <div class="mt-8">
        <h1 class="text-7xl font-bold mb-6 text-white">Our Talent</h1>
        <p class="text-white text-2xl max-w-5xl">
            Temukan individu-individu berbakat yang membuat agensi kami berkembang. Apakah Anda memiliki pertanyaan tentang bakat kami, harga, portofolio, atau hal lainnya, tim kami siap membantu Anda.
        </p>
    </div>

    <?php
    $args = array(
        'post_type' => 'talent',
        'posts_per_page' => -1, 
    );
    $query = new WP_Query($args);
    $talents = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $talents[] = [
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'instagram' => get_field('instagram_link'),
                'tiktok' => get_field('tiktok_link'),
                'youtube' => get_field('youtube_link')
            ];
        }
    }
    wp_reset_postdata();
    ?>

    <div class="container mx-auto py-12 mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="talentContainer">
            <?php foreach ($talents as $index => $talent) : ?>
                <div class="talent-card bg-[#1a202c] rounded-lg overflow-hidden shadow-lg relative max-h-96" data-index="<?= $index ?>">
                    <a href="<?= esc_url($talent['permalink']) ?>" class="block relative">
                        <div class="relative max-h-96 overflow-hidden">
                            <div class="absolute inset-0 bg-black opacity-10"></div>
                            <img src="<?= esc_url($talent['thumbnail']) ?>" alt="<?= esc_attr($talent['title']) ?>" class="w-full h-96 object-cover object-center">
                        </div>
                        <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/70 to-transparent">
                            <h3 class="text-2xl font-semibold text-white mb-2"><?= esc_html($talent['title']) ?></h3>
                            <div class="flex items-center gap-5">
                                <div class="social-links flex gap-4">
                                    <?php if ($talent['instagram']) : ?>
                                        <a href="<?= esc_url($talent['instagram']) ?>" target="_blank" class="rounded-full border border-white p-2 hover:bg-gray-700">
                                            <i class="fab fa-instagram text-white"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($talent['tiktok']) : ?>
                                        <a href="<?= esc_url($talent['tiktok']) ?>" target="_blank" class="rounded-full border border-white p-2 hover:bg-gray-700">
                                            <i class="fab fa-tiktok text-white"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($talent['youtube']) : ?>
                                        <a href="<?= esc_url($talent['youtube']) ?>" target="_blank" class="rounded-full border border-white p-2 hover:bg-gray-700">
                                            <i class="fab fa-youtube text-white"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination mt-12 flex justify-center items-center space-x-2">
            <ul class="flex space-x-2">
                <li>
                    <button id="prevBtn" class="px-4 py-2 bg-white text-black rounded-lg hover:bg-gray-600">« Prev</button>
                </li>
                <div id="pageNumbers" class="flex space-x-2"></div>
                <li>
                    <button id="nextBtn" class="px-4 py-2 bg-white text-black rounded-lg hover:bg-gray-600">Next »</button>
                </li>
            </ul>
        </div>

    </div>

    <div class="flex flex-col md:flex-row items-center justify-between text-white border-t-2 border-white mt-10 py-10">
        <h3 class="text-4xl md:text-5xl font-semibold text-center md:text-left">
            Mau Diskusi Project Baru?
        </h3>
        <a href="#" class="px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 text-lg font-medium transition-transform transform hover:scale-105">
            Contact Us
        </a>
    </div>

</div>

<?php get_template_part('layouts/footer'); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let itemsPerPage = 9;
        let talents = document.querySelectorAll(".talent-card");
        let totalItems = talents.length;
        let currentPage = 1;
        let totalPages = Math.ceil(totalItems / itemsPerPage);
        let pageNumbersContainer = document.getElementById("pageNumbers");

        function showPage(page) {
            let startIndex = (page - 1) * itemsPerPage;
            let endIndex = startIndex + itemsPerPage;

            talents.forEach((talent, index) => {
                talent.style.display = (index >= startIndex && index < endIndex) ? "block" : "none";
            });

            updatePagination();
        }

        function updatePagination() {
            pageNumbersContainer.innerHTML = ""; 
            for (let i = 1; i <= totalPages; i++) {
                let pageBtn = document.createElement("button");
                pageBtn.innerText = i;
                pageBtn.classList.add("px-4", "py-2", "rounded-lg", "hover:bg-gray-600");
                pageBtn.classList.add(i === currentPage ? "bg-blue-500 text-white" : "bg-gray-700 text-white");
                pageBtn.addEventListener("click", function() {
                    currentPage = i;
                    showPage(currentPage);
                });
                pageNumbersContainer.appendChild(pageBtn);
            }
            document.getElementById("prevBtn").disabled = currentPage === 1;
            document.getElementById("nextBtn").disabled = currentPage === totalPages;
        }
        document.getElementById("prevBtn").addEventListener("click", function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });
        document.getElementById("nextBtn").addEventListener("click", function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });
        showPage(currentPage);
    });
</script>

<style>
    .pagination ul {
        display: flex;
        list-style: none;
        /* Menghilangkan bullet point */
        margin: 0;
        padding: 0;
    }

    .pagination li {
        margin-right: 0.5rem;
        /* Menambahkan jarak antar elemen */
    }

    .pagination li a,
    .pagination button {
        padding: 0.5rem 1rem;
        background-color: #333;
        color: white;
        border-radius: 0.375rem;
        text-decoration: none;
        cursor: pointer;
    }

    .pagination li a:hover,
    .pagination button:hover {
        background-color: #4A5568;
        /* Menambahkan efek hover */
    }

    .pagination button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .pagination button {
        transition: all 0.3s ease-in-out;
    }
</style>