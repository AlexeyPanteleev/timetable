<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
 
if (isset($_GET['number_id'])){
    // экранирования символов для mysql
    $id = htmlentities(mysqli_real_escape_string($mysqli, $_GET['number_id']));
}
else{
    exit('Ошибка: данные не были переданны!');
}

$query ="SELECT * FROM `location` WHERE id_loc = '$id'";
// выполняем запрос
$result = mysqli_query($mysqli, $query) or die ("Ошибка " . mysqli_error($mysqli));
$row = mysqli_fetch_array($result);
    
?>

<!DOCTYPE html>
<html>
<head>
<title>Редактирование данных в БД</title>
<meta charset="utf-8">
</head>
<body>
<div class='head'>
  <h3>Админ панель</h3>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
     <h2 align="center">Редактируемые данные</h2>
     <div class='add'>
<?php
echo 'Идентификационный номер записи = '.$id.'<br/>';
    echo 'Статус: ';
    if(($_POST['name_number'] != null) and ($_POST['name_location'] != null)){
        echo $_POST['name_number'].' '.$_POST['name_location'].' - ';
        $number = htmlentities(mysqli_real_escape_string($mysqli, $_POST['name_number']));
        $location = htmlentities(mysqli_real_escape_string($mysqli, $_POST['name_location']));
        $query ="UPDATE `location` SET place='$number', location='$location' WHERE id_loc='$id'";
        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
        if($result)
            echo "<span style='color:green;'>данные обновлены</span>";
            $row['place'] = null;
            $row['location'] = null;
    }
    else{
        echo ("<span style='color:red;'>Введите изменения</span>");
    }
    ?>
   <h2>Редактируемые данные</h2>
    <form action='' method='POST'>
     <input size='50' type='text' name='name_number' value="<?= $row['place'];?>" />
     <input size='50' type='text' name='name_location' value="<?= $row['location'];?>" />
     <input type='submit' name='submit_edit'  class='buttons' value='Подтвердить' />
    </form>
</div>
</body>
</html>