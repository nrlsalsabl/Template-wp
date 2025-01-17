<article id="excerpt-<?php the_ID(); ?>" class="excerpt-career p-4 rounded-3">
	<?php $var = get_post_meta(get_the_ID(), 'cr_lokasi', true); if(!empty($var)) { echo '<p class="ec-lok mb-0 text-uppercase">'.$var.'</p>'; } ?>
	
	<h2 class="ec-title h3 fw-bold mb-5"><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>

	<div class="ec-button mb-4"><a class="btn btn-info" href="<?php the_permalink(); ?>">Read More</a></div>
</article>