<h1><?= ucfirst(lang("Admin.".$tipopost))?></h1>
    <div class="">
        <?php if ($filtered): ?>
            <a class="quitar_filtros" href="/<?=$locale?>/admin/ver/<?=$type?>s"><?php #ucfirst(lang('Admin.ver_todos')) ?>Ver todos</a>
        <?php endif ?>
        <form action="<?=$_SERVER['PATH_INFO']?>" method="GET" id="query_form">
            <div class="header_admin">
              <div class="column_filtro_left d-flex flex-column">
                    <label><h4><?= ucfirst(lang("Admin.tabla.estado"))?></h4></label>
                    <select name="st" id="filtro_estado">
                        <option value="" selected disabled><?=ucfirst(lang('App.select_placeholder'))?></option>
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
                            <option value="" selected disabled><?=ucfirst(lang('App.select_placeholder'))?></option>
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
                        <option value="" selected disabled><?=ucfirst(lang('App.select_placeholder'))?></option>
                        <?php foreach ($taxonomias as $tax): ?>
                        <?php foreach ($tax['terms'] as $term): ?>
                        <option value="<?=$term['id']?>"><?=$term['nombre']?></option>
                        <?php endforeach ?>
                        <?php endforeach ?>
                        </select>           
                    </div>  
                </div>

                <div class="d-flex div_buscar">
                    <div class="column_filtro_left d-flex flex-row align-self-end">
                        <input class="buscar_menu_header" name="s" type="search" >
                        <input type="submit" value="<?= ucfirst(lang("Admin.tabla.buscar"))?>" id="filtrar_items">
                    </div>
                </div>

            </div>
        </form>            
    </div>

        <table class='noticias-tabla' >
            <tr>
                <!-- <th class='tbl_noti_checkbox'></th> -->
                <th class='tbl_noti_date'><?= ucfirst(lang("Admin.tabla.fecha"))?></th>
                <th class='tbl_noti_titulo'><?= ucfirst(lang("Admin.tabla.titulo"))?></th>
                <th class='tbl_noti_status'><?= ucfirst(lang("Admin.tabla.idioma"))?></th>
                <th class='tbl_noti_status'><?= ucfirst(lang("Admin.tabla.estado"))?></th>
            </tr>
            <?php foreach($posts as $post): ?>
            <tr id="row_noticia">
            <!-- <td class="text-center tbl_noti_checkbox'"><input type="checkbox" id="<?= $post['id']?>"></td> -->
                <td class='tbl_noti_date'>
                    <?= date("d/m/y G:i",strtotime($post['timestamp']))?>
                </td>
                <td class='tbl_noti_titulo'>
                    <a href="/admin/<?=$type?>/editar/<?= $post['id']?>"><?= $post['title']?></a>        
                </td>            
                <td class="text-center tbl_noti_status lenguaje">
                    <a href="<?=$_SERVER['PATH_INFO']?>?lg=<?=$post["lang"]?>"><img class="lang" src="/img/<?=$post["lang"]?>.png" alt="<?=$post["lang"]?>"></a>
                </td>
                        <?php
                        switch ($post['status']) {
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
                    <a href="<?=$_SERVER['PATH_INFO']?>?st=<?=$post["status"]?>"><?= $estado ?></a>
                </td>
            </tr>
            <?php endforeach ?>  
        </table>        

    <?php echo $paginacion ?>
    <pre>
        <?php #var_dump($rutas_auto) ?>
    </pre>