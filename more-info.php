<!DOCTYPE html>
<html>
<head>
	<title>Kelly's Site</title>
	<link rel="stylesheet" href="style.css?Time=<?php echo microtime()?>"/>
</head>
<body>
	<header align="center">About Me</header>
	<div class="nav">
		<a href="index.php">Home</a>
		<a href="more-info.php">About Me</a>
		<a href="blog-posts.php">Posts</a>
		<a href="projects.php">Projects</a>
		<a href="contact.php">Contact</a>
	</div><br>
	<div class="main">
		<p>Here is some basic information about me.</p>
		<table style="width:50%; text-align: left">
			<tr>
				<th>Full Name</th>
				<th>Birthday</th>
				<th>Hometown</th>
				<th>Major</th>
			</tr>
			<tr>
				<td>Kelly Jung</td>
				<td>May 8th</td>
				<td>Jericho, NY</td>
				<td>Psychology</td>
			</tr>
		</table>
		<br>

		<img class="default" src="kelly-pic.png" alt="Picture of Kelly">
		<br>
		<a href="https://www.linkedin.com/in/kellysjung"><img src="LinkedIn-icon.png" alt="LinkedIn" style="height: 33px; width: 33px"></a>
		<a href="https://www.instagram.com/?hl=en"><img src="Instagram-icon.jpg" alt="Instagram" style="height: 37px; width: 37px"></a>
	</div>
	<br>
	<footer>LACRM Coding Bootcamp - 2017</footer>
</body>
</html>