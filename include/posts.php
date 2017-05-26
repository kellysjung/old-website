<?php
include_once('config/init.php');

function listPosts() {
	$posts = dbQuery("SELECT * FROM blog_posts")->fetchAll();
	foreach ($posts as $post) {
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><p>'.$post['category'].'</p><hr>';
	};
}

function getPost($postId) {
	$getSpecificPost = dbQuery("SELECT * FROM blog_posts WHERE postId = :postId", array ("postId"=>$postId));
	return $getSpecificPost->fetch();
}

function viewPost($postId) {
	$specificPost = getPost($postId);
	echo '<div class="main"><div class="blogPosts">'.$specificPost['body'].'</div></div>';	
}

function listPostCategories() {
	$posts = dbQuery("SELECT * FROM blog_posts ORDER BY category")->fetchAll();
	$printed = array();
	foreach ($posts as $post) {
		if (!in_array($post['category'], $printed)) {
			echo '<h4>'.$post['category'].'</h4>';
			array_push($printed, $post['category']);
		};
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><hr>';
	};
}