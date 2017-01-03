<?php
class showall extends Controller {
    function index() {
        $search = isset($_GET["search"])?$_GET["search"]:"rand";
        if ($search == "search"){
            $this->_search();
        }
        elseif ($search == "new"){
            $this->_new();
        }
        elseif ($search == "most"){
            $this->_most();
        }
        else{
            $this->_rand();
        }
    }
    function _search(){
        
    }
    function _new(){
        $query = "SELECT comic_code, comic_name FROM cev_comics ORDER BY date DESC";
        $_comic = $this->get_comic($query, "TRUYỆN MỚI CẬP NHẬT");
        $this->view("content", $_comic);
    }
    function _most(){
        $query = "SELECT comic_code, comic_name FROM cev_comics ORDER BY views DESC";
        $_comic = $this->get_comic($query, "TRUYỆN XEM NHIỀU");
        $this->view("content", $_comic);
    }
    function _rand(){
        $query = "SELECT comic_code, comic_name FROM cev_comics ORDER BY rand()";
        $_comic = $this->get_comic($query, "TRUYỆN NGẪU NHIÊN");
        $this->view("content", $_comic);
    }
    function get_comic($query, $title){
        $sql = new Model();
        $id = isset($_GET["id"])?$_GET["id"]:1 - 1;
        $be = $id * 20;
		$en = $be + 20;
        $query = $query .  " LIMIT $be,$en";
        $_comic = array();
        $_comic["name"] = $title;
        $_comic["main"] = $sql->ExeQuery($query);
        if ($_comic["main"]){
            for($i=0;$i<count($_comic["main"]);$i++){
                $code = $_comic["main"][$i]["comic_code"];
                $query = "SELECT title_chap, chap_code FROM cev_chaps WHERE comic_code='$code' LIMIT 0,1";
                $_comic["main"][$i]["chaps"] = $sql->ExeQuery($query);
            }
        }
        #dem so truyen
        $query = "SELECT COUNT(*) as 'max-page' FROM cev_comics";
        $_comic["max-page"] = floor(($sql->ExeQuery($query)[0]['max-page']) / 20) + 1;
        return $_comic;
    }
}
?>