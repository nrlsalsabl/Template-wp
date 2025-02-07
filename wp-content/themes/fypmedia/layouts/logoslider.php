<div class="infinite-slider-container p-10 flex items-center gap-36 justify-center bg-slate-700 overflow-hidden">
    <div class="infinite-slider flex">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/3.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/4.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/5.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/6.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/9.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/9.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/11.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/13.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/14.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/17.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/18.png" alt="logo" class="w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/20.png" alt="logo" class="w-32 h-auto" />
    </div>
</div>

<style>
    .infinite-slider-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .infinite-slider {
        display: flex;
        white-space: nowrap;
        transition: transform 0.2s ease-in-out;
    }

    .infinite-slider img {
        margin-right: 30px;
        /* Space between the images */
        width: 128px;
        /* Adjust to your desired size */
        height: auto;
    }
</style>

<script>
    window.addEventListener("load", function() {
        const slider = document.querySelector(".infinite-slider");
        const sliderImages = Array.from(slider.children);
        const imageWidth = sliderImages[0].offsetWidth + 30; // image width + margin-right
        let scrollPosition = 0;

        // Duplikat gambar untuk efek seamless
        sliderImages.forEach(img => {
            const clone = img.cloneNode(true);
            slider.appendChild(clone);
        });

        // Fungsi animasi infinite scroll
        function animateSlider() {
            scrollPosition += 0.5; // Mengurangi kecepatan scroll
            if (scrollPosition >= imageWidth * sliderImages.length) {
                scrollPosition = 0; // Reset posisi untuk teruskan efek
            }

            // Terapkan transformasi untuk smooth scrolling
            slider.style.transform = `translateX(-${scrollPosition}px)`;

            // Minta frame berikutnya untuk animasi terus berjalan
            requestAnimationFrame(animateSlider);
        }

        // Mulai animasi
        animateSlider();
    });
</script>