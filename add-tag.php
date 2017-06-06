<?php
include('config/init.php');

$postId = $_REQUEST['postId'];

if (isset($_POST['new'])) {
	$newTag = dbQuery("INSERT INTO tags (tagName, tagDescription) VALUES (:tagName, :tagDescription)", array("tagName"=>$_POST['newTagName'], "tagDescription"=>$_POST['newTagDescription']));
}

if ($newTag) {
	header('Location:admin-view-tags.php');
} else {
	echo "Error. Could not add tag. <br>";
}
exit;