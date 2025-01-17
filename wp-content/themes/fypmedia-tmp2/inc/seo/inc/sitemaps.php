<?php
if(!defined('ABSPATH')){
	die();
}

class Seven_Sitemaps{
	private $url_list = [];

	function __construct(){
		if($this->is_sitemaps_enabled()){
			add_action("init", function(){
				$this->disable_wordpress_sitemaps();
			});

			$request_uri = urldecode($_SERVER['REQUEST_URI']);
			if($request_uri == '/sitemap.xml' || $request_uri == '/sitemap.xml/'){
				global $wpdb;
				$wpdb->supress_errors = true;
				$wpdb->show_errors = true;

				header("X-Robots-Tag: noindex, follow");
				header("Content-type: text/xml; charset=utf-8");
				$html = '<?xml version="1.0" encoding="UTF-8"?>
				<?xml-stylesheet type="text/xsl" href="'.get_template_directory_uri().'/inc/seo/sitemaps-css/sitemaps.xsl"?>
				<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
						
				$html .= $this->get_sitemap_html();

				$html .= '</urlset>';
				exit((function_exists("compress_html") ? compress_html($html) : $html));
			}
		}
	}

	public function create_shortcode_sitemap(){
		/* Add shortcodes */
		add_shortcode("sitemap_html", function(){
			$html = '<ul>';

			/*/
			/* List categories and posts.
			/*/
			$categories = get_categories(["hide_empty" => true]);
			if($categories){
				foreach($categories as $category){
					$html .= '<li><b><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></b></li>';
					$articles = get_posts(
						array(
							'numberposts' => -1,
							'post_status' => 'publish',
							'post_type' => 'post',
							'category' => $category->term_id
						)
					);
					if(!empty($articles)){
						$html .= '<ul>';
						foreach ($articles as $article) { 
							$seo_index = get_post_meta($article->ID, '_seo_index', true);
							if((int)$seo_index!=0){
								$html .= '<li><a href="'.get_the_permalink($article->ID).'">'.get_the_title($article->ID).'</a></li>';
							}
						}
						$html .= '</ul>';
					}
					$html .= '</ul>'; 
					unset($articles);
				}
			}
			unset($categories);
			
			
			/*/
			/* List pages.
			/*/
			$page_count=0;
			ob_start();
				$articles = get_posts(
					array(
						'numberposts' => -1,
						'post_status' => 'publish',
						'post_type' => 'page'
					)
				);
				foreach ($articles as $article){
					$page_count++; 
					$seo_index = get_post_meta($article->ID, '_seo_index', true);
					if((int)$seo_index!=0){
						echo '<li><a href="'.get_the_permalink($article->ID).'">'.get_the_title($article->ID).'</a></li>';
					}
				}

			// Print the content if any page exists.
			$content = ob_get_clean();
			if($page_count>0){
				$html .= '<ul>'.$content.'</ul>';
			}
			return $html;
		});
	}

	private function disable_wordpress_sitemaps(){
		/* Disable by default WordPress 5.5 sitemaps */
		add_filter( 'wp_sitemaps_enabled', '__return_false' );
	}

	function is_sitemaps_enabled(){
		return (module_enabled("sitemap") && get_option("_enable_sitemap") == "on");
	}

	function add_url($url, $date="", $modified="", $freq="weekly", $priority="1.0"){
		if(strlen(trim($url))==0) return false;

		/* Ignore the last slash to check if URL already exists. */
		if(substr($url, strlen($url)-1, strlen($url))=="/"){
			$checkUrl = substr($url, 0, strlen($url)-1);
		}else{
			$checkUrl = $url;
		}

		if(in_array($checkUrl, $this->url_list)) return false;
		array_push($this->url_list, $checkUrl);

		if(strlen($date) == 0){
			$date=date("c", time());
		}else{
			$date=date("c", (int)$date);
		}
		return '<url>
			<loc>'.$url.'</loc>
			<lastmod>'.(isset($modified) && strlen($modified)>0 ? $modified : $date).'</lastmod>
			<changefreq>'.$freq.'</changefreq>
			<priority>'.$priority.'</priority>
		</url>';
	}

	function get_sitemap_html(){
		// Add new urls with filter.
		$filter_list = [];
		if(has_filter("seven_serp_sitemap")){
			$filter_list = apply_filters("seven_serp_sitemap", $filter_list);
		}

		// HTML.
		$html = "";

		// Home
		$html .= $this->add_url(get_site_url());

		// Categories.
		if(get_option("_sitemap_categories") == "on"){
			$categories = get_categories(["hide_empty" => true]);
			if($categories){
				foreach($categories as $category) {
					$html .= $this->add_url(get_term_link(get_term($category->term_id, 'category')));
				}
			}
			unset($categories);
		}

		// Pages.
		if(get_option("_sitemap_pages") == "on"){
			$articles = get_posts(
				array(
					'numberposts' => -1,
					'post_status' => 'publish',
					'post_type' => 'page'
				)
			);
			foreach ($articles as $article) { 
				$seo_index = get_post_meta($article->ID, '_seo_index', true);
				if((int)$seo_index!=0){
					$html .= $this->add_url(get_the_permalink($article->ID), get_the_date("c", $article->ID), get_post_modified_time("c", false, $article->ID), "weekly");
				}
			}
			unset($articles);
		}

		// Posts.
		if(get_option("_sitemap_posts") == "on"){
			$articles = get_posts(
				array(
					'posts_per_page' => -1,
					'post_status' => 'publish',
					'post_type' => 'post'
				)
			);
			foreach ($articles as $article) { 
				$seo_index = get_post_meta($article->ID, '_seo_index', true);
				if((int)$seo_index!=0){
					$html .= $this->add_url(get_the_permalink($article->ID), get_the_date("c", $article->ID), get_post_modified_time("c", false, $article->ID), "weekly");
				}
			}
			unset($articles);
		}

		// Filter.
		if(is_array($filter_list) && !empty($filter_list)){
			foreach($filter_list as $url){
				$html .= $this->add_url($url);
			}
		}

		// Clear URL list.
		$this->url_list = [];

		return $html;
	}
}

global $Seven_Sitemaps;
$Seven_Sitemaps = new Seven_Sitemaps();

// Create [sitemap_html] even if module is not enabled.
$Seven_Sitemaps->create_shortcode_sitemap();
?>