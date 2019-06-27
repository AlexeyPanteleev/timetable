<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
?>
<title>Место проведения занятий</title>
<div class='head'>
            <a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>

<?
//echo "<a href='admin.php'>Вернуться назад</a>";
echo "<h2 align='center'>Таблица мест проведения занятий</h2>";
echo "<div class='content'>";
echo "<form action='delete.php' method='POST'><table class='table table-bordered table-hover'>";
echo "<tr bgcolor='gray'><th>id</th><th>№</th><th>Номер аудитории</th><th>Место проведения</th><th>Изменить</th><th>Удалить запись</th></tr>";
$i = 1;
$result = $mysqli->query('SELECT * FROM location');
while($row = $result->fetch_assoc()){
    echo '<tr>';
    echo "<td bgcolor='red'>".$row['id_loc']."</td>";
    echo '<td>'.$i++.'</td>';
    echo "<td>".$row['place']."</td>";
    echo '<td>'.$row['location'].'</td>';
    echo '<td><a href=edit_location.php?number_id='.$row['id_loc'].'>Редактировать</a></td>';
    echo "<td align = 'center';><a href=delete.php?location_id=".$row['id_loc'].">Удалить</a></td>";
    echo '</tr>';
}
echo "</table><br></form>";
echo "</div>";
echo "<a class='btn btn-success' href=add_location.php>Добавить место проведения</a>";

?>