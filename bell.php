<?php
include "menu.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <title>Расписание звонков</title>
 <meta charset="utf-8">
 </head>
  <body>
  <nav class="container bg-dark">
     <div class="navbar navbar-default navbar-fixed-top">
        <?php drawMenu($leftMenu); ?>
     </div>
     </nav>
</br>
    <h2 align='center'>Расписание звонков</h2>
    <div class="table-responsive">
  <table class="table table-bordered table-hover bg-light">
 <tr bgcolor='gray'><th>Пара</th><th>Понедельник</th><th>Вторник</th><th>Среда</th><th>Четверг</th><th>Пятница</th><th>Суббота</th></tr>
 <tr>
 <td bgcolor='gray'>Первая пара</td>
 <td>8:00 - 9:30</td>
 <td>8:00 - 9:30</td>
 <td>8:00 - 9:30</td>
 <td>8:00 - 9:30</td>
 <td>8:00 - 9:30</td>
 <td>8:00 - 9:30</td>
 </tr>

 <tr>
 <td bgcolor='gray'>Вторая пара</td>
 <td>9:40 - 11:10</td>
 <td>9:40 - 11:10</td>
 <td>9:40 - 11:10</td>
 <td>9:40 - 11:10</td>
 <td>9:40 - 11:10</td>
 <td>9:40 - 11:10</td>
 </tr>

 <tr>
 <td bgcolor='gray'>Третья пара</td>
 <td>11:20 - 12:50</td>
 <td>11:20 - 12:50</td>
 <td>11:20 - 12:50</td>
 <td>11:20 - 12:50</td>
 <td>11:20 - 12:50</td>
 <td>11:20 - 12:50</td>
 </tr>

 <tr>
 <td bgcolor='gray'>Четвёртая пара</td>
 <td>13:20 - 14:50</td>
 <td>13:20 - 14:50</td>
 <td>13:20 - 14:50</td>
 <td>13:20 - 14:50</td>
 <td>13:20 - 14:50</td>
 <td>13:00 - 14:30</td>
 </tr>

 <tr>
 <td bgcolor='gray'>Пятая пара</td>
 <td>15:00 - 16:30</td>
 <td>15:00 - 16:30</td>
 <td>15:00 - 16:30</td>
 <td>15:00 - 16:30</td>
 <td>15:00 - 16:30</td>
 <td>14:40 - 16:10</td>
 </tr>

 <tr>
 <td bgcolor='gray'>Шестая пара</td>
 <td>16:40 - 18:10</td>
 <td>16:40 - 18:10</td>
 <td>16:40 - 19:10</td>
 <td>16:40 - 18:10</td>
 <td>16:40 - 18:10</td>
 <td>16:20 - 17:50</td>
 </tr>

 <tr>
 <td bgcolor='gray'>Седьмая пара</td>
 <td>18:20 - 19:50</td>
 <td>18:20 - 19:50</td>
 <td>18:20 - 19:50</td>
 <td>18:20 - 19:50</td>
 <td>18:20 - 19:50</td>
 <td>18:00 - 19:30</td>
 </tr>

 <tr>
 <td bgcolor='gray'>Восьмая пара</td>
 <td>20:00 - 21:30</td>
 <td>20:00 - 21:30</td>
 <td>20:00 - 21:30</td>
 <td>20:00 - 21:30</td>
 <td>20:00 - 21:30</td>
 <td>19:40 - 21:10</td>
 </tr>
</table>
</div>
  </body>
</html>