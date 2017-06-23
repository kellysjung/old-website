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
		// var_dump($errors);
	}
}

echo "
<div class='main'>
	<h4>Login</h4>
	<form class='defaultForm' action='' method='POST'>";
		formTextInput('username', 'text', '25', 'Username');
		formTextInput('password', 'password', '', 'Password');
		inputBtn('defaultBtn', 'login', 'Login');
		echo "
	</form>
	<h5><a href='/login/register.php'>Don't have an account? Make one here!</a></h5>
</div>";

footer();

function login() {
	$username = $_POST['username'];
	$pwInput = $_POST['password'];

	$checkHash = dbQuery("SELECT userId, salt, hash FROM users WHERE username = :username",
		array("username"=>$username))->fetchAll();
	if ($checkHash) {
		$userId = $checkHash[0]['userId'];
		$salt = $checkHash[0]['salt'];
		$hash = $checkHash[0]['hash'];

		if (crypt($pwInput, '$7c$14$'.$salt) == $hash) {
			$_SESSION['userId'] = $userId;
			$_SESSION['logged'] = true;
			header("Location:/admin-page.php");
		} else {
			echo "<span class='error'>Incorrect password. Please try again.</span>";
		}
	} else {
		echo "<span class='error'>Incorrect username. Please try again.</span>";
	}

	
}

// function hashPassword($pw1) {
// 	$salt = bin2hex(openssl_random_pseudo_bytes(255));
// 	$hash = crypt($pw1, '$7c$14$'.$salt);

// 	$result['salt'] = $salt;
// 	$result['hash'] = $hash;

// 	return $result;
// }