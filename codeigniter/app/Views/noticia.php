<div class="container">
    <div class="noticias-content">
        <div class="noticia">
            <h1 class='noticia-titulo'><?= $noticia['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?><?= date("d/m/y G:i",strtotime($noticia['timestamp']))?></p>
            <p class='noticia-body'><?= $noticia['body']?></p>
        </div> 
    </div>

</div>