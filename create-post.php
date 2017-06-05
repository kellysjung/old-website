<?php
include('config/init.php');
adminNavbar('New Post | Kelly Jung', "New Post", 'headerMain');
?>

<div class="main">
	<div class='blogPosts'>
		<h3>Create a new post:</h3>
		<form class='editForm' action='add-post.php' method='POST'>
			<p>TITLE - This will be part header image. (Character limit: 250)</p>
			<input name='title' type='text' maxlength='250' placeholder='Post Title' required><br>
			<p>TAB - This will be part of the tab title. (Character limit: 24)</p>
			<input name='tab' type='text' maxlength='24' placeholder='Tab Title' required><br>
			<p>BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.</p>
			<textarea class='editFormBody' name='body' placeholder='Post Body' required></textarea><br>
		<br>
			<hr>
			<h3>Add tag:</h3>
			<?php
			tagsDropdown();
			?>
			<!-- <input type='hidden' name='postId' value='<?php echo $postId;?>'> -->
			<br><br>
			<!-- <input class='defaultBtn' type="submit" name='exists' value="Add"> -->
			
			<h3>Add a new tag:</h3>
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<p>TAG NAME - Up to 250 characters.</p>
			<input name='newTagName' type='text' maxlength='250' placeholder='New Tag'>
			<p>TAG DESCRIPTION - Short description of the tag. Can leave blank.</p>
			<input name='newTagDescription' type='text' placeholder='New Tag Description'>
			<br><br>
			<input class='defaultBtn' type="submit" value="Publish Post">

		</form>
	</div>
</div>

<?php footer(); ?>