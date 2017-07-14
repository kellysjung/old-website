<?php
include('config/init.php');
newHeader('Contact');
?>
<div class='large-break'><br></div><br>
<div class='main'>
	<div class='container'>
		<div class='contact-form'>
			<div id='contact-container'>
				<div class='left-block'>
					<p>Email</p>
					<p></p>
					<p>aaaaaaaaaaaaaaaaaa</p>
				</div>
				<div class='middle-block'></div>
				<div class='right-block'>
					<p>bbb</p>
					<p>bbb</p>
					<p>bbb</p>
				</div>
			</div>	
		</div>

		<div class='contact-form'>
			<form action='' method='post'>
				<div class='field-form'><label class='largeLabel'>Name *</label><br>
					<input class='shortInput' type='text' name='firstName' id='firstName'><br>
					<label class='smallLabel' for='firstName'>First</label>
				</div>
				<div class='field-form'>
					<pre>     </pre>
				</div>
				<div class='field-form'>
					<div class='med-break'><br></div>
					<input class='shortInput' type='text' name='lastName' id='lastName'><br>
					<label class='smallLabel' for='lastName'>Last</label><br>
				</div>



				<div class='large-break'><br></div>
				<label class='largeLabel' for='email'>Email Address *</label><br>
				<input class='longInput' type='email' name='email' id='email'><br>

				<div class='med-break'><br></div>
				<label class='largeLabel' for='subject'>Subject *</label><br>
				<input class='longInput' type='text' name='subject' id='subject'><br>

				<div class='med-break'><br></div>
				<label class='largeLabel' for='message'>Message *</label><br>
				<textarea class='longInput' name='message' id='message' rows='7'></textarea>
				
				<div class='med-break'><br></div>
				<button class='submitBtn' align='center'><span>Send Message </span></button>
			</form>
		</div>
	</div>
</div>
</div>
<?php
newFooter();

function sendEmail() {
	$to = 'kelly.jung@lessannoyingcrm.com';
	$firstName = htmlspecialchars($_POST['firstName']);
	$lastName = htmlspecialchars($_POST['lastName']);
	$from = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);

	$headers = 'From: '.$firstName.' '.$lastName.', '.$from;

	mail($to, $subject, $message, $headers);
}