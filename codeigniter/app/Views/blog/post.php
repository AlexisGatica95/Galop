<section>
	<article class="blog-post">
		<div class="container">
			<h1><?= $post['title'] ?></h1>
			<div class="details">
				Posted on: <?= date('d M Y',strtotime($post['timestamp'])) ?> by Ari
			</div>
			<p><?= $post['body'] ?></p>
		</div>
	</article>
</section>