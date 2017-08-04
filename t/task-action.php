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
			$task = dbQuery("SELECT * FROM tasks ORDER BY taskId DESC LIMIT 1")->fetch();
			$taskId = $task['taskId'];
			// echo "
			// <li class='' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."
			// 	<span align='right' class='moveTask' id='".$task['taskId']."'>&#9776;</span>
			// 	<span class='close' id='".$task['taskId']."'>x</span>
			// </li>";
		}
		$item = array("taskId"=>$taskId, "task"=>$task, "listId"=>$listId);
		echo json_encode($item);
	}
}

if ($action == 'delete-task') {
	$getListId = dbQuery("SELECT listId FROM tasks WHERE taskId = :taskId",
		array("taskId"=>$taskId))->fetch();
	$deleteTask = dbQuery("DELETE FROM tasks WHERE taskId = :taskId",
		array("taskId"=>$taskId));
	if ($deleteTask and $getListId) {
		echo $getListId['listId'];
	}
}

if ($action == 'add-check') {
	$getBoolean = dbQuery("SELECT checked, listId FROM tasks WHERE taskId = :taskId",
		array("taskId"=>$taskId))->fetch();
	$checked = $getBoolean['checked'];
	echo $getBoolean['listId'];

	if ($checked == 0) {
		$addCheck = dbQuery("UPDATE tasks SET checked = 1 WHERE taskId = :taskId",
			array("taskId"=>$taskId));
	}
	if ($checked == 1) {
		$removeCheck = dbQuery("UPDATE tasks SET checked = 0 WHERE taskId = :taskId",
			array("taskId"=>$taskId));
	} 
}

if (($action == 'add-list') and ($list != '')) {
	$created = taskTimeCreated();
	$createdString = taskTimeCreatedString();


	$addList = dbQuery("INSERT INTO lists (list, created, createdString) VALUES (:list, :created, :createdString)",
		array("list"=>$list, "created"=>$created, "createdString"=>$createdString));
	if ($addList) {
		$list = dbQuery("SELECT * FROM lists ORDER BY listId DESC LIMIT 1")->fetch();
		echo "
		<div class='' id='".$list['listId']."'>";
			getList($list['listId'], $list['list'], '#284E64');
			echo "
		</div>";
	}
}

if ($action == 'delete-list') {
	$deleteTasks = dbQuery("DELETE FROM tasks WHERE listId = :listId",
		array("listId"=>$listId));
	$deleteList = dbQuery("DELETE FROM lists WHERE listId = :listId",
		array("listId"=>$listId));
}

if ($action == 'collapsed') {
	$getBoolean = dbQuery("SELECT collapsed FROM lists WHERE listId = :listId",
		array("listId"=>$listId))->fetch();
	$collapsed = $getBoolean['collapsed'];

	if ($collapsed == 0) {
		$hide = dbQuery("UPDATE lists SET collapsed = 1 WHERE listId = :listId",
			array("listId"=>$listId));
		if ($hide) {
			echo "list is hidden";
		}
	} elseif ($collapsed == 1) {
		$show = dbQuery("UPDATE lists SET collapsed = 0 WHERE listId = :listId",
			array("listId"=>$listId));
		if ($show) {
			echo "list is shown";
		} 
	}
}

if ($action == 'archived') {
	$getBoolean = dbQuery("SELECT archived FROM lists WHERE listId = :listId",
		array("listId"=>$listId))->fetch();
	$archived = $getBoolean['archived'];

	if ($archived == 0) {
		$archive = dbQuery("UPDATE lists SET archived = 1 WHERE listId = :listId",
			array("listId"=>$listId));
		echo "archived";
	}
	if ($archived == 1) {
		$unarchive = dbQuery("UPDATE lists SET archived = 0 WHERE listId = :listId",
			array("listId"=>$listId));
	}
}

if ($action == 'change-color') {
	$color = $_REQUEST['color'];
	
	$changeColor = dbQuery("UPDATE lists SET color = :color WHERE listId = :listId",
		array("color"=>$color, "listId"=>$listId));
}

if ($action == 'update-list-order') {
	$data = array();
	$data[1] = $_REQUEST['column1'];
	$data[2] = $_REQUEST['column2'];

	foreach ($data[1] as $index => $list) {
		$listId = str_replace('list_', '', $list);
		$updateColumn1 = dbQuery("UPDATE lists SET listColumn = 1 WHERE listId = :listId",
			array("listId"=>$listId));
		
		$updateOrder = dbQuery("UPDATE lists SET listOrder = :index WHERE listId = :listId",
			array("index"=>$index, "listId"=>$listId));
	}
	foreach ($data[2] as $index => $list) {
		$listId = str_replace('list_', '', $list);
		$updateColumn2 = dbQuery("UPDATE lists SET listColumn = 2 WHERE listId = :listId",
			array("listId"=>$listId));

		$updateOrder = dbQuery("UPDATE lists SET listOrder = :index WHERE listId = :listId",
			array("index"=>$index, "listId"=>$listId));
	}
}

if ($action == 'update-task-order') {
	$sortedTasks = $_REQUEST['sortedTasks'];

	foreach ($sortedTasks as $index => $taskId) {
		$updateTaskOrder = dbQuery("UPDATE tasks SET taskOrder = :index, listId = :listId WHERE taskId = :taskId",
			array("index"=>$index, "listId"=>$listId, "taskId"=>$taskId));
	}
}