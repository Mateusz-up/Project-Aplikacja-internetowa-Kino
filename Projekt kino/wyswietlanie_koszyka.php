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
	
	<h67> Informacje o koszyku</h67>
	
	</div>
		
	
	<div id="left">
	<?php
	if(isset($_SESSION['id'])!="")
	{

wyswietl_koszyk($id_uzytkownika);


	}
	
	else
		
		{
			
			echo"<div class='koinfo'>";
			echo"<h28>";
			echo"Musisz być zalogowanym, aby wyświetlić zawartość koszyka.";
			echo"</h28>";
			echo"</div>";
			
		}
	
	
	
	
	
	?>
		
	
	<br><br><br><br><br><br>
	</div>

	<div class="blok">
	
	<?php
	function wyswietl_koszyk($id_uzytkownika)
	{
		echo'<br><br><br>
		<div class="pow">
	<a href="panel_uzytkownika.php"> Powrót do panelu użytkownika</a>
	</div>';
		global $link;
		$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
		if(isset($_SESSION['id'])!="")
		{
		$id_uzytkownika = $_SESSION['id'];
		$wyniki = mysqli_query($link,"Select * from rezerwacja  where id_uzytkownika=$id_uzytkownika ") or die('Błąd zapytania'); 
		$i=0;
		$k=0;
	if(mysqli_num_rows($wyniki) > 0)
	{
			
		echo"<div class='pusto2'>";
		echo"<h45>";
		echo"Zawartość twojego koszyka";
		echo"</h45>";
		echo"</div>";
	echo"<div class='color'>";
	echo"<h129 id='rejester'>";
		echo "Rezerwacja biletu dostępna 3 godziny, po tym czasie zostanie usunięta z koszyka";
		echo"</h129>";
		echo"</div>";
		
		
			
		while($re = mysqli_fetch_object($wyniki))
			{
				$id_rezerwacji=$re->id;
				$id_rzad=$re->rzad;
				$id_miejsce=$re->miejsce;
				$id_godz_seansu=$re->id_godziny_seansu;
				$data_dodania=$re->data;
		
			
			
			
			$numeryTowarow[$i]=$re->id_godziny_seansu;
			if($numeryTowarow[$i]!= '')
		{
		$idkoszyka[$k]=$re->id;
		$i++;
		$k++;
	
		}
				
			
				
			
			
		
		
		
			
				
				$wyniki3 = "select * from godziny_seansu where id =$id_godz_seansu";
					$sql3 = mysqli_query($link,$wyniki3) or die ("Źle sformułowane żądanie danych");
			$ra = mysqli_fetch_object($sql3);
			
				 
					 
					 $ide_dzien_seansu=$ra->day;
					$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
				$day_string=$day_array[$ide_dzien_seansu];
					 $ide_czasu_seansu=$ra->time2;
				$ide_czasu_seansu=substr($ide_czasu_seansu,0,strlen($ide_czasu_seansu)-3);
				$id_seansu=$ra->id_seansu;
				$wyniki5 = "Select * from seanse  where id=$id_seansu ";
					 $sql4 = mysqli_query($link,$wyniki5) or die ("Źle sformułowane żądanie danych");
			$rb = mysqli_fetch_object($sql4);
			
				 
			
				
					 $nazwa_filmu=$rb->nazwa;
					 $id_filmu=$rb->id;
					 $id_sale=$rb->id_sala;
					 $id_cena=$rb->cena;
					echo'<br><br><br>';
					
					
					$wyniki6 = "Select * from sale  where id=$id_sale ";
					 $sql5 = mysqli_query($link,$wyniki6) or die ("Źle sformułowane żądanie danych");
			$rbe = mysqli_fetch_object($sql5);
				
				 
					  
					  $nazwa_sali=$rbe->nazwa;
					  
					  
				 
		
		echo"<div class='wyswie12'>";
		echo"<h555>";
		echo "<a style='text-decoration:none' target='_blank' href='filmy.php?film_id= $id_filmu'>";
		echo'<br><br>';
				echo ($i).".".$nazwa_filmu."";
		
		echo"</h555>";
		
			 echo "</a>";
			 echo"</div>";
		
		
		
					
					
					
					echo"<div class='wyswie14'>";
		echo"<h542>";
		 echo "Sala: ".$id_sale."";
		
			 
	echo"</h542>";
				echo"</div>";
						
						echo"<div class='wyswie15'>";
		echo"<h542>";
		
		 echo "Rząd: ".$id_rzad."";
		  echo "  Miejsce: ".$id_miejsce."";
		
			 
	echo"</h542>";
				echo"</div>";
				
				echo"<div class='wyswie16'>";
		echo"<h542>";
		 echo "Dzień: ".$day_string."";
		
		
			 
	echo"</h542>";
				echo"</div>";
				
				
				echo"<div class='wyswie17'>";
		echo"<h542>";
		 echo "Godzina: ".$ide_czasu_seansu."";
		
		
			 
	echo"</h542>";
				echo"</div>";
				
				echo"<div class='wyswie18'>";
		echo"<h542>";
		 echo "Cena: ".$id_cena."zł";
		
		
			 
	echo"</h542>";
				echo"</div>";
				
				echo"<div class='wyswie19'>";
		echo"<h542>";
		 echo "Dodano do koszyka: ".$data_dodania."";
		
		
			 
	echo"</h542>";
				echo"</div>";

				
				
					echo"<div class='los'>";
				echo"<form action='usuwanie_koszyka.php' method='post'>";
		echo"<input type='hidden' name='idzik4' value='$id_rezerwacji'>";
		echo"<input type='image' title='Kliknij aby usunąć rezerwacje' class='kosz' id='szukan2' alt='szukan' src='images/kosz.jpg' width='30' height'30'>";

	    
		echo"</form>";
		echo"</div>";


echo"<div class='los2'>";
				echo"<form action='zamawianie.php' method='post'>";
				 
		echo"<input type='hidden' name='idzik20' value='$id_cena'>";
		echo"<input type='hidden' name='idzik27' value='$nazwa_filmu'>";
		echo"<input type='hidden' name='idzik21' value='$id_rzad'>";
		echo"<input type='hidden' name='idzik22' value='$id_miejsce'>";
		echo"<input type='hidden' name='idzik23' value='$id_sale'>";
		echo"<input type='hidden' name='idzik24' value='$ide_czasu_seansu'>";
		echo"<input type='hidden' name='idzik25' value='$day_string'>";
		echo"<input type='hidden' name='idzik26' value='$id_rezerwacji'>";
		echo"<input class='btn3' type='submit' value='Zamów'>";
	echo"</form>";		
	   echo"</div>";
	    
		
			
			
			$zapytanie36 = "DELETE FROM rezerwacja WHERE data < NOW() - INTERVAL 3 HOUR";
		$sql33 = mysqli_query($link,$zapytanie36) or die ("Źle sformułowane żądanie danych2");

		
	}
			
	}
	else
	{
		echo"<div class='pusto2'>";
		echo"<h45>";
		echo"Twój koszyk jest pusty";
		echo"</h45>";
		echo"</div>";
	}
	echo"<br><br>";
		
	
		
		
		
		
		
		
		
	}
		
	
		
	}	
	
	
	?>
		
	
	
	
	</div>
	
	
	
		
		



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
function flash(id, kolor, czas, kolor2, czas2)
{
	document.getElementById(id).style.color = kolor;
	setTimeout('flash("' + id + '","' + kolor2 + '",' + czas2 + ',"' + kolor + '",' + czas + ')', czas);
}
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