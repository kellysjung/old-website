<?php
include('config/init.php');
newHeader('Projects');
?>
<script>

$('.project-box').click(function() {
	console.log('aaa');
});
$('.project-left-text').hover(function() {
	console.log('bb');
});


</script>
<!-- <link rel='stylesheet' type='text/css' href='/css/square-hover.css'/> -->
<div class='large-break'><br></div>
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

		<div class='project-left-text'>
			<p>1 Text </p>
			<p>1 Text </p>
			<p>1 Text </p>
		</div>
		<div class='project-box'>
			<h3>1 Title</h3>
			<figcaption>1 Caption</figcaption>
		</div>

		<div class='med-break'><br></div>

		<div class='project-left-text'>
			<p>2 Text </p>
			<p>2 Text </p>
			<p>2 Text </p>
		</div>
		<div class='project-box'>
			<h3>2 Title</h3>
			<figcaption>2 Caption</figcaption>
		</div>
	</div>

	<div class='project-middle-block'></div>

	<div class='project-right-block'>

		<div class='project-box'>
			<h3>3 Title</h3>
			<figcaption>3 Caption</figcaption>
		</div>
		<div class='project-right-text'>
			<p>3 Text </p>
			<p>3 Text </p>
			<p>3 Text </p>
		</div>

		<div class='med-break'><br></div>

		<div class='project-box'>
			<h3>4 Title</h3>
			<figcaption>4 Caption</figcaption>
		</div>
		<div class='project-right-text'>
			<p>4 Text </p>
			<p>4 Text </p>
			<p>4 Text </p>
		</div>

	</div>





</div>
<div class='large-break'><br></div>
<?php
newFooter();
