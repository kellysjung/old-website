<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$specificPost = getPost($postId);

navbar($specificPost['tab'].' | Kelly Jung', $specificPost['title'], 'headerMain');
?>
<div class='main'>
	<div class='blogPosts'>
		<?php viewPost($postId); ?>

		<hr><hr>
		<h4>Comments</h4>
		<?php listComments($postId); ?>
		<br>
	</div>
	<div class='commentForm'>
		<form action="add-comment.php" method="POST">
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<input name='commentUser' placeholder='Name' required><br><br>
			<textarea class='commentBody' name='commentBody' placeholder='Comment' required></textarea><br><br>
			<input name='commentEmail' placeholder='Email Address (Not Displayed)'><br><br>
			<input class='commentBtn' type="submit" value="Add Comment">
		</form>
	</div>
</div>

<?php footer();