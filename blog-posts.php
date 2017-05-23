<!DOCTYPE html>
<html>
<?php
include('config/init.php');
navbar('Posts | Kelly Jung','Posts by Kelly');
?>
<div class="main">
	<div class="blogPosts">
		<ul>
			<?php
			getPosts();
			?>
		</ul>
	</div>
</div>
<?php
footer();
?>
</body>
</html>