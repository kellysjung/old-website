<?php
function getPostsArray() {
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
			),
		array(
			"postId"=>3,
			"postHead"=>"Lorem Ipsum",
			"postTitle"=>"Lorem Ipsum",
			"postBody"=>"
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>"
			)
);
return $posts;
}

function getPost($postId) {
	$posts = getPostsArray();
	$specificPost = $posts[$postId];
	return $specificPost;
}

function listPosts() {
	$posts = getPostsArray();
	foreach ($posts as $post) {
		echo '<a href="view-post.php?postId='.$post['postId'].'">'.$post['postTitle'].'</a><hr>';
	};
}

function viewPost($postId) {
	$specificPost = getPost($postId);
	echo '<div class="main">'.$specificPost['postBody'].'</div>'
	;	
}