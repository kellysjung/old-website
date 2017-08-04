<?php
include('init.php');
navbar('Contact | Kelly Jung', 'Get in Touch', 'headerMain');

if (isset($_REQUEST['msg'])) {
	$errors = array();

	if (!@$_REQUEST['msgName']) {
		$errors['msgName'] = "Required";
	}
	if (!@$_REQUEST['msgEmail']) {
		$errors['msgEmail'] = "Required";
	}
	if (sizeof($errors) == 0) {
		email();
	} else {
		echo "<span class='error'>Please fill out required fields.</span>";
	}
}

?>
<div class="main">
	<div class="container">
		<div class="contactInfo">
			<i class="fa fa-map-marker"></i><span style="display:inline-block; width: 8px;"></span> St. Louis, Missouri<br>
			<i class="fa fa-phone"></i><span style="display:inline-block; width: 2px;"></span> (314) 123 - 4567<br>
			<i class="fa fa-envelope"></i> kelly.jung@lessannoyingcrm.com
		</div>
		<form class="defaultForm" action="" method="POST">
			<?php
			formTextInput('msgName', 'text', '250', 'Your Name');
			formTextInput('msgEmail', 'email', '', 'Email Address');
			formTextInput('msgSubject', 'text', '250', 'Subject');
			formTextArea('defaultFormBody', 'msgBody', 'Message');
			inputBtn('defaultBtn', 'msg', 'Send Message');
			?>
		</form>
	</div>
</div>
<?php footer();

function email() {
	echo "here";
}