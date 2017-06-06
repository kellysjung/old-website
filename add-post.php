<?php
include_once('config/init.php');

$created = getPostCreated();
// $draft;

// if (isset($_POST['publish'])) {
$draft = 0;
// }
// if (isset($_POST['save'])) {
// 	$draft = 1;
// }

$addPost = dbQuery(
	"INSERT INTO blog_posts (tab, title, body, created, draft) VALUES (:tab, :title, :body, :created, :draft)", array("tab"=>$_POST['tab'], "title"=>$_POST['title'], "body"=>$_POST['body'], "created"=>$created, "draft"=>$draft)
	);

$getId = dbQuery("SELECT MAX(postId) FROM blog_posts")->fetchAll(); 
$postId = $getId[0]['MAX(postId)'];

if (!isset($_POST['tagId'])) {
	$tagId = 2;
} else {
	$tagId = $_POST['tagId'];
}

if (isset($_POST['newTagName'])) {
	$newTag = dbQuery("INSERT INTO tags (tagName, tagDescription) VALUES (:tagName, :tagDescription)", array("tagName"=>$_POST['newTagName'], "tagDescription"=>$_POST['newTagDescription']));
	
	$getId = dbQuery("SELECT MAX(tagId) FROM tags")->fetchAll();

	$tagId = $getId[0]['MAX(tagId)'];
	$addTag = dbQuery("INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)", array("postId"=>$postId, "tagId"=>$tagId));
} else {
	$addTag = dbQuery(
		"INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)", array("postId"=>$postId, "tagId"=>$_POST['tagId']));
}

// if ($addPost and $addTag) {
// 	header('Location:admin-page.php');
// } else {
// 	echo "Error. Could not add post. <br>";
// }