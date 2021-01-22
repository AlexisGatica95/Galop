<div class="content">

	<form class="form-contacto max-w-top" action="" method="POST">
		<span><?= lang('App.contacto.span_nombre') ?></span>
		<input class="name" type="text" name="name">
		<span><?= lang('App.contacto.span_correo') ?></span>
		<input class="mail" type="text" name="mail">
		<span><?= lang('App.contacto.span_mensaje') ?></span>
		<textarea class="contact-text-area" name="textarea"></textarea>
		<?php if (isset($validation)): ?>
		<div class="errores_form">
			<?= $validation->listErrors(); ?>
		</div>
		<?php endif ?>
		<div class="button">
			<input class="contacto" type="submit" value=<?= lang('App.contacto.enviar') ?>>
		</div>
	</form>


</div>