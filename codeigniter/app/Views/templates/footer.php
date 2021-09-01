</div>
<div class="footer">
	<div class="container">
		<div class="col logo">
			<img src="/img/galop_logo_2.jpg" alt="GALOP logo">
		</div>
		<div class="col">
			<ul class="menu">
				<li>
					<a class="hover_underline" href="/<?=$locale?>/institucional/"><?= lang('App.institucional.institucional') ?></span></a>
				</li>
				<li>
					<a class="hover_underline" href="/<?=$locale?>/noticias/"><?= lang('App.noticias') ?></a>
				</li>
				<li>
					<a class="hover_underline" href="/<?= $locale ?>/eventos"><?= lang('App.eventos') ?></a>
				</li>
				<li style="margin-bottom: 15px;">
					<a href="/<?= $locale ?>/contacto" class="hover_underline"><?= lang('App.contacto.contacto') ?></a>
				</li>
				<li style="margin-bottom: 10px;">
				<?php if (session()->get('isLoggedIn')): ?>
					<a href="/<?= $locale ?>/protocolos" class="nav-link btn btn-1"><?= lang('App.protocolos') ?></a>	
				<?php else: ?>
					<a href="/<?= $locale ?>/registro" class="nav-link btn btn-1"><?= lang('App.hazte_miembro')?></a>
				<?php endif ?>
				</li>
				<li class="lang_switcher">
					<a href="<?php if (isset($ruta_es)){echo $ruta_es;} ?>">
						<img src="/img/es.png" alt="espanol">
					</a>
					<a href="<?php if(isset($ruta_en)){echo($ruta_en);} ?>">
						<img src="/img/en.png" alt="english">
					</a>
				</li>
			</ul>
		</div>
		<!-- <div class="col">
			<ul class="actions">
				<li>
				<?php if (session()->get('isLoggedIn')): ?>
					<a href="#" class="nav-link btn btn-1"><?= lang('App.protocolos') ?></a>	
				<?php else: ?>
					<a href="#" class="nav-link btn btn-1"><?= lang('App.hazte_miembro')?></a>
				<?php endif ?>
				</li>
				<li>
				<a href="#" class="nav-link btn btn-1"><?= lang('App.contacto.contacto') ?></a>
				</li>
			</ul>
		</div> -->
	</div>
</div>
<script>
	const cSK = '<?=getenv('captcha.sitekey')?>';
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="text/javascript" src="/slick/slick.min.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<?php if(isset($scripts)): ?>
	<?php foreach($scripts as $script): ?>
		<script type="text/javascript" src="/js/<?=$script?>.js"></script>
	<?php endforeach; ?>
<?php endif; ?>
</body>
</html>