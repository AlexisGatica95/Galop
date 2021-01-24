<div class="container full-center">
	<form action="" class="form-login max-w" method="POST">
		<label for="">
			<span><?= lang('App.registro.span_nombre') ?></span>
			<input type="text" class="form-input" name="nombre">
		</label>
		<label for="">
			<span><?= lang('App.registro.span_apellido') ?></span>
			<input type="text" class="form-input" name="apellido">
		</label>
		<label for="">
			<span><?= lang('App.registro.span_correo') ?></span>
			<input type="mail" class="form-input" name="mail">
		</label>
		<label for="">
			<span><?= lang('App.registro.span_contraseña') ?></span>
			<input type="password" class="form-input" name="password">
		</label>
		<label for="">
			<span><?= lang('App.registro.span_confirmar') ?></span>
			<input type="password" class="form-input" name="password_confirm">
		</label>
		<?php if (isset($validation)): ?>
		<div class="errores_form">
			<?= $validation->listErrors(); ?>
		</div>
		<?php endif ?>
		<div class="button">
			<input type="submit" class="form-button" value="registrarme">
		</div>
	</form>
</div>
