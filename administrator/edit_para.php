<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
// добавление данных в таблицу БД
$group = $_SESSION["group"];
//пара
//$number = htmlentities(mysqli_real_escape_string($mysqli, $_POST['name_number']));

$period = mysqli_real_escape_string($mysqli, $_POST['period']);
//неделя
$day = mysqli_real_escape_string($mysqli, $_POST['week']);
$id = mysqli_real_escape_string($mysqli, $_GET['id']);
//преподаватель
$prepod = mysqli_real_escape_string($mysqli, $_POST['name_teacher']);
//пердмет
$predmet = mysqli_real_escape_string($mysqli, $_POST['name_disciplines']);
//тип занятия
$tip = mysqli_real_escape_string($mysqli, $_POST['type']);
//место проведения
$mesto = mysqli_real_escape_string($mysqli, $_POST['location']);
//$group.' '. 
echo $period.' '.$day.' '.$id.' '.$prepod.' '.$predmet.' '.$tip.' '.$mesto;
$query ="UPDATE `$group` SET day='$day', runtime='$period', teacher='$prepod', disciplines='$predmet', type='$tip', place='$mesto' WHERE id='$id'";
        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
        if($result){
            echo "<script>window.location.href='/administrator/edit_group.php?name_group={$group}';</script>";

            echo "<span style='color:green;'>данные обновлены</span>";
            //$row['number'] = null;
            //$row['location'] = null;
    }
    else{
        echo ("<span style='color:red;'>Введите изменения</span>");
    }
/*$query_m ="SELECT * FROM `audience` WHERE id = '$mesto'";
$result_m = mysqli_query($mysqli, $query_m) or die ("Ошибка " . mysqli_error($mysqli));
$row_m = mysqli_fetch_array($result_m);
$mes = $row_m['number'].$row_m['location'];
   if(($week != null) or ($para != null) or 
    ($tech != null) or ($dis != null) or ($typ != null) or ($mes != null)){
        $query = "INSERT INTO `$group`(`id`,`day`,`runtime`,`teacher`,`disciplines`,`type`,`place`) VALUES (NULL,'$week','$para','$tech','$dis','$typ','$mes')";
        $result = mysqli_query($mysqli, $query) or die ('Ошибка добавления данных!');
        if ($result){
            $statys = 'Данные успешно добавлены';
            $week = null; // неделя
            $para = null; // время пары
            $tech = null; // преподаватель
            $dis = null; // дисциплина
            $typ = null; // тип пары
            $mes = null; //место проведения пары
        }
    }
    else{
        $text = 'Заполните поле данными';
        echo '<label>Статус:'.$text.'</label><br/>';
    }*/

//echo "<script>window.location.href='/administrator/constructor.php?status={$statys}';</script>";


?>