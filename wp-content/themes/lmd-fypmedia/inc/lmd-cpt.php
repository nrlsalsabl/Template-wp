<?php
//CPT Fastboat
function lmd_create_cpt() {
	function cpt_label($name, $pname) {
		$labels = array(
			'name'               => __( $pname ),
			'singular_name'      => __( $name ),
			'add_new'            => __( 'Add New '.$name ),
			'add_new_item'       => __( 'Add New '.$name ),
			'edit_item'          => __( 'Edit '.$name ),
			'new_item'           => __( 'Add New '.$name ),
			'view_item'          => __( 'View '.$name ),
			'search_items'       => __( 'Search '.$name ),
			'not_found'          => __( 'No '.$name.' found' ),
			'not_found_in_trash' => __( 'No '.$name.' found in trash' )
		);

		return $labels;
	}

	register_post_type( 'talent',
		array(
		'labels' => cpt_label('Talent', 'Talents'),
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'talent', 'with_front' => false),
		//'taxonomies' => array('location'),
		'menu_position' => 5,
		'menu_icon' => 'dashicons-buddicons-topics',
		'public' => true,
		'publicly_queryable' => true,  
		'show_ui' => true,  
		'show_in_menu' => true,  
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		)
	);
	
	register_post_type( 'team',
		array(
		'labels' => cpt_label('Team', 'Teams'),
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'team', 'with_front' => false),
		//'taxonomies' => array('location'),
		'menu_position' => 5,
		'menu_icon' => 'dashicons-businessman',
		'public' => true,
		'publicly_queryable' => true,  
		'show_ui' => true,  
		'show_in_menu' => true,  
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		)
	);
	
	register_post_type( 'career',
		array(
		'labels' => cpt_label('Career', 'Careers'),
		'supports' => array('title', 'editor'),
		'rewrite' => array('slug' => 'career', 'with_front' => false),
		'menu_position' => 5,
		'menu_icon' => 'dashicons-format-aside',
		'public' => true,
		'publicly_queryable' => true,  
		'show_ui' => true,  
		'show_in_menu' => true,  
		'query_var' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		)
	);

}
add_action( 'init', 'lmd_create_cpt', 0);
