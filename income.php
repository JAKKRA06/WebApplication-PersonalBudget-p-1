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
				require_once "connect_Local.php";
				
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
						}
						else
						{
							throw new Exception($connection->error);
						}
					}
				}
				catch (Exception $error)
				{
						echo "Błąd serwera ! Przepraszamy za niedogodności i prosimy o dodanie przychodu w innym terminie.";
						echo $error;
				}
			}
		}
?>
<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Personal Budget</title>
	
	
	
	<meta name="description" content="Aplikacja do prowadzenia ewidencji własnych wydatków">
	<meta name="keywords" content="finanse, prowadzenie, budzet, osobisty, bilans, wydatki, przychody, budget, domowy">
	<meta name="author" content="Jakub Krajniewski">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="font/fontello-5b3c0dfc/css/fontello.css">
    <link rel="stylesheet" href="font/fontello_tabela_new/css/fontello.css">
	
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	

  
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="favico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favico/favicon-16x16.png">
    <link rel="manifest" href="favico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	


</head>
<body>

<main>
	 <div class="container">
		
           <div class="row">
             
              <div class="col-sm-12">
                  <section class="logger">
				  <?php
					$str = $_SESSION['user'];
					$str = strtoupper($str);
					echo "Witaj: ".'<i>'.$str.'</i>';
				  ?>
				  </section>
              </div>
              
               <div class="col-sm-12">
                   <header><h2>TWÓJ OSOBISTY MENAGER FINANSÓW</h2></header>
               </div>
           </div>
           
           <div class="row">
              <div class="col-sm-12">
                  <section id="hello"><h1>Witaj !</h1></section>
              </div>

               <div class="col-sm-12">
                   <nav class="menu">
                       <article class="nav nav-tabs" id="myTopnav" role="tablist">
                            <a href="menu.php">Strona główna</a>
                            <a href="income.php" class="active">Dodaj przychód</a>
                            <a href="expense.php">Dodaj wydatek</a>
                            <a href="balance.php" id = "balanceTab">Przeglądaj bilans</a>
                            <a href="settings.php">Ustawienia</a>
								 
							<?php
							
								echo '<a href="logOut.php">Wyloguj</a>';
							
							?>
                            <a class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i></a>    
                       </article>  
                   </nav>                       
               </div>
		
		<article class="tab-content">
			<article class="active" id="income">
			   <section class="title">DODAWANIE PRZYCHODU</section>
			   <?php
							if(isset($_SESSION['income_added']))
							{
								echo '<div class="income_success">'.$_SESSION['income_added'].'</div>';
								unset($_SESSION['income_added']);
							}
				?>
				<form method="post">
				
				 <article class="row">
					 <label class="col-sm-4">Kwota</label>
					 <div class="col-sm-8">
						<input type="text" name="income_amount" class="form-control" id="kwota" placeholder="kwota" onfocus="this.placeholder=''" onblur="this.placeholder='kwota'">
							<?php
								if(isset($_SESSION['i_amount']))
								{
									echo '<div class="error">'.$_SESSION['i_amount'].'</div>';
									unset($_SESSION['i_amount']);
								}
							?>                                  
					 </div>
					</article>
				  
				  <article class="row">
					 <label class="col-sm-4">Data</label>
					 <div class="col-sm-8">
						  <input type="date" id="currentDate" name="income_date" class="form-control">
							<?php
								if(isset($_SESSION['i_date']))
								{
									echo '<div class="error">'.$_SESSION['i_date'].'</div>';
									unset($_SESSION['i_date']);
								}
							?>      
					</div>

					</article>
						
					<article class="row">
					  <label class="col-sm-4">Komentarz</label>
					  <div class="col-sm-8">
						 <input type="text" name="income_comment" class="form-control" placeholder="opcjonalnie" onfocus="this.placeholder=''" onblur="this.placeholder='opcjonalnie'">
							<?php

								if(isset($_SESSION['i_comment']))
								{
									echo '<div class="error">'.$_SESSION['i_comment'].'</div>';
									unset($_SESSION['i_comment']);
								}
							?>  
						</div>
					</article>
					
					 <article class="row">
						  <label class="col-sm-4">Kategoria</label>
						  <div class="col-sm-8">
								<select class="custom-select" name="income_select">                                                                     
									<option selected >Rozwiń</option>
									<option value="Wynagrodzenie" type="text" id="kategoria">Wynagrodzenie</option>
									<option value="Odsetki bankowe">Odsetki bankowe</option>
									<option value="Allegro">Allegro</option>
									<option value="Inne">Inne</option>
								</select>
									<?php
										if(isset($_SESSION['i_select']))
										{
											echo '<div class="error">'.$_SESSION['i_select'].'</div>';
											unset($_SESSION['i_select']);
										}
									?>  
							</div>
					 </article>

				  <article class="row">
				   <div class="col-12">
							<button class="btn btn-lg btn-success add" type="submit"><i class="icon-plus"></i></button>       
						</div>
				   </article>   
				</form>								 
			</article>
		</article>
						
		</div>
	</div>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script src="menuResponsywne.js" type="text/jscript"></script>
	<script src="currentDateIncome.js" type="text/jscript"></script>
  

</body>
</html>