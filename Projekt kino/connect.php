<?php
      
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "kino";
    
    $link = mysqli_connect($host, $db_user, $db_password, $db_name)or die ("Nie można nawiązać połączenia z bazą danych.");
    
	mysqli_query($link,"SET CHARSET utf8");
    mysqli_query($link,"SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
  
?>