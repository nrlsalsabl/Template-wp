<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?> <!-- Jangan lupa memanggil wp_head() -->
</head>
<body <?php body_class(); ?>>
    
<footer class="bg-black text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-lg font-bold">Fyp Media</p>
                <p class="text-sm">© <?php echo date('Y'); ?> Fyp Media. All rights reserved.</p>
            </div>
            <div class="space-x-4">
                <a href="#" class="text-sm hover:text-gray-400">Privacy Policy</a>
                <a href="#" class="text-sm hover:text-gray-400">Terms of Service</a>
                <a href="#" class="text-sm hover:text-gray-400">Contact</a>
            </div>
        </div>
    </div>
</footer>
