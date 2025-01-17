<?php get_header(); $layout = lmd_get_mod('blog_layout', 'full'); ?>

	<section class="lmd-main archive-page">

		<div class="container">

			<?php get_template_part('breadcrumb'); ?>

			<div class="archive-header">
				<?php if (is_category()) { ?>
					<h1 class="h2 fw-semibold"><span><?php single_cat_title(); ?></span></h1>

				<?php } elseif( is_tag() ) { ?>
					<h1 class="h2 fw-semibold"><span><?php single_tag_title(); ?></span></h1>

				<?php } elseif (is_day()) { ?>
					<h1 class="h2 fw-semibold"><span><?php the_time( get_option( 'date_format' ) ); ?></span></h1>

				<?php } elseif (is_month()) { ?>
					<h1 class="h2 fw-semibold"><span><?php the_time('F, Y'); ?></span></h1>

				<?php } elseif (is_year()) { ?>
					<h1 class="h2 fw-semibold"><span><?php the_time('Y'); ?></span></h1>

				<?php } elseif (is_author()) { ?>
					<h1 class="h2 fw-semibold"><span><?php the_author(); ?></span></h1>

				<?php } ?>

				<?php $var = get_the_archive_description(); if(!empty($var)) { echo '<div class="col-md-8"><em class="text-secondary">'.$var.'</em></div>'; }?>
			</div>

			<div class="row mx-0 my-3 my-lg-4"></div>

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