<div class="container">
	<h1 class="titulo-principal">
	<?=lang("App.institucional")?></h1>
	<div class="content">
		<div class="about-left">
			<h3 class="subtitulo-principal"><?=ucfirst(lang("App.institucional.estrategia"))?></h3>
			<iframe class="visualizar_doc" src="/recursos/GALOP-Estrategia.pdf">This browser does not support PDFs. Please download the PDF to view it:</iframe>
			<a download href="/recursos/GALOP-Estrategia.pdf"><?=ucfirst(lang("App.institucional.descarga_pdf"))?></a>
		</div>
		<ul class="buttons-right">
		<li >
			<a class="" href="/<?=$locale?>/institucional/quienes-somos"><?=lang("App.institucional.institucional")?></a>
		</li>
		<li>
			<a class="" href="/<?=$locale?>/institucional/autoridades"><?=ucfirst(lang("App.institucional.autoridades"))?></a>
		</li>
		<li>
			<a class="" href="/<?=$locale?>/institucional/mision"><?=ucfirst(lang("App.institucional.mision"))?></a>
		</li>
		<li>
			<a class="" href="/<?=$locale?>/institucional/vision"><?=ucfirst(lang("App.institucional.vision"))?></a>
		</li>
		<li>
			<a class="" href="/<?=$locale?>/institucional/objetivos"><?=ucfirst(lang("App.institucional.objetivos"))?></a>
		</li>
		<li>
			<a class="active" href="/<?=$locale?>/institucional/estrategia"><?=ucfirst(lang("App.institucional.estrategia"))?></a>
		</li>
		
	</div>	
	
</div>