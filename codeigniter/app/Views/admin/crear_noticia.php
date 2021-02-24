<div class="crear_noticia">
	<h1><?= ucfirst(lang("Admin.noticia.titulo_crear"))?></h1>
	<div class="crear-noti-content d-flex">
		<form action="" method="post" id="nueva_noticia">
			<div class="main">
				<div class="title form-group">
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
				<div class="errors"></div>
			
			</div>
			<div class="sidebar">
				<div class="estado">
					<label for=""><h4><?= ucfirst(lang("Admin.sidebar_noticias.estado"))?></h4></label>
					<select name="estado" id="status">
						<option value="0"><?= ucfirst(lang("Admin.sidebar_noticias.privado"))?></option>
						<option value="1" selected><?= ucfirst(lang("Admin.sidebar_noticias.publico"))?></option>
						<option value="2"><?= ucfirst(lang("Admin.sidebar_noticias.papelera"))?></option>
					</select>

					<div class="d-flex justify-content-center ">
						<span id="guardar_noticia" class="boton-crear btn btn-1"><?= ucfirst(lang("Admin.noticia.crear"))?></span>
					</div>
				</div>
				
				<div class="idioma">
					<label for=""><h4><?= ucfirst(lang("Admin.sidebar_noticias.idioma"))?></h4></label>
					<select name="idioma_select" id="lang">
					<option value="" selected disabled><?= ucfirst(lang("Admin.sidebar_noticias.elegir"))?></option>
					<option value="es"><?= ucfirst(lang("Admin.sidebar_noticias.es"))?><img src="/img/es.png" alt=""></option>
					<option value="en"><?= ucfirst(lang("Admin.sidebar_noticias.en"))?><img src="/img/en.png" alt=""></option>
					<option value="pt"><?= ucfirst(lang("Admin.sidebar_noticias.pt"))?><img src="/img/pt.png" alt=""></option>
					</select>

					<label for="es_traduccion" class="es_traduccion">
						<input type="checkbox" name="es_traduccion" id="es_traduccion" onclick="traduccionDe()">
						<?= ucfirst(lang("Admin.sidebar_noticias.traduccion_check"))?>
					</label>

					<div class="traduccion" id="traduccion">
						<label class="traduccion_label">
							<h4><?= ucfirst(lang("Admin.sidebar_noticias.traduccion_de"))?></h4>
						</label>
						<select name="lang" id="traduccion_de">
							<option value="" selected disabled><?= ucfirst(lang("Admin.sidebar_noticias.elegir"))?></option>
							<?php foreach($notis as $noticia): ?>
							<option value="<?=$noticia['id']?>"><?=$noticia['title']?></option>
							<?php endforeach ?>  
						</select>
					</div>	
				</div>

			</div>
		</form>
	</div>
</div>