<?php
/*
Plugin Name: LMD Posts By Category
Plugin URI: http://lombokmedia.web.id/plugin/category-post
Description: View posts from selected category with thumbnail images
Author: Amrin Zulkarnain
Version: 0.1
Author URI: http://amrinz.wordpress.com
*/
  
class lmdCategoryPosts extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = 'LMD Posts By Category', array( 'description' => __('Displays posts from category with thumbnail', 'lombokmedia') ) );
	}
	
	/*
	 * Displays the widget form in the admin panel
	 */
	function form( $instance ) {

		//judul
		if ( isset( $instance[ 'title' ] ) )
			$title = $instance[ 'title' ];
		else
			$title = __( 'Posts By Category', 'lombokmedia' );

		//category
		if ( isset( $instance[ 'category' ] ) )
			$category = $instance[ 'category' ];
		else
			$category = '';
		
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
			<label for="<?php echo $this->get_field_id( 'category' ); ?>">Category Name:</label>
			<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>">
          <?php
            $categories = get_categories('');
            foreach ($categories as $cat) {
              if ($cat->cat_ID == $instance['category']) {
                $option = '<option selected="selected" value="'.$cat->cat_ID.'">';
              } else {
                $option = '<option value="'.$cat->cat_ID.'">';
              }
              $option .= $cat->cat_name.'</option>';
              echo $option;
            }
          ?>
        </select>
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

	$title = empty($instance['title']) ? __('Posts By Category', 'lombokmedia') : apply_filters('widget_title', $instance['title']);

	$category = empty($instance['category']) ? 1 : $instance['category'];

    $num_posts = empty($instance['num_posts']) ? 5 : $instance['num_posts'];

	echo $args['before_widget'];

	if (!empty($title)) echo $before_title . $title . $after_title;

    query_posts("posts_per_page=$num_posts&cat=$category"); ?>

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
add_action( 'widgets_init', function() { register_widget( 'lmdCategoryPosts' ); } );