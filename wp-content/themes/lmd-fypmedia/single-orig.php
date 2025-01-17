<?php get_header(); $layout = lmd_get_mod('single_layout', 'full'); ?>

	<section class="lmd-main single-page">
		<div class="container">

			<section class="row justify-content-center">
				<main class="<?php if($layout == 'sidebar') { echo 'col-lg-8 col-12'; } else { echo 'col-lg-8'; } ?> lmd-content">

				<?php get_template_part('breadcrumb'); ?>
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); setPostViews(get_the_ID()); ;?>
						
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
						
						<article id="post-<?php the_ID(); ?>"  <?php post_class('mb-3'); ?> role="article">
							
							<?php $var = lmd_get_mod('single_thumbnail', 'ya'); 
							if($var == 'ya') { 
								
								if ( has_post_thumbnail() ) {

									echo '<div class="post-thumbnail mb-3">';
									echo '<img src="'.get_the_post_thumbnail_url(get_the_ID(), 'full').'" class="lazyload img-fluid rounded-3" alt="'.lmd_get_img_alt(get_the_ID()).'">';
									echo '</div>';
										
								} 
							} ?>

							<div class="post-content">
								<header class="post-header">
									<h1 class="single-post-title fw-bold"><?php the_title(); ?></h1>
								</header>

								<?php $var = lmd_get_mod('single_meta', 'ya'); if($var == 'ya') { ?>

									<ul class="post-meta nav mb-3">
										<li class="nav-item">
											<span class="nav-link author-name"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?></span>
										</li>

										<li class="nav-item"><span class="nav-link"><i class="fa fa-clock"></i>&nbsp;&nbsp;<?php the_time( get_option( 'date_format' ) ); ?></span></li>
										
										<?php echo '<li class="nav-item ml-auto"><span class="nav-link"><i class="fa fa-comments"></i> '; comments_popup_link('0', '1', '%'); echo '</span></li>'; ?>
									</ul>

								<?php } ?>

								<?php $var = lmd_get_mod('sharetop', 'tidak'); if($var == 'ya') { get_template_part('mod', 'share'); } ?>

								<section class="post-body">
									<?php the_content(); ?>

									<?php get_template_part('mod', 'pagelinks'); ?>
								</section>

								<footer class="post-footer clearfix">
									<ul class="list-inline post-meta">
										<li class="list-inline-item post-cat">Posted in: <?php the_category(', '); ?></li>
										<?php the_tags( '<li class="list-inline-item post-tags">Tagged: ', '&nbsp;', '</li>' ); ?>
									</ul>
								</footer>

								<?php $var = lmd_get_mod('sharebot'); if($var == 'ya') { get_template_part('mod', 'share'); } ?>
								
							</div>

						</article>

						<?php $var = lmd_get_mod('related', 'ya'); if($var == 'ya') { 

							lmd_related_posts( 'col-lg-4', 3, 'category', lmd_get_mod('related_title', 'Related Posts'));
						} ?>
									
					<?php endwhile; 
					
					$var = lmd_get_mod('komentar', 'ya'); if($var == 'ya') {

						$comtype = lmd_get_mod('komentar_type', 'wp'); 
						
						if($comtype == 'wp') {
						
							comments_template(); 
						
						} elseif($comtype == 'fb') {
							$comcount = lmd_get_mod('fb_comm_count', 5);

							echo '<div class="fb-comments" data-href="'.get_the_permalink().'" data-width="100%" data-numposts="'.$comcount.'"></div>';

						}

					} ?>

					<?php endif; ?>

				</main>

				<?php if($layout == 'sidebar') { get_sidebar(); } ?>
				
			</section><!--/row-->
		</div><!--/container-->
	</section><!--/lmd main-->

<?php get_footer(); ?>