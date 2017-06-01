<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$specificPost = getPost($postId);

navbar($specificPost['tab'].' | Kelly Jung', $specificPost['title'], 'headerMain');
?>
<div class='main'>
	<div class='blogPosts'>
		<?php viewPost($postId); ?>
	</div>
</div>
<br>
<div class='main'>
	<h4>Comments</h4>
	<div class='blogPosts'>
		<?php listComments($postId); ?>
	</div>
	<div class='defaultForm'>
		<form action="add-comment.php" method="POST">
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<input name='commentUser' maxlength='254' placeholder='Name' required><br><br>
			<textarea class='defaultFormBody' name='commentBody' placeholder='Comment' required></textarea><br><br>
			<input name='commentEmail' placeholder='Email Address (Not Displayed)'><br><br>
			<input class='defaultBtn' type="submit" value="Add Comment">
		</form>
	</div>
</div>

<?php footer();