<?php
include('config/init.php');
navbar('Contact | Kelly Jung', 'GET IN TOUCH', 'headerMain');
?>
<div class="main">
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
			<textarea class="contactMsg" type="text" placeholder="Message" required name="Message"></textarea><br><br>
			<button class="contactButton" type="submit">Send Message</button>
		</div>
	</div>
		<!-- <a href="https://www.linkedin.com/in/kellysjung" target="_blank" class="fa fa-linkedin"></a>
		<a href="https://www.instagram.com/?hl=en" target="_blank" class="fa fa-instagram"></a>
		<a href="https://hatscripts.com/addskype/?kelly.jungg" target="_blank" class="fa fa-skype"></a> -->
	</div>
	<?php footer(); ?>