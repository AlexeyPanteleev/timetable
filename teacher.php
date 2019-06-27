<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu.inc.php";
$result = $mysqli->query("SELECT * FROM `teacher`");

if (!$result) {
    echo "Ошибка базы, не удалось получить данные\n";
    echo 'Ошибка MySQL: ' . mysqli_error();
    exit;
}

//include $_SERVER['DOCUMENT_ROOT'].'/administrator/table_teacher.php';

?>
<head>
<title>Преподаватели</title>
    </head>
    <body>
<div class="container bg-dark">
  <div class="navbar navbar-default navbar-fixed-top">
    <?php drawMenu($leftMenu); ?>
  </div>
</div>
<h2>Преподаватели</h2>
 <table class='table  table-condensed table-bordered table-hover bg-light'>

    <?php
    while($row =  $result->fetch_assoc()) // массив с данными
    {  
        echo '</tr>';
        //echo "<td>".$val."</td>";
        echo '<td><a href=teaching_staff.php?name_teacher='.$row['id_teacher'].'>'.$row['name_teacher'].'</a></td>';
        //echo "<td align = 'center';><a href=delete_group.php?name_group=".$row['name_team'].">Удалить</a></td>";     
        echo '</tr>';

     } 
    ?>
 
</table>
</body>