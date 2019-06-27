<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <title>Расписание групп</title>
 <meta charset="utf-8">
 </head>
 <body>
     <nav class="container bg-dark">
     <div class="navbar navbar-default">
        <?php drawMenu($leftMenu); ?>
     </div>
     </nav>
     <h2>Группы</h2>
 <table class='table  table-condensed table-bordered table-hover bg-light'>

    <?php
    //for($i=1; $i<=3; $i++){
       // echo '<td>';
    $result = $mysqli->query("SELECT * FROM `zaochno_team`");

    if (!$result) {
        echo "Ошибка базы, не удалось получить данные\n";
        echo 'Ошибка MySQL: ' . mysqli_error();
        exit;
    }
    //echo "<tr><th>".$i." курс</th></tr>";
    while($row =  $result->fetch_assoc()) // массив с данными
    {  
        echo '<tr>';
        echo '<td><a href=zaochno_group.php?name_group='.$row['name'].'>'.$row['name'].'</a></td>';
        echo '</tr>';
     } 
     //echo '</td>';
//}
    ?>
</table>
</body>
</html>