<?php
		
		session_start();
		
		if (isset($_POST['income_amount']))
		{
			$confirm_income = true;
			
			//spr kwoty
			$amount = $_POST['income_amount'];
			
			if (is_numeric($amount) == false)
			{
				$confirm_income = false;
				$_SESSION['i_amount']="Niepoprawna kwota ! Poprawny format: 100.00";
			}
			
			// spr daty 
			$income_date = $_POST['income_date'];

			$year = substr($income_date, 0, 4);
			$month=substr($income_date, 5, 2);
			$day = substr($income_date, 8);

			if (checkdate((int)$month, (int)$day, (int)$year) == false)
			{
				$confirm_income = false;
				$_SESSION['i_date']="Niepoprawna data ! Poprawny format: RRRR-MM-DD.";
			}

			
			//spr komentarza max 100 
			
			$comment = $_POST['income_comment'];
			if (strlen($comment) > 100 )
			{
				$confirm_income = false;
				$_SESSION['i_comment']="Komentarz jest zbyt długi ! Max długość komentarza to 100 znaków !";
			}
			
			// spr wyboru listy
			
			$category=array("Wynagrodzenie", "Odsetki bankowe", "Allegro", "Inne");
			
			if (!in_array($_POST['income_select'], $category))
			{
				$confirm_income = false;
				$_SESSION['i_select']="Wybierz przynajmniej jedną kategorię przychodu !";
			}
			
			
			if ($confirm_income == true)
			{
				require_once "connect.php";
				
				mysqli_report(MYSQLI_REPORT_STRICT);
				
				try 
				{
					$connection = new mysqli($host,	$db_user, $db_password, $db_name);
					if ($connection->connect_errno != 0)
					 {
						 throw new Exception(mysqli_connect_errno());
					 }
					else
					{
						$income_select = $_POST['income_select'];
						$username = $_SESSION['user'];
						
						
						$answer = $connection->query("SELECT * FROM users WHERE username = '$username'");
						$row_user = $answer->fetch_assoc();
						$sign_in_user_id = $row_user['id'];
						
						
						$result = $connection->query("SELECT id FROM incomes_category_assigned_to_users WHERE name = '$income_select' AND user_id = '$sign_in_user_id'");
						$row = $result->fetch_assoc();
						$id_income_assigned_to_user = $row['id'];
						
						
						if ($connection->query("INSERT INTO incomes VALUES 
						(NULL, '$sign_in_user_id',  '$id_income_assigned_to_user', '$amount', '$income_date', '$comment' )"))
						{
						
							$_SESSION['income_added']="Dodano nowy przychód !";
							$connection->close();
							header('Location: menu.php');			
						}
						else
						{
							throw new Exception($connection->error);
						}
					}
					
					$connection->close();
				}
				catch (Exception $error)
				{
						echo "Błąd serwera ! Przepraszamy za niedogodności i prosimy o dodanie przychodu w innym terminie.";
						echo $error;
				}
			}
		}
?>