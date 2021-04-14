<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
		
    } 
include("connect.php");

$id_cena=$_POST['idzik20'];
$id_rzad=$_POST['idzik21'];
$id_miejsce=$_POST['idzik22'];
$id_sale=$_POST['idzik23'];
$ide_czasu_seansu=$_POST['idzik24'];
$day_string=$_POST['idzik25'];
$id_rezerwacji=$_POST['idzik26'];
$film=$_POST['idzik27'];


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
<div class="pasreje">

		
	<?php
	
	if(isset($id_uzytkownika)!="")
	{echo"<h888>";
		echo"Witaj ".$_SESSION['user']."";
		echo"</h888>";
		echo"<h889>";
			echo "Email:".$_SESSION['email'],"";
			echo"</h888>";
			echo'<li class="Wylogowanie"><a href="logout.php">Wyloguj się!</a></li>';
			if($id_uzytkownika!=5){
		echo'<li class="Konto"><a href="panel_uzytkownika.php">Twoje konto</a></li>';
			}
			else{
				echo'<li class="Konto"><a href="panel_admina.php">Panel admina</a></li>';
			}
			
	}
	
	else
      	{
		echo'<li class="Zakladanie"><a href="rejestracja.php">Rejestracja</a></li>';
		echo'<li class="Logowanie"><a href="logowanie.php">Zaloguj się</a></li>';
	 }  
  ?>
			
	</header>		
				

</div>
	<div id="kontener">
	<div class="nav">
	<ul id="menu">
	
	
		<li><a href="wyswietlanie_koszyka.php">Powrót do koszyka</a></li>
		
		
	</ul>
	
	</div>
	</div>
	
	
	<br><br><br>
	
	<div class="napisek">
	
	<h67>
	Podaj dane do wysyłki</h67>
	
	</div>
	
	
	<?php

		echo"<div id='container'>";

		echo"<form action='zamawianie2.php' method='post'>";
			 echo"<input type='text'  name='imie' required pattern='[A-Ża-ż]+' title='Tylko litery z alfabetu'  placeholder='Imię' onfocus='this.placeholder=''' onblur='this.placeholder='Imię'' />";
				echo"<input type='text' name='nazwisko' required pattern='[A-Ża-ż]+' title='Tylko litery z alfabetu' placeholder='Nazwisko' onfocus='this.placeholder=''' onblur='this.placeholder='Nazwisko'' />";	
			 echo"<input type='text' name='miasto'  required pattern='[A-Ża-ż]+' title='Tylko litery z alfabetu' placeholder='Miasto' onfocus='this.placeholder=''' onblur='this.placeholder='Miasto'' />";
		
		echo"<input type='text' name='ulica' placeholder='Ulica'required onfocus='this.placeholder=''' onblur='this.placeholder='Ulica'' />";
		
		echo"<input type='hidden' name='idzik40' value='$id_cena'>";
		echo"<input type='hidden' name='idzik41' value='$id_rzad'>";
		echo"<input type='hidden' name='idzik42' value='$id_miejsce'>";
		echo"<input type='hidden' name='idzik43' value='$id_sale'>";
		echo"<input type='hidden' name='idzik44' value='$ide_czasu_seansu'>";
		echo"<input type='hidden' name='idzik45' value='$day_string'>";
		echo"<input type='hidden' name='idzik46' value='$id_rezerwacji'>";
		echo"<input type='hidden' name='idzik47' value='$film'>";
		
		echo"<input type='submit' value='Zamawiam'>";

	echo"</form>";
	echo"<a></a>";
	echo"</div>";
?>



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

<script>

	$(document).ready(function() {
	var NavY = $('.nav').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.nav').addClass('sticky');
	} else {
		$('.nav').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>
	
</body>

</html>