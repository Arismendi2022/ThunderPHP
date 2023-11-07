<?php
	
	namespace Thunder;
	
	defined('FCPATH') or die("Acceso directo al script denegado");
	
	/**
	 * Thunder class
	 */
	class Thunder
	{
		public function make(array $args)
		{
			$action = $args[1] ?? null;
			$folder = $args[2] ?? null;
			$class_name = $args[3] ?? null;
			
			if ($action == 'make:plugin') {
				$original_folder = $folder;
				$folder = 'plugins/' . $folder;
				
				if (file_exists($folder))
					$this->message("TLa carpeta del complemento Hat ya existe.", true);
				
				/*main plugin folder*/
				mkdir($folder, 0777, true);
				
				$css_folder = $folder . '/assets/css/';
				mkdir($css_folder, 0777, true);
				
				$js_folder = $folder . '/assets/js/';
				mkdir($js_folder, 0777, true);
				
				$fonts_folder = $folder . '/assets/fonts/';
				mkdir($fonts_folder, 0777, true);
				
				$images_folder = $folder . '/assets/images/';
				mkdir($images_folder, 0777, true);
				
				$controller_folder = $folder . '/controllers/';
				mkdir($controller_folder, 0777, true);
				
				$view_folder = $folder . '/views/';
				mkdir($view_folder, 0777, true);
				
				$migration_folder = $folder . '/migrations/';
				mkdir($migration_folder, 0777, true);
				
				$models_folder = $folder . '/models/';
				mkdir($models_folder, 0777, true);
				
				/*copy files*/
				
				/*plugin file*/
				$plugin_file = $folder . '/plugin.php';
				$plugin_file_source = 'app/thunder/samples/plugin-sample.php';
				
				if (file_exists($plugin_file_source)) {
					copy($plugin_file_source, $plugin_file);
				} else {
					$this->message("archivo de muestra del complemento no encontrado en: " . $plugin_file_source);
				}
				
				/*controller file*/
				$controller_file = $folder . '/controllers/controller.php';
				$controller_file_source = 'app/thunder/samples/controller-sample.php';
				
				if (file_exists($controller_file_source)) {
					copy($controller_file_source, $controller_file);
				} else {
					$this->message("controller archivo de muestra no encontrado en: " . $controller_file_source);
				}
				
				/*view file*/
				$view_file = $folder . '/views/view.php';
				$view_file_source = 'app/thunder/samples/view-sample.php';
				
				if (file_exists($view_file_source)) {
					copy($view_file_source, $view_file);
				} else {
					$this->message("view archivo de muestra no encontrado en: " . $view_file_source);
				}
				
				/*js file*/
				$js_file = $folder . '/assets/js/plugin.js';
				$js_file_source = 'app/thunder/samples/js-sample.js';
				
				if (file_exists($js_file_source)) {
					copy($js_file_source, $js_file);
				} else {
					$this->message("js archivo de muestra no encontrado en: " . $js_file_source);
				}
				
				/*css file*/
				$css_file = $folder . '/assets/css/style.css';
				$css_file_source = 'app/thunder/samples/css-sample.css';
				
				if (file_exists($css_file_source)) {
					copy($css_file_source, $css_file);
				} else {
					$this->message("css archivo de muestra no encontrado en: " . $css_file_source);
				}
				
				/*config file*/
				$config_file = $folder . '/config.json';
				$config_file_source = 'app/thunder/samples/config-sample.json';
				
				if (file_exists($config_file_source)) {
					copy($config_file_source, $config_file);
				} else {
					$this->message("config archivo de muestra no encontrado en: " . $config_file_source);
				}
				
				$this->message("¡Creación del complemento completada! Carpeta de complementos: " . $folder);
				
			} else if ($action == 'make:migration') {
				$original_folder = $folder;
				$folder = 'plugins/' . $folder . '/';
				
				if (!file_exists($folder))
					$this->message("Carpeta del complemento no encontrada", true);
				
				$migration_folder = $folder . "migrations/";
				if (!file_exists($migration_folder))
					mkdir($migration_folder, 0777, true);
				
				$file_sample = 'app/thunder/samples/migration-sample.php';
				if (!file_exists($file_sample))
					$this->message("Archivo de migración de muestra no encontrado en: " . $file_sample, true);
				
				if (empty($class_name))
					$this->message("Proporcione un nombre de clase válido para su archivo de migración", true);
				
				$class_name = preg_replace("/[^a-zA-Z_\-]/", "", $class_name);
				$class_name = str_replace("-", "_", $class_name);
				$class_name = ucfirst($class_name);
				
				$table_name = strtolower($class_name);
				
				$content = file_get_contents($file_sample);
				$content = str_replace("{TABLE_NAME}", $table_name, $content);
				$content = str_replace("{CLASS_NAME}", $class_name, $content);
				
				$filename = $migration_folder . date("Y-m-d_His_") . $table_name . '.php';
				file_put_contents($filename, $content);
				
				$this->message("Archivo de migración creado. Nombre del archivo: " . $filename, true);
				
			} else if ($action == 'make:model') {
				
				$original_folder = $folder;
				$folder = 'plugins/' . $folder . '/';
				
				if (!file_exists($folder))
					$this->message("Carpeta del complemento no encontrado", true);
				
				$model_folder = $folder . "models/";
				if (!file_exists($model_folder))
					mkdir($model_folder, 0777, true);
				
				$file_sample = 'app/thunder/samples/model-sample.php';
				if (!file_exists($file_sample))
					$this->message("Archivo de modelo de muestra no encontrado en: " . $file_sample, true);
				
				if (empty($class_name))
					$this->message("Proporcione un nombre de clase válido para su archivo de modelo.", true);
				
				$class_name = preg_replace("/[^a-zA-Z_\-]/", "", $class_name);
				$class_name = str_replace("-", "_", $class_name);
				$class_name = ucfirst($class_name);
				
				$table_name = strtolower($class_name);
				
				$content = file_get_contents($file_sample);
				$content = str_replace("{TABLE_NAME}", $table_name, $content);
				$content = str_replace("{CLASS_NAME}", $class_name, $content);
				
				$filename = $model_folder . $class_name . '.php';
				file_put_contents($filename, $content);
				
				$this->message("Model archivo creado. Nombre del archivo: " . $filename, true);
				
			} else {
				$this->message("Comando desconocido " . $action);
			}
			
			
		}
		
		
		public function help(string|array $version) :void
		{
			$version = is_array($version) ? $version[0] : $version;
			
			echo "

		ThunderPHP v$version Herramienta de línea de comando.

		Database
			migrate            Localiza y ejecuta una migración desde la carpeta de complementos especificada.
			migrate:refresh    Realiza una reversión seguida de una migración.
			migrate:rollback   Ejecuta el método 'hacia abajo' para una migración en la carpeta de complementos especificada.

		Generators
			make:plugin        Genera una nueva carpeta con todos los archivos de complementos esenciales.
			make:migration     Genera un nuevo archivo de migración.
			make:model         Genera un nuevo archivo de modelo.

				";
			
		}
		
		private function message(string $message, bool $die = false) :void
		{
			echo "\n\r" . ucfirst($message);
			ob_flush();
			
			if ($die)
				return;
		}
		
	}
