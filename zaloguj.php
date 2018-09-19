<?php 

		session_start();
		
		if (!isset($_POST['login']) || (!isset($_POST['password'])))
		{
			header('Location: index.php');
			exit();
		}
		
		require_once "connect.php";

		$connection = @new mysqli($host, 	$db_user, $db_password, $db_name);
		 if ($connection->connect_errno != 0)
		 {
			 echo "Error: ".$connection->connect_errno;
		 }
		 else
		 {
			$login = $_POST['login'];
			$password = $_POST['password'];
			
			$sql_logIn = "SELECT * FROM users WHERE username='$login' AND password='$password'";		
			
			if ($result = @$connection->query($sql_logIn))
			{
				$how_many_users = $result->num_rows;
				if ($how_many_users > 0)
				{
					$_SESSION['sign_in'] = true;
				
					$row = $result->fetch_assoc();	
					$_SESSION['id_user'] = $row['id'];
					$_SESSION['user'] = $row['username'];

					unset($_SESSION['warning']);
					$result->close();
					header('Location: menu.php');
				}
				else
				{
					$_SESSION['warning'] = '<span style="color:red">Nieprawidłowy login lub hasło! </span>';
					header('Location: logowanie.php');
				}
					
			}
			else
			{
				
			}
			$connection->close();
		 }

?>