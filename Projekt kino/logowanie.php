<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panel_uzytkownika.php');
		exit();
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

<header>


<div class="pasreje2">

		
	<li class="Logowanie2"><a href="rejestracja.php">Rejestracja</a></li>
 
		
			
				

</div>
</header>

<div id="kontener">
	<div class="nav">
	<ul id="menu">
	
	
		<li><a href="index.php"><i class="icon-home-outline"></i></a></li>
		
		
	</ul>
	
	</div>
	</div>

	<br><br><br>
	
	
	
	
	<div class="napisek">
	
	<h67>
	Logowanie</h67>
	
	</div>
	
	<div id="container">
					
				<form action="logowanie_uz.php" method="POST">
			    <input type="text"  required name="email" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" />
				<input type="password" required name="haslo" placeholder="Hasło" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'" />	
				<input type="submit" value="Zaloguj się" />
				
						
				</form>
				
				<?php
				
				if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
				
			
				
				?>
	
	
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