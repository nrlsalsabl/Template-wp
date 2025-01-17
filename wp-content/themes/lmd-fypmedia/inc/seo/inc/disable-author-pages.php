<?php 
if(!defined("ABSPATH")){
    exit;
}

add_action("init", function(){
    if(get_option("_disable_author_pages") == "on"){
        /* Remove author links. */
        add_filter( 'author_link', function() { return '#'; }, 99 );
        add_filter( 'the_author_posts_link', '__return_empty_string', 99 );
    }
});

add_action('template_redirect', function(){
    if(get_option("_disable_author_pages") == "on"){
        global $wp_query;
        if(is_author()){
            global $wp_query;
			$wp_query->set_404();
			status_header(404);
			nocache_headers();
        }
    }
});