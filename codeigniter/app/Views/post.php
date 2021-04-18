<div class="container">
	<div class="goback">
        <a href="<?=base_url()?>/<?=$type?>s">Volver a <?=$type?>s</a>
    </div>
    <div class="noticias-content">
        <div class="noticia">
            <h1 class='noticia-titulo'><?= $post['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($post['timestamp']))?></p>
            <div class='noticia-body'><?= $post['body']?></div>
        </div>
    </div>
</div>