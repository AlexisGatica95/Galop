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
</head>
<body>
<div class="barra">
	<img src="/img/logo.png" class='logo' alt="GALOP">
	<li class="menu-barra">
		<ul><a href="/admin/noticia"><?= ucfirst(lang("Admin.menu.titulo_crear"))?></a></ul>
		<ul><a href="/admin/ver/noticias"><?= ucfirst(lang("Admin.menu.noticias"))?></a></ul>
	</li>
	<li class="nav-item lang_switcher">
		<a href="<?php if (isset($ruta_es)){echo $ruta_es;} ?>" class="nav-link">
			<img src="/img/es.png" alt="espanol">
		</a>
		<a href="<?php if(isset($ruta_en)){echo($ruta_en);} ?>" class="nav-link">
			<img src="/img/en.png" alt="english">
		</a>
	</li>
</div>

<div class="contenido">

