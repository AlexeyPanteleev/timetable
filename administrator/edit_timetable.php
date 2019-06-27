<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";

$rez = $_GET['rez'];
$result = $mysqli->query("SELECT * FROM `team`");

if (!$result) {
    echo "Ошибка базы, не удалось получить список таблиц\n";
    echo 'Ошибка MySQL: ' . mysqli_error();
    exit;
}

?>
<div class='head'>
<a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
     <h2 align='center'>Выберите группу</h2>

     <div class='add'>

     <?php  
          echo 'Предыдущая неделя '.date('d.m.Y', strtotime('Mon previous week')) . '—' . date('d.m.Y', strtotime('Sun previous week')).'</br>'; 
          echo 'Текущая неделя '.date('d.m.Y', strtotime('Mon this week')) . '—' . date('d.m.Y', strtotime('Sun this week')).'</br>'; 
          $now = date('d.m.Y', strtotime('Mon this week')) . '—' . date('d.m.Y', strtotime('Sun this week'));
          echo 'Следующая неделя '.date('d.m.Y', strtotime('Mon next week')) . '—' . date('d.m.Y', strtotime('Sun next week')).'</br>';
          $fut = date('d.m.Y', strtotime('Mon next week')) . '—' . date('d.m.Y', strtotime('Sun next week'));
          echo "<a class='btn btn-success' href=double.php?now=".$now."&fut=".$fut.">Дублировать расписание</a></br>";
          echo ' результат '.$rez;

     ?>
    </form>      
 </div>
 <div class='content'>

     <div class='content_now'>
 <table class='table  table-condensed table-bordered table-hover'>
 <tr gcolor='gray'><? echo 'Расписание текущей недели '.$now; ?></tr>
 <tr gcolor='gray'><th>id</th><th>№</th><th>Название группы</th></tr>

    <?php
    // расписание текушей недели
    $i = 1;
    while($row =  $result->fetch_assoc()){
        echo '</tr>';
        echo '<td>'.$row['id_team'].'</td>';
        echo '<td>'.$i++.'</td>';
        echo '<td><a href=constructor.php?name_group='.$row['name_team'].'&week='.$now.'>'.$row['name_team'].'</a></td>';
        echo '</tr>';           
    } 
    ?>
 
</table>
</div>

<div class='content_future'>
 <table class='table  table-condensed table-bordered table-hover'>
 <tr gcolor='gray'><? echo 'Расписание следующей недели '.$fut; ?></tr>

 <tr gcolor='gray'><th>id</th><th>№</th><th>Название группы</th></tr>

    <?php
   $p = $mysqli->query("SELECT period_week FROM `timetable` WHERE period_week = '$fut' LIMIT 1");
   while($row =  $p->fetch_assoc()){
       $week_period = $row['period_week'];
    } 
   if ($rez != null or $week_period == $fut){
    $result_f = $mysqli->query("SELECT * FROM `team`");
    // расписание на следующую неделю
    $i = 1;
    while($row =  $result_f->fetch_assoc()){
        echo '</tr>';    
        echo '<td>'.$row['id_team'].'</td>';
        echo '<td>'.$i++.'</td>';
        echo '<td><a href=constructor.php?name_group='.$row['name_team'].'&week='.$fut.'>'.$row['name_team'].'</a></td>';
        echo '</tr>';           
    } 
}
    ?>
 
</table>
</div>
</div>