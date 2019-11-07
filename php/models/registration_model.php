<?php

class Registration
{
    public $login;
    public $password;
    public $is_boss;
    public $pass;
    public $user_id;
    private $link;
    private $query;

    public function add_user($login, $password, $is_boss)
    {
        include_once "../classes/database.php";
        $db = new Database();
        $row = $db->querry_to_database("INSERT INTO `users` (`login`, `password`, `is_boss`) VALUES ('$login'" . ", " . "'$password'" . ", " . "'$is_boss')");
        unset($db);
        if ($row) {
            return "Ok";
        } else {
            return "Error";
        }
    }

}
