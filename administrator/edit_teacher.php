<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
if (isset($_GET['fio_id'])){
    // экранирования символов для mysql
    $id = htmlentities(mysqli_real_escape_string($mysqli, $_GET['fio_id']));
   // echo 'Идентификационный номер записи = '.$id.'<br/>';
}
else{
    exit('Ошибка: данные не были переданны!');
}

$query ="SELECT * FROM `teacher` WHERE id_teacher = '$id'";
// выполняем запрос
$result = mysqli_query($mysqli, $query) or die ("Ошибка " . mysqli_error($mysqli));
$row = mysqli_fetch_array($result);
    
?>

<!DOCTYPE html>
<html>
<head>
<title>Редактирование</title>
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
    if($_POST['name'] != null){
        echo $_POST['name'].' - ';
        $fio = htmlentities(mysqli_real_escape_string($mysqli, $_POST['name']));
        $query ="UPDATE `teacher` SET name_teacher='$fio' WHERE id_teacher='$id'";
        $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
        if($result)
            echo "<span style='color:green;'>данные обновлены</span>";
            $row['name'] = null;
    }
    else{
        echo ("<span style='color:red;'>Введите изменения</span>");
    }
    ?>
   
    <form action='' method='POST'>
     <input size='50' type='text' name='name' value="<?= $row['name_teacher'];?>" />
     <input type='submit' name='submit_edit'  class='buttons' value='Подтвердить' />
    </form>
    <div>
</body>
</html>