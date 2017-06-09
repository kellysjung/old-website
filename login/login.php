<?php
include('config/init.php');
navbar('Login | Kelly Jung', "Login", 'headerMain');

if (isset($_REQUEST['login'])) {
	$errors = array();

	if(!@$_REQUEST['username']) {
		$errors['username'] = "Required";
	}
	if(!@$_REQUEST['password']) {
		$errors['password'] = "Required";
	}
	if(sizeof($errors) == 0) {
		login();
	} else {
		echo "<span class='error'>Please fill out required fields.</span>";
	}
}
if (isset($_REQUEST['register'])) {
	$errors = array();

	if(!@$_REQUEST['newUsername']) {
		$errors['newUsername'] = "Required";
	}
	if(!@$_REQUEST['newPassword1']) {
		$errors['newPassword1'] = "Required";
	}
	if(!@$_REQUEST['newPassword2']) {
		$errors['newPassword2'] = "Required";
	}
	if(sizeof($errors) == 0) {
		register();
	} else {
		echo "<span class='error'>Please fill out required fields.</span>";
	}
}

// formTextInput('username', 'text', '25', 'Username');
// formTextInput('password', 'password', '', 'Password');
// inputBtn('defaultBtn', 'login', 'submit', 'Login');
// echo "<br><hr><br>";
// formTextInput('newUsername', 'text', '25', 'Enter New Username');
// formTextInput('newPassword1', 'password', '', 'Enter New Passwordd');
// formTextInput('newPassword2', 'password', '', 'Enter Password Again');
// inputBtn('defaultBtn', 'register', 'submit', 'Register');

echo "
<div class='main'>
	<div class='blogPosts'>
		<h3>Login</h3>
		<form class='defaultForm' action='' method='POST'>
			Username: <br>
			<input type='text' name='username' value='".(@$_REQUEST['username'] ? $_REQUEST['username'] : "")."'/>
			".(@$errors['username'] ? "<span class='error'>".$errors['username']."</span>" : "")."<br>
			Password: <br>
			<input type='password' name='password' value='".(@$_REQUEST['password'] ? $_REQUEST['password'] : "")."'/>
			".(@$errors['password'] ? "<span class='error'>".$errors['password']."</span>" : "")."<br><br>
			<input class='defaultBtn' type='submit' name='login' value='Login'>
		</form>
		";
		echo "<br><hr><br>";
		echo "
		<h3>Register</h3>
		<form class='defaultForm' action='' method='POST'>
			New Username: <br>
			<input type='text' name='newUsername' value='".(@$_REQUEST['newUsername'] ? $_REQUEST['newUsername'] : "")."'/>
			".(@$errors['newUsername'] ? "<span class='error'>".$errors['newUsername']."</span>" : "")."<br>
			New Password: <br>
			<input type='password' name='newPassword1' value='".(@$_REQUEST['newPassword1'] ? $_REQUEST['newPassword1'] : "")."'/>
			".(@$errors['newPassword1'] ? "<span class='error'>".$errors['newPassword1']."</span>" : "")."<br>
			Confirm Password: <br>
			<input type='password' name='newPassword2' value='".(@$_REQUEST['newPassword2'] ? $_REQUEST['newPassword2'] : "")."'/>
			".(@$errors['newPassword2'] ? "<span class='error'>".$errors['newPassword2']."</span>" : "")."<br><br>
			<input class='defaultBtn' type='submit' name='register' value='Register'>
		</form>
	</div>
</div>
";
footer();

function login() {
	$username = $_POST['username'];
	$pwInput = $_POST['password'];

	// $findUser = dbQuery("
	// 	SELECT COUNT(*) username, password FROM users WHERE username = :username",
	// 	array("username"=>$username));

	$findUser = dbQuery("SELECT * FROM users WHERE username = :username AND password = :password",
		array("username"=>$username, "password"=>$pwInput))->fetch();
	if ($findUser) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['logged'] = true;
		// 
		// 
		// 
		// $userId = $_SESSION['userId'];
		header("Location:/admin-page.php");
	}
}








function register() {
	$username = $_POST['newUsername'];
	$pw1 = $_POST['newPassword1'];
	$pw2 = $_POST['newPassword2'];

// regex checking to see if it's a valid username; no special characters
	if (!preg_match('/^[\w_\-]+$/', $username) ){
		echo "<span class='error'>Invalid username.</span>";
		exit;
	}

	$checkUserExists = dbQuery("
		SELECT * FROM users WHERE username = :username",
		array("username"=>$username))->fetchAll();
	if ($checkUserExists) {
		echo "<span class='error'>Username already taken.</span>";
		exit;
	}

	if ($pw1 != $pw2) {
		echo "<span class='error'>Passwords do not match.</span>";
		exit;
	}

	$hashedPassword = password_hash($pw1, PASSWORD_DEFAULT);
	echo $hashedPassword;

	$addUser = dbQuery("
		INSERT INTO users (username, password)
		VALUES (:username, :password)",
		array("username"=>$username, "password"=>$pw1)
		);
	header('Location:/login/login.php');
}