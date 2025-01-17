<?php get_header(); ?>

	<section class="lmd-main archive-page">

		<div class="container">

			<?php get_template_part('breadcrumb'); ?>

			<div class="archive-header mb-5">
				<h1 class="fh fw-bold"><?php echo lmd_get_mod('ca_title', 'Place to Grow Your Skill'); ?></h1>
				<p class="text-secondary"><em><?php echo lmd_get_mod('ca_desc', 'Start finding your purpose with us. See our latest vacancies below.'); ?></em></p>
			</div>

			<main class="lmd-content">
					
				<?php if (have_posts()) {
					
					echo '<div class="post-items row gx-lg-5 match-height">';
				
						while (have_posts()) : the_post();

							echo '<div class="col-lg-4 col-match-height mb-5">';
							get_template_part( 'excerpt', 'career');
							echo '</div>';
						
						endwhile;

					bootstrap_pagination();

					$aktif = lmd_get_mod('ca_team_aktif'); if($aktif == '1') {
						get_template_part('mod-team'); 
					}
				
				} else {

					get_template_part('lmd-nothing');
				
				} //endif ?>

			</main>
		</div><!--/container-->
	</section><!--/lmd main-->

<?php get_footer(); ?>