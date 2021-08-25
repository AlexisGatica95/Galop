<div class="container">
<h1 class="titulo-principal"><?= ucfirst(lang("App.miPerfil"))?></h1>
<!-- <pre>
<?= print_r($_SESSION) ?>
</pre> -->

 <div class="perfil-body">
 <h3 class="mb-4"><?=$_SESSION['nombre']?> <?=$_SESSION['apellido']?></h3>
    <ul>
        <li><b><?= ucfirst(lang("App.perfil.genero"))?>: </b><?=ucfirst($_SESSION['genero'])?></li>
        <li><b>Mail: </b><?=ucfirst($_SESSION['mail'])?></li>
        <li><b><?= ucfirst(lang("App.perfil.nacimiento"))?>: </b><?=ucfirst($_SESSION['ano_nacimiento'])?></li>
        <li><b><?= ucfirst(lang("App.perfil.residencia"))?>: </b><?=ucfirst($_SESSION['residencia_ciudad'])?>, <?=ucfirst($_SESSION['residencia_pais'])?></li>
    </ul>
    <ul>
        <li><b><?= ucfirst(lang("App.perfil.especialidad"))?>: </b><?=ucfirst($_SESSION['especialidad'])?></li>
        <li><b><?= ucfirst(lang("App.perfil.intereses"))?>: </b><?php foreach ($_SESSION['intereses'] as $interes): ?><span><?=ucfirst($interes)?></span><?php endforeach ?></li>
        <li><b><?= ucfirst(lang("App.perfil.organizaciones"))?>: </b><?php foreach ($_SESSION['organizaciones'] as $orga): ?><span><?=ucfirst($orga)?></span><?php endforeach ?></li>
    </ul>
    <ul>
        <li><b><?= ucfirst(lang("App.perfil.hospital"))?>: </b><?=ucfirst($_SESSION['trabajo_hospital'])?></li>
        <li><b><?= ucfirst(lang("App.perfil.cargo"))?>: </b><?=ucfirst($_SESSION['trabajo_cargo'])?></li>
        <li><b><?= ucfirst(lang("App.perfil.direcLaboral"))?>: </b><?=ucfirst($_SESSION['trabajo_calle'])?> <?=ucfirst($_SESSION['trabajo_numero'])?>, <?=ucfirst($_SESSION['trabajo_ciudad'])?>, <?=ucfirst($_SESSION['trabajo_pais'])?>. CP <?=ucfirst($_SESSION['trabajo_CP'])?></li>
    </ul>
    <?php
        switch ($_SESSION['permisos']) {
            case "-1":
                $permisos = ucfirst(lang("Admin.tabla.rechazado"));
                break;
            case "0":
                $permisos = ucfirst(lang("Admin.tabla.pendiente"));
                break;
            case "1":
                $permisos = ucfirst(lang("Admin.tabla.usuario"));
                break;
            case "2":
                $permisos = ucfirst(lang("Admin.tabla.admin"));
                break;
            default:
                $permisos="";
        }       
    ?>
    <div class="status">
        <ul>
            <li><b><?= ucfirst(lang("App.perfil.membresia"))?>: </b>
            <?= $permisos ?>
        </li>

        </ul>
    </div>
</div>

</div>