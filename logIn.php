<?php 

		session_start();
		
		if (!isset($_POST['login']) || (!isset($_POST['password'])))
		{
			header('Location: index.php');
			exit();
		}
		
		require_once "connect_Local.php";

		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$connection = new mysqli($host, $db_user, $db_password, $db_name);
			 if ($connection->connect_errno != 0)
			 {
				 throw new Exception(mysqli_connect_errno());
			 }
			 else
			 {
				$login = $_POST['login'];
				$password = $_POST['password'];
				
				$login = htmlentities($login, ENT_QUOTES, "UTF-8");
				
				if ($result = $connection->query(sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($connection, $login))))
				{
					$how_many_users = $result->num_rows;
					if ($how_many_users > 0)
					{
						$row = $result->fetch_assoc();
						
						if (password_verify($password, $row['password']))
						{
							$_SESSION['sign_in'] = true;
			
							$_SESSION['id_user'] = $row['id'];
							$_SESSION['user'] = $row['username'];

							unset($_SESSION['warning']);
							$result->close();
							header('Location: menu.php');
						}
						else
						{
							$_SESSION['warning'] = '<span style="color:red">Nieprawidłowy login lub hasło! </span>';
							header('Location: logIn.php');
						}
					}
					else
					{
						$_SESSION['warning'] = '<span style="color:red">Nieprawidłowy login lub hasło! </span>';
						header('Location: logIn.php');
					}
						
				}
				else
				{
					throw new Exception ($connection->error);
				}
				$connection->close();
			 }
		
		}
		catch( Exception $error)
		{
			echo '<span style="color:red;">Błąd serwera ! Przepraszamy za niedogodności i prosimy o zalogowanie w innym terminie. </span>';
		}
?>