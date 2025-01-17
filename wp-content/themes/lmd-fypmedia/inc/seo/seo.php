<?php
if(!defined("ABSPATH")){
    header('HTTP/1.0 403 Forbidden');
    exit;
}

// Definitions
define("TRANSLATIONS", "lombokmedia");
define("SEO_INCLUDE_FOLDER", dirname(__FILE__)."/inc/"); // Do not remove the slashs.
define("SEO_PERMISSIONS", "edit_others_posts");
define("SEO_ABSPATH", __FILE__);
define("SEO_PLUGIN_NAME", "Seven SERP SEO");
define("SEO_ROBOTS", 1);
define("SEO_RATING", 2);
define("SEO_LANGUAGE", 3);
define("SEO_TITLE", 4);
define("SEO_DESCRIPTION", 5);
define("SEO_OPENGRAPH_TYPE", 6);
define("SEO_OPENGRAPH_TITLE", 7);
define("SEO_OPENGRAPH_DESCRIPTION", 8);
define("SEO_OPENGRAPH_URL", 9);
define("SEO_OPENGRAPH_IMAGE", 10);
define("SEO_OPENGRAPH_SITENAME", 11);
define("SEO_OPENGRAPH_PUBLISHED_TIME", 12);
define("SEO_OPENGRAPH_MODIFIED_TIME", 13);
define("SEO_OPENGRAPH_CURRENT_URL", 14);
define("SEO_OPENGRAPH_LOCALE", 31);
define("SEO_THEME_COLOR", 15);
define("SEO_PLUGIN_SLUG", TRANSLATIONS);
define("SEO_TWITTER_CARD", 16);
define("SEO_TWITTER_SITE", 17);
define("SEO_TWITTER_DESCRIPCION", 18);
define("SEO_TWITTER_TITLE", 19);
define("SEO_TWITTER_IMAGE", 20);
define("SEO_APPLE_TOUCH_ICON", 21);
define("SEO_SECTION", 22);
define("SEO_CANONICAL", 30);

	// Modules
	require SEO_INCLUDE_FOLDER."sitemaps.php";


    /* Admin metaboxes */
    require SEO_INCLUDE_FOLDER."metaboxes.php";

    /* Posts analysis */
    require SEO_INCLUDE_FOLDER."seo-analysis.php";

    /* Class for meta tags, titles, canonicals... */
    require SEO_INCLUDE_FOLDER."seo.php";

    /* Robots.txt */
    require SEO_INCLUDE_FOLDER."robots.php";

    /* Automatically fill the update services */
    require SEO_INCLUDE_FOLDER."update-services.php";

    /* Data migration from Yoast or other plugins */
    require SEO_INCLUDE_FOLDER."migrations.php";

    /* Full disable author pages */
    require SEO_INCLUDE_FOLDER."disable-author-pages.php";

    /* Schema */
    require SEO_INCLUDE_FOLDER."schema.php";

    /* External Links */
    require SEO_INCLUDE_FOLDER."external-links.php";

if(module_enabled("monitor404")){
    /* Log all 404 links */
    require SEO_INCLUDE_FOLDER."monitor-404.php";
}

function light_seo_get_breadcrumb(){
    /*/
    /* Show breadcrumb.
    /*/
    if(!module_enabled("seo") || get_option("_disable_visible_breadcrumb") == "on") return;
    global $seo_object;
    $positions = $seo_object->get_breadcrumb(true);
    if($positions>NULL && !empty($positions)){
        $html = '<div id="breadcrumb">';
        $ix=0;
        foreach($positions as $pos){
            if($ix==0){
                $html .= '<a href="'.$pos["url"].'">'.$pos["name"].'</a>';
            }else{
                $html .= ' &raquo; ';
                if($ix == count($positions)-1){
                    $html .= '<b aria-selected="true">'.$pos["name"].'</b>';
                }else{
                    $html .= '<a href="'.$pos["url"].'">'.$pos["name"].'</a>';
                }
            }
            $ix++;
        }
        $html .= '</div>';
        return $html;
    }
    return NULL;
}

add_action("wp_head", function(){
    if(module_enabled("seo")){
        global $seo_object;

        /*
        *
        * Add meta tags to the header of the website.
        * 
        */
        echo ($seo_object)->get_meta_tag(SEO_ROBOTS);
        echo ($seo_object)->get_meta_tag(SEO_RATING);
        echo ($seo_object)->get_meta_tag(SEO_LANGUAGE);
        echo ($seo_object)->get_meta_tag(SEO_TITLE);
        echo ($seo_object)->get_meta_tag(SEO_DESCRIPTION);
        echo ($seo_object)->get_meta_tag(SEO_SECTION);

        /*
        *
        * Canonical.
        * 
        */
        echo ($seo_object)->get_meta_tag(SEO_CANONICAL);

        /*
        *
        * Add OpenGraph information.
        * 
        */  
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_SITENAME);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_TITLE);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_IMAGE);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_DESCRIPTION);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_TYPE);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_LOCALE);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_CURRENT_URL);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_PUBLISHED_TIME);
        echo ($seo_object)->get_meta_tag(SEO_OPENGRAPH_MODIFIED_TIME);

        /*
        *
        * Add Twitter cards.
        * 
        */
        echo ($seo_object)->get_meta_tag(SEO_TWITTER_CARD);
        echo ($seo_object)->get_meta_tag(SEO_TWITTER_SITE);
        echo ($seo_object)->get_meta_tag(SEO_TWITTER_DESCRIPCION);
        echo ($seo_object)->get_meta_tag(SEO_TWITTER_TITLE);
        echo ($seo_object)->get_meta_tag(SEO_TWITTER_IMAGE);


        /*
        *
        * Show theme color.
        * 
        */ 
        echo ($seo_object)->get_meta_tag(SEO_THEME_COLOR);
    }
});

add_action("init", function(){
    if(module_enabled("seo")){
        global $seo_faq;
        global $post;
        $seo_faq = new SEO_FAQ((is_admin() && isset($_GET["post"]) ? $_GET["post"] : $post));
    }

    if(get_option("_disable_wp_texturize")=="on"){
        add_filter('do_texturize', '__return_false');
    }
});

add_action("wp_footer", function(){
    if(module_enabled("seo")){
        global $seo_object;
        /*
        *
        * Show JSON LD.
        * 
        */
        global $post;

        // Breadcrumb
        echo ($seo_object)->get_breadcrumb();

        $schema = new SEO_Schema($post);

        // Article
        $schema->article($seo_object, $post);

        // WebPage
        $schema->webpage();
    }
});

add_action('admin_bar_menu', function($admin_bar){
    if(module_enabled("seo") && get_option("blog_public") !== "1" && current_user_can("manage_options")){
        echo '<style>
        /* Blog not indexing warning */
        #wp-admin-bar-no-indexing a:hover,
        #wp-admin-bar-no-indexing a:focus,
        #wp-admin-bar-no-indexing a{
            background: #d00000 !important;
            color:white !important;
        }
        </style>';
        $admin_bar->add_menu( array(
            'id'    => 'no-indexing',
            'title' => '&osol; '.__('Indexación desactivada', TRANSLATIONS),
            'href'  => get_admin_url().'options-reading.php'
        ));
    }
}, 100);
?>