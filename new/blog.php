<?php
include('config/init.php');
newHeader('Blog');
?>
<div class='large-break'><br></div><br>
<div class='main'>
	<?php
		listCities();
	?>
</div>
<?php
newFooter();