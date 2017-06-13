<?php
include('config/init.php');
navbar('Login | Kelly Jung', "Login", 'headerMain');

if (isset($_REQUEST['login'])) {
	$errors = array();

	if (!@$_REQUEST['username']) {
		$errors['username'] = "Required";
	}
	if (!@$_REQUEST['password']) {
		$errors['password'] = "Required";
	}
	if (sizeof($errors) == 0) {
		login();
	} else {
		echo "<span class='error'>Login unsuccessful. Please try again.</span>";
	}
}
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

echo "<div class='main'>
<div class='blogPosts'>
	<form class='defaultForm' action='' method='POST'>";
		formTextInput('username', 'text', '25', 'Username');
		formTextInput('password', 'password', '', 'Password');
		inputBtn('defaultBtn', 'login', 'Login');
		echo "</form>
		<br><hr><br>
		<form class='defaultForm' action='' method='POST'>";
			formTextInput('newUsername', 'text', '25', 'Enter New Username');
			formTextInput('newPassword1', 'password', '', 'Enter New Passwordd');
			formTextInput('newPassword2', 'password', '', 'Enter Password Again');
			inputBtn('defaultBtn', 'register', 'Register');
			echo "</form>
		</div>
	</div>";



	footer();

	function login() {
		$username = $_POST['username'];
		$pwInput = $_POST['password'];

		$findUser = dbQuery("SELECT * FROM users WHERE username = :username AND password = :password",
			array("username"=>$username, "password"=> $pwInput))->fetch();

		if ($findUser) {
			session_start();
			$_SESSION['userId'] = $findUser['userId'];
			$_SESSION['logged'] = true;
			header("Location:/admin-page.php");
		}
	}

	function register() {
		$username = $_POST['newUsername'];
		$pw1 = $_POST['newPassword1'];
		$pw2 = $_POST['newPassword2'];

		$addUser = dbQuery("
			INSERT INTO users (username, password)
			VALUES (:username, :password)",
			array("username"=>$username, "password"=>$pw1)
			);
		echo "New account created! You can now login.";
		// header('Location:/login/login.php');
	
	// $hashedPassword = password_hash($pw1, PASSWORD_DEFAULT);
	// echo $hashedPassword;

	}