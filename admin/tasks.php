<?php
include_once('config/init.php');
// $q = intval($_GET['q']);
// $listId = $_REQUEST['listId'];

	// $tasks = dbQuery("SELECT * FROM tasks WHERE listId = :listId",
	// array("listId"=>$listId))->fetchAll();

function getAllLists() {
	$lists = dbQuery("SELECT * FROM lists")->fetchAll();
	foreach ($lists as $list) {
		// echo "<h2>".$list['name']."</h2>";
		echo "
		<div class='task-list'>
			<div class='list-header'>
				<h2>".$list['name']."</h2>
				<input type='text' id='newTask' placeholder='Add a new item...'>
				
				<a href='javascript://' onclick='addTask(".$list['listId'].");'><button class='add-task'>Add</button></a>
			</div>
			<ul id='".$list['listId']."' class='list'>";
				getTasks($list['listId']);
				echo "
			</ul>
		</div>";
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
			echo "<li class='checked' onclick='addCheck(".$task['taskId'].", ".$task['listId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
		}
		if ($task['checked'] == 0) {
			echo "<li class='' onclick='addCheck(".$task['taskId'].", ".$task['listId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
		}
	}
}