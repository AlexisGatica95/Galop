<h1>Usuarios</h1>
    <form action="<?=$_SERVER['PATH_INFO']?>" method="GET" id="query_form">
        <div class="header_admin d-flex">
            <div class="">
              <div class="column_filtro_left d-flex flex-column">
                    <label><h4><?= ucfirst(lang("Admin.tabla.permisos"))?></h4></label>
                    <select name="permisos" id="filtro_permisos">
                        <option selected disabled></option>
                        <option value="0">
                            <?= ucfirst(lang("Admin.tabla.pendiente"))?>
                        </option>
                        <option value="1">
                            <?= ucfirst(lang("Admin.tabla.usuario"))?>
                        </option>
                        <option value="2">
                            <?= ucfirst(lang("Admin.tabla.admin"))?>
                        </option>
                    </select>                
                </div>

             </div>

            <div class="d-flex">
                <input class="buscar_menu_header" name="s" type="search" id="query_string">
                <input type="submit" value="<?= ucfirst(lang("Admin.tabla.buscar"))?>">
            </div>
        </div>
    </form>
    <table class='w-100 noticias-tabla' >
        <tr>
            <th class='tbl_noti_checkbox'></th>
            <th class='tbl_noti_nombre'><?= ucfirst(lang("Admin.tabla.nombre"))?></th>
            <th class='tbl_noti_apellido'><?= ucfirst(lang("Admin.tabla.apellido"))?></th>
            <th class="tbl_noti_mail"><?= ucfirst(lang("Admin.tabla.mail"))?></th>
            <th class='tbl_noti_permisos'><?= ucfirst(lang("Admin.tabla.permisos"))?></th>
        </tr>
        <?php foreach($usuarios as $usuario): ?>
            <tr id="row_noticia">
            <td class="text-center tbl_noti_checkbox'"><input type="checkbox" id="<?= $usuario['ID']?>"></td>
            <td class='tbl_noti_nombre'><?= $usuario['nombre']?> </td>
            <td class='tbl_noti_apellido'><?= $usuario['apellido']?>
            <td class="tbl_noti_email"><?= $usuario['mail']?>
            </td>            
            <?php
                switch ($usuario['permisos']) {
                    case "0":
                        $permisos= ucfirst(lang("Admin.tabla.pendiente"));
                        break;
                    case "1":
                        $permisos=ucfirst(lang("Admin.tabla.usuario"));
                        break;
                    case "2":
                        $permisos= ucfirst(lang("Admin.tabla.admin"));
                        break;
                    default:
                        $permisos="";
                }       
           
            ?>

            <td class="text-center tbl_noti_status">
            <a href="<?=$_SERVER['PATH_INFO']?>?permisos=<?=$usuario["permisos"]?>"><?= $permisos ?><a>
            </td>
            <tr>
        <?php endforeach ?>  
    </table>
    <pre>
        <?php var_dump($condiciones) ?>
    </pre>

<?php echo $paginacion ?>