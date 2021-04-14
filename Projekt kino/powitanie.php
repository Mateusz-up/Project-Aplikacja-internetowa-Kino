<?php

session_start();

if(!isset($_SESSION['udanarejestracja']))
{
	header('Location:logowanie.php');
	exit();
}
else
{
	
	unset($_SESSION['udanarejestracja']);
}


if(isset($_SESSION['fr_nick']))unset($_SESSION['fr_nick']);
if(isset($_SESSION['fr_email']))unset($_SESSION['fr_email']);
if(isset($_SESSION['fr_haslo1']))unset($_SESSION['fr_haslo1']);
if(isset($_SESSION['fr_haslo2']))unset($_SESSION['fr_haslo2']);
if(isset($_SESSION['fr_regulamin']))unset($_SESSION['fr_regulamin']);


if(isset($_SESSION['e_nick']))unset($_SESSION['e_nick']);
if(isset($_SESSION['e_mail']))unset($_SESSION['e_mail']);
if(isset($_SESSION['e_haslo']))unset($_SESSION['e_haslo']);
if(isset($_SESSION['e_regulamin']))unset($_SESSION['e_regulamin']);
if(isset($_SESSION['e_bot']))unset($_SESSION['e_bot']);
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
			
			
	</div>			

</div>



	
	<br><br><br>
		
			<font size="14"><font color="blue">Dziękujemy za rejestrację w serwisie! <br>Twoje konto zostało założone.<br> Możesz już się zalogować na swoje konto!</font></font><br/><br/>
			<div class="dzieki">
			<a href="logowanie.php"><b><font color="#330000"><p align="center"><font size="25">Zaloguj się na swoje konto!</b></font></p></font></a>
			<br /><br />
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

</body>
</html>