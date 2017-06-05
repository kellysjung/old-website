<?php
include_once('config/init.php');

$postId = $_REQUEST['postId'];
$created = getCommentCreated();

$addComment = dbQuery(
	"INSERT INTO comments (postId, commentUser, commentEmail, commentBody, commentCreated)
	VALUES (:postId, :cUser, :cEmail, :cBody, :cCreated)",
	array("postId"=>$postId, "cUser"=>$_POST['commentUser'], "cEmail"=>$_POST['commentEmail'], "cBody"=>$_POST['commentBody'], "cCreated"=>$created));

if ($addComment) {
	// echo "<script type='text/javascript'>alert('Comment added.');</script>";
	header('Location:view-post.php?postId='.$postId.'#comments');
} else {
	echo "Error. Could not add comment. Please try again. <br>";
}
exit;