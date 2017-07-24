<?php
include('config/init.php');
navbar_v1('All Tags | Kelly Jung', "All Tags", 'headerMain');

echo "
<div class='large-break'><br></div><br>
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