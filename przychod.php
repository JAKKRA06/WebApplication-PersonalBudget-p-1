<?php


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
		
		
		
		
		if ($confirm_income == true)
		{
			// wkladanie do basy
			//instert
		}
		
	}
	
?>