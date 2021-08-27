<div class="container">
	<div class="goback">
        <a href="<?=base_url()?>/protocolos">Volver a protocolos</a>
    </div>
    <div class="noticias-content">
        <div class="noticia">
            <h1 class='noticia-titulo'><?= $protocolo['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($protocolo['timestamp']))?></p>
            <div class='noticia-body'><?= $protocolo['body']?></div>
            <?php if(count($files) > 0): ?>
            <div class="archivos">
                <h3>Archivos adjuntos</h3>
                <?php foreach($files as $file): ?>
                    <?php
                        switch ($file->type) {
                            case 'invalid':
                                $btn_ver = false;
                                break;
                            
                            default:
                                $btn_ver = true;
                                break;
                        }
                    ?>
                    <div class="archivo">
                        <div class="acc">
                            <div class="acc_head">
                                <img src="<?=base_url()?>/img/file_<?=$file->type?>.png" alt="" class="filetype">
                                <h4><?=$file->name?></h4>
                                <span class="dl">
                                <a href="<?=base_url().$file->url?>" download><img src="<?=base_url()?>/img/btn_dl.png" alt="Descargar"></a>
                                </span>
                                <?php if($btn_ver): ?>
                                    <span class="acc_btn" data-toggle="file_<?=$file->id?>"><img src="<?=base_url()?>/img/btn_view.png" alt="Ver online"></span>
                                <?php endif; ?>                           
                            </div>
                            <div class="acc_cont" id="file_<?=$file->id?>">
<?php switch($file->type): ?>
<?php case 'image': ?>
<img src="<?=$file->url?>" alt="">
<?php break; ?>
<?php case 'pdf': ?>
<iframe src="https://grupogalop.org<?=$file->url?>" frameborder="0"></iframe>
<!--<iframe src="<?=base_url()?><?=$file->url?>" frameborder="0"></iframe>-->
<?php break; ?>
<?php case 'word': ?>
<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=https://grupogalop.org/<?=$file->url?>" frameborder="0"></iframe>
<!--<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?=base_url()?>files/file.odt" frameborder="0"></iframe>-->
<?php break; ?>
<?php case 'excel': ?>
<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=https://grupogalop.org/<?=$file->url?>" frameborder="0"></iframe>
<!--<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?=base_url()?>files/file.odt" frameborder="0"></iframe>-->
<?php break; ?>
<?php endswitch; ?>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
