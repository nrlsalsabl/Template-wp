<?php
if(!defined("ABSPATH")){
	header('HTTP/1.0 403 Forbidden');
	exit;
}

define( 'UPT_THEME_NAME', 'KiToGon' );
define( 'UPT_THEME_VERSION', '1.0' );
define( 'UPT_THEME_SLUG', get_template().'_' );

define( 'UPT_THEME_URL', get_template_directory_uri() );
define( 'UPT_THEME_PATH', get_template_directory() );

add_action('after_setup_theme', 'lombokmedia_theme_setup');

function lombokmedia_theme_setup(){
    load_theme_textdomain('lombokmedia', get_template_directory() . '/languages');
	
	register_nav_menu( 'main-menu', 'Main Menu');
	register_nav_menu( 'mobile-menu', 'Mobile Menu');
	
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array('video') ); 
	add_theme_support('automatic-feed-links');	
	add_theme_support( 'title-tag' ); 

	/* theme support - thumbnail */
	add_theme_support('post-thumbnails');

	//custom defined image
	add_image_size('landscape', 600, 335, true);

	// Thumbnail Size Thumbnail
	update_option( 'thumbnail_size_w', 150 );
	update_option( 'thumbnail_size_h', 150 );	
	// force hard crop medium size thumbnail
	update_option( 'thumbnail_crop', 1 );

	// Medium Size Thumbnail
	update_option( 'medium_size_w', 460 );
	update_option( 'medium_size_h', 300 );
	// force hard crop medium size thumbnail
	update_option( 'medium_crop', '1' );
}


//Load some scripts and styles
add_action('wp_enqueue_scripts', 'lmd_scripts_styles');

function lmd_scripts_styles() {

	wp_enqueue_script('bt_js', get_template_directory_uri() . '/library/bootstrap-5.2/js/bootstrap.bundle.min.js', array('jquery'), '5.2', true );
	wp_enqueue_script('owl_js', get_template_directory_uri() . '/library/owl-carousel/owl.carousel.min.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script('mp_js', get_template_directory_uri() . '/library/Magnific-Popup/dist/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script('lazy_js',get_template_directory_uri() . '/library/lazysizes.min.js', '', '5.1.1', true);

	wp_enqueue_script('lomedia_js',get_template_directory_uri() . '/js/lomedia.js', '', '999', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

	//CSS
	wp_enqueue_style('bt_css', get_template_directory_uri() . '/library/bootstrap-5.2/css/bootstrap.min.css', false ,'5.2');
	wp_enqueue_style('fa_css', get_template_directory_uri() . '/library/fontawesome-free-6.4.2-web/css/all.min.css', false ,'6.4.2');
	wp_enqueue_style('owl_css', get_template_directory_uri() . '/library/owl-carousel/assets/owl.carousel.min.css', false ,'2.3.4');
	wp_enqueue_style('owl_theme_css', get_template_directory_uri() . '/library/owl-carousel/assets/owl.theme.default.min.css', false ,'2.3.4');
	wp_enqueue_style('mp_css', get_template_directory_uri() . '/library/Magnific-Popup/dist/magnific-popup.css', false ,'1.1.0');
	wp_enqueue_style('style_css', get_stylesheet_directory_uri() . '/style.css');
}


/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}


/*** widget ***/
if ( function_exists('register_sidebar') )
{	
	register_sidebar(array(
		'name' => __( 'Sidebar', 'lombokmedia' ),
		'id' => 'sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title h5"><span>',
		'after_title' => '</span></h3>',
	));
	
	register_sidebar(array(
		'name' => __( 'Footer 1', 'lombokmedia' ),
		'id' => 'footer-1',
		'before_widget' => '<div class="widget fwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title h5"><span>',
		'after_title' => '</span></h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer 2', 'lombokmedia' ),
		'id' => 'footer-2',
		'before_widget' => '<div class="widget fwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title h5"><span>',
		'after_title' => '</span></h3>',
	));
	register_sidebar(array(
		'name' => __( 'Footer 3', 'lombokmedia' ),
		'id' => 'footer-3',
		'before_widget' => '<div class="widget fwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title h5"><span>',
		'after_title' => '</span></h3>',
	));
}

// Register Some Libraries - Always in the END
//TGMPA Recommended plugins
require_once get_template_directory() . '/inc/lmd-tgmpa.php';

//Functions customization
require_once get_template_directory() . '/inc/lmd-options.php';

//Bootstrap 4 nav menu wallker
require_once get_template_directory() . '/inc/lmd-walker.php';
require_once get_template_directory() . '/inc/lmd-pagination.php';

require_once get_template_directory() . '/inc/lmd-cpt.php';
require_once get_template_directory() . '/inc/lmd-customize.php';
require_once get_template_directory() . '/inc/lmd-metabox.php';

//Misc
require_once get_template_directory() . '/inc/lmd-breadcrumb.php';
require_once get_template_directory() . '/inc/lmd-related-posts.php';
require_once get_template_directory() . '/inc/lmd-widget-recent-posts.php';
require_once get_template_directory() . '/inc/lmd-widget-category-post.php';

function lmd_menu_order($menu_ord) {
     
    return array(
	'index.php',
	'edit.php?post_type=page',
	'edit.php',
	'edit.php?post_type=talent',
	'edit.php?post_type=team',
	'edit.php?post_type=career',
	'upload.php',
	'separator1',
	'themes.php',
    );
}
add_filter('custom_menu_order', '__return_true'); // Activate custom_menu_order
add_filter('menu_order', 'lmd_menu_order');


//How to get CSF values
//Usage Example: echo lmd_get_mod('id', 'default value');
if ( ! function_exists( 'lmd_get_mod' ) ) {
  function lmd_get_mod( $option = '', $default = null ) {
    $options = get_option( UPT_THEME_SLUG.'_customize' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

//Usage: tl_get_meta('ID')
if ( ! function_exists( 'tl_get_meta' ) ) {
  function lp_get_meta( $option = '', $default = '' ) {
    $options = get_post_meta( get_the_ID(), 'tl_metabox', true ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}


/* Add SEO MEta Data to HEAD */
if( lmd_get_mod('seo_aktif') == '1' ) {

	require_once get_template_directory() . '/inc/lmd-seo.php';

	remove_filter('wp_robots', 'wp_robots_max_image_preview_large');

}

/* enqueue admin styles */
function lmd_admin_scripts() {
	wp_enqueue_style( 'lmd_csf_admin', get_template_directory_uri().'/css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'lmd_admin_scripts' );

//show icon based on post format
function lmd_post_format($postid) {
	if(has_post_format('video')) {
		$var = get_post_meta($postid, 'vidlink', true); 
		
		echo '<div class="vidplay"><a class="btn-play fw-bold" href="';
		if(!empty($var)) { echo $var; } else { echo '#'; }
		echo '" title="Play Video" role="button"><i class="fa fab fa-youtube"></i></a></div>';
	}
}