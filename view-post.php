<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$specificPost = getPost($postId);

navbar($specificPost['tab'].' | Kelly Jung', $specificPost['title'], 'headerMain');

if(isset($_REQUEST['newCommentForm'])) {
	$errors = array();

	if(!@$_REQUEST['commentUser']) {
		$errors['commentUser'] = "Required";
	}
	if(!@$_REQUEST['commentBody']) {
		$errors['commentBody'] = "Required";
	}
	if(sizeof($errors) == 0) {
		addComment();
	} else {
		echo "<span class='error'>Please fill out required fields.</span>";
	}
}

echo "
<div class='main'>
	<div class='blogPosts'>";
	viewPost($postId);
	echo "
		<div class='smallText'>
			Tags:"; 
			listPostsTags($postId);
			echo "
		</div>
	</div>
</div>
<br>
<div class='main'>
	<h4 id='comments'>Comments</h4>
	<a href='view-post.php?postId=".$postId."#newcomment'><input class='defaultBtn' type='submit' value='+'></a>
	<div class='blogPosts'>";
		listComments($postId);
		echo "

		<br>
		<form class='defaultForm' action='' method='POST'>
			<input type='hidden' name='postId' value='".$postId."'>
			<input name='commentUser' maxlength='254' placeholder='Name' value='".(@$_REQUEST['commentUser'] ? $_REQUEST['commentUser'] : "")."'/><br>
			".(@$errors['commentUser'] ? "<span class='error'>".$errors['commentUser']."</span>" : "")."<br>

			<textarea class='defaultFormBody' name='commentBody' placeholder='Comment' value='".(@$_REQUEST['commentBody'] ? $_REQUEST['commentBody'] : "")."'></textarea>
			".(@$errors['commentBody'] ? "<span class='error'>".$errors['commentBody']."</span>" : "")."<br><br>
			<input type='email' name='commentEmail' placeholder='Email Address (Not Displayed)'><br><br>
			<input class='defaultBtn' name='newCommentForm' type='submit' value='Add Comment'>
		</form>
	</div>
</div>";
footer();

function addComment() {
	$postId = $_REQUEST['postId'];
	$created = getCommentCreated();

	$addComment = dbQuery(
		"INSERT INTO comments (postId, commentUser, commentEmail, commentBody, commentCreated)
		VALUES (:postId, :cUser, :cEmail, :cBody, :cCreated)",
		array("postId"=>$postId, "cUser"=>$_POST['commentUser'], "cEmail"=>$_POST['commentEmail'], "cBody"=>$_POST['commentBody'], "cCreated"=>$created));

	if ($addComment) {
		header('Location:view-post.php?postId='.$postId.'#comments');
	} else {
		echo "Error. Could not add comment. Please try again. <br>";
	}
	exit;
}