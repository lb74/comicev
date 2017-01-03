<div class="chap-view">
<?php
	echo "<h3>" . hexToStr($data["title_chap"]) . "</h3>";

    echo "<a href='?page=chap&comic=" . $data["comic_code"] . "&chap=" . next_code($data["chap_code"]) . "'><img class='next_icon' src='/application/views/image/next-icon.png'></a>";
    echo "<a href='?page=chap&comic=" . $data["comic_code"] . "&chap=" . prev_code($data["chap_code"]) . "'><img class='prev_icon' src='/application/views/image/prev-icon.png'></a>";

	foreach ($data["links"] as $row) {
		echo "<img class='a-image' style='width:100%;' src='" . $row["link_image"] . "'>";
	}
    echo "<a href='?page=chap&comic=" . $data["comic_code"] . "&chap=" . next_code($data["chap_code"]) . "'><img class='next_icon_bot' src='/application/views/image/next-icon.png'></a>";
    echo "<a href='?page=chap&comic=" . $data["comic_code"] . "&chap=" . prev_code($data["chap_code"]) . "'><img class='prev_icon_bot' src='/application/views/image/prev-icon.png'></a>";
?>
</div>