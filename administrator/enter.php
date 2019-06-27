<?php
session_start();
if($_SESSION['admin']){
    header("Location: admin.php");
    exit;
}
$admin = 'admin';
$pass = '62fa8d4e0ec24f11cd0ed1bef25c1c9a';
if ($_POST['submit']){
    if($admin == $_POST['login'] AND $pass == md5($_POST['password'])){
        $_SESSION['admin'] = $admin;
        header ("Location: admin.php");
        exit;
    }
    else{
        echo "<h4 style='color:red' align='center'>Логин или пароль не верны!<h4>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Страница авторизации</title>
<meta charset="utf-8">
<style>
.block{
    margin:10px auto 5px;
    background-color: rgb(89, 97, 97);
    width:300px;
    height:200px;
    border:1px solid black;  
}
</style>
</head>
<body>
    <div class='block'>
<p>Авторизация:</p>
<form action="" method="post">
        <label>Логин:</label></br>
  <input name="login" placeholder="введите логин"></br>
  <label>Пароль:</label></br>
  <input type="password" name="password" placeholder="введите пароль"></br>
  <input type="submit" name="submit" value="Войти">
</form>
</div>
</body>
</html>