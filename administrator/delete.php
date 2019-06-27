<?php

require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
//удаление из таблицы с преподавателями
//empty возвращает FALSE, если переменная существует, и содержит непустое и ненулевое значение. 
//В противном случае возвращает TRUE.
if (empty($_GET['fio_id'])){
    //удаление из таблицы с предметами
    if (empty($_GET['disciplines_id'])){
        //удаление из таблицы с аудиториями
    if (empty($_GET['location_id'])){
      echo'<li><a href=table_location.php>Вернуться назад</a></li>';
      exit('Ошибка: данные не были переданны!');
  }
  else{
      //удаляем строку из таблицы аудиторий
      $id = $_GET['location_id'];
      $query = "DELETE FROM `location` WHERE `location`.`id_loc` = '$id'";
      $sql = mysqli_query($mysqli, $query);
      if ($sql) {
         echo "<p>Данные удалены.</p>";
         echo "<script>window.location.href='table_location.php';</script>";
       } else {
         echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
       }
  }
    }
    else{
        //удаляем строку из таблицы с предметами
        $id = $_GET['disciplines_id'];
        $query = "DELETE FROM `disciplines` WHERE `disciplines`.`id_disciplines` = '$id'";
        $sql = mysqli_query($mysqli, $query);
        if ($sql) {
           echo "<p>Данные удалены.</p>";
           echo "<script>window.location.href='table_disciplines.php';</script>";
         } else {
           echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
         }
    }
}
else{
    //удаляем строку из таблицы с преподавателями
    $id = $_GET['fio_id'];
    $query = "DELETE FROM `teacher` WHERE `teacher`.`id_teacher` = '$id'";
    $sql = mysqli_query($mysqli, $query);
    if ($sql) {
       echo "<p>Данные удалены.</p>";
       echo "<script>window.location.href='table_teacher.php';</script>";
     } else {
         echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
     }
}
// Закрываем соединение.
$mysqli = null;

?>
