<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu.inc.php";
$id =  $_GET['name_group'];
//$_SESSION['group'] = $id;

?>
<html land='ru'>
<head>
<meta charset="utf8">
</head>
<nav class="container bg-dark">
     <div class="navbar navbar-default navbar-fixed-top">
        <?php drawMenu($leftMenu); ?>
     </div>
     </nav>

<?
echo "<h4 align='center'>Группа ".$id."</h4>";
//echo "<div><input type='submit' name='done' class='btn btn-success' value='Предыдущая неделя'/></div>";
//echo "<a class='btn btn-success' href='previous_week.php?name_group=".$id."'>Предыдущая неделя</a>";
setlocale(LC_ALL, 'ru_RU.UTF-8');
echo "<div float: left align='right'>Сегодня: ".strftime(' %A %d %B %G', time())."</div>";
echo "<table class='table  table-condensed table-bordered table-hover bg-light'>";
$day_week = array('1' => 'Понедельник',
                  '2' => 'Вторник',
                  '3' =>'Среда',
                  '4' => 'Четверг',
                  '5' => 'Пятница',
                  '6' => 'Суббота',
                  '7' => 'Воскресенье');
$day_time = array('1' => '8:00-9:30',
                  '2' => '9:40-11:10',
                  '3' =>'11:20-12-50',
                  '4' =>'13:20-14:50',
                  '5' =>'15:00-16:30',
                  '6' =>'16:40-18:10',
                  '7' =>'18:20-19:50',
                  '8' =>'20:00-21:30');

/// узнаем максимальное количество пар в недели
$p = $mysqli->query("SELECT zaochno_team.id_team, zaochno_team.name, id_time FROM `zaochno` inner join zaochno_team on zaochno.id_team = zaochno_team.id_team WHERE zaochno_team.name = '$id'ORDER BY id_time DESC LIMIT 1");                  
if ($p != null){
    while($row =  $p->fetch_assoc()){
        //echo $row['id_time'];
        $kol_par = $row['id_time'];
        }
    }


// узнаём количество дней с занятиями
$day = $mysqli->query("SELECT zaochno_team.name, week.id_week FROM `zaochno` inner join zaochno_team on zaochno.id_team = zaochno_team.id_team inner join week on zaochno.id_day = week.id_week WHERE zaochno_team.name = '$id'ORDER BY id_day DESC LIMIT 1");
if ($day != NULL){
    while($row =  $day->fetch_assoc()){
        //echo $row['id_week'];
        $kol_day = $row['id_week'];
        }
}

    
$l = 0;
$t = 1;

echo "<table class='table  table-condensed table-bordered table-hover'>";
echo "<tr bgcolor='gray'><th>День недели</th>";
for($j = 1; $j <= $kol_par; $j++){
echo "<th>".$j." пара</th>";
}
echo "</tr>";
for ($i = 1; $i <= $kol_day; $i++){
    
$d = $day_week[$i];
$l=1;
echo '<tr>';

$result = $mysqli->query("SELECT `id`, zaochno_team.name, week.day, time.period, time.id_time, location.place, location.location, disciplines.name_disciplines, type.name_type, teacher.name_teacher FROM `zaochno` 
                          inner join zaochno_team on zaochno.id_team = zaochno_team.id_team 
                          inner join week on zaochno.id_day = week.id_week
                          inner join time on zaochno.id_time = time.id_time
                          inner join location on zaochno.id_location = location.id_loc 
                          inner join disciplines on zaochno.id_disciplines = disciplines.id_disciplines 
                          inner join type on zaochno.id_type = type.id_type
                          inner join teacher on zaochno.id_teacher = teacher.id_teacher 
                          where zaochno_team.name = '$id'
                          and week.day = '$d' ORDER BY `id_time`");


echo "<td bgcolor='gray'><small>".$d."</small></td>";

while($row =  $result->fetch_assoc()){
    if($row['period'] == $day_time[$l] ){
        echo "<td>".$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher']."</td>"; 
}
else{
   echo '<td>'.$day_time[$l].'</td>';
   echo "<td>".$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher']."</small></td>"; 
    $l++;
}
$l++;
}
}
echo '</tr>';
echo "</table>";
?>