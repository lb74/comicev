<div id='main-content'>
	<div class='group-comic-content'>
		<?php
        echo "<h4>" . hexToStr($data["name"]) . "</h4>";
        ?>
		<ul class="comic-list">
			<?php
				show_top_comic_page($data["main"]);
			?>
		</ul>
	</div>
    <div class="menu-div-page">
        <ul>
        <?php
            if ($data["max-page"] > 11){
                for($i=1;$i<=10;$i++){
                    echo "<li><a href='?page=type&type=typ002&id=" . $i . "'>$i</a></li>";
                }
                echo "<li>...</li>";
                echo "<li><a href='?page=type&type=typ002&id=" . $data["max-page"] . "'>" . $data["max-page"] . "</a></li>";
            }
            else {
                for($i=1;$i<=$data["max-page"];$i++){
                    echo "<li><a href='?page=type&type=typ002&id=" . $i . "'>$i</a></li>";
                }
            }
        ?>
        </ul>
    </div>
</div>