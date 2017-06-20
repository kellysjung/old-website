<?php
include('config/init.php');
$postId = 6;
echo "<link rel='stylesheet' href='/css/style.css?Time=".microtime()."'/>
<link rel='stylesheet' href='/css/class.css?Time=".microtime()."'/>";

// echo "
// <form class='defaultForm' action='' method='POST'>
// 	<input type='hidden' name='postId' value='".$postId."'>";
// 	formTextInput('commentUser', 'text', '100', 'Name');
// 	formTextArea('defaultFormBody', 'commentBody', 'Comment');
// 	formTextInput("commentEmail", 'email', '', 'Email Address (Not Displayed)');
// 	inputBtn('defaultBtn', 'newCommentForm', 'Add Comment');
// 	echo "
// </form><br><hr>";
?>
<script type="text/javascript">

	function addComment() {
		var name = document.getElementById('name').value;
		var body = document.getElementById('body').value;
		var email = document.getElementById('email').value;

		document.getElementById('comment').innerHTML = name;
		console.log(name);
	}

	// document.getElementById('btn').addEventListener(addComment);
</script>

<form class='defaultForm' action='' method='POST' onsubmit='addComment(); return false;'>
	<input type='text' name='commentUser', maxlength='100' placeholder='Name' id='name'><br>
	<textarea class ='defaultFormBody' name='commentBody' placeholder='Commment' id='body'></textarea><br>
	<input type='text' name='commentEmail', maxlength='' placeholder='Email Address' id='email'><br>
	<input type='submit' name='newComment' class='defaultBtn' value='Add Comment' id='btn'><br><hr>
</form>

<span id='comment'></span>


