<?php
include('config/init.php');
navbar('Login');
echo "
<link rel='stylesheet' href='/css/account.css?Time=".microtime()."'/>
<div class='large-break'><br></div><br><hr>
<div class='php-projects-nav'>
	<a href='/t/task-list.php'>TASK LIST</a> /
	<a href='/b/blog-posts.php'>BLOG APP</a>
</div>
";


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

<div class='main center'>
	<h4>Login</h4>
	<form class='loginForm' action='' method='POST'>";
		formTextInput('username', 'text', '25', 'Username');
		formTextInput('password', 'password', '', 'Password');
		inputBtn('loginBtn', 'login', 'Login');
		echo "
	</form>
	<div class='med-break'><br></div>
	<a href='/login/register.php'>Don't have an account? Make one here!</a>
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
			header("Location:/b/blog-admin.php");
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