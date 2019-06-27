<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Добавление данных в БД</title>
<meta charset="utf-8">
</head>
<body>
<div class='head'>
    <h3>Админ панель</h3>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
     <h2>Введите номер аудитории и название корпуса которого хотите добавить в список</h2>
     <div class='add'>
<?php

// экранирования символов для mysql
$name_number = htmlentities(mysqli_real_escape_string($mysqli, $_POST['name_number']));
$name_location = htmlentities(mysqli_real_escape_string($mysqli, $_POST['name_location']));
if(empty($name_number) and empty($name_location)){
    $text = 'Заполните поле данными';
    echo '<label>Статус:'.$text.'</label><br/>';
}
else{
    $query = "INSERT INTO `location`(`id_loc`,`place`,`location`) VALUES (NULL,'$name_number','$name_location')";
    $result = mysqli_query($mysqli, $query) or die ('Ошибка добавления данных!');
    if ($result){
        $text = 'Данные успешно добавлены';
}
echo '<label>Статус: </label>';
echo "<span style='color:green;'>".$text."</span>";
}
?>
    <form action='' method="POST">
     
     <input size='50' type="text" name="name_number" placeholder="введите данные в поле" required/>
     <input size='50' type="text" name="name_location" placeholder="введите данные в поле" required/>
     <input type="submit" name="done" value="Добавить" />
    </form>
</div>
</body>
</html>
