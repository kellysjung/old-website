<link rel='stylesheet' href='/css/task-list.css'>

<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
$username = $user['username'];
verifyLogged();
adminNavbar('Tasks | Kelly Jung', 'Tasks', 'headerMain');






echo "<div class='blogPosts'>";
getAllLists();
// echo "
// <div id='task-list'>
// 	<div id='list-header' class='header'>";
// 		getList($listId);
// 		echo "
// 		<input type='text' id='newTask' placeholder='Add a new item...'>
// 		<a href='javascript://' onclick='addTask();'><button class='add-task'>Add</button></a>
// 	</div>
// 	<ul id='list'>";
// 		getTasks($listId);
// 		echo "
// 	</ul>
// </div>
// </div>";

footer();
?>

<div span='new-list'>
	<input type='text' id='newList' placeholder='New List'>
	<a href='javascript://' onclick='addList();'><button class='add-task'>Add List</button></a>
</div>


