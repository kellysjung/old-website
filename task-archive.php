<link rel='stylesheet' href='/css/task-list.css'>

<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
$username = $user['username'];
verifyLogged();
adminNavbar('Archive | Kelly Jung', 'Archive', 'headerMain');

echo "<div class='main' style='background-color: #ECF4F8;'>";
getArchivedLists();
echo "</div>";

footer();
?>

<script>

	function unarchiveList(listId) {
		var action = 'archived';

		$.post('action.php', {listId:listId, action:action}, function(data) {
			var list = document.getElementById(listId);
			list.remove();
		});
	}





</script>