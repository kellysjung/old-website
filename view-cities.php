<?php
include('init.php');
navbar('Blog');
$cityId = $_REQUEST['cityId'];
?>

<div class='med-break'><br></div><br>
<div class='main'>
	<div class='view'>
		<?php
		viewCity($cityId);
		?>
	</div>
</div>
<?php
footer();