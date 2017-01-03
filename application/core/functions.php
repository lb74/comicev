<?php
	function utf8_to_ascii($str) {
		if(!$str){
			return "";
		}
		$unicode = array(
			'a'	=>	'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'A'	=>	'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd'	=>	'đ',
			'D'	=>	'Đ',
			'e'	=>	'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'E'	=>	'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'	=>	'í|ì|ỉ|ĩ|ị',	
			'I'	=>	'Í|Ì|Ỉ|Ĩ|Ị',	
			'o'	=>	'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'O'	=>	'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'	=>	'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U'	=>	'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'	=>	'ý|ỳ|ỷ|ỹ|ỵ',
			'Y'	=>	'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		
		foreach($unicode as $nonUnicode=>$uni) 
			$str = preg_replace("/($uni)/i",$nonUnicode,$str);
		return $str;
	}
	function strToHex($string){
		$hex = '';
		for ($i=0; $i<strlen($string); $i++){
			$ord = ord($string[$i]);
			$hexCode = dechex($ord);
			$hex .= substr('0'.$hexCode, -2);
		}
		return strToUpper($hex);
	}
	function hexToStr($hex){
		$string='';
		for ($i=0; $i < strlen($hex)-1; $i+=2){
			$string .= chr(hexdec($hex[$i].$hex[$i+1]));
		}
		return $string;
	}
    function title_short($title, $end){
        if (strlen($title) > $end+3){
            return mb_substr($title,0,$end,"UTF-8") . "...";
        }
        return $title;
    }
    function rename_chap($chap_name){
        $chap_name = str_replace(":", "", $chap_name);
        $chap_name = str_replace(".", "", $chap_name);
        $chap_name = str_replace("-", "", $chap_name);
        $m = split(" ", $chap_name);
        return "Chapter " . $m[1];
    }
    function next_code($code){
        $num = (int)substr($code,3,3) + 1;
        $str = "000$num";
        return substr($code,0,3) . substr($str,-3);
    }
    function prev_code($code){
        $num = (int)substr($code,3,3) - 1;
        if ($num > 0){
            $str = "000$num";
            return substr($code,0,3) . substr($str,-3);
        }
        return $code;
    }
    /* Important */
    function show_top_comic_page($data_show){
        if ($data_show) {
            foreach ($data_show as $row) {
                echo '<li><div class="thumnbail">';
                $image = "application/views/image/bookcover/" . $row['comic_code'] . ".png";
                echo '<img src="' . $image . '" alt="IMAGE" style="height:100%; width:100%;">';
                echo "</div>";

                echo '<div class="content">';
                $title = hexToStr($row["comic_name"]);
                echo "<h6><a title='" . $title . "' href='http://localhost:8888/?page=comic&comic=" . $row["comic_code"] . "'>" . title_short($title,15) . "</a></h6>";
                foreach ($row["chaps"] as $chap) {
                    $name = hexToStr($chap["title_chap"]);
                    $name_short = rename_chap($name);
                    echo "<p class='title_chap'>" . "<img src='/application/views/image/new-icon.png'>" . "<a title='" . $name . "' href='http://localhost:8888/?page=chap&comic=" . $row["comic_code"] . "&chap=" . $chap["chap_code"] . "'>" . $name_short . "</a></p>";
                }
                echo '</div></li>';
            }
        }
    }
?>