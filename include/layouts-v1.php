<?php

function navbar_v1($title, $h1, $headerClass) {
	echo "
	<html>
	<head>
		<title>$title</title>
		<link rel='stylesheet' href='/css/style.css?Time=".microtime()."'/>
		<link rel='stylesheet' href='/css/class.css?Time=".microtime()."'/>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto:100' rel='stylesheet'>		
		
		<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js'></script>

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

		<a href='#' class='scrollToTop'><i class='fa fa-arrow-up'></i></a>
		";
	}

	function adminnavbar_v1($title, $h1, $headerClass) {
		echo "
		<html>
		<head>
			<title>$title</title>
			<link rel='stylesheet' href='/css/style.css?Time=".microtime()."'/>
			<link rel='stylesheet' href='/css/class.css?Time=".microtime()."'/>
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Roboto:100' rel='stylesheet'>
			
			<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>

			<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
			<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js'></script>

		</head>
		<body>
			<div class='$headerClass'><h1>$h1</h1>
				<div class='nav'>
					<a href='index.php'>PUBLIC HOME</a> /
					<a href='new-post.php'>NEW POST</a> /
					<a href='blog-admin.php'>POSTS</a> /
					<a href='task-list.php'>TASKS</a> /
					<a href='tags-admin.php'>TAGS</a>
				</div>
			</div><br>
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

			<a href='#' class='scrollToTop'><i class='fa fa-arrow-up'></i></a>
			";
		}

		function footer_v1() {
					// echo "
					// <button onclick='backToTop()'' class='scrollBtn'><i class='fa fa-arrow-up'></i></button>
					// ";
			echo "
			<br>
			<br>
			<footer> - LACRM Coding Bootcamp - 2017 - </footer>
		</body>
		</html>
		";
	}