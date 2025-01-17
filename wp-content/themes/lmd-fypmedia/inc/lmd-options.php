<?php
/* Branding */
function lmd_admin_footer() {
  echo 'Created by <a href="https://lombokmedia.web.id" target="_blank">LombokMedia</a>';
  echo ' & <a href="https://WordPress.org" target="_blank">WordPress</a>. ';
}
add_filter('admin_footer_text', 'lmd_admin_footer', 1);

function lmd_custom_login_logo() {
	echo '<style type="text/css">h1 a { background-image:url('.get_template_directory_uri().'/login.png) !important; }</style>';
}
add_action('login_head', 'lmd_custom_login_logo');

function lmd_login_url() {  
	return '#'; 
}
function lmd_login_title() { 
	return 'LombokMedia - Jasa Pembuatan Website dan Tema WordPress di Lombok'; 
}
add_filter( 'login_headerurl', 'lmd_login_url' );
add_filter( 'login_headertext', 'lmd_login_title' );


/* Cleanup */
function lmd_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
// remove WP version from css
add_filter( 'style_loader_src', 'lmd_remove_wp_ver_css_js', 9999 );
// remove Wp version from scripts
add_filter( 'script_loader_src', 'lmd_remove_wp_ver_css_js', 9999 );


// Remove rsd link
remove_action( 'wp_head', 'rsd_link' );

// Remove the WordPress generator tag
remove_action( 'wp_head', 'wp_generator' );

// Remove RSS feed links
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Remove the link to the Windows Live Writer manifest file
remove_action( 'wp_head', 'wlwmanifest_link' );

// Removes the adjacent post links
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

// Removes the WordPress shortlink for your post.
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Remove emoji detection scripts.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );


/* WP Features: Disable frontend toolbar */
show_admin_bar(false);

/* Functions */
/* Custom Excerpt - Usage: lmd_limit_words(get_the_excerpt(), 10); */
function lmd_limit_words($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) {
  array_pop($words);
  echo implode(' ', $words).""; } else {
  echo implode(' ', $words); }
}

/* Posts Views - Usage: echo getPostViews(get_the_ID) */
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}

/* Posts Views - Saving the views */
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//Display Views
function display_post_views( $post_id = null ) {
	$value = '';
	if( is_null( $post_id ) ) {
		global $post;
		$value = get_post_meta( $post->ID, 'post_views_count', true );
		
	} else {
		$value = get_post_meta( $post_id, 'post_views_count', true );	
	}
	
	echo $value;
}

/* Format waktu ke xxx ago */
function lmd_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

/* Convert number to xxK */
function human_number($number) {
        $abbrevs = [12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => ''];

    foreach ($abbrevs as $exponent => $abbrev) {
        if (abs($number) >= pow(10, $exponent)) {
            $display = $number / pow(10, $exponent);
            $decimals = ($exponent >= 3 && round($display) < 100) ? 1 : 0;
            $number = number_format($display, $decimals).$abbrev;
            break;
        }
    }

    return $number;
    }

// Remove <p> and <br/> from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Enable hidden buttons to third row of post editor
function lmd_custom_mce_buttons( $buttons ) {	
	$buttons[] = 'wp_page';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'lmd_custom_mce_buttons' );

function lmd_get_img_alt($post_id) {
	$thumbnail_id = get_post_thumbnail_id( $post_id );
	$alt_img = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

	if(!empty($alt_img)) {
		return $alt_img;
	} else {
		return get_the_title($post_id);
	}
}

//Get Image ALT
function lmd_get_alt_by($imgvar, $var_type) {
	if($var_type == 'url') {
		$image_id = attachment_url_to_postid($imgvar);
	} elseif ($var_type == 'id') {
		$image_id = $imgvar;
	} elseif ($var_type == 'post_id') {
		$image_id = get_post_thumbnail_id( $imgvar );
	}

	$attachment = get_post($image_id);

	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
	$image_caption = $attachment->post_excerpt;
	$image_desc = $attachment->post_content;

	if(!empty($image_caption)) {
		return $image_caption;
	} elseif(!empty($image_desc)) {
		return $image_desc;
	} elseif(!empty($image_alt)) {
		return $image_alt;
	} elseif(!empty($image_title)) {
		return $image_title;
	} else {
		return get_the_title();
	}
}

//Filter excerpt
function wpdocs_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );