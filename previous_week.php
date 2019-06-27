<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu.inc.php";
$id =  $_GET['name_group'];
$_SESSION['group'] = $id;
$prev = date('d.m.Y', strtotime('Mon previous week')) . '—' . date('d.m.Y', strtotime('Sun previous week'));

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
echo "<h4 align='center'>Группа ".$id." (".$prev.")</h4>";
//echo "<div><input type='submit' name='done' class='btn btn-success' value='Предыдущая неделя'/></div>";
echo "<a class='btn btn-success' href='group.php?name_group=".$id."'>Следующая неделя</a>";
//echo ' '.date('d.m.Y', strtotime('Mon previous week')) . '—' . date('d.m.Y', strtotime('Sun previous week')).'</br>'; 
echo ' '.date('d.m.Y', strtotime('Mon this week')) . '—' . date('d.m.Y', strtotime('Sun this week')).'<br>';

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
                  '6' =>'16:40-18:10');


/// узнаем максимальное количество пар в недели
$p = $mysqli->query("SELECT team.id_team, team.name_team, id_time FROM `timetable` inner join team on timetable.id_team = team.id_team WHERE team.name_team = '$id'ORDER BY id_time DESC LIMIT 1");                  
while($row =  $p->fetch_assoc()){
//echo $row['id_time'];
$kol_par = $row['id_time'];
}
// узнаём количество дней с занятиями
$day = $mysqli->query("SELECT team.name_team, week.id_week FROM `timetable` inner join team on timetable.id_team = team.id_team inner join week on timetable.id_day = week.id_week WHERE team.name_team = '$id'ORDER BY id_day DESC LIMIT 1");
while($row =  $day->fetch_assoc()){
    //echo $row['id_week'];
    $kol_day = $row['id_week'];
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
$now = date('d.m.Y', strtotime('Mon this week')) . '—' . date('d.m.Y', strtotime('Sun this week'));
$fut = date('d.m.Y', strtotime('Mon next week')) . '—' . date('d.m.Y', strtotime('Sun next week'));

$result = $mysqli->query("SELECT `id`, team.name_team, week.day, time.period, time.id_time, location.place, location.location, disciplines.name_disciplines, type.name_type, teacher.name_teacher, timetable.period_week FROM `timetable` 
                          inner join team on timetable.id_team = team.id_team 
                          inner join week on timetable.id_day = week.id_week
                          inner join time on timetable.id_time = time.id_time
                          inner join location on timetable.id_location = location.id_loc 
                          inner join disciplines on timetable.id_disciplines = disciplines.id_disciplines 
                          inner join type on timetable.id_type = type.id_type
                          inner join teacher on timetable.id_teacher = teacher.id_teacher 
                          where team.name_team = '$id' and timetable.period_week = '$prev'
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