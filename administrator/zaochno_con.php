<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
$status = $_GET['status']; 
if(!empty($_GET['name_group'])){
    $group = $_GET['name_group'];
    //echo 'Группа - '.$group;
}
elseif(!empty($_GET['group'])){ // группа из редактирования
    $group = $_GET['group'];
    //echo 'Группа - '.$group;
}
else{
    //echo 'Группа - '.$_SESSION["group"];
   // $group = $_SESSION["group"];
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Составление расписания</title>
<meta charset="utf-8">

</head>
<body>
<div class='head'>
    <h3>Админ панель</h3>
</div>
    <div class ="menu_constructor">
     <?php drawMenu($leftMenu); ?>
     </div>
     <h4 align='center'>Выберите необходимые данные</h4>
     <div class='constructor'>
<?php
echo 'Группа - '.$group;

  echo "<form action='zaochno_select.php?name_group=".$group."' method='POST' class='form-inline'>";
 
   // выбор группы
   echo "<select name='team'>
   <option disabled selected>Укажите группу</option>";
   $team = $mysqli->query('SELECT * FROM zaochno_team');
   while($row = $team->fetch_assoc()){
       echo "<option value=".$row['id_group'].">".$row['name']."</option>";
   }
   echo '</select></br>';
  // выбор из дня недели
  echo "<select name='week' class='form-control selectpicker' data-live-search='true' style='width:500px;'>
  <option disabled selected>Выберите день недели</option>";
  $week = $mysqli->query('SELECT * FROM week');
  while($row = $week->fetch_assoc()){
      echo "<option value=".$row['id_week'].">".$row['day']."</option>";
  }
  echo '</select></br>';
      
 // выбор из таблицы время
 echo "<select name='period' class='form-control selectpicker' data-live-search='true' style='width:500px;'>
 <option disabled selected>Выберите время</option>";
 $time = $mysqli->query('SELECT * FROM time');
 while($row = $time->fetch_assoc()){
     $i++;
     echo "<option value=".$row['id_time'].">".$i."-пара ".$row['period']."</option>";
 }
 echo '</select></br>';

   //echo "<span style='color:blue;'>Если в выбранное время занятий нет, оставте поля не заполнеными</span>";
   // выбор из таблицы преподавателей
   echo "<br><select name='name_teacher'  class='form-control selectpicker' data-live-search='true' style='width:1000px;'>
  <option disabled selected >Выберите преподавателя</option>";
  $prepod = $mysqli->query('SELECT * FROM teacher');
  while($row = $prepod->fetch_assoc()){
      echo "<option value=".$row['id_teacher'].">".$row['name_teacher']."</option>";
  }
   echo '</select> <br>';
  // ввыбор из таблицы дисциплин
  echo "<br><select name='name_disciplines'  class='form-control selectpicker' data-live-search='true' style='width:1000px;'>
  <option disabled selected>Выберите дисциплину</option>";
  $discip = $mysqli->query('SELECT * FROM disciplines');
  while($row = $discip->fetch_assoc()){
      echo "<option value=".$row['id_disciplines'].">".$row['name_disciplines']."</option>";
  }
   echo '</select> <br>';
   // выбор из таблицы типа занятия
   echo "<br><select name='type'  class='form-control selectpicker' data-live-search='true' style='width:500px;'>
  <option disabled selected>Выберите тип занятия</option>";
  $t = $mysqli->query('SELECT * FROM type');
  while($row = $t->fetch_assoc()){
      echo "<option value=".$row['id_type'].">".$row['name_type']."</option>";
  }
  echo '</select> <br>';
   // выбор из таблицы места расположения
   echo "<br><select name='location'  class='form-control selectpicker' data-live-search='true' style='width:500px;'>
  <option disabled selected>Выберите место проведения занятия</option>";
  $place = $mysqli->query('SELECT * FROM location');
  while($row = $place->fetch_assoc()){
      echo "<option value=".$row['id_loc'].">".$row['place']."-".$row['location']."</option>";
  }
   echo '</select> <br>';
   echo "<span style='color:blue;'>Подтвердите выбор данных для группы </span>";
   echo '<input type="submit" name="done" class="btn btn-success" value="Добавить"/>
 
   </form>';
?>
</div>

<?php
//$team = $_POST['team'];
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
$p = $mysqli->query("SELECT zaochno_team.id_team, zaochno_team.name, id_time FROM `zaochno` inner join zaochno_team on zaochno.id_team = zaochno_team.id_team WHERE zaochno_team.name = '$group'ORDER BY id_time DESC LIMIT 1");                  
if ($p != null){
    while($row =  $p->fetch_assoc()){
        //echo $row['id_time'];
        $kol_par = $row['id_time'];
        }
    }

// узнаём количество дней с занятиями
$day = $mysqli->query("SELECT zaochno_team.name, week.id_week FROM `zaochno` inner join zaochno_team on zaochno.id_team = zaochno_team.id_team inner join week on zaochno.id_day = week.id_week WHERE zaochno_team.name = '$group'ORDER BY id_day DESC LIMIT 1");
if ($day != null){
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
                          inner join zaochno_team on zaochno.id_team = zaochno_team.id_group 
                          inner join week on zaochno.id_day = week.id_week
                          inner join time on zaochno.id_time = time.id_time
                          inner join location on zaochno.id_location = location.id_loc 
                          inner join disciplines on zaochno.id_disciplines = disciplines.id_disciplines 
                          inner join type on zaochno.id_type = type.id_type
                          inner join teacher on zaochno.id_teacher = teacher.id_teacher 
                          where zaochno_team.name = '$group'
                          and week.day = '$d' ORDER BY `id_time`");

echo "<td bgcolor='gray'><small>".$d."</small></td>";

while($row =  $result->fetch_assoc()){
    if($row['period'] == $day_time[$l] ){
        echo "<td><small>".$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher'].'</br><a href=zaochno_del_para.php?del='.$row['id'].'&name_group='.$group."'>Удалить</a></small></td>";
    }
else{
   echo '<td>'.$day_time[$l].'</td>';
   echo "<td><small>".$row['day'].' '.$row['period'].'</br>'.$row['place'].' - '.$row['location'].'</br>'.$row['name_disciplines'].' - '.$row['name_type'].'</br>'.$row['name_teacher'].'<br><a href=zaochno_del_para.php?del='.$row['id'].'&name_group='.$group."'>Удалить</a></small></td>"; 
    $l++;
}
$l++;
}
}
echo '</tr>';
echo "</table>";


?>

</body>
</html>