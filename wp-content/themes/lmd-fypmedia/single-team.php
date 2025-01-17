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

							<h2 class="h3 fh fw-bold mb-4">Biodata</h2>

							<div class="row mb-3">
								<div class="col-lg-4 text-secondary">
									Domisili
								</div>
								<div class="col-lg-8 fw-bold">
									<?php $var = get_post_meta(get_the_ID(), 'ta_alamat', true); if(!empty($var)) { echo $var; } else { echo '-'; } ?>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-lg-4 text-secondary">
									Jobdesc
								</div>
								<div class="col-lg-8 fw-bold">
									<?php $var = get_post_meta(get_the_ID(), 'ta_job', true); if(!empty($var)) { echo $var; } else { echo '-'; } ?>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-lg-4 text-secondary">
									Hobi
								</div>
								<div class="col-lg-8 fw-bold">
									<?php $var = get_post_meta(get_the_ID(), 'ta_hobby', true); if(!empty($var)) { echo $var; } else { echo '-'; } ?>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>

	<?php endif; ?>

<?php get_footer(); ?>