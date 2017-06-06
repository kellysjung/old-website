<?php
include('config/init.php');
adminNavbar('Edit Tags | Kelly Jung', "Edit Tags", 'headerMain');
$postId = $_REQUEST['postId'];
$post = getPost($postId);
?>

<div class='main'>
	<div class='blogPosts'>
		<h4><?php echo $post['title']; ?></h4>

		<h3>Already tagged:</h3>
		<?php listPostsTagsForEdit($postId); ?>
		<hr>
		<h3>Add existing tag:</h3>
		<form action='add-tag.php' method='POST'>
			<?php
			tagsDropdown();
			?>
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<br><br>
			<input class='defaultBtn' type="submit" name='exists' value="Add">
		</form>
		<hr>
		<form action='add-tag.php' method='POST'>
			<h3>Add a new tag:</h3>
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<p>TAG NAME - Up to 250 characters.</p>
			<input name='tagName' type='text' maxlength='250' placeholder='New Tag'>
			<p>TAG DESCRIPTION - Short description of the tag. Can leave blank.</p>
			<input name='tagDescription' type='text' placeholder='New Tag Description'>
			<br><br>
			<input class='defaultBtn' type="submit" name='new' value="Create">
		</form>
	</div>
</div>
<?php
footer();
?>