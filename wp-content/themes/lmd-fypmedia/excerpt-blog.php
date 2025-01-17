<article id="excerpt-<?php the_ID(); ?>" class="card text-bg-dark rounded-2">
	<div class="card-img-topx">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

			<?php if ( has_post_thumbnail() ) {

				the_post_thumbnail('landscape', array('class' => 'lazyload img-fluid card-img-top') );
			
			} else {

				echo '<img src="'.get_template_directory_uri().'/img/landscape.jpg" class="lazyload img-fluid card-img-top" />';
			   
			} ?>
		</a>
	</div>

	<div class="card-overlay"></div>

	<div class="card-body">
		<h5 class="card-title clip-2"><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h5>

		<p class="mb-0"><?php lmd_limit_words( get_the_excerpt(), 14 )?></p>
	</div>

	<div class="card-footer text-body-secondary">
		<ul class="card-meta list-inline mb-0">
			<li class="list-inline-item"><span class="card-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span></li>
		</ul>
	</div>
</article>