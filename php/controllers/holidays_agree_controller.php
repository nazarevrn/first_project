<?php
//хз почему я так сделал, но пусть будет
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    func();
}

function func()
{
    include_once "../models/holiday_model.php";
    $holidays = new Holiday_actions();
    $holidays->agree_holiday($_POST['login']);
    include "holidays_show_not_agreed_controller.php";
}
