<?php
class Controller {

	function view($viewname="content", $data=null, $page="home", $usesidebar=true, $uselayout=true) {
		if ($uselayout) {
			$this->_header();
		}
        #de goi ham content hoac trang p404
		$this->$viewname($data);
        
		if ($usesidebar){
			$this->sidebar($page);
		}
		if ($uselayout) {
			$this->_footer();
		}
	}

	function _header(){
		global $app_path, $view_path;
		//lay thong tin cac the loai roi in ra thanh menu
		$menu = new Model();
		$query = "select type_code, type_name from cev_type where language='vn'";
		$type_arr = $menu->ExeQuery($query);
		require("$app_path/$view_path/shared/header.php");
		unset($menu);
		unset($query);
		unset($type_arr);
	}

	function _footer(){
		global $app_path, $view_path;
		require("$app_path/$view_path/shared/footer.php");
	}

	function content($data){
		global $app_path, $controller_path, $view_path;
		$controller_name = get_class($this);
		require("$app_path/$view_path/$controller_name.php");
		unset($controller_name);
	}

	function sidebar($page){
		global $app_path, $view_path;
		#** them dong ho
		$sql = new Model();
		#Top 10 truyen trong thang
		$query = "SELECT comic_code, comic_name 
		FROM `cev_comics` ORDER BY `views_mon` DESC LIMIT 0,10";
		$data_sidebar["comic"] = $sql->ExeQuery($query);
        #lay them them chap
        for($i=0;$i<count($data_sidebar["comic"]);$i++){
				$code = $data_sidebar["comic"][$i]["comic_code"];
				$query = "SELECT title_chap, chap_code FROM cev_chaps WHERE comic_code='$code' LIMIT 0,3";
				$data_sidebar["comic"][$i]["chaps"] = $sql->ExeQuery($query);
        }
		#truyen cung loai
		if ($page == "comic"){
			$code = @$_GET["comic"];
			$query = "SELECT `cev_comics`.`comic_code`, `cev_comics`.`comic_name`
			FROM `cev_comics` JOIN `cev_type_comic` ON `cev_comics`.`comic_code` = `cev_comics`.`comic_code`
			WHERE `cev_type_comic`.`type_code` IN ( SELECT `type_code` FROM `cev_type_comic` WHERE `comic_code` = '$code')";
			$data_sidebar["page"] = $sql->ExeQuery($query);
		}
		elseif ($page == "home"){
			$data_sidebar["page"] = "";
		}	
		#tag
		$query = "SELECT type_code, type_name FROM cev_type";
		$data_sidebar["tag"] = $sql->ExeQuery($query);
		require("$app_path/$view_path/shared/sidebar.php");
	}

	function p404($data){
        echo "<div id='main-content'>";
		echo "<img class='page404' src='application/views/image/page404.jpg'>";
		echo "</div>";
	}
    
}
?>