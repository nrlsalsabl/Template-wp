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

	<div class="excerpt-content text-center">
		<h5 class="post-title fs-6 clip-2"><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h5>
	</div>
</article>