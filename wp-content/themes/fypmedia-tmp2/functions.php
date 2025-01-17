function fypmedia_tmp_enqueue_styles() {
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'fypmedia_tmp_enqueue_styles');
