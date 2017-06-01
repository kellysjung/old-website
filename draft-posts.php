<?php
include('config/init.php');
adminNavbar('Admin | Kelly Jung', "Admin", 'headerMain');
?>

<div class="main">
	<div class='blogPosts'>
		<?php listAdminDrafts(); ?>
		</div>
	</div>
</div>

<?php footer(); ?>