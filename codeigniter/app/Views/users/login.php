<div class="container full-center">
	<?php if (session()->get('success')): ?>
	<div class="success notification">
		<?= session()->get('success') ?>
	</div>
	<?php endif ?>
	
	<form class="form-login galop_form max-w" action="" method="POST">
		<label for="mail" class="full">
			<span><?= lang('App.login.span_correo') ?></span>
			<input type="text" name="mail" class="form-input">
		</label>
		<label for="password" class="full">
			<span><?= lang('App.login.span_contraseña') ?></span>
			<input type="password" name="password" class="form-input">
		</label>
		<?php if (isset($validation)): ?>
		<div class="errores_form">
			<?= $validation->listErrors(); ?>
		</div>
		<?php endif ?>
		<div class="bottom">
			<input class="form-button" type="submit" value=<?= lang('App.login.enter') ?>>
		</div>
	</form>
</div>