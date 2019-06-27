<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
include "menu_adm.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Добавление группы</title>
<meta charset="utf-8">
</head>
<body>
<div class='head'>
<a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
     <h4 align='center'> Добавьте группу в список</h4>
     <div class='add'>
    <h4>Введите название группы которую хотите добавить в список </h4>
   <form action='' method='POST'>
       <input class="form-control" style='width:200px;' type='text' name='name_group' placeholder='название группы' required/>
       <input type='submit' name='done' value='Подтвердить' />
     <?php  
       $group =  $_POST['name_group']; 
       //$_SESSION["group"] = $group;
       echo '</br>'.$_GET['status'];
       if ($group == null){
           echo '</br> Введите название группы </br>';
         }
         else{
             $query ="INSERT INTO `zaochno_team`(`id_group`,`name`) VALUES (NULL,'$group')";
             $result = mysqli_query($mysqli, $query); 
             if($result){
                 echo '</br>Группа '.$group.' успешно добавлена</br>';
                 $rez = 'Группа '.$group.' успешно добавлена';
                 //НАПРАВЛЕНИЕ НА СТРАНИЦУ С КОНСТРУКТОРОМ
                 echo "<script>window.location.href='/administrator/zaochno.php?status={$rez}';</script>";   
              }
              else{
                echo "</br>Ошибка " . mysqli_error($mysqli);
              }
            }
      ?>
    </form>      
 </div>
<diV class='compilation'>
<?
$result = $mysqli->query("SELECT * FROM `zaochno_team`");

if (!$result) {
    echo "Ошибка базы, не удалось получить данные\n";
    echo 'Ошибка MySQL: ' . mysqli_error();
    exit;
}

     echo"<table class='table  table-condensed table-bordered table-hover bg-light'>";
     $i = 1;   
     echo "<tr bgcolor='gray'><th>№</th><th>id группы</th><th>Группа</th><th>Удалить группу</th></tr>";
     while($row =  $result->fetch_assoc()) // массив с данными
    {  
        echo '<tr>';
        echo "<td>".$i."</td>";
        echo "<td>".$row['id_group']."</td>";
        echo '<td><a href=zaochno_con.php?name_group='.$row['name'].'>'.$row['name'].'</a></td>';
        echo "<td align = 'center';><a href=zaochno_del.php?id_team=".$row['id_team'].">Удалить</a></td>";     
        echo '</tr>';
        $i++;
     } 

?>
</diV >


</body>
</html>