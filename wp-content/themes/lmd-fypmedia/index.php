<?php get_header(); $layout = lmd_get_mod('blog_layout', 'full'); ?>

	<section class="lmd-main tpl-index">
		
		<?php get_template_part('mod-ads-sticky'); ?>

		<div class="container">

			<?php get_template_part('breadcrumb'); ?>

			<section class="row">
				<main class="<?php if($layout == 'sidebar') { echo 'col-lg-8 col-12'; } else { echo 'col-12'; } ?> lmd-content">
					
					<?php if (have_posts()) { 
						$i = 0;
						
						echo '<div class="post-items">';
					
							while (have_posts()) : the_post();
								$i++;								

								if($i != 1) {
									echo '<div class="row divider mx-0 my-3 my-lg-4"></div>';
								}

								get_template_part( 'excerpt');
								get_template_part( 'excerpt', 'ldjson');
							
							endwhile;

						echo '<div class="row mx-0 my-3 my-lg-4"></div></div>';

						bootstrap_pagination();
					
					} else {

						get_template_part('lmd-nothing');
					
					} //endif ?>

				</main>

				<?php if($layout == 'sidebar') { get_sidebar(); } ?>
				
			</section><!--/row-->
		</div><!--/container-->
	</section><!--/lmd main-->

<?php get_footer(); ?>