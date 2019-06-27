<?php

session_start();
//точка входа
if($_SERVER['REQUEST_URI'] == '/') $page = 'home';
else{
    $page = substr($_SERVER['REQUEST_URI'], 1);
    if(!preg_match('/^[A-z0-9]{3-15}$/, $page')) exit('error url');
}
//переход по страницам
if(file_exists('all/'.$page.'.php')) include 'all/'.$page.'.php';
else if(file_exists('administrator/'.$page.'.php')) include 'administrator/'.$page.'.php';
else if($page != 'home') exit('Страница отсутствует 404');

    include "menu.inc.php";
?>


<!DOCTYPE html>
<html lang="ru" >
<head>
    <meta charset="UTF-8">  
</head>
<body>
<nav class="container bg-dark">
     <div class="navbar navbar-default navbar-fixed-top">
        <?php drawMenu($leftMenu); ?>
     </div>
     </nav>
</body>
 </html>
