<?php
	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	/*
	*****************************************************************************************************************
    *	CLASS Valuta																				 				*
	*		This class extends EntityBase. It's an object that representing the structure of Valuta table in		*
 	*		the database. You can extends this class any time you want for a more complex Entity like join or view	*
	*****************************************************************************************************************
	*/
	
	/* INCLUDE ENTITYBASE */
	include_once "EntityBase.php";
	
	// NOTICE: the class doesn't have any constructor (a part default constructor) because you 'construct' it
	//		   with the function in BOValuta class that you have to create finished to create this class
	class Valuta extends EntityBase
	{
		// Insert here all the column of the table named Valuta like properties
		public $idValuta;
		public $codice;
		public $descrizione;
		public $tassoCambio;
		public $codiceHTML;
		public $codiceFA;
	}
?>