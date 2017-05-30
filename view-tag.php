<?php
include('config/init.php');

$tagId = $_REQUEST['tagId'];
$specificTag = getTag($tagId);

navbar($specificTag['tagName'].' | Kelly Jung', $specificTag['tagName'].' Posts', 'headerMain');
echo "
<div class='main'>".
	$specificTag['tagDescription']
	."<div class='blogPosts'>
		<ul>";
			listTagPosts($tagId);
			echo"
		</ul>
	</div>
</div>";
footer();