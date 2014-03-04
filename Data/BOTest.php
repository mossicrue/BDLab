<?php
	
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	include_once "/BOs/BOUtente.php";
	include_once "/Entities/Utente.php";
	$BO = new BOUtente("localhost", "root", "", "test_db");
	$utente;
	$utente = $attoreBO->getAll();
	foreach($utente as $u)
	{
		echo "</br></br>".gettype($u).":  ";
		echo $u->nome."</br>";
	}
	$input = "futtupavde21"; 
	$output = hash("sha512", $input);
	echo $output;
?>