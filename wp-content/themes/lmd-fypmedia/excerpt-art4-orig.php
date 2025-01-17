<article id="excerpt-<?php the_ID(); ?>" class="excerpt row match-height" role="article">
	
	<div class="post-thumbnail col-4 col-lg-4 col-match-height">
		<a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
			<?php

				if ( has_post_thumbnail() ) {

					echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(), 'thumbnail').'" class="lazyload img-fluid rounded-3" alt="'.lmd_get_img_alt(get_the_ID()).'">';
				
				} else {

					echo '<img src="'.get_template_directory_uri().'/img/thumbnail.jpg" class="lazyload img-fluid" alt="'.get_the_title().'">';
				   
				}
			?>
		</a>
	</div>

	<div class="post-content col-8 col-lg-8 col-match-height pt-0">
		
		<ul class="post-meta list-inline d-none d-lg-inline mb-1">
			<li class="list-inline-item"><span class="post-meta-category fs-8"><?php the_category(', '); ?></span></li>
		</ul>
		
		<h2 class="post-title fs-7 clip-3 mb-0" ><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	</div>
</article>