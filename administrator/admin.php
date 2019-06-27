<?php
session_start();
if ($_GET['do'] == 'logout'){
    unset($_SESSION['admin']);
    session_destroy();

}
if(!$_SESSION['admin']){
    header ("Location: enter.php");
    exit;
}
include "menu_adm.inc.php";
?>

<html>
<head>
<title>Админ панель сайта</title>
    </head>
    <body>
        <div class='head'>
            <a href=admin.php class='navbar-brand text-white'>Админ панель</a>
</div>
    <div class ="menu">
     <?php drawMenu($leftMenu); ?>
     </div>
   <? // <a class='btn btn-success' href="admin.php?do=logout">Выход</a>?>
    
    </body>
    </html>
