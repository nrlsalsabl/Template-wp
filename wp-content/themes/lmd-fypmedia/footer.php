<style>
/* Footer Section */
.footer {
  text-align: center;
  padding: 40px 0;
}

.footer h1 {
  font-size: 2.8em;
  margin-bottom: 20px;
}

.footer p {
  font-size: 0.9em;
  color: #b3b3b3;
  margin-bottom: 20px;
}
</style>

	<footer class="lmd-footer pt-lg-4">
		<div class="container pt-5">
			<div class="row">
				<div class="col-md-3">
					<div class="widget widget-about">
						<p><a href="<?php echo home_url(); ?>">
							<img src="<?php $logo = lmd_get_mod('flogo');
							if( !empty($logo) ) {
								echo $logo;
							} else {
								echo get_template_directory_uri().'/img/flogo.png'; 
							} ?>" alt="<?php bloginfo('name'); ?>">
						</a></p>
						
						<p><?php echo lmd_get_mod('about', '<b>FYP Media & Agency</b> <br>"<i>Leading the Way in Media and Branding Excellence.</i>"'); ?></p>
					</div>

				</div>
				
				
				<div class="col-md-3">

					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
						
						<div class="widget fwidget widget-contact">
							<h3 class="widget-title h5">Contact Info</h3>
							<p><?php $var = lmd_get_mod('contact_email'); if(!empty($var)) { echo $var.'<br>'; } ?>
							<?php $var = lmd_get_mod('contact_phone'); if(!empty($var)) { echo $var; } else { echo '+62 851 7512 3014'; } ?></p>
						</div>

					<?php endif; ?>

				</div>
				
				
				<div class="col-md-3">

					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
						
						<div class="widget fwidget widget-alamat">
							<h3 class="widget-title h5">Location</h3>
							<div class=""><?php $var = lmd_get_mod('contact_alamat'); if(!empty($var)) { echo $var; } else { echo 'Residence One BSD, <br>Jl. Raya Serpong Kilometer 7, Jelupang, Kec. Serpong Utara, <br>Kota Tangerang Selatan, Banten 15310'; } ?></div>
						</div>

					<?php endif; ?>

				</div>
				<div class="col-md-3">

					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
						
						<div class="widget fwidget widget-socmed">
							<h3 class="widget-title h5">Follow Us</h3>
							<?php get_template_part('mod-socmed'); ?>
						</div>

					<?php endif; ?>

				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center text-lg-end">
					<p class="copyright">&copy; All rights reserved | <a href="<?php echo home_url(); ?>"><b><?php echo get_theme_mod('blogname', get_bloginfo('name')); ?></b></a></p>

				</div>
			</div>
			
			
		</div>
	</footer>

	<a class="back-to-top rounded-2" style="display: none;" href="#top"><i class="fa fa-angle-up"></i></a>

	<?php wp_footer(); ?>

	<script>
		//magnific Popup
		jQuery('.btn-play').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});
	</script>

	</body>
</html>