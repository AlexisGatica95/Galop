<div class="container">
	<h1>Create new post</h1>
	<?php if ($_POST): ?>
		<?= \Config\Services::validation()->listErrors() ?>
	<?php endif ?>
	<form action="/blog/create" method="post" class="">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" id="title" value="">
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<textarea name="body" id="body" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Create</button>
		</div>
	</form>
</div>