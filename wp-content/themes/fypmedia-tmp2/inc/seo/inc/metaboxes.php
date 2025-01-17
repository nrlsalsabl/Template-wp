<?php
if(!defined('ABSPATH')){
    header('HTTP/1.0 403 Forbidden');
	die();
}

use DonatelloZa\RakePlus\RakePlus;

/*
 *
 * 
 * Save word count on post save.
 * 
 * 
 */
add_action('save_post', function($post_id, $post, $update){
    if(module_enabled("seo")){
        $analysis = new SEO_Analysis($post_id);
        $words = ($analysis)->get_word_count();
        update_post_meta($post_id, '_word_count', $words);
    }
}, 10, 3);



/*
 *
 * 
 * Manage category SEO
 * 
 * 
 */

add_action('edit_category_form_fields', function($tag){ 
    if(module_enabled("seo")){
        $term_id = $tag->term_id;
        $seo_index = get_term_meta($term_id, "_seo_index", TRUE);
        $seo_follow = get_term_meta($term_id, "_seo_follow", TRUE);
        echo '<tr class="form-field">
            <tr class="form-field">
                <th scope="row" valign="top">
                <label for="extra1">'.__('Metatítulo', TRANSLATIONS).'</label></th>
                <td>
                    <input type="text" name="_seo_meta_title" size="25" style="width:60%;" value="'.esc_attr(get_term_meta($term_id, "_seo_meta_title", TRUE)).'"><br />
                    <p class="description">'.__('Añade el título SEO en este campo.', TRANSLATIONS).'</p>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top"><label for="extra2">'.__('Metadescripción', TRANSLATIONS).'</label></th>
                <td>
                    <textarea name="_seo_meta_description" style="width:60%;">'.get_term_meta($term_id, "_seo_meta_description", TRUE).'</textarea><br />
                    <span class="description">'.__('Añade la descripción SEO en este campo.', TRANSLATIONS).'</span>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top">
                    <label for="_seo_follow">'.__('Opciones de indexado', TRANSLATIONS).'</label>
                </th>
                <td>
                    <select name="_seo_index">
                        <option value="1"'.($seo_index && (int)$seo_index == 1 ? ' selected' : NULL).'>index</option>
                        <option value="0"'.(!$seo_index || ($seo_index && (int)$seo_index == 0) ? ' selected' : NULL).'>noindex</option>
                    </select><br />
                    <span class="description">'.__('Añade la descripción SEO en este campo.', TRANSLATIONS).'</span>
                </td>
            </tr>
            <tr class="form-field">
                <th scope="row" valign="top">
                    <label for="_seo_follow">'.__('Opciones de seguimiento', TRANSLATIONS).'</label>
                </th>
                <td>
                    <select name="_seo_follow">
                        <option value="1"'.($seo_follow && (int)$seo_follow == 1 ? ' selected' : NULL).'>follow</option>
                        <option value="0"'.(!$seo_follow || ($seo_follow && (int)$seo_follow == 0) ? ' selected' : NULL).'>nofollow</option>
                    </select><br />
                    <span class="description">'.__('Añade la descripción SEO en este campo.', TRANSLATIONS).'</span>
                </td>
            </tr>
        </tr>';
    }
});


add_action('edited_category', function($term_id, $tag_id){
    if(module_enabled("seo")){
        foreach(['_seo_meta_title', '_seo_meta_description'] as $term){
            if(isset($_POST[$term])){
                update_term_meta($term_id, $term, esc_attr($_POST[$term]));
            }
        }
        if(isset($_POST['_seo_index']) && ((int)$_POST["_seo_index"] == 1 || (int)$_POST["_seo_index"] == 0)){
            update_term_meta($term_id, '_seo_index', (int)$_POST["_seo_index"]);
        }
        if(isset($_POST['_seo_follow']) && ((int)$_POST["_seo_follow"] == 1 || (int)$_POST["_seo_follow"] == 0)){
            update_term_meta($term_id, '_seo_follow', (int)$_POST["_seo_follow"]);
        }
    }
}, 10, 2);

/*
 *
 * 
 * Add post information.
 * 
 * 
 */
function light_seo_traffic($post_id, $html=false){
    $index = get_post_meta($post_id, "_seo_index", true);
    $follow = get_post_meta($post_id, "_seo_follow", true);
    if(!$index || (string)$index != "1"){
        echo ($html ? compress_html('<span role="tooltip" aria-label="'.__("Este artículo no está configurado para indexar.", TRANSLATIONS).'" data-microtip-position="top">
            <div class="traffic-light-dot red"></div>
        </span>') : false);
    }else{
        $description = get_post_meta($post_id, "_seo_meta_description", true);
        $title = get_post_meta($post_id, "_seo_meta_title", true);
        if(strlen(trim($description))==0 || strlen(trim($title))==0){
            echo ($html ? compress_html('<span role="tooltip" aria-label="'.__("Falta el meta título y/o la meta descripción.", TRANSLATIONS).'" data-microtip-position="top">
                <div class="traffic-light-dot red"></div>
            </span>') : false);
        }else{
            echo ($html ? compress_html('<span role="tooltip" aria-label="'.__("¡Todo bien por aquí!", TRANSLATIONS).'" data-microtip-position="top">
                <div class="traffic-light-dot green"></div>
            </span>') : true);
        }
    }
            
    // Index status
    if($html && ((string)$index != "1" || (string)$follow != "1")){
        echo compress_html('<div class="seo-clear"></div>
        <div class="seo-status">
            '.((string)$index != "1" ? 'noindex' : NULL).'
            '.((string)$index != "1" && (string)$follow != "1" ? '/' : NULL).'
            '.((string)$follow != "1" ? 'nofollow' : NULL).'
        </div>');
    }
    return true;
}
function light_seo_columns($columns){
    if(!module_enabled("seo")) return $columns;
    // Total words from post content.
    $columns['word_count'] = __('Número de palabras', TRANSLATIONS);

    if(!is_child_theme()){
        // The traffic light won't be shown on child themes.
        $columns['traffic-light'] = __('Estado del SEO', TRANSLATIONS);
    }

    if(class_exists("DOMDocument")){
        // Links count, only if DOMDocument is available.
        $columns['links_count'] = __('Enlaces', TRANSLATIONS);
    }
    return $columns;
}
add_filter('manage_post_posts_columns', 'light_seo_columns', 1);
add_filter('manage_page_posts_columns', 'light_seo_columns', 1);
add_filter( 'manage_edit-post_sortable_columns', function($columns){
    if(!module_enabled("seo")) return $columns;
    $columns['word_count'] = '_word_count';
    return $columns;
});

add_action('pre_get_posts', function($query){
    if(!is_admin() || !module_enabled("seo")) return;
    $orderby = $query->get('orderby');
    if('_word_count' == $orderby){
        $query->set('meta_key','_word_count');
        $query->set('orderby','meta_value_num');
    }
});

function light_seo_columns_data($column, $post_id){
    if(!module_enabled("seo")) return;
    global $post;
    switch($column){
        case 'word_count':
            $words_meta = get_post_meta($post_id, '_word_count', true);
            if(!$words_meta || !is_numeric($words_meta)){
                $analysis = new SEO_Analysis($post_id);
                $words = $analysis->get_word_count();
                update_post_meta($post_id, '_word_count', $words);
            }else{
                $words = $words_meta;
            }
            unset($words_meta);
            if($words<=0){
                echo '<span class="seo-empty-post">&otimes; '.(__('¡Sin contenido!', SEO_PLUGIN_SLUG)).'</span>';
            }else{
                echo $words;
            }
        break;

        case "traffic-light":
            light_seo_traffic($post_id, true); /* true stands for HTML instead boolean */
        break;

        case "links_count":
            if(!class_exists("DOMDocument")){
                echo __("Es necesaria la extensión DOMDocument.", TRANSLATIONS);
            }else{
                $analysis = new SEO_Analysis($post_id);
                $links = $analysis->get_links();

                $internal = $links->internal;
                $external = $links->external;
                $obfuscated = $links->obfuscated;
                $hash = $links->hash;

                // Count the links:
                $total_links = $internal+$external+$obfuscated+$hash;

                if($total_links == 0){
                    // No links!
                    echo '<span class="seo-empty-post">&otimes; '.(__('¡Sin enlaces!', SEO_PLUGIN_SLUG)).'</span>';
                }else{
                    $percentages_tips = [
                        "internal" => __("Enlaces internos", TRANSLATIONS),
                        "external" => __("Enlaces externos", TRANSLATIONS),
                        "obfuscated" => __("Enlaces ofuscados", TRANSLATIONS),
                        "hash" => __("Enlaces ancla", TRANSLATIONS)
                    ];
                    $percentages_count = [
                        "internal" => $internal,
                        "external" => $external,
                        "obfuscated" => $obfuscated,
                        "hash" => $hash
                    ];
                    $percentages = [
                        "internal" => (($internal/$total_links)*100),
                        "external" => (($external/$total_links)*100),
                        "obfuscated" => (($obfuscated/$total_links)*100),
                        "hash" => (($hash/$total_links)*100)
                    ];
                    foreach($percentages as $opt => $count){
                        if($count == 0){
                            unset($percentages[$opt]);
                        }
                    }
                    
                    echo '<div class="links-counter">';
                    foreach($percentages as $opt => $count){
                        echo '<div class="links '.$opt.'" role="tooltip" aria-label="'.$percentages_tips[$opt].' ('.round($count, 2).' %)" data-microtip-position="top" style="width:'.$count.'%;"></div>';
                    }
                    echo '</div>';
                    echo '<div class="links-count">
                        <div class="links-categorized">';
                        $ix=0;
                        foreach($percentages_count as $opt => $count){
                            $ix++;
                            echo '<span role="tooltip" aria-label="'.$percentages_tips[$opt].' ('.$count.')" data-microtip-position="bottom">'.$count.'</span>'.($ix<count($percentages_count) ? '/' : NULL);
                        }
                        echo '</div>
                        <div class="links-total"><b>'
                        .sprintf(__("%s enlaces", TRANSLATIONS), $total_links).
                        '</b></div>
                        <div class="links-clear"></div>
                    </div> <!-- links counts -->';
                }
            }
        break;
    }
}
add_action('manage_post_posts_custom_column', 'light_seo_columns_data', 10, 2);
add_action('manage_page_posts_custom_column', 'light_seo_columns_data', 10, 2);

/*
 *
 * 
 * Create custom metaboxes.
 * 
 * 
 */
function seo_build_meta_box($post){
    if(!current_user_can(SEO_PERMISSIONS) || !module_enabled("seo")) return;
    wp_nonce_field(basename(__FILE__), 'seo_meta_box_nonce');
	$meta = [
        "title" => get_post_meta($post->ID, '_seo_meta_title', true), 
        "description" => get_post_meta($post->ID, '_seo_meta_description', true),
        "follow" => get_post_meta($post->ID, '_seo_follow', true),
        "index" => get_post_meta($post->ID, '_seo_index', true)
    ];

    /*/
    /* Tabs for SEO configuration.
    /*/
    $allowed_tabs = [
        "metatags" => __("Meta etiquetas", TRANSLATIONS),
        "schema" => __("Datos estructurados", TRANSLATIONS),
        "links" => __("Enlazado interno", TRANSLATIONS),
        "keywords" => __("Análisis de texto", TRANSLATIONS)
    ];

    if(!function_exists("active_seo_tab")){
        function active_seo_tab($tab="", $allowed_tabs=[]){
            // If no tabs selected, just pick the first.
            return (
                (!isset($_GET["seo-tab"]) && $tab==array_keys($allowed_tabs)[0]) 
                ||
                // Otherwise mark the selected one. 
                (isset($_GET["seo-tab"]) && isset($allowed_tabs[$_GET["seo-tab"]]) && $_GET["seo-tab"]==$tab)
            );
        }
    }

    if(!empty($allowed_tabs)){
        echo '<div class="seo-menu">';
        foreach($allowed_tabs as $tab => $text){
            echo '<div class="tab'.
            (
                active_seo_tab($tab, $allowed_tabs)
                ? 
                ' active' 
                : 
                NULL
            ).
            '" data-tab="'.$tab.'">'.$text.'</div>';
        }
        echo '</div>';
    }

    echo '<div class="inside-metabox">
        <div data-tab="metatags"'.(active_seo_tab("metatags", $allowed_tabs) ? ' class="active"': NULL).'>
            <div class="seo-position-left">
                <p>
                    '.__("Meta título", SEO_PLUGIN_NAME).':<span data-microtip-size="medium" aria-label="'.__("Este es el título que aparecerá en Google y en redes sociales.", TRANSLATIONS).'" data-microtip-position="top" role="tooltip" class="if"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>
                </p>  
                <p>              
                    <input type="text" name="_seo_meta_title" maxlength="70" value="'.$meta["title"].'">
                </p>
                <p>
                    <div id="title_length">
                        <span id="emoji">Mostrar emojis</span>
                        <span id="current_title_length">'.strlen($meta["title"]).'</span>/70 '.__("caracteres", TRANSLATIONS).'
                        <span id="current_title_words">'.str_word_count($meta["title"]).'</span> '.__("palabras", TRANSLATIONS).'
                    </div>
                </p>
                <p>
                    '.__("Meta descripción", SEO_PLUGIN_NAME).':<span data-microtip-size="medium" aria-label="'.__("Esta descripción aparecerá en Google y otros buscadores, así como en las redes sociales.", TRANSLATIONS).'" data-microtip-position="top" role="tooltip" class="if"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>
                </p>
                <p>
                    <textarea name="_seo_meta_description" maxlength="160">'.$meta["description"].'</textarea>
                    <div id="text_length">
                        <span id="current_length">'.strlen($meta["description"]).'</span>/160 '.__("caracteres", TRANSLATIONS).'
                        <span id="current_words">'.str_word_count($meta["description"]).'</span> '.__("palabras", TRANSLATIONS).'
                    </div>
                </p>
                <div class="indexing">
                    <div class="seo-position-left">
                        <p>'.__("Opciones de indexado", SEO_PLUGIN_NAME).':<span data-microtip-size="medium" aria-label="'.__("Esta opción indica a Google si deseas que aparezca o no esta página en los resultados de búsqueda.", TRANSLATIONS).'" data-microtip-position="top" role="tooltip" class="if"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span></p>
                        <p>
                            <label>
                                <input type="radio" name="_seo_index" value="1"'.($meta["index"] && (int)$meta["index"] == 1 ? ' checked' : NULL).'> index
                            </label>
                            <label>
                                <input type="radio" name="_seo_index" value="0"'.(!$meta["index"] || (int)$meta["index"] == 0 ? ' checked' : NULL).'> noindex
                            </label>
                        </p>
                    </div>
                    <div class="seo-position-right">
                        <p>'.__("Opciones de seguimiento", SEO_PLUGIN_NAME).':<span data-microtip-size="medium" aria-label="'.__("Las opciones de follow o nofollow indicarán a Google si debe acceder a este enlace para rastrear su contenido.", TRANSLATIONS).'" data-microtip-position="top" role="tooltip" class="if"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span></p>
                        <p>
                            <label>
                                <input type="radio" name="_seo_follow" value="1"'.($meta["follow"] && (int)$meta["follow"] == 1 ? ' checked' : NULL).'> follow
                            </label>
                            <label>
                                <input type="radio" name="_seo_follow" value="0"'.(!$meta["follow"] || (int)$meta["follow"] == 0 ? ' checked' : NULL).'> nofollow
                            </label>
                        </p>
                    </div>
                    <div class="seo-clear"></div>
                </div>
                <div class="seo-clear"></div>
            </div>
            <div class="seo-position-right">';
                if(strlen(trim($meta["title"])) == 0 || strlen(trim($meta["description"]))==0){
                    echo '<p>'.__('Completa el título y la descripción para ver la preview de cómo se verá el resultado de búsqueda.', TRANSLATIONS).'</p>';
                }else{
                    global $seo_faq;
                    echo '<p>'.__("Tu resultado de búsqueda se verá así", SEO_PLUGIN_NAME).':</p>
                    <div class="seo-google">
                        <div class="seo-title">'.do_shortcode($meta["title"]).'</div>
                        <div class="seo-description">'.do_shortcode($meta["description"]).'</div>'.$seo_faq->display_questions().
                    '</div>';
                }
            echo '</div>
            <div class="seo-clear"></div>
        </div>';

        /* Links */
        echo '<div data-tab="links"'.(active_seo_tab("links", $allowed_tabs) ? ' class="active"': NULL).'>';
        render_seo_links_meta_box($post);
        echo '</div>';

        /* Rich snippets */
        echo '<div data-tab="schema"'.(active_seo_tab("schema", $allowed_tabs) ? ' class="active"': NULL).'>';
        echo (new SEO_Schema($post->ID))->show_options();
        echo '</div>';

        /* Keywords tab */
        echo '<div data-tab="keywords"'.(active_seo_tab("keywords", $allowed_tabs) ? ' class="active"': NULL).'>';
                $text = RakePlus::create(strip_tags(apply_filters('the_content', get_the_content())), "es_ES");
                
                echo '<div class="seo-position-left">
                    <h2>Frases con más relevancia</h2>
                    <table class="wp-list-table widefat fixed striped table-view-list posts">
                        <thead>
                            <tr>
                                <th scope="col" id="type">Frase</th>
                                <th scope="col" id="anchor">Relevancia</th>
                            </tr>
                        </thead>

                        <tbody id="the-list">';
                        foreach($text->sortByScore('desc')->scores() as $phrase => $kw){
                            echo '<tr>
                                <td>'.$phrase.'</td>
                                <td>'.$kw.'</td>
                            </tr>';
                        }
                        echo '</tbody>
                    </table>
                </div>';

                echo '<div class="seo-position-right">
                    <h2>Palabras clave más repetidas</h2>
                    <table class="wp-list-table widefat fixed striped table-view-list posts">
                        <thead>
                            <tr>
                                <th scope="col" id="type">Frase</th>
                                <th scope="col" id="anchor">Relevancia</th>
                            </tr>
                        </thead>

                        <tbody id="the-list">';
                        foreach($text->sortByScore('desc')->keywords() as $phrase => $kw){
                            echo '<tr>
                                <td>'.$phrase.'</td>
                                <td>'.$kw.'</td>
                            </tr>';
                        }
                        echo '</tbody>
                    </table>
                </div>
                
                <div class="seo-clear"></div>';
        echo '</div>';

    echo '</div>';

    unset($allowed_tabs);
}

add_action('save_post', function($post_id){
    if(!module_enabled("seo")) return;
	if(!isset($_POST['seo_meta_box_nonce']) || !wp_verify_nonce($_POST['seo_meta_box_nonce'], basename(__FILE__))) return;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if(!current_user_can(SEO_PERMISSIONS)) return;
	if(isset($_POST['_seo_meta_title'])){
		update_post_meta($post_id, '_seo_meta_title', sanitize_text_field($_POST['_seo_meta_title']));
	}
	if(isset($_POST['_seo_meta_description'])){
		update_post_meta($post_id, '_seo_meta_description', sanitize_text_field($_POST['_seo_meta_description']));
    }
	if(isset($_POST['_seo_index']) && ((int)$_POST["_seo_index"] == 1 || (int)$_POST["_seo_index"] == 0)){
		update_post_meta($post_id, '_seo_index', (int)$_POST["_seo_index"]);
	}
	if(isset($_POST['_seo_follow']) && ((int)$_POST["_seo_follow"] == 1 || (int)$_POST["_seo_follow"] == 0)){
		update_post_meta($post_id, '_seo_follow', (int)$_POST["_seo_follow"]);
	}
});

add_action('add_meta_boxes', function(){
    if(!module_enabled("seo")) return;
    add_meta_box('seo_meta_box', __("Configuración SEO", TRANSLATIONS), 'seo_build_meta_box', ["post", "page", "question"], 'normal', 'high');
});

function render_seo_links_meta_box($post){
    if(!current_user_can(SEO_PERMISSIONS) || !module_enabled("seo")) return;
    $analysis = new SEO_Analysis($post->ID);
    $urls = $analysis->get_links(true); // Array with URLs.
    
    $html = '<table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <th scope="col" id="type">'.__("Tipo de enlace", TRANSLATIONS).'</th>
                <th scope="col" id="anchor">'.__("Texto ancla", TRANSLATIONS).'</th>
                <th scope="col" id="relation">'.__("Relación", TRANSLATIONS).'</th>
                <th scope="col" id="url">'.__("Enlace", TRANSLATIONS).'</th>
            </tr>
        </thead>

        <tbody id="the-list">';
        $links_available = false;
        $valid_relations = (new Seven_Link())->rel_list();
        $automatic_nofollow = (get_option("_add_nofollow_on_external")=="on");
        foreach($urls as $type => $links){
            if(!empty($links)){
                foreach($links as $link){
                    if(!$links_available){
                        $links_available = true;
                    }
                    $type_text = str_replace(
                        ["internal", "external", "obfuscated", "hash"],
                        [__("Interno", TRANSLATIONS), __("Externo", TRANSLATIONS), __("Ofuscado", TRANSLATIONS), __("Ancla", TRANSLATIONS)],
                        $type
                    );
                    $html .= '<tr>
                        <td>'.$type_text.'</td>
                        <td>'.(strlen(trim(strip_tags($link["anchor"])))==0 ? __("Sin texto ancla", TRANSLATIONS) : strip_tags(utf8_decode($link["anchor"]))).'</td>
                        <td>';
                        if(isset($link["rel"]) && strlen(trim($link["rel"]))>0){
                            $link["rel"] = trim($link["rel"]);
                            if(strpos($link["rel"], " ") !== FALSE){
                                $rels = explode(" ", $link["rel"]);
                                $already_shown = [];
                                foreach($rels as $r){
                                    $r = trim($r);
                                    if(strlen(trim($r))>0 && !in_array($r, $valid_relations)){
                                        $html .= '<span class="i-rel" data-microtip-position="top" aria-label="'.__("Esta etiqueta 'rel' no es válida.", TRANSLATIONS).'" role="tooltip">'.htmlentities($r).'</span>';
                                    }else{
                                        if($type == "external" && $automatic_nofollow && trim($r) == "nofollow"){
                                            $html .= '<span class="a-rel" data-microtip-position="top" aria-label="'.__("Añadida automáticamente.", TRANSLATIONS).'" role="tooltip">nofollow</span>';
                                        }else{
                                            if(in_array($r, $already_shown)){
                                                $html .= '<span class="i-rel" data-microtip-position="top" aria-label="'.__("Etiqueta duplicada.", TRANSLATIONS).'" role="tooltip">'.htmlentities($r).'</span>';
                                            }else{
                                                $html .= '<span class="v-rel">'.trim($r).'</span>';
                                            }
                                        }
                                    }
                                    array_push($already_shown, $r);
                                    unset($r);
                                }
                                if($type == "external" && $automatic_nofollow && strpos($link["rel"], "nofollow")===FALSE){
                                    $html .= '<span class="i-rel" data-microtip-position="top" aria-label="'.__("Añadida automáticamente.", TRANSLATIONS).'" role="tooltip">nofollow</span>';
                                }
                                unset($already_shown);
                            }else{
                                if(!in_array($link["rel"], $valid_relations)){
                                    $html .= '<span class="i-rel" data-microtip-position="top" aria-label="'.__("Esta etiqueta 'rel' no es válida.", TRANSLATIONS).'" role="tooltip">'.htmlentities($link["rel"]).'</span>';
                                }else{
                                    
                                    if($type == "external" && $automatic_nofollow && trim($link["rel"]) == "nofollow"){
                                        $html .= '<span class="a-rel" data-microtip-position="top" aria-label="'.__("Añadida automáticamente.", TRANSLATIONS).'" role="tooltip">nofollow</span>';
                                    }else{
                                        // If there's just on relation, can't be duplicated.
                                        $html .= '<span class="v-rel">'.trim($link["rel"]).'</span>';
                                    }
                                }
                            }
                        }else{
                            $html .= '&mdash;';
                        }
                        $html .= '</td>
                        <td>';
                        if(strlen(trim($link["url"]))==0){
                            $html .= "&mdash;";
                        }else{
                            $html .= '<a href="'.($type=="hash" ? get_the_permalink($post->ID) : NULL).$link["url"].'" rel="nofollow" target="_blank" data-microtip-position="left" role="tooltip" aria-label="'.__("Abre este enlace en una nueva pestaña", TRANSLATIONS).'">'.$link["url"].'</a>';
                        }
                        $html .= '</td>
                    </tr>';

                    unset($type_text);
                    unset($link);
                }
            }
        }
        $html .= '</tbody>
    </table>';

    if(!$links_available){
        echo '<p>'.__("Esta entrada no tiene ningún enlace en su contenido.", TRANSLATIONS).'</p>';
    }else{
        echo '<p>'.__("Éstos son los enlaces de esta entrada:", TRANSLATIONS).'</p>';
        echo $html;
    }

    unset($links_available, $valid_relations, $automatic_nofollow);
}

add_action( 'admin_bar_menu', 'admin_bar_item', 500 );
function admin_bar_item ( WP_Admin_Bar $admin_bar ) {
    if(!current_user_can(SEO_PERMISSIONS) || is_admin() || !module_enabled("seo")) return;
    
    global $wp;
    $admin_bar->add_menu( array(
        'id'    => 'seo-menu',
        'parent' => null,
        'group'  => null,
        'title' => 'Herramientas SEO',
        'href'  => null
    ));

    $admin_bar->add_menu(array(
        'id'    => 'seo-speed-test',
        'parent' => 'seo-menu',
        'group'  => null,
        'title' => __("Prueba de velocidad", TRANSLATIONS),
        'href'  => 'https://developers.google.com/speed/pagespeed/insights/?hl=es&url='.home_url($wp->request),
        'meta' => [
            'target' => '_blank'
        ]
    ));
    
    $admin_bar->add_menu(array(
        'id'    => 'seo-schema-tool',
        'parent' => 'seo-menu',
        'group'  => null,
        'title' => __("Validar datos estructurados", TRANSLATIONS),
        'href'  => 'https://search.google.com/test/rich-results?url='.home_url($wp->request),
        'meta' => [
            'target' => '_blank'
        ]
    ));

    $admin_bar->add_menu(array(
        'id'    => 'seo-google-bot',
        'parent' => 'seo-menu',
        'group'  => null,
        'title' => __("Ver página como GoogleBot", TRANSLATIONS),
        'href'  => 'http://webcache.googleusercontent.com/search?strip=1&q=cache:'.home_url($wp->request),
        'meta' => [
            'target' => '_blank'
        ]
    ));
}