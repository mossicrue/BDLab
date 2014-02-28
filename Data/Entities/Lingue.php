D<?php
	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	/*
	*****************************************************************************************************************
    *	CLASS Lingue																			 				*
	*		This class extends EntityBase. It's an object that representing the structure of Lingue table in	*
 	*		the database. You can extends this class any time you want for a more complex Entity like join or view	*
	*****************************************************************************************************************
	*/
	
	/* INCLUDE ENTITYBASE */
	include_once "EntityBase.php";
	
	// NOTICE: the class doesn't have any constructor (a part default constructor) because you 'construct' it
	//		   with the function in BOLingue class that you have to create finished to create this class
	class Lingue extends EntityBase
	{
		// Insert here all the column of the table named Lingue like properties
		public $idLingua;
		public $descrizione;
		public $codice;
	}
?>