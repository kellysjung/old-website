<?php
include('init.php');

session_destroy();
// $_SESSION = array();

header("Location:/login/login.php");
exit;