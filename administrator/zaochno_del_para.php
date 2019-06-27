<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';

$id = $_GET['del'];  // id записи
    $group = $_GET['name_group'];
    $query = "DELETE FROM `zachno` WHERE `zachno`.`id` = $id";
    $sql = mysqli_query($mysqli, $query);
    if ($sql) {
       $del = "Данные удалены";
      // echo "<script>window.location.href='edit_group.php?rez={$del}';</script>";
     } else {
       echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
     }
     echo "<script>window.location.href='zaochno_con.php?name_group={$group}';</script>";
?>