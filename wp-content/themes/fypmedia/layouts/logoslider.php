<div class="infinite-slider-container p-6 md:p-10 flex items-center md:gap-36 gap-10 justify-center bg-slate-700 overflow-hidden border border-red-500 w-full">
    <div class="infinite-slider flex whitespace-nowrap">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/3.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/4.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/5.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/6.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/9.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/9.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/11.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/13.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/14.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/17.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/18.png" alt="logo" class="w-20 md:w-32 h-auto" />
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/20.png" alt="logo" class="w-20 md:w-32 h-auto" />
    </div>
</div>

<style>
    .infinite-slider-container {
        position: relative;
        width: 100%;
        max-width: 100vw;
        overflow: hidden;
    }

    .infinite-slider {
        display: flex;
        white-space: nowrap;
        transition: transform 0.2s ease-in-out;
    }

    .infinite-slider img {
        margin-right: 20px;
        width: 80px;
        /* Ukuran default lebih kecil */
        height: auto;
    }

    @media (min-width: 768px) {
        .infinite-slider img {
            width: 128px;
        }
    }
</style>

<script>
    window.addEventListener("load", function() {
        const slider = document.querySelector(".infinite-slider");
        const sliderImages = Array.from(slider.children);
        let scrollPosition = 0;
        const imageWidth = sliderImages[0].offsetWidth + 20; // Lebar gambar + margin-right
        sliderImages.forEach(img => {
            const clone = img.cloneNode(true);
            slider.appendChild(clone);
        });

        function animateSlider() {
            scrollPosition += 0.5;
            if (scrollPosition >= imageWidth * sliderImages.length / 2) {
                scrollPosition = 0;
            }

            slider.style.transform = `translateX(-${scrollPosition}px)`;
            requestAnimationFrame(animateSlider);
        }

        animateSlider();
    });
</script>