
<?php
    #session_start();
	include_once("../models/holiday_model.php");
    $holidays = new Holiday_actions();
    $result = $holidays -> show_not_agreed_holidays();
    include_once("../viewes/view_show_not_agreed.php");
	$view = new Show_not_agreed();
	$row = mysqli_fetch_object($result);

	if ( !$row ) {
		include_once("../viewes/view_message_to_user.php");
		$alert = new Show_message_to_user();
		$alert -> show_message("Нечего согласовывать!");
		unset($alert);
	} else {
	    $view -> show_header();
		$holidays = new Holiday_actions();
        $result = $holidays -> show_not_agreed_holidays();
	    while ($row1 = mysqli_fetch_object($result)) {
	        $view -> gen_string($row1->login, $row1->begin, $row1->end, $row1->agreed);
        }
	    $view -> show_footer();
	    }
	unset($holidays);
    unset($view);

	
?>




