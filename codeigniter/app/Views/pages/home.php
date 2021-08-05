<section class="slide_inicio">
	<?php 
	$session = \Config\Services::session();
	 ?>
	 <?php if (isset($session->success)): ?>
	 	<div class="alert alert-success text-center alert-dismissible fade show mb-0">
	 		<?= $session->success ?>
	 		<button type="button" class="close" data-dismiss="alert" aria-label="close">
	 			<span aria-hidden="true">&times;</span>
	 		</button>
	 	</div>
	 <?php endif ?>
	<div class="jumbotron">
		<img class="div_img_pc" src="/img/banner_1_pc.jpg" alt="GALOP">
		<img class="div_img_tb" src="/img/banner_1_tb.jpg" alt="GALOP">
		<img class="div_img_mb" src="/img/banner_1_mb.jpg" alt="GALOP">
		<div class="overlay">
		<h1>Grupo América Latina de Oncología Pediátrica</h1>
		</div>
	</div>
</section>
<section class="home_contenido">
	<div class="block eventos">
		<div class="container">
			<h2 class="titulo-principal">Eventos</h2>
			<div class="ultimas">

				<?php foreach($eventos as $evento): ?>
		        <div class="item">
		            <h4 ><?= $evento['title']?></h4>
		            <p class='item-body'><?= $evento['extracto']?></p>
		            <a  class='btn btn-1 sm' href="/<?=$locale?>/eventos/<?=$evento['slug']?>"><?=ucfirst(lang("App.noticia.ver_mas"))?></a>
		        </div>
		    	<?php endforeach ?>		
	    			
			</div>



    </div>
    <?php echo $paginacion ?>

		</div>
	</div>
</section>