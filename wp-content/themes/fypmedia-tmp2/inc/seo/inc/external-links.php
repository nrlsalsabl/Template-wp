<?php
if(!defined('ABSPATH')){
	die();
}


if(!class_exists("Seven_Link")){
    class Seven_Link{
        private $anchor_text = "";
        private $atts = [];

        function __construct($atts=[], $anchor_text=""){
            if(is_string($anchor_text)){
                $this->anchor_text = strip_tags(htmlentities($anchor_text));
                unset($anchor_text);
            }
            if(is_array($atts)){
                $this->atts = $atts;
                unset($atts);
            }
        }

        public function rel_list(){
            /*/
            /* Returns the list of valid rel tags.
            /*/
            return [
                "alternate", "author", "bookmark", "ugc", "external", "help", "license", "next", "nofollow", "sponsored", "noreferrer", "noopener", "prev", "search", "tag"
            ];
        }

        private function valid_rel(){
            /*/
            /* Check if all rel tags are valid.
            /*/
            if(isset($this->atts["rel"]) && 
            is_string($this->atts["rel"])){
                $rel = trim($this->atts["rel"]);
                if(strpos($rel, " ") !== FALSE){
                    $rels = explode(" ", $rel);
                    foreach($rels as $r){
                        if(strlen(trim($r))>0 && !in_array($r, $this->rel_list())) return false;
                    }
                }else if(in_array($rel, $this->rel_list())){
                    return true;
                }
            }
            return false;
        }

        private function get_url(){
            /*
            *
            * 
            * Get URL.
            * 
            * 
            */
            if(isset($this->atts["href"]) || isset($this->atts["url"])){
                if(isset($this->atts["href"])){
                    $url = $this->atts["href"];
                }else if(isset($this->atts["url"])){
                    $url = $this->atts["url"];
                }else{
                    return "#";
                }
                return str_replace(['"', "'"], NULL, $url);
            }
            return "#";
        }

        private function get_rel(){
            /*
            *
            * 
            * Get rel.
            * 
            * 
            */
            if(isset($this->atts["rel"]) && $this->valid_rel()){
                return trim($this->atts["rel"]);
            }
            return "";
        }
        
        private function get_anchor_text(){
            /*
            *
            * 
            * Get anchor text.
            * 
            * 
            */
            if(strlen(trim($this->anchor_text))>0){
                return do_shortcode(html_entity_decode($this->anchor_text));
            }else{
                return "[".__("Enlace no válido", TRANSLATIONS)."]";
            }
        }

        public function render(){
            if(!isset($this->atts["obfuscate"]) && !isset($this->atts["ofuscar"])){
                // Common link.
                return '<a href="'.$this->get_url().'">'.$this->get_anchor_text().'</a>';
            }else{
                // Ofuscated link.
                return '<span data-link-optimizer="'.base64_encode($this->get_url()).'"'.(isset($this->atts["newtab"]) && $this->atts["newtab"]=="1" ? ' data-link-target="_blank"' : NULL).'>'.$this->get_anchor_text().'</span>';
            }
        }
    }
}

add_shortcode('link', function($atts, $content=null){
    if(class_exists("Seven_Link")){
        $link = new Seven_Link($atts, $content);
        return $link->render();
    }
    return NULL;
});

add_action("wp_footer", function(){
    if(current_user_can("manage_options") && get_option("_highlight_links")=="on"){
        // Highlight nofollow links.
        echo '<style>
            a{
                border:2px dashed green;
            }
            a[rel*="nofollow"][target*="_blank"]{
                box-shadow: 0 0 0 2px #de4a4a;
                outline: 2px dashed #6cebff;
                border:none;
            }
            a[rel*="nofollow"]:not([target*="_blank"]){
                border: 2px dashed #de4a4a;
                outline:none;
                box-shadow:none;
            }
        </style>';
    }
}, 99999);

add_filter('init', function(){
	/*/
	/* Automatically converts plain text to links.
	/*/
	if(get_option("_convert_links")=="on"){
		add_filter('the_content', 'make_clickable');
	}
});



	define('OR_INTERNAL_LINK', "/^".preg_replace("/:[\/]{2,2}/", ":\/\/[^\/]*", preg_quote(preg_replace("/\/\/www./", "//", get_option("siteurl"))))."/i");

	function or_convert_external_link($matches) {
		if(preg_match(OR_INTERNAL_LINK, $matches[2])){
			return $matches[0];
		}else{
			if(get_option("_add_nofollow_on_external")=="on"){
				// Modify rel=""
				if(strpos($matches[3], "rel=") === FALSE){
					$matches[3] .= 'rel="nofollow"';
				}else if(strpos($matches[3], "rel=") !== FALSE && strpos($matches[3], "nofollow") === FALSE){
					$matches[3] = str_replace(['rel="', "rel='"], ['rel="nofollow ', "rel='nofollow "], $matches[3]);
				}
			}

			if(get_option("_add_target_blank")=="on"){
				// Add target blank
				return "<a$matches[1]href=\"$matches[2]\" ".trim($matches[3])." target=\"_blank\">";
			}
			return "<a$matches[1]href=\"$matches[2]\" ".trim($matches[3]).">";
		}
	}
		
	function or_external_link($text){
		$pattern = '/<a([^>]*?)href=[\"\'](https*:\/\/.*?)[\"\']([^>]*?)>/i';
		return preg_replace_callback($pattern, 'or_convert_external_link', $text);
	}

	if(!is_feed()){
		add_filter('comment_text', 'or_external_link', 999);
		add_filter('the_content', 'or_external_link', 999);
		add_filter('the_excerpt', 'or_external_link', 999);
		add_filter('get_comment_author_link', 'or_external_link', 999);
	}
?>