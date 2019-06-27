<?php
session_start();
$login = $_POST['login'];
$pas = $_POST['password'];
if ($login == '123' && $pas == 'qwe')
  {
  $_SESSION['admin'] = true;
  $script = 'admin.php';
  }
else
$script = 'adminlog.html';
header("Location: $script");
?>