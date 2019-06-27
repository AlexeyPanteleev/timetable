<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
    $id =  $_GET['name_group'];
    $_SESSION['group'] = $id;
    $rez = $_GET['rez'];
    $rez = $_GET['status'];
?>
<html>
<head>
</head>
<body>
<div class='head'>
<a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
     <h2 align='center'>Введите необходимые изменения</h2>
     <label><? echo 'Группа '.$id.' '; ?></label>
     <!--<input type='submit' name='done' class='btn btn-success' value='Добавить пару'/>"-->
     <? echo "<a class='btn btn-success' href=constructor.php?group=".$id."> Добавить пару</a>";?>
     <? //echo (date("d/m/Y H:i")); ?>
     <div class='content'>
<?php

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
// узнаем максимальное количество пар в недели
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
echo "<tr bgcolor='gray'><th>день</th>";
for($j = 1; $j <= $kol_par; $j++){
echo "<th>".$j." пара</th>";
}
echo "</tr>";
for ($i = 1; $i <= $kol_day; $i++){
    
$d = $day_week[$i];
$l=1;
echo '<tr>';

$result = $mysqli->query("SELECT `id`, team.name_team, week.day, time.period, time.id_time, location.place, location.location, disciplines.name_disciplines, type.name_type, teacher.name_teacher FROM `timetable` 
                          inner join team on timetable.id_team = team.id_team 
                          inner join week on timetable.id_day = week.id_week
                          inner join time on timetable.id_time = time.id_time
                          inner join location on timetable.id_location = location.id_loc 
                          inner join disciplines on timetable.id_disciplines = disciplines.id_disciplines 
                          inner join type on timetable.id_type = type.id_type
                          inner join teacher on timetable.id_teacher = teacher.id_teacher 
                          where team.name_team = '$id'
                          and week.day = '$d' ORDER BY `id_time`");


echo "<td bgcolor='gray'><small>".$d."</small></td>";

while($row =  $result->fetch_assoc()){
    if($row['period'] == $day_time[$l] ){
        echo "<td><small>".$row['id'].' '.$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher'].'</br><a href=delete_para.php?del='.$row['id'].">Удалить</a></small></td>"; 
}
else{
   echo '<td>'.$day_time[$l].'</td>';
   echo "<td><small>".$row['id'].' '.$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher'].'<br><a href=delete_para.php?del='.$row['id'].">Удалить</a></small></td>"; 
    $l++;
}
$l++;
}
}
echo '</tr>';


echo "</table>";

 //echo "<li><a href=constructor.php?group=".$id.">Добавить пару</a></li>";

?>
</div>
</body>
</html>

<?
/*
echo "<div class='table'>";
// понедельник
echo "<div class = 'row'>";
echo 'понедельник';
 while($row =  $result_m->fetch_assoc()){
    switch($row['day']){
        case monday :
        echo "<DIV class='cell'>".$row['runtime'].' - '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type'].'</br> <a href=group_edit.php?id='.$row['id'].'&day=monday&time='.$row['runtime'].">Редактировать </a><a href=delete_para.php?group=".$id.'&id='.$row['id']."> Удалить</a></div>";
        break;
    }
 }
 echo "</div>";
// вторник
 echo "<div class = 'row'>";
 echo 'вторник';
 while($row =  $result_t->fetch_assoc()){
    switch($row['day']){
        case tuesday :
        echo "<DIV class='cell'>".$row['runtime'].' - '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type'].'</br><a href=group_edit.php?id='.$row['id'].'&day=tuesday&time='.$row['runtime'].">Редактировать</a><a href=delete_para.php?group=".$id.'&id='.$row['id']."> Удалить</a></div>";
        break;
    }
 }
 echo "</div>";
//среда
 echo "<div class = 'row'>";
 echo 'среда';
 while($row =  $result_w->fetch_assoc()){
    switch($row['day']){
        case wednesday :
        echo "<DIV class='cell'>".$row['runtime'].' - '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type'].'</br><a href=group_edit.php?id='.$row['id'].'&day=wednesday&time='.$row['runtime'].">Редактировать</a><a href=delete_para.php?group=".$id.'&id='.$row['id']."> Удалить</a></div>";
        break;
    }
 }
 echo "</div>";
//четверг
 echo "<div class = 'row'>";
 echo 'четверг';
 while($row =  $result_th->fetch_assoc()){
    switch($row['day']){
        case thursday :
        echo "<DIV class='cell'>".$row['runtime'].' - '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type'].'</br><a href=group_edit.php?id='.$row['id'].'&day=thursday&time='.$row['runtime'].">Редактировать</a><a href=delete_para.php?group=".$id.'&id='.$row['id']."> Удалить</a></div>";
        break;
    }
 }
 echo "</div>";
//пятница
 echo "<div class = 'row'>";
 echo 'пятница';
 while($row =  $result_f->fetch_assoc()){
    switch($row['day']){
        case friday :
        echo "<DIV class='cell'>".$row['runtime'].' - '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type'].'</br><a href=group_edit.php?id='.$row['id'].'&day=friday&time='.$row['runtime'].">Редактировать</a><a href=delete_para.php?group=".$id.'&id='.$row['id']."> Удалить</a></div>";
        break;
    }
 }
 echo "</div>";
//суббота
 echo "<div class = 'row'>";
 echo 'суббота';
 while($row =  $result_s->fetch_assoc()){
    switch($row['day']){
        case saturday :
        echo "<DIV class='cell'>".$row['runtime'].' - '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type'].'</br><a href=group_edit.php?id='.$row['id'].'&day=saturday&time='.$row['runtime'].">Редактировать</a><a href=delete_para.php?group=".$id.'&id='.$row['id']."> Удалить</a></div>";
        break;
    }
 }
 echo "</div>";
//воскресенье
 echo "<div class = 'row'>";
 echo 'воскресенье';
 while($row =  $result_su->fetch_assoc()){
    switch($row['day']){
        case sunday :
        echo "<DIV class='cell'>".$row['runtime'].' - '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type'].'</br><a href=group_edit.php?id='.$row['id'].'&day=sunday&time='.$row['runtime'].">Редактировать</a><a href=delete_para.php?group=".$id.'&id='.$row['id']."> Удалить</a></div>";
        break;
    }
 }
 echo "</div>";
 echo "</div>";
*/
?>