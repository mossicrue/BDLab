<?php
	// To create a specific Entity with a Joined Entity replace Conto with the name of the Entity that you need
	// and replace ContoCredito with the name of the Joined Entity
	// In Notepad++ type CTRL+H to replace the string and then delete this starter row
	
	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	/*
	*********************************************************************************************************************
    *	CLASS ContoWithContoCredito															 							*
	*		This class extends Conto. It's an object that representing the structure of ContoWithContoCredito table		*
	*		result in the database. You can extends this class any time you want for a more complex Entity like Join	*
	*********************************************************************************************************************
	*/
	
	/* INCLUDE ENTITYBASE */
	include_once "EntityBase.php";
	include_once "Conto.php";
	
	// NOTICE: the class doesn't have any constructor (a part default constructor) because you 'construct' it
	//		   with the function in BOConto class that you have to create finished to create this class
	class ContoWithContoCredito extends Conto
	{
		// Insert here all the column of the table named ContoCredito like properties
		// Notice that the properties of Conto table are inheritance from Conto class
		public $cc_idContoCredito;
		public $cc_numeroCarta;
		public $cc_scadenza;
	}
?>