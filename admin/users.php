<?php
include_once('init.php');

function verifyLogged() {
	if (!isset($_SESSION['userId'])) {
		header("Location:/login/login.php");
	}
	$verify = dbQuery("SELECT * FROM users WHERE userId = :userId",
		array("userId"=>$_SESSION['userId']))->fetchAll();
}

function getUserInfo($userId) {
	$userId = $userId;
	$getUser = dbQuery("SELECT * FROM users WHERE userId = :userId",
		array("userId"=>$userId))->fetch();
	return $getUser;
}