<?php 
/*
Template Name: LMD Elementor Full
*/
get_header(); ?>
	
	<section class="lmd-main">
		
		<div class="container">
					
			<?php if (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endif; ?>

		</div><!--/container-->
	</section><!--/lmd main-->


<section class="footer">
    
<?php get_footer(); ?>
</section>