<?php
include('config/init.php');
adminNavbar('New Post | Kelly Jung', "New Post", 'headerMain');
?>

<div class="main">
	<div class='blogPosts'>
		<h3>Create a new post</h3>
			<form class='editForm' action='add-post.php' method='POST'>
				<p>TITLE - This will be part header image. (Character limit: 250)</p>
				<input name='title' type='text' maxlength='250' placeholder='Post Title' required><br>
				<p>TAB - This will be part of the tab title. (Character limit: 24)</p>
				<input name='tab' type='text' maxlength='24' placeholder='Tab Title' required><br>
				<p>BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.</p>
				<textarea class='editFormBody' name='body' placeholder='Post Body' required></textarea><br>

				<!-- <p>TAGS - Select tag.</p>
				<select name='tags'>
					<?php tagsDropdown(); ?>
				</select><br> -->

				<br><input class='greenBtn' type="submit" name='publish' value="Publish Post"><br>
				<br><input class='defaultBtn' type="submit" name='save' value="Save to Drafts">
			</form>
	</div>
</div>

<?php footer(); ?>