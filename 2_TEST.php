<?php
include('config/init.php');
adminNavbar('Tasks | Kelly Jung', 'Tasks', 'headerMain');
?>
<style type="text/css">
	.task-list {
		/*max-width: 400px;*/
		padding: 10px;
		width: 400px;
		/*position: absolute;*/
		background-color: lightgray;
		padding: 10px 10px;
		color: white;
		/*text-align: center;*/
	}

</style>

<body onload='setuplists();'>
	<div class='task-list'>
		<!-- <div class='list-header' id='list-header-1'> -->
		<h2>1</h2>
		<!-- </div> -->
	</div>
	<div class='task-list'>
		<!-- <div class='list-header' id='list-header-2'> -->
		<h2>2</h2>
		<!-- </div> -->
	</div>
	<div class='task-list'>
		<!-- <div class='list-header' id='list-header-3'> -->
		<h2>3</h2>
		<!-- </div> -->
	</div>
	<div class='task-list'>
		<!-- <div class='list-header' id='list-header-4'> -->
		<h2>4</h2>
		<!-- </div> -->
	</div>
	<div class='task-list'>
		<!-- <div class='list-header' id='list-header-5'> -->
		<h2>5</h2>
		<!-- </div> -->
	</div>
</body>


<script type="text/javascript">
	var colCount = 0;
	var colWidth = 0;
	var margin = 20;
	var lists = [];

	$(function(){
		$(window).resize(setupLists);
	});

	function setupLists() {
		colWidth = $('.task-list').outerWidth();
		colCount = 2
		for(var i=0;i<colCount;i++){
			lists.push(margin);
		}
		positionlists();
	}

	function positionlists() {
		$('.task-list').each(function(){
			var min = Array.min(lists);
			var index = $.inArray(min, lists);
			var leftCol = margin+(index*(colWidth+margin));
			$(this).css({
				'left': leftCol+'px',
				'top': min+'px'
			});
			lists[index] = min+$(this).outerHeight()+margin;
		});	
	}

	Array.min = function(array) {
		return Math.min.apply(Math, array);
	};


</script>

