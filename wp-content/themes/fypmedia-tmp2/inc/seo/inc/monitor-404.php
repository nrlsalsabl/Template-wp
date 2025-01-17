<?php
if(!defined("ABSPATH")){
    header('HTTP/1.0 403 Forbidden');
    exit;
}

class Monitor_404{
    private $wpdb;
    private $wp;
    private $table = NULL;
    private $table_name = NULL;
    private $table_exists = false;
    private $count_option = "_monitor404_count";
    private $is_redirecting_to_page = false;

    function __construct($wp=NULL){
        if($wp>NULL){
            $this->wp = $wp;
            unset($wp);
        }
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = "404";
        $this->table = "{$wpdb->prefix}".$this->table_name;
        $this->table_exists = $this->check_wpdb_404_db();
        $this->is_redirecting_to_page = ((get_option("_all_404_to_home") == "on") ? true : false);
    }

    public function create_table(): bool{
        if($this->table_exists()) return true;
        if(!$this->table_exists && is_admin()){
            try{
                $this->wpdb->query("CREATE TABLE `{$this->table}` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `url` varchar(64) NOT NULL,
                    `user_agent` varchar(128) NOT NULL,
                    `redirects` int(11) NOT NULL DEFAULT 0,
                    `redirects_to_page` int(11) NOT NULL DEFAULT 0,
                    `first_404` timestamp NOT NULL DEFAULT current_timestamp(),
                    `last_404` timestamp NOT NULL DEFAULT current_timestamp(),
                    `checked` int(11) NOT NULL DEFAULT 0,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
            }catch(Exception $ex){
                add_action( 'admin_notices', function() {
                    $class = 'notice notice-error';
                    $message = __( 'No es posible crear la tabla para el monitor de 404. El mensaje de error devuelto es: '.$ex->getMessage());
                    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message)); 
                });
            }
        }
        return false;
    }

    public function flush_records(){
        /* Keeps only last month records */
        $flush = 500;

        $records_count = $this->wpdb->get_var("SELECT COUNT(*) FROM ".$this->table);
        if($records_count>$flush){
            $results = $this->wpdb->get_results( 
                "SELECT id FROM ".$this->table." ORDER BY id DESC LIMIT ".($flush)
            );
            if(count($results)==$flush){
                $last_id = 0;
                foreach($results as $r){
                    $last_id=$r->id;
                }
                $this->wpdb->query("DELETE FROM ".$this->table." WHERE id<".$last_id);
            }
        }
    }

    private function get_current_url(){
        if($this->wp>NULL && isset($wp->request)) return home_url($wp->request);
        return $this->get_current_url_php();
    }

    public function table_exists(): bool{
        return $this->table_exists;
    }

    private function check_wpdb_404_db(): bool{
        // Checks if table exists.
        return (strtolower($this->wpdb->get_var("SHOW TABLES LIKE '".$this->table."'")) === (string)trim(strtolower($this->table)));
    }

    public function get_current_url_php(){
        return "$_SERVER[REQUEST_URI]";
    }

    public function flush(){
        /*/
        /* Delete all 404 warnings. This is completely safe to use!
        /*/
        $this->wpdb->query("TRUNCATE TABLE {$this->table}");
        $this->reset_count();
    }

    public function reset_count(): bool{
        $result = $this->wpdb->query("UPDATE ".$this->table." SET checked=0");
        $update_count = $this->update_count();
        return ($result && $update_count);
    }

    private function exists_404($id=0): bool{
        if(!is_numeric($id) || $id<=0) return false;
        $query = "SELECT id FROM ".$this->table." WHERE id=%d";
        $result = $this->wpdb->get_row($this->wpdb->prepare($query, $id), ARRAY_A);
        unset($query);
        return ($result>NULL && !empty($result) && count($result)>0 && isset($result["id"]));
    }

    private function update_count(): int{
        $warnings = (int)$this->wpdb->get_var("SELECT SUM(checked) FROM ".$this->table);
        $current_count = get_option($this->count_option);
        if(!$current_count || $current_count==NULL){
            $result = add_option($this->count_option, $warnings);
        }
        if($current_count!=$warnings){
            $result = update_option($this->count_option, $warnings);
        }
        return (isset($result) ? $result : false);
    }

    public function get(){
        if(!$this->table_exists) return [];
        $results_formatted = [];
        $results = $this->wpdb->get_results( 
            "SELECT * FROM ".$this->table." ORDER BY last_404 DESC"
        );

        // Format the results and check they're ok.
        foreach($results as $result){
            $result->url = str_replace(home_url(), NULL, $result->url);
            array_push($results_formatted, $result);
            unset($result);
        }
        return $results_formatted;
    }

    public function sum_404($id=0): bool{
        if(!$this->table_exists) return false;
        if(!is_numeric($id)) return false;

        // Get the update results.
        $visits = $this->wpdb->query($this->wpdb->prepare("UPDATE ".$this->table." SET redirects=redirects+1, checked=checked+1 WHERE id=%d", $id));
        $redirects_to_page = true;
        if($this->is_redirecting_to_page){
            $redirects_to_page = $this->wpdb->query($this->wpdb->prepare("UPDATE ".$this->table." SET redirects_to_page=redirects_to_page+1, checked=checked+1 WHERE id=%d", $id));
        }
        return ($visits && $redirects_to_page);
    }

    public function add_404_or_sum($url=""): bool{
        if(!$this->table_exists || !is_string($url) || strlen(trim($url))==0) return false;
        $result = $this->wpdb->get_row($this->wpdb->prepare("SELECT id FROM ".$this->table." WHERE url=%s", $url));
        if($result && isset($result->id)){
            $result = $this->sum_404($result->id);
        }else{
            $result = $this->wpdb->insert($this->table, ["url" => $url, "redirects" => 1, "checked" => 1, "redirects_to_page" => ($this->is_redirecting_to_page ? 1 : 0)], ['%s', '%d', '%d']);
        }
        $this->update_count();
        return $result;
    }

    public function remove($id=0){
        if(!$this->table_exists()) return false;
        if(!$this->exists_404($id)) return false;
        return $this->wpdb->delete($this->table, ["id" => $id], array("%d"));
    }
}

add_action("admin_init", function(){
    /*/
    /* Create the table if it doesn't exists.
    /*/
    if(module_enabled("monitor404")){
        $monitor = (new Monitor_404());
        if(!$monitor->table_exists()){
            $monitor->create_table();
        }
        $monitor->flush_records();
    }
});

add_action("wp", function($wp){
    /*/
    /* Log all 404 http codes
    /*/
    if(module_enabled("monitor404") && !is_admin() && is_404()){
        try{
            $monitor = new Monitor_404($wp);
            $result = $monitor->add_404_or_sum(home_url($wp->request));
            if(!$result){
                seven_log(__("No ha sido posible registrar en el monitor de 404 un acceso a una página no encontrada. Verifica que el campo 'id' sea clave primaria AUTO_INCREMENT.", TRANSLATIONS));
            }
        }catch(Exception $ex){
            seven_log(__("No ha sido posible registrar una redirección 404.", TRANSLATIONS), $ex->getMessage());
        }
    }
}, -1); 
?>