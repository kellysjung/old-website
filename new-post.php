<?php
include('config/init.php');
adminNavbar('New Post | Kelly Jung', "New Post", 'headerMain');

if (isset($_REQUEST['newPostForm'])) {
	$errors = array();

	if(!@$_REQUEST['title']) {
		$errors['title'] = "Required";
	}
	if(!@$_REQUEST['tab']) {
		$errors['tab'] = "Required";
	}
	if(!@$_REQUEST['body']) {
		$errors['body'] = "Required";
	}
	if(sizeof($errors) == 0) {
		addPost();
	} else {
		echo "<span class='error'>Please fill out required fields.</span>";
	}
}

// $postConfirm = "";
// if (isset($_REQUEST['newPostId'])){
// 	// $postConfirm = "<div class='blogPosts'>New post successfully added!
// 	// <a href='view-post.php?postId='".$newPostId."'>View Now</a></div>";
// 	$postConfirm = "<div class='blogPosts'>New post successfully added!
// 	<a href='admin-page.php'>click</a></div>";
// }


// 	<input name='title' type='text' maxlength='250' placeholder='Post Title' value='".(@$_REQUEST['title'] ? $_REQUEST['title'] : "")."'/>
// echo "
// <div class='main'>
// 	<div class='blogPosts'>
// 		<h3>Create a new post:</h3>
// 		<form class='postForm' action='' method='POST'>
// 			TITLE - This will be part header image. (Character limit: 250)<br>
// 			<input name='title' type='text' maxlength='250' placeholder='Post Title' value='".(@$_REQUEST['title'] ? $_REQUEST['title'] : "")."'/>
// 			".(@$errors['title'] ? "<span class='error'>".$errors['title']."</span>" : "")."<br>

// 			TAB - This will be part of the tab title. (Character limit: 24)<br>
// 			<input name='tab' type='text' maxlength='24' placeholder='Tab Title' value='".(@$_REQUEST['tab'] ? $_REQUEST['tab'] : "")."'>
// 			".(@$errors['tab'] ? "<span class='error'>".$errors['tab']."</span>" : "")."<br>

// 			BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.
// 			<textarea class='postFormBody' name='body' placeholder='Post Body' value='".(@$_REQUEST['body'] ? $_REQUEST['body'] : "")."'></textarea>
// 			".(@$errors['body'] ? "<span class='error'>".$errors['body']."</span>" : "")."<br>";

// 			echo "		
// 			<br><hr>
// 			<h3>Add tag:</h3>";
// 			tagsDropdown();
// 			echo "
// 			<br><br>
// 			<h3>Add a new tag:</h3>
// 			TAG NAME - Up to 250 characters.<br>
// 			<input name='newTagName' type='text' maxlength='250' placeholder='New Tag'><br>
// 			TAG DESCRIPTION - Short description of the tag. Can leave blank.<br>
// 			<input name='newTagDescription' type='text' placeholder='New Tag Description'>
// 			<br><br>
// 			<input class='defaultBtn' name='newPostForm' type='submit' value='Publish Post'>
// 		</form>
// 	</div>
// </div>";

echo "
<div class='main'>
	<div class='blogPosts'>
		<h3>Create a new post:</h3>
		<form class='postForm' action='' method='POST'>
			TITLE - This will be part header image. (Character limit: 250)<br>";
			echo formTextInput('title', 'text', '250', 'Post Title');
			echo "TAB - This will be part of the tab title. (Character limit: 24)<br>";
			echo formTextInput('tab', 'text', '24', 'Tab Title');
			echo "BODY - Remember to put in '< p >< / p >' whenever you want a new paragraph.";
			echo formTextarea('postFormBody', 'body', 'Post Body');

			echo "<br><hr><h3>Add tag:</h3>";
			tagsDropdown();
			echo "<br><br><h3>Add a new tag:</h3>
			TAG NAME - Up to 250 characters.<br>";
			echo formTextInput('newTagName', 'text', '250', 'New Tag');
			echo"TAG DESCRIPTION - Short description of the tag. Can leave blank.<br>";
			echo formTextInput('newTagDescription', 'text', '', 'New Tag Description');
			echo inputBtn('defaultBtn', 'newPostForm', 'submit', 'Publish Post');
			echo "
		</form>
	</div>
</div>";
footer();

function addPost() {
	$created = getPostCreated();
	$draft = 0;

	$addPost = dbQuery("
		INSERT INTO blog_posts (tab, title, body, created, draft)
		VALUES (:tab, :title, :body, :created, :draft)",
		array("tab"=>$_POST['tab'], "title"=>$_POST['title'], "body"=>$_POST['body'], "created"=>$created, "draft"=>$draft)
		);

	$getId = dbQuery("SELECT MAX(postId) FROM blog_posts")->fetchAll(); 
	$postId = $getId[0]['MAX(postId)'];

	if ($_POST['newTagName'] != '') {
		$newTag = dbQuery("
			INSERT INTO tags (tagName, tagDescription)
			VALUES (:tagName, :tagDescription)",
			array("tagName"=>$_POST['newTagName'], "tagDescription"=>$_POST['newTagDescription'])
			);

		$getId = dbQuery("SELECT MAX(tagId) FROM tags")->fetchAll();
		$tagId = $getId[0]['MAX(tagId)'];

		$addTag = dbQuery("
			INSERT INTO blogPost_tag_link (postId, tagId)
			VALUES (:postId, :tagId)",
			array("postId"=>$postId, "tagId"=>$tagId)
			);
	}
	if (isset($_POST['tagId'])) {
		$tagId = $_POST['tagId'];
		$addTag = dbQuery("
			INSERT INTO blogPost_tag_link (postId, tagId)
			VALUES (:postId, :tagId)",
			array("postId"=>$postId, "tagId"=>$tagId)
			);
	}
	header('Location:view-post.php?postId='.$postId);
}