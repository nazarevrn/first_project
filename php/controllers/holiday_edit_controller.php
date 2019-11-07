<?php
session_start();

$login = $_SESSION['login'];
include_once "../classes/user.php";
#Получили данные из формы авторизации. Считаем их валидными. Наивный глупец
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $holiday_start = $_POST['holiday_start'];
    $holiday_end = $_POST['holiday_end'];
    $interval = date_diff(date_create_from_format('Y-m-d', $holiday_start), date_create_from_format('Y-m-d', $holiday_end));
    $duration = $interval->format('%R%a дней');
    $holiday_start = date_create_from_format('Y-m-d', $holiday_start)->format('d-m-Y');
    $holiday_end = date_create_from_format('Y-m-d', $holiday_end)->format('d-m-Y');
}
include_once "../classes/holiday.php";

$holiday = new Holiday($login, $holiday_start, $holiday_end);
include_once "../models/holiday_model.php";
$actions = new Holiday_actions($login, $holiday_start, $holiday_end);
$message = $actions->edit_holiday($login, $holiday_start, $holiday_end);
if ($message) {
    include_once "../viewes/view_message_to_user.php";
    $alert = new Show_message_to_user();
    $alert->show_message("$message");
    unset($alert);
}
