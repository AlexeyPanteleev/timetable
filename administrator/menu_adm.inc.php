<?php 
include "style.php";

$leftMenu=[
    ['link'=>'На сайт с расписанием','href'=>'http://timetable'],
    ['link'=>'Список преподавателей','href'=>'table_teacher.php?id=table_teacher'],
    ['link'=>'Список дисциплин','href'=>'table_disciplines.php?id=table_disciplines'],
    ['link'=>'Список аудиторий','href'=>'table_location.php?id=table_location'],
    ['link'=>'Заочное отделение','href'=>'zaochno.php?id=zaochno'],
    ['link'=>'Группы','href'=>'compilation.php?id=compilation'],
    ['link'=>'Составление расписания','href'=>'edit_timetable.php?id=edit_timetable'],
    ['link'=>'История расписания','href'=>'history.php?id=history']
    ];
function drawMenu($leftMenu){
			foreach ($leftMenu as $item){
				echo "<ul class='navbar-nav'> <li class='nav-item'> <a href={$item['href']} class='nav-link text-white'>{$item['link']}</a> </li> </ul>";
			}
            }
            
?>
    <style>
    .menu{
        background:#09192A;
        border:1px solid black; 
        width:17%;
        height:92%;
        float:left;
    }
    .head{
        background:#09192A;
        width:100%;
        height:8%;
        border:1px solid black;
        color:white;
    }
    .content{
        width:80%;
        height:65%;
        border:1px solid black;
        background:silver;
        overflow-y: auto;
        float:right;
        margin-right:10px
    }
    .add{
        width:80%;
        height:20%;
        border:1px solid black;
        float:right;
        background:silver;
        margin-right:10px
    }
    .constructor{
        width:80%;
        height:40%;
        border:1px solid black;
        background:silver;
        overflow-y: auto;
        float:right;
        margin-right:10px
    }    
    .menu_constructor{
        background:#09192A;
        border:1px solid black; 
        width:17%;
        height:45%;
        float:left;
    }
    .compilation{
        width:80%;
        height:60%;
        border:1px solid black;
        background:silver;
        overflow-y: auto;
        float:right;
        margin-right:10px
    }
    .content_now{
        width:49%;
        height:95%;
        border:1px solid black;
        background:silver;
        overflow-y: auto;
        float:left;
        margin-left:5px
    }
    .content_future{
        width:49%;
        height:95%;
        border:1px solid black;
        background:silver;
        overflow-y: auto;
        float:right;
        margin-right:5px
    }
    .prosmotr{
        width:60%;
        height:80%;
        border:1px solid black;
        background:silver;
        overflow-y: auto;
        float:left;
        margin-left:5px
    }
    .content_history{
        width:80%;
        height:90%;
        border:1px solid black;
        background:silver;
        overflow-y: auto;
        float:right;
        margin-right:10px
    }
    </style>