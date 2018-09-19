<?php
	session_start();
	
	//walidaja danych ale dopiero gdy cos wpiszemy
	
	if (isset($_POST['nick']))
	{
		$all_OK = true;
		
		//spr nick
		$nick = $_POST['nick'];
		
		//spr dl nicka
		
		if ((strlen($nick) < 3 ) || (strlen($nick) > 20 ))
		{
				$all_OK = false;
				$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		
		
		
		if ($all_OK == true)
		{
			//zaliczone, dodoaj gracza do bazy
			//insert
			echo "Udana walidacja!"; exit();
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
	<meta name="keywords" content="finanse, prowadzenie, budzet, osobisty, bilans, wydatki, przychody, budget">
	<meta name="author" content="Jakub Krajniewski">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fontello.css">

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

	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>
<body>
    <main>
        <div class="container">
           <div class="row">
               <div class="col-sm-12">
                    <header><h2>TWÓJ OSOBISTY MENAGER FINANSÓW</h2></header>
               </div>
           </div>
           
           <div class="row">
               <div class="col-sm-12">
                   <section class="description">
				   
                        <form action="post">
                          <label>Nazwa użytkownika:</label>
                          <input type="text" name="nick" class="form-control" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'">
							<?php
								if(isset($_SESSION['e_nick']))
								{
									echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
									unset($_SESSION['e_nick']);
								}
							?>
                          <label for="pwd">E-mail:</label>
                          <input type="text" name="email" class="form-control" id="pwd" placeholder="e-mail" onfocus="this.placeholder=''" onblur="this.placeholder='e-mail'">
							<?php
								if(isset($_SESSION['e_email']))
								{
									echo '<div class="error">'.$_SESSION['e_email'].'</div>';
									unset($_SESSION['e_email']);
								}
							?>			
						 <label for="pwd">Hasło:</label>
                          <input type="password" name="password" class="form-control" id="pwd" placeholder="minimum 4 znaki" onfocus="this.placeholder=''" onblur="this.placeholder='minimum 4 znaki'">
						  </br>
						  <div class="g-recaptcha" data-sitekey="6Lc29nAUAAAAAD1LPXz15-nOvuoejCs5BFb0JwlV"></div>
						  
							<button  type="submit" class="btn btn-lg btn-danger"><i class="icon-user-plus"></i>    DOŁĄCZ</button>
							<button class="btn btn-lg btn-primary"><a href="index.php"><i class="icon-reply"></i>    POWRÓT</a></button>
                        </form>
						

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