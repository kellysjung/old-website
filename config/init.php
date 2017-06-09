<?php
date_default_timezone_set('America/Chicago');
// session_start();

include('config/config.php');
include('include/db_query.php'); //this should happen right after config so other functions have access to the database
include('include/layouts.php');
include('admin/posts.php');
include('admin/tags.php');
include('admin/admin.php');
include('admin/inputs.php');
// include('login/login.php');