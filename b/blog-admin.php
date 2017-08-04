<?php
include('init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
$username = $user['username'];
verifyLogged();

navbar('Blog App');
echo "<div class='large-break'><br></div><br><hr>";
phpProjectsNavbar();

echo "
<div class='main'>
	<div class='blogPosts'>";
		echo "<div class='smallRight'> Welcome ".$user['firstName']."</div><br><br>";
		listAdminPosts($username);
		echo "
		<br>
		<form action='/login/logout.php' method='POST'>
			<input class='defaultBtn' type='submit' name='logout' value='Logout' style='width: 150px;'>
		</form>
	</div>
</div>
<div class='large-break'><br></div>";

footer();