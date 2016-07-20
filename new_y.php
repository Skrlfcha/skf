<?php
/*
$realtime = mktime(0, 0, 0, 01, 01, 2017);
$futuretime = $realtime - time();
echo date("До нового года:m месяцев j дней h часов i минут s секунд", $futuretime);*/
$currentYear = date('Y'); // получаем текущий год

$newYear = mktime(0, 0, 0, 1, 1, $currentYear + 1); // высчитываем дату Нового Года
$seconds = $newYear - time();

$days = 0; $hours = 0; $minutes = 0;
$oneMinute = 60;
$oneHour = 60 * $oneMinute;
$oneDay = $oneHour * 24;

if ($seconds / $oneDay > 0) {
    $days = (int)($seconds / $oneDay);
    $seconds -= $days * $oneDay;
}

if ($seconds / $oneHour > 0) {
    $hours = (int)($seconds / $oneHour);
    $seconds -= $hours * $oneHour;
}

if ($seconds / $oneMinute > 0) {
    $minutes = (int)($seconds / $oneMinute);
    $seconds -= $minutes * $oneMinute;
}

printf('К Новому Году осталось: %02d дней %02d часов %02d минут и %02d секунд', $days, $hours, $minutes, $seconds);