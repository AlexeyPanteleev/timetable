<?php
//скрипт для подключения к базе данных

//$mysqli = new mysqli('localhost','root', 'root','test');
//$mysqli = new mysqli('localhost','root', 'root','kollege_timetable');
$mysqli = new mysqli('localhost','root', 'root','kollege');

$mysqli->set_charset('utf8');

// проверка подключения

if ($mysqli->connect_errno) {
    $output = 'Не удалось подключиться к серверу баз даннных'.$mysqli->connect_error;
    include $_SERVER['DOCUMENT_ROOT']. '/handler/output.html.php';
    exit();
}
else{
    $output = 'Соединение с БД установлено!';
    // вывод сообшения о подключении к бд
    //include_once $_SERVER['DOCUMENT_ROOT']. '/handler/output.html.php';
}
?>