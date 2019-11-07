
<?php session_start(); 

	if ($_SESSION['login'] !== Null) {
	
	echo '
	<html>
    <header>
	    <title>Меню</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
	</header>
	<body>
	    
		    <table>
			<form>
                <tr><td><button formtarget = "workfield" formaction = "../frames/holiday_create.html">Создать отпуск</button></td></tr>
			    <tr><td><button formtarget = "workfield" formaction = "../frames/holiday_edit.html">Редактировать отпуск</button></td></tr>
			    <tr><td><button formtarget = "workfield" formaction = "../php/controllers/holidays_show_controller.php">Посмотреть отпуска коллег</button></td></tr>
			    
	';			

	
	    if ($_SESSION['is_boss'] === "1") {
	
	    echo '
				
				<tr><td><button formtarget = "workfield" formaction = "../php/controllers/holidays_show_not_agreed_controller.php">Согласовать отпуска</button></td></tr>
		    ';
		}
	echo '	
		
			</form>
			</table>
        
	</body>
</html>';
	}
?>