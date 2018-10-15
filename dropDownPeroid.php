<?php
/*
	require_once "connect.php";

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
					$username = $_SESSION['user'];
					$dateStart = new DateTime('first day of this month');
					$dateS = $dateStart->format('Y-m-d');
					

					$dateLast = new DateTime('last day of this month');
					$dateL = $dateLast->format('Y-m-d');

					$answer = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
					//obecny miesiac
					
					$answer1 = $connection->query("SELECT income_category_assigned_to_user_id, SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' GROUP BY income_category_assigned_to_user_id ORDER BY SUM(amount) DESC");

					$_SESSION

				}
			$connection->close();
		}

		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}


*/
?>
<script>
	var  elSelectPeroid, elComment;
	elSelectPeroid = document.getElementById('peroid');
	elComment   = document.getElementById('dropDownPeroid');

	function switchPeroid() {
			
		var comment = this.options[this.selectedIndex].value;    
		  
		if 				(comment === 'BM') {	elComment.innerHTML = 'Bieżący miesiąc'; pie();}
		else if		 (comment === 'PM'){		elComment.innerHTML = 'Poprzedni miesiąc'; pie();}
		else if 			(comment === 'BR'){	elComment.innerHTML = 'Bieżący rok'; pie(); }
		else {

			elComment.innerHTML = 'Zakres wybranych dat: '  + '<br/>'; pie();
		  }
	}

	function pipe(){
		<?php 
		echo 'hoho';
		?>
		
		
	}
		elSelectPeroid.addEventListener('change', switchPeroid, false);
		elSelectPeroid.addEventListener('change', pipe, false);

	/*

	SELECT income_category_assigned_to_user_id, SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '2018-10-05' AND '2018-10-12' AND user_id = 1 GROUP BY income_category_assigned_to_user_id ORDER BY SUM(amount) DESC

	*/
</script>

