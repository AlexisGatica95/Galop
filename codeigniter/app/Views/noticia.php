<div class="container">
    <div class="goback">
        <a href="<?=base_url()?>/noticias"><?=ucfirst(lang("App.noticia.volver"))?></a>
    </div>
    <div class="noticias-content">
        <div class="noticia">
            <h1 class='noticia-titulo'><?= $noticia['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($noticia['timestamp']))?></p>
            <div class='noticia-body'><?= $noticia['body']?></div>
        </div>
    </div>
</div>