<?php
if(!defined("ABSPATH")){
	header('HTTP/1.0 403 Forbidden');
	exit;
}

add_action("admin_init", function(){
    /*/
    /* Enable or disable a schema.
    /*/
    add_action('wp_ajax_toggle_schema', function(){
        if(!isset($_POST["nonce"]) || !current_user_can(SEO_PERMISSIONS)) exit("INSUFFICIENT_PERMISSIONS");
        if(!isset($_POST["id"])) exit("WRONG_POST_ID");
        if(!isset($_POST["schema"])) exit("NO_SCHEMA_SENT");
        if(isset($_POST["schema"]) && !ctype_alnum($_POST["schema"])) exit("WRONG_SCHEMA_ID");
        if(isset($_POST["id"]) && !is_numeric($_POST["id"])) exit("NOT_NUMERIC_POST_ID");
        if(!wp_verify_nonce(sanitize_text_field($_POST["nonce"]), ADMIN_THEME_NONCE)) exit("NONCE_VERIFICATION_FAILED");

        try{
            $schema = new SEO_Schema($_POST["id"]);
            $schema->toggle($_POST["schema"]);

            exit(($schema->is_schema_enabled($_POST["schema"]) ? 'ENABLED' : 'DISABLED'));
        }catch(Exception $ex){
            exit("SERVER_ERROR".(defined("WP_DEBUG") && WP_DEBUG ? "_".$ex->getMessage() : NULL));
        }
    });

    /*/
    /* Generate modal content.
    /*/
    add_action('wp_ajax_edit_schema', function(){
        if(!isset($_POST["nonce"]) || !current_user_can(SEO_PERMISSIONS)) exit("INSUFFICIENT_PERMISSIONS");
        if(!isset($_POST["id"])) exit("WRONG_POST_ID");
        if(!isset($_POST["schema"])) exit("NO_SCHEMA_SENT");
        if(isset($_POST["schema"]) && !ctype_alnum($_POST["schema"])) exit("WRONG_SCHEMA_ID");
        if(isset($_POST["id"]) && !is_numeric($_POST["id"])) exit("NOT_NUMERIC_POST_ID");
        if(!wp_verify_nonce(sanitize_text_field($_POST["nonce"]), ADMIN_THEME_NONCE)) exit("NONCE_VERIFICATION_FAILED");

        try{
            $schema = new SEO_Schema($_POST["id"]);
            echo $schema->get_modal_content($_POST["schema"]);
            wp_die();
        }catch(Exception $ex){
            exit("SERVER_ERROR".(defined("WP_DEBUG") && WP_DEBUG ? "_".$ex->getMessage() : NULL));
        }
    });
});

class SEO_Schema{
    private $post_id=0;

    function __construct($post_id=NULL){
        if($post_id==NULL || !is_numeric($post_id)){
            global $post;
            if(isset($post->ID)){
                $this->post_id = $post->ID;
            }
        }

        if($this->post_id==0 && is_numeric($post_id) && $post_id>0){
            $this->post_id = $post_id;
        }
        unset($post);
    }

    public function toggle($id=NULL): bool{
        /*/
        /* Change a schema status.
        /*/
        if($this->schema_exists($id)){
            update_post_meta($this->post_id, $this->enabled_key($id), ($this->is_schema_enabled($id) ? "off" : "on"));
        }
        return false;
    }
    
    private function enabled_key($id){
        /*/
        /* Returns the key for a schema ID.
        /*/
        return "_".$id."_status";
    }

    private function schema_exists($id=NULL): bool{
        /*/
        /* Checks if a schema exists based on an ID.
        /*/
        if($id>NULL && is_string($id) && ctype_alnum($id)){
            foreach($this->get_options() as $opt){
                if(isset($opt["id"]) && $opt["id"]===$id) return true;
            }
        }
        return false;
    }

    public function is_schema_enabled($id=NULL){
        /*/
        /* Checks if a specific schema is enabled.
        /*/
        if($this->post_id>0 && !$this->schema_exists($id)) return false;
        $option = get_post_meta($this->post_id, $this->enabled_key($id), true);
        if($option && $option == "on") return true;
        if($option && $option == "off") return false;
        if(!$option || ($option!="on"&&$option!="off")){
            foreach($this->get_options() as $opt){
                if(isset($opt["id"]) && $opt["id"]===$id && isset($opt["enabled_by_default"]) && $opt["enabled_by_default"]==true){
                    return true;
                }
            }
            return false;
        }
        return false;
    }

    private function render_editable_schema_fields($schema=[]){
        $html = "";
        foreach($schema as $key => $fields){
            if(isset($fields["name"])){
                $html .= '<div class="schema-edit">
                    <div class="schema-editable-title">'.$fields["name"].'</div>
                    <div class="schema-editable-field"><input type="text" name="'.$fields["field"].'"></div>
                    <div class="seo-clear"></div>
                </div>';
            }
        }
        return $html;
    }

    public function get_modal_content($id=NULL){
        if($id==NULL || !is_string($id)) throw new Exception(__("ID de dato estructurado incorrecta.", TRANSLATIONS));
        if($this->schema_exists($id)){
            $html = NULL;
            foreach($this->get_options() as $opt){
                if(isset($opt["id"]) && $opt["id"]===$id){
                    if(!isset($opt["schema"])){
                        $html .= __("Este dato estructurado no tiene campos editables.", TRANSLATIONS);
                    }else{
                        $html .= '<h1>'.htmlentities($opt["title"]).'</h1>';
                        $html .= $this->render_editable_schema_fields($opt["schema"]);
                    }
                }
            }
            if($html>NULL){
                return $html;
            }
        }
        return __("Sin datos para modificar.", TRANSLATIONS);
    }

    function get_options(){
        return [
            [
                "id" => "article",
                "title" => __("Artículo", TRANSLATIONS),
                "original" => "Article",
                "desc" => __("Los datos estructurados de 'Article' muestran información sobre el artículo y se muestra automáticamente.", TRANSLATIONS),
                "automatic" => true,
                "enabled_by_default" => true
            ],
            [
                "id" => "webpage",
                "title" => __("Página web", TRANSLATIONS),
                "original" => "WebPage",
                "desc" => __("El dato estructurado de página web incluye datos de interés como las redes sociales o las entidades (configurado más abajo).", TRANSLATIONS),
                "automatic" => true,
                "enabled_by_default" => true
            ],
            [
                "id" => "breadcrumb",
                "original" => "BreadcrumbList",
                "title" => __("Migas de pan", TRANSLATIONS),
                "desc" => __("Las migas de pan (breadcrumb) aparecen de manera automática basadas en la URL del artículo o página.", TRANSLATIONS),
                "automatic" => true,
                "enabled_by_default" => true
            ],
            [
                "id" => "faq",
                "title" => __("Preguntas y respuestas"),
                "original" => "Question/Answer",
                "desc" => __("Para añadir preguntas y que se muestren en Google es necesario que el contenido de las preguntas esté en el texto. Para ello, utiliza el shortcode [a] para respuestas y [q] para preguntas y se añadirá por sí mismo.", TRANSLATIONS),
                "automatic" => true,
                "enabled_by_default" => true
            ],
            /*[
                "id" => "entities",
                "title" => __("Entidades", TRANSLATIONS),
                "original" => "About/Mentions",
                "desc" => __("Este tipo de dato estructurado indicará a Google sobre qué entidades habla el artículo o la página. Es necesario añadirlas manualmente.", TRANSLATIONS)
            ],
            [
                "id" => "mobileapplication",
                "original" => "MobileApplication",
                "title" => __("Aplicación para móviles", TRANSLATIONS),
                "desc" => __("En caso de que añadas alguna aplicación móvil en el artículo, deberías de rellenar este dato estructurado.", TRANSLATIONS),
                "schema" => [
                    "@context" => "https://schema.org",
                    "@type" => "MobileApplication",
                    "name" => "%%name%%",
                    "description" => [
                        "field" => "description",
                        "name" => __("Descripción", TRANSLATIONS)
                    ],
                    "operatingSystem" => "%%os%%",
                    "applicationCategory" => "https://schema.org/MobileApplication",
                    "offers" => [
                        "@type" => "Offer",
                        "price" => "%%price%%",
                        "priceCurrency" => "EUR"
                    ],
                    "aggregateRating" => [
                        "@type" => "AggregateRating",
                        "ratingValue" => "5",
                        "bestRating" => "5",
                        "ratingCount" => "1"
                    ]
                ]
            ],*/
            [
                "id" => "sportevent",
                "disabled" => true,
                "title" => __("Evento deportivo", TRANSLATIONS),
                "original" => "SportsEvent",
                "desc" => __("Este dato estructurado se utiliza únicamente para mostrar un evento deportivo.", TRANSLATIONS)
            ]
        ];
    }

    public function show_options(){
        echo '<div class="theme-admin-modal" name="schema">                            
            <div class="close-modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <div class="loader">
                <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
            <div class="modal-box">

            </div>
        </div>';

        foreach($this->get_options() as $schema){
            if(!isset($schema["disabled"]) || (isset($schema["disabled"]) && $schema["disabled"]!=true)){
                echo '<div class="seo-schema">
                    <div class="schema">
                        <div class="schema-title">
                            <span data-microtip-size="large" aria-label="'.esc_attr($schema["desc"]).'" data-microtip-position="right" role="tooltip" class="if"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>
                            <span class="schema-type">
                                '.trim(htmlentities($schema["title"])).'<br>
                                <span class="schema-original">'.$schema["original"].'</span>
                            </span>
                        </div>
                        <div class="schema-options">'.
                            
                            (isset($schema["automatic"]) && $schema["automatic"]==true ? '<span class="schema-automatic" role="tooltip" data-microtip-position="top" data-microtip-size="medium" aria-label="'.__("Este tipo de dato estructurado se configura automáticamente. Únicamente puedes habilitarlo y deshabilitarlo.", TRANSLATIONS).'">'.__("Automático", TRANSLATIONS).'</span>' : '<span class="schema-configure">'.__("Configurar", TRANSLATIONS).'</span>').'
                            <input type="checkbox" class="toggle" id="'.$schema["id"].'" '.($this->is_schema_enabled($schema["id"]) ? ' checked' : NULL).'>
                            <label for="'.$schema["id"].'">
                                <span class="on">'.__('Activado', TRANSLATIONS).'</span>
                                <span class="off">'.__('Desactivado', TRANSLATIONS).'</span>
                            </label>
                        </div>
                    </div>
                </div>';
            }
        }
    }

    private function generate_json_ld($properties){
        return "<script type=\"application/ld+json\">" . json_encode($properties, JSON_HEX_APOS | JSON_UNESCAPED_UNICODE) . "</script>";
    }

    public function mobileapplication($seo_object=NULL, $post=NULL){

    }

    public function article($seo_object=NULL, $post=NULL){
        /*
         *
         * Article (https://schema.org/Article)
         * 
         */
        try{
            // No class! Module disabled?
            if(!class_exists("SEO") || $post==NULL || !is_object($post)) return NULL;

            // Not enabled.
            if(!$this->is_schema_enabled("article")) return NULL;
            if($seo_object==NULL){
                $seo_object = new SEO();
            }
            
                $image = $seo_object->get_current_image();
                if($image>NULL){
                    list($width, $height, $type, $attr) = @getimagesize($image);
                }
                $article_url = get_the_permalink($post->ID);
                $author = seven_get_post_author($post->ID);
                $ctx = [
                    '@context' => 'https://schema.org',
                    '@type' => 'Article',
                    'name' => $post->post_title,
                    'headline' => $post->post_title,
                    'description' => $post->post_excerpt,
                    'datePublished' => $post->post_date,
                    'dateModified' => (isset($post->post_modified) ? $post->post_modified : $post->post_date),
                    'url' => $article_url,
                    'inLanguage' => ($seo_object->get_current_locale()),
                    'author' => [
                        '@type' => 'Person',
                        'name' => $author
                    ],
                    'mainEntityOfPage' => [
                        '@type' => 'WebPage',
                        '@id' => get_site_url()
                    ]
                ];

                // Number of words in Article.
                $word_count = (int)get_post_meta($post->ID, '_word_count', true);
                if($word_count && is_numeric($word_count) && $word_count>0){
                    $ctx["wordCount"] = (int)$word_count;
                }

                if(isset($image)){
                    // Add article image if exists.
                    $ctx['image'] = [
                        '@type' => 'ImageObject',
                        'url' => (isset($image) ? $image : NULL),
                        'width' => (isset($width) ? $width : NULL),
                        'height' => (isset($height) ? $height : NULL)
                    ];
                }

                // Add publisher logo if exists.
                $logo = get_logo(true);
                if($logo>NULL){
                    $ctx['publisher'] = [
                        '@type' => 'Organization',
                        'name' => $seo_object->get_publisher(),
                        'logo' => [
                            "@type" => "ImageObject",
                            "url" => $logo
                        ]
                    ];
                }

                echo $this->generate_json_ld($ctx);
                unset($author);
                unset($article_url);
                unset($image);
                unset($content);
        }catch(Exception $ex){
            
        }
    }

    public function webpage(){
        /*
         *
         * WebPage (https://schema.org/WebPage)
         * 
         */
        if($this->is_schema_enabled("webpage")){
            global $seo_object;
            $ctx = [
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'url' => $seo_object->get_current_url()
            ];
            
            if($seo_object->get_current_description()>NULL){
                /*/
                /* Add the current meta title as headline.
                /*/
                $ctx["headline"] = $seo_object->get_current_description();
            }

            if($this->is_schema_enabled("entities")){
                /*/
                /*
                /* Entities
                /*
                /*/
                $ctx['about'] = [
                    [
                        '@type' => 'Thing',
                        'name' => 'SEO',
                        'sameAs' => 'https://wikipedia.org/en/hola'
                    ]
                ];
                $ctx['mentions'] = [
                    [
                        '@type' => 'Organization',
                        'name' => 'Qonto',
                        'sameAs' => 'https://wikipedia.org/en/hola'
                    ],
                    [
                        '@type' => 'Organization',
                        'name' => 'Qonto2',
                        'sameAs' => 'https://wikipedia.org/en/hola'
                    ]
                ];
            }
            echo $this->generate_json_ld($ctx);
        }
    }
}

class SEO_FAQ extends SEO_Schema{
    private $post = [];
    private $wpdb = NULL;
    private $questions = [];
    private $answers = [];
    private $faq = [];

    function __construct($post=null){
        global $seo_faq;
        if(isset($seo_faq) && $seo_faq>NULL){
            return $seo_faq;
        }

        if($post>NULL){
            $this->post = $post;
        }

        global $wpdb;
        $this->wpdb = $wpdb;

        add_shortcode("q", function($atts=[], $content=NULL){
            $this->add_question_to_list(do_shortcode($content));
            return do_shortcode($content);
        });
        
        add_shortcode("a", function($atts=[], $content=NULL){
            $this->add_answer_to_list(do_shortcode($content));
            return do_shortcode($content);
        });

        add_action("wp_footer", function(){
            $this->show_schema();
        });
    }

    private function add_answer_to_list($answer=""){
        /*/
        /* Add an answer.
        /*/
        if(!is_string($answer) || strlen(trim($answer))==0) return false;
        array_push($this->answers, strip_tags($answer));
    }

    private function add_question_to_list($question=""){
        /*/
        /* Add a question.
        /*/
        if(!is_string($question) || strlen(trim($question))==0) return false;
        array_push($this->questions, strip_tags($question));
    }

    private function has_questions(){
        /*/
        /* This schema has questions?
        /*/
        return !empty($this->questions);
    }

    public function display_questions(){
        /*/
        /* Display questions for SEO Google preview.
        /*/
        if($this->post == NULL) return false;
        $this->obtain_faq(true);

        $html = '<div class="seo-google-faq">';
        foreach($this->faq as $faq){
            if(isset($faq["name"]) && isset($faq["acceptedAnswer"]["text"])){
                $html .= '<div class="seo-google-question">
                    <span>
                        '.strip_tags(htmlentities($faq["name"])).'<svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>
                    </span>
                    <div class="seo-google-answer">'.strip_tags(htmlentities($faq["acceptedAnswer"]["text"])).'</div>
                </div>';
            }
        }
        $html .= '</div>';
        return $html;
    }

    private function obtain_faq($force=false){
        /*/
        /* Obtain all questions and answers again.
        /*/
        $this->faq = [];

        if($force){
            ob_start();
            do_shortcode(get_the_content($this->post));
            ob_end_flush();
        }

        $current_question=0;
        foreach($this->questions as $question){
            array_push($this->faq, 
                ["@type" => "Question", 
                "name"  => $question,
                "acceptedAnswer" => 
                    [
                        "@type" => "Answer",
                        "text" => $this->answers[$current_question]
                    ]
            ]);
            $current_question++;
        }
    }

    public function show_schema(){
        /*/
        /* Show the schema in footer.
        /*/
        if($this->is_schema_enabled("faq")){
            $this->obtain_faq();

            if(!empty($this->faq)){
                $schema = ["@context" => "https://schema.org", "@type" => "FAQPage", "mainEntity" => $this->faq];
                echo '<script type="application/ld+json">'.json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT |  JSON_UNESCAPED_UNICODE).'</script>';
            }
        }
    }
}