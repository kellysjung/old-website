<?php
function getArray() {
	$posts = array(
	array(
		"postId"=>0,
		"postHead"=>"Weather",
		"postTitle"=>"My Thoughts on Weather",
		"postBody"=>"<p>I don't like it when it's too hot. I also don't like it when it's too cold. St. Louis weather is pretty nice, expect during the summer when it gets really humid.</p>"
		),
	array(
		"postId"=>1,
		"postHead"=>"Bootcamp",
		"postTitle"=>"Bootcamp So Far",
		"postBody"=>"<p>Today is the third day of bootcamp. So far, we learned how the internet works, how to use HTML, how to style with CSS, and how to make our site live on our local machines.</p>
		<p>We've discussed with Tyler some ideas on our web project, and later today we'll be learning about PHP, which is the language that LACRM uses.</p>"
		),
	array(
		"postId"=>2,
		"postHead"=>"Test",
		"postTitle"=>"Test Post Title",
		"postBody"=>"<p>This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post. This is a test body post.</p>"
		)
	);
	return $posts;
}

function getPosts() {
	$posts = getArray();
	for ($i = 0; $i < count($posts); $i++) {
		$postId = $posts[$i]['postId'];
		$postTitle = $posts[$i]['postTitle'];
		echo '<a href="view-post.php?postId='.$postId.'">'.$postTitle.'</a><hr>';
	};
}

function viewPost() {
	$posts = getArray();
	$postId = $_REQUEST['postId'];
	$postHead = $posts[$postId]['postHead'];
	$postTitle = $posts[$postId]['postTitle'];
	$postBody = $posts[$postId]['postBody'];

	navbar($postHead.' | Kelly Jung', $postTitle);
	echo '<div class="main">'.$postBody.'</div>'
	;	
}