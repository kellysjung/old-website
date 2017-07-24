<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();
adminNavbar('Edit Tags | KJ Blog');
$postId = $_REQUEST['postId'];
$post = getPost($postId);


if (isset($_REQUEST['exists'])) {
	$errors = array();

	if(!@$_REQUEST['tagId']) {
		$errors['tagId'] = "Please select a tag to add.";
	}
	if(sizeof($errors) == 0) {
		addExistingTag();
	}
}
if (isset($_REQUEST['new'])) {
	$errors = array();

	if(!@$_REQUEST['tagName']) {
		$errors['tagName'] = "Please add tag name.";
	}
	if(sizeof($errors) == 0) {
		addNewTag();
	}
}

echo "
<div class='main'>
	<div class='blogPosts'>";
		$post['title'];
		echo "</h4>
		<h3>Already tagged:</h3>";
		listPostsTagsForEdit($postId);
		echo "
		<hr>
		<h3>Add existing tag:</h3>
		<form action='' method='POST'>";
			tagsDropdown();
			echo "
			<input type='hidden' name='postId' value='".$postId."'>
			<br><br>
			<input class='defaultBtn' type='submit' name='exists' value='Add'>
		</form>
		<hr>
		<form action='' method='POST'>
			<h3>Add a new tag:</h3>
			<input type='hidden' name='postId' value='".$postId."'>
			<p>TAG NAME - Up to 250 characters.</p>
			<input name='tagName' type='text' maxlength='250' placeholder='New Tag' value='".(@$_REQUEST['tagName'] ? $_REQUEST['tagName'] : "")."'/>
			".(@$errors['tagName'] ? "<span class='error'>".$errors['tagName']."</span>" : "")."<br>
			<p>TAG DESCRIPTION - Short description of the tag. Can leave blank.</p>
			<input name='tagDescription' type='text' placeholder='New Tag Description'>
			<br><br>
			<input class='defaultBtn' type='submit' name='new' value='Create'>
		</form>
	</div>
</div>";
footer();

function addExistingTag() {
	$tagId = $_POST['tagId'];
	$postId = $_REQUEST['postId'];

	$checkExists = dbQuery("
		SELECT * FROM blogPost_tag_link WHERE postId = :postId AND tagId = :tagId",
		array("postId"=>$postId, "tagId"=>$tagId))->fetchAll();

	if (!$checkExists) {
		$addTag = dbQuery("
			INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)",
			array("postId"=>$postId, "tagId"=>$tagId));
	} else {
		echo "<span class='error'>Post already contains tag. Please choose a different one or click the<i class='fa fa-times'></i>to remove the tag.</span>";
	}
}

function addNewTag() {
	$postId = $_REQUEST['postId'];

	$checkExists = dbQuery("
		SELECT * FROM tags WHERE tagName = :tagName",
		array("tagName"=>$_POST['tagName']))->fetchAll();

	if (!$checkExists) {
		$newTag = dbQuery("
			INSERT INTO tags (tagName, tagDescription) VALUES (:tagName, :tagDescription)",
			array("tagName"=>$_POST['tagName'], "tagDescription"=>$_POST['tagDescription']));

		$getId = dbQuery("SELECT MAX(tagId) FROM tags")->fetchAll();

		$tagId = $getId[0]['MAX(tagId)'];
		$addTag = dbQuery("
			INSERT INTO blogPost_tag_link (postId, tagId) VALUES (:postId, :tagId)",
			array("postId"=>$postId, "tagId"=>$tagId));
	} else {
		echo "<span class='error'>Tag already exists. Please use the dropdown menu.</span>";
	}
}