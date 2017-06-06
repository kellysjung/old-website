<?php
include('config/init.php');

$postId = $_REQUEST['postId'];

// if (isset($_POST['exists'])) {
// 	$tagId = $_POST['tagId'];

// 	$checkExists = dbQuery("SELECT * FROM blogPost_tag_link WHERE postId = :postId AND tagId = :tagId", array("postId"=>$postId, "tagId"=>$tagId))->fetchAll();

// 	if (!$checkExists) {
// 		$addTag = dbQuery("INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)", array("postId"=>$postId, "tagId"=>$tagId));
// 	} else {
// 		echo "<script type='text/javascript'>alert('Post already contains that tag.');</script>";
// 		echo "<a href=edit-tags.php?postId=".$postId.">back</a>";
// 		exit;
// 	}
// }

if (isset($_POST['new'])) {
	$newTag = dbQuery("INSERT INTO tags (tagName, tagDescription) VALUES (:tagName, :tagDescription)", array("tagName"=>$_POST['newTagName'], "tagDescription"=>$_POST['newTagDescription']));
	
	// $getId = dbQuery("SELECT MAX(tagId) FROM tags")->fetchAll();

	// $tagId = $getId[0]['MAX(tagId)'];
	// $addTag = dbQuery("INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)", array("postId"=>$postId, "tagId"=>$tagId));
}

if ($newTag) {
	header('Location:admin-view-tags.php');
} else {
	echo "Error. Could not add tag. <br>";
}
exit;