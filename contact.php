<!DOCTYPE html>
<html>
<head>
	<title>Kelly's Site</title>
	<link rel="stylesheet" href="style.css?Time=<?php echo microtime()?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header align="center">Contact Kelly</header>
	<div class="nav">
		<a href="index.php">Home</a>
		<a href="more-info.php">About Me</a>
		<a href="blog-posts.php">Posts</a>
		<a href="projects.php">Projects</a>
		<a href="contact.php">Contact</a>
	</div><br>
	<div class="main">
		<h2>Get in touch with me!</h2>
		
		<div class="container">
			<div class="contactInfo">
				<i class="fa fa-map-marker" style="font-size:24px"></i><span style="display:inline-block; width: 9px;"></span> St. Louis, Missouri
				<br>
				<i class="fa fa-phone" style="font-size:26px"></i><span style="display:inline-block; width: 2px;"></span> (314) 123 - 4567
				<br>
				<i class="fa fa-envelope" style="font-size:24px"></i> kelly.jung@lessannoyingcrm.com
			</div>
			<!-- FORM IS NOT FUNCTIONAL -->
			<div class="contactForm">
				<input class="contactName" type="text" placeholder="Name" required name="Name" style="width: 300px;"><br>
				<input class="contactEmail" type="text" placeholder="Email" required name="Email" style="width: 300px;"><br>
				<input class="cntactSubject" type="text" placeholder="Subject" required name="Subject" style="width: 300px;"><br>
				<textarea class="contactComment" type="text" placeholder="Comment" required name="Comment" style="width: 300px;"></textarea><br>
				<button class="contactButton" type="submit"><i class="fa fa-paper-plane"></i> Send Message</button>
			</div>
		</div>
	</div>
	<br>
	<footer>LACRM Coding Bootcamp - 2017</footer>
</body>
</html>