<?php get_header(); $layout = lmd_get_mod('page_layout', 'full'); ?>
	
	<section class="lmd-main">
		
		<div class="container">

			<section class="row justify-content-center">
				<main class="<?php if($layout == 'sidebar') { echo 'col-lg-8 col-12'; } else { echo 'col-lg-8'; } ?> lmd-content">
					
					<?php get_template_part('breadcrumb'); ?>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="page-<?php the_ID(); ?>"  <?php post_class(); ?> role="article">
							<div class="post-header">
								
								<h1 class="page-title fw-bold"><?php the_title(); ?></h1>

							</div>

							<div class="post-content">

								<section class="post-body">
									<?php the_content(); ?>

									<?php get_template_part('mod', 'pagelinks'); ?>
								</section>
								
							</div>

						</article>
									
					<?php endwhile; ?>

					<?php endif; ?>

				</main>

				<?php if($layout == 'sidebar') { get_sidebar(); } ?>
				
			</section><!--/row-->
		</div><!--/container-->
	</section><!--/lmd main-->

<?php get_footer(); ?>