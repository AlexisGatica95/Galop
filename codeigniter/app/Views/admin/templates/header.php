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
	<link rel="stylesheet" href="/css/admin-styles.css?v=0">
	<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="/css/summernote.min.css"/>
	<link href="/css/slimselect.min.css" rel="stylesheet"></link>
	<?php if(isset($styles)): ?>
		<?php foreach($styles as $style): ?>
			<link rel="stylesheet" type="text/css" href="/css/<?=$style?>.css"/>
		<?php endforeach; ?>
	<?php endif; ?>
</head>
<body>
<div class="main_content">
	<div class="barra">
		
		<img src="/img/logo.png" class='logo' alt="GALOP">

		<button id="toggler">
					<!-- <span class="navbar-toggler-icon"></span> -->
					<span class="toggle-menu">&#9776;</span>
		</button>

		<ul class="menu_barra" id="navbarSupportedContent">
			<li class="dropdown">
				<span><?= ucfirst(lang("Admin.menu.protocolos"))?><img src="/img/arrow_down.png" alt=""></span>

				<ul class="dropdown_content">
					<li><a href="/<?=$locale?>/admin/protocolo"><?= ucfirst(lang("Admin.menu.nuevo"))?></a></li>
					<li><a href="/<?=$locale?>/admin/protocolos"><?= ucfirst(lang("Admin.menu.ver"))?></a></li>
					<li><a href="/<?=$locale?>/admin/categorias/protocolo"><?= ucfirst(lang("Admin.menu.categorias"))?></a></li>
				</ul>
			</li>
			<li class="dropdown">
				<span><?= ucfirst(lang("Admin.menu.noticias"))?><img src="/img/arrow_down.png" alt=""></span>
				
				<ul class="dropdown_content">
					<li><a href="/<?=$locale?>/admin/noticia"><?= ucfirst(lang("Admin.menu.nueva"))?></a></li>
					<li><a href="/<?=$locale?>/admin/noticias"><?= ucfirst(lang("Admin.menu.ver"))?></a></li>
					<li><a href="/<?=$locale?>/admin/categorias/noticia"><?= ucfirst(lang("Admin.menu.categorias"))?></a></li>
				</ul>
			</li>
			<li class="dropdown">
				<span><?= ucfirst(lang("Admin.menu.eventos"))?><img src="/img/arrow_down.png" alt=""></span>
				
				<ul class="dropdown_content">
					<li><a href="/<?=$locale?>/admin/evento"><?= ucfirst(lang("Admin.menu.nuevo"))?></a></li>
					<li><a href="/<?=$locale?>/admin/eventos"><?= ucfirst(lang("Admin.menu.ver"))?></a></li>
					<li><a href="/<?=$locale?>/admin/categorias/evento"><?= ucfirst(lang("Admin.menu.categorias"))?></a></li>
					<li><a href="/<?=$locale?>/admin/categorias/eventos"><?= ucfirst(lang("Admin.menu.categorias"))?></a></li>
				</ul>
			</li>
			<li class="dropdown">
				<span><?= ucfirst(lang("Admin.menu.usuarios"))?><img src="/img/arrow_down.png" alt=""></span>
				
				<ul class="dropdown_content">
					<li> <a href="/<?=$locale?>/admin/usuario"><?= ucfirst(lang("Admin.menu.nuevo"))?></a></li>
					<li> <a href="/<?=$locale?>/admin/usuarios"><?= ucfirst(lang("Admin.menu.ver"))?></a></li>
				</ul>
			</li>

			<li> 
				<a href="/<?=$locale?>/admin/configuraciones"><?= ucfirst(lang("Admin.menu.config"))?></a>
			<li>
			
			<li class="nav-item lang_switcher">
				<a href="<?php if (isset($ruta_es)){echo $ruta_es;} ?>" class="nav-link">
					<img src="/img/es.png" alt="espanol">
				</a>
				<a href="<?php if(isset($ruta_en)){echo($ruta_en);} ?>" class="nav-link">
					<img src="/img/en.png" alt="english">
				</a>
			</li>
		</ul>
		
	</div>

	<div class="contenido">

