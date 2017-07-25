<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();
navbar('New Post');
echo "<div class='large-break'><br></div><br><hr>";
phpProjectsNavbar();

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
		addPost($user['username']);
	} else {
		echo "<span class='error'>Please fill out required fields.</span>";
	}
}

echo "
<div class='large-break'><br></div><br>
<div class='main'>
	<div class='blogPosts'>
		<h3>Create a new post:</h3>
		<form class='postForm' action='' autocomplete='off' method='POST'>
			TITLE - This will be part header image. (Character limit: 250)<br>";
			echo "<input type='hidden' name='userId' value='".$userId."'>";
			formTextInput('title', 'text', '250', 'Post Title');
			echo "TAB - This will be part of the tab title. (Character limit: 24)<br>";
			formTextInput('tab', 'text', '24', 'Tab Title');
			echo "BODY - Remember to put in '&lt;p&gt&lt;/p&gt' whenever you want a new paragraph.";
			formTextArea('postFormBody', 'body', 'Post Body');

			echo "<br><hr><h3>Add tag:</h3>";
			tagsDropdown();
			echo "<br><br><h3>Add a new tag:</h3>
			TAG NAME - Up to 250 characters.<br>";
			formTextInput('newTagName', 'text', '250', 'New Tag');
			echo"TAG DESCRIPTION - Short description of the tag. Can leave blank.<br>";
			formTextInput('newTagDescription', 'text', '1000', 'New Tag Description');
			inputBtn('defaultBtn', 'newPostForm', 'Publish Post');
			echo "</form>
		</div>
	</div>";
	footer();

	function addPost($user) {
		$created = getTimeCreated();
		$createdString = getTimeCreatedString();
		$draft = 0;

		$addPost = dbQuery("
			INSERT INTO blog_posts (author, tab, title, body, created, createdString, draft)
			VALUES (:author, :tab, :title, :body, :created, :createdString, :draft)",
			array("author"=>$user, "tab"=>htmlspecialchars($_POST['tab']), "title"=>htmlspecialchars($_POST['title']), "body"=>htmlspecialchars($_POST['body']), "created"=>$created, "createdString"=>$createdString, "draft"=>$draft)
			);

		$getId = dbQuery("SELECT MAX(postId) FROM blog_posts")->fetchAll(); 
		$postId = $getId[0]['MAX(postId)'];

		if ($_POST['newTagName'] != '') {
			$newTag = dbQuery("
				INSERT INTO tags (tagName, tagDescription)
				VALUES (:tagName, :tagDescription)",
				array("tagName"=>htmlspecialchars($_POST['newTagName']), "tagDescription"=>htmlspecialchars($_POST['newTagDescription']))
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