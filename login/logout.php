<?php
include('config/init.php');

session_destroy();
// $_SESSION = array();

header("Location:/login/login.php");
exit;