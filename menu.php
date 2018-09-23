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

    <script src="funkcje.js" type="text/jscript"></script>
    

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
    
    <script src="funkcje.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script>
		window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			title: {
				text: "Wykres przedstawia Twoje wydatki z wybranego okresu"
			},
			data: [{
				type: "pie",
				startAngle: 220,
				yValueFormatString: "##00.00\"zł\"",
				indexLabel: "{label} {y}",
				dataPoints: [
					{y: 79.45, label: "Mieszkanie"},
					{y: 7.31, label: "Transport"},
					{y: 7.06, label: "Jedzenie"},
					{y: 4.91, label: "Kursy"},
					{y: 1.26, label: "Opieka medyczna"}
				]
			}]
		});
		chart.render();

		}
</script>

</head>
<body>
    <main>
        <div class="container">
           <div class="row">
             
              <div class="col-sm-12">
                  <section class="logger" style="padding: 5px 20px;">
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
                  <section><h1>WITAJ !</h1></section>
              </div>
              

               <div class="col-sm-12">
                   <nav class="menu">
                       <article class="nav nav-tabs" id="myTopnav" role="tablist">
                            <a class="active" href="#mainpage" role="tab" data-toggle="tab">Strona główna</a>
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
               
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="tableMenu responsive" >
                                    <tr>
                                        <td id="tableTitleHome"><i class="icon-home"></i></td>
                                    </tr>
                                    <tr>
                                        <td><p>Zacznij kontrolować swoje wydatki już dzisiaj! <br><br>
                                            Dziękuję, że dołączyłeś do mojej aplikacji!</p><a href="https://github.com/JAKKRA06" target="_blank"><i class="icon-right-hand"></i>O autorze</a>
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
                            <form action="">
                            
                             <article class="row">
                                 <label class="col-sm-4">Kwota</label>
                                 <div class="col-sm-8">
                                    <input type="textAdd" class="form-control" id="kwota" placeholder="kwota" onfocus="this.placeholder=''" onblur="this.placeholder='kwota'">
                                 </div>
                                </article>
                              
                              <article class="row">
                                  <label class="col-sm-4">Data</label>
                                  <div class="col-sm-8">
                                      <input type="textAdd" class="form-control" id="data" placeholder="dd-mm-yyyy" onfocus="this.placeholder=''" onblur="this.placeholder='dd-mm-yyyy'">
                                  </div>
                                </article>
                                    
                                <article class="row">
                                  <label class="col-sm-4">Komentarz</label>
                                  <div class="col-sm-8">
                                     <input type="textAdd" class="form-control" id="komentarz" placeholder="opcjonalnie" onfocus="this.placeholder=''" onblur="this.placeholder='opcjonalnie'">
                                    </div>
                                </article>
                                
                                 <article class="row">
                                      <label class="col-sm-4">Kategoria</label>
                                      <div class="col-sm-8">
                                            <select class="custom-select">                                                                     
                                                <option selected >Rozwiń</option>
                                                <option value="Wynagrodzenie" type="text" id="kategoria">Wynagrodzenie</option>
                                                <option value="Odsetki bankowe">Odsetki bankowe</option>
                                                <option value="Sprzedaz na Allegro">Sprzedaz na Allegro</option>
                                                <option value="Inne">Inne</option>
                                            </select>
                                        </div>
                                 </article>

                            </form>
                              <article class="row">
                               <div class="col-12">
                                        <button class="btn btn-lg btn-success add"><a href="menu.html"><i class="icon-plus"></i></a></button>       
                                    </div>
                                 </article>                        
                            </article>

                    
                       <!--3 AKŁADKA-->
                        <article class="tab-pane" id="expense">
                           <section class="title">DODAWANIE WYDATKU</section>
                            <form action="">
                             
                              <article class=" row">
                                <label for="kwota" class="col-sm-4 col-form-label">Kwota</label>
                                <div class="col-sm-8">
                                  <input type="textAdd" class="form-control" id="kwota" placeholder="kwota">
                                </div>
                              </article>
                              
                              <article class=" row">
                                <label for="data" class="col-sm-4 col-form-label">Data</label>
                                <div class="col-sm-8">
                                  <input type="textAdd" class="form-control" id="data" placeholder="dd-mm-yyyy">
                                </div>
                              </article>
                              
                                <article class="row">
                                  <label class="col-sm-4">Sposób płatności</label>
                                  <div class="col-sm-8">
                                  <select class="custom-select">
                                     <option selected >Rozwiń</option>
                                        <option value="Mieszkanie">Gotówka</option>
                                        <option value="Kursy">Karta płatnicza</option>
                                        <option value="Kursy">Karta kredytowa</option>
                                      </select>
                                  </div>
                                </article> 
                              
                                <article class="row">
                                  <label class="col-sm-4">Kategoria</label>
                                  <div class="col-sm-8">
                                  <select class="custom-select">
                                     <option selected >Rozwiń</option>
                                        <option value="Mieszkanie">Mieszkanie</option>
                                        <option value="Kursy">Kursy</option>
                                        <option value="Kredyt">Kredyt</option>
                                        <option value="Transport">Transport</option>
                                        <option value="Telekomunikacja">Telekomunikacja</option>
                                        <option value="Opieka zdrowotna">Opieka zdrowotna</option>
                                        <option value="Ubranie">Ubranie</option>
                                        <option value="Higiena">Higiena</option>
                                        <option value="Dzieci">Dzieci</option>
                                        <option value="Rozrywka">Rozrywka</option>
                                        <option value="Wycieczka">Wycieczka</option>
                                        <option value="Książki">Książki</option>
                                        <option value="Oszczędności">Oszczędności</option>
                                        <option value="Spłta długów">Spłta długów</option>
                                        <option value="Darowizna">Darowizna</option>
                                        <option value="Na złotą jesień, czyli emeryturę">Na złotą jesień, czyli emeryturę</option>
                                        <option value="Inne wydatki">Inne wydatki</option>
                                    </select>
                                    </div>
                                </article>
                             </form>
                            <article class="row">
                               <div class="col-12">
                                    <button class="btn btn-lg btn-danger add"><a href="menu.html"><i class="icon-plus"></i></a></button>
                               </div>
                            </article>
                        </article>

                       <!--4 AKŁADKA-->

                    <article class="tab-pane" id="balance">
                        <div class="row">
                            <div class="col-sm-12">
                               <section class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Rozwiń</button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item active" href="#">Bieżący miesiąc</a>
                                      <a class="dropdown-item" href="#">Poprzedni miesiąc</a>
                                      <a class="dropdown-item" href="#">Bieżący rok</a>
                                      <a class="dropdown-item" href="#">Niestandardowy</a>
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-12">
                                <section><h2><span>Bieżący miesiąc</span></h2></section>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table1 responsive">
                                    <tr>
                                        <td id="tableTitle">PRZYCHODY</td>
                                    </tr>
                                    <tr>
                                        <td id="tableIncome"><i class="icon-right-hand"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem aperiam quisquam ducimus quis ipsum quam aliquam mollitia veritatis dolores ad modi nostrum consequuntur, quos dolorum qui incidunt excepturi. Qui, nam.10 dolor sit amet.</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table class="table2 responsive">
                                    <tr>
                                        <td id="tableTitle">WYDATKI</td>
                                    </tr>
                                    <tr>
                                        <td id="tableExpense"><i class="icon-right-hand"></i>Lorem asdasasdasdasdasdasdd asdasipsum dolor sit.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="comment">
                                    <h3><span>Komentarz do bilansu</span></h3>
                                </section>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">                                
                                <articcle>
                                    <div id="chartContainer" style="height: 470px; margin: 0px auto;"></div>
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
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>