<?php
include('config/init.php');
navbar('Projects');
?>

<link rel='stylesheet' type='text/css' href='/css/square-hover.css'/>
<div class='large-break'><br></div><br>
<div class='main' align='center'>
<!-- 	<div class='hover-container'>
		<div class='content'>
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
	<div class='project-left-block'>
		<div class='project-box' id='box_1'>
			<div class='project-image' id='image_1'>
				<p>1 Text </p>
				<p>1 Text </p>
				<p>1 Text </p>
			</div>
			<div class='project-text' id='text_1'>
				<h3>1 Title</h3>
				<figcaption>1 Caption</figcaption>
			</div>
		</div>


		<div class='med-break'><br></div>

		<div class='project-box' id='box_2'>
			<div class='project-image' id='image_2'>
				<h3>2 Title</h3>
				<figcaption>2 Caption</figcaption>
			</div>
			<div class='project-text' id='text_2'>
				<p>2 Text </p>
				<p>2 Text </p>
				<p>2 Text </p>
			</div>
		</div>
	</div>

	<div class='project-middle-block'></div>

	<div class='project-right-block'>

		<div class='project-box' id='box_3'>
			<div class='project-image' id='image_3'>
				<h3>3 Title</h3>
				<figcaption>3 Caption</figcaption>
			</div>
			<div class='project-text' id='text_3'>
				<p>3 Text </p>
				<p>3 Text </p>
				<p>3 Text </p>
			</div>
		</div>

		<div class='med-break'><br></div>

		<div class='project-box' id='box_4'>
			<div class='project-image' id='image_4'>
				<h3>4 Title</h3>
				<figcaption>4 Caption</figcaption>
			</div>
			<div class='project-text' id='text_4'>
				<p>4 Text </p>
				<p>4 Text </p>
				<p>4 Text </p>
			</div>
		</div>

	</div>




	<div class='large-break'><br></div>
	<?php
	footer();
	?>


	<script>

		// $('.project-box').hover(function(event) {
		// 	var boxId = $(this).parent().attr('id'); //.split('_').pop();

		// 	$(this).parent().children('.project-text').toggleClass('hidden');
		// 	// $(this).parent().children('.project-text').css('visibility', 'visible');
		// });

		
		// $(function() {
		// });

		$('.project-box').hover(function(event) {
			var id = $(this).attr('id').split('_').pop();
			var textBox = $(this).parent().children('.project-text')['context'];
			var parent = $(this).parent().attr('class');

			if (parent == 'project-left-block') {
				$('#text_'+id).animate({'right':'200px'});
			}
			if (parent == 'project-right-block') {
				$('#text_'+id).animate({'left':'200px'});
			}

		}, function(event) {
			var id = $(this).attr('id').split('_').pop();
			var textBox = $(this).parent().children('.project-text')['context'];
			var parent = $(this).parent().attr('class');

			if (parent == 'project-left-block') {
				$('#text_'+id).animate({'right':'0px'}, 'fast');
			}
			if (parent == 'project-right-block') {
				$('#text_'+id).animate({'left':'0px'}, 'fast');
			}
		}
		);


	</script>