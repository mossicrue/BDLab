<?php
	// To create a specific Entity replace Conto with the name of the Entity that you need
	// In Notepad++ type CTRL+H to replace the string and then delete this starter row
	
	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	/*
	*****************************************************************************************************************
    *	CLASS Conto																			 				*
	*		This class extends EntityBase. It's an object that representing the structure of Conto table in	*
 	*		the database. You can extends this class any time you want for a more complex Entity like join or view	*
	*****************************************************************************************************************
	*/
	
	/* INCLUDE ENTITYBASE */
	include_once "EntityBase.php";
	
	// NOTICE: the class doesn't have any constructor (a part default constructor) because you 'construct' it
	//		   with the function in BOConto class that you have to create finished to create this class
	class Conto extends EntityBase
	{
		// Insert here all the column of the table named Conto like properties
		public $idConto;
		public $saldo;
		public $percAttivo;
		public $idUtente;
	}
?>