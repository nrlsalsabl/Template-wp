<?php
/* Related Posts */
function lmd_related_posts( $col_class, $post_count, $taxonomy, $title) {
	
	global $post;
	
	// get the custom post type's taxonomy terms
	$custom_taxterms = wp_get_object_terms( $post->ID, $taxonomy, array('fields' => 'ids') );

	// arguments
	$args = array(
    'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => $post_count,
	'orderby' => 'rand',
	'post__not_in' => array ($post->ID),
    'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'id',
				'terms'    => $custom_taxterms,
			),
		),
	);

	$related_items = new WP_Query( $args );

	echo '<div class="lmd-related-post py-3">';

	// loop over query
	if ($related_items->have_posts()) :

		echo '<h2 class="related-title h5 fw-semibold"><span>'.$title.'</span></h2>';
		echo '<div class="row match-height">';

			while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
					
				<div class="col-match-height <?php echo $col_class; ?>">
					
					<?php get_template_part('excerpt', 'related'); ?>
					
				</div>
		
			<?php endwhile;
			
		echo '</div>';
		wp_reset_postdata();

		else: endif;

	echo '</div>';

} /* End of lmd related posts */


/* Related Posts */
function lmd_baca_juga( $post_count, $taxonomy, $title, $style, $posisi) {
	
	global $post;
	
	// get the custom post type's taxonomy terms
	$custom_taxterms = wp_get_object_terms( $post->ID, $taxonomy, array('fields' => 'ids') );

	// arguments
	$args = array(
    'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => $post_count,
	'orderby' => 'rand',
	'post__not_in' => array ($post->ID),
    'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'id',
				'terms'    => $custom_taxterms,
			),
		),
	);

	$related_items = new WP_Query( $args );

	echo '<div id="bacaJuga" class="lmd-baca-juga bg-light my-3 p-3 border">';

	// loop over query
	if ($related_items->have_posts()) :

		echo '<h2 class="h5 fw-semibold mb-3"><span>'.$title.'</span></h2>';
		echo '<div class="row match-height">';

			$i = 0; while ( $related_items->have_posts() ) : $related_items->the_post(); $i++; ?>
					
				<div class="<?php echo 'bj-'.$i.' '; if($style == 'grid') { echo 'col-lg-4'; } else { echo 'col-12'; } ?> col-match-height mb-2">
					
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					
				</div>
		
			<?php endwhile;
			
		echo '</div>';
		wp_reset_postdata();

		else: endif;

	echo '</div>';

} /* End of lmd related posts */