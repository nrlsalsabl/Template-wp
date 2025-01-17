<?php get_header(); ?>

	<section class="lmd-main archive-page">

		<div class="container">

			<?php get_template_part('breadcrumb'); ?>

			<div class="archive-header mb-5">
				<h1 class="fh fw-bold">Search Result</h1>
			</div>

			<main class="lmd-content">
					
				<?php if (have_posts()) {
					
					echo '<div class="post-items row gx-lg-5 match-height">';
				
						while (have_posts()) : the_post();

							echo '<div class="col-lg-4 col-match-height mb-5">';
							
								if(get_post_type( get_the_ID() ) == 'talent') {

									get_template_part( 'excerpt', 'talent' );
									
								} elseif(get_post_type( get_the_ID() ) == 'career') {

									get_template_part( 'excerpt', 'career' );
									
								} else {
									
									get_template_part( 'excerpt', 'blog' );

								}

								get_template_part( 'excerpt', 'ldjson');

							echo '</div>';
						
						endwhile;

					bootstrap_pagination();
				
				} else {

					get_template_part('lmd-nosearch');
				
				} //endif ?>

			</main>
		</div><!--/container-->
	</section><!--/lmd main-->

<?php get_footer(); ?>