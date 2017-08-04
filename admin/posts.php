<?php
include_once('init.php');

// FOR GETTING JUST THE POSTS IN LARGE LIST (NO CATEGORIES INVOLVED)
function getPost($postId) {
	$getSpecificPost = dbQuery("
		SELECT * FROM blog_posts WHERE postId = :postId",
		array ("postId"=>$postId));
	return $getSpecificPost->fetch();
}

// VIEW INDIVIDUAL POSTS; CAN COME FROM view-tagged-posts.php OR blog-posts.php; USED IN view-post.php
function viewPost($postId) {
	$specificPost = getPost($postId);
	echo "<div class='smallRight'>Posted: ".$specificPost['createdString']."</div>";
	echo "<p>".$specificPost['body']."</p>";	
}

// LISTS ALL THE POSTS REGARDLESS OF TAG; USED IN blog-posts.php
function listPosts() {
	$posts = dbQuery("
		SELECT * FROM blog_posts ORDER BY postId DESC")->fetchAll();
	foreach ($posts as $post) {
		if ($post['draft'] == 0) {
			echo "<a href='view-post.php?postId=".$post['postId']."'>".$post['title']."</a><br>";
			echo "&nbsp; &nbsp by ".$post['author'];
			echo "<br><br>";
		}
	}
}

// LISTS ALL COMMENTS FOR A POST; USED IN view-post.php
function listComments($postId) {
	$comments = dbQuery("
		SELECT * FROM comments
		INNER JOIN blog_posts ON blog_posts.postId = comments.postId
		WHERE comments.postId = :postId ORDER BY commentId DESC",
		array ("postId"=>$postId))->fetchAll();
	// echo '<hr><br>';
	if(!$comments) {
		echo "(No comments yet.)<hr><br>";
	}
	foreach ($comments as $c) {
		echo "<div class='newCommentUser'>".$c['commentUser']."</div>";
		echo "<div class='datetime'>".$c['commentCreatedString']."</div>";
		echo "<div class='newCommentBody'>".$c['commentBody']."</div>";
		echo "<div style='height:10px;'>&nbsp;</div>";
	}
}

function listPersonalPosts() {
	$posts = dbQuery("SELECT * FROM personal_blog")->fetchAll();
	foreach ($posts as $post) {
		echo "<a href='post.php?id=".$post['postId']."'>".$post['title']."</a><span style='float: right; font-size: 12px'>".$post['createdString']."</span>";
		echo "<br><hr><br>";
	}
}

function getPersonalPost($postId) {
		$getSpecificPersonalPost = dbQuery("SELECT * FROM personal_blog WHERE postId = :postId",
		array ("postId"=>$postId));
	return $getSpecificPersonalPost->fetch();
}

function viewPersonalPost($postId) {
	$post = getPersonalPost($postId);
	return $post;
	// echo "<div class='smallRight'>Posted: ".$post['createdString']."</div>";
	// echo "<p>".$post['body']."</p>";	
}