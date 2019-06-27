<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';

include "menu_adm.inc.php";
?>
<title>Дисциплины</title>
<div class='head'>
            <a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>

<?

//echo "<a href='admin.php'>Вернуться назад</a>";
echo "<h2 align='center'>Таблица преподаваемых дисциплин</h2>";
echo "<div class='content'>";
echo "<form action='' method='POST'><table class='table table-bordered table-hover'>";
echo "<tr bgcolor='gray'><th>id</th><th>№</th><th>Название дисциплины</th><th>Изменить</th><th>Удалить запись</th></tr>";
$i = 1;
$result = $mysqli->query('SELECT * FROM disciplines');
while($row = $result->fetch_assoc()){
    echo '<tr>';
    echo "<td bgcolor='red'>".$row['id_disciplines']."</td>";
    echo '<td>'.$i++.'</td>';
    echo '<td>'.$row['name_disciplines'].'</td>';
    echo '<td><a href=edit_disciplines.php?name_id='.$row['id_disciplines'].'>Редактировать</a></td>';
    echo "<td align = 'center';><a href=delete.php?disciplines_id=".$row['id_disciplines'].">Удалить</a></td>";
    echo '</tr>';
}
echo "</table><br></form>";
echo "</div>";
echo "<a class='btn btn-success' href=add_disciplines.php>Добавить дисциплину</a>";



?>