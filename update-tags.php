<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();

$tagId = $_REQUEST['tagId'];

$deleteTagLinks = dbQuery("DELETE FROM blogPost_tag_link
	WHERE tagId = :tagId", array ("tagId"=>$tagId));
$deleteTag = dbQuery("DELETE FROM tags
	WHERE tagId = :tagId", array ("tagId"=>$tagId));

if ($deleteTagLinks and $deleteTag) {
	header('Location:admin-view-tags.php');
} else {
	echo "Error. Could not delete post. <br>";
}