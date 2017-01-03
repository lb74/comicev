<?php
class chap extends controller
{
	function index(){
		$_comic_code = @$_GET["comic"];
		$_chap_code = @$_GET["chap"];
		$sql = new Model();
		$_chap = array();
		//get name chap
		$query = "SELECT title_chap FROM cev_chaps WHERE chap_code='$_chap_code' AND comic_code='$_comic_code'";
		$_chap = $sql->ExeQuery($query);
		if ($_chap){
            $_chap["chap_code"] = $_chap_code;
            $_chap["comic_code"] = $_comic_code;
			$_chap["title_chap"] = $_chap[0]["title_chap"];
			//get link image of chap
			$query = "SELECT link_image
			FROM cev_links_image
			WHERE comic_code='$_comic_code' AND chap_code='$_chap_code'
			ORDER BY image_code asc";
			$_chap["links"] = $sql->ExeQuery($query);
			if ($_chap["links"]){
				$this->view("content", $_chap, "chap", false);
			}
			else{
				$this->view("p404");
			}
		}
		else{
			$this->view("p404");
		}
	}
}