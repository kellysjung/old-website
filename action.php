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
		$list = dbQuery("SELECT * FROM lists ORDER BY listId DESC LIMIT 1")->fetch();
		echo "
		<div class='' id='".$list['listId']."'>
			<div class='list-header' id='list-header-".$list['listId']."' style='background-color: #284E64;'>
				<span style='display: none;' class='hide-list fa fa-plus' onclick='hideList(".$list['listId'].");'></span>
				<span class='hide-list fa fa-minus' onclick='hideList(".$list['listId'].");'></span>
				<span class='drop-down fa fa-caret-down' onclick='dropdownList(".$list['listId'].");'></span>";
				dropdownMenus($list['listId'], '#284E64');
				echo "
				<h2>".$list['list']."</h2>
				<input type='text' id='newTask_".$list['listId']."' placeholder='Add a new item...'>
				<button class='add-btn'  onclick='addTask(".$list['listId'].");'>Add</button>
			</div>
			<ul id='ul_".$list['listId']."' class='list'>";
				getTasks($list['listId']);
				echo "
			</ul>
			<ul id='ul_done_".$list['listId']."' class='list'>
				";
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

}