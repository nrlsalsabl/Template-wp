<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Header Section -->
    <nav id="navbar" class="bg-black text-white sticky z-50 top-0 border-b-2 border-gray-800 transition-all duration-300 ease-in-out">
        <div class="container mx-auto px-6 flex justify-between items-center py-6">

            <!-- Logo -->
            <div>
                <a href="/index.html">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fypmedia.png" alt="Logo" class="h-6 md:h-8 lg:h-6 w-auto">
                </a>
            </div>

            <!-- Main Menu (Hidden on Mobile) -->
            <div class="hidden md:flex space-x-8">
                <a href="<?php echo home_url('/home'); ?>" class="text-slate-300 text-md font-normal hover:text-red-700 border-b-2 border-transparent transition-all duration-300">
                    Home
                </a>

                <!-- Dropdown Menu for Services -->
                <div class="relative group">
                    <button class="flex items-center text-slate-300 text-md font-normal hover:text-custom-red border-b-2 border-transparent transition-all duration-300">
                        Service
                        <i class="fi fi-rr-angle-down ml-2 text-sm"></i>
                    </button>

                    <div id="dropdown-menu" class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100 z-10">
                        <a href="http://localhost/wordpress/fyp-media/" class="block px-4 py-2 text-gray-700 hover:bg-rose-500 hover:text-white transition-colors duration-200">
                            FYP Media
                        </a>
                        <a href="http://localhost/wordpress/fyp-agency/" class="block px-4 py-2 text-gray-700 hover:bg-rose-500 hover:text-white transition-colors duration-200">
                            FYP Agency
                        </a>
                        <a href="http://localhost/wordpress/fyp-management/" class="block px-4 py-2 text-gray-700 hover:bg-rose-500 hover:text-white transition-colors duration-200">
                            FYP Managemenet
                        </a>
                        <a href="http://localhost/wordpress/fyp-mandala/" class="block px-4 py-2 text-gray-700 hover:bg-rose-500 hover:text-white transition-colors duration-200">
                            FYP Mandala
                        </a>
                    </div>
                </div>


                <!-- Additional Menu Items -->
                <a href="<?php echo home_url('/talent'); ?>" class="text-slate-300 text-md font-normal hover:text-red-700 border-b-2 border-transparent transition-all duration-300">
                    Talent
                </a>
                <a href="<?php echo home_url('/news'); ?>" class="text-slate-300 text-md font-normal hover:text-red-700 border-b-2 border-transparent transition-all duration-300">
                    News
                </a>
                <a href="<?php echo home_url('/blog'); ?>" class="text-slate-300 text-md font-normal hover:text-red-700 border-b-2 border-transparent transition-all duration-300">
                    Blog
                </a>
                <a href="<?php echo home_url('/career'); ?>" class="text-slate-300 text-md font-normal hover:text-red-700 border-b-2 border-transparent transition-all duration-300">
                    Career
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="text-slate-300 text-md font-normal hover:text-red-700 border-b-2 border-transparent transition-all duration-300">
                    Contact
                </a>
            </div>

            <!-- Contact Button (Hidden on Mobile) -->
            <div class="hidden md:block space-x-3">
                <a href="#"
                    class="px-4 py-2 bg-purple-500 font-semibold text-white hover:text-white rounded-full hover:bg-pink-900 transition-colors duration-300">
                    Contact US
                    <i class="fi fi-rr-arrow-up-right font-semibold text-white text-sm ml-2"></i>
                </a>
            </div>

            <!-- Search Form (Aligned to Right) -->
            <!-- <div class="hidden md:flex items-center ml-4">
                <form role="search" method="get" class="flex items-center" action="<?php echo home_url('/'); ?>">
                    <input type="search" name="s" placeholder="Search..." class="px-4 py-2 rounded-l-full border-2 border-gray-300 text-gray-700 focus:outline-none focus:ring-2 focus:ring-rose-500">
                    <button type="submit" class="px-4 py-2 bg-rose-500 text-white rounded-r-full hover:bg-rose-700 focus:outline-none">
                        <i class="fi fi-rr-search"></i>
                    </button>
                </form>
            </div> -->

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <i class="fi fi-rr-bars-staggered text-white"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="menu-overlay" class="hidden fixed inset-0 bg-white bg-opacity-50 z-40"></div>

        <!-- Mobile Menu (Hidden by Default) -->
        <!-- Mobile Menu (Dropdown Support) -->
<div id="mobile-menu" class="fixed top-0 left-0 h-full w-64 bg-black shadow-lg transform -translate-x-full transition-transform duration-500 ease-in-out z-50">
    <div class="p-4 flex justify-end">
        <button id="close-menu-button" class="z-50">
            <i class="fi fi-rr-cross text-white"></i>
        </button>
    </div>
    <div class="flex flex-col p-6 space-y-4">
        <a href="<?php echo home_url('/home'); ?>" class="text-slate-50 text-md font-normal hover:text-pink-700 border-b-2 border-transparent transition-all duration-300">Home</a>

        <!-- Dropdown for Services -->
        <div class="relative group">
            <button id="mobile-dropdown-button" class="flex items-center justify-between text-slate-50 text-md font-normal hover:text-pink-700 border-b-2 border-transparent transition-all duration-300 w-full">
                Service
                <i class="fi fi-rr-angle-down ml-2"></i>
            </button>
            <div id="mobile-dropdown-menu" class="hidden pl-4 mt-2 space-y-2">
                <a href="http://localhost/wordpress/fyp-media/" class="block text-gray-300 hover:text-pink-700 transition-colors duration-200">FYP Media</a>
                <a href="http://localhost/wordpress/fyp-agency/" class="block text-gray-300 hover:text-pink-700 transition-colors duration-200">FYP Agency</a>
                <a href="http://localhost/wordpress/fyp-management/" class="block text-gray-300 hover:text-pink-700 transition-colors duration-200">FYP Management</a>
                <a href="http://localhost/wordpress/fyp-mandala/" class="block text-gray-300 hover:text-pink-700 transition-colors duration-200">FYP Mandala</a>
            </div>
        </div>

        <a href="<?php echo home_url('/talent'); ?>" class="text-slate-50 text-md font-normal hover:text-pink-700 border-b-2 border-transparent transition-all duration-300">Talent</a>
        <a href="<?php echo home_url('/news'); ?>" class="text-slate-50 text-md font-normal hover:text-pink-700 border-b-2 border-transparent transition-all duration-300">News</a>
        <a href="<?php echo home_url('/blog'); ?>" class="text-slate-50 text-md font-normal hover:text-pink-700 border-b-2 border-transparent transition-all duration-300">Blog</a>
        <a href="<?php echo home_url('/career'); ?>" class="text-slate-50 text-md font-normal hover:text-pink-700 border-b-2 border-transparent transition-all duration-300">Career</a>
        <a href="<?php echo home_url('/contact'); ?>" class="text-slate-50 text-md font-normal hover:text-pink-700 border-b-2 border-transparent transition-all duration-300">Contact</a>
    </div>
</div>

    </nav>

</body>

</html>

<?php
// wp_nav_menu(array(
//     'theme_location' => 'main-menu',
//     'container' => '',
//     'menu_class' => 'flex space-x-4',
//     'walker' => new WP_Tailwind_Navwalker(),  // Optional, jika ingin menggunakan class khusus untuk dropdown
// ));
?>

<style>
    /* Optional: for better control of dropdown visibility */
    .group:hover #dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }

    #dropdown-menu {
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
    }

    #dropdown-menu a {
        padding: 12px;
        text-align: left;
        display: block;
        font-size: 14px;
        color: #333;
        background-color: white;
        border-radius: 4px;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    #dropdown-menu a:hover {
        background-color: #e11d48;
        /* Adjust to match theme */
        color: white;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.querySelector('#navbar .group button');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const mobileDropdownButton = document.getElementById('mobile-dropdown-button');
    const mobileDropdownMenu = document.getElementById('mobile-dropdown-menu');

    // Desktop Dropdown
    dropdownButton.addEventListener('click', function (event) {
        event.preventDefault();
        dropdownMenu.classList.toggle('opacity-0');
        dropdownMenu.classList.toggle('invisible');
        dropdownMenu.classList.toggle('scale-95');
    });

    // Mobile Dropdown
    mobileDropdownButton.addEventListener('click', function () {
        mobileDropdownMenu.classList.toggle('hidden');
    });
});

</script>