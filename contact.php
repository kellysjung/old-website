<!DOCTYPE html>
<html>
<?php
include('config/init.php');
navbar('Contact | Kelly Jung','Contact Kelly');
?>
</div><br>
	<div class="main">
		<h2>Get in touch with me!</h2>
		
		<div class="container">
			<div class="contactInfo">
				<i class="fa fa-map-marker"></i><span style="display:inline-block; width: 8px;"></span> St. Louis, Missouri
				<br>
				<i class="fa fa-phone"></i><span style="display:inline-block; width: 2px;"></span> (314) 123 - 4567
				<br>
				<i class="fa fa-envelope"></i> kelly.jung@lessannoyingcrm.com
			</div>
			<!-- FORM IS NOT FUNCTIONAL -->
			<div class="contactForm">
				<input class="contactName" type="text" placeholder="Name" required name="Name"><br><br>
				<input class="contactEmail" type="text" placeholder="Email" required name="Email"><br><br>
				<input class="contactSubject" type="text" placeholder="Subject" required name="Subject"><br><br>
				<textarea class="contactComment" type="text" placeholder="Comment" required name="Comment"></textarea><br>
				<button class="contactButton" type="submit">Send Message</button>
			</div>
		</div>
		<a href="https://www.linkedin.com/in/kellysjung" target="_blank" class="fa fa-linkedin"></a>
		<a href="https://www.instagram.com/?hl=en" target="_blank" class="fa fa-instagram"></a>
		<a href="https://hatscripts.com/addskype/?kelly.jungg" target="_blank" class="fa fa-skype"></a>
	</div>
	<?php footer(); ?>
</body>
</html>