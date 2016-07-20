<?php
if(isset($_POST['go'])) {
    $suma = $_POST['summ'];
    $srok = $_POST['srok'];
    $proc = $_POST['proc'].'%';
    if($suma > 5000000){
        echo 'Введите сумму не больше 5000000';
        $suma = 0;
        $srok = 0;
        $proc = 0;
    } elseif($srok > 60) {
        echo 'Введите срок займа не больше 60 дней';
        $suma = 0;
        $srok = 0;
        $proc = 0;
    } elseif($proc > 55) {
        echo 'Введите процентную ставку не больше 55%';
        $suma = 0;
        $srok = 0;
        $proc = 0;
    }
    echo '</br>Сумма: '.$suma.'</br>На срок: '.$srok.'</br>Процентная ставка: '.$proc.'</br>';
    if(($suma > 0)and($srok > 0)and($proc > 0)) {
        $proc = ($suma*$proc)/100;
        $proc = $proc*$srok;
        $rez = $proc+$suma;
        echo '</br><h2>Суммарно к оплате: '.$rez.'</h2>';
    } else { echo 'Проверьте правильность данных!!!';}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сравнение</title>
</head>
<body>
<form method="post">
    <p>Сумма кредита (в тг)</p><input type="text" name="summ" id="summ" maxlength="7" required> тг
    <p>Срок кредита (в мес)</p><input type="text" name="srok" id="srok" maxlength="2" required> дней
    <p>Процентная ставка</p><input type="text" name="proc" id="proc" required></br></br>
    <input type="submit" name="go" id="go">
</form>
</body>
</html>
