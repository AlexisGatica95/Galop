<h1>Usuarios</h1>
    <form action="<?=$_SERVER['PATH_INFO']?>" method="GET" id="query_form">
        <div class="header_admin d-flex">
            <div class="">
              <div class="column_filtro_left d-flex flex-column">
                    <label><h4><?= ucfirst(lang("Admin.tabla.permisos"))?></h4></label>
                    <select name="permisos" id="filtro_permisos">
                        <option selected disabled><?=ucfirst(lang('App.select_placeholder'))?></option>
                        <option value="-1">
                            <?= ucfirst(lang("Admin.tabla.rechazado"))?>
                        </option>
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
            <!-- <th class='tbl_noti_checkbox'></th> -->
            <th class='tbl_users_info'>Info</th>
            <th class='tbl_noti_nombre'><?= ucfirst(lang("Admin.tabla.nombre"))?></th>
            <th class='tbl_noti_apellido'><?= ucfirst(lang("Admin.tabla.apellido"))?></th>
            <th class="tbl_noti_mail"><?= ucfirst(lang("Admin.tabla.mail"))?></th>
            <th class='tbl_noti_permisos'><?= ucfirst(lang("Admin.tabla.permisos"))?></th>
        </tr>
        <?php foreach($usuarios as $usuario): ?>
            <tr id="row_noticia">
            <!-- <td class="text-center tbl_noti_checkbox'"><input type="checkbox" id="<?= ""?>"></td> -->
            <td class="tbl_users_info"><span class="modbtn" data-open="info_user_<?=$usuario['ID']?>">👁️</span></td>
            <td class='tbl_noti_nombre'><?= $usuario['nombre']?> </td>
            <td class='tbl_noti_apellido'><?= $usuario['apellido']?>
            <td class="tbl_noti_email"><?= $usuario['mail']?>
            </td>            
            <?php
                switch ($usuario['permisos']) {
                    case "-1":
                        $permisos = "<a href='".$_SERVER['PATH_INFO']."?permisos=".$usuario['permisos']."'>".ucfirst(lang("Admin.tabla.rechazado"))."</a>";
                        break;
                    case "0":
                        $permisos = "<a href='".$_SERVER['PATH_INFO']."?permisos=".$usuario['permisos']."'>".ucfirst(lang("Admin.tabla.pendiente"))."</a>"."<div class='responder_solicitud'><div class='aceptar' data-user='".$usuario['ID']."'>✔️</div><div class='rechazar' data-user='".$usuario['ID']."'>❌</div></div>";
                        break;
                    case "1":
                        $permisos = "<a href='".$_SERVER['PATH_INFO']."?permisos=".$usuario['permisos']."'>".ucfirst(lang("Admin.tabla.usuario"))."</a>";
                        break;
                    case "2":
                        $permisos = "<a href='".$_SERVER['PATH_INFO']."?permisos=".$usuario['permisos']."'>".ucfirst(lang("Admin.tabla.admin"))."</a>";
                        break;
                    default:
                        $permisos="";
                }       
           
            ?>
            <td class="text-center tbl_noti_status">
            <?= $permisos ?>
            </td>
            <tr>
            <div class="mod-w" id="info_user_<?=$usuario['ID']?>">
                <div class="modal_ modal_card">
                    <div class="mod-header">
                        <h3><?=$usuario['nombre']?> <?=$usuario['apellido']?></h3>
                        <a class="mod-close" data-close="info_user_<?=$usuario['ID']?>" title="cerrar">&times;</a>
                    </div>
                    <div class="mod-body">
                        <ul>
                            <li><b>Genero: </b><?=ucfirst($usuario['genero'])?></li>
                            <li><b>Mail: </b><?=ucfirst($usuario['mail'])?></li>
                            <li><b>Año de nacimiento: </b><?=ucfirst($usuario['ano_nacimiento'])?></li>
                            <li><b>Ciudad de residencia: </b><?=ucfirst($usuario['residencia_ciudad'])?>, <?=ucfirst($usuario['residencia_pais'])?></li>
                            <li><b>Fecha de registro: </b><?=ucfirst($usuario['fecha_registro'])?></li>
                        </ul>
                        <ul>
                            <li><b>Especialidad: </b><?=ucfirst($usuario['especialidad'])?></li>
                            <li><b>Intereses: </b><?php foreach ($usuario['intereses'] as $interes): ?><span><?=ucfirst($interes)?></span><?php endforeach ?></li>
                            <li><b>Organizaciones: </b><?php foreach ($usuario['organizaciones'] as $orga): ?><span><?=ucfirst($orga)?></span><?php endforeach ?></li>
                        </ul>
                        <ul>
                            <li><b>Hospital donde trabaja: </b><?=ucfirst($usuario['trabajo_hospital'])?></li>
                            <li><b>Cargo: </b><?=ucfirst($usuario['trabajo_cargo'])?></li>
                            <li><b>Direccion laboral: </b><?=ucfirst($usuario['trabajo_calle'])?> <?=ucfirst($usuario['trabajo_numero'])?>, <?=ucfirst($usuario['trabajo_ciudad'])?>, <?=ucfirst($usuario['trabajo_pais'])?>. CP <?=ucfirst($usuario['trabajo_CP'])?></li>
                        </ul>
                        <div class="status">
                            <ul>
                                <li><b>Membresia: </b><?= $permisos ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>  
    </table>
    <form action="" method="post" style="display: none;" id="responder_solicitud">
        <input type="hidden" name="accion" value="responder">
        <input type="hidden" name="valor" value="">
        <input type="hidden" name="id_user" value="">
    </form>
    <pre>
        <?php #var_dump($usuarios[0]) ?>
    </pre>

<?php echo $paginacion ?>