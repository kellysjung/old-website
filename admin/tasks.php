<?php
include_once('config/init.php');

function getAllLists() {
	$lists = dbQuery("SELECT * FROM lists WHERE archived = 0 ORDER BY listId DESC")->fetchAll();
	foreach ($lists as $list) {
		if ($list['collapsed'] == 0) {
			echo "
			<div class='task-list draggable'>
				<div class='' id='".$list['listId']."'>
					<div class='list-header' id='list-header-".$list['listId']."' style='background-color: ".$list['color'].";'>
						<span class='del-list fa fa-times' onclick='deleteList(".$list['listId'].");'></span>
						<span style='display: none;' class='hide-list fa fa-plus' onclick='hideList(".$list['listId'].");'></span>
						<span class='hide-list fa fa-minus' onclick='hideList(".$list['listId'].");'></span>
						<span class='drop-down fa fa-bars' onclick='dropdownList(".$list['listId'].");'></span>
						";
						dropdownMenus($list['listId'], $list['color']);
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
						<hr>";
						getCheckedTasks($list['listId']);
						echo "
					</ul>
				</div>
			</div>";
		}
		if ($list['collapsed'] == 1) {
			echo "
			<div class='task-list draggable'>
				<div class='collapsed' id='".$list['listId']."'>
					<div class='list-header' id='list-header-".$list['listId']."' style='background-color: ".$list['color'].";'>
						<span class='del-list fa fa-times' onclick='deleteList(".$list['listId'].");'></span>
						<span class='hide-list fa fa-plus' onclick='hideList(".$list['listId'].");'></span>
						<span style='display: none;' class='hide-list fa fa-minus' onclick='hideList(".$list['listId'].");'></span>
						<span class='drop-down fa fa-bars' onclick='dropdownList(".$list['listId'].");'></span>
						";
						dropdownMenus($list['listId'], $list['color']);
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
						<hr>";
						getCheckedTasks($list['listId']);
						echo "
					</ul>
				</div>
			</div>";
		}

	}
}

function dropdownMenus($listId, $color) {
	echo "
	<span class='drop-menu' id='drop-menu-".$listId."'>
		<a href='javascript://' onclick='archiveList(".$listId.");'>Archive list</a>
		<a href='javascript://' onclick='dropColorList(".$listId.")' id='drop-color' >Change color</a>

		<span class='colorpicker' id='color-menu-".$listId."'>";
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
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId AND checked = 0 ORDER BY taskId ASC",
		array("listId"=>$listId))->fetchAll();
	foreach ($tasks as $task) {
		echo "<li class='' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
	}
}

function getCheckedTasks($listId) {
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId AND checked = 1 ORDER BY taskId ASC",
		array("listId"=>$listId))->fetchAll();
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
			<h4><a href='task-list.php'>Create lists here.</a></h4>
		</div>";
	}

	foreach ($archived as $list) {
		echo "
		<p id='".$list['listId']."'>
			<a href='javascript://' onclick='unarchiveList(".$list['listId'].");'>Unarchive &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>"
			.$list['list']." 
		</p>";
		echo "<div class='med-break'><br></div><div class='center'><h4><a href='task-list.php'>Create lists here.</a></h4></div>";
	}
}
