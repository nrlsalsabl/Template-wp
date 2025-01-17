<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// 1. Setup Theme
function fypmedia_setup() {
    // Add theme support for features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'gallery', 'caption'));

    // Register navigation menu
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'fypmedia'),
    ));
}
add_action('after_setup_theme', 'fypmedia_setup');

// 2. Enqueue Styles and Scripts
function fypmedia_enqueue_assets() {
    // Load Tailwind CSS
    wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css', array(), '2.2.19');
    // Load Theme's Main Stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'fypmedia_enqueue_assets');

// 3. Register Custom Post Types
function fypmedia_register_post_types() {
    // Blog Post Type
    // register_post_type('blog', array(
    //     'labels' => array(
    //         'name' => __('Blog', 'fypmedia'),
    //         'singular_name' => __('Blog', 'fypmedia'),
    //     ),
    //     'public' => true,
    //     'has_archive' => true,
    //     'rewrite' => array('slug' => 'blog'),
    //     'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    // ));

    // News Post Type
    register_post_type('news', array(
        'labels' => array(
            'name' => __('News', 'fypmedia'),
            'singular_name' => __('News', 'fypmedia'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
}
add_action('init', 'fypmedia_register_post_types');

// 4. Custom Template Loader for Custom Post Types
function fypmedia_custom_template_hierarchy($template) {
    if (is_home() || is_post_type_archive('post')) {
        $template = locate_template('content/blog/archive-blog.php');
    } elseif (is_singular('post')) {
        $template = locate_template('content/blog/single-blog.php');
    } elseif (is_post_type_archive('news')) {
        $template = locate_template('content/news/archive-news.php');
    } elseif (is_singular('news')) {
        $template = locate_template('content/news/single-news.php');
    }
    return $template;
}
add_filter('template_include', 'fypmedia_custom_template_hierarchy');

// 5. Add Search Form Support
function fypmedia_custom_search_form($form) {
    $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url('/') . '">
        <label class="screen-reader-text" for="s">' . __('Search for:', 'fypmedia') . '</label>
        <input type="text" class="search-field" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__('Search...', 'fypmedia') . '" />
        <button type="submit" class="search-submit">' . esc_attr__('Search', 'fypmedia') . '</button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'fypmedia_custom_search_form');

// 6. Disable WordPress Admin Bar on Frontend
add_filter('show_admin_bar', '__return_false');

// 7. Register Widget Area (Optional)
function fypmedia_register_sidebar() {
    register_sidebar(array(
        'name' => __('Sidebar', 'fypmedia'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'fypmedia'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'fypmedia_register_sidebar');
