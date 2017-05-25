<?php
include('config/init.php');
navbar('Posts | Kelly Jung', 'POSTS BY KELLY', 'headerMain');
?>
<div class="main">
	<div class="blogPosts">
		<ul>
			<?php
			listPosts();
			?>
		</ul>
	</div>
</div>
<?php
footer();
?>