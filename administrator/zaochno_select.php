<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
$group = $_GET['name_group'];
//$week = $_GET['week'];
//группа
$team = $_POST['team'];
//день недели
$day = $_POST['week'];
//время пары
$period = $_POST['period'];
//преподаватель
$prepod = $_POST['name_teacher'];
//пердмет
$predmet = $_POST['name_disciplines'];
//тип занятия
$tip = $_POST['type'];
//место проведения
$mesto = $_POST['location'];
echo  $team.''.$predmet.','.$prepod.','.$mesto.','.$day.','.$period.','.$tip;

if(($team != null) or ($day != null) or ($period != null)){
        $query = "INSERT INTO `zaochno`(`id`, `id_team`, `id_disciplines`, `id_teacher`, `id_location`, `id_day`, `id_time`, `id_type`) VALUES 
        (NULL,'$team','$predmet','$prepod','$mesto','$day','$period','$tip')";
                $result = mysqli_query($mysqli, $query) or die ('Ошибка добавления данных!');
                if ($result){
                    $statys = 'Данные успешно добавлены';
                    // очищаем переменные
                    $day =null;
                    $period = null;
                    $prepod = null;
                    $predmet = null;
                    $tip = null;
                    $mesto =null;
                }
            }
            else{
                $text = 'Заполните поле данными';
                echo '<label>Статус:'.$text.'</label><br/>';
            }

echo "<script>window.location.href='/administrator/zaochno_con.php?name_group={$group}&week={$week}';</script>";



?>