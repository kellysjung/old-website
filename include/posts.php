<?php
include_once('config/init.php');

function getPostsArray() {
	$posts = dbQuery("SELECT * FROM blog_posts");
	return $posts;
}

function listPosts() {
	$posts = getPostsArray()->fetchAll();
	foreach ($posts as $post) {
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><hr>';
	};
}

function getPost($postId) {
	$getSpecificPost = dbQuery("SELECT * FROM blog_posts WHERE postId = :postId", array ("postId"=>$postId));
	return $getSpecificPost->fetch();
}

function viewPost($postId) {
	$specificPost = getPost($postId);
	echo '<div class="main">'.$specificPost['body'].'</div>'
	;	
}