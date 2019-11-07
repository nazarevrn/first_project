<?php


    class Autorization
	{
		public $login;
		public $password;
		public $is_boss;
		public $pass;
		public $user_id;
		private $link;
	    private $query;
		
		public function check_id($login)
		{
			include_once("../classes/database.php");
			$db = new Database();
	        $row = $db -> querry_to_database("SELECT id FROM users WHERE login = '" . $login . "'");
			unset($db);
            while($id = mysqli_fetch_assoc($row)) {
	            $user_id = $id['id'];
            }
			if ( $user_id ) {
			    return $user_id;
			} else return "0";
		}

		public function check_password($user_id)
		{
			
			include_once("../classes/database.php");
			$db = new Database();
	        $row = $db -> querry_to_database("SELECT password, is_boss FROM users WHERE id = '" . $user_id . "'");
			unset($db);
            while($pass = mysqli_fetch_assoc($row)) {

	            $pass_in_db = $pass['password'];
			    $is_boss = $pass['is_boss'];

				
           }
			$result = array("pass_in_db" => $pass_in_db, "is_boss" => "$is_boss");

			return $result;
			
		}		
	}
?>