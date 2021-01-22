<div class="bloque-form">
	<form action="" class="form-login max-w" method="POST">
		<label for="">
			<span>Nombre</span>
			<input type="text" class="form-input" name="nombre">
		</label>
		<label for="">
			<span>Apellido</span>
			<input type="text" class="form-input" name="apellido">
		</label>
		<label for="">
			<span>Mail</span>
			<input type="mail" class="form-input" name="mail">
		</label>
		<label for="">
			<span>Password</span>
			<input type="password" class="form-input" name="password">
		</label>
		<label for="">
			<span>Password confirm</span>
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
