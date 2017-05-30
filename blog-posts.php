<?php
include('config/init.php');
navbar('Posts | Kelly Jung', 'Posts by Kelly', 'headerMain');

echo "<div class='main'>";
listTags();
echo "
<div class='blogPosts'>
	";
		echo "<hr><br>";
		listPosts();
		echo "
	
</div>
</div>";
footer();