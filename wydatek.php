<?php
		
		session_start();
		
		if (isset($_POST['expense_date']))
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
		
		// kategorii
	
			$expense_category=array("Mieszkanie", "Kursy", "Kredyt", "Transport", "Telekomunikacja", "Opieka zdrowotna", "Ubranie", "Higiena", "Dzieci", "Rozrywka", "Wycieczka", "Książki", "Oszczędności", "Spłta długów", "Darowizna", "Na złotą jesień, czyli emeryturę", "Inne wydatki");
			
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
						//if ($connection->query("INSERT INTO incomes VALUES (NULL, $_SESSION['id_user'],  NULL , $income_amount, $income_date, $income_comment"))
						//{
						header('Location: menu.php');
						$_SESSION['expense_added']="Dodano nowy wydatek !";
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