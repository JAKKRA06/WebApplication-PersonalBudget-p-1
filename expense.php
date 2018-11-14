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
				$_SESSION['e_amount']="Niepoprawna kwota !".'<br/>'."Poprawny format: 100.00";
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
			
			$payment_method=array("Gotowka", "Karta platnicza", "Karta kredytowa");
			
			if (!in_array($_POST['expense_payment_method'], $payment_method))
			{
				$confirm_expense = false;
				$_SESSION['e_payment_method']="Wybierz przynajmniej jedną".'<br/>'."metodę płatności !";
			}
		
			$comment = $_POST['expense_comment'];
			if (strlen($comment) > 100 )
			{
				$confirm_expense = false;
				$_SESSION['e_comment']="Komentarz jest zbyt długi !".'<br/>'."Max długość komentarza to 100 znaków !";
			}
			
		// kategorii
	
			$expense_category=array("Mieszkanie", "Jedzenie", "Transport", "Telekomunikacja", "Opieka zdrowotna", "Ubranie", "Higiena", "Dzieci", "Rozrywka", "Wycieczka", "Ksiazki", "Oszczednosci", "Splta dlugow", "Darowizna", "Na zlota jesien, czyli emeryture", "Inne wydatki");
			
			if (!in_array($_POST['expense_category_select'], $expense_category))
			{
				$confirm_expense = false;
				$_SESSION['e_category_select']="Wybierz przynajmniej jedną kategorię wydatku !";
			}
		
		
			if ($confirm_expense == true)
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
						$payment_method = $_POST['expense_payment_method'];
						$expense_category_select = $_POST['expense_category_select'];
						$username = $_SESSION['user'];
						
						
						$answer = $connection->query("SELECT * FROM users WHERE username = '$username'");
						$row_user = $answer->fetch_assoc();
						$sign_in_user_id = $row_user['id'];
						
						$result = $connection->query("SELECT * FROM expenses_category_assigned_to_users WHERE name = '$expense_category_select' AND user_id = '$sign_in_user_id'");
						$row = $result->fetch_assoc();
						$id_expense_assigned_to_user = $row['id'];	
						
		
						$answer = $connection->query("SELECT * FROM payment_methods_assigned_to_users WHERE name = '$payment_method' AND user_id = '$sign_in_user_id'");
						$row_payment = $answer->fetch_assoc();
						$id_payment_method = $row_payment['id'];
	
						if ($connection->query("INSERT INTO expenses VALUES 
						(NULL, '$sign_in_user_id',  '$id_expense_assigned_to_user', '$id_payment_method', '$amount', '$expense_date', '$comment' )"))
						{
						
							$_SESSION['expense_added']="Dodano nowy wydatek !";
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
						echo "Błąd serwera ! Przepraszamy za niedogodności i prosimy o dodanie wydatku w innym terminie.";
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
	
			
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="font/fontello-5b3c0dfc/css/fontello.css">
    <link rel="stylesheet" href="font/fontello_tabela_new/css/fontello.css">

	
	
	
	
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin		=	"anonymous"></script>

	
	
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
	
	
	<script type="text/jscript" src="https://www.gstatic.com/charts/loader.js"></script>
  

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
                            <a href="income.php">Dodaj przychód</a>
                            <a href="expense.php" class="active">Dodaj wydatek</a>
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
      
                       <!--3 AKŁADKA-->
                    <article class="active" id="expense">
                           <section class="title">DODAWANIE WYDATKU</section>
					<?php

							
							if(isset($_SESSION['expense_added']))
							{
								echo '<div class="expense_success">'.$_SESSION['expense_added'].'</div>';
								unset($_SESSION['expense_added']);
							}
						?>
                            <form method="post">
                             
                              <article class=" row">
                                <label for="kwota" class="col-sm-4 col-form-label">Kwota</label>
                                <div class="col-sm-8">
                                  <input type="text" name="expense_amount" class="form-control"  id="kwota" placeholder="kwota">
									<?php
										if(isset($_SESSION['e_amount']))
										{
											echo '<div class="error">'.$_SESSION['e_amount'].'</div>';
											unset($_SESSION['e_amount']);
										}
									?>                       
								</div>
                              </article>
                              
                              <article class=" row">
                                <label for="currentDateEx" class="col-sm-4 col-form-label">Data</label>
                                <div class="col-sm-8">
                                  <input type="date" name="expense_date" id="currentDateEx" class="form-control">
									<?php
										if(isset($_SESSION['e_date']))
										{
											echo '<div class="error">'.$_SESSION['e_date'].'</div>';
											unset($_SESSION['e_date']);
										}
									?>          
								</div>
                              </article>
                              
                                <article class="row">
                                  <label class="col-sm-6">Sposób płatności</label>
                                  <div class="col-sm-6">
                                  <select class="custom-select" name="expense_payment_method">
                                     <option selected >Rozwiń</option>
                                        <option value="Gotowka">Gotówka</option>
                                        <option value="Karta platnicza">Karta płatnicza</option>
                                        <option value="Karta kredytowa">Karta kredytowa</option>
                                      </select>
										<?php
											if(isset($_SESSION['e_payment_method']))
											{
												echo '<div class="error">'.$_SESSION['e_payment_method'].'</div>';
												unset($_SESSION['e_payment_method']);
											}
										?>  
                                  </div>
                                </article> 
                              
                                <article class="row">
                                  <label class="col-sm-4">Kategoria</label>
                                  <div class="col-sm-8">
                                  <select class="custom-select" name="expense_category_select">
										<option selected >Rozwiń</option>
										<option value="Transport">Transport</option>
										<option value="Ksiazki">Książki</option>
										<option value="Jedzenie">Jedzenie</option>
										<option value="Mieszkanie">Mieszkanie</option>
										<option value="Telekomunikacja">Telekomunikacja</option>
										<option value="Higiena">Higiena</option>
										<option value="Ubranie">Ubranie</option>
										<option value="Opieka zdrowotna">Opieka zdrowotna</option>
										<option value="Dzieci">Dzieci</option>
										<option value="Rozrywka">Rozrywka</option>
										<option value="Wycieczka">Wycieczka</option>
										<option value="Oszczednosci">Oszczędności</option>
										<option value="Na zlota jesien, czyli emeryture">Na złotą jesień, czyli emeryturę</option>
										<option value="Splta dlugow">Spłta długów</option>
										<option value="Darowizna">Darowizna</option>
										<option value="Inne wydatki">Inne wydatki</option>
                                    </select>
										<?php
											if(isset($_SESSION['e_category_select']))
											{
												echo '<div class="error">'.$_SESSION['e_category_select'].'</div>';
												unset($_SESSION['e_category_select']);
											}
										?>  
                                    </div>
                                </article>
							
								<article class="row">
                                  <label class="col-sm-4">Komentarz</label>
                                  <div class="col-sm-8">
                                     <input type="text" name="expense_comment" class="form-control" placeholder="opcjonalnie" onfocus="this.placeholder=''" onblur="this.placeholder='opcjonalnie'">
										<?php

											if(isset($_SESSION['e_comment']))
											{
												echo '<div class="error">'.$_SESSION['e_comment'].'</div>';
												unset($_SESSION['e_comment']);
											}
										?>  
									</div>
                                </article>
								
								<article class="row" >
								   <div class="col-12">
										<button type="submit" class="btn btn-lg btn-danger add"><i class="icon-plus"></i></button>
								   </div>
								</article>  
                             </form>
					</article>
					
					</article>
			</div>
       </div> 
       
    </main>
	
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	
	<script src="menuResponsywne.js" type="text/jscript"></script>
    <script src="currentDateEx.js" type="text/jscript"></script>

</body>
</html>