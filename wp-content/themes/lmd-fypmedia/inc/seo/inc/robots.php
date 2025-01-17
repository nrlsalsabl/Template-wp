<?php
if(!defined("ABSPATH")){
    exit;
}

if(!class_exists("Seven_htaccess")){
    class Seven_htaccess{
        // Disable E-Tag
        private $disable_etag = "<IfModule mod_headers.c>\n
            Header unset ETag\n
        </IfModule>\n
        FileETag None\n";

        // Don't print Server: Apache [version]
        private $disable_server_signature = "ServerSignature Off\n";
        
        // Don't allow view folders:
        private $disable_directory_listing = "Options All -Indexes\n";

        // Send request to browser for cache files.
        private $cache = '<IfModule mod_expires.c>
            ExpiresActive off

            # By default 6 months cache
            ExpiresDefault                          "access plus 6 months"

            ExpiresByType text/cache-manifest       "access plus 1 day"

            ExpiresByType text/html                 "access plus 1 day"

            ExpiresByType text/xml                  "access plus 0 seconds"
            ExpiresByType application/xml           "access plus 0 seconds"
            ExpiresByType application/json          "access plus 0 seconds"

            ExpiresByType application/rss+xml       "access plus 1 hour"
            ExpiresByType application/atom+xml      "access plus 1 hour"

            ExpiresByType image/x-icon              "access plus 1 week"

            ExpiresByType image/gif                 "access plus 1 month"
            ExpiresByType image/png                 "access plus 1 month"
            ExpiresByType image/jpeg                "access plus 1 month"
            ExpiresByType video/ogg                 "access plus 1 month"
            ExpiresByType audio/ogg                 "access plus 1 month"
            ExpiresByType video/mp4                 "access plus 1 month"
            ExpiresByType video/webm                "access plus 1 month"

            ExpiresByType application/x-font-ttf    "access plus 1 month"
            ExpiresByType font/opentype             "access plus 1 month"
            ExpiresByType application/x-font-woff   "access plus 1 month"
            ExpiresByType image/svg+xml             "access plus 1 month"
            ExpiresByType application/vnd.ms-fontobject "access plus 1 month"
            ExpiresByType text/css                  "access plus 1 week"
            ExpiresByType application/javascript    "access plus 1 week"

        </IfModule>';
        
        // Adds the default charset as UTF-8 for json, css, xml...
        private $utf8 = "AddDefaultCharset utf-8
        
        <IfModule mod_mime.c>
            AddCharset utf-8 .atom .css .js .json .rss .vtt .xml
        </IfModule>";

        // Disable magic_quotes for older PHP versions.
        private $security = "<IfModule mod_php4.c>
            php_flag magic_quotes_gpc off
        </IfModule>";

        // Disable direct access to some files.
        private $forbid_files = "<FilesMatch \"^.*(error_log|wp-config\.php|php.ini|\.[hH][tT][aApP].*)$\">
            Order deny,allow
            Deny from all
        </FilesMatch>";

        // WordPress .htaccess
        private $wordpress = "# BEGIN WordPress
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteBase /

            # Slashes fix.
            RewriteCond %{THE_REQUEST} \s[^?]*//
            RewriteRule ^.*$ /$0 [R=301,L,NE]
            RewriteRule ^index\.php$ - [L]

            # Wordpress.
            RewriteRule ^index\.php$ - [L]
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule . /index.php [L]
        </IfModule>
        # END WordPress";

        // Enable gzip compression if allowed by server.
        private $enable_gzip = "<IfModule mod_deflate.c>
            <IfModule mod_setenvif.c>
                <IfModule mod_headers.c>
                    SetEnvIfNoCase ^(Accept-EncodXng|X-cept-Encoding|X{15}|~{15}|-{15})$ ^((gzip|deflate)\s*,?\s*)+|[X~-]{4,13}$ HAVE_Accept-Encoding
                    RequestHeader append Accept-Encoding \"gzip,deflate\" env=HAVE_Accept-Encoding
                </IfModule>
            </IfModule>

            <IfModule mod_filter.c>
                AddOutputFilterByType DEFLATE application/atom+xml \
                                            application/javascript \
                                            application/json \
                                            application/rss+xml \
                                            application/vnd.ms-fontobject \
                                            application/x-font-ttf \
                                            application/x-web-app-manifest+json \
                                            application/xhtml+xml \
                                            application/xml \
                                            font/opentype \
                                            image/svg+xml \
                                            image/x-icon \
                                            text/css \
                                            text/html \
                                            text/plain \
                                            text/x-component \
                                            text/xml
            </IfModule>
        </IfModule>";

        private $htaccess_location = "";

        // Custom rules
        private $custom = "";

        function __construct(){
            $this->htaccess_location = ABSPATH.".htaccess";
            $this->custom = trim(get_option("htaccess_custom"));
        }

        public function is_writable(){
            return is_writable($this->htaccess_location);
        }

        public function override(){
            if(is_admin() && current_user_can("manage_options")){
                return file_put_contents(
                    $this->htaccess_location, 

                    str_replace("\t", NULL, 
                    "
                    #
                    # GENERATED WITH SEVEN SERP THEME\n
                    #
                    # DO NOT EDIT THIS FILE. USE INSTEAD THE CUSTOM RULES.\n
                    # IF YOU WANT TO MODIFY THE HTACCESS FILE DIRECTLY, DISABLE THE MODULE.\n"
                    .$this->generate())
                );
            }
            return false;
        }

        function generate(){
            /*/
            /* Generates the .htaccess content.
            /*/
            return
                (get_option("enable_security_rules") == "on" 
                ? 
                "# Security rules\n".
                $this->disable_etag."\n\n".
                $this->disable_server_signature."\n\n".
                $this->disable_directory_listing."\n\n".
                $this->security."\n\n".
                $this->forbid_files."\n\n" 
                : 
                NULL).

                "# Default charset\n".
                $this->utf8."\n\n".

                (get_option("enable_disk_cache") == "on" 
                ? 
                "# Disk cache\n".
                $this->cache."\n\n"
                :
                NULL).

                (get_option("enable_gzip") == "on" 
                ? 
                "# Enable gzip compression\n".
                $this->enable_gzip."\n\n"
                :
                NULL).

                "# Custom rules\n".$this->custom."\n\n".
                $this->wordpress;
        }
    }
}

if(!class_exists("SEO_Robots")){
    class SEO_Robots{
        private $robots_location = null;
        private $robots_content = null;
        private $spiders_blocked = null;

        function __construct(){
            $this->robots_location = ABSPATH."robots.txt";
            if($this->exists() && module_enabled("robotstxt")){
                // Remove robots.txt. It will be generated dynamically.
                $this->remove();
            }

            $this->spiders_blocked = (get_option('blog_public') == 0 ? true : false);
        }

        public function has_sitemap(){
            if($this->robots_exists && strpos($this->robots_content, "Sitemap:") !== FALSE){
                return true;
            }
            return false;
        }

        public function exists(){
            if(file_exists($this->robots_location)){
                return true;
            }
            return false;
        }

        private function remove(){
            try{
                if($this->exists()){
                    rename($this->robots_location, str_replace("robots.txt", "robots.txt.backup", $this->robots_location));
                }
            }catch(Exception $ex){
                
            }
        }
        
        public function generate(){
            try{
                if(get_option("_robotstxt_type")==="replace"){
                    return trim(get_option("_robotstxt_content"));
                }
                if($this->spiders_blocked==true){
                    // Remove robots.txt file if spiders are blocked.
                    // It will generate a new one blocking all crawlers.
                    return "User-agent: *\nDisallow: /";
                }else{
                    $default = dirname(__FILE__)."/defaults/robots.txt";
                    if(file_exists($default)){ // Check if the default file exists, then:
                        $robots_content = file_get_contents($default);

                        // Sitemap
                        if(module_enabled("sitemap") && get_option("_enable_sitemap") == "on"){
                            $robots_content = str_replace("%%sitemap%%", "Sitemap: ".get_site_url()."/sitemap.xml", $robots_content); // This will add the website sitemap URL.
                        }else{
                            $robots_content = str_replace("%%sitemap%%", "# No sitemap defined.", $robots_content);
                        }

                        // Custom robots.txt rules.
                        if(get_option("_robotstxt_type")==="add"){
                            $robots_content = str_replace("%%custom%%", trim(get_option("_robotstxt_content")), $robots_content);
                        }
                        $robots_content = str_replace("%%custom%%", NULL, $robots_content);

                        // Block SEO tools.
                        $seo_tools = "";
                        if(get_option("_block_semrush") == "on"){
                            $seo_tools .= "\nUser-agent: SemrushBot\nDisallow: /\nUser-agent: SemrushBot-SA\nDisallow: /";
                        }
                        if(get_option("_block_ahrefs") == "on"){
                            $seo_tools .= "\nUser-agent: AhrefsBot\nDisallow: /";
                        }
                        if(get_option("_block_sistrix") == "on"){
                            $seo_tools .= "\nUser-agent: sistrix\nDisallow: /\nUser-agent: SISTRIX Crawler\nDisallow: /";
                        }
                        if(get_option("_block_majestic") == "on"){
                            $seo_tools .= "\nUser-agent: MJ12bot\nDisallow: /";
                        }
                        if(get_option("_block_moz") == "on"){
                            $seo_tools .= "\nUser-agent: dotbot\nDisallow: /";
                        }
                        if(get_option("_block_alexa") == "on"){
                            $seo_tools .= "\nUser-agent: ia_archiver\nDisallow: /";
                        }
                        if(get_option("_block_screamingfrog") == "on"){
                            $seo_tools .= "\nUser-agent: Screaming Frog SEO Spider\nDisallow: /";
                        }
                        $robots_content = str_replace("%%seobots%%", $seo_tools, $robots_content);

                        return $robots_content;
                    }
                }
            }catch(Exception $ex){
                
            }
            return '';
        }

        public function is_empty(){
            if($this->robots_exists){
                if(strlen(trim($robots_content)) == 0){
                    return true;
                }
            }
            return false;
        }
    }
}

add_action("init", function(){
    if(module_enabled("robotstxt")){
        $robots = new SEO_Robots();
    }
    if(!is_admin() && isset($robots) && parametros()==1 && parametro(1, "robots.txt")){
        if(!$robots->exists()){
            header("Content-type:text/plain; charset=utf-8");
            die($robots->generate());
        }
    }
});
?>