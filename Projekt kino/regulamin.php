<?php

session_start();
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
if(isset($_SESSION['email'])) $login = $_SESSION['email']; 
require_once"connect.php";



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

	
<?php

	$wynik = mysqli_query($link,"Select * from sale") 
or die('Błąd zapytania'); 

 	


	echo'<div id="kontener">';
	echo'<div class="nav">';
	echo'<ul id="menu">';
	
	
	echo'<li><a href="index.php">Strona główna</a></li>';
	echo'<li><a href="repertuar.php">Repertuar</a></li>';
	
	


	echo'<li><a>Sale</a>';
	echo'<ul>';
	if(mysqli_num_rows($wynik) > 0) { 
while($r = mysqli_fetch_object($wynik)) { 
$id=$r->id;
$nazwa=$r->nazwa;

echo"<a style='text-decoration:none'   href='show_seans.php?seans_id=$id'>";
	echo'<li>'.$r->nazwa.'</a></li>';


	
}
	}
	echo'</ul></li>';

	
	

	echo'<li><a href="kontakt.php">Kontakt</a></li>';
	echo'<li><a href="regulamin.php">Regulamin</a></li>';

	
	echo'</ul>';
	echo'</div>';
	echo'</div>';
	


	?>

	<br><br><br>
	
	
	
	
	<div class="napisek">
	
	<h67>
	Regulamin</h67>
	
	</div>
	
	<br><br><br>
	
	
	
	
	
	<div class="regulaminek">
	
	
	<h55> <fieldset>
	
<br> <br> 
1-Kino Benex jest kinem, który prowadzony jest przez MD.
<br><br> 
2-Serwis działa na prawidłowo skonfigurowanej przeglądarce Internet Explorer, Mozilla Forefox, Google Chrome bądź innej zaktualizowanej i odpowiednio skonfigurowanej przeglądarce.
<br><br> 
3-Aby dokonać rezerwacji biletu, należy zarejestrować się na stronie  i wypełnić wskazany na tej stronie formularz.
<br><br> 
4-Osoba może jedynie dokonać rezerwacji biletu, jeśli jest zalogowany.


	</fieldset></h55>
	
	
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