<?php 
/*
Template Name: LMD Elementor Header Footer Only
*/
get_header(); ?>

	<?php if (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
	<?php endif; ?>

<!--?php get_footer(); ?>-->


<section class="footer">
    
<?php get_footer(); ?>
</section>