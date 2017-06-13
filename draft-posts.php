<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();
adminNavbar('Admin | Kelly Jung', "Admin", 'headerMain');
?>

<div class="main">
	<div class='blogPosts'>
		<?php listAdminDrafts(); ?>
		</div>
	</div>
</div>

<?php footer(); ?>