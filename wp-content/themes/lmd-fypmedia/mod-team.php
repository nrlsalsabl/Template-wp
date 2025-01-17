<?php $query = new WP_Query( array(
	'post_type' => 'team',
	'post_status' => 'publish',
	'posts_per_page' => -1,
));

if ($query->have_posts()) : ?>
	<section class="teams">
		<div class="container overflow-hidden py-5">
			<span class="text-secondary">OUR TEAM</span>
			<h2 class="h3 fh fw-bold mb-4">Meet the Team</h2>

			<div class="row g-4 g-lg-5 match-height">
				
				<?php while ($query->have_posts()) : $query->the_post(); 
				
					echo '<div class="col-lg-4 col-match-height mb-5">';
					get_template_part( 'excerpt', 'team');
					echo '</div>';

				endwhile; ?>

			</div>
		</div>
	</section>		
<?php endif; ?>