<?php
if(!defined("ABSPATH")){
    header('HTTP/1.0 403 Forbidden');
    exit;
}
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta <?php bloginfo( 'charset' ); ?>>
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	
	<?php if( has_site_icon() ) {
		wp_site_icon();
	} else {
		echo '<link rel="icon" type="image/x-icon" href="'.get_template_directory_uri().'/favicon.png" />';
	} ?>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>
    
</head>
<body id="lombokmedia" <?php body_class(); ?>>

<?php $var = lmd_get_mod('komentar_type', 'wp'); if($var == 'fb') {
		
	$fbid = lmd_get_mod('fb_id', '246505639864458');

	echo '<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v16.0&appId='.$fbid.'&autoLogAppEvents=1" nonce="vMkW1CUH"></script>';

}

wp_body_open(); ?>

<?php get_template_part('mod-mobile-menu'); ?>

<header class="lmd-header">
	<div class="lmd-navbar lmd-navbar-main">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">
				<a class="navbar-brand" href="<?php echo home_url(); ?>">
					<img src="<?php $logo = lmd_get_mod('logo');
					if( !empty($logo) ) {
						echo $logo;
					} else {
						echo get_template_directory_uri().'/img/logo.png'; 
					} ?>" alt="<?php bloginfo('name'); ?>">
				</a>

				<button class="navbar-toggler" type="button" onclick="openNav()">
				  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-a71f0d76=""><g clip-path="url(#clip0_2339_139651)"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 18C2 18.5523 2.44772 19 3 19H21C21.5523 19 22 18.5523 22 18C22 17.4477 21.5523 17 21 17H3C2.44772 17 2 17.4477 2 18ZM2 12C2 12.5523 2.44772 13 3 13H11.5C12.0523 13 12.5 12.5523 12.5 12C12.5 11.4477 12.0523 11 11.5 11H3C2.44772 11 2 11.4477 2 12ZM2 6C2 6.55228 2.44772 7 3 7H11.5C12.0523 7 12.5 6.55228 12.5 6C12.5 5.44771 12.0523 5 11.5 5H3C2.44772 5 2 5.44771 2 6Z" fill="#ffffff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4785 10.555C17.3351 11.3288 15.7808 11.0291 15.007 9.88558C14.2331 8.74209 14.5328 7.18781 15.6763 6.41399C16.8198 5.64018 18.3741 5.93987 19.1479 7.08337C19.9217 8.22686 19.622 9.78115 18.4785 10.555ZM18.4278 12.2507C16.7484 12.8542 14.8108 12.2721 13.7647 10.7262C12.5266 8.89666 13.0061 6.4098 14.8357 5.17171C16.6653 3.93361 19.1521 4.41311 20.3902 6.2427C21.4363 7.78859 21.2562 9.80371 20.0716 11.1383C20.0985 11.1692 20.1239 11.202 20.1474 11.2368L21.8287 13.7214C22.1383 14.1788 22.0184 14.8005 21.561 15.11C21.1036 15.4195 20.4819 15.2997 20.1724 14.8423L18.491 12.3577C18.4675 12.3229 18.4464 12.2872 18.4278 12.2507Z" fill="#f8004f"></path></g> <defs><clipPath id="clip0_2339_139651"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg>
				</button>

				<div id="navbarNav" class="collapse navbar-collapse">
					<?php wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'container' => false,
						'menu_class' => 'me-auto',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
						'depth' => 2,
						'walker' => new bootstrap_5_wp_nav_menu_walker()
					)); ?>
				</div>

				<div class="navsearch ms-auto d-none d-lg-block">
					<span data-bs-toggle="modal" data-bs-target="#searchBox" role="button"><i class="fa fa-search fc-pink"></i></span>
				</div>
				
			</nav>
		</div><!--/container-->
	</div><!--/navbar-main-->

	<div id="searchBox" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h1 class="modal-title fs-6" id="exampleModalLabel">Search Our Website</h1>
			<span role="button" class="fc-pink" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></span>
		  </div>
		  <div class="modal-body">
			<form method="get" class="search-form text-center" action="<?php echo home_url(); ?>">
				<input type="text" class="inputSearch form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s">

				<div class="form-check form-check-inline mt-2">
				  <input class="form-check-input" type="radio" name="post_type" value="post" checked>
				  <label class="form-check-label" for="post_type">
					News
				  </label>
				</div>
				<div class="form-check form-check-inline mt-2">
				  <input class="form-check-input" type="radio" name="post_type" value="talent">
				  <label class="form-check-label" for="post_type">
					Talents
				  </label>
				</div>

				<button class="btn btn-dark w-100 rounded-5 mt-2 fc-pink" type="submit">Search</button>

			</form>
		  </div>
		</div>
	  </div>
	</div>
</header>