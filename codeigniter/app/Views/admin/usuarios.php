<pre><?php var_dump($usuarios) ?></pre> 

<h1>Usuarios</h1>
    <div class="header_admin d-flex">

        <div class="header_admin_left">
          <div class="column_filtro_left d-flex flex-column">
                <label><h4><?= ucfirst(lang("Admin.tabla.permisos"))?></h4></label>
                <select name="" id="filtro_permisos">
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

        <div class="header_admin_right">
            <input class="buscar_menu_header" type="search" >
            <input type="submit" value="<?= ucfirst(lang("Admin.tabla.buscar"))?>">
        </div>
    </div>
    <table class='w-100 noticias-tabla' >
        <tr>
            <th class='tbl_noti_checkbox'></th>
            <th class='tbl_noti_date'><?= ucfirst(lang("Admin.tabla.nombre"))?></th>
            <th class='tbl_noti_apellido'><?= ucfirst(lang("Admin.tabla.apellido"))?></th>
            <th class='tbl_noti_permisos'><?= ucfirst(lang("Admin.tabla.permisos"))?></th>
        </tr>
        <?php foreach($usuarios as $usuario): ?>
        <tr id="row_noticia">
        <td class="text-center tbl_noti_checkbox'"><input type="checkbox" id="<?= $usuario['ID']?>"></td>
            <td class='tbl_noti_nombre'><?= $usuario['nombre']?> </td>
            <td class='tbl_noti_apellido'><?= $usuario['apellido']?>        
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

     <td class="text-center tbl_noti_status"><?= $permisos ?>
            </td>
        </tr>
        <?php endforeach ?>  
    </table>

    <div class="pagination">
        <div>
           <a href="">< <?= ucfirst(lang("Admin.tabla.anterior"))?></a>
        </div>
        <div>
            <a href="" class="active">1</a>
            <a href="">2</a>
            <a href="">3</a>
        </div>
        <div>
            <a href=""> <?= ucfirst(lang("Admin.tabla.siguiente"))?> ></a>
        </div>
    </div>