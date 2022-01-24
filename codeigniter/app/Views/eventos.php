<?php 
$hoy = getdate();
$hoy_ano = $hoy['year'];
$hoy_mes = $hoy['mon'];
$ano_inicio = $hoy_ano - 2;
$ano_fin = $hoy_ano + 4;
// cal_days_in_month(CAL_GREGORIAN, 6, 2021)
?>

<div class="container">
    <div class="event_calendar_w">
        <div class="event_calendar">
            <div class="top">
                <div class="prev_month"><</div>
                <div class="current_month"><h4></h4></div>
                <div class="next_month">></div>
            </div>
            <div class="grid wd">
                <div class="dia">Dom</div>
                <div class="dia">Lun</div>
                <div class="dia">Mar</div>
                <div class="dia">Mie</div>
                <div class="dia">Jue</div>
                <div class="dia">Vie</div>
                <div class="dia">Sab</div>
            </div>
            <?php for ($y=$ano_inicio; $y <= $ano_fin ; $y++): ?>
                <?php for ($m=1; $m < 13 ; $m++): ?>
                <?php $wd = 0; ?>
                <?php 
                $dias = cal_days_in_month(CAL_GREGORIAN, $m, $y);
                $semanas = ceil($dias / 7) + 1;
                $casilleros = 6 * 7;
                $firstwd = getdate(strtotime($m."/1/".$y));
                $firstwd = $firstwd["wday"];
                $started = false;
                $rd = 1;
                ?>
                <!-- <p>Mes <?=$m?>, año <?=$y?></p>
                <p>El primer dia de este mes es: <?=$firstwd?></p> 
                <hr>-->
                <div class="grid month" data-year="<?=$y?>" data-month="<?=$m?>">
                    <?php for ($d=1; $d <= $casilleros ; $d++): ?>
                        <?php
                        if (!$started) {
                            if ($wd == $firstwd) {
                                $started = true;
                                $isClear = false;
                                $isDay = true;
                            } else {
                                $isClear = true;
                                $isDay = false;
                            }
                        }
                        if ($rd > $dias) {
                            $started = false;
                            $isClear = true;
                            $isDay = false;
                        }        
                        ?>
                        <div class="dia<?php if ($isClear) {echo(" clear");} ?>" <?php if ($isDay) {echo(' data-day='.$rd);} ?>><?php if ($started) {echo($rd);}?></div>
                        <?php
                        $wd++;
                        if ($wd > 6) {
                            $wd = 0;
                        }
                        if ($started) {
                            $rd++;
                        }
                        if ($rd > $dias) {
                            //break;
                        }
                        ?>
                    <?php endfor; ?>
                </div>
                
                <?php endfor; ?>
            <?php endfor; ?>
        </div>
    </div>

    <h1 class="titulo-principal"><?=ucfirst(lang('App.eventos'))?></h1>

    <div class="noticias-content">
    <?php foreach($eventos as $evento): ?>
        <div class="item">
            <h3 class='item-titulo'><?= $evento['title']?></h1>
            <p class='timestamp'><?=ucfirst(lang("App.noticia.publicado"))?> <?= date("d/m/y G:i",strtotime($evento['timestamp']))?></p>
            <p class='item-body'><?= $evento['extracto']?></p>
            <a  class='btn btn-1 sm' href="/<?=$locale?>/eventos/<?=$evento['slug']?>"><?=ucfirst(lang("App.noticia.ver_mas"))?></a>
        </div>
    <?php endforeach ?>
    </div>
    <?php echo $paginacion ?>
  <!--   <pre>
        <?php #var_dump($test) ?>
    </pre> -->
</div>
