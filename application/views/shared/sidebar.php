<?php
	function show_comic($data_comic){
		if ($data_comic){
			foreach ($data_comic as $row) {
                echo "<div class='comic-wrapper-sb'>";
				echo "<div class=thumbnail_sb>";
				$image = "application/views/image/bookcover/" . $row['comic_code'] . ".png";
				echo "<img style='height:100%; width:100%;' src=" . $image . ">";
				echo "</div>";
				echo "<div class=name-comic-sb>";
                $title = hexToStr($row["comic_name"]);
				echo "<h6><a title='$title' href='http://localhost:8888/?page=comic&comic=" . $row["comic_code"] . "'>" . title_short($title,18) . "</a></h6>";
                foreach ($row["chaps"] as $chap) {
                    $name = hexToStr($chap["title_chap"]);
                    $name_short = title_short($name,20);
                    echo "<p class='title_chap'><a title='" . $name . "' href='http://localhost:8888/?page=chap&comic=" . $row["comic_code"] . "&chap=" . $chap["chap_code"] . "'>" . $name_short . "</a></p>";
                }
				echo "</div></div>";
			}
		}
		else{
			echo "Data not found!!!";
		}
	}
?>
<div id="sidebar">
	<div class="top-10-comic">
		<h4>Top 10 truyện trong tháng</h4>
		<?php show_comic($data_sidebar["comic"]); ?>
	</div>

	<?php
		if ($data_sidebar["page"]){
			echo "<div class='top-10-comic'>";
			echo "<h4>Truyện cùng thể loại</h4>";
			show_comic($data_sidebar["page"]);
			echo "</div>";
		}
	?>
	<div class="tag">
		<h4>Thể loại</h4>
        <ul>
		<?php
			foreach ($data_sidebar["tag"] as $row) {
				echo "<li><a href='http://localhost:8888/?page=type&type=" . $row["type_code"] . "'>" . hexToStr($row["type_name"]) . "</a></li>";
			}
		?>
        </ul>
	</div>
</div>