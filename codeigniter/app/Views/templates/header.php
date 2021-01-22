<?php 
$uri = service('uri');
 ?>
<!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
	<title>GALOP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/styles.css?v=0">
	<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="/">
				<img src="/img/logo.png" alt="GALOP">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link hover_underline" href="/institucional/"><?= lang('App.menu_institucional') ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link hover_underline" href="/noticias/"><?= lang('App.menu_noticias') ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link hover_underline" href="/eventos/"><?= lang('App.menu_eventos') ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link hover_underline" href="/contacto/"><?= lang('App.menu_contacto') ?></a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item lang_switcher">
						<a href="" class="nav-link">
							<img src="/img/es.png" alt="espanol">
						</a>
						<a href="" class="nav-link">
							<img src="/img/en.png" alt="english">
						</a>
					</li>
					<li class="nav-item">
						<a href="/blog/create/" class="nav-link btn btn-1"><?= lang('App.menu_protocolos') ?></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dd-user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="/img/user.png" alt="User">
						</a>
						<div class="dropdown-menu" aria-labelledby="dd-user">
							<?php if (session()->get('isLoggedIn')): ?>
								<a class="dropdown-item" href="/<?= $locale ?>/mi-cuenta">Mi cuenta</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/<?= $locale ?>/logout">Cerrar sesi&oacute;n</a>
							<?php else: ?>
								<a class="dropdown-item" href="/<?= $locale ?>/registro">Registro</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/<?= $locale ?>/login">Iniciar sesi&oacute;n</a>
							<?php endif ?>
							
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>