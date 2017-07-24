<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();
adminNavbar('Admin Tags | KJ Blog');

// $d = $_REQUEST['d'];

if (isset($_REQUEST['new'])) {
	$errors = array();

	if(!@$_REQUEST['tagName']) {
		$errors['tagName'] = "Please add tag name.";
	}
	if(sizeof($errors) == 0) {
		createNewTag();
	}
}
if (isset($_REQUEST['delete'])) {
	removeTag();
}

echo "
<div class='large-break'><br></div><br>
<div class='main'>  
	<div class='blogPosts'>";
		listAdminTags();
		echo "
	</div>
	<div class='blogPosts'>
		<form action='' method='POST'>
			<h3>Create a new tag:</h3>
			<p>TAG NAME - Up to 250 characters.</p>
			<input name='tagName' type='text' maxlength='250' placeholder='New Tag' alue='".(@$_REQUEST['tagName'] ? $_REQUEST['tagName'] : "")."'/>
			".(@$errors['tagName'] ? "<span class='error'>".$errors['tagName']."</span>" : "")."<br>
			<p>TAG DESCRIPTION - Short description of the tag. Can leave blank.</p>
			<input name='tagDescription' type='text' placeholder='New Tag Description'>
			<br><br>
			<input class='defaultBtn' type='submit' name='new' value='Create Tag'>
		</form>
	</div>
</div>";
footer();

function createNewTag() {
	$checkExists = dbQuery("
		SELECT * FROM tags WHERE tagName = :tagName",
		array("tagName"=>$_POST['tagName']))->fetchAll();

	if (!$checkExists) {
		$newTag = dbQuery("
			INSERT INTO tags (tagName, tagDescription) VALUES (:tagName, :tagDescription)",
			array("tagName"=>htmlspecialchars($_POST['tagName']), "tagDescription"=>htmlspecialchars($_POST['tagDescription'])));
	} else {
		echo "<span class='error'>Tag already exists.</span>";
	}
}