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
		// if ($addCheck) {
		// 	echo "check-added";
		// }
	}
	if ($checked == 1) {
		$removeCheck = dbQuery("UPDATE tasks SET checked = 0 WHERE taskId = :taskId",
			array("taskId"=>$taskId));
		// if ($removeCheck) {
		// 	echo "check-removed";
		// } 
	} 
}

if (($action == 'add-list') and ($list != '')) {
	$addList = dbQuery("INSERT INTO lists (list) VALUES (:list)",
		array("list"=>$list));
	if ($addList) {
		$lastList = dbQuery("SELECT * FROM lists ORDER BY listId DESC LIMIT 1")->fetch();
		echo "
		<div class='' id='".$lastList['listId']."'>
			<div class='list-header' id='list-header-".$list['listId']."' style='background-color: #284E64;'>";
				dropdownMenus($list['listId']);
				echo "
				<h2>".$lastList['list']."</h2>
				<input type='text' id='newTask_".$lastList['listId']."' placeholder='Add a new item...'>
				<a href='javascript://' onclick='addTask(".$lastList['listId'].");'><button class='add-btn'>Add</button></a>
			</div>
			<ul id='ul_".$lastList['listId']."' class='list'>".
				getTasks($lastList['listId'])."
			</ul>
			<ul id='ul_done_".$lastList['listId']."' class='list'>
				<hr>";
				getCheckedTasks($list['listId']);
				echo "
			</ul>
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
	// 	if ($hide) {
	// 		echo "hide-list";
	// 	}
	}
	if ($collapsed == 1) {
		$show = dbQuery("UPDATE lists SET collapsed = 0 WHERE listId = :listId",
			array("listId"=>$listId));
	// 	if ($show) {
	// 		echo "show-list";
	// 	} 
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
	echo "color updated";
}