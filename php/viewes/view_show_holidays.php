<?php
    class Show_holidays
	{
		public $login;
		public $begin;
		public $end;

        public function show_header()
		{
			echo '
                <table class="simple-little-table" cellspacing="0" align = "center">
                <tr><th>Логин</th><th>Дата начала</th><th>Дата окончания</th><th>Согласован</th></tr>
			';

		}
		
	    function gen_string($login, $begin, $end, $agreed)
	    {
		    if ($agreed === '0') {
                $agreed = "Нет";
            } else {
                $agreed = "Да";
                }
			
		    echo "<tr><td>" . $login . "</td><td>" . $begin . "</td><td>" . $end . 
		    '</td><td>' . $agreed . '</td></tr>';
	    }
		
        public function show_footer()
		{
			echo "
			</table>
			";
		}			
	}
?>