<?php
include('init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
verifyLogged();
adminNavbar('Drafts | KJ Blog');
?>
<div class='large-break'><br></div><br>
<div class="main">
	<div class='blogPosts'>
		<?php listAdminDrafts(); ?>
	</div>
</div>
</div>
<div class='large-break'><br></div>

<?php footer(); ?>