<?php
include('config/init.php');
navbar('Posts | Kelly Jung', 'Posts by Kelly', 'headerMain');

echo "<div class='main'>";
listTags();
echo "
<div class='blogPosts'>
	<ul>";
		echo "<hr><br>";
		listPosts();
		echo "
	</ul>
</div>
</div>";
footer();