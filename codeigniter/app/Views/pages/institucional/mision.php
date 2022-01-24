<div class="container">
	<h1 class="titulo-principal">
	<?=lang("App.institucional.institucional")?></h1>
	<div class="content">
		<div class="about-left">
			<h3 class="subtitulo-principal"><?=ucfirst(lang("App.institucional.mision"))?></h3>
			<p>La misión de GALOP es curar, prevenir y estimular el diagnóstico precoz del cáncer en la niñez y la adolescencia a través de pautas científicas y cuidados compasivos.
			</p>	
		
		</div>
		
		<?= view_cell('\App\Libraries\Components::submenu',['seccion'=>$seccion]) ?>
		
	</div>	
	
</div>