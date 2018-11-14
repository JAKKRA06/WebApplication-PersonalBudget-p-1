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
                            <a href="menu.php" class="active">Strona główna</a>
                            <a href="income.php">Dodaj przychód</a>
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
			   
                        <!--1 AKŁADKA-->
                  <article class="tab-content">
                        <article class="tab-pane active" id="mainpage">
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
				</article>					  
      
			</div>
		</div>
       
    </main>
	
	<script src="menuResponsywne.js" type="text/jscript"></script>


</body>
</html>