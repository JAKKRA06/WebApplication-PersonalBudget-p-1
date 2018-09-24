<?php
	session_start();
	
	//walidaja danych ale dopiero gdy cos wpiszemy
	
	if (isset($_POST['nick']))
	{
		$all_OK = true;
		
		//spr nick
		$nick = $_POST['nick'];
		
		//spr dl nicka
		
		if ((strlen($nick) < 3 ) || (strlen($nick) > 20))
		{
				$all_OK = false;
				$_SESSION['e_nick']="Login musi posiadać od 3 do 20 znaków !";
		}
		
		if (ctype_alnum($nick) == false)
		{
			$all_OK = false;
			$_SESSION['e_nick']="Login musi składać się tylko z liter i cyfr (bez polskich znaków) !";
			
		}
		
		//spr poprawnosc email
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email))
		{
			$all_OK = false;
			$_SESSION['e_email']="Podaj poprawny email !";
		}
		
		
		//spr haslo
		
		$password = $_POST['password'];
		
		if ((strlen ($password) < 6) || (strlen ($password) > 20))
		{
			$all_OK = false;
			$_SESSION['e_password']="Hasło musi posiadać od 6 do 20 znaków !";
		}
		
		$password_hash = password_hash($password, PASSWORD_DEFAULT);

		
		//spr captcha
		
		$secret = "6LcxbnEUAAAAANEc8gDDoETqH_xtAFGRCo-3V_sF";
		
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		
		$answer = json_decode($check);
		
		if ($answer->success == false)
		{
			$all_OK = false;
			$_SESSION['e_boot']="Potwierdź, że nie jesteś robotem !";
		}
		
		//spr czy w bazie istnieje uzytkownik o podanym loginie. Musimy w tym celu polaczy sie z baza
		// tworzenie zmiennych sesyjnych, ktore beda zapamietane przez formularv przy blednej rejestracji
		
		$_SESSION['R_nick'] = $nick;
		$_SESSION['R_email'] = $email;
		$_SESSION['R_password'] = $password;
		
		require_once "connect.php";
		
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
				//czy email wystepuje w bazie
				$result = $connection->query("SELECT id FROM users WHERE email = '$email'");
				
				if (!$result) throw new Exception($connection->error);
				
				$how_many_mails = $result->num_rows;
				if($how_many_mails > 0)
				{
					$all_OK = false;
					$_SESSION['e_email']="Podany e-mail został przypisany do innego konta użytkownika !";
				}
				
				//czy login wystepuje w bazie
				$result = $connection->query("SELECT id FROM users WHERE username = '$nick'");
				
				if (!$result) throw new Exception($connection->error);
				
				$how_many_logins = $result->num_rows;
				if($how_many_logins > 0)
				{
					$all_OK = false;
					$_SESSION['e_nick']="Istnieje już użytkownik o takim loginie !";
				}
						
				if ($all_OK == true)
				{
					if ($connection->query("INSERT INTO users VALUES (NULL, '$nick', '$password_hash', '$email')"))
					{
						
						// kopiowanie tabeli incomes_category_default do incomes_category_assigned_to_user
						// kopiowanie tabeli expenses_category_default do expenses_category_assigned_to_user
						
						
						
						
						
						
						$_SESSION['registration_success']= true;
						header('Location: welcome.php');
					}
					else
					{
						throw new Exception($connection->error);
					}
				}
				
				$connection->close();
			}
		}
		catch(Exception $error)
		{
				echo "Błąd serwera ! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie.";
		}
	}
?>


<!DOCTYPE HTML>
<html lang="pl">
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
                    <header><h2><a href="index.php">TWÓJ OSOBISTY MENAGER FINANSÓW</a></h2></header>
               </div>
           </div>
           
           <div class="row">
               <div class="col-sm-12">
                   <section class="description">
				   
                        <form method="post">
                        
							<label for="pwd">Nazwa użytkownika:</label>
							<input type="text" name="nick" value="<?php
							if (isset($_SESSION['R_nick'])) 
							{
								echo $_SESSION['R_nick'];
								unset($_SESSION['R_nick']);
							}
							?>"
							id="pwd" class="form-control" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'">
							<?php
								if(isset($_SESSION['e_nick']))
								{
									echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
									unset($_SESSION['e_nick']);
								}
							?>
							
                          <label for="pwd1">E-mail:</label>
						  <input type="text" name="email"  value="<?php
							if (isset($_SESSION['R_email'])) 
							{
								echo $_SESSION['R_email'];
								unset($_SESSION['R_email']);
							}
							?>" class="form-control" id="pwd1" placeholder="e-mail" onfocus="this.placeholder=''" onblur="this.placeholder='e-mail'">		
							<?php
								if(isset($_SESSION['e_email']))
								{
									echo '<div class="error">'.$_SESSION['e_email'].'</div>';
									unset($_SESSION['e_email']);
								}
							?>
							
							<label for="pwd2">Hasło:</label>
							<input type="password" name="password"  value="<?php
							if (isset($_SESSION['R_password'])) 
							{
								echo $_SESSION['R_password'];
								unset($_SESSION['R_password']);
							}
							?>" class="form-control" id="pwd2" placeholder="minimum 6 znaków" onfocus="this.placeholder=''" onblur="this.placeholder='minimum 6 znaków'">
							<?php
								if(isset($_SESSION['e_password']))
								{
									echo '<div class="error">'.$_SESSION['e_password'].'</div>';
									unset($_SESSION['e_password']);
								}
							?>
							<div class="g-recaptcha" data-sitekey="6LcxbnEUAAAAAOn7v_ajv47yLEBrkKaGUISkXUXm" style="margin-top: 20px;"></div>
							<?php
								if(isset($_SESSION['e_boot']))
								{
									echo '<div class="error">'.$_SESSION['e_boot'].'</div>';
									unset($_SESSION['e_boot']);
								}
							?>
							
							<button  type="submit" class="btn btn-lg btn-danger"  style="float:left;"><i class="icon-user-plus"></i>   DOŁĄCZ</button>
							<button class="btn btn-lg btn-primary"  style="float:left;"><a href="index.php"><i class="icon-reply"></i>    POWRÓT</a></button>
							<div style="clear: both;"></div>
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