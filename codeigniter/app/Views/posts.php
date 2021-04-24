<div class="container">
    <h1 class="titulo-principal"><?=ucfirst(lang('App.posts.plural_'.$type))?></h1>
    <div class="noticias-content">
    <?php foreach($posts as $post): ?>
        <div class="item">
            <h3 class='item-titulo'><?= $post['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($post['timestamp']))?></p>
            <p class='item-body'><?= $post['extracto']?></p>
            <a  class='btn btn-1 sm' href="<?=base_url()?>/<?=$locale?>/<?=$type?>s/<?=$post['slug']?>"><?=ucfirst(lang("App.noticia.ver_mas"))?></a>
        </div>
    <?php endforeach ?>
    </div>
    <?php echo $paginacion ?>
    <!-- <pre>
        <?php #var_dump($rutas_auto) ?>
    </pre> -->
</div>