<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body <?php body_class(); ?>>
    
<footer class="bg-black py-8">
    <div class="w-5/6 h-px bg-gray-500 mx-auto"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-10">
            <!-- Column 1 -->
            <div>
            <a href="<?php echo home_url('/home'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fyplogo.png" alt="Logo" class="h-6 md:h-5 lg:h-6 w-auto mb-3">
            </a>
                <p class="text-sm text-white">FYP Media & Agency</p>
                <p class="text-sm italic text-white mb-4">"Leading the Way in Media and Branding Excellence."</p>

                <!-- Social Media Icons -->
                <div class="flex space-x-4">
                    <a href="https://instagram.com" target="_blank" aria-label="Facebook" class="text-white hover:text-blue-600 transition duration-200">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://web.whatsapp.com/" target="_blank" aria-label="Twitter" class="text-white hover:text-blue-400 transition duration-200">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" aria-label="Instagram" class="text-white hover:text-pink-500 transition duration-200">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" aria-label="LinkedIn" class="text-white hover:text-blue-700 transition duration-200">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2 -->
            <div>

            <h3 class="text-lg text-white font-semibold mb-2">Location</h3>
                <p class="text-sm text-white">
                    Residence One BSD,<br>
                    Jl. Raya Serpong Kilometer 7, Jelupang,<br>
                    Kec. Serpong Utara, Kota Tangerang Selatan,<br>
                    Banten 15310
                </p>
            </div>
            <!-- Column 3 -->
            <div>
            <h3 class="text-lg text-white font-semibold mb-2">Contact Info</h3>
                <p class="text-sm text-white">Partnership@fypmedia.id</p>
                <p class="text-sm text-white">+62 851 7512 3014 (Jaya)</p>
            </div>
            <!-- Column 4 -->
            <div>
            <h3 class="text-lg text-white font-semibold mb-2">Links</h3>
            <div class="flex">
            <ul class="text-sm text-white space-y-1">
                        <li><a href="<?php echo home_url('/home'); ?>" class="hover:text-white">Home</a></li>
                        <li><a href="<?php echo home_url('/services/fyp-media'); ?>" class="hover:text-white">About</a></li>
                        <li><a href="<?php echo home_url('/news'); ?>" class="hover:text-white">News</a></li>
                        <li><a href="<?php echo home_url('/blog'); ?>" class="hover:text-white">Blog</a></li>
                    </ul>
            
                    <ul class="text-sm text-white space-y-1 ml-5">
                        <li><a href="<?php echo home_url('/careers'); ?>" class="hover:text-white">Careers</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>" class="hover:text-white">Contact</a></li>
                        <li><a href="<?php echo home_url('/services/fyp-agency'); ?>" class="hover:text-white">Service</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center border-t border-gray-500 pt-4">
            <p class="text-md text-white font-semibold">FYP Media Agency &copy; 2023. All rights reserved. </p>
        </div>
    </footer>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a329084b4e.js" crossorigin="anonymous"></script>
    </body>
