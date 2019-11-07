<?php
include_once "../classes/user.php";
#Получили данные из формы авторизации. Считаем их валидными
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ((strlen($login) > 5) and (strlen($password) > 5)) {
        #echo "OK";
        $user = new User();
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        $user->is_boss = "0";
        $user->user_id = "0";
        $user->is_auth = "0";
        include_once "../models/autorization_model.php";
        $check = new Autorization($user->login, $user->password);
        #Если id введеного логина не 0, пользователь - есть
        $user_id = ($check->check_id($user->login));
        if ($user_id !== "0") {

            include_once "../viewes/view_message_to_user.php";
            $alert = new Show_message_to_user();
            $alert->show_message("Пользователь уже зарегистирован!");
            unset($alert);
        } else {

            include_once "../models/registration_model.php";
            $new_user = new Registration($user->login, $user->password);
            $result = $new_user->add_user($user->login, $user->password, $user->is_boss);
            if ($result === "Ok") {

                include_once "../viewes/view_message_to_user.php";
                $alert = new Show_message_to_user();
                $alert->show_message("Пользователь успешно зарегистирован!");
                unset($alert);

            } else {
                include_once "../viewes/view_message_to_user.php";
                $alert = new Show_message_to_user();
                $alert->show_message("Произошла ошибка!");
                unset($alert);
            }
        }

    } else {
        echo "";
        include_once "../viewes/view_message_to_user.php";
        $alert = new Show_message_to_user();
        $alert->show_message("Длина логина или пароля меньше 5 символов!");
        unset($alert);
    }

}
