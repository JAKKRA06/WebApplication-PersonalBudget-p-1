<?php
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
					$dateStart->format('Y-m-d');


					$dateLast = new DateTime('last day of this month');
					$dateLast->format('Y-m-d');

					$answer = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer->fetch_assoc();
					$sign_in_user_id = $row_user['id'];

					$answer1 = $connection->query("SELECT income_category_assigned_to_user_id, SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN  '2010-01-01' AND '2020-01-01' AND user_id = '$sign_in_user_id' GROUP BY income_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					/*	
					$row_one = $answer->fetch_assoc();
					$first_amount = $row_one['SUM(amount)'];
					$first_id_category = $row_one['income_category_assigned_to_user_id'];

					$row_second = $answer->fetch_assoc();
					$second_amount = $row_second['SUM(amount)'];
					$second_id_category = $row_second['income_category_assigned_to_user_id'];

					$row_third = $answer->fetch_assoc();
					$third_amount = $row_third['SUM(amount)'];
					$third_id_category = $row_third['income_category_assigned_to_user_id'];

					$row_forth = $answer->fetch_assoc();
					$forth_amount = $row_forth['SUM(amount)'];
					$forth_id_category = $row_forth['income_category_assigned_to_user_id'];

					*/
					$sql = "SELECT * FROM incomes_category_assigned_to_users WHERE user_id = '$sign_in_user_id' AND name = '$income_category_assigned_to_user_id'";
					$answer =  $connection->query($sql);
					$row = $answer->fetch_assoc();
					$name = $row['name'];
					
					if ($answer1->num_rows > 0) {
					while($row = $answer1->fetch_assoc()) {
						
						echo $name.'<br/>'. $row["SUM(amount)"]. "<br>";
					}
					}
					/*
					$ans = $connection->query("SELECT name FROM incomes_category_assigned_to_users WHERE id = '$first_id_category'");
					$row_category = $ans->fetch_assoc();
					$first_category = $row_category['name'];

					$ans = $connection->query("SELECT name FROM incomes_category_assigned_to_users WHERE id = '$second_id_category'");
					$row_category = $ans->fetch_assoc();
					$second_category = $row_category['name'];

					$ans = $connection->query("SELECT name FROM incomes_category_assigned_to_users WHERE id = '$third_id_category'");
					$row_category = $ans->fetch_assoc();
					$third_category = $row_category['name'];

					$ans = $connection->query("SELECT name FROM incomes_category_assigned_to_users WHERE id = '$forth_id_category'");
					$row_category = $ans->fetch_assoc();
					$forth_category = $row_category['name'];


					echo '<div class="category_list_name">'.$first_category.'</div>';
					echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' . $first_amount .'<i class="icon-pencil"></i><i class="icon-trash"></i></div>';

					echo '<br/>';
					echo '<br/>';
																		
					echo '<div class="category_list_name">'.$second_category.'</div>';
					echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' . $second_amount .'<i class="icon-pencil"></i><i class="icon-trash"></i></div>';

					echo '<br/>';
					echo '<br/>';

					echo '<div class="category_list_name">'.$third_category.'</div>';
					echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' . $third_amount .'<i class="icon-pencil"></i><i class="icon-trash"></i></div>';

					echo '<br/>';
					echo '<br/>';

					echo '<div class="category_list_name">'.$forth_category.'</div>';
					echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' . $forth_amount .'<i class="icon-pencil"></i><i class="icon-trash"></i></div>';

					*/
				}
			$connection->close();
		}

		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
?>