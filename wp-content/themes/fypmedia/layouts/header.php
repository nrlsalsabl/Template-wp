<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom.css">
</head>

<body <?php body_class(); ?>>

    <!-- Header Section -->
    <nav id="navbar" class=" text-white sticky z-40 top-0 border-b-2 border-[#F1F3F4]/10 bg-primary">
        <div class="bg-white/50 w-40 h-40 rounded-full mx-auto left-0 right-0 absolute top-0 blur-[150px]"></div>

        <div class="container mx-auto px-4 flex justify-between items-center py-7 lg:pt-7 lg:pb-6 z-20 relative">

            <!-- Logo -->
            <div class="lg:pb-2">
                <a href="/index.html">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fypmedia.png" alt="Logo"
                        class="h-4 lg:h-5 xl:h-6">
                </a>
            </div>

            <!-- Main Menu (Hidden on Mobile) -->
            <div class="fixed top-0 h-full w-full left-0 z-50 bg-white/50 hidden lg:block lg:static lg:bg-transparent lg:w-auto"
                id="overlay-mobile-menu">

                <div class="bg-primary left-0 w-64 pb-7 pt-9 px-4 sticky top-0 h-full overflow-auto transform transition-transform duration-500 ease-in-out -translate-x-full sm:w-72 lg:w-auto lg:translate-x-0 lg:static lg:overflow-visible lg:bg-transparent lg:p-0"
                    id="sidebar-menu">

                    <button id="close-menu-button" class="w-auto ml-auto block lg:hidden">
                        <i class="fi fi-rr-cross text-white"></i>
                    </button>

                    <div class="flex flex-col gap-y-4 mt-8 lg:mt-0 lg:flex-row lg:gap-x-9 lg:items-center">
                        <a href="<?php echo home_url('/home'); ?>"
                            class="text-white text-md font-medium hover:text-red-700 transition-all duration-300 lg:text-[#F1F3F4] lg:pb-2">
                            Home
                        </a>

                        <!-- Dropdown Menu for Services -->
                        <div class="relative dropdown-menu group">
                            <button
                                class="flex items-center text-white text-md font-medium hover:text-red-700 cursor-pointer transition-all duration-300 justify-between w-full gap-x-2 lg:text-[#F1F3F4] lg:pb-2">
                                Service
                                <i class="fi fi-rr-angle-down mt-1 text-sm"></i>
                            </button>

                            <div
                                class="hidden lg:block lg:absolute lg:top-full lg:w-48 lg:rounded-lg lg:z-10 lg:bg-white lg:overflow-hidden lg:shadow-lg lg:opacity-0 lg:invisible lg:group-hover:opacity-100 lg:group-hover:visible lg:transition-all lg:duration-300 lg:transform lg:scale-95 lg:group-hover:scale-100">
                                <a href="http://localhost/wordpress/fyp-media/"
                                    class="block px-4 py-2 font-medium text-[#F1F3F4] text-sm hover:text-red-700 transition-colors duration-200 lg:text-gray-700 lg:hover:text-white lg:px-4 lg:py-2 lg:hover:bg-rose-500">
                                    FYP Media
                                </a>
                                <a href="http://localhost/wordpress/fyp-agency/"
                                    class="block px-4 py-2 font-medium text-[#F1F3F4] text-sm hover:text-red-700 transition-colors duration-200 lg:text-gray-700 lg:hover:text-white lg:px-4 lg:py-2 lg:hover:bg-rose-500">
                                    FYP Agency
                                </a>
                                <a href="http://localhost/wordpress/fyp-management/"
                                    class="block px-4 py-2 font-medium text-[#F1F3F4] text-sm hover:text-red-700 transition-colors duration-200 lg:text-gray-700 lg:hover:text-white lg:px-4 lg:py-2 lg:hover:bg-rose-500">
                                    FYP Managemenet
                                </a>
                                <a href="http://localhost/wordpress/fyp-mandala/"
                                    class="block px-4 py-2 font-medium text-[#F1F3F4] text-sm hover:text-red-700 transition-colors duration-200 lg:text-gray-700 lg:hover:text-white lg:px-4 lg:py-2 lg:hover:bg-rose-500">
                                    FYP Mandala
                                </a>
                            </div>
                        </div>

                        <!-- Additional Menu Items -->
                        <a href="<?php echo home_url('/talent'); ?>"
                            class="text-white text-md font-medium hover:text-red-700 transition-all duration-300 lg:text-[#F1F3F4] lg:pb-2">
                            Talent
                        </a>
                        <a href="<?php echo home_url('/news'); ?>"
                            class="text-white text-md font-medium hover:text-red-700 transition-all duration-300 lg:text-[#F1F3F4] lg:pb-2">
                            News
                        </a>
                        <a href="<?php echo home_url('/blog'); ?>"
                            class="text-white text-md font-medium hover:text-red-700 transition-all duration-300 lg:text-[#F1F3F4] lg:pb-2">
                            Blog
                        </a>
                        <a href="<?php echo home_url('/career'); ?>"
                            class="text-white text-md font-medium hover:text-red-700 transition-all duration-300 lg:text-[#F1F3F4] lg:pb-2">
                            Career
                        </a>
                        <a href="<?php echo home_url('/contact'); ?>"
                            class="text-white text-md font-medium hover:text-red-700 transition-all duration-300 lg:text-[#F1F3F4] lg:pb-2">
                            Contact
                        </a>
                    </div>
                </div>
            </div>



            <!-- Contact Button (Hidden on Mobile) -->
            <div class="hidden lg:block lg:pb-2">
                <a href="#"
                    class="px-5 py-3 bg-[#f1f3f4] font-semibold text-[#0f1017] hover:text-white hover:bg-purple-500 group flex items-center gap-x-2 rounded-full transition-colors duration-300">
                    Contact US
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 7H17M17 7V17M17 7L7 17" stroke="#0F1017" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="group-hover:stroke-white transition-colors duration-300" />
                    </svg>

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
            <div class="lg:hidden">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.3337 9.91699H5.66699M28.3337 17.0003H5.66699M28.3337 24.0837H5.66699"
                            stroke="#F1F3F4" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </button>
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

</style>

<script>
    // Mobile Menu Toggle
    const overlayMobileMenu = document.getElementById('overlay-mobile-menu');
    const sidebarMenu = document.getElementById('sidebar-menu');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const closeMenuButton = document.getElementById('close-menu-button');

    mobileMenuButton.addEventListener('click', function () {
        overlayMobileMenu.classList.remove('hidden');

        setTimeout(() => {
            sidebarMenu.classList.remove('-translate-x-full');
            sidebarMenu.classList.add('translate-x-0');
        }, 10);
    });

    const overlayMobileMenuClose = (event) => {
        event.stopPropagation();

        sidebarMenu.classList.remove('translate-x-0');
        sidebarMenu.classList.add('-translate-x-full');

        setTimeout(() => {
            overlayMobileMenu.classList.add('hidden');
        }, 500);
    };

    closeMenuButton.addEventListener('click', (event) => {
        overlayMobileMenuClose(event);
    });

    overlayMobileMenu.addEventListener('click', (event) => {
        overlayMobileMenuClose(event);
    });

    // Prevent bubbling when clicking inside the sidebar
    sidebarMenu.addEventListener('click', (event) => {
        event.stopPropagation();
    });


    // Dropdown Menu Toggle
    const dropdownMenu = document.querySelectorAll('.dropdown-menu');
    dropdownMenu.forEach(menu => {
        menu.addEventListener('click', function (e) {
            e.stopPropagation();
            const dropdownContent = this.querySelector('div');
            dropdownContent.classList.toggle('hidden');
        });
    });

</script>