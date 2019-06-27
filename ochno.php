<?php
//session_start();
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu.inc.php";
//echo 'Статус: '.$_GET['rez'];
?>
<head>
<title>Расписание групп</title>
    </head>
 <body>
     <nav class="container bg-dark">
     <div class="navbar navbar-default navbar-fixed-top">
        <?php drawMenu($leftMenu); ?>
     </div>
     </nav>
     <h2>Группы</h2>
 <table class='table  table-condensed table-bordered table-hover bg-light'>

    <?php
    for($i=1; $i<=3; $i++){
        echo '<td>';
    $result = $mysqli->query("SELECT * FROM `team` WHERE `course` = '$i'");

    if (!$result) {
        echo "Ошибка базы, не удалось получить данные\n";
        echo 'Ошибка MySQL: ' . mysqli_error();
        exit;
    }
    echo "<tr><th>".$i." курс</th></tr>";
    while($row =  $result->fetch_assoc()) // массив с данными
    {  
        echo '<tr>';
        echo '<td><a href=group.php?name_group='.$row['name_team'].'>'.$row['name_team'].'</a></td>';
        echo '</tr>';
     } 
     echo '</td>';
}
    ?>
</table>
</body>