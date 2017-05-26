<?php
include('config/init.php');
navbar('Posts | Kelly Jung', 'Posts by Kelly', 'headerMain');
?>
<div class='main'>
	<div class='blogPosts'>
	<!-- <form action='' name='categories' method='post'> -->
		<ul>
			<?php
			// listPosts();
			listPostCategories()
			?>
		</ul>
	</div>
</div>
<?php footer(); ?>