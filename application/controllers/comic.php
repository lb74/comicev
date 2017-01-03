<?php
class comic extends Controller {
	function index(){
		$_comic_code = @$_GET["comic"];
		$sql = new Model();
		//get info comic
		$query = "SELECT comic_code, comic_name, author, comic_status, description, link_bookcover
		FROM cev_comics
		WHERE comic_code='$_comic_code'";
		$_comic_info = $sql->ExeQuery($query)[0];
		if ($_comic_info){
			//get info chap
			$query = "SELECT chap_code, title_chap
			FROM cev_chaps
			WHERE comic_code='$_comic_code'
			ORDER BY chap_code asc";
			$_comic_info["chap_info"] = $sql->ExeQuery($query);
			$this->view("content", $_comic_info);
		}
		else
		{
			$this->view("p404");
		}
	}
}
?>