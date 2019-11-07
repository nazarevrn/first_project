<?php
class Show_not_agreed
{
    public $login;
    public $begin;
    public $end;

    public function show_header()
    {
        echo '
			﻿<html>
            <header>
	            <title>Показать отпуска</title>
	            <link rel="stylesheet" href="../../css/style.css" type="text/css">
	        </header>
			<table class="simple-little-table" cellspacing="0" align = "center">
			<tr><th>Логин</th><th>Дата начала</th><th>Дата окончания</th><th>Действие</th></tr>
			';
    }

    public function gen_string($login, $begin, $end)
    {

        echo "<tr><td>" . $login . "</td><td>" . $begin . "</td><td>" . $end .
            '</td><td><form action="holidays_agree_controller.php" method="post">
		    <button type="submit" style = "height:5%; width:100%">Согласовать!</button>
		    <input type="hidden" name="login" value="' . $login . '" />
		    </form></td></tr>';
    }

    public function show_footer()
    {
        echo "
			</table>
			</html>";
    }
}
