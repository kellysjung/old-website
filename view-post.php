<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$specificPost = getPost($postId);

navbar($specificPost['tab'].' | Kelly Jung', $specificPost['title'], 'headerMain');
echo "
<div class='main'>
	<div class='blogPosts'>
		<ul>";
			viewPost($postId);
			echo "
		</ul>
	</div>";
	echo "
	<hr><p>Add a comment:</p>
	<div class='commentForm'>
		<input class='commentUser' type='text' placeholder='Your Name' required name='Name'><br><br>
		<textarea class='commentBody' type='text' placeholder='Your Comment' required name='Comment'></textarea><br><br>
		<button class='commentButton' type='submit'>Add Comment</button>
	</div>
</div>";

footer();