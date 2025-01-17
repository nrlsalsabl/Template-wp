<article id="talent-<?php the_ID(); ?>" class="excerpt-talent excerpt-team" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
	<a class="d-block" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
		<img class="d-none" src="<?php echo get_template_directory_uri().'/img/talent.png'; ?>" alt="<?php the_title(); ?>">

		<div class="et-overlay"></div>
	</a>

	<div class="et-content">
		<div class="et-content-inner pb-4">
			<h2 class="et-title h3 p-4 pt-2 pb-0 fw-semibold"><a class="d-block" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<ul class="et-socmed list-inline px-4 py-0">
				<?php $var = get_post_meta(get_the_ID(), 'ta_job', true); if(!empty($var)) { echo '<li class="list-inline-item">'.$var.'</li>'; } ?>
			</ul>

			<div class="et-desc px-4 py-2">		
				<a class="d-block" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php lmd_limit_words( get_the_excerpt(), 50 ); ?></a>
			</div>
		</div>
	</div>	
</article>