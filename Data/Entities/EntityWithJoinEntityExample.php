<?php
	// To create a specific Entity with a Joined Entity replace EntityName with the name of the Entity that you need
	// and replace JoinEntity with the name of the Joined Entity
	// In Notepad++ type CTRL+H to replace the string and then delete this starter row
	
	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);
	
	/*
	*************************************************************************************************************************
    *	CLASS EntityNameWithJoinEntity															 							*
	*		This class extends EntityName. It's an object that representing the structure of EntityNameWithJoinEntity table	*
	*		result in the database. You can extends this class any time you want for a more complex Entity like Join		*
	*************************************************************************************************************************
	*/
	
	/* INCLUDE ENTITYBASE */
	include_once "EntityBase.php";
	include_once "EntityName.php";
	
	// NOTICE: the class doesn't have any constructor (a part default constructor) because you 'construct' it
	//		   with the function in BOEntityName class that you have to create finished to create this class
	class EntityNameWithJoinEntity extends EntityName
	{
		// Insert here all the column of the table named JoinEntity like properties
		// Notice that the properties of EntityName table are inheritance from EntityName class
		public $varA;
		public $varB;
		public $varC;
		public $varD;
		public $varE;
		public $varF;
	}
?>