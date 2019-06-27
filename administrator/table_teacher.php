<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
?>
<title>Таблица преподавателей</title>
 <div class='head'>
            <a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
<?
//echo "<a href='admin.php'>Вернуться назад</a>";

echo "<h2 align='center'>Таблица преподавателей</h2>";
echo "<div class='content'>";
echo "<form action='delete.php' method='POST'><table class='table table-bordered table-hover'>";
echo "<tr bgcolor='gray'><th>id</th><th>№</th><th>ФИО</th><th>Изменить</th><th>Удалить запись</th></tr>";
$i = 1;
$result = $mysqli->query('SELECT * FROM teacher');
while($row = $result->fetch_assoc()){
    echo '<tr>';
    echo "<td bgcolor='red'>".$row['id_teacher']."</td>";
    echo '<td>'.$i++.'</td>';
    echo '<td width="500">'.$row['name_teacher'].'</td>';
    echo '<td><a href=edit_teacher.php?fio_id='.$row['id_teacher'].'>Редактировать</a></td>';
    echo "<td align = 'center';><a href=delete.php?fio_id=".$row['id_teacher'].">Удалить</a></td>";
    echo '</tr>';
}
echo "</table><br></form>";
echo "</div>";
echo "<a class='btn btn-success' href=add_teacher.php>Добавить преподавателя</a>";


?>