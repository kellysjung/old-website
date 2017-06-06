<?php
include('config/init.php');
adminNavbar('Edit Post | Kelly Jung', 'Edit Post', 'headerMain');

$postId = $_REQUEST['postId'];

$post = editPost($postId);
?>

<div class='main'>
	<div class='blogPosts'>
		<form class='editForm' action='update-post.php' method='POST'>
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<input type='hidden' name='del' value=2>
			<p>EDIT TITLE - This will be part header image. (Character limit: 250)</p>
			<input name='title' type='text' maxlength='250' value='<?php echo $post['title']; ?>' required><br>
			<p>EDIT TAB - This will be part of the tab title. (Character limit: 24)</p>
			<input name='tab' type='text' maxlength='24' value='<?php echo $post['tab']; ?>' required><br>
			<p>EDIT BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.</p>
			<textarea name='body' class='editFormBody' rows='10' cols='70' required><?php echo $post['body']; ?></textarea><br><br>
			<input class='defaultBtn' type='reset' value='Revert Changes'><br><br>
			<input class='greenBtn' type='submit' name='update' value='Update Post'><br><br>
			<input class='redBtn' type='submit' name='delete' value='Delete Post'>
		</form>
		<p>EDIT TAGS</p>
		<a href = edit-tags.php?postId=<?php echo $postId; ?> type='button'><i class='fa fa-tags' aria-hidden='true'></i></a>
		<?php listPostsTags($postId); ?>
	</div>
</div>
<?php
footer();
?>