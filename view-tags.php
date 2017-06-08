<?php
include('config/init.php');
navbar('All Tags | Kelly Jung', "All Tags", 'headerMain');

echo "
<div class='main'>
	<div class='blogPosts'>";
	listTags();
	echo "<hr>";
	returnTagList();
	echo "
	</div>
</div>
";

footer();