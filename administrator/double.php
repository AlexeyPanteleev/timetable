<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
$now = $_GET['now'];
$fut = $_GET['fut'];
$result = $mysqli->query("SELECT `id_team`, `id_disciplines`, `id_teacher`, `id_location`, `id_day`, `id_time`, `id_type`, `period_week` FROM `timetable` WHERE `period_week` = '$now'");
if (!$result) {
    echo "Ошибка базы, не удалось получить список таблиц\n";
    echo 'Ошибка MySQL: ' . mysqli_error();
    exit;
}
while($row =  $result->fetch_assoc()){
   $team = $row['id_team'];
   $predmet = $row['id_disciplines'];
   $prepod = $row['id_teacher'];
   $mesto = $row['id_location'];
   $day = $row['id_day'];
   $period = $row['id_time'];
   $tip = $row['id_type'];

    $double = "INSERT INTO `timetable`(`id`, `id_team`, `id_disciplines`, `id_teacher`, `id_location`, `id_day`, `id_time`, `id_type`, `period_week`) VALUES 
            (NULL,'$team','$predmet','$prepod','$mesto','$day','$period','$tip', '$fut')";
          $result_v = mysqli_query($mysqli, $double) or die ('Ошибка добавления данных!');
          if ($result_v){
              //echo 'Данные успешно добавлены';
              // очищаем переменные  
              $i++;
          }
      else{
          $text = 'Заполните поле данными';
          echo '<label>Статус:'.$text.'</label><br/>';
      }
              
}
echo 'данные добавлены</br>';
$rez = 'tru';
echo 'количестиво добавлений - '.$i;
echo "<script>window.location.href='/administrator/edit_timetable.php?rez={$rez}';</script>";


?>