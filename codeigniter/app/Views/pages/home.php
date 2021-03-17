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
		<img src="/img/banner_1_pc.jpg" alt="GALOP">
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
				<div class="item">
					<h4>Evento de ejemplo</h4>
					<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae, alias. Perferendis libero nulla, p...</p>
					<a href="#" class="btn btn-1">Leer más</a>
				</div>
				<div class="item">
					<h4>Evento anterior</h4>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto nulla, iure velit nam possimus p...</p>
					<a href="#" class="btn btn-1">Leer más</a>
				</div>
				<div class="item">
					<h4>Titulo de evento</h4>
					<p>Recusandae nesciunt omnis architecto officia debitis odit adipisci, dolorem laudantium tempora susci...</p>
					<a href="#" class="btn btn-1">Leer más</a>
				</div>
			</div>
		</div>
	</div>
</section>