<?php
include('config/init.php');

$task = @$_REQUEST['task'];
$list = @$_REQUEST['list'];
$taskId = @$_REQUEST['taskId'];
$listId = @$_REQUEST['listId'];
$action = $_REQUEST['action'];

if ($action == 'add-task') {
	if (($task != '') and ($listId != '')) {
		$addTask = dbQuery("INSERT INTO tasks (task, listId) VALUES (:task, :listId)",
			array("task"=>$task, "listId"=>$listId));

		if ($addTask) {
			$lastEntry = dbQuery("SELECT * FROM tasks ORDER BY taskId DESC LIMIT 1")->fetch();
			$taskId = $lastEntry['taskId'];
		}
		$item = array("taskId"=>$taskId, "task"=>$task, "listId"=>$listId);
		echo json_encode($item);

	} else {
		echo "New item could not be added.";
	}
}

if ($action == 'delete-tag') {
	$deleteTask = dbQuery("DELETE FROM tasks WHERE taskId = :taskId",
		array("taskId"=>$taskId));
	if ($deleteTask) {
		echo "task deleted";
	}
}

if ($action == 'add-check') {
	$getBoolean = dbQuery("SELECT checked FROM tasks WHERE taskId = :taskId",
		array("taskId"=>$taskId))->fetch();
	$checked = $getBoolean['checked'];

	if ($checked == 0) {
		$addCheck = dbQuery("UPDATE tasks SET checked = 1 WHERE taskId = :taskId",
			array("taskId"=>$taskId));
		if ($addCheck) {
			echo "check-added";
		}
	}
	if ($checked == 1) {
		$removeCheck = dbQuery("UPDATE tasks SET checked = 0 WHERE taskId = :taskId",
			array("taskId"=>$taskId));
		if ($removeCheck) {
			echo "check-removed";
		} 
	} 
}




if ($action == 'add-list') {

	if ($list != '') {
		$addList = dbQuery("INSERT INTO lists (name) VALUES (:name)",
			array("name"=>$list));
		if ($addList) {
			echo "list added";
		}
	}
}
