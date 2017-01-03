<div id='main-content'>
<?php
	echo "<div class='comic-detail'>";
    echo "<a href='?page=comic&comic=" . next_code($data["comic_code"]) . "'><img class='next_icon' src='/application/views/image/next-icon.png'></a>";
    echo "<a href='?page=comic&comic=" . prev_code($data["comic_code"]) . "'><img class='prev_icon' src='/application/views/image/prev-icon.png'></a>";
	echo "<h1>" . hexToStr($data['comic_name']) . "</h1>";
	
	echo "<div class='info-left-content'>";
    echo "<h6>THÔNG TIN TRUYỆN</h6>";
   
    echo "<div class='bookcover'>";
	echo "<img style='height:100%; width:100%;' src='application/views/image/bookcover/" . $data["comic_code"] . ".png'>";
	echo "</div>";
	
    echo "<ul class='info-list'>";
	echo "<li>Tác giả: " . hexToStr($data['author']) . "</li>";
	if ($data['comic_status'] == 1){
		echo "<li>Tình trạng: Hoàn tất</li>";
	}
	else{
		echo "<li>Tình trạng: Đang tiến hành</li>";
	}
	echo "<li>Thể loại :</li>";
	echo "</ul>";
	echo "</div>";

	echo "<div class='description'>";
    echo "<h6>TÓM TẮT NỘI DUNG</h6>";
	echo "<p>" . hexToStr($data['description']) . '</p>';
	echo "</div>";

	echo "<div class='table-chap-wrapper'>";
    echo "<h6>DANH SÁCH CHAPTER</h6>";
    echo "<p class='name-tb'>Tên chapter</p>";
    echo "<p class='date-tb'>Ngày cập nhật</p>";
    echo "<div class='table-chap'>";
    echo "<table>";
	foreach ($data["chap_info"] as $row) {
        echo "<tr>";
		echo "<th class='name-tb-ch'><a href='?page=chap&comic=" . $data["comic_code"] . "&chap=" . $row["chap_code"] . "'>" . hexToStr($row["title_chap"]) . "</a></th>";
        echo "<th class='date-tb-ch'>00-00-00</th>";
        echo "</tr>";
	}
    echo "</table>";
	echo "</div></div></div>";
?>
</div>