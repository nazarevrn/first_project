<?php 
    session_start();
    #print_r($_SESSION);
	#echo "Привет, $_SESSION[login]";
	echo '
	<html>
	<head>
	<meta charset="utf-8">
	</head>
	<body background="../img/1-3.jpg">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<br>
	<b class = "custom"><p align = "center">

	     ';
	if ( $_SESSION[login] ) {
		echo "Привет, $_SESSION[login]!";
	} else {
		echo "Выполните вход или <br>зарегистрируйтесь!";
	}
    echo "</p></b></body></html>";
?>