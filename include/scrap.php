<?php
function listPosts() {
	$posts = dbQuery("SELECT * FROM blog_posts")->fetchAll();
	foreach ($posts as $post) {
		if ($post['category'] == 'Life'){
			echo '<h4>Life</h4>';
			$catLife = dbQuery("SELECT * FROM blog_posts WHERE category = 'Life'")->fetchAll();
			foreach ($catLife as $life) {
				echo '<a href="view-post.php?postId='.$life['postId'].'">'.$life['title'].'</a><hr>';
			};

		} elseif ($post['category'] == 'Food'){
			echo '<h4>Food</h4>';
			$catFood = dbQuery("SELECT * FROM blog_posts WHERE category = 'Food'")->fetchAll();
			foreach ($catFood as $food) {
				echo '<a href="view-post.php?postId='.$food['postId'].'">'.$food['title'].'</a><hr>';
			};
			
		} elseif ($post['category'] == 'Coding'){
			echo '<h4>Coding</h4>';
			$catCoding = dbQuery("SELECT * FROM blog_posts WHERE category = 'Coding'")->fetchAll();
			foreach ($catCoding as $coding) {
				echo '<a href="view-post.php?postId='.$coding['postId'].'">'.$coding['title'].'</a><hr>';
			};
			
		} elseif ($post['category'] == 'Other'){
			echo '<h4>Other</h4>';
			$catOther = dbQuery("SELECT * FROM blog_posts WHERE category = 'Other'")->fetchAll();
			foreach ($catOther as $Other) {
				echo '<a href="view-post.php?postId='.$Other['postId'].'">'.$Other['title'].'</a><hr>';
			};
		};
	};
}