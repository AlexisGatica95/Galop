<div class="crear-noti-content">
	<div class="crear-noticia">
		<h1><?= ucfirst(lang("App.noticia.titulo_crear"))?></h1>
		<?php if ($_POST): ?>
			<?= \Config\Services::validation()->listErrors() ?>
		<?php endif ?>
		<form action="" method="post" class="">
			<div class="form-group">
				<label for="title"><?= ucfirst(lang("App.noticia.titulo"))?></label>
				<input type="text" name="title" class="form-control" id="title" value="">
			</div>
			<div class="form-group">
				<label for="body"><?= ucfirst(lang("App.noticia.contenido"))?></label>
				<textarea name="body" id="body" class="form-control"></textarea>
			</div>
			<div class="form-group d-flex justify-content-center ">
				<button type="submit" class="btn btn-1"><?= ucfirst(lang("App.noticia.crear"))?></button>
			</div>
		</form>		
	</div>			
</div>