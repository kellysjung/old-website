<?php
function navbar($title, $h1) {
	echo "
	<head>
		<title>".$title."</title>
		<link rel='stylesheet' href='style.css?Time=".microtime()."'/>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	</head>
	<body>
		<header>".$h1."</header>
		<div class='nav'>
			<a href='index.php'>Home</a>
			<a href='about-me.php'>About Me</a>
			<a href='blog-posts.php'>Posts</a>
			<a href='projects.php'>Projects</a>
			<a href='contact.php'>Contact</a> 
		</div><br>
		";
	}

function footer() {
	echo "
	<br>
	<footer>LACRM Coding Bootcamp - 2017</footer>
	";
}