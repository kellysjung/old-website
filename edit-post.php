<?php
include('config/init.php');
adminNavbar('Edit Post | Kelly Jung', "Edit Post", 'headerMain');

$postId = $_REQUEST['postId'];

$post = editPost($postId);

?>

<div class='main'>
	<div class='blogPosts'>
		<form class='editForm' action='update-post.php' method='POST'>
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<p>EDIT TAB - This will be part of the tab title. (Character limit: 24)</p>
			<input name='tab' type='text' maxlength='24' value='<?php echo $post['tab']; ?>' required><br>
			<p>EDIT TITLE - This will be part header image. (Character limit: 250)</p>
			<input name='title' type='text' maxlength='250' value='<?php echo $post['title']; ?>' required><br>
			<p>EDIT BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.</p>
			<textarea name='body' class='editFormBody' rows="10" cols="70" required><?php echo $post['body']; ?></textarea><br><br>
			<input class='defaultFormBtn' type='submit' name='update' value='Edit Post'><br><br>
			<input class='deleteBtn' type='submit' name='delete' value='Delete Post'>
		</form>
	</div>
</div>

