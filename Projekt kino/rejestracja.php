<?php


session_start();

if(isset($_POST['email']))
{
	
	$check_bool=true;
	
	$nick=$_POST['nick'];
	
	
	if((strlen($nick)<3) ||(strlen($nick)>20))
	{
		
		$check_bool=false;
		$_SESSION['e_nick']="Imię musi posiadać od 3 do 20 znaków!";
		
	}
	
	if(ctype_alpha($nick)==false)
	{	
	
	$check_bool=false;
	$_SESSION['e_nick']="Imię może skladać sie tylko z liter!";
	
	}
	

	
	$email=$_POST['email'];
	$emailB=filter_var($email,FILTER_SANITIZE_EMAIL);
	
if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) ||($emailB!=$email))
	
	{
		$check_bool=false;
		$_SESSION['e_email']="Podaj poprawny email";
		
		
	}
	
	
	$haslo1=$_POST['haslo1'];
	$haslo2=$_POST['haslo2'];
	
	if((strlen($haslo1)<8)||(strlen($haslo1)>20))
	{
		
		$check_bool=false;
		$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków";
		
		
	}
	
	if($haslo1!=$haslo2)
		
	
	{
		
		$check_bool=false;
		$_SESSION['e_haslo']="Podane hasła nie są identyczne";
		
		
	}
	$haslo_hash=password_hash($haslo1,PASSWORD_DEFAULT);
	
	
	if(!isset($_POST['regulamin']))
		
		{
			
			$check_bool=false;
		$_SESSION['e_regulamin']="Potwierdz akceptację regulaminu!";
		
			
			
		}

	
	
	$_SESSION['fr_nick']=$nick;
	$_SESSION['fr_email']=$email;
	$_SESSION['fr_haslo1']=$haslo1;
	$_SESSION['fr_haslo2']=$haslo2;
	if(isset($_POST['regulamin']))$_SESSION['fr_regulamin']=true;
	
	
	require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$check_bool=false;
					$_SESSION['e_email']="Istnieje juz takie konto z emailem";
				}		

				
				
				
				if ($check_bool==true)
				{
					
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email',NOW())"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: powitanie.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}

?>



<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset="utf-8" />
<title>Kino Benex</title>
<meta name="description" content="Kino Benex"/>
<meta name="keywords" content="filmy,benex,kino" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/fontello.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="zegar.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">


<a id="button"></a>

</head>

<body>

		<body onload="odliczanie();">
		
		<div id="zegar">
		
</div>	
		

<header>

<div class="tytulik">

<h1> Kino Benex</h1>

	
	
			<a href="index.php"> <img class='logo' src="images/logo2.png" width='170' height'170'></a>
			
			


</div>
<div class="koszydiv">
		<a href="wyswietlanie_koszyka.php"> <div class='tooltip3'> <img class='koszyk' src="images/koszyk.jpg" width='40' height'40'></a>
		<span class='tooltiptext3'> Koszyk</span>
		</div>
			</div>
<br><br>
<div class="pasreje2">

		
	
	
	<li class="Logowanie2"><a href="logowanie.php">Zaloguj się</a></li>
 
			
	</header>		
				
				
					
	<div id="kontener2">
	<div class="nav">
	<ul id="menu">
	
	
		<li><a href="index.php"><i class="icon-home-outline"></i></a></li>
		
		
	</ul>
	
	
	<br><br><br>
	
	
	
	
	
	
	</div>
	</div>
		

	<div class="napisek">
	
	<h67>
	Rejestracja</h67>
	
	</div>
		
		
		
	<div id="container">

		<form method="post">
			
			<input type="text" placeholder="Imie" onfocus="this.placeholder=''" onblur="this.placeholder='Imie'" required value="<?php
			if(isset($_SESSION['fr_nick']))
			{
				
				echo$_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
			
			
			?>" name="nick" />
			 
			
			<?php
			
			
			if(isset($_SESSION['e_nick']))
			{
				
				echo'<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
			
			?>
			
			
		<input type="text" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" required value="<?php
			if(isset($_SESSION['fr_email']))
			{
				
				echo$_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
			
			
			?>" name="email" />
		
		
		
		<?php
			if(isset($_SESSION['e_email']))
			{
				
				echo'<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
			
			?>
		
		
		
			
			<input type="password" placeholder="Twoje hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Twoje hasło'" required value="<?php
			if(isset($_SESSION['fr_haslo1']))
			{
				
				echo$_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
			
			
			?>" name="haslo1" />
			
			
			<?php
			if(isset($_SESSION['e_haslo']))
			{
				
				echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
			
			?>
		
			
			
			
			<input type="password" placeholder="Powtórz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Powtórz hasło'" required value="<?php
			if(isset($_SESSION['fr_haslo2']))
			{
				
				echo$_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
			
			
			?>" name="haslo2" />
			
			
			<br><br><br>
		
			
			
		
			<input class='btn3' type="checkbox" required name="regulamin" <?php
			if(isset($_SESSION['fr_regulamin']))
				
				{
					
					echo"checked";
					unset($_SESSION['fr_regulamin']);
				}
			
			?>/><a href="regulamin.php" target="_blank"><b><font color="black">Akceptuję regulamin<a/></b></font>
			
			
			
					<?php
			if(isset($_SESSION['e_regulamin']))
			{
				
				echo'<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
			
			?>
			
			
			
			
			<br/><br />
			
			
			
		
			
			<br />
	<input type="submit" value="Zarejestruj się" />

	</form>
	<a></a>
	</div>
		
		<script src="jquery-3.4.1.min.js"></script>

		<script>
		var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 200) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

</script>

<div class="info">

<h410>
<h5211 style="color:#009933;">Infolinia</h5211>
<br><br>
832 492 921
<br><br>
	pn - pt od 9:30 do 19:00
	<br>
	sob - nd od 9:30 do 17:00
</h410>

<h411>

Dla klientów
<br><br>
<a href="regulamin.php">Regulamin</a>
<br><br>
<a href="kontakt.php"> Kontakt</a>


</h411>

</div>


<div id="footer">
			&copy by MD
		</div>

</div>

</body>
</html>