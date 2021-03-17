<div class="container">
	<pre>
		<?php var_dump($_SESSION) ?>
	</pre>
	<form id="form-reg" class="galop_form" enctype="multipart/form-data" action="" method="POST" autocomplete="off">
		<label class="full">
			<h3><?= lang('App.registro.registro_galop'); ?></h3>
		</label>
		<label for="nombre" class="">
			<span><?= lang('App.registro.span_nombre'); ?></span>
			<input type="text" name="nombre" required>
		</label>
		<label for="apellido" class="">
			<span><?= lang('App.registro.span_apellido'); ?></span>
			<input type="text" name="apellido">
		</label>
		<label for="mail" class="">
			<span><?= lang('App.registro.span_correo'); ?></span>
			<input type="text" name="mail" required>
		</label>
		<label for="genero" class="">
			<span><?= lang('App.registro.span_genero'); ?></span>
			<select name="genero" id="sel_genero">
				<option value="" disabled selected><?= lang('App.registro.option_seleccionar'); ?>...</option>
				<option value="m"><?= lang('App.registro.option_masc'); ?></option>
				<option value="f"><?= lang('App.registro.option_fem'); ?></option>
				<option value="otro"><?= lang('App.registro.option_otro'); ?></option>
			</select>
		</label>
		<label for="ano_nacimiento" class="sm">
			<span><?= lang('App.registro.span_ano_nacimiento'); ?></span>
			<select name="ano_nacimiento" id="sel_ano_nacimiento">
				<option value="" disabled selected><?= lang('App.registro.option_elegir'); ?>...</option>
				<?php for ($i=2002; $i > 1920; $i--) { 
					echo "<option value='".$i."'>".$i."</option>";
				} ?>
			</select>
		</label>
		<label for="pais_residencia" class="">
			<span><?= lang('App.registro.span_residencia_pais'); ?></</span>
			<select name="pais_residencia" id="sel_pais_residencia">
				<option value="" disabled selected><?= lang('App.registro.option_seleccionar'); ?>...</option>
				<?php foreach ($countries as $c): ?>
					<option value="<?php echo($c) ?>"><?php echo $c; ?></option>
				<?php endforeach ?>
			</select>
		</label>
		<label for="ciudad_residencia" class="">
			<span><?= lang('App.registro.span_residencia_ciudad'); ?></span>
			<input type="text" name="ciudad_residencia" required>
		</label>
		<div class="dir_laboral">
			<label class="dir_trabajo full">
				<h5><?= lang('App.registro.direccion_prof'); ?></h5>
			</label>
			<label for="dir_trabajo_calle" class="">
				<span><?= lang('App.registro.span_calle'); ?></span>
				<input type="text" name="dir_trabajo_calle" required>
			</label>
			<label for="dir_trabajo_numero" class="sm">
				<span><?= lang('App.registro.span_numero'); ?></span>
				<input type="text" name="dir_trabajo_numero" required>
			</label>
			<label for="dir_trabajo_CP" class="sm">
				<span>CP</span>
				<input type="text" name="dir_trabajo_CP" required>
			</label>
			<label for="dir_trabajo_ciudad" class="">
				<span><?= lang('App.registro.span_ciudad'); ?></span>
				<input type="text" name="dir_trabajo_ciudad" required>
			</label>
			<label for="dir_trabajo_pais" class="">
				<span><?= lang('App.registro.span_pais'); ?></span>
				<select name="dir_trabajo_pais" id="sel_dir_trabajo_pais">
					<option value="" disabled selected><?= lang('App.registro.option_seleccionar'); ?>...</option>
					<?php foreach ($countries as $c): ?>
						<option value="<?php echo($c) ?>"><?php echo $c; ?></option>
					<?php endforeach ?>
				</select>
			</label>
		</div>	
		<label for="hospital" class="">
			<span>Hospital / <?= lang('App.registro.span_centro_donde_trabaja'); ?></span>
			<input type="text" name="hospital" required>
		</label>
		<label for="cargo" class="">
			<span><?= lang('App.registro.span_cargo'); ?></span>
			<input type="text" name="cargo" required>
		</label>
		<label for="especialidad" class="">
			<span><?= lang('App.registro.span_especialidad'); ?></span>
			<select name="especialidad" id="sel_especialidad">
				<option value="" disabled selected><?= lang('App.registro.option_seleccionar'); ?>...</option>
				<?php $especialidades = array(
					array("Oncología pediátrica","oncologia-pediatrica"),
					array("Cirugía pediátrica","cirugia-pediatrica"),
					array("Radioterapia","radioterapia"),
					array("Investigación básica/traslacional","investigacion-basica/trasacional"),
					array("Manejo de datos","manejo-de-datos"),
					array("Enfermería","enfermeria"),
					array("Psicosocial","psicosocial"),
					array("Cirugía ortopédica","cirugia-ortopedica"),
					array("Oftalmología","oftalmologia"),
					array("Patología","patologia"),
					array("Otro","otro")
				); ?>
				<?php foreach ($especialidades as $esp): ?>
				<option value="<?php echo($esp[0]) ?>"><?php echo $esp[0]; ?></option>
				<?php endforeach ?>
			</select>
		</label>
		<label for="organizaciones" class="">
			<span><?= lang('App.registro.span_forma_parte'); ?></span>
			<select name="organizaciones[]" id="sel_organizaciones" multiple>
					<?php $orgas = ["SIOP","SLAOP","CLEHOP","ASCO","COG","SOBOPE","AMHOP","ACHOP","GATLA","SAHOP","AHOPCA"] ?>
					<?php foreach ($orgas as $orga): ?>
					<option name="organizaciones[]" value="<?=$orga;?>"><?=$orga;?></option>
					<?php endforeach ?>
					<!-- <option name="organizaciones[]" value="otra">Otra</option> -->
			</select>
		</label>
		<label for="interes" class="full">
			<span><?= lang('App.registro.span_areas_de_interes'); ?></span>
			<?php $areas = ["Leucemias agudas","Leucemias crónicas","Linfoma no Hodgkin", "Linfoma de Hodgkin","Tumores del SNC","Sarcoma de Ewing","Osteosarcoma","Retinoblastoma","Tumores germinales malignos","Tumores hepáticos","Tumores neuroblásticos","Tumores raros","Sarcomas de partes blandas","Histiocitosis","Tumores renales","Epidemiología","Ciudados de sostén","Psicosocial","Enfermería","Transplante de progenitores hematopoyéticos"] ?>
			<div class="opciones">
				<?php $j = 1;
				$c1 = "";
				$c2 = "";
				$c3 = ""; ?>
			<?php foreach ($areas as $area): ?>
			<?php 	
			$cn = "c".$j;
			$$cn .= '<label>
					<input type="checkbox" name="interes[]" value="'.$area.'">
					'.$area.'
				</label>';
				?>
				<?php 	
				switch ($j) {
				case 1:
					$j = 2;
					break;
				case 2:
					$j = 3;
					break;
				case 3:
					$j = 1;
					break;
				} ?>					
			<?php endforeach ?>
				<div class="col">
					<?php echo $c1; ?>
				</div>
				<div class="col">
					<?php echo $c2; ?>
				</div>
				<div class="col">
					<?php echo $c3; ?>
				</div>	
			</div>				
		</label>
			
		<label for="contrasena" class="">
			<span><?= lang('App.registro.span_pass'); ?></span>
			<input type="password" name="contrasena" required>
		</label>
		<label for="contrasena2" class="">
			<span><?= lang('App.registro.span_confirmar_pass'); ?></span>
			<input type="password" name="contrasena2" required>
		</label>
		
		<label for="consent_contacto" class="full">
			<input type="checkbox" name="consent_contacto" value="true">
			<span><?= lang('App.registro.span_permiso'); ?></span>
		</label>
		<input type="hidden" value="0" name="">
		<div class="bottom">
			<div class="errores_form">
			<?php if (isset($validation)): ?>
				<?= $validation->listErrors(); ?>
			<?php endif ?>
			</div>
			<!-- <input class="g-recaptcha form-button" data-sitekey="<?php #echo(CAPTCHA_SITE_KEY_) ?>" data-callback='sendForm' type="submit" value="Registrarme"> -->
			<span class="form-button" id="send_form"><?= lang('App.registro.span_registrarme'); ?></span>
		</div>
	</form>
</div>
