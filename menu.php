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
  
  
    <script>
$(document).ready(function(){ //Make script DOM ready
    $('#peroid').change(function() { //jQuery Change Function
        var opval = $(this).val(); //Get value from select element
        if(opval=="NS"){ //Compare it and if true
            $('#myModal').modal('show'); //Open Modal
        }
    });
});
  </script>
  
  
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
                            <a href="#mainpage" class="active" role="tab" data-toggle="tab">Strona główna</a>
                            <a href="#income" role="tab" data-toggle="tab">Dodaj przychód</a>
                            <a href="#expense" role="tab" data-toggle="tab">Dodaj wydatek</a>
                            <a href="#balance" role="tab" data-toggle="tab">Przeglądaj bilans</a>
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
                        <section class="tab-pane active" id="mainpage">
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
                        </section>                
                       <!--2 AKŁADKA-->
                       
                        <article class="tab-pane" id="income">
                           <section class="title">DODAWANIE PRZYCHODU</section>
                            <form method="post" action="przychod.php">
                            
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
						 <?php
							if(isset($_SESSION['expense_added']))
							{
								echo '<div class="expense_success">'.$_SESSION['expense_added'].'</div>';
								unset($_SESSION['expense_added']);
							}
						?>
                            <form method="post" action="wydatek.php">
                             
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
                                        <option value="Gotówka">Gotówka</option>
                                        <option value="Karta płatnicza">Karta płatnicza</option>
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
										<option value="Książki">Książki</option>
										<option value="Jedzenie">Jedzenie</option>
										<option value="Mieszkanie">Mieszkanie</option>
										<option value="Telekomunikacja">Telekomunikacja</option>
										<option value="Higiena">Higiena</option>
										<option value="Ubranie">Ubranie</option>
										<option value="Opieka zdrowotna">Opieka zdrowotna</option>
										<option value="Dzieci">Dzieci</option>
										<option value="Rozrywka">Rozrywka</option>
										<option value="Wycieczka">Wycieczka</option>
										<option value="Oszczędności">Oszczędności</option>
										<option value="Na złotą jesień, czyli emeryturę">Na złotą jesień, czyli emeryturę</option>
										<option value="Spłta długów">Spłta długów</option>
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
							   
                                    <select id="peroid" class="dropPeroid">
										<option value="BM" class="dropdown-item" active >Bieżący miesiąc</option>
										<option class="dropdown-item"  value="PM">Poprzedni miesiąc</option>
										<option class="dropdown-item"  value="BR">Bieżący rok</option>
										<option class="dropdown-item" value="NS" data-toggle="modal" data-target="myModal">Niestandardowy</option>
									</select>
                                </section>
								 
                            </div>
                            <div class="col-md-12">
                                <section id="dropDownPeroid">Bieżący miesiąc</section>
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
					
					$result = $connection->query("SELECT SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();
					$sum_all_incomes = $row['SUM(amount)'];
					
				if ($answer1->num_rows > 0) {
						while($row = $answer1->fetch_assoc()) {
						
							$income_id_category = $row['income_category_assigned_to_user_id'];
							$sql = "SELECT * FROM incomes_category_assigned_to_users WHERE id = '$income_id_category'";
							$answer2 =  $connection->query($sql);
							$row2 = $answer2->fetch_assoc();
							$name = $row2['name'];
							$SUM = $row['SUM(amount)'];
				
							echo '<div class="category_list_name">'.$name.'</div>';
							echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$SUM .'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';

						}		
					}
					else
					{
						//echo "Brak przychodów w wybranym okresie czasu";
					}

				}
			$connection->close();
		}

		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
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
					
					$answer1 = $connection->query("SELECT expense_category_assigned_to_user_id, SUM(amount) FROM `expenses` WHERE date_of_expense BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' GROUP BY expense_category_assigned_to_user_id ORDER BY SUM(amount) DESC");

					$result = $connection->query("SELECT SUM(amount) FROM `incomes` WHERE date_of_income BETWEEN '$dateS' AND '$dateL' AND user_id = '$sign_in_user_id' " );
					$row = $result->fetch_assoc();
					$sum_all_expenses = $row['SUM(amount)'];
					
					
				if ($answer1->num_rows > 0) {
						while($row = $answer1->fetch_assoc()) {
						
							$expense_id_category = $row['expense_category_assigned_to_user_id'];
							$sql = "SELECT * FROM expenses_category_assigned_to_users WHERE id = '$expense_id_category'";
							$answer2 =  $connection->query($sql);
							$row2 = $answer2->fetch_assoc();
							$name = $row2['name'];
							$SUM = $row['SUM(amount)'];
				
							echo '<div class="category_list_name">'.$name.'</div>';
							echo '<div class="category_list"><i class="icon-bank"></i>'. ' ' .$SUM .'<i class="icon-pencil"></i><i class="icon-trash"></i></div>'.'<br/>';

						}		
					}
					else
					{
						//echo "Brak przychodów w wybranym okresie czasu";
					}

				}
			$connection->close();
		}

		catch (Exception $error)
		{
			echo "Błąd serwera ! Przepraszamy za niedogodności.";
			echo $error;
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
                                    <h3 id="comentary"><span>
									<script src="comment.js"></script>
									</span></h3>
                                </section>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">                                
                                <articcle>
                                    <div id="chartContainer" style="height: 470px; margin: 0px auto;" >
									<!--<script>
										function pie(){

										var chart = new CanvasJS.Chart("chartContainer", {
													animationEnabled: true,
													title: {
														text: "Wykres przedstawia Twoje wydatki z bieżącego miesiąca"
													},
													data: [{
														type: "pie",
														startAngle: 220,
														yValueFormatString: "##00.00\"zł\"",
														indexLabel: "{label} {y}",
														dataPoints:
														]
													}]
												});
												chart.render();

										}
										
										var elPie = document.getElementById('chartContainer');
										elPie.addEventListener('load', function () { pie();	}, false);
									</script>-->
									</div>
                                </articcle>
                            </div>
                        </div>
                
                    </article>
                    
                       <!--5 AKŁADKA-->

                    <article class="tab-pane" id="settings">
                       
                        
                        
                        
                    
                    
                    </article>
                 </article>
           </div>

        </div>
                    
    </main>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		  <div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
				  <div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Wybierz przedział czasowy: </h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  </div>
				  <div class="modal-body">
						<form method="post">
							Od: <input type="date" id="startDate" value="startDate"> <br/><br/>
							do: <input type="date" id="lastDate" value="lastDate">
					  
							<button type="submit" class="btn btn-primary">Potwierdź</button>
						</form>
				  </div>
				</div>
		  </div>
	</div>
  

		
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<script src="menuResponsywne.js" type="text/jscript"></script>
    <script src="pieChart.js" type="text/jscript"></script>
    <script src="currentDateEx.js" type="text/jscript"></script>
    <script src="dropDownPeroid.js" type="text/jscript"></script>
	
    

</body>
</html>