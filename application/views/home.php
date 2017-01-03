<div id='main-content'>
	<div class='group-comic-content'>
		<h4>Truyện xem nhiều</h4>
        <h6 class="more"><a href="/?page=showall&search=most">Xem thêm &#187</a></h6>
		<ul class="comic-list">
			<?php
			show_top_comic_page($data["most"]);
			?>
		</ul>
	</div>
	<div class='group-comic-content'>
		<h4>Truyện mới cập nhật</h4>
        <h6 class="more"><a href="/?page=showall&search=new">Xem thêm &#187</a></h6>
		<ul class="comic-list">
			<?php
			show_top_comic_page($data["new"]);
			?>
		</ul>
	</div>
</div>