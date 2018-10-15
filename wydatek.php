<?php
		
		session_start();
		
		if (isset($_POST['expense_amount']))
		{
			$confirm_expense = true;
			
			//spr kwoty
			$amount = $_POST['expense_amount'];
			
			if (is_numeric($amount) == false)
			{
				$confirm_expense = false;
				$_SESSION['e_amount']="Niepoprawna kwota ! Poprawny format: 100.00";
			}
			
			// spr daty 
			$expense_date = $_POST['expense_date'];

			$year = substr($expense_date, 0, 4);
			$month=substr($expense_date, 5, 2);
			$day = substr($expense_date, 8);

			if (checkdate((int)$month, (int)$day, (int)$year) == false)
			{
				$confirm_expense = false;
				$_SESSION['e_date']="Niepoprawna data ! Poprawny format: RRRR-MM-DD.";
			}
		
		// spr wyboru listy
			
			$payment_method=array("Gotówka", "Karta płatnicza", "Karta kredytowa");
			
			if (!in_array($_POST['expense_payment_method'], $payment_method))
			{
				$confirm_income = false;
				$_SESSION['e_payment_method']="Wybierz przynajmniej jedną kategorię przychodu !";
			}
		
			$comment = $_POST['expense_comment'];
			if (strlen($comment) > 100 )
			{
				$confirm_expense = false;
				$_SESSION['e_comment']="Komentarz jest zbyt długi ! Max długość komentarza to 100 znaków !";
			}
			
		// kategorii
	
			$expense_category=array("Mieszkanie", "Kredyt", "Transport", "Telekomunikacja", "Opieka zdrowotna", "Ubranie", "Higiena", "Dzieci", "Rozrywka", "Wycieczka", "Książki", "Oszczędności", "Spłta długów", "Darowizna", "Na złotą jesień, czyli emeryturę", "Inne wydatki");
			
			if (!in_array($_POST['expense_category_select'], $expense_category))
			{
				$confirm_income = false;
				$_SESSION['e_category_select']="Wybierz przynajmniej jedną kategorię przychodu !";
			}
		
		
			if ($confirm_expense == true)
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
						$payment_method = $_POST['expense_payment_method'];
						$expense_category_select = $_POST['expense_category_select'];
						$username = $_SESSION['user'];
						
						
						$answer = $connection->query("SELECT * FROM users WHERE username = '$username'");
						$row_user = $answer->fetch_assoc();
						$sign_in_user_id = $row_user['id'];
						
						
						$result = $connection->query("SELECT * FROM expenses_category_assigned_to_users WHERE name = '$expense_category_select' AND user_id = '$sign_in_user_id'");
						$row = $result->fetch_assoc();
						$id_expense_assigned_to_user = $row['id'];	
						
						
						//echo $payment_method;exit(); //daje prawidłowy wynik
		
						$result = $connection->query("SELECT * FROM payment_methods_assigned_to_users WHERE name = '$payment_method' AND user_id = '$sign_in_user_id'");
						$row = $result->fetch_assoc();	
						$id_payment_method = $row['id'];
						
						
						echo $id_payment_method;exit(); // daje pusty wynik
						
						
						if ($connection->query("INSERT INTO expenses VALUES 
						(NULL, '$sign_in_user_id',  '$id_expense_assigned_to_user', '$id_payment_method', '$amount', '$expense_date', '$comment' )"))
						{
						
							$_SESSION['expense_added']="Dodano nowy wydatek !";
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
						echo "Błąd serwera ! Przepraszamy za niedogodności i prosimy o dodanie wydatku w innym terminie.";
				}
			}
		}
?>