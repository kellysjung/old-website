<?php
include_once('config/init.php');

function getAllLists() {
	$lists = dbQuery("SELECT * FROM lists ORDER BY listid DESC")->fetchAll();
	foreach ($lists as $list) {
		if ($list['collapsed'] == 1) {
			echo "
			<div class='task-list'>
				<div class='collapsed' id='".$list['listId']."'>
					<div class='list-header'>
						<span class='del-list' id='".$list['listId']."'>x</span>
						<span class='hide-list' id='".$list['listId']."'>o</span>
						<h2>".$list['list']."</h2>
						<input type='text' id='newTask_".$list['listId']."' placeholder='Add a new item...'>
						<a href='javascript://' onclick='addTask(".$list['listId'].");'><button class='add-btn'>Add</button></a>
					</div>
					<ul id='".$list['listId']."' class='list'>";
						getTasks($list['listId']);
						echo "
					</ul>
				</div>
			</div>";
		}
		if ($list['collapsed'] == 0) {
			echo "
			<div class='task-list'>
				<div class='' id='".$list['listId']."'>
					<div class='list-header'>
						<span class='del-list' id='".$list['listId']."'>x</span>
						<span class='hide-list' id='".$list['listId']."'>o</span>
						<h2>".$list['list']."</h2>
						<input type='text' id='newTask_".$list['listId']."' placeholder='Add a new item...'>
						<a href='javascript://' onclick='addTask(".$list['listId'].");'><button class='add-btn'>Add</button></a>
					</div>
					<ul id='ul_".$list['listId']."' class='list'>";
						getTasks($list['listId']);
						echo "
					</ul>
					<hr>
					<ul id='ul_done_".$list['listId']."' class='list'>
						<li class='checked'>test test</li>
					</ul>
				</div>
			</div>";
		}
	}
}

// function getList($listId) {
// 	$list = dbQuery("SELECT * FROM lists WHERE listId = :listId",
// 		array("listId"=>$listId))->fetch();
// 	echo "<h2>".$list['list']."</h2>";
// }

function getTasks($listId) {
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId ORDER BY taskId DESC",
		array("listId"=>$listId))->fetchAll();
	foreach ($tasks as $task) {
		if ($task['checked'] == 1) {
			echo "<li class='checked' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
		}
		if ($task['checked'] == 0) {
			echo "<li class='' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
		}
	}
}