<html>
    <header>
	    <title>Показать отпуска</title>
	    <link rel="stylesheet" href="../../css/style.css" type="text/css">
	</header>

<?php

    session_start();	
    $login = $_SESSION[login];
    include_once("../models/holiday_model.php");
	$holidays = new Holiday_actions();
	$result = $holidays -> show_holidays();
	include_once("../viewes/view_show_holidays.php");
	$view = new Show_holidays();
	$view -> show_header();
	
	while ($row = mysqli_fetch_object($result)) {
	    $view -> gen_string($row->login, $row->begin, $row->end, $row->agreed);
    }
	
	unset($holidays);
	$view -> show_footer();
	unset($view);
?>
</html>