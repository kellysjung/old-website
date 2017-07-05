<?php
include_once('config/init.php');

function getAllLists() {
	$lists = dbQuery("SELECT * FROM lists WHERE archived = 0 ORDER BY listId DESC")->fetchAll();
	foreach ($lists as $list) {
		if ($list['collapsed'] == 1) {
			echo "
			<div class='task-list'>
				<div class='collapsed' id='".$list['listId']."'>
					<div class='list-header' id='list-header-".$list['listId']."' style='background-color: ".$list['color'].";'>";
						dropdownMenus($list['listId']);
						echo "
						<h2>".$list['list']."</h2>
						<input type='text' id='newTask_".$list['listId']."' placeholder='Add a new item...'>
						<a href='javascript://' onclick='addTask(".$list['listId'].");'><button class='add-btn'>Add</button></a>
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
		if ($list['collapsed'] == 0) {
			echo "
			<div class='task-list'>
				<div class='' id='".$list['listId']."'>
					<div class='list-header' id='list-header-".$list['listId']."' style='background-color: ".$list['color'].";'>";
						dropdownMenus($list['listId']);
						echo "
						<h2>".$list['list']."</h2>
						<input type='text' id='newTask_".$list['listId']."' placeholder='Add a new item...'>
						<a href='javascript://' onclick='addTask(".$list['listId'].");'><button class='add-btn'>Add</button></a>
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

function dropdownMenus($listId) {
	echo "
	<span class='del-list fa fa-times' id='".$listId."'></span>
	<span class='hide-list fa fa-minus' id='".$listId."'></span>
	<span class='drop-down fa fa-bars' id='".$listId."'></span>

	<div class='drop-menu' id='drop-menu-".$listId."'>
		<a href='javascript://' onclick='archiveList(".$listId.");'>Archive list</a>
		<a href='javascript://' onclick='dropColorList(".$listId.");'>Change color</a>
	</div>

	<span class='colorpicker' id='color-menu-".$listId."'>
		<a href='javascript://' onclick='changeColor(".$listId."); style='color: gray; font-size: 6px;'>Set</a>
		<span class='bgbox'></span>
		<span class='hexbox'></span>
		<span class='clear'></span>
		<span class='colorbox'>

			<b style='background:#C70039' id='#C70039' title='Crimson'></b>
			<b style='background:#FF5733' id='#FF5733' title='Tomato'></b>
			<b style='background:#FF8D1A' id='#FF8D1A' title='Dark Orange'></b>
			<b style='background:#FFC300' id='#FFC300' title='Gold'></b>
			<b style='background:#EDDD53' id='#EDDD53' title='Confetti'></b>   
			<b style='background:#ADD45C' id='#ADD45C' title='Conifer'></b>   
			<b style='background:#57C785' id='#57C785' title='Sea Green'></b>   
			<b style='background:#00BAAD' id='#00BAAD' title='Caribbean Green'></b>   
			<b style='background:#2A7B9B' id='#2A7B9B' title='Steel Blue'></b>   
			<b class='selected' style='background:#284E64' id='#284E64' title='Dark Slate Blue'></b>   
			<b style='background:#511849' id='#511849' title='Wine Berry'></b>   
			<b style='background:#900C3F' id='#900C3F' title='Rose Bud Cherry'></b>       
		</span>
	</span>
	";
}

function getTasks($listId) {
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId AND checked = 0 ORDER BY taskId DESC",
		array("listId"=>$listId))->fetchAll();
	foreach ($tasks as $task) {
		echo "<li class='' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
	}
}

function getCheckedTasks($listId) {
	$tasks = dbQUery("SELECT * FROM tasks WHERE listId = :listId AND checked = 1 ORDER BY taskId DESC",
		array("listId"=>$listId))->fetchAll();
	foreach ($tasks as $task) {
		echo "<li class='checked' onclick='addCheck(".$task['taskId'].");' id='".$task['taskId']."'>".$task['task']."<span class='close' id='".$task['taskId']."'>x</span></li>";
	}
}

function getArchivedLists() {
	$archived = dbQuery("SELECT * FROM lists WHERE archived = 1 ORDER BY listId DESC")->fetchAll();

	if (!$archived) {
		echo "<h3>You don't have any archived lists.</h3>";
	}

	foreach ($archived as $list) {
		echo "
		<div class='blogPosts'>
			<p id='".$list['listId']."'>".$list['list']." &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				<a href='javascript://' onclick='unarchiveList(".$list['listId'].");'>Unarchive</a>
			</p>
		</div>
		";
	}
}

