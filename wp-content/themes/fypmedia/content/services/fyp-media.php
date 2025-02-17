<!-- <h1>Tampilan halaman FYP MEDIA</h1> -->

<?php
/*
Template Name: fyp-media
*/
?>

<section>
    <div class="container mx-auto px-6 lg:px-10 mt-10 sm:mt-20 md:mt-24 lg:mt-30">
        <!-- Teks Hero -->
        <div class="text-left lg:text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-white">
                Selamat Datang di
                <span class="text-transparent bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text">
                    FYPMedia.id
                </span>
            </h1>
        </div>
        <div class="mt-4">
            <p class="text-white text-left lg:text-center lg:px-64 text-md sm:text-ms lg:text-xl mt-10">
                Kami adalah Talent Agency dan sumber informasi terkini seputar talent, manajemen talent, dan berita terbaru di berbagai industri.
            </p>
        </div>
    </div>
    <div class="container mx-auto px-10 mt-20">
        <div class="grid grid-cols-3 gap-2 h-auto bg-inherit">
            <div class="col-start-1 row-start-1 place-self-end">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/foto2.png" alt="Gambar 1" class="w-full h-40 rounded-lg shadow-lg">
            </div>
            <div class="col-start-2 row-start-2 row-span-1 place-self-start -mt-32">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/foto3.png" alt="Gambar 2" class="w-full h-40 rounded-lg shadow-lg">
            </div>
            <div class="col-start-2 row-start-1 place-self-center  hidden sm:block">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/foto4.png" alt="Gambar 3" class="w-full h-40 rounded-lg shadow-lg">
            </div>
            <div class="col-start-2 row-start-2 place-self-end -mt-32">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/foto2.png" alt="Gambar 4" class="w-full h-40 rounded-lg shadow-lg">
            </div>
            <div class="col-start-3 row-start-1 place-self-start">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/foto2.png" alt="Gambar 5" class="w-full h-40 rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- garis -->
<div class="flex items-center justify-center my-4 mt-20">
    <div class="flex-grow border-t-2 border-gray-500"></div>
    <span class="mx-4 text-lg font-semibold text-transparent bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 bg-clip-text">
        Apa itu FYP Media?
    </span>
    <div class="flex-grow border-t-2 border-gray-500"></div>
</div>
<!-- end -->

<section>
    <div class="container mx-auto px-6 lg:px-12 py-10 grid grid-cols-1 lg:grid-cols-2 items-center">
        <!-- Bagian Gambar -->
        <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logofyp.png"
                alt="Peta Lokasi"
                class="w-1/2 max-w-sm h-auto object-cover rounded-lg mx-auto">
        </div>

        <!-- Bagian Teks -->
        <div class="flex flex-col items-start py-4 lg:py-0 lg:px-4">
            <p class="text-white text-sm lg:text-lg font-semibold text-left">
                FYPMedia.id adalah Talent Agency & sumber informasi terkini seputar talent, manajemen talent, dan berita terbaru di berbagai industri.
            </p>
            <p class="mt-4 text-white text-sm lg:text-xl font-semibold text-left">
                Didirikan dengan visi untuk menghubungkan para talenta berbakat dengan peluang yang tepat, serta menyediakan berita terupdate untuk menjaga Anda tetap terinformasi.
            </p>
        </div>
    </div>
</section>

<!-- Garis pemisah yang lebih tipis dan tidak full -->
<div class="w-11/12 h-px bg-gray-500 lg:mt-20 mx-auto"></div>


<section>
    <div class="container mx-auto px-6 lg:px-12 py-10 flex flex-col lg:flex-row items-left">
        <!-- Bagian Teks -->
        <div class="sm:text-left md:text-left lg:text-left lg:w-3/4 lg:ml-12 border-r border-r-white">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/peta.png"
                alt="Peta Lokasi"
                class="w-full h-auto object-cover rounded-lg">
        </div>


        <div class="lg:w-1/3 flex flex-col items-left lg:items-start lg:px-10 lg:py-16 mt-6 lg:mt-0">
            <h3 class="text-white text-2xl md:text-2xl lg:text-3xl font-bold text-left">
                Lokasi
            </h3>
            <p class="mt-5 text-white text-xl md:text-xl lg:text-xl lg:py-3 font-semibold text-left">
                FYP Media berada di 33 Provinsi di Seluruh Indonesia dan berpusat di Tangerang
            </p>

        </div>
    </div>
</section>

<!-- Garis pemisah yang lebih tipis dan tidak full -->
<div class="w-11/12 h-px bg-gray-500 lg:mt-20 mx-auto"></div>

<section class="mt-10">
    <div class="container mx-auto px-6 lg:px-12 lg:py-10 flex flex-col lg:flex-row items-start">
        <!-- Bagian Teks (di sebelah kiri pada layar besar) -->
        <div class="lg:w-1/3 flex flex-col items-start py-8 order-1 lg:order-1">
            <h3 class="text-white text-2xl md:text-2xl lg:text-3xl font-bold">
                Social Media
            </h3>
            <p class="mt-4 text-white text-xl md:text-xl lg:text-xl py-2 font-semibold">
                FYP Media mempunyai platform di Instagram untuk memberikan beragam informasi terbaru.
            </p>
            <p class="text-white">@fypmedia.id</p>
        </div>

        <!-- Bagian Gambar (di sebelah kanan pada layar besar) -->
        <div class="lg:w-3/4 lg:ml-8 border-l border-white order-2 lg:order-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/igfyp.png"
                alt="Peta Lokasi"
                class="w-auto h-auto max-w-full max-h-full object-scale-down">
        </div>
    </div>
</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black mt-4 mx-auto"></div>

<section>
    <div class="container max-w-4xl mx-auto px-5 lg:px-5 mt-10 sm:mt-20 md:mt-24 lg:mt-30">
        <!-- Teks Hero -->
        <div class="text-left lg:text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-5xl font-semibold text-white" style="line-height: 1.25;"    >
                Cek Berbagai Event & Kolaborasi Yang Ada di FYP Media
            </h1>
        </div>
    </div>

    <div class="container mx-auto px-12 py-10">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Grid Item 1 -->
            <div class="bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/poster.png"
                    alt=""
                    class="rounded-2xl w-96 h-auto mx-auto border border-white">
            </div>
            <!-- Grid Item 2 -->
            <div class="bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/poster2.png"
                    alt=""
                    class="rounded-2xl w-96 h-auto mx-auto border border-white">
            </div>
            <!-- Grid Item 3 (Hidden untuk layar kecil) -->
            <div class="bg-transparent text-white text-center hidden lg:block">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/poster3.png"
                    alt=""
                    class="rounded-2xl w-96 h-auto mx-auto border border-white">
            </div>
        </div>
    </div>

    <div class="text-center py-5">
    <a href="" class="bg-custom-purple text-white px-4 py-2 rounded-full font-semibold transition-transform transform hover:scale-105 shadow-lg">
           Cek Event Lainnya
            <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
        </a>
    </div>
    </div>
</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black mt-4 mx-auto"></div>

<section>
    <div class="container max-w-4xl mx-auto px-4 lg:px-5 mt-10">
        <!-- Teks Hero -->
        <div class="text-left lg:text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-white">
                Legacy FYP Media
            </h1>
        </div>
    </div>

    <div class="container mx-auto px-12 py-10">
        <div class="grid grid-cols-2 lg:grid-cols-2 gap-4">
            <div class="col-span-2 bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/legacy1.png"
                    alt=""
                    class="rounded-2xl mx-auto w-full">
            </div>
            <div class="row-span-2 bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/legacy2.png"
                    alt=""
                    class="rounded-2xl mx-auto object-contain">
            </div>
            <div class="bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/legacy3.png"
                    alt=""
                    class="rounded-2xl mx-auto object-contain">
            </div>
            <div class="bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/legacy3.png"
                    alt=""
                    class="rounded-2xl mx-auto object-contain">
            </div>
            <div class="bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/legacy4.png"
                    alt=""
                    class="rounded-2xl mx-auto object-contain">
            </div>
            <div class="bg-transparent text-white text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/legacy4.png"
                    alt=""
                    class="rounded-2xl mx-auto object-contain">
            </div>
        </div>
    </div>
</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black lg:mt-20 mx-auto"></div>

<section class="lg:mt-20">
    <div class="container max-w-4xl mx-auto px-4 lg:px-5 mt-10">
        <!-- Teks Hero -->
        <div class="text-left lg:text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-white">
                Platform Media Berita FYP Media
            </h1>
        </div>
    </div>

    <div class="relative max-w-screen-lg mx-auto mt-10 px-8 lg:px-20 py-10 flex flex-col lg:flex-row items-center lg:items-start rounded-xl">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-purple-700 to-purple-900 rounded-xl p-px">
            <div class="w-full h-full bg-black rounded-xl"></div>
        </div>

        <!-- Konten Gambar -->
        <div class="relative lg:w-2/5">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/platform.png"
                class="w-80 h-auto rounded-lg mx-auto">
        </div>

        <!-- Konten Teks -->
        <div class="relative lg:w-2/3 flex flex-col lg:ml-12 mt-8 lg:mt-0">
            <h3 class="text-white text-2xl md:text-2xl lg:text-3xl font-bold">
                Jelajah Jawa
            </h3>
            <p class="mt-5 text-white text-xl md:text-xl lg:text-xl py-3 font-semibold">
                Figma ipsum component variant main layer. Star text duplicate rectangle pen frame rectangle line layout clip. Subtract frame list line figma strikethrough library scale edit. Star hand pixel union layout flatten. Scale editor asset hand outline invite pixel rotate image frame. Boolean project arrow effect scrolling list. Rotate project component star font list pencil hand. Font figjam scrolling inspect opacity.
            </p>

            <div class="flex justify-center sm:justify-start mt-8">
                <a href="" class="bg-custom-purple text-white px-6 py-2 rounded-full font-semibold transition-transform duration-300 transform hover:scale-105">
                    Ayo ke Jelajah Jawa <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Garis pemisah -->
<div class="w-full h-0.5 bg-gradient-to-r from-black via-purple-500 to-black mt-10 lg:mt-20 mx-auto"></div>

<section class="relative w-full mt-10 lg:mt-20">
    <!-- Gradien Latar Belakang -->
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent z-10"></div>

    <!-- Gambar dengan Bayangan -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/foto.png"
        alt="Gambar Tampilan"
        class="w-full h-auto shadow-xl relative z-0 object-cover">

    <!-- Konten Tombol di Atas -->
    <div class="relative z-20 flex justify-center mt-8">
        <a href="" class="bg-custom-purple text-white px-8 py-2 rounded-full font-semibold transition-transform duration-300 transform hover:scale-105 shadow-lg">
            Ayo Bergabung Dengan FYP Media
            <i class="fi fi-rr-arrow-up-right text-white text-sm ml-3"></i>
        </a>
    </div>
</section>

<!-- Divider -->
<div class="w-full h-px bg-gray-500 mt-10 mx-auto"></div>

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