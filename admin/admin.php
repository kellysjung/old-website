<?php
include_once('config/init.php');

// LISTS ALL POSTS FOR ADMIN TO EDIT; USED IN blog-admin.php
function listAdminPosts($username) {
	$posts = dbQuery("
		SELECT * FROM blog_posts WHERE author = :username ORDER BY postId DESC",
		array("username"=>$username))->fetchAll();
	foreach ($posts as $post) {
		if ($post['draft'] == 0) {
			echo '<div class="hoverBox">
			<a href="edit-post.php?postId='.$post['postId'].' name="edit" type="button" class="fa fa-pencil"></a>
			<span class="hoverText">Edit Post</span></div>';
			echo '<div class="hoverBox">

			<a href="#" class="fa fa-trash" onclick="confirmDeletePost('.$post['postId'].')"></a>

			<span class="hoverText">Delete Post</span></div>';
			echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><br><br>';
		}
	}
}

// function listAdminDrafts() {
// 	$posts = dbQuery("SELECT * FROM blog_posts ORDER BY postId DESC")->fetchAll();
// 	foreach ($posts as $post) {
// 		if ($post['draft'] == 1) {
// 			echo '<div class="hoverBox"><a href="edit-post.php?postId='.$post['postId'].'" name="edit" type="button" class="fa fa-pencil"></a><span class="hoverText">Edit Draft</span></div>';
// 			echo '<div class="hoverBox"><a href="edit-post.php?postId='.$post['postId'].'" name="delete" type="button" class="fa fa-trash"></a><span class="hoverText">Delete Draft</span></div>';
// 			echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['title'].'</a><br><br>';
// 		}
// 	}
// }

// LISTS ALL TAGS FOR ADMIN TO EDIT; used in tags-admin.php
function listAdminTags() {
	$tags = dbQuery("
		SELECT * FROM tags ORDER BY tagId DESC")->fetchAll();
	echo '<ul class="tag-columns">';
	foreach($tags as $tag) {
		echo '<li><a href="#" name="delete" type="button" class="fa fa-trash" onclick="confirmDeleteTag('.$tag['tagId'].')"></a>';
		echo '<a href="view-tagged-posts.php?tagId='.$tag['tagId'].'">'.$tag['tagName'].'</a></li>';
	}
	echo '</ul>';
}

// LISTS TAGS ON A POST FOR ADMIN TO REMOVE; USED IN edit-tags.php
function listPostsTagsForEdit($postId) {
	$tags = dbQuery("
		SELECT * FROM tags
		INNER JOIN blogPost_tag_link ON blogPost_tag_link.tagId = tags.tagId
		INNER JOIN blog_posts ON blog_posts.postId=blogPost_tag_link.postId
		WHERE blog_posts.postId = :postId",
		array ("postId"=>$postId))->fetchAll();
	foreach ($tags as $tag) {
		echo '<a href="edit-post.php?postId='.$postId.'&tagId='.$tag['tagId'].'&removeTag=1" name="removeTag" type="button" class="fa fa-times"></a>';
		echo '<a href="view-tagged-posts.php?tagId='.$tag['tagId'].'">'.$tag['tagName'].'</a>';
	}
}

// RETURNS POST FOR EDIT; USED IN edit-post.php
function editPost($postId) {
	$editPost = dbQuery("
		SELECT * FROM blog_posts WHERE postId = :postId",
		array ("postId"=>$postId))->fetch();
	return $editPost;
}

// DROPDOWN MENU TO ADD A TAG ONTO A POST; USED IN edit-tags.php, new-post.php
function tagsDropdown() {
	$tags = dbQuery("SELECT * FROM tags")->fetchAll();
	echo "<select name='tagId'><option disabled selected value=''> -- No tag selected -- </option>";
	foreach ($tags as $tag) {
		echo "<option value='".$tag['tagId']."' name='blogPost_tag_link'>".$tag['tagName']."</option>";
	}
	echo "</select>";
}

// function postsDropdown() {
// 	$posts = dbQuery("SELECT * FROM blog_posts")->fetchAll();
// 	echo '<select name="posts"><option disabled selected value> -- Select Post -- </option>';
// 	foreach ($posts as $post) {
// 		echo '<option value="'.$post['postId'].'">'.$post['title'].'</option>';
// 	}
// 	echo '</select>';
// }

// DATE AND TIME FUNCTIONS
function getTimeCreated() {
	$dbCreated = date('Y-m-d H:i:s');
	return $dbCreated;
}
function getTimeCreatedString() {
	$dbTime = getTimeCreated();
	$viewCreated = date('n\/j\/y \a\t h:i A', strtotime($dbTime));
	return $viewCreated;
}
function returnDate() {
	return date("n\-j\-y");
}
function returnTime() {
	return date("h:i A");
}