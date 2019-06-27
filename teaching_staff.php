<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu.inc.php";
$name =  $_GET['name_teacher'];
//$_SESSION['group'] = $id;
?>

<nav class="container bg-dark">
     <div class="navbar navbar-default navbar-fixed-top">
        <?php drawMenu($leftMenu); ?>
     </div>
     </nav>
<?
     echo "<h2 align='center'>Информация по преподавателю</h2>";
echo "<table class='table  table-condensed table-bordered table-hover bg-light'>";
//echo "<tr bgcolor='gray'><th>день</th><th>пн</th><th>вт</th><th>ср</th><th>чт</th><th>пт</th><th>сб</th></tr>";
echo "<tr bgcolor='gray'><th>Группа/день недели/пара</th></tr>";
    //echo "<tr bgcolor='gray'><th>день</th><th>".$day_week[$i]."</th></tr>";
$l=1;

$result = $mysqli->query("SELECT `id`, team.name_team, week.day, time.period, location.place, location.location, disciplines.name_disciplines, type.name_type, teacher.name_teacher FROM `timetable` 
                          inner join team on timetable.id_team = team.id_team 
                          inner join week on timetable.id_day = week.id_week
                          inner join time on timetable.id_time = time.id_time
                          inner join location on timetable.id_location = location.id_loc 
                          inner join disciplines on timetable.id_disciplines = disciplines.id_disciplines 
                          inner join type on timetable.id_type = type.id_type
                          inner join teacher on timetable.id_teacher = teacher.id_teacher 
                          where teacher.id_teacher = '$name'");

while($row =  $result->fetch_assoc()){
    echo '<tr>';
        echo "<td>".$row['name_team'].' '.$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher']."</td>"; 
        echo '</tr>';  
    }
echo "</table>";
?>