<?php
include('config/init.php');
adminNavbar('Admin Tags | Kelly Jung', "Admin Tags", 'headerMain');
?>

<div class='main'>
	<?php listAdminTags(); ?>
</div>

<?php
footer();
?>