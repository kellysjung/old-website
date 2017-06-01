<?php
include_once('config/init.php');

function tagsDropdown() {
	$tags = dbQuery("SELECT * FROM tags")->fetchAll();
	echo '<select name="tags"><option disabled selected value> -- Select Tag -- </option>';
	foreach ($tags as $tag) {
		echo '<option value="' . $tag['tagId'] . '">' . $tag['tagName'] . '</option>';
	}
	echo '</select>';
}

function postsDropdown() {
	$posts = dbQuery("SELECT * FROM blog_posts")->fetchAll();
	echo '<select name="posts"><option disabled selected value> -- Select Post -- </option>';
	foreach ($posts as $post) {
		echo '<option value="' . $post['postId'] . '">' . $post['title'] . '</option>';
	}
	echo '</select>';
}

function listPostsTags($postId) {
	$tags = dbQuery("SELECT * FROM tags INNER JOIN blogPost_tag_link ON blogPost_tag_link.tagId = tags.tagId INNER JOIN blog_posts ON blog_posts.postId=blogPost_tag_link.postId WHERE blog_posts.postId = :postId", array ("postId"=>$postId))->fetchAll();
	foreach ($tags as $tag) {
		echo ' #';
		echo $tag['tagName'];
	}
}