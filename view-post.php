<?php
include('config/init.php');
$postId = $_REQUEST['postId'];

viewPost($postId);
footer();