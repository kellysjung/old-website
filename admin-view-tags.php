<?php
include('config/init.php');
adminNavbar('Admin Tags | Kelly Jung', "Admin Tags", 'headerMain');
?>

<div class='main'>
	<div class='blogPosts'>
		<?php listAdminTags(); ?>
	</div>
	<div class='blogPosts'>
		<form action='add-tag.php' method='POST'>
			<h3>Add a new tag:</h3>
			<input type='hidden' name='postId' value='<?php echo $postId;?>'>
			<p>TAG NAME - Up to 250 characters.</p>
			<input name='newTagName' type='text' maxlength='250' placeholder='New Tag'>
			<p>TAG DESCRIPTION - Short description of the tag. Can leave blank.</p>
			<input name='newTagDescription' type='text' placeholder='New Tag Description'>
			<br><br>
			<input class='defaultBtn' type="submit" name='new' value="Create">
		</form>
	</div>
</div>

<?php
footer();
?>