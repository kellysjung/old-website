<?php
function navbar($title) {
	echo "
	<html>
	<head>
		<title>$title | Kelly Jung</title>";
		echo "<link rel='stylesheet' type='text/css' href='/css/square-hover.css'/>";
		echo "<link rel='stylesheet' href='/css/new.css?Time=".microtime()."'/>";
		echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link href='https://fonts.googleapis.com/css?family=Pacifico|Rubik' rel='stylesheet'>
		<link href='https://fonts.googleapis.com/css?family=Lato:100i|Roboto:100' rel='stylesheet'>

		<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js'></script>
		<script src = 'https://code.jquery.com/ui/1.10.4/jquery-ui.js'></script>

		<script src='/js/customColorPicker.js' type='text/javascript'></script>

	</head>
	<body>
		<div class='header'>
			<div class='header-logo'>
				<a href='/index.php' title='Home'>kj</a>
			</div>

			<div class='nav'>
				<a href='/about.php'>ABOUT</a> /
				<a href='/blog.php'>BLOG</a> /
				<a href='/projects.php'>PROJECTS</a> /
				<a href='/contact.php'>CONTACT</a><span style='display: inline-block; width: 16px;''></span>
			</div>
		</div>
		";
	}

	function adminNavbar($title) {
		echo "
		<html>
		<head>
			<title>$title</title>";
			echo "<link rel='stylesheet' type='text/css' href='/css/square-hover.css'/>";
			echo "<link rel='stylesheet' href='/css/new.css?Time=".microtime()."'/>";
			echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
			<link href='https://fonts.googleapis.com/css?family=Pacifico|Rubik' rel='stylesheet'>
			<link href='https://fonts.googleapis.com/css?family=Lato:100i|Roboto:100' rel='stylesheet'>

			<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
			<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js'></script>
			<script src = 'https://code.jquery.com/ui/1.10.4/jquery-ui.js'></script>
			<script src='/js/customColorPicker.js' type='text/javascript'></script>
		</head>
		<body>
			<div class='header'>
				<div class='header-logo'>
					<a href='/index.php'>kj</a>
				</div>

				<div class='nav'>
					<a href='/projects.php'>PROJECTS</a> /
					<a href='/b/blog-posts.php'>BLOG APP</a> /
					<a href='/b/new-post.php'>NEW POST</a> /
					<a href='/b/blog-admin.php'>YOUR POSTS</a> /
					<a href='/b/tags-admin.php'>YOUR TAGS</a> /
					<a href='/t/task-list.php'>TASK LIST</a>
				</div>
			</div>

			";
		}



		function footer() {
			echo"
		</body>
		<div class='footer'>
			<div class='social-nav'>
				<a href='https://www.linkedin.com/in/kellysjung' target='_blank' class='fa fa-linkedin'></a>
				<a href='skype:kelly.jungg?userinfo' target='_blank' class='fa fa-skype'></a>
				<a href='https://bitbucket.org/kellyjung/' target='_blank' class='fa fa-bitbucket' aria-hidden='true'></a>
				<a href='https://github.com/kelly-jung' target='_blank' class='fa fa-github' aria-hidden='true'></a>
			</div>
			<p>Kelly Jung - LACRM Coding Fellowship - 2017</p>
		</div>
		</html>
		";
	}



	function testHeader() {
		echo "
		<html>
		<head>
			<link rel='stylesheet' href='/css/style.css?Time=".microtime()."'/>
			<link rel='stylesheet' href='/css/class.css?Time=".microtime()."'/>
			<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
			<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js'></script>
			<script src = 'https://code.jquery.com/ui/1.10.4/jquery-ui.js'></script>

			<script src='js/customColorPicker.js' type='text/javascript'></script>
		</head>
		<body>
			<div class='nav' style='background: lightblue'>
				<a href='index.php'>PUBLIC HOME</a> /
				<a href='new-post.php'>NEW POST</a> /
				<a href='blog-admin.php'>POSTS</a> /
				<a href='task-list.php'>TASKS</a> /
				<a href='tags-admin.php'>TAGS</a>
			</div>
			<script type='text/javascript'>
				$(document).ready(function(){
					$(window).scroll(function(){
						if ($(this).scrollTop() > 100) {
							$('.scrollToTop').fadeIn();
						} else {
							$('.scrollToTop').fadeOut();
						}
					});
					$('.scrollToTop').click(function(){
						$('html, body').animate({scrollTop : 0}, 300);
						return false;
					});

				});
			</script>

			<a href='#' class='scrollToTop'><i class='fa fa-arrow-up'></i></a>";
		}

		function testFooter() {
			echo "
		</body>
		</html>
		";
	}
