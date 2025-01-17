<?php get_header(); ?>
	
	<?php if (have_posts()) : the_post(); setPostViews(get_the_ID()); ?>
		<section class="lmd-main">
			<div class="container overflow-hidden">
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

				<div class="row match-height gx-lg-5">
					<div class="col-lg-6 col-match-height mb-3">
						
						<?php if ( has_post_thumbnail() ) {

							echo '<div class="talent-thumbnail d-flex justify-content-center align-item-center mb-3">';
							echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(), 'full').'" class="lazyload img-fluid rounded-3" alt="'.lmd_get_img_alt(get_the_ID()).'">';
							echo '</div>';
								
						} ?>

					</div>
					<div class="col-lg-6 col-match-height">

						<h1 class="mb-3 fh fw-bold"><?php the_title(); ?></h1>

						<div class="tl-desc mb-4">
							<?php the_content(); ?>

							<h2 class="h3 fh fw-bold mb-4 mt-4">Biodata</h2>

							<div class="row mb-3">
								<div class="col-lg-4 text-secondary">
									Domisili
								</div>
								<div class="col-lg-8 fw-bold">
									<?php $var = get_post_meta(get_the_ID(), 'tl_alamat', true); if(!empty($var)) { echo $var; } else { echo '-'; } ?>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-lg-4 text-secondary">
									Jenis Konten
								</div>
								<div class="col-lg-8 fw-bold">
									<?php $var = get_post_meta(get_the_ID(), 'tl_konten', true); if(!empty($var)) { echo $var; } else { echo '-'; } ?>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-lg-4 text-secondary">
									Hobi
								</div>
								<div class="col-lg-8 fw-bold">
									<?php $var = get_post_meta(get_the_ID(), 'tl_hobby', true); if(!empty($var)) { echo $var; } else { echo '-'; } ?>
								</div>
							</div>
						</div>

						<div class="tl-platforms">
							<h2 class="h3 fh fw-semibold">Visit Their Platforms</h2>

							<ul class="tl-socmed list-inline fs-2">
								<?php $var = get_post_meta(get_the_ID(), 'tl_facebook', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>'; } ?>

								<?php $var = get_post_meta(get_the_ID(), 'tl_youtube', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-youtube"></i></a></li>'; } ?>

								<?php $var = get_post_meta(get_the_ID(), 'tl_instagram', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-instagram"></i></a></li>'; } ?>

								<?php $var = get_post_meta(get_the_ID(), 'tl_twitter', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-twitter"></i></a></li>'; } ?>

								<?php $var = get_post_meta(get_the_ID(), 'tl_tiktok', true); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-tiktok"></i></a></li>'; } ?>
							</ul>
						</div>
					</div>

				</div>

			</div>
		</section>

		<?php $entries = get_post_meta(get_the_ID(), 'tl_featured', true); if(!empty($entries)) : ?>
			<section class="tl-featured pt-0 pt-lg-4">
				<div class="container overflow-hidden py-5">
					<span class="text-secondary">SHOWCASE</span>
					<h2 class="h3 fh fw-bold mb-4">Featured Content</h2>

					<div class="row match-height tl-content">
						
						<?php foreach ( (array)$entries as $key => $entry) :

							$jenis = $judul = $link = $thumbnail = '';

							if ( isset( $entry['jenis'] ) ) {
								$jenis = $entry['jenis'];
							}
							if ( isset( $entry['judul'] ) ) {
								$judul = $entry['judul'];
							}
							if ( isset( $entry['link'] ) ) {
								$link = $entry['link'];
							}
							if ( isset( $entry['thumbnail'] ) ) {
								$thumbnail = $entry['thumbnail'];
							} ?>

							<div class="col-lg-4 col-match-height tl-item mb-3">
								<div class="tl-thumb mb-2 vidcenter">
									<img src="<?php echo $thumbnail; ?>" alt="<?php echo $judul; ?>" class="lazyload img-fluid rounded-2"/>

									<?php if($jenis == 'youtube') {
										echo '<div class="vidplay"><a class="btn-play fw-bold" href="'.$link.'" title="Play Video" role="button"><i class="fa fab fa-youtube"></i></a></div>';
									} ?>
								</div>
								<h3 class="tl-item-title text-center h5"><a href="<?php echo $link; ?>" target="_blank"><?php echo $judul; ?></a></h3>
							</div>
						
						<?php endforeach; ?>										

					</div>
				</div>
			</section>		
		<?php endif; ?>

		<?php $query = new WP_Query( array(
		'post_type'			=> 'post',
		'post_status'		=> 'publish',
		'meta_key' => 'talent',
		'meta_value' => get_the_ID(),
		'posts_per_page'	=> 3,
		) );

		if ($query->have_posts()) : ?>

		<section class="tl-blogs">
			<div class="container overflow-hidden pb-5">
				<h2 class="h3 fh fw-bold mb-4">Blog</h2>

				<div class="row match-height">
					
					<?php while ($query->have_posts()) : $query->the_post(); ?>
					
					<div class="col-lg-4 col-match-height mb-3">
						<?php get_template_part('excerpt-blog'); ?>
					</div>

					<?php endwhile; ?>

				</div>
				
				
			</div>
		</section>

		<?php endif; //no blog yet ?>

	<?php endif; ?>

	<?php get_template_part('mod-collab'); ?>

<section class="footer">
    
<?php get_footer(); ?>
</section>