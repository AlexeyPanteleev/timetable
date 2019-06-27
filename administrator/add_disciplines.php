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
     <h2>Введите название предмета которого хотите добавить в список</h2>
     <div class='add'>
<?php
// экранирования символов для mysql
$name = htmlentities(mysqli_real_escape_string($mysqli, $_POST['name']));
if(empty($name)){
    $text = 'Заполните поле данными';
    echo '<label>Статус:'.$text.'</label><br/>';
}
else{
    $query = "INSERT INTO `disciplines`(`id_disciplines`,`name_disciplines`) VALUES (NULL,'$name')";
    $result = mysqli_query($mysqli, $query) or die ('Ошибка добавления данных!');
    if ($result){
        $text = 'Данные успешно добавлены';
}
echo '<label>Статус: </label>';
echo "<span style='color:green;'>".$text."</span>";
}
?>
    <form action='' method="POST">
     
     <input size='70' type="text" name="name" placeholder="введите данные в поле" required/>
     <input type="submit" name="done" value="Добавить" />
    </form>
</div>
</body>
</html>