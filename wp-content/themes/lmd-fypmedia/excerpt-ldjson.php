<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "headline": "<?php the_title(); ?>",
  "image": [
	"<?php if ( has_post_thumbnail() ) { echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); } else { echo get_template_directory_uri().'/img/medium.jpg'; } ?>"
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