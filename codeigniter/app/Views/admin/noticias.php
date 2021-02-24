<h1>Noticias</h1>
    <table class='w-100 noticias-tabla' >
        <tr>
            <th class='tbl-noti-checkbox'></th>
            <th class='tbl-noti-date'><?= ucfirst(lang("Admin.tabla.fecha"))?></th>
            <th class='tbl-noti-titulo'><?= ucfirst(lang("Admin.tabla.titulo"))?></th>
            <th class='tbl-noti-status'>idioma</th>
            <th class='tbl-noti-status'><?= ucfirst(lang("Admin.tabla.estado"))?></th>
        </tr>
        <?php foreach($noticias as $noticia): ?>
        <tr id="row_noticia">
        <td class="text-center tbl-noti-checkbox'"><input type="checkbox" id="<?= $noticia['id']?>"></td>
            <td class='tbl-noti-date'><?= date("d/m/y G:i",strtotime($noticia['timestamp']))?></td>
            <td class='tbl-noti-titulo'><?= $noticia['title']?></td>            
            <td class="text-center tbl-noti-status lenguaje" >
            <img class="lang" src="/img/<?=$noticia["lenguage"]?>.png" alt="<?=$noticia["lenguage"]?>">
            </td>
            <td class="text-center tbl-noti-status"><?= $noticia['status']?></td>
        </tr>
        <?php endforeach ?>  
    </table>

    <div class="pagination">
        <div>
           <a href="">< Anterior</a>
        </div>
        <div>
            <a href="" class="active">1</a>
            <a href="">2</a>
            <a href="">3</a>
        </div>
        <div>
            <a href=""> Siguiente ></a>
        </div>
    </div>