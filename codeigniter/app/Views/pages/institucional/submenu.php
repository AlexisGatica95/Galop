		<ul class="buttons-right">
		<li >
			<a class="<?php if ($seccion=='quienes-somos') {echo "active";} ?>" href="/<?=$locale?>/institucional/quienes-somos"><?=lang("App.institucional.quienesSomos")?></a>
		</li>
		<li>
			<a class="<?php if ($seccion=='autoridades') {echo "active";} ?>" href="/<?=$locale?>/institucional/autoridades"><?=ucfirst(lang("App.institucional.autoridades"))?></a>
		</li>
		<li>
			<a class="<?php if ($seccion=='mision') {echo "active";} ?>" href="/<?=$locale?>/institucional/mision"><?=ucfirst(lang("App.institucional.mision"))?></a>
		</li>
		<li>
			<a class="<?php if ($seccion=='vision') {echo "active";} ?>" href="/<?=$locale?>/institucional/vision"><?=ucfirst(lang("App.institucional.vision"))?></a>
		</li>
		<li>
			<a class="<?php if ($seccion=='objetivos') {echo "active";} ?>" href="/<?=$locale?>/institucional/objetivos"><?=ucfirst(lang("App.institucional.objetivos"))?></a>
		</li>
		<li>
			<a class="<?php if ($seccion=='estrategia') {echo "active";} ?>" href="/<?=$locale?>/institucional/estrategia"><?=ucfirst(lang("App.institucional.estrategia"))?></a>
		</li>