<?php
	
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	include_once "/BOs/BOAttore.php";
	include_once "/Entities/Attore.php";
	$attoreBO = new BOAttore("localhost", "root", "", "attori");
	$attori;
	$attoreBO->insertAttore('codice', 'Nome', 'Cognome', 'KAN', '00-00-0000', '1');
	
	$attoreBO = new BOAttore("localhost", "root", "", "attori");
	$attori = $attoreBO->getAll();
	echo "</br></br>".gettype($attori);
	foreach($attori as $att)
	{
		echo "</br></br>".gettype($att).":  ";
		echo $att->codice."</br>";
	}
	
	$input = "something"; 
	$output = hash("sha512", $input);
	echo $output;
?>