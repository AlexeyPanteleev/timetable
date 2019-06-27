<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
    //удаляем таблицу
    //$group = $_SESSION['group']; // название группы 
    $id = $_GET['del'];  // id записи
    $group = $_GET['name_group'];
    $week = $_GET['week'];
    $query = "DELETE FROM `timetable` WHERE `timetable`.`id` = $id";
    $sql = mysqli_query($mysqli, $query);
    if ($sql) {
       $del = "Данные удалены";
      // echo "<script>window.location.href='edit_group.php?rez={$del}';</script>";
     } else {
       echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
     }
     echo "<script>window.location.href='constructor.php?name_group={$group}&week={$week}';</script>";

?>