<div class="container">
	<h1 class="titulo-principal">
	<?=lang("App.institucional.institucional")?></h1>
	<div class="content">
		<div class="about-left">
			<h3 class="subtitulo-principal"><?=ucfirst(lang("App.institucional.estrategia"))?></h3>
			<iframe class="visualizar_doc" src="/recursos/GALOP-Estrategia.pdf">This browser does not support PDFs. Please download the PDF to view it:</iframe>
			<a download href="/recursos/GALOP-Estrategia.pdf"><?=ucfirst(lang("App.institucional.descarga_pdf"))?></a>
		</div>
		
		<?= view_cell('\App\Libraries\Components::submenu',['seccion'=>$seccion]) ?>
		
	</div>	
	
</div>