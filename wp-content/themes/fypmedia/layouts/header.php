<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-gray-800 text-white">
    <nav class="container mx-auto flex justify-between items-center p-4">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => '',
            'menu_class' => 'flex space-x-4',
        ));
        ?>
        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
            <input type="search" name="s" placeholder="Search..." class="px-2 py-1">
            <button type="submit">Search</button>
        </form>
    </nav>
</header>
