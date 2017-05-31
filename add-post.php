<?php
include_once('config/init.php');

$link = mysqli_connect('localhost', 'cf', 'password', 'cf');

$tab = mysql_real_escape_string($_POST['tab']);
$title = mysql_real_escape_string($_POST['title']);
$body = mysql_real_escape_string($_POST['body']);
// $datetime = returnDateTime();
$date = returnDate();
$time = returnTime();

$addPost = "INSERT INTO blog_posts (tab, title, body, createdDate, createdTime) VALUES ('$tab', '$title', '$body', '$date', '$time')";

if (mysqli_query($link, $addPost)) {
	echo "<script type='text/javascript'>alert('Blog post added.');</script>";
	// header('Location:view-post.php?postId='.$postId);
} else {
	echo "Error. Could not add post. Please try again. <br>" . mysqli_error($link);
}
exit;