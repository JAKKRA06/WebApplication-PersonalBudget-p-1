<?php
		
		session_start();
		
		if (isset($_SESSION['sign_in']) && ($_SESSION['sign_in'] == true))
		{
			header('Location: menu.php');
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
	
			
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fontello.css">

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
    

</head>
<body>
    <main>
        <div class="container">
           <div class="row">
               <div class="col-sm-12">
                    <header><h2><a href="index.php">TWÓJ OSOBISTY MENAGER FINANSÓW</a></h2></header>
               </div>
           </div>
           
           <div class="row">
               <div class="col-sm-12">
                   <section class="description">
				   
                        <form method= "post" action="logIn.php">
							
							  <label for="usr">Nazwa użytkownika:</label>
							  <input type="text" name= "login" class="form-control" id="usr" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'">
							  <label for="pwd">Hasło:</label>
							  <input type="password" name= "password" class="form-control" id="pwd" placeholder="minimum 6 znaków" onfocus="this.placeholder=''" onblur="this.placeholder='minimum 6 znaków'">
							
							   <button type="submit" class="btn btn-lg btn-success"><i class="icon-logout"></i>    ZALOGUJ</button>
							   <button class="btn btn-lg btn-primary"><a href="index.php"><i class="icon-reply"></i>    POWRÓT</a></button>
							
					   </form>
					   <?php
							
								if (isset($_SESSION['warning']))	echo $_SESSION['warning'];
					   
					   ?>
                   </section>
               </div>
           </div>
            
        </div>
        
    </main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>