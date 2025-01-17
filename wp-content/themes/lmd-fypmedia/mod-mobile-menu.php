<div id="lmdSideNav" class="sidenav d-lg-none">
	<div class="sidenav-header p-3 py-2 shadow-sm mb-3">
		<div class="sidenav-logo-close d-flex align-items-center justify-content-between mb-3">
			<div class="mlogo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php $logo = lmd_get_mod('logo');
					if( !empty($logo) ) {
						echo $logo;
					} else {
						echo get_template_directory_uri().'/img/logo.png'; 
					} ?>" alt="<?php bloginfo('name'); ?>">
				</a>
			</div>

			<div class="btn-sidenav">
				<a href="javascript:void(0)" class="btn-sidenav-close" onclick="closeNav()">
					<i class="fa fa-close"></i>
				</a>
			</div>
		</div>

		<form method="get" class="mobsearch search-form" action="<?php echo home_url(); ?>">
			  <input type="text" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s">
			  <button class="btn-mobsearch rounded-end" type="submit"><i class="fa fa-search"></i></button>

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
		</form>
	</div>
  
	<div class="lmd-moblist p-3 pt-0">	
		<?php if(has_nav_menu('mobile-menu')) {
			wp_nav_menu( array(
				'theme_location'    => 'mobile-menu',
				'depth'             => 2,
				'container'         => false,
				'menu_id'      		=> 'mMenu',
				'menu_class'        => 'mmenu',
				'fallback_cb'       => false,
				)
			); 
		echo '<div class="clear"></div>';
		} ?>
	</div>

	<hr>

	<div class="lmd-mobile-menu-footer p-3 pt-0 text-center">
		<?php get_template_part('mod', 'socmed'); ?>
		<p class="copyright">Copyright &copy; <?php echo date('Y'); ?> . <?php bloginfo('name'); ?>.</p>
	</div>
</div>