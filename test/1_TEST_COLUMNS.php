<?php
include('init.php');
adminNavbar_v1('Tasks | Kelly Jung', 'Tasks', 'headerMain');
?>
<!-- <style type="text/css">
	.task-list {
		position: absolute;
		background: lightgray;
		padding: 20px;
		width: 300px;
		border: 1px solid #ddd;
		color: white;
	}

</style>

<body onload='setuplists();'>
	<div id='all-lists' class='task-container'>
		<div class='task-list'>
			<div class='list-header' id='list-header-1'>
				<h2>1</h2>
			</div>
		</div>
		<div class='task-list'>
			<div class='list-header' id='list-header-2'>
				<h2>2</h2>
				<p>aasqqqsssssssssssssssssss ssssssfdjakfljdskzljfkdlsj ;akfljdk sjf jfkd osajfdksafjkd sa jfdksa jfkdlsajfkdls;</p>
				<p>aassssssssssss ssssssssssssssfdjakf ljdskzljfkdlsj;ak fljdk sjf jfkd osajfdksafjkd sa jfdksa jfkdlsajfkdls;</p>
				<p>aassssss ssssssssssssssssssssfdjak flj dskzljfk dlsj;akfljdk sjf jfkd osajfdksafjkd sa jfdksa jfkdlsajfkdls;</p>
			</div>
		</div>
		<div class='task-list'>
			<div class='list-header' id='list-header-3'>
				<h2>3</h2>
			</div>
		</div>
		<div class='task-list'>
			<div class='list-header' id='list-header-4'>
				<h2>4</h2>
				<p>aasssssssssssssssssss sssssssfdjakfljdsk ljfkdlsj;akfljdk sjf jfkd osajfdksafjkd sa jfdksa jfkdlsajfkdls;</p>
			</div>
		</div>
		<div class='task-list'>
			<div class='list-header' id='list-header-5'>
				<h2>5</h2>
				<p>aa</p>
			</div>
		</div>
	</div>
</body>


<script type="text/javascript">
	var colCount = 0;
	var colWidth = 0;
	var margin = 20;
	var lists = [];

	$(function(){
		$(window).resize(setuplists);
	});

	function setuplists() {
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
			var leftPos = margin+(index*(colWidth+margin));
			$(this).css({
				'left':leftPos+'px',
				'top':min+'px'
			});
			lists[index] = min+$(this).outerHeight()+margin;
		});	
	}

	Array.min = function(array) {
		return Math.min.apply(Math, array);
	};

</script> -->