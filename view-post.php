<?php
include('config/init.php');

$postId = $_REQUEST['postId'];
$specificPost = getPost($postId);

navbar($specificPost['tab'].' | Kelly Jung', $specificPost['title'], 'headerMain');
viewPost($postId);
footer();