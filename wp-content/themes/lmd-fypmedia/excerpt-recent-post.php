<li class="lmd-recent-item mb-2">
	<div class="row match-height row-sgt">
		<div class="col-match-height col-5">
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
					<?php

					if ( has_post_thumbnail() ) {

						echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(), 'medium').'" class="lazyload img-fluid rounded-2" alt="'.lmd_get_img_alt(get_the_ID()).'">';
					
					} else {

						echo '<img src="'.get_template_directory_uri().'/img/medium.jpg" class="lazyload img-fluid rounded-2" alt="'.get_the_title().'">';
					   
					}
				?>
				</a>
			</div>
		</div>

		<div class="col-match-height col-7">
			<div class="post-content">				
				<h2 class="fs-6 mb-0" ><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<ul class="post-meta list-inline mb-0">
					<li class="list-inline-item fs-8"><span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span></li>
				</ul>
			</div>
		</div>
	</div>
</li>	