<?php

    class Holiday_actions
	{
		public $login;
		public $begin;
		public $end;
		public $agreed;
		public $user_id;
		private $link;
	    private $query;
		
		public function add_holiday($login, $begin, $end)
		{
			include_once("../classes/database.php");
			$db = new Database();
	        $row = $db -> querry_to_database('SELECT * FROM holidays WHERE login = "' . $login . '"');

			unset($db);
			while($result = mysqli_fetch_assoc($row)) {

	            $login_in_db = $result['login'];
				
           }			
		    if ($login_in_db === $login) {
				return "Отпуск уже создан!";
		    } else {
				unset($db);
				$db = new Database();
	            $row = $db -> querry_to_database("INSERT INTO holidays (login, begin, end, agreed) VALUES ('$login', '$begin', '$end', '0')");
			    unset($db);
				return "Отпуск добавлен!";
		    }
			
		}

		public function edit_holiday($login, $begin, $end)
		{
			include_once("../classes/database.php");
			$db = new Database();
	        $row = $db -> querry_to_database("SELECT id, agreed FROM holidays WHERE login = '$login'");
			unset($db);
			while($result = mysqli_fetch_assoc($row)) {
                $id = $result['id'];
				$is_agreed = $result['agreed'];
				
           }	
		   
		    if ($is_agreed == '0') {
				$db = new Database();
				$row = $db -> querry_to_database("UPDATE holidays SET begin = '$begin', end = '$end'  WHERE id = '$id'");
			    unset($db);
				return "Ваш отпуск отредактирован, $login!";
			} else {
				return "Ваш отпуск согласован, $login, редактирование невозможно!";
			    }
			
		}

		public function show_holidays()
		{
			include_once("../classes/database.php");
			$db = new Database();
	        $row = $db -> querry_to_database("SELECT * FROM holidays");
			unset($db);
			return $row;
		}
		
		public function show_not_agreed_holidays()
		{
			include_once("../classes/database.php");
			$db = new Database();
	        $row = $db -> querry_to_database("SELECT * FROM holidays WHERE agreed = '0'");
			unset($db);
			return $row;
		}
		
		public function agree_holiday($login)
		{
			include_once("../classes/database.php");
			$db = new Database();
	        $row = $db -> querry_to_database('UPDATE holidays SET agreed = "1"  WHERE login = "' . $login . '"');
			unset($db);
			return $row;
		}
	
	}
?>