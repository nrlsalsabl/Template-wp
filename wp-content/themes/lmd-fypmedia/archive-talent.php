<?php get_header(); ?>

	<section class="lmd-main archive-page">

		<div class="container">

			<?php get_template_part('breadcrumb'); ?>

			<div class="archive-header mb-5">
				<h1 class="fh fw-bold">Our talents (2024)</h1>
				<p class="text-secondary"><em><?php echo lmd_get_mod('ta_desc', 'Whether you have a question about talents, pricing, portfolio, or anything else, our team is ready to answer all your queries.'); ?></em></p>
			</div>

			<main class="lmd-content">
					
				<?php if (have_posts()) {
					
					echo '<div class="post-items row gx-lg-5 match-height">';
				
						while (have_posts()) : the_post();

							echo '<div class="col-lg-4 col-match-height mb-5">';
							get_template_part( 'excerpt', 'talent');
							echo '</div>';
						
						endwhile;

					bootstrap_pagination();
				
				} else {

					get_template_part('lmd-nothing');
				
				} //endif ?>

			</main>
		</div><!--/container-->
	</section><!--/lmd main-->

<sectin class="footer">
    
<?php get_footer(); ?>
</sectin>