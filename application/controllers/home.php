<?php
	class home extends Controller {
		function index() {
			//$data = new Model();
			//$query = "SELECT "
			$this->view("content",$this->CreateData());
		}
		function CreateData() {
			$sql = new Model();
			$_data = array();
			//Lay truyen xem nhieu - chua co dieu kien
			$query = "SELECT comic_code, comic_name, link_bookcover 
			FROM cev_comics ORDER BY views DESC LIMIT 0,12";
			$_comic_most = $sql->ExeQuery($query);

			for($i=0;$i<count($_comic_most);$i++){
				$code = $_comic_most[$i]["comic_code"];
				$query = "SELECT title_chap, chap_code FROM cev_chaps WHERE comic_code='$code' LIMIT 0,1";
				$_comic_most[$i]["chaps"] = $sql->ExeQuery($query);
			}
			//Lay truyen moi cap nhat - chua co dk
			$query = "SELECT comic_code, comic_name, link_bookcover 
			FROM `cev_comics` ORDER BY `date` DESC LIMIT 0,12";
			$_comic_new = $sql->ExeQuery($query);

			for($i=0;$i<count($_comic_new);$i++){
				$code = $_comic_new[$i]["comic_code"];
				$query = "SELECT title_chap, chap_code FROM cev_chaps 
							WHERE comic_code='$code' LIMIT 0,1";
				$_comic_new[$i]["chaps"] = $sql->ExeQuery($query);
			}
			$_data["most"] = $_comic_most;
			$_data["new"] = $_comic_new;
			unset($sql);
			unset($query);
			unset($_comic_most);
			unset($_comic_new);
			return $_data;
		}
	}
?>