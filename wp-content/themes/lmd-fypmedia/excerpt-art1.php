<article id="excerpt-<?php the_ID(); ?>" class="excerpt hart1">
	<div class="hart1-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

			<?php if ( has_post_thumbnail() ) {

				the_post_thumbnail('medium', array('class' => 'lazyload img-fluid rounded-3') );
			
			} else {

				echo '<img src="'.get_template_directory_uri().'/img/medium.jpg" class="lazyload img-fluid rounded-3" />';
			   
			} ?>
		</a>

		<?php lmd_post_format( get_the_ID() ); ?>
	</div>

	<div class="hart1-content p-3 pt-2">
		<ul class="excerpt-meta list-inline d-none d-lg-inline mb-1">
			<li class="list-inline-item"><span class="post-meta-category fs-7"><?php the_category(', '); ?></span></li>
		</ul>

		<h5 class="post-title fs-5 clip-3 mb-0"><a class="text-white" href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h5>
	</div>
</article>