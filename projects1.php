<?php
include('config/init.php');
navbar('Projects');
echo "<link rel='stylesheet' href='/css/projects.css?Time=".microtime()."'/>";
?>

<div class='large-break'><br></div><br>
<!-- <div class='main'> -->
<div class='project-left-column'>
	<div class='project-box' id='box_1'>
		<div class='project-title' id='title_1''>
			<h3>Task List</h3>
			<figcaption>Javascript, PHP, MySQL</figcaption>
		</div>
		
		<div class='project-image' id='image_1'>
			a
		</div>
		<div class='project-text' id='text_1' >
			<p><strong>Main features include:</strong></p>
			<p>- color customization</p>
			<p>- drag and drops for lists and tasks to rearrange</p>
			<p>- ability to hide (archive) or minimize lists</p>
			<p>- connection to database to save elements and their orders</p>
		</div>
	</div>

	<div class='med-break'><br></div>

	<div class='project-box' id='box_2'>
		<div class='project-title' id='title_2'>
			<h3>2 Title</h3>
			<figcaption>2 Caption</figcaption>
		</div>
		
		<div class='project-image' id='image_2'>
			b
		</div>
		<div class='project-text' id='text_2'>
			<p>2 Text</p>
			<p>2 Text</p>
			<p>2 Text</p>
		</div>
	</div>

	<div class='med-break'><br></div>

	<!-- <div class='project-box' id='box_3'>
		<div class='project-title' id='title_3'>
			<h3>3 Title</h3>
			<figcaption>3 Caption</figcaption>
		</div>
		<div class='project-image' id='image_3'>
			c
		</div>
		<div class='project-text' id='text_3'>
			<p>3 Text</p>
			<p>3 Text</p>
			<p>3 Text</p>
		</div>
	</div>

	<div class='med-break'><br></div>

	<div class='project-box' id='box_4'>
		<div class='project-title' id='title_4'>
			<h3>4 Title</h3>
			<figcaption>4 Caption</figcaption>
		</div>
		<div class='project-image' id='image_4'>
			d
		</div>
		<div class='project-text' id='text_4'>
			<p>4 Text</p>
			<p>4 Text</p>
			<p>4 Text</p>
		</div>
	</div> -->

	<div class="holdingbox">
		<div class='title'>
			aaa
		</div>
		<span class="leftbox">
			bbb
			<span class="content">ccc
			</span>
		</span>
		<span class="rightbox">></span>
	</div>


</div>
<div class='large-break'><br></div>
<?php
footer();
?>


<script>

	// $('.project-box').hover(function(event) {
	// 	var id = $(this).attr('id').split('_').pop();
	// 		// var textBox = $(this).parent().children('.project-text')['context'];
	// 		var parent = $(this).parent().attr('class');
	// 		event.stopPropagation();

	// 		if (parent == 'project-left-column') {
	// 			$('#text_'+id).animate({right:'100%'}, 300);
	// 			// $('#text_'+id).css('visibility','visible').show('slide', {direction: 'right'}, 500);
	// 		}
	// 		if (parent == 'project-right-column') {
	// 			$('#text_'+id).animate({left:'100%'}, 300);
	// 			// $('#text_'+id).css('visibility','visible').show('slide', {direction: 'left'}, 500);
	// 		}
	// 	}, function(event) {
	// 		var id = $(this).attr('id').split('_').pop();
	// 		var parent = $(this).parent().attr('class');
	// 		event.stopPropagation();

	// 		if (parent == 'project-left-column') {
	// 			// $('#text_'+id).animate({right:'0'}, 300);
	// 			$('#text_'+id).hide('slide', {direction: 'right'}, 500);
	// 		}
	// 		if (parent == 'project-right-column') {
	// 			// $('#text_'+id).animate({left:'0'}, 300);
	// 			$('#text_'+id).hide('slide', {direction: 'left'}, 500);
	// 		}
	// 	});

	// $('.project-box').hover(
	// 	function(event) {
	// 		var id = $(this).attr('id').split('_').pop();
	// 		var textBox = $(this).parent().children('.project-text')['context'];
	// 		// var parent = $(this).parent().attr('class');
	// 		// var image = $(this).closest().children('.project-image');
	// 		var imageWidth = $('#image_'+id).width();

	// 		// $('#image_'+id).show().animate({right:'100%'}, 300);

	// 		$('#image_'+id).show('slide', {direction: 'left'}, 500);
	// 		// $('#text_'+id).animate({right: '300px'}, 500);
	// 		$('#text_'+id).show('slide', {direction: 'left'}, 500);


	// 		console.log();

	// 	}, function(event) {
	// 		var id = $(this).attr('id').split('_').pop();
	// 		event.stopPropagation();

	// 		$('#image_'+id).hide('slide', {direction: 'left'}, 500);

	// 	// },
	// 	// function(event) {
	// 	// 	var id = $(this).attr('id').split('_').pop();
	// 	// 	var parent = $(this).parent().attr('class');
	// 	// 	event.stopPropagation();
	// });

	$('.holdingbox').hover(function(){
		// $('.leftbox').animate({width: '500px'}, 300);
		$('.leftbox').animate({width: '500px'}, 300);
	}, function(){
		$('.leftbox').animate({width: '0'}, 300);
	});


</script>

