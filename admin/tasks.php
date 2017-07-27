<?php
include_once('config/init.php');

function getAllLists($listColumn) {
	$lists = dbQuery("SELECT * FROM lists WHERE archived = 0 AND listColumn = :listColumn ORDER BY listOrder ASC",
		array("listColumn"=>$listColumn))->fetchAll();
	foreach ($lists as $list) {
		if ($list['collapsed'] == 0) {
			echo "
			<div class='task-list' id='list_".$list['listId']."'>
				<div class='' id='".$list['listId']."'>";
					getList($list['listId'], $list['list'], $list['color']);
					echo"
				</div>
			</div>";
		}
		if ($list['collapsed'] == 1) {
			echo "
			<div class='task-list' id='list_".$list['listId']."'>
				<div class='collapsed' id='".$list['listId']."'>";
					getList($list['listId'], $list['list'], $list['color']);
					echo"
				</div>
			</div>";
		}
	}
}

function getList($listId, $list, $color) {
	echo "
	<div class='list-header' id='list_header_".$listId."' style='background-color: ".$color.";'>
		<span style='display: none;' class='hide-list fa fa-plus' onclick='hideList(".$listId.");'></span>
		<span class='hide-list fa fa-minus' onclick='hideList(".$listId.");'></span>
		<span class='drop-down fa fa-caret-down' onclick='dropdownList(".$listId.");'></span>
		";
		dropdownMenus($listId, $color);
		echo "
		<h2>".$list."</h2>
		<input type='text' id='newTask_".$listId."' placeholder='Add a new item...'>
		<button class='add-btn'  onclick='addTask(".$listId.");'>Add</button>
	</div>
	<ul id='ul_".$listId."' class='incomplete-list'>";
		getTasks($listId);
		echo "
	</ul>
	<ul id='ul_done_".$listId."' class='complete-list' style='border-top: 2px solid ".$color.";'>";
		getCheckedTasks($listId);
		echo "
	</ul>";
}

function dropdownMenus($listId, $color) {
	echo "
	<span class='drop-menu' id='drop_menu_".$listId."'>
		<a href='javascript://' onclick='deleteList(".$listId.");'>Delete list</a>
		<a href='javascript://' onclick='archiveList(".$listId.");'>Archive list</a>
		<a href='javascript://' onclick='dropColorList(".$listId.")'>Change color</a>
		<span class='colorpicker' id='color_menu_".$listId."'>";
		// echo "<a href='javascript://' onclick='changeColor(".$listId.");' style='color: gray; font-size: 10px; position: absolute; right: 10; top: 10;'>Set</a>";
			echo "<span class='bgbox'></span>";
		// echo "<span class='hexbox'></span>";
			echo "
			<span class='colorbox'>
				<b style='background:".$color."; display:none;' class='selected' id='".$color."' title=' '></b>
				<b style='background:#C70039' id='#C70039' title='Crimson'></b>
				<b style='background:#FF5733' id='#FF5733' title='Tomato'></b>
				<b style='background:#FF8D1A' id='#FF8D1A' title='Dark Orange'></b>
				<b style='background:#FFC300' id='#FFC300' title='Gold'></b>
				<b style='background:#EDDD53' id='#EDDD53' title='Confetti'></b>
				<b style='background:#ADD45C' id='#ADD45C' title='Conifer'></b>
				<b style='background:#57C785' id='#57C785' title='Sea Green'></b>
				<b style='background:#00BAAD' id='#00BAAD' title='Caribbean Green'></b>
				<b style='background:#2A7B9B' id='#2A7B9B' title='Steel Blue'></b>
				<b style='background:#284E64' id='#284E64' title='Dark Slate Blue'></b>
				<b style='background:#511849' id='#511849' title='Wine Berry'></b>
				<b style='background:#900C3F' id='#900C3F' title='Rose Bud Cherry'></b>
			</span>
		</span>
	</span>
	";
}

function getTasks($listId) {
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId AND checked = 0 ORDER BY taskOrder ASC",
		array("listId"=>$listId))->fetchAll();
	foreach ($tasks as $task) {
		echo "<li class='' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
	}
}

function getCheckedTasks($listId) {
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId AND checked = 1 ORDER BY taskId ASC",
		array("listId"=>$listId))->fetchAll();
	// echo "<hr>";
	foreach ($tasks as $task) {
		echo "<li class='checked' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
	}
}

function getArchivedLists() {
	$archived = dbQuery("SELECT * FROM lists WHERE archived = 1 ORDER BY listId DESC")->fetchAll();

	if (!$archived) {
		echo "
		<div class='center'>
			<h3>There are no archived lists!</h3>
			<div class='med-break'><br></div>
		</div>";
	} else {
		echo "<h2>Archived Lists</h2><br><hr>";
		foreach ($archived as $list) {
			echo "
			<div class='each-archived-list' id='".$list['listId']."'>
				<a href='javascript://' onclick='unarchiveList(".$list['listId'].");'>Unarchive &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>"
				.$list['list']."
				<span style='float: right; font-size: 12px'>".$list['createdString']."</span>
				<hr>
			</div>
			";
		}
		echo "<div class='med-break'><br></div>";
	}
	echo "<div class='center'><h4><a href='task-list.php'>Create lists here</a></h4></div>";
}


function getCurrentLists() {
	$lists = dbquery("SELECT listId FROM lists WHERE archived = 0 ORDER BY listId ASC")->fetchAll();
	return json_encode($lists);
}

function taskTimeCreated() {
	$created = date('Y-m-d H:i:s');
	return $created;
}
function taskTimeCreatedString() {
	$taskTime = taskTimeCreated();
	$createdString = date('n\/j\/y \a\t h:i A', strtotime($taskTime));
	return $createdString;
}