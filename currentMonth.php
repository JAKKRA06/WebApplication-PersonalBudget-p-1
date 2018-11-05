<?php
		session_start();
		
		if (!isset($_SESSION['sign_in']))
		{
			header('Location: index.php');
			exit();
		}

		$_SESSION['currentMonth'] = true;

		header ('Location: menu.php');
?>