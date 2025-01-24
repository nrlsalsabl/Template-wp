<!--  
* kalau nambah tim, maka akan masuk ke halaman ini, tapi ketika di klik -
* akan tampil ke halaman detail team itu sendiri.
* begitu juga menambah karir maka akan tampil di halaman ini - 
* dan detail nya akan tampil ke halamannya sendiri 
* note : sama kaya home, ada pages team dan career masuk ke functions tapi url masing-masing -->


<?php
/*
Template Name: Career Page
*/
?>

<section class="mb-20">
    <div class="container mx-auto px-6 lg:px-20 mt-10 sm:mt-20 md:mt-24 lg:mt-30">
        <!-- Teks Hero -->
        <div class="text-left sm:text-left md:text-left lg:text-left">
            <h1 class="text-4xl sm:text-4xl lg:text-6xl font-semibold text-slate-100">
                Jadilah Bagian Dari Tim Hebat Kami, Kerja Tapi Santay.
            </h1>
        </div>
        <div class="text-xl sm:text-xl lg:text-2xl font-normal text-slate-100 mt-7">
            <p>Ayo jadi bagian dari tim kami dengan lingkungan kerja yang family friendly</p>
        </div>
        <div class="mt-14 space-y-4 lg:space-x-4 lg:space-y-0 flex flex-col lg:flex-row justify-center lg:justify-start">
            <a href="#"
                class="px-10 py-3 bg-white text-black font-semibold rounded-full hover:bg-pink-900 transition-colors duration-300 flex justify-center items-center">
                Gabung Dengan Tim Kami <i class="fi fi-rr-arrow-up-right text-black font-semibold text-sm ml-3"></i>
            </a>
        </div>
    </div>
</section>

<!-- Career -->
<section class="mt-20">
    <div class="container">
        <h1 class="text-slate-50 text-3xl sm:text-4xl md:text-5xl lg:text-5xl font-semibold text-start ml-5 py-2">
            Our Team <i class="fi fi-rr-arrow-up-right text-white text-2xl sm:text-3xl md:text-3xl lg:text-3xl ml-3"></i>
        </h1>
        <p class="text-slate-400 font-semibold text-start ml-6">Member of our great team</p>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Swiper -->
            <div class="swiper-container swiper-scrollbar relative overflow-hidden" scrollbar-hide="true">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div class="swiper-slide bg-neutral-800 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/agung.png" alt="Card 1" class="w-full h-96 object-cover">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/50 to-transparent p-4">
                            <h1 class="text-4xl font-bold text-white">Agung</h1>
                            <p class="text-sm text-white mt-2">
                                HR Manager
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide bg-neutral-800 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ayre.png" alt="Card 1" class="w-full h-96 object-cover">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/50 to-transparent p-4">
                            <h1 class="text-4xl font-bold text-white">Ayre</h1>
                            <p class="text-sm text-white mt-2">
                                UI/UX Designer
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide bg-neutral-800 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/amira.png" alt="Card 1" class="w-full h-96 object-cover">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/50 to-transparent p-4">
                            <h1 class="text-4xl font-bold text-white">Amira</h1>
                            <p class="text-sm text-white mt-2">
                                HR Manager
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide bg-neutral-800 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/agung.png" alt="Card 1" class="w-full h-96 object-cover">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/50 to-transparent p-4">
                            <h1 class="text-4xl font-bold text-white">Agung</h1>
                            <p class="text-sm text-white mt-2">
                                HR Manager
                            </p>
                        </div>
                    </div>


                    <!-- Tambahkan lebih banyak card -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Garis -->
<section>
    <div class="flex items-center justify-center my-4">
        <div class="flex-grow border-t-2 border-gray-500"></div>
        <span class="mx-4 text-lg font-semibold text-white">
            Pilihan Posisi Yang Mungkin Cocok Untuk Kamu?
        </span>
        <div class="flex-grow border-t-2 border-gray-500"></div>
    </div>
</section>

<section>
    <div class="container mx-auto px-6 lg:px-10 py-10 flex flex-col lg:flex-row items-center justify-between">

        <!-- Bagian Teks -->
        <div class="sm:text-left md:text-left lg:text-left w-full lg:w-3/6 space-y-6 lg:ml-14">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-white leading-tight">
                Punya beberapa skill keren yang ingin kamu kembangkan?
                Kami sangat ingin melihatnya, meskipun sekarang mungkin belum cocok.
            </h1>
            <a href="#"
                class="inline-block px-6 py-3 text-black hover:text-slate-500 bg-white rounded-full shadow-lg font-medium transition duration-300 ease-in-out">
                Join With Us
                <i class="fi fi-rr-arrow-up-right text-black text-sm ml-2"></i>
            </a>
        </div>

        <!-- Bagian Daftar Posisi -->
        <div class="bg-gray-600 text-white p-6 lg:p-10 rounded-lg shadow-lg mt-8 lg:mt-0 w-full lg:w-60">
            <h2 class="text-lg text-center font-semibold mb-4">We’re interested in:</h2>
            <ul class="space-y-2 text-sm text-center lg:text-left">
                <li>Social Media Specialist</li>
                <li>Creative Talents Manager</li>
                <li>Programmer</li>
                <li>UI/UX Designer</li>
                <li>Graphic Design</li>
                <li>Copywriting</li>
                <li>Project Management</li>
            </ul>
        </div>
    </div>
</section>


<!-- Garis pemisah -->
<div class="w-full h-px bg-gray-500 mt-4 mx-auto"></div>

<section>
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-center lg:items-start lg:justify-between text-left lg:text-left py-10 mt-2 px-6 lg:px-0">

            <!-- Bagian Teks -->
            <h1 class="text-slate-50 text-4xl sm:text-5xl lg:text-6xl font-light text-left lg:text-left ml-5">
                Mau Diskusi Project Baru?
            </h1>

            <!-- Tombol -->
            <a href="<?php echo get_site_url() . '/about-us'; ?>"
                class="mt-5 lg:mt-0 bg-gradient-to-r from-custom-blue to-custom-purple text-white text-sm md:text-base px-5 py-2 rounded-full transition duration-200 lg:mr-16 mx-auto lg:mx-0">
                Get in touch <i class="fi fi-rr-arrow-up-right text-black text-sm ml-2"></i>
            </a>
        </div>
    </div>
</section>

