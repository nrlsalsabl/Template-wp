<article id="excerpt-<?php the_ID(); ?>" class="excerpt row match-height" role="article">
	
	<div class="post-thumbnail col-7 col-lg-7 col-match-height vidcenter">
		<a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
			<?php

				if ( has_post_thumbnail() ) {

					echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(), 'landscape').'" class="lazyload img-fluid rounded-3" alt="'.lmd_get_img_alt(get_the_ID()).'">';
				
				} else {

					echo '<img src="'.get_template_directory_uri().'/img/landscape.jpg" class="lazyload img-fluid rounded-3" alt="'.get_the_title().'">';
				   
				}
			?>
		</a>

		<?php lmd_post_format( get_the_ID() ); ?>
	</div>

	<div class="post-content col-5 col-lg-5 col-match-height pt-0">
		
		<ul class="post-meta list-inline d-none d-lg-inline mb-1">
			<li class="list-inline-item"><span class="post-meta-category fs-8"><?php the_category(', '); ?></span></li>
		</ul>
		
		<h2 class="post-title fs-7 clip-3 mb-3" ><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>

		<section class="post-body d-none d-lg-block fs-8">
			<?php lmd_limit_words( get_the_excerpt(), 20 )?>
		</section>

		<p class="readmore mb-0 fs-8"><a href="<?php the_permalink(); ?>">Baca Selengkapnya &raquo;</a></p>
	</div>
</article>