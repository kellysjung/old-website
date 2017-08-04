<?php
include('init.php');
// include('init.php');
navbar('Contact');
?>
<div class='large-break'><br></div><br>
<div class='main'>
	<div id='contact-container center'>
		<div class='contact-left-column'>
			<p>Email</p>
			<p>Phone</p>
			<p>LinkedIn</p>
		</div>
		<div class='middle-column'></div>
		<div class='contact-right-column'>
			<p>kellyjung@wustl.edu</p>
			<p>(516) 350 - 0009</p>
			<p>linkedin.com/in/kellysjung</p>
		</div>
	</div>	
</div>
<div class='large-break'><br></div>
<?php
footer();

function sendEmail() {
	$to = 'kelly.jung@lessannoyingcrm.com';
	$firstName = htmlspecialchars($_POST['firstName']);
	$lastName = htmlspecialchars($_POST['lastName']);
	$from = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);

	$headers = 'From: '.$firstName.' '.$lastName.', '.$from;

	$send =	mail($to, $subject, $message, $from, $headers);

	if ($send) {
		echo "<script type='text/javascript'>alert('Message sent!');</script>";
	}
}

// <div class='contact-form'>
// 				<form action='' method='post'>
// 					<div class='field-form'><label class='largeLabel'>Name *</label><br>
// 						<input class='shortInput' type='text' name='firstName' id='firstName'><br>
// 						<div class='small-break'><br></div>
// 						<label class='smallLabel' for='firstName'>First</label>
// 					</div>
// 					<div class='field-form'>
// 						<pre>     </pre>
// 					</div>
// 					<div class='field-form'>
// 						<div class='med-break'><br></div>
// 						<input class='shortInput' type='text' name='lastName' id='lastName'><br>
// 						<div class='small-break'><br></div>
// 						<label class='smallLabel' for='lastName'>Last</label><br>
// 					</div>

// 					<label class='largeLabel'>Name *</label><br>
// 					<input class='longInput' type='text' name='firstName' id='firstName'><br>

// 					<div class='med-break'><br></div>
// 					<label class='largeLabel' for='email'>Email Address *</label><br>
// 					<input class='longInput' type='email' name='email' id='email'><br>

// 					<div class='med-break'><br></div>
// 					<label class='largeLabel' for='subject'>Subject *</label><br>
// 					<input class='longInput' type='text' name='subject' id='subject'><br>

// 					<div class='med-break'><br></div>
// 					<label class='largeLabel' for='message'>Message *</label><br>
// 					<textarea class='longInput' name='message' id='message' rows='7'></textarea>

// 					<div class='med-break'><br></div>
// 					<button class='submitBtn' align='center'><span>Send Message </span></button>
// 				</form>
// 			</div>