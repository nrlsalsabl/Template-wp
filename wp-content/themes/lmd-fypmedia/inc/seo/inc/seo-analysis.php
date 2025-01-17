<?php
if(!defined("ABSPATH")){
	header('HTTP/1.0 403 Forbidden');
	exit;
}

if(!class_exists("SEO_Analysis")){
    class SEO_Analysis{
        private $post_id=0;

        function __construct($post_id=0){
            $this->post_id = ($post_id>0 ? $post_id : 0);
        }

        public function get_word_count(): int{
            /*/
            /* Returns the number of words.
            /*/
            return (int)@str_word_count(strip_shortcodes(apply_filters('the_content', get_the_content($this->post_id))));
        }

        public function get_links($get_array_with_urls=false): stdClass{
            /*/
            /* Count posts links.
            /*/
            $links = (object)array(
                "internal" => 0,
                "external" => 0,
                "obfuscated" => 0,
                "hash" => 0
            );

            $urls = (object)[
                "internal" => [],
                "external" => [],
                "obfuscated" => [],
                "hash" => []
            ];

            if(!class_exists("DomDocument")) return (object)$links;
            try{
                $website_url = parse_url(home_url());
                $html = apply_filters('the_content', get_the_content($this->post_id));
                if($html && strlen(trim($html))>0 && is_string($html)){
                    $dom = new DOMDocument;
                    @$dom->loadHTML($html);

                    // Count all clear text links <a>
                    $ahref = $dom->getElementsByTagName('a');
                    foreach ($ahref as $link){
                        $url = parse_url($link->getAttribute('href'));
                        if(isset($url["host"])){
                            if($url["host"] == $website_url["host"]){
                                // Internal link!
                                $links->internal++;
                                array_push($urls->internal, ["url" => $link->getAttribute('href'), "rel" => $link->getAttribute("rel"), "anchor" => $link->nodeValue]);
                            }else{
                                // Otherwise, external.
                                $links->external++;
                                array_push($urls->external, ["url" => $link->getAttribute('href'), "rel" => $link->getAttribute("rel"), "anchor" => $link->nodeValue]);
                            }
                        }else{
                            $links->hash++;
                            array_push($urls->hash, ["url" => $link->getAttribute('href'), "rel" => $link->getAttribute("rel"), "anchor" => $link->nodeValue]);
                        }
                    }

                    // Count obfuscated.
                    $spans = $dom->getElementsByTagName('span');
                    foreach ($spans as $span){
                        if($span->hasAttribute("data-link-optimizer")){
                            $links->obfuscated++;
                            array_push($urls->obfuscated, ["url" => $span->getAttribute('data-link-optimizer'), "anchor" => $span->nodeValue]);
                        }
                    }

                    return (object)($get_array_with_urls ? $urls : $links);
                }
            }catch(Exception $ex){
                return (object)$links;
            }
            return (object)$links;
        }

        function get_score(){
            
        }

        public function add_core_vitals_footer(){
            if(get_option("_show_web_vitals") != "on" || !current_user_can("manage_options")) return false;
            echo '<style>
            .web-vitals{
                background:#12161b;
            }
            .web-vitals dl{
                display: flex;
                flex-wrap: wrap;
                width:250px !important;
                padding:0px 5px !important;
                height:32px !important;
            }
            .web-vitals a{
                padding:0px !important;
                color:white;
            }
            .web-vitals dl div{
                height:16px !important;
                padding:0px 10px !important;
                box-sizing:border-box !important;
            }
            .web-vitals dl div{
                float:left;
                width:33.333333% !important;
            }
            .web-vitals dl div dt{
                width:40% !important;
            }
            .web-vitals dl div dd{
                width:60% !important;
                text-align:right !important;
            }
            .web-vitals dl div dt,
            .web-vitals dl div dd{
                float:left !important;
            }
            .is-final.is-great{
                color:#00ff66;
            }
            .web-vitals dl div a,
            .web-vitals dl div dt,
            .web-vitals dl div dd{
                padding:0px;
                line-height:15px !important;
                font-size:11px !important;
            }
            </style>
            <script src="//unpkg.com/web-vitals@0.2.4/dist/web-vitals.es5.umd.min.js"></script>
            <script>
                    window.addEventListener(\'load\', function () {
                        /* Create div */
                        var div = document.createElement("li"),
                        parent = document.querySelector("#wp-admin-bar-top-secondary");
                        div.innerHTML = "<web-vitals></web-vitals>";
                        parent.appendChild(div);
                    });
            </script>
            <web-vitals cls fcp fid lcp ttfb></web-vitals>
            <script src="https://unpkg.com/web-vitals-element@1.0.1/dist/web-vitals-element.min.js"></script>';
        }
    }
}

add_action("get_footer", function(){
    (new SEO_Analysis())->add_core_vitals_footer();
});
?>