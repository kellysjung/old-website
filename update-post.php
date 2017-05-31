<?php
include('config/init.php');

$link = mysqli_connect('localhost', 'cf', 'password', 'cf');

$postId = $_REQUEST['postId'];

if (isset($_POST['delete'])) {
	echo 'delete';

	// $deleteComments = dbQuery("DELETE FROM comments WHERE postId = :postId");

	$deletePost = "DELETE FROM blog_posts WHERE postId = :postId";
	
	if (mysqli_query($link, $deletePost)) {
		header('Location:admin.php');
	} else {
		echo "Error. Could not update post. <br>".mysql_error($link);
	}
	exit;
}
if (isset($_POST['update'])) {
	echo 'update';

	$postId = $_REQUEST['postId'];
	$updatedTab = $_POST['tab'];
	$updatedTitle = $_POST['title'];
	$updatedBody = $_POST['body'];

	$updatePost = "UPDATE blog_posts SET tab=$updatedTab, title=$updatedTitle, body=$updatedBody WHERE postId = :postId";

	if (mysqli_query($link, $updatePost)) {
		header('Location:admin.php');
	} else {
		echo "Error. Could not update post. <br>".mysql_error($link);
	}
	exit;
}