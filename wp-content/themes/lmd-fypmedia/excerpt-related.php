<article id="excerpt-<?php the_ID(); ?>" class="excerpt excerpt-related row match-height mb-3" role="article" itemscope itemtype="https://schema.org/NewsArticle">
	
	<div class="post-thumbnail col-5 col-match-height">
		<a itemprop="url" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
			<?php

				if ( has_post_thumbnail() ) {

					echo '<img itemprop="image" src="'.get_the_post_thumbnail_url(get_the_ID(), 'medium').'" class="lazyload img-fluid rounded-2" alt="'.lmd_get_img_alt(get_the_ID()).'">';
				
				} else {

					echo '<img itemprop="image" src="'.get_template_directory_uri().'/img/medium.jpg" class="lazyload img-fluid rounded-2" alt="'.get_the_title().'">';
				   
				}
			?>
		</a>
	</div>	

	<div class="post-content col-7 col-match-height pt-0">
		<h2 class="post-title clip-3" itemprop="headline"><a itemprop="url" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	</div>
</article>