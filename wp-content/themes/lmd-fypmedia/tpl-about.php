<?php
/*
Template Name: LMD About FYPMedia
*/
get_header(); ?>
<div class="tpl-about">

	<section class="about_about">
		<div class="container py-5">
			<div class="row justify-content-center">
				<div class="col-md-9 col-lg-8 text-center">
					<p class="fs-5"><?php echo lmd_get_mod('ab_about_desc', 'Selamat datang di FYPMedia.id! Kami adalah sumber terkini untuk informasi seputar talent, manajemen talent, dan berita terbaru di berbagai industri. Didirikan dengan visi untuk menghubungkan para talenta berbakat dengan peluang yang tepat, serta menyediakan berita terupdate untuk menjaga Anda tetap terinformasi. Fypmedia.id juga memiliki'); ?></p>

					<h1 class="fs-2x fw-bold mb-3"><?php echo lmd_get_mod('ab_about_title', 'We Help You Boost <br>Your Brand'); ?></h1>

					<div class="about-buttons">
						<a class="btn btn-danger btn-lg mx-1 px-4 mb-3 mb-lg-0" href="<?php echo lmd_get_mod('ab_about_btn1_link', '#'); ?>"><?php echo lmd_get_mod('ab_about_btn1_label', 'Contact Us'); ?></a>
						<a class="btn btn-info btn-lg mx-1 px-4 mb-3 mb-lg-0" href="<?php echo lmd_get_mod('ab_about_btn2_link', '#'); ?>"><?php echo lmd_get_mod('ab_about_btn2_label', 'Meet The Talents'); ?></a>
					</div>
				</div>
			</div>
		</div><!--/container-->

		<div class="about-inside">
			<div class="container py-5">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center">
					<img class="img-fluid d-block mx-auto mt-4" src="<?php echo lmd_get_mod('ab_about_img', get_template_directory_uri().'/img/about-about.png'); ?>" alt="<?php echo get_bloginfo('name').' - '.get_bloginfo('description');  ?>">
				</div>
			</div>
		</div><!--/container-->
	</section><!--/about-->

	<?php $aktif = lmd_get_mod('ab_partner_aktif'); if($aktif == '1') {
	
	$entries = lmd_get_mod('ab_partner_gallery'); if(!empty($entries)) : ?>

		<section class="about_partners bg-white">
			<div class="container py-5 pb-3">
				<h2 class="h4 fh text-center fc-gray mb-4 fw-semibold"><?php echo lmd_get_mod('ab_partner_title', 'Tusted by'); ?></h2>

				<div id="carousel-partners" class="owl-carousel owl-theme">
					<?php $images = explode( ',', $entries);
					foreach ($images as $image) :

						echo '<img src="'.wp_get_attachment_image_url( $image, 'full').'" alt="'.lmd_get_img_alt($image).'">';
					
					endforeach; ?>
				</div>
			</div><!--/container-->
		</section><!--/partners-->

		<script>
			jQuery(document).ready(function(){
			  jQuery("#carousel-partners").owlCarousel({
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				loop:true,
				nav:false,
				dots:false,
				margin: 30,
				responsiveClass:true,
				responsive:{
					0:{
						items:3,
					},
					526:{
						items:5,
					},
					768:{
						items:7,
					}
				}
			  });
			});
		</script>
	
	<?php endif; ?>
	
	<?php $entries = lmd_get_mod('ab_partner_gallery2'); if(!empty($entries)) : ?>

		<section class="about_partners bg-white">
			<div class="container pb-5">
				<div id="carousel-partners2" class="owl-carousel owl-theme">
					<?php $images = explode( ',', $entries);
					foreach ($images as $image) :

						echo '<img src="'.wp_get_attachment_image_url( $image, 'full').'" alt="'.lmd_get_img_alt($image).'">';
					
					endforeach; ?>
				</div>
			</div><!--/container-->
		</section><!--/partners-->

		<script>
			jQuery(document).ready(function(){
			  jQuery("#carousel-partners2").owlCarousel({
				autoplay:true,
				autoplayTimeout:3500,
				autoplayHoverPause:true,
				loop:true,
				nav:false,
				dots:false,
				margin: 30,
				responsiveClass:true,
				responsive:{
					0:{
						items:3,
					},
					526:{
						items:5,
					},
					768:{
						items:7,
					}
				}
			  });
			});
		</script>
	
	<?php endif; 
	} //ab_partner_aktif?>


	<section class="about-commitment">
		<div class="container overflow-hidden py-5">
			<div class="row match-height gx-lg-5 align-items-center">
				<div class="col-lg-5 col-match-height text-center mb-3 mb-lg-0">
					<img class="img-fluid d-block mx-auto" src="<?php echo lmd_get_mod('ab_commitment_img', get_template_directory_uri().'/img/about-commitment.png'); ?>" alt="<?php echo lmd_get_mod('ab_commitment_title', 'Our Commitment'); ?>">
				</div>
				<div class="col-lg-7 col-match-height mb-3 mb-lg-0">
					 <h2 class="fh fs-2x fw-bold mb-4"><?php echo lmd_get_mod('ab_commitment_title', 'Our Commitment'); ?></h2>

					<div class="fs-5 mb-4"><?php echo lmd_get_mod('ab_commitment_desc', '<p>FYP Media is a proud Indonesian talent management company and has been building international influencers across the globe since 2018.</p><p>We have partnered with other companies and individuals from multiple industries to ensure that our services are not limited but growing. By helping brands navigate rapidly changing markets and pushing emerging businesses to be heard, we aim to create a solid digital communication that matters.</p>'); ?></div>

					<div class="row match-height">
						<div class="col-lg-4 col-match-height mb-3 mb-lg-0">
							<h2 class="fw-bold"><?php echo lmd_get_mod('ab_counter1_title', '1 Billions'); ?> <sup class="fc-pink">+</sup></h2>
							<p class="text-secondary mb-0"><?php echo lmd_get_mod('ab_counter1_subtitle', 'Views'); ?></p>
						</div>
						<div class="col-lg-4 col-match-height mb-3 mb-lg-0">
							<h2 class="fw-bold"><?php echo lmd_get_mod('ab_counter2_title', '12K'); ?> <sup class="fc-pink">+</sup></h2>
							<p class="text-secondary mb-0"><?php echo lmd_get_mod('ab_counter2_subtitle', 'Creative Talents'); ?></p>
						</div>
						<div class="col-lg-4 col-match-height">
							<h2 class="fw-bold"><?php echo lmd_get_mod('ab_counter3_title', '55'); ?> <sup class="fc-pink">+</sup></h2>
							<p class="text-secondary mb-0"><?php echo lmd_get_mod('ab_counter3_subtitle', 'Collaborations'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div><!--/container-->
	</section><!--/commitment-->


	<!--<section class="about_founder">-->
	<!--	<div class="container overflow-hidden py-5">-->
	<!--		<div class="row match-height gx-lg-5">-->
	<!--			<div class="col-lg-6 col-match-height order-2 text-center mb-3 mb-lg-0">-->
	<!--				<img class="img-fluid d-block mx-auto rounded-2" src="<?php echo lmd_get_mod('ab_founder_img', get_template_directory_uri().'/img/about-founder.png'); ?>" alt="<?php echo lmd_get_mod('ab_founder_title'); ?>">-->
	<!--			</div>-->
	<!--			<div class="col-lg-6 col-match-height order-1 mb-3 mb-lg-0">-->
	<!--				 <p class="text-uppercase mb-2 fc-blue"><?php echo lmd_get_mod('ab_founder_subtitle', 'Founder'); ?></p>-->

	<!--				 <div class="divider mb-4"></div>-->
					 
	<!--				 <h2 class="fh fs-2x fw-bold mb-4"><?php echo lmd_get_mod('ab_founder_title', 'Meet David Wijaya'); ?></h2>-->

	<!--				<div class="fs-5 mb-4"><?php echo lmd_get_mod('ab_founder_desc', 'an educational content creator who inspires and strives to grow together through FYP Media. FYP Media, leading the way in media and branding excellence'); ?></div>-->

	<!--				<div class="founder-buttons">-->
	<!--					<a class="btn btn-danger btn-lg mx-1 px-4 mb-3 mb-lg-0" href="<?php echo lmd_get_mod('ab_founder_btn_link', '#'); ?>"><?php echo lmd_get_mod('ab_founder_btn_label', 'Contact Us'); ?></a>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div><!--/container-->
	<!--</section><!--/founder-->

	<?php $aktif = lmd_get_mod('ab_team_aktif'); if($aktif == '1') {
		get_template_part('mod-team'); 
	} ?>

	<?php get_template_part('mod-collab'); ?>

</div>

<section class="footer">
    
<?php get_footer(); ?>
</section>