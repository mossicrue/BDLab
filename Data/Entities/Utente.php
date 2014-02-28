<?php
	// To create a specific Entity replace Utente with the name of the Entity that you need
	// In Notepad++ type CTRL+H to replace the string and then delete this starter row
	
	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	/*
	*****************************************************************************************************************
    *	CLASS Utente																			 				*
	*		This class extends EntityBase. It's an object that representing the structure of Utente table in	*
 	*		the database. You can extends this class any time you want for a more complex Entity like join or view	*
	*****************************************************************************************************************
	*/
	
	/* INCLUDE ENTITYBASE */
	include_once "EntityBase.php";
	
	// NOTICE: the class doesn't have any constructor (a part default constructor) because you 'construct' it
	//		   with the function in BOUtente class that you have to create finished to create this class
	class Utente extends EntityBase
	{
		// Insert here all the column of the table named Utente like properties
		public $idUtente;
		public $cf;
		public $nome;
		public $cognome;
		public $email;
		public $indirizzo;
		public $piva;
		public $password;
		public $idLingua;
		public $idValuta;
	}
?>