<?php 
if(!defined("ABSPATH")){
    exit;
}

/*
/* Remove title tag WordPress
*/
remove_action( 'wp_head', '_wp_render_title_tag', 1 );

/*
/* All 404 to home option
*/
define("HANDLE_404", "seven_handle_404");
add_action(HANDLE_404, function(){
    if(get_option("_all_404_to_home") == "on"){
        $url = get_option("_all_404_to_home_url");
        if($url){
            if(is_string($url) && strlen(trim($url))>0 && filter_var($url, FILTER_VALIDATE_URL)){
                wp_redirect($url, 301);
            }
            /* In case the option is enabled, but with an invalid URL no actions will be taken. */
        }else{
            wp_redirect(get_home_url(), 301);
        }
    }
});

if(!class_exists("SEO")){
    class SEO{
        public $positions = [];
        public $title = NULL;
        public $desc = NULL;
        public $robots = NULL;
        public $image = NULL;
        public $canonical = NULL;
        public $already_shown = [];
        private $ucfirst = false;

        function __construct(){
            wp_reset_postdata();

            global $seo_object;
            if(isset($seo_object) && $seo_object>NULL && is_object($seo_object)){
                return $seo_object;
            }

            // Capitalize first letter from titles & descriptions?
            $this->ucfirst = (get_option("_ucfirst")==="on");
        }

        public function set_breadcrumb($pos){
            if(is_array($pos)){
                $this->positions=$pos;
            }
        }

        public function set_canonical($canonical=""){
            // Sets the current page canonical.
            if(is_string($canonical) && strlen(trim($canonical))>0){
                $this->canonical=$canonical;
            }
        }

        public function set_robots($robots=""){
            // Sets the current page robots.
            if(is_string($robots) && strlen(trim($robots))>0){
                $this->robots=$robots;
            }
        }

        public function set_image($image=""){
            // Sets the current page image for social networks.
            if(is_string($image) && 
            strlen(trim($image))>0){
                $this->image=$image;
            }
        }

        public function set_title($title=""){
            // Sets the current page title.
            if(is_string($title) && strlen(trim($title))>0){
                $this->title=($this->ucfirst ? ucfirst($title) : $title);
            }
        }

        public function set_description($desc=""){
            // Sets the current page title.
            if(is_string($desc) && strlen(trim($desc))>0){
                $this->desc=($this->ucfirst ? ucfirst($desc) : $desc);
            }
        }

        public function valid_meta($meta=""){
            if($meta==NULL || !is_string($meta)){
                return false;
            }
            if(strlen(trim($meta))==0){
                // No empty strings.
                return false;
            }
            return true; // Any other case is correct.
        }
        public function get_current_description(){
            if(isset($this->desc) && $this->desc>NULL && strlen(trim($this->desc))>0){
                return trim($this->replace_shortcodes($this->desc));
            }
            if(is_single() || is_page()){
                global $post;
                /* Return the saved post meta description. */
                $post_desc = get_post_meta($post->ID, '_seo_meta_description', true);
                if($post_desc && strlen(trim($post_desc))>0){
                    return trim($this->replace_shortcodes($post_desc));
                }
            }else if(is_archive() || is_category()){
                $category = get_queried_object();
                if(isset($category->term_id)){
                    $cat_title = get_term_meta($category->term_id, "_seo_meta_description", TRUE);
                    if($cat_title && strlen(trim($cat_title))>0){
                        return $this->replace_shortcodes($cat_title);
                    }
                }
            }else if(is_front_page() || is_home()){
                $home_desc = get_option("_home_seo_description");
                return ($home_desc && strlen(trim($home_desc))>0 ? $home_desc : NULL);
            }
            return NULL;
        }
        public function replace_shortcodes($text=NULL){

            return str_replace([
                "[year]",
                "%%year%%",
                "%%currentyear%%",
                "%%nextyear%%"
            ], 
            [
                date("Y"),
                date("Y"),
                date("Y"),
                (int)date("Y")+1
            ], 
            $text);
        }

        public function get_current_title(){
            if(isset($this->title) && $this->title>NULL){
                return $this->replace_shortcodes($this->title);
            }
            if(is_single() || is_page()){
                global $post;

                /* Return the saved post title. */
                $post_title = get_post_meta($post->ID, '_seo_meta_title', true);
                if($post_title && strlen(trim($post_title))>0){
                    return $this->replace_shortcodes($post_title);
                }

                /* In case of meta title not set, override with the post title. */
                return $post->post_title;
            }else if(is_front_page() || is_home()){
                $home_title = get_option("_home_seo_title");
                return $this->replace_shortcodes(($home_title && strlen(trim($home_title))>0 ? $home_title : get_bloginfo('name')));
            }else if(is_archive() || is_category()){
                $category = get_queried_object();
                if(isset($category->term_id)){
                    /* Only if valid category */
                    $cat_title = get_term_meta($category->term_id, "_seo_meta_title", TRUE);
                    if($cat_title && strlen(trim($cat_title))>0){
                        return $this->replace_shortcodes($cat_title);
                    }
                    return $this->replace_shortcodes($category->name);
                }
            }
            return NULL;
        }
        public function get_meta_tag($type=SEO_ROBOTS){
            if(in_array($type, $this->already_shown)) return false;

            // Make sure that any tag shows twice.
            array_push($this->already_shown, $type);

            switch($type):
                /*
                *
                * Theme Color (for mobiles)
                * 
                */
                case SEO_APPLE_TOUCH_ICON:
                    return '<link rel="apple-touch-icon" sizes="400x400" href="'.get_template_directory_uri().'/screenshot.png">';
                break;

                case SEO_THEME_COLOR:
                    return '<meta name="theme-color" content="white" />';
                break;

                /*
                *
                * OpenGraph
                * 
                */
                case SEO_OPENGRAPH_LOCALE:
                    return '<meta property="og:locale" content="'.$this->get_current_locale().'" />';
                break;

                case SEO_OPENGRAPH_CURRENT_URL:
                    global $wp;
                    return '<meta property="og:url" content="'.home_url($wp->request).'" />';
                break;

                case SEO_OPENGRAPH_TYPE:
                    return '<meta property="og:type" content="'.(is_single() ? 'article' : 'website').'" />';
                break;

                case SEO_OPENGRAPH_SITENAME:
                    return '<meta property="og:site_name" content="'.$this->get_publisher().'" />';
                break;

                case SEO_OPENGRAPH_PUBLISHED_TIME:
                    if(is_single() || is_page()){
                        global $post;
                        return '<meta property="article:published_time" content="'.get_the_date("c", $post->ID).'" />';
                    }
                break;

                case SEO_OPENGRAPH_MODIFIED_TIME:
                    if(is_single() || is_page()){
                        global $post;
                        if(isset($post->post_modified)){
                            return '<meta property="article:modified_time" content="'.get_post_modified_time("c", false, $post->ID).'" />
                            <meta property="og:updated_time" content="'.get_post_modified_time("c", false, $post->ID).'" />';
                        }
                    }
                break;

                case SEO_OPENGRAPH_IMAGE:
                    try{
                        $image = $this->get_current_image();
                        if($image > NULL){
                            list($width, $height, $type, $attr) = @getimagesize($image);
                            
                            $image_tag = '<meta name="og:image" content="'.$image.'" />';
                            $image_tag .= '<meta name="og:image:secure_url" content="'.$image.'" />';

                            if(isset($width) && isset($height) && $height>0 && $width>0){
                                $image_tag .= (isset($width) && $width>NULL ? '<meta name="og:image:width" content="'.$width.'" />' : NULL);
                                $image_tag .= (isset($height) && $height>NULL ? '<meta name="og:image:height" content="'.$height.'" />' : NULL);
                            }
                            return $image_tag;
                        }
                    }catch(Exception $ex){
                        return NULL;
                    }
                    return NULL;
                break;

                case SEO_OPENGRAPH_TITLE:
                    $title = $this->get_current_title();
                    if($this->valid_meta($title)){
                        return '<meta property="og:title" content="'.$title.'" />';
                    }
                    return NULL;
                break;

                case SEO_OPENGRAPH_DESCRIPTION:
                    $desc = $this->get_current_description();
                    if($this->valid_meta($desc)){
                        return '<meta property="og:description" content="'.trim($desc).'">';
                    }
                    return NULL;
                break;

                /*
                *
                * Twitter card
                * 
                */
                case SEO_TWITTER_CARD:
                    return '<meta name="twitter:card" content="summary" />';
                break;

                case SEO_TWITTER_SITE:
                    $tw = get_option("_twitter_account");
                    if($tw && strlen(trim($tw))>0){
                        return '<meta name="twitter:site" content="@'.str_replace("@", NULL, $tw).'" />';
                    }
                break;

                case SEO_TWITTER_DESCRIPCION:
                    $description = $this->get_current_description();
                    return ($description>NULL ? '<meta name="twitter:description" content="'.$description.'" />' : NULL);
                break;

                case SEO_TWITTER_TITLE:
                    $title = $this->get_current_title();
                    return ($title>NULL ? '<meta name="twitter:title" content="'.$title.'" />' : NULL);
                break;

                case SEO_TWITTER_IMAGE:
                    $image = $this->get_current_image();
                    return ($image>NULL ? '<meta name="twitter:image" content="'.$image.'" />' : NULL);
                break;

                /*
                *
                * 
                * Basic meta tags.
                * 
                * 
                */
                case SEO_TITLE:
                    $title = $this->get_current_title();
                    if($this->valid_meta($title)){
                        return '<title>'.$this->get_current_title().'</title>
                        <meta name="title" content="'.$this->get_current_title().'" />';
                    }
                    return NULL;
                break;
                case SEO_DESCRIPTION:
                    $desc = $this->get_current_description();
                    if($this->valid_meta($desc)){
                        return '<meta name="description" content="'.$desc.'">';
                    }
                    return NULL;
                break;
                case SEO_ROBOTS:
                    if(get_option("blog_public") === "1"){
                        // Before aplying any index configuration we'll make sure the blog is indexing.

                        if($this->robots>NULL){
                            // If robots set manually, priorize it.
                            return '<meta name="robots" content="'.$this->robots.'">';
                        }

                        return '<meta name="robots" content="'.$this->get_robots().'">';
                    }else{
                        // If blog is not public, then just "noindex,nofollow".
                        return '<meta name="robots" content="noindex,nofollow">';
                    }
                break;
                case SEO_SECTION:
                    if(is_single()){
                        global $post;
                        $category = get_the_category($post->ID);
                        if($category && count($category)>0){
                            return '<meta property="article:section" content="'.trim($category[0]->name).'" />';
                        }
                    }
                break;

                /*
                *
                * Content language
                * 
                */
                case SEO_LANGUAGE:
                    return '<meta http-equiv="content-language" content="'.($this->get_current_language()).'">';
                break;
                
                /*
                *
                * Canonical
                * 
                */
                case SEO_CANONICAL:
                    if($this->get_canonical()>NULL){
                        return '<link rel="canonical" href="'.($this->get_canonical()).'">';
                    }
                break;

                
                /*
                *
                * Rating
                * 
                */
                case SEO_RATING:
                    return '<meta name="rating" content="General">';
                break;

                default:
                    return NULL;
                break;
            endswitch;

            // Just in case.
            return NULL;
        }

        private function get_current_language(){
            return strtolower(get_bloginfo("language"));
        }

        public function get_current_locale(){
            $locale = get_locale();

            // Wrong format.
            if(strpos($locale, "_") !== FALSE) return $locale;

            // Wrong format.
            $lang = explode("_", $locale);
            if(count($lang) != 2) return $locale;
           
            // Return language in correct format
            return strtolower(trim($lang[0]))."_".strtoupper(trim($lang[1]));
        }

        private function get_canonical(){
            if(isset($this->canonical) && $this->canonical>NULL && strlen(trim($this->canonical))>0){
                return trim(esc_html($this->canonical));
            }

            if(is_home()){
                return home_url();
            }

            if(is_archive()){
                $category = get_queried_object();
                return (isset($category->term_id) ? get_category_link($category->term_id) : NULL);
            }
            // For posts & pages.
            if(is_single() || is_page() || is_archive()){
                return get_the_permalink();
            }
            return NULL;
        }

        public function get_current_image(){
            if(isset($this->image) && $this->image>NULL && strlen(trim($this->image))>0){
                return apply_filters("seven_serp_default_social_image", trim($this->image));
            }

            if(is_single() || is_page()){
                global $post;
                /* Return the saved post meta image. */
                $image = get_post_meta($post->ID, '_seo_meta_image', true);
                if($image && strlen(trim($image))>0){
                    return apply_filters("seven_serp_default_social_image", trim($image));
                }

                /* In case a featured image exists, use it. */
                $url = get_the_post_thumbnail_url($post->ID, "full");
                if($url){
                    return apply_filters("seven_serp_default_social_image", $url);
                }
            }

            // Image set by developer filter.
            $image = apply_filters("seven_serp_default_social_image", "");
            if(isset($image) && $image && strlen(trim($image))>0){
                return trim($image);
            }

            // If there's a logo, then use it.
            $logo = get_logo(TRUE); // TRUE for just returning URL.
            if($logo>NULL){
                return apply_filters("seven_serp_default_social_image", trim($logo));
            }

            // For any other cases, just use template screenshot.
            if(file_exists(get_template_directory()."/screenshot.png")){
                return apply_filters("seven_serp_default_social_image", get_template_directory_uri().'/screenshot.png');
            }
            return NULL;
        }

        public function get_robots(){
            if(is_archive() || is_category()){
                // Categories:
                $category = get_queried_object();
                $seo_index = get_term_meta($category->term_id, "_seo_index", TRUE);
                $seo_follow = get_term_meta($category->term_id, "_seo_follow", TRUE);
                return ((int)$seo_index == 0 ? 'no' : NULL)."index,".((int)$seo_follow == 0 ? 'no' : NULL)."follow";
            }else if(is_front_page() || is_home()){
                return "index,follow";
            }else{
                global $post;
                if(isset($post) && isset($post->ID) && is_numeric($post->ID) && $post->ID>0){
                    // Posts, pages.
                    $seo_index = get_post_meta($post->ID, '_seo_index', true);
                    $seo_follow = get_post_meta($post->ID, '_seo_follow', true);
                    return ((int)$seo_index == 0 ? 'no' : NULL)."index,".((int)$seo_follow == 0 ? 'no' : NULL)."follow";
                }
            }
            return "noindex,nofollow";
        }

        public function get_current_url(){
            global $post;
            if($post>NULL && isset($post->ID)){
                return get_the_permalink($post->ID);
            }
            return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }

        public function get_publisher(){
            /*
            *
            * The publisher, equals to the blog name.
            * 
            */
            return get_bloginfo('name');
        }

        public function get_breadcrumb($return_positions = false){
            if(!is_home() && !is_page() && !is_404()){
                $positions = [];
                array_push($positions, ["name" => $this->get_publisher(), "url" => get_site_url()]);

                if(!empty($this->positions)){
                    foreach($this->positions as $pos){
                        if(isset($pos["url"]) && isset($pos["name"])){
                            array_push($positions, $pos);
                        }
                    }
                }else{
                    if(is_category() || is_archive()){
                        $current_cat_ID = get_query_var('cat');
                        $category = get_category($current_cat_ID);
                        if(isset($category->parent) && $category->parent>0){
                            /*
                            * For categories, in case it has a parent established, add it to the breadcrumb.
                            */
                            $category_parent = get_category($category->parent);
                            $current_cat_ID = $category_parent->term_id;
                            array_push($positions, ["name" => $category_parent->name, "url" => get_category_link($current_cat_ID)]);
                        }
                        array_push($positions, ["name" => (!isset($category->name) ? __("Sin categoría") : $category->name), "url" => get_category_link($current_cat_ID)]);
                    }else if((is_woocommerce_activated() && is_product()) || is_single()){
                        global $post;
                        $category = get_the_category($post->ID);
                        if(!empty($category) && isset($category[0])){
                            /*
                            * For single posts or products add the category in case it has one.
                            */
                            $category = $category[0];
                            if(isset($category->parent) && $category->parent>0){
                                $category_parent = get_category($category->parent);
                                $current_cat_ID = $category_parent->term_id;
                                array_push($positions, ["name" => $category_parent->name, "url" => get_category_link($current_cat_ID)]);
                            }
                            $current_cat_ID = $category->term_id;
                            array_push($positions, ["name" => (!isset($category->name) ? __("Sin categoría") : $category->name), "url" => get_category_link($current_cat_ID)]);
                        }
                        array_push($positions, ["name" => (!isset($post->post_title) || strlen($post->post_title)==0 ? __("Sin título") : $post->post_title), "url" => get_the_permalink($post->ID)]);
                    }
                }

                // Generate context schema.
                $context = \JsonLd\Context::create('breadcrumb_list', [
                    "itemListElement" => $positions
                ]);
                return ($return_positions ? $positions : $context);
            }
            return NULL;
        }
    }
}

add_action("init", function(){
    if(class_exists("SEO") && module_enabled("seo")){
        remove_action('wp_head', 'rel_canonical');
        
        global $seo_object;
        $seo_object = new SEO();
    }
});
?>