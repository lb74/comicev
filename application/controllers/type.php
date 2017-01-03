<?php
class type extends Controller {
	function index (){
		$type = isset($_GET["type"])?$_GET["type"]:"";
		$id = isset($_GET["id"])?$_GET["id"]:1 - 1;
		$sql = new Model();
		//lay 20 truyen theo id -- giong phan trang
		$be = $id * 20;
		$en = $be + 20;
		//tim kiem theo the loai
		if ($type){
			$query = "SELECT cev_comics.comic_code, cev_comics.comic_name, cev_comics.link_bookcover
			FROM cev_comics join cev_type_comic on cev_comics.comic_code = cev_type_comic.comic_code
			WHERE cev_type_comic.type_code = '$type'
			LIMIT $be,$en";
		}
		else{
			$query = "SELECT comic_code, comic_name, link_bookcover 
			FROM cev_comics ORDER BY rand() 
			LIMIT 0,20";
		}
        $_comic_type = array();
		$_comic_type["main"] = $sql->ExeQuery($query);
        
		if ($_comic_type){
            #lay chap tuong ung
            for($i=0;$i<count($_comic_type["main"]);$i++){
                $code = $_comic_type["main"][$i]["comic_code"];
                $query = "SELECT title_chap, chap_code FROM cev_chaps WHERE comic_code='$code' LIMIT 0,1";
                $_comic_type["main"][$i]["chaps"] = $sql->ExeQuery($query);
            }
            #lau ten the loai
            $query = "SELECT type_name FROM cev_type WHERE type_code='$type'";
            $_comic_type["name"] = $sql->ExeQuery($query)[0]['type_name'];
            #dem so truyen cung the loai
            $query = "SELECT COUNT(*) as 'max-page' 
            FROM cev_comics join cev_type_comic on cev_comics.comic_code = cev_type_comic.comic_code
			WHERE cev_type_comic.type_code = '$type'";
            $_comic_type["max-page"] = floor(($sql->ExeQuery($query)[0]['max-page']) / 20) + 1;
			$this->view("content", $_comic_type);
		}
		else{
			$this->view("p404");
		}
	}
}
?>