<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
$week =  $_GET['week'];

?>

<div class='head'>
<a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
     <div class='content_history'>
     <div class='content_now'>
     <h4 align='center'>Выберите группу</h4>
     <table class='table  table-condensed table-bordered table-hover bg-light'>

<?php

    echo '<td>';
//$result = $mysqli->query("SELECT * FROM `timetable` WHERE `period_week` = '$week'");
$result = $mysqli->query("SELECT `id`, team.name_team, week.day, time.period, time.id_time, location.place, location.location, disciplines.name_disciplines, type.name_type, teacher.name_teacher, timetable.period_week FROM `timetable` 
                          inner join team on timetable.id_team = team.id_team 
                          inner join week on timetable.id_day = week.id_week
                          inner join time on timetable.id_time = time.id_time
                          inner join location on timetable.id_location = location.id_loc 
                          inner join disciplines on timetable.id_disciplines = disciplines.id_disciplines 
                          inner join type on timetable.id_type = type.id_type
                          inner join teacher on timetable.id_teacher = teacher.id_teacher 
                          and timetable.period_week = '$week' GROUP BY `name_team`
                          ");

if (!$result) {
    echo "Ошибка базы, не удалось получить данные\n";
    echo 'Ошибка MySQL: ' . mysqli_error();
    exit;
}

while($row =  $result->fetch_assoc()) // массив с данными
{   
    echo '<tr>';
    echo '<td><a href=prosmotr.php?name_group='.$row['name_team'].'&week='.$week.'>'.$row['name_team'].'</a></td>';
    echo '</tr>';
 } 
echo '</td>';
echo "</table> ";
echo '</div>';

echo "<div class='content_future'>";
echo "<h4 align='center'>Выберите преподавателя</h4>";
echo "<table class='table  table-condensed table-bordered table-hover bg-light'>";
echo '<td>';
$result_t = $mysqli->query("SELECT `id`, team.name_team, week.day, time.period, time.id_time, location.place, location.location, disciplines.name_disciplines, type.name_type, teacher.id_teacher, teacher.name_teacher, timetable.period_week FROM `timetable` 
                          inner join team on timetable.id_team = team.id_team 
                          inner join week on timetable.id_day = week.id_week
                          inner join time on timetable.id_time = time.id_time
                          inner join location on timetable.id_location = location.id_loc 
                          inner join disciplines on timetable.id_disciplines = disciplines.id_disciplines 
                          inner join type on timetable.id_type = type.id_type
                          inner join teacher on timetable.id_teacher = teacher.id_teacher 
                          and timetable.period_week = '$week' GROUP BY `name_teacher`
                          ");
while($row =  $result_t->fetch_assoc()) // массив с данными
{   
    echo '<tr>';
    echo '<td>'.$row['id_teacher'].'</td>';
    echo '<td><a href=history_teacher.php?history_teacher='.$row['id_teacher'].'&week='.$week.'>'.$row['name_teacher'].'</a></td>';
    echo '</tr>';
 } 

echo '</td>';
echo "</table> ";
echo "</div>";
?>

 

</div>