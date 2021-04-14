<div class="taxonomias">
	<?php foreach ($taxonomias as $taxonomia): ?>
	<div class="taxonomia">
		<div class="acc">
		    <div class="acc_head">
		        <h3><?=$taxonomia['nombre']->$locale?></h3>
		        <span class="acc_btn" data-toggle="<?=$taxonomia['slug']->$locale.$taxonomia['id']?>">✏️</span>
		    </div>
		    <div class="acc_cont" id="<?=$taxonomia['slug']->$locale.$taxonomia['id']?>">
		        <div class="lista">
					<?php foreach ($taxonomia['terms'] as $term): ?>
						<form action="" method="POST" class="termino termino<?=$term['id']?>">
							<input type="hidden" name="action" value="edit">
							<input type="hidden" name="id" value="<?=$term['id']?>">
							<?php foreach ($locales as $loc): ?>
								<img src="<?=base_url()?>/img/<?=$loc?>.png">
								<input type="text" class="input_<?=$term['id']?>" name="<?=$term['id']?>[<?=$loc?>]" value="<?=$term['nombre']->$loc?>" disabled>
							<?php endforeach ?>						
							<div class="edit_term" data-term="<?=$term['id']?>">✏️</div>
							<div class="delete_term" data-term="<?=$term['id']?>">&times;</div>
							<div class="save_term" data-term="<?=$term['id']?>"><input type="submit" value="Guardar"></div>
						</form>							
					<?php endforeach ?>
				</div>
				<div class="nuevo">
					<form action="" method="POST">
						<input type="hidden" name="action" value="new">
						<input type="hidden" name="taxonomia" value="<?=$taxonomia['id']?>">
						<?php foreach ($locales as $loc): ?>
							<img src="<?=base_url()?>/img/<?=$loc?>.png">
							<input type="text"name="new[<?=$loc?>]">
						<?php endforeach ?>	
						<input type="submit" value="Nuevo">
					</form>
				</div>
		    </div>
		</div>
	</div>
	<?php endforeach ?>
</div>