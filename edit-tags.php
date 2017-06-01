<?php
include('config/init.php');
adminNavbar('Edit Tags | Kelly Jung', "Edit Tags", 'headerMain');
$postId = $_REQUEST['postId'];
?>

<div class='main'>
	<div class='blogPosts'>
		<p>Select which post to add a tag too.</p>
			<?php
			// echo 'Add ';
			tagsDropdown();
			echo ' tag on ';
			postsDropdown();
			?>
			<a href='admin.php'><input class='defaultBtn' type="submit" name='addTag' value="Submit"></a><br><br> 
<p>Add New Tag</p>


	</div>
</div>