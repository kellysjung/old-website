<?php
include('config/init.php');
adminNavbar('New Post | Kelly Jung', "New Post", 'headerMain');
?>

<div class="main">
	<div class='blogPosts'>
		<h3>Create a new post</h3>
			<form class='defaultForm' action='add-post.php' method='POST'>
				<p>TAB - This will be part of the tab title. (Character limit: 24)</p>
				<input name='tab' type='text' maxlength='24' placeholder='Tab Title' required><br>
				<p>TITLE - This will be part header image. (Character limit: 250)</p>
				<input name='title' type='text' maxlength='250' placeholder='Post Title' required><br>
				<p>BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.</p>
				<textarea class='defaultFormBody' name='body' placeholder='Post Body' required></textarea><br><br>
				<input class='defaultFormBtn' type="submit" value="Add Post">
			</form>
	</div>
</div>

<?php footer(); ?>