<div class="container">
<h1 class="titulo-principal">Noticias</h1>
    <div class="noticias-content">
    <?php foreach($noticias as $noticia): ?>
        <div class="item">
            <h3 class='item-titulo'><?= $noticia['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($noticia['timestamp']))?></p>
            <p class='item-body'><?= $noticia['extracto']?></p>
            <a  class='btn btn-1' href="/<?=$locale?>/noticias/<?=$noticia['slug']?>"><?=ucfirst(lang("App.noticia.ver_mas"))?></a>
        </div>
        
        
    <?php endforeach ?>
    <div class="paginacion">

    </div>
    </div>

</div>