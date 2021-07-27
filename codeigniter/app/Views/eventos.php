<div class="container">
    <h1 class="titulo-principal"><?=ucfirst(lang('App.noticia.titulo_todas'))?></h1>
    <div class="noticias-content">
    <?php foreach($eventos as $evento): ?>
        <div class="item">
            <h3 class='item-titulo'><?= $evento['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($evento['timestamp']))?></p>
            <p class='item-body'><?= $evento['extracto']?></p>
            <a  class='btn btn-1 sm' href="/<?=$locale?>/noticias/<?=$evento['slug']?>"><?=ucfirst(lang("App.noticia.ver_mas"))?></a>
        </div>
    <?php endforeach ?>
    </div>
    <?php echo $paginacion ?>
  <!--   <pre>
        <?php #var_dump($test) ?>
    </pre> -->
</div>