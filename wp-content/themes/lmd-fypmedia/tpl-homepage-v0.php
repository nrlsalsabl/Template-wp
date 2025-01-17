<?php 
/*
Template Name: LMD Homepage v0
*/
get_header(); ?>

<div class="tpl-home">

	<?php //1st query
	$hwel_query = lmd_get_mod('hwel_query'); 
	$hwel_count = 1;

	if($hwel_query == 'hwel_pilihan') {
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $hwel_count,
			'meta_key' => 'pilihan',
			'meta_value' => '1',
		);
	} else {
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $hwel_count,
		);
	}

	$query = new WP_Query($args);

	while ($query->have_posts()) : $query->the_post(); ?>
		
		<section class="home-welcome" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
			
			<?php get_template_part( 'excerpt', 'ldjson'); ?>
			<div class="home-welcome-overlay"></i>

			<div class="home-welcome-content">
				<div class="container pb-3">
					
					<p class="home-welcome-category mb-0 fc-blue">Artikel<?php //the_category(', '); ?></p>
					<h1 class="h2 fh fw-semibold"><a class="text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p class="home-welcome-date  mb-4 text-white"><?php the_time( get_option( 'date_format' ) ); ?></p>

					<?php //2nd query
					$hwel_query = lmd_get_mod('hwel_query'); 
					$hwel_count2 = lmd_get_mod('hwel_carousel', 5)+1;

					if($hwel_query == 'hwel_pilihan') {
						$args2 = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hwel_count2,
							'offset' => 1,
							'meta_key' => 'pilihan',
							'meta_value' => '1',
						);
					} else {
						$args2 = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hwel_count2,
							'offset' => 1,
						);
					}

					$query2 = new WP_Query($args2); if ($query2->have_posts()) : ?>

					<div id="home-welcome-carousel" class="owl-carousel owl-theme">

						<?php while ($query2->have_posts()) : $query2->the_post(); 
							
							echo '<div class="hw-carousel-item">';
								get_template_part('excerpt', 'carousel');
								get_template_part( 'excerpt', 'ldjson');
							echo '</div>';

						endwhile; wp_reset_query(); ?>

					</div>
					<script>
						jQuery(document).ready(function(){
						  jQuery("#home-welcome-carousel").owlCarousel({
							//autoplay:true,
							autoplayTimeout:3000,
							autoplayHoverPause:true,
							loop:false,
							nav:true,
							dots:false,
							margin: 30,
							responsiveClass:true,
							responsive:{
								0:{
									items:1,
								},
								526:{
									items:2,
								},
								768:{
									items:4,
								}
							}
						  });
						});
					</script>

					<?php endif; ?>
				</div><!--/container-->
			</div><!--/home-welcome-content-->
		</section>

	<?php endwhile; wp_reset_query(); ?>


	<div class="home-artikel">
		<div class="container py-5">
			<?php $hart_query = lmd_get_mod('hart_query'); $hart_cat = lmd_get_mod('hart_cat'); $orderby = 'DESC'; ?>

			<div class="home-artikel-header d-flex align-items-center mb-3">
				<div class="dfl flex-grow-1"><h2 class="home-artikel-title h4 fh fc-pink fw-semibold text-uppercase mb-0"><span><?php echo lmd_get_mod('hart_title', 'Artikel FYP'); ?></span></h2></div>
				<?php if($hart_query != 'hart_populer') { ?>
					<div class="dfr ms-auto"><a class="fc-blue fw-semibold fs-8" href="<?php if($hart_query == 'hart_latest') { echo lmd_get_mod('hart_link'); } elseif($hart_query == 'hart_kategori') { echo get_category_link($hart_cat); } else { echo '#'; } ?>">Lihat Semua</a></div>
				<?php } ?>
			</div>

			<div class="row match-height">
				<div class="col-lg-4 col-match-height mb-3 mb-lg-0">
					<?php //artikel query
					$hart_count = 1;

					if($hart_query == 'hart_populer') {
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hart_count,
							'meta_key'			=> 'post_views_count', 
							'orderby' => 'meta_value_num', 
							'order' => $orderby,
						);
					} elseif($hart_query == 'hart_kategori') {
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hart_count,
							'cat' => $hart_cat,
						);
					} else {
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hart_count,
						);
					}

					$query = new WP_Query($args);

					while ($query->have_posts()) : $query->the_post(); 
						
						get_template_part('excerpt', 'art1');
						get_template_part( 'excerpt', 'ldjson');
					
					endwhile; wp_reset_query(); ?>
				</div>
				
				<?php //artikel query 2
				$hart_query = lmd_get_mod('hart_query'); 
				$hart_cat = lmd_get_mod('hart_cat'); 
				$hart_count = 3;

				if($hart_query == 'hart_populer') {
					$args2 = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hart_count,
						'meta_key'			=> 'post_views_count', 
						'orderby' => 'meta_value_num', 
						'order' => $orderby,
						'offset' => 1,
					);
				} elseif($hart_query == 'hart_kategori') {
					$args2 = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hart_count,
						'cat' => $hart_cat,
						'offset' => 1,
					);
				} else {
					$args2 = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hart_count,
						'offset' => 1,
					);
				}

				$query2 = new WP_Query($args2);

				if ($query2->have_posts()) :
				echo '<div class="col-lg-4 col-match-height mb-3 mb-lg-0">';
				
					$i=0; while ($query2->have_posts()) : $query2->the_post(); $i++;
						
						echo '<div class="divider pb-2 mt-2 ';
						if($i == 1) { echo 'd-lg-none'; }						
						echo '"></div>';
						
						get_template_part('excerpt', 'art2');
						get_template_part( 'excerpt', 'ldjson');
					
					endwhile; wp_reset_query();
					
				echo '</div>';				
				endif; ?>

				<?php //artikel query 3
				$hart_query = lmd_get_mod('hart_query'); 
				$hart_cat = lmd_get_mod('hart_cat'); 
				$hart_count = 3;

				if($hart_query == 'hart_populer') {
					$args3 = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hart_count,
						'meta_key'			=> 'post_views_count', 
						'orderby' => 'meta_value_num', 
						'order' => $orderby,
						'offset' => 4,
					);
				} elseif($hart_query == 'hart_kategori') {
					$args3 = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hart_count,
						'cat' => $hart_cat,
						'offset' => 4,
					);
				} else {
					$args3 = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hart_count,
						'offset' => 4,
					);
				}

				$query3 = new WP_Query($args3);

				if ($query3->have_posts()) :
				echo '<div class="col-lg-4 col-match-height">';
				
					$i=0; while ($query3->have_posts()) : $query3->the_post(); $i++;
						
						echo '<div class="divider pb-2 mt-2 ';
						if($i == 1) { echo 'd-lg-none'; }						
						echo '"></div>';
						
						get_template_part('excerpt', 'art2');
						get_template_part( 'excerpt', 'ldjson');
					
					endwhile; wp_reset_query();
					
				echo '</div>';				
				endif; ?>
			</div>
		</div>
	</div>


	<div class="home-populer">
		<div class="container overflow-hidden p-3 py-lg-5">
			<div class="row gx-lg-5 match-height">
				<div class="col-lg-6 col-match-height mb-5 mb-lg-0">
					
					<?php $hpop_query_ki = lmd_get_mod('hpop_query_ki'); $hpop_cat_ki = lmd_get_mod('hpop_cat_ki'); $orderby = 'DESC'; ?>
					
					<div class="home-artikel-header d-flex align-items-center mb-3">
						<div class="dfl flex-grow-1"><h2 class="home-artikel-title h4 fh fc-pink fw-semibold text-uppercase mb-0"><span><?php echo lmd_get_mod('hpop_title_ki', 'Artikel Populer'); ?></span></h2></div>
						<?php if($hpop_query_ki != 'hpop_populer') { ?>
							<div class="dfr ms-auto"><a class="fc-blue fw-semibold fs-8" href="<?php if($hpop_query_ki == 'hpop_latest') { echo lmd_get_mod('hpop_link_ki'); } elseif($hpop_query_ki == 'hpop_kategori') { echo get_category_link($hpop_cat_ki); } else { echo '#'; } ?>">Lihat Semua</a></div>
						<?php } ?>
					</div>

					<?php //artikel query
					$hpop_count = 1;

					if($hpop_query_ki == 'hpop_populer') {
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hpop_count,
							'meta_key'			=> 'post_views_count', 
							'orderby' => 'meta_value_num', 
							'order' => $orderby,
						);
					} elseif($hpop_query_ki == 'hpop_kategori') {
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hpop_count,
							'cat' => $hpop_cat_ki,
						);
					} else {
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $hpop_count,
						);
					}

					$query = new WP_Query($args);

					while ($query->have_posts()) : $query->the_post(); 
						
						get_template_part('excerpt', 'art3');
						get_template_part( 'excerpt', 'ldjson');
					
					endwhile; wp_reset_query(); ?>

				</div>

				<?php //artikel query
				$hpop_count = 3;

				if($hpop_query_ki == 'hpop_populer') {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hpop_count,
						'meta_key'			=> 'post_views_count', 
						'orderby' => 'meta_value_num', 
						'order' => $orderby,
						'offset' => 1,
					);
				} elseif($hpop_query_ki == 'hpop_kategori') {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hpop_count,
						'cat' => $hpop_cat_ki,
						'offset' => 1,
					);
				} else {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hpop_count,
						'offset' => 1,
					);
				}

				$query = new WP_Query($args);

				if ($query->have_posts()) :
				
					echo '<div class="col-lg-6 col-match-height">';

					while ($query->have_posts()) : $query->the_post(); 
						
						echo '<div class="divider pb-2 mt-2 ';
						if($i == 1) { echo 'd-lg-none'; }						
						echo '"></div>';
						
						get_template_part('excerpt', 'art4');
						get_template_part( 'excerpt', 'ldjson');
					
					endwhile; wp_reset_query(); 
					
					echo '</div>';
				
				endif; ?>

			</div>
		</div>
	</div>


	<div class="home-carousel1">
		<div class="container overflow-hidden py-5">
			<?php $hcar_query = lmd_get_mod('hcar_query'); $hcar_cat = lmd_get_mod('hcar_cat'); $orderby = 'DESC'; ?>

			<div class="home-artikel-header d-flex align-items-center mb-3">
				<div class="dfl flex-grow-1"><h2 class="home-artikel-title h4 fh fc-pink fw-semibold text-uppercase mb-0"><span><?php echo lmd_get_mod('hcar_title', 'Artikel Pilihan'); ?></span></h2></div>
				<?php if($hcar_query != 'hcar_populer') { ?>
					<div class="dfr ms-auto"><a class="fc-blue fw-semibold fs-8" href="<?php if($hcar_query == 'hcar_latest') { echo lmd_get_mod('hcar_link'); } elseif($hcar_query == 'hcar_kategori') { echo get_category_link($hcar_cat); } else { echo '#'; } ?>">Lihat Semua</a></div>
				<?php } ?>
			</div>

			<div id="home-carousel1" class="owl-carousel owl-theme">

				<?php //artikel carousel query
				$hcar_count = lmd_get_mod('hcar_count', 5);

				if($hcar_query == 'hcar_populer') {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar_count,
						'meta_key'			=> 'post_views_count', 
						'orderby' => 'meta_value_num', 
						'order' => $orderby,
					);
				} elseif($hcar_query == 'hcar_kategori') {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar_count,
						'cat' => $hcar_cat,
					);
				} else {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar_count,
					);
				}

				$query = new WP_Query($args);

				while ($query->have_posts()) : $query->the_post(); 
					
					echo '<div class="hcar-item">';
					get_template_part('excerpt', 'carousel2');
					get_template_part( 'excerpt', 'ldjson');
					echo '</div>';
				
				endwhile; wp_reset_query(); ?>

			</div><!--owl-carousel-->

			<script>
				jQuery(document).ready(function(){
				  jQuery("#home-carousel1").owlCarousel({
					//autoplay:true,
					autoplayTimeout:3000,
					autoplayHoverPause:true,
					loop:false,
					nav:true,
					dots:false,
					margin: 30,
					responsiveClass:true,
					responsive:{
						0:{
							items:1,
						},
						526:{
							items:2,
						},
						768:{
							items:4,
						}
					}
				  });
				});
			</script>

		</div>
	</div>


	<?php $aktif = lmd_get_mod('home_partner_aktif'); if($aktif == '1') {
	
	$entries = lmd_get_mod('ab_partner_gallery'); if(!empty($entries)) : ?>

		<section class="about_partners bg-white">
			<div class="container py-5 pb-3">
				<h2 class="h4 fh text-center fc-gray mb-4 fw-semibold"><?php echo lmd_get_mod('ab_partner_title', 'Tusted by'); ?></h2>

				<div id="carousel-partners" class="owl-carousel owl-theme">
					<?php $images = explode( ',', $entries);
					foreach ($images as $image) :

						echo '<img src="'.wp_get_attachment_image_url( $image, 'full').'" alt="'.lmd_get_img_alt($image).'">';
					
					endforeach; ?>
				</div>
			</div><!--/container-->
		</section><!--/partners-->

		<script>
			jQuery(document).ready(function(){
			  jQuery("#carousel-partners").owlCarousel({
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				loop:true,
				nav:false,
				dots:false,
				margin: 30,
				responsiveClass:true,
				responsive:{
					0:{
						items:3,
					},
					526:{
						items:5,
					},
					768:{
						items:7,
					}
				}
			  });
			});
		</script>
	
	<?php endif; ?>
	
	<?php $entries = lmd_get_mod('ab_partner_gallery2'); if(!empty($entries)) : ?>

		<section class="about_partners bg-white">
			<div class="container pb-5">
				<div id="carousel-partners2" class="owl-carousel owl-theme">
					<?php $images = explode( ',', $entries);
					foreach ($images as $image) :

						echo '<img src="'.wp_get_attachment_image_url( $image, 'full').'" alt="'.lmd_get_img_alt($image).'">';
					
					endforeach; ?>
				</div>
			</div><!--/container-->
		</section><!--/partners-->

		<script>
			jQuery(document).ready(function(){
			  jQuery("#carousel-partners2").owlCarousel({
				autoplay:true,
				autoplayTimeout:3500,
				autoplayHoverPause:true,
				loop:true,
				nav:false,
				dots:false,
				margin: 30,
				responsiveClass:true,
				responsive:{
					0:{
						items:3,
					},
					526:{
						items:5,
					},
					768:{
						items:7,
					}
				}
			  });
			});
		</script>
	
	<?php endif; 
	} //ab_partner_aktif?>


	<div class="home-carousel2 pt-lg-3 pb-lg-1">
		<div class="container overflow-hidden py-5">
			<div class="row match-height">
				<?php $hcar2_count = lmd_get_mod('hcar2_count', 5); $hcar2_cat1 = lmd_get_mod('hcar2_cat1');			

					//artikel carousel query
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar2_count,
						'cat' => $hcar2_cat1,
					);

					$query = new WP_Query($args); if ($query->have_posts()) :

					echo '<div class="col-lg-4 col-match-height">';

					$currentcat = $hcar2_cat1;
					$catimg = get_term_meta($currentcat, 'logo', true);

					echo '<div class="catlogo text-center mb-4"><img src="';
					if(!empty($catimg)) { echo $catimg; } else { echo get_template_directory_uri().'/img/catlogo.png'; }
					echo '" class="lazyload img-fluid mx-auto rounded-3" /></div>';
					
					echo '<div id="home-carousel2" class="owl-carousel owl-theme">';

					while ($query->have_posts()) : $query->the_post(); 
						
						echo '<div class="hcar-item">';
						get_template_part('excerpt', 'carousel-cat');
						get_template_part( 'excerpt', 'ldjson');
						echo '</div>';
					
					endwhile; wp_reset_query(); 
					
					echo '</div></div>'; ?>

					<script>
						jQuery(document).ready(function(){
						  jQuery("#home-carousel2").owlCarousel({
							//autoplay:true,
							autoplayTimeout:3000,
							autoplayHoverPause:true,
							loop:false,
							nav:true,
							dots:false,
							margin: 30,
							responsiveClass:true,
							responsive:{
								0:{
									items:1,
								},
								526:{
									items:1,
								},
								768:{
									items:1,
								}
							}
						  });
						});
					</script>

				<?php endif; ?>

				<?php $hcar2_cat2 = lmd_get_mod('hcar2_cat2');			

					//artikel carousel query
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar2_count,
						'cat' => $hcar2_cat2,
					);

					$query = new WP_Query($args); if ($query->have_posts()) :

					echo '<div class="col-lg-4 col-match-height">';

					$currentcat = $hcar2_cat2;
					$catimg = get_term_meta($currentcat, 'logo', true);

					echo '<div class="catlogo text-center mb-4"><img src="';
					if(!empty($catimg)) { echo $catimg; } else { echo get_template_directory_uri().'/img/catlogo.png'; }
					echo '" class="lazyload img-fluid mx-auto rounded-3" /></div>';
					
					echo '<div id="home-carousel22" class="owl-carousel owl-theme">';

					while ($query->have_posts()) : $query->the_post(); 
						
						echo '<div class="hcar-item">';
						get_template_part('excerpt', 'carousel-cat');
						get_template_part( 'excerpt', 'ldjson');
						echo '</div>';
					
					endwhile; wp_reset_query(); 
					
					echo '</div></div>'; ?>

					<script>
						jQuery(document).ready(function(){
						  jQuery("#home-carousel22").owlCarousel({
							//autoplay:true,
							autoplayTimeout:3000,
							autoplayHoverPause:true,
							loop:false,
							nav:true,
							dots:false,
							margin: 30,
							responsiveClass:true,
							responsive:{
								0:{
									items:1,
								},
								526:{
									items:1,
								},
								768:{
									items:1,
								}
							}
						  });
						});
					</script>

				<?php endif; ?>

				<?php $hcar2_cat3 = lmd_get_mod('hcar2_cat3');			

					//artikel carousel query
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar2_count,
						'cat' => $hcar2_cat3,
					);

					$query = new WP_Query($args); if ($query->have_posts()) :

					echo '<div class="col-lg-4 col-match-height">';

					$currentcat = $hcar2_cat3;
					$catimg = get_term_meta($currentcat, 'logo', true);

					echo '<div class="catlogo text-center mb-4"><img src="';
					if(!empty($catimg)) { echo $catimg; } else { echo get_template_directory_uri().'/img/catlogo.png'; }
					echo '" class="lazyload img-fluid mx-auto rounded-3" /></div>';
					
					echo '<div id="home-carousel23" class="owl-carousel owl-theme">';

					while ($query->have_posts()) : $query->the_post(); 
						
						echo '<div class="hcar-item">';
						get_template_part('excerpt', 'carousel-cat');
						get_template_part( 'excerpt', 'ldjson');
						echo '</div>';
					
					endwhile; wp_reset_query(); 
					
					echo '</div></div>'; ?>

					<script>
						jQuery(document).ready(function(){
						  jQuery("#home-carousel23").owlCarousel({
							//autoplay:true,
							autoplayTimeout:3000,
							autoplayHoverPause:true,
							loop:false,
							nav:true,
							dots:false,
							margin: 30,
							responsiveClass:true,
							responsive:{
								0:{
									items:1,
								},
								526:{
									items:1,
								},
								768:{
									items:1,
								}
							}
						  });
						});
					</script>

				<?php endif; ?>

			</div>
		</div>
	</div>


	<div class="home-carousel3">
		<div class="container overflow-hidden py-5">
			<?php $hcar3_query = lmd_get_mod('hcar3_query'); $hcar3_cat = lmd_get_mod('hcar3_cat'); $orderby = 'DESC'; ?>

			<div class="home-artikel-header d-flex align-items-center mb-3">
				<div class="dfl flex-grow-1"><h2 class="home-artikel-title h4 fh fc-pink fw-semibold text-uppercase mb-0"><span><?php echo lmd_get_mod('hcar3_title', 'Artikel Pilihan'); ?></span></h2></div>
				<?php if($hcar3_query != 'hcar3_populer') { ?>
					<div class="dfr ms-auto d-none"><a class="fc-blue fw-semibold fs-8" href="<?php if($hcar3_query == 'hcar3_latest') { echo lmd_get_mod('hcar3_link'); } elseif($hcar3_query == 'hcar3_kategori') { echo get_category_link($hcar3_cat); } else { echo '#'; } ?>">Lihat Semua</a></div>
				<?php } ?>
			</div>

			<div id="home-carousel3" class="owl-carousel owl-theme">

				<?php //artikel carousel query
				$hcar3_count = lmd_get_mod('hcar3_count', 5);

				if($hcar3_query == 'hcar3_populer') {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar3_count,
						'meta_key'			=> 'post_views_count', 
						'orderby' => 'meta_value_num', 
						'order' => $orderby,
					);
				} elseif($hcar3_query == 'hcar3_kategori') {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar3_count,
						'cat' => $hcar3_cat,
					);
				} else {
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $hcar3_count,
					);
				}

				$query = new WP_Query($args);

				while ($query->have_posts()) : $query->the_post(); 
					
					echo '<div class="hcar-item">';
					get_template_part('excerpt', 'carousel4');
					get_template_part( 'excerpt', 'ldjson');
					echo '</div>';
				
				endwhile; wp_reset_query(); ?>

			</div><!--owl-carousel-->

			<script>
				jQuery(document).ready(function(){
				  jQuery("#home-carousel3").owlCarousel({
					//autoplay:true,
					autoplayTimeout:3000,
					autoplayHoverPause:true,
					loop:false,
					nav:true,
					dots:false,
					margin: 30,
					responsiveClass:true,
					responsive:{
						0:{
							items:1,
						},
						526:{
							items:2,
						},
						768:{
							items:3,
						}
					}
				  });
				});
			</script>

		</div>
	</div>

</div><!--/tpl-home-->

<?php get_footer(); ?>
