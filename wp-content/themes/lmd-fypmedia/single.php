<?php get_header(); $layout = lmd_get_mod('single_layout', 'full'); ?>

	<section class="lmd-main single-page">
		<div class="container">
			<?php if (have_posts()) : the_post(); setPostViews(get_the_ID()); ;?>

			<section class="post-header">
				<p class="post-meta-cat mb-0"><?php the_category(', '); ?></p>

				<h1 class="single-post-title fw-bold"><?php the_title(); ?></h1>
			</section>

			<section class="row justify-content-center">
				<main class="col-lg-8 lmd-content">
					<script type="application/ld+json">
					{
					  "@context": "https://schema.org",
					  "@type": "NewsArticle",
					  "headline": "<?php the_title(); ?>",
					  "image": [
						"<?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail_url(get_the_ID(), 'full'); } else { echo get_template_directory_uri().'/img/medium.jpg'; } ?>"
					   ],
					  "datePublished": "<?php echo get_the_date( DATE_W3C ); ?>",
					  "dateModified": "<?php echo get_the_modified_date( DATE_W3C ); ?>",
					  "author": [{
						  "@type": "Person",
						  "name": "<?php the_author_meta( 'display_name' , get_the_author_meta( 'ID' ) ); ?>",
						  "url": "<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"
						}]
					}
					</script>

					<div class="row align-items-center">
						<div class="col mb-3">
							<span class="post-meta-date"><?php the_date( get_option( 'date_format' ) ); ?> <?php the_time( get_option( 'time_format' ) ); ?></span>
						</div>

						<?php $var = lmd_get_mod('social_share'); if(!empty($var)) { ?>
							<div class="col mb-3 ms-auto d-flex">
								<span class="post-meta-share ms-auto"><?php echo do_shortcode( $var ); ?></span>
							</div>
						<?php } ?>
					</div>
						
					<article id="post-<?php the_ID(); ?>"  <?php post_class('mb-3'); ?> role="article">
						
						<?php $var = lmd_get_mod('single_thumbnail', 'ya'); 
						if($var == 'ya') { 
							
							if ( has_post_thumbnail() ) {
								
								$image_id = get_post_thumbnail_id( get_the_ID() );
								$attachment = get_post($image_id);
								$image_caption = $attachment->post_excerpt;

								echo '<div class="post-thumbnail single-post-thumbnail mb-3">';
								echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(), 'full').'" class="lazyload img-fluid rounded-3" alt="'.lmd_get_img_alt(get_the_ID()).'">';

								lmd_post_format( get_the_ID() );
								
								if(!empty($image_caption)) { echo '<div class="post-thumbnail-caption pt-2 fs-8"><em>'.$image_caption.'</em></div>'; } 

								echo '</div>';
									
							} 
						} ?>

						<div class="post-content" style="text-align: justify;">
							
							<?php $entries = get_post_meta(get_the_ID(), 'pa_authors', true); if(!empty($entries)) : ?>
								<ul class="post-authors list-inline">
									
								<?php foreach ( (array)$entries as $key => $entry) :

									$title = $name = '';

									if ( isset( $entry['title'] ) ) {
										$title = $entry['title'];
									}
									if ( isset( $entry['name'] ) ) {
										$name = $entry['name'];
									}

									echo '<li class="list-inline-item">'.$title.': <span>'.$name.'</span></li>';

								endforeach; ?>

								</ul>
							<?php endif; ?>

							<section class="post-body">
								<?php the_content(); ?>

								<?php get_template_part('mod', 'pagelinks'); ?>
							</section>

							<footer class="post-footer clearfix">
								<ul class="list-inline">
									<?php the_tags( '<li class="list-inline-item post-tags"><span class="me-3">Tags:</span> ', '&nbsp;', '</li>' ); ?>
								</ul>
							</footer>
							
						</div>

					</article>

					<?php $var = lmd_get_mod('related', 'ya'); if($var == 'ya') { 

						lmd_related_posts( 'col-lg-4', 3, 'category', lmd_get_mod('related_title', 'Related Posts'));
					} ?>
									
					<!--< ?php $var = lmd_get_mod('komentar', 'ya'); if($var == 'ya') {-->

					<!--	$ comtype = lmd_get_mod('komentar_type', 'wp'); -->
						
					<!--	if ($comtype == 'wp') {-->
						
					<!--		comments_template() ; -->
						
					<!--	} e lseif($comtype == 'fb') {-->
					<!--		$co mcount = lmd_get_mod('fb_comm_count', 5);-->

					<!--		ech o '<div class="fb-comments" data-href="'.get_the_permalink().'" data-width="100%" data-numposts="'.$comcount.'"></div>';-->

					<!--	 }-->

					<!--} ?>					-->

				</main>

				<?php get_sidebar(); ?>
				
			</section><!--/row-->

			<?php endif; ?>

		</div><!--/container-->
	</section><!--/lmd main-->

<?php get_footer(); ?>