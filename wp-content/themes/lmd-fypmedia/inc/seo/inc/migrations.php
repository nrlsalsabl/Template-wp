<?php
if(!defined('ABSPATH')){
	die();
}

if(!class_exists("SEO_Migrations")){
	class SEO_Migrations{
		private $migration_available = false;
		private $wpdb = NULL;
		private $tool_slug = "migrate-seo-data";
		private $permissions = "manage_options"; // Required permissions to migrate.

		const YOAST = "yoast";
		const RANK_MATH = "rank-math";

		function __construct(){
			global $wpdb;
			$this->wpdb = $wpdb;
		}

		public function show_migration_warning(){
			/*/
			/* Show migration warning.
			/*/
			add_action('admin_notices', function(){
				// Don't bother again with migrations messages:
				foreach($this->plugins() as $plugin){
					if(!$this->migration_dismissed($plugin) && isset($_GET["dismiss-".$plugin])){
						update_option($plugin."_migration_dismissed", 1);
					}
					if(
						// User hasn't dissmissed plugin.
						!$this->migration_dismissed($plugin) && 
						
						// Migration available?
						$this->migration_available($plugin) && 

						// Not in migration page.
						(!isset($_GET["page"]) || (isset($_GET["page"]) && $_GET["page"] != $this->tool_slug))){
						/*/
						/* Warn the user that a current install of other SEO plugin is active, maybe migrate the data?
						/*/
						echo '<div class="notice notice-warning">
							<p>'.sprintf(__('Se han detectado registros de <b>%s</b> en esta instalación. ¿Quieres adaptarlos a %s?', TRANSLATIONS), $this->get_plugin_name($plugin), THEME_PRINTABLE_NAME).'</p>
							<p>'.sprintf(__('Puedes %s o bien %s.', TRANSLATIONS), 
								'<a href="'.admin_url("admin.php?page=".$this->tool_slug."&tool=".$plugin).'" rel="nofollow">'.sprintf(__("migrar la información de %s", TRANSLATIONS), $this->get_plugin_name($plugin)).'</a>',
								'<a href="'.add_query_arg(["dismiss-".$plugin => 1]).'" rel="nofollow">'.__("no volver a mostrar esta notificación", TRANSLATIONS).'</a>'
							).'</p>
						</div>';
					}
				}
			});
		}

		public function show_migration_tool(){
			/*/
			/* Migration tool page.
			/*/
			add_submenu_page(
				'admin.php', 
				sprintf(__("Herramienta de migración de datos de %s", TRANSLATIONS), $this->get_plugin_name(isset($_GET["tool"]) ? $_GET["tool"] : NULL)),
				$this->tool_slug,
				$this->permissions,
				$this->tool_slug,
				function(){
					if(!is_admin()){
						throw new Exception(__("Esta vista no se puede cargar fuera del panel de administración.", TRANSLATIONS));
					}
					if(!current_user_can("manage_options")){
						throw new Exception(__("No estás a autorizado a utilizar esta función.", TRANSLATIONS));
					}
					if(!isset($_GET["tool"]) || (isset($_GET["tool"]) && !in_array($_GET["tool"], $this->plugins()))){
						die(__("Herramienta no indicada.", TRANSLATIONS));
					}

					$plugin = $_GET["tool"];
					echo '<div class="wrap">
						<h2>'.sprintf(__("Herramienta de migración de datos de %s", TRANSLATIONS), $this->get_plugin_name($plugin)).'</h2>';
						if($this->migration_available($plugin)){
							if(isset($_POST["migrate"])){
								try{
									$migration_result = $this->migrate($plugin);
									if(isset($migration_result["error"]) || !$migration_result){
										echo (isset($migration_result["error"]) ? $migration_result["error"] : __("La migración no ha podido ser completada. Por favor vuelve a intentarlo.", TRANSLATIONS));
									}else{
										if(isset($migration_result["history"]) && is_array($migration_result["history"])){
											echo '<pre>';
											foreach($migration_result["history"] as $text){
												echo $text."<br>";
											}
											echo '</pre>';
										}
										echo sprintf(__("La migración de <b>%s</b> ha sido completada con éxito.", TRANSLATIONS), $this->get_plugin_name($plugin));
									}
								}catch(Exception $ex){
									echo sprintf(__("No ha sido posible migrar los datos de <b>%s</b>. El mensaje de error devuelto es: %s", TRANSLATIONS), $this->get_plugin_name($plugin), $ex->getMessage());
								}
							}else{
								echo '<form method="post">
									<p>'.sprintf(__("Hay datos disponibles de <b>%s</b> para migrar. Al presionar el siguiente botón, se eliminarán todos los registros y se transferirán a %s.", TRANSLATIONS), $this->get_plugin_name($plugin), THEME_PRINTABLE_NAME).'</p>
									<input type="submit" name="migrate" class="button" value="'.__("Migrar la información", TRANSLATIONS).'">
								</form>';
							}
						}else{
							echo '<p>'.sprintf(__("¡Todo está bien por aquí! No hay ningún dato disponible de <b>%s</b> para migrar.", TRANSLATIONS), $this->get_plugin_name($plugin)).'</p>';
						}
					echo '</div>';
				});
		}

		private function migration_dismissed($plugin=self::YOAST){
			/*/
			/* Check if migration has been dismissed.
			/*/
			if(!in_array($plugin, $this->plugins())) return false;
			return get_option($plugin."_migration_dismissed");
		}

		private function plugins(){
			/*/
			/* Recognized plugins for migration.
			/*/
			return [self::YOAST, self::RANK_MATH];
		}

		private function get_plugin_name($plugin=self::YOAST){
			/*/
			/* Get plugin human-like name.
			/*/
			if($plugin==self::YOAST) return __("Yoast SEO", TRANSLATIONS);
			if($plugin==self::RANK_MATH) return __("Rank Math", TRANSLATIONS);
			return __("No reconocido", TRANSLATIONS);
		}

		public function migration_available($plugin=self::YOAST){
			/*/
			/* Check if any migration is available.
			/*/
			if(!in_array($plugin, $this->plugins())) return false;

			// Check the database:
			$meta_like = ($plugin==self::YOAST ? "_yoast_wpseo" : "rank_math_");
			$results = $this->wpdb->get_results($this->wpdb->prepare("SELECT * FROM ".$this->wpdb->prefix."postmeta WHERE meta_key LIKE %s LIMIT 1;", '%'.$this->wpdb->esc_like($meta_like).'%'));
			return ($results>NULL && !empty($results));
		}

		public function plugin_installed($plugin=self::YOAST){
			/*/
			/* Check if third-party SEO plugin is installed.
			/*/
			if(!in_array($plugin, $this->plugins())) return false;

			// Check if Yoast SEO is installed.
			if($plugin==self::YOAST) return class_exists('WPSEO_Options');

			// Check if Rank Math is installed.
			if($plugin==self::RANK_MATH) return class_exists('RankMath');

			// Other cases:
			return false;
		}

		public function any_plugin_installed(){
			/*/
			/* Check if any plugin is installed.
			/*/
			foreach($this->plugins() as $plugin){
				if($this->plugin_installed($plugin)) return true;
			}
			return false;
		}
		private function migrate($allowed_meta_keys=[], $remove_meta_keys=[], $queries=[]){
			/*/
			/* Check if a migration is available.
			/*/
			global $wpdb;
			$yoast_like = "_yoast_wpseo";
			$yoast_query = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key LIKE %s;", '%'.$wpdb->esc_like($yoast_like).'%');
			$results = $wpdb->get_results($yoast_query);
			if($results>NULL && !empty($results)){
				$posts_groups = [];
				$meta_to_delete = [];
				$history = [];

				// Group by posts and check if they exists.
				foreach($results as $result){
					if(get_post_status($result->post_id) === FALSE){
						// Post does not exist. Delete the meta.
						array_push($history, sprintf(__("La metaetiqueta ID %d está asignada a un post que no existe (%d) y ha sido eliminada.", TRANSLATIONS), $result->meta_id, $result->post_id));
						continue;
					}
					if(!isset($posts_groups[$result->post_id])){
						$posts_groups[$result->post_id] = [];
					}
					array_push($posts_groups[$result->post_id], $result);
				}

				$allowed_meta_keys = [
					"_yoast_wpseo_title" => "_seo_meta_title",
					"_yoast_wpseo_metadesc" => "_seo_meta_description",
					"_yoast_wpseo_meta-robots-noindex" => ["_seo_index", "_seo_follow"]
				];

				$remove_meta_keys = [
					"_yoast_wpseo_content_score",
					"_yoast_wpseo_focuskw_text_input",
					"_yoast_wpseo_focuskw",
					"_yoast_wpseo_linkdex",
					"_yoast_wpseo_primary_category"
				];

				$queries = [
					$wpdb->prepare("UPDATE ".$wpdb->prefix."options SET autoload='no' WHERE option_name LIKE %s;", '%wpseo%')
				];

				if(!empty($posts_groups)){
					foreach($posts_groups as $id => $meta_tags){
						if(is_array($meta_tags) && !empty($meta_tags)){
							$robots_information = FALSE;

							array_push($history, sprintf(__("Detectada información de %s en el post %d.", TRANSLATIONS), 'Yoast SEO', $id));
							foreach($meta_tags as $meta){
								unset($meta->post_id);

								// Check if we know the meta key.
								if(in_array($meta->meta_key, $remove_meta_keys)){
									// We should remove this meta key.
									array_push($history, sprintf(__('La metaetiqueta %s ha sido eliminada.', TRANSLATIONS), $meta->meta_key));
									delete_post_meta((int)$id, $meta->meta_key);
								}else if(isset($allowed_meta_keys[$meta->meta_key])){
									// Add the post meta to the post or page.
									if(is_array($allowed_meta_keys[$meta->meta_key])){
										foreach($allowed_meta_keys[$meta->meta_key] as $new_key){
											array_push($history, sprintf(__('La metaetiqueta %s ahora es %s con el valor "%s".', TRANSLATIONS), $meta->meta_key, $new_key, $meta->meta_value));
											if(!get_post_meta((int)$id, $new_key)){
												add_post_meta((int)$id, $new_key, $meta->meta_value);
											}else{
												update_post_meta((int)$id, $new_key, $meta->meta_value);
											}
											if(($new_key == "_seo_index" || $new_key == "_seo_follow") && !$robots_information){
												$robots_information=TRUE;
											}
										}
									}else{
										array_push($history, sprintf(__('La metaetiqueta %s ahora es %s con el valor "%s".', TRANSLATIONS), $meta->meta_key, $allowed_meta_keys[$meta->meta_key], $meta->meta_value));
										if(!get_post_meta((int)$id, $allowed_meta_keys[$meta->meta_key])){
											add_post_meta((int)$id, $allowed_meta_keys[$meta->meta_key], $meta->meta_value);
										}else{
											update_post_meta((int)$id, $allowed_meta_keys[$meta->meta_key], $meta->meta_value);
										}
									}

									// Remove the original Yoast SEO meta key.
									delete_post_meta((int)$id, $meta->meta_key);
								}else{
									array_push($history, sprintf(__("Hay una metaetiqueta no reconocida: %s", TRANSLATIONS), esc_html($meta->meta_key)));
									delete_post_meta((int)$id, $meta->meta_key);
								}
							}

							if(!$robots_information){
								add_post_meta((int)$id, "_seo_index", "1");
								add_post_meta((int)$id, "_seo_follow", "1");
							}
						}
					}
				}
				if(!empty($history)){

					// If everything is OK, execute the queries if exists.
					if(!empty($queries)){
						foreach($queries as $query){
							$wpdb->query($query);
							if($wpdb->last_error !== ''){
								
								array_push($history, __('Una consulta ha fallado con el siguiente mensaje de error: %s.', TRANSLATIONS), $wpdb->last_error);
							}
						}
						array_push($history, sprintf(__('Ejecutadas %d consultas en la base de datos.', TRANSLATIONS), count($queries)));

						unset($queries);
					}

					// Confirmation message for the admin:
					array_push($history, __("Se han revisado todos los registros correctamente.", TRANSLATIONS));

					// Return that the migration process was ok!
					return [
						"completed" => 1, 
						"history" => $history
					];
				}
				return false;
			}
		}
	}

	try{
		global $SEO_Migrations;
		$SEO_Migrations = new SEO_Migrations();
		$SEO_Migrations->show_migration_warning();

		add_action("admin_menu", function(){
			global $SEO_Migrations;
			$SEO_Migrations->show_migration_tool();
		});
	}catch(Exception $ex){
		echo $ex->getMessage();
	}
}
?>