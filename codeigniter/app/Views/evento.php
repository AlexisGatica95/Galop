<div class="container">
    <div class="noticias-content">
        <div class="noticia">
            <h1 class='noticia-titulo'><?= $evento['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($evento['timestamp']))?></p>
            <div class='noticia-body'><?= $evento['body']?></div>
        </div>
    </div>
</div>