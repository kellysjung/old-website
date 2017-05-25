<?php
include('config/init.php');
navbar('Posts | Kelly Jung', 'Posts by Kelly', 'headerMain');
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
<?php footer(); ?>