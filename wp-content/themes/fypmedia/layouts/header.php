<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body <?php body_class(); ?>>
    
<header class="bg-gray-800 text-white">
    <nav class="container mx-auto flex justify-between items-center p-4">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => '',
            'menu_class' => 'flex space-x-4',
            'walker' => new WP_Tailwind_Navwalker(),  // Optional, jika ingin menggunakan class khusus untuk dropdown
        ));
        ?>

        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
            <input type="search" name="s" placeholder="Search..." class="px-2 py-1">
            <button type="submit">Search</button>
        </form>
    </nav>
</header>
