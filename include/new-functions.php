<?php
include_once('config/init.php');

// 
// POSTS
// 
function newgetPost($postId) {
	$post = dbQuery("SELECT * FROM posts WHERE postId = :postId",
		array("postId"=>$postId));
	return $post->fetch();
}

function newviewPost($postId) {
	$post = newgetPost($postId);
	echo "<h1>".$post['title']."<h2>";
}

// 
// FORMS
// 
function formInput($id, $type, $class, $length, $holder) {
	echo "<input id='$id' name='$id' type='$type' class='$class' maxlength='$length' placeholder='$holder' value='".(@$_REQUEST['$id'] ? $_REQUEST['$id'] : "")."'>";
	echo (@$errors['$id'] ? $errors['$id'] : "")."<br>";
}
function errorMsg($id) {

}

// .(@$errors['$id'] ? $errors['$id'] : "")."<br>"

function imageSlider() {
	
}