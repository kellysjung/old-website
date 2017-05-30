<?php
include_once('config/init.php');

$link = mysqli_connect('localhost', 'cf', 'password', 'cf');

$postId = $_REQUEST['postId'];
$commentUser = mysql_real_escape_string($_POST['commentUser']);
$commentEmail = mysql_real_escape_string($_POST['commentEmail']);
$commentBody = mysql_real_escape_string($_POST['commentBody']);

$addComment = "INSERT INTO comments (postId, commentUser, commentEmail, commentBody) VALUES ('$postId', '$commentUser', '$commentEmail', '$commentBody')";

if (mysqli_query($link, $addComment)) {
	// echo "<script type='text/javascript'>alert('Comment added.');</script>";
	header('Location:view-post.php?postId='.$postId);
} else {
	echo "Error. Could not add comment. Please try again. <br>" . mysqli_error($link);
}
exit;