<?php 
/*
Template Name: LMD Elementor
*/
get_header(); $layout = lmd_get_mod('page_layout', 'full'); ?>
	
	<section class="lmd-main">
		
		<div class="container">

			<section class="row justify-content-center">
				<main class="<?php if($layout == 'sidebar') { echo 'col-lg-8 col-12'; } else { echo 'col-lg-8'; } ?> lmd-content">
					
					<?php if (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endif; ?>

				</main>

				<?php if($layout == 'sidebar') { get_sidebar(); } ?>
				
			</section><!--/row-->
		</div><!--/container-->
	</section><!--/lmd main-->

<section class="footer">
    
<?php get_footer(); ?>
</section>