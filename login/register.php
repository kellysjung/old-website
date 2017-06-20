<?php
include('config/init.php');
navbar('Register | Kelly Jung', "Register", 'headerMain');

if (isset($_REQUEST['register'])) {
	$errors = array();

	if (!@$_REQUEST['newUsername']) {
		$errors['newUsername'] = "Required";
	}
	if (!@$_REQUEST['newPassword1']) {
		$errors['newPassword1'] = "Required";
	}
	if (!@$_REQUEST['newPassword2']) {
		$errors['newPassword2'] = "Required";

	}
	if (isset($_REQUEST['newUsername']) and isset($_REQUEST['newPassword1']) and isset($_REQUEST['newPassword2'])) {
		$checkUserExists = dbQuery("
			SELECT * FROM users WHERE username = :username",
			array("username"=>@$_REQUEST['newUsername']))->fetchAll();
		if ($checkUserExists) {
			$errors['register'] = "Username already taken.";
		}
		if (!preg_match('/^[\w_\-]+$/', @$_REQUEST['newUsername'])) {
			$errors['newUsername'] = "Invalid username. No special characters (!@#$%^&*).";
		}
		if($_REQUEST['newPassword1'] != $_REQUEST['newPassword2']) {
			$errors['newPassword2'] = "Passwords do not match.";
		}
	}
	if (isset($_REQUEST['newPassword1']) and isset($_REQUEST['newPassword2'])) {

		if($_REQUEST['newPassword1'] != $_REQUEST['newPassword2']) {
			$errors['newPassword2'] = "Passwords do not match.";
		}
	}
	if (sizeof($errors) == 0) {
		register();
	} else {
		echo "<span class='error'>Register unsuccessful. Please try again.</span>";
	}
}
echo "
<div class='main'>
	<h4>Register</h4>
	<form class='defaultForm' action='' method='POST'>";
		formTextInput('newUsername', 'text', '25', 'New Username');
		formTextInput('newEmail', 'email', '250', 'Email Address');
		formTextInput('newPassword1', 'password', '', 'New Password');
		formTextInput('newPassword2', 'password', '', 'Confirm Password');
		formTextInput('firstName', 'text', '100', 'First Name');
		formTextInput('lastName', 'text', '100', 'Last Name');
		inputBtn('defaultBtn', 'register', 'Register');
		echo "
	</form>
	<h5><a href='/login/login.php'>Already have an account? Login here!</a></h5>
</div>";

footer();

function register() {
	$username = $_POST['newUsername'];
	$email = $_POST['newEmail'];
	$pw1 = $_POST['newPassword1'];
	$pw2 = $_POST['newPassword2'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];

	$password = hashPassword($pw1);
	$salt = $password['salt'];
	$hash = $password['hash'];
	
	$addUser = dbQuery("
		INSERT INTO users (username, email, salt, hash, firstName, lastName)
		VALUES (:username, :email, :salt, :hash, :firstName, :lastName)",
		array("username"=>$username, "email"=>$email, "salt"=>$salt, "hash"=>$hash, "firstName"=>$firstName, "lastName"=>$lastName)
		);
	echo "New account created! You can now login.";
	// header('Location:/login/login.php');
}


function hashPassword($pw1) {
	$salt = bin2hex(openssl_random_pseudo_bytes(255));
	$hash = crypt($pw1, '$7c$14$'.$salt);

	$result['salt'] = $salt;
	$result['hash'] = $hash;

	return $result;
}