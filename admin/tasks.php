<?php
include_once('config/init.php');
// $q = intval($_GET['q']);
// $listId = $_REQUEST['listId'];

	// $tasks = dbQuery("SELECT * FROM tasks WHERE listId = :listId",
	// array("listId"=>$listId))->fetchAll();

function getAllLists() {
	$lists = dbQuery("SELECT * FROM lists")->fetchAll();
	foreach ($lists as $list) {
		echo $list['name'];
		echo "<br>";
	}
}

function getList($listId) {
	$list = dbQuery("SELECT * FROM lists WHERE listId = :listId",
		array("listId"=>$listId))->fetch();
	echo "<h2>".$list['name']."</h2>";
}
function getTasks($listId) {
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId ORDER BY taskId DESC",
		array("listId"=>$listId))->fetchAll();
	foreach ($tasks as $task) {
		if ($task['checked'] == 1) {
			echo "<li class='checked' onclick='getTaskId(".$task['taskId'].");' id='".$task['taskId']."'>".$task['taskId']." ".$task['task']."</li>";
		} else {
			echo "<li onclick='getTaskId(".$task['taskId'].");' id='".$task['taskId']."'>".$task['taskId']." ".$task['task']."</li>";
		}
	}
}