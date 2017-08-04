<?php
include('config/init.php');
navbar('Blog');
?>
<div class='large-break'><br></div><br>
<div class='main center'>
	<div class='blogPosts'>
		<?php
		listPersonalPosts();
		?>
	</div>
</div>
<div class='large-break'><br></div>
<?php
footer();