<?php
/*
Plugin Name: LMD Recent Posts
Plugin URI: http://lombokmedia.web.id/plugin/category-post
Description: View posts from selected category with thumbnail images
Author: Amrin Zulkarnain
Version: 0.1
Author URI: http://amrinz.wordpress.com
*/
  
class lmdRecentPosts extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'LMD Recent Posts', array( 'description' => __('Displays recent posts with thumbnail', 'lombokmedia') ) );
	}
	
	/*
	 * Displays the widget form in the admin panel
	 */
	function form( $instance ) {

		//judul
		if ( isset( $instance[ 'title' ] ) )
			$title = $instance[ 'title' ];
		else
			$title = __( 'Recent Posts', 'lombokmedia' );

		//jumlah posts
		if ( isset( $instance[ 'num_posts' ] ) )
			$num_posts = $instance[ 'num_posts' ];
		else
			$num_posts = 5;

		?>

		 <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num_posts' ); ?>">Number of Posts:</label>
			<input id="<?php echo $this->get_field_id( 'num_posts' ); ?>" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" type="text" value="<?php echo $num_posts; ?>" />
		</p>

<?php
	}
	
/*
 * Renders the widget in the sidebar
 */
	function widget( $args, $instance ) {
	extract($args, EXTR_SKIP);

	$title = empty($instance['title']) ? __('Recent Posts', 'lombokmedia') : apply_filters('widget_title', $instance['title']);
    $num_posts = empty($instance['num_posts']) ? 5 : $instance['num_posts'];

	echo $args['before_widget'];

	if (!empty($title)) echo $before_title . $title . $after_title;

    query_posts("posts_per_page=$num_posts"); ?>

<?php if (have_posts()) : 
	
	echo '<ul class="lmd-recent-post">';
		
		while (have_posts()) : the_post();

			get_template_part('excerpt', 'recent-post');
						
		endwhile;

	echo '</ul>';

	endif; 
	
	wp_reset_query();
	
	echo $args['after_widget'];
	
	} 
}

// Initialize the widget
add_action( 'widgets_init', function() { register_widget( 'lmdRecentPosts' ); } );