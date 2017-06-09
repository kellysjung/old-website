<?php
include('config/init.php');
$username = $_SESSION['username'];
session_start();
verifyUser();
adminNavbar('Admin | Kelly Jung', "Admin", 'headerMain');

echo "
<div class='main'>
	<div class='blogPosts'>";
	echo "Welcome ".$username."<br><br>";
		listAdminPosts();
		echo "
		<br>
	</div>
	<form action='login/logout.php' method='POST'>
		<input class='defaultBtn' type='submit' name='logout' value='Logout'>
	</form>
</div>";

footer();