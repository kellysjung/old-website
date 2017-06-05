<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
echo $postId;

if (isset($_POST['exists'])) {
	$addTag = dbQuery("INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)", array("postId"=>$postId, "tagId"=>$_POST['tagId']));
	exit;
}

if (isset($_POST['new'])) {
	$newTag = dbQuery("INSERT INTO tags (tagName, tagDescription) VALUES (:tagName, :tagDescription)", array("tagName"=>$_POST['newTagName'], "tagDescription"=>$_POST['newTagDescription']));
	
	$getId = dbQuery("SELECT MAX(tagId) FROM tags")->fetchAll();

	$tagId = $getId[0]['MAX(tagId)'];
	$addTag = dbQuery("INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)", array("postId"=>$postId, "tagId"=>$tagId));
}

if ($addTag) {
	header('Location:edit-tags.php?postId='.$postId);
} else {
	echo "Error. Could not add tag. <br>";
}
exit;