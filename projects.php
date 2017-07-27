<?php
include('config/init.php');
navbar('Projects');
?>

<div class='large-break'><br></div><br>
<div class='main' align='center'>
<!-- 	<div class='hover-container'>
		<div class='content' style='display: none'>
			<div class='grid'>
				<figure class='effect-bubba'>
					<img src='/images/default-map-img.png' alt='Default Map'/>
					<figcaption>
						<h2>2<span>Title</span></h2>
						<p>Caption caption caption caption caption caption caption caption caption caption caption caption caption caption caption caption caption caption caption caption.</p>
						<a href='#'>View more</a>
					</figcaption>
				</figure>
			</div>
		</div>
	</div> -->

	<div class='project-left-column'>
		<div class='project-box' id='box_1'>
			<div class='project-image' id='image_1' style='float: right'>
				<h3>Task List</h3>
				<figcaption>Javascript, PHP, MySQL</figcaption>
			</div>
			<div class='project-text' id='text_1' style='float: left'>
				<p><strong>Main features include:</strong></p>
				<p>- color customization</p>
				<p>- drag and drops for lists and tasks</p>
				<p>- ability to hide or minimize lists</p>
				<p>- connection to database to save elements and their orders</p>
			</div>
		</div>

		<div class='med-break'><br></div>

		<div class='project-box' id='box_2'>
			<div class='project-image' id='image_2' style='float: right'>
				<h3>2 Title</h3>
				<figcaption>2 Caption</figcaption>
			</div>
			<div class='project-text' id='text_2' style='float: left'>
				<p>2 Text</p>
				<p>2 Text</p>
				<p>2 Text</p>
			</div>
		</div>

	</div>

	<div class='middle-column'>
	</div>

	<div class='project-right-column'>
		<div class='project-box' id='box_3'>
			<div class='project-image' id='image_3' style='float: left'>
				<h3>3 Title</h3>
				<figcaption>3 Caption</figcaption>
			</div>
			<div class='project-text' id='text_3' style='float: right'>
				<p>3 Text</p>
				<p>3 Text</p>
				<p>3 Text</p>
			</div>
		</div>

		<div class='med-break'><br></div>

		<div class='project-box' id='box_4'>
			<div class='project-image' id='image_4' style='float: left'>
				<h3>4 Title</h3>
				<figcaption>4 Caption</figcaption>
			</div>
			<div class='project-text' id='text_4' style='float: right'>
				<p>4 Text</p>
				<p>4 Text</p>
				<p>4 Text</p>
			</div>
		</div>
	</div>




	<div class='large-break'><br></div>
	<?php
	footer();
	?>


	<script>

		$('.project-box').hover(function(event) {
			var id = $(this).attr('id').split('_').pop();
			// var textBox = $(this).parent().children('.project-text')['context'];
			var parent = $(this).parent().attr('class');
			event.stopPropagation();

			if (parent == 'project-left-column') {
				// $('#text_'+id).animate({right:'100%'}, 300);
				$('#text_'+id).css('visibility','visible').show('slide', {direction: 'right'}, 500);
			}
			if (parent == 'project-right-column') {
				// $('#text_'+id).animate({left:'100%'}, 300);
				$('#text_'+id).css('visibility','visible').show('slide', {direction: 'left'}, 500);
			}
		}, function(event) {
			var id = $(this).attr('id').split('_').pop();
			var parent = $(this).parent().attr('class');
			event.stopPropagation();

			if (parent == 'project-left-column') {
				// $('#text_'+id).animate({right:'0'}, 300);
				$('#text_'+id).hide('slide', {direction: 'right'}, 500);
			}
			if (parent == 'project-right-column') {
				// $('#text_'+id).animate({left:'0'}, 300);
				$('#text_'+id).hide('slide', {direction: 'left'}, 500);
			}
		});

		
	</script>

