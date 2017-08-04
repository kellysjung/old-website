<?php
include('init.php');
navbar('All Tags');

echo "
<div class='large-break'><br></div><br>
<div class='main'>
	<div class='blogPosts'>";
		listTags();
		echo "<hr>";
		// returnTagList();
		echo "
	</div>
</div>
<div class='large-break'><br></div>
";

footer();