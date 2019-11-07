<?php
    session_start();
	#print_r $_SESSION['login'];
	
	if ($_SESSION['login'] == Null) {
	
	echo '

    <html>
        <header>
	        <title> Меню с кнопками регистрации и входа.</title>
	        <link rel="stylesheet" href="../css/style.css" type="text/css">
        </header>
	    <body>
	        <table>
	        <form>
                <tr><td><button formtarget = "right_menu" formaction = "../html/registration.html">Регистрация</button></tr></td>
			    <tr><td><button formtarget = "right_menu" formaction = "../html/autorization.html">Вход</button></tr></td>
            </form>
            </table>
	    </body>
    </html>
    ';

    } else {
		echo '
		<html>
		    <header>
			    <link rel="stylesheet" href="../css/style.css" type="text/css">
			</header>
			<body>
			    <table>
				<form>
				    <tr><td><button formtarget = "right_menu" formaction = "../php/controllers/logout_controller.php">Выход</button></tr></td>
				</form>
				</table>
			</body>
		</html>   
		';
	}

?>