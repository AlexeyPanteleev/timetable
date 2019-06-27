<?php
// создаем таблицу в БД с названием группы
$group =  $_POST['name_group'];
echo 'oooooooooo  группа '.$group;
echo "<h2>Укажите необходимые данные</h2>
  
<form action='proba.php' method='POST'>
  <input size='22' type='text' name='group' placeholder='введите название группы' />
   <input type='submit' name='done' value='Добавить' />
</form>";

?>