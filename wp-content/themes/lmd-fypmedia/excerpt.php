<article id="excerpt-<?php the_ID(); ?>" class="excerpt row match-height" role="article">
	
	<?php $thumb = lmd_get_mod('blog_thumbnail', 'ya'); if($thumb == 'ya') { ?>
		<div class="post-thumbnail <?php if( has_post_format( 'aside' )) { echo 'col-4 col-lg-2'; } else { echo 'col-5 col-lg-3'; } ?> col-match-height">
			<a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
				<?php

					if ( has_post_thumbnail() ) {

						echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(), 'landscape').'" class="lazyload img-fluid rounded-2" alt="'.lmd_get_img_alt(get_the_ID()).'">';
					
					} else {

						echo '<img src="'.get_template_directory_uri().'/img/landscape.jpg" class="lazyload img-fluid rounded-2" alt="'.get_the_title().'">';
					   
					}
				?>
			</a>
		</div>
	<?php } ?>

	<div class="post-content <?php if($thumb == 'ya') { if( has_post_format( 'aside' )) { echo 'col-8 col-lg-10'; } else { echo 'col-7 col-lg-9'; } } else { echo 'col-12'; } ?> col-match-height pt-0">
		
		<?php $var = lmd_get_mod('blog_meta_category', 'ya'); if($var == 'ya') { ?>
			<ul class="post-meta list-inline d-none d-lg-inline mb-1">
				<li class="list-inline-item"><i class="fa fa-tags"></i> <span class="post-meta-category"><?php the_category(', '); ?></span></li>
			</ul>
		<?php } ?>
		
		<h2 class="post-title" ><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>

		<?php $var = lmd_get_mod('blog_excerpt', 'tidak'); if($var == 'ya') { $vor = lmd_get_mod('excerpt_count', 20); ?>
			<section class="post-body d-none d-lg-block">
				<?php lmd_limit_words( get_the_excerpt(), $vor )?>
			</section>
		<?php } ?>

		<?php $var = lmd_get_mod('blog_meta', 'ya'); if($var == 'ya') { ?>
			<ul class="post-meta list-inline d-none d-lg-inline">
				<?php $var = lmd_get_mod('blog_meta_author', 'ya'); if($var == 'ya') { ?>
					<li class="list-inline-item"><i class="fa fa-user"></i> <span class="post-meta-author"><?php the_author_posts_link(); ?></span></li>
				<?php } ?>

				<?php $var = lmd_get_mod('blog_meta_date', 'ya'); if($var == 'ya') { ?>
					<li class="list-inline-item"><i class="fa fa-clock"></i> <span class="post-meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span></li>
				<?php } ?>		
			</ul>
		<?php } ?>

		<p class="readmore mb-0 fs-8"><a href="<?php the_permalink(); ?>">Baca Selengkapnya &raquo;</a></p>
	</div>
</article>