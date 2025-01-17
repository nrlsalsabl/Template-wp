<?php
if(!defined("ABSPATH")){
    header('HTTP/1.0 403 Forbidden');
    exit;
}

/* Metaboxes */
require_once get_template_directory() . '/inc/codestar-framework/codestar-framework.php';

if ( ! function_exists( 'lmd_get_mod' ) ) {
  function lmd_get_mod( $option = '', $default = null ) {
    $options = get_option( UPT_THEME_SLUG.'_customize' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

$post_types = lmd_get_mod('seo_ptype', 'post,page');

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

   // Create a metabox - Landing Page
  CSF::createMetabox( 'seo_metabox', array(
    'title'				=> 'SEO Metabox',
    'post_type'			=> $post_types,
	'data_type'          => 'unserialize',
	'context'			=> 'advanced', //normal, side, advanced
    'priority'			=> 'high', //high, low, default
  ) );

  // Create a section
  CSF::createSection( 'seo_metabox', array(
    'fields' => array(
		
	  array(
			'id' => 'seo_locale',
			'type' => 'radio',
			'options' => array('id_ID' => 'id_ID', 'en_US' => 'en_US'),
			'default' => 'id_ID',
			'inline' => true,
			'title' => 'SEO Locale',
		),
		array(
			'id' => 'seo_title',
			'type' => 'text',
			'class' => 'w-full',
			'title' => 'Meta Title',
			'desc' => 'Jika kosong, menggunakan judul post',
		),
		array(
			'id' => 'seo_desc',
			'type' => 'textarea',
			'class' => 'h-sm',
			'title' => 'Meta Description',
			'desc' => 'Jika kosong, menggunakan excerpt post',
		),		
		array(
			'id' => 'seo_keywords',
			'type' => 'textarea',
			'class' => 'h-sm',
			'default' => lmd_get_mod('seo_keywords'),
			'title' => 'Meta Keywords',
			'desc' => 'Dipisahkan koma, Ex: <i>apel,nanas,jeruk</i>',
		),
		array(
			'id'      => 'seo_twitter',
			'type'    => 'text',
			'title'   => 'Twitter Handle',
			'desc' => 'Jika kosong, menggunakan default di customize. Ex: @LombokMedia',
		),

    ) //end of fields
  ) ); //end of metabox
}

/* custom title for post type */
add_filter( 'pre_get_document_title', 'custom_titles', 99, 2 );
function custom_titles($title) {

	global $post;
	$post_id = $post->ID;
	$meta_title = get_post_meta($post_id, 'seo_title', true);

	//set custom title here
	if ( !empty($meta_title) ) { 
		$title = $meta_title; 
	}
    return $title;
}


add_action ( 'wp_head', 'add_my_seo_metadata' );
function add_my_seo_metadata() {
   
	global $post;
	$post_id = $post->ID;

	$author_id = get_post_field ('post_author', $post_id);
	$author_name = get_the_author_meta( 'display_name' , $author_id );

	$twitter = lmd_get_mod('seo_twitter');
	$keywords = lmd_get_mod('seo_keywords');
	$locale = lmd_get_mod('seo_locale', 'id_ID');

	/* post meta data */
	$meta_desc = get_post_meta($post_id, 'seo_desc', true);
	$meta_keywords = get_post_meta($post_id, 'seo_keywords', true);
	$meta_locale = get_post_meta($post_id, 'seo_locale', true);
	$meta_twitter = get_post_meta($post_id, 'seo_twitter', true);

	if(is_front_page()) {
		$canonical_url = home_url('/');
	} else {
		$canonical_url = get_permalink();
	}

	?>

	<!--lmd builtin seo-->
	<meta name="description" content="<?php if ( !empty($meta_desc) ) { echo $meta_desc; } else { the_excerpt(); } ?>" />
	<Meta name="keyword" content="<?php if ( !empty($meta_keywords) ) { echo $meta_keywords; } else { echo $keywords; } ?>" />
	<meta name="robots" content="<?php echo lmd_get_mod('seo_robot', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'); ?>" />
	<meta name="author" content="<?php echo $author_name; ?>" />				
	<link rel="canonical" href="<?php echo $canonical_url; ?>" />
	<meta property="article:published_time" content="<?php echo get_the_date( DATE_W3C ); ?>" />
	<meta property="article:modified_time" content="<?php echo get_the_modified_date( DATE_W3C ); ?>" />

	<!-- opengraph-->
	<meta property="og:locale" content="<?php if ( !empty($meta_locale) ) { echo $meta_locale; } else { echo $locale; } ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php if ( !empty($meta_title) ) { echo $meta_title; } else { the_title(); } ?>" />
	<meta property="og:description" content="<?php if ( !empty($meta_desc) ) { echo $meta_desc; } else { the_excerpt(); } ?>" />
	<meta property="og:url" content="<?php echo $canonical_url; ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
	<meta property="og:image" content="<?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail_url($post_id, 'full'); } ?>" />
	<meta property="og:image:width" content="840" />
	<meta property="og:image:height" content="490" />
	<meta property="og:image:alt" content="<?php echo lmd_get_img_alt($post_id) ?>" />
	<meta property="og:image:type" content="image/jpeg" />

	<!--twitter-->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?php if ( !empty($meta_title) ) { echo $meta_title; } else { the_title(); } ?>" />
	<meta name="twitter:description" content="<?php if ( !empty($meta_desc) ) { echo $meta_desc; } else { the_excerpt(); } ?>" />
	<meta name="twitter:site" content="<?php if ( !empty($meta_twitter) ) { echo $meta_twitter; } else { echo $twitter; } ?>" />
	<meta name="twitter:creator" content="<?php if ( !empty($meta_twitter) ) { echo $meta_twitter; } else { echo $twitter; } ?>" />
	<meta name="twitter:image" content="<?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail_url($post_id, 'full'); } ?>" />

<?php }