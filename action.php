<?php
include('config/init.php');

// var_dump($_REQUEST);

$task = @$_REQUEST['task'];
$listId = @$_REQUEST['listId'];
$taskId = @$_REQUEST['taskId'];
$action = $_REQUEST['action'];

if ($action == 'add') {
	if (($task != '') and ($listId != '')) {
		$addTask = dbQuery("INSERT INTO tasks (task, listId) VALUES (:task, :listId)",
			array("task"=>$task, "listId"=>$listId));

		if ($addTask) {
			$lastEntry = dbQuery("SELECT * FROM tasks ORDER BY taskId DESC LIMIT 1")->fetch();
			$taskId = $lastEntry['taskId'];
		}
		$item = array("taskId"=>$taskId, "task"=>$task, "listId"=>$listId);
		echo json_encode($item);

		// echo "Item added.";
		// echo "<li>".$taskId." : ".$task."</li>";
	} else {
		echo "New item could not be added.";
	}
}

if ($action == 'delete') {
	$deleteTask = dbQuery("DELETE FROM tasks WHERE taskId = :taskId",
		array("taskId"=>$taskId));
}

if ($action == 'checked') {
	$getBoolean = dbQuery("SELECT checked FROM tasks WHERE taskId = :taskId",
		array("taskId"=>$taskId))->fetch();
	$checked = $getBoolean['checked'];

	if ($checked == 0) {
		$addCheck = dbQuery("UPDATE tasks SET checked = 1 WHERE taskId = :taskId",
			array("taskId"=>$taskId));
		if ($addCheck) {
			echo "added";
		}
	}
	if ($checked == 1) {
		$removeCheck = dbQuery("UPDATE tasks SET checked = 0 WHERE taskId = :taskId",
			array("taskId"=>$taskId));
		if ($removeCheck) {
			echo "removed";
		} 
	} 
}