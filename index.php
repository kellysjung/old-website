<?php
include('config/init.php');
navbar('Home | Kelly Jung', "Kelly Jung", 'headerMain');
?>
<div class="main">
	<p>Welcome and thanks for visiting my site. Here, you can find out a little more information about me, read some of my blog posts, and view my projects.</p>
</div>
<div class="container">
	<a href="about-me.php" class="links">
		<div class="homeAboutBox"> 
			<h3>About Me</h3>
			<p>I'm an undergraduate student at Washington University in St. Louis.</p>
		</div>
	</a>
	<a href="contact.php" class="links">
		<div class="homeContactBox">
			<h3>Contact Me</h3>
			<p>If you have any comments or questions, don't hesitate to contact me!</p>
		</div>
	</a>
</div>
<?php 

footer(); ?>