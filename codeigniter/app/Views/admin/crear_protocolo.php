<div class="crear_noticia">
	<h1><?= ucfirst(lang("Admin.protocolo.".$titulo_vista))?></h1>
	<?php if (isset($post)): ?>
		<!-- <pre>
			<?php #var_dump($post) ?>
		</pre> -->
	<script>	
		const post_body = '<?php echo($post['body']) ?>';
		// console.log(post_body);
	</script>
	<?php endif; ?>
	<!-- <pre>
			<?php #var_dump($_POST) ?>
		</pre> -->
	<div class="crear-noti-content d-flex">
		<form action="" method="post" id="nueva_noticia">
			<div class="main">
				<div class="title form-group">
					<label for="title"><?= ucfirst(lang("Admin.noticia.titulo"))?></label>
					<input type="text" name="title" class="form-control" id="title" value="<?php if (isset($post)) {echo $post['title'];} ?>">
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

				<div class="estado bloque_panel">
					<label for=""><h4><?= ucfirst(lang("Admin.sidebar_noticias.estado"))?></h4></label>
					<select name="estado" id="status">
						<option value="0" <?php if (isset($post) && $post['status'] == "0") {echo 'selected';} ?>><?= ucfirst(lang("Admin.sidebar_noticias.privado"))?></option>
						<option value="1" <?php if (isset($post) && $post['status'] == "1") {echo 'selected';} ?>><?= ucfirst(lang("Admin.sidebar_noticias.publico"))?></option>
						<option value="2" <?php if (isset($post) && $post['status'] == "2") {echo 'selected';} ?>><?= ucfirst(lang("Admin.sidebar_noticias.papelera"))?></option>
					</select>

					<div class="d-flex justify-content-center ">
						<span id="guardar_noticia" class="boton-crear btn btn-1"><?= ucfirst(lang("Admin.noticia.crear"))?></span>
					</div>
				</div>
				
				<div class="idioma bloque_panel">
					<label for=""><h4><?= ucfirst(lang("Admin.sidebar_noticias.idioma"))?></h4></label>
					<select name="idioma_select" id="lang">
					<!-- <option value="" disabled><?= ucfirst(lang("Admin.sidebar_noticias.elegir"))?></option> -->
					<option value="es" <?php if (isset($post) && $post['lang'] == "es") {echo 'selected';} ?>><?= ucfirst(lang("Admin.sidebar_noticias.es"))?><img src="/img/es.png" alt=""></option>
					<option value="en" <?php if (isset($post) && $post['lang'] == "en") {echo 'selected';} ?>><?= ucfirst(lang("Admin.sidebar_noticias.en"))?><img src="/img/en.png" alt=""></option>
					<option value="pt" <?php if (isset($post) && $post['lang'] == "pt") {echo 'selected';} ?>><?= ucfirst(lang("Admin.sidebar_noticias.pt"))?><img src="/img/pt.png" alt=""></option>
					</select>

					<label for="es_traduccion" class="es_traduccion">
						<input type="checkbox" name="es_traduccion" id="es_traduccion" onclick="traduccionDe()" <?php if (isset($post) && $post['translation_of'] !== NULL) {echo 'checked';} ?>>
						<?= ucfirst(lang("Admin.sidebar_noticias.traduccion_check"))?>
					</label>

					<div class="traduccion " id="traduccion" <?php if (isset($post) && $post['translation_of'] != NULL) {echo 'style="display:block;"';} ?>>
						<label class="traduccion_label">
							<h4><?= ucfirst(lang("Admin.sidebar_noticias.traduccion_de"))?></h4>
						</label>
						<select name="traduccion_de" id="traduccion_de">
							<option value="" <?php if (!isset($post) || $post['translation_of'] == NULL) {echo 'selected';} ?> disabled><?= ucfirst(lang("Admin.sidebar_noticias.elegir"))?></option>
							<?php foreach($protocolos as $protocolo): ?>
							<option value="<?=$protocolo['id']?>" <?php if (isset($post) && $post['translation_of'] == $protocolo['id']) {echo 'selected';} ?>><?=$protocolo['title']?></option>
							<?php endforeach ?>  
						</select>
					</div>	
				</div>

				<?php foreach ($taxonomias as $taxonomia): ?>
				<div class="taxonomia bloque_panel">
					<h4><?=$taxonomia['nombre']?></h4>
					<div class="lista">
						<?php foreach ($taxonomia['terms'] as $term): ?>
							<label for="<?=$term['slug'].$term['id']?>">
								<input type="checkbox" id="<?=$term['slug'].$term['id']?>" name="terms[]" value="<?=$term['id']?>" <?php if (in_array($term['id'], $terms)) { echo "checked"; } ?>>
								<?=$term['nombre']?>
							</label>
						<?php endforeach ?>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</form>
	</div>
	<pre>
		<?php if(isset($insertID)){var_dump($insertID);} ?>
	</pre>
</div>