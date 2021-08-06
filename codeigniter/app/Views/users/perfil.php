<div class="container">
<h1 class="titulo-principal">Mi perfil</h1>
<!-- <pre>
<?= print_r($_SESSION) ?>
</pre> -->

 <div class="perfil-body">
 <h3 class="mb-4"><?=$_SESSION['nombre']?> <?=$_SESSION['apellido']?></h3>
    <ul>
        <li><b>Genero: </b><?=ucfirst($_SESSION['genero'])?></li>
        <li><b>Mail: </b><?=ucfirst($_SESSION['mail'])?></li>
        <li><b>Año de nacimiento: </b><?=ucfirst($_SESSION['ano_nacimiento'])?></li>
        <li><b>Ciudad de residencia: </b><?=ucfirst($_SESSION['residencia_ciudad'])?>, <?=ucfirst($_SESSION['residencia_pais'])?></li>
    </ul>
    <ul>
        <li><b>Especialidad: </b><?=ucfirst($_SESSION['especialidad'])?></li>
        <li><b>Intereses: </b><?php foreach ($_SESSION['intereses'] as $interes): ?><span><?=ucfirst($interes)?></span><?php endforeach ?></li>
        <li><b>Organizaciones: </b><?php foreach ($_SESSION['organizaciones'] as $orga): ?><span><?=ucfirst($orga)?></span><?php endforeach ?></li>
    </ul>
    <ul>
        <li><b>Especialidad: </b><?=ucfirst($_SESSION['especialidad'])?>
    </ul>
    <ul>
        <li><b>Hospital donde trabaja: </b><?=ucfirst($_SESSION['trabajo_hospital'])?></li>
        <li><b>Cargo: </b><?=ucfirst($_SESSION['trabajo_cargo'])?></li>
        <li><b>Direccion laboral: </b><?=ucfirst($_SESSION['trabajo_calle'])?> <?=ucfirst($_SESSION['trabajo_numero'])?>, <?=ucfirst($_SESSION['trabajo_ciudad'])?>, <?=ucfirst($_SESSION['trabajo_pais'])?>. CP <?=ucfirst($_SESSION['trabajo_CP'])?></li>
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
            <li><b>Membresia: </b>
            <?= $permisos ?>
        </li>

        </ul>
    </div>
</div>

</div>