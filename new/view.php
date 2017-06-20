<?php
include('config/init.php');
newHeader();

$postId = 1;
?>
<
<div class='med-break'><br></div><br>
<div class='main'>
	<div class='view'>
		<?php
		newviewPost($postId);
		?>
	</div>
</div>
<?php
newFooter();