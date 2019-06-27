<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';

if (empty($_GET['id_team'])){
    echo'<li><a href=edit_group.php>Вернуться назад</a></li>';
    exit('Ошибка: данные не были переданны!');
}
else{
    //удаляем таблицу
    $group = $_GET['id_team'];
    $query = "DELETE FROM `team` WHERE `team`.`id_team` = '$group'";
    $sql = mysqli_query($mysqli, $query);
    if ($sql) {
       $del = "Группа удалена";
       echo "<script>window.location.href='compilation.php?status={$del}';</script>";
     } else {
       echo '<p>Произошла ошибка: ' . mysqli_error($mysqli) . '</p>';
     }
}

?>