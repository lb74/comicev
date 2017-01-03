<?php
	class Bootstrap{
		function __construct() {
			global $app_path, $controller_path, $view_path, $model_path;
			$this->app_path = $app_path;
			$this->controller_path = $controller_path;
			$this->view_path = $view_path;
			$this->model_path = $model_path;
		}
		function Init() {
			$controller = isset($_GET["page"])?$_GET["page"]:"home";
			if ($controller != ""){
				if (!file_exists("$this->app_path/$this->controller_path/$controller.php")){
					require("$this->app_path/$this->controller_path/404.php");
					return;
				}
				require("$this->app_path/$this->controller_path/$controller.php");
				if (!class_exists($controller)){
					require("$this->app_path/$this->controller_path/404.php");
					return;
				}
				$c = new $controller;
				$c->index();
			}
		}
	}
?>