<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();
adminNavbar('Edit Post | Kelly Jung', 'Edit Post', 'headerMain');

$postId = $_REQUEST['postId'];
$post = editPost($postId);

if (isset($_REQUEST['update'])) {
	updatePost();
}
if (isset($_REQUEST['delete'])) {
	deletePost();
}
if (isset($_REQUEST['removeTag'])) {
	removeTag();
}

echo "
<div class='main'>
	<div class='blogPosts'>
		<form class='postForm' action='' method='POST'>
			<p>EDIT TITLE - This will be part header image. (Character limit: 250)</p>
			<input name='title' type='text' maxlength='250' value='".$post['title']."' required><br>
			<p>EDIT TAB - This will be part of the tab title. (Character limit: 24)</p>
			<input name='tab' type='text' maxlength='24' value='".$post['tab']."' required><br>
			<p>EDIT BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.</p>
			<textarea name='body' class='postFormBody' rows='10' cols='70' required>".$post['body']."</textarea><br><br>
			<input class='defaultBtn' type='reset' value='Revert Changes'><br><br>
			<input class='greenBtn' type='submit' name='update' value='Update Post'><br><br>
			<input class='redBtn' type='submit' name='delete' value='Delete Post'>
		</form>
		<p>EDIT TAGS</p>
		<a href = edit-tags.php?postId=".$postId." type='button' class='fa fa-tags'></a>";
		listPostsTags($postId);
		echo "
	</div>
</div>";
footer();

function updatePost() {
	$postId = $_REQUEST['postId'];

	$updatePost = dbQuery("UPDATE blog_posts
		SET tab = :updatedTab, title = :updatedTitle, body = :updatedBody 
		WHERE postId = :postId",
		array ("updatedTab"=>$_POST['tab'], "updatedTitle"=>$_POST['title'], "updatedBody"=>$_POST['body'], "postId"=>$postId));

	if ($updatePost) {
		header('Location:admin-page.php');
	} else {
		echo "<span class='error'>Error. Could not update post.</span>";
	}
	exit;
}

function deletePost() {
	$postId = $_REQUEST['postId'];
	$deleteComments = dbQuery("DELETE FROM comments WHERE postId = :postId",
		array ("postId"=>$postId));
	$deleteTags = dbQuery("DELETE FROM blogPost_tag_link WHERE postId = :postId",
		array ("postId"=>$postId));
	$deletePost = dbQuery("DELETE FROM blog_posts WHERE postId = :postId",
		array ("postId"=>$postId));

	if ($deletePost and $deleteComments and $deleteTags) {
		header('Location:admin-page.php');
	} else {
		echo "<span class='error'>Error. Could not delete post.</span>";
	}
	exit;
}

function removeTag() {
	$tagId = $_REQUEST['tagId'];
	$postId = $_REQUEST['postId'];

	$removeTag = dbQuery("DELETE FROM blogPost_tag_link
		WHERE postId = :postId AND tagId = :tagId",
		array("postId"=>$postId, "tagId"=>$tagId));

	if ($removeTag) {
		header('Location:edit-tags.php?postId='.$postId);
	} else {
		echo "Error. Could not update post. <br>";
	}
	exit;
}