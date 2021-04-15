<h1>Noticias</h1>
    <div class="">
        <form action="<?=$_SERVER['PATH_INFO']?>" method="GET" id="query_form">
            <div class="header_admin">
              <div class="column_filtro_left d-flex flex-column">
                    <label><h4><?= ucfirst(lang("Admin.tabla.estado"))?></h4></label>
                    <select name="st" id="filtro_estado">
                        <option value="" selected disabled></option>
                        <option value="0">
                            <?= ucfirst(lang("Admin.tabla.privado"))?>
                        </option>
                        <option value="1">
                            <?= ucfirst(lang("Admin.tabla.publico"))?>
                        </option>
                        <option value="2">
                            <?= ucfirst(lang("Admin.tabla.papelera"))?>
                        </option>
                    </select>                
                </div>
                <div class="d-flex">
                    <div class="column_filtro_left d-flex flex-column">
                        <label><h4><?= ucfirst(lang("Admin.tabla.idioma"))?></h4></label>
                        <select name="lg" id="filtro_lenguaje">
                            <option value="" selected disabled></option>
                            <option value="es">
                                <?= ucfirst(lang("Admin.sidebar_noticias.es"))?>
                            </option>
                            <option value="en">
                
                                <?= ucfirst(lang("Admin.sidebar_noticias.en"))?>
                            </option>
                            <option value="pt">
                                <?= ucfirst(lang("Admin.sidebar_noticias.pt"))?>
                            </option>
                        </select>                
                    </div>
                </div>        
                <div class="d-flex">
                    <div class="column_filtro_left d-flex flex-column">
                     <label><h4><?= ucfirst(lang("Admin.tabla.categoria"))?></h4></label>
                        <select name="cat" id="filtro_categoria">  
                        <option selected disabled></option>
                        </select>               
                    </div>  
                </div>

                <div class="d-flex">
                    <div class="column_filtro_left d-flex flex-row align-self-end">
                        <input class="buscar_menu_header" name="s" id="query_string" type="search" >
                        <input type="submit" value="<?= ucfirst(lang("Admin.tabla.buscar"))?>" id="filtrar_items">
                    </div>
                </div>

            </div>
        </form>            
    </div>
    <table class='w-100 noticias-tabla' >
        <tr>
            <!-- <th class='tbl_noti_checkbox'></th> -->
            <th class='tbl_noti_date'><?= ucfirst(lang("Admin.tabla.fecha"))?></th>
            <th class='tbl_noti_titulo'><?= ucfirst(lang("Admin.tabla.titulo"))?></th>
            <th class='tbl_noti_status'><?= ucfirst(lang("Admin.tabla.idioma"))?></th>
            <th class='tbl_noti_status'><?= ucfirst(lang("Admin.tabla.estado"))?></th>
        </tr>
        <?php foreach($noticias as $noticia): ?>
        <tr id="row_noticia">
        <!-- <td class="text-center tbl_noti_checkbox'"><input type="checkbox" id="<?= $noticia['id']?>"></td> -->
            <td class='tbl_noti_date'>
                <?= date("d/m/y G:i",strtotime($noticia['timestamp']))?>
            </td>
            <td class='tbl_noti_titulo'>
                <a href="/admin/noticia/editar/<?= $noticia['id']?>"><?= $noticia['title']?></a>        
            </td>            
            <td class="text-center tbl_noti_status lenguaje">
                <a href="<?=$_SERVER['PATH_INFO']?>?lg=<?=$noticia["lang"]?>"><img class="lang" src="/img/<?=$noticia["lang"]?>.png" alt="<?=$noticia["lang"]?>"></a>
            </td>
                    <?php
                    switch ($noticia['status']) {
                        case "0":
                            $estado= ucfirst(lang("Admin.tabla.privado"));
                            break;
                        case "1":
                            $estado=ucfirst(lang("Admin.tabla.publico"));
                            break;
                        case "2":
                            $estado= ucfirst(lang("Admin.tabla.papelera"));
                            break;
                        default:
                            $estado="";
                        }
                    ?>
            <td class="text-center tbl_noti_status">
                <a href="<?=$_SERVER['PATH_INFO']?>?st=<?=$noticia["status"]?>"><?= $estado ?></a>
            </td>
        </tr>
        <?php endforeach ?>  
    </table>
    <?php echo $paginacion ?>
    <pre>
        <?php #var_dump($condiciones) ?>
    </pre>