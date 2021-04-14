<?php

session_start();
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
if(isset($_SESSION['email'])) $login = $_SESSION['email']; 
include("connect.php");



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
	Wyświetlane filmy</h67>
	
	</div>
		<br><br><br><br><br><br><br>
		<div class="napisek2">
		<h666>
		Aby zarezerwować miejsca na dany seans, kliknij na wybraną godzinę seansu.
		<p>
		Brak możliwości rezerwacji po czasie seansu i godzinę przed seansem.
		</h66>
		
		</div>
		
		<?php

function showSeans($id)
{
	global $link;
	$wyniki555 = mysqli_query($link,"Select * from sale  where id=$id ") 
or die('Błąd zapytania'); 
while($rak = mysqli_fetch_object($wyniki555))
	{
	
		$porownanie="Sala Vip";
		$nazwa_sali=$rak->nazwa;
		
		if($nazwa_sali==$porownanie)
		{
			echo'<div class="nazwa_vip">';
			
			echo"Witaj w strefie Vip<p>";
				
				echo"Sala vip oferuje:luksusowe elektrycznie regulowane fotele,  otwarty bar z przekąskami,  catering, specjalne loże.";
			
			
			echo'</div>';
		}
		
	
	}
	

	$wyniki = mysqli_query($link,"Select * from seanse  where id_sala=$id ") 
or die('Błąd zapytania'); 


$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
	if(mysqli_num_rows($wyniki) > 0) { 
	while($r = mysqli_fetch_object($wyniki))
	{
		
		$ide3=$r->id;
$nazwa=$r->nazwa;
$url=$r->url_zdjec;
$id_opisu_zdjec=$r->id_opisu_zdj;
$opis=$r->opis;
$czas_trwania=$r->czas_trwania;
$cena=$r->cena;
$od_kiedy=$r->since_day;
$idik=nl2br($r->id_opisu_zdj);

$dacik2=strtotime($od_kiedy);

$obecna_data = date("Y-m-d");
$pozostalo = strtotime($obecna_data);

if($pozostalo >= $dacik2)
{
 echo' <article class="movies">';
  print '<section class="movie">';
  
				echo'<br><br>';
                print '<figure> <div class="tooltip4"><img src="'.$r->url_zdjec.'" width="200" height"200" alt="plakat"/>';
			echo'<span class="tooltiptext4">'.$r->id_opisu_zdj.'</span>'; 
				echo'</div>';
                print '<figcaption>'.$r->nazwa.'</figcaption></figure>';
				
               print '<div class="opis"><p>'.$r->opis.'</br></br>Czas trwania: '.$r->czas_trwania.'</br></br>Cena: '.$r->cena. ' zł </p></div>';
		print '<div id="dates">';
		foreach ($day_array as $day_value => $day_string) {
		  print '<div class="day"><form>'.$day_string.'</b></br>';
                    $day = $day_value;
                    $title = $r->nazwa;
					
                    
					$wyniki2 = mysqli_query($link,"select * from godziny_seansu where id_seansu =$ide3 and day = '$day'")or die('Błąd zapytania');
					
					
                 while($re = mysqli_fetch_object($wyniki2)){
					 
					$bez_sekund=$re->time2;
					
					$bez_sekund=substr($bez_sekund,0,strlen($bez_sekund)-3);
					$bez_sekund2=$bez_sekund;
					
					
					$ts = strtotime($bez_sekund);
					
					  $czas=date("H:i");
				$czas2=date('H:i', strtotime('-1 hour')); 
				$czas3=date('H:i', strtotime('-2 hour +30 minutes'));
					
					
					
					
				
					$bez_sekund3=date('H:i', strtotime('-1 hour ',$ts));
	$data23 = date("m.d.y");  
    $dzien111 = date('N', strtotime($data23));
	
	
					
					
					
					if($czas >= $bez_sekund3 and $dzien111==$day){
					
					
					print '<a href="wybor.php?id_seans='.$re->id.'" title="Rezerwacja niedostępna"><input type="button" disabled name="godz" value="'.$bez_sekund.'"/></a>';
					}
						else{
							
							print '<a href="wybor.php?id_seans='.$re->id.'" title=" Kliknij tutaj żeby zarezerwowac"><input type="button" name="godz" value="'.$bez_sekund.'"/></a>';
						}

					}
              
				
                print '</form></div>';
               }
	
	 print '</section>';
	 echo' </article>';
}
else
{
}
	}
	}
	
}


if(isset($_GET['seans_id']))
{
	showSeans($_GET['seans_id']);
	
}


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
	
		<script>

var modal = document.getElementById('myModal');


var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}


var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
  modal.style.display = "none";
}
</script>
	
</script>
	
</body>

</html>