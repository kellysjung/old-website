<?php
include('config/init.php');

$tagId = $_REQUEST['tagId'];
$specificTag = getTag($tagId);

navbar_v1($specificTag['tagName'].' | Kelly Jung', $specificTag['tagName'].' Posts', 'headerMain');
echo "
<div class='large-break'><br></div><br>
<div class='main'>
	<div class='blogPosts'>".
		$specificTag['tagDescription']
		."<hr><div class='blogPosts'>
		<ul>";
			listTaggedPosts($tagId);
			echo"
		</ul>
	</div>
</div>
<div class='large-break'><br></div>";
footer();