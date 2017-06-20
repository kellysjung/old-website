<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
$username = $user['username'];
verifyLogged();

adminNavbar('Admin | Kelly Jung', "Admin", 'headerMain');

echo "
<div class='main'>
	<div class='blogPosts'>";
	echo "<div class='smallRight'> Welcome ".$user['firstName']."</div><br><br>";
		listAdminPosts($username);
		echo "
		<br>
	</div>
	<form action='login/logout.php' method='POST'>
		<input class='defaultBtn' type='submit' name='logout' value='Logout'>
	</form>
</div>";

footer();