<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>k24_polz</title>
    <script type="text/javascript" src="js/jquery-1.6.1.min.js" ></script>
    <script type="text/javascript" src="js/jquery.ui-slider.js"></script>
    <style>
        /* Ширина слайдера */
        #slider {
            width: 300px;
        }
        /* Контейнер слайдера */
        .ui-slider {
            position: relative;
        }
        /* Ползунок */
        .ui-slider .ui-slider-handle {
            position: absolute;
            z-index: 2;
            width: 13px;   /* Задаем нужную ширину */
            height: 13px;  /* и высоту */
            background: #c8c8c8;
            cursor: pointer
        }
        .ui-slider .ui-slider-range {
            position: absolute;
            z-index: 1;
            font-size: .7em;
            display: block;
            border: 0;
            overflow: hidden;
        }
        /* горизонтальный слайдер (сама полоса по которой бегает ползунок) */
        .ui-slider-horizontal {
            height: 3px; /* задаем высоту согласно дизайна */
        }
        /* позиционируем ползунки */
        .ui-slider-horizontal .ui-slider-handle {
            top: -5px;
            margin-left: -6px;
        }
        .ui-slider-horizontal .ui-slider-range {
            top: 0;
            height: 100%;
        }
        .ui-slider-horizontal .ui-slider-range-min {
            left: 0;
        }
        .ui-slider-horizontal .ui-slider-range-max {
            right: 0;
        }
        /* оформление полосы по которой ходит ползунок */
        .ui-widget-content {
            border: 1px solid #D4D4D4;
            background: #fff;
        }
        /* оформление активного участка (между двумя ползунками) */
        .ui-widget-header {
            border: 1px solid #D4D4D4;
            background: #f00;
        }
        /* скругление для полосы слайдера */
        .ui-corner-all {
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#slider").slider({
                animate: true,
                min: 80000,
                max: 160000,
                value:80000,
                range: "min",
                step: 500,
                stop: function(event, ui) {
                    jQuery("input#suma").val(jQuery("#slider").slider("value"));
                },
                slide: function(event, ui){
                    jQuery("input#suma").val(jQuery("#slider").slider("value"));
                }
            });
        });
    </script>
</head>
<body>
<form action="" method="POST">
    <?php
    $date = date("d.m.Y");
    $f_date = date("d.m.Y", strtotime($date) + 30 * 24 * 3600);
    $s_date = date("d.m.Y", strtotime($date) + 60 * 24 * 3600);
    $t_date = date("d.m.Y", strtotime($date) + 90 * 24 * 3600);
    $CurDate = new DateTime($date);
    echo '<p>Дата: '.$date.'</p>';
    if(isset($_POST['go'])) {
        $suma = $_POST['suma'];
        $proc = 0.9/100;
        $days = 90;
        echo "<br>";
        echo "Кредитная ставка: ";
        echo $proc *= $suma;
        echo "<br>";
        $suma = $proc * $days + $suma ;
        echo "<br><hr>";
        echo '<h1>1</h1>'.ceil($count1 = $suma/3).'тг. ---> '.$f_date;
        echo "<br>";
        echo '<h1>2</h1>'.ceil($count2 = $suma/3+$proc).'тг. ---> '.$s_date;
        echo "<br>";
        echo '<h1>2</h1>'.ceil($count3 = $suma/3+$proc+$proc).'тг. ---> '.$t_date.'<hr>';
    }
    ?>
    <form action="" method="POST">
        <br><input type="text" name="suma" id="suma" value="80000"><br><br>
        <div id="slider"></div><br>
        <input type="submit" name="go" value="А НУ КА">
    </form>
</form>
</body>
</html>