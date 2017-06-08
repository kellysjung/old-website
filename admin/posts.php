<?php
include_once('config/init.php');

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
	echo "<div class='smallText'>Posted: ".$specificPost['created']."</div>";
	echo "<p>".$specificPost['body']."</p>";	
}

// LISTS ALL THE POSTS REGARDLESS OF TAG; USED IN blog-posts.php
function listPosts() {
	$posts = dbQuery("
		SELECT * FROM blog_posts ORDER BY postId DESC")->fetchAll();
	foreach ($posts as $post) {
		if ($post['draft'] == 0) {
			echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><br><br>';
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
	echo '<hr><br>';
	if(!$comments) {
		echo "(No comments yet.)<hr><br>";
	}
	foreach ($comments as $comment) {
		echo '<div class="commentUserBox">'.$comment['commentUser'].
		// '<div class="datetime">'.$comment['commentCreated'].'</div>'.
		'</div><div class="commentBodyBox">'.$comment['commentBody'].
		'</div><br><hr>';
	}
}