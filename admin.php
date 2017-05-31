<?php
include('config/init.php');
adminNavbar('Admin | Kelly Jung', "Admin", 'headerMain');
?>

<div class="main">
	<div class='blogPosts'>
		<?php listAdminPosts(); ?>
		</div>
	</div>
</div>

<?php footer(); ?>