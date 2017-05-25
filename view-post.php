<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$specificPost = getPost($postId);

navbar($specificPost['postHead'].' | Kelly Jung', $specificPost['postTitle'], 'headerMain');
viewPost($postId);
footer();