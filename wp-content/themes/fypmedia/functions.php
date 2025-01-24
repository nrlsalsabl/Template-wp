<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// 1. Setup Theme
function fypmedia_setup()
{
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
function fypmedia_enqueue_assets()
{
    // Load Tailwind CSS
    wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css', array(), '2.2.19');

    // Load Theme's Main Stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'fypmedia_enqueue_assets');



// 3. Register Custom Post Types
function fypmedia_register_post_types()
{
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

    // Talent List Type
    register_post_type('talent', array(
        'labels' => array(
            'name' => __('Talent', 'fypmedia'),
            'singular_name' => __('Talent', 'fypmedia'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'talent'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));


    // Team Post Type
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Team', 'fypmedia'),
            'singular_name' => __('Team', 'fypmedia'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'team'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
}
add_action('init', 'fypmedia_register_post_types');


// 4. Custom Template Loader for Custom Post Types
function fypmedia_custom_template_hierarchy($template)
{
    if (is_home() || is_post_type_archive('post')) {
        $template = locate_template('content/blog/archive-blog.php');
    } elseif (is_singular('post')) {
        $template = locate_template('content/blog/single-blog.php');
    } elseif (is_post_type_archive('news')) {
        $template = locate_template('content/news/archive-news.php');
    } elseif (is_singular('news')) {
        $template = locate_template('content/news/single-news.php');
    } elseif (is_post_type_archive('talent')) {
        $template = locate_template('content/talent/archive-talent.php');
    } elseif (is_singular('talent')) {
        $template = locate_template('content/talent/single-talent.php');
    } elseif (is_post_type_archive('career')) {
        $template = locate_template('content/career/career-page.php');
    } elseif (is_singular('talent')) {
        $template = locate_template('content/talent/single-career.php');
    }
    return $template;
}
add_filter('template_include', 'fypmedia_custom_template_hierarchy');

// 5. Add Search Form Support
function fypmedia_custom_search_form($form)
{
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
function fypmedia_register_sidebar()
{
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



// Custom Walker untuk menampilkan dropdown menu dengan Tailwind CSS 
class WP_Tailwind_Navwalker extends Walker_Nav_Menu
{
    // Start Level - untuk membuat submenu
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        if (isset($args->has_children) && $args->has_children) {
            $output .= '<ul class="absolute hidden bg-gray-800 text-white shadow-md mt-1 w-48 rounded">';
        } else {
            $output .= '<ul>';
        }
    }

    // End Level - penutupan untuk submenu
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul>';
    }

    // Start Element - untuk menambahkan styling pada menu
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Handle classes for dropdown item
        if ($depth == 0 && in_array('menu-item-has-children', $classes)) {
            $classes[] = 'relative group';  // Make the parent item have the ability to show the dropdown
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $attributes  = ! empty($item->attr_title)     ? ' title="'   . esc_attr($item->attr_title)     . '"' : '';
        $attributes .= ! empty($item->target)         ? ' target="'  . esc_attr($item->target)         . '"' : '';
        $attributes .= ! empty($item->xfn)            ? ' rel="'     . esc_attr($item->xfn)            . '"' : '';
        $attributes .= ! empty($item->url)            ? ' href="'    . esc_attr($item->url)            . '"' : '';

        $item_output = $args->before;
        $item_output .= '<li' . $id . $class_names . '>';
        $item_output .= '<a' . $attributes . ' class="block px-4 py-2">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= $item_output;
    }
}
