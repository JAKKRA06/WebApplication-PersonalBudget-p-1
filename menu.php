<?php

		session_start();
		
		if (!isset($_SESSION['sign_in']))
		{
			header('Location: index.php');
			exit();
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		  <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Wybierz przedział czasowy: </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  </div>
		  <div class="modal-body">
				<form method="post" action="non_standard.php">
					Od: <input type="date" id="startDate" name="startDate" value="startDate"> <br/><br/>
					do: <input type="date" id="lastDate" name ="lastDate" value="lastDate">

					<button class=" btn btn-primary" type="submit"> Potwierdź </button>
				</form>
		  </div>
		</div>
	</div>
</div>
					
					
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
                            <a href="#mainpage" class="active" role="tab" data-toggle="tab">Strona główna</a>
                            <a href="#income" role="tab" data-toggle="tab">Dodaj przychód</a>
                            <a href="#expense" role="tab" data-toggle="tab">Dodaj wydatek</a>
                            <a href="#balance" id="balanceTab" role="tab" data-toggle="tab">Przeglądaj bilans</a>
                            <a href="#settings" role="tab" data-toggle="tab">Ustawienia</a>
								 
							<?php
							
								echo '<a href="logOut.php">Wyloguj</a>';
							
							?>
                            <a href="#javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i></a>    
                       </article>  
                   </nav>                       
               </div>
			   
                        <!--1 AKŁADKA-->
                    <article class="tab-content">
                        <article class="tab-pane active" id="mainpage">
               			<?php
							if(isset($_SESSION['income_added']))
							{
								echo '<div class="income_success">'.$_SESSION['income_added'].'</div>';
								unset($_SESSION['income_added']);
							}
							
							if(isset($_SESSION['expense_added']))
							{
								echo '<div class="expense_success">'.$_SESSION['expense_added'].'</div>';
								unset($_SESSION['expense_added']);
							}
							
							if (isset($_SESSION['currentYear']) || (isset($_SESSION['previousMonth'])) || (isset($_SESSION['non_standard'])) || (isset($_SESSION['currentMonth'])))
							{
								 echo "Przejdź do zakładki ---> Przeglądaj bilans <---".'<br/>';
							}
							
						?>
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="tableMenu responsive" >
                                    <tr>
                                        <td id="tableTitleHome"><i class="icon-bank"></i></td>
                                    </tr>
                                    <tr>
                                        <td><p>Zacznij kontrolować swoje wydatki już dzisiaj! <br><br>
                                            Dziękuję, że dołączyłeś do mojej aplikacji!</p><a href="https://github.com/JAKKRA06" target="_blank">O autorze</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="tableMenu responsive">
                                    <tr>
                                        <td id="tableTitleBulb"><i class="icon-lightbulb"></i></td>
                                    </tr>
                                    <tr>
                                        <td><i>Kiedy zaczynasz interes, 
                                            nie martw się, że masz za mało pieniędzy. 
                                            Ograniczone fundusze to nie wada lecz zaleta. 
                                                Nic bardziej nie rozwija pomysłowości <br><br>

                                            - Jackson  Brown Jr.</i></td>
                                    </tr>
                                </table>
                            </div>
                        </div>  
                        </article>                
                       <!--2 AKŁADKA-->
                       
                        <article class="tab-pane" id="income">
                           <section class="title">DODAWANIE PRZYCHODU</section>
                            <form method="post" action="income.php">
                            
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
                                     <input type="text" name="income_comment" class="form-control" id="komentarz" placeholder="opcjonalnie" onfocus="this.placeholder=''" onblur="this.placeholder='opcjonalnie'">
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

                    
                       <!--3 AKŁADKA-->
                      <article class="tab-pane" id="expense">
                           <section class="title">DODAWANIE WYDATKU</section>
                            <form method="post" action="expense.php">
                             
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
                                <label for="data" class="col-sm-4 col-form-label">Data</label>
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
                                  <label class="col-sm-4">Sposób płatności</label>
                                  <div class="col-sm-8">
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
                                     <input type="text" name="expense_comment" class="form-control" id="komentarz" placeholder="opcjonalnie" onfocus="this.placeholder=''" onblur="this.placeholder='opcjonalnie'">
										<?php

											if(isset($_SESSION['e_comment']))
											{
												echo '<div class="error">'.$_SESSION['e_comment'].'</div>';
												unset($_SESSION['e_comment']);
											}
										?>  
									</div>
                                </article>
								
								<article class="row">
								   <div class="col-12">
										<button type="submit" class="btn btn-lg btn-danger add"><i class="icon-plus"></i></button>
								   </div>
								</article>
                             </form>
							</article>

                       <!--4 AKŁADKA-->

                    <article class="tab-pane" id="balance">
                        <div class="row">
                            <div class="col-sm-12">
                               <section class="dropdown" id="drop">
							   
									<div class="dropdown">
									  <button class="dropbtn">Wybierz okres <i class="fa fa-caret-down"></i></button>
										  <div class="dropdown-content" id="peroid">
											<a href="currentMonth.php">Bieżący miesiąc</a>
											<a href="previousMonth.php">Poprzedni miesiąc</a>
											<a href="currentYear.php">Bieżący rok</a>
											<a data-toggle="modal" href="#myModal">Niestandardowy</a>
										  </div>
									</div>
									
                                </section>
                            </div>
			
							<div class="col-md-12">
                                <section id="dropDownPeroid">
								
									<?php
										if (!isset($_SESSION['currentYear']) && (!isset($_SESSION['previousMonth'])) && (!isset($_SESSION['non_standard'])))
										{
											$_SESSION['currentMonth'] = true;
										}
										
										
										if (isset($_SESSION['currentYear']))
										{
											echo 'Bieżący rok';
										}
										else if(isset($_SESSION['currentMonth']))
										{
											echo 'Bieżący miesiąc';
										}
										else if (isset($_SESSION['previousMonth']))
										{
											echo 'Poprzedni miesiąc';
										}
										else if (isset($_SESSION['non_standard']))
										{
											echo '<div>'."Zakres wybranych dat: ".'<br/>'.$_SESSION['startDate'] ."  -  ".$_SESSION['lastDate'] .'</div>';
										}
									
									?>
								</section>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table1 responsive">
                                    <tr>
                                        <td id="tableTitle">PRZYCHODY</td>
                                    </tr>
                                    <tr>
                                        <td id="tableIncome">
<?php

		require_once "connect.php";

		mysqli_report(MYSQLI_REPORT_STRICT);
		
	if (isset($_SESSION['currentMonth']))
	{
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

					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
	/////////////////////////////////////////////////////////////////////////obecny miesiac//////////////////////////////////////////////////////////////////////////////
					
					$answer2 = $connection->query("SELECT income_category_assigned_to_user_id, SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' GROUP BY income_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					
					$result = $connection->query("SELECT SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();
					$sum_all_incomes = $row['SUM(amount)'];
					
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$income_id_category = $row['income_category_assigned_to_user_id'];
							$sql = "SELECT * FROM incomes_category_assigned_to_users WHERE id = '$income_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_income = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_income, income_comment FROM `incomes` WHERE date_of_income BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' AND income_category_assigned_to_user_id = '$income_id_category' ORDER BY amount DESC");

							echo '<div class="category_list_name_income">'.$name.':'.' '.$SUM_income.'</div>'.'<br/>';
							while($row3 = $answer4->fetch_assoc())
							{
									
								$date_income = $row3['date_of_income'];
								$amount_income = $row3['amount'];
								$comment_income = $row3['income_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_income.' 	'.$date_income.' '.'<i>'.$comment_income.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
							echo '<br/>';
						}
					}
				}
			$connection->close();
		}

		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
/////////////////////////////////////////////////////////////////////////Poprzedni MIESIAC////////////////////////////////////////////////////////////
	
	else if (isset($_SESSION['previousMonth']))
	{
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
					$previous_dateStart = new DateTime('first day of last month');
					$previous_dateS = $previous_dateStart->format('Y-m-d');

					$previous_dateLast = new DateTime('last day of last month');
					$previous_dateL = $previous_dateLast->format('Y-m-d');

					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];

					$answer2 = $connection->query("SELECT income_category_assigned_to_user_id, SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$previous_dateS' AND '$previous_dateL' AND user_id = '$sign_in_user_id' GROUP BY income_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					
					$result = $connection->query("SELECT SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$previous_dateS' AND '$previous_dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();
					$sum_all_incomes = $row['SUM(amount)'];
					
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$income_id_category = $row['income_category_assigned_to_user_id'];
							$sql = "SELECT * FROM incomes_category_assigned_to_users WHERE id = '$income_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_income = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_income, income_comment FROM `incomes` WHERE date_of_income BETWEEN '$previous_dateS' AND '$previous_dateL' AND user_id = '$sign_in_user_id' AND income_category_assigned_to_user_id = '$income_id_category' ORDER BY amount DESC");

							echo '<div class="category_list_name_income">'.$name.':'.' '.$SUM_income.'</div>'.'<br/>';
							while($row3 = $answer4->fetch_assoc())
							{
								$date_income = $row3['date_of_income'];
								$amount_income = $row3['amount'];
								$comment_income = $row3['income_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_income.' 	'.$date_income.' '.'<i>'.$comment_income.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
							echo '<br/>';
						}
					}
				}
				$connection->close();

		}
		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
	//////////////////////////////////////////////////////////////////////Bieżący rok /////////////////////////////////////////////////////////////////////
	else if (isset($_SESSION['currentYear']))
	{
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
					$currentYear_dateStart = new DateTime('first day of January ' . date('Y'));
					$currentYear_dateS = $currentYear_dateStart->format('Y-m-d');

					$currentYear_dateLast = new DateTime('last day of December ' . date('Y'));
					$currentYear_dateL = $currentYear_dateLast->format('Y-m-d');
					
					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
					$answer2 = $connection->query("SELECT income_category_assigned_to_user_id, SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$currentYear_dateS' AND '$currentYear_dateL' AND user_id = '$sign_in_user_id' GROUP BY income_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					
					$result = $connection->query("SELECT SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$currentYear_dateS' AND '$currentYear_dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();
					$sum_all_incomes = $row['SUM(amount)'];
					
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$income_id_category = $row['income_category_assigned_to_user_id'];
							$sql = "SELECT * FROM incomes_category_assigned_to_users WHERE id = '$income_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_income = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_income, income_comment FROM `incomes` WHERE date_of_income BETWEEN '$currentYear_dateS' AND '$currentYear_dateL' AND user_id = '$sign_in_user_id' AND income_category_assigned_to_user_id = '$income_id_category' ORDER BY amount DESC");

							echo '<div class="category_list_name_income">'.$name.':'.' '.$SUM_income.'</div>'.'<br/>';
							while($row3 = $answer4->fetch_assoc())
							{
									
								$date_income = $row3['date_of_income'];
								$amount_income = $row3['amount'];
								$comment_income = $row3['income_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_income.' 	'.$date_income.' '.'<i>'.$comment_income.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
							echo '<br/>';
						}
					}
				}
	 			$connection->close();
		}
		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
	//////////////////////////////////////////////////////////////////////Niestandardowy/////////////////////////////////////////////////////////////////
	
	else if(isset($_SESSION['non_standard']))
	{

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
					$non_standard_dateStart = $_SESSION['startDate'];
					$non_standard_dateLast = $_SESSION['lastDate'];
	
					
					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
					$answer2 = $connection->query("SELECT income_category_assigned_to_user_id, SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$non_standard_dateStart' AND '$non_standard_dateLast' AND user_id = '$sign_in_user_id' GROUP BY income_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					
					$result = $connection->query("SELECT SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$non_standard_dateStart' AND '$non_standard_dateLast' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();
					$sum_all_incomes = $row['SUM(amount)'];
					
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$income_id_category = $row['income_category_assigned_to_user_id'];
							$sql = "SELECT * FROM incomes_category_assigned_to_users WHERE id = '$income_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_income = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_income, income_comment FROM `incomes` WHERE date_of_income BETWEEN '$non_standard_dateStart' AND '$non_standard_dateLast' AND user_id = '$sign_in_user_id' AND income_category_assigned_to_user_id = '$income_id_category' ORDER BY amount DESC");

							echo '<div class="category_list_name_income">'.$name.':'.' '.$SUM_income.'</div>'.'<br/>';
							while($row3 = $answer4->fetch_assoc())
							{
									
								$date_income = $row3['date_of_income'];
								$amount_income = $row3['amount'];
								$comment_income = $row3['income_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_income.' 	'.$date_income.' '.'<i>'.$comment_income.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
							echo '<br/>';
						}
					}
				}
	 			$connection->close();
		}
		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
?>
										</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table2 responsive">
                                    <tr>
                                        <td id="tableTitle">WYDATKI</td>
                                    </tr>
                                    <tr>
                                        <td id="tableExpense">
<?php
										
if (isset($_SESSION['currentMonth']))
	{
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

					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
		//////////////////////////////////////////////////////////////////////////////obecny miesiac/////////////////////////////////////////////////////////////////
					
					$answer2 = $connection->query("SELECT expense_category_assigned_to_user_id, SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' GROUP BY expense_category_assigned_to_user_id ORDER BY SUM(amount) DESC");

					$result = $connection->query("SELECT SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();					
					$sum_all_expenses = $row['SUM(amount)'];

					
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$expense_id_category = $row['expense_category_assigned_to_user_id'];
							$sql = "SELECT * FROM expenses_category_assigned_to_users WHERE id = '$expense_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_expense = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_expense, expense_comment FROM `expenses` WHERE date_of_expense BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' AND expense_category_assigned_to_user_id = '$expense_id_category' ORDER BY amount DESC");

							echo '<div class="category_list_name_expense">'.$name.':'.' '.$SUM_expense.'</div>'.'<br/>';
							
							$dataPoints[] = array ("label"=>$name, "y"=>$SUM_expense);
							
							while($row3 = $answer4->fetch_assoc())
							{
								$date_expense = $row3['date_of_expense'];
								$amount_expense = $row3['amount'];
								$comment_expense = $row3['expense_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_expense.' '.$date_expense.' '.'<i>'.$comment_expense.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
								echo '<br/>';
						}
					}
				}
			$connection->close();
			unset($_SESSION['currentMonth']);
		}

		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
	
		/////////////////////////////////////////////////////////////////////////Poprzedni MIESIAC////////////////////////////////////////////////////////////

	
	else if (isset($_SESSION['previousMonth']))
	{ 
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
					$previous_dateStart = new DateTime('first day of last month');
					$previous_dateS = $previous_dateStart->format('Y-m-d');

					$previous_dateLast = new DateTime('last day of last month');
					$previous_dateL = $previous_dateLast->format('Y-m-d');

					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
					$answer2 = $connection->query("SELECT expense_category_assigned_to_user_id, SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$previous_dateS' AND '$previous_dateL' AND user_id = '$sign_in_user_id' GROUP BY expense_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					
					$result = $connection->query("SELECT SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$previous_dateS' AND '$previous_dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();					
					$sum_all_expenses = $row['SUM(amount)'];

								
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$expense_id_category = $row['expense_category_assigned_to_user_id'];
							$sql = "SELECT * FROM expenses_category_assigned_to_users WHERE id = '$expense_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_expense = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_expense, expense_comment FROM `expenses` WHERE date_of_expense BETWEEN '$previous_dateS' AND '$previous_dateL' AND user_id = '$sign_in_user_id' AND expense_category_assigned_to_user_id = '$expense_id_category' ORDER BY amount DESC");
				
							echo '<div class="category_list_name_expense">'.$name.':'.' '.$SUM_expense.'</div>'.'<br/>';
							
							$dataPoints[] = array ("label"=>$name, "y"=>$SUM_expense);
													
							while($row3 = $answer4->fetch_assoc())
							{
								$date_expense = $row3['date_of_expense'];
								$amount_expense = $row3['amount'];
								$comment_expense = $row3['expense_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_expense.' '.$date_expense.' '.'<i>'.$comment_expense.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
								echo '<br/>';
						}
					}
				}
	 			$connection->close();
				unset ($_SESSION['previousMonth']);
		}
		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
////////////////////////////////////////////////////////////////////////////Bieżący rok /////////////////////////////////////////////////////////////////////
	else if (isset($_SESSION['currentYear']))
	{
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
					$currentYear_dateStart = new DateTime('first day of January ' . date('Y'));
					$currentYear_dateS = $currentYear_dateStart->format('Y-m-d');

					$currentYear_dateLast = new DateTime('last day of December ' . date('Y'));
					$currentYear_dateL = $currentYear_dateLast->format('Y-m-d');
					
					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
					$answer2 = $connection->query("SELECT expense_category_assigned_to_user_id, SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$currentYear_dateS' AND '$currentYear_dateL' AND user_id = '$sign_in_user_id' GROUP BY expense_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					
					$result = $connection->query("SELECT SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$currentYear_dateS' AND '$currentYear_dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();					
					$sum_all_expenses = $row['SUM(amount)'];

			
					
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$expense_id_category = $row['expense_category_assigned_to_user_id'];
							$sql = "SELECT * FROM expenses_category_assigned_to_users WHERE id = '$expense_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_expense = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_expense, expense_comment FROM `expenses` WHERE date_of_expense BETWEEN '$currentYear_dateS' AND '$currentYear_dateL' AND user_id = '$sign_in_user_id' AND expense_category_assigned_to_user_id = '$expense_id_category' ORDER BY amount DESC");

			
							echo '<div class="category_list_name_expense">'.$name.':'.' '.$SUM_expense.'</div>'.'<br/>';
							
							$dataPoints[] = array ("label"=>$name, "y"=>$SUM_expense);
								
								
							while($row3 = $answer4->fetch_assoc())
							{
									
							$date_expense = $row3['date_of_expense'];
							$amount_expense = $row3['amount'];
							$comment_expense = $row3['expense_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_expense.' '.$date_expense.' '.'<i>'.$comment_expense.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
								echo '<br/>';
						}
					}
				}
	 			$connection->close();
				unset ($_SESSION['currentYear']);
		}
		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
		
///////////////////////////////////////////////////////////////////////////Niestandardowy/////////////////////////////////////////////////////////////////
	else if (isset($_SESSION['non_standard']))
	{
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
					$non_standard_dateStart = $_SESSION['startDate'];
					$non_standard_dateLast = $_SESSION['lastDate'];

					$answer1 = $connection->query("SELECT * FROM users WHERE username = '$username'");
					$row_user = $answer1->fetch_assoc();
					$sign_in_user_id = $row_user['id'];
					
					$answer2 = $connection->query("SELECT expense_category_assigned_to_user_id, SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$non_standard_dateStart' AND '$non_standard_dateLast' AND user_id = '$sign_in_user_id' GROUP BY expense_category_assigned_to_user_id ORDER BY SUM(amount) DESC");
					
					$result = $connection->query("SELECT SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$non_standard_dateStart' AND '$non_standard_dateLast' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();					
					$sum_all_expenses = $row['SUM(amount)'];

			
					
				if ($answer2->num_rows > 0) {
						while($row = $answer2->fetch_assoc()) {
						
							$expense_id_category = $row['expense_category_assigned_to_user_id'];
							$sql = "SELECT * FROM expenses_category_assigned_to_users WHERE id = '$expense_id_category'";
							$answer3 =  $connection->query($sql);
							$row2 = $answer3->fetch_assoc();
							$name = $row2['name'];
							$SUM_expense = $row['SUM(amount)'];
							
							$answer4 = $connection->query("SELECT amount, date_of_expense, expense_comment FROM `expenses` WHERE date_of_expense BETWEEN '$non_standard_dateStart' AND '$non_standard_dateLast' AND user_id = '$sign_in_user_id' AND expense_category_assigned_to_user_id = '$expense_id_category' ORDER BY amount DESC");

							echo '<div class="category_list_name_expense">'.$name.':'.' '.$SUM_expense.'</div>'.'<br/>';
							
							$dataPoints[] = array ("label"=>$name, "y"=>$SUM_expense);
														
														
							while($row3 = $answer4->fetch_assoc())
							{
									
								$date_expense = $row3['date_of_expense'];
								$amount_expense = $row3['amount'];
								$comment_expense = $row3['expense_comment'];
								echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$amount_expense.' '.$date_expense.' '.'<i>'.$comment_expense.'</i>'.'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';
							}
								echo '<br/>';
						}
					}
				}
	 			$connection->close();
				unset ($_SESSION['non_standard']);
		}
		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
		}
	}
?>
										</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="comment" id="comment">
                                    <h3 id="comentary">
										<span>Bilans:
										<?php 
										
											echo round($sum_all_incomes - $sum_all_expenses, 2).' zł'.'</br>';
											
											
											if ($sum_all_incomes > $sum_all_expenses)
											{
												echo '<div class = "saving">'.'<br/>'."Świetnie zarządzasz swoimi finansami !".'</div>';
											}else if ($sum_all_incomes < $sum_all_expenses)
											{
												echo '<div class = "debt">'.'<br/>'."Uważaj !".'<br/>'."W tym okresie wygenerowałeś straty !".'</div>';
											}else
												echo '';
																		
										?></span>
										</br>
									</h3>
                                </section>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">                                
                                <article>
										<script>
											function drawPie() {
													var chart = new CanvasJS.Chart("chartContainer", {
														animationEnabled: true,
														title: {
															text: "Wydatki jakie wygenerowałeś w wybranym okresie"
														},
														data: [{
														
															type: "pie",
															yValueFormatString: "#,##0.00\"zł\"",
															indexLabel: "{label} ({y})",
													dataPoints: <?php echo json_encode($dataPoints); ?>	
													}]
													});
													chart.render();
												}

											var elPeroid = document.getElementById('peroid');
											var elTab = document.getElementById('balanceTab');
											elPeroid.addEventListener('change', drawPie, false);
											elTab.addEventListener('click', drawPie, false);
										</script>
										
									<div id="chartContainer" style="height: 450px; width: 100%;"></div>
											<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>	
                                </article>
							</div>
                         </div>
					</article>
                   

				
                    
                       <!--5 AKŁADKA-->

					<article class="tab-pane" id="settings">
						<div class="row">
							<div class="col-sm-12">
							<!--
								<div class="edition">

									<div class="module">
										<button id="unfold" class="btn btn-primary button module-button">nazwę uzytkownika</button>
										<input type="text" class="module-content" style="display:none">
						
									
						
										<button id="unfold1" class="btn btn-success button module-button">e-mail</button>
										<input type="text" class="module-content" style="display:none">
						
						
										<button id="unfold2" class="btn btn-danger button module-button">hasło</button>
										<input type="text" class="module-content" style="display:none">
									</div>
							
								</div>
<script> 
const btn = document.getElementById("unfold");

if(document.getElementByClassName('btn').onclick)
{
	const textCnt = btn.nextElementSibling;


btn.addEventListener("click", showInput, false);  
  

function showInput() {
	if (textCnt.style.display === "none") {
		textCnt.style.display = "block";
	} else {
		textCnt.style.display = "none";
	}
}
</script>
							
							-->
							
							</div>
						</div>
					</article>


				   

		 </article>
					
       </div> 
       
    </main>
	
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	
	<script src="menuResponsywne.js" type="text/jscript"></script>
    <script src="currentDateEx.js" type="text/jscript"></script>
	
    

</body>
</html>