<?php
	// To create a specific Entity with a Joined Entity replace Utente with the name of the Entity that you need
	// and replace Options with the name of the Joined Entity
	// In Notepad++ type CTRL+H to replace the string and then delete this starter row
	
	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	/*
	*************************************************************************************************************************
    *	CLASS UtenteWithOptions															 							*
	*		This class extends Utente. It's an object that representing the structure of UtenteWithOptions table	*
	*		result in the database. You can extends this class any time you want for a more complex Entity like Join		*
	*************************************************************************************************************************
	*/
	
	/* INCLUDE ENTITYBASE */
	include_once "EntityBase.php";
	include_once "Utente.php";
	
	// NOTICE: the class doesn't have any constructor (a part default constructor) because you 'construct' it
	//		   with the function in BOUtente class that you have to create finished to create this class
	class UtenteWithOptions extends Utente
	{
		// Insert here all the column of the table named Options like properties
		// Notice that the properties of Utente table are inheritance from Utente class
		public $v_codice;
		public $v_descrizione;
		public $v_tassoCambio;
		public $v_codiceHTML;
		public $v_codiceFA;
		public $l_descrizione;
		public $l_codice;
	}
?>