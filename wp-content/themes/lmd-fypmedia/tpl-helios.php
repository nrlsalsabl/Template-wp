<?php
/*
Template Name: LMD About Helios
*/
get_header(); ?>
<div class="tpl-helios">

	<section class="hel-welcome sliders">
		<div class="slider-item text-center">
			<img class="lazyload img-fluid" src="<?php echo lmd_get_mod('hel_welcome_img', get_template_directory_uri().'/img/helios-welcome-img.png'); ?>" alt="<?php echo lmd_get_mod('hel_about_title', 'Helios'); ?>">
		</div>
	</section>

	<div class="hel-about">
		<div class="container text-center py-3 py-lg-4">
			<div class="row justify-content-center">
				<div class="hel-about-about col-lg-9 p-5">
					<h1 class="fh fw-bold mb-4"><?php echo lmd_get_mod('hel_about_title', 'Helios'); ?></h1>
					<p class="mb-0"><?php echo lmd_get_mod('hel_about_desc', 'Selamat datang di Helios Network/Motion! Kami adalah studio kreatif yang menghidupkan ide-ide Anda melalui desain video dan animasi yang dinamis. Dengan fokus pada kualitas visual dan narasi yang kuat, kami siap membantu Anda menciptakan konten yang menarik dan mengesankan.'); ?></p>
				</div>
			</div>
		</div>
	</div>

	<?php $entries = lmd_get_mod('hel_gallery'); if(!empty($entries)) : ?>

		<section class="hel-portfolio">
			<div class="container">

				<div id="hel-gallery" class="owl-carousel owl-theme">
					<?php $images = explode( ',', $entries);
					foreach ($images as $image) :

						echo '<div class="hel-gallery-item"><img src="'.wp_get_attachment_image_url( $image, 'full').'" alt=""><div class="hel-item-desc p-4"><h3 class="h6 mb-0 fc-blue">'.lmd_get_alt_by($image, 'id').'</h3></div></div>';
					
					endforeach; ?>
				</div>

			</div><!--/container-->
		</section><!--/gallery-->

		<script>
			jQuery(document).ready(function(){
			  jQuery("#hel-gallery").owlCarousel({
				autoplay:false,
				nav:true,
				dots:false,
				margin: 10,
				responsiveClass:true,
				responsive:{
					0:{
						items:2,
					},
					526:{
						items:3,
					},
					768:{
						items:4,
					}
				}
			  });
			});
		</script>
	
	<?php endif; ?>


	<section class="hel-contact sliders mt-2" style="background-image: url(<?php echo lmd_get_mod('hel_contact_img'); ?>);">
		<div class="container py-5">
			<div class="row align-items-center justify-content-center">
				<div class="col-10 col-md-7 col-lg-6">
					<div class="hel-about-contact text-center bg-white text-dark rounded-3 p-4 p-lg-5">
						<img class="lazyload img-fluid" src="<?php echo lmd_get_mod('hel_about_logo', get_template_directory_uri().'/img/helios-logo.png'); ?>" alt="helios logo">
						
						<p class="mt-4 mb-2"><?php echo lmd_get_mod('hel_about_contact', 'Let\'s collaborate!'); ?></p>

						<?php $var = lmd_get_mod('hel_about_email'); if(!empty($var)) { echo '<p class="mb-2">Email: '.$var.'</p>'; } ?>

						<?php $var = lmd_get_mod('hel_about_phone'); if(!empty($var)) { echo '<p class="mb-0">Phone: '.$var.'</p>'; } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<?php get_footer(); ?>