<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$delete = $_REQUEST['del'];

if (isset($_POST['delete']) or $delete == 1) {
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

if (isset($_POST['update'])) {
	$postId = $_REQUEST['postId'];

	$updatePost = dbQuery("UPDATE blog_posts SET tab = :updatedTab, title = :updatedTitle, body = :updatedBody WHERE postId = :postId", array ("updatedTab"=>$_POST['tab'], "updatedTitle"=>$_POST['title'], "updatedBody"=>$_POST['body'], "postId"=>$postId));

	if ($updatePost) {
		header('Location:admin-page.php');
	} else {
		echo "Error. Could not update post. <br>";
	}
	exit;
}