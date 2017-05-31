<?php
include_once('config/init.php');

// FOR GETTING JUST THE POSTS IN LARGE LIST (NO CATEGORIES INVOLVED)
function getPost($postId) {
	$getSpecificPost = dbQuery("SELECT * FROM blog_posts WHERE postId = :postId", array ("postId"=>$postId));
	return $getSpecificPost->fetch();
}

// VIEW INDIVIDUAL POSTS; CAN COME FROM view-tag.php OR blog-posts.php; USED IN view-post.php
function viewPost($postId) {
	$specificPost = getPost($postId);
	echo $specificPost['body'];	
}

// LISTS ALL THE POSTS REGARDLESS OF TAG; USED IN blog-posts.php
function listPosts() {
	$posts = dbQuery("SELECT * FROM blog_posts ORDER BY postId DESC")->fetchAll();
	foreach ($posts as $post) {
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><br><br>';
	};
}

// GETS THE SPECIFIC TAG AND POSTS ASSOCIATED; USED IN view-tag.php
function getTag($tagId) {
	$getSpecificTag = dbQuery("SELECT * FROM tags WHERE tagId = :tagId", array ("tagId"=>$tagId));
	return $getSpecificTag->fetch();
	foreach ($getSpecificTag as $tag) {
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><hr>';
	}
}

// LISTS ALL THE TAG NAMES; USED IN blog-posts.php
function listTags() {
	$tags = dbQuery("SELECT * FROM tags")->fetchAll();
	echo 'All Tags : ';
	foreach ($tags as $tag) {
		echo '<a href="view-tag.php?tagId='.$tag['tagId'].'">'.$tag['tagName'].'</a> | ';
	}
}

// LISTS ALL POSTS PERTAINING TO TAG; USED IN view-tag.php
function listTagPosts($tagId) {
	$taggedPosts = dbQuery("SELECT * FROM blog_posts INNER JOIN blogPost_tag_link ON blogPost_tag_link.postId = blog_posts.postId INNER JOIN tags ON tags.tagId = blogPost_tag_link.tagId WHERE tags.tagId = :tagId", array ("tagId"=>$tagId))->fetchAll();
	if(!$taggedPosts) {
		echo("No tagged posts found.");
		exit;
	}
	foreach ($taggedPosts as $post) {
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><br>';
	}
}

// LISTS ALL COMMENTS FOR A POST; USED IN view-post.php
function listComments($postId) {
	$comments = dbQuery("SELECT * FROM comments INNER JOIN blog_posts ON blog_posts.postId = comments.postId WHERE comments.postId = :postId ORDER BY commentId DESC" , array ("postId"=>$postId))->fetchAll();
	echo '<hr><br>';
	if(!$comments) {
		echo "No comments yet.<hr><br>";
	}

	foreach ($comments as $comment) {
		echo '<div class="commentUserBox">'.$comment['commentUser'].'<div class="datetime">'.$comment['commentDate'].' @ '.$comment['commentTime'].'</div></div><div class="commentBodyBox">'.$comment['commentBody'].'</div><br><hr>';
	}
}

function listAdminPosts() {
	$posts = dbQuery("SELECT * FROM blog_posts ORDER BY postId DESC")->fetchAll();
	foreach ($posts as $post) {
		echo '<a href = edit-post.php?postId='.$post['postId'].' type="button"> Edit / Delete Post</a>' . ':';
		echo '   ';
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><br><br>';
	};
}

function editPost($postId) {
	$editPost = dbQuery("SELECT * FROM blog_posts WHERE postId = :postId", array ("postId"=>$postId))->fetch();
	return $editPost;
}


// DATE AND TIME FUNCTIONS
	function returnDateTime() {
		return date("n\-j\-y \@ h:i A");
	}
	function returnDate() {
		return date("n\-j\-y");
	}
	function returnTime() {
		return date("h:i A");
	}