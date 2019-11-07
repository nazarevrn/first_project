<?php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        func();
    }
	
    function func()
    {
		#$link = mysqli_connect("127.0.0.1", "c90814qu_efko", "samson#2017", "c90814qu_efko");
	    #$query = 'UPDATE holidays SET agreed = "1"  WHERE login = "' . $_POST[login] . '"';
		#$result = mysqli_query($link, $query);
        
		include_once("../models/holiday_model.php");
	    $holidays = new Holiday_actions();
	    $holidays -> agree_holiday($_POST['login']);
		include ("holidays_show_not_agreed_controller.php");
    }
?>