<?php
/*
Template Name: LMD Contact
*/
get_header(); ?>
<div class="tpl-contact pb-4">

	<section class="about_about">
		<div class="container py-5">
			<h1 class="fs-2x fw-bold mb-3"><?php echo lmd_get_mod('co_title', 'Drop Us a Message'); ?></h1>

			<p class="fs-5 mb-5"><?php echo lmd_get_mod('co_subtitle', 'Whether you have a question about talents, pricing, portfolio, or anything else, our team is ready to answer all your queries.'); ?></p>

			<?php echo do_shortcode(lmd_get_mod('co_cf7')); ?>

		</div><!--/container-->
	</section><!--/about-->

	<?php echo lmd_get_mod('co_gmap'); ?>

</div>

<section class="footer">
    
<?php get_footer(); ?>
</section>