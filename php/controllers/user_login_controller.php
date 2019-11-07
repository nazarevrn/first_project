<?php

	session_start();
    include_once("../classes/user.php");
	#Получили данные из формы авторизации. Считаем их валидными
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user = new User();
	    $user -> login = $_POST['login'];
		$user -> password = $_POST['password'];
		$user -> is_boss = "0";
		$user -> user_id = "0";
		$user -> is_auth = "0";
		
	}
	
	
	include_once("../models/autorization_model.php");
	
	#$check = new Autorization($user -> $login, $user -> $password);
	$check = new Autorization($user -> login, $user -> password);
	#Если id введеного логина не 0, пользователь - есть
    $user_id = ($check -> check_id($user -> login));
	
	$user -> user_id = $user_id;
	
	if ( $user_id !== "0" ) {
		$result = ($check -> check_password($user -> user_id));
		
	    if  (($result['pass_in_db']) === ($user -> password)) {
			$user -> is_auth = "1";
			$_SESSION['login'] = $user -> login;
			$_SESSION['is_boss'] = $user -> is_boss;
			
			echo '<script type="text/javascript">window.top.location = "http://c90814qu.beget.tech/"</script>';
			#include("../viewes/view_reload.php");
			#include_once("../viewes/view_reload.php");
			#$reload = new Reload();
			#$reload -> reload();
			#unset($reload);
		    if ( $result['is_boss'] === "1" ) {
			    $user -> is_boss = "1";
				$_SESSION['is_boss'] = $user -> is_boss;
				echo '<script type="text/javascript">window.top.location = "http://c90814qu.beget.tech/"</script>';
		    }
		} else {

			include_once("../viewes/view_message_to_user.php");
		    $alert = new Show_message_to_user();
		    $alert -> show_message("Неверный пароль!");
		    unset($alert);
		}
		
	} else {
		include_once("../viewes/view_message_to_user.php");
		$alert = new Show_message_to_user();
		$alert -> show_message("Неверный логин!");
		unset($alert);
	}

	
	
?>