<?php
echo "<link rel='stylesheet' href='/css/task-list.css?Time=".microtime()."'/>";
include('config/init.php');
newHeader('Archive');

echo "
<div class='large-break'><br></div>
<div class='large-break'><br></div>
<div class='main'>
	<div id='archived-lists'>";
		getArchivedLists();
		echo "
	</div>
</div>";

newFooter();
?>

<script>
	function unarchiveList(listId) {
		var action = 'archived';

		$.post('action.php', {listId:listId, action:action}, function(data) {
			var list = document.getElementById(listId);
			list.remove();

			var archived = document.getElementById('archived-lists');
			var children = $(archived).find('div.each-archived-list');

			if (children.length == 0) {
				archived.innerHTML = "<div class='center'>"+"<h3>There are no archived lists!</h3>"+"<div class='med-break'><br></div>"+"<h4><a href='task-list.php'>Create lists here</a></h4>"+"</div>";
			}
		});
	}
</script>