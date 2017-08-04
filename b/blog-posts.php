<?php
include('init.php');
navbar('Blog App');
echo "<div class='large-break'><br></div><br><hr>";
phpProjectsNavbar();

echo "
<div class='main center'>";
	listTags();
	echo "<br><br><a href='view-tags.php'>All Tags</a>

	<div class='blogPosts'>";
		echo "<hr><br>";
		listPosts();
		echo "
	</div>
</div>
<div class='large-break'><br></div>";
footer();