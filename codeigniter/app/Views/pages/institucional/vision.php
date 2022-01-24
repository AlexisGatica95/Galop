<div class="container">
	<h1 class="titulo-principal">
	<?=lang("App.institucional.institucional")?></h1>
	<div class="content">
		<div class="about-left">
			<h3 class="subtitulo-principal"><?=ucfirst(lang("App.institucional.vision"))?></h3>
			<p>GALOP se constituye como un grupo cooperativo regional de peso global en el cáncer infantil llevando a cabo en forma cooperativa, ensayos clínicos y de laboratorio que permitan generar conocimiento de aplicación global en el área del cáncer infantil, transformándose en una red que vincule equipos multidisciplinarios en toda la región y se presente ante la sociedad como un interlocutor líder en su área. 
			</p>	
		</div>

		<?= view_cell('\App\Libraries\Components::submenu',['seccion'=>$seccion]) ?>
		
	</div>	
	
</div>