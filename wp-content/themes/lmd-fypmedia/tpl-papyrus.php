<?php
/*
Template Name: LMD About Papyrus
*/
get_header(); ?>
<div class="tpl-papyrus">

	<section class="pap-welcome sliders">
		<div class="slider-item">
			<img class="lazyload img-fluid" src="<?php echo lmd_get_mod('pap_welcome_img', get_template_directory_uri().'/img/papyrus-welcome-img.png'); ?>" alt="<?php echo lmd_get_mod('pap_about_title', 'Papyrus'); ?>">
		</div>
	</section>

	<div class="pap-about row gx-0 match-height">
		<div class="pap-about-left col-lg-6 col-match-height bg-info p-5 d-flex align-items-center justify-content-center">
			
			<div class="pap-about-about p-3 p-lg-5">
				<h1 class="fh fw-bold text-black mb-4"><?php echo lmd_get_mod('pap_about_title', 'Papyrus'); ?></h1>
				<p class="text-dark"><?php echo lmd_get_mod('pap_about_desc', 'Selamat datang di Papyrus Corp! Kami adalah tim profesional yang berdedikasi untuk membantu Anda menciptakan berita yang informatif, menarik, dan berkualitas tinggi baik dalam jasa pembuatan website, artikel dan berita maupun penulisan buku. Dengan pengalaman dalam industri jurnalistik dan komitmen terhadap standar tertinggi, kami siap membantu Anda mengomunikasikan cerita Anda kepada dunia.'); ?></p>
			</div>

		</div>
		<div class="pap-about-right col-lg-6 col-match-height  p-5 text-center d-flex align-items-center justify-content-center">
			
				<div class="pap-about-contact">
					<img class="lazyload img-fluid" src="<?php echo lmd_get_mod('pap_about_logo', get_template_directory_uri().'/img/papyrus-logo.png'); ?>" alt="papyrus logo">
					
					<p class="mt-4 mb-2"><?php echo lmd_get_mod('pap_about_contact', 'Let\'s collaborate!'); ?></p>

					<?php $var = lmd_get_mod('pap_about_email'); if(!empty($var)) { echo '<p class="mb-2">Email: '.$var.'</p>'; } ?>

					<?php $var = lmd_get_mod('pap_about_phone'); if(!empty($var)) { echo '<p class="mb-0">Phone: '.$var.'</p>'; } ?>
				</div>

		</div>
	</div>

</div>
<?php get_footer(); ?>