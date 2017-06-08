<?php
function debug($input) {
	echo "<pre>".$input."</pre";
}

function navbar($title, $h1, $headerClass) {
	echo "
	<html>
	<head>
		<title>$title</title>
		<link rel='stylesheet' href='/style/style.css?Time=".microtime()."'/>
		<link rel='stylesheet' href='/style/class.css?Time=".microtime()."'/>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto:100' rel='stylesheet'>
	</head>
	<body>
		<div class='$headerClass'><h1>$h1</h1>
			<div class='social-nav'>
				<a href='https://www.linkedin.com/in/kellysjung' target='_blank' class='fa fa-linkedin'></a>
				<a href='skype:kelly.jungg?userinfo' target='_blank' class='fa fa-skype'></a>
				<a href='https://bitbucket.org/kellyjung/' target='_blank' class='fa fa-bitbucket' aria-hidden='true'></a>
				<a href='https://github.com/kelly-jung' target='_blank' class='fa fa-github' aria-hidden='true'></a>
			</div>
			<div class='nav'>
				<a href='/index.php'>HOME</a> /
				<a href='/blog-posts.php'>POSTS</a> /
				<a href='/about-me.php'>ABOUT</a> /
				<a href='/contact.php'>CONTACT</a> /
				<a href='/login/login.php'>LOGIN</a>
			</div>
		</div><br>
		";
	}

	function adminNavbar($title, $h1, $headerClass) {
		echo "
		<html>
		<head>
			<title>$title</title>
			<link rel='stylesheet' href='/style/style.css?Time=".microtime()."'/>
			<link rel='stylesheet' href='/style/class.css?Time=".microtime()."'/>
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto:100' rel='stylesheet'>
		</head>
		<body>
			<div class='$headerClass'><h1>$h1</h1>
				<div class='nav'>
					<a href='index.php'>PUBLIC HOME</a> /
					<a href='new-post.php'>NEW POST</a> /
					<a href='admin-page.php'>POSTS</a> /
					<a href='draft-posts.php'>DRAFTS</a> /
					<a href='admin-view-tags.php'>TAGS</a>
				</div>
			</div><br>
			";
		}

		function footer() {
			echo "
			<br>
			<div class='hoverBox'>
				<a href='#' class='fa fa-arrow-up'></a>
				<span class='hoverText'>Back To Top</span>
			</div>
			<br>
			<footer>LACRM Coding Bootcamp - 2017</footer>
		</body>
		</html>
		";
	}
//<a href='https://www.instagram.com/?hl=en' target='_blank' class='fa fa-instagram'></a>