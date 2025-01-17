<article id="excerpt-<?php the_ID(); ?>" class="excerpt excerpt-grid">
	<div class="excerpt-thumbnail mb-2">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

			<?php if ( has_post_thumbnail() ) {

				the_post_thumbnail('landscape', array('class' => 'lazyload img-fluid rounded-3') );
			
			} else {

				echo '<img src="'.get_template_directory_uri().'/img/landscape.jpg" class="lazyload img-fluid rounded-3" />';
			   
			} ?>
		</a>
	</div>

	<div class="excerpt-content">
		<ul class="excerpt-meta list-inline d-none d-lg-inline mb-1">
			<li class="list-inline-item"><span class="post-meta-category fs-7"><?php the_category(', '); ?></span></li>
		</ul>

		<h5 class="post-title fs-6 clip-2"><a class="text-white" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h5>

		<ul class="excerpt-meta list-inline">
			<li class="list-inline-item"><span class="fs-7 text-white"><?php the_time( get_option( 'date_format' ) ); ?></span></li>
		</ul>
	</div>
</article>