<div class="crear-noti-content">
	<div class="crear-noticia">
		<h1><?= ucfirst(lang("Admin.noticia.titulo_crear"))?></h1>

		<form action="" method="post" class="">
			<div class="form-group">
				<label for="title"><?= ucfirst(lang("Admin.noticia.titulo"))?></label>
				<input type="text" name="title" class="form-control" id="title" value="">
			</div>
			<div class="form-group">
				<label for="body"><?= ucfirst(lang("Admin.noticia.contenido"))?></label>
				<textarea name="body" id="body" class="form-control summernote"></textarea>
			</div>
			<?php if ($_POST): ?>
			<?= \Config\Services::validation()->listErrors() ?>
			<?php endif ?>
			<div class="form-group d-flex justify-content-left ">
				<button type="submit"  class="boton-crear btn btn-1"><?= ucfirst(lang("Admin.noticia.crear"))?></button>
			</div>
		</form>		
	</div>			
</div>