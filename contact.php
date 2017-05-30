<?php
include('config/init.php');
navbar('Contact | Kelly Jung', 'Get in Touch', 'headerMain');
?>
<div class="main">
	<div class="container">
		<div class="contactInfo">
			<i class="fa fa-map-marker"></i><span style="display:inline-block; width: 8px;"></span> St. Louis, Missouri<br>
			<i class="fa fa-phone"></i><span style="display:inline-block; width: 2px;"></span> (314) 123 - 4567<br>
			<i class="fa fa-envelope"></i> kelly.jung@lessannoyingcrm.com
		</div>

		<div class="contactForm">
			<form action="mailto:kellyjung96@gmail.com" method="POST" enctype="text/plain">
				<input type="text" placeholder="Name" required name="Name"><br><br>
				<input type="text" placeholder="Email Address" required name="Email"><br><br>
				<input type="text" placeholder="Subject" required name="Subject"><br><br>
				<textarea class="contactMsg" type="text" placeholder="Message" required name="Message"></textarea><br><br>
				<input class='commentBtn' type="submit" value="Send Email">
			</form>
		</div>
	</div>
</div>
<?php footer(); ?>