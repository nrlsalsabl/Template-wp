<article id="talent-<?php the_ID(); ?>" class="excerpt-talent" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
	<a class="d-block" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
		<img class="d-none" src="<?php echo get_template_directory_uri().'/img/talent.png'; ?>" alt="<?php the_title(); ?>">

		<div class="et-overlay"></div>
	</a>

	<div class="et-content">
		<div class="et-content-inner">
			<h2 class="et-title h3 p-4 py-2 fw-semibold"><a class="d-block" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="et-desc px-4 py-2">		
				<a class="d-block" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php lmd_limit_words( get_the_excerpt(), 20 ); ?></a>
			</div>

			<ul class="et-socmed list-inline px-4 py-3">
				<?php $var = get_post_meta(get_the_ID(), 'tl_facebook', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>'; } ?>

				<?php $var = get_post_meta(get_the_ID(), 'tl_youtube', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-youtube"></i></a></li>'; } ?>

				<?php $var = get_post_meta(get_the_ID(), 'tl_instagram', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-instagram"></i></a></li>'; } ?>

				<?php $var = get_post_meta(get_the_ID(), 'tl_twitter', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-twitter"></i></a></li>'; } ?>

				<?php $var = get_post_meta(get_the_ID(), 'tl_tiktok', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-tiktok"></i></a></li>'; } ?>
			</ul>
		</div>
	</div>	
</article>