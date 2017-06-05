<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$specificPost = getPost($postId);

navbar($specificPost['tab'].' | Kelly Jung', $specificPost['title'], 'headerMain');
?>
<div class='main'>

	<div class='blogPosts'>
		<?php viewPost($postId); ?>
		<div class='smallText'>
			Tags: 
			<?php listPostsTags($postId); ?>
		</div>
	</div>
</div>
<br>
<div class='main'>
	<h4 id="comments">Comments</h4>
	<a href='view-post.php?postId=<?php echo $postId ?>#newcomment'><input class='defaultBtn' type="submit" value="+"></a>
	<div class='blogPosts'>
		<?php listComments($postId); ?>
	</div>
	<br>
	<div id='newcomment' class='defaultForm'>
		<form action="add-comment.php" method="POST">
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<input name='commentUser' maxlength='254' placeholder='Name' required><br><br>
			<textarea class='defaultFormBody' name='commentBody' placeholder='Comment' required></textarea><br><br>
			<input type='email' name='commentEmail' placeholder='Email Address (Not Displayed)'><br><br>
			<input class='defaultBtn' type="submit" value="Add Comment">
		</form>
	</div>
</div>

<?php footer();