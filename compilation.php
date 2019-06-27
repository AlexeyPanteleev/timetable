<?php
require $_SERVER['DOCUMENT_ROOT'].'/administrator/connection.php';
$group = $_GET['name_group'];
include "menu.inc.php";
?>
<html>
<head>
<style>
div{
    margin: 3px;
    padding: 3px;
}
.table{
    background-color: #d9edf7;
	display: table;
    border:1px solid red; 
}
.row {
	float: left;
    background-color: #f2dede;
    border:1px solid black;
    
}
.cell{
    background-color: aqua;
    width:230px;
    height:100px;
    border:1px solid black;  
    
}
</style>

</head>
<body>
<nav class="container bg-dark">
     <div class="navbar navbar-default navbar-fixed-top">
        <?php drawMenu($leftMenu); ?>
     </div>
     </nav>
<?php
echo "<li><a href='ochno.php'>Группы</a></li>";
 $result_m = $mysqli->query("SELECT * FROM `$group`");
 $result_t = $mysqli->query("SELECT * FROM `$group`");
 $result_w = $mysqli->query("SELECT * FROM `$group`");
 $result_th = $mysqli->query("SELECT * FROM `$group`");
 $result_f = $mysqli->query("SELECT * FROM `$group`");
 $result_s = $mysqli->query("SELECT * FROM `$group`");
 $result_su = $mysqli->query("SELECT * FROM `$group`");
echo "<div class='table'>";
// понедельник
echo "<div class = 'row'>";
echo "Понедельник";
 while($row =  $result_m->fetch_assoc()){
    switch($row['day']){
        case monday :
        echo "<DIV class='cell'>".$row['runtime'].' '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type']."</div>";
        break;
    }
 }
 echo "</div>";
// вторник
 echo "<div class = 'row'>";
 echo "Вторник";
 while($row =  $result_t->fetch_assoc()){
    switch($row['day']){
        case tuesday :
        echo "<DIV class='cell'>".$row['runtime'].' '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type']."</div>";
        break;
    }
 }
 echo "</div>";
//среда
 echo "<div class = 'row'>";
 echo "Среда";
 while($row =  $result_w->fetch_assoc()){
    switch($row['day']){
        case wednesday :
        echo "<DIV class='cell'>".$row['runtime'].' '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type']."</div>";
        break;
    }
 }
 echo "</div>";
//четверг
 echo "<div class = 'row'>";
 echo "Четверг";
 while($row =  $result_th->fetch_assoc()){
    switch($row['day']){
        case thursday :
        echo "<DIV class='cell'>".$row['runtime'].' '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type']."</div>";
        break;
    }
 }
 echo "</div>";
//пятница
 echo "<div class = 'row'>";
 echo "Пятница";
 while($row =  $result_f->fetch_assoc()){
    switch($row['day']){
        case friday :
        echo "<DIV class='cell'>".$row['runtime'].' '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type']."</div>";
        break;
    }
 }
 echo "</div>";
//суббота
 echo "<div class = 'row'>";
 echo "Суббота";
 while($row =  $result_s->fetch_assoc()){
    switch($row['day']){
        case saturday :
        echo "<DIV class='cell'>".$row['runtime'].' '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type']."</div>";
        break;
    }
 }
 echo "</div>";
//воскресенье
 echo "<div class = 'row'>";
 echo "Воскресенье";
 while($row =  $result_su->fetch_assoc()){
    switch($row['day']){
        case sunday :
        echo "<DIV class='cell'>".$row['runtime'].' '.$row['place'].'</br>'.$row['teacher'].'</br>'.$row['disciplines'].'</br>'.$row['type']."</div>";
        break;
    }
 }
 echo "</div>";
 echo "</div>";
?>
</body>
</html>