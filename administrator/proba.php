<?php
include "style.php";
$mysqli = new mysqli('localhost','root', 'root','kollege_timetable');
$mysqli->set_charset('utf8');

$seg =  date('d.m.Y', strtotime('Mon this week')) . '—' . date('d.m.Y', strtotime('Sun this week')); 
$byd = date('d.m.Y', strtotime('Mon next week')) . '—' . date('d.m.Y', strtotime('Sun next week'));
echo $seg.'</br>';
echo $byd;
if($seg == $byd){
    echo 'недели равны';
}
else{
    echo 'недели не равны';
}
// узнаем максимальное коллмчество пар в недели
$vizov = $mysqli->query("SELECT * FROM `timetable` WHERE `id_team` = 17 ORDER BY id_time DESC LIMIT 1");
while($row =  $vizov->fetch_assoc()){
echo $row['id_time'];
$n = $row['id_time'];
}
echo "<a href='admin.php'>Вернуться назад</a>";
echo "<h2 align='center'>проба</h2>";
echo md5('qw4o8rt5Adm');
echo $n.'</br>';
echo (date("d/m/Y H:i"));
echo "<table class='table  table-condensed table-bordered table-hover'>";
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


$t = 1;
//echo "<tr bgcolor='gray'><th>день</th><th>пн</th><th>вт</th><th>ср</th><th>чт</th><th>пт</th><th>сб</th></tr>";
//echo "<tr bgcolor='gray'><th>день</th><th>1 пара</th><th>2 пара</th><th>3 пара</th><th>4 пара</th></th><th>5 пара</th><th>сб</th></tr>";
echo '<tr>';
for ($i = 1; $i <= 6; $i++){
$d = $day_week[$i];
    //echo "<tr bgcolor='gray'><th>день</th><th>".$day_week[$i]."</th></tr>";
$l=1;
//echo '<tr>';

$result = $mysqli->query("SELECT `id`, team.name_team, week.day, time.period, time.id_time, location.place, location.location, disciplines.name_disciplines, type.name_type, teacher.name_teacher FROM `timetable` 
inner join team on timetable.id_team = team.id_team 
inner join week on timetable.id_day = week.id_week 
inner join time on timetable.id_time = time.id_time 
inner join location on timetable.id_location = location.id_loc 
inner join disciplines on timetable.id_disciplines = disciplines.id_disciplines 
inner join type on timetable.id_type = type.id_type 
inner join teacher on timetable.id_teacher = teacher.id_teacher 
where team.name_team = 'ЭБУ-19-3' and week.day = '$d' ORDER BY `id_time`");

echo "<tr bgcolor='gray'><small>".$d."</small></tr>";
$l = 1;
while($row =  $result->fetch_assoc()){
    
   // switch($row['period']){
     //  case $day_time[$l] :
      
        //echo '<td>';
        if($row['period'] == $day_time[$l] ){
            echo "<td><small>".$row['id'].' '.$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher']."</small></td>"; 
        }
        else{
            echo '<td>Окно'.$day_time[$l].'</td>';
            echo "<td><small>".$row['id'].' '.$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher']."</small></td>"; 
            $l++;
        }
        $l++;
        //echo '</td>';
        
      //  break;
        
                 //echo "<td>okno</br>";
//}
 
}

//echo '</tr>';
}

echo '</tr>';

echo "</table>";

/*while($row = $result->fetch_assoc()){
    echo '<tr>';
    echo "<td bgcolor='red'>".$row['id']."</td>";
    echo '<td>'.$l++.'</td>';
    echo '<td>'.$row['day'].'</td>';
    echo '<td>'.$row['period'].'</td>';
    echo '<td>'.$row['name_disciplines'].'</td>';
    echo '<td>'.$row['name_teacher'].'</td>';
    echo '<td>'.$row['place'].'</td>';
    echo '<td>'.$row['location'].'</td>';
    echo '<td>'.$row['name_type'].'</td>';
    echo '</tr>';
}*/
?>
