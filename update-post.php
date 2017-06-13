<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();

$postId = $_REQUEST['postId'];

$del = $_REQUEST['del'];

if (isset($_REQUEST['delete']) or $del == 1) {
	$deleteComments = dbQuery("DELETE FROM comments WHERE postId = :postId", array ("postId"=>$postId));
	$deleteTags = dbQuery("DELETE FROM blogPost_tag_link WHERE postId = :postId", array ("postId"=>$postId));
	$deletePost = dbQuery("DELETE FROM blog_posts WHERE postId = :postId", array ("postId"=>$postId));
	
	if ($deletePost and $deleteComments and $deleteTags) {
		header('Location:admin-page.php');
	} else {
		echo "Error. Could not delete post. <br>";
	}
	exit;
}

if (isset($_REQUEST['update']) or $del == 2) {
	$postId = $_REQUEST['postId'];

	$updatePost = dbQuery("UPDATE blog_posts SET tab = :updatedTab, title = :updatedTitle, body = :updatedBody WHERE postId = :postId", array ("updatedTab"=>$_POST['tab'], "updatedTitle"=>$_POST['title'], "updatedBody"=>$_POST['body'], "postId"=>$postId));

	if ($updatePost) {
		header('Location:admin-page.php');
	} else {
		echo "Error. Could not update post. <br>";
	}
	exit;
}

if (isset($_REQUEST['removeTag']) or $del == 0) {
	$tagId = $_REQUEST['tagId'];

	$removeTag = dbQuery("DELETE FROM blogPost_tag_link WHERE postId = :postId AND tagId = :tagId", array("postId"=>$postId, "tagId"=>$tagId));

	if ($removeTag) {
		header('Location:edit-tags.php?postId='.$postId);
	} else {
		echo "Error. Could not update post. <br>";
	}
	exit;
}