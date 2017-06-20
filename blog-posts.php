<?php
include('config/init.php');
navbar('Posts | Kelly Jung', 'Posts', 'headerMain');

echo "<div class='main'>";
listTags();
echo "<br><br><a href='view-tags.php'>All Tags</a>

<div class='blogPosts'>";

	echo "<hr><br>";
	listPosts();
	echo "
	
</div>
</div>";
footer();