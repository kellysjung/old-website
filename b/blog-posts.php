<?php
include('config/init.php');
navbar('Blog App');
echo "<div class='large-break'><br></div><br><hr>";
phpProjectsNavbar();

echo "<div class='large-break'><br></div><br><div class='main'>";
listTags();
echo "<br><br><a href='view-tags.php'>All Tags</a>

<div class='blogPosts'>";

	echo "<hr><br>";
	listPosts();
	echo "
	
</div>
</div>";
footer();