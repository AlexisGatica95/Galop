<?php 
$uri = service('uri');
 ?>
<!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
	<title>GALOP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="/favicon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
	<?php if(isset($styles)): ?>
		<?php foreach($styles as $style): ?>
			<link rel="stylesheet" type="text/css" href="/css/<?=$style?>.css"/>
		<?php endforeach; ?>
	<?php endif; ?>
	<link rel="stylesheet" href="/css/styles.css?v=0">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="/">
				<img src="/img/logo.png" alt="GALOP">
			</a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<!-- <span class="navbar-toggler-icon"></span> -->
				<span class="toggle-menu"><?= ucfirst(lang("App.menu")) ?></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link hover_underline" href="/<?=$locale?>/institucional/"><?= lang('App.menu_institucional') ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link hover_underline" href="/<?=$locale?>/noticias/"><?= lang('App.menu_noticias') ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link hover_underline" href="#"><?= lang('App.menu_eventos') ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link hover_underline" href="<?php if (isset($locale)){echo "/".$locale;} ?>/contacto/"><?= lang('App.menu_contacto') ?></a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item lang_switcher">
						<a href="<?php if (isset($ruta_es)){echo $ruta_es;} ?>" class="nav-link">
							<img src="/img/es.png" alt="espanol">
						</a>
						<a href="<?php if(isset($ruta_en)){echo($ruta_en);} ?>" class="nav-link">
							<img src="/img/en.png" alt="english">
						</a>
					</li>
					
					<li class="nav-item">
							<?php if (session()->get('isLoggedIn')): ?>
								<a href="#" class="nav-link btn btn-1"><?= lang('App.menu_protocolos') ?></a>	
							<?php else: ?>
								<a href="#" class="nav-link btn btn-1"><?= lang('App.menu_hazte_miembro')?></a>
							<?php endif ?>

						
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
								<a class="dropdown-item" href="/<?= $locale ?>/registro"><?= ucfirst(lang("App.menu_registro")) ?></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/<?= $locale ?>/login"><?= ucfirst(lang("App.menu_login")) ?></a>
							<?php endif ?>
							
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>