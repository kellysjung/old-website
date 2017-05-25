<?php
include_once('config/init.php');


function getSQLPost($blogPostId) {
	$result = dbQuery("
		SELECT * FROM blog_posts WHERE blogPostId = :blogPostId
		", array ("blogPostId"=>$blogPostId));
	return $result;
}
var_dump(getSQLPost(4));
?>