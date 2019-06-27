<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
$id =  $_GET['name_group'];
$_SESSION['group'] = $id;


$result = $mysqli->query("SELECT `period_week` FROM `timetable` GROUP BY `period_week`");

if (!$result) {
    echo "Ошибка базы, не удалось получить данные\n";
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
     <h2 align='center'>Выберите неделю</h2>
     <div class='content'>
     
     <?php
     $i=1;
     echo "<table class='table  table-condensed table-bordered table-hover bg-light'>";
     echo "<tr bgcolor ='grey';><th>№</th><th>Неделя</th></tr>";  
     while($row =  $result->fetch_assoc()) // массив с данными
    {  
        echo '<tr>';
        echo '<td>'.$i++.'</td>';
        //echo "<td>".$val."</td>";
        echo '<td><a href=vivod.php?week='.$row['period_week'].'>'.$row['period_week'].'</a></td>';
        //echo "<td align = 'center';><a href=delete_group.php?name_group=".$row['name_team'].">Удалить</a></td>";     
        echo '</tr>';

     } 
     //echo '</tr>';*/
    ?>
    </table>
</div>