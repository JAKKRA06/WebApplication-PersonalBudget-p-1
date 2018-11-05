<?php
		session_start();
		
		if (!isset($_SESSION['sign_in']))
		{
			header('Location: index.php');
			exit();
		}
		
		$_SESSION['startDate'] = $_POST['startDate'];
		$_SESSION['lastDate'] = $_POST['lastDate'];
		$_SESSION['non_standard'] = true;
		
	
		header ('Location: menu.php');
?>