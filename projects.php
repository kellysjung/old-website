<?php
include('config/init.php');
navbar('Projects');
?>

<div class='large-break'><br></div><br>
<div class='main' align='center'>

	<div class='project-box' id='box_0'>
		<!-- <div class='project-title-image' style='background-image: url(/images/task-lists.png); '> -->
		<div class='project-title' id='title_0' >
			<h3>Task List</h3>
			<figcaption>Javascript, PHP, MySQL</figcaption>
		</div>
		<!-- </div> -->
		
		<!-- style='background-image: url(/images/task-lists.png);' -->
		<div class='project-image' id='image_0' >
			<span class='project-description' id='description_0'>
				<p><strong>Main features include:</strong></p>
				<p>- Color customization</p>
				<p>- Drag and drops for lists and tasks to rearrange</p>
				<p>- Ability to hide (archive) or minimize lists</p>
				<p>- Connection to database to save elements and their orders</p>
				<br><br><br><br>
			</span>
			<span class='project-text' id='text_0'>
				<a href='/t/task-list.php'>View</a>
			</span>
		</div>
	</div>

	<div class='med-break'><br></div>

	<div class='project-box' id='box_1'>
		<div class='project-title' id='title_1'>
			<h3>Simple Blogging Platform</h3>
			<figcaption>PHP, MySQL</figcaption>
		</div>
		
		<div class='project-image' id='image_1' style='background-image: url('');'>
			<span class='project-description' id='description_1'>
				<p><strong>Main features include:</strong></p>
				<p>- User management</p>
				<p>- Post creation, revision, deletion</p>
				<p>- Customizable tags and management</p>
			</span>
			<span class='project-text' id='text_1'>
				<a href='/b/blog-admin.php'>View</a>
			</span>
		</div>
	</div>
</div>

<script>

	$(function() {

		var topOffsets = [];
		$('.project-box').each(function(index) {
			var divHeight = $('div#image_'+index).height();
			topOffsets[index] = -(divHeight - 30);

			$('div#image_'+index).css('top', topOffsets[index]);
		});

		$('.project-box').hover(function() {
			id = $(this).attr('id').split('_').pop();

			$('div#image_'+id).css({'top': 0});
		},
		function() {
			event.stopPropagation();
			id = $(this).attr('id').split('_').pop();
			$('div#image_'+id).css({'top': topOffsets[id]});
		});
	});


</script>