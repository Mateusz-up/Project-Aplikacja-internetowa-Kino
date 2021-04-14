
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
</html>
<?php

session_start();
if(isset($_SESSION['id'])) $id_uzytkownika = $_SESSION['id']; 
if(isset($_SESSION['email'])) $login = $_SESSION['email']; 
include("connect.php");






function showSeans($id)
{
	global $link;
	
	

	$wyniki = mysqli_query($link,"Select * from seanse  where id=$id ") 
or die('Błąd zapytania'); 


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
$idik=nl2br($r->id_opisu_zdj);
 echo' <article class="movies">';
  print '<section class="movie">';
  
				echo'<br><br>';
                print '<figure> <div class="tooltip4"><img src="'.$r->url_zdjec.'" width="200" height"200" alt="plakat"/>';
			echo'<span class="tooltiptext4">'.$r->id_opisu_zdj.'</span>'; 
				echo'</div>';
                print '<figcaption>'.$r->nazwa.'</figcaption></figure>';
				
               print '<div class="opis"><p>'.$r->opis.'</br></br>Czas trwania: '.$r->czas_trwania.'</br></br>Cena: '.$r->cena. ' zł </p></div>';
		
		
	
	 print '</section>';
	 echo' </article>';
	}
	}
}
if(isset($_GET['film_id']))
{
	showSeans($_GET['film_id']);
	
}

?>
