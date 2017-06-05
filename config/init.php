<?php
date_default_timezone_set('America/Chicago');
include('config/config.php');
include('include/db_query.php'); //this should happen right after config so other functions have access to the database
include('include/layouts.php');
include('include/posts.php');
include('include/tags.php');
include('include/admin.php');