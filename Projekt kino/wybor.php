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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

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
	Rezerwacja miejsc</h67>
	
	</div>
	
	
	<?php
	
	function showSeans($id)
{
	global $link;
	
	$wyniki = mysqli_query($link,"Select * from godziny_seansu  where id=$id ") 
or die('Błąd zapytania'); 

	$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
	if(mysqli_num_rows($wyniki) > 0) 
	{ 
	while($r = mysqli_fetch_object($wyniki))
	{
	$ide_godz_seansu=$r->id;
	$ide_seansu=$r->id_seansu;
	$ide_zapowiedzi=$r->id_zapowiedzi;
	$ide_czasu_seansu=$r->time2;
	$ide_czasu_seansu=substr($ide_czasu_seansu,0,strlen($ide_czasu_seansu)-3);
	$ide_dzien_seansu=$r->day;
	$day_array = array(1=>'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela');
	$day_string=$day_array[$ide_dzien_seansu];
	
	
	
	
	$wyniki2 = mysqli_query($link,"select * from seanse where id =$ide_seansu")or die('Błąd zapytania');
	 while($re = mysqli_fetch_object($wyniki2)){
	
	$ide_filmu= $re->id;
	$ide_sala=$re->id_sala;	
	$ide_nazwa_filmu=$re->nazwa;

	$wyniki3 = mysqli_query($link,"select * from sale where id =$ide_sala")or die('Błąd zapytania');
	 while($ra = mysqli_fetch_object($wyniki3))
	{
	
	$ide_nazwa_sali=$ra->nazwa;
	$ide_rzedy=$ra->rzedy;
	$ide_miejsca=$ra->miejsca;
	
		
		echo'<div class="opis_rezerwacji">';
                
           echo"  Sala: <b>$ide_nazwa_sali</b>";
           echo"    | Film: <b>$ide_nazwa_filmu</b>";
           echo"  | <b>$day_string :</b>";
           echo"  <b>$ide_czasu_seansu</b>";
               
      
	  echo'</div>';
		 
		  echo'<div class="sala">';
              echo'  <div id="ekran">EKRAN</div> ';
			  
			  print '<form action="rezerwacja.php" method="post">';
			
			 print '<input type="hidden" name="id_seans" value="'.$r->id.'">';
			 print '<input type="hidden" name="id_filmu" value="'.$re->id.'">';
			  
			 for ($i = 1; $i <= $ide_rzedy; $i++){
				 
			 print '<div id="lp">'.$i.'</div>';	 
			 
			  for ($l = 1; $l <= $ide_miejsca; $l++){
						 
						 $wyniki5 =mysqli_query($link,"select * from rezerwacja where rzad =$i and miejsce = $l and id_godziny_seansu =$ide_godz_seansu"  )or die('Błąd zapytania beka');
			
			
			 if(mysqli_num_rows($wyniki5) > 0){
                         
                            

                                print '<input class="btn2" type="checkbox" id="'.$i.$l.'" name="s[]" value="'.$i.'v'.$l.'" disabled><label for="'.$i.$l.'" title="Zarezerwowane"><span>'.$l.'</span></label>';
                              }
                               else{
                                 print '<input class="btn2"  type="checkbox" id="'.$i.$l.'"  name="s[]" value="'.$i.'v'.$l.'" /><label for="'.$i.$l.'"><span>'.$l.'</span></label>';
                               }
			 
			
			
			 }
	print '</br>';
			 
			 }
			 	echo"<div class='koszykt'>";
		
        echo"<div class='tooltip'> <input class='btn' type='submit'value='Rezerwuj' id='checkBtn'/>";
		echo"</form>";
		if(isset($_SESSION['id'])=="")
		echo"<span class='tooltiptext'>Musisz być zalogowanym aby dodać rezerwacje do koszyka</span>";
		echo"</div>";
		echo"</div>";
			 echo'</form>';
	  echo' </div>';
	 $k=0;	 
$wyniki6 =mysqli_query($link,"select * from rezerwacja where id_godziny_seansu =$ide_godz_seansu"  )or die('Błąd zapytania beka');
while($re55 = mysqli_fetch_object($wyniki6)){
	
	
	$k++;
	
	
	
	
	
}
 echo'<div class="wolne_miejsca">';
 
 $ilosc_miejsc=$ide_rzedy*$ide_miejsca;
 $zajete_miejsca=$k;
 $wolne_miejsca=$ilosc_miejsc-$zajete_miejsca;
 
 echo'<h81>';
 echo"Ilość miejsc siedzących w sali: $ilosc_miejsc";
 
 echo'</h81>';
 
 echo'<h82>';
  echo"Ilość miejsc zajętych w sali: $zajete_miejsca";
  echo'</h82>';
  
  echo'<h83>';
   echo"Ilość miejsc wolnych w sali: $wolne_miejsca";
 echo'</h83>';
 
	echo'</div>';
	

	
	
	
	}	 
	
	 }
	
	}
	
	}
	
}
	
	if(isset($_GET['id_seans']))
{
	showSeans($_GET['id_seans']);
	
}

	
	?>
	
	
	
	
		<br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br>

	
		
		<br><br><br><br><br><br><br><br>



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

<script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("Wybierz miejsce siedzące do rezerwacji ");
        return false;
      }

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
	
</script>
	
</body>

</html>